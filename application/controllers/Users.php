<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User', '', TRUE);
        $this->load->library('form_validation');
    }

    public function registration() {
        if ($this->session->username) {

            //If session, redirect to Dashboard page
            redirect('index');
        } else {
            $data['title'] = "Rate it - Registration";

            $templates[0] = 'Register';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        }
    }

    public function verifyRegister() {


        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $date = date('Y-m-d H:i');
        if (strlen($username) > 0) {
            $check = $this->User->is_registered($username, $email);
        } else {
            $check = 1;
        }


        if ($check == 0) {
            echo $check;
            $password = sha1($password);
            $this->User->add_user($username, $password, $full_name, $email, $date);
            $this->User->add_success_registered_message($username);
        } else {
            echo $check;
        }
    }

    public function have_Registered() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $check = $this->User->is_Registered($username, $email);

        echo $check;
    }

    public function login() {
        if ($this->session->username != NULL) {
            redirect('Dashboard');
            //If session, redirect to Dashboard page
        } else {
            $data['title'] = "Rate it - Login";

            $templates[0] = 'Login';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/Login');
    }

    public function has_username() {
        $username = $this->input->post('username');

        $result = $this->User->get_username($username);

        if ($result == 1) {
            echo "1";
        } elseif ($result > 1) {
            echo 2;
        } else {
            echo 0;
        }
    }

    public function verifyLogin() {

        $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

        $data['title'] = "Rate it - Validation errors";
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to Login page

            $templates[0] = 'Login';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        } else {
            //Go to private area
            switch ($this->session->rights) {
                case 0:
                    redirect('Dashboard');
                    break;
                case 1:
                    redirect('Moderator_dashboard');
                    break;
                case 2:
                    redirect('ad');
                    break;
            }
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->User->Login($username, $password);

        if ($result) {
            //var_dump($result);
            $this->session->username = $result['username'];
            $this->session->rights = $result['rights'];

            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    public function change_password_view() {

        $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

        $member_id = $this->User->get_member_id($this->session->username);

        $data['member_info'] = $this->User->getInfo($member_id['id']);


        $data['title'] = "Rate it - Change password";

        $templates[0] = 'Dashboard_header';
        $templates[1] = 'Dashboard';
        $templates[2] = 'Change_password';
        $templates[3] = 'Dashboard_footer';

        $data['dynamic'] = $templates;

        $this->load->view('template/Main', $data);
    }

    public function change_username_view() {

        $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

        $member_id = $this->User->get_member_id($this->session->username);

        $data['member_info'] = $this->User->getInfo($member_id['id']);


        $data['title'] = "Rate it - Change username";

        $templates[0] = 'Dashboard_header';
        $templates[1] = 'Dashboard';
        $templates[2] = 'Change_username';
        $templates[3] = 'Dashboard_footer';

        $data['dynamic'] = $templates;

        $this->load->view('template/Main', $data);
    }

    public function change_username() {
        $this->form_validation->set_rules('old_username', 'Old username', 'trim|required');
        $this->form_validation->set_rules('new_username', 'New username', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->change_username_view();
        } else {

            if ($this->User->get_username($this->input->post('new_username')) == 0) {
                if ($this->session->username == $this->input->post('old_username')) {
                    $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                    $member_id = $this->User->get_member_id($this->session->username);

                    $data['member_info'] = $this->User->getInfo($member_id['id']);
                    $data['title'] = "Rate it - Successfully changed username";
                    $data['success'] = "Successfully changed your username!";

                    $this->User->update_all_member_mails($this->session->username, $this->input->post('new_username'));

                    $this->User->change_username($this->input->post('new_username'));
                    
                    $this->session->username = $this->input->post('new_username');
                    
                    $templates[0] = 'Dashboard_header';
                    $templates[1] = 'Dashboard';
                    $templates[2] = 'Change_username_success';
                    $templates[3] = 'Dashboard_footer';

                    $data['dynamic'] = $templates;

                    $this->load->view('template/Main', $data);
                } else {
                    $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                    $member_id = $this->User->get_member_id($this->session->username);

                    $data['member_info'] = $this->User->getInfo($member_id['id']);
                    $data['title'] = "Rate it - Fail change username";
                    $data['no_success'] = "Fatal fail. You can't change the username!";


                    $templates[0] = 'Dashboard_header';
                    $templates[1] = 'Dashboard';
                    $templates[2] = 'Change_username_no_success';
                    $templates[3] = 'Dashboard_footer';

                    $data['dynamic'] = $templates;

                    $this->load->view('template/Main', $data);
                }
            } else {
                $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

                $member_id = $this->User->get_member_id($this->session->username);

                $data['member_info'] = $this->User->getInfo($member_id['id']);
                $data['title'] = "Rate it - Fail change username";
                $data['no_success'] = "The username alrady exist in the DataBase!";


                $templates[0] = 'Dashboard_header';
                $templates[1] = 'Dashboard';
                $templates[2] = 'Change_username_no_success';
                $templates[3] = 'Dashboard_footer';

                $data['dynamic'] = $templates;

                $this->load->view('template/Main', $data);
            }
        }
    }

    public function check_username($username) {

        if ($this->User->check_username($this->session->username, $username) == 1) {

            return TRUE;
        } else {

            $this->form_validation->set_message('check_username', 'The old username is incorrect!');
            return FALSE;
        }
    }

    public function change_password() {

        $this->form_validation->set_rules('old_password', 'Old password', 'trim|required|callback_chack_password');
        $this->form_validation->set_rules('new_password', 'New password', 'trim|required');
        $this->form_validation->set_rules('new_passwordconf', 'Confirm new password', 'trim|required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {

            $this->Change_password_view();
        } else {

            $data['count_unreaded_message'] = $this->User->count_unreaded_message($this->session->username);

            $password = sha1($this->input->post('new_password'));

            $this->User->Change_password($password);

            $member_id = $this->User->get_member_id($this->session->username);

            $data['member_info'] = $this->User->getInfo($member_id['id']);


            $data['title'] = "Rate it - Successfully change password";

            $data['success'] = "Successfully change your password!";

            $templates[0] = 'Dashboard_header';
            $templates[1] = 'Dashboard';
            $templates[2] = 'Change_password_success';
            $templates[3] = 'Dashboard_footer';

            $data['dynamic'] = $templates;

            $this->load->view('template/Main', $data);
        }
    }

    public function chack_password($password) {
        $password = sha1($password);

        if ($this->User->check_password($this->session->username, $password) == 1) {

            //////   the password mach with the database password of this member ////////
            return TRUE;
        } else {

            //////   the password not mach with the database password of this member ////////
            $this->form_validation->set_message('chack_password', 'The Old password is incorrect!');
            return FALSE;
        }
    }

}
