<?php
class news extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('News_model');
        $this->load->helper('form');
        $this->load->library('form_validation');

    }

    public function index($page = 'newscreate')
    {

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/backend_header');
        $this->load->view('user/newscreate');
        $this->load->view('templates/backend_footer');
    }


    public function create()
    {

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }


}