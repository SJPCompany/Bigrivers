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

    public function getPerformanceTime()
    {
        $query = $this->db->get('time');
        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getPerformanceInfo()
    {
        $this->db->select('*');
        $this->db->from('performance_time pt');
        $this->db->join('performance p', 'pt.performance_id = p.id', 'left');
        $this->db->join('artists a', 'p.artist_id = a.id', 'left');
        $this->db->join('podia po', 'p.podium_id = po.id', 'left');
        $this->db->order_by('p.podium_id', 'ASC');

        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}