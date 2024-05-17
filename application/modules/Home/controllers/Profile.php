<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        validation_user();
        $this->load->model('Profile_m', 'primaryModel');
        $this->load->library('form_validation');
    }
    public $titles = 'Dashboard';
    public $vn = 'Profile';

    public function index()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Dashboard";
            $data['row'] = $cek;
            $data['profile'] = $this->primaryModel->getAllDataByNrp();
            $this->template->load('home', $this->vn . '/list', $data);
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
