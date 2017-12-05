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
        $data['artists'] = $this->widget_model->getAllArtists();

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
            $linktype = $_POST['LinkView_LinkType'];

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
                if($linktype == "external")
                {
                    $link = $_POST['LinkView_ExternalUrl'];
                }
                elseif($linktype == "file")
                {
                    if ($_POST && empty($_FILES['LinkView_File']['name'])) {
                        $link = $_FILES['LinkView_File']['name'];
                    }

                    if ($_POST && !empty($_FILES['LinkView_File']['name'])) {

                        //var_dump($_FILES);
                        //$tempfile_fullpath = $_FILES['LinkView_File']['tmp_name'];
                        //$newfile_name = strtolower($_FILES['LinkView_File']['name']);

                        $newfile_fullpath = $this->do_upload('LinkView_File');

                         if ( ! $newfile_fullpath)
                        {
                           $error = array('error' => $this->upload->display_errors());
                           $this->session->set_flashdata('error', $error);
                            return redirect('Backend/error');
                        }
                        else
                        {
                            $file_name = $_FILES['LinkView_File']['name'];

                            $url = $this->config->base_url('application/uploads') . '/' . $file_name;

                            $link = $url;
                        }
                    }
                }
                elseif($linktype == "internal")
                {
                    $internal_type = $_POST['LinkView_InternalType'];

                    if($internal_type == "Index")
                    {
                        $link = $this->config->base_url('home');
                    }
                    elseif($internal_type == "Events")
                    {
                        $event_id = $_POST['LinkView_InternalEventId'];

                        $url = $this->config->base_url('home') . '/' . $internal_type . '/' . $event_id;

                        $link = $url;

                    }
                    elseif($internal_type == "Performances")
                    {
                        $performance_id = $_POST['LinkView_InternalPerformanceId'];

                        $url = $internal_type . '/' . $performance_id;

                        $link = $this->config->base_url($url);

                    }
                    elseif($internal_type == "Artists")
                    {
                        $artist_id = $_POST['LinkView_InternalArtistId'];

                        $url = $internal_type . '/' . $artist_id;

                        $link = $this->config->base_url($url);

                    }
                    elseif($internal_type == "Page")
                    {
                        $page_id = $_POST['LinkView_InternalPageId'];

                        $url = $internal_type . '/' . $page_id;

                        $link = $this->config->base_url($url);

                    }
                    elseif($internal_type == "News")
                    {
                        $news_id = $_POST['LinkView_InternalNewsId'];

                        $url = $internal_type . '/' . $news_id;

                        $link = $this->config->base_url($url);

                    }
                }

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
        $data['artists'] = $this->widget_model->getAllArtists();

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
            $this->lang->load('form_validation_lang', 'dutch');

            $id = $_POST['id'];
            $title = $_POST['title'];
            $active = $_POST['active'];
            $linktype = $_POST['LinkView_LinkType'];

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('active', 'active', 'required');

            if($this->form_validation->run() == FALSE)
            {
                $data['widget'] = $this->widget_model->getWidget($id);
                $data['news'] = $this->widget_model->getAllNews();

                $this->load->view('templates/backend_header');
                $this->load->view('widget/editWidget', $data);
                $this->load->view('templates/backend_footer');
            }
            else
            {
                if($linktype == "external")
                {
                    $link = $_POST['LinkView_ExternalUrl'];
                }
                elseif($linktype == "file")
                {

                    if ($_POST && empty($_FILES['LinkView_File']['name'])) {
                        $link = $_FILES['LinkView_File']['name'];
                    }

                    if ($_POST && !empty($_FILES['LinkView_File']['name'])) {

                        //var_dump($_FILES);
                        //$tempfile_fullpath = $_FILES['LinkView_File']['tmp_name'];
                        //$newfile_name = strtolower($_FILES['LinkView_File']['name']);

                        $newfile_fullpath = $this->do_upload('LinkView_File');

                         if ( ! $newfile_fullpath)
                        {
                           $error = array('error' => $this->upload->display_errors());
                           $this->session->set_flashdata('error', $error);
                            return redirect('Backend/error');
                        }
                        else
                        {
                            $file_name = $_FILES['LinkView_File']['name'];

                            $url = $this->config->base_url('application/uploads') . '/' . $file_name;

                            $link = $url;
                        }
                    }
                }
                elseif($linktype == "internal")
                {
                    $internal_type = $_POST['LinkView_InternalType'];

                    if($internal_type == "Index")
                    {
                        $link = $this->config->base_url('home');
                    }
                    elseif($internal_type == "Events")
                    {
                        $event_id = $_POST['LinkView_InternalEventId'];

                        $url = $this->config->base_url('home') . '/' . $internal_type . '/' . $event_id;

                        $link = $url;

                    }
                    elseif($internal_type == "Performances")
                    {
                        $performance_id = $_POST['LinkView_InternalPerformanceId'];

                        $url = $internal_type . '/' . $performance_id;

                        $link = $this->config->base_url($url);

                    }
                    elseif($internal_type == "Artists")
                    {
                        $artist_id = $_POST['LinkView_InternalArtistId'];

                        $url = $internal_type . '/' . $artist_id;

                        $link = $this->config->base_url($url);

                    }
                    elseif($internal_type == "Page")
                    {
                        $page_id = $_POST['LinkView_InternalPageId'];

                        $url = $internal_type . '/' . $page_id;

                        $link = $this->config->base_url($url);

                    }
                    elseif($internal_type == "News")
                    {
                        $news_id = $_POST['LinkView_InternalNewsId'];

                        $url = $internal_type . '/' . $news_id;

                        $link = $this->config->base_url($url);

                    }
                }

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

    function do_upload($file_fieldname)
    {
        $config['upload_path'] = FCPATH . '/application/uploads/';
        //$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|txt';
        $config['max_size'] = '1000';
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($file_fieldname))
                {
                return false;
                }
                else
                {
                  return true;
                }



    }
}