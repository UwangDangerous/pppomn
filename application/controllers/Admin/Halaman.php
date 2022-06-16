<?php 

    class Halaman extends CI_Controller{
        public function __construct() 
        {
            parent::__construct() ;
            $this->load->library('form_validation');
            $this->load->model("Halaman_model") ;
            $this->load->model("User_model") ;
            $this->load->model("Utility_model") ;
        }

        public function index() {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Halaman Kerja '; 
                $data['header'] = 'Halaman Kerja'; 
                $data['bread'] = '
                            <li class="breadcrumb-item"><a href="'.MYURL.'dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Halaman Kerja</li>
                        ' ;
                $data['halaman'] = $this->Halaman_model->getDataHalaman() ;
                
                $this->load->view('temp/header',$data) ;
                $this->load->view('temp/dsbHeader') ;
                $this->load->view('admin/halaman/index') ;
                $this->load->view('temp/dsbFooter') ;
                $this->load->view('temp/footer') ;
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect(MYURL."login") ;
            }
        }

        public function tambah($id)
        {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Tambah Admin '; 
                $data['header'] = 'Tambah Admin'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'admin/user"> Daftar User </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 

                $data['user'] = $this->User_model->getDataUser() ;
                $data['halaman'] = $this->Halaman_model->getDataHalamanForAdd($id) ;
                $this->form_validation->set_rules('admin', 'Admin', 'required');

                if($this->form_validation->run() == FALSE) {
                
                    $this->load->view('temp/header',$data) ;
                    $this->load->view('temp/dsbHeader') ;
                    $this->load->view('admin/halaman/tambah') ;
                    $this->load->view('temp/dsbFooter') ;
                    $this->load->view('temp/footer') ;

                }else{

                    $this->Halaman_model->addHalaman($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function ubah($id)
        {
            if( $this->session->userdata('idKey') != null ){
                $data['judul'] = 'Tambah Data User '; 
                $data['header'] = 'Tambah Data'; 
                $data['bread'] = '
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'dashboard"> Dashboard </a> </li>
                    <li class="breadcrumb-item" aria-current="page"> <a href="'.MYURL.'admin/user"> Daftar User </a> </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                '; 
                $data['user'] = $this->Halaman_model->getDataUserForEdit($id) ;

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

                    $this->Halaman_model->editUser($id) ;

                }
            }else{
                $this->session->set_flashdata("login", "Silahkan Login Kembali");
                redirect("login") ;
            }
        }

        public function hapus($id) { $this->Halaman_model->deleteAdminHalaman($id) ; }
    }

?>