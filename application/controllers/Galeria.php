<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $header_data = array(
            'title' => 'Hewks | Nuestro Trabajo',
            'description' => 'En Hewks nos tomamos el trabajo en serio.',
            'keywords' => 'Hewks, Hewks - Marketing Digital, Facebook, Instagram, Marketing, Marketing digital, Redes sociales, Social media, Social',
            'author' => 'Hewks.net',
            'links' => '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/components/galeria-main.css">'
        );

        $footer_data = array(
            'scripts' => '
			' . '<script src="' . base_url() . 'assets/js/views/web-development-message.js"></script>
            ' . '<script src="' . base_url() . 'assets/js/views/galeria-main.js"></script>',
            'deactivate' => true
        );

        $this->load->view('layouts/header', $header_data);
        $this->load->view('layouts/navigation');
        $this->load->view('components/galeria-main');

        $this->load->view('components/web-development-message.html');

        $this->load->view('layouts/footer', $footer_data);
    }
}
