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
		$sql = "SELECT * FROM books WHERE main_cat != ? AND main_cat IS NOT ?";

		$query = $this->db->query($sql, array(" ", NULL));
		
		return $query->result_array();
	}
	public function getMains() // get mains from books not required
	{
		$this->db->select('*');
		$this->db->where('main_cat', "");
		$this->db->or_where('main_cat', NULL);
		$query = $this->db->get('books');
		return $query->result_array();
	}
	public function getSubByID($id)
	{
		$sql = "SELECT * FROM books WHERE maincategory_id = ? AND (main_cat = ? OR main_cat IS ?)";

		$query = $this->db->query($sql, array($id, ' ', NULL));
		return $query->result_array();
	}
	public function addMainCategory($alldata)
	{
	return	$this->db->insert('maincategory',$alldata);
	}

	public function getByTitle($table,$columnName,$title)
	{
		$this->db->where($columnName, $title);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function getProductByID($id)
	{
		$this->db->select('*');
		$this->db->where('main_cat', $id);
		$query = $this->db->get('books');
		return $query->result_array();
	}

	public function deleteById($id,$table){
		return $this->db->delete($table, array('id' => $id));
	}
	
}

 ?>