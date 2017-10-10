<?php

class image_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getAllImages() {
        $query = $this->db->query('SELECT * FROM image_resize_log');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function checkImage() {
    }
}