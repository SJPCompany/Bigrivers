<?php

class Performance extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Podia_model');
    }

    public function index()
    {
        $data['locaties'] = $this->Podia_model->get_podia();
        if ($data == FALSE || empty($data['locaties'])) {
            $error = "Er zijn geen locaties gevonden";
            $this->session->set_flashdata('error', $error);
            $this->load->view('templates/header');
            $this->load->view('performance/index');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('performance/index', $data);
            $this->load->view('templates/footer');
        }
    }
}