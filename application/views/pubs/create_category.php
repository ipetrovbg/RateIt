<div class="content">
    <div class="register">
        <div class="col-md-6 login-left">
            <h3>Create New Category</h3>
            <p>Create new category. Example: Hotels, Bars, Pubs ... etc.</p>
        </div>
        <?php
        $cat_name = array(
            'name' => 'cat_name',
            'id' => 'cat_name',
            'value' => '',
        );
        $attributes = array(
            'style' => 'color: #999;font-size:0.95em;display: block;font-weight: 500;'
        );
        ?>
        <div class="col-md-6 login-right">
            <?php echo validation_errors(); ?>

            <?php echo form_open('Pub/create_category', 'post'); ?>
            <div>
                <?php echo form_label('Category name*', 'cat_name', $attributes); ?>

                <?php echo form_input($cat_name); ?>
            </div>
            <?php echo form_submit('Create', 'Create'); ?>

            <?php echo form_close(); ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>