<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'CI_BackendController.php';

class user extends CI_BackendController
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

    public function viewUsers()
    {
        $data['users'] = $this->user_model->getAllUsers();
        if ($data == FALSE) {
            $error = "Er zijn geen gebruikers gevonden";
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
            $error = "Formulier is in sommige velden niet ingevuld";
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
                $error = "Er gaat iets fout in de query";
                $this->session->set_flashdata('error', $error);
                return redirect('Backend/error');
            } else {
                $_SESSION['message'] = [];
                $message = "Gebruiker aangemaakt";
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
            $error = "De geselecteerde gebruiker kan niet gevonden worden";
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
            $status = $_POST['status'];
            $id = $_SESSION['user_id'];
            $update = $this->user_model->updateUserById($username, $password, $email, $role, $status, $id);
            if ($update == FALSE) {
                $_SESSION['error'] = [];
                $error = "Er gaat iets fout in de query";
                $this->session->set_flashdata('error', $error);
               return redirect('Backend/error');
            } else {
                $_SESSION['message'] = [];
                $message = "Gebruiker is bewerkt en opgeslagen";
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
