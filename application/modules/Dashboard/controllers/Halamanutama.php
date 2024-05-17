<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Halamanutama extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Halamanutama_m', 'primaryModel');
    }
    public $titles = 'Dashboard';
    public $vn = 'Halamanutama';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        // $data['data'] = $this->primaryModel->getAllData();
        $data['popunit'] = $this->primaryModel->popunit();
        $data['karyawan'] = $this->primaryModel->karyawan();
        $data['karyawanActive'] = $this->primaryModel->karyawanActive();
        $data['karyawanNonActive'] = $this->primaryModel->karyawanNonActive();
        $data['backlogOpen'] = $this->primaryModel->backlogOpen();
        $data['backlogClose'] = $this->primaryModel->backlogClose();
        $data['part'] = $this->primaryModel->getAllDataBacklog();
        $data["wo"] = $this->primaryModel->getWo();
        $data["totalBacklog"] = $this->primaryModel->totalBacklog();

        $this->template->load('template', $this->vn . '/list', $data);
    }

}

/* End of file */
