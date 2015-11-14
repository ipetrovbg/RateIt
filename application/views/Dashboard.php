<div class="col-md-6 login-left">
    <h3><span class="full_name">Full name:</span> <?php echo $member_info['full_name']; ?></h3>
    <div class="member_picture"><img src="<?php echo base_url() . $member_info['pic']; ?>"></div>
    <div>
        <?php
//        switch ($this->session->rights) {
//            case 0:
//                echo $this->session->username . " Common user";
//                break;
//            case 1:
//                echo $this->session->username . " Moderator";
//                break;
//            case 2:
//                echo $this->session->username . " Administrator";
//                break;
//        }
        ?></div>
</div>
