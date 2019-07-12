<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Request extends Model_Genetic
{

    protected $tab = 'customers_request';
    protected $cells = ['id', 'name', 'email', 'phone', 'created_at', 'status'];
    protected $select = '';

    function __construct()
    {
        parent::__construct();
        $this->select = $this->create_select();
    }

    function all($mode = null)
    {
        $this->db->select($this->select);
        $this->db->from($this->tab);
        switch ($mode) {
            case 'table':
                $data = $this->db->get()->result();
                $query = array();
                foreach ($data as $row) {
                    $query[] = array(
                        'id' => $row->id,
                        'name' => $row->name,
                        'email' => $row->email,
                        'phone' => $row->phone,
                        'date' => $row->created_at,
                        'status' => $row->status,
                        'actions' => '<div class="bs-btn-group-section">
                            <button class="bs-btn-action bs-btn-delete" onClick="sectionAction(\'Requests\',' . $row->id . ', \'delete\')"><i class="fas fa-trash-alt"></i></button>
                            <button class="bs-btn-action bs-btn-active" onClick="sectionAction(\'Requests\',' . $row->id . ', \'active\')"><i class="fas fa-plus"></i></button>
                         </div>'
                    );
                }
                break;
            case null:
                $query = $this->db->get()->result();
                break;
        }
        return ($query) ? $query : false;
    }
}
