<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MarketingDigital extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$header_data = array(
			'title' => 'Hewks | Marketing Digital',
			'description' => 'Creamos estrategias para mejorar las ventas y el alcance de tus productos. Utilizamos herramientas inovadoras y poderosas, entre ellas Instagram y Facebook.',
			'keywords' => 'Hewks, Hewks - Marketing Digital, Facebook, Instagram, Marketing, Marketing digital, Redes sociales, Social media, Social',
			'author' => 'Hewks.net',
			'links' => ''
		);

		$footer_data = array(
			'scripts' => '<script src="' . base_url() . 'assets/js/views/marketing-digital-main.js"></script>
			' . '<script src="' . base_url() . 'assets/js/views/web-development-message.js"></script>'
		);

		$this->load->view('layouts/header', $header_data);
		$this->load->view('layouts/navigation');
		$this->load->view('components/marketing-digital-main');
		$this->load->view('components/marketing-digital-properties');
		$this->load->view('components/marketing-digital-animate.html');
		//$this->load->view('components/marketing-digital-wrapper');
		$this->load->view('components/web-development-message.html');

		$this->load->view('layouts/footer', $footer_data);
	}
}
