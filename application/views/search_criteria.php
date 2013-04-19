<div class="seven columns hide-on-phones">
<div class="row">
            
            		<dl class="tabs">
		 		<dd class="active"><a id="peopletab" onclick="peopleClicked()" href="#people">Find People</a></dd>
				 <dd><a id="placestab" onclick="placesClicked()" href="#places">Find Places</a></dd>
 				<dd><a id="commentstab" onclick="commentsClicked(); showGlobalComments();" href="#comments">Socialize</a></dd>
			 </dl>
		
			 <ul class="tabs-content">
			 	 <li class="active" id="peopleTab">
			 	
			 	 <form class="custom">
			 		 <fieldset>
			 		 	<legend>Search for People</legend>
						
					 		 <label for="gmap_radius_people">Within ?</label>
 								 <select class="support attribute" style="display:none;" id="gmap_radius_people">
   								 <option SELECTED>Range</option>
								    <option class="support tag" value="500">500</option>
								    <option value="1000">1000</option>
								    <option value="1500">1500</option>
								    <option value="5000">5000</option>
								 </select>
							 <!--a class="radius button" onclick="findPlaces(); return false;" href="#">Search</a>-->
							 <input type="submit" class="radius button" onclick="findPeople();placesClicked(); return false;" value="Search">
					</fieldset>
				</form>
			</li>

 		<li id="commentsTab">
			 	
			 	 <div id="commentsdiv" class="panel" style="width:410px;">
			

				<ul class="accordion">
				  <li class="active">
				    <div class="title">
				      <h5>Comment by Solomon</h5>
				    </div>
				    <div class="content">
				      I have been here and it's quite nice
				    </div>
				  </li>
				  <li class="active">
				    <div class="title">
				      <h5>Comments by Lekan</h5>
				    </div>
				    <div class="content">
				      
				    </div>
				  </li>
				  <li class="active">
				    <div class="title">
				      <h5>Comments by Mengdi</h5>
				    </div>
				    <div class="content">
				     
				    </div>
				  </li>
				</ul>

				</div>
			</li>
			
			<li id="placesTab">
			  	 <form class="custom">
				 <fieldset>
				 <legend>Search for Places</legend>
				 <div class="row">
					<div class="five columns">
				 		 <label for="gmap_radius_places">Within ?</label>
								 <select class="support attribute expand" style="display:none;" id="gmap_radius_places">
								 <option SELECTED>Range</option>
							    <option class="support tag" value="500">500</option>
							    <option value="1000">1000</option>
							    <option value="1500">1500</option>
							    <option value="5000">5000</option>
							 </select>
						 <!--a class="radius button" onclick="findPlaces(); return false;" href="#">Search</a>-->
						 
				  	</div>
				  	<div class="seven columns">
				  		 <label for="gmap_type">Category</label>
								<select class="support attribute expand" style="display:none;" id="gmap_type">
								 <option SELECTED>Category</option>
							    <option class="support tag">Bank</option>
							    <option value="bar">Bar</option>
							    <option value="food">Food</option>
							    <option value="hospital">Hospital</option>
							    <option value="police">Police</option>
							    <option value="cafe">Cafe</option>
							    <option value="store">Store</option>
							    <option value="atm">ATM</option>
							    <option value="art_gallery">Art Gallery</option>
							    <option>Club</option>
							 </select>
				  		</div>
				  	</div>
				  	
				  	<div class="row">
				  		<div class="twelve columns">
					 	 	 <label for="gmap_keyword">Keyword</label>
									<input id="gmap_keyword" class="expand" type="text" placeholder="Where is on your mind ?" />
					  	</div>
				  	</div>
				  	
				  	<div class="row">
				  		<input type="submit" class="radius button" onclick="findPlaces(); peopleClicked(); return false;" value="Search">
				  	</div>
				  	
				</fieldset>
			  </form>
		  	</li>
		</ul>  
	</div>
	</div>
<script>
function peopleClicked() {
	document.getElementById('placesdiv').style.display = 'none';
	document.getElementById('peoplediv').style.display = 'none';
	document.getElementById('commentsdiv').style.display = 'none';
}

function placesClicked() {
	document.getElementById('placesdiv').style.display = 'none';
	document.getElementById('peoplediv').style.display = 'none';
	document.getElementById('commentsdiv').style.display = 'none';
}

function commentsClicked() {
	document.getElementById('placesdiv').style.display = 'none';
	document.getElementById('peoplediv').style.display = 'none';
	document.getElementById('commentsdiv').style.display = 'none';
}

function showPeople() {
	document.getElementById('peoplediv').style.display = 'block';
}

function showPlaces() {
	document.getElementById('placesdiv').style.display = 'block';
}

function showComments() {
	document.getElementById('commentsdiv').style.display = 'block';
}

function showGlobalComments() {
	//Method for loading comments from DB
	$.getJSON("/socnav/index.php/showglobalcomments", function(data) {
		//Clear the comments div
		document.getElementById('commentsdiv').innerHTML = "";
		//alert(data[0].latitude);
		//create ul
		newUl = document.createElement('ul'); newUl.className = 'accordion';
		
		//put comments in div
		for(var j=0; j < data.length; j++) {
			newLi = document.createElement('li'); newLi.className = 'active';
			
			//title
			newLiDiv = document.createElement('div'); newLiDiv.className = 'title';
			newLiH5 = document.createElement('h5');
			newLiH5Text = document.createTextNode('Comment by ' + data[j].username);
			newLiH5.appendChild(newLiH5Text);
			newLiDiv.appendChild(newLiH5);
			
			//content
			newLiDiv2 = document.createElement('div'); newLiDiv2.className = 'content';
			newLiText2 = document.createTextNode(data[j].comment);
			newLiDiv2.appendChild(newLiText2);
			
			//button
			newLiButton = document.createElement('input');
			newLiButton.type = 'submit'; newLiButton.value = 'Navigate To';
			newLiButton.setAttribute('onclick','calculateRoute2(' + data[j].latitude + ',' + data[j].longitude + '); return false;'); // for FF
			//newLiButton.onclick = function() {calculateRoute2(data[j].latitude, data[j].longitude); return false;}; // for IE
			//newLiButtonText = document.createTextNode('Navigate To'); 
			//newLiButton.appendChild(newLiButtonText);
			//newLiButton.onclick = function() { calculateRoute2(new google.maps.LatLng(data[j].latitude, data[j].longitude)); };
			//newLiButton.setAttribute('id', new google.maps.LatLng(data[j].latitude, data[j].longitude));
			//newLiButton.onclick = 'calculateRoute2(data[j].latitude, data[j].longitude);';
			//newLiButton.addEventListener("mouseup", function () {calculateRoute2(data[j].latitude, data[j].longitude)}, false);
			/*onclick = 'clickedMarkerPosition = new google.maps.LatLng(' + data[j].latitude + ',' + data[j].longitude + '); calculateRoute(); return false;';function() {
									clickedMarkerPosition = new google.maps.LatLng(data[j].latitude, data[j].longitude);
									calculateRoute(); 
									return false;
								  };*/
			//'clickedMarkerPosition = new google.maps.LatLng(' + data[j].latitude + ',' + data[j].longitude + '); calculateRoute(); return false;';
			
			//attach elements to li
			newLi.appendChild(newLiDiv);
			newLi.appendChild(newLiDiv2);
			newLi.appendChild(newLiButton);
			
			//attach li to ul
			newUl.appendChild(newLi);
		}
		
		//display div
		document.getElementById('commentsdiv').style.display = 'block';
		document.getElementById('commentsdiv').appendChild(newUl);
	});
}
</script>
