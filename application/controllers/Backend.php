<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->checkAccess();
        $this->checkUrl();
    }

     public function checkUrl() {
        $url = uri_string();
        if (strpos($url, 'backend') !== false) {
            return true;
        } else {
            $error = "Pagina niet beschikbaar";
            $this->session->set_flashdata('error', $error);
            return redirect("backend/error");
        }
    }

    public function checkAccess() {
        if (empty($_SESSION['userinfo']) || $_SESSION['userinfo']->name == 'gebruiker') {
            $error = "Geen toegang tot deze pagina";
            $this->session->set_flashdata('error', $error);
            return redirect("errors/index");
        }
        else {
            return true;
        }
    }

    public function error()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('backend/error/error');
        $this->load->view('templates/backend_footer');
    }
}
