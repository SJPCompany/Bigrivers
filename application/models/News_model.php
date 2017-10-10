<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('inhoud'),
            'creator' => $this->input->post('title')
        );

        return $this->db->insert('news', $data);
    }

}