<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_m extends CI_Model
{

    public $namaTable = 'user';
    public $pk = 'idUser';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function kategori()
    {
        $this->db->where('ket', '0');
        return $this->db->get('kategori')->result();
    }

    function getTitle()
    {
        return $this->db->get('menu_title')->result();
    }

    function save()
    {
        $object = [
            'idUser' => uniqid(),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto' => 'default.jpg',
            'roleId' => '2',
            'isActive' => '1',
            'dateCreated' => time()

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto' => 'default.jpg',
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }

    function addRule($id)
    {
        $idMenu = $_GET['idMenu'];
        $cek = $this->db->query("SELECT * FROM menu_main WHERE idMenu IN(SELECT idMenu FROM menu_rule WHERE idUser='$id') AND idMenu='$idMenu'")->num_rows();
        if ($cek < 1) :
            $object = [
                'idMenu' => $idMenu,
                'idUser' => $id
            ];
            $this->db->insert('menu_rule', $object);
            echo "Insert";
        else :
            $this->db->where('idMenu', $idMenu);
            $this->db->where('idUser', $id);
            $this->db->delete('menu_rule');
            echo "delete";
        endif;
    }
}

/* End of file */
