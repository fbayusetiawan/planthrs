<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_m extends CI_Model
{

    public $namaTable = 'karyawan';
    public $pk = 'idKaryawan';

    function getDataAll()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        return $this->db->get('karyawan')->row();
    }

    function save($foto)
    {
        $object = [
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
            'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
            'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
            'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
            'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
            'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
            'username' => htmlspecialchars($this->input->post('username', TRUE)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'verifKaryawan' => '1',
            'foto' => $foto
        ];
        $this->db->where('idKaryawan', $this->session->userdata('idKaryawan'));
        $this->db->update('karyawan', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Akun telah aktif! Silahkan login lagi.</div>');
    }
}

/* End of file Pengaturan_m.php */
