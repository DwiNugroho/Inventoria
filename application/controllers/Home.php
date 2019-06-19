<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Peminjaman_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Inventoria';

        $data['barang'] = $this->Peminjaman_model->getBarang();
        $data['tempo_peminjaman'] = $this->Peminjaman_model->getTempoPeminjaman();
        $data['total_tempo'] = $this->Peminjaman_model->getTotalTempo();
        $data['peminjam'] = $this->Peminjaman_model->getPeminjam();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function dashboard()
    {

        if (!$this->session->userdata('username')) {
            redirect('Login/index');
        }

        $data['title'] = 'Home';
        $data['total'] = $this->Home_model->getAllTotal();

        $data['barang'] = $this->Peminjaman_model->getBarang();
        $data['tempo_peminjaman'] = $this->Peminjaman_model->getTempoPeminjaman();
        $data['total_tempo'] = $this->Peminjaman_model->getTotalTempo();
        $data['peminjam'] = $this->Peminjaman_model->getPeminjam();

        $this->form_validation->set_rules('jumlah_pinjam', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            if ($this->session->userdata('level') > 2) {
                $this->load->view('home/dashboard', $data);
            } else {
                $this->load->view('Peminjaman/tambah', $data);
            }
            $this->load->view('templates/footer');
        } else {
            $this->Peminjaman_model->inputTempoPeminjaman();
        }
    }
}
