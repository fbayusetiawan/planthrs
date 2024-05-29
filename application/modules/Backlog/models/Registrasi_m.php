<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_m extends CI_Model
{

    public $namaTable = 'backlog1';
    public $pk = 'idBacklog';

    function getAllData()
    {
        $this->db->join('popunit', 'popunit.codeUnit = ' . $this->namaTable . '.codeUnit', 'left');
        $this->db->join('unit_model', 'unit_model.idUnitModel = popunit.idUnitModel', 'left');
        $this->db->join('unit_type', 'unit_type.idUnitType = popunit.idUnitType', 'left');
        $this->db->join('unit_manufacture', 'unit_manufacture.idUnitManufacture = popunit.idUnitManufacture', 'left');
        $this->db->join('unit_activity', 'unit_activity.idUnitActivity = popunit.idUnitActivity', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    // function totalBacklog()
    // {
    //     $this->db->select_sum('price');
    //     $this->db->where('', $this->session->set_userdata('idBacklog'));
    //     $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
    //     $query = $this->db->get('detail_backlog');
    //     if ($query->num_rows() > 0) {
    //         return $query->row()->price;
    //     } else {
    //         return 0;
    //     }
    // }

    function save()
    {
        $object = [
            'idBacklog' => uniqid(),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'tanggalTemuan' => htmlspecialchars($this->input->post('tanggalTemuan', TRUE)),
            'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
            'hmUnit' => htmlspecialchars($this->input->post('hmUnit', TRUE)),
            'statusBacklog' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'tanggalTemuan' => htmlspecialchars($this->input->post('tanggalTemuan', TRUE)),
            'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
            'hmUnit' => htmlspecialchars($this->input->post('hmUnit', TRUE)),
            'woNumber' => htmlspecialchars($this->input->post('woNumber', TRUE)),
            'noReservasi' => htmlspecialchars($this->input->post('noReservasi', TRUE)),
            'statusBacklog' => htmlspecialchars($this->input->post('statusBacklog', TRUE)),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
