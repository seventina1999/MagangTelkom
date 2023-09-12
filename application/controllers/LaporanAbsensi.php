<?php

use Dompdf\Dompdf;

class LaporanAbsensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanAbsensi_model');
        $this->load->model('Magang_model');
        $this->load->model('Divisi_model', 'divisi');
    }
    function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Laporan Absensi";
        $data['laporan'] = $this->LaporanAbsensi_model->getAll();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $this->load->view("layout/header", $data);
        $this->load->view("laporanabsensi/vw_laporanabsensi", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tes_tampilan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Laporan Absensi";
        $data['pegawai'] = $this->LaporanAbsensi_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("laporanabsensi/vw_laporanabsensi", $data);
        $this->load->view("layout/footer", $data);
    }
    public function divisi($divisi)
    {
        $data['magang'] = $this->divisi->getDashboardByDivisi($divisi);
        $data['divisi'] = $this->divisi->getDashboardByDivisi($divisi);
        $this->load->view("layout/header", $data);
        $this->load->view("laporanabsensi/vw_laporanabsensi", $data);
        $this->load->view("layout/footer", $data);
    }

    public function export()
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);
        $this->data['laporan'] = $this->LaporanAbsensi_model->getAll();
        $this->data['title'] = 'Laporan Data Absensi';
        // $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('laporanabsensi/cetakLaporanabsensi', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Absensi ' . date('d F Y'), array("Attachment" => false));
    }
}
