<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DesarrolloSoftware extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('genetic');
		$this->load->model('Model_Genetic');
		$this->load->model('Model_Customer');
		$this->load->model('Model_Error');
		$this->load->model('Model_Request');
	}

	public function index()
	{

		$header_data = array(
			'title' => 'Hewks | Desarrollo web',
			'description' => 'Desarrolo de software para empresas, manejo de datos',
			'keywords' => 'Hewks, Hewks - Desarrollo de Software, Desarrollo, Software, Aplicaciones, Development, MYSQL, Java, JavaScript, Developer, Desarrollador',
			'author' => 'Hewks.net',
			'links' => '<link href="'.base_url().'assets/css/components/soft-development.css" type="text/css" rel="stylesheet">'
		);

		$footer_data = array(
			'scripts' => '
			' . '<script src="' . base_url() . 'assets/js/views/web-development-message.js"></script>'
		);

		$this->load->view('layouts/header', $header_data);
		$this->load->view('layouts/navigation');
		$this->load->view('components/soft-development');

		$this->load->view('components/web-development-message.html');
		$this->load->view('layouts/footer', $footer_data);
	}

}
