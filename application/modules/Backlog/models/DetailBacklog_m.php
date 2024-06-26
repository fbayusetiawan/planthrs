<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailBacklog_m extends CI_Model
{

    public $namaTable = 'detail_backlog';
    public $pk = 'idDetailBacklog';

    function getAllData()
    {
        $this->db->where('idBacklog', $this->session->userdata('idBacklog'));        
        $this->db->join('karyawan', 'karyawan.nrp = detail_backlog.nrp', 'left');
        // $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataClose()
    {
        $this->db->where('idBacklog', $this->session->userdata('idBacklog'));
        $this->db->join('karyawan', 'karyawan.nrp = detail_backlog.nrp', 'left');
        // $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->where('idBacklog', $this->session->userdata('idBacklog'));
        $this->db->join('karyawan', 'karyawan.nrp = detail_backlog.nrp', 'left');
        // $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        // $this->db->join('soh', 'soh.idPart = detail_part.idPart', 'left');
        return $this->db->get($this->namaTable)->row();
    }

    

    function getDataByPlanner($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->where('idBacklog', $this->session->userdata('idBacklog'));
        $this->db->join('karyawan', 'karyawan.nrp = detail_backlog.nrp', 'left');
        // $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        return $this->db->get($this->namaTable)->row();
    }

    function getDataByPart($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->where('idBacklog', $this->session->userdata('idBacklog'));
        $this->db->join('karyawan', 'karyawan.nrp = detail_backlog.nrp', 'left');
        // $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        // $this->db->join('soh', 'soh.idPart = detail_part.idPart', 'left');
        return $this->db->get($this->namaTable)->row();
    }

    function save($fotoTemuan)
    {
        $object = [
            'idDetailBacklog' => uniqid(),
            'idBacklog' => $this->session->userdata('idBacklog'),
            'nrp' => $this->session->userdata('nrp'),
            'problemDesc' => htmlspecialchars($this->input->post('problemDesc', TRUE)),
            'partNumber' => htmlspecialchars($this->input->post('partNumber', TRUE)),
            'partDesc' => htmlspecialchars($this->input->post('partDesc', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'tglTemuan' => date('Y-m-d'),
            'statusPart' => '1',
            'verifyTemuan' => '1',
            'fotoTemuan' => $fotoTemuan,
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function savePart()
    {
        $barang = htmlspecialchars($this->input->post('qtyReq', TRUE));
        $harga = htmlspecialchars($this->input->post('price', TRUE));
        $total = $barang * $harga;
        $object = [
            'idDetailBacklog' => uniqid(),
            'idBacklog' => htmlspecialchars($this->input->post('idBacklog', TRUE)),
            'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'price' => $total,
            'tglTemuan' => date('Y-m-d'),
            'statusPart' => htmlspecialchars($this->input->post('statusPart', TRUE)),
            'verifyTemuan' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Data Part Berhasil Ditambahkan</div>');
    }

    function update($Value)
    {
        $barang = htmlspecialchars($this->input->post('qtyReq', TRUE));
        $harga = htmlspecialchars($this->input->post('price', TRUE));
        $total = $barang * $harga;
        $object = [
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'price' => $total,
            'planRepair' => htmlspecialchars($this->input->post('planRepair', TRUE)),
            'statusPart' => htmlspecialchars($this->input->post('statusPart', TRUE)),
            'verifyTemuan' => '2',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function updategl($Value)
    {
        $barang = htmlspecialchars($this->input->post('qtyReq', TRUE));
        $harga = htmlspecialchars($this->input->post('price', TRUE));
        $total = $barang * $harga;
        $object = [
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'price' => $total,
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'planRepair' => htmlspecialchars($this->input->post('planRepair', TRUE)),
            'statusPart' => '2',
            'verifyTemuan' => '2',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diverifikasi Group Leader</div>');
        
    }

    function updatePlanner($Value)
    {
        $object = [
            'statusPart' => htmlspecialchars($this->input->post('statusPart', TRUE)),
            'verifyTemuan' => '4',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diverifikasi Planner</div>');
        
    }

    function updateSection($Value)
    {
        $object = [
            'verifyTemuan' => '3',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diverifikasi Section Head</div>');
        
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
