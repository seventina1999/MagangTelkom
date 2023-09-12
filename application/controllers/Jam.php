<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // redirect_if_level_not('Admin');
        $this->load->model('Jam_model', 'jam');
        $this->load->model('Divisi_model', 'divisi');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Waktu Jam Kerja";
        $data['jam'] = $this->jam->get_all();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->load->view('layout/header', $data);
        $this->load->view('jam/jam', $data);
        $this->load->view('layout/footer');
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'masuk' => $post['masuk'],
            'pulang' => $post['pulang']
        ];

        $result = $this->jam->update_data($post['id_jam'], $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Jam Kerja telah diubah!',
                'data' => $this->jam->find($post['id_jam'])
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Jam Kerja gagal diubah!'
            ];
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jam Berhasil Diubah!</div>');
        redirect('jam');
    }

    public function response_json($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
