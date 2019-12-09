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
            $data['np'] = $this->Mglobals->getAll("nilai_preferensi");
            $data['kriteria'] = $this->Mglobals->getAll("kriteria");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from alternatif ;")->jml;

            if ($cek2 == 5) {
                $datak = $this->Mglobals->getAll("alternatif");
                $i = 1;
                foreach ($datak->result() as $row) {
                    $data['a'.$i] = $row->nama;
                    $i++;
                }
                
                $this->load->view('head', $data);
                $this->load->view('nalternatif/index');
                $this->load->view('footer');
            }else {
                $message = "Data Alternatif harus minimal 5";
                echo "<script type='text/javascript'>alert('$message');</script>";
                $this->modul->halaman('alternatif');
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
            
            $cek = $this->Mglobals->getAllQR("select count(*) as jml from alternatif where nama = '".$this->input->post('nama')."';")->jml;
            
            if($cek > 0){
                $status = "Data sudah ada";
            }else{
                $data = array(
                    'nama' => $this->input->post('nama')
                );
                $simpan = $this->Mglobals->add("alternatif",$data);
                if($simpan == 1){
                    $status = "Data tersimpan";
                }else{
                    $status = "Data gagal tersimpan";
                }
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
