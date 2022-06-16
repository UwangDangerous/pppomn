<?php 

    class Auth extends CI_Controller{
        public function __construct()
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model('Auth_model');
            $this->load->model('Utility_model');
            date_default_timezone_set('Asia/Jakarta');
        }

        public function index()
        {
            $data['judul'] = 'PPPOMN - Login '; 

            if( $this->session->userdata('admin_key') == null ){

                $this->form_validation->set_rules('nip', 'NIP', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

                if($this->form_validation->run() == FALSE) {
                    $this->load->view('temp/header' , $data) ;
                    $this->load->view('auth/index') ;
                    $this->load->view('temp/footer') ;
                }else{
                    $name = $this->input->post('nip') ;
                    $pass = $this->input->post('password') ;
                    $this->Auth_model->cekLogin($name, $pass) ;
                }
            }else{
                redirect(MYURL."home") ;
            }
        }

        public function logout()
        {
            $this->session->sess_destroy() ;
            redirect(MYURL."auth") ;
        }
    }

?>