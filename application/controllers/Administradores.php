<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administradores extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('genetic');
		$this->load->model('Model_Genetic');
		$this->load->model('Model_Admin');
	}

	function index()
	{

		$fecha = date('Y-m-d H:i:s');

		$user_data = $this->session->userdata();
		if(isset($user_data['login_date']) && strtotime($user_data['login_date'] . '+ 1 hour') < strtotime($fecha)){
			$unset_items = array('username', 'email', 'login_date');
			$this->session->unset_userdata($unset_items);
		}else if(isset($user_data['login_date']) && strtotime($user_data['login_date'] . '+ 1 hour') > strtotime($fecha)){
			redirect(base_url().'BackSurface/Administrators');
		}
		
		$header_data = array(
			'title' => 'BackSurface | Hewks',
			'description' => '',
			'keywords' => '',
			'author' => 'Hewks',
			'links' => ''
		);

		$footer_data = array(
			'scripts' => '<script src="' . base_url() . 'assets/js/BackSurface/components/loginForm.js"></script>
			<script src="' . base_url() . 'assets/vendor/md5.js"></script>'
		);

		$this->load->view('BackSurface/layout/header', $header_data);
		if (isset($user_data['login_date'])) {
			$this->load->view('BackSurface/layout/navigation');
        }
		$this->load->view('BackSurface/components/loginForm');
		$this->load->view('BackSurface/layout/footer', $footer_data);
	}
	
	function validate()
	{

		header('Content-Type: application/json');

		$output = array();
		$fecha = date('Y-m-d H:i:s');

		$login_data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		if (!$this->genetic->validate_data($login_data)) {
			$output[] = array(
				'status' => false,
				'response' => 'No fue posible validar los datos.'
			);
		} else {
			if (!$this->Model_Admin->search_by('username', $login_data['username'])) {
				$output[] = array(
					'status' => false,
					'response' => 'El usuario no existe.'
				);
			} else {
				if (!$this->Model_Admin->validate($login_data)) {
					$output[] = array(
						'status' => false,
						'response' => 'Contraseña incorrecta.'
					);
				} else {
					$user_data = $this->Model_Admin->search_data_where(
						'username,email',
						array('username' => $login_data['username'])
					);
					if (!$this->genetic->validate_data($user_data)) {
						$output[] = array(
							'status' => false,
							'response' => 'Hubo un error en el servidor.'
						);
					} else {
						$output[] = array(
							'status' => true,
							'response' => 'El usuario se valido correctamente.'
						);
						$output[] = array(
							'status' => true,
							'response' => $user_data
						);
						$user_data = (array)$user_data;
						$user_data['login_date'] = $fecha;
						$this->session->set_userdata($user_data);
					}
				}
			}
		}

		echo json_encode($output);
		exit();
	}

	// CRUD

	function create()
	{

		header('Content-Type: application/json');

		$output = array();
		$fecha = date('Y-m-d H:i:s');

		$new_data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'created_at' => $fecha,
			'updated_at' => $fecha
		);

		if (!$this->genetic->validate_data($new_data)) {
			$output[] = array(
				'status' => false,
				'response' => 'No fue posible validar los datos.'
			);
		} else {
			if ($this->Model_Admin->search_by('username', $new_data['username'])) {
				$output[] = array(
					'status' => false,
					'response' => 'El nombre de usuario ya esta en uso.'
				);
			} else {
				if ($this->Model_Admin->search_by('email', $new_data['email'])) {
					$output[] = array(
						'status' => false,
						'response' => 'El Correo electronico ya esta en uso.'
					);
				} else {
					if (!$this->Model_Admin->create($new_data)) {
						$output[] = array(
							'status' => false,
							'response' => 'Hubo un error en el servidor.'
						);
					} else {
						$output[] = array(
							'status' => true,
							'response' => 'El usuario se registro correctamente.'
						);
					}
				}
			}
		}

		echo json_encode($output);
		exit();
	}
}
