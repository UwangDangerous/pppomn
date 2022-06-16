<?php 

    class User_model extends CI_Model{
        public function getDataUser()
        {
            $this->db->join('_satker','_satker.id_satker = _user.id_satker','left') ;
            return $this->db->get('_user')->result_array() ;
        }

        public function getDataUserForEdit($id)
        {
            $this->db->where('id_user', $id) ;
            $this->db->join('_satker','_satker.id_satker = _user.id_satker','left') ;
            return $this->db->get('_user')->row_array() ;
        }

        public function addUser()
        {
            if($_FILES['foto']['name']) {
                $upload = $this->Utility_model->upload('foto', 'assets/upload/foto', 'png|jpg|jpeg', MYURL.'admin/user', 'user') ;
            }else{
                $upload = '' ;
            }
            $query = [
                'nip' => $this->input->post('nip'), 
                'nama_user' => $this->input->post('nama_user'), 
                'email' => $this->input->post('email'), 
                'telp' => $this->input->post('telp'), 
                'id_satker' => $this->input->post('id_satker'), 
                'foto' => $upload, 
                'username' => $this->input->post('nip'),
                'password' => md5(sha1('P$w0rd')) ,
                'status' => 1,
                'tipe' => 0
            ] ;
            
            if($this->db->insert('_user', $query)) {
                $pesan = ['pesan' => 'Data Berhasil Disimpan', 'warna' => 'success'] ;
            }else{
                $pesan = ['pesan' => 'Data Gagal Disimpan', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'admin/user') ;
        }

        public function editUser($id)
        {
            if($this->input->post('tipe') == 1)
            {
                echo 'pns' ;
            }else{
                if($_FILES['foto']['name']) {
                    $upload = $this->Utility_model->upload('foto', 'assets/upload/foto', 'png|jpg|jpeg', MYURL.'admin/user', 'user') ;
                    unlink(MYPATH.'assets/upload/foto/'. $this->input->post('foto_lama')) ;
                }else{
                    $upload = $this->input->post('foto_lama') ;
                }
            }

            $query = [
                'nip' => $this->input->post('nip'), 
                'nama_user' => $this->input->post('nama_user'), 
                'email' => $this->input->post('email'), 
                'telp' => $this->input->post('telp'), 
                'id_satker' => $this->input->post('id_satker'), 
                'foto' => $upload
            ] ;
            
            $this->db->where('id_user', $id) ;
            $this->db->set($query) ;
            if($this->db->update('_user')) {
                $pesan = ['pesan' => 'Data Berhasil Disimpan', 'warna' => 'success'] ;
            }else{
                $pesan = ['pesan' => 'Data Gagal Disimpan', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'admin/user') ;
        }

        public function editStatusUSer($id, $aksi){
            $this->db->where('id_user', $id) ;
            $this->db->set('status', $aksi) ;
            if($this->db->update('_user')) {
                $pesan = ['pesan' => 'Status Berhasil Diubah', 'warna' => 'success'] ;
            }else{
                $pesan = ['pesan' => 'Status Gagal Diubah', 'warna' => 'danger'] ;
            }
            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'admin/user') ;
        }

        public function deleteUser($id){
            $this->db->where('id_user', $id) ;
            $data = $this->db->get('_user')->row_array() ;
            if( ($data['tipe'] == 0) && $data['foto'] != '' ){
                unlink(MYPATH.'assets/upload/foto/'.$data['foto']) ;
            }

            $this->db->where('id_user', $id) ;
            if($this->db->delete('_user')) {
                $pesan = ['pesan' => 'Data Berhasil Dihapus', 'warna' => 'success'] ;
            }else{
                $pesan = ['pesan' => 'Data Gagal Dihapus', 'warna' => 'danger'] ;
            }
            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'admin/user') ;
        }
    }

?>