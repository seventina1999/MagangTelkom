<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Magang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model("Magang_model");
        $this->load->model('User_model');
        $this->load->model('Divisi_model', 'divisi');
    }
    function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman magang";
        $data['divisi_user'] = $this->Magang_model->divisi_user();
        $data['magang'] = $this->Magang_model->get();
        $data['userdata'] = $this->User_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->load->view("layout/header", $data);
        $this->load->view("magang/vw_magang", $data);
        $this->load->view("layout/footer", $data);
    }
    function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman Tambah magang";
        $data['magang'] = $this->Magang_model->get();
        $data['userdata'] = $this->User_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->form_validation->set_rules('username', 'Nama magang', 'required');
        $this->form_validation->set_rules('status_pendidikan', 'status_pendidikan', 'required');
        $this->form_validation->set_rules('sekolah', 'sekolah', 'required');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required');
        $this->form_validation->set_rules('id_divisi', 'id_divisi', 'required');
        $this->form_validation->set_rules('awal_magang', 'awal_magang', 'required');
        $this->form_validation->set_rules('akhir_magang', 'akhir_magang', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("magang/vw_tambah_magang", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'id_divisi' => $this->input->post('id_divisi'),
                'username' => $this->input->post('username'),
                'status_pendidikan' => $this->input->post('status_pendidikan'),
                'sekolah' => $this->input->post('sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'awal_magang' => $this->input->post('awal_magang'),
                'akhir_magang' => $this->input->post('akhir_magang'),
                'no_hp' => $this->input->post('no_hp'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/magang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Magang_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
                    Magang Berhasil Ditambah!</div>');
            redirect('magang');
        }
    }
    function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman Detail magang";
        $data['magang'] = $this->Magang_model->getById($id);
        $data['userdata'] = $this->User_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->load->view("layout/header", $data);
        $this->load->view("magang/vw_detail_magang", $data);
        $this->load->view("layout/footer", $data);
    }
    function hapus($id)
    {
        $this->Magang_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
        role="alert"><i class="icon fas fa-info-circle"></i> Data tidak dapat di hapus(sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
        role="alert"><i class="icon fas fa-check-circle"></i> Data magang Berhasil Dihapus!</div>');
        }
        redirect('magang');
    }
    function upload()
    {
        $data = [
            'username' => $this->input->post('username'),
            'status_pendidikan' => $this->input->post('status_pendidikan'),
            'sekolah' => $this->input->post('sekolah'),
            'jurusan' => $this->input->post('jurusan'),
            'id_divisi' => $this->input->post('id_divisi'),
            'awal_magang' => $this->input->post('awal_magang'),
            'akhir_magang' => $this->input->post('akhir_magang'),
            'no_hp' => $this->input->post('no_hp'),
        ];
        $this->Magang_model->insert($data);
        redirect('magang');
    }
    function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman Edit magang";
        $data['magang'] = $this->Magang_model->getById($id);
        $data['userdata'] = $this->User_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->form_validation->set_rules('username', 'Nama magang', 'required');
        $this->form_validation->set_rules('status_pendidikan', 'status_pendidikan', 'required');
        $this->form_validation->set_rules('sekolah', 'sekolah', 'required');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required');
        $this->form_validation->set_rules('id_divisi', 'id_divisi', 'required');
        $this->form_validation->set_rules('awal_magang', 'awal_magang', 'required');
        $this->form_validation->set_rules('akhir_magang', 'akhir_magang', 'required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("magang/vw_ubah_magang", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'status_pendidikan' => $this->input->post('status_pendidikan'),
                'sekolah' => $this->input->post('sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'id_divisi' => $this->input->post('id_divisi'),
                'awal_magang' => $this->input->post('awal_magang'),
                'akhir_magang' => $this->input->post('akhir_magang'),
                'no_hp' => $this->input->post('no_hp'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '4000';
                $config['upload_path'] = './assets/img/magang/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $query = $this->db->set('gambar', $new_image);
                    if ($query) {
                        $old_image = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
                        unlink(FCPATH . 'assets/img/magang/' . $old_image->gambar);
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Magang_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
                magang Berhasil Diubah!</div>');
            redirect('magang');
        }
    }
    public function divisi($divisi)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['magang'] = $this->divisi->getDashboardByDivisi($divisi);
        $data['divisi'] = $this->divisi->getDashboardByDivisi($divisi);
        $this->load->view("layout/header", $data);
        $this->load->view("magang/vw_magang", $data);
        $this->load->view("layout/footer", $data);
    }
    public function update_status($id, $status)
    {
        $this->load->model('Magang_model', 'userdata');

        //send id and status to the model to update the status
        if ($this->userdata->update_status_model($id, $status)) {
            $this->session->set_flashdata('msg', 'User status has been updated successfully!');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'User status has not been updated successfully!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }
        return redirect('magang');
    }
}
