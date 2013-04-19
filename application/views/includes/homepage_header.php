<!DOCTYPE html>

<html>
    <head>
	 <meta charset="utf-8" />

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width" />

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

        <!--[if lt IE 9]>
	        <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/ie.css">
        <![endif]-->
	<script src="<?php echo base_url(); ?>zurbs/javascripts/modernizr.foundation.js"></script>
<script src="<?php echo base_url(); ?>zurbs/javascripts/foundation.js"></script>


        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
                <!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> -->
        <![endif]-->

<title>SocNav - Navigate | Explore | Socialize</title>

    </head>


<body>

  <div class="container top-bar home-border">
    <div class="attached">
      <div class="name" onclick="void(0);">
        <span><a href="#">Soc Nav </a> <a href="#" class="toggle-nav"></a></span>
             </div>

                <ul class="right">  
                        <li>
                          <a href="search">Search</a>
                        </li>
                        <li>
                           <a href="profile">
                           <?php 
                       		 $is_logged_in = $this->session->userdata('is_logged_in');
		                        if ($is_logged_in == true) {
		                	        	echo	"My Profile</a></li>";
		                   		} else {
		       					    	echo "Sign Up</a></li>";
		       					}
       					?>
                        <li ><a style="color: #00CCFF;" href="logout"> 
                        
                        <?php 
                        	$is_logged_in = $this->session->userdata('is_logged_in');
	                        if ($is_logged_in == true) {
	                	        	echo	"Logout</a></li>";
	                   					
	       					} else {
	       					    	echo "Member Login</a></li>";
	       					}
       					?>
                </ul>
        	</div>
     </div>

 <?php
  $megadropfile = 'navigation_bar.html';

  if (file_exists($megadropfile)) {
      include $megadropfile;
  }
  ?>

<div class="container">
	 <header class="row">
                
                <div class="ten columns">
                        <h1 class="centered">Social Navigator</h1>
                        <p><i>...your preferred choice for socializing, exploring and navigating your vicinity...</i></p>
                </div>
                <div class="two columns">

				<?php
                	
                	$is_logged_in = $this->session->userdata('is_logged_in');

                	if ($is_logged_in == true) {
                	    	echo "<b> Welcome </b><b> ".$this->session->userdata('firstname')."</b>" ;
               		 } else {
                	}
                		
               	 ?>
			    </div>


        </header>


        <!-- Included JS Files -->
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/foundation.js"></script>
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/app.js"></script>


