<?php 

    class Home extends CI_Controller{

        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
        } 

        public function index() {
            // if( $this->session->userdata('kunci') != null ){
                $data['judul'] = 'Dashboard '; 
                $data['header'] = 'Dashboard'; 
                $data['bread'] = 'Dashboard'; 
                
                // $this->load->view('temp/header',$data) ;
                $this->load->view('home/index') ;
                // $this->load->view('temp/footer') ;
            // }else{
            //     redirect("login") ;
            // }
        }

    }
?>