<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tsr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        validation_user();
        // validation_page('3', 'Admin/Karyawan');
        $this->load->model('Tsr_m', 'primaryModel');
    }
    public $titles = 'Technical Service Report';
    public $vn = 'Tsr';

    public function index()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Dashboard";
            $data['row'] = $cek;
            $data['data'] = $this->primaryModel->getAllData();
            $this->template->load('home', $this->vn . '/list', $data);
        endif;
    }

    public function detail()
    {
        $data['row'] =  $this->primaryModel->getDataById($this->uri->segment(4));
        $data['title'] = $this->titles;
        $this->template->load('home', $this->vn . '/detail', $data);
    }

    function add1()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('home', $this->vn . '/add1', $data);
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('Admin/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('home', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id, $this->upload_foto());
        redirect('Admin/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('Admin/' . $this->vn);
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
