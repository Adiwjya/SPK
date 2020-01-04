<?php
class Ranking extends CI_Controller{
    
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
            $data['np'] = $this->Mglobals->getAll("nilai_preferensi");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from kriteria ;")->jml;

            if ($cek2 == 5) {

            $dataa = $this->Mglobals->getAll("alternatif");
            $i = 1;
            foreach ($dataa->result() as $row) {
                $data['a'.$i] = $row->nama;
                $i++;
            }

            $datak = $this->Mglobals->getAll("kriteria");
            $i = 1;
            foreach ($datak->result() as $row) {
                $data['k'.$i] = $row->nama;
                $i++;
            }

            $nk = $this->Mglobals->getAll("nilai_kriteria_bobot");
            $z = 1;
            foreach ($nk->result() as $row) {
                $data['bk'.$z] = $row->bobot;
                $z++;
            }

            $nk1 = $this->Mglobals->getAll("nilai_k1_bobot");
            $z = 1;
            foreach ($nk1->result() as $row) {
                $data['bk1'.$z] = $row->bobot;
                $z++;
            }

            $nk2 = $this->Mglobals->getAll("nilai_k2_bobot");
            $z = 1;
            foreach ($nk2->result() as $row) {
                $data['bk2'.$z] = $row->bobot;
                $z++;
            }

            $nk3 = $this->Mglobals->getAll("nilai_k3_bobot");
            $z = 1;
            foreach ($nk3->result() as $row) {
                $data['bk3'.$z] = $row->bobot;
                $z++;
            }

            $nk4 = $this->Mglobals->getAll("nilai_k4_bobot");
            $z = 1;
            foreach ($nk4->result() as $row) {
                $data['bk4'.$z] = $row->bobot;
                $z++;
            }

            $nk5 = $this->Mglobals->getAll("nilai_k5_bobot");
            $z = 1;
            foreach ($nk5->result() as $row) {
                $data['bk5'.$z] = $row->bobot;
                $z++;
            }
            


            
            $this->load->view('head', $data);
            $this->load->view('ranking/index');
            $this->load->view('footer');
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
            
            $this->load->view('head', $data);
            $this->load->view('nkriteria/detail');
            $this->load->view('footer');
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
                $banyak = $this->Mglobals->getAllQR("select count(*) as jml from ranking ;")->jml;

                for ($i=1; $i <= $banyak ; $i++) { 
                    $data = array(
                        'nama' => $this->input->post('ns'.$i),
                        'nilai' => $this->input->post('nb'.$i)
                    );
                    $condition['id'] = $i;
                    $update = $this->Mglobals->update("ranking",$data, $condition);
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
