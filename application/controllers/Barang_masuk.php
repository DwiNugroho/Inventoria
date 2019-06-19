<?php

class Barang_masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('BarangMasuk_model');

		if (!$this->session->userdata('username')) {
			redirect('Login/index');
		}
	}

	public function index()
	{
		$data['title'] = 'Barang Masuk';

		$data['barang_masuk'] = $this->BarangMasuk_model->getAllBarangMasuk();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Barang_masuk/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Barang Masuk';
		$data['barang'] = $this->BarangMasuk_model->getBarang();
		$data['supplier'] = $this->BarangMasuk_model->getSuppliers();
		$data['tempo_masuk'] = $this->BarangMasuk_model->getTempoMasuk();
		$data['total_tempo'] = $this->BarangMasuk_model->getTotalTempo();


		$this->form_validation->set_rules('jumlah_masuk', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('Barang_masuk/tambah', $data);
			$this->load->view('templates/footer');
		} else {

			$this->BarangMasuk_model->inputTempoMasuk();
		}
	}

	public function detail($id)
	{
		$data['title'] = 'Barang Masuk';
		$data['barang_masuk'] = $this->BarangMasuk_model->getBarangMasukById($id);
		$data['detail_masuk'] = $this->BarangMasuk_model->getDetailMasukById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Barang_masuk/detail', $data);
		$this->load->view('templates/footer');
	}

	public function simpan()
	{
		$this->BarangMasuk_model->simpanTempoMasuk();
	}

	public function hapus($id)
	{
		$this->BarangMasuk_model->hapusTempoMasuk($id);
	}

	public function cetak()
	{
		$data['barang_masuk'] = $this->BarangMasuk_model->getAllBarangMasuk();
		$data['title'] = 'Cetak Data Users';
		$html = $this->load->view('Barang_masuk/cetak', $data, true);
		$tanggal = date('d-m-Y');

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('Data Barang Masuk' . $tanggal . '.pdf', 'I');
	}
}
