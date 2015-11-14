
<div class="content">
    <div class="register">
         <div id="response_reg"></div>
        <?php echo form_open('users/verifyregister', 'post'); ?>
            <div class="register-top-grid">
                <h3>Personal Information</h3>
               
                <div>
                    <span>Full Name<label>*</label></span>
                    <input id="full_name" name="full_name" type="text"> 
                </div>
                <div>
                    <span>Email Address<label>*</label></span>
                    <input id="email" name="email" type="text"> 
                </div>



            </div>
            <div class="register-bottom-grid">
                <h3>Login Information</h3>
                <div>
                    <span>Username<label>*</label></span>
                    <input id="reg_username" name="username" type="text">
                </div>
                <div>
                    <span>Password<label>*</label></span>
                    <input id="reg_password" name="password" type="password">
                </div>
                <div class="clearfix"> </div>
                <div>
                    <span>Confirm Password<label>*</label></span>
                    <input id="reg_conf_password" name="conf_password" type="password">
                </div>

            </div>
            <div class="clearfix"> </div>
            <div class="register-but">
                <input id="submit" type="submit" name="submit" value="submit">
                <div class="clearfix"> </div>

            </div>
        </form>
    </div>
</div>