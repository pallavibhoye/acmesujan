<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Users_model');
		$this->load->model('Add_model');
	}

	public function index()
	{
		// $this->load->view('welcome_message'); //login page
		if ($this->session->userdata('welcome')) {
			redirect('admin/Dashboard');
		} else {
			$this->load->view('welcome_message');
		}
	}

	public function login()
	{
		$output = array('error' => false);
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$data = $this->Users_model->login($data);
		if ($data) {
			$this->session->set_userdata('welcome', $data);

			$output['message'] = 'Login Plese wait.....';
		} else {
			$output['error'] = true;
			$output['message'] = 'Login failed user not found';
		}
		echo json_encode($output);
	}



	public function dashboard()
	{
		$data['MainCats'] = $this->Add_model->fetch('maincategory');
		$data['Dropdown'] = $this->Add_model->fetch('dropdownCategories');
		$data['SubCats'] = $this->Add_model->getMains();
		$data['products'] = $this->Add_model->fetchProducts();
		// redirect('Dashboard');
		$this->load->view('common/adminheader');
		$this->load->view('admin/dashboard', $data);
	}


	public function logout()
	{
		//load session library

		$this->session->unset_userdata('welcome');
		redirect('admin/');
	}


	public function addBook( $dropDownCategoryId = '')
	{
		if (!$this->input->post()) {

			$data['selected'] = -1;
			if ($dropDownCategoryId != "") {
				$data['selected'] = $dropDownCategoryId;
				$data['dropDownCategories'] = $this->Add_model->getDropDownCategoriesByID($dropDownCategoryId);
			}

			$data['title'] = 'Sub Category';
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');
			//	print_r($data);
			$this->load->view('common/adminheader', $data);
			$this->load->view('admin/addBook', $data);
		} else {

			$alldata = array(
				'maincategory_id' => $this->input->post('maincategory_id'),
				'dropdown_id' => $this->input->post('dropdown_id'),
				'author_name' => $this->input->post('author_name'),
				'hsn' => $this->input->post('hsn'),
				'abbr' => $this->input->post('abbr'),
				'cas' => $this->input->post('cas'),
			);
			// print_r($alldata);
			// exit;
			$resp = $this->Add_model->addbook($alldata);
			if ($resp) {
				$this->session->set_flashdata('success', 'Sub Category added Successfully');
			} else {
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('admin/addMain');
		}
	}

	public function addSub()
	{
		if (!$this->input->post()) {
			$data['title'] = 'Product';
		
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');

			//print_r($data);
			$this->load->view('common/adminheader', $data);
			$this->load->view('admin/addSub', $data);
		} else {

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'jpg|gif|jpg|png|pdf|doc|docx';
			$config['max_size']             = 1000;


			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {

				$error = array('error' => $this->upload->display_errors());

				// print_r($error);
				$store = "default.png";
			} else {

				$data = array('upload_data' => $this->upload->data());

				$store = $data['upload_data']['file_name'];
			}
			if (!$this->upload->do_upload('pdf')) {

				$error = array('error' => $this->upload->display_errors());

				// print_r($error);
				$store_pdf = "none";
			} else {

				$data1 = array('upload_data' => $this->upload->data());

				$store_pdf = $data1['upload_data']['file_name'];
			}

			$alldata = array(
				'image' => $store,
				'maincategory_id' => $this->input->post('maincategory_id'),
				'dropdown_id' => $this->input->post('dropdown_id'),
				'author_name' => $this->input->post('author_name'),
				'main_cat' => $this->input->post('main_cat'),
				'description' => $this->input->post('description'),
				'pdf_path' => $store_pdf,
				'isChecked' => $this->input->post('isChecked')=="on"?1:0,
			);
				//print_r($alldata);
			$resp = $this->Add_model->addbook($alldata);
			if ($resp) {
				$this->session->set_flashdata('success', 'Product added Successfully');
			} else {
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('admin/addSub');
		}
	}

	public function addDropdown()
	{
		if (!$this->input->post()) {
			$data['title'] = 'Dropdown Category';
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');
			//	print_r($data);
			$this->load->view('common/adminheader', $data);
			$this->load->view('admin/add-dropdown', $data);
		} else {

			$alldata = array(
				'maincategory_id' => $this->input->post('maincategory_id'),
				'title' => $this->input->post('title'),
			);
			$resp = $this->Add_model->addDropdowntoDb($alldata);
			if ($resp) {
				$this->session->set_flashdata('success', 'Dropdown Category added Successfully');
			} else {
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('admin/addDropDown');
		}
	}

	public function Show($type)
	{
		if ($type == "") {
			$this->session->set_flashdata('error', 'Cant be Accessed');
			redirect('admin/Dashboard');
			exit;
		}
		if ($type == 'MainCategories') {
			$data['title'] = "Main Categories";
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');
		}
		if ($type == 'SubCategories') {
			$data['title'] = "Sub Categories";
			$SubCategories = array();
			$data['SubCategories'] = array();
			$data['mainCategory'] = $this->Add_model->fetch('maincategory');
			foreach ($data['mainCategory'] as $main) {
				$resp = $this->Add_model->getSubByID($main["id"]);
				if ($resp) {
					$SubCategories[$main["title"]] = $resp;
				}
			}
			$data['SubCategories'] = $SubCategories;
		}
		if ($type == 'DropDownCategories') {
			$data['title'] = "Dropdown Categories";
			$dropDownCategories = array();
			$data['dropDownCategories'] = array();
			$data['mainCategory'] = $this->Add_model->fetch('maincategory');
			foreach ($data['mainCategory'] as $main) {
				$resp = $this->Add_model->getDropDownCategoriesByID($main["id"]);
				if ($resp) {
					$dropDownCategories[$main["title"]] = $resp;
				}
			}
			$data['dropDownCategories'] = $dropDownCategories;
		}

		if ($type == 'Products') {
			$data['title'] = "Products";
			$data['products'] = $this->Add_model->fetchProducts();
		}


		$this->load->view('common/adminheader');
		$this->load->view('admin/Show/display', $data);
	}

	public function delete($id, $type)
	{
		if ($type == "" || $id == '') {
			$this->session->set_flashdata('error', 'Cant be Accessed');
			redirect('admin/Dashboard');
			exit;
		}
		if ($type == 'MainCategories') {
			$data['title'] = "Main Categories";
			$resp = $this->Add_model->deleteById($id, 'maincategory');
		}
		if ($type == 'SubCategories') {
			$data['title'] = "Sub Categories";
			$resp = $this->Add_model->deleteById($id, 'books');
		}
		if ($type == 'Products') {
			$data['title'] = "Products";
			$resp = $this->Add_model->deleteById($id, 'books');
		}
		if ($type == 'DropDownCategories') {
			$data['title'] = "dropDownCategories";
			$resp = $this->Add_model->deleteById($id, 'dropdownCategories');
		}
		if ($resp) {
			$this->session->set_flashdata('success', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('error', 'Some error occured please try again');
		}
		redirect('admin/Show/' . $type);
	}

	public function getAllOptions()
	{
		
			$id = $this->input->post('id');
			$type = $this->input->post('type');
		if($type=='dropdownCategory'){
			$data['options'] = $this->Add_model->getDropDownCategoriesByID($id);

		}
		else {
			$data['options'] = $this->Add_model->getSubByDropDownID($id);
		}
		
		echo json_encode($data);
	}

}
