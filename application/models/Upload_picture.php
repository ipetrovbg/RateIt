<?php
/**
* 
*/
class Upload_Picture extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function update_member_picture($id, $img)
	{
		$this->db->set('pic', $img);
		$this->db->where('id', $id);
		$this->db->update('members');
	}

}