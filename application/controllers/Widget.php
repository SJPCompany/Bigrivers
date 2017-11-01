<?php
class widget extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('session');
        $this->output->enable_profiler(FALSE);
        $this->load->model('../models/widget_model');
        $this->load->library('form_validation');
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
            $this->load->view('templates/backend_header');
            $this->load->view('widget/index', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function CreateWidget()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('widget/createWidget');
        $this->load->view('templates/backend_footer');
    }

    public function checkWidgetData()
    {
        if (!$_POST['title']) {
            $_SESSION['error'] = [];
            $error = "Widget data is left empty";
            $this->session->set_flashdata('error', $error);
            $this->createwidget();
        } else {
            $title = $_POST['title'];
            $active = $_POST['active'];
            $insert = $this->widget_model->createwidget($title, $active);
            if ($insert == FALSE) {
                $_SESSION['error'] = [];
                $error = "insert query went wrong";
                $this->session->set_flashdata('error', $error);
                return redirect('Backend/error');
            } else {
                $_SESSION['message'] = [];
                $message = "Widget succesfull created";
                $this->session->set_flashdata('message', $message);
                return redirect('backend/widget/index');
            }
        }
    }
}