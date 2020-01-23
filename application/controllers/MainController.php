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
				redirect('Main');
		
	}
	
	}

}
