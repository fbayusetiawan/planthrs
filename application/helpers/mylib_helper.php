<?php

use phpDocumentor\Reflection\Types\Boolean;

function dd($val)
{
    var_dump($val);
    die;
}

function callTable($table)
{
    $ci = &get_instance();
    $data = $ci->db->get($table);
    return $data;
}

function fd_statusEmployee($val = null)
{
    $option = [
        '1' => 'Permanen',
        '2' => 'Kontrak',
        '3' => 'Resign',
        '4' => 'Mutasi',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}
function fd_karyawan($val = null)
{
    $option = [
        '1' => 'Staff',
        '2' => 'Non-Staff',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}
function fd_kondisiTools($val = null)
{
    $option = [
        '1' => 'Good',
        '2' => 'Bad',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_statusTools($val = null)
{
    $option = [
        '1' => '<span class="badge badge-danger">OPEN</span>',
        '2' => '<span class="badge badge-success">CLOSE</span>',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_statusBacklog($val = null)
{
    $option = [
        '1' => '<span class="badge badge-danger">Open</span>',
        '2' => '<span class="badge badge-primary">Close</span>',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_statusVerif($val = null)
{
    $option = [
        '1' => '<span class="badge badge-danger">Belum diverifikasi</span>',
        '2' => '<span class="badge badge-primary">Diverifikasi Group Leader</span>',
        '3' => '<span class="badge badge-primary">Diverifikasi Group Leader</span></br><span class="badge badge-primary">Diverifikasi Section Head</span>',
        '4' => '<span class="badge badge-primary">Diverifikasi Group Leader</span></br><span class="badge badge-primary">Diverifikasi Section Head</span></br><span class="badge badge-primary">Diverifikasi Planner</span>',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_statusTemuan($val = null)
{
    $option = [
        '1' => '<span class="badge badge-danger">Urgent Action Required</span>',
        '2' => '<span class="badge badge-warning">Action Required</span>',
        '3' => '<span class="badge badge-info">Monitor Component</span>',
        '4' => '<span class="badge badge-primary">No Action Required</span>',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_statusPart($val = null)
{
    $option = [
        '1' => '<span class="badge badge-danger">OPEN</span>',
        '2' => '<span class="badge badge-danger">WAITING PART</span>',
        '3' => '<span class="badge badge-warning">SUPPLY</span>',
        '4' => '<span class="badge badge-secondary">CANCEL</span>',
        '5' => '<span class="badge badge-success">PART READY</span>',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}
function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function noOtomatis($field, $as, $table)
{
    $ci = &get_instance();
    $sql = "SELECT MAX($field) as $as FROM $table";
    $result = $ci->db->query($sql)->row();
    $noUrut = $result->$as + 1;
    $kode = sprintf("%04s", $noUrut);
    return $kode;
}
function noOtomatisWhere($field, $as, $table, $where, $where_value)
{
    $ci = &get_instance();
    $sql = "SELECT MAX($field) as $as FROM $table WHERE $where ='$where_value'";
    $result = $ci->db->query($sql)->row();
    if (empty($result->$as)) :
        $noUrut = 0 + 1;
    else :
        $noUrut = $result->$as + 1;
    endif;
    $kode = sprintf("%03s", $noUrut);

    return $kode;
}


function karyawan()
{
    $ci = &get_instance();
    $ci->db->join('section', 'section.idSection = karyawan.idSection', 'left');
    $ci->db->join('jabatan', 'jabatan.idJabatan = karyawan.idJabatan', 'left');
    $data = $ci->db->get('karyawan')->result();
    return $data;
}

function tools()
{
    $ci = &get_instance();
    // $ci->db->join('poptools', 'poptools.idTools = toolkeeper.idTools', 'left');
    $data = $ci->db->get('poptools')->result();
    return $data;
}

function soh()
{
    $ci = &get_instance();
    // $ci->db->join('poptools', 'poptools.idTools = toolkeeper.idTools', 'left');
    $data = $ci->db->get('soh')->result();
    return $data;
}

function popunit()
{
    $ci = &get_instance();
    $ci->db->join('unit_manufacture', 'unit_manufacture.idUnitManufacture = popunit.idUnitManufacture', 'left');
    $ci->db->join('section', 'section.idSection = popunit.idSection', 'left');
    $ci->db->join('unit_model', 'unit_model.idUnitModel = popunit.idUnitModel', 'left');
    $ci->db->order_by('popunit.idSection', 'Asc');
    $data = $ci->db->get('popunit')->result();
    return $data;
}

function tsr_pekerjaan()
{
    $ci = &get_instance();
    $data = $ci->db->get('tsr_pekerjaan')->result();
    return $data;
}


function getActivity()
{
    $ci = get_instance();
    $ci->db->order_by('createTime', 'desc');
    $ci->db->where('nim', $ci->session->userdata('nim'));
    $data = $ci->db->get('activity')->result();
    if (empty($data)) :
    else :
        return $data;
    endif;
}


function fd_jk($val = null)
{
    $option = [
        '1' => 'Laki-Laki',
        '2' => 'Perempuan',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_temuan($val = null)
{
    $option = [
        '1' => 'Periodical Service',
        '2' => 'Daily Maintenance (DM)',
        '3' => 'Periodic Inspection',
        '4' => 'Condition Monitoring (PPM, PPU, PAP)',
        '5' => 'Unschedule BD',
        '6' => 'Others',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_poh($val = null)
{
    $option = [
        'Lokal' => 'Lokal',
        'Non-Lokal' => 'Non-Lokal',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function fd_agama($val = null)
{
    $option = [
        '1' => 'Islam',
        '2' => 'Kristen',
        '3' => 'Protestan',
        '4' => 'Katolik',
        '5' => 'Hindu',
        '6' => 'Buddha',
        '7' => 'Konghucu',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function check($id, $idMenu)
{
    $ci = &get_instance();
    $chek = $ci->db->query("SELECT * FROM menu_main WHERE idMenu in(SELECT idMenu FROM menu_rule WHERE idUser='$id') and idMenu='$idMenu'")->num_rows();
    if ($chek > 0) :
        $checked = "checked";
    else :
        $checked = "";
    endif;
    return $checked;
}

function getRules($link)
{
    $ci = &get_instance();
    $ci->db->where('link', $link);
    $rule = $ci->db->get('menu_main')->row();
    $ci->db->where('idUser', $ci->session->userdata('idUser'));
    $ci->db->where('idMenu', $rule->idMenu);
    return $ci->db->get('menu_rule')->num_rows();
}

function validation_page($roleID, $link)
{
    $ci = &get_instance();

    if ($ci->session->userdata('roleId')) :
        if ($ci->session->userdata('roleId') == $roleID) :
            if (getRules($link) == '1') :
            else :
                redirect(base_url(''));
                exit;
            endif;
        else :
            $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login sebagai Administrator!</div>');
            redirect(base_url(''));
            exit;
        endif;
    else :
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sesi Anda telah habis, Silahkan login ulang!</div>');
        redirect(base_url(''));
        exit;
    endif;
}

function validation_user()
{
    $ci = &get_instance();
    if ($ci->session->userdata('roleId')) :
        if ($ci->session->userdata('roleId') == '1') :
        else :
            $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login sebagai Mahasiswa!</div>');
            redirect(base_url(''));
            exit;
        endif;
    else :
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sesi Anda telah habis, Silahkan login ulang!</div>');
        redirect(base_url(''));
        exit;
    endif;
}

function getNumRowJudul()
{
    $ci = &get_instance();
    $ci->db->where('nim', $ci->session->userdata('nim'));
    return $ci->db->get('judul')->num_rows();
}

// 0 to 62
function hp($nohp)
{
    // kadang ada penulisan no hp 0811 239 345
    $nohp = str_replace(" ", "", $nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace("(", "", $nohp);
    // kadang ada penulisan no hp (0274) 778787
    $nohp = str_replace(")", "", $nohp);
    // kadang ada penulisan no hp 0811.239.345
    $nohp = str_replace(".", "", $nohp);

    // cek apakah no hp mengandung karakter + dan 0-9
    if (!preg_match('/[^+0-9]/', trim($nohp))) {
        // cek apakah no hp karakter 1-3 adalah +62
        if (substr(trim($nohp), 0, 2) == '62') {
            $hp = trim($nohp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif (substr(trim($nohp), 0, 1) == '0') {
            $hp = '62' . substr(trim($nohp), 1);
        }
    }
    print $hp;
}
