<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('../models/user_model');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/login_page');
        $this->load->view('templates/footer');
    }

    public function doLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checker = $this->user_model->get_Userinfo($username, $password);
        if($checker == FALSE) {
            $_SESSION['error'] = [];
            $error = "Wrong username or password";
            $this->session->set_userdata('error', $error);
            return redirect('errors/index');
        } else // Get the role from the user
            {
            foreach ($checker as $info) {
                $role = $info->role;
            }
            // check wich role the user has
            switch ($role) {
                case 'programmeur':
                $_SESSION['programmeur'] = true;
                unset($_SESSION['beheerder'], $_SESSION['gebruiker']);
                break;
                case 'beheerder':
                $_SESSION['beheerder'] = true;
                unset($_SESSION['programmeur'], $_SESSION['gebruiker']);
                break;
                default:
                $_SESSION['gebruiker'] = true;
                unset($_SESSION['programmeur'], $_SESSION['beheerder']);
            }
            // Check if the user is allowd for the backend
            if (isset($_SESSION['programmeur']) || isset($_SESSION['beheerder'])) {
                $this->backend();
            } else {
                $this->index();
            }
        }
    }

    public function backend() {
        $this->load->view('templates/backend_header');
        $this->load->view('backend/backend_page');
        $this->load->view('templates/backend_footer');
    }
}
