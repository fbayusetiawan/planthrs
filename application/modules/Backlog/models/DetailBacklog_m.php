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
        $object = [
            'idDetailBacklog' => uniqid(),
            'idBacklog' => htmlspecialchars($this->input->post('idBacklog', TRUE)),
            'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
            'problemDesc' => htmlspecialchars($this->input->post('problemDesc', TRUE)),
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'tglTemuan' => date('Y-m-d'),
            'statusPart' => htmlspecialchars($this->input->post('statusPart', TRUE)),
            'verifyTemuan' => '1',
            'fotoTemuan' => htmlspecialchars($this->input->post('fotoTemuan', TRUE)),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Part Berhasil Disimpan</div>');
    }

    function update($Value, $fotoTemuan)
    {
        if (empty($fotoTemuan)) {
            $object = [
                'problemDesc' => htmlspecialchars($this->input->post('problemDesc', TRUE)),
                'partNumber' => htmlspecialchars($this->input->post('partNumber', TRUE)),
                'partDesc' => htmlspecialchars($this->input->post('partDesc', TRUE)),
                'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
                'statusPart' => '1',
                'verifyTemuan' => '1',
            ];
        } else {
            $object = [
                'problemDesc' => htmlspecialchars($this->input->post('problemDesc', TRUE)),
                'partNumber' => htmlspecialchars($this->input->post('partNumber', TRUE)),
                'partDesc' => htmlspecialchars($this->input->post('partDesc', TRUE)),
                'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
                'statusPart' => '1',
                'verifyTemuan' => '1',
                'fotoTemuan' => $fotoTemuan,
            ];
        }
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function updategl($Value)
    {
        $object = [
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
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
            'idPart' => htmlspecialchars($this->input->post('idPart', TRUE)),
            'qtyReq' => htmlspecialchars($this->input->post('qtyReq', TRUE)),
            'planRepair' => htmlspecialchars($this->input->post('planRepair', TRUE)),
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
