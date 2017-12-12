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
            'description' => $this->input->post('description'),
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
            'description' => $this->input->post('description'),
        );

        $query = $this->db->replace('artists', $data);

        if($query)
        {
            $data = array(
               array(
                  'artist_id' => $this->input->post('id'),
                  'podia_id' => $this->input->post('podia_1'),
                  'event_id' => $this->input->post('event_1'),
                  'day' => $this->input->post('day_1'),
                  'start_performance' => $this->input->post('start_performance_1'),
                  'end_performance' => $this->input->post('end_performance_1')
               ),
               array(
                  'artist_id' => $this->input->post('id'),
                  'podia_id' => $this->input->post('podia_2'),
                  'event_id' => $this->input->post('event_2'),
                  'day' => $this->input->post('day_2'),
                  'start_performance' => $this->input->post('start_performance_2'),
                  'end_performance' => $this->input->post('end_performance_2')
               ),
               array(
                  'artist_id' => $this->input->post('id'),
                  'podia_id' => $this->input->post('podia_3'),
                  'event_id' => $this->input->post('event_3'),
                  'day' => $this->input->post('day_3'),
                  'start_performance' => $this->input->post('start_performance_3'),
                  'end_performance' => $this->input->post('end_performance_3')
                )
            );
            return $this->db->update_batch('performances', $data); 
        }
    }

    public function geteditdata($artist_data){
        $this->db->select()
                 ->from('artists')
                 ->join('performances', 'performances.artist_id = artists.id')
                 ->where('artist_id', $artist_data);
                 
        $query = $this->db->get();
        /*$query = $this->db->get_where('artists', array('id' => $artist_data));*/
        return $query->row_array();
    }

    /*public function getPerfomancesByArtist($artist_id)
    {
        $query = $this->db->get_where('performances', array('artist_id' => $artist_id));
        return $query->row_array();
    }*/

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
}