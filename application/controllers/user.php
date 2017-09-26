<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
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

    public function backend()
    {
        $this->load->library('upload');
        $this->load->view('templates/backend_header');
        $this->load->view('backend/backend_page');
        $this->load->view('templates/backend_footer');
    }

    public function profile()
    {
        $this->load->helper('form');
        $this->load->view('templates/backend_header');
        $this->load->view('user/profile_page');
        $this->load->view('templates/backend_footer');
    }

    public function doLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checker = $this->user_model->get_Userinfo($username, $password);
        if ($checker == FALSE) {
            $_SESSION['error'] = [];
            $error = "Wrong username or password";
            $this->session->set_userdata('error', $error);
            return $this->index();
        } else // Get the role from the user
        {
            foreach ($checker as $info) {
                $role = $info;
            }
            $this->session->set_userdata('userinfo', $role);
            // Check if the user is allowd for the backend
            if ($_SESSION['userinfo']->role == 'programmeur' || $_SESSION['userinfo']->role == 'beheerder') {
                $this->backend();
            } else {
                return redirect('home/index');
            }
        }
    }

    public function viewUsers()
    {
        $data['users'] = $this->user_model->getAllUsers();
        if ($data == FALSE) {
            $_SESSION['error'] = [];
            $error = "No users has been found?";
            $this->session->set_userdata('error', $error);
            return redirect('errors/index');
        } else {
            $this->load->view('templates/backend_header');
            $this->load->view('user/viewUsers', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function createUser()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('user/createUser');
        $this->load->view('templates/backend_footer');
    }

    public function checkUserData()
    {
        if ($_POST['username'] == '' || $_POST['password'] == '' || $_POST['email'] == '' ||
            $_POST['role'] == ''
        ) {
            $_SESSION['error'] = [];
            $error = "User data is left empty";
            $this->session->set_userdata('error', $error);
            $this->createUser();
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $insert = $this->user_model->createUser($username, $password, $email, $role);
            if ($insert == FALSE) {
                $_SESSION['error'] = [];
                $error = "insert query went wrong";
                $this->session->set_userdata('error', $error);
                return redirect('errors/index');
            } else {
                return redirect('user/viewUsers');
            }
        }
    }
    public function do_upload()
    {
        $config['upload_path']          = './img/avatars/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
        $config['file_name'] = "jammer dit";


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata('upload_error', $error);
            $this->profile();
            }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_userdata('upload_avatar', $data);
            $this->profile();
        }
    }
}
