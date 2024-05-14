<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Toolkeeper_m extends CI_Model
{

    public $namaTable = 'toolkeeper';
    public $pk = 'idToolkeeper';

    function getAllData($bulanTahun)
    {
        $this->db->where('statusTools', '1');
        $this->db->join('karyawan', 'karyawan.nrp = toolkeeper.nrp', 'left');
        $this->db->join('poptools', 'poptools.kodeTools = toolkeeper.kodeTools', 'left');
        $this->db->where('toolkeeper.dateOut' , $bulanTahun);
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getSection()
    {
        $this->db->join('section', 'section.idSection = karyawan.idSection', 'left');
        return $this->db->get('karyawan')->result; 
    }

    function getOpen($dari, $sampai)
    {
        $this->db->where('dateOut BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->where('statusTools', '1');
        $this->db->join('karyawan', 'karyawan.nrp = toolkeeper.nrp', 'left');
        $this->db->join('poptools', 'poptools.kodeTools = toolkeeper.kodeTools', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getClose($dari, $sampai)
    {
        $this->db->where('dateIn BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->where('statusTools', '2');
        $this->db->join('karyawan', 'karyawan.nrp = toolkeeper.nrp', 'left');
        $this->db->join('poptools', 'poptools.kodeTools = toolkeeper.kodeTools', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function save()
    {
        $object = [
            'nrp' => $this->input->post('nrp', TRUE),
            'kodeTools' => $this->input->post('kodeTools', TRUE),
            'jumlahPinjam' => $this->input->post('jumlahPinjam', TRUE),
            'dateOut' => date('y-m-d'),
            'timeOut' => date('H:i:s'),
            'statusTools' => '1',
            'isActive' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'namaSection' => $this->input->post('namaSection', TRUE),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function close($Value)
    {
        $object = [
            'dateIn' => date('y-m-d'),
            'timeIn' => date('H:i:s'),
            'statusTools' => '2',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Close</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
