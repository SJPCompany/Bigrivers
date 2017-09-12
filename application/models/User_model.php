<?php

class user_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_Userinfo($username, $password) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array('username'=>$username, 'password'=>$password));
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $userinfo = $query->result();
        } else {
            return false;
        }
    }
}