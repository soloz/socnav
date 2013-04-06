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


        <!-- IE Fix for HTML5 Tags -->
        <!--[if lt IE 9]>
                <!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> -->
        <![endif]-->

	<title>
            <?php
            if (isset($cityName)) {
                echo $cityName;
                echo "| Locations around ";
                echo $cityName;
            } elseif (isset($eventName)) {
                echo $eventName;
            } else {
                echo "Navigation Engine: Your location privacy is enabled";
            }
            ?>
	</title>


    </head>


<body>

  <div class="container top-bar home-border">
    <div class="attached">
      <div class="name" onclick="void(0);">
        <span><a href="#">Soc Nav </a> <a href="#" class="toggle-nav"></a></span>
             </div>

                <ul class="right">  
                        <li>
                          <a href="">Search</a>
                        </li> 
                        <li>
                          <a href="">Maps</a>
                        </li>
                        <li>
                          <a href="">Reviews</a>
                        </li>
                        <li>
                          <a href="">Latest</a>
                        </li>
                        <li>
                          <a href="">Our Team</a>
                        </li>
                        <li><a class="medium blue nice button" href="">Member Login</a></li>
                </ul>
        	</div>
     </div>
	<div class="row hide-on-phones">
            <a href="index.php" class="back two columns hide-on-phones">&larr; Home</a>

</div>

 <?php
  $megadropfile = 'navigation_bar.html';

  if (file_exists($megadropfile)) {
      include $megadropfile;
  }
  ?>

<div class="container">
	 <header class="row">
                <div class="three columns">

                </div>
                <div class="six columns">
                        <h1 class="centered">Social Navigator</h1>
                        <p><i>...your preferred choice for socializing, exploring and navigating your vicinity...</i></p>
                </div>
                <div class="three columns">

		<?php
                	echo anchor('main/', 'Home', array('class' => 'decorate'));
                	echo "  ";
                	echo "  ";
                	$is_logged_in = $this->session->userdata('is_logged_in');

                	if ($is_logged_in == true) {
                	        echo anchor('/logout', 'Logout', array('class' => 'decorate'));
                    		echo "  ";
                    		echo "<br>";
                    		echo "You are logged in as: ";
                    		echo $this->session->userdata('email');
                    		echo "<br><b>";
                    		echo anchor('/profile', 'My Profile', array('class' => 'decorate'));
                    		echo "</b> ";

               		 } else {
                   		 echo anchor('/login', 'Member Login', array('class' => 'decorate'));
                    		echo "  ";
                    		echo "  ";
                    		echo anchor('/signup', 'Sign Up', array('class' => 'decorate'));
                	}
                		echo "  ";
                		echo anchor('/cart', 'Cart', array('class' => 'decorate'));
                ?>



                </div>


		<div class="row">
                <div class="twelve columns">
                        <dl class="tabs contained">
				<?php foreach ($locations as $value):?>
						<dd><a href="main/city"><?php echo $value['street_name'];?> </a></dd>
				<?php endforeach;?>

			</dl>

		</div>
		</div>

        </header>


        <!-- Included JS Files -->
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/foundation.js"></script>
        <script src="<?php echo base_url(); ?>system/libraries/zurbs/javascripts/app.js"></script>


