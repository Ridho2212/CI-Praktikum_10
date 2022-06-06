<?php 
class blog extends CI_Controller {
    // method index data blog
    public function index(){
        $data ['nama'] = "CodeIgniter 3";
       $this->load->view("blog/index", $data);
    }

    // method add menambahkan data blog
    public function add (){
       $this->load->view("blog/add");
    }
}

?>