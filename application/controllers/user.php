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

    public function backend() {
        $this->load->view('templates/backend_header');
        $this->load->view('backend/backend_page');
        $this->load->view('templates/backend_footer');
    }

    public function profile(){
        $this->load->view('templates/backend_header');
        $this->load->view('user/profile_page');
        $this->load->view('templates/backend_footer');
    }

    public function doLogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checker = $this->user_model->get_Userinfo($username, $password);
        if($checker == FALSE) {
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

    public function viewUsers() {
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

    public function createUser() {
        $this->load->view('templates/backend_header');
        $this->load->view('user/createUser');
        $this->load->view('templates/backend_footer');
    }

    public function checkUserData() {
        if ($_POST['username'] == '' || $_POST['password'] == '' || $_POST['email'] == '' ||
        $_POST['role'] == '') {
            $_SESSION['error'] = [];
            $error = "User data is left empty";
            $this->session->set_userdata('error', $error);
            $this->createUser();
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role= $_POST['role'];
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
    public function upload_user_avatar() {
        if(isset($_POST['upload'])){
            $id = $_POST['id'];

            if (($_FILES["avatar"]["type"] == "image/png")
                || ($_FILES["avatar"]["type"] == "image/jpg")){

                    $filename = basename($_FILES['avatar']);
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $new       = 'avatar_'.$user_id.'.png';

                    $target= $_SERVER['DOCUMENT_ROOT'] ."/bigrivers2017/img/avatars";
                    $this->load->model('user_model');

                    $this->user_model->up_avatar($new);
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target."/{$new}")){
                        redirect("user/backend", "refresh");
                    }
                    else{
                        $msg = "Error, upload not succesfull";
                    }
                }
                else{
                    $this->session->set_flashdata("ERRORava", "Not an jpg or png.");
                }
            }

        }

}
