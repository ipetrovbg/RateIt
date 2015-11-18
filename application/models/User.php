<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function is_registered($username, $email) {
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->or_where('email', $email);

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getInfo($arg) {

        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('id', $arg);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function get_username($username) {
        $this->db->select('username');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        return $query->num_rows();
    }
    public function show_user_pic($receiver)
    {
        $this->db->select('pic');
        $this->db->from('members');
        $this->db->where('username', $receiver);
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_member_id($username) {
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where('username', $username);
        $this->db->limit(1);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function add_user($username, $password, $full_name, $email, $date) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'full_name' => $full_name,
            'email' => $email,
            'pic' => "assets/images/default_pic.png",
            'rights' => '0',
            'date' => $date
        );
        $this->db->insert('members', $data);
    }

    public function change_password($password)
    {
        $this->db->set('password', $password);
        $this->db->where('username', $this->session->username);
        $this->db->update('members');
    }

    public function check_password($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $q = $this->db->get('members');

        return $q->num_rows();
    }

    public function count_unreaded_message($username)
    {
        $this->db->where('receiver', $username);
        $this->db->where('readed', NULL);
        $q = $this->db->get('mails');
        return $q->num_rows();
    }

    public function is_readed($mail)
    {

        $this->db->where('readed', NULL);
        $this->db->where('id', $mail);
        $q = $this->db->get('mails');
        return $q->num_rows();
    }

    public function update_readed($mail)
    {

        $date = date('Y-m-d');

        $this->db->set('readed', $date);
        $this->db->where('id', $mail);
        $this->db->update('mails');
    }

    public function get_receiv_mail($username, $mail)
    {
        $this->db->where('receiver', $username);
        $this->db->where('id', $mail);
        $q = $this->db->get('mails');
        return $q->row_array();
    }

    public function get_all_receiv_mails($username)
    {
        $this->db->where('receiver', $username);
        $this->db->where('deleted_receiver', NULL);
        $q = $this->db->get('mails');
        return $q->result_array();
    }

    public function get_sended_mail($username, $mail)
    {
        $this->db->where('sender', $username);
        $this->db->where('delete_sender', NULL);
        $this->db->where('id', $mail);
        $q = $this->db->get('mails');
        return $q->row_array();
    }

    public function get_all_sended_mails($username)
    {
        $this->db->where('sender', $username);
        $this->db->where('delete_sender', NULL);
        $q = $this->db->get('mails');
        return $q->result_array();
    }

    public function add_new_mail()
    {
        $date = date('Y-m-d');
        $mail = array(
            'receiver' => $this->input->post('receiver'),
            'sender' => $this->session->username,
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message'),
            'date_added' => $date
        );

        return $this->db->insert('mails', $mail);
    }
    
    public function add_success_registered_message($username)
    {
        $date = date('Y-m-d');
        $mail = array(
            'receiver' => $username,
            'sender' => "Rateit Sistem",
            'title' => "Thank you <strong> $username </strong> !",
            'message' => "Thank you <strong> $username </strong> for signing up to our site!<br />This is an automatically generated welcome message to new users of the site",
            'date_added' => $date
        );
        return $this->db->insert('mails', $mail);
    }


    public function get_unreaded_mails()
    {
        $this->db->where('receiver', $this->session->username);
        $this->db->where('readed', NULL);
        $q = $this->db->get('mails');
        return $q->result_array();
    }
    public function update_all_member_mails($old, $new)
    {
        
        $this->update_all_receiver_member_mails($old, $new);
        $this->update_all_sender_member_mails($old, $new);
        
    }
    public function update_all_receiver_member_mails($old, $new)
    {

        $this->db->set('receiver', $new);
        $this->db->where('receiver', $old);
        $this->db->update('mails');
    }
    public function update_all_sender_member_mails($old, $new)
    {
        $this->db->set('sender', $new);
        $this->db->where('sender', $old);
        $this->db->update('mails');
    }
    public function delete_receive_mail($mail)
    {
        $date = date('Y-m-d');
        $this->db->set('deleted_receiver', $date);
        $this->db->where('id', $mail);
        $this->db->where('receiver', $this->session->username);
        $this->db->update('mails');
    }
    public function delete_sended_message($mail)
    {
        $date = date('Y-m-d');
        $this->db->set('delete_sender', $date);
        $this->db->where('id', $mail);
        $this->db->where('sender', $this->session->username);
        $this->db->update('mails');
    }
    
    public function change_username($username)
    {        
        $this->db->set('username', $username);
        $this->db->where('username', $this->session->username);
        $this->db->update('members');
    }

}
