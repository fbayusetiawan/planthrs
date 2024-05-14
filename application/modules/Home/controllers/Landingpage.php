<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Landingpage_m', 'primaryModel');
        // $this->load->library('form_validation');
    }
    public $titles = 'Penduduk';
    public $vn = 'Landingpage';

    public function index()
    {
        $data['pageTitle'] = "Dashboard";
        $this->template->load("landingpage", "Landingpage/list", $data);
    }

    public function contact()
    {
        // $data['data'] = $this->primaryModel->getAllData();
        $this->template->load('landingpage', $this->vn . '/contact');
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataByIdSiswa($id);
        $data['kelas'] = $this->primaryModel->getKelas();
        $this->template->load("landingpage", "dashboard/edit", $data);
    }

    function addAction()
    {
        $this->primaryModel->save();
        redirect('Home/Landingpage');
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id);
        redirect('landingpage/' . $this->vn);
    }

    function editAction1()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update1($id);
        redirect('landingpage/' . $this->vn);
    }
}

/* End of file Dashboard.php */
