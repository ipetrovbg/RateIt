<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categories
 *
 * @author Peter
 */
class categories extends CI_Controller{
    public function __construct() {
        parent::__construct();

        $this->load->model('User');
        
        $this->load->model('Pub_model');
    }
    
    public function index() {
        // title of the page
        $data['title'] = "Rate it - Categories";

        //get session
        $id = $this->User->get_member_id($this->session->username);

        //get user info from model user
        $data['member_info'] = $this->User->getInfo($id['id']);
        
        $data['categories'] = $this->Pub_model->get_limit_category(3);

        $templates[0] = 'Categories';
        
        $data['dynamic'] = $templates;

        $this->load->view('template/Main', $data);
    }
    
    public function category($param) {
        // title of the page
        $data['title'] = "Rate it - Categories";

        //get session
        $id = $this->User->get_member_id($this->session->username);

        //get user info from model user
        $data['member_info'] = $this->User->getInfo($id['id']);
        
        $data['categories'] = $this->Pub_model->get_limit_category(3);
        
        $data['category'] = $this->Pub_model->get_category_by_id($param);
        
        $templates[0] = 'Category';
        
        $data['dynamic'] = $templates;

        $this->load->view('template/Main', $data);
    }
}
