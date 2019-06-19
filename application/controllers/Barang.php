<?php

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('Login/index');
        }
    }

    public function index()
    {

        $data['title'] = 'Barang';

        $data['barang'] = $this->Barang_model->getAllBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $data['title'] = 'Barang';

        $data['kode'] = $this->Barang_model->getCodeBarang();
        $data['ruang'] = $this->Barang_model->getRuangan();
        $data['kategori'] = $this->Barang_model->getKategori();

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Barang tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('id_ruang', 'Ruangan', 'required', [
            'required' => 'Silahkan pilih Ruangan!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Barang_model->addBarang();
            redirect('barang/index');
        }
    }

    public function ubah($id)
    {
        $data['title'] = 'Barang';

        $data['barang'] = $this->Barang_model->getBarangById($id);
        $data['ruang']  = $this->Barang_model->getRuangan();
        $data['kategori'] = $this->Barang_model->getKategori();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('barang/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Barang_model->ubahBarang($id);
            $this->session->set_flashdata('ubahSuccess', 'Berhasil Mengubah Data');
            redirect('Barang/index');
        }
    }

    public function hapus($id)
    {
        $this->Barang_model->hapusBarang($id);
        redirect('Barang/index');
    }

    public function cetak()
    {
        $data['barang'] = $this->Barang_model->getAllBarang("", "");
        $data['title'] = 'Cetak Data Users';
        $html = $this->load->view('Barang/cetak', $data, true);
        $tanggal = date('d-m-Y');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Barang ' . $tanggal . '.pdf', 'I');
    }

    public function getJumlahBarang()
    {
        if ($this->input->post('id')) {
            echo $this->Barang_model->getJumlahBarang($this->input->post('id'));
        }
    }
}
