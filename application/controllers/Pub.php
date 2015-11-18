<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload_pub
 *
 * @author Peter
 */
class Pub extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'file', 'url'));

        $this->load->model('User');

        $this->load->model('Pub_model');

        $this->load->model('Upload_picture');

        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->username) {
            echo "Hello Pub";
            
            
            
        }
    }

    public function create_category_view() {
        if ($this->session->rights == 1 || $this->session->rights == 2) {

            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $data['title'] = "Creating a new category - Dashboard - Rateit";

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $templates[0] = "Dashboard_header";
            $templates[1] = "pubs/create_category";
            $templates[2] = 'Dashboard_footer';
            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        } else {
            redirect("main");
        }
    }

    public function create_category() { //creating-category / routes
        if ($this->session->rights > 0) {

            $this->form_validation->set_rules('cat_name', 'Category name', 'trim|required|callback_has_category');
            if ($this->form_validation->run() == FALSE) {
                $this->create_category_view();
            } else {
                
                $member_id = $this->User->get_member_id($this->session->username);
                
                $data['member_info'] = $this->User->getInfo($member_id['id']);

                $data['title'] = "Creating a new category - Dashboard - Rateit";

                $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                

                $this->Pub_model->create_category($this->input->post('cat_name'), $member_id['id']);
                
                $data['success'] = "Successfuly created new category!";

                $templates[0] = "Dashboard_header";
                $templates[1] = "pubs/success_create_category";
                $templates[2] = "pubs/create_category";
                $templates[3] = 'Dashboard_footer';
                
                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            }
        } else {
            redirect("main");
        }
    }
    
    public function has_category($category)
    {
        if($this->Pub_model->get_category($category) == 0){

            return TRUE;

        }else{

            $this->form_validation->set_message('has_category', 'Category already exist in the Database!');
            return FALSE;
        }
    }

}
