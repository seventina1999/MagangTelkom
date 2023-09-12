<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TanpaKeterangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('TanpaKeterangan_model');
        $this->load->model('User_model');
        $this->load->model('Magang_model');
        $this->load->model('Divisi_model', 'divisi');
    }
    function index()
    {
        $data['judul'] = "Halaman Tanpa Keterangan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tanpaketerangan'] = $this->TanpaKeterangan_model->get();
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->form_validation->set_rules('id_nama', 'Nama', 'required', ['required' => 'Nama Wajib di isi']);
        $this->form_validation->set_rules('jmlh_hari', 'Jumlah Hari', 'required|numeric', [
            'required' => 'Jumlah Hari Wajib di isi', 'numeric' => 'Jumlah Hari harus angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("tanpa_keterangan/vw_tambah_tanpa_keterangan", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_nama' => $this->input->post('id_nama'),
                'jmlh_hari' => $this->input->post('jmlh_hari')
            ];
            $this->TanpaKeterangan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tanpa Keterangan Berhasil Ditambah!</div>');
            redirect('tanpaketerangan/');
        }
    }

    // function tambah()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['judul'] = "Halaman Tanpa Keterangan";
    //     $data['magang'] = $this->Magang_model->get();
    //     $data['divisi'] = $this->divisi->get();
    //     $this->form_validation->set_rules('id_nama', 'Nama', 'required', ['required' => 'Nama Wajib di isi']);
    //     $this->form_validation->set_rules('jmlh_hari', 'Jumlah Hari', 'required|numeric', [
    //         'required' => 'Jumlah Hari Wajib di isi', 'numeric' => 'Jumlah Hari harus angka'
    //     ]);
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout/header", $data);
    //         $this->load->view("tanpa_keterangan/vw_tambah_tanpa_keterangan", $data);
    //         $this->load->view("layout/footer", $data);
    //     } else {
    //         $data = [
    //             'id_nama' => $this->input->post('id_nama'),
    //             'jmlh_hari' => $this->input->post('jmlh_hari')
    //         ];
    //         $this->TanpaKeterangan_model->insert($data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tanpa Keterangan Berhasil Ditambah!</div>');
    //         redirect('tanpaketerangan/');
    //     }
    // }
    public function divisi($divisi)
    {
        $data['magang'] = $this->divisi->getDashboardByDivisi($divisi);
        $data['divisi'] = $this->divisi->getDashboardByDivisi($divisi);
        $this->load->view("layout/header", $data);
        $this->load->view("magang/vw_magang", $data);
        $this->load->view("layout/footer", $data);
    }
}
