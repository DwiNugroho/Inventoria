<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('nama')) {
            redirect('Home/dashboard');
        }

        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        } else {
            $this->Login_model->cek_login($_POST);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login/index');
    }
}
