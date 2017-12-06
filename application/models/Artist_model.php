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
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'website' => $this->input->post('website'),
            'youtube' => $this->input->post('youtube'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'podia_id' => $this->input->post('podia'),
            'day' => $this->input->post('day'),
            'start_performance' => $this->input->post('start_performance'),
            'end_performance' => $this->input->post('end_performance')
        );

        return $this->db->insert('artists', $data);
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
            'name' => $this->input->post('name'),
            'website' => $this->input->post('website'),
            'youtube' => $this->input->post('youtube'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'description' => $this->input->post('description'),
        );

        return $this->db->replace('artists', $data);
    }

    public function geteditdata($artist_data){
        $query = $this->db->get_where('artists', array('id' => $artist_data));
        return $query->row_array();
    }

    public function getAllPodia()
    {
        $query = $this->db->get('podia');

        return $query->result_array();
    }

}