<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('home_page');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $this->load->view('templates/header');
        $this->load->view('login_page');
        $this->load->view('templates/footer');
    }
}
