<?php 

class Add_model extends CI_Model{

	public function addbook($alldata)
	{
		return $this->db->insert('books',$alldata);
	}

	public function fetch($table)
	{
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function fetchProducts()
	{
		$this->db->where('maincategory_id', 0);
		$query = $this->db->get("books");
		return $query->result_array();
	}
	public function getMains()
	{
		$this->db->select('*');
		$this->db->where('main_cat', "");
		$this->db->or_where('main_cat', NULL);
		$query = $this->db->get('books');
		return $query->result_array();
	}
	public function getSubByID($id)
	{
		$this->db->select('*');
		$this->db->where('maincategory_id', $id);
		$query = $this->db->get('books');
		return $query->result_array();
	}
	public function addMainCategory($alldata)
	{
	return	$this->db->insert('maincategory',$alldata);
	}
}

 ?>