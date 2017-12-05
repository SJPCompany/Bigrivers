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

    public function set_event()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'youtube' => $this->input->post('youtube'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'starttime' => $this->input->post('starttime'),
            'endtime' => $this->input->post('endtime'),
            'creator' => $_SESSION['userinfo']->username,
            'ticket' => $this->input->post('ticket'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status')
        );

        return $this->db->insert('event', $data);
    }

}