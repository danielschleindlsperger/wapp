var map;
var markers = [];
var info_window;

function initMap() {
	var geocoder = new google.maps.Geocoder();

	map = new google.maps.Map(document.getElementById('map'), {
		center: {
			lat: 52.5,
			lng: 13.4
		},
		zoom: 3
	});


	for (var i = 0; i < client_data.length; i++) {
		var color = setColor(client_data[i].client_icon_color);
		geocodeAddress(geocoder, map, client_data[i], i, color);
	}

	// Temporary info window
	info_window = new google.maps.InfoWindow({
		content: 'loading'
	});
}

// Set Marker for each client on location based on geocoder result
function geocodeAddress(geocoder, resultsMap, client, index, color) {
	var address = client.client_name + ' ' + client.street + ' ' + client.street_number + ' ' + client.area_code + ' ' + client.city;
	var infoContent = '<h4>' +
		client.client_name +
		'</h4>' +
		client.street + ' ' +
		client.street_number + '<br>' +
		client.area_code + ' ' +
		client.city + '<br>' +
		'<a href="' + client.client_link + '">' +
		'Click here for all the details!</a>';

	geocoder.geocode({
		'address': address
	}, function (results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			resultsMap.setCenter(results[0].geometry.location);
			markers[index] = new google.maps.Marker({
				map: resultsMap,
				position: results[0].geometry.location,
				title: client.client_name,
				icon: {
					url: color,
					scaledSize: new google.maps.Size(32, 32),
					anchor: new google.maps.Point(16, 32)
				}
			});
			markers[index].addListener('click', function () {
				info_window.setContent(infoContent);
				info_window.open(resultsMap, this);
			});
		} else {
			alert('Geocode was not successful for the following reason: ' + status);
		}
	});
}

// Get correct Marker based on suppplied color
function setColor(color) {
	return 'img/map_icon_' + color + '.png';
}
