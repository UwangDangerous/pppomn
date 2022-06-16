<?php 

    class Halaman_model extends CI_Model{
        public function getDataHalaman()
        {
            return $this->db->get('_halaman')->result_array() ;
        }

        public function getDataHalamanForAdd($id)
        {
            $this->db->where('id_halaman', $id) ;
            return $this->db->get('_halaman')->row_array() ;
        }

        public function getDataAdminHalaman($id)
        {
            $this->db->where('_halaman.id_halaman', $id) ;
            $this->db->join('_halaman', '_halaman.id_halaman = _admin_halaman.id_halaman') ;
            $this->db->join('_user', '_user.id_user = _admin_halaman.id_user') ;
            return $this->db->get('_admin_halaman')->result_array() ;
        }

        public function addHalaman($id)
        {
            $admin = explode('|',$this->input->post('admin') ) ;
            $query = [
                'id_halaman' => $id ,
                'id_user' => $admin[0]
            ] ;

            if($this->db->insert('_admin_halaman', $query)) {
                $pesan = ['pesan' => 'Admin Berhasil Ditambah', 'warna' => 'success'] ;
                $this->Utility_model->logUserHistory($this->session->userdata('idKey'), $this->session->userdata('nameKey').' Telah Menambah '.$admin[1].' Sebagai Admin Halaman '.$this->input->post('nama_halaman')) ;
            }else{
                $pesan = ['pesan' => 'Admin Gagal Ditambah', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'admin/halaman') ;
        }

        public function deleteAdminHalaman($id)
        {
            $this->db->where('id_adm_hal', $id) ;
            $this->db->join('_halaman', '_halaman.id_halaman = _admin_halaman.id_halaman') ;
            $this->db->join('_user', '_user.id_user = _admin_halaman.id_user') ;
            $data = $this->db->get('_admin_halaman')->row_array() ;

            $this->db->where('id_adm_hal', $id) ;
            if($this->db->delete('_admin_halaman')) {
                $pesan = ['pesan' => 'Admin Berhasil Dihapus', 'warna' => 'success'] ;
                $this->Utility_model->logUserHistory($this->session->userdata('idKey'), $this->session->userdata('nameKey').' Telah Menghapus '.$data['nama_user'].' Sebagai Admin Halaman '.$data['nama_halaman']) ;
            }else{
                $pesan = ['pesan' => 'Admin Gagal Dihapus', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'admin/halaman') ;
        }

    }

?>