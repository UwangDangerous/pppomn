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
            $this->db->order_by('id_ruangan', 'asc') ;
            return $this->db->get('ruangan_booking')->row_array() ;
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
            redirect(MYURL.'admRuangan/ruangan') ;
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
            redirect(MYURL.'admRuangan/ruangan') ;
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
            redirect(MYURL.'admRuangan/ruangan') ;
        }





        //booking

        public function getDataBooking($id)
        {
            $this->db->where('id_ruangan', $id) ;
            $this->db->join('_user', '_user.id_user = ruangan_booking.id_user', 'left') ;
            $this->db->join('_satker', '_user.id_satker = _satker.id_satker', 'left') ;
            $this->db->order_by('id_booking', 'desc') ;
            return $this->db->get('ruangan_booking')->result_array() ; 
        }

        public function addBooking($id, $user='false') 
        {
            $query = [
                'id_ruangan' => $id ,
                'id_user' => $this->session->userdata('idKey') ,
                'tgl_booking' => $this->input->post('tgl_booking'),
                'jam_booking' => $this->input->post('jam_booking'),
                'selesai_booking' => $this->input->post('selesai_booking'),
                'lama_booking' => $this->input->post('lama_booking'),
                'keterangan' => $this->input->post('keterangan')
            ] ;

            if($this->db->insert('ruangan_booking', $query)) 
            {
                $pesan = [
                    'pesan' => 'Data Berhasil Disimpan' ,
                    'warna' => 'success'
                ];
            }else{
                $pesan = [
                    'pesan' => 'Data Gagal Disimpan' ,
                    'warna' => 'danger'
                ];
            }

            $this->session->set_flashdata($pesan) ;
            if($user == true){
                redirect(MYURL."ruangan/booking/$id") ;
            }else{
                redirect(MYURL."admRuangan/ruangan/booking/$id") ;
            }
        }

    }

?>