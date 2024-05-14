<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_m extends CI_Model
{

    public $namaTable = 'mahasiswa';
    public $pk = 'nim';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
