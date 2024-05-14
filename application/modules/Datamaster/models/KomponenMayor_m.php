<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KomponenMayor_m extends CI_Model
{

    public $namaTable = 'komponen_mayor';
    public $pk = 'idKomponenMayor';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idKomponenMayor' => htmlspecialchars($this->input->post('idKomponenMayor', TRUE)),
            'namaKomponenMayor' => htmlspecialchars($this->input->post('namaKomponenMayor', TRUE)),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'idKomponenMayor' => htmlspecialchars($this->input->post('idKomponenMayor', TRUE)),
            'namaKomponenMayor' => htmlspecialchars($this->input->post('namaKomponenMayor', TRUE)),
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
