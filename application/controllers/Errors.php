<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class errors extends CI_Controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('errors/index');
        $this->load->view('templates/footer');
    }
}