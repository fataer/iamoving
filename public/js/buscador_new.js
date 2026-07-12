// ============================================
// BUSCADOR_NEW.JS - VERSIÓN COMPLETA Y CORREGIDA
// ============================================

// ============================================
// 1. DEFINIR FUNCIONES AUXILIARES
// ============================================v6
// Construye el nombre del thumbnail de forma consistente,
// venga el path con extensión (.jpg/.jpeg) o sin ella
function buildThumbName(raw) {
    if (!raw) return "";
    var clean = raw.replace(/\.jpe?g$/i, ""); // quita .jpg o .jpeg final si existe
    return clean + "_444x250.jpg";
}
// Función para obtener el tipo de propiedad
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

// Función para refrescar iconos (global)
function refreshIconsGlobal(id) {
    if (!window.makekDB) return;
    
    for (var i = 0; i < window.makekDB.length; i++) {
        if (window.makekDB[i].get('store_id') != id) {
            window.makekDB[i].setIcon("https://www.iamoving.com/img/icono.ico");
            window.makekDB[i].setAnimation(null);
            $("#box_"+ window.makekDB[i].get('store_id')).removeClass("box_selected");
        }
    }
}

// ============================================
// 2. FUNCIÓN PARA MOSTRAR POPUP EN MÓVIL
// ============================================
function showMobilePopup(marker) {
    console.log("📱 Mostrando popup móvil para referencia:", marker.get('store_id'));
    
    const infoBox = document.getElementById('property_floating_box');
    if (!infoBox) {
        console.warn("⚠️ #property_floating_box no encontrado");
        return;
    }
    
    // Obtener datos del marker
    const storeId = marker.get('store_id');
    const road = marker.get('road') || '';
    const price = marker.get('price') || '';
    const bgImage = marker.get('bgImage') || '';
    const propertyType = marker.get('propertyType') || '';
    const beds = marker.get('beds') || 0;
    const size = marker.get('size') || 0;
    const bathrooms = marker.get('bathrooms') || 0;
    
    // Actualizar contenido del popup
    let pTitle = "<h5><a href='/anuncio/"+ storeId + "' style='font-size:14px; color: #1a73e8;'>Referencia " + storeId + "</a></h5>";
    pTitle += "<p style='font-size:12px; margin-bottom: 4px;'><i class='fa fa-map-marker'></i> " + road + "</p>";
    if (price) {
        pTitle += "<p style='font-size:14px; font-weight: 600; color: #1a73e8; margin-bottom: 0;'>" + price + "</p>";
    }
    
    // Actualizar los elementos del popup
    const titleElement = document.getElementById('property_title');
    if (titleElement) {
        titleElement.innerHTML = pTitle;
    }
    
    // Imagen
    const imgElement = document.getElementById('property_img');
    /*if (imgElement && bgImage) {
        imgElement.src = "/storage/" + bgImage;
        imgElement.alt = "Referencia " + storeId;
    }*/
if (imgElement) {
    imgElement.src = bgImage ? "/storage/" + bgImage : "/img/no-image.jpg";
    imgElement.alt = "Referencia " + storeId;
}    
    
    // Tipo de propiedad
    const typeElement = document.getElementById('property_type');
    if (typeElement) {
        typeElement.innerHTML = "<span><i class='fa fa-check-square' style='color: #1a73e8;'></i> " + propertyType + "</span>";
    }
    
    // Dormitorios
    const bedsElement = document.getElementById('property_beds');
    if (bedsElement) {
        bedsElement.innerHTML = "<i class='fas fa-bed' style='color: #1a73e8;'></i> Dormitorios: " + beds;
    }
    
    // Tamaño
    const sizeElement = document.getElementById('property_size');
    if (sizeElement) {
        sizeElement.innerHTML = "<p style='margin-bottom: 0;'><i class='fa fa-th-large' style='color: #1a73e8;'></i> " + size + " m<sup>2</sup></p>";
    }
    
    // Baños
    const bathroomsElement = document.getElementById('property_bathrooms');
    if (bathroomsElement) {
        bathroomsElement.innerHTML = "<p style='margin-bottom: 0;'><i class='fa fa-bath' style='color: #1a73e8;'></i> Baños: " + bathrooms + "</p>";
    }
    
    // Enlace del popup
    const uriElement = document.getElementById('uri_property');
    if (uriElement) {
        uriElement.href = '/anuncio/' + storeId;
    }
    
    // Mostrar el popup
    infoBox.style.display = "flex";
    
    // Scroll al mapa
    const mapElement = document.getElementById('map');
    if (mapElement) {
        mapElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

// ============================================
// 3. EXPONER reload_makers GLOBALMENTE
// ============================================
window.reload_makers = function(results) {
    console.log("🔄 reload_makers llamado con", results ? results.length : 0, "propiedades");

    // ✅ Evitar ejecutar antes de que Google Maps esté cargado (evita los "google is not defined")
    /*if (typeof google === 'undefined' || !google.maps) {
        console.log("⏳ Google Maps aún no cargado; se omite (se reintentará al iniciar el mapa).");
        return;
    }*/
    // ✅ Evitar ejecutar antes de que Google Maps Y SUS CLASES estén listas.
    // Con loading=async, google.maps puede existir aún sin LatLng/Marker cargados.
    if (typeof google === 'undefined' || !google.maps ||
        typeof google.maps.LatLng !== 'function' ||
        typeof google.maps.Marker !== 'function') {
        console.log("⏳ Google Maps aún no listo; se omite (se reintentará al iniciar el mapa).");
        return;
    }

    if (!window.map) {
        console.error("❌ window.map no está definido");
        return;
    }
    
    // Limpiar markers existentes
    if (window.makekDB && window.makekDB.length > 0) {
        console.log("🧹 Limpiando", window.makekDB.length, "markers existentes");
        window.makekDB.forEach(marker => {
            if (marker && marker.setMap) {
                marker.setMap(null);
            }
        });
        window.makekDB = [];
    }
    
    if (!results || results.length === 0) {
        console.log("📭 No hay resultados para mostrar en el mapa");
        return;
    }
    
    console.log("📌 Creando", results.length, "nuevos markers");
    
    // Crear nuevos markers
    results.forEach((item) => {
        if (!item.latitud || !item.longitud) {
            return;
        }
        
        try {
            var makek = new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(item.latitud), parseFloat(item.longitud)),
                map: window.map,
                icon: "https://www.iamoving.com/img/icono.ico",
                store_id: item.id,
                animation: null,
                bgImage: buildThumbName(item.path_image_primary),
                propertyType: getPropertyType(item),
                isSale: item.is_sale == '1',
                price: item.propiedad_precio ? "€ " + parseInt(item.propiedad_precio).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : "",
                road: item.road || "",
                beds: item.bedrooms || 0,
                size: item.square_meters || 0,
                bathrooms: item.bathrooms || 0
            });
            
            google.maps.event.addListener(makek, 'click', function() {
                console.log("🖱️ Click en marker:", this.get('store_id'));
                refreshIconsGlobal(this.get('store_id'));
                
                // Mostrar popup en móvil
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    showMobilePopup(this);
                }
                
                if (this.getAnimation() !== null) {
                    this.setAnimation(null);
                } else {
                    this.setIcon("https://www.iamoving.com/img/iconob.ico");
                    this.setAnimation(google.maps.Animation.BOUNCE);
                    $("#box_"+ this.get('store_id')).addClass("box_selected");

                    // ✅ Escritorio: la tarjeta NO sube arriba (se queda en su orden),
                    // pero desplazamos el scroll de la lista para dejarla centrada a la vista.
                    /*if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                        var $container = $("#card_scroll");
                        var $card = $("#box_" + this.get('store_id'));
                        if ($container.length && $card.length) {
                            var delta = ($card.offset().top - $container.offset().top)
                                      - ($container.height() / 2) + ($card.outerHeight(true) / 2);
                            $container.animate({ scrollTop: $container.scrollTop() + delta }, 400);
                        }
                    }*/
                    if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                        var card = document.getElementById("box_" + this.get('store_id'));
                        if (card && card.scrollIntoView) {
                            card.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
                        }
                    }                    
                }
            });
            
            if (!window.makekDB) {
                window.makekDB = [];
            }
            window.makekDB.push(makek);
            
        } catch (error) {
            console.error("Error creando marker para propiedad", item.id, ":", error);
        }
    });
    
    console.log("✅ Marcadores creados:", window.makekDB.length);
};

// ============================================
// 4. FUNCIÓN PARA LIMPIAR MARKERS
// ============================================
window.clearAllMarkers = function() {
    if (window.makekDB && window.makekDB.length > 0) {
        window.makekDB.forEach(marker => {
            if (marker && marker.setMap) {
                marker.setMap(null);
            }
        });
        window.makekDB = [];
    }
};


// ============================================
// 6. FUNCIONES DE UTILIDAD
// ============================================

// Función para calcular distancia
function deg2rad(deg) {
    return deg * (Math.PI/180);
}

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    var R = 6371;
    var dLat = deg2rad(lat2-lat1);
    var dLon = deg2rad(lon2-lon1);
    var a = 
        Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLon/2) * Math.sin(dLon/2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c;
    return d;
}

// ============================================
// 7. EXPONER FUNCIONES GLOBALMENTE
// ============================================
window.reload_makers = window.reload_makers;
window.clearAllMarkers = window.clearAllMarkers;
window.getPropertyType = getPropertyType;
window.refreshIconsGlobal = refreshIconsGlobal;
window.showMobilePopup = showMobilePopup;

console.log("✅ buscador_new.js cargado correctamente");
console.log("📋 window.reload_makers disponible:", typeof window.reload_makers === 'function');