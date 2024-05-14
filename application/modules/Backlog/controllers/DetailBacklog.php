<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailBacklog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // validation_page('3', 'Backlog/Karyawan');
        $this->load->model('DetailBacklog_m', 'primaryModel');
    }
    public $titles = 'Backlog';
    public $vn = 'DetailBacklog';

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

    // function addTemuan()
    // {

    //     $array = array(
    //         'idBacklog' => $this->uri->segment(4),
    //         'codeUnit' => $this->uri->segment(5)
    //     );

    //     $this->session->set_userdata($array);

    //     redirect('Backlog/DetailBacklog');
    // }

    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function verifgl()
    {
        $data['title'] = "Verifikasi Group Leader";
        $data['pageTitle'] = "Verifikasi Group Leader";
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);
        $this->template->load('template', $this->vn . '/verifgl', $data);
    }

    function addPart()
    {
        $data['title'] = "Verifikasi Group Leader";
        $data['pageTitle'] = "Verifikasi Group Leader";
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataByPart($id);
        $this->template->load('template', $this->vn . '/addPart', $data);
    }

    function verifplanner()
    {
        $data['title'] = "Verifikasi Planner";
        $data['pageTitle'] = "Verifikasi Planner";
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataByPlanner($id);
        $this->template->load('template', $this->vn . '/verifplanner', $data);
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('Backlog/' . $this->vn);
    }

    function addPartAction()
    {
        $this->primaryModel->savePart();
        redirect('Backlog/' . $this->vn);
    }

    function verifglAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->updategl($id);
        redirect('Backlog/' . $this->vn);
    }

    function verifplannerAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->updatePlanner($id);
        redirect('Backlog/' . $this->vn);
    }

    function verifsectionAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->updateSection($id);
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

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('Backlog/' . $this->vn);
    }
}

/* End of file */
