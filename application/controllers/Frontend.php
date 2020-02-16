<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
       $this->load->Model('BlogModels');
        $this->load->model('Add_model');

    }


    public function index($page = 'home')
    {
        if ($page === 'home') {
            $data['products'] =[];
            $products=$this->Add_model->getCheckedProducts();
            foreach ($products as  $product) {
                $subProduct =  $this->Add_model->getSubDetails($product['main_cat']);
                   $product['cas']= $subProduct?$subProduct[0]['cas']:"";
               
               array_push($data['products'] , $product);
              }
        }
        $data['data'] = [];
        if ($page === 'main-product') {
            $data['data1'] = $this->Add_model->fetch('maincategory');
            foreach ($data['data1'] as $key => $main) {
              $products =  $this->Add_model->getDirectLinkedCats($main['id']);
            
                 $main=$main + array("link"=>$products?$products[0]['author_name']:"");
             
             array_push($data['data'] , $main);
            }
            $data['dropdownCategories'] = $this->Add_model->fetch('dropdownCategories');
            $data['directLinked'] = $this->Add_model->getDirectLinkedCats();
        }

            if($page=='about'||$page=='mission'||$page=='quality_control'){
 $this->load->model('FileUpload');
 $data['pdfData'] = $this->FileUpload->getPdf();
            }
             
             if($page=='blog'){

       $Bloglist = $this->BlogModels->getAllBlogs();
       $data['blog']=$Bloglist;       
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
            $mainCategoryId=$this->Add_model->getByTitle('dropdownCategories','title',$mainCateegoryTitle);
            if($mainCategoryId){

            $data['data'] = $this->Add_model->getSubByID($mainCategoryId[0]['id']);
        }
        print_r($data['data'][0]['main_cat']);
        if( $data['data'][0]['main_cat']==''){
           $productName = str_replace(" ","_",$data['data'][0]['author_name']);
           redirect('product/'.$productName);
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
            if($productId[0]['dropdown_id']=='' && $productId[0]['main_cat']==''){
                $data['data']=$productId;
            }
            else{
                $data['data'] = $this->Add_model->getProductByID($productId[0]['id']);
            }
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

    function renderBlogWithId($id){
                 $this->load->view('frontend/header');
                $blog = $this->BlogModels->getblog($id);
                $data['singleBlog'] =$blog;
                // print_r($blog);
                $this->load->view('frontend/blog-details',$data);
                $this->load->view('frontend/footer');
    }
}
