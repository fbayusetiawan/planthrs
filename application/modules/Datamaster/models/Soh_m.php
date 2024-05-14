<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Soh_m extends CI_Model
{

    public $namaTable = 'soh';
    public $pk = 'idPart';

    function getAllData()
    {
        $this->db->from($this->namaTable);
        $this->db->order_by("material", "asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    public function upload_file($filename)
    {
        $this->load->library('upload');
        $config['upload_path'] = './assets/excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '10048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insert_multiple($data)
    {
        $this->db->insert_batch('soh', $data);
    }

    function save()
    {
        $object = [
            'partNumber' => htmlspecialchars($this->input->post('partNumber', TRUE)),
            'partDescription' => htmlspecialchars($this->input->post('partDescription', TRUE)),
            'mnemonic' => htmlspecialchars($this->input->post('mnemonic', TRUE)),
            'material' => htmlspecialchars($this->input->post('material', TRUE)),
            'price' => htmlspecialchars($this->input->post('price', TRUE)),
            'isActive' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'partNumber' => htmlspecialchars($this->input->post('partNumber', TRUE)),
            'partDescription' => htmlspecialchars($this->input->post('partDescription', TRUE)),
            'mnemonic' => htmlspecialchars($this->input->post('mnemonic', TRUE)),
            'material' => htmlspecialchars($this->input->post('material', TRUE)),
            'price' => htmlspecialchars($this->input->post('price', TRUE)),
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
