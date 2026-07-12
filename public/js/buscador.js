function initMap() {
  // Comprueba si el objeto google está definido
  if (typeof google === 'undefined') {
    console.error('Google Maps API no se ha cargado correctamente');
    return;
  }    
    // This example adds a search box to a map, using the Google Place Autocomplete
          // feature. People can enter geographical searches. The search box will return a
          // pick list containing a mix of places and predicted search terms.
    
          // This example requires the Places library. Include the libraries=places
          // parameter when you first load the API. For example:
          // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    var map;
    var makekDB = [];
    var desarrollo="https://www.iamoving.com/img/marker.ico";
    var selected="https://www.iamoving.com/img/selected.ico";
    var cardData = data;
    
    //import Vue from 'vue';
    //import App from './app.vue';
    
    //const app = new Vue(App);
    
    function refreshIcons(id) {
        for (var i = 0; i < makekDB.length; i++) {
            if(makekDB[i].get('store_id')!=id) {
                makekDB[i].setIcon(desarrollo);
                makekDB[i].setAnimation(null);
                $("#box_"+ makekDB[i].get('store_id')).removeClass("box_selected");
            }
        }
    }
    
    $(document).ready(function(){
    
    //    var map;
    //    var makekDB = [];
        
        var lat="";
        var log="";
        var producion="https://www.iamoving.com/img/selected.ico";
    //    var desarrollo="https://www.iamoving.com/img/marker.ico"
    //    var selected="https://www.iamoving.com/img/selected.ico";
        var initial = 0;
    
        $('.inmueble').click(function() {
            //console.log("Clicked");
            //console.log($(this).attr('id'));
    
            var id = $(this).attr('id').split("_")[1];
            refreshIcons(id);
    
    
            for (var i = 0; i < makekDB.length; i++) {
                if(makekDB[i].get('store_id')==id){
                    google.maps.event.trigger(makekDB[i], 'click');
                }
            }
    
            $('body,html').animate({
                scrollTop : 80
            }, 500);
        });
    
        function initAutocomplete() {
            //// coordenadas de usuario
            /// ubicacion siempre madrid
            console.log("LOCATION");
            let city_lat = parseFloat(document.getElementById('city_lat').value);
            let city_lng = parseFloat(document.getElementById('city_lng').value);
            let city_zoom = parseFloat(document.getElementById('city_zoom').value);
            console.log(city_lat);
            console.log(city_lng);
            console.log(city_zoom);
            map = new google.maps.Map(document.getElementById('map'), {
                //center: {lat: 40.4178698, lng: -3.7196227},
                //zoom: 12
                center: {lat: city_lat, lng: city_lng},
                zoom: city_zoom
            });
    
            //// positions makers DB aimoving  data de blade @json(data)
            data.forEach((item) => {
                
                if(item.propiedad_precio) {
                    console.log(item)
                    var property_type = '';
                    if(item.estudio=='1'){
                        property_type = 'Estudio';
                    }
                    if(item.apartamento=='1'){
                        property_type = 'Apartamento';
                    }
                    if(item.chalet=='1'){
                        property_type = 'Chalet';
                    }
                    if(item.loft=='1'){
                        property_type = 'Loft';
                    }
                    if(item.piso=='1'){
                        property_type = 'Piso';
                    }
                    if(item.bajo=='1'){
                        property_type = 'Bajo';
                    }
                    if(item.atico=='1'){
                        property_type = 'Ático';
                    }
                    
                    var fdate = new Date(item.fecha_de_alta);
                    console.log(property_type)
                    
                    var makek= new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(item.latitud), parseFloat(item.longitud)),
                        map: map,
                        icon: desarrollo,
                        store_id: item.id,
                        animation: null,
                        bgImage: item.path_image_primary + "_444x250.jpg",
                        propertyType: property_type,
                        isSale: item.is_sale == '1',
                        propertyDesc: property_type + " en " + (item.is_sale == '1' ? ' venta' : 'alquiler'),
                        price: item.price ? "€ " + item.price : "",
                        since: 'Disponible desde ' + fdate.toDateString(),
                        road: item.road,
                        beds: item.bedrooms,
                        size: item.square_meters,
                        bathrooms: item.bathrooms
                        
                    });
                    /*makek._infowindow = new google.maps.InfoWindow({
                        content: "<b>" + parseInt(item.propiedad_precio).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " &euro;</b>"
                    });*/
                    google.maps.event.addListener(makek, 'click', function() {
                        //console.log("click marker");
      //                  this._infowindow.open(map, this);
                        refreshIcons(this.get('store_id'));
    
                        //if ($(window).width() < 640) {
                        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                            $("#property_floating_box").css("display", "flex");
                            const divMap = document.getElementById('map');
                            let pTitle = "<h5><a href='/anuncio/"+ this.get('store_id') + "' style='font-size:14px;'>Referencia " + this.get('store_id') + "</a></h5>";
                            pTitle += "<p style='font-size:12px;'><i class='fa fa-map-marker'></i> " + this.get('road') + "</p>";
                            if(this.get('price')){
                                pTitle += "<p style='font-size:12px;'>" + this.get('price') + "</p>";
                            }
                            
                            $("#property_title").html(pTitle);
                            $("#property_img").attr("src","/storage/"+ this.get('bgImage'));
                            
                            let propertyType = "<span><i class='fa fa-check-square' /> "+ this.get('propertyType') +"</span>"
                             
                            $("#property_type").html(propertyType);
                            
                            let propertyBeds = "<i class='fas fa-bed' /> Dormitorios: " + this.get('beds') + "</p>";
                            $("#property_beds").html(propertyBeds);
                            
                            let propertySize= "<p><i class='fa fa-th-large'></i> "+ this.get('size') + "m<sup>2</sup></p>";
                            
                            $("#property_size").html(propertySize);
                            
                            let propertyBathrooms= "<p><i class='fa fa-bath'></i> Baños:"+ this.get('bathrooms') + "</p>";
                            
                            $("#property_bathrooms").html(propertyBathrooms);
                            //$("#property_price").html(this.get('price'));
                            $("#uri_property").attr('href','/anuncio/'+ this.get('store_id'))
                            divMap.scrollIntoView();
                        }
    
                        //console.log("Animation");
                        //console.log(this.getAnimation());
                        if (this.getAnimation() !== null) {
                            //alert('01');
                            this.setAnimation(null);
                        } else {
                            //alert('11');//paso por aqui a la primera
                            this.setIcon(selected);
                            this.setAnimation(google.maps.Animation.BOUNCE);
                            $("#box_"+ this.get('store_id')).addClass("box_selected");
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )                     
     {
     }
     else
     {
    					   $("#box_"+ this.get('store_id')).prependTo("#card_container");
    						var target = $("#box_"+ this.get('store_id'));
    						var topPadding = 0, // padding-top in px
                        speed = 1, // X px per ms
                        currentLocation = $(window).scrollTop(),
                        targetLocation = target.offset().top - topPadding,
                        distance = Math.abs(currentLocation - targetLocation),
                        time = distance / speed;
    					//alert(targetLocation);
                //$("#filter").animate({scrollTop: targetLocation}, time);
    			//alert(currentLocation);
    			//alert(targetLocation);
    					var target2 = $("#card_container");
    					var targetLocation2 = target2.offset().top;
    					//alert(targetLocation2);
    					var target3 = $("#masfiltros");
    					var targetLocation3 = target3.offset().top;
    					//alert(targetLocation3);
    					var target4 = $("#filter");
    					var targetLocation4 = target4.offset().top;
    					//alert(targetLocation4);		
    						var diferencia =Math.abs(targetLocation-targetLocation3)
    						if (diferencia>900)
    						{
    							$("#filter").animate({scrollTop: 1100}, 0);
    						}
    						else
    						{
    							$("#filter").animate({scrollTop: 300}, 0);
    						}
     }
                        }
                    });
                    // open marker on load
                    //google.maps.event.trigger(makek, 'click');
    
                    makekDB.push(makek);
                }
            });
    
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
    
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
    
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
    
                if (places.length == 0) {
                    return;
                }
                
    
                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
    
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        //console.log("Returned place contains no geometry");
                        return;
                    }
                    console.log("PLACE");
                    var placeLatitude = place.geometry.location.lat();
                    var placeLongitude = place.geometry.location.lng();  
                    
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
    
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        //icon: producion,
                        title: place.name,
                        position: place.geometry.location,
                        animation:null
                    }));
    
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                    for(var i=0;i<cardData.length;i++){
                        var distancia = getDistanceFromLatLonInKm(placeLatitude,placeLongitude,cardData[i].latitud,cardData[i].longitud);
                        if(distancia > 0.5){
                            var cardId = "#box_" + cardData[i].id;
                            $(cardId).hide();
                        }
                    }
                });
                map.fitBounds(bounds);
            });
        }
    
        initAutocomplete();
        
        $('input[type=search]').on('search', function () {
            for(var i=0;i<cardData.length;i++){
                var cardId = "#box_" + cardData[i].id;
                $(cardId).show();
            }
            let city_zoom = parseFloat(document.getElementById('city_zoom').value);
            map.setZoom(city_zoom);
        });
    });
    
    $.fn.scrollBottom = function() { 
        return $(document).height() - this.scrollTop() - this.height(); 
    };
    
    
    function reload_makers(results) {
        for (var i = 0; i < makekDB.length; i++) {
            makekDB[i].setMap(null);
        }
        makekDB = [];
    
        results.forEach((item)=>{
            var makek= new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(item.latitud), parseFloat(item.longitud)),
                map: map,
                icon: desarrollo,
                store_id: item.id,
                animation:null
            });
            /*makek._infowindow = new google.maps.InfoWindow({
                content: "<b>" + parseInt(item.propiedad_precio).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " &euro;</b>"
            });*/
            google.maps.event.addListener(makek, 'click', function() {
                //alert('0'); //paso por aqui
              //  this._infowindow.open(map, this);
                refreshIcons(this.get('store_id'));
                if (this.getAnimation() !== null) {
                    this.setAnimation(null);
                } else {
                    //alert('1');//paso por aqui
                    this.setIcon(selected);
                    this.setAnimation(google.maps.Animation.BOUNCE);
                    $("#box_"+ this.get('store_id')).addClass("box_selected");
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )                    
     {
     }
     else
     {				
                    $("#box_"+ this.get('store_id')).prependTo("#card_container");
    				var target = $("#box_"+ this.get('store_id'));
    				var topPadding = 0, // padding-top in px
                        speed = 1, // X px per ms
                        currentLocation = $(window).scrollTop(),
                        targetLocation = target.offset().top - topPadding,
                        distance = Math.abs(currentLocation - targetLocation),
                        time = distance / speed;
    					//alert(targetLocation);
    					//$("#filter").animate({scrollTop: targetLocation}, time);
    					//alert(currentLocation);
    					//alert(targetLocation);
    					var target2 = $("#card_container");
    					var targetLocation2 = target2.offset().top;
    					//alert(targetLocation2);
    					var target3 = $("#masfiltros");
    					var targetLocation3 = target3.offset().top;
    					//alert(targetLocation3);
    					var target4 = $("#filter");
    					var targetLocation4 = target4.offset().top;
    					//alert(targetLocation4);		
    						var diferencia =Math.abs(targetLocation-targetLocation3)
    						if (diferencia>900)
    						{
    							$("#filter").animate({scrollTop: 1100}, 0);
    						}
    						else
    						{
    							$("#filter").animate({scrollTop: 300}, 0);
    						}
     }
                        }
            });
            // open marker on load
            //google.maps.event.trigger(makek, 'click');
            makekDB.push(makek);
        });
    }
    
    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }
    
    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(lat2-lat1);  // deg2rad below
      var dLon = deg2rad(lon2-lon1); 
      var a = 
        Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLon/2) * Math.sin(dLon/2)
        ; 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c; // Distance in km
      return d;
    }

}

// Asegúrate de que initMap esté disponible globalmente
window.initMap = initMap;