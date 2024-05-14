<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_m extends CI_Model
{
    function getAllDataByNrp()
    {
        $this->db->where('nrp', $this->session->userdata("nrp"));
        $this->db->join('section', 'section.idSection = karyawan.idSection', 'left');
        $this->db->join('jabatan', 'jabatan.idJabatan = karyawan.idJabatan', 'left');
        
        return $this->db->get('karyawan')->row();
    }
}

/* End of file Profile_m.php */
