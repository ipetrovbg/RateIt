<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rateit
 *
 * @author Peter
 */
class Rateit_model extends CI_Model{
       
    public function insert_rate($pub, $stars, $member)
    {
        $date = date("Y-m-d");
        
        $data = array(
            'id_pub' => $pub,
            'id_member' => $member,
            'stars' => $stars,
            'date_added' => $date
        );
        
         $this->db->insert('rating', $data);
    }
    
    public function check_rate($member, $pub)
    {
        $this->db->where('id_member', $member);
        $this->db->where('id_pub', $pub);
        $q = $this->db->get('rating');

        return $q->num_rows();
    }
    
}
