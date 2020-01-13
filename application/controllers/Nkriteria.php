<?php
class Nkriteria extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Modul');
        $this->load->model('Mglobals');
    }
    
    public function index() {
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['akses'] = $session_data['akses'];
            $data['nama'] = $session_data['nama'];
            $data['np'] = $this->Mglobals->getAllQ("select * from nilai_preferensi order by nilai desc ;");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from kriteria ;")->jml;

            if ($cek2 == 5) {

            $datak = $this->Mglobals->getAll("kriteria");
            $i = 1;
            foreach ($datak->result() as $row) {
                $data['k'.$i] = $row->nama;
                $i++;
            }
            
            if ($data['akses'] == "User") {
                $this->load->view('head2',$data);
                $this->load->view('nkriteria/index');
            $this->load->view('footer');
            }else{
                $this->load->view('head',$data);
                $this->load->view('nkriteria/index');
            $this->load->view('footer');
            }


        }else {
            $message = "Data Kriteria harus minimal 5";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $this->modul->halaman('kriteria');
        }
        }else{
           $this->modul->halaman('login');
        }
    }

    public function detail() {
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['akses'] = $session_data['akses'];
            $data['nama'] = $session_data['nama'];
            $data['np'] = $this->Mglobals->getAll("nilai_preferensi");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from kriteria ;")->jml;
            if ($cek2 == 5) {
            $datak = $this->Mglobals->getAll("kriteria");
            $i = 1;
            foreach ($datak->result() as $row) {
                $data['k'.$i] = $row->nama;
                $i++;
            }

            $np = $this->Mglobals->getAll("nilai_kriteria");
            $z = 1;
            foreach ($np->result() as $row) {
                $data['n'.$z] = $row->nilai;
                $z++;
            }

            if ($data['akses'] == "User") {
                $this->load->view('head2',$data);
                $this->load->view('nkriteria/detail');
            $this->load->view('footer');
            }else{
                $this->load->view('head',$data);
                $this->load->view('nkriteria/detail');
            $this->load->view('footer');
            }
            

        }else {
            $message = "Data Kriteria harus minimal 5";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $this->modul->halaman('kriteria');
        }
        }else{
           $this->modul->halaman('login');
        }
    }


    public function ajax_add() {
        if($this->session->userdata('logged_in')){
                $banyak = $this->Mglobals->getAllQR("select count(*) as jml from nilai_kriteria ;")->jml;

                for ($i=1; $i <= $banyak ; $i++) { 
                    $data = array(
                        'nilai' => $this->input->post('pa'.$i)
                    );
                    $condition['id'] = $i;
                    $update = $this->Mglobals->update("nilai_kriteria",$data, $condition);
                }
                if($update == 1){
                    $status = "Data tersimpan";
                }else{
                    $status = "Data gagal tersimpan";
                }
            echo json_encode(array("status" => $status));
        }else{
            $this->modul->halaman('login');
        }
    }

    public function ajax_add_bobot() {
        if($this->session->userdata('logged_in')){
                $banyak = $this->Mglobals->getAllQR("select count(*) as jml from nilai_kriteria_bobot ;")->jml;

                for ($i=1; $i <= $banyak ; $i++) { 
                    $data = array(
                        'bobot' => $this->input->post('nb'.$i)
                    );
                    $condition['id'] = $i;
                    $update = $this->Mglobals->update("nilai_kriteria_bobot",$data, $condition);
                }
                if($update == 1){
                    $status = "Data tersimpan";
                }else{
                    $status = "Data gagal tersimpan";
                }
            echo json_encode(array("status" => $status));
        }else{
            $this->modul->halaman('login');
        }
    }
    
}
