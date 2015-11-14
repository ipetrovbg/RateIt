<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author Peter * @author Peter * @author Peter
 */
class Dashboard extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('User');

        $this->load->helper('form');

        $this->load->library('form_validation');

        
    }

    public function index() {
        if ($this->session->username) {

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
            
        } else {
            redirect('users/Login');
        }
    }


        //////////////////////////////// START MAIL SISTEM //////////////////////////////

    public function inbox($arg=FALSE)
    {
        // проверявам дали е логнал се потребител. Ако не е го връщам в логин страницата redirect('user/login_view');
        if ($this->session->username) {

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            // проверявам дали потребителя е изпрал мейл. Ако е избрал му го показвам, но ако не е му показвам 
            // всички негови мейли
            if ($arg != FALSE) {

                // проверявам дали е проченет мейла. Ако не е го ъпдейтвам. readed - date('Y-m-d');
                if ($this->User->is_readed($arg) == 1) {

                    $this->User->update_readed($arg);

                }
                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);

                $data['message'] = $this->User->get_receiv_mail($this->session->username, $arg);
                
                $data['receiver_pic'] = $this->User->show_user_pic($data['message']['sender']);

                $data['title'] = $data['message']['title'] . ' - Inbox';

                $templates[0] = 'Dashboard_header';
                $templates[1] = 'dashboard/Reseive_message';
                $templates[2] = 'dashboard/Send_mail';
                $templates[3] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);

            }else{


                $data['title'] = "Inbox";

                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);

                $data['inbox'] = $this->User->get_all_receiv_mails($this->session->username);

                $templates[0] = 'Dashboard_header';
                $templates[1] = 'dashboard/Inbox';
                $templates[2] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            }

            

        }else{

            redirect('users/Login');

        }
    }

    public function sended($msg=FALSE, $arg=FALSE)
    {
        // проверявам дали е логнал се потребител. Ако не е го връщам в логин страницата redirect('user/login_view');
        if ($this->session->username) {
            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            // проверявам дали потребителя е изпрал мейл. Ако е избрал му го показвам, но ако не е му показвам 
            // всички негови мейли
            if ($arg != FALSE) {

                $data['message'] = $this->User->get_sended_mail($this->session->username, $arg);
                
                $data['receiver_pic'] = $this->User->show_user_pic($data['message']['receiver']);
                
                $data['title'] = $data['message']['title'] . ' - Sended';

                $templates[0] = 'Dashboard_header';
                $templates[1] = 'dashboard/Sended_message';
                $templates[2] = 'dashboard/Send_mail';
                $templates[3] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);

            }else{

                $data['title'] = "Send";
                if ($msg) {
                    $data['msg'] = $msg;
                }else{
                    $data['msg'] = NULL;
                }
                

                $data['sended'] = $this->User->get_all_sended_mails($this->session->username);

                $templates[0] = 'Dashboard_header';
                $templates[1] = 'dashboard/Sended';
                $templates[2] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            }

            

        }else{

            redirect('user/Login_view');

        }
    }

    public function send_view()
    {
        if ($this->session->username) {

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $data['title'] = "Sending Mail";


            $templates[0] = 'Dashboard_header';
            $templates[1] = 'dashboard/Send_mail';
            $templates[2] = 'Dashboard_footer';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);

        }else{
            redirect('users/Login');
        }
    }

    public function send()
    {
        if ($this->session->username) {

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);
            
            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);

            $this->form_validation->set_rules('receiver', 'message to', 'required|callback_has_username');
            $this->form_validation->set_rules('title', 'Title Mail', 'required');
            $this->form_validation->set_rules('message', 'Text Mail', 'required');

            if ($this->form_validation->run() === FALSE) {
                
                $this->send_view();

            }else{  

                $this->User->add_new_mail();
                $msg = "Sended successfully!";
                $this->sended($msg);
            }

        }else{
            redirect('users/Login');
        }


    }

    function has_username($username)
    { 
        if($this->User->get_username($username) == 1){

            return TRUE;

        }else{

            $this->form_validation->set_message('has_username', $username . ' does not exist in the Database!');
            return FALSE;
        }
    }

    public function delete_receive_message()
    {
        //$this->input->post('id_mail');
        if ($this->session->username) {

                
                
                $this->User->delete_receive_mail($this->input->post('id_mail'));

                $this->index();
            

        }else{
            redirect('users/Login');
        }

    }

    public function delete_sended_message()
    {
        //$this->input->post('id_mail');
        if ($this->session->username) {

                
                
                $this->User->delete_sended_message($this->input->post('id_mail'));

                $this->index();
            

        }else{
            redirect('users/Login');
        }

    }

    /////////////////////////////////////  END MAIL SISTEM /////////////////////////////////

}
