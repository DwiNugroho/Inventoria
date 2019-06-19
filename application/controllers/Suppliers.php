<?php

class Suppliers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('Login/index');
        }
    }

    public function index()
    {

        $data['title'] = 'Suppliers';

        $data['suppliers'] = $this->Supplier_model->getAllSuppliers();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('suppliers/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Suppliers';
        $this->form_validation->set_rules('nama_supplier', 'Nama', 'required', [
            'required' => 'Nama Supplier tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('no_tlp', 'Telepon', 'is_natural', [
            'is_natural' => 'Nomor Telepon harus berupa Angka',
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('Suppliers/tambah');
            $this->load->view('templates/footer');
        } else {

            $this->Supplier_model->addSuppliers();
            redirect('Suppliers/index');
        }
    }

    public function hapus($id)
    {
        $this->Supplier_model->hapusSupplier($id);
        redirect('Suppliers/index');
    }


    public function ubah($id)
    {
        $data['title'] = 'Suppliers';
        $data['supplier'] = $this->Supplier_model->getSupplierById($id);
        $this->form_validation->set_rules('nama_supplier', 'Nama', 'required');
        $this->form_validation->set_rules('no_tlp', 'Telepon', 'is_natural');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('Suppliers/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Supplier_model->ubahSuppliers($id);
            $this->session->set_flashdata('ubahSuccess', 'Berhasil Mengubah Data');
            redirect('Suppliers/index');
        }
    }


    // Ubah Status Supplier 

    public function nonaktif($id)
    {
        $this->Supplier_model->nonaktifSupplier($id);
        redirect('Suppliers/index');
    }

    public function aktif($id)
    {
        $this->Supplier_model->aktifSupplier($id);
        redirect('Suppliers/index');
    }

    public function cetak()
    {
        $data['suppliers'] = $this->Supplier_model->getAllSuppliers();
        $data['title'] = 'Cetak Data Suppliers';
        $html = $this->load->view('Suppliers/cetak', $data, true);
        $tanggal = date('d-m-Y');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Suppliers ' . $tanggal . '.pdf', 'I');
    }
}
