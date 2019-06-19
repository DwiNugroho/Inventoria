<?php

class Kategori_model extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($id)
    {
    	$this->db->where('id_kategori', $id);
        return $this->db->get('kategori')->row_array();
    }

    public function addKategori()
    {
    	$data = array(
            'kode_kategori' => $this->input->post('kode_kategori', true),
            'nama_kategori' => $this->input->post('nama_kategori', true),
            'status_kategori' => $this->input->post('status_kategori', true),
        );

        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('addSuccess', 'Berhasil Menambahkan Data');
    }

    public function ubahKategori($id)
    {
        
        $this->db->set('nama_kategori', $this->input->post('nama_kategori', true));
        $this->db->set('status_kategori', $this->input->post('status_kategori', true));

        $this->db->where('id_kategori', $id);
        $this->db->update('kategori');
    }

    public function hapusKategori($id)
    {
    	$this->db->set('id_kategori', '1');
    	$this->db->where('id_kategori', $id);
    	$this->db->update('inventories');

    	$this->db->where('id_kategori', $id);
    	$this->db->delete('kategori');
    }


    public function getCodeKategori()
    {

        $this->db->select('RIGHT(kategori.kode_kategori,4) as kode', false);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kategori');

        if ($query->num_rows() <> 0) {
            //jika kode sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Membuat Kode jadi 4 Digit
        $kodejadi = "KTG" . $kodemax;    // Hasil
        return $kodejadi;
    }
}
