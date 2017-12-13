<?php

class Performances extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Performances_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
    }

     public function edit_performance($performance_id)
    {
    	$this->load->helper('form');
        $this->load->library('form_validation');

        $data['performance'] = $this->Performances_model->getPerformance($performance_id);
        $data['podia'] = $this->Performances_model->getPodiabyPerformance($performance_id);
        $data['event'] = $this->Performances_model->getEventbyPerformance($performance_id);
        $data['podiums'] = $this->Performances_model->getAllPodia();
        $data['events'] = $this->Performances_model->getAllEvents();

        if (empty($data))
        {
            echo 'error';
        }

        $this->load->view('templates/backend_header');
        $this->load->view('performances/edit_performance',$data);
        $this->load->view('templates/backend_footer');

    }

    public function edit_performance_data()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('podia_id', 'podia', 'required');
        $this->form_validation->set_rules('event_id', 'event', 'required');
        $this->form_validation->set_rules('day', 'day', 'required');
        $this->form_validation->set_rules('start_performance', 'start_performance', 'required');
        $this->form_validation->set_rules('end_performance', 'end_performance', 'required');


        if($this->form_validation->run() === FALSE)
        {
            die('faal');
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            redirect('performances/edit_performance', 'Refresh');
        }
        else
        {
            die('gelukt!');
            $this->Performances_model->update_performance();
            $_SESSION['message'] = [];
            $message = "Optreden van artiest is bewerkt en opgeslagen";
            $this->session->set_flashdata('message', $message);
            redirect('artist/artistedit', 'Refresh');
        }
    }

}