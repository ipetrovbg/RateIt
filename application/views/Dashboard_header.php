<div class="content">
    <div class="register">
        <div class="col-md-12 dashboard_primary_menu">
            <ul>
                <li><?php echo anchor('upload', 'Profile picture', 'Change profile picture') ?></li>
                <li><?php echo anchor('change-password', 'Password', 'Change password') ?></li>
                <li><?php echo anchor('change-username', 'Username', 'Change username') ?></li>
                <li><?php echo anchor('inbox', 'Inbox ' . $count_unreaded_message . '', 'Inbox') ?></li>
                <li><?php echo anchor('sended', 'Sent', 'Sent') ?></li>
                <li><?php echo anchor('send-item', 'Send Message', 'Send Message') ?></li>

            </ul>
            <div class="clear"></div>
            <div class="ad"><?php echo $this->session->mode; ?> Dashboard <?php echo anchor('users/logout', 'Logout', 'Logout') ?></div>
            <?php if ($this->session->rights > 0): ?>
            
                <ul>
                    <li><?php echo anchor('creating-category', 'Create Category', 'Create Category'); ?></li>
                    <li><?php echo anchor('upload-new-pub', 'Upload Pub', 'Upload Pub'); ?></li>
                </ul>
            
            <?php endif; ?>
        </div>