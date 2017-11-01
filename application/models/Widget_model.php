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

    public function createWidget($title, $active) {
        /* how to make a insert query
        $data = array('title' => 'My title',
        'name' => 'My Name',
        'date' => 'My date');
        $this->db->insert('mytable', $data);
        */

        $data = array('title' => $title, 'active' => $active);
        $this->db->insert('widget', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}