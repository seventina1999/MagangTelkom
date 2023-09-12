<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanCutiIjin_model extends CI_Model
{
    public $table = 'cutiijin';
    public $id = 'cutiijin.id';
    public function __construct()
    {
        parent::__construct();
    }

    public function get_bulan($bulan)
    {
        return $this->db->query("SELECT * FROM `cutiijin` WHERE MONTH(akhir_tgl) = $bulan ORDER BY DAY(akhir_tgl)")->result_array();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function tmagang()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getDashboardByDivisi($id)
    {
        return $this->db->get_where('user', ['id_divisi' => $id])->result_array();
    }
    function divisi_user()
    {
        $this->db->where('cutiijin.id_divisi', $this->session->userdata('id_divisi'));
        return $this->db->get('cutiijin')->result_array();
    }
}