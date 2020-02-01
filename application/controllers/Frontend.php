<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->model('Add_model');
    }


    public function index($page = 'home')
    {
        $data['data'] = [];
        if ($page === 'main-product') {
            $data['data'] = $this->Add_model->fetch('maincategory');
        }
        $data['title']=$page;
        $this->load->view('frontend/header',$data);
        $this->load->view('frontend/' . $page, $data);
        $this->load->view('frontend/footer');
    }

    public function renderSubProduct($slug = '')
    {
        if ($slug) {
            $mainCateegoryTitle= str_replace("_"," ",$slug);
            $mainCategoryId=$this->Add_model->getByTitle('maincategory','title',$mainCateegoryTitle);
            if($mainCategoryId){
               
            $data['data'] = $this->Add_model->getSubByID($mainCategoryId[0]['id']);
        }
        $data['slug']= $mainCateegoryTitle;
            $this->load->view('frontend/header');
            $this->load->view('frontend/sub-product', $data);
            $this->load->view('frontend/footer');
        }
    }

    public function renderProduct($productName = '')
    {
        if ($productName) {
            $productName= str_replace("_"," ",$productName);
            $productId=$this->Add_model->getByTitle('books','author_name',$productName);
            $data['slug']=$productName;
            $data['data'] = $this->Add_model->getProductByID($productId[0]['id']);
            $this->load->view('frontend/header');
            $this->load->view('frontend/products', $data);
            $this->load->view('frontend/footer');
        }
    }
    
    public function SubmitToGetPdf(){
		$name=$this->input->post('fname')." " .$this->input->post('lname');
		$email=$this->input->post('email');
		$number=$this->input->post('number');

		$status=['success'=>true];
		//$status=['success'=>false];

        echo json_encode($status);
        return;


	}
}
