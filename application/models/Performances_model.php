<?php

class Performances_model  extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getPerformance($performance_id)
    {
      $query = $this->db->get_where('performances', array('id' => $performance_id));
      return $query->row_array();
    }

    public function getPodiabyPerformance($performance_id)
    {
      $this->db->select('podia.id as p_id, podia.podianame as p_name')
               ->from('podia')
               ->join('performances', 'performances.podia_id = podia.id')
               ->where('performances.id', $performance_id);

      $query = $this->db->get();

      return $query->row_array();
    }

    public function getEventbyPerformance($performance_id)
    {
      $this->db->select('event.id as e_id, event.name as e_name')
               ->from('event')
               ->join('performances', 'performances.event_id = event.id')
               ->where('performances.id', $performance_id);

      $query = $this->db->get();

      return $query->row_array();
    }

     public function getAllPodia()
    {
        $query = $this->db->get('podia');

        return $query->result_array();
    }

    public function getAllEvents()
    {
       $query = $this->db->get('event');

        return $query->result_array(); 
    }

    public function update_performance()
    {
      $data = array(
        'id' => $this->input->post('id'),
        'artist_id' => $this->input->post('artist_id'),
        'podia_id' => $this->input->post('podia'),
        'event_id' => $this->input->post('event'),
        'day' => $this->input->post('day'),
        'start_performance' => $this->input->post('start_performance'),
        'end_performance' => $this->input->post('end_performance'),
      );

      return $this->db->replace('performances', $data);
    }

    public function getArtist($artist_id = '')
    {
    	$query = $this->db->get_where('artists', array('id' => $artist_id));

    	return $query->row_array();
    }

    public function create_performance()
    {
    	$data = array(
    		'artist_id' => $this->input->post('artist_id'),
            'podia_id' => $this->input->post('podia'),
            'event_id' => $this->input->post('event'),
            'day' => $this->input->post('day'),
            'start_performance' => $this->input->post('start_performance'),
            'end_performance' => $this->input->post('end_performance')
    	);

    	return $this->db->insert('performances', $data);
    }

    public function delete_performance($performance_id)
    {
    	$this->db->delete('performances', array('id' => $performance_id));
    }

}