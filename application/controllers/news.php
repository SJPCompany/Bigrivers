<?php
class news extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('News_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');

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
        $this->load->helper('form');
        $this->load->library('form_validation');


        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('inhoud', 'inhoud', 'required');
        $this->form_validation->set_rules('newsimage', 'Newsimage', 'required');

        if ($this->form_validation->run() === FALSE)
        {
//            $this->load->view('templates/backend_header');
//            $this->load->view('user/newscreate');
//            $this->load->view('templates/backend_footer');
            echo 'error';

        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

}