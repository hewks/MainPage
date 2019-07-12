<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Genetic extends CI_Model
{

    function add($new_data)
    {
        return ($this->db->insert($this->tab, $new_data)) ? true : false;
    }

    function create_select()
    {
        $select = '';
        foreach ($this->cells as $index => $cell) {
            $select .= ($index < count($this->cells) - 1) ? $cell . ',' : $cell;
        }
        return $select;
    }

    function create($new_data)
    {
        return ($this->db->insert($this->tab, $new_data)) ? true : false;
    }

    function search_by($by, $search)
    {
        $this->db->select($by);
        $this->db->from($this->tab);
        $this->db->where($by, $search);
        return ($this->db->get()->row()) ? true : false;
    }

    function search_data_where($data, $where)
    {
        $this->db->select($data);
        $this->db->from($this->tab);
        $this->db->where($where);
        $query = $this->db->get()->row();
        return ($query) ? $query : false;
    }

    function validate($login_data, $by = 'id')
    {
        $this->db->select($by);
        $this->db->from($this->tab);
        $this->db->where($login_data);
        return ($this->db->get()->row()) ? true : false;
    }

    function delete($id)
    {
        $update_data = array(
            'status' => 0,
            'updated_at' => date('Y-m-d H-i-s')
        );
        $this->db->where('id', $id);
        return ($this->db->update($this->tab, $update_data)) ? true : false;
    }

    function active($id)
    {
        $update_data = array(
            'status' => 1,
            'updated_at' => date('Y-m-d H-i-s')
        );
        $this->db->where('id', $id);
        return ($this->db->update($this->tab, $update_data)) ? true : false;
    }

    function one($id)
    {
        $this->db->select($this->select);
        $this->db->from($this->tab);
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return ($query) ? $query : false;
    }

    function edit($edit_data)
    {
        $this->db->where('id', $edit_data['id']);
        return ($this->db->update($this->tab, $edit_data)) ? true : false;
    }

    function send_mail($mail_data)
    {
        $this->load->library('Mailer');

        $mail = $this->mailer->load();

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'email-smtp.us-east-1.amazonaws.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'AKIAXN2YTMTNFV4O4JXR';
        $mail->Password   = 'BK5Cpywj1AoyROkH9rdJTBRqN2SU8EmOsdASEAHUvVYM';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('support@hewks.net', 'Mailer');
        $mail->addAddress('support@hewks.net');
        $mail->addAddress('sebastian.torres@hewks.net');
        $mail->addAddress('sebastianto1999@gmail.com');
        $mail->addAddress('hewksorgnet@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo cliente: ' . $mail_data['name'];
        $mail->Body    = 'Datos: <br> Nombre: ' . $mail_data['name'] . '<br> Email: ' . $mail_data['email'] . '<br> Celular: ' . $mail_data['phone'];
        $mail->AltBody = 'Datos: \\n Nombre: ' . $mail_data['name'] . '\\n Email: ' . $mail_data['email'] . '\\n Celular: ' . $mail_data['phone'];

        return ($mail->send()) ? true : false;
    }
}
