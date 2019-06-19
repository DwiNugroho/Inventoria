<?php

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kategori';

        $data['kategori'] = $this->Kategori_model->getKategori();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Kategori';

        $data['kode_kategori'] = $this->Kategori_model->getCodeKategori();

        $this->form_validation->set_rules('nama_kategori', 'Nama', 'required', [
            'required' => 'Nama Kategori tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kategori/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Kategori_model->addKategori();
            redirect('kategori/index');
        }
    }

    public function hapus($id)
    {
        $this->Kategori_model->hapusKategori($id);
        $this->session->set_flashdata('deleteSuccess', 'Berhasil Menghapus Data');
        redirect('Kategori/index');
    }

    public function ubah($id)
    {
        $data['title'] = 'Kategori';

        $data['kategori'] = $this->Kategori_model->getKategoriById($id);

        $this->form_validation->set_rules('nama_kategori', 'Nama', 'required', [
            'required' => 'Nama Kategori tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kategori/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Kategori_model->ubahKategori($id);
            $this->session->set_flashdata('ubahSuccess', 'Berhasil Mengubah Data');
            redirect('kategori/index');
        }
    }
}
