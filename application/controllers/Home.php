<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('../models/widget_model');
    }

    public function index()
    {
        // Haalt alle logs uit de database
        $data['widgets'] = $this->widget_model->getAllWidgets();
        // Als er niks terug komt geef een error
        if ($data == FALSE) {
            $error = "Error 404 nothing found";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        } // Als er wel een log terug komt laad de view met de logs uit de database
        else {
            $this->load->view('templates/header');
            $this->load->view('home_page', $data);
            $this->load->view('templates/footer');
        }
    }

    public function login()
    {
        $this->load->view('templates/header');
        $this->load->view('login_page');
        $this->load->view('templates/footer');
    }
}
