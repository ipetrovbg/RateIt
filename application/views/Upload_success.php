


<!--
<ul>
<?php //foreach ($upload_data as $item => $value):?>
<li><?php //echo $item;?>: <?php //echo $value;?></li>
<?php //endforeach; ?>
</ul>
-->

<div class="col-md-6 login-right">
<h3>Your file was successfully uploaded!</h3>
<img src="<?php echo base_url().'assets/profile/new_'.$upload_data['file_name']; ?>" />
<?php 
$hidden = array('pic' =>  base_url().'assets/profile/new_'.$upload_data['file_name'], 'id' => $member_info['id']);
echo form_open('upload/resize', '', $hidden);
?>

<?php echo form_submit('resize', 'Next'); ?>

<?php form_close(); ?>
<?php echo " "; ?>
<?php echo anchor('upload', 'Upload Another File!', array('title'=>'Upload Another File!', 'class'=>'acount-btn')); ?>
</div>