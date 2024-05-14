<?php
function ci()
{
    $ci = &get_instance();
    return $ci;
}

function nim()
{
    return ci()->session->userdata('nim');
}

function getDataSurat()
{
    ci()->db->where('nim', nim());

    $data =  ci()->db->get('surat')->result();
    return $data;
}

function num_sidang_proposal()
{
    ci()->db->where('nim', nim());
    ci()->db->where('jenisSidang', '1');
    return ci()->db->get('sidang')->num_rows();
}

function getDataSidang()
{
    ci()->db->where('nim', nim());
    return ci()->db->get('sidang')->result();
}
