<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_m extends CI_Model
{

    public $namaTable = 'backlog1';
    public $pk = 'idBacklog';

    function getAllData()
    {
        $this->db->where('backlog1.idSection', $this->session->userdata('idSection'));
        $this->db->where('statusBacklog', '1');
        $this->db->join('section', 'section.idSection = ' . $this->namaTable . '.idSection', 'left');
        $this->db->join('popunit', 'popunit.codeUnit = ' . $this->namaTable . '.codeUnit', 'left');
            
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataClose()
    {
        $this->db->where('backlog1.idSection', $this->session->userdata('idSection'));
        $this->db->where('statusBacklog', '2');
        
        $this->db->join('section', 'section.idSection = ' . $this->namaTable . '.idSection', 'left');
        $this->db->join('popunit', 'popunit.codeUnit = ' . $this->namaTable . '.codeUnit', 'left');
            
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save($fotoTemuan)
    {
        $object = [
            'idBacklog' => uniqid(),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'tanggalTemuan' => htmlspecialchars($this->input->post('tanggalTemuan', TRUE)),
            'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
            'hmUnit' => htmlspecialchars($this->input->post('hmUnit', TRUE)),
            'problemBacklog' => htmlspecialchars($this->input->post('problemBacklog', TRUE)),
            'rating' => htmlspecialchars($this->input->post('rating', TRUE)),
            'statusBacklog' => '1',
            'fotoTemuan' => $fotoTemuan,
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $fotoTemuan)
    {
        if (empty($fotoTemuan)) {
            $object = [
                'tanggalTemuan' => htmlspecialchars($this->input->post('tanggalTemuan', TRUE)),
                'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
                'hmUnit' => htmlspecialchars($this->input->post('hmUnit', TRUE)),
                'problemBacklog' => htmlspecialchars($this->input->post('problemBacklog', TRUE)),
                'rating' => htmlspecialchars($this->input->post('rating', TRUE)),
            ];
        } else {
            $object = [
                'tanggalTemuan' => htmlspecialchars($this->input->post('tanggalTemuan', TRUE)),
                'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
                'hmUnit' => htmlspecialchars($this->input->post('hmUnit', TRUE)),
                'problemBacklog' => htmlspecialchars($this->input->post('problemBacklog', TRUE)),
                'rating' => htmlspecialchars($this->input->post('rating', TRUE)),
                'fotoTemuan' => $fotoTemuan,
            ];
        }
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
