<div class="content">
    <div class="register">
    <div class="col-md-12 dashboard_primary_menu">
    	<ul>
    		<li><?php echo anchor('upload', 'Profile picture', 'Change profile picture') ?></li>
    		<li><?php echo anchor('change-password', 'Password', 'Change password') ?></li>
    		<li><?php echo anchor('change-username', 'Username', 'Change username') ?></li>
    		<li><?php echo anchor('inbox', 'Inbox ' . $count_unreaded_message . '', 'Inbox') ?></li>
    		<li><?php echo anchor('sended', 'Sended', 'Sended') ?></li>
                <li><?php echo anchor('send-item', 'Send Message', 'Send Message') ?></li>
                
    		<li><?php echo anchor('users/logout', 'Logout', 'Logout') ?></li>
                
    	</ul>
        <ul>
            <li><?php if($this->session->rights > 0): echo anchor('creating-category', 'Create Category', 'Create Category'); endif; ?></li>
        </ul>
    </div>