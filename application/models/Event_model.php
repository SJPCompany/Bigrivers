<?php
class Event_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_events(){
        $query = $this->db->get('event');
        return $query->result_array();
    }

    public function deleteevent($event_data){
        $this->db->delete('event', array('id' => $event_data));
    }

}