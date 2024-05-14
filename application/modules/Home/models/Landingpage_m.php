<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage_m extends CI_Model
{

    public $namaTable = 'penduduk';
    public $pk = 'idPenduduk';

    function getSuratPengajuan()
    {
        return $this->db->get('surat_domisili')->num_rows();
    }

    function getSuratTidakMampu()
    {
        return $this->db->get('surat_tidakmampu')->num_rows();
    }

    function getPenduduk()
    {
        // $this->db->where('verifySurat', '4');
        return $this->db->get('penduduk')->num_rows();
    }

    function getKegiatanDesa()
    {
        // $this->db->where('verifySurat', '4');
        return $this->db->get('d_kegiatandesa')->num_rows();
    }

    function getPengaduan()
    {
        // $this->db->where('verifySurat', '4');
        return $this->db->get('pengaduan')->num_rows();
    }

    public function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    public function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'namaPengadu' => $this->input->post('namaPengadu', TRUE),
            'noTelpPengadu' => $this->input->post('noTelpPengadu', TRUE),
            'emailPengadu' => $this->input->post('emailPengadu', TRUE),
            'keteranganPengadu' => $this->input->post('keteranganPengadu', TRUE),
            'tglPengadu' => date('y-m-d'),
            'isActive' => '1',
        ];
        $this->db->insert('pengaduan', $object);
        $this->session->set_flashdata('message', 'Pesan Anda Terkirim. Terima Kasih Atas Saran dan Masukan Dari Anda.');
    }

    function update($Value)
    {
        $object = [
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'namaSiswa' => $this->input->post('namaSiswa'),
            'jk' => $this->input->post('jk'),
            'tempatLahir' => $this->input->post('tempatLahir'),
            'tanggalLahir' => $this->input->post('tanggalLahir'),
            'statusKeluarga' => $this->input->post('statusKeluarga'),
            'anakKe' => $this->input->post('anakKe'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'noTelp' => $this->input->post('noTelp'),
            'asalSd' => $this->input->post('asalSd'),
            'angkatan' => $this->input->post('angkatan'),
            'roleId' => '3',
        ];

        $this->db->where('idSiswa', $Value);
        $this->db->update('siswa', $object);
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
