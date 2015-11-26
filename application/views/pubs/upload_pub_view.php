<div class="content">
    <div class="register">
        <div class="col-md-6 login-left">
            <h3>Upload New Pub</h3>
            <p>You are in a new place in town. Please Upload It and then Rate it</p>
        </div>
        <div class="col-md-6 login-right">
            <div class="error_hendler"><?php echo $error; ?></div>
            <?php
            $pub_title = array(
                'name' => 'pub_title',
                'id' => 'Pub_title',
                'value' => '',
            );

            $description = array(
                'name' => 'description',
                'id' => 'description',
                'value' => '',
            );
            $image = array(
                'type' => 'file',
                'name' => 'image',
                'id' => 'image'
            );
            foreach ($categories as $key => $value) {
                $options[$value['id']] = $value['name'];
            }
            
            ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('Pub/do_upload'); ?>
            <div>
                <?php
                $attributes = array(
                    'style' => 'color: #999;font-size:0.95em;display: block;font-weight: 500;'
                );
                echo form_label('Pub name*', 'pub_title', $attributes);
                ?>
                <?php echo form_input($pub_title);
                ?>
            </div>
            <div>
                <?php echo form_label('Description*', 'description', $attributes); ?>
                <?php echo form_textarea($description); ?>
            </div>
            <div>
                <?php echo form_label('Category*', 'category', $attributes); ?>
                <?php
                echo form_dropdown('category', $options, 'large');
                ?>
            </div>
            <div>
                <?php echo form_label('Image*', 'image', $attributes); ?>
                <?php echo form_input($image); ?>
            </div>
            <?php echo form_submit('upload', 'Upload'); ?>
            <?php echo form_close(); ?>
        </div>	
        <div class="clearfix"> </div>
    </div>
</div>
