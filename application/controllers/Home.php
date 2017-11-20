<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('../models/widget_model');
        $this->load->model('../models/user_model');
    }

    public function index()
    {
        // Haalt alle logs uit de database
        $data['widgets'] = $this->widget_model->getAllWidgets();
        // Als er niks terug komt geef een error
        if ($data == FALSE) {
            $error = "Foutmelding 404: Niks gevonden";
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

    public function doLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checker = $this->user_model->get_Userinfo($username, $password);
        if ($checker == FALSE) {
            $error = "Gebruikersnaam en/of wachtwoord is verkeerd ingevuld";
            $this->session->set_flashdata('error', $error);
            return redirect('home/login');
        } else // Get the role from the user
        {
            foreach ($checker as $info) {
                $role = $info;
            }
            $this->session->set_userdata('userinfo', $role);
            // Check if the user is allowd for the backend
            if ($_SESSION['userinfo']->name == 'programmeur' || $_SESSION['userinfo']->name == 'beheerder') {
                return redirect('backend/user/index');
            } else {
                return redirect('home/index');
            }
        }
    }
}
