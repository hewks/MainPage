<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrators extends CI_Controller
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
        if (isset($user_data['login_date']) && strtotime($user_data['login_date'] . '+ 1 hour') < strtotime($fecha)) {
            $unset_items = array('username', 'email', 'login_date');
            $this->session->unset_userdata($unset_items);
            redirect(base_url() . 'Administradores');
        }

        $header_data = array(
            'title' => 'BackSurface | Hewks',
            'description' => '',
            'keywords' => '',
            'author' => 'Hewks.net',
            'links' => ''
        );

        $footer_data = array(
            'scripts' => '<script src="' . base_url() . 'assets/vendor/md5.js"></script>
            <script src="' . base_url() . 'assets/js/BackSurface/components/pages/administradoresTableSection.js"></script>'
        );

        $section_data = array(
            'page_title' => 'Administradores'
        );

        $this->load->view('BackSurface/layout/header', $header_data);
        $this->load->view('BackSurface/layout/navigation');
        $this->load->view('BackSurface/pages/administradores', $section_data);
        $this->load->view('BackSurface/layout/footer', $footer_data);
    }

    function data_table()
    {
        header('Content-Type: application/json');

        $output = array();



        switch ($this->input->post('requestType')) {
            case 'all':
                $all_data = $this->Model_Admin->all('table');
                if (!($this->genetic->validate_data($all_data))) {
                    $output[] = array(
                        'status' => false,
                        'response' => 'No fue posible hallar los datos'
                    );
                } else {
                    $output[] = array(
                        'status' => true,
                        'response' => 'Los datos se hallaron correctamente'
                    );
                    $output[] = array(
                        'tableData' => $all_data
                    );
                }
                break;
            case 'one':
                $one_data = $this->Model_Admin->one($this->input->post('id'));
                if (!($this->genetic->validate_data($one_data))) {
                    $output[] = array(
                        'status' => false,
                        'response' => 'No fue posible hallar los datos'
                    );
                } else {
                    $output[] = array(
                        'status' => true,
                        'response' => 'Los datos se hallaron correctamente'
                    );
                    $output[] = array(
                        'tableData' => $one_data
                    );
                }
                break;
        }

        echo json_encode($output);
        exit();
    }

    function add()
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
                'response' => 'No fue posible validar el formulario'
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
                            'response' => 'No fue posible agregar el administrador.'
                        );
                    } else {
                        $output[] = array(
                            'status' => true,
                            'response' => 'El administrador se registró correctamente.'
                        );
                    }
                }
            }
        }

        echo json_encode($output);
        exit();
    }

    function delete()
    {

        header('Content-Type: application/json');

        $output = array();

        if (!$this->Model_Admin->delete($this->input->post('id'))) {
            $output[] = array(
                'status' => false,
                'response' => 'No fue posible eliminar el administrador.'
            );
        } else {
            $output[] = array(
                'status' => true,
                'response' => 'Se elimino el administrador correctamente.'
            );
        }

        echo json_encode($output);
        exit();
    }

    function active()
    {

        header('Content-Type: application/json');

        $output = array();

        if (!$this->Model_Admin->active($this->input->post('id'))) {
            $output[] = array(
                'status' => false,
                'response' => 'No fue posible activar el administrador.'
            );
        } else {
            $output[] = array(
                'status' => true,
                'response' => 'El administrador se activo correctamente.'
            );
        }

        echo json_encode($output);
        exit();
    }

    function edit()
    {
        header('Content-Type: application/json');

        $fecha = date('Y-m-d H:i:s');
        $output = array();

        $edit_data = array(
            'id' => $this->input->post('id'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'updated_at' => $fecha
        );

        if (!$this->Model_Admin->edit($edit_data)) {
            $output[] = array(
                'status' => false,
                'response' => 'No fue posible editar al administrador.'
            );
        } else {
            $output[] = array(
                'status' => true,
                'response' => 'El administrador fue editado correctamente.'
            );
        }

        echo json_encode($output);
        exit();
    }
}
