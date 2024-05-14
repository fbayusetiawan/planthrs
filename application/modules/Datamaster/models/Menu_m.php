<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_m extends CI_Model
{

    public $namaTable = 'menu_main';
    public $pk = 'idMenu';

    function getAllData()
    {
        $this->db->order_by('idMenu', 'Asce');
        $this->db->join('menu_title', 'menu_title.idTitle = menu_main.idTitle', 'left');
        return $this->db->get($this->namaTable)->result();
    }
    function getDataMenu()
    {
        $this->db->where('isMainMenu', '0');
        $this->db->where('isSubMenu', '0');
        return $this->db->get('menu_main')->result();
    }

    function getDataSubMenu()
    {
        $this->db->where('isMainMenu != 0');
        $this->db->where('isSubMenu', '0');
        $sub = $this->db->get('menu_main')->result();
        return $sub;
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function kategori()
    {
        $this->db->where('ket', '0');
        return $this->db->get('kategori')->result();
    }

    function save()
    {
        $object = [
            'idMenu' => htmlspecialchars($this->input->post('idMenu', TRUE)),
            'idTitle' => htmlspecialchars($this->input->post('idTitle', TRUE)),
            'label' => htmlspecialchars($this->input->post('label', TRUE)),
            'link' => htmlspecialchars($this->input->post('link', TRUE)),
            'icon' => htmlspecialchars($this->input->post('icon', TRUE)),
            'isMainMenu' => htmlspecialchars($this->input->post('isMainMenu', TRUE)),
            'isSubMenu' => htmlspecialchars($this->input->post('isSubMenu', TRUE)),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'idMenu' => htmlspecialchars($this->input->post('idMenu', TRUE)),
            'idTitle' => htmlspecialchars($this->input->post('idTitle', TRUE)),
            'label' => htmlspecialchars($this->input->post('label', TRUE)),
            'link' => htmlspecialchars($this->input->post('link', TRUE)),
            'icon' => htmlspecialchars($this->input->post('icon', TRUE)),
            'isMainMenu' => htmlspecialchars($this->input->post('isMainMenu', TRUE)),
            'isSubMenu' => htmlspecialchars($this->input->post('isSubMenu', TRUE)),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
