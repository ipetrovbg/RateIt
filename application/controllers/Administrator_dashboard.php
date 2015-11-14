<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrator_dashboard
 *
 * @author Peter
 */
class Administrator_dashboard extends CI_Controller{
    public function __construct() {
        
        parent::__construct();
        
        $this->load->model('User');

        $this->load->helper('form');

        $this->load->library('form_validation');
    }
    public function index() {
        if($this->session->rights == 2) :
            
            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $data['title'] = $data['member_info']['full_name'] . " - Dashboard - Rate it";

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $data['get_unreaded_mails'] = $this->User->get_unreaded_mails();

            $data['inbox'] = $this->User->get_all_receiv_mails($this->session->username);

            $templates[0] = 'Dashboard_header';
            $templates[1] = 'Dashboard';

            if ($data['count_unreaded_message'] > 0) {

                $templates[2] = 'dashboard/Show_unreaded_messages';
                $templates[3] = 'Dashboard_footer';
            }else{

                $data['show_unreaded_message'] = "There are no new messages to show them!";
                $templates[3] = 'dashboard/No_messages';
                $templates[4] = 'Dashboard_footer';
            }

            
            

            $data['error'] = ' ';
            
           
            
            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
            
            else:
                redirect("Dashboard");
        endif;
    }
}
