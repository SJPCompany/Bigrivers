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
// laad view voor de pagina newscreate
    public function newscreate($page = 'newscreate')
    {

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('templates/backend_header');
        $this->load->view('news/newscreate');
        $this->load->view('templates/backend_footer');
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
// laad view voor de nieuwsbeheerlijst op de backend en geef de data mee
    public function newsbeheer()
    {
        $data['news'] = $this->News_model->get_news();

        $this->load->view('templates/backend_header');
        $this->load->view('news/newsbeheer',$data);
        $this->load->view('templates/backend_footer');
    }

    public function newseditpage ($news_data){
        $data['news_item'] = $this->News_model->geteditdata($news_data);

        if (empty($data['news_item']))
        {
            echo 'error';
        }

        $this->load->view('templates/backend_header');
        $this->load->view('news/newsedit',$data);
        $this->load->view('templates/backend_footer');
    }

// pak de data uit de form check of alles is ingevult en geef dan de data door naar de model anders geef een error page
    public function create()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('inhoud', 'Inhoud', 'required');
//        $this->form_validation->set_rules('newsimage', 'Newsimage', 'required');

        if ($this->form_validation->run() === FALSE)
        {
//            $error = "vul alle velden goed in";
//            $this->session->set_flashdata('error', $error);
//            $this->load->view('backend/error/error',$error);
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $this->newscreate();

        }
        else
        {
            $this->News_model->set_news();
            return redirect('news/newsbeheer');
        }
    }

//delete function om een artikel uit de database te verwijderen
    public function delete($news_data) {
        $this->News_model->deletenews($news_data);
    }
//edit function om een nieuws bericht aan te passen
    public function edit(){
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
            $this->News_model->update_news();
            $this->newslist();
        }
    }

}