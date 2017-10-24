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

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('inhoud'),
            'creator' => $this->input->post('title')
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
        header('Location: news/newsbeheer');
    }

    public function update_news($news_id)
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('inhoud'),
            'creator' => $this->input->post('title')
        );

        return $this->db->update('news', $data);
    }
}