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


<body>

<div class="container">	
	<ul class="breadcrumbs">
	  <li><a href="#">Home</a></li>
	  <li class="current"><a href="#">My Profile</a></li>
	</ul>
</div>

<div class="container">	

   <div class="three columns">
        <div class="twelve columns">
          <div class="panel">
          
          <?php
          
         		$photourl = $this->session->userdata('photourl');
				$username = $this->session->userdata('username');
				
          ?>
            <p><a href="#" class="th"><img src="<?php echo base_url(); ?>uploads/users/<?php echo $username; ?>/<?php echo $photourl; ?>"></a></p>
          </div>
        </div> 
      
      <div class="twelve columns">
          <p><a href="#" data-reveal-id="profileedit" class="expand small button">Edit Profile</a></p>
          <p><a href="#" data-reveal-id="pictureupload" class="expand small button">Edit Picture</a></p>
          <p><a href="#" data-reveal-id="editPreferences" class="expand small button">Edit Preferences</a></p>
      </div>
     
  </div>
  
  <div class="six columns">
      <h3>Solomon</h3>
   </div>
 
    <div class="three columns">
    
    <div class="row">
   
  	</div>
  	
			  <div class="twelve columns">
			   <h4>Privacy</h4>
			   
				<div class="switch tiny round">
			  	<input id="z" name="switch-z" type="radio" checked>
			  <label for="z" onclick="">Disable</label>
			
			  <input id="z1" name="switch-z" type="radio">
			  <label for="z1" onclick="">Enable Navigation</label>
			
			  <span></span>

	</div>
<br/>
      <h4>Location History</h4>
      <p>We're stoked you want to try Foundation! To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>

<br/>
     <h4>Popular Locations</h4>
      <p>Once you've exhausted the fun in this document, you should check out:</p>
      <ul class="disc">
        <li><a href="http://foundation.zurb.com/docs">Foundation Documentation</a><br />Everything you need to know about using the framework.</li>
        <li><a href="http://github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</li>
        <li><a href="http://twitter.com/foundationzurb">@foundationzurb</a><br />Ping us on Twitter if you have questions. If you build something with this we'd love to see it (and send you a totally boss sticker).</li>
      </ul>
    </div>
  </div>


<div id="profileedit" class="reveal-modal" >

    <?php $attributes = array('class' => 'nice custom', 'id' => 'updateprofile'); ?>
    <?php echo form_open('/updateprofile', $attributes); ?>
	
	<?php $firstname = $this->session->userdata('firstname'); ?>
	<?php $lastname = $this->session->userdata('lastname'); ?>
	<?php $email = $this->session->userdata('email'); ?>
	<?php $phone = $this->session->userdata('phonenumber'); ?>
	<?php $username = $this->session->userdata('username'); ?>
	
	<?php $firstname_input_attr = array('name'=>'firstname', 'value' => ''.$firstname, 'class' => 'input-text blue', 'placeholder'=>'First Name', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $lastname_input_attr = array('name'=>'lastname', 'value' => ''.$lastname, 'class' => 'input-text', 'placeholder'=>'Last Name', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $email_input_attr = array('name'=>'email', 'value' => ''.$email, 'class' => 'input-text blue',  'placeholder'=>'Email', 'style'=>'width: 286px; height: 40px;') ;?>
	<?php $username_input_attr = array('name'=>'username', 'value' => ''.$username, 'class' => 'input-text', 'placeholder'=>'Username', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $phone_input_attr = array('name'=>'phonenumber', 'value' => ''.$phone, 'class' => 'input-text', 'placeholder'=>'Phone', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $passwd_input_attr = array('name'=>'passwd', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Password', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $passwd2_input_attr = array('name'=>'passwd2', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Confirm Password', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $description_attr = array('name'=>'Description', 'placeholder' => 'Update Description', 'rows' => '100', 'cols' => '50', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $gender_attr = array('male'=>'Male', 'female' => 'Female', 'hermaphrodite' => 'Hermaphrodite'); ?>
	<?php $update_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Update Account', 'class'=>'nice small radius blue button', 'style'=>'width: 286px; height: 40px;'); ?>
	
		<?php echo form_fieldset("Edit Your Profile"); ?>
        <?php echo form_input($firstname_input_attr); ?>
        <?php echo form_input($lastname_input_attr); ?>

        <?php echo form_input($email_input_attr);?> 

        <?php echo form_input($username_input_attr);?> 
        <?php echo form_input($phone_input_attr);?> 
        <?php echo form_password($passwd_input_attr); ?>
        <?php echo form_password($passwd2_input_attr); ?>
        <?php echo form_textarea($description_attr); ?>
        <?php echo form_dropdown('Gender', $gender_attr); ?>
        
	<?php echo form_submit($update_button_attr); ?>

<?php echo form_fieldset_close(); ?>

<?php echo form_close(); ?>
<a class="close-reveal-modal">&#215;</a>

</div>



<div id="pictureupload" class="reveal-modal" >
	<?php $attributes = array('class' => 'nice custom', 'id' => 'pictureupload'); ?>
    <?php echo form_open_multipart('/pictureupload', $attributes); ?>

	<?php $upload_input_attr = array('name'=>'userfile', 'type'=>'file', 'size'=>'20','style'=>'width: 286px; height: 40px;'); ?>
	<?php $upload_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Upload', 'class'=>'nice small radius blue button', 'style'=>'width: 286px; height: 40px;'); ?>
	
		<?php echo form_fieldset("Change Your Picture"); ?>
        <?php echo form_upload($upload_input_attr); ?>
        
	<?php echo form_submit($upload_button_attr); ?>

<?php echo form_fieldset_close(); ?>

<?php echo form_close(); ?>
<a class="close-reveal-modal">&#215;</a>

</div>

<div id="pictureupload" class="reveal-modal">


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