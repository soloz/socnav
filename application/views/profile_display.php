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
       <link rel="stylesheet" href="<?php echo base_url(); ?>zurbs/stylesheets/foundation.css">
  <script src="javascripts/modernizr.foundation.js"></script>
</head>


<body>

<div class="row">
	<ul class="breadcrumbs" style="width:980px;">
	  <li><a href="main">Home</a></li>
	  <li class="current">&nbsp My Profile (<?php echo $this->session->userdata('username')?>)</li>
	</ul>

</div>

<div class="row">	

   <div class="three columns">

          <div class="panel">
          <?php
                 	$photourl = $this->session->userdata('photourl');
			$username = $this->session->userdata('username');		
          ?>
           <p><a href="#" class="th"><img src="<?php echo base_url(); ?>uploads/users/<?php echo $username; ?>/<?php echo $photourl; ?>"></a></p>
          </div>

      
      <div class="twelve columns">
          <p><a href="#" data-reveal-id="profileedit" class="expand small radius button" style="width:150px">Edit Your Profile</a></p>
          <p><a href="#" data-reveal-id="pictureupload" class="expand small radius button" style="width:150px">Change Photo</a></p>
      </div>
     
  </div>
  
  <div class="seven columns">
      <h3 style="margin-bottom: 35px;"><?php echo $this->session->userdata('firstname')?></h3>
		<table id="profile" style="border: none; width: 400px;" >
			<tr>
			<td><label for="username"><strong>Username:</strong></label></td>
			<td><input id="username" type="text" name="username" readonly style="border: none;"/></td>
			<tr>
			<tr>
			<td><label for="firstname"><strong>First Name:<strong></label></td>
			<td><input id="firstname" type="text" name="firstname" readonly style="border: none;"/></td>
			<tr>
			<tr>
			<td><label for="lastname"><strong>Last Name:<strong></label></td>
			<td><input id="lastname" type="text" name="lastname" readonly style="border: none;"/></td>
			<tr>
			<tr>
			<td><label for="email"><strong>Email:<strong></label></td>
			<td><input id="email" type="text" name="email" readonly style="border: none;"/></td>
			<tr>
			<tr>
			<td><label for="gender"><strong>Gender:<strong></label></td>
			<td><input id="gender" type="text" name="gender" readonly style="border: none;"/></td>
			<tr>
		</table>
   </div>
 
   <div class="two columns">
    <div class="row">
	<h4>Privacy</h4>
	<div class="switch tiny round">
	<input id="z" name="switch-z" type="radio" checked>
	<label for="z" onclick="">Disable</label>
	<input id="z1" name="switch-z" type="radio">
	<label for="z1" onclick="">Enable Navigation</label>
	 <span></span>

	</div>
    </div>
  </div>

<div id="profileedit" class="reveal-modal" >

    <?php $attributes = array('class' => 'nice custom', 'id' => 'updateprofile'); ?>
    <?php echo form_open('/updateprofile', $attributes); ?>
	
	<?php $firstname = $this->session->userdata('firstname'); ?>
	<?php $lastname = $this->session->userdata('lastname'); ?>
	<?php $email = $this->session->userdata('email'); ?>
	<?php $gender = $this->session->userdata('gender'); ?>
	<?php $phone = $this->session->userdata('phonenumber'); ?>
	<?php $username = $this->session->userdata('username'); ?>
	<?php $passwd = ""; ?>
	<?php $passwd2 = ""; ?>
	
		<?php $firstname_input_attr = array('name'=>'firstname', 'value' => ''.$firstname , 'class' => 'input-text blue', 'placeholder'=>'First Name', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $lastname_input_attr = array('name'=>'lastname', 'value' => ''.$lastname, 'class' => 'input-text', 'placeholder'=>'Last Name', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $email_input_attr = array('name'=>'email', 'value' => ''.$email, 'class' => 'input-text blue',  'placeholder'=>'Email', 'style'=>'width: 386px; height: 40px;') ;?>
		<?php $username_input_attr = array('name'=>'username', 'value' => ''.$username, 'class' => 'input-text', 'placeholder'=>'Username', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $phone_input_attr = array('name'=>'phonenumber', 'value' => ''.$phone, 'class' => 'input-text', 'placeholder'=>'Phone', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $gender_attr = array('m'=>'Male', 'f' => 'Female'); ?>
		<?php $passwd_input_attr = array('name'=>'passwd', 'value' => ''.$passwd, 'class' => 'input-text', 'placeholder'=>'Password', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $passwd2_input_attr = array('name'=>'passwd2', 'value' => ''.$passwd, 'class' => 'input-text', 'placeholder'=>'Confirm Password', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $create_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Update Account', 'class'=>'nice small radius blue button', 'style'=>'width: 386px; height: 40px;'); ?>

	        <?php echo form_input($firstname_input_attr); ?>
	        <?php echo form_input($lastname_input_attr); ?>

	        <?php echo form_input($email_input_attr);?> 

	        <?php echo form_input($username_input_attr);?>
	        <?php echo form_input($phone_input_attr);?>
	        <?php echo form_password($passwd_input_attr); ?>
	        <?php echo form_password($passwd2_input_attr); ?>
	        
	        <?php echo form_dropdown('gender',$gender_attr, $gender);?>
	        <?php echo form_submit($create_button_attr); ?>

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