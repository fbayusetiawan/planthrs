<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TrainingRekap_m extends CI_Model
{

    public $namaTable = 'training_rekap';
    public $pk = 'idTrainingRekap';

    function getAllData()
    {
        // $this->db->select('training_rekap.*, section.idSection as idSection, jabatan.idJabatan as idJabatan');
        $this->db->join('karyawan', 'karyawan.nrp = training_rekap.nrp', 'left');
        $this->db->join('section', 'section.idSection = karyawan.idSection', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = karyawan.idJabatan', 'left');
        $this->db->join('training_kategori', 'training_kategori.idTrainingKategori = training_rekap.idTrainingKategori', 'left');
        
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save($sertifikat)
    {
        $object = [
            'idTrainingRekap' => uniqid(),
            'nrp' => $this->input->post('nrp', TRUE),
            'idTrainingKategori' => $this->input->post('idTrainingKategori', TRUE),
            'namaTraining' => $this->input->post('namaTraining', TRUE),
            'penyelenggara' => $this->input->post('penyelenggara', TRUE),
            'awalDinas' => $this->input->post('awalDinas', TRUE),
            'akhirDinas' => $this->input->post('akhirDinas', TRUE),
            'lokasiTraining' => $this->input->post('lokasiTraining', TRUE),
            'sertifikat' => $sertifikat
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function saveKaryawan($sertifikat)
    {
        $object = [
            'idTrainingRekap' => uniqid(),
            'nrp' => $this->input->post('nrp', TRUE),
            'idTrainingKategori' => $this->input->post('idTrainingKategori', TRUE),
            'namaTraining' => $this->input->post('namaTraining', TRUE),
            'penyelenggara' => $this->input->post('penyelenggara', TRUE),
            'awalDinas' => $this->input->post('awalDinas', TRUE),
            'akhirDinas' => $this->input->post('akhirDinas', TRUE),
            'lokasiTraining' => $this->input->post('lokasiTraining', TRUE),
            'sertifikat' => $sertifikat,
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $sertifikat)
    {
        $object = [
            'nrp' => $this->input->post('nrp', TRUE),
            'idTrainingKategori' => $this->input->post('idTrainingKategori', TRUE),
            'namaTraining' => $this->input->post('namaTraining', TRUE),
            'penyelenggara' => $this->input->post('penyelenggara', TRUE),
            'awalDinas' => $this->input->post('awalDinas', TRUE),
            'akhirDinas' => $this->input->post('akhirDinas', TRUE),
            'lokasiTraining' => $this->input->post('lokasiTraining', TRUE),
            'sertifikat' => $sertifikat,
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
