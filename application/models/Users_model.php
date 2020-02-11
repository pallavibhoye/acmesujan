<?php 
class Users_model extends CI_model{

	public function login($data)
	{
		$query = $this->db->get_where('users', $data);
		
		return $query->row_array();
	}
}


 ?>