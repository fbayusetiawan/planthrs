<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriTraining_m extends CI_Model
{

    public $namaTable = 'training_kategori';
    public $pk = 'idTrainingKategori';

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
            'namaKategoriTraining' => htmlspecialchars($this->input->post('namaKategoriTraining', TRUE)),
            'ket' => htmlspecialchars($this->input->post('ket', TRUE)),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'namaKategoriTraining' => htmlspecialchars($this->input->post('namaKategoriTraining', TRUE)),
            'ket' => htmlspecialchars($this->input->post('ket', TRUE)),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
