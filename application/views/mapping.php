	
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <!--<meta name="viewport" content="width=device-width" />-->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

  <title>Socnav Search</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/globals.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/typography.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/grid.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/orbit.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/forms.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/reveal.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/mobile.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/app.css"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/foundation.top-bar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs3/stylesheets/foundation2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/zurb.mega-drop.css">
       <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/foundation.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/foundation.min.css">

<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<script src="javascripts/modernizr.foundation.js"></script>  
<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true&key=AIzaSyCcFgjjow3Zqtk4j38D900zae0WnlvGu24"></script>
 
<style type="text/css">
	      html { height: 100% }
	      body { height: 100%; margin: 0; padding: 0 }
	      	#gmap_canvas { height: 100%; width: 130%;}
	      	#gmap_canvas img{max-width:none}
		#wrapper { height: 20%; clear: both;}
		#placesUI { width: 49%; float: left; border-style:solid; border-width:1px }
		#peopleUI { width: 49%; float: right; border-style:solid; border-width:1px }
		#places_label { font-size: 24pt }
		#people_label { font-size: 24pt }
		#placesdiv { display: none }
		
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>	
	
</head>

<body>

 <div class="container">

  
  <div class="five columns" style="margin: 0 0 0 30px;">
  	<div class="row">
	  <?php $this->load->view('search_criteria'); ?>
	</div>

        <div id="placesdiv" style="width: 410px; display:none">

			<ul class="accordion">
				  <li class="active">
				    <div class="title">
				      <h5>Place Details</h5>
				    </div>
				    <div class="content">
				      <table id="tbldetails" style="width: 380px;border: none;">
						<tr>
							<td><img id="placeicon" name="placeicon" src = "" alt = "icon" /></td>
						<tr>
						<tr>
							<td><label for="placename"><strong>Name:</strong></label></td>
							<td><input id="placename" type="text" name="placename" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="placephone"><strong>Phone:</strong></label></td>
							<td><input id="placephone" type="text" name="placephone" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="placewebsite"><strong>Website:</strong></label></td>
							<td><input id="placewebsite" type="text" name="placewebsite" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="placerating"><strong>SocNav Rating:<strong></label></td>
							<td><img id="placerating" name="placerating" src = "<?php echo base_url(); ?>images/rating0.png" alt = "icon" /></td>
						<tr>
						
				       </table>
				    </div>
				  </li>
				</ul>

			<ul class="accordion">
				  <li class="active">
				    <div class="title">
				      <h5>User Comments</h5>
				    </div>
				    <div class="content" id="comments_section2">
			
				    </div>

 				 </li>
			</ul>

		</br>

                 <form id="opiniontbldetails">
                 <fieldset>
                 <legend><h4>Express your opinion</h4></legend>
			 <label for="theratings"><strong>Please Rate:<strong></label>
				<div id="theratings">
					<input type="radio" name="rating" id="1" value="1" onchange="ratePlace(); return false;">1 &nbsp;&nbsp;
					<input type="radio" name="rating" id="2" value="2" onchange="ratePlace(); return false;">2 &nbsp;&nbsp;
					<input type="radio" name="rating" id="3" value="3" onchange="ratePlace(); return false;">3 &nbsp;&nbsp;
					<input type="radio" name="rating" id="4" value="4" onchange="ratePlace(); return false;">4 &nbsp;&nbsp;
					<input type="radio" name="rating" id="5" value="5" onchange="ratePlace(); return false;">5
				</div>
                        <label for="placecomment"><strong>Please Comment:<strong></label>
		        <textarea rows="4" cols="50" id="placecomment" type="text" name="placecomment"></textarea>
		        <input type="submit" onclick="insertComment(); return false;" value="Post" class="expand small button"> &nbsp
                         <a href="#" data-reveal-id="pictureupload" class="expand small button">Add Picture</a>
	                 <label id="lblmsg"></label>	
                  </fieldset>
	          </form>
        </div>

 		 <div id="peoplediv" style="width:410px; display:none">
			
			<ul class="accordion">
				  <li class="active">
				    <div class="title">
				      <h5>Personal Details</h5>
				    </div>
				    <div class="content">
					<table id="peopletbldetails" style="width:380px;border: none;margin-bottom:30px;">
						<tr>
							<td><img id="profpic" style="height: 100px; width:100px" name="profpic" src = "" alt = "icon" /></td>

						<tr>
						<tr>
							<td><label for="username"><strong>Username:</strong></label></td>
							<td><input id="username" type="text" name="username" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="firstname"><strong>First Name:<strong></label></td>
							<td><input id="firstname" type="text" name="firstname" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="lastname"><strong>Last Name:<strong></label></td>
							<td><input id="lastname" type="text" name="lastname" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="gender"><strong>Gender:<strong></label></td>
							<td><input id="gender" type="text" name="gender" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><label for="email"><strong>Email:<strong></label></td>
							<td><input id="email" type="text" name="email" readonly style="border:none"/></td>
						<tr>
						<tr>
							<td><input type="submit" onclick="calculateRoute(); return false;" value="Navigate To"></td>
						<tr>
				
						<tr>
							<td><label id="lblmsg"></label></td>
						<tr>
					</table>
<				    </div>
				  </li>
			</ul>

		 </div>
</div>

  <div class="seven columns" style="margin:0 0 0 -120px;">
  	
  	<div class="row">	
  		<div id="gmap_canvas"></div>
  	</div>
  	
  	<div class="row">	
  		<div id="directions_panel" style="margin-top:40px;"><h5>Suggested Route:</h5></div>
  	</div>
  	
	<br/>

		<div class="row">
			<h5>Posted Pictures:</h5>
			<div id="imagegallery">
				
			</div>

	</div>
  	
  </div>
  
  <!--Copied from profile_display page-->
  <div id="pictureupload" class="reveal-modal" >
	<?php $attributes = array('class' => 'nice custom', 'id' => 'placepictureupload'); ?>
    <?php echo form_open_multipart('/placepictureupload', $attributes); ?>

	<?php $upload_input_attr = array('name'=>'userfile', 'type'=>'file', 'size'=>'20', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $upload_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Upload', 'class'=>'nice small radius blue button', 'style'=>'width: 286px; height: 40px;'); ?>
	
	<?php echo form_fieldset("Upload Picture"); ?>
	<?php echo form_upload($upload_input_attr); ?>
        
	<?php echo form_submit($upload_button_attr); ?>

	<?php echo form_fieldset_close(); ?>
	<input id="hgid" type="hidden" value="" name="hgid">
	<input id="hradius" type="hidden" value="" name="hradius">
	<input id="htype" type="hidden" value="" name="htype">
	<input id="hkeyword" type="hidden" value="" name="hkeyword">
	<input id="hgref" type="hidden" value="" name="hgref">
	<?php echo form_close(); ?>
	<a class="close-reveal-modal">&#215;</a>
  </div>
  
  
 </div>

  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  <script src="javascripts/jquery.foundation.forms.js"></script>
  <script src="javascripts/jquery.event.move.js"></script>
  <script src="javascripts/jquery.event.swipe.js"></script>
  <script src="javascripts/jquery.foundation.reveal.js"></script>
  <script src="javascripts/jquery.foundation.orbit.js"></script>
  <script src="javascripts/jquery.foundation.navigation.js"></script>
  <script src="javascripts/jquery.foundation.buttons.js"></script>
  <script src="javascripts/jquery.foundation.tabs.js"></script>
  <script src="javascripts/jquery.foundation.tooltips.js"></script>
  <script src="javascripts/jquery.foundation.accordion.js"></script>
  <script src="javascripts/jquery.placeholder.js"></script>
  <script src="javascripts/jquery.foundation.alerts.js"></script>
  <script src="javascripts/jquery.foundation.topbar.js"></script>
  <script src="javascripts/jquery.foundation.joyride.js"></script>
  <script src="javascripts/jquery.foundation.clearing.js"></script>
  <script src="javascripts/jquery.foundation.magellan.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
  

</body>
 
<script>
		var map;
		var latit;
		var longit;
		var baseUrl = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/";
		var watchProcess;

		var geocoder = new google.maps.Geocoder();
		var directionsService = new google.maps.DirectionsService();
		var directionsDisplay = new google.maps.DirectionsRenderer();

		var markers = Array();
		var infos = Array();

		var clickedMarkerPosition; // Stores the LatLng object of the last-clicked marker by the user
		var placeResults; // Array that stores the results of the latest place search
		var userAddress; // The user's address based on geocoding.
		var userLocation; // LatLng object that stores the user's location.
		var userInfowindow;
		var userMarker;
		
		//For places after upload
		var gid; var type; var radius; var keyword; var gref;

		var placeAddressList = Array();

		var nearbyUserList = Array();
		var placesList = Array();		
		
		function getLocation_and_showMap() {
			// Check if geolocation is supported on the browser and get the location
			if (navigator.geolocation) {
				//Start monitoring user's position
				if (watchProcess == null) {  
					watchProcess = navigator.geolocation.watchPosition(createMap, handle_errors,{enableHighAccuracy:true});  
				}  
			} else {
				error('Geo Location is not supported');
			}

			// Create the map based on the user's location.
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

				// Add the user's market to the center of map.
				userMarker = new google.maps.Marker({
					position: map.getCenter(),
					map: map,
					title: 'You are here!'
				}); 

				  // Use a blue colored marker for the user.
				  userMarker.setIcon('http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png');

				  directionsDisplay.setMap(map);
				  directionsDisplay.setPanel(document.getElementById('directions_panel'));
				
				updateUserLocation();				
				
				// Getting the user's address with geocoding and passing the location to userGeocode().
				geocoder.geocode({ 'latLng': userLocation }, userGeocode);
			}
		}

		// Geocodes the user's location
		function userGeocode(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				// Check if the geocoding result is a valid address.
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

				// Create info window for the user that shows his address.
				infowindow = new google.maps.InfoWindow({
					content: '<p style="font-weight:bold" >You are at: '+ userAddress+'</p>',
					size: new google.maps.Size(10,30)
				});
				infowindow.open(map, userMarker);
			
				// add event handler for opening the infowindow when clicking on the user's marker
				google.maps.event.addListener(userMarker, 'click', function() {
					infowindow.open(map,userMarker);
				});
				
				//Show places if
				gid = '<?php echo $this->session->userdata('googleid');?>';
				type = '<?php echo $this->session->userdata('type');?>';
				radius = '<?php echo $this->session->userdata('radius');?>';
				keyword = '<?php echo $this->session->userdata('keyword');?>';
				gref = '<?php echo $this->session->userdata('googleref');?>';
				
				if(gid != ""){
					document.getElementById('gmap_type').value = type;
					document.getElementById('gmap_radius_places').value = radius;
					document.getElementById('gmap_keyword').value = keyword;
					
					var tr = '<?php $array_items = array('type' => '', 'radius' => '', 'keyword' => ''); 
									echo $this->session->unset_userdata($array_items);
								?>';
					
					findPlaces();
					viewDetails(gref, gid);
					//gref = ""; gid = "";
				}
			}
		}

		// This function gets called every time geolocation.watchPosition() gets called
		function updateUserLocation() {
			$.get("/socnav/index.php/updateuserlocation", { latitude:latit, longitude:longit }, function(response)
			{
				if(response == -1) {
					alert('ERROR: USER NOT LOGGED IN');
				}
			});
		}

		// Performs a JSON request when the "Search" button for searching nearby people is clicked,
		// the 2nd parameter is the user's location (lat, long and radius) and the 
		// callback function handles the results, displaying them in a list.
	
		function findPeople() {
			// clear the field from old markers and direction routes.	
			clearOverlays();
			directionsDisplay.setMap(null);

			// Get the radius for searching nearby users from the UI.
			var people_radius = document.getElementById("gmap_radius_people").value;
			
			
			$.getJSON("/socnav/index.php/nearbyusers", { latitude:latit, longitude:longit, radius: people_radius }, function(userlist) 
			{
				// pass data to create each user marker
				for(var i=0; i < userlist.length; i++) {

			    	createPersonMarker(userlist[i]);

					nearbyUserList[i] = userlist[i];

				}
			});
		}

		// Create a single marker for a person that was found nearby.
		function createPersonMarker(user) {
			newuserlocation = new google.maps.LatLng(user.latitude, user.longitude);
			// prepare new Marker object
			var mark = new google.maps.Marker({
				position: newuserlocation,
				map: map,
				title: user.firstname
			});

			// Use a green colored marker for nearby people
			mark.setIcon('http://www.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png');

			markers.push(mark);

			// prepare info window
			var infowindow = new google.maps.InfoWindow({
				content: '<p style="font-weight:bold" ><img style="height: 100px; width:100px" src="<?php echo base_url(); ?>uploads/users/'+user.username+'/'+user.photourl+'"/><br/>Username: '+user.username
				+ '<br/><input type="submit" onclick="calculateRoute(); return false;" value="Navigate To"></p>'
			});

			
			// add event handler to current marker
			google.maps.event.addListener(mark, 'click', function() {
				clearInfos();
				clickedMarkerPosition = mark.getPosition();

				var markerfirstname = mark.get("title");
				for(var i=0 ; i < nearbyUserList.length ; i++) {
					if(nearbyUserList[i].firstname == markerfirstname) {
						document.getElementById('profpic').src = "<?php echo base_url(); ?>"+'uploads/users/'+user.username+'/'+nearbyUserList[i].photourl;
						document.getElementById('username').value = nearbyUserList[i].username;
						document.getElementById('firstname').value = nearbyUserList[i].firstname;
						document.getElementById('lastname').value = nearbyUserList[i].lastname;
						document.getElementById('email').value = nearbyUserList[i].email;
						if(nearbyUserList[i].gender == 'm') {
							document.getElementById('gender').value = 'Male';
						}
						else if(nearbyUserList[i].gender == 'f'){
							document.getElementById('gender').value = 'Female';
						}
					}
				}
				showPeople();
				infowindow.open(map,mark);
			});
			infos.push(infowindow);
		}

		// find custom places function. NOTE: Although radius is used, it is not used since textSearch() is used.
		function findPlaces() {
			
			// prepare variables (filter)
			var type = document.getElementById('gmap_type').value;
			var radius = document.getElementById('gmap_radius_places').value;
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
			service.textSearch(request, createMarkersForPlaces);
		}

	// find custom places function. NOTE: Although radius is used, it is not used since textSearch() is used.
		function findComments() {
			
			// prepare variables (filter)
			var type = document.getElementById('gmap_type').value;
			var radius = document.getElementById('gmap_radius_places').value;
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
			service.textSearch(request, createMarkersForPlaces);
		}


		// Checks the results from the PlaceService and passes the data for each place to createPlaceMarker().
		function createMarkersForPlaces(results, status) {

			if (status == google.maps.places.PlacesServiceStatus.OK) {				
				placeResults = results;
				
				// if we have found something - clear map (overlays)
				// clear the field from old markers and direction routes.
				clearOverlays();
				directionsDisplay.setMap(null);
				
				//Array for holding references and id of places from google
				var placesrefarr = "[";
				var placesidarr = "[";
				
				// and create new markers by search result
				for (var i = 0; i < placeResults.length; i++) {
					createPlaceMarker(placeResults[i]);
					placesList[i] = placeResults[i];

					//Get the refrences and ids of places
					placesrefarr += "\"" + placeResults[i].reference + "\",";
					placesidarr += "\"" + placeResults[i].id + "\",";
				}
				
				//alert(the);
				placesrefarr = placesrefarr.slice(0, -1); placesrefarr += "]";
				placesidarr = placesidarr.slice(0, -1); placesidarr += "]";
				
				//Call function to carry out operation
				storeplaces(placesrefarr, placesidarr);
			} else if (status == google.maps.places.PlacesServiceStatus.ZERO_RESULTS) {
				alert('Sorry, nothing is found');
			}
		}

		// Creates a marker for a place.
		function createPlaceMarker(obj) {

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

				var placename = mark.get("title");
				for(var i=0 ; i < placesList.length ; i++) {
					if(placesList[i].name == placename) {
						viewDetails(placesList[i].reference, placesList[i].id);
					}
				}


				infowindow.open(map,mark);
				showPlaces();
			});
			
			infos.push(infowindow);
			
			if(obj.id == gid){
				infowindow.open(map,mark);
			}
		}

		function isValidPostcode(p) { 
			var postcodeRegEx = /([a-zA-Z^([a-zA-Z]){1}([0-9][0-9]|[0-9]|[a-zA-Z][0-9][a-zA-Z]|[a-zA-Z][0-9][0-9]|[a-zA-Z][0-9]){1}([ ])([0-9][a-zA-z][a-zA-z]){1}/; 
			return postcodeRegEx.test(p);
		}

		// Clears markers from the map.
		function clearOverlays() {
			if (markers) {
				for (i in markers) {
					markers[i].setMap(null);
				}
				markers = [];
				infos = [];
			}
		}

		// Clears info windows
		function clearInfos() {
			if (infos) {
				for (i in infos) {
					if (infos[i].getMap()) {
						infos[i].close();
					}
				}
			}
		}
		
		// Calculates and displays the route between the user and the clicked marker (place or person).
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
					directionsDisplay.setMap(map);
					directionsDisplay.setDirections(response);
				}
			});
		}

		// Handles user geolocation errors.
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

		/*
			THIS SECTION DOWNWARDS ARE LEKAN'S FUNCTIONS FOR PLACES
		*/
		//This function stores places that don't exist in the db
		function storeplaces(placesrefarr, placesidarr)
		{
			$.get("/socnav/index.php/storeplaces", {category: document.getElementById('gmap_type').value, placesrefs: placesrefarr, placesids: placesidarr}, function(data) {
				//do nothing
			});
		}
		
		//Method for showing place details
		function viewDetails(googleref, googleid){
			placegoogleid = googleid;
			document.getElementById('hgid').value = placegoogleid;
			document.getElementById('htype').value = document.getElementById('gmap_type').value;
			document.getElementById('hradius').value = document.getElementById('gmap_radius_places').value;
			document.getElementById('hkeyword').value = document.getElementById('gmap_keyword').value;
			document.getElementById('hgref').value = googleref;
			
			var request = {
			  reference: googleref
			};

			service = new google.maps.places.PlacesService(map);
			service.getDetails(request, callback);

			function callback(place, status) {
			  if (status == google.maps.places.PlacesServiceStatus.OK) {
				//Set details from DB
				document.getElementById('placename').value = place.name;
				document.getElementById('placephone').value = place.international_phone_number;
				document.getElementById('placewebsite').value = place.website;
				document.getElementById('placeicon').src = place.icon;
				document.getElementById('lblmsg').innerText = "";
				
				//Load rating, comment, and gallery from the database fro the chosen place
				loadRatingFromDB();
				loadCommentsFromDB();
				loadGalleryFromDB(placegoogleid);
			  }
			}
		}
		
		//Method for inserting comments
		function insertComment(){				
			$.get("/socnav/index.php/postcomment", {comment: document.getElementById('placecomment').value, googleid: placegoogleid, latitude: latit, longitude: longit}, function(data) {
				//do nothing							
				document.getElementById('placecomment').value = "";
			
				document.getElementById('lblmsg').innerText = data;
				
				//Refresh comments
				loadCommentsFromDB();
			});
		}
		
		//Method for rating places
		function ratePlace(){
			var ratingselected = 0;
			var inputs = document.getElementsByName("rating");
            for (var i = 0; i < inputs.length; i++) {
              if (inputs[i].checked) {
                ratingselected = inputs[i].value;
              }
            }
			
			$.get("/socnav/index.php/rateplace", {rating: ratingselected, googleid: placegoogleid}, function(data) {
				//do nothing
				document.getElementById('lblmsg').innerText = data;
				
				//Clear comment and chosen rating
				var inputs2 = document.getElementsByName("rating");
				for (var i = 0; i < inputs2.length; i++) {
				  if (inputs2[i].checked) {
					inputs2[i].checked = false;
					break;
				  }
				}
				
				//Refresh rating
				loadRatingFromDB();
			});
		}
		
		//Method for loading comments from DB
		function loadCommentsFromDB(){
			$.getJSON("/socnav/index.php/loadcomments", {googleid: placegoogleid}, function(data) {
				//Clear the comments div
				document.getElementById('comments_section2').innerHTML = "";
				
				//put comments in div
				for(var j=0; j < data.length; j++) {

					//create paragraph and add text

					newParagraph = document.createElement('p');
					newText = document.createTextNode(data[j].username + ': ' + data[j].comment);
					newText = document.createTextNode(data[j].username + ': ' + data[j].comment);
					newParagraph.appendChild(newText);
					
					
					
					// Append the new paragraph to the comments_section Div
					document.getElementById('comments_section2').appendChild(newParagraph);
				}
			});
		}

		//Method for loading ratings from the DB
		function loadRatingFromDB(){
			$.get("/socnav/index.php/loadrating", {googleid: placegoogleid}, function(data) {
				//set rating with appropriate image based on the returned value
				if(data == 1){
					document.getElementById('placerating').src = '<?php echo base_url();?>' + 'images/rating1.png';
				}
				else if(data == 2){
					document.getElementById('placerating').src = '<?php echo base_url();?>' + 'images/rating2.png';
				}
				else if(data == 3){
					document.getElementById('placerating').src = '<?php echo base_url();?>' + 'images/rating3.png';
				}
				else if(data == 4){
					document.getElementById('placerating').src = '<?php echo base_url();?>' + 'images/rating4.png';
				}
				else if(data == 5){
					document.getElementById('placerating').src = '<?php echo base_url();?>' + 'images/rating5.png';
				}
				else{
					document.getElementById('placerating').src = '<?php echo base_url();?>' + 'images/rating0.png';
				}
			});
		}

		
		//Method for loading gallery from DB
		function loadGalleryFromDB(gid){
			$.getJSON("/socnav/index.php/loadgallery", {googleid: gid}, function(data) {
				//Clear the comments div

				document.getElementById('imagegallery').innerHTML = "";
				
				//put comments in div

				for(var j=0; j < data.length; j++) {
					//create an image
					
					newImg = document.createElement('img');
					newImg.src = '<?php echo base_url();?>uploads/places/' + gid + '/' + data[j].photourl;
					// Append the new paragraph to the comments_section Div
					document.getElementById('imagegallery').appendChild(newImg);
				

				}
				
				//clear
				if(gid != ""){
					var tr = '<?php $array_items = array('googleid' => '', 'googleref' => ''); 
									echo $this->session->unset_userdata($array_items);
								?>';
					gid = ""; gref = "";
				}
			});

				
		}
</script>


<script type="text/javascript">
     $(window).load(function() {
         $('#imagegallery').orbit({
        animation: 'horizontal-slide',                  // fade, horizontal-slide, vertical-slide, horizontal-push
        animationSpeed: 1000,                // how fast animtions are
        timer: true,       // true or false to have the timer
        advanceSpeed: 2000,  // if timer is enabled, time between transitions
        pauseOnHover: false,      // if you hover pauses the slider
        startClockOnMouseOut: false,    // if clock should start on MouseOut
        startClockOnMouseOutAfter: 1000,    // how long after MouseOut should the timer start again
        directionalNav: true,      // manual advancing directional navs
        captions: true,       // do you want captions?
        captionAnimation: 'fade',     // fade, slideOpen, none
        captionAnimationSpeed: 800,   // if so how quickly should they animate in
        bullets: true,       // true or false to activate the bullet navigation
        bulletThumbs: true,    // thumbnails for the bullets
        bulletThumbLocation: '../images/orbit-demo/bullets/',    // location from this file where thumbs will be
        afterSlideChange: $.noop    // empty function
      });
     });
</script>


