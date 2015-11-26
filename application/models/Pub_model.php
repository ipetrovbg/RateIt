<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pub_model
 *
 * @author Peter
 */
class Pub_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create_category($name, $id_user) {
        $date = date('Y-m-d');
        $data = array(
            'name' => $name,
            'id_user' => $id_user,
            'date_added' => $date
        );
        $this->db->insert('categories', $data);
    }

    public function get_category_by_name($cat) {
        $this->db->where('name', $cat);
        $q = $this->db->get('categories');

        return $q->num_rows();
    }
    public function get_category_by_id($id) {
        $this->db->where('id', $id);
        $q = $this->db->get('categories');

        return $q->row_array();
    }
    public function get_all_category() {
        $q = $this->db->get('categories');
        return $q->result_array();
    }
    public function get_limit_category($limit) {
        $this->db->limit($limit);
        $q = $this->db->get('categories');
        return $q->result_array();
    }
    public function upload_pub($pub_array) {
        $date = date('Y-m-d');
        $data = array(
            'title' => $pub_array[0],
            'description' => $pub_array[1],
            'id_member' => $pub_array[2],
            'id_category' => $pub_array[3],
            'date_added' => $date
        );
        $this->db->insert('pubs', $data);
    }

    public function upload_pub_img($pub_array) {
        $date = date('Y-m-d');
        $data = array(
            'title' => $pub_array[0],
            'id_user' => $pub_array[1],
            'file_key' => $pub_array[2],
            'img_path' => $pub_array[3],
            'date_added' => $date
        );
        $this->db->insert('pubs_pictures', $data);
    }

    public function get_featurd_pubs() {
        $this->db->limit(10);
        $this->db->select('*');
        $this->db->from('pubs');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_pub_image($pub, $size)
    {
        $this->db->where('title', $pub);
        $this->db->where('file_key', $size);
        $q = $this->db->get('pubs_pictures');
        return $q->row_array();
    }
    
    public function get_pubs_slider($number) {
        $this->db->limit($number);
        $this->db->select('*');
        $this->db->from('pubs');
        $query = $this->db->get();
        return $query->result_array();
    }

}
