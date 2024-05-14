<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_m');
        $this->load->model('User_m');
    }

    public function index()
    {
        $this->load->view('Login/list');
    }

    public function logon()
    {
        $nrp = $this->input->post('nrp', TRUE);
        $password = $this->input->post('password', TRUE);
        if (!empty($user = $this->Register_m->getByNrp($nrp))) :
            $user = $this->Register_m->getByNrp($nrp);
        elseif (!empty($user = $this->User_m->getAllData($nrp))) :
            $user = $this->User_m->getAllData($nrp);
        endif;

        if ($user) :
            if ($user->isActive == 1) :
                if (password_verify($password, $user->password)) :
                    //Karyawan
                    if ($user->roleId == 1) :
                        $data = [
                            'idKaryawan' => $user->idKaryawan,
                            'nrp' => $user->nrp,
                            'namaKaryawan' => $user->namaKaryawan,
                            'namaJabatan' => $user->namaJabatan,
                            'idSection' => $user->idSection,
                            'namaSection' => $user->namaSection,
                            'foto' => $user->foto,
                            'roleId' => $user->roleId,
                            'verifKaryawan' => $user->verifKaryawan,
                        ];
                        $this->session->set_userdata($data);
                        redirect('Home/Profile');
                        //Pengelola plant hrs
                    elseif ($user->roleId == 2) :
                        $data = [
                            'idUser' => $user->idUser,
                            'nama' => $user->nama,
                            'username' => $user->username,
                            'roleId' => $user->roleId,
                            'foto' => $user->foto,
                            'accessUser' => $user->accessUser,
                        ];
                        $this->session->set_userdata($data);
                        redirect('Dashboard/Halamanutama');
                    else :
                        redirect('Home/Profile');
                    endif;
                else :
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
                    redirect('Auth/Login');
                endif;
            else :
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Akun Anda Belum Aktif!</div>');
                redirect('Auth/Login');
            endif;
        else :
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email Tidak terdaftar. Silahkan Sign Up</div>');
            redirect('Auth/Login');
        endif;
    }
}

/* End of file Login.php */
