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
          stuur dan een header_content_type terug: X-error: ndjfkhjkfhsjkdfhskdjf    en vervolgens een 404 header_content_type.
        */

        // Pak de naam uit url
        $requested_imagename = $this->uri->segment(4);
        // Pak de breedte uit de url
        $requested_imagewidth = $this->uri->segment(5);
        // Pak de hoogte uit de url
        $requested_imageheight = $this->uri->segment(6);

        //Gaat in tabel images kijken of de image bestaat; als er geen image is stuur dan een 404 not found
        $original_image_record = $this->image_model->checkImageExits($requested_imagename);
        if ($original_image_record == FALSE) {
            header("X-error: Naam afbeelding niet gevonden "); // TODO: remove this debug statement
            header("HTTP/1.0 404 Not Found");
            exit();
        }
        $original_imageid = $original_image_record[0]->id;
        $original_imagepath =  FCPATH . '/img/' . $original_image_record[0]->name;

        // komt de gevraagde size voor in de tabel 'sizes';
        // als de afmetingen niet voorkomen in de tabel 'sizes', maak dan het ontbrekende record aan en ga verder
        $size_record = $this->image_model->getSize($requested_imagewidth, $requested_imageheight);
        if ($size_record == FALSE) {
            $imageinsert = $this->image_model->insertSize($requested_imagewidth, $requested_imageheight);
            if ($imageinsert == FALSE) {
                header("X-error:d kan geen record toevoegen aan tabel sizes.");
                header("HTTP/1.0 404 Not Found");
                exit();
            }
            $size_record = $this->image_model->getSize($requested_imagewidth, $requested_imageheight);
        }
        $sizeid = $size_record[0]->id;

        // haal het juiste record op uit de tabel image_sizes; maak zo nodig aan als nog niet bestaat
        $image_sizes_record = $this->image_model->getImagePath($original_imageid, $sizeid);
        if ($image_sizes_record == FALSE) {
            // do resize
            $resized_image_fullpath = $this->do_resize($original_imageid, $original_imagepath, $requested_imagename, $requested_imagewidth, $requested_imageheight, $sizeid);
            if ($resized_image_fullpath == null) {
                header("X-error: kan image niet resizen");
                header("HTTP/1.0 404 Not Found");
                exit();
            }
            $insertImageInfo = $this->image_model->insetImageSizeInfo($original_imageid, $sizeid, $resized_image_fullpath);
            if ($insertImageInfo == FALSE) {
                    header("X-error: kan geen record toevoegen aan tabel image_sizes");
                    header("HTTP/1.0 404 Not Found");
                    exit();
            }
            $image_sizes_record = $this->image_model->getImagePath($original_imageid, $sizeid);
        }
        // return file as found in image_sizes
        $resized_image_path = $image_sizes_record[0]->file_path;      // relatief pad ten opzichte van /img map
        $extension = pathinfo($image_sizes_record[0]->file_path, PATHINFO_EXTENSION);
        if (file_exists($resized_image_path)) {
            // open the file in a binary mode
            $fp = fopen($resized_image_path, 'rb');

            // send the right headers
            $header_content_type = '';
            switch ($extension) {
                case 'jpg': {
                    $header_content_type = "Content-Type: image/jpg";
                    break;
                }
                case 'jpeg': {
                    $header_content_type = "Content-Type: image/jpg";
                    break;
                }
                case 'png': {
                    $header_content_type = "Content-Type: image/png";
                    break;
                }
                default: {
                    $header_content_type = "HTTP/1.0 404 Niet gevonden";
                    exit;
                }
            }
            header($header_content_type);
            header("Content-Length: " . filesize($resized_image_path));

            // dump the picture and stop the script
            fpassthru($fp);
        } else {
            header("X-error: Afbeelding [". $resized_image_path . "] niet gevonden in de image_size tabel");
            header("HTTP/1.0 404 Niet gevonden");
        }

    }

    private function do_resize($original_imageid, $original_imagepath, $requested_imagename, $requested_imagewidth, $requested_imageheight, $sizeid) {
        $config['image_library'] = 'gd2';
        $config['quality'] = '100%';
        $config['maintain_ratio'] = TRUE;
        $config['source_image'] = $original_imagepath;
        $config['width'] = $requested_imagewidth;
        $config['height'] = $requested_imageheight;
        $filename = $original_imageid . '-'. $requested_imagename . '-' . $requested_imagewidth . 'x' . $requested_imageheight . '.' .pathinfo($requested_imagename, PATHINFO_EXTENSION);
        $resized_image_fullpath = FCPATH . '/img/cached/' . $filename ;
        $config['new_image'] = $resized_image_fullpath;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        return 'cached/' . $filename;
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