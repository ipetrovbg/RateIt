<?php

class Upload extends CI_Controller {

    public $img;

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'file', 'url'));
        $this->load->model('User');
        $this->load->model('Upload_picture');
    }

    public function index() {
        if ($this->session->username) {

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $data['title'] = "Upload";

            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $templates[0] = 'Dashboard_header';
            $templates[1] = 'Dashboard';
            $templates[2] = 'Upload_form';
            $templates[3] = 'Dashboard_footer';

            $data['dynamic'] = $templates;
            $data['error'] = ' ';

            $this->load->view('template/Main', $data);
        } else {
            redirect('users/login');
        }
    }

    public function do_upload() {
        if ($this->session->username) {

            /*
              $this->load->library('ftp');

              $ftp['hostname'] = 'ftp://ftp.print-decor.eu';
              $ftp['username'] = 'prinkkpb';
              $ftp['password'] = 'printdecoreu89';
              $ftp['debug']        = TRUE;

              $this->ftp->connect($ftp);

              $this->ftp->delete_file($this->input->post('big_pic'));
              $this->ftp->delete_file($this->input->post('thumb_pic'));

              $this->ftp->close();
             */








            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $config['upload_path'] = './assets/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 5024;
            $config['max_height'] = 4068;

            $this->load->library('upload', $config);

            $this->img = $this->upload->data();




            if (!$this->upload->do_upload('userfile')) {



                $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                $data['error'] = $this->upload->display_errors();

                $data['title'] = "Error";

                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);



                /////////////////////////////// template   ///////////////////////////////////////

                $templates[0] = 'Dashboard_header';
                $templates[1] = 'Dashboard';
                $templates[2] = 'Upload_form';
                $templates[3] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            } else {

                if ($this->input->post('big_pic') != 1) {
                    unlink($this->input->post('big_pic'));
                }
                if ($this->input->post('thumb_pic') != 1) {
                    unlink($this->input->post('thumb_pic'));
                }
                
                $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                $img = $this->upload->data();



                $data['img'] = $img['full_path'];

                $data['error'] = $this->upload->display_errors();

                $data['title'] = "Create Thumb";

                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);

                $data['upload_data'] = $this->upload->data();

                $img_thumb = $img['full_path'];

                $img_thumb_name = $img['file_name'];

                $path_count = strlen($img_thumb) - strlen($img_thumb_name);

                $imgg = substr($img_thumb, $path_count);


                $thumb['image_library'] = 'gd2';
                $thumb['source_image'] = $img_thumb;
                //$thumb['create_thumb'] = TRUE;
                $thumb['height'] = 35;
                $thumb['new_image'] = 'new_' . $imgg;

                $this->load->library('image_lib', $thumb);

                $data['resized'] = $this->image_lib->resize();

                $id = $this->User->get_member_id($this->session->username);

                $this->Upload_picture->update_member_picture($id['id'], 'assets/profile/' . $thumb['new_image']);



                $data['data_image'] = $this->image_lib;


                $templates[0] = 'Dashboard_header';
                $templates[1] = 'Dashboard';
                $templates[2] = 'Upload_success';
                $templates[3] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            }
        } else {
            redirect('users/login');
        }
    }

    public function resize() {
        if ($this->session->username) {

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);
            
//              $this->load->library('image_lib');
//              $base_name_pic = basename($this->input->post('pic'));
//              $dir = dirname($this->input->post('pic'));              
//              $thumb_pic_real_path = $dir . DIRECTORY_SEPARATOR . $base_name_pic;
//              var_dump($thumb_pic_real_path);
//              exit();
//              $config['image_library'] = 'gd2';
//              $config['source_image'] = $this->input->post('pic');
//              $config['x_axis'] = 35;
//              $config['y_axis'] = 35;
//              $config['create_thumb'] = TRUE;
//              $config['height']       = 35;
//              $config['new_image'] = 'crop_'.$base_name_pic;
//
//              
//              
//             $this->load->library('image_lib', $config);
             
//              if ( ! $this->image_lib->crop())
//              {
//                $data['display_errors'] = $this->image_lib->display_errors();;
//              }else{
//                  $data['display_errors'] = "Success";
//              }
            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $data['title'] = $data['member_info']['full_name'] . " - Dashboard - Rate it";

            $data['error'] = ' ';



            $templates[0] = 'Dashboard_header';
            $templates[1] = 'Dashboard';
            $templates[2] = 'Upload_form';
            $templates[3] = 'Dashboard_footer';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        } else {
            //redirect('users/Login');
        }
    }

}

?>