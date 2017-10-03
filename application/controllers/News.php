<?php
class news extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('News_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->library('upload');

    }

    public function index($page = 'newscreate')
    {

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/backend_header');
        $this->load->view('news/newscreate');
        $this->load->view('templates/backend_footer');
    }


    public function create()
    {
        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('inhoud', 'Inhoud', 'required');
        $this->form_validation->set_rules('Newsimage', 'Newsimage', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/backend_header');
            $this->load->view('page/news');
            $this->load->view('templates/backend_footer');

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('page/news');
        }
    }


}