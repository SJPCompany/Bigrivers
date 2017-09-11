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
            $_SESSION['error'];
            $error = "Wrong username or password";
            $this->session->set_userdata('error', $error);
            return redirect('errors/index');
        } else {
            $this->backend();
        }
    }

    public function backend() {
        $this->load->view('templates/header');
        $this->load->view('user/backend_page');
        $this->load->view('templates/footer');
    }
}
