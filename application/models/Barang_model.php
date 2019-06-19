<?php

class Barang_model extends CI_model
{
    public function getAllBarang()
    {
        $this->db->join('kategori', 'inventories.id_kategori = kategori.id_kategori');
        $this->db->join('ruangan', 'inventories.id_ruang = ruangan.id_ruang');
        return $this->db->get('inventories')->result_array();
    }

    public function addBarang()
    {
        $data = array(
            'kode' => $this->input->post('kode', true),
            'nama' => $this->input->post('nama', true),
            'kondisi' => $this->input->post('kondisi', true),
            'spesifikasi' => $this->input->post('spesifikasi', true),
            'id_ruang' => $this->input->post('id_ruang', true),
            'id_kategori' => $this->input->post('id_kategori', true),
            'tanggal_register' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('inventories', $data);
        $this->session->set_flashdata('addSuccess', 'Berhasil Menambahkan Data');
    }

    public function ubahBarang($id)
    {
        $this->db->set('kode', $this->input->post('kode', true));
        $this->db->set('nama', $this->input->post('nama', true));
        $this->db->set('kondisi', $this->input->post('kondisi', true));
        $this->db->set('spesifikasi', $this->input->post('spesifikasi', true));
        $this->db->set('id_ruang', $this->input->post('id_ruang', true));
        $this->db->set('id_kategori', $this->input->post('id_kategori', true));
        $this->db->where('id', $id);
        $this->db->update('inventories');
    }

    public function getBarangById($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('inventories')->row_array();
    }

    public function getCodeBarang()
    {

        $this->db->select('RIGHT(inventories.kode,4) as kode', false);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('inventories');

        if ($query->num_rows() <> 0) {
            //jika kode sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Membuat Kode jadi 4 Digit
        $kodejadi = "BRG" . $kodemax;    // Hasil
        return $kodejadi;
    }


    public function getRuangan()
    {
        $this->db->where('status', '1');
        return $this->db->get('ruangan')->result_array();
    }

    public function hapusBarang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('inventories');
        $this->session->set_flashdata('deleteSuccess', 'Berhasil Menghapus Data');
    }

    public function getJumlahBarang($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('inventories')->row_array();
        $output = '<label> Jumlah Barang </label><input class="form-control form-control-sm" type="text" value="' . $query['jumlah'] . '" disabled>';

        return $output;
    }

    public function getKategori()
    {
        $this->db->where('status_kategori', '1');
        return $this->db->get('kategori')->result_array();
    }
}
