<?php
/////////////////////////////////////   start input variable  //////////////////////////////////////////	
	$old_password = array(
        'name'          => 'old_password',
        'id'            => 'old_password',
        'value'         => '',
    );

	$new_password = array(
        'name'          => 'new_password',
        'id'            => 'new_password',
        'value'         => '',
    );
    $new_passwordconf = array(
        'name'          => 'new_passwordconf',
        'id'            => 'new_passwordconf',
        'value'         => '',
    );
    $attributes = array(
        'style' => 'color: #999;font-size:0.95em;display: block;font-weight: 500;'
    );
    /////////////////////////////////////   end input variable  ////////////////////////////////////////
?>
<div class="col-md-6 login-right">
	<h3>Changing password</h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open('users/change_password'); ?>
	<?php echo form_label('Old password*', 'old_password', $attributes); ?>
	<?php echo form_password($old_password); ?>
	<?php echo form_label('New password*', 'new_password', $attributes); ?>
	<?php echo form_password($new_password); ?>
	<?php echo form_label('Confirm new password*', 'new_passwordconf', $attributes); ?>
	<?php echo form_password($new_passwordconf); ?>
	<?php echo form_submit('submit', 'Change'); ?>
	<?php echo form_close(); ?>
</div>