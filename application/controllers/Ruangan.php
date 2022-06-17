<?php 

    class Ruangan extends CI_Controller{
        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model("Ruangan_model") ;
            $this->load->model("Utility_model") ;
        }

        public function index() {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Ruangan Umum '; 
                $data['header'] = 'Ruangan Umum'; 
                $data['bread'] = '
                            <li class="breadcrumb-item"><a href="'.MYURL.'dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Ruangan</li>
                        ' ;
                $data['ruangan'] = $this->Ruangan_model->getDataRuangan() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('ruangan/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function tambah()
        {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Tambah Ruangan '; 
                $data['header'] = 'Tambah Ruangan'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'ruangan/ruangan"> Daftar Ruangan </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Ruangan</li>
                '; 
    
                $this->form_validation->set_rules('nama_ruangan', 'Ruangan', 'required');
                $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    
                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('ruangan/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
    
                }else{
    
                    $this->Ruangan_model->addRuangan() ;
    
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Ubah Ruangan '; 
                $data['header'] = 'Ubah Ruangan'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'ruangan/ruangan"> Daftar Ruangan </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Ruangan</li>
                '; 
    
                $data['ruangan'] = $this->Ruangan_model->getDataRuanganForEdit($id) ;

                $this->form_validation->set_rules('nama_ruangan', 'Ruangan', 'required');
                $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    
                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('ruangan/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
    
                }else{
    
                    $this->Ruangan_model->editRuangan($id) ;
    
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function hapus($id) { $this->Ruangan_model->deleteRuangan($id) ; }
















        // booking

        public function booking($id) {
            if( $this->session->userdata('idKey') != null ){
                $judul = $this->db->get_where('ruangan_daftar', ['id_ruangan' => $id])->row_array() ;
                $data['judul'] = 'Booking Ruangan '; 
                $data['header'] = 'Booking '.$judul['nama_ruangan']; 
                $data['bread'] = '
                            <li class="breadcrumb-item"><a href="'.MYURL.'dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'ruangan/ruangan"> Daftar Ruangan </a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Booking Ruangan</li>
                        ' ;
                $data['ruangan'] = $this->Ruangan_model->getDataBooking($id) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('ruangan/booking/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }
    }

?>