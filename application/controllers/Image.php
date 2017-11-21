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
            $error = "Geen plaatjes log gevonden";
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
            $requested_imageSubfolder = $this->uri->segment(4);
            // Pak de Naam uit de url
            $requested_imagename = $this->uri->segment(5);
            // Pak de breedte uit de url
            $requested_imagewidth = $this->uri->segment(6);
            // Pak de hoogte uit de url
            $requested_imageheight = $this->uri->segment(7);
        } else {
            // Pak de naam uit url
            $requested_imagename = $this->uri->segment(4);
            // Pak de breedte uit de url
            $requested_imagewidth = $this->uri->segment(5);
            // Pak de hoogte uit de url
            $requested_imageheight = $this->uri->segment(6);
        }
        //Gaat kijken of de image bestaat in de database
        $imagelog = $this->image_model->checkImageExits($requested_imagename);
        // Als er geen image is stuur terug naar upload pagina
        if ($imagelog == FALSE) {
            header("X-error: Naam afbeelding niet gevonden ");
            header("HTTP/1.0 404 Not Found");
        } else {
            // afbeelding bestaat in tabel 'images'
            $imagesizes = $this->image_model->getImagesize($requested_imagewidth, $requested_imageheight);

            // als de afmetingen niet voorkomen in de tabel 'sizes', maak dan het ontbrekende record aan en ga verder
            if ($imagesizes == FALSE) {
                $imageinsert = $this->image_model->insertImageSize($requested_imagewidth, $requested_imageheight);
                if ($imageinsert == FALSE) {
                    header("X-error: Grootte afbeelding niet ingevoerd ");
                    header("HTTP/1.0 404 Not Found");
                    exit();
                }
                $imagesizes = $this->image_model->getImagesize($requested_imagewidth, $requested_imageheight);
            }

            // get record id's for the image, and the sizes records
            $imageid = $imagelog[0]->id;
            $sizeid = $imagesizes[0]->id;

                // Ga kijken of er een folder is mee gegeven aan de controlelr
                if (isset($requested_imageSubfolder)) {
                    $image = $this->image_model->getImageSubPath($requested_imageSubfolder, $requested_imagename, $imageid, $sizeid);
                    if ($image == FALSE) {
                        $insertImageInfo = $this->image_model->insetImageSubSizeInfo($requested_imageSubfolder, $imageid, $sizeid, $requested_imagename);
                        if ($insertImageInfo == FALSE) {
                            header("X-error: Afbeelding en grootte niet ingevoerd ");
                            header("HTTP/1.0 404 Not Found");
                        } else {
                            return $this->checkImage();
                        }
                    }
                } else {
                    $image = $this->image_model->getImagePath($imageid, $sizeid);
                    if ($image == FALSE) {
                        $insertImageInfo = $this->image_model->insetImageSizeInfo($imageid, $sizeid, $requested_imagename);
                        if ($insertImageInfo == FALSE) {
                            header("X-error: Afbeelding en grootte niet ingevoerd ");
                            header("HTTP/1.0 404 Niet gevonden");
                        } else {
                            return $this->checkImage();
                        }
                    }
                }
                //Haal het pad op uit de records
                foreach ($image as $filepath) {
                    $path = $filepath->file_path;
                    $extension = pathinfo($requested_imagename, PATHINFO_EXTENSION);
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
                            header("HTTP/1.0 404 Niet gevonden");
                            exit;
                        }
                    }

                    // Haal de originele breedte en hoogte op
                    $width = $imagelog[0]->orginal_width;
                    $height = $imagelog[0]->orginal_height;
                    //Kijk of de opgevragen breedte en hoogte overeen komen met de originele sizes
                    if ($width != $requested_imagewidth || $height != $requested_imageheight) {
                        $config['image_library'] = 'gd2';
                        $config['quality'] = '100%';
                        $config['maintain_ratio'] = TRUE;
                        $config['source_image'] = $path;
                        $config['width'] = $requested_imagewidth;
                        $config['height'] = $requested_imageheight;
                        $config['new_image'] = FCPATH . '/img/cached/' . $requested_imagewidth . 'x' . $requested_imageheight . '-' . $requested_imagename;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $imagepath = 'cached/' . $requested_imagewidth . 'x' . $requested_imageheight . '-' . $requested_imagename;
                        $newInsertImageInfo = $this->image_model->insetImageCachedInfo($imagepath, $imageid, $sizeid);
                        header("Content-Length: " . filesize($name));

                        // dump the picture and stop the script
                        fpassthru($fp);
                        exit;
                    } else {
                        header("Content-Length: " . filesize($name));

                        // dump the picture and stop the script
                        fpassthru($fp);
                        exit;
                    }
                } else {
                    header("X-error: Afbeelding niet gevonden in de image_size tabel");
                    header("HTTP/1.0 404 Niet gevonden");
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
                return $this->uploadImage();
            } else {
                $sizes = getimagesize($_FILES["image"]["tmp_name"]);
                $name = $_FILES['image']['name'];
                $width = $sizes[0];
                $height = $sizes[1];
                $imageCheck = $this->image_model->getImage($name);
                if($imageCheck == FALSE) {
                    $imageload = $this->image_model->insertImage($name, $width, $height);
                    if($imageload == FALSE) {
                        $error = 'Plaatje invullen ging mis';
                        $this->session->set_flashdata('error', $error);
                        unset($_POST);
                        return $this->uploadImage();
                    } else {
                        $success = "Plaatje aangemaakt";
                        $this->session->set_flashdata('success', $success);
                        unset($_POST);
                        return $this->uploadImage();
                    }
                } else {
                    $success = "Plaatje Bestaat al in de database";
                    $this->session->set_flashdata('success', $success);
                    unset($_POST);
                    return $this->uploadImage();
                }
            }
        }
        $this->load->view('templates/backend_header');
        $this->load->view('backend/images_view/uploadimage');
        $this->load->view('templates/backend_footer');
    }
}