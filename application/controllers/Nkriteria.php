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
            $data['np'] = $this->Mglobals->getAll("nilai_preferensi");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from kriteria ;")->jml;

            if ($cek2 == 5) {

            $datak = $this->Mglobals->getAll("kriteria");
            $i = 1;
            foreach ($datak->result() as $row) {
                $data['k'.$i] = $row->nama;
                $i++;
            }
            
            $this->load->view('head', $data);
            $this->load->view('nkriteria/index');
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
    
    public function ganti(){
        if($this->session->userdata('logged_in')){
            $kondisi['id'] = $this->uri->segment(3);
            $data = $this->Mglobals->get_by_id("alternatif", $kondisi);
            echo json_encode($data);
        }else{
            $this->modul->halaman('login');
        }
    }
    
    public function ajax_edit() {
        if($this->session->userdata('logged_in')){
            $data = array(
                    'nama' => $this->input->post('nama')
            );
            $condition['id'] = $this->input->post('id');
            $update = $this->Mglobals->update("alternatif",$data, $condition);
            if($update == 1){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }
            echo json_encode(array("status" => $status));
        }else{
            $this->modul->halaman('login');
        }
    }
    
    public function hapus() {
        if($this->session->userdata('logged_in')){
            $kondisi['id'] = $this->uri->segment(3);
            $hapus = $this->Mglobals->delete("alternatif",$kondisi);
            if($hapus == 1){
                $status = "Data terhapus";
            }else{
                $status = "Data gagal terhapus";
            }
            echo json_encode(array("status" => $status));
        }else{
            $this->modul->halaman('login');
        }
    }

    public function ajax_barang() {
        if($this->session->userdata('logged_in')){
            $data = array();
            $list = $this->Mglobals->getAllQ("select * from barang;");
            foreach ($list->result() as $row) {
                $val = array();
                $val[] = '<div style="text-align: center;">'
                        . '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Pilih" onclick="pilih('."'".$row->id."'".','."'".$row->nama."'".')"><i class="ft-check"></i> Pilih</a>'
                        . '</div>';
                $val[] = $row->id;
                $val[] = $row->nama;
                
                $data[] = $val;
            }
            $output = array("data" => $data);
            echo json_encode($output);
        }else{
            $this->modul->halaman('login');
        }
    }
}
