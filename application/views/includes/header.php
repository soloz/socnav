
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>SocNav - Navigate | Explore | Socialize</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs3/stylesheets/foundation.css">
  
  <!--link rel="stylesheet" href="stylesheets/foundation.min2.css"-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs3/stylesheets/app.css">
  <script src="<?php echo base_url(); ?>zurbs3/javascripts/modernizr.foundation.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>zurbs/javascripts/jquery-1.4.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>zurbs/javascripts/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>zurbs/javascripts/jquery.orbit.min.js" type="text/javascript"></script>
  <!-- Included CSS Files -->
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

	<!-- <link rel="stylesheet" href="presentation.css"> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>zurbs/javascripts/app.js"></script>
	<link rel="stylesheet" href="http://www.zurb.com/assets/foundation.top-bar.css">
  	<link rel="stylesheet" href="http://www.zurb.com/assets/zurb.mega-drop.css">
	<link rel="stylesheet" href="presentation.css">
	<script src="<?php echo base_url(); ?>zurbs/javascripts/jquery-1.4.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>zurbs/javascripts/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>zurbs/javascripts/jquery.orbit.min.js" type="text/javascript"></script>

</head>

<body>

  <div class="container top-bar home-border">
    <div class="attached">
      <div class="name" onclick="void(0);">
        <span><a href="main">Soc Nav</a> <a href="#" class="toggle-nav"></a></span>
      </div>

                <ul class="right">  
                          <?php 
				 echo "<li>";
				echo anchor('search', 'Search'); 
				 echo "</li>";		
			?>

                         
                           <?php 
                       		 $is_logged_in = $this->session->userdata('is_logged_in');
		                        if ($is_logged_in == true) {
		                	        	echo "<li>";
							echo anchor('/profile', 'My Profile');
		                   			echo "</li>";
		       					} else {
								echo "<li>";
		       					    	echo anchor('/login', 'Sign Up');
								echo "</li>";
		       					}
       					?>
       			
			   <?php 
                        $is_logged_in = $this->session->userdata('is_logged_in');
                        if ($is_logged_in == true) {
						echo "<li>";                	        		
						echo anchor('/logout', 'Logout', array('class' => 'nice blue button'));
						echo "</li>";
						
                   					
       					} else {
						echo "<li>";       					    	
						echo anchor('/login', 'Member Login', array('class' => 'nice blue button'));
						echo "</li>";
       					}
       					?>
                </ul>
                
        	</div>
     </div>

 <div class="container" id="megaDrop" style="display: none;">
  <div class="mobile-main-nav-padding">
    <div class="row top">

 <?php 
                        	$is_logged_in = $this->session->userdata('is_logged_in');
	                        if ($is_logged_in == true) {
	                	        	echo	$this->load->view('megadrop_login');
	                   					
	       					} else {
	       					    	echo $this->load->view('megadrop_image');
	       					}
 ?>
  </div>
  </div>
</div>

 <header>
<div class="container">
	
                <div class="nine columns">

                </div>
              
                <div class="three columns">

				<?php
                	
                	$is_logged_in = $this->session->userdata('is_logged_in');

                	if ($is_logged_in == true) {
                	       //	echo "<b>Welcome ". $this->session->userdata('firstname')."</b>";

               		 } else {

                	}

                ?>


                </div>
	</div>
	</header>


 <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/foundation.js"></script>
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/app.js"></script>
	<script src="http://www.zurb.com/assets/zurb.mega-drop.js"></script>
