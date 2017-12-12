<?php
class news_frontend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

// slug zorgt ervoor dat het id niet in de url gezien wordt maar de titel van het nieuws bericht
    public function view($slug = NULL)
    {
        $data['news_item'] = $this->News_model->get_news($slug);

        if (empty($data['news_item']))
        {
            echo 'error';
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('page/newsview', $data);
        $this->load->view('templates/footer');
    }

    // laad view voor de niewslijst op de frontend en geef de data mee
    public function newslist()
    {
        $data['news'] = $this->News_model->get_news();

        $this->load->view('templates/header');
        $this->load->view('page/news',$data);
        $this->load->view('templates/footer');
    }

}