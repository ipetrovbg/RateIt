<div class="content">
    <div class="register">
        <div class="col-md-6 login-left">
            <h3>New Customers</h3>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <?php echo anchor('users/registration', 'Create an Account', array('title'=>'Create an Account', 'class'=>'acount-btn')); ?>
        </div>
        <div class="col-md-6 login-right">
            <h3>Registered Customers</h3>
            <p>If you have an account with us, please log in.</p>
            <?php

                $username = array(
                'name'          => 'username',
                'id'            => 'username',
                'value'         => '',
                );

                $password = array(
                    'name'          => 'password',
                    'id'            => 'password',
                    'value'         => '',
                );

            ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('users/verifylogin', 'post'); ?>
            <div>
            <?php 
                $attributes = array(
                        'style' => 'color: #999;font-size:0.95em;display: block;font-weight: 500;'
                );
                echo form_label('Username*', 'username', $attributes); ?>
                <?php echo form_input($username); 
            ?>
            </div>
            <div>
                <?php echo form_label('Password*', 'password', $attributes); ?>
                <?php echo form_password($password); ?>
            </div>
            <?php echo anchor('', 'Forgot Your Password?', array('title'=>'Forgot Your Password?', 'class'=>'forgot')); ?>
            <?php echo form_submit('login', 'Login'); ?>
            <?php echo form_close(); ?>
        </div>	
        <div class="clearfix"> </div>
    </div>
</div>