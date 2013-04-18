
<div id="flashdata" align="center">
    <?php
    if ($this->session->flashdata('RegisterationError')) {
        echo $this->session->flashdata('RegisterationError');
    }
    if ($this->session->flashdata('EmailExistError')) {
        echo $this->session->flashdata('EmailExistError');
    }
    if ($this->session->flashdata('UsernameExistError')) {
        echo $this->session->flashdata('UsernameExistError');
    }

    echo validation_errors();
    ?>
</div>


<div style="margin-right:60px;width:354px; border-right:1px solid #e5e5e5; float:left; height:480px;">

<div id="registration" style="width:980px;margin-top:40px;">

<div style="width:565px;float:right;">
<h2>Create an account</h2>
    <?php $attributes = array('class' => 'nice custom', 'id' => 'registrationform'); ?>
    <?php echo form_open('/registeruser', $attributes); ?>

	<?php $firstname_input_attr = array('name'=>'firstname', 'value' => '', 'class' => 'input-text blue', 'placeholder'=>'First Name', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $lastname_input_attr = array('name'=>'lastname', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Last Name', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $email_input_attr = array('name'=>'email', 'value' => '', 'class' => 'input-text blue',  'placeholder'=>'Email', 'style'=>'width: 286px; height: 40px;') ;?>
	<?php $username_input_attr = array('name'=>'username', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Username', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $gender_attr = array('male'=>'Male', 'female' => 'Female'); ?>
	<?php $passwd_input_attr = array('name'=>'passwd', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Password', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $passwd2_input_attr = array('name'=>'passwd2', 'value' => '', 'class' => 'input-text', 'placeholder'=>'Confirm Password', 'style'=>'width: 286px; height: 40px;'); ?>
	<?php $create_button_attr = array('name'=>'create', 'type'=>'submit', 'value' => 'Create Account', 'class'=>'nice small radius blue button', 'style'=>'width: 286px; height: 40px;'); ?>

        <?php echo form_input($firstname_input_attr); ?>
        <?php echo form_input($lastname_input_attr); ?>

        <?php echo form_input($email_input_attr);?> 

        <?php echo form_input($username_input_attr);?> 
         <?php echo form_dropdown('Gender', $gender_attr); ?>
        <?php echo form_password($passwd_input_attr); ?>
        <?php echo form_password($passwd2_input_attr); ?>
	<?php echo form_submit($create_button_attr); ?>

</div>

<?php echo form_close(); ?>
</div>
</div>

