<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_m', 'primaryModel');
        $this->load->library('form_validation');
    }


    public function index()
    {
        // $data['fakultas'] = $this->primaryModel->fakultas();
        $this->load->view('Register/Add');
    }

    public function add_action()
    {
        // $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[mahasiswa.email]');
        $this->form_validation->set_rules('nrp', 'nrp', 'trim|required|is_unique[karyawan.nrp]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->primaryModel->save();
            redirect('Auth/Login');
        }
    }

    public function ajaxProdi()
    {
        $f = $_GET['fakultas'];
        $this->db->where('fakultasId', $f);
        $data = $this->db->get('prodi')->result();
        echo '<div class="form-group">';
        echo '<label for="validationCustom01" class="form-control-label">Study Program</label>';
        echo '<div class="input-group input-group-merge">';
        echo '<select name="prodi" required class="form-control">';
        echo '<option>Pilih Prodi</option>';
        foreach ($data as $p) :

            echo '<option value="' . $p->idProdi . '">' . $p->prodi . ' - ' . $p->ket . '</option>';
        endforeach;
        echo '</select>';
        echo '</div>';
        echo '</div>';
    }
}

/* End of file register.php */
