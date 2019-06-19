<?php

class Supplier_model extends CI_model
{
    public function getAllSuppliers()
    {
        return $this->db->get('suppliers')->result_array();
    }

    public function addSuppliers()
    {
        $data = array(
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat' => $this->input->post('alamat', true),
            'kota' => $this->input->post('kota', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'status' => '1',
        );


        $this->db->insert('suppliers', $data);
        $this->session->set_flashdata('addSuccess', 'Berhasil Menambahkan Data');
    }

    public function hapusSupplier($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('suppliers');
        $this->session->set_flashdata('deleteSuccess', 'Berhasil Menghapus Data');
    }

    public function getSupplierById($id)
    {
        $this->db->where('id_supplier', $id);
        return $this->db->select('*')->from('suppliers')->get()->row_array();
    }

    public function ubahSuppliers($id)
    {
        $this->db->set('nama_supplier', $this->input->post('nama_supplier', true));
        $this->db->set('alamat', $this->input->post('alamat', true));
        $this->db->set('kota', $this->input->post('kota', true));
        $this->db->set('no_tlp', $this->input->post('no_tlp', true));
        $this->db->where('id_supplier', $id);
        $this->db->update('suppliers');
    }

    public function nonaktifSupplier($id)
    {
        $this->db->set('status', '0');
        $this->db->where('id_supplier', $id);
        $this->db->update('suppliers');
    }

    public function aktifSupplier($id)
    {
        $this->db->set('status', '1');
        $this->db->where('id_supplier', $id);
        $this->db->update('suppliers');
    }
}
