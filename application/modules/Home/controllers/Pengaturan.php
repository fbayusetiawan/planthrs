<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaturan_m', 'primaryModel');
    }

    public function index()
    {
    }

    public function umum()
    {
        $data['title'] = "Pengaturan Umum";
        $data['pageTitle'] = "Pengaturan Umum";
        $data['row'] = $this->primaryModel->getDataAll();
        $this->template->load('home', 'Pengaturan/edit', $data);
    }

    public function setup()
    {
        $data['title'] = "Setup Account";
        $data['pageTitle'] = "Setup Account";
        $data['row'] = $this->primaryModel->getDataAll();
        $this->template->load('home', 'Pengaturan/setup', $data);
    }

    public function setup_action()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id, $this->upload_foto());
        redirect('Auth/Login');
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/fotoKaryawan/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 15024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file Pengaturan.php */
