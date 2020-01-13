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

            if ($data['akses'] == "User") {
                $this->load->view('head2',$data);
                $this->load->view('ranking/index');
            $this->load->view('footer');
            }else{
                $this->load->view('head',$data);
                $this->load->view('ranking/index');
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

    public function print() {     
            if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data['email'];
            $data['akses'] = $session_data['akses'];
            $data['nama'] = $session_data['nama'];
            $data['np'] = $this->Mglobals->getAll("nilai_preferensi");

            $cek2 = $this->Mglobals->getAllQR("select count(*) as jml from ranking ;")->jml;

            if ($cek2 == 5) {

            $dataa = $this->Mglobals->getAllQ("select * from ranking order by nilai desc limit 3 ;");
            $i = 1;
            foreach ($dataa->result() as $row) {
                $data['a'.$i] = $row->nama;
                $data['n'.$i] = $row->nilai;
                $i++;
            }

            
            $this->load->view('head', $data);
            $this->load->view('ranking/print');
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

    public function ajax_add_history() {
        if($this->session->userdata('logged_in')){
            
            $jumlah = $this->modul->autokode1('HTR','id','history_ranking','4','7');
            $data = array(
                'id' => $this->modul->autokode1('HTR','id','history_ranking','4','7'),
                'tanggal' => $this->modul->TanggalWaktu(),
                'nama_1' => $this->input->post('ns1'),
                'nama_2' => $this->input->post('ns2'),
                'nama_3' => $this->input->post('ns3'),
                'nama_4' => $this->input->post('ns4'),
                'nama_5' => $this->input->post('ns5'),
                'nilai_1' => $this->input->post('nb1'),
                'nilai_2' => $this->input->post('nb2'),
                'nilai_3' => $this->input->post('nb3'),
                'nilai_4' => $this->input->post('nb4'),
                'nilai_5' => $this->input->post('nb5')
            );

             $simpan = $this->Mglobals->add("history_ranking",$data);
            if($simpan == 1){
                    $data2 = array(
                        'id' => $this->modul->autokode1('HTD','id','history','4','7'),
                        'b11' => $this->input->post('b11'),
                        'b12' => $this->input->post('b12'),
                        'b13' => $this->input->post('b13'),
                        'b14' => $this->input->post('b14'),
                        'b15' => $this->input->post('b15'),
                        'b16' => $this->input->post('b16'),
                        'b21' => $this->input->post('b21'),
                        'b22' => $this->input->post('b22'),
                        'b23' => $this->input->post('b23'),
                        'b24' => $this->input->post('b24'),
                        'b25' => $this->input->post('b25'),
                        'b26' => $this->input->post('b26'),
                        'b31' => $this->input->post('b31'),
                        'b32' => $this->input->post('b32'),
                        'b33' => $this->input->post('b33'),
                        'b34' => $this->input->post('b34'),
                        'b35' => $this->input->post('b35'),
                        'b36' => $this->input->post('b36'),
                        'b41' => $this->input->post('b41'),
                        'b42' => $this->input->post('b42'),
                        'b43' => $this->input->post('b43'),
                        'b44' => $this->input->post('b44'),
                        'b45' => $this->input->post('b45'),
                        'b46' => $this->input->post('b46'),
                        'b51' => $this->input->post('b51'),
                        'b52' => $this->input->post('b52'),
                        'b53' => $this->input->post('b53'),
                        'b54' => $this->input->post('b54'),
                        'b55' => $this->input->post('b55'),
                        'b56' => $this->input->post('b56'),
                        'id_ranking_h' => $jumlah
                    );

                    $update = $this->Mglobals->add("history",$data2);
                if($update == 1){
                    $status = "Data tersimpan";
                }else{
                    $status = "Data gagal tersimpan";
                }
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
