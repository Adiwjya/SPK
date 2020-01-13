<?php
class History extends CI_Controller{
    
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
            $data['history_ranking'] = $this->Mglobals->getAllQ('select * from history_ranking order by tanggal desc');
            $data['history'] = $this->Mglobals->getAll('history');
            
            $this->load->view('head', $data);
            $this->load->view('history/index');
            $this->load->view('footer');
        }else{
           $this->modul->halaman('login');
        }
    }

    public function details() {
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['akses'] = $session_data['akses'];
            $data['nama'] = $session_data['nama'];
            $idnya = $this->uri->segment(3);
            
            $datanya = $this->Mglobals->getAllQR('select * from history where id_ranking_h = "'.$idnya.'";');
            $data['b11'] = $datanya->b11;
            $data['b12'] = $datanya->b12;
            $data['b13'] = $datanya->b13;
            $data['b14'] = $datanya->b14;
            $data['b15'] = $datanya->b15;
            $data['b16'] = $datanya->b16;
            $data['b21'] = $datanya->b21;
            $data['b22'] = $datanya->b22;
            $data['b23'] = $datanya->b23;
            $data['b24'] = $datanya->b24;
            $data['b25'] = $datanya->b25;
            $data['b26'] = $datanya->b26;
            $data['b31'] = $datanya->b31;
            $data['b32'] = $datanya->b32;
            $data['b33'] = $datanya->b33;
            $data['b34'] = $datanya->b34;
            $data['b35'] = $datanya->b35;
            $data['b36'] = $datanya->b36;
            $data['b41'] = $datanya->b41;
            $data['b42'] = $datanya->b42;
            $data['b43'] = $datanya->b43;
            $data['b44'] = $datanya->b44;
            $data['b45'] = $datanya->b45;
            $data['b46'] = $datanya->b46;
            $data['b51'] = $datanya->b51;
            $data['b52'] = $datanya->b52;
            $data['b53'] = $datanya->b53;
            $data['b54'] = $datanya->b54;
            $data['b55'] = $datanya->b55;
            $data['b56'] = $datanya->b56;

            $datab = $this->Mglobals->getAllQR('select * from history_ranking where id = "'.$idnya.'";');
            $data['id'] = $datab->id;
            $data['tanggal'] = $datab->tanggal;
            $data['nama_1'] = $datab->nama_1;
            $data['nama_2'] = $datab->nama_2;
            $data['nama_3'] = $datab->nama_3;
            $data['nama_4'] = $datab->nama_4;
            $data['nama_5'] = $datab->nama_5;
            $data['nilai_1'] = $datab->nilai_1;
            $data['nilai_2'] = $datab->nilai_2;
            $data['nilai_3'] = $datab->nilai_3;
            $data['nilai_4'] = $datab->nilai_4;
            $data['nilai_5'] = $datab->nilai_5;

            // var_dump($datanya);

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
            
            if ($data['akses'] == "User") {
                $this->load->view('head2',$data);
                $this->load->view('history/detail');
            $this->load->view('footer');
            }else{
                $this->load->view('head',$data);
                $this->load->view('history/detail');
            $this->load->view('footer');
            }
            
        }else{
           $this->modul->halaman('login');
        }
    }
    
    public function ajax_list() {
        if($this->session->userdata('logged_in')){
            $data = array();
            $list = $this->Mglobals->getAll("kriteria");
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
            $cek = $this->Mglobals->getAllQR("select count(*) as jml from kriteria where nama = '".$this->input->post('nama')."';")->jml;
            if($cek > 0){
                $status = "Data sudah ada";
            }else{
                $data = array(
                    'nama' => $this->input->post('nama'),
                );
                $simpan = $this->Mglobals->add("kriteria",$data);
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
            $data = $this->Mglobals->get_by_id("kriteria", $kondisi);
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
            $update = $this->Mglobals->update("kriteria",$data, $condition);
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
            $hapus = $this->Mglobals->delete("kriteria",$kondisi);
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
}
