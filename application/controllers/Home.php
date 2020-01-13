<?php

class Home extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('Modul');
        $this->load->model('Mglobals');
    }
    
    public function index(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['akses'] = $session_data['akses'];
            $data['nama'] = $session_data['nama'];

            if ($data['akses'] == "User") {
                $this->load->view('head2',$data);
                $this->load->view('content');
                $this->load->view('footer');
            }else{
                $this->load->view('head',$data);
                $this->load->view('content');
                $this->load->view('footer');
            }
        }else{
           $this->modul->halaman('login');
        }
            

    }
    
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->modul->halaman('login');
    } 
}
