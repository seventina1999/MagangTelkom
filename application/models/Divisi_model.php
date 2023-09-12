<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Divisi_model extends CI_Model
{
    public $table = 'divisi';
    public $id = 'divisi.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
        return $this->db->get('divisi')->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where,$data)
    {
        $this->db->update($this->table,$data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function tdivisi()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getBySlug($slug)
    {
        return $this->db->get_where('divisi',['slug' => $slug]) -> row_array();
    }
    public function getDivisi($id)
    {
        return $this->db->get_where('divisi',['id' => $id])->row_array();
    }
    public function getAllDivisi()
    {
        return $this->db->get('divisi')->result_array();
    }
    public function getDivisiByName($name)
    {
        return $this->db->get_where('divisi',['nama' =>$name])->row_array();
    }
    
}