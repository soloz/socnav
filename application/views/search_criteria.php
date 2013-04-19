<div class="seven columns hide-on-phones">
<div class="row">
            
            		<dl class="tabs">
		 		<dd class="active"><a id="peopletab" onclick="peopleClicked()" href="#people">Find People</a></dd>
				 <dd><a id="placestab" onclick="placesClicked()" href="#places">Find Places</a></dd>
 				<dd><a id="placestab" onclick="commentsClicked()" href="#comments">Socialize</a></dd>
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
}

function placesClicked() {
	document.getElementById('placesdiv').style.display = 'none';
	document.getElementById('peoplediv').style.display = 'none';
}

function commentsClicked() {
	document.getElementById('placesdiv').style.display = 'none';
	document.getElementById('peoplediv').style.display = 'none';
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


</script>
