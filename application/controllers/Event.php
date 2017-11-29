<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('errors/index');
        $this->load->view('templates/footer');
    }

    public function createeventpage(){
        $this->load->view('templates/backend_header');
        $this->load->view('event/eventcreate');
        $this->load->view('templates/backend_footer');
    }
}