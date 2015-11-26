<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('User');
        
        $this->load->model('Pub_model');
    }
    

    public function index() {
        
        $data['categories'] = $this->Pub_model->get_limit_category(3);
        
        // title of the page
        $data['title'] = "Rate it - Home";

        //get session
        $id = $this->User->get_member_id($this->session->username);

        //get user info from model user
        $data['member_info'] = $this->User->getInfo($id['id']);
        
        $data['pubs'] = $this->Pub_model->get_featurd_pubs();
        
        $data['pubs_slider'] = $this->Pub_model->get_pubs_slider(7);
        

        $templates[0] = 'Index';
        
        $data['dynamic'] = $templates;

        $this->load->view('template/Main', $data);
    }

}
