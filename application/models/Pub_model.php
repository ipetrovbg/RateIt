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

    
    public function create_category($name, $id_user)
    {
        $date = date('Y-m-d');
        $data = array(
            'name' => $name,
            'id_user' => $id_user,
            'date_added' => $date
        );
        $this->db->insert('categories', $data);
    }
    
    public function get_category($cat)
    {
        $this->db->where('name', $cat);
        $q = $this->db->get('categories');

        return $q->num_rows();
    }
}
