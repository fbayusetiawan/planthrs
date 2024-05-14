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
}

/* End of file Rt.php */
