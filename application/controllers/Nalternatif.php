<?php
class Nalternatif extends CI_Controller{
    
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
            $data['kriteria'] = $this->Mglobals->getAll("kriteria");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from alternatif ;")->jml;

            if ($cek2 == 5) {
                $datak = $this->Mglobals->getAll("alternatif");
                $i = 1;
                foreach ($datak->result() as $row) {
                    $data['a'.$i] = $row->nama;
                    $i++;
                }
                
                if ($data['akses'] == "User") {
                    $this->load->view('head2',$data);
                    $this->load->view('nalternatif/index');
                    $this->load->view('footer');
                }else{
                    $this->load->view('head',$data);
                    $this->load->view('nalternatif/index');
                    $this->load->view('footer');
                }
            }else {
                $message = "Data Alternatif harus minimal 5";
                echo "<script type='text/javascript'>alert('$message');</script>";
                $this->modul->halaman('alternatif');
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

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from alternatif ;")->jml;
            if ($cek2 == 5) {
            $datak = $this->Mglobals->getAll("alternatif");
            $i = 1;
            foreach ($datak->result() as $row) {
                $data['k'.$i] = $row->nama;
                $i++;
            }

            $namanya = $this->Mglobals->getAll("kriteria");
            $i = 1;
            foreach ($namanya->result() as $row) {
                $data['ki'.$i] = $row->id;
                $data['kr'.$i] = $row->nama;
                $i++;
            }
            
            $cek = $this->uri->segment(3);
            $db = "";
            $data['kriteria'] = "";
            if ($cek == "1") {
                $db = "nilai_alternatif_k1";
                $data['kriteria'] = $data['kr1'];
                $data['idny'] = $data['ki1'];
            }else if ($cek == "2") {
                $db = "nilai_alternatif_k2";
                $data['kriteria'] = $data['kr2'];
                $data['idny'] = $data['ki2'];
            }else if ($cek == "3") {
                $db = "nilai_alternatif_k3";
                $data['kriteria'] = $data['kr3'];
                $data['idny'] = $data['ki3'];
            }else if ($cek == "4") {
                $db = "nilai_alternatif_k4";
                $data['kriteria'] = $data['kr4'];
                $data['idny'] = $data['ki4'];
            }else {
                $db = "nilai_alternatif_k5";
                $data['kriteria'] = $data['kr5'];
                $data['idny'] = $data['ki5'];
            }

            $np = $this->Mglobals->getAll($db);
            $z = 1;
            foreach ($np->result() as $row) {
                $data['n'.$z] = $row->nilai;
                $z++;
            }

            if ($data['akses'] == "User") {
                $this->load->view('head2',$data);
                $this->load->view('nalternatif/detail');
                $this->load->view('footer');
            }else{
                $this->load->view('head',$data);
                $this->load->view('nalternatif/detail');
                $this->load->view('footer');
            }
            
            $this->load->view('head', $data);
            
        }else {
            $message = "Data Kriteria harus minimal 5";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $this->modul->halaman('kriteria');
        }
        }else{
           $this->modul->halaman('login');
        }
    }

    


    public function ajax_list() {
        if($this->session->userdata('logged_in')){
            
            $data = array();
            $list = $this->Mglobals->getAll("alternatif");
            foreach ($list->result() as $row) {
                $val = array();
                $val[] = $row->nama;
                $val[] = '<div style="text-align: center;">'
                        . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="ft-edit"></i> Edit</a>&nbsp;'
                        . '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$row->id."'".','."'".$row->nama."'".')"><i class="ft-delete"></i> Delete</a>'
                        . '</div>';
                
                $data[] = $val;
            }
            $output = array("data" => $data);
            echo json_encode($output);
        }else{
            $this->modul->halaman('login');
        }
    }

    public function ajax_add() {
        if($this->session->userdata('logged_in')){
            $cek =  $this->input->post('kr');
            $db = "";
            if ($cek == "1") {
                $db = "nilai_alternatif_k1";
            }else if ($cek == "2") {
                $db = "nilai_alternatif_k2";
            }else if ($cek == "3") {
                $db = "nilai_alternatif_k3";
            }else if ($cek == "4") {
                $db = "nilai_alternatif_k4";
            }else {
                $db = "nilai_alternatif_k5";
            }

            $banyak = $this->Mglobals->getAllQR("select count(*) as jml from ".$db." ;")->jml;

            for ($i=1; $i <= $banyak ; $i++) { 
                $data = array(
                    'nilai' => $this->input->post('pa'.$i)
                );
                $condition['id'] = $i;
                $update = $this->Mglobals->update($db,$data, $condition);
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

            $cek =  $this->input->post('kri');
            $db = "";
            if ($cek == "1") {
                $db = "nilai_k1_bobot";
            }else if ($cek == "2") {
                $db = "nilai_k2_bobot";
            }else if ($cek == "3") {
                $db = "nilai_k3_bobot";
            }else if ($cek == "4") {
                $db = "nilai_k4_bobot";
            }else {
                $db = "nilai_k5_bobot";
            }

            $banyak = $this->Mglobals->getAllQR("select count(*) as jml from ".$db." ;")->jml;

                for ($i=1; $i <= $banyak ; $i++) { 
                    $data = array(
                        'bobot' => $this->input->post('nb'.$i)
                    );
                    $condition['id'] = $i;
                    $update = $this->Mglobals->update($db,$data, $condition);
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
