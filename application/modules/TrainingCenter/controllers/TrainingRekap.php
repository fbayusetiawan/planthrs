<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TrainingRekap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('TrainingRekap_m', 'primaryModel');
    }
    public $titles = 'Rekap Training';
    public $vn = 'TrainingRekap';

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
        $data['title'] = $this->titles;
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('TrainingCenter/' . $this->vn);
    }

    function addKaryawanAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->saveKaryawan($id, $this->upload_foto());
        redirect('TrainingCenter/' . $this->vn);
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
        redirect('TrainingCenter/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('TrainingCenter/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/sertifikat/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 20024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('sertifikat');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file */
