<?php
include 'CI_BackendController.php';
class Artist extends CI_BackendController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artist_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function beheerartist()
    {
        $data['artist'] = $this->Artist_model->get_artists();

        $this->load->view('templates/backend_header');
        $this->load->view('artist/artistbeheer',$data);
        $this->load->view('templates/backend_footer');
    }

    public function createartist()
    {
        $data['podia'] = $this->Artist_model->getAllPodia();

        $this->load->view('templates/backend_header');
        $this->load->view('artist/artistcreate', $data);
        $this->load->view('templates/backend_footer');
    }

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Naam', 'required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'required');
        $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('youtube', 'Youtube', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('twitter', 'Twitter', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $this->createartist();

        }
        else
        {
            $this->Artist_model->set_artist();
            $_SESSION['message'] = [];
            $message = "Artiest is aangemaakt";
            $this->session->set_flashdata('message', $message);
            return redirect('backend/artist/beheerartist');
        }


    }

    public function delete($artist_data) {
        $this->Artist_model->deleteartist($artist_data);
        $_SESSION['message'] = [];
        $message = "Artiest is verwijder";
        $this->session->set_flashdata('message', $message);
        $this->beheerartist();
    }

    public function artisteditdata($artist_data){
        $data['artist_data'] = $this->Artist_model->geteditdata($artist_data);

        if (empty($data['artist_data']))
        {
            echo 'error';
        }

        $this->load->view('templates/backend_header');
        $this->load->view('artist/artistedit',$data);
        $this->load->view('templates/backend_footer');

    }

    public function edit(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Naam', 'required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'required');
        $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('youtube', 'Youtube', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('twitter', 'Twitter', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $artist_data = $this->input->post('id');

            $this->artisteditdata($artist_data);

        }
        else
        {
            $this->Artist_model->update_artist();
            $_SESSION['message'] = [];
            $message = "Artiest is bewerkt en opgeslagen";
            $this->session->set_flashdata('message', $message);
            $this->beheerartist();
        }
    }


}