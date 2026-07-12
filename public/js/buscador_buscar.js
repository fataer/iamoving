// Variables globales con verificación de existencia
if (typeof window.map === 'undefined') {
    window.map = null;
}

if (typeof window.markerDB === 'undefined') {
    window.markerDB = [];
}

if (typeof window.cardData === 'undefined') {
    window.cardData = window.data || [];
}

if (typeof window.advancedMarkers === 'undefined') {
    window.advancedMarkers = new Map();
}

// URLs constantes
const DESARROLLO_URL = "https://www.iamoving.com/img/marker.ico";
const SELECTED_URL = "https://www.iamoving.com/img/selected.ico";

// Función principal que se llama cuando Google Maps se carga
window.initMap = function() {
    console.log('initMap() llamado, inicializando mapa...');
    
    // Verificar que Google Maps está cargado
    if (typeof google === 'undefined' || !google.maps) {
        console.error('Google Maps API no disponible');
        // Reintentar después de 500ms
        setTimeout(window.initMap, 500);
        return;
    }
    
    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeMap);
    } else {
        initializeMap();
    }
};

// Función real de inicialización del mapa
function initializeMap() {
    try {
        console.log('initializeMap() ejecutándose...');
        
        // Si ya existe un mapa, limpiarlo primero
        if (window.map && window.map.setMap) {
            window.map.setMap(null);
        }
        
        // Obtener coordenadas de la ciudad
        let city_lat, city_lng, city_zoom;
        try {
            city_lat = parseFloat(document.getElementById('city_lat').value);
            city_lng = parseFloat(document.getElementById('city_lng').value);
            city_zoom = parseFloat(document.getElementById('city_zoom').value);
        } catch (e) {
            console.warn('No se encontraron coordenadas de ciudad, usando valores por defecto');
            city_lat = 40.4178698;
            city_lng = -3.7196227;
            city_zoom = 12;
        }
        
        // Crear el mapa
        const mapElement = document.getElementById('map');
        if (!mapElement) {
            console.error('Elemento #map no encontrado');
            return;
        }
        
        window.map = new google.maps.Map(mapElement, {
            center: { lat: city_lat, lng: city_lng },
            zoom: city_zoom,
            mapId: 'iamoving_map'
        });
        
        console.log('Mapa creado,,,,,, creando markers...');
        
        // Reiniciar arrays
        window.markerDB = [];
        window.advancedMarkers.clear();
        
        // Crear markers
        createMarkers();
        
        // Configurar autocomplete
        setupAutocomplete();
        
        // Configurar eventos de propiedades
        setupPropertyEvents();
        
        console.log('Mapa inicializado correctamente');
        
    } catch (error) {
        console.error('Error en initializeMap:', error);
    }
}

function createMarkers() {
    // Limpiar markers existentes
    clearAllMarkers();
    
    // Verificar datos
    if (!window.cardData || !Array.isArray(window.cardData)) {
        console.warn('No hay datos de propiedades o no es un array');
        return;
    }
    
    console.log('Creando markers para', window.cardData.length, 'propiedades');
    
    // Crear un marker para cada propiedad válida
    window.cardData.forEach((item) => {
        if (!item || !item.latitud || !item.longitud) {
            return; // Saltar propiedades sin coordenadas
        }
        
        try {
            const position = { 
                lat: parseFloat(item.latitud), 
                lng: parseFloat(item.longitud) 
            };
            
            if (isNaN(position.lat) || isNaN(position.lng)) {
                console.warn('Coordenadas inválidas para propiedad', item.id);
                return;
            }
            
            // Determinar qué tipo de marker usar
            createMarkerForProperty(item, position);
            
        } catch (error) {
            console.error('Error creando marker para propiedad', item.id, ':', error);
        }
    });
}

function createMarkerForProperty(item, position) {
    // Configurar propiedades del marker
    const markerProperties = {
        store_id: item.id,
        bgImage: (item.path_image_primary || 'default') + "_444x250.jpg",
        propertyType: getPropertyType(item),
        road: item.road || '',
        beds: item.bedrooms || 0,
        size: item.square_meters || 0,
        bathrooms: item.bathrooms || 0,
        price: item.propiedad_precio ? 
            "€ " + parseInt(item.propiedad_precio).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : 
            "Consultar"
    };
    
    let marker;
    
    // Intentar usar AdvancedMarkerElement (nueva API)
    if (google.maps.marker && google.maps.marker.AdvancedMarkerElement) {
        const pinElement = document.createElement("div");
        pinElement.className = "custom-pin";
        pinElement.innerHTML = `
            <div style="
                background-image: url('${DESARROLLO_URL}');
                background-size: cover;
                width: 40px;
                height: 40px;
                cursor: pointer;
            " title="Ref. ${item.id}"></div>
        `;
        
        marker = new google.maps.marker.AdvancedMarkerElement({
            map: window.map,
            position: position,
            content: pinElement,
            title: `Referencia ${item.id} - ${markerProperties.road}`
        });
    } else {
        // Usar Marker legacy
        marker = new google.maps.Marker({
            map: window.map,
            position: position,
            icon: {
                url: DESARROLLO_URL,
                scaledSize: new google.maps.Size(40, 40)
            },
            title: `Referencia ${item.id} - ${markerProperties.road}`
        });
    }
    
    // Añadir propiedades personalizadas
    Object.assign(marker, markerProperties);
    
    // Evento click
    marker.addListener('click', () => {
        handleMarkerClick(marker);
    });
    
    // Guardar referencia
    window.markerDB.push(marker);
    window.advancedMarkers.set(item.id, marker);
}
/*
function setupAutocomplete() {
    const input = document.getElementById('pac-input');
    if (!input || !window.map) {
        console.warn('Campo de búsqueda o mapa no encontrado');
        return;
    }
    
    // Verificar si la nueva API está disponible
    if (window.google && google.maps && google.maps.places && 
        google.maps.places.PlaceAutocompleteElement) {
        
        console.log('Usando nueva API PlaceAutocompleteElement');
        setupNewAutocomplete(input);
    } else {
        console.log('Usando API legacy Autocomplete');
        setupLegacyAutocomplete(input);
    }
}

function setupNewAutocomplete(inputElement) {
    try {
        // Crear contenedor para el autocomplete
        const autocompleteContainer = document.createElement('div');
        autocompleteContainer.style.margin = '15px';
        autocompleteContainer.style.width = '300px';
        
        // Crear el elemento de autocomplete usando la nueva API
        // PlaceAutocompleteElement NO acepta 'fields' ni 'componentRestrictions' como opciones
        const autocomplete = new google.maps.places.PlaceAutocompleteElement({
            // Solo opciones válidas para PlaceAutocompleteElement
            placeholder: '¿Dónde quieres vivir?'
        });
        
        // Aplicar estilos al input del autocomplete
        autocomplete.style.width = '100%';
        
        // Añadir al contenedor
        autocompleteContainer.appendChild(autocomplete);
        
        // Añadir al mapa (posición TOP_LEFT)
        window.map.controls[google.maps.ControlPosition.TOP_LEFT].push(autocompleteContainer);
        
        // Ocultar el input original ya que usamos el del PlaceAutocompleteElement
        inputElement.style.display = 'none';
        
        // Evento cuando se selecciona un lugar
        autocomplete.addEventListener('gmp-placeselect', async ({ place }) => {
            try {
                // Esperar a que se carguen los detalles del lugar
                await place.fetchFields({
                    fields: ['displayName', 'location', 'viewport']
                });
                
                if (!place.location) {
                    console.log("Lugar sin ubicación válida");
                    return;
                }
                
                // Mover mapa al lugar
                if (place.viewport) {
                    window.map.fitBounds(place.viewport);
                } else {
                    window.map.setCenter(place.location);
                    window.map.setZoom(15);
                }
                
                // Filtrar propiedades por distancia
                filterPropertiesByLocation(place.location);
                
            } catch (error) {
                console.error('Error al procesar el lugar seleccionado:', error);
            }
        });
        
        console.log('PlaceAutocompleteElement configurado correctamente');
        
    } catch (error) {
        console.error('Error configurando nueva API de autocomplete:', error);
        // Fallback a la API legacy
        setupLegacyAutocomplete(inputElement);
    }
}
*/

function setupAutocomplete() {
    const input = document.getElementById('pac-input');
    if (!input || !window.map) {
        console.warn('Campo de búsqueda o mapa no encontrado');
        return;
    }
    
    // Verificar si la nueva API está disponible
    if (typeof google !== 'undefined' && 
        google.maps && 
        google.maps.places && 
        google.maps.places.PlaceAutocompleteElement) {
        
        console.log('Usando nueva API PlaceAutocompleteElement');
        setupNewAutocomplete(input);
    } else {
        console.log('PlaceAutocompleteElement no disponible, usando API legacy');
        setupLegacyAutocomplete(input);
    }
}

function setupNewAutocomplete(inputElement) {
    try {
        // Ocultar el input original del HTML
        inputElement.style.display = 'none';
        
        // Crear el elemento de autocomplete (es un Web Component)
        const autocompleteElement = document.createElement('gmp-place-autocomplete');
        
        // NO usar 'new' con PlaceAutocompleteElement, es un custom element
        // Configurar atributos del elemento
        autocompleteElement.setAttribute('placeholder', '¿Dónde quieres vivir?');
        
        // Aplicar estilos
        autocompleteElement.style.width = '300px';
        autocompleteElement.style.margin = '15px';
        
        // Crear contenedor
        const controlDiv = document.createElement('div');
        controlDiv.appendChild(autocompleteElement);
        
        // Añadir al mapa
        window.map.controls[google.maps.ControlPosition.TOP_LEFT].push(controlDiv);
        
        // Evento cuando se selecciona un lugar
        autocompleteElement.addEventListener('gmp-placeselect', async (event) => {
            try {
                const place = event.place;
                
                if (!place) {
                    console.log("No se obtuvo información del lugar");
                    return;
                }
                
                // Obtener los detalles del lugar
                await place.fetchFields({
                    fields: ['displayName', 'location', 'viewport', 'formattedAddress']
                });
                
                console.log('Lugar seleccionado:', place.displayName);
                
                if (!place.location) {
                    console.log("Lugar sin ubicación válida");
                    return;
                }
                
                // Mover mapa al lugar
                if (place.viewport) {
                    window.map.fitBounds(place.viewport);
                } else {
                    window.map.setCenter(place.location);
                    window.map.setZoom(15);
                }
                
                // Filtrar propiedades por distancia
                filterPropertiesByLocation(place.location);
                
            } catch (error) {
                console.error('Error al procesar el lugar seleccionado:', error);
            }
        });
        
        // Limpiar filtros cuando se borra la búsqueda
        const autocompleteInput = autocompleteElement.querySelector('input');
        if (autocompleteInput) {
            autocompleteInput.addEventListener('input', () => {
                if (!autocompleteInput.value) {
                    clearFilters();
                }
            });
        }
        
        console.log('PlaceAutocompleteElement configurado correctamente');
        
    } catch (error) {
        console.error('Error configurando nueva API de autocomplete:', error);
        // Mostrar el input original y usar fallback
        inputElement.style.display = 'block';
        setupLegacyAutocomplete(inputElement);
    }
}

function setupLegacyAutocomplete(inputElement) {
    try {
        // API legacy (con warning pero funcional)
        const autocomplete = new google.maps.places.Autocomplete(inputElement, {
            types: ['geocode'],
            componentRestrictions: { country: 'es' },
            fields: ['geometry', 'name', 'formatted_address']
        });
        
        // Añadir al mapa
        inputElement.style.display = 'block';
        inputElement.style.margin = '15px';
        window.map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputElement);
        
        // Evento cuando se selecciona un lugar
        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();
            
            if (!place.geometry) {
                console.log("Lugar sin geometría:", place.name);
                return;
            }
            
            // Mover mapa al lugar
            if (place.geometry.viewport) {
                window.map.fitBounds(place.geometry.viewport);
            } else {
                window.map.setCenter(place.geometry.location);
                window.map.setZoom(15);
            }
            
            // Filtrar propiedades por distancia
            filterPropertiesByLocation(place.geometry.location);
        });
        
        // Limpiar filtros cuando se borra la búsqueda
        inputElement.addEventListener('input', () => {
            if (!inputElement.value) {
                clearFilters();
            }
        });
        
        console.log('Autocomplete legacy configurado correctamente');
        
    } catch (error) {
        console.error('Error configurando API legacy de autocomplete:', error);
    }
}

function filterPropertiesByLocation(location) {
    if (!window.cardData.length || !window.map) return;
    
    let placeLat, placeLng;
    
    // Manejar diferentes tipos de objetos de ubicación
    if (typeof location.lat === 'function' && typeof location.lng === 'function') {
        // API legacy: location.lat() y location.lng()
        placeLat = location.lat();
        placeLng = location.lng();
    } else if (typeof location.lat === 'number' && typeof location.lng === 'number') {
        // Nueva API: location.lat y location.lng son números
        placeLat = location.lat;
        placeLng = location.lng;
    } else if (location.lat && location.lng) {
        // Puede ser un objeto con propiedades lat/lng
        placeLat = typeof location.lat === 'function' ? location.lat() : location.lat;
        placeLng = typeof location.lng === 'function' ? location.lng() : location.lng;
    } else {
        console.error('Formato de ubicación no reconocido:', location);
        return;
    }
    
    console.log('Filtrando propiedades desde:', placeLat, placeLng);
    
    let propertyCount = 0;
    
    window.cardData.forEach((item) => {
        if (!item.latitud || !item.longitud) return;
        
        const distancia = getDistanceFromLatLonInKm(
            placeLat, 
            placeLng, 
            parseFloat(item.latitud), 
            parseFloat(item.longitud)
        );
        
        const cardElement = document.getElementById(`box_${item.id}`);
        const marker = window.advancedMarkers.get(item.id);
        
        const shouldShow = distancia <= 0.5; // Mostrar si está dentro de 500m
        
        if (shouldShow) propertyCount++;
        
        if (cardElement) {
            cardElement.style.display = shouldShow ? '' : 'none';
        }
        
        if (marker) {
            marker.setMap(shouldShow ? window.map : null);
        }
    });
    
    console.log(`Mostrando ${propertyCount} propiedades dentro de 500m`);
}

function clearFilters() {
    if (!window.map) return;
    
    // Mostrar todas las propiedades
    window.cardData.forEach((item) => {
        const cardElement = document.getElementById(`box_${item.id}`);
        if (cardElement) {
            cardElement.style.display = '';
        }
        
        const marker = window.advancedMarkers.get(item.id);
        if (marker) {
            marker.setMap(window.map);
        }
    });
    
    // Restaurar zoom original
    const city_zoom = parseFloat(document.getElementById('city_zoom').value) || 12;
    window.map.setZoom(city_zoom);
}

function setupPropertyEvents() {
    // Usar event delegation para propiedades dinámicas
    document.addEventListener('click', (event) => {
        const propertyElement = event.target.closest('.inmueble');
        if (!propertyElement) return;
        
        const propertyId = propertyElement.id;
        if (!propertyId || !propertyId.startsWith('box_')) return;
        
        const id = propertyId.replace('box_', '');
        const marker = window.advancedMarkers.get(parseInt(id));
        
        if (marker) {
            handleMarkerClick(marker);
            
            // Scroll suave
            if (!isMobile()) {
                propertyElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    });
}

function handleMarkerClick(marker) {
    if (!marker) return;
    
    // Deseleccionar todos los markers
    window.markerDB.forEach(m => {
        if (m !== marker) {
            updateMarkerAppearance(m, false);
        }
    });
    
    // Seleccionar este marker
    updateMarkerAppearance(marker, true);
    
    // Mostrar información en móvil
    if (isMobile()) {
        showMobilePropertyInfo(marker);
    }
}

function updateMarkerAppearance(marker, isSelected) {
    if (!marker) return;
    
    const iconUrl = isSelected ? SELECTED_URL : DESARROLLO_URL;
    
    // Para AdvancedMarkerElement
    if (marker.content) {
        const pinElement = marker.content.querySelector('div');
        if (pinElement) {
            pinElement.style.backgroundImage = `url('${iconUrl}')`;
        }
    } 
    // Para Marker legacy
    else if (marker.setIcon) {
        marker.setIcon({
            url: iconUrl,
            scaledSize: new google.maps.Size(40, 40)
        });
    }
    
    // Actualizar clase CSS de la propiedad
    const propertyElement = document.getElementById(`box_${marker.store_id}`);
    if (propertyElement) {
        if (isSelected) {
            propertyElement.classList.add('box_selected');
        } else {
            propertyElement.classList.remove('box_selected');
        }
    }
}

function showMobilePropertyInfo(marker) {
    const infoBox = document.getElementById('property_floating_box');
    if (!infoBox) return;
    
    // Actualizar contenido
    document.getElementById('property_title').innerHTML = `
        <h5><a href='/anuncio/${marker.store_id}' style='font-size:14px;'>
            Referencia ${marker.store_id}
        </a></h5>
        <p style='font-size:12px;'>
            <i class='fa fa-map-marker'></i> ${marker.road || ''}
        </p>
        <p style='font-size:12px;'>${marker.price || ''}</p>
    `;
    
    document.getElementById('property_img').src = "/storage/" + marker.bgImage;
    document.getElementById('property_type').innerHTML = 
        `<span><i class='fa fa-check-square' /> ${marker.propertyType || ''}</span>`;
    document.getElementById('property_beds').innerHTML = 
        `<i class='fas fa-bed' /> Dormitorios: ${marker.beds || 0}`;
    document.getElementById('property_size').innerHTML = 
        `<p><i class='fa fa-th-large'></i> ${marker.size || 0}m<sup>2</sup></p>`;
    document.getElementById('property_bathrooms').innerHTML = 
        `<p><i class='fa fa-bath'></i> Baños: ${marker.bathrooms || 0}</p>`;
    document.getElementById('uri_property').href = '/anuncio/' + marker.store_id;
    
    // Mostrar
    infoBox.style.display = "flex";
    
    // Scroll al mapa
    document.getElementById('map')?.scrollIntoView({ behavior: 'smooth' });
}

function clearAllMarkers() {
    window.markerDB.forEach(marker => {
        if (marker.setMap) {
            marker.setMap(null);
        }
    });
    
    window.markerDB = [];
    window.advancedMarkers.clear();
}

// Función para recargar markers desde Vue
window.reload_makers = function(results) {
    console.log('Recargando markers...');
    
    if (results && Array.isArray(results)) {
        window.cardData = results;
        createMarkers();
    } else {
        console.warn('Datos inválidos para recargar markers');
    }
};

// Utilidades
function getPropertyType(item) {
    if (item.estudio == '1') return 'Estudio';
    if (item.apartamento == '1') return 'Apartamento';
    if (item.chalet == '1') return 'Chalet';
    if (item.loft == '1') return 'Loft';
    if (item.piso == '1') return 'Piso';
    if (item.bajo == '1') return 'Bajo';
    if (item.atico == '1') return 'Ático';
    return 'Propiedad';
}

function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

function deg2rad(deg) {
    return deg * (Math.PI / 180);
}

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = deg2rad(lat2 - lat1);
    const dLon = deg2rad(lon2 - lon1);
    const a = 
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}