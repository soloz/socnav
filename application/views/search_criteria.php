<div class="container hide-on-phones">
              <dl class="tabs">
		 		 <dd class="active"><a href="#people">People</a></dd>
				 <dd><a href="#places">Places</a></dd>
			 </dl>
		
			 <ul class="tabs-content">
			 	 <li class="active" id="peopleTab">
			 	 
			 	 <form class="custom">
			 		 <fieldset>
			 		 	<legend>Search for People</legend>
						<div class="two columns">
					 		 <label for="gmap_radius_people">Within ?</label>
 								 <select class="support attribute" style="display:none;" id="gmap_radius_people">
   								 <option SELECTED>Range</option>
								    <option class="support tag" value="500">500</option>
								    <option value="1000">1000</option>
								    <option value="1500">1500</option>
								    <option value="5000">5000</option>
								 </select>
							 <!--a class="radius button" onclick="findPlaces(); return false;" href="#">Search</a>-->
							 <input type="submit" class="radius button" onclick="findPeople(); return false;" value="Search">
					      
					  	</div>
					  	
					  	<div class="six columns">
					     
					  	</div>
					</fieldset>
				</form>
			</li>
				  <li id="placesTab">
				  	 <form class="custom">
    				 <fieldset>
    				 <legend>Search for Places</legend>
						<div class="two columns">
					 		 <label for="gmap_radius_places">Within ?</label>
 								 <select class="support attribute" style="display:none;" id="gmap_radius_places">
   								 <option SELECTED>Range</option>
								    <option class="support tag" value="500">500</option>
								    <option value="1000">1000</option>
								    <option value="1500">1500</option>
								    <option value="5000">5000</option>
								 </select>
							 <!--a class="radius button" onclick="findPlaces(); return false;" href="#">Search</a>-->
							 
							 <input type="submit" class="radius button" onclick="findPlaces(); return false;" value="Search">
					      
					  	</div>
					  	<div class="two columns">
					  		 <label for="gmap_type">Category</label>
 								<select class="support attribute" style="display:none;" id="gmap_type">
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
					  	
					  	<div class="two columns">
					 	 	 <label for="gmap_keyword">Keyword</label>
 								<input id="gmap_keyword" type="text" placeholder="Where is on your mind ?" />
					  	</div>
					  	
					  	<div class="six columns">
					     
					  	</div>
					</fieldset>
				</form>
  		  	</li>
			 </ul>  
	</div>