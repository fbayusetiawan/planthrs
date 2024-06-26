<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{

    public $namaTable = 'karyawan';
    public $pk = 'idKaryawan';

    function getAllData()
    {
        $this->db->join('section', 'section.idSection = ' . $this->namaTable . '.idSection', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = ' . $this->namaTable . '.idJabatan', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = ' . $this->namaTable . '.idGolongan', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->join('section', 'section.idSection = ' . $this->namaTable . '.idSection', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = ' . $this->namaTable . '.idJabatan', 'left');
        $this->db->join('golongan', 'golongan.idGolongan = ' . $this->namaTable . '.idGolongan', 'left');
        return $this->db->get($this->namaTable)->row();
    }

    function getDataKeluargaById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get('keluarga')->result();
    }
    
    function getDataPendidikanById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get('pendidikan')->result();
    }


    function save($foto)
    {
        $object = [
            'idKaryawan' => htmlspecialchars($this->input->post('idKaryawan', TRUE)),
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
            'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
            'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
            'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
            'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
            'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
            'statusMenikah' => htmlspecialchars($this->input->post('statusMenikah', TRUE)),
            'kebangsaan' => htmlspecialchars($this->input->post('kebangsaan', TRUE)),
            'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
            'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
            'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
            'username' => htmlspecialchars($this->input->post('username', TRUE)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto' => 'hrs.jpg',
            'roleId' => '1',
            'isActive' => '1',
            // 'helpNumber' => noOtomatis('helpNumber', 'helpNumber', 'helpNumber', 'karyawan')
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
            'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
            'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
            'statusMenikah' => htmlspecialchars($this->input->post('statusMenikah', TRUE)),
            'kebangsaan' => htmlspecialchars($this->input->post('kebangsaan', TRUE)),
            'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
            'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
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
            'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
            'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
            'statusMenikah' => htmlspecialchars($this->input->post('statusMenikah', TRUE)),
            'kebangsaan' => htmlspecialchars($this->input->post('kebangsaan', TRUE)),
            'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
            'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
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
            'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
            'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
            'statusMenikah' => htmlspecialchars($this->input->post('statusMenikah', TRUE)),
            'kebangsaan' => htmlspecialchars($this->input->post('kebangsaan', TRUE)),
            'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
                'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
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
            'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
            'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
            'statusMenikah' => htmlspecialchars($this->input->post('statusMenikah', TRUE)),
            'kebangsaan' => htmlspecialchars($this->input->post('kebangsaan', TRUE)),
            'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
            'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
            'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
            'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
            'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
                'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
            'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
            'username' => htmlspecialchars($this->input->post('username', TRUE)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto' => 'hrs.jpg',

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
