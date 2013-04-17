<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Profile</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.css">
  <!--link rel="stylesheet" href="stylesheets/foundation.min2.css"-->
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>
</head>


<?php 
	
		$is_logged_in = $this->session->userdata('is_logged_in');
		if ($is_logged_in == true) {
			$this->load->view('search_criteria'); 
			$this->load->view('profile_display'); 
		} else {
               		 $this->session->set_flashdata('RegError', 'You have to sign in before accessing this functionality');
                    redirect('/login', 'refresh');
                    return false;
		}
			
?>


</body>
</html>


