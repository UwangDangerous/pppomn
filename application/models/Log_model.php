<?php 

    class Log_model extends CI_Model{
        public function getDataLogin() 
        {
            $this->db->join('_user', '_user.id_user = _user_login.id_user') ;
            $this->db->order_by('id_login', 'desc') ;
            return $this->db->get('_user_login')->result_array() ;
        }
        public function getDataLog() 
        {
            $this->db->join('_user', '_user.id_user = _user_log.id_user') ;
            $this->db->order_by('id_log', 'desc') ;
            return $this->db->get('_user_log')->result_array() ;
        }
    }

?>