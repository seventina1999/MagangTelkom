<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'userrole');
        $this->load->model('Divisi_model', 'divisi');
    }


    function index()
    {
        $data['divisi'] = $this->divisi->get();
        if ($this->session->userdata('email')) {
            redirect('Dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/auth_header.php");
            $this->load->view("auth/login");
            $this->load->view("layout/auth_footer.php");
        } else {
            $this->cek_login();
        }
    }

    // function registrasi()
    // {
    //     $this->load->view("layout/auth_header.php");
    //     $this->load->view("auth/registrasi");
    //     $this->load->view("layout/auth_footer.php");
    // }

    function registrasi()
    {
        $data['divisi'] = $this->divisi->get();
        if ($this->session->userdata('email')) {
            redirect('Dashboard');
        }
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('layout/auth_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_divisi' => htmlspecialchars($this->input->post('id_divisi', true)),
                'gambar' => 'default.jpg',
                'role' => "User",
                'status' => "Active",
                'date_created' => time()
            ];

            $this->userrole->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat!  Akunmu telah berhasil terdaftar, Silahkan Login! </div>');
            redirect('/auth');
        }
    }

    // function cek_regis()
    // {
    //     $data = [
    //         'nama' => htmlspecialchars($this->input->post('nama', true)),
    //         'email' => htmlspecialchars($this->input->post('email', true)),
    //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //         'gambar' => 'default.jpg',
    //         'role' => "User",
    //         'date_created' => time()
    //     ];
    //     $this->userrole->insert($data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akunmu telah berhasil terdaftar, Silahkan Login!</div>');
    //     redirect('auth');
    // }

    function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'id_divisi' => $user['id_divisi'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                ];
                if ($user['status'] == "Active") {
                    $this->session->set_userdata($data);
                    if ($user['role'] == 'User') {
                        redirect('absensi/check_absen');
                    } else {
                        redirect('Dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Ini Tidak Aktif!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-dager" role="alert">Password Salah! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Belum Terdaftar!</div>');
            redirect('auth');
        }
    }
    public function set_session($user)
    {
        $this->load->model('Absensi_model', 'absensi');
        $this->session->set_userdata([
            'id' => $user->id,
            'username' => $user->username,
            'gambar' => $user->gambar,
            'id_divisi' => $user->id_divisi,
            'role' => $user->role,
            'is_login' => true
        ]);

        if ($user['role'] == 'User') {
            $time = date('H:i:s');
            $absen = $this->absensi->absen_harian_user($user->id_user);
            $absen_hari_ini = $absen->num_rows();

            if ($absen_hari_ini < 2) {
                $keterangan = '';
                if ($absen_hari_ini == 1) {
                    $keterangan = 'pulang';
                } else if ($absen_hari_ini == 0) {
                    $keterangan = 'masuk';
                }

                $this->session->set_flashdata('absen_needed', [
                    'href' => base_url('absensi/check_absen/'),
                    'message' => 'Anda belum melakukan absensi'
                ]);
            }
            $this->session->set_flashdata('response', [
                'status' => 'success',
                'message' => 'Selamat Datang ' . $user->nama
            ]);
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('welcome');
    }
}
