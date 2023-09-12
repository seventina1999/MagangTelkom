<?php

use Dompdf\Dompdf;

class LaporanCutiIjin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanCutiIjin_model');
        $this->load->model('Magang_model');
        $this->load->model('User_model');
        $this->load->model('Divisi_model', 'divisi');
        $this->load->helper('Tanggal');
    }
    function index()
    {
        $data['title'] = "Laporan Cuti/Ijin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $data['divisi_user'] = $this->LaporanCutiIjin_model->divisi_user();
        $data['cutiijin'] = $this->LaporanCutiIjin_model->get();
        $data['bulany'] = $this->LaporanCutiIjin_model->get_bulan($bulan);
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->getAllDivisi();
        $data['all_bulan'] = bulan();
        $data['bulan'] = $bulan;
        $this->load->view("layout/header", $data);
        $this->load->view("laporancutiijin/vw_laporancutiijin", $data);
        $this->load->view("layout/footer", $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = "Halaman Tambah Cuti/Ijin";
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->get();
        $this->form_validation->set_rules('id_nama', 'Nama', 'required', ['required' => 'Nama Wajib di isi']);
        $this->form_validation->set_rules('id_divisi', 'Nama Divisi', 'required', ['required' => 'Nama Divisi wajib di isi']);
        $this->form_validation->set_rules('tipe', 'Tipe Cuti/Ijin', 'required', ['required' => 'Tipe Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('keterangan', 'Keterangan Cuti/Ijin', 'required', ['required' => 'Keterangan Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('awl_tgl', 'Awal Cuti/Ijin', 'required', ['required' => 'Awal Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('akhir_tgl', 'Akhir Cuti/Ijin', 'required', ['required' => 'Akhir Cuti/Ijin wajib di isi']);
        $this->form_validation->set_rules('status', 'Status Cuti/Ijin', 'required', ['required' => 'Keterangan Cuti/Ijin wajib di isi']);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("laporancutiijin/vw_tambah_laporancutiijin", $data);
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
                'status' => $this->input->post('status')
            ];
            $this->LaporanCutiIjin_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Cuti/Ijin Berhasil Ditambah!</div>');
            redirect('laporancutiijin/');
        }
    }

    function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Update Data Cuti/Ijin";
        $data['cutiijin'] = $this->LaporanCutiIjin_model->getById($id);
        $data['magang'] = $this->Magang_model->get();
        $data['divisi'] = $this->divisi->get();

        $this->form_validation->set_rules('id_nama', 'Nama ', 'required', [
            'required' => 'Nama  Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_divisi', 'Nama Divisi', 'required', [
            'required' => 'Nama Divisi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tipe', 'Tipe Cuti/Ijin', 'required', [
            'required' => 'Tipe Cuti/Ijin Wajib di isi'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan Cuti/Ijin', 'required', [
            'required' => 'Keterangan Cuti/Ijin Wajib di isi'
        ]);
        $this->form_validation->set_rules('awl_tgl', 'Awal Cuti/Ijin', 'required', [
            'required' => 'Awal Cuti/Ijin Wajib di isi'
        ]);
        $this->form_validation->set_rules('akhir_tgl', 'Akhir Cuti/Ijin', 'required', [
            'required' => 'Akhir Cuti/Ijin Wajib di isi'
        ]);
        $this->form_validation->set_rules('lama_waktu', 'Lama Cuti/Ijin', 'required', [
            'required' => 'Akhir Cuti/Ijin Wajib di isi'
        ]);
        $this->form_validation->set_rules('status', 'Status Cuti/Ijin', 'required', [
            'required' => 'Status Cuti/Ijin Wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("laporancutiijin/vw_edit_laporancutiijin", $data);
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
                'status' => $this->input->post('status')
            ];
            $this->LaporanCutiIjin_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Cuti/ijin Berhasil Diubah!</div>');
            redirect('laporancutiijin');
        }
    }
    function upload()
    {
        $data = [
            'id_nama' => $this->input->post('id_nama'),
            'id_divisi' => $this->input->post('id_divisi'),
            'tipe' => $this->input->post('tipe'),
            'keterangan' => $this->input->post('keterangan'),
            'awl_tgl' => $this->input->post('awl_tgl'),
            'akhir_tgl' => $this->input->post('akhir_tgl'),
            'status' => $this->input->post('status')
        ];
        $this->LaporanCutiIjin_model->insert($data);
        redirect('laporancutiijin');
    }
    function hapus($id)
    {
        $this->LaporanCutiIjin_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-sdanger" 
        role="alert"><i class="icon fas fa-info-circle"></i> Data tidak dapat di hapus(sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fas fa-check-circle"></i> Data magang Berhasil Dihapus!</div>');
        }
        redirect('laporancutiijin');
    }
    public function divisi($divisi)
    {
        $data['magang'] = $this->divisi->getDashboardByDivisi($divisi);
        $data['divisi'] = $this->divisi->getDashboardByDivisi($divisi);
        $this->load->view("layout/header", $data);
        $this->load->view("magang/vw_magang", $data);
        $this->load->view("layout/footer", $data);
    }

    public function export($bulan)
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $dompdf->setOptions($options);
        $this->data['bulany'] = $this->LaporanCutiIjin_model->get_bulan($bulan);
        $this->data['magang'] = $this->Magang_model->get();
        $this->data['divisi'] = $this->divisi->get();
        $this->data['title'] = 'Laporan Data Cuti Ijin';
        // $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'Landscape');
        $html = $this->load->view('laporancutiijin/cetakLaporanCutiIjin', $this->data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Cuti Ijin ' . date('d F Y'), array("Attachment" => false));
    }
}
