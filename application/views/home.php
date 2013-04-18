<ul class="tabs-content">
<li class="active"  id="NationwideTab">

<script type="text/javascript">
     $(window).load(function() {
         $('#orbitDemo').orbit({
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
<script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-34.397, 150.644),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#buttonForModal").click(function() {
      $("#myModal").reveal();
    });
  });
</script>
    

<div class="row">
<div class="nine columns">

<div class="row">
<div class="twelve columns">

<div id="orbitDemo">

        <img src="<?php echo base_url(); ?>/images/people.jpg" alt="people" data-caption="#caption1" />
        <img src="<?php echo base_url(); ?>/images/meetpeople.jpg"  alt="meetpeople" data-caption="#caption2" />
        <img src="<?php echo base_url(); ?>/images/findplace.png" alt="findplace" data-caption="#caption3" />
	<span class="orbit-caption" id="caption1"><strong>Explore Locations around you </strong> Check this out </span>
        <span class="orbit-caption" id="caption2"><strong>Find people in your area </strong> Date them now</span>
        <span class="orbit-caption" id="caption3"><strong>Search interesting places in your city </strong> Find them out</span>

</div>
</div>
</div>

<p></p>
<h4> Your Location</h4>

<h6 class="subheader">Your Location relative to People Around you.</h6> 
<hr />

<div class="row">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLVh2FHZtdIw6NTqYJIndO3xiqwH67eJ0&sensor=false">
</script>

</div>


<div class="row">

<?php echo "Location 2";?>

</div>


<div class="row">

<?php echo "Location 3";?>

</div>


</div>

<div id="exampleModal" class="reveal-modal">
    <h2>Information about our <strong>SocNav</strong></h2>
    <p>This wonderful website enables you to explore your vicinity and socialize with those amazing people around you!</p>
    <p>Register now!! It's Free!</p>
    <a class="close-reveal-modal">&#215;</a>
  </div>



<div class="three columns">
	 <div class="panel hide-on-phones">

		<div class="row">
                        <div class="twelve columns" >
          <p><a href="#" data-reveal-id="exampleModal" class="radius button">Read More&hellip;</a></p>
                        </div>
		 </div>
                
		<div class="row">
			<div class="twelve columns">
				<p>Follow us on Twitter</p>
				<p class="left follow" style="width: 180px; overflow: hidden;">
				<a href="https://twitter.com/socnav"><img src="<?php echo base_url(); ?>/images/twitter1.png" alt="twitter"/></a>
				<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></p>
			</div>
		
		</div>
		
		<div class="row">
			<div class="twelve columns">
				<p>Find us on Facebook</p>
				<p class="left follow" style="width: 180px; overflow: hidden;">
				<a href="https://facebook.com/socnav"><img src="<?php echo base_url(); ?>/images/facebook1.png" alt="facebook"/></a>
				<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></p>
			</div>
		</div>

		<div class="row">
			<div class="twelve columns">
				<p>Get in touch through Email</p>
				<p class="left follow" style="width: 180px; overflow: hidden;">
				<a class="contact" href="mailto:limd1989@hotmail.com"><img src="<?php echo base_url(); ?>/images/email.png" alt="email"/></a>
				<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></p>
			</div>
		</div>

	 </div>

</div>


</li>
</ul>



