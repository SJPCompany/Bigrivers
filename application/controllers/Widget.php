<?php
include 'CI_BackendController.php';
class widget extends CI_BackendController
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
            $intern_URL = $_POST['intern_URL'];
            $extern_URL = $_POST['extern_URL'];
            $document_URL = $_POST['document_URL'];
            $insert = $this->widget_model->createwidget($title, $active, $intern_URL, $extern_URL, $document_URL);
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

    public function editWidgetselect()
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
            $this->load->view('widget/editWidgetselect', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function editWidget($id = NULL)
    {
        $data['widget'] = $this->widget_model->getWidget($id);

        // Als er niks terug komt geef een error
        if ($data == FALSE) {
            $error = "Error 404 nothing found";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        } // Als er wel een log terug komt laad de view met de logs uit de database
        else {

            $this->load->view('templates/backend_header');
            $this->load->view('widget/editWidget', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function editWidgetData($id = NULL, $title = NULL, $active = NULL, $intern_URL = NULL, $extern_URL = NULL, $document_URL = NULL)
    {
            $title = $_POST['title'];
            $active = $_POST['active'];
            $intern_URL = $_POST['intern_URL'];
            $extern_URL = $_POST['extern_URL'];
            $document_URL = $_POST['document_URL'];
            $update = $this->widget_model->editWidget($id, $title, $active, $intern_URL, $extern_URL, $document_URL);
            if ($update == FALSE) {
                $_SESSION['error'] = [];
                $error = "update query went wrong";
                $this->session->set_flashdata('error', $error);
                return redirect('Backend/error');
            } else {
                $_SESSION['message'] = [];
                $message = "Widget succesfull edited";
                $this->session->set_flashdata('message', $message);
                return redirect('backend/widget/index');
            }
    }

    public function deleteWidgetselect()
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
            $this->load->view('widget/deleteWidgetselect', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function deleteWidget($id = NULL)
    {
        $this->widget_model->deleteWidget($id);
        return redirect('backend/widget/index');
    }
}