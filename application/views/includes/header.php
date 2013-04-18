
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
  <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/foundation.top-bar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/zurb.mega-drop.css">
  <!--link rel="stylesheet" href="stylesheets/foundation.min2.css"-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs3/stylesheets/app.css">
  <script src="<?php echo base_url(); ?>zurbs3/javascripts/modernizr.foundation.js" type="text/javascript"></script>
  
</head>

<body>

  <div class="container top-bar home-border">
    <div class="attached">
      <div class="name" onclick="void(0);">
        <span><a href="main">Home </a> <a href="#" class="toggle-nav"></a></span>
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
       				
                        <li><a class="medium blue nice button" href="logout">
                        
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
                   		 echo anchor('/login', 'Member Login', array('class' => 'decorate'));
                    		echo "  ";
                    		echo "  ";
                    		echo anchor('/signup', 'Sign Up', array('class' => 'decorate'));
                	}

                ?>


                </div>
	</div>
	</header>
