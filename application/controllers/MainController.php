<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Users_model');
		$this->load->model('Add_model');
	}

	public function index()
	{
		// $this->load->view('welcome_message'); //login page
		if($this->session->userdata('welcome'))
		{
            $data['title'] = 'Main Category';
            $this->load->view('common/adminheader',$data);
            $this->load->view('admin/Main/addMain');
	}
	else
	{
		$this->load->view('welcome_message');
	}
	}


		public function addMain()
	{
		if(!$this->input->post()){
		$data['title'] = 'Main Product';
		$data['mainProduct']=$this->Add_model->getMains();
		//print_r($data);
		$this->load->view('common/adminheader',$data); 
        $this->load->view('admin/Main/addMain');
		}else{
			
		
				$alldata = array(
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
				);
			//	print_r($data);
                $resp=$this->Add_model->addMainCategory($alldata);
                
                if($resp){
                $this->session->set_flashdata('success','Main Category added Successfully'); 
                } else{
                    $this->session->set_flashdata('error','Some error occured please try again'); 
                }
				redirect('admin/Main');
		
	}
	
	}

	public function do_upload()
	{
		$this->load->Model('FileUpload');
		$config['upload_path'] = './assets/uploads-img/';
        $config['allowed_types'] = 'pdf|jpg|png';

         $this->load->library('upload', $config);

            if ( $this->upload->do_upload('userfile'))
               
                { 
                        $data = $this->upload->data();

						  //print_r($data);
						$alldata = array('Img'=>$data['file_name']);	
						$this->FileUpload->do_upload($alldata); 

                }
                else{
                	echo "error";
                }
	}


	public function edit($id, $type , $changedId = '')
	{
		if ($type == "" || $id == '') {
			$this->session->set_flashdata('error', 'Cant be Accessed');
			redirect('admin/Dashboard');
			exit;
		}
		$data['type'] = $type;
	  	$data['id'] = $id;
		
		if ($type == 'MainCategories') {
			$data['title'] = "Main Categories";
			$data['data'] = $this->Add_model->editById($id, 'maincategory');
		}
		if ($type == 'SubCategories') {
			$data['title'] = "Sub Categories";
			$data['data']= $this->Add_model->editById($id, 'books');
			$data['idForDropdown'] = $changedId?$changedId:$data['data'][0]['maincategory_id'];
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');
			$data['dropDownCategories'] = $this->Add_model->getDropDownCategoriesByID($data['idForDropdown']);
			
		}
		if ($type == 'Products') {
			$data['title'] = "Products";
			$data['data'] = $this->Add_model->editById($id, 'books');
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');

		}
		if ($type == 'DropDownCategories') {
			$data['title'] = "Dropdown Categories";
			$data['data'] = $this->Add_model->editById($id, 'dropdownCategories');
			$data['mainCategories'] = $this->Add_model->fetch('maincategory');

		}
			$this->load->view('common/adminheader',$data);
            $this->load->view('admin/edit',$data);
	}

public function  update($type = '' , $id = ''){
	if ($type == 'MainCategories') {
	$alldata = array(
		'title'=>$this->input->post('title'),
		'description'=>$this->input->post('description'),
	);
	$resp=$this->Add_model->updateData($alldata , $id , 'maincategory');
	}

	if ($type == 'DropDownCategories') {

	$alldata = array(
		'maincategory_id' => $this->input->post('maincategory_id'),
		'title' => $this->input->post('title'),
	);
	$resp=$this->Add_model->updateData($alldata , $id , 'dropdownCategories');

}

if ($type == 'SubCategories') {
	$alldata = array(
		'maincategory_id' => $this->input->post('maincategory_id'),
		'dropdown_id' => $this->input->post('dropdown_id'),
		'author_name' => $this->input->post('author_name'),
		'hsn' => $this->input->post('hsn'),
		'abbr' => $this->input->post('abbr'),
		'cas' => $this->input->post('cas'),
	);
	$resp=$this->Add_model->updateData($alldata , $id , 'books');
}

if($type==='Products'){
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
		'isProduct' =>1
	);
	$resp=$this->Add_model->updateData($alldata , $id , 'books');

}
	if($resp){
	$this->session->set_flashdata('success',$type.' updated Successfully'); 
	} else{
		$this->session->set_flashdata('error','Some error occured please try again'); 
	}
	redirect('admin/Edit/'. $id.'/'.$type);

}

}
