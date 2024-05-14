<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Popunit extends CI_Controller
{

    private $filename = "Import_data";
    public function __construct()
    {
        parent::__construct();
        // validation_page('3', 'Admin/Karyawan');
        $this->load->model('Popunit_m', 'primaryModel');
    }
    public $titles = 'Populasi Unit';
    public $vn = 'Popunit';

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
        redirect('Datamaster/' . $this->vn);
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
        redirect('Datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('Datamaster/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/fotounit/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('fotoUnit');
        $upload = $this->upload->data();
        return $upload['file_name'];
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
                    'idPopunit' => $row['A'],
                    'idSection' => $row['B'],
                    'idUnitActivity' => $row['C'],
                    'idUnitType' => $row['D'],
                    'idUnitManufacture' => $row['E'],
                    'codeUnit' => $row['F'],
                    'idUnitModel' => $row['G'],
                    'snvin' => $row['H'],
                    'engineModel' => $row['I'],
                    'esn' => $row['J'],
                    'hmUpdate' => $row['K'],
                    'deliveryUnit' => $row['L'],
                    'deliveryToAgm' => $row['M'],
                    'fotoUnit' => $row['N'],
                    'location' => $row['O'],
                    'isActive' => $row['P'],
                ));
            }

            $numrow++; // Tambah 1 setiap kali looping
        }
        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->primaryModel->insert_multiple($data);

        redirect("Datamaster/Popunit"); // Redirect ke halaman awal (ke controller fungsi index)
    }
}

/* End of file */
