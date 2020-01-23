<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

   public function index($page='home'){
    $this->load->view('frontend/header');
    $this->load->view('frontend/'.$page);
    $this->load->view('frontend/footer');
    }

}

?>