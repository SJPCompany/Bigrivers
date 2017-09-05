<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/login_page');
        $this->load->view('templates/footer');
    }
}
