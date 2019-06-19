<?php

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ruangan_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('Login/index');
        }
    }

    public function index()
    {
        $data['title'] = 'Ruangan';

        $data['ruangan'] = $this->Ruangan_model->getAllRuangan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ruangan/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Ruangan';
        $this->form_validation->set_rules('nama_ruang', 'Nama_ruang', 'required', [
            'required' => 'Nama Ruang Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ruangan/tambah');
            $this->load->view('templates/footer');
        } else {

            $this->Ruangan_model->addRuangan();
            redirect('Ruangan/index');
        }
    }

    public function ubah($id)
    {
        $data['title'] = 'Ruangan';
        $data['ruangan'] = $this->Ruangan_model->getRuanganById($id);
        $this->form_validation->set_rules('nama_ruang', 'Nama', 'required', [
            'required' => 'Nama Ruangan tidak boleh kosong!',
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ruangan/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Ruangan_model->ubahRuangan($id);
            $this->session->set_flashdata('ubahSuccess', 'Berhasil Mengubah Data');
            redirect('Ruangan/index');
        }
    }

    public function hapus($id)
    {
        $this->Ruangan_model->hapusRuangan($id);
        redirect('Ruangan/index');
    }

    public function cetak()
    {
        $data['ruangan'] = $this->Ruangan_model->getAllRuangan();
        $data['title'] = 'Cetak Data Ruangan';
        $html = $this->load->view('Ruangan/cetak', $data, true);
        $tanggal = date('d-m-Y');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Ruangan' . $tanggal . '.pdf', 'I');
    }



    // Ubah Status Ruangan 

    public function nonaktif($id)
    {
        $this->Ruangan_model->nonaktifRuangan($id);
        redirect('Ruangan/index');
    }

    public function aktif($id)
    {
        $this->Ruangan_model->aktifRuangan($id);
        redirect('Ruangan/index');
    }
}
