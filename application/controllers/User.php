<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->library('session');
        $this->checkUrl();
        $this->load->model('../models/user_model');
    }

    public function checkUrl() {
        $url = uri_string();
        if (strpos($url, 'backend') !== false) {
            return true;
        } else {
            $error = "Geen toegang tot deze pagina";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        }
    }

    public function index()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('backend/backend_page');
        $this->load->view('templates/backend_footer');
    }

    public function profile()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('user/profile_page');
        $this->load->view('templates/backend_footer');
    }

    public function logout(){
        unset($_SESSION['userinfo']);
        if (empty($_SESSION['userinfo'])) {
            return redirect('home/login');
        } else {
            $error = "Uitloggen ging verkeerd";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        }
    }

    public function doLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checker = $this->user_model->get_Userinfo($username, $password);
        if ($checker == FALSE) {
            $error = "Wrong username or password";
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
                $this->index();
            } else {
                return redirect('home/index');
            }
        }
    }

    public function viewUsers()
    {
        $data['users'] = $this->user_model->getAllUsers();
        if ($data == FALSE) {
            $error = "No users has been found?";
            $this->session->set_flashdata('error', $error);
            return redirect('Backend/error');
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
            $this->session->set_flashdata('error', $error);
            $this->createUser();
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $options = [
                'cost' => 8,
            ];
           $passwordhash = password_hash($password, PASSWORD_BCRYPT, $options);
            $insert = $this->user_model->createUser($username, $passwordhash, $email, $role);
            if ($insert == FALSE) {
                $_SESSION['error'] = [];
                $error = "insert query went wrong";
                $this->session->set_flashdata('error', $error);
                return redirect('Backend/error');
            } else {
                $_SESSION['message'] = [];
                $message = "User succesfull created";
                $this->session->set_flashdata('message', $message);
                return redirect('backend/user/viewUsers');
            }
        }
    }

    public function editUser($user_id = null)
    {
        $data['checkUserInfo'] = $this->user_model->getUserById($user_id);
        $data['checkRoles'] = $this->user_model->getAllRoles();
        if ($data['checkUserInfo'] == FALSE) {
            $error = "No user with this id has been found";
            $this->session->set_flashdata('error', $error);
            return redirect('Backend/error');
        } else {
            foreach ($data['checkUserInfo'] as $item) {
                $_SESSION['user_role'] = $item->name;
            }
            $_SESSION['user_id'] = $user_id;
            $this->load->view('templates/backend_header');
            $this->load->view('user/editUser', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function deleteUser($user_id){
        $this->user_model->userdelete($user_id);
    }

    public function checkEditUserData()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['role'] == NULL) {
                $role = $_SESSION['user_role'];
            } else {
                $role = $_POST['role'];
            }
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $id = $_SESSION['user_id'];
            $update = $this->user_model->updateUserById($username, $password, $email, $role, $id);
            if ($update == FALSE) {
                $_SESSION['error'] = [];
                $error = "Update query went wrong";
                $this->session->set_flashdata('error', $error);
               return redirect('Backend/error');
            } else {
                $_SESSION['message'] = [];
                $message = "User succesfull updated";
                $this->session->set_flashdata('message', $message);
                return redirect('backend/user/viewUsers');
            }
        }
    }
    public function do_upload()
    {
        $config['upload_path']          = './img/avatars/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 9999999;
        $config['max_width']            = 90000000000;
        $config['max_height']           = 90000000000;
        $config['overwrite'] = true;
        $config['remove_spaces'] = true;
        $config['file_name'] = "" . $_SESSION['userinfo']->username . "_" . $_SESSION['userinfo']->id . "";
        $this->session->set_flashdata('filename', $config['file_name']);

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload_error', $error);
            $this->profile();
            }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('upload_avatar', $data);
            $this->profile();
        }
    }
}
