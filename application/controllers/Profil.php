<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in2();
        $this->load->model('User_model');
        $this->load->model('Magang_model');
        $this->load->model('Divisi_model', 'divisi');
    }
    public function index()
    {
        $data['title'] = "Profil";
        $data['user'] = $this->User_model->getBy();
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->load->view('layout/header', $data);
        $this->load->view('profil/vw_profil', $data);
        $this->load->view('layout/footer', $data);
    }
    public function ubahpassword()
    {
        $data['judul'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/ubah_password", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Password lama salah!
          </div>');
                redirect('profil/ubahpassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Password Baru tidak sama!
          </div>');
                    redirect('profil/ubahpassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil Diubah!
                   </div>');
                    redirect('profil');
                }
            }
        }
    }
    
    public function editprofil($id)
    {
        $data['judul'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->form_validation->set_rules('username', 'Nama magang', 'required');

        $this->form_validation->set_rules('username', 'Nama User', 'required', [
            'required' => 'Nama User Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('status_pendidikan', 'Status Pendidikan', 'required', [
            'required' => 'Status Pendidikan Wajib di isi'
        ]);
        $this->form_validation->set_rules('sekolah', 'Asal Sekolah', 'required', [
            'required' => 'Asal Sekolah Wajib di isi'
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', [
            'required' => 'Jurusan Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|numeric', [
            'required' => 'Nomor Handphone Wajib di isi',
            'numeric' => 'Nomor Handphone Wajib Angka'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("profil/edit_profil", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'status_pendidikan' => $this->input->post('status_pendidikan'),
                'sekolah' => $this->input->post('sekolah'),
                'jurusan' => $this->input->post('jurusan'),
                'id_divisi' => $this->input->post('id_divisi'),
                'awal_magang' => $this->input->post('awal_magang'),
                'akhir_magang' => $this->input->post('akhir_magang'),
                'no_hp' => $this->input->post('no_hp'),
            ];

            $id = $this->input->post('id');
            $this->User_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Berhasil Diubah!</div>');
            redirect('profil');
        }
    }
    public function update_foto()
    {
        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '4000';
            $config['upload_path'] = './assets/img/magang/';
            $config['file_name'] = round(microtime(date('dY')));
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $query = $this->db->set('gambar', $new_image);
                if ($query) {
                    $old_image = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
                    unlink(FCPATH . 'assets/img/magang/' . $old_image['gambar']);
                }
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data_foto = $this->upload->data();
        $data['gambar'] = $data_foto['file_name'];
        $id = $this->session->userdata('id');
        $result = $this->User_model->update(['id' => $id], $data);

        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Foto Profil berhasil diubah!'
            ];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Berhasil Diubah!</div>');
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Foto Profil gagal diubah!'
            ];
            
        }
        redirect('profil');
        // return $this->response_json($response);
    }


    public function divisi($divisi)
    {
        $data['magang'] = $this->divisi->getDashboardByDivisi($divisi);
        $data['divisi'] = $this->divisi->getDashboardByDivisi($divisi);
        $this->load->view("layout/header", $data);
        $this->load->view("magang/vw_magang", $data);
        $this->load->view("layout/footer", $data);
    }
    public function response_json($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
