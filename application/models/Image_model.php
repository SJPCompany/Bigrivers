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

    public function checkImageExits($imagename, $imagewidth, $imageheight) {
        // $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $query = $this->db->get_where('image_resize_log', array('orginal_filename' => $imagename, 'width' => $imagewidth,
            'height' => $imageheight));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}