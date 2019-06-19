<?php

class Ruangan_model extends CI_model
{
    public function getAllRuangan()
    {

        $this->db->order_by('nama_ruang', 'ASC');

        return $this->db->get('ruangan')->result_array();
    }

    public function addRuangan()
    {
        $data = array(
            'nama_ruang' => $this->input->post('nama_ruang', true),
            'kode_ruang' => $this->input->post('kode_ruang', true),
            'status' => '1',
        );


        $this->db->insert('ruangan', $data);
        $this->session->set_flashdata('addSuccess', 'Berhasil Menambahkan Data');
    }

    public function getRuanganById($id)
    {
        $this->db->where('id_ruang', $id);
        return $this->db->select('*')->from('ruangan')->get()->row_array();
    }

    public function ubahRuangan($id)
    {
        $this->db->set('nama_ruang', $this->input->post('nama_ruang', true));
        $this->db->set('kode_ruang', $this->input->post('kode_ruang', true));
        $this->db->where('id_ruang', $id);
        $this->db->update('ruangan');
    }

    public function searchRuangan()
    {
        $keyword = $this->input->post('keyword', true);


        $this->db->like('nama_ruang', $keyword);
        $this->db->or_like('kode_ruang', $keyword);
        $this->db->order_by('nama_ruang', 'ASC');
        return $this->db->get('ruangan')->result_array();
    }

    public function hapusRuangan($id)
    {
        $this->db->where('id_ruang', $id);
        $this->db->delete('ruangan');
        $this->session->set_flashdata('deleteSuccess', 'Berhasil Menghapus Data');
    }





    public function nonaktifRuangan($id)
    {
        $this->db->set('status', '0');
        $this->db->where('id_ruang', $id);
        $this->db->update('ruangan');
    }

    public function aktifRuangan($id)
    {
        $this->db->set('status', '1');
        $this->db->where('id_ruang', $id);
        $this->db->update('ruangan');
    }
}
