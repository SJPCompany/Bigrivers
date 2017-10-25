<?php
class widget extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

// laad view voor de pagina Beheer widgets
    public function viewWidgets()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('widget/viewWidgets');
        $this->load->view('templates/backend_footer');
    }
}