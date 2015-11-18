<?php
	$old_username = array(
        'name'          => 'old_username',
        'id'            => 'old_username',
        'value'         => ''
    );

	$new_username = array(
        'name'          => 'new_username',
        'id'            => 'new_username',
        'value'         => ''
    );

    $attributes = array(
        'style' => 'color: #999;font-size:0.95em;display: block;font-weight: 500;'
    );

?>
<div class="col-md-6 login-right">
	<h3>Changing username</h3>
	<?php echo validation_errors(); ?>
	<?php echo form_open('Users/change_username'); ?>
	<?php echo form_label('Old username*', 'old_username', $attributes); ?>
	<?php echo form_input($old_username); ?>
	<?php echo form_label('New username*', 'new_username', $attributes); ?>
	<?php echo form_input($new_username); ?>
	<?php echo form_submit('submit', 'Change'); ?>
	<?php echo form_close(); ?>
</div>