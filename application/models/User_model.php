<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id';
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBy()
    {
        $this->db->from($this->table);
        $this->db->where('email', $this->session->userdata('email'));
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function tuser()
    {
        $query = $this->db->query("SELECT id FROM user WHERE role= 'User'");
        return $query->num_rows();
    }
    function showDivisi()
    {
        $this->db->select('*');
        $this->db->select('(select count(id_divisi) from user where user.id_divisi = divisi.id) as rowpk');
        $this->db->from('user');
        $this->db->join('divisi', 'divisi.id = user.id_divisi', 'left');
        return $this->db->get();
    }

    public function get_count()
    {
        return $this->db->query(" SELECT u1.nama AS nama, 
        (SELECT COUNT(user.id_divisi) 
        FROM user
        JOIN divisi ON user.id_divisi = divisi.id
        WHERE u1.id = divisi.id and user.role = 'User') AS jumlah,
        (SELECT COUNT(id_absen)
        FROM absensi 
        JOIN user ON absensi.id_user=user.id
        JOIN divisi ON user.id_divisi=divisi.id
        WHERE tgl = CURDATE() AND absensi.keterangan = 'Masuk' AND u1.id = divisi.id) as t_masuk,
        (SELECT COUNT(id_absen)
        FROM absensi 
        JOIN user ON absensi.id_user=user.id
        JOIN divisi ON user.id_divisi=divisi.id
        WHERE tgl = CURDATE() AND absensi.keterangan = 'Pulang' AND u1.id = divisi.id) as t_pulang
FROM divisi u1
GROUP BY u1.nama")->result_array();
    }
}
