<?php

class BarangKeluar_model extends CI_Model
{

    public function getBarang()
    {
        return $this->db->get('inventories')->result_array();
    }

    public function getTotalTempo()
    {
        return $this->db->get('tempo_keluar')->num_rows();
    }

    public function getTempoKeluar()
    {
        $this->db->join('inventories', 'tempo_keluar.id_barang = inventories.id');

        return $this->db->get('tempo_keluar')->result_array();
    }



    public function inputTempoKeluar()
    {
        $this->db->where('id_barang', $this->input->post('inventory_id', true));

        $this->db->select('id_barang');

        $tempo = $this->db->get('tempo_keluar')->num_rows();


        if ($tempo < 1) {

            if ($this->getJumlahBarang($this->input->post('inventory_id', true)) >= $this->input->post('jumlah_keluar', true)) {
                $data = [
                    'id_barang' => $this->input->post('inventory_id', true),
                    'jml' => $this->input->post('jumlah_keluar', true),
                ];
                $this->db->insert('tempo_keluar', $data);
            } else {
                $this->session->set_flashdata('gagal_input_tempo', 'Barang Tersedia adalah ' . $this->getJumlahBarang($this->input->post('inventory_id', true)));
                redirect('Barang_keluar/tambah');
            }
        } else {

            if ($this->getJumlahBarang($this->input->post('inventory_id', true)) >= $this->input->post('jumlah_keluar', true)) {

                $this->db->where('id_barang', $this->input->post('inventory_id', true));
                $this->db->select('jml');
                $jml = $this->db->get('tempo_keluar')->row_array();

                $hasil = $jml['jml'] + $this->input->post('jumlah_keluar', true);

                $data = [
                    'jml' => $hasil,
                ];
                $this->db->where('id_barang', $this->input->post('inventory_id', true));

                $this->db->update('tempo_keluar', $data);
            } else {
                $this->session->set_flashdata('gagal_input_tempo', 'Barang Tersedia adalah ' . $this->getJumlahBarang($this->input->post('inventory_id', true)));
                redirect('Barang_keluar/tambah');
            }
        }


        // Update Jumlah Inventories

        $this->updateInventories($this->input->post('inventory_id', true), $this->input->post('jumlah_keluar', true));

        redirect('Barang_keluar/tambah');
    }

    public function updateInventories($id, $jumlah_keluar)
    {
        $this->db->select('jumlah');
        $this->db->where('id', $id);
        $jumlah_barang = $this->db->get('inventories')->row_array();

        $hasilBarang = $jumlah_barang['jumlah'] - $jumlah_keluar;

        $dataBarang = [
            'jumlah' => $hasilBarang,
        ];

        $this->db->where('id', $id);
        $this->db->update('inventories', $dataBarang);
    }



    public function hapusTempoKeluar($id)
    {
        $this->db->where('id_tempo_keluar', $id);
        $data = $this->db->get('tempo_keluar')->row_array();

        $this->db->select('jumlah');
        $this->db->where('id', $data['id_barang']);
        $jumlah_barang = $this->db->get('inventories')->row_array();

        $hasilBarang = $jumlah_barang['jumlah'] + $data['jml'];

        $dataBarang = [
            'jumlah' => $hasilBarang,
        ];

        $this->db->where('id', $data['id_barang']);
        $this->db->update('inventories', $dataBarang);

        $this->db->where('id_tempo_keluar', $id);
        $this->db->delete('tempo_keluar');
        redirect('Barang_keluar/tambah');
    }





    public function simpanTempoKeluar()
    {
        $tempo = $this->getDataTempo();

        $total = $this->db->query('SELECT sum(jml) AS total FROM tempo_keluar')->row_array();

        $no_invoice = $this->getInvoice();

        $dataMasuk = [
            'jumlah_keluar' => $total['total'],
            'no_invoice' => $no_invoice,
            'penerima' => $this->input->post('penerima', true),
            'keperluan' => $this->input->post('keperluan', true),
        ];


        $this->db->insert('barang_keluar', $dataMasuk);


        $id_keluar = $this->db->query("SELECT * FROM barang_keluar WHERE no_invoice = $no_invoice")->row_array();


        foreach ($tempo as $x) {
            $data = [
                'id_barang' => $x['id_barang'],
                'id_keluar' => $id_keluar['id_keluar'],
                'jml' => $x['jml'],
            ];

            $this->db->insert('detail_keluar', $data);
            $this->db->where('id_tempo_keluar', $x['id_tempo_keluar']);
            $this->db->delete('tempo_keluar');
        }

        redirect('Barang_keluar/index');
    }


    public function getInvoice()
    {
        $this->db->select('RIGHT(barang_keluar.no_invoice,3) as kode', false);
        $this->db->order_by('no_invoice', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang_keluar');

        if ($query->num_rows() <> 0) {
            //jika kode sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // Membuat Kode jadi 4 Digit
        $kodejadi = "0" . date('Ymd') . $kodemax;    // Hasil
        return $kodejadi;
    }

    public function getDataTempo()
    {
        return $this->db->get('tempo_keluar')->result_array();
    }



    public function getJumlahBarang($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('inventories')->row_array();

        return $data['jumlah'];
    }


    public function getBarangKeluar()
    {
        $this->db->order_by('date', 'DESC');
        return $this->db->get('barang_keluar')->result_array();
    }

    public function getBarangKeluarById($id)
    {
        $this->db->where('id_keluar', $id);
        return $this->db->get('barang_keluar')->row_array();
    }
    public function getDetailKeluarById($id)
    {
        $this->db->join('inventories', 'detail_keluar.id_barang = inventories.id');
        $this->db->where('id_keluar', $id);
        return $this->db->get('detail_keluar')->result_array();
    }
}
