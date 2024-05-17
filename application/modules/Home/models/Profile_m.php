<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_m extends CI_Model
{

    public $namaTable = 'karyawan';
    public $pk = 'idKaryawan';


    function getAllDataByNrp()
    {
        $this->db->where('nrp', $this->session->userdata("nrp"));
        $this->db->join('section', 'section.idSection = karyawan.idSection', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = karyawan.idJabatan', 'left');
        
        return $this->db->get('karyawan')->row();
    }

    function getDataById()
    {
        $this->db->where('nrp', $this->session->userdata("nrp"));
        $this->db->join('section', 'section.idSection = karyawan.idSection', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = karyawan.idJabatan', 'left');
        
        return $this->db->get('karyawan')->row();
    }

    function update($Value, $foto)
    {
        $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        if (empty($foto) && empty($pass)) :
            $object = [
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
                'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
                'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
                'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
                'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
                'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
                'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
                'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
                'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
            ];
        elseif (empty($foto) && !empty($pass)) :
            $object = [

                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
                'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
                'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
                'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
                'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
                'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
                'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
                'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
                'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            ];
        elseif (!empty($foto) && empty($pass)) :
            $object = [


                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
                'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
                'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
                'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
                'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
                'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
                'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
                'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
                'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'foto' => $foto,

            ];
        else :
            $object = [

                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'nrp' => htmlspecialchars($this->input->post('nrp', TRUE)),
                'namaKaryawan' => htmlspecialchars($this->input->post('namaKaryawan', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'tglLahir' => htmlspecialchars($this->input->post('tglLahir', TRUE)),
                'employeeType' => htmlspecialchars($this->input->post('employeeType', TRUE)),
                'idSite' => htmlspecialchars($this->input->post('idSite', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'idJabatan' => htmlspecialchars($this->input->post('idJabatan', TRUE)),
                'idGolongan' => htmlspecialchars($this->input->post('idGolongan', TRUE)),
                'idSection' => htmlspecialchars($this->input->post('idSection', TRUE)),
                'statusKaryawan' => htmlspecialchars($this->input->post('statusKaryawan', TRUE)),
                'hireDate' => htmlspecialchars($this->input->post('hireDate', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'poh' => htmlspecialchars($this->input->post('poh', TRUE)),
                'targetTsr' => htmlspecialchars($this->input->post('targetTsr', TRUE)),
                'noTelp' => htmlspecialchars(str_replace('-', '', $this->input->post('noTelp', TRUE))),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'foto' => $foto,

            ];
        endif;
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
    }
}

/* End of file Profile_m.php */
