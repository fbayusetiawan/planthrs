<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    function getAllData($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get('user')->row();
    }
}

/* End of file User_m.php */
