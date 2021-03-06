<?php 

    class User extends CI_Controller{
        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model("User_model") ;
            $this->load->model("Utility_model") ;
        }

        public function index() {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Daftar User '; 
                $data['header'] = 'Daftar User'; 
                $data['bread'] = '
                            <li class="breadcrumb-item"><a href="'.MYURL.'dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
                        ' ;
                $data['user'] = $this->User_model->getDataUser() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/user/index') ;
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
                $data['judul'] = 'Tambah Data User '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'admin/user"> Daftar User </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required');
                $this->form_validation->set_rules('nip', 'NIP / NIK', 'required|numeric|is_unique[_user.nip]');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/user/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->User_model->addUser() ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Ubah Data User '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'admin/user"> Daftar User </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 
                $data['user'] = $this->User_model->getDataUserForEdit($id) ;

                if($data['user']['nip'] == $this->input->post('nip')) {
                    $this->form_validation->set_rules('nip', 'NIP / NIK', 'required|numeric');
                } else{
                    $this->form_validation->set_rules('nip', 'NIP / NIK', 'required|numeric|is_unique[_user.nip]');
                }
                $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('telp', 'No Telepon', 'required|numeric');

                if($this->form_validation->run() == FALSE) {
                

                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/user/ubah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->User_model->editUser($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function status($id, $aksi) { $this->User_model->editStatusUSer($id, $aksi) ; }

        public function hapus($id) { $this->User_model->deleteUser($id) ; }
    }

?>