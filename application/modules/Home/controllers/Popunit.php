<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Popunit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        validation_user();
        $this->load->model('Popunit_m', 'primaryModel');
        $this->load->library('form_validation');
    }
    public $titles = 'Populasi Unit';
    public $vn = 'Popunit';

    public function index()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Populasi Unit";
            $data['row'] = $cek;
            $data['data'] = $this->primaryModel->getAllData();
            $this->template->load('home', $this->vn . '/list', $data);
        endif;
    }

    public function detail()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
        $data['row'] =  $this->primaryModel->getDataById($this->uri->segment(4));
        $data['title'] = $this->titles;
        $this->template->load('home', $this->vn . '/detail', $data);
        endif;
    }

    function edit()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Data Karyawan";
            $data['row'] = $cek;
            $id = $this->uri->segment(4);
            $data['row'] = $this->primaryModel->getDataById($id);
            $this->template->load('home', $this->vn . '/edit', $data);
        endif;
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->update($id, $this->upload_foto());
        redirect('Home/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/fotokaryawan/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 15024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file Rt.php */
