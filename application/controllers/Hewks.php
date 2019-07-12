<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hewks extends CI_Controller
{

	public function index()
	{

		$header_data = array(
			'title' => 'Hewks | Inicio',
			'description' => 'Hews, empresa dedicada al desarrollo y marketing empresarial. Utilizamos herramientas modernas para darle a tu empresa el empujon que necesita.',
			'keywords' => 'Hewks, Marketing, Publicidad, Desarrollo web, Javascript, HTML, CSS, Desarrollo, Fotografia, Video, Diseño, Web, Diseño web, Aplicaciones, Marketing digital',
			'author' => 'Hewks.net',
			'links' => ''
		);

		$footer_data = array(
			'scripts' => '
			<script src="' . base_url() . 'assets/js/animate.js" async></script>
			' . '<script src="' . base_url() . 'assets/js/views/web-development-message.js"></script>'
		);

		$this->load->view('layouts/header', $header_data);
		$this->load->view('layouts/navigation');
		$this->load->view('components/hewks-main');
		$this->load->view('components/hewks-services');
		$this->load->view('components/web-development-message.html');
		$this->load->view('layouts/footer', $footer_data);
	}
}
