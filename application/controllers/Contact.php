<?php
include 'CI_BackendController.php';
class contact extends CI_BackendController {

    public function view($page = 'contact')
    {
        if ( ! file_exists(APPPATH.'views/contact/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header');
        $this->load->view('contact/'.$page);
        $this->load->view('templates/footer');
    }
}