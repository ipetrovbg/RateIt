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
        //$this->output->enable_profiler();
    }

    public function index() {
        if ($this->session->username) {

            echo "Hello Pub";
        }
    }

    public function create_category_view() {
        if ($this->session->rights == 1 || $this->session->rights == 2) {
            
            $data['categories'] = $this->Pub_model->get_limit_category(3);

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
            
            $data['categories'] = $this->Pub_model->get_limit_category(3);

            $this->form_validation->set_rules('cat_name', 'Category name', 'trim|required|callback_has_category');
            if ($this->form_validation->run() == FALSE) {
                $this->create_category_view();
            } else {
                $data['categories'] = $this->Pub_model->get_limit_category(3);

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

    public function has_category($category) {
        if ($this->Pub_model->get_category($category) == 0) {

            return TRUE;
        } else {

            $this->form_validation->set_message('has_category', 'Category already exist in the Database!');
            return FALSE;
        }
    }

    public function upload_pub_view() {
        if ($this->session->username) :
            
            $data['categories'] = $this->Pub_model->get_limit_category(3);

            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $data['title'] = "Creating a new category - Dashboard - Rateit";

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $data['error'] = ' ';


            $templates[0] = "Dashboard_header";
            $templates[2] = "pubs/upload_pub_view";
            $templates[3] = 'Dashboard_footer';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        endif;
    }

    public function do_upload() {
        if ($this->session->username) {
            
            
            
            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $config['upload_path'] = './assets/pubs/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 7524;
            $config['max_height'] = 5568;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                
                $data['categories'] = $this->Pub_model->get_limit_category(3);

                $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                $data['error'] = $this->upload->display_errors();

                $data['categories'] = $this->Pub_model->get_all_category();

                $data['title'] = "Error";

                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);

                /////////////////////////////// template   ///////////////////////////////////////

                $templates[0] = 'Dashboard_header';
                $templates[1] = "pubs/upload_pub_view";
                $templates[3] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            } else {
                
                $data['categories'] = $this->Pub_model->get_limit_category(3);
                
                $data_img = $this->upload->data();
                
                $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                $data['error'] = $this->upload->display_errors();

                $data['title'] = "Successfully upload new pub";

                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);

                $id = $this->User->get_member_id($this->session->username);

                $data['categories'] = $this->Pub_model->get_all_category();
                
//                NEXT IS CODE FOR UPLOADING DIFERENT IMAGE SIZE FOR THIS PUB

                $pub_upload_data_array = array(
                    $this->input->post('pub_title'),
                    $this->input->post('description'),
                    $id['id'],
                    $this->input->post('category')
                );
                //var_dump($thumb);
                $this->Pub_model->upload_pub($pub_upload_data_array);


                

                $origin_size = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'origin_size',
                    $data_img['file_name']
                        //$thumb['new_image'],                    
                );
                //uploading origin img for this pub in db
                $this->Pub_model->upload_pub_img($origin_size);
                
//                echo "<pre>";
//                var_dump($this->upload->data());

                // CALL RESIZE METHOD //
                $thumb = $this->Upload_picture->resize($this->upload->data(), 300, 'height300', '_');
                
                
                
                $thumb_new_image = '/home/prinkkpb/public_html/rateit/assets/pubs/' . $thumb['new_image'];
                $crop451x145 = $this->Upload_picture->crop($thumb_new_image, $thumb['new_image'], 451, 145, 'crop451x145', '_');
                $crop451x145_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'crop451x145',
                    $crop451x145['new_image']
                );
                //uploading thumb crop451x145_array img for this pub in db
                $this->Pub_model->upload_pub_img($crop451x145_array);
                
                $height400 = $this->Upload_picture->resize($this->upload->data(), 400, 'height400', '_');
                $thumb_height400 = '/home/prinkkpb/public_html/rateit/assets/pubs/' . $height400['new_image'];
                $crop400x300 = $this->Upload_picture->crop($thumb_height400, $height400['new_image'], 300, 400, 'crop300x400', '_');
                $crop300x400_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'crop300x400',
                    $crop400x300['new_image']
                );
                //uploading thumb crop451x145_array img for this pub in db
                $this->Pub_model->upload_pub_img($crop300x400_array);
                
                
                ////////////////       200x250   //////////////////
                
                
                $height250 = $this->Upload_picture->resize($this->upload->data(), 250, 'height250', '_');
                $thumb_height250 = '/home/prinkkpb/public_html/rateit/assets/pubs/' . $height250['new_image'];
                $crop200x250 = $this->Upload_picture->crop($thumb_height250, $height250['new_image'], 200, 250, 'crop200x250', '_');
                $crop200x250_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'crop200x250',
                    $crop200x250['new_image']
                );
                //uploading thumb crop451x145_array img for this pub in db
                $this->Pub_model->upload_pub_img($crop200x250_array);
                
                ////////////////        200x250   //////////////////
                
                /////////////////       width 1041 //////////////////
                
                $width1200 = $this->Upload_picture->resize_width($this->upload->data(), 1200, 'width1200', '_');
                $thumb_width1200 = '/home/prinkkpb/public_html/rateit/assets/pubs/' . $width1200['new_image'];
                $crop1200x497 = $this->Upload_picture->crop($thumb_width1200, $width1200['new_image'], 1200, 497, 'crop1200x497', '_');
                $crop1200x497_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'crop1200x497',
                    $crop1200x497['new_image']
                );
                //uploading thumb crop451x145_array img for this pub in db
                $this->Pub_model->upload_pub_img($crop1200x497_array);
                
                /////////////////       width 1041 //////////////////
                
                
                // CALL NEW RESIZE METHOD //
                $height229 = $this->Upload_picture->resize($this->upload->data(), 229, 'height229', '_');
                
                $new_image_path = '/home/prinkkpb/public_html/rateit/assets/pubs/' . $height229['new_image'];
                
                $crop200 = $this->Upload_picture->crop($new_image_path, $height229['new_image'], 209, 192, 'crop200', '_');
                
                $crop195x195 = $this->Upload_picture->crop($new_image_path, $height229['new_image'], 195, 195, 'crop195x195', '_');
                
                $crop195x195_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'crop195x195',
                    $crop195x195['new_image']
                );
                //uploading thumb crop195x195 img for this pub in db
                $this->Pub_model->upload_pub_img($crop195x195_array);
                
                $crop229_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'crop200',
                    $crop200['new_image']
                );
                //uploading thumb height497 img for this pub in db
                $this->Pub_model->upload_pub_img($crop229_array);
                
                $height497 = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'height497',
                    $thumb['new_image']
                );
                //uploading thumb height497 img for this pub in db
                $this->Pub_model->upload_pub_img($height497);
                
                
                
                $height229_array = array(
                    $this->input->post('pub_title'),
                    $id['id'],
                    'height229',
                    $height229['new_image']
                );
                //uploading thumb height497 img for this pub in db
                $this->Pub_model->upload_pub_img($height229_array);
                
//                END OF UPLOADING DIFERENT IMG SIZE OF THIS PUB

                $templates[0] = 'Dashboard_header';
                $templates[1] = "pubs/upload_pub_succsess";
                $templates[2] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            }
        } else {
            redirect('users/login');
        }
    }

}
