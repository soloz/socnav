<ul class="tabs-content">
<li class="active"  id="NationwideTab">

<script type="text/javascript">
     $(window).load(function() {
         $('#orbitDemo').orbit();
     });
</script>


<div class="row">
<div class="nine columns">

<div class="row">
<div class="twelve columns">

<div id="orbitDemo">

        <img src="<?php echo base_url(); ?>/images/samples/overflow.jpg" alt="Overflow: Hidden No More" />
        <img src="<?php echo base_url(); ?>/images/samples/captions.jpg"  alt="HTML Captions" data-caption="#htmlCaption" />
        <img src="<?php echo base_url(); ?>/images/samples/features.jpg" alt="and more features" />
        <div class="content" style="">
                <h1>Socialize, Navigate, Explore...</h1>
                <h3>Socialize, Navigate, Explore in your vicinity..</h3>
        </div>

<span class="orbit-caption" id="htmlCaption"><strong>Explore Locations around <a href="#">you</a>  <em>style</em></strong> Check this out </span>

</div>
</div>
</div>

<p></p>
<h4> Locations around <?php echo $cityName; ?> </h4>

<h6 class="subheader">The following events are available across the country.</h6> 
<hr />

<div class="row">

<?php echo "Location 1";?>

</div>


<div class="row">

<?php echo "Location 2";?>

</div>


<div class="row">

<?php echo "Location 3";?>

</div>


</div>

<div id="registration" class="reveal-modal" >

<h2>Create an account</h2>

    <?php $attributes = array('class' => 'nice custom', 'id' => 'registrationform'); ?>
    <?php echo form_open('/registeruser', $attributes); ?>

	<?php $firstname_input_attr = array('name'=>'firstname', 'value' => '', 'class' => 'input-text blue', 'placeholder'=>'First Name', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $lastname_input_attr = array('name'=>'lastname', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Last Name', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $email_input_attr = array('name'=>'email', 'value' => '', 'class' => 'input-text blue',  'placeholder'=>'Email', 'style'=>'width: 286px; height: 40px;') ;?>
	<?php $username_input_attr = array('name'=>'username', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Username', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $passwd_input_attr = array('name'=>'passwd', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Password', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $passwd2_input_attr = array('name'=>'passwd2', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Confirm Password', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $create_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Create Account', 'class'=>'nice small radius blue button', 'style'=>'width: 286px; height: 40px;'); ?>

        <?php echo form_input($firstname_input_attr); ?>
        <?php echo form_input($lastname_input_attr); ?>

        <?php echo form_input($email_input_attr);?> 

        <?php echo form_input($username_input_attr);?> 
        <?php echo form_password($passwd_input_attr); ?>
        <?php echo form_password($passwd2_input_attr); ?>
	<?php echo form_submit($create_button_attr); ?>


<?php echo form_close(); ?>
<a class="close-reveal-modal">&#215;</a>

</div>


<div class="three columns">
	 <div class="panel hide-on-phones">

		<div class="row">
                        <div class="twelve columns">
<a href="#" id="MemberRegister" class="nice small radius button" data-reveal-id="registration"> Become a Member</a>
                        </div>
		 </div>
                 <div class="row">
		           <div class="twelve columns">
                                <p><b><h5>MEMBERSHIP IS FREE</h5></b>Discounts available on bulk purchase....<br /><a href="#">Read More &rarr;</a></p>
                        </div>
		     </div>
                
		<div class="row">
			<div class="twelve columns">
				<p>Stay in touch by following us on Twitter</p>
				<p class="left follow" style="width: 125px; overflow: hidden;">
<a href="http://twitter.com/ticke" class="twitter-follow-button" data-show-count="false">Share on twitter</a>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></p>
			</div>
		
		</div>
		
			<div class="row">
				<div class="twelve columns">
					
					<div style="margin: 2px 0px;" style="float:left;">
					<p style="line-height: 18px; color: rgb(51, 51, 51); font-size: 14px;">Already a member? <a style="font-size: 12px;font-weight:bold;" href="#" class="sign-in-log">Sign In</a></p>
					<div id="signupbox_beta" style="margin:20px 0px">
						
						<form id="signthree" action="">
						<div  >
							<span style="display: block;  padding: 3px 0px;color:#999;font-size:12px;">Email address </span><input type="text"  id="email_news_beta" name="email_news_beta" maxlength="60" placeholder="Email" class="input-text" style="float: left; width: 160px;border:1px solid 333;background-color: #ffffcd;">
							<input type="hidden" value="" id="referrer_beta" name="referrer_beta">
							<div id="errorEmail_beta" class="clear cred leftblock" style="width: 200px; height: 15px;">&nbsp;</div>
						</div>
						<div class="clear" style="margin-top: 3px;">
						<span style="display: block;padding: 3px 0px;color:#999;font-size:12px;">Password  &nbsp;<a href="<?php echo base_url(); echo 'index.php/main/passwdreset/';?>" class="cred" style="font-size: 11px;">forgot password?</a></span><input type="password" placeholder="Password" class="input-text" value="" id="post_news_beta" name="post_news_beta" maxlength="32" style="float: left; width: 160px;border:1px solid 333;background-color: #ffffcd;">
						<div id="errorPost_beta" class="cred" style="height: 15px; width: 200px;">&nbsp;</div>
						</div>
						
						<div class="clear">
						<input type="submit" value="Login" id="submit_email_beta" style="margin: 10px 0px;float:left;">
						</div>
						
					  </form>
					
					</div>
		
						</div>
						
						</div>
			</div>
			</div>
</div>

</div>


</li>
</ul>



