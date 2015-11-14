<div class="col-md-6 login-right">

    <div class="error_hendler"><?php echo $error; ?></div>

    <h3>Change your profile picture</h3>

    <?php echo form_open_multipart('upload/do_upload'); ?>

    <?php
    if ($member_info['pic'] != "assets/images/default_pic.png") {
        ?>
        <!-- filename of thumb pic-->
        <?php $base_name_pic = basename($member_info['pic']); ?>

        <!-- filename of big pic-->
        <?php $big_pic = explode('new_', $base_name_pic); ?>

        <!-- the name of directory, where are the pictures-->
        <?php $dir = dirname($member_info['pic']); ?>

        <!-- building full path of big picture -->
        <?php $big_pic_real_path = realpath($dir . DIRECTORY_SEPARATOR . $big_pic[1]); ?>

        <!-- building full path of thumb picture -->
        <?php $thumb_pic_real_path = realpath($dir . DIRECTORY_SEPARATOR . $base_name_pic); ?>
        <?php
        $big_pic = array(
            'type' => 'hidden',
            'name' => 'big_pic',
            'value' => $big_pic_real_path
        );
        $thumb_pic = array(
            'type' => 'hidden',
            'name' => 'thumb_pic',
            'value' => $thumb_pic_real_path
        );

        echo form_input($big_pic);

        echo form_input($thumb_pic);
    }else{
        $big_pic = array(
            'type' => 'hidden',
            'name' => 'big_pic',
            'value' => 1
        );
        $thumb_pic = array(
            'type' => 'hidden',
            'name' => 'thumb_pic',
            'value' => 1
        );
        echo form_input($big_pic);

        echo form_input($thumb_pic);
    }
    ?>
    <input type="file" name="userfile" size="" />

    <?php echo form_submit('upload', 'Upload'); ?>
    <?php echo form_close(); ?>
</div>
