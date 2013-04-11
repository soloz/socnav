<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Soc Nav - Place Search</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true&key=AIzaSyCcFgjjow3Zqtk4j38D900zae0WnlvGu24"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<style type="text/css">
		
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      	#gmap_canvas { height: 70% }
	</style>
  </head>

  <body>
    <div id="gmap_canvas"></div>
	
	<table>
		<tr>
			<td><label for="gmap_keyword">Keyword (optional):</label></td>
			<td><input id="gmap_keyword" type="text" name="gmap_keyword" /></div></td>
		<tr>
		<tr>
			<td><label for="gmap_type">Type:</label></td>
			<td><select id="gmap_type">
				<option value="art_gallery">art_gallery</option>
				<option value="atm">atm</option>
				<option value="bank">bank</option>
				<option value="bar">bar</option>
				<option value="cafe">cafe</option>
				<option value="food">food</option>
				<option value="hospital">hospital</option>
				<option value="police">police</option>
				<option value="store">store</option>
			</select></td>
		</tr>
		<tr>
			<td><label for="gmap_radius">Radius:</label></td>
			<td><select id="gmap_radius">
				<option value="500">500</option>
				<option value="1000">1000</option>
				<option value="1500">1500</option>
				<option value="5000">5000</option>
			</select></td>
		</tr>
		<tr>
			<td><input id="get_json" type="submit" onclick="getjson()" value="get json"></td>
		<tr>
			<td><input type="submit" onclick="findPlaces(); return false;" value="Search"></td>
		<!--	<td><input type="button" id="btn" onclick="showAddresses()" name="show_address_list" value="show address list" /></td> -->
		<tr>
	</table>
        <div id="directions_panel"></div>
    </section>
		<!--	<textarea id="mytextarea"rows="15" cols="100">   -->
			</textarea>
  </body>
<script>
		var map;
		var latit;
		var longit;

		var watchProcess;
		
		var geocoder = new google.maps.Geocoder();
		var directionsService = new google.maps.DirectionsService();
		var directionsDisplay = new google.maps.DirectionsRenderer();
		
		var markers = Array();
		var infos = Array();
		
		var clickedMarkerPosition; // Stores the LatLng object of the last-clicked marker by the user
		var placeResults; // Array that stores the results of the latest place search
		var userAddress; // The user's address based on geocoding
		var userLocation;
		var userInfowindow;
		var userMarker;

		var placeAddressList = Array();

		// Performs a JSON request when the "get_json" button is clicked,
		// the 2nd parameter is the user's location (lat and long) and the 
		// callback function handles the results, displaying them in a list.
		$("#get_json").click(function() {
			$.getJSON("/socnav/index.php/testjson", { latitude:latit, longitude:longit }, function(data) {
			  var items = [];
			  $.each(data, function(key, val) {
			    items.push('<li id="' + key + '">' + val + '</li>');
			  });

			  $('<ul/>', {
			    'class': 'my-new-list',
			    html: items.join('')
			  }).appendTo('body');
			});
		});

		function getLocation_and_showMap() {
			// Check if geolocation is supported on the browser and get the location
			if (navigator.geolocation) {
				//Start monitoring user's position
				if (watchProcess == null) {  
					watchProcess = navigator.geolocation.watchPosition(createMap, handle_errors);  
				}  
			} else {
				error('Geo Location is not supported');
			}

			// Create the map based on location
			function createMap(position) {
				latit = position.coords.latitude;
				longit = position.coords.longitude;

				userLocation = new google.maps.LatLng(latit, longit);
				
				// Create an object with map options (includes the latitude and longitude 
				// taken from the geolocation request).
				var mapOptions = {
				  center: userLocation,
				  zoom: 14,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				};

				// Create and show the map on a certain div using the above options
				map = new google.maps.Map(document.getElementById("gmap_canvas"), mapOptions);

				// Add market to the center of map.
				userMarker = new google.maps.Marker({
					position: map.getCenter(),
					map: map,
					title: 'You are here!'
				}); 

				  // Use a blue colored marker.
				  userMarker.setIcon('http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png');

				  directionsDisplay.setMap(map);
				  directionsDisplay.setPanel(document.getElementById('directions_panel'));

				// Getting the user's address with geocoding
				geocoder.geocode({ 'latLng': userLocation }, userGeocode);
			}
		}

		
		function userGeocode(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				for (var i = 0; i < results.length; i++) {
					if(isValidPostcode(results[i].formatted_address))
					{
						userAddress = results[i].formatted_address;
						break;
					}
					else
					{
						userAddress = results[0].formatted_address;
					}
				}
				// Create info window
				infowindow = new google.maps.InfoWindow({
					content: 'You are at: '+ userAddress,
					size: new google.maps.Size(10,30)
				});
				infowindow.open(map, userMarker);
			}
		}

		// find custom places function
		function findPlaces() {

			// prepare variables (filter)
			var type = document.getElementById('gmap_type').value;
			var radius = document.getElementById('gmap_radius').value;
			var keyword = document.getElementById('gmap_keyword').value;

			// prepare request to Places
			var request = {
				location: map.getCenter(),
				radius: radius,
				query: type
			};
			if (keyword) {
				request.keyword = [keyword];
			}

			// send request
			service = new google.maps.places.PlacesService(map);
			service.textSearch(request, createMarkers);
		}
/*
----------------------------------------------------------------------------------------------
//This commented code is an attempt to use geocode for finding the place's addresses and showing them,
in order for later to store them once in the db for access.
----------------------------------------------------------------------------------------------

		// find nearby places function
		function findNearbyPlaces() {
			// prepare request to Places
			var request = {
				location: map.getCenter(),
				radius: 500
			};

			// send request
			service = new google.maps.places.PlacesService(map);
			service.nearbySearch(request, doPlacesGeocoding);
		}

		function placeGeocode(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				for (var i = 0; i < results.length; i++) {
					if(isValidPostcode(results[i].formatted_address))
					{
						placeAddressList.push(results[i].formatted_address);
						break;
					}
					else
					{
						placeAddressList.push(results[0].formatted_address);
					}
				}
			}
		}

		function doPlacesGeocoding(results, status) {
			if (status == google.maps.places.PlacesServiceStatus.OK) {
				// and create new markers by search result
				for (var i = 0; i < results.length; i++) {
					geocoder.geocode({ 'latLng': results[i].geometry.location }, placeGeocode);
				}
			} else if (status == google.maps.places.PlacesServiceStatus.ZERO_RESULTS) {
				alert('Sorry, nothing is found');
			}
		}

		function showAddresses() {
			for (i in placeAddressList) {
				document.getElementById('mytextarea').innerHTML += placeAddressList[i];
			}
		}
*/

		// create markers (from 'findPlaces' function)
		function createMarkers(results, status) {
			if (status == google.maps.places.PlacesServiceStatus.OK) {
				placeResults = results;
				// if we have found something - clear map (overlays)
				clearOverlays();
				
				// and create new markers by search result
				for (var i = 0; i < placeResults.length; i++) {
					createMarker(placeResults[i]);
				}
			} else if (status == google.maps.places.PlacesServiceStatus.ZERO_RESULTS) {
				alert('Sorry, nothing is found');
			}
		}

		// creare single marker function
		function createMarker(obj) {

			// prepare new Marker object
			var mark = new google.maps.Marker({
				position: obj.geometry.location,
				map: map,
				title: obj.name
			});
			markers.push(mark);

			// prepare info window
			var infowindow = new google.maps.InfoWindow({
				content: '<img src="' + obj.icon + '" /><font style="color:#000;">' + obj.name +
				'<br />Rating: ' + obj.rating + '<br />Vicinity: ' + obj.vicinity + '</font>'
				+ '<br /><input type="submit" onclick="calculateRoute(); return false;" value="Navigate To">'
			});

			// add event handler to current marker
			google.maps.event.addListener(mark, 'click', function() {
				clearInfos();
				clickedMarkerPosition = mark.getPosition();
				infowindow.open(map,mark);
			});
			infos.push(infowindow);
		}

		function isValidPostcode(p) { 
			var postcodeRegEx = /([a-zA-Z^([a-zA-Z]){1}([0-9][0-9]|[0-9]|[a-zA-Z][0-9][a-zA-Z]|[a-zA-Z][0-9][0-9]|[a-zA-Z][0-9]){1}([ ])([0-9][a-zA-z][a-zA-z]){1}/; 
			return postcodeRegEx.test(p);
		}

		// clear overlays function
		function clearOverlays() {
			if (markers) {
				for (i in markers) {
					markers[i].setMap(null);
				}
				markers = [];
				infos = [];
			}
		}

		// clear infos function
		function clearInfos() {
			if (infos) {
				for (i in infos) {
					if (infos[i].getMap()) {
						infos[i].close();
					}
				}
			}
		}

		function calculateRoute() {
			var start = userAddress;
			var destination = clickedMarkerPosition;

			if (start == '') {
				start = center;
			}

			var request = {
				origin: start,
				destination: destination,
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};
			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				}
			});
		}
		
		function handle_errors(error)  
		{  
		    switch(error.code)  
		    {  
		        case error.PERMISSION_DENIED: alert("user did not share geolocation data");  
		        break;  
		        case error.POSITION_UNAVAILABLE: alert("could not detect current position");  
		        break;  
		        case error.TIMEOUT: alert("retrieving position timedout");  
		        break;  
		        default: alert("unknown error");  
		        break;  
		    }  
		}

		// The function is automatically run after loading the window.
		google.maps.event.addDomListener(window, 'load', getLocation_and_showMap);

</script>
</html>
