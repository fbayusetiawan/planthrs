<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SubKomponenMayor_m extends CI_Model
{

    public $namaTable = 'komponen_mayor_sub';
    public $pk = 'idSubKomponenMayor';

    function getAllData()
    {
        $this->db->join('komponen_mayor', 'komponen_mayor.idKomponenMayor = komponen_mayor_sub.idKomponenMayor', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->join('komponen_mayor', 'komponen_mayor.idKomponenMayor = komponen_mayor_sub.idKomponenMayor', 'left');
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idSubKomponenMayor' => htmlspecialchars($this->input->post('idSubKomponenMayor', TRUE)),
            'idKomponenMayor' => htmlspecialchars($this->input->post('idKomponenMayor', TRUE)),
            'namaSubKomponenMayor' => htmlspecialchars($this->input->post('namaSubKomponenMayor', TRUE)),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'idSubKomponenMayor' => htmlspecialchars($this->input->post('idSubKomponenMayor', TRUE)),
            'idKomponenMayor' => htmlspecialchars($this->input->post('idKomponenMayor', TRUE)),
            'namaSubKomponenMayor' => htmlspecialchars($this->input->post('namaSubKomponenMayor', TRUE)),
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
