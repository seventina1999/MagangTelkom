<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Absensi_model extends CI_Model 
{
    // public function get_absen($id_user, $bulan, $tahun)
    // {
    //     $this->db->select("DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, a.waktu AS jam_masuk, (SELECT waktu FROM absensi al WHERE al.tgl = a.tgl AND id_user = '6' AND al.keterangan != a.keterangan) AS jam_pulang");
    //     $this->db->where('id_user', $id_user);
    //     $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
    //     $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
    //     $this->db->group_by("tgl");
    //     $result = $this->db->get('absensi a');
    //     return $result->result_array();
    // }
    public function get_absen($id_user, $bulan, $tahun)
    {
        return $this->db->query("SELECT DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, a.waktu AS jam_masuk,
        (SELECT waktu
        FROM absensi al
        WHERE al.tgl = a.tgl and id_user = $id_user AND al.keterangan != a.keterangan) AS jam_pulang
    FROM absensi a
    WHERE DATE_FORMAT(tgl, '%m') = $bulan
    AND DATE_FORMAT(tgl, '%Y') = $tahun
    AND a.id_user = $id_user
    GROUP BY tgl")->result_array();
    }

    public function absen_harian_user($id_user)
    {
        // $today = date('Y-m-d');
        // $this->db->select('*');
        // $this->db->from('user');
        // $this->db->where('tgl', $today);
        // $this->db->where('id_user', $id_user);
        // return $this->db->get();
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('absensi');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('absensi', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('masuk', $time, '<=');
        $this->db->or_where('pulang', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }

    public function getDashboardByDivisi($id)
    {
        return $this->db->get_where('user', ['id_divisi' => $id])->result_array();
    }

    function divisi_user()
    {
        $this->db->where('user.id_divisi', $this->session->userdata('id_divisi'));
        return $this->db->get('user')->result_array();
    }

    // public function tmasuk($id)
    // {
    //     $date = new DateTime("now");
    //     $c_date = $date->format('Y-m-d');
    //     $this->db->select('*');
    //     $this->db->from('absensi');
    //     $this->db->join ('user', 'absensi.id_user=user.id','left');
    //     $this->db->join ('divisi', 'user.id_divisi=divisi.id','left');
    //     $this->db->where('divisi.id',$id);
    //     $this->db->where('tgl', $c_date);
    //     $this->db->where('keterangan', 'masuk');
    //     $data = $this->db->count_all_results();
    //     return $data;
    // }
    
    // public function tkeluar($id)
    // {
    //     $date = new DateTime("now");
    //     $c_date = $date->format('Y-m-d');
    //     $this->db->select('*');
    //     $this->db->from('absensi');
    //     $this->db->join ('user', 'absensi.id_user=user.id','left');
    //     $this->db->join ('divisi', 'user.id_divisi=divisi.id','left');
    //     $this->db->where('divisi.id',$id);
    //     $this->db->where('tgl', $c_date);
    //     $this->db->where('keterangan', 'pulang');
    //     $data = $this->db->count_all_results();
    //     return $data;
    // }
    public function tmasuk($id)
    {
        return $this->db->query("SELECT COUNT(id_absen) as t_masuk
        FROM absensi 
        JOIN user ON absensi.id_user=user.id
        JOIN divisi ON user.id_divisi=divisi.id
        WHERE tgl = CURDATE() AND divisi.id = $id AND absensi.keterangan = 'Masuk'")->row();
    }

    public function tmasukAdmin()
    {
        return $this->db->query("SELECT COUNT(id_absen) as t_masuk
        FROM absensi 
        JOIN user ON absensi.id_user=user.id
        JOIN divisi ON user.id_divisi=divisi.id
        WHERE tgl = CURDATE() AND absensi.keterangan = 'Masuk'")->row();
    }

    public function tkeluar($id)
    {
        return $this->db->query("SELECT COUNT(id_absen) as t_pulang
        FROM absensi 
        JOIN user ON absensi.id_user=user.id
        JOIN divisi ON user.id_divisi=divisi.id
        WHERE tgl = CURDATE() AND divisi.id = $id AND absensi.keterangan = 'Pulang'")->row();
    }

    public function tkeluarAdmin()
    {
        return $this->db->query("SELECT COUNT(id_absen) as t_pulang
        FROM absensi 
        JOIN user ON absensi.id_user=user.id
        JOIN divisi ON user.id_divisi=divisi.id
        WHERE tgl = CURDATE() AND absensi.keterangan = 'Pulang'")->row();
    }



    // public function tkeluar($id)
    // {
    //     $date = new DateTime("now");
    //     $c_date = $date->format('Y-m-d');
    //     $this->db->select('*');
    //     $this->db->from('absensi');
    //     $this->db->join('user', 'absensi.id_user=user.id', 'left');
    //     $this->db->join('divisi', 'user.id_divisi=divisi.id', 'left');
    //     $this->db->where('tgl', $c_date);
    //     $this->db->where('keterangan', 'pulang');
    //     $data = $this->db->count_all_results();
    //     return $data;
    // }
}