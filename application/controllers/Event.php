<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Event_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('errors/index');
        $this->load->view('templates/footer');
    }

    public function eventcreatepage(){
        $this->load->view('templates/backend_header');
        $this->load->view('event/eventcreate');
        $this->load->view('templates/backend_footer');
    }

    public function eventbeheerpage(){
        $data['event'] = $this->Event_model->get_events();
        $this->load->view('templates/backend_header');
        $this->load->view('event/eventbeheer',$data);
        $this->load->view('templates/backend_footer');
    }

    public function createevent(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Naam', 'required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'required');
        $this->form_validation->set_rules('starttime', 'Starttijd', 'required');
        $this->form_validation->set_rules('endtime', 'Eindtijd', 'required');
        $this->form_validation->set_rules('ticket', 'Ticket', 'required');
        $this->form_validation->set_rules('price', 'Prijs', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $this->createevent();

        }
        else
        {
            $this->Event_model->set_event();
            $_SESSION['message'] = [];
            $message = "Artiest is aangemaakt";
            $this->session->set_flashdata('message', $message);
            return redirect('backend/event/eventbeheerpage');
        }


    }

    public function eventdelete($event_data){
        $this->Event_model->deleteevent($event_data);
        $_SESSION['message'] = [];
        $message = "Evenement is verwijdert";
        $this->session->set_flashdata('message', $message);
        $this->eventbeheerpage();
    }
}