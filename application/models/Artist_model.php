<?php
class Artist_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function set_artist()
    {
        $data = array(
            'name' => $this->input->post('name',true),
            'description' => strip_tags($this->input->post('description')),
            'website' => $this->input->post('website',true),
            'youtube' => $this->input->post('youtube',true),
            'facebook' => $this->input->post('facebook',true),
            'twitter' => $this->input->post('twitter',true),
            'podia_id' => $this->input->post('podia'),
            'day' => $this->input->post('day'),
            'start_performance' => $this->input->post('start_performance'),
            'end_performance' => $this->input->post('end_performance')
        );

        $query = $this->db->insert('artists', $data);


        if($query)
        {
            $artist_id = $this->db->insert_id();

            $data = array(
               array(
                  'artist_id' => $artist_id,
                  'podia_id' => $this->input->post('podia_1'),
                  'event_id' => $this->input->post('event_1'),
                  'day' => $this->input->post('day_1'),
                  'start_performance' => $this->input->post('start_performance_1'),
                  'end_performance' => $this->input->post('end_performance_1')
               ),
               array(
                  'artist_id' => $artist_id,
                  'podia_id' => $this->input->post('podia_2'),
                  'event_id' => $this->input->post('event_2'),
                  'day' => $this->input->post('day_2'),
                  'start_performance' => $this->input->post('start_performance_2'),
                  'end_performance' => $this->input->post('end_performance_2')
               ),
               array(
                  'artist_id' => $artist_id,
                  'podia_id' => $this->input->post('podia_3'),
                  'event_id' => $this->input->post('event_3'),
                  'day' => $this->input->post('day_3'),
                  'start_performance' => $this->input->post('start_performance_3'),
                  'end_performance' => $this->input->post('end_performance_3')
                )
            );
            return $this->db->insert_batch('performances', $data); 
        }
        
    }

    public function get_artists()
    {
        $query = $this->db->get('artists');
        return $query->result_array();
    }


    public function deleteartist($artist_id)
    {
        $this->db->delete('artists', array('id' => $artist_id));
    }

    public function update_artist()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name',true),
            'website' => $this->input->post('website',true),
            'youtube' => $this->input->post('youtube',true),
            'facebook' => $this->input->post('facebook',true),
            'twitter' => $this->input->post('twitter',true),
            'description' => strip_tags($this->input->post('description')),
        );

        return $this->db->replace('artists', $data);
    }

    public function geteditdata($artist_data){
        $query = $this->db->get_where('artists', array('id' => $artist_data));
        return $query->row_array();
    }

    public function getPerformancesByArtist($artist_data)
    {
        $this->db->select('event.name as e_name, podia.podianame as p_name, performances.day as day, performances.start_performance as start_time, performances.end_performance as end_time, performances.id as p_id')
                 ->from('performances')
                 ->join('event', 'event.id = performances.event_id', 'left')
                 ->join('podia', 'podia.id = performances.podia_id', 'left')
                 ->where('performances.artist_id', $artist_data);

        $query = $this->db->get();

        return $query->result_array();
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
}