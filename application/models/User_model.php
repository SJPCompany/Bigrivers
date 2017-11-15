<?php

class user_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_Userinfo($username, $password) {
        $this->db->select('*');
        $this->db->from('v_userrole');
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
        $this->db->from('v_userrole');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function createUser($username, $passwordhash, $email, $role) {
        /* how to make a insert query
        $data = array('title' => 'My title',
        'name' => 'My Name',
        'date' => 'My date');
        $this->db->insert('mytable', $data);
        */

        $data = array('username' => $username, 'password' => $passwordhash, 'email' => $email, 'role_id' => $role);
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function userdelete($user_id){
        $this->db->delete('news', array('id' => $user_id));
    }

    public function UserCount(){
        $this->db->select('*') ;
        $this->db->from('user');
        $query = $this->db->get();
        $num_rows = $query->num_rows();
    }

    public function getAllRoles() {
        $this->db->select('*');
        $this->db->from('roles');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getUserById($user_id){
        $this->db->select('*');
        $this->db->from('v_userrole');
        $this->db->where(array('id' => $user_id));
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $userdata = $query->result();
        } else {
            return false;
        }
    }

    public function updateUserById($username, $password, $email, $role, $status, $id) {
        $data = array('username' => $username, 'password' => $password, 'email' => $email, 'status' => $status, 'role_id' => $role);
        $this->db->where(array('id' => $id));
        $this->db->update('user', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}