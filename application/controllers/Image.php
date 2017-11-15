<?php

/**
 * Created by PhpStorm.
 * User: justi
 * Date: 9-10-2017
 * Time: 11:30
 */
include 'CI_BackendController.php';
class Image extends CI_BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->helper('form');
        $this->load->helper('path');
        $this->output->enable_profiler(FALSE);
        $this->checkUrl();
        $this->load->model('../models/image_model');
    }

    public function checkUrl()
    {
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

    public function checkImage()
    {
        /* stappen
        - is er in de tabel image_sizes een record voor het gevonden images.id en het gevonden sizes.id?
        - nee: maak een geresized image, sla dit op in de juiste map (image cache ofzo) en bewaar het nieuwe image in de tabel image_sizes en retourneer dat record
        - ja: geef het gevonden image_sizes record terug
        JE HEBT NU HET FILESYSTEM PAD NAAR HET IMAGE VAN HET JUISTE FORMAAT
        - retourneer de inhoud van het gevonden bestand
        als er ergens in dit proces een error komt of iets lukt niet (misschien zelf exception gebruiken),
          stuur dan een header terug: X-error: ndjfkhjkfhsjkdfhskdjf    en vervolgens een 404 header.
        */

        // Kijkt naar de naam en de breedte en hoogte van het plaatje in de url
        // Pakt de naam uit de url
        $number = $this->uri->total_segments();
        if ($number == 7) {
            $imageSubfolder = $this->uri->segment(4);
            // Pak de Naam uit de url
            $imagename = $this->uri->segment(5);
            // Pak de breedte uit de url
            $imagewidth = $this->uri->segment(6);
            // Pak de hoogte uit de url
            $imageheight = $this->uri->segment(7);
        } else {
            // Pak de naam uit url
            $imagename = $this->uri->segment(4);
            // Pak de breedte uit de url
            $imagewidth = $this->uri->segment(5);
            // Pak de hoogte uit de url
            $imageheight = $this->uri->segment(6);
        }
        //Gaat kijken of de image bestaat in de database
        $imagelog = $this->image_model->checkImageExits($imagename);
        // Als er geen image is stuur terug naar upload pagina
        if ($imagelog == FALSE) {
            header("X-error: Image naam niet gevonden ");
            header("HTTP/1.0 404 Not Found");
        } else {
            $imagesizes = $this->image_model->getImagesize($imagewidth, $imageheight);
            if ($imagesizes == FALSE) {
                $imageinsert = $this->image_model->insertImageSize($imagewidth, $imageheight);
                if ($imageinsert == FALSE) {
                    header("X-error: Image Size niet ingevoerd ");
                    header("HTTP/1.0 404 Not Found");
                } else {
                    $this->checkImage();
                }
            }
            /*$config['image_library'] = 'gd2';
            if (isset($imageSubfolder)) {
                $config['source_image'] = 'img/' . $imageSubfolder . '/' . $imagename;
            } else {
                $config['source_image'] = 'img/' . $imagename;
            }
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 75;
            $config['height']       = 50;
            */else {
                foreach ($imagelog as $imageinfo) {
                    $imageid = $imageinfo->id;
                }
                foreach ($imagesizes as $sizeinfo) {
                    $sizeid = $sizeinfo->id;
                }
                if (isset($imageSubfolder)) {
                    $image = $this->image_model->getImageSubPath($imageSubfolder, $imagename, $imageid, $sizeid);
                    if ($image == FALSE) {
                        $insertImageInfo = $this->image_model->insetImageSubSizeInfo($imageSubfolder, $imageid, $sizeid, $imagename);
                        if ($insertImageInfo == FALSE) {
                            header("X-error: Image en Size niet ingevoerd ");
                            header("HTTP/1.0 404 Not Found");
                        } else {
                            $this->checkImage();
                        }
                    }
                } else {
                    $image = $this->image_model->getImagePath($imageid, $sizeid);
                    if ($image == FALSE) {
                        $insertImageInfo = $this->image_model->insetImageSizeInfo($imageid, $sizeid, $imagename);
                        if ($insertImageInfo == FALSE) {
                            header("X-error: Image en Size niet ingevoerd ");
                            header("HTTP/1.0 404 Not Found");
                        } else {
                            $this->checkImage();
                        }
                    }
                }
                    foreach ($image as $filepath) {
                        $path = $filepath->file_path;
                        $extension = pathinfo($imagename, PATHINFO_EXTENSION);
                    }
                    // Kijk of de image bestaat
                        if (file_exists($path)) {
                            // open the file in a binary mode
                            $name = $path;
                            $fp = fopen($name, 'rb');

                            // send the right headers
                            //header("X-name: " . $name);
                            //header("X-extension: " . $extension);
                            switch ($extension) {
                                case 'jpg': {
                                    header("Content-Type: image/jpg");
                                    break;
                                }
                                case 'jpeg': {
                                    header("Content-Type: image/jpg");
                                    break;
                                }
                                case 'png': {
                                    header("Content-Type: image/png");
                                    break;
                                }
                                default: {
                                    header("HTTP/1.0 404 Not Found");
                                    exit;
                                }
                            }

                            header("Content-Length: " . filesize($name));

                            // dump the picture and stop the script
                            fpassthru($fp);
                            exit;
                        } else {
                            header("X-error: Image niet gevonden in de image_size tabel");
                            header("HTTP/1.0 404 Not Found");
                        }
                    }
                }
            }

    public function uploadImage()
    {
        if (isset($_POST['submit'])) {
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             =  500;
            $config['max_width']             =  0;
            $config['max_height']             =  0;
            $sizecheck = $_FILES['image']['size'] / 1000;
            $number = round($sizecheck);
            if($number > $config['max_size']) {
                $error = "Plaatje is te groot";
                $this->session->set_flashdata('error', $error);
                unset($_POST);
                $this->uploadImage();
            } else {
                $sizes = getimagesize($_FILES["image"]["tmp_name"]);
                $name = $_FILES['image']['name'];
                $width = $sizes[0];
                $height = $sizes[1];
                $imageCheck = $this->image_model->getImage($name);
                if($imageCheck == FALSE) {
                    var_dump('Nothing found');
                } else {
                    $success = "Plaatje Bestaat al in de database";
                    $this->session->set_flashdata('succes', $success);
                    unset($_POST);
                    $this->uploadImage();
                }
            }
        }
        $this->load->view('templates/backend_header');
        $this->load->view('backend/images_view/uploadimage');
        $this->load->view('templates/backend_footer');
    }
}