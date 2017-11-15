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
        $this->load->view('templates/backend_header');
        $this->load->view('artist/artistcreate');
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
            return redirect('artist/artistbeheer');
        }


    }

    public function delete($artist_data) {
        $this->Artist_model->deleteartist($artist_data);
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
//        $this->form_validation->set_rules('description', 'Beschrijving', 'required');
        $this->form_validation->set_rules('website', 'Website', 'required');
        $this->form_validation->set_rules('youtube', 'Youtube', 'required');
        $this->form_validation->set_rules('facebook', 'Facebook', 'required');
        $this->form_validation->set_rules('twitter', 'Twitter', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $this->artisteditdata();

        }
        else
        {
            $this->Artist_model->update_artist();
            $this->beheerartist();
        }
    }


}