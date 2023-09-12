<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//is_logged_in();
		$this->load->model('Magang_model');
		$this->load->model('Divisi_model', 'divisi');
		$this->load->model('User_model');
		$this->load->model('Absensi_model');
		$this->load->model('Chart_model');
	}

	public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $this->session->id_divisi;
        $data['magang'] = $this->Magang_model->tmagang();
        $data['status'] = $this->Magang_model->get();
        $data['namadivisi'] = $this->User_model->get();
		$data['userdata'] = $this->User_model->tuser();
		$data['divisi'] = $this->divisi->get();
		$data['jumlahdiv'] = $this->User_model->get_count();
        if ($this->session->role == "Admin") {
            $data['masuk'] = $this->Absensi_model->tmasukAdmin();
            $data['pulang'] = $this->Absensi_model->tkeluarAdmin();
        } else {
            $data['masuk'] = $this->Absensi_model->tmasuk($id);
            $data['pulang'] = $this->Absensi_model->tkeluar($id);
        }
        //$data['pulang'] = $this->Absensi_model->tkeluar($id);
        $data['magang'] = $this->divisi->get();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->load->view("layout/header", $data);
        $this->load->view("auth/dashboard", $data);
        $this->load->view("layout/footer", $data);
    }

	public function chart_data() 
	{
		$data = $this->Chart_model->chart_database();
		$data['divisi_user'] = $this->Magang_model->divisi_user();
		echo json_encode($data);
	}

	public function baca($slug)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['magang'] = $this->divisi->getBySlug($slug);
		$data['divisi'] = $this->getDivisi($data['magang']['id_divisi']);
		$data['divisi'] = $this->divisi->getAllDivisi();
		$this->load->view("layout/header", $data);
		$this->load->view("auth/dashboard", $data);
		$this->load->view("layout/footer", $data);
	}
	public function getDivisi($id)
	{
		$data = $this->dashboard->getDivisi($id);
		return $data['nama'];
	}
	public function divisi($divisi)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['magang'] = $this->Magang_model->getDashboardByDivisi($divisi);
		$data['divisi'] = $this->divisi->getAllDivisi();
		$this->load->view("layout/header", $data);
		$this->load->view("magang/vw_magang", $data);
		$this->load->view("layout/footer", $data);
	}
}
