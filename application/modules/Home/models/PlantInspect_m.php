<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PlantInspect_m extends CI_Model
{

    public $namaTable = 'plantinspect';
    public $pk = 'idPlantInspect';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save($fotoInspect)
    {
        $object = [
            'idPlantInspect' => uniqid(),
            'codeUnit' => htmlspecialchars($this->input->post('codeUnit', TRUE)),
            'nrp' => $this->session->userdata('nrp'),
            'hmInspect' => htmlspecialchars($this->input->post('hmInspect', TRUE)),
            'tglInspect' => htmlspecialchars($this->input->post('tglInspect', TRUE)),
            'rating' => htmlspecialchars($this->input->post('rating', TRUE)),
            'catatanInspect' => htmlspecialchars($this->input->post('catatanInspect', TRUE)),
            'fotoInspect' => $fotoInspect,
            'isActive' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if (empty($foto) && empty($pass)) :
            $object = [
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
            ];
        elseif (empty($foto) && !empty($pass)) :
            $object = [

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

            ];
        elseif (!empty($foto) && empty($pass)) :
            $object = [

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
                'foto' => $foto,

            ];
        else :
            $object = [

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
                'foto' => $foto,

            ];
        endif;
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
