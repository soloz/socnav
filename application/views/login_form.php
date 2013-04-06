

   <?php
    if ($this->session->flashdata('loginError')) {
        echo $this->session->flashdata('loginError');
    }
    echo validation_errors();
    ?>

	<div class="row">
	<div class="twelve columns">

<div style="width:980px;margin-top:40px;">
	<div style="margin-right:60px;width:354px; border-right:1px solid #e5e5e5; float:left; height:480px;">

		<h2>Sign In</h2>
		<?php $attributes = array('class' => 'nice custom', 'id' => 'loginform'); ?>
		<?php echo form_open('/validatelogin', $attributes); ?>


		<?php $email_input_attr = array('name'=>'email', 'value' => '', 'class' => 'input-text',  'placeholder'=>'Email', 'style'=>'width: 286px; height: 40px;') ;?>
		<?php $passwd_input_attr = array('name'=>'passwd', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Password', 'style'=>'width: 286px; height: 40px;'); ?>
		<?php $signin_button_attr = array('name'=>'signin', 'type'=>'submit', 'value' => 'Sign In', 'class'=>'nice small radius blue button', 'style'=>'width: 286px; height: 40px;'); ?>

		<?php echo form_input($email_input_attr);?> 
		<?php echo form_password($passwd_input_attr); ?>

		<?php echo form_submit($signin_button_attr); ?>


	
		<?php echo form_close(); ?>
			<div style="margin-left:90px; margin-top:10px;"><a href="<?php echo base_url(); echo 'index.php/main/passwdreset/';?>">Forgot password?</a></div>

		</div>
	
<div style="width:565px;float:left;">

	<h2>Create an account</h2>
	    <?php $attributes = array('class' => 'nice custom', 'id' => 'registrationform'); ?>
	    <?php echo form_open('/registeruser', $attributes); ?>

		<?php $firstname_input_attr = array('name'=>'firstname', 'value' => '', 'class' => 'input-text blue', 'placeholder'=>'First Name', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $lastname_input_attr = array('name'=>'lastname', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Last Name', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $email_input_attr = array('name'=>'email', 'value' => '', 'class' => 'input-text blue',  'placeholder'=>'Email', 'style'=>'width: 386px; height: 40px;') ;?>
		<?php $username_input_attr = array('name'=>'username', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Username', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $passwd_input_attr = array('name'=>'passwd', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Password', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $passwd2_input_attr = array('name'=>'passwd2', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Confirm Password', 'style'=>'width: 386px; height: 40px;'); ?>
		<?php $create_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Create Account', 'class'=>'nice small radius blue button', 'style'=>'width: 386px; height: 40px;'); ?>

	        <?php echo form_input($firstname_input_attr); ?>
	        <?php echo form_input($lastname_input_attr); ?>

	        <?php echo form_input($email_input_attr);?> 

	        <?php echo form_input($username_input_attr);?> 
	        <?php echo form_password($passwd_input_attr); ?>
	        <?php echo form_password($passwd2_input_attr); ?>
			<?php echo form_submit($create_button_attr); ?>

			<?php echo form_close(); ?>

<input type="checkbox" style="float:left; clear:both;" id="reg_checkbox" checked><label id="label" style="float:left" for="reg_checkbox">I agree to receive email newsletters from Ticke</label>

   <div style="float:left; border-radius: 6px; width: 376px; min-height:154px; background-color: #EEEEEE; margin-top: 15px; padding:10px;clear:both;">
	By creating an account, you agree to the privacy policy below:
					<div style="overflow:scroll; height:80px;margin-top:5px;margin-bottom:14px;" id="terms_agreements">
						<p class="c3 c2"><span></span></p><h6 class="c2"><span>Maintaining your privacy</span></b><p class="c2"><span class="c1">Tickets Pty Ltd owns and operates this website &lsquo;</span><span class="c1 c11">Lasttix.com.au</span><span class="c1">&rsquo;. We have created this Privacy Policy to demonstrate our commitment to maintaining the privacy and accuracy of your personal information. We take all reasonable precautions to ensure the personal information we collect, use and disclose is accurate and current. However, the accuracy of that information depends largely on the information you provide.<br></span></p>
					</div>
	</div>
	
	</div>

</div>
</div>
</div>
