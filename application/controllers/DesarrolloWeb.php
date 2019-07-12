<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DesarrolloWeb extends CI_Controller
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
			'description' => 'Desarrlo de aplicaciones y paginas web enfocadas en la calidad y experiencia del usuario',
			'keywords' => 'Hewks, Hewks - Desarrollo web, Desarrollo, Web, Aplicaciones, Development, HTML, PHP, JavaScript, JS, CSS, Developer, Desarrollador Web, Ceo',
			'author' => 'Hewks.net',
			'links' => ''
		);

		$footer_data = array(
			'scripts' => '<script src="' . base_url() . 'assets/js/views/web-development-properties.js"></script>
			' . '<script src="' . base_url() . 'assets/js/views/web-development-text.js"></script>
			' . '<script src="' . base_url() . 'assets/js/views/web-development-message.js"></script>'
		);

		$this->load->view('layouts/header', $header_data);
		$this->load->view('layouts/navigation');
		$this->load->view('components/web-development-main');
		$this->load->view('components/web-development-properties');
		$this->load->view('components/web-development-text.html');
		$this->load->view('components/web-development-message.html');
		$this->load->view('layouts/footer', $footer_data);
	}

	function add()
	{

		// Header de la respuesta
		header('Content-type: application/json; charset=utf-8');

		// Variable para almacenar la respuesta
		$output = array();

		$fecha = date('Y-m-d H:i:s');

		$new_data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'created_at' => $fecha,
			'updated_at' => $fecha
		);

		if (!$this->genetic->validate_data($new_data)) {
			$output[] = array(
				'status' => false,
				'type' => 'Low',
				'error' => '100003',
				'response' => 'Debes llenar todos los campos.'
			);
		} else {
			if (!$this->Model_Request->add($new_data)) {
				$output[] = array(
					'status' => false,
					'type' => 'Hard',
					'error' => '100001',
					'response' => 'Hubo un error, intente más tarde.'
				);
			} else {
				if ($this->Model_Customer->search_by('email', $new_data['email'])) {
					$output[] = array(
						'status' => true,
						'response' => 'Muy pronto nos contactaremos con usted.'
					);
				} else {
					if (!$this->Model_Customer->add($new_data)) {
						$output[] = array(
							'status' => false,
							'type' => 'Hard',
							'error' => '100002',
							'response' => 'Muy pronto nos contactaremos con usted.'
						);
					} else {
						$output[] = array(
							'status' => true,
							'response' => 'Muy pronto nos contactaremos con usted.'
						);
					}
				}
				// if (!$this->Model_Customer->send_mail($new_data)) {
				// 	$output[] = array(
				// 		'status' => false,
				// 		'response' => 'Hubo un error, intente más tarde.'
				// 	);
				// } else {
				// 	$output[] = array(
				// 		'status' => true,
				// 		'response' => 'Muy pronto nos contactaremos con usted.'
				// 	);
				// }
			}
		}

		if ($output[0]['status'] == false) {
			$error_data = array(
				'type' => $output[0]['type'],
				'error' => $output[0]['error'],
				'created_at' => $fecha,
				'updated_at' => $fecha
			);
			$this->Model_Error->add($error_data);
		}

		echo json_encode($output);
		exit();
	}
}
