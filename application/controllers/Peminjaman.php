<?php


class Peminjaman extends CI_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Peminjaman_model');

		if (!$this->session->userdata('username')) {
			redirect('Login/index');
		}
	}

	public function index()
	{
		$data['title'] = 'Peminjaman';
		$data['peminjaman'] = $this->Peminjaman_model->getPeminjaman();

		if ($this->session->userdata('level') < 2) {
			$data['peminjaman'] = $this->Peminjaman_model->getPeminjamanByIdUser($this->session->userdata('id_user'));
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('peminjaman/index');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Peminjaman';
		$data['peminjaman'] = $this->Peminjaman_model->getPeminjamanById($id);
		$data['detail_peminjaman'] = $this->Peminjaman_model->getDetailPeminjamanById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Peminjaman/detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{

		$data['title'] = 'Peminjaman';
		$data['barang'] = $this->Peminjaman_model->getBarang();
		$data['tempo_peminjaman'] = $this->Peminjaman_model->getTempoPeminjaman();
		$data['total_tempo'] = $this->Peminjaman_model->getTotalTempo();
		$data['peminjam'] = $this->Peminjaman_model->getPeminjam();

		$this->form_validation->set_rules('jumlah_pinjam', 'Jumlah', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('peminjaman/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Peminjaman_model->inputTempoPeminjaman();
		}
	}

	public function hapus($id)
	{
		$this->Peminjaman_model->hapusTempoPeminjaman($id);
	}

	public function simpan()
	{
		$this->Peminjaman_model->simpanTempoPeminjaman();
	}

	public function kembali_semua($id)
	{
		$this->Peminjaman_model->kembali_semua($id);
	}

	public function cetak()
	{
		$data['peminjaman'] = $this->Peminjaman_model->getPeminjaman();
		$html = $this->load->view('Peminjaman/cetak', $data, true);
		$tanggal = date('d-m-Y');

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('Data Peminjaman' . $tanggal . '.pdf', 'I');
	}
}
