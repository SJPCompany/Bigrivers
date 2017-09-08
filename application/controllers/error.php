<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class error extends CI_Controller
{
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('view/errors/index');
        $this->load->view('templates/footer');
    }
}