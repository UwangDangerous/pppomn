<?php 

    class Utility_model extends CI_Model{
        public function formatTanggal($tanggal) 
        {
            $bulan = explode('-', $tanggal);
            $b = '' ;

            switch ($bulan[1]) {
                case 1 :
                    $b = 'Januari' ; break ;
                case 2 :
                    $b = 'Februari' ; break ;
                case 3 :
                    $b = 'Maret' ; break ;
                case 4 :
                    $b = 'April' ; break ;
                case 5 :
                    $b = 'Mei' ; break ;
                case 6 :
                    $b = 'Juni' ; break ;
                case 7 :
                    $b = 'Juli' ; break ;
                case 8 :
                    $b = 'Agustus' ; break ;
                case 9 :
                    $b = 'September' ; break ;
                case 10 :
                    $b = 'Oktober' ; break ;
                case 11 :
                    $b = 'November' ; break ;
                case 12 :
                    $b = 'Desember' ; break ;
                default :
                    $b = '00' ;
            }

            if($b == '00') {
                return '-' ;
            }else{
                return $bulan[2].' '.$b.' '.$bulan[0] ;
            }
        }

        public function upload($namaBerkas, $path, $type, $redirect, $sess)
        {
           
            if( $_FILES[$namaBerkas]['name'] ) {
                $filename = explode("." , $_FILES[$namaBerkas]['name']) ;
                $ekstensi = strtolower(end($filename)) ;
                $config['upload_path'] = MYPATH.$path; //assets/file-upload/surat 
                $config['allowed_types'] = "$type"; //'pdf|jpg|png|jpeg'
                $config['file_size'] = '1028'; //kb
                $hashDate = substr(md5(date('Y-m-d H:i:s')),1,15) ;
                
                $nama = '' ;

                $berkas = $hashDate ;

                $config['file_name'] = $berkas ;
                $this->load->library('upload',$config);

                if($this->upload->do_upload($namaBerkas)){
                    $this->upload->initialize($config);
                }else{
                    $pesan = [
                        "pesan_$sess" => "tipe file tidak sesuai",
                        "warna_$sess" => "danger"
                    ];
                    $this->session->set_flashdata($pesan);
                    redirect("$redirect") ;  
                }

                return $config['file_name'].'.'.$ekstensi ;
            } else{
                $pesan = [
                    "pesan_$sess" => "berkas tidak boleh kosong",
                    "warna_$sess" => "danger"
                ];
                $this->session->set_flashdata($pesan);
                redirect("$redirect") ;  
            }
        }

        public function loginHistory($id)
        {
            $this->db->insert('_user_login', ['id_user' => $id, 'tgl_login' => date("Y-m-d G:i:s") ]) ;
        }
        public function logUserHistory($id, $keterangan)
        {
            $this->db->insert('_user_log', ['id_user' => $id, 'tgl_log' => date("Y-m-d G:i:s") , 'keterangan_log' => $keterangan]) ;
        }
    }

?>