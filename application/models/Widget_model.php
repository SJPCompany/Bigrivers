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

    public function createWidget($title, $active, $link) {
        /* how to make a insert query
        $data = array('title' => 'My title',
        'name' => 'My Name',
        'date' => 'My date');
        $this->db->insert('mytable', $data);
        */

        $data = array('title' => $title, 'active' => $active, 'link' => $link);
        $this->db->insert('widget', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getWidget($id)
    {
        $query = $this->db->get_where('widget', array('id' => $id));
        
        return $query->row_array();
    }

    public function editWidget($id, $title, $active, $link)
    {
        $data = array('id' => $id, 'title' => $title, 'active' => $active, 'link' => $link);
        $this->db->where('id', $id);
        $this->db->update('widget', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteWidget($id)
    {
        $this->db->delete('widget', array('id' => $id));
    }

    public function getAllNews()
    {
        $query = $this->db->get('news');

        return $query->result_array();
    }

    public function getAllArtists()
    {
        $query = $this->db->get('artists');

        return $query->result_array();
    }

    public function getAllEvents()
    {
        $query = $this->db->get('event');

        return $query->result_array();
    }
}