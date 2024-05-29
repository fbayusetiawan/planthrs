<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // validation_page('3', 'Backlog/Karyawan');
        $this->load->model('Registrasi_m', 'primaryModel');
    }
    public $titles = 'Backlog';
    public $vn = 'Registrasi';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function detail()
    {
        $data['row'] =  $this->primaryModel->getDataById($this->uri->segment(4));
        // $data['keluarga'] =  $this->primaryModel->getDataKeluargaById($this->uri->segment(4));
        // $data['pendidikan'] =  $this->primaryModel->getDataPendidikanById($this->uri->segment(4));
        $data['title'] = $this->titles;
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function verifygl()
    {
        $data['title'] = "Verifikasi Group Leader";
        $data['pageTitle'] = "Verifikasi Group Leader";
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/verifygl', $data);
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('Backlog/' . $this->vn);
    }

    function addActionKeluarga()
    {
        $this->primaryModel->saveKeluarga();
        redirect('Backlog/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id, $this->upload_foto());
        redirect('Backlog/' . $this->vn);
    }

    function addTemuan()
    {

        $array = array(
            'idBacklog' => $this->uri->segment(4),
            'codeUnit' => $this->uri->segment(5)
        );

        $this->session->set_userdata($array);

        redirect('Backlog/DetailBacklog');
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('Backlog/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/fotokaryawan/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 5024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function cekUser()
    {
        $user = $_GET['user'];
        $this->db->where('username', $user);
        $row = $this->db->get('pegawai')->row();

        if (empty($row->username)) :
            echo "<span class='text-success'>Tersedia</span>";
        else :
            echo "<span class='text-danger'>Tidak Tersedia</span>";
        endif;
    }
}

/* End of file */
