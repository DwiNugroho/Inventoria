<?php

class Barang_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('BarangKeluar_model');

        if (!$this->session->userdata('username')) {
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = 'Barang Keluar';

        $data['barang_keluar'] = $this->BarangKeluar_model->getBarangKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Barang Keluar';
        $data['barang'] = $this->BarangKeluar_model->getBarang();
        $data['tempo_keluar'] = $this->BarangKeluar_model->getTempoKeluar();
        $data['total_tempo'] = $this->BarangKeluar_model->getTotalTempo();


        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('Barang_keluar/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->BarangKeluar_model->inputTempoKeluar();
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Barang Keluar';
        $data['barang_keluar'] = $this->BarangKeluar_model->getBarangKeluarById($id);
        $data['detail_keluar'] = $this->BarangKeluar_model->getDetailKeluarById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang_keluar/detail', $data);
        $this->load->view('templates/footer');
    }


    public function hapus($id)
    {
        $this->BarangKeluar_model->hapusTempoKeluar($id);
    }

    public function simpan()
    {
        $this->BarangKeluar_model->simpanTempoKeluar();
    }

    public function cetak()
    {
        $data['barang_keluar'] = $this->BarangKeluar_model->getBarangKeluar();
        $html = $this->load->view('Barang_keluar/cetak', $data, true);
        $tanggal = date('d-m-Y');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Barang Keluar' . $tanggal . '.pdf', 'I');
    }
}
