<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CI_BackendController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if (!isset($_SESSION['userinfo'])) {
            $_SESSION['error'][] = "Geen toegang tot deze pagina";
            return redirect("errors/index");
        }
    }

}


