<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('../models/user_model');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/login_page');
        $this->load->view('templates/footer');
    }

    public function doLogin() {
    }

    public function backend() {
        $this->load->view('templates/header');
        $this->load->view('user/backend_page');
        $this->load->view('templates/footer');
    }
}
