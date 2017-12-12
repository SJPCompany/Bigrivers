<?php
class Podia_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_podia(){
        $query = $this->db->get('podia');
        return $query->result_array();
    }

//create podia in de database
    public function set_podia()
    {
        $data = array(
            'podianame' => $this->input->post('podianame',true),
            'street' => $this->input->post('street',true),
            'housenumber' => $this->input->post('housenumber',true),
            'zip' => $this->input->post('zip',true),
            'city' => $this->input->post('city',true),
            'status' => $this->input->post('status')
        );

        return $this->db->insert('podia', $data);
    }

    public function deletepodia($podia){
        $this->db->delete('podia', array('id' => $podia));
    }

    public function geteditdata($podia){
        $query = $this->db->get_where('podia', array('id' => $podia));
        return $query->row_array();
    }

    public function edit_podia(){
        $data = array(
            'id' => $this->input->post('id'),
            'podianame' => $this->input->post('podianame',true),
            'street' => $this->input->post('street',true),
            'housenumber' => $this->input->post('housenumber',true),
            'zip' => $this->input->post('zip',true),
            'city' => $this->input->post('city',true),
            'status' => $this->input->post('status')
        );
        return $this->db->replace('podia', $data);
    }
}