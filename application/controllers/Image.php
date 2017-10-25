<?php
/**
 * Created by PhpStorm.
 * User: justi
 * Date: 9-10-2017
 * Time: 11:30
 */


class Image extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->helper('path');
        $this->output->enable_profiler(TRUE);
        $this->checkUrl();
        $this->load->model('../models/image_model');
    }

    public function checkUrl() {
        $url = uri_string();
        if (strpos($url, 'backend') !== false) {
            return true;
        } else {
            $error = "Geen toegang tot deze pagina";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        }
    }

    public function index()
    {
        // Haalt alle logs uit de database
        $data['imagesinfo'] = $this->image_model->getAllImages();
        // Als er niks terug komt geef een error
        if ($data == FALSE) {
            $error = "Geen image log gevonden";
            $this->session->set_flashdata('error', $error);
            return redirect('backend/error');
        } // Als er wel een log terug komt laad de view met de logs uit de database
        else {
            $this->load->view('templates/backend_header');
            $this->load->view('backend/images_view/index', $data);
            $this->load->view('templates/backend_footer');
        }
    }

    public function checkImage() {
        // Kijkt naar de naam en de breedte en hoogte van het plaatje in de url
        // Pakt de naam uit de url
        $imagename = $this->uri->segment(4);
        // Pak de breedte uit de url
        $imagewidth = $this->uri->segment(5);
        // Pak de hoogte uit de url
        $imageheight = $this->uri->segment(6);
        //Gaat kijken of de image bestaat in de database
        $imagesize = $this->image_model->getImagesize($imagewidth,$imageheight);
        var_dump($imageheight, $imagewidth);
        // Als er geen image is stuur terug naar upload pagina
        if ($imagesize == FALSE) {
            $imageSizeInsert = $this->image_model->insertImageSize($imagewidth, $imageheight);
            if($imageSizeInsert == FALSE) {
                var_dump('Image insert went wrong');
            } else {
                var_dump('Image insert correct');
            }
        } else {
            var_dump('i`m True');
        }
    }

    public function uploadImage() {
        if (isset($_POST['submit_image'])) {
            $imagename = $_FILES['imageUpload']['name'];
            var_dump($_FILES['imageUpload']);
            var_dump($imagename);
        }
        $this->load->view('templates/backend_header');
        $this->load->view('backend/images_view/uploadimage');
        $this->load->view('templates/backend_footer');
    }
}