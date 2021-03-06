<?php

class Performance extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Performance_model');
        $this->output->enable_profiler(FALSE);
    }

    public function index()
    {
        $data['locaties'] = $this->Performance_model->getAllEvents();
        if ($data == FALSE) {
            $error = "Er zijn geen locaties gevonden";
            $this->session->set_flashdata('error', $error);
            $this->load->view('templates/header');
            $this->load->view('performance/index');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('performance/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function locationCheck($id = null)
    {
        $data['info'] = $this->Performance_model->getPerformanceById($id);
        $data['times'] = $this->Performance_model->getPerformanceTime();
        $data['performances'] = $this->Performance_model->getPerformanceInfo($id);

        if($data['performances'] == FALSE) {
            $error = "Geen optredens gevonden";
            $this->session->set_flashdata('error', $error);
        } else {
            foreach ($data['times'] as $key => $value) {
                $time_id = $value['id'];
                foreach ($data['performances'] as $p_key => $p_value) {
                    if ($p_value['time_id'] == $time_id) {
                        $data['times'][$key]['performances'][] = ['podium_id' => $p_value['podium_id'], 'artist_name' => $p_value['name']];
                    }
                }
            }
        }

        if ($data == FALSE) {
            $error = "Geen tijden gevonden op deze dag";
            $this->session->set_flashdata('error', $error);
            $this->load->view('templates/header');
            $this->load->view('performance/location');
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('performance/location', $data);
            $this->load->view('templates/footer');
        }
    }

    public function getArtist($artist_name = null)
    {
        $artist_name = $_GET['artist_name'];
        if(!isset($artist_name) || $artist_name == null) {
            echo json_encode(array("test"=>'No artist found'));
        } else {
            $check = $this->Performance_model->getArtistByName($artist_name);
            if($check == FALSE) {
                echo json_encode(array("test" => 'No artist found'));
            } else {
                echo json_encode(array("name" => $check[0]['name'], "description" => $check[0]['description'], "website" => $check[0]['website'],
                    "youtube" => $check[0]['youtube'], "facebook" => $check[0]['facebook'], 'twitter' => $check[0]['twitter']));
            }
        }
    }
}