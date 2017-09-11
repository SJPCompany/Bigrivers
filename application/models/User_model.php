<?php

class user_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_Userinfo($username, $password) {
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}