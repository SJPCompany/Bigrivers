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
        $data['news'] = $this->widget_model->getAllNews();

        $this->load->view('templates/backend_header');
        $this->load->view('widget/createWidget', $data);
        $this->load->view('templates/backend_footer');
    }

    public function checkWidgetData()
    {
        $this->lang->load('form_validation_lang', 'dutch');

        if (!$_POST['title']) {
            $_SESSION['error'] = [];
            $error = "De data kan niet gevonden worden!";
            $this->session->set_flashdata('error', $error);
            $this->createwidget();
        } else {
            $title = $_POST['title'];
            $active = $_POST['active'];
            $intern_URL = $_POST['intern_URL'];
            $extern_URL = $_POST['extern_URL'];
            $document_URL = $_POST['document_URL'];

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('active', 'active', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $data['news'] = $this->widget_model->getAllNews();

                $this->load->view('templates/backend_header');
                $this->load->view('widget/createWidget', $data);
                $this->load->view('templates/backend_footer');
            }
            else 
            {
                $insert = $this->widget_model->createwidget($title, $active, $link);
                if ($insert == FALSE) {
                    $_SESSION['error'] = [];
                    $error = "Er gaat iets fout met de query!";
                    $this->session->set_flashdata('error', $error);
                    return redirect('Backend/error');
                } else {
                    $_SESSION['message'] = [];
                    $message = "Widget is aangemaakt!";
                    $this->session->set_flashdata('message', $message);
                    return redirect('backend/widget/index');
                }
            }
        }
    }

    public function editWidget($id = NULL)
    {
        $data['widget'] = $this->widget_model->getWidget($id);
        $data['news'] = $this->widget_model->getAllNews();

        // Als er niks terug komt geef een error
        if ($data == FALSE) {
            $error = "Foutmelding 404: Niks gevonden";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        } // Als er wel een log terug komt laad de view met de logs uit de database
        else {

            $this->load->view('templates/backend_header');
            $this->load->view('widget/editWidget', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function editWidgetData($id = NULL, $title = NULL, $active = NULL, $link = NULL)
    {
            $title = $_POST['title'];
            $active = $_POST['active'];
            $intern_URL = $_POST['intern_URL'];
            $extern_URL = $_POST['extern_URL'];
            $document_URL = $_POST['document_URL'];

            $this->form_validation->set_rules('title', 'title', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $this->lang->load('form_validation_lang', 'dutch');

                $update = $this->widget_model->editWidget($id, $title, $active, $link);
                if ($update == FALSE) {
                    $_SESSION['error'] = [];
                    $error = "Er gaat iets fout in de query";
                    $this->session->set_flashdata('error', $error);
                    return redirect('Backend/error');
                } else {
                    $_SESSION['message'] = [];
                    $message = "Widget is bewerkt en opgeslagen";
                    $this->session->set_flashdata('message', $message);
                    return redirect('backend/widget/index');
                }
            }
    }

    public function deleteWidget($id = NULL)
    {
        $this->widget_model->deleteWidget($id);
        return redirect('backend/widget/index');
    }
}