<?php

/**
 * Created by PhpStorm.
 * User: justi
 * Date: 5-12-2017
 * Time: 11:14
 */
class Performance_model  extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllEvents() {
        $this->db->select('*');
        $this->db->from('event ev');
        $this->db->join('event_days ed', 'ed.event_id = ev.id', 'left');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getPerformanceById($id) {
        $this->db->select('*');
        $this->db->from('performance');
        $this->db->where(array('event_days_id' => $id));
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}