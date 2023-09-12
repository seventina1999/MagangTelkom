<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanAbsensi_model extends CI_Model
{
    public $table = 'user';
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->query("SELECT u1.username, divisi.nama AS divisi,
        (SELECT COUNT(absensi.id_absen) 
        FROM absensi
        JOIN user ON absensi.id_user = user.id
        WHERE absensi.keterangan = 'Pulang' and u1.id = user.id) AS total_kehadiran,
            (SELECT COALESCE(SUM(cutiijin.lama_waktu),0)
            FROM cutiijin
            JOIN user ON cutiijin.id_nama = user.id
            WHERE cutiijin.status = 'Diterima' and u1.id = user.id) AS cutiijin,
                (SELECT COALESCE(SUM(tanpaketerangan.jmlh_hari),0)
                FROM tanpaketerangan
                JOIN user ON tanpaketerangan.id_nama = user.id
                WHERE u1.id = user.id) AS tanpaketerangan,
                    (SELECT COUNT(absensi.id_absen) 
    			    FROM absensi
    			    JOIN user ON absensi.id_user = user.id
    			    WHERE absensi.keterangan = 'Masuk' and absensi.waktu >= '08:15:00' and u1.id = user.id) AS telat
    FROM user u1, divisi
    WHERE u1.role = 'User' and divisi.id = u1.id_divisi
    GROUP BY u1.username")->result_array();
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
}
