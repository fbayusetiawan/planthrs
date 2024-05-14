<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register_m extends CI_Model
{

    public $table = "register";
    public $pk = "idRegister";

    public function getByEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('mahasiswa')->row();
    }

    public function getByNrp($nrp)
    {
        $this->db->where('nrp', $nrp);
        return $this->db->get('karyawan')->row();
    }

    public function save()
    {
        $object = [
            'idKaryawan' => htmlspecialchars($this->input->post('idKaryawan', TRUE)),
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
            'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
            'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
            'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
            'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
            'username' => htmlspecialchars($this->input->post('username', TRUE)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'roleId' => '1',
            'isActive' => '1',
            'foto' => 'default.jpeg',
        ];

        $array = array(
            'nrp' => $this->input->post('nrp', TRUE),
            'namaKaryawan' => $this->input->post('namaKaryawan', TRUE),
            'idJabatan' => $this->input->post('idJabatan', TRUE),
            'idSection' => $this->input->post('idSection', TRUE),
        );

        $this->session->set_userdata($array);

        $this->db->insert('karyawan', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Berhasil, Silakan Login!</div>');
    }

    public function fakultas()
    {
        return $this->db->get('fakultas')->result();
    }
}

/* End of file user_m.php */
