<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->model('add_model');
	}

	public function index()
	{
		// $this->load->view('welcome_message'); //login page
		if($this->session->userdata('welcome'))
		{
		redirect('Dashboard');
	}
	else
	{
		$this->load->view('welcome_message');
	}
	}

	public function login()
	{
		$output = array('error'=>false);
		$data = array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
		);
			$data=$this->users_model->login($data);
			if($data)
			{
				$this->session->set_userdata('welcome',$data);

				$output['message'] = 'Login Plese wait.....';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Login failed user not found';
			}
			echo json_encode($output); 
	}



	public function dashboard()
	{
		$data['MainCats'] = $this->add_model->fetch('maincategory');
		$data['SubCats'] = $this->add_model->getMains();
		$data['products'] = $this->add_model->fetchProducts();
		// redirect('Dashboard');

		$this->load->view('common/adminheader'); 
		$this->load->view('admin/dashboard', $data); 

	}


	public function logout(){
		//load session library
		
		$this->session->unset_userdata('welcome');
		redirect('/');
	}


		public function addBook()
	{
		if(!$this->input->post()){
		$data['title'] = 'Category';
		$data['mainCategories']=$this->add_model->fetch('maincategory');
	//	print_r($data);
		$this->load->view('common/adminheader',$data); 
		$this->load->view('admin/addBook',$data); 
	
		}else{

				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'jpg|gif|jpg|png';
                $config['max_size']             = 1000;
               

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());

                      $store="default.png";
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $store = $data['upload_data']['file_name'];

}
				$alldata = array(
					'image'=>$store,
					'maincategory_id'=>$this->input->post('maincategory_id'),
					'author_name'=>$this->input->post('author_name'),
					'description'=>$this->input->post('description'),
				);
				// print_r($alldata);
				// exit;
				$resp=$this->add_model->addbook($alldata);
				if($resp){
					$this->session->set_flashdata('success','Sub Category added Successfully'); 
					} else{
						$this->session->set_flashdata('error','Some error occured please try again'); 
					}
				redirect('addMain');
		
	}
	
	}

		public function addSub($subCatId="")
	{
		if(!$this->input->post()){
			$data['title'] = 'Category';
			$data['selected']=-1;
			if($subCatId!=""){
				$data['selected']=$subCatId;
				$data['subCategories']=$this->add_model->getSubByID($subCatId);
			}
			$data['mainCategories']=$this->add_model->fetch('maincategory');

		//print_r($data);
		$this->load->view('common/adminheader',$data); 
		$this->load->view('admin/addSub',$data); 
		}else{
			
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'jpg|gif|jpg|png';
                $config['max_size']             = 1000;
               

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());

                      // print_r($error);
                        $store="default.png";
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $store = $data['upload_data']['file_name'];

}
				$alldata = array(
					'image'=>$store,
					'author_name'=>$this->input->post('author_name'),
					'main_cat'=>$this->input->post('main_cat'),
					'description'=>$this->input->post('description'),
				);
			//	print_r($data);
				$resp=$this->add_model->addbook($alldata); 
				if($resp){
					$this->session->set_flashdata('success','Product added Successfully'); 
					} else{
						$this->session->set_flashdata('error','Some error occured please try again'); 
					}
				redirect('addSub');
		
	}
	
	}
	public function Show($type)
	{
		if($type==""){
			$this->session->set_flashdata('error','Cant be Accessed'); 
			redirect('Dashboard');
			exit;
		}
		if($type=='MainCategories'){
			$data['title']="Main Categories";
			$data['mainCategories']=$this->add_model->fetch('maincategory');
		}
		if($type=='SubCategories'){
			$data['title']="Sub Categories";
			$SubCategories=array();
			$data['SubCategories']=array();
			$data['mainCategory']=$this->add_model->fetch('maincategory');
			foreach($data['mainCategory'] as $main){
				$resp=$this->add_model->getSubByID($main["id"]);
				if($resp){
				$SubCategories[$main["title"]]=$resp;
				}
			}
			$data['SubCategories']=$SubCategories;
		}
		if($type=='Products'){
			$data['title']="Products";
			$data['products'] = $this->add_model->fetchProducts();

		}
		$this->load->view('common/adminheader'); 
		$this->load->view('admin/Show/display', $data); 


	}
	
	public function delete($id,$type)
	{
		if($type=="" || $id==''){
			$this->session->set_flashdata('error','Cant be Accessed'); 
			redirect('Dashboard');
			exit;
		}
		if($type=='MainCategories'){
			$data['title']="Main Categories";
			$data['mainCategories']=$this->add_model->fetch('maincategory');
		}
		if($type=='SubCategories'){
			$data['title']="Sub Categories";
			$SubCategories=array();
			$data['SubCategories']=array();
			$data['mainCategories']=$this->add_model->fetch('maincategory');
			foreach($data['mainCategories'] as $main){
				$resp=$this->add_model->getSubByID($main["id"]);
				$SubCategories[$main["title"]]=$resp;
			}
			$data['SubCategories']=$SubCategories;
		}
		if($type=='Products'){
			$data['title']="Products";
			$data['products'] = $this->add_model->fetchProducts();

		}
		//$this->load->view('common/adminheader'); 
		//$this->load->view('admin/Show/display', $data); 


	}

}
