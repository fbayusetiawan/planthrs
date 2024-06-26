<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailBacklog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        validation_user();
        // validation_page('3', 'Home/Karyawan');
        $this->load->model('DetailBacklog_m', 'primaryModel');
    }
    public $titles = 'Detail Temuan Unit';
    public $vn = 'DetailBacklog';

    public function index()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Detail Backlog";
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

    function addTemuan()
    {
        $array = array(
            'idBacklog' => $this->uri->segment(4),
            'codeUnit' => $this->uri->segment(5)
        );

        $this->session->set_userdata($array);

        redirect('Home/DetailBacklog');
    }

    function add()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Tambah Form Data Registrasi Backlog";
            $data['row'] = $cek;
            $data['data'] = $this->primaryModel->getAllData();
            $this->template->load('home', $this->vn . '/add', $data);
        endif;
    }

    function addPart()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Tambah Part";
            $data['row'] = $cek;
            $id = $this->uri->segment(4);
            $data['row'] = $this->primaryModel->getDataByPart($id);
            $this->template->load('home', $this->vn . '/addPart', $data);
        endif;
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('Home/' . $this->vn);
    }

    function edit()
    {
        $this->db->where('nrp', $this->session->userdata('nrp'));
        $cek = $this->db->get('karyawan')->row();
        if ($cek->verifKaryawan == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['title'] = "Form Backlog";
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

    function addPartAction()
    {
        $this->primaryModel->savePart();
        redirect('Home/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('Home/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/fotoTemuan/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('fotoTemuan');
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

    function ajaxpart()
    {
        $idPart = $_GET['idPart'];
        $this->db->where('idPart', $idPart);
        // $this->db->join('detail_backlog', 'detail_backlog.idPart = soh.idPart', 'left');
        $row = $this->db->get('soh')->row();
        if (empty($row->idPart)) :
            $data = [
                'material' => 'Data Material Tidak ditemukan',
                'partNumber' => 'Data Part Tidak ditemukan',
                'partDescription' => 'Data Deskripsi Tidak ditemukan',
                'price' => 'Data Price Tidak ditemukan',
            ];
            echo json_encode($data);
        else :
            $data = [
                'material' => $row->material,
                'partNumber' => $row->partNumber,
                'partDescription' => $row->partDescription,
                'price' => $row->price,
            ];
            echo json_encode($data);
        endif;
    }
}

/* End of file */
