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
            $_SESSION['username'] = $username;
            return $userinfo = $query->result();
        } else {
            return false;
        }
    }

    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}