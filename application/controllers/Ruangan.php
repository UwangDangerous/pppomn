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

        // booking

        public function booking($id) {
            if( $this->session->userdata('idKey') != null ){
                $judul = $this->db->get_where('ruangan_daftar', ['id_ruangan' => $id])->row_array() ;
                $data['judul'] = 'Booking Ruangan '; 
                $data['header'] = 'Booking '.$judul['nama_ruangan']; 
                $data['bread'] = '
                            <li class="breadcrumb-item"><a href="'.MYURL.'dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'ruangan"> Daftar Ruangan </a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Booking Ruangan</li>
                        ' ;
                
                $data['id'] = $id ;
                $data['ruangan'] = $this->Ruangan_model->getDataBooking($id) ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('ruangan/booking') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function booking_tambah($id) {
            if( $this->session->userdata('idKey') != null ){
                $judul = $this->db->get_where('ruangan_daftar', ['id_ruangan' => $id])->row_array() ;
                $data['judul'] = 'Booking Ruangan '; 
                $data['header'] = 'Booking '.$judul['nama_ruangan']; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'ruangan"> Daftar Ruangan </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'ruangan/booking/'.$id.'"> Booking Ruangan </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                '; 
    
                $this->form_validation->set_rules('tgl_booking', 'Tanggal Booking', 'required');
                $this->form_validation->set_rules('jam_booking', 'Jam Booking', 'required');
                $this->form_validation->set_rules('lama_booking', 'Lama Booking', 'required|numeric');
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    
                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('ruangan/booking/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;
    
                }else{
    
                    $this->Ruangan_model->addBooking($id, true) ;
    
                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function hapus_booking($id, $ruangan)
        {
            $this->db->where('id_booking', $id) ;
            $this->db->delete('ruangan_booking') ;
            $this->session->set_flashdata(['pesan' => 'Data Berhasil Dihapus', 'warna' => 'success']) ;
            $this->Utility_model->logUserHistory($this->session->userdata('idKey'), $this->session->userdata('nameKey').' Tidak Jadi Booking Ruangan') ;
            redirect(MYURL.'ruangan/booking/'.$ruangan) ;
        }
    }

?>