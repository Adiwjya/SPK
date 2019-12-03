<?php

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Modul');
        $this->load->model('Mglobals');
    }
    
    public function index() {
        $this->load->view('login');
    }
    
    public function ajax_login() {
        $email = $this->input->post('email');
        
        $pass = $this->input->post('pass');
        if($email == "admin" && $pass == "admin"){
            $sess_array = array(
                'email' => "Admin@gmail.com",
                'akses' => "Admin",
                'nama' => "Admin"
            );
            $this->session->set_userdata('logged_in', $sess_array);
            $status = "ok";
        }else{
            $status = "Maaf, anda tidak berhak mengakses";
        }
        echo json_encode(array("status" => $status));
    }
}
