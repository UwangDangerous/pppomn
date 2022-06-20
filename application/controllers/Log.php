<?php 

    class Log extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->model('Log_model') ;
            $this->load->model('Utility_model') ;
        }

        public function index() {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Log Aktifitas '; 
                $data['header'] = 'Log Aktifitas'; 
                $data['bread'] = '
                            <li class="breadcrumb-item"><a href="'.MYURL.'dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Log Aktifitas</li>
                        ' ;
                $data['login'] = $this->Log_model->getDataLogin() ;
                $data['log'] = $this->Log_model->getDataLog() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('log') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }
    }

?>