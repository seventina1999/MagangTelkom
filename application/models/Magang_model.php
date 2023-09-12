<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Magang_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        return $this->db->query("SELECT * FROM user WHERE user.role = 'User'")->result_array();
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
        $this->db->where('user.id_divisi', $this->session->userdata('id_divisi'));
        $this->db->where('user.id  != ', $this->session->userdata('id'));
        return $this->db->get('user')->result_array();
    }
    public function update_status_model($id, $status)
    {
        //here we will change the value of the status that if we get the value one of the status then zero is updated in database otherwise one.
        if ($status == 'Active') {
            $sval = 'Inactive';
        } else {
            $sval = 'Active';
        }
        // update status value in database 
        $data = array('status' => $sval);
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }
}
