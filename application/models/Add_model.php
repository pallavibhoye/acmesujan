<?php 

class Add_model extends CI_Model{

	public $dropdownCategories='dropdownCategories';

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
		$sql = "SELECT * FROM books WHERE (main_cat != ? OR main_cat IS NOT ?) OR dropdown_id IS ? ";

		$query = $this->db->query($sql, array(" ", NULL , null));
		
		return $query->result_array();
	}
	public function getMains() // get mains from books not required
	{

		$sql = "SELECT * FROM books WHERE dropdown_id IS NOT ? AND (main_cat = ? OR main_cat IS ?)";

		$query = $this->db->query($sql, array(Null, ' ', NULL));
		
		return $query->result_array();
	}
	
	public function getSubByID($id)
	{
		$sql = "SELECT * FROM books WHERE dropdown_id = ? AND (main_cat = ? OR main_cat IS ?)";

		$query = $this->db->query($sql, array($id, ' ', NULL));
		return $query->result_array();
	}
	public function addMainCategory($alldata)
	{
	return	$this->db->insert('maincategory',$alldata);
	}

	public function addDropdowntoDb($alldata)
	{
	return	$this->db->insert($this->dropdownCategories,$alldata);
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

	public function getDropDownCategoriesByID($id){
		$this->db->select('*');
		$this->db->where('maincategory_id', $id);
		$query = $this->db->get($this->dropdownCategories);
		return $query->result_array();
	}

	public function getSubByDropDownID($id)
	{
		$this->db->select('*');
		$this->db->where('dropdown_id', $id);
		$this->db->where('main_cat', Null);
		$query = $this->db->get('books');
		return $query->result_array();
	}

	public function getDirectLinkedCats($id = 0)
	{
		$sql = "SELECT * FROM books WHERE maincategory_id = ? AND main_cat IS ? AND dropdown_id IS   ? limit 1";
		$query = $this->db->query($sql, array($id, NULL, NULL));
		return $query->result_array();
	}
	


public function getCheckedProducts()
{
	$this->db->select('*');
	$this->db->where('isChecked',1);
	$query = $this->db->get('books');
	return $query->result_array();
}


public function getSubDetails($id)
{
	$this->db->select('*');
	$this->db->where('id',$id);
	$query = $this->db->get('books');
	return $query->result_array();
}
}

 ?>