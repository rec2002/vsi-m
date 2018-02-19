$(function() {

	var markers = [], infoWindows = [], map, mark_default = '/img/map/marker_3.png';

    initialize();

	if ($('#tt-google-single-autocomplete-only').length){


        var input = document.getElementById('tt-google-single-autocomplete-only');
        searchbox = new google.maps.places.Autocomplete(input, {"types":["address"],"componentRestrictions":{"country":"ua"}});
        searchbox.addListener('place_changed', function() {
            var place = searchbox.getPlace();
            if (!place.geometry) {

                $('#tt-google-single-autocomplete-region').val(0);
                return;
            } else{

                map.fitBounds(searchbox.getPlace().geometry.viewport);

                map.setZoom(17);
                addMarker(place.geometry.location, place.name , place.formatted_address,mark_default,true);
                GetRetion(place.formatted_address, input.value);
			}
        });


        if ($('#map-canvas').length && $('#tt-google-single-autocomplete-only').val()!='') $(".tt-map-search").click();


        $('body').on('onblur','input#tt-google-single-autocomplete-only', function() {
            google.maps.event.trigger(searchbox, 'place_changed');
        });

	}


    function GetRetion (adress, adress_input) {

        var region = '';
        var adress_input = adress_input;
        var adress = adress;
        var arr = {
            '1' :  ['Вінницька область', 'Вінниця', 'Вінницька'],
            '2' :  ['Волинська область', 'Луцьк', 'Волинська'],
            '3' :  ['Дніпропетровська область', 'Дніпро', 'Дніпропетровська'],
            '4' :  ['Донецька область', 'Донецьк', 'Донецька'],
            '5' :  ['Житомирська область', 'Житомир', 'Житомирська'],
            '6' :  ['Закарпатська область', 'Ужгород', 'Закарпатська'],
            '7' :  ['Запорізька область', 'Запоріжжя', 'Запорізька'],
            '8' :  ['Івано-Франківська область', 'Івано-Франківськ', 'Івано-Франківська'],
            '9' :  ['Київська область', 'Київ', 'Київська'],
            '10' :  ['Кіровоградська область', 'Кропивницький', 'Кіровоград', 'Кіровоградська'],
            '11' :  ['Луганська область', 'Луганськ', 'Луганська'],
            '12' :  ['Львівська область', 'Львів', 'Львівcька'],
            '13' :  ['Миколаївська область', 'Миколаїв', 'Миколаївська'],
            '14' :  ['Одеська область', 'Одеса', 'Одеська'],
            '15' :  ['Полтавська область', 'Полтава', 'Полтавська'],
            '16' :  ['Рівненська область', 'Рівне', 'Рівненська'],
            '17' :  ['Сумська область', 'Суми', 'Сумська'],
            '18' :  ['Тернопільська область', 'Тернопіль', 'Тернопільська'],
            '19' :  ['Харківська область', 'Харків', 'Харківська'],
            '20' :  ['Херсонська область', 'Херсон', 'Херсонська'],
            '21' :  ['Хмельницька область', 'Хмельницьк', 'Хмельницька'],
            '22' :  ['Черкаська область', 'Черкаси', 'Черкаська'],
            '23' :  ['Чернівецька область', 'Чернівці', 'Чернівецька'],
            '24' :  ['Чернігівська область', 'Чернігів', 'Чернігівська'],
            '25' :  ['Крим', 'Севастополь']
        };
        $.each(arr, function( index, arr1 ) {

            if (region!='') return true;
            $.each(arr1, function(index2, value) {
                if (adress.indexOf(value) !== -1) {
                    if (region=='') region = index;
                }
                if (adress_input.indexOf(value) !== -1) {
                    if (region=='') region = index;
                }
            });
        });
        if (region==''){
            $('#tt-google-single-autocomplete-region').val(0);
        } else {
            $('#tt-google-single-autocomplete-region').val(region);
        }


	}


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



        if ($('span#address-location').length) {

            var address = $('span#address-location').text();
            if (address!='') {
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

            }
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
        if ($('#tt-google-single-autocomplete-only').val()!='') $(".tt-map-search").click();
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
					icon: '/img/map/location.png'
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

                $('#tt-google-single-autocomplete-region').val(0);

				$('.tt-map-search-form').find('.simple-input').val(results[0].formatted_address);
                GetRetion (results[0].formatted_address, $('#tt-google-single-autocomplete-only').val());

                var Lat = results[0].geometry.location.lat(),
                    Lng = results[0].geometry.location.lng(),
                    mark_locat = new google.maps.LatLng(Lat, Lng),
                    mark_name = 'template_marker_'+results[0].formatted_address;

                for (var marker in markers) {
                    markers[marker].setMap(null);
                }
                addMarker(mark_locat,mark_name,results[0].formatted_address,mark_default,true);
            } else {
		    	console.log("Geocoder failed due to: " + status);
		  	}
		});
	}

	//map search location
	$('.tt-map-search').on('click', function(e){
		var address = $('#tt-google-single-autocomplete-only').val(),

		geocoder = new google.maps.Geocoder();

        $('#tt-google-single-autocomplete-region').val(0);

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

                GetRetion (address, $('#tt-google-single-autocomplete-only').val());
		      	addMarker(mark_locat,mark_name,address,mark_default,true);



		      	map.setCenter(mark_locat);


             //   map.fitBounds(autocomplete.getPlace().geometry.viewport);



		    //  	map.setZoom(12);
		    } else {
                GetMessage_('Адресу не визначено.', 'Прошу вибрати адресу з випадаючого списку.');

		      	console.log("Something got wrong " + status);
		    }
		});
		e.preventDefault();
	});





    function GetMessage_(title, subtitle){
        if (title!='') title = '<div class="empty-space marg-lg-b35"></div><h4 class="h4 text-center">'+title+'</h4><div class="empty-space marg-lg-b5"></div>';
        if (subtitle!='') subtitle = '<p class="text-center h5">'+subtitle+'</p><div class=" empty-space marg-lg-b35"></div>';
        $('div.popup-wrapper_ div.popup-content div.popup-container.size-2 div.popup-align').html(title + subtitle);
        $('div.popup-wrapper_, div.popup-wrapper_ div.popup-content').addClass('active');
    }


	//$(window).load(function(){


		//setTimeout(function(){initialize();}, 500);
	//});

});