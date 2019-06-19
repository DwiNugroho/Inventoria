<?php

class Login_model extends CI_model
{
    public function cek_login($post)
    {
        $data = $this->cek_username($post);

        if (password_verify($post['password'], $data['password']) == true) {

            $this->session->set_userdata('id_user', $data['id_user']);
            $this->session->set_userdata('nama', $data['nama']);
            $this->session->set_userdata('username', $data['username']);
            $this->session->set_userdata('level', $data['level']);
            redirect('Home/dashboard');
        } else {
            $this->session->set_flashdata('gagalLogin', 'Pastikan Username atau Password yang anda masukan sudah benar');
            redirect('Login/index');
        }
    }

    public function cek_username($data)
    {
        return $this->db->select('id_user, password, nama, username, level')->from('users')->where('username =', $data['username'])->get()->row_array();
    }
}
