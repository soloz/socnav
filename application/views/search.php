<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Foundation</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>
  
</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=true&key=AIzaSyCcFgjjow3Zqtk4j38D900zae0WnlvGu24"></script>
    </script>
    
    
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        var map = new google.maps.Map(document.getElementById("map-canvas2"),
        mapOptions);
        var map = new google.maps.Map(document.getElementById("map-canvas3"),
        mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
    
</head>


<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>

    
 <div class="row">

  <div class="two columns">
      <h3>SocNav</h3>
  </div>
</div>

<hr/>

 <div class="row">

  <div class="four columns">
  
    <div class="panel">
		<h4> Your Location</h4>
	</div>
  
  	<div class="panel">
		<h4><div class="panel" id="map-canvas3"/></h4>
	</div>
	
  </div>
  
  <div class="eight columns">
  
   <ul class="accordion">  
  		<li>
		    <div class="title">
		      	<h5>Location 1</h5>
		      	<p> Some Information about location 1</p>
		      	</div>
		    <div class="content">
		     	 <dl class="tabs pill">
  					<dd class="active"><a href="#summary">Summary</a></dd>
					  <dd><a href="#direction">Map and Direction</a></dd>
					  <dd class="hide-for-small"><a href="#comments">Comments</a></dd>
					</dl>
					<ul class="tabs-content">
					  	<li class="active" id="summaryTab">Summary about location 1</li>
						<li id="directionTab"><div class="panel" id="map-canvas"/></li>
						<li id="commentsTab">
							<form>
 								 <fieldset>
								  <legend>Add Comment</legend>
								    <label>Comment</label>
								    <input type="text" />
								    <input type="button" class="button" value="Post" />
								
								  </fieldset>
							</form>
						</li>
					</ul>
		    </div>
		  </li>
	</ul>
  
   <ul class="accordion">  
  		<li>
	   		<div class="title">
		    		 <a href=""> <b>Chinese Restaurant 2</b></a>
					<p>Lorem ipsum dolor <a href> sit amet</a> Some information about Chinese Restaurant .</p>
				   
				    <div class="row">
				    <div class="nine columns">
				    </div>
				    <div class="two columns">
				  		<a href="http://twitter.com/socnav" class="twitter-follow-button" data-show-count="false">Share on twitter</a>
						<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></p>
					</div>
					 <div class="one columns">
						<!--div class="fb-like" data-send="false" data-width="450" data-show-faces="true"></div>-->
					</div>
					</div>
					
		    </div>    
		    
		    <div class="content">
		     	<dl class="tabs pill">
  					<dd class="active"><a href="#summary2">Summary</a></dd>
					  <dd><a href="#direction2">Map and Direction</a></dd>
					  <dd class="hide-for-small"><a href="#comments2">Comments</a></dd>
					</dl>
					<ul class="tabs-content">
					  	<li class="active" id="summary2Tab">Summary about location 2</li>
						<li id="direction2Tab"><div class="panel" id="map-canvas2"/></li>
						<li id="comments2Tab">
							<form>
 								 <fieldset>
								  <legend>Add Comment</legend>
								    <label>Comment</label>
								    <input type="text" />
								    <input type="button" class="button" value="Post" />
								
								  </fieldset>
							</form>
						</li>
					</ul>
			</div>
	  	 	</li>
  		</ul>
  
   <ul class="accordion">  
  		<li>
		    <div class="title">
		      <b>Location 3</b>
		      <p> Some Information about Location 3</p>
		      </div>
	    	<div class="content">
		      Noting. That's all.
		    </div>
		</li>
	</ul>
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

  
    <script>
    $(window).load(function(){
      $("#featured").orbit();
    });
    </script> 
  
</body>
</html>
