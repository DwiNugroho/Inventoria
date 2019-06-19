<?php

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('Login/index');
        }
    }

    public function index()
    {

        $data['title'] = 'Users';

        $data['users'] = $this->User_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('users/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Users';
        $data['level'] = $this->User_model->getLevel();

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[users.username]', [
            'required' => 'Username tidak boleh kosong!',
            'min_length' => 'Username terlalu pendek!',
            'is_unique' => 'Username Sudah digunakan!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]', [
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama tidak boleh kosong!',
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('Users/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->User_model->addUsers();
            redirect('Users/index');
        }
    }

    public function ubah($id)
    {
        $data['title'] = 'Users';
        $data['users'] = $this->User_model->getUserById($id);
        $data['level'] = $this->User_model->getLevel();

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username tidak boleh kosong!',
            'min_length' => 'Username terlalu pendek!',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama tidak boleh kosong!',
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('Users/ubah', $data);
            $this->load->view('templates/footer');
        } else {

            $this->User_model->ubahUsers($id);
            $this->session->set_flashdata('ubahSuccess', 'Berhasil Mengubah Data');
            redirect('Users/index');
        }
    }

    public function hapus($id)
    {
        $this->User_model->hapusUser($id);
        redirect('Users/index');
    }

    public function daftarUsers()
    {
        $data['users'] = $this->User_model->getAllUsers();
        $this->load->view('users/index', $data);
    }


    public function cetak()
    {
        $data['users'] = $this->User_model->getAllUser();
        $data['title'] = 'Cetak Data Users';
        $html = $this->load->view('users/cetak', $data, true);
        $tanggal = date('d-m-Y');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Data Users ' . $tanggal . '.pdf', 'I');
    }
}
