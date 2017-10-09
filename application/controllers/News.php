<?php
class news extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');

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

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('inhoud', 'Inhoud', 'required');
//        $this->form_validation->set_rules('newsimage', 'Newsimage', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $error = "vul alle velden goed in";
            $this->session->set_flashdata('error', $error);
            $this->load->view('backend/error/error',$error);

        }
        else
        {
            $this->News_model->set_news();
            $this->load->view('news');
        }
    }

}