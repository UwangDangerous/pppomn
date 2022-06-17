<?php 

    class Ruangan_model extends CI_Model{
        public function getDataRuangan()
        {
            return $this->db->get('ruangan_daftar')->result_array() ;
        }
        public function getDataRuanganForEdit($id)
        {
            $this->db->where('id_ruangan', $id) ;
            return $this->db->get('ruangan_daftar')->row_array() ;
        }

        public function getDataRuanganForStatus($id)
        {
            $this->db->where('id_ruangan', $id) ;
            $this->db->where('mulai_booking', date("Y-m-d")) ;
            return $this->db->get('ruangan_booking')->num_rows() ;
        }

        public function addRuangan()
        {
            $query = [
                'nama_ruangan' => $this->input->post('nama_ruangan'), 
                'lokasi' => $this->input->post('lokasi'), 
            ] ;
            
            if($this->db->insert('ruangan_daftar', $query)) {
                $pesan = ['pesan' => 'Data Berhasil Disimpan', 'warna' => 'success'] ;
                $this->Utility_model->logUserHistory($this->session->userdata('idKey'), $this->session->userdata('nameKey').' Telah Menambah Ruangan') ;
            }else{
                $pesan = ['pesan' => 'Data Gagal Disimpan', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'ruangan/ruangan') ;
        }

        public function editRuangan($id)
        {
            $query = [
                'nama_ruangan' => $this->input->post('nama_ruangan'), 
                'lokasi' => $this->input->post('lokasi'), 
            ] ;
            
            $this->db->where('id_ruangan', $id) ;
            if($this->db->update('ruangan_daftar', $query)) {
                $pesan = ['pesan' => 'Data Berhasil DIubah', 'warna' => 'success'] ;
                $this->Utility_model->logUserHistory($this->session->userdata('idKey'), $this->session->userdata('nameKey').' Telah Mengubah Data Ruangan') ;
            }else{
                $pesan = ['pesan' => 'Data Gagal DIubah', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'ruangan/ruangan') ;
        }

        public function deleteRuangan($id)
        {
            $this->db->where('id_ruangan', $id) ;
            if($this->db->delete('ruangan_daftar')) {
                $pesan = ['pesan' => 'Data Berhasil Dihapus', 'warna' => 'success'] ;
                $this->Utility_model->logUserHistory($this->session->userdata('idKey'), $this->session->userdata('nameKey').' Telah Menghapus Data Ruangan') ;
            }else{
                $pesan = ['pesan' => 'Data Gagal Dihapus', 'warna' => 'danger'] ;
            }

            $this->session->set_flashdata($pesan) ;
            redirect(MYURL.'ruangan/ruangan') ;
        }





        //booking

        public function getDataBooking($id)
        {
            $this->db->join('_user', '_user.id_user = ruangan_booking.id_user', 'left') ;
            $this->db->order_by('mulai_booking', 'desc') ;
            return $this->db->get_where('ruangan_booking', ['id_ruangan', $id])->result_array() ; 
        }

    }

?>