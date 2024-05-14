<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Screening_m extends CI_Model
{

    public $namaTable = 'screening';
    public $pk = 'idScreening';

    function getAllData()
    {
        $this->db->join('mahasiswa', 'mahasiswa.nim = screening.nim', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);

        return $this->db->get($this->namaTable)->row();
    }

    function update($Value)
    {

        $object = [

            'bidang' => $this->input->post('bidang', TRUE),
            'waktu' => $this->input->post('waktu', TRUE),
            'namaAg' => $this->input->post('namaAg', TRUE),
            'idDesa' => $this->input->post('idDesa', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),
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
