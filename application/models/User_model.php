<?php

class User_model extends CI_model
{
    public function getAllUser()
    {
        $this->db->order_by('level', 'DESC');
        $this->db->order_by('nama', 'ASC');
        $this->db->join('level', 'users.level = level.id_level');
        return $this->db->get('users')->result_array();
    }

    public function total()
    {
        return $this->db->get('users')->num_rows();
    }

    public function addUsers()
    {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $username = strtolower($this->input->post('username', true));

        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $username,
            'password' => $password,
            'level' => $this->input->post('level', true)
        );

        $this->db->insert('users', $data);
        $this->session->set_flashdata('addSuccess', 'Berhasil Menambahkan Data');
    }

    public function ubahUsers($id)
    {
        $this->db->set('nama', $this->input->post('nama', true));
        $this->db->set('username', strtolower($this->input->post('username', true)));
        $this->db->set('level', $this->input->post('level', true));
        $this->db->where('id_user', $id);
        $this->db->update('users');
    }

    public function hapusUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
        $this->session->set_flashdata('deleteSuccess', 'Berhasil Menghapus Data');
    }


    public function getUserById($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->select('*')->from('users')->get()->row_array();
    }

    public function cekUsernameRow($data)
    {
        $this->db->where('username', $data);
        return $this->db->select('username')->from('users')->get()->num_rows();
    }

    public function cekPassword($post)
    {
        $data = $this->cek_username($this->session->userdata('id_user'));

        if (password_verify($post, $data['password']) == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cek_username($data)
    {
        return $this->db->select('password')->from('users')->where('id_user =', $data)->get()->row_array();
    }

    public function getLevel()
    {
        return $this->db->get('level')->result_array();
    }
}
