<?php
include 'CI_BackendController.php';
class page {

    public function view($page = 'contact')
    {
        if ( ! file_exists(APPPATH.'views/page/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header');
        $this->load->view('page/'.$page);
        $this->load->view('templates/footer');
    }
}