<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailBacklog_m extends CI_Model
{

    public $namaTable = 'detail_backlog';
    public $pk = 'idDetailBacklog';

    function getAllData()
    {
        $this->db->where('backlog1.idBacklog', $this->session->userdata('idBacklog'));   
        $this->db->join('karyawan', 'karyawan.nrp = detail_backlog.nrp', 'left');
        $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getDataByPart($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->where('idBacklog', $this->session->userdata('idBacklog'));
        return $this->db->get($this->namaTable)->row();
    }

    function getDataBacklog($Value)
    {
        $this->db->where('idBacklog', $Value);
        return $this->db->get('backlog1')->row();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $barang = htmlspecialchars($this->input->post('qtyReq', TRUE));
        $harga = htmlspecialchars($this->input->post('price', TRUE));
        $total = $barang * $harga;
        $object = [
            'idDetailBacklog' => uniqid(),
            'idBacklog' => $this->session->userdata('idBacklog'),
            'nrp' => $this->session->userdata('nrp'),
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'price' => $total,
            'tglTemuan' => date('Y-m-d'),
            'statusPart' => '1',
            'verifyTemuan' => '1',
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
            'statusPart' => '1',
            'verifyTemuan' => '1',
            'statusPart' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Part Berhasil Disimpan</div>');
    }

    function update($Value, $fotoTemuan)
    {
        $barang = htmlspecialchars($this->input->post('qtyReq', TRUE));
        $harga = htmlspecialchars($this->input->post('price', TRUE));
        $total = $barang * $harga;
        $object = [
            'idBacklog' => htmlspecialchars($this->input->post('idBacklog', TRUE)),
            'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'price' => $total,
            'tglTemuan' => date('Y-m-d'),
            'statusPart' => '1',
            'verifyTemuan' => '1',
            'statusPart' => '1',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Part Berhasil Diubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
