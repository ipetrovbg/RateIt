<?php
$cat_name = array(
    'name' => 'cat_name',
    'id' => 'cat_name',
    'value' => '',
);
?>
<div class="col-md-6 login-right">
    <?php echo validation_errors(); ?>
    <?php echo form_open('Pub/create_category', 'post'); ?>
    <?php echo form_label('Category name*', 'cat_name'); ?>
    <?php echo form_input($cat_name); ?>
    <?php echo form_submit('Create', 'Create'); ?>
    <?php echo form_close(); ?>
</div>