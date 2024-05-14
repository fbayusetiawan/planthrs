<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Popunit_m extends CI_Model
{

    public $namaTable = 'popunit';
    public $pk = 'idPopunit';

    function getAllData()
    {
        $this->db->order_by('popunit.idSection', 'Asce');
        $this->db->join('unit_model', 'unit_model.idUnitModel = popunit.idUnitModel', 'left');
        $this->db->join('unit_type', 'unit_type.idUnitType = popunit.idUnitType', 'left');
        $this->db->join('unit_manufacture', 'unit_manufacture.idUnitManufacture = popunit.idUnitManufacture', 'left');
        $this->db->join('unit_activity', 'unit_activity.idUnitActivity = popunit.idUnitActivity', 'left');
        
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->join('unit_model', 'unit_model.idUnitModel = popunit.idUnitModel', 'left');
        $this->db->join('unit_type', 'unit_type.idUnitType = popunit.idUnitType', 'left');
        $this->db->join('unit_manufacture', 'unit_manufacture.idUnitManufacture = popunit.idUnitManufacture', 'left');
        $this->db->join('unit_activity', 'unit_activity.idUnitActivity = popunit.idUnitActivity', 'left');
        $this->db->join('section', 'section.idSection = popunit.idSection', 'left');
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
        $this->db->insert_batch('popunit', $data);
    }

    function save($fotoUnit)
    {
        $object = [
            'idPopunit' => uniqid(),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'idUnitActivity' => htmlspecialchars($this->input->post('idUnitActivity', TRUE)),
            'idUnitType' => htmlspecialchars($this->input->post('idUnitType', TRUE)),
            'idUnitManufacture' => htmlspecialchars($this->input->post('idUnitManufacture', TRUE)),
            'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
            'idUnitModel' => htmlspecialchars($this->input->post('idUnitModel', TRUE)),
            'snvin' => htmlspecialchars($this->input->post('snvin', TRUE)),
            'engineModel' => htmlspecialchars($this->input->post('engineModel', TRUE)),
            'esn' => htmlspecialchars($this->input->post('esn', TRUE)),
            'hmUpdate' => htmlspecialchars($this->input->post('hmUpdate', TRUE)),
            'deliveryUnit' => htmlspecialchars($this->input->post('deliveryUnit', TRUE)),
            'deliveryToAgm' => htmlspecialchars($this->input->post('deliveryToAgm', TRUE)),
            'location' => htmlspecialchars($this->input->post('location', TRUE)),
            'isActive' => '1',
            'fotoUnit' => $fotoUnit,
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $fotoUnit)
    {
        if (empty($fotoUnit)) {
            $object = [
                'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
                'idUnitActivity' => htmlspecialchars($this->input->post('idUnitActivity', TRUE)),
                'idUnitType' => htmlspecialchars($this->input->post('idUnitType', TRUE)),
                'idUnitManufacture' => htmlspecialchars($this->input->post('idUnitManufacture', TRUE)),
                'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
                'idUnitModel' => htmlspecialchars($this->input->post('idUnitModel', TRUE)),
                'snvin' => htmlspecialchars($this->input->post('snvin', TRUE)),
                'engineModel' => htmlspecialchars($this->input->post('engineModel', TRUE)),
                'esn' => htmlspecialchars($this->input->post('esn', TRUE)),
                'hmUpdate' => htmlspecialchars($this->input->post('hmUpdate', TRUE)),
                'deliveryUnit' => htmlspecialchars($this->input->post('deliveryUnit', TRUE)),
                'deliveryToAgm' => htmlspecialchars($this->input->post('deliveryToAgm', TRUE)),
                'location' => htmlspecialchars($this->input->post('location', TRUE)),
            ];
        } else {
            $object = [
                'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
                'idUnitActivity' => htmlspecialchars($this->input->post('idUnitActivity', TRUE)),
                'idUnitType' => htmlspecialchars($this->input->post('idUnitType', TRUE)),
                'idUnitManufacture' => htmlspecialchars($this->input->post('idUnitManufacture', TRUE)),
                'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
                'idUnitModel' => htmlspecialchars($this->input->post('idUnitModel', TRUE)),
                'snvin' => htmlspecialchars($this->input->post('snvin', TRUE)),
                'engineModel' => htmlspecialchars($this->input->post('engineModel', TRUE)),
                'esn' => htmlspecialchars($this->input->post('esn', TRUE)),
                'hmUpdate' => htmlspecialchars($this->input->post('hmUpdate', TRUE)),
                'deliveryUnit' => htmlspecialchars($this->input->post('deliveryUnit', TRUE)),
                'deliveryToAgm' => htmlspecialchars($this->input->post('deliveryToAgm', TRUE)),
                'location' => htmlspecialchars($this->input->post('location', TRUE)),
                'fotoUnit' => $fotoUnit,
            ];
        }
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
