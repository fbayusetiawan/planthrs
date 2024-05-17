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
        $data = $this->db->select('*')
            ->from('order_items,SUM(qty) as total_qty')
            ->order_by('total_qty', 'desc')
            ->limit(5)
            ->group_by('product_id')
            ->get()->result_array();
    }

    function totalBacklog()
    {
        $this->db->select_sum('price');
        // $this->db->join('soh', 'soh.idPart = detail_backlog.idPart', 'left');
        $query = $this->db->get('soh');
        if ($query->num_rows() > 0) {
            return $query->row()->price;
        } else {
            return 0;
        }
    }
}

/* End of file */
