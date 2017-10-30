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

    public function getImagePath($imageid, $sizeid) {
        $imageidinfo = array('size_id' => $sizeid, 'image_id' => $imageid);
        $this->db->select('*');
        $this->db->from('image_sizes');
        $this->db->where($imageidinfo);
        $this->db->join('images', 'images.id = image_sizes.image_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getImagesize($imagewidth, $imageheight) {
        $imagearray = array('width' => $imagewidth, 'height' => $imageheight);
        $this->db->select('*');
        $this->db->from('sizes');
        $this->db->where($imagearray);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insertImageSize($imagewidth, $imageheight) {
        $data = array('name' => 'çustom', 'width' => $imagewidth, 'height' => $imageheight);
        $this->db->insert('sizes', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}