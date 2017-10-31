<?php

class Widget_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllWidgets() {
        $query = $this->db->query('SELECT * FROM widget');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}