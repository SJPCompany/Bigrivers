<?php
class News_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title',true), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title',true),
            'slug' => $slug,
            'text' => $this->input->post('inhoud'),
            'creator' => $_SESSION['userinfo']->username,
            'status' => $this->input->post('status')
        );

        return $this->db->insert('news', $data);
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function deletenews($news_id)
    {
        $this->db->delete('news', array('id' => $news_id));
    }

    public function update_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title',true), 'dash', TRUE);

        $data = array(
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title',true),
            'slug' => $slug,
            'text' => $this->input->post('inhoud'),
            'creator' => $_SESSION['userinfo']->username,
            'status' => $this->input->post('status'),
        );

        return $this->db->replace('news', $data);
    }

    public function geteditdata($news_data){
        $query = $this->db->get_where('news', array('id' => $news_data));
        return $query->row_array();
    }
}