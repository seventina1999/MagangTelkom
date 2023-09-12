<?php

use Dompdf\Dompdf;

class CutiIjin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cutiijin_model');
        $this->load->model('Magang_model');
        $this->load->model('User_model');
        $this->load->model('Divisi_model', 'divisi');
    }
    function index()
    {
        $data['title'] = "Cuti/Ijin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama_user'] = $this->Cutiijin_model->findByiduser($this->session->userdata('id'));
        $data['cutiijin'] = $this->Cutiijin_model->get();
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->load->view("layout/header", $data);
        $this->load->view("cutiijin/vw_cutiijin", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman Tambah Cuti/Ijin";
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->form_validation->set_rules('id_divisi', 'Nama Divisi', 'required', ['required' => 'Nama Divisi wajib di isi']);
        $this->form_validation->set_rules('tipe', 'Tipe Cuti/Ijin', 'required', ['required' => 'Tipe Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('keterangan', 'Keterangan Cuti/Ijin', 'required', ['required' => 'Keterangan Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('awl_tgl', 'Awal Cuti/Ijin', 'required', ['required' => 'Awal Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('akhir_tgl', 'Akhir Cuti/Ijin', 'required', ['required' => 'Akhir Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('lama_waktu', 'Lama Cuti/Ijin', 'required', ['required' => 'Lama Cuti/Ijin wajib di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("cutiijin/vw_tambahcutiijin", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_nama' => $this->input->post('id_nama'),
                'id_divisi' => $this->input->post('id_divisi'),
                'tipe' => $this->input->post('tipe'),
                'keterangan' => $this->input->post('keterangan'),
                'awl_tgl' => $this->input->post('awl_tgl'),
                'akhir_tgl' => $this->input->post('akhir_tgl'),
                'lama_waktu' => $this->input->post('lama_waktu'),
                'status' => 'Diterima'
            ];
            $this->Cutiijin_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Cuti/Ijin Berhasil Ditambah!</div>');
            redirect('cutiijin/');
        }
    }
}
