<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Halamanutama_m extends CI_Model
{

    public function popunit()
    {
        $this->db->where('isActive', '1');
        $query = $this->db->get('popunit');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function karyawan()
    {
        $this->db->where('isActive', '1');
        $query = $this->db->get('karyawan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function karyawanActive()
    {
        $this->db->where('verifKaryawan', '1');
        $query = $this->db->get('karyawan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function karyawanNonActive()
    {
        $this->db->where('verifKaryawan', '0');
        $query = $this->db->get('karyawan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function backlogOpen()
    {
        $this->db->where('statusBacklog', '1');
        $query = $this->db->get('backlog1');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function backlogClose()
    {
        $this->db->where('statusBacklog', '2');
        $query = $this->db->get('backlog1');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function getAllDataBacklog()
    {
        $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        return $this->db->get('detail_backlog')->result();
    }

    public function getWo()
    {
        $query = "SELECT COUNT(*) AS total, statusBacklog FROM backlog1
                    GROUP BY statusBacklog ORDER BY statusBacklog DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    function getTopChart()
    {
        $this->db->limit(5);
        $this->db->order_by('detail_backlog.price', 'desc');
        $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');

        $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        $this->db->join('popunit', 'popunit.codeUnit = backlog1.codeUnit', 'left');
        
        return $this->db->get('detail_backlog')->result();
    }

    function totalBacklog()
    {
        $this->db->select_sum('price');
        // $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        $query = $this->db->get('detail_backlog');
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }

    function totalBacklogOpen()
    {
        $this->db->select_sum('price');
        $this->db->where('statusBacklog', '1');
        $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        // $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        $query = $this->db->get('detail_backlog');
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }

    function totalBacklogClose()
    {
        $this->db->select_sum('price');
        $this->db->where('statusBacklog', '2');
        $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        // $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        $query = $this->db->get('detail_backlog');
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }

    function totalPartReady()
    {
        $this->db->select_sum('price');
        $this->db->where('statusPart', '5');
        $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        // $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        $query = $this->db->get('detail_backlog');
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }

    function totalPartWaiting()
    {
        $this->db->select_sum('price');
        $this->db->where('statusPart', '2');
        $this->db->join('backlog1', 'backlog1.idBacklog = detail_backlog.idBacklog', 'left');
        // $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        $query = $this->db->get('detail_backlog');
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }
}

/* End of file */
