<?php

class Performance extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Performance_model');
    }

    public function index()
    {
        $data['locaties'] = $this->Performance_model->getAllEvents();
        if ($data == FALSE) {
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

    public function locationCheck($id = null)
    {
        $data['info'] = $this->Performance_model->getPerformanceById($id);
        if ($data == FALSE) {
            $error = "Geen tijden gevonden op deze dag";
            $this->session->set_flashdata('error', $error);
            $this->load->view('templates/header');
            $this->load->view('performance/location');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('performance/location', $data);
            $this->load->view('templates/footer');
        }
    }
}