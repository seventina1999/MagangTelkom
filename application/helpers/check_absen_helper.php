<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function check_absen_harian()
{
    $CI =& get_instance();
    $id_user = $CI->session->id;
    $CI->load->model('Absensi_model', 'absensi');
    $absen_user = $CI->absensi->absen_harian_user($id_user)->num_rows();
    if (!is_weekend()) {
        if ($absen_user < 2) {
            $CI->session->set_user('absen_warning', 'true');
        } else {
            $CI->session->set_user('absen_warning', 'false');
        }
    }
}

function check_jam($jam, $status, $raw = false)
{
    if ($jam) {
        $status = ucfirst($status);
        $CI =& get_instance();
        $CI->load->model('Jam_model', 'jam');
        $jam_kerja = $CI->jam->db->where('keterangan', $status)->get('jam')->row();

        if ($status == 'Masuk' && $jam > $jam_kerja->pulang) {
            if ($raw) {
                return [
                    'status' => 'telat',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-danger"> Telat </span>';
            }
        } elseif ($status == 'Pulang' && $jam > $jam_kerja->pulang) {
            if ($raw) {
                return [
                    'status' => 'lembur',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-success"> Lembur </span>';
            }
        }elseif ($status == 'Pulang' && $jam < $jam_kerja->masuk) {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => 'Tidak Hadir'
                ];
            } else {
                return 'Tidak Hadir';
            }
        } else {
            if ($raw) {
                return [
                    'status' => 'normal',
                    'text' => $jam
                ];
            } else {
                return '<span class="badge badge-primary">' . $jam . '</span>';
            }
        }
    } else {
        if ($raw) {
            return [
                'status' => 'normal',
                'text' => 'Tidak Hadir'
            ];
        }
        return 'Tidak Hadir';
    }
}

function is_weekend($tgl = false)
{
    $tgl = @$tgl ? $tgl : date('d-m-Y');
    return in_array(date('l', strtotime($tgl)), ['Saturday','Sunday']);
}