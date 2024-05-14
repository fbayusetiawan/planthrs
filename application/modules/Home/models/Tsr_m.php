<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tsr_m extends CI_Model
{

    public $namaTable = 'tsr';
    public $pk = 'idTsr';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getJabatan()
    {
        return $this->db->get('jabatan')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save($gambarSebelum, $gambarSesudah)
    {
        $object = [
            'idSs' => uniqid(),
            'idKaryawan' => htmlspecialchars($this->input->post('idKaryawan', TRUE)),
            'pertanyaan' => htmlspecialchars($this->input->post('pertanyaan', TRUE)),
            'judulIde' => htmlspecialchars($this->input->post('judulIde', TRUE)),
            'tanggalUsulan' => htmlspecialchars($this->input->post('tanggalUsulan', TRUE)),
            'lokasiPenemuan' => htmlspecialchars($this->input->post('lokasiPenemuan', TRUE)),
            'masalah' => htmlspecialchars($this->input->post('masalah', TRUE)),
            'uraianMasalah' => htmlspecialchars($this->input->post('uraianMasalah', TRUE)),
            'ide' => htmlspecialchars($this->input->post('ide', TRUE)),
            'tinjauanIde' => htmlspecialchars($this->input->post('tinjauanIde', TRUE)),
            'persetujuanAtasan' => htmlspecialchars($this->input->post('persetujuanAtasan', TRUE)),
            'uraianProses' => htmlspecialchars($this->input->post('uraianProses', TRUE)),
            'q' => htmlspecialchars($this->input->post('q', TRUE)),
            'c' => htmlspecialchars($this->input->post('c', TRUE)),
            'd' => htmlspecialchars($this->input->post('d', TRUE)),
            's' => htmlspecialchars(str_replace('-', '', $this->input->post('s', TRUE))),
            'm' => htmlspecialchars($this->input->post('m', TRUE)),
            'gambarSebelum' => $gambarSebelum,
            'gambarSesudah' => $gambarSesudah,
            'createSs' => date('Y-m-d'),
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
