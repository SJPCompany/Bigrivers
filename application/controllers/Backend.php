<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('backend/error/error');
        $this->load->view('templates/backend_footer');
    }
}
