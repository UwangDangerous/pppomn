<?php 

    class Auth_model extends CI_Model{

        public function cekLogin($name, $pass)
        {
            // // phpinfo() ;
            // $j_son = file_get_contents('https://sima.pom.go.id/index.php/api/pegawai/loginCovid/'.$name.'/'.$pass.'') ; 
            // $data = json_decode($j_son, true) ;
            // // print_r($data) ;die;
            // // login dengan sima
            // if($data['status'] == 'success') {
            //     $user = $data['data_user'] ;
            //     $this->db->where('nip', $name) ;
            //     if($user['satker'] == '0106') {
            //         if($this->db->get('_user')->num_rows() == 0) {
            //             $query = [
            //                 'nip' => $user['nip'] ,
            //                 'nama_user' => $user['nama'] ,
            //                 'email' => $user['email'],
            //                 'tgl_lahir' => $user['tgl_lahir'],
            //                 'tempat_lahir' => $user['tempat_lahir'],
            //                 'satker' => $user['satker'],
            //                 'id_unit' => 0,
            //                 'password' => ''
            //             ] ;
            //             $this->db->insert('_user', $query) ;
            //         }

            //         $this->getDataSession($name, $pass, false);

            //     }else{
            //         $this->session->set_flashdata('login', 'Akses Hanya Untuk Satuan Kerja PPPOMN') ;
            //         redirect(MYURL."auth") ;
            //     }
            // }else{
                $this->getDataSession($name, $pass, true) ;
                
            // }
        }

        public function getDataSession($name, $pass, $status=false)
        {
            if($status == true) {
                $pass = sha1($pass) ;
                $pass = md5($pass) ;
                $this->db->where('password', $pass ) ;
            }
            
            $this->db->where('nip', $name) ;
            
            if($query = $this->db->get('_user')->row_array() ) {
                if($query['tipe'] == 1){
                    $foto = $query['foto'] ;
                } else {
                    if($query['foto'] != '') {
                        $foto = base_url().'assets/upload/foto/'.$query['foto'] ;
                    }else{
                        $foto = base_url().'assets/img/foto-default.png' ;
                    }
                }

                $session = [
                                'idKey' => $query['id_user'] ,
                                'nameKey' => $query['nama_user'] ,
                                'numberKey' => $query['nip'] ,
                                'fotoKey' => $foto
                            ];

                $this->Utility_model->loginHistory($query['id_user']) ;
                $this->session->set_userdata($session);
                redirect("dashboard") ;
            }else{
                $this->session->set_flashdata('login', 'Gagal Login Silahkan Coba Lagi') ;
                redirect(MYURL."auth") ;
            }
        }

    }

?>