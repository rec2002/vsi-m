$(function() {

	var markers = [], infoWindows = [], map, mark_default = '/img/map/marker_3.png';

	function addMarker(location,name,contentstr,image,draggableVal){
        markers[name] = new google.maps.Marker({
            position: location,
            map: map,
			icon: image,
			draggable:  draggableVal,
        });
        markers[name].setMap(map);
		
		infoWindows[name] = new google.maps.InfoWindow({
			content:contentstr
		});
		
		google.maps.event.addListener(markers[name], 'click', function() {
			infoWindows[name].open(map,markers[name]);
		});

		if(draggableVal){
			google.maps.event.addListener(markers[name], 'dragend', function(marker){
		        var latLng = marker.latLng; 
		        dragMarker(latLng.lat(),latLng.lng());
		    });			
		}

	
    }
	
	function initialize() {
		var $mapCanvas = $('#map-canvas');
		if(!$mapCanvas.length){ return false; }
		var styles = [],
			lat = $mapCanvas.attr("data-lat"),
			lng = $mapCanvas.attr("data-lng"),
			draggableVal = ($mapCanvas.is('[data-draggable]'))?parseInt($mapCanvas.attr('data-draggable'),10):0,
			geoLocationVal = ($mapCanvas.is('[data-geolocation]'))?parseInt($mapCanvas.attr('data-geolocation'),10):0,
			setZoom = parseInt($('#map-canvas').attr("data-zoom")),
			myLatlng = new google.maps.LatLng(lat,lng),
			styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

		draggableVal = (draggableVal == 1);
		
		var mapOptions = {
			scrollwheel: false,
			zoom: setZoom,
			
			panControl: false,
			panControlOptions: {
				position: google.maps.ControlPosition.LEFT_BOTTOM
			},
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE,
				position: google.maps.ControlPosition.LEFT_BOTTOM
			},
			streetViewControl: true,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.LEFT_BOTTOM
			},
			
			center: myLatlng,
			mapTypeControlOptions: {
			  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		
		};
		map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		
		map.mapTypes.set('map_style', styledMap);
  		map.setMapTypeId('map_style');

  		//enable autocomplete
  		if($('#tt-google-autocomplete').length){
  			var input = (document.getElementById('tt-google-autocomplete')),
  				contentstr = $(input).val(),
				autocomplete = new google.maps.places.Autocomplete(input);
       		autocomplete.bindTo('bounds', map);
       		autocomplete.addListener('place_changed', function() {
       			var place = autocomplete.getPlace();
       			if (place.geometry.viewport) {
		            map.fitBounds(place.geometry.viewport);
		        } else {
		            map.setCenter(place.geometry.location);
		            map.setZoom(17);
		        }
		      	mark_name = 'autocomplete-marker';
				for (var marker in markers) {
				    markers[marker].setMap(null);
				}			      
		      	addMarker(place.geometry.location,mark_name,contentstr,mark_default,true);		        
       		});		
  		}

  		//enable geolocation
		if(geoLocationVal){geoLocation();}

		//add markers
		$('.addresses-block a').each(function(){
			var $t = $(this),
				mark_lat = $t.attr('data-lat'),
				mark_lng = $t.attr('data-lng'),
				this_index = $('.addresses-block a').index(this),
				mark_name = 'template_marker_'+this_index,
				mark_locat = new google.maps.LatLng(mark_lat, mark_lng),
				mark_str = $t.attr('data-string'),
				mark_img = $t.attr('data-marker');
				if(!mark_img) mark_img = mark_default;

			addMarker(mark_locat,mark_name,mark_str,mark_img,draggableVal);	
		});
	}

	//geoLocation
	function geoLocation(){
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            },
	        	geoLocationMarker = new google.maps.Marker({
		            position: pos,
		            map: map,
					icon: 'img/map/location.png'
		        });
		    geoLocationMarker.setMap(map);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
        	handleLocationError(false, infoWindow, map.getCenter());
        }		
	}

	//drag marker
	function dragMarker(lat, lng) {
		var latlng = new google.maps.LatLng(lat, lng);
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({'location':latlng}, function(results, status) {
		  	if (status == google.maps.GeocoderStatus.OK || results[0]) {
				$('.tt-map-search-form').find('.simple-input').val(results[0].formatted_address);
		  	} else {
		    	console.log("Geocoder failed due to: " + status);
		  	}
		});
	}

	//map search location
	$('.tt-map-search').on('click', function(e){
		var address = $(this).closest('.tt-map-search-form').find('.simple-input').val(),
			geocoder = new google.maps.Geocoder();
		
		geocoder.geocode({
		    'address': address
		  }, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) {
		      	var Lat = results[0].geometry.location.lat(),
		      		Lng = results[0].geometry.location.lng(),
		      		mark_locat = new google.maps.LatLng(Lat, Lng),
		      		mark_name = 'template_marker_'+address;
				for (var marker in markers) {
				    markers[marker].setMap(null);
				}			      
		      	addMarker(mark_locat,mark_name,address,mark_default,true);
		      	map.setCenter(mark_locat);
		      	map.setZoom(12);
		    } else {
		      	console.log("Something got wrong " + status);
		    }
		});
		e.preventDefault();
	});

	

	$(window).load(function(){
		setTimeout(function(){initialize();}, 500);
	});

});