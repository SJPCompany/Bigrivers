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

    public function getImageSubPath($imageSubfolder, $imagename, $imageid, $sizeid){
        $imageidinfo = array('file_path' => 'img/' . $imageSubfolder . '/' . $imagename, 'size_id' => $sizeid, 'image_id' => $imageid);
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

    public function insetImageSizeInfo($imageid, $sizeid, $imagename) {
        $data = array('image_id' => $imageid, 'size_id' => $sizeid, 'file_path' => 'img/' . $imagename . '');
        $this->db->insert('image_sizes', $data);
        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insetImageSubSizeInfo($imageSubfolder, $imageid, $sizeid, $imagename)
    {
        $data = array('size_id' => $sizeid, 'file_path' => 'img/' . $imageSubfolder . '/' . $imagename . '', 'image_id' => $imageid);
        $this->db->insert('image_sizes', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insetImageCachedInfo($imageSubfolder, $imageid, $sizeid)
    {
        $data = array('size_id' => $sizeid, 'file_path' => 'img/' . $imageSubfolder, 'image_id' => $imageid);
        $this->db->insert('image_sizes', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insetImageName($imagename) {
        $data = array('name' => $imagename);
        $this->db->insert('images', $data);
        if($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getImage($name) {
        $query = $this->db->get_where('images', array('name' => $name));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insertImage($name, $width, $height) {
        $data = array('name' => $name, 'orginal_width' => $width, 'orginal_height' => $height);
        $this->db->insert('images', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}