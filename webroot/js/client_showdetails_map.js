var map;
var info_window;
var marker;

// Google maps callback function to initialize map
function initMap() {
	var geocoder = new google.maps.Geocoder();
	var address = getAddressFromClient(client_data);
	geocoder.geocode({
		'address': address
	}, function (results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			map = new google.maps.Map(document.getElementById('map'), {
				center: results[0].geometry.location,
				zoom: 15
			});
			setMarker(map, client_data, results[0].geometry.location);
		} else {
			alert("Geocode was not successful for the following reason: " + status);
		}
	});

	// Set temporary info window
	info_window = new google.maps.InfoWindow({
		content: 'loading'
	});
}

// Set marker on initiated map with infowindow
function setMarker(resultsMap, client, position) {
	var infoContent = '<h4>' +
		client.client_name +
		'</h4>' +
		client.street + ' ' +
		client.street_number + '<br>' +
		client.area_code + ' ' +
		client.city + '<br>'

	// Set marker and add onclick listener to open infowindow
	marker = new google.maps.Marker({
		map: resultsMap,
		position: position,
		title: client.client_name
	});
	marker.addListener('click', function () {
		info_window.setContent(infoContent);
		info_window.open(resultsMap, this);
	});
}

// Get address string from client object
function getAddressFromClient(client) {
	return client.client_name + ' ' + client.street + ' ' + client.street_number + ' ' + client.area_code + ' ' + client.city;
}
