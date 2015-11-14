<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rateit
 *
 * @author Peter
 */
class Rateit extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('User');        
        
        $this->load->model('Rateit_model');
        
    }

    public function index() {
        if ($this->session->username):
            $id = $this->input->post('rateit');
            $stars = $this->input->post('stars');
            $member_id = $this->User->get_member_id($this->session->username);
            if($this->Rateit_model->check_rate($member_id['id'], $id) < 1):
                $this->Rateit_model->insert_rate($id, $stars, $member_id['id']);
            
                echo  "Thank you for rating!";
                else:
                    echo "You already rate this Pub!<br />Rate anather one! :)";
            endif;
            
            
        else:
            
            echo "<div style='border-bottom: 1px dashed #2da5da; margin-bottom: 5px;' class='err_msg'>"
            . "You are not registered user. Please registee at <a href='".  base_url()."index.php/Users/registration'>Registration</a>"
                . " or <a href=".  base_url()."index.php/users/login>Login</a></div>";
            
        endif;
    }

}
