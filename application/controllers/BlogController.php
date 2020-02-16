

<?php


class BlogController extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Users_model');
		       $this->load->Model('BlogModels');
		$this->load->model('Add_model');
	}

	public function blogs()
	{
      

       $Bloglist = $this->BlogModels->getAllBlogs();
       $data = array();
       $data['blog']=$Bloglist;
       $data['title'] = "Blogs";
       $this->load->view('common/adminheader', $data);
       $this->load->view('admin/blogs', $data);
       

	}
	public function addBlog()
	{

		$this->load->library('form_validation');
		$this->load->Model('BlogModels'); 
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('author','Author','trim|required');
		$this->form_validation->set_rules('discription','Discription','trim|required');
	
		 

                	 if ($this->form_validation->run() == True)
                {
                	$config['upload_path'] = './assets/blog-img/';
     			   $config['allowed_types'] = 'pdf|jpg|png|jpeg';

        		 $this->load->library('upload', $config);

            if ( $this->upload->do_upload('imgupload'))
               
                { 
                        $data = $this->upload->data();
                        $fileName=$data['file_name'];


                }
                else{
                	echo "error";
                		$error = array('error' => $this->upload->display_errors());
                		print_r($error);
                	 $fileName ="default.png";
                }
                       $allblogs  = array();
                       $allblogs['Title']=$this->input->post('title');
                       $allblogs['Author']=$this->input->post('author');
                       $allblogs['Discription']=$this->input->post('discription');
                       $allblogs['Image']= $fileName;
                       $response = $this->BlogModels->create($allblogs);
                       if($response) {
				$this->session->set_flashdata('success', ' Successfully');
			} else {
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('admin/blogs');
                }
                else
                {	
                		 $data['title'] = "Blogs";
                       $this->load->view('common/adminheader', $data);
                        $this->load->view('admin/addBlog');
                }
      

	}




	public function editBlog($id){

		$data = array();
		$this->load->library('form_validation');
		$this->load->Model('BlogModels');
		$blog = $this->BlogModels->getblog($id);
		if(empty($blog)){
			redirect(base_url().'admin/blogs');
		}
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('author','Author','trim|required');
		$this->form_validation->set_rules('discription','Discription','trim|required');
	
		  if ($this->form_validation->run() == True)
                {
                	$config['upload_path'] = './assets/blog-img/';
     			   $config['allowed_types'] = 'pdf|jpg|png';

        		 $this->load->library('upload', $config);

            if ( $this->upload->do_upload('imgupload'))
               
                { 
                        $data = $this->upload->data();
                        $fileName=$data['file_name'];

                }
                else{
                	echo "error";
                	 $fileName ="default.png";
                }
                       $array  = array();

                       $array['Title']=$this->input->post('title');
                       $array['Author']=$this->input->post('author');
                       $array['Discription']=$this->input->post('discription');
                       $array['Image']= $fileName;
                      $response = $this->BlogModels->editBlog($id , $array);
                       
						if($response) {
				$this->session->set_flashdata('success', 'Blog  Updated Successfully');
			} else {
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('admin/blogs');

                }
                else
                {
                		$data['blog']=$blog;
                		 $data['title'] = "Blogs";
                         $this->load->view('common/adminheader', $data);
                       $this->load->view('admin/editBlog',$data);

                }


		
		
		
		

	}

	function deleteBlog($id){
		$this->load->Model('BlogModels');
	$response =	$this->BlogModels->deleteBlog($id);
	if($response) {
				$this->session->set_flashdata('success', 'Blog  Deleted Successfully');
			} else {
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('admin/blogs');


	}


	// 	public function addBlog()
	// {
	// 	$this->load->Model('BlogModels');
	// 	$config['upload_path'] = './assets/blog-img/';
 //        $config['allowed_types'] = 'pdf|jpg|png';

 //         $this->load->library('upload', $config);

 //            if ( $this->upload->do_upload('imgupload'))
               
 //                { 
 //                        $data = $this->upload->data();

	// 					  print_r($data);
	// 					  exit();
	// 					$alldata = array('Image'=>$data['file_name']);	
	// 					$this->imgupload->addBlog($alldata); 

 //                }
 //                else{
 //                	echo "error";
 //                }
	// }




	}
?>