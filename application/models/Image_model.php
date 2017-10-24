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

    public function checkImageExits($imagename) {
        // $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $query = $this->db->get_where('images', array('name' => $imagename));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getImagePath() {
        $this->db->select('*');
        $this->db->from('image_sizes');
        $this->db->join('images', 'image_sizes.image_id = images.id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getImagesize($imagewidth, $imageheight) {

    }
}