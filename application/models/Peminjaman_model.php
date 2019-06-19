<?php

class Peminjaman_model extends CI_model
{


    public function getPeminjamanByIdUser($id)
    {

        $this->db->order_by('no_invoice', 'DESC');

        $this->db->join('users', 'peminjaman.peminjam = users.id_user');
        $this->db->where('peminjam', $id);
        return $this->db->get('peminjaman')->result_array();
    }

    public function getPeminjaman()
    {
        $this->db->order_by('waktu_pinjam', 'DESC');
        $this->db->join('users', 'peminjaman.peminjam = users.id_user');
        return $this->db->get('peminjaman')->result_array();
    }

    public function getPeminjam()
    {
        $this->db->where('level', '1');
        return $this->db->get('users')->result_array();
    }


    public function getBarang()
    {
        return $this->db->get('inventories')->result_array();
    }

    public function getTotalTempo()
    {
        return $this->db->get('tempo_peminjaman')->num_rows();
    }

    public function getTempoPeminjaman()
    {
        $this->db->join('inventories', 'tempo_peminjaman.id_barang = inventories.id');

        return $this->db->get('tempo_peminjaman')->result_array();
    }

    public function inputTempoPeminjaman()
    {
        $this->db->where('id_barang', $this->input->post('inventory_id', true));
        $this->db->select('id_barang');
        $tempo = $this->db->get('tempo_peminjaman')->num_rows();
        if ($tempo == 0) {
            if ($this->getJumlahBarang($this->input->post('inventory_id', true)) >= $this->input->post('jumlah_pinjam', true)) {
                $data = [
                    'id_barang' => $this->input->post('inventory_id', true),
                    'jml_pinjam' => $this->input->post('jumlah_pinjam', true),
                ];
                $this->db->insert('tempo_peminjaman', $data);
            } else {
                $this->session->set_flashdata('gagal_input_tempo', 'Barang Tersedia adalah ' . $this->getJumlahBarang($this->input->post('inventory_id', true)));
                redirect('Peminjaman/tambah');
            }
        } else {

            if ($this->getJumlahBarang($this->input->post('inventory_id', true)) >= $this->input->post('jumlah_pinjam', true)) {
                $this->db->where('id_barang', $this->input->post('inventory_id', true));
                $this->db->select('jml_pinjam');
                $jml = $this->db->get('tempo_peminjaman')->row_array();
                $hasil = $jml['jml_pinjam'] + $this->input->post('jumlah_pinjam', true);
                $data = [
                    'jml_pinjam' => $hasil,
                ];
                $this->db->where('id_barang', $this->input->post('inventory_id', true));
                $this->db->update('tempo_peminjaman', $data);
            } else {
                $this->session->set_flashdata('gagal_input_tempo', 'Barang Tersedia adalah ' . $this->getJumlahBarang($this->input->post('inventory_id', true)));
                redirect('Peminjaman/tambah');
            }
        }
        // Update Jumlah Inventories
        $this->updateInventories($this->input->post('inventory_id', true), $this->input->post('jumlah_pinjam', true));
        redirect('Peminjaman/tambah');
    }


    public function updateInventories($id, $jumlah_pinjam)
    {
        $this->db->select('jumlah');
        $this->db->where('id', $id);
        $jumlah_barang = $this->db->get('inventories')->row_array();
        $hasilBarang = $jumlah_barang['jumlah'] - $jumlah_pinjam;
        $dataBarang = [
            'jumlah' => $hasilBarang,
        ];
        $this->db->where('id', $id);
        $this->db->update('inventories', $dataBarang);
    }

    public function hapusTempoPeminjaman($id)
    {
        $this->db->where('id_tempo_peminjaman', $id);
        $data = $this->db->get('tempo_peminjaman')->row_array();

        $this->db->select('jumlah');
        $this->db->where('id', $data['id_barang']);
        $jumlah_barang = $this->db->get('inventories')->row_array();

        $hasilBarang = $jumlah_barang['jumlah'] + $data['jml_pinjam'];

        $dataBarang = [
            'jumlah' => $hasilBarang,
        ];

        $this->db->where('id', $data['id_barang']);
        $this->db->update('inventories', $dataBarang);

        $this->db->where('id_tempo_peminjaman', $id);
        $this->db->delete('tempo_peminjaman');
        redirect('Peminjaman/tambah');
    }

    public function getJumlahBarang($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('inventories')->row_array();

        return $data['jumlah'];
    }


    public function simpanTempoPeminjaman()
    {
        $tempo = $this->getDataTempo();
        $total = $this->db->query('SELECT sum(jml_pinjam) AS total FROM tempo_peminjaman')->row_array();
        $no_invoice = $this->getInvoice();
        $dataMasuk = [
            'jumlah_pinjam' => $total['total'],
            'no_invoice' => $no_invoice,
            'peminjam' => $this->input->post('peminjam', true),
            'tujuan' => $this->input->post('tujuan', true),
            'waktu_pinjam' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('Peminjaman', $dataMasuk);
        $id_peminjaman = $this->db->query("SELECT * FROM Peminjaman WHERE no_invoice = $no_invoice")->row_array();
        foreach ($tempo as $x) {
            $data = [
                'id_barang' => $x['id_barang'],
                'id_peminjaman' => $id_peminjaman['id_peminjaman'],
                'jml_pinjam' => $x['jml_pinjam'],
            ];

            $this->db->insert('detail_peminjaman', $data);

            $this->db->where('id_tempo_peminjaman', $x['id_tempo_peminjaman']);
            $this->db->delete('tempo_peminjaman');
        }
        redirect('Peminjaman/index');
    }

    public function getInvoice()
    {
        $this->db->select('RIGHT(peminjaman.no_invoice,3) as kode', false);
        $this->db->order_by('no_invoice', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('peminjaman');

        if ($query->num_rows() <> 0) {
            //jika kode sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // Membuat Kode jadi 4 Digit
        $kodejadi = "2" . date('Ymd') . $kodemax;    // Hasil
        return $kodejadi;
    }

    public function getDataTempo()
    {
        return $this->db->get('tempo_peminjaman')->result_array();
    }



    public function getPeminjamanById($id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->join('users', 'peminjaman.peminjam = users.id_user');
        return $this->db->get('peminjaman')->row_array();
    }
    public function getDetailPeminjamanById($id)
    {
        $this->db->join('inventories', 'detail_peminjaman.id_barang = inventories.id');
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('detail_peminjaman')->result_array();
    }

    public function kembali_semua($id_peminjaman)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        $detail_peminjaman = $this->db->get('detail_peminjaman')->result_array();

        // Update Jumlah Barang
        foreach ($detail_peminjaman as $dp) {
            $jumlahkembali = floatval($dp['jml_pinjam']) - floatval($dp['jml_kembali']);
            $this->db->where('id', $dp['id_barang']);
            $jumlahbarang = $this->db->select('jumlah')->get('inventories')->row_array();
            $jumlah = $jumlahkembali + $jumlahbarang['jumlah'];
            $this->db->set('jumlah', $jumlah);
            $this->db->where('id', $dp['id_barang']);
            $this->db->update('inventories');
        }

        // Update Jumlah Detail Jumlah Kembali
        foreach ($detail_peminjaman as $dp) {
            $jml_kembali = [
                'jml_kembali' => $dp['jml_pinjam'],
            ];

            $this->db->where('id_detail_peminjaman', $dp['id_detail_peminjaman']);
            $this->db->update('detail_peminjaman', $jml_kembali);
        }

        // Update Peminjaman
        $jumlah_kembali = $this->db->query('SELECT sum(jml_kembali) AS jumlah_kembali FROM detail_peminjaman WHERE id_peminjaman = ' . $id_peminjaman)->row_array();
        $this->db->where('id_peminjaman', $id_peminjaman);
        $waktu_pinjam = $this->db->select('waktu_pinjam')->get('peminjaman')->row_array();
        $waktu_kembali = date('Y-m-d H:i:s');
        $this->db->set('jumlah_kembali', $jumlah_kembali['jumlah_kembali']);
        $this->db->set('status', '1');
        $this->db->set('waktu_pinjam', $waktu_pinjam['waktu_pinjam']);
        $this->db->set('waktu_kembali', $waktu_kembali);
        $this->db->where('id_peminjaman', $id_peminjaman);
        $this->db->update('peminjaman');
        redirect('Peminjaman/index');
    }
}
