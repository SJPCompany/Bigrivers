<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class podia extends CI_Controller
{
//laad librarys van codeigniter
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Podia_model');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

//render podia create pagina
    public function podiacreatepage()
    {
        $this->load->view('templates/backend_header');
        $this->load->view('podia/createpodia');
        $this->load->view('templates/backend_footer');
    }

    //render de lijst met podia
    public function podiabeheerpage()
    {
        $data['podiadata'] = $this->Podia_model->get_podia();;
        $this->load->view('templates/backend_header');
        $this->load->view('podia/beheerpodia', $data);
        $this->load->view('templates/backend_footer');
    }

//    render edit page
        public function podiaeditpage($podia){
            $data['podia_data'] = $this->Podia_model->geteditdata($podia);

            if (empty($data['podia_data']))
            {
                echo 'error';
            }
            $this->load->view('templates/backend_header');
            $this->load->view('podia/editpodia',$data);
            $this->load->view('templates/backend_footer');
        }
//    delete podia
    public function delete($podia)
    {
        $this->Podia_model->deletepodia($podia);
        $_SESSION['message'] = [];
        $message = "Podia is verwijdert";
        $this->session->set_flashdata('message', $message);
        $this->podiabeheerpage();
    }

//podia create function als de form wordt submit
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('podianame', 'podiumnaam', 'required');
        $this->form_validation->set_rules('street', 'straat', 'required');
        $this->form_validation->set_rules('housenumber', 'huisnummer', 'required');
        $this->form_validation->set_rules('zip', 'postcode', 'required');
        $this->form_validation->set_rules('city', 'stad', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() === FALSE) {
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $this->podiacreatepage();

        } else {
            $this->Podia_model->set_podia();
            $_SESSION['message'] = [];
            $message = "Podia is aangemaakt";
            $this->session->set_flashdata('message', $message);
            return redirect('podia/podiabeheerpage');
        }
    }

//    podia edit function al se dorm wordt submit
    public function edit(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validatio7n->set_rules('podianame', 'podiumnaam', 'required');
        $this->form_validation->set_rules('street', 'straat', 'required');
        $this->form_validation->set_rules('housenumber', 'huisnummer', 'required');
        $this->form_validation->set_rules('zip', 'postcode', 'required');
        $this->form_validation->set_rules('city', 'stad', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() === FALSE) {
            $_SESSION['error'] = [];
            $error = "vul alles goed in";
            $this->session->set_flashdata('error', $error);
            $this->podiaeditpage();

        } else {
            $this->Podia_model->edit_podia();
            $_SESSION['message'] = [];
            $message = "Podia is bewerkt en opgeslagen";
            $this->session->set_flashdata('message', $message);
            return redirect('podia/podiabeheerpage');
        }
    }
}