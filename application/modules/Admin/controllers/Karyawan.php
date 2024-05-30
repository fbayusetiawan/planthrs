<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    private $filename = "Import_data";
    public function __construct()
    {
        parent::__construct();
        // validation_page('3', 'Admin/Karyawan');
        $this->load->model('Karyawan_m', 'primaryModel');
    }
    public $titles = 'Karyawan';
    public $vn = 'Karyawan';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    public function staff()
    {
        $data['title'] = "Karyawan Staff";
        $data['pageTitle'] = "Karyawan Staff";
        $data['data'] = $this->primaryModel->getDataStaff();

        $this->template->load('template', $this->vn . '/staff', $data);
    }

    public function track()
    {
        $data['title'] = "Karyawan Track";
        $data['pageTitle'] = "Karyawan Track";
        $data['data'] = $this->primaryModel->getDataTrack();

        $this->template->load('template', $this->vn . '/track', $data);
    }

    public function small()
    {
        $data['title'] = "Karyawan Wheel Small";
        $data['pageTitle'] = "Karyawan Wheel Small";
        $data['data'] = $this->primaryModel->getDataSmall();

        $this->template->load('template', $this->vn . '/small', $data);
    }

    public function big()
    {
        $data['title'] = "Karyawan Wheel Big";
        $data['pageTitle'] = "Karyawan Wheel Big";
        $data['data'] = $this->primaryModel->getDataBig();

        $this->template->load('template', $this->vn . '/big', $data);
    }

    public function sse()
    {
        $data['title'] = "Karyawan SSE + Fabrikasi";
        $data['pageTitle'] = "Karyawan SSE + Fabrikasi";
        $data['data'] = $this->primaryModel->getDataSse();

        $this->template->load('template', $this->vn . '/sse', $data);
    }

    public function tyre()
    {
        $data['title'] = "Karyawan Tyre";
        $data['pageTitle'] = "Karyawan Tyre";
        $data['data'] = $this->primaryModel->getDataTyre();

        $this->template->load('template', $this->vn . '/tyre', $data);
    }

    public function admin()
    {
        $data['title'] = "Karyawan Admin";
        $data['pageTitle'] = "Karyawan Admin";
        $data['data'] = $this->primaryModel->getDataAdmin();

        $this->template->load('template', $this->vn . '/admin', $data);
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

    function addKeluarga()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/addKeluarga', $data);
    }

    function addAction()
    {
        $this->primaryModel->save($this->upload_foto());
        redirect('Admin/' . $this->vn);
    }

    function addActionKeluarga()
    {
        $this->primaryModel->saveKeluarga();
        redirect('Admin/' . $this->vn);
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
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10024; // imb
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

    public function Form()
    {
        $data = array(); // Buat variabel $data sebagai array

        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di primaryModel.php
            $upload = $this->primaryModel->upload_file($this->filename);

            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('assets/excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

        $this->template->load('template', $this->vn . '/form', $data);
    }

    public function import()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();

        $numrow = 1;
        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Kita push (add) array data ke variabel data
                array_push($data, array(
                    'idKaryawan' => uniqid(),
                    'nrp' => $row['A'],
                    'namaKaryawan' => $row['B'],
                    'idSite' => $row['C'],
                    'idSection' => $row['D'],
                    'idJabatan' => $row['E'],
                    'username' => $row['F'],
                    'password' => password_hash($row['F'], PASSWORD_DEFAULT),
                    'verifKaryawan' => $row['H'],
                    'foto' => $row['I'],
                    'roleId' => $row['J'],
                    'isActive' => $row['K'],
                    'targetTsr' => $row['L'],
                    'hireDate' => $row['M'],
                    'alamat' => $row['N'],
                    'statusKaryawan' => $row['O'],
                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->primaryModel->insert_multiple($data);

        redirect("Admin/Karyawan"); // Redirect ke halaman awal (ke controller fungsi index)
    }
}

/* End of file */
