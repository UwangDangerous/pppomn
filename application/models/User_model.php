<?php 

    class User_model extends CI_Model{
        public function getDataUser()
        {
            $this->db->join('_satker','_satker.id_satker = _user.id_satker','left') ;
            return $this->db->get('_user')->result_array() ;
        }

        public function addUser()
        {
            $query = [
                'nip' => $this->input->post('nip'), 
                'nama_user' => $this->input->post('nama_user'), 
                'email' => $this->input->post('email'), 
                'telp' => $this->input->post('telp'), 
                'id_satker' => $this->input->post('id_satker'), 
                'foto' => $this->input->post('foto'), 
            ]
        }
    }

?>