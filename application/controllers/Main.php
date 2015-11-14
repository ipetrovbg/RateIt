<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User');
    }
    

    public function index() {
        
        // title of the page
        $data['title'] = "Rate it - Home";

        //get session
        $id = $this->User->get_member_id($this->session->username);

        //get user info from model user
        $data['member_info'] = $this->User->getInfo($id['id']);

        $templates[0] = 'Index';
        
        $data['dynamic'] = $templates;

        $this->load->view('template/Main', $data);
    }

}
