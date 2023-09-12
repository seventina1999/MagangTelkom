<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    } else {
        $role = $ci->session->userdata('role');
        if ($role != "Admin") {
            redirect('Absensi/cek_absen');
        }
    }
}

function is_logged_in2()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    } else {
        $role = $ci->session->userdata('role');
        if ($role != "User") {
            redirect('Dashboard');
        }
    }
}

function is_it()
{
    $CI = &get_instance();

    $tipeuser  = $CI->session->role;

    if ($tipeuser == 'Admin') {
        return $tipeuser;
    }
    return null;
}
