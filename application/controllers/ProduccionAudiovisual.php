<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProduccionAudiovisual extends CI_Controller
{

	public function index()
	{

		$header_data = array(
			'title' => 'Producci&oacute;n Audiovisual | Hewks',
			'description' => 'Producción audiovisual por parte de Hewks, nuestras caracteristicas y nuestra propuesta.',
			'keywords' => 'Contenido digital, Social media, Produccion audiovisual, Fotografia, Imagenes, Fotografia de productos, Edición de imagenes y videos, Creacion de imagenes, Videos Corporativos, Fotografia de eventos, Cubrimineto de eventos sociales, contenido digital',
			'author' => 'Hewks.net',
			'links' => ''
		);

		$footer_data = array(
			'scripts' => '
			' . '<script src="' . base_url() . 'assets/js/views/web-development-message.js"></script>'
		);

		$this->load->view('layouts/header', $header_data);
		$this->load->view('layouts/navigation');
		$this->load->view('components/produccion-audiovisual-main-wrapper');
		$this->load->view('components/produccion-audiovisual-properties');
		$this->load->view('components/web-development-message.html');
		$this->load->view('layouts/footer', $footer_data);
	}
}
