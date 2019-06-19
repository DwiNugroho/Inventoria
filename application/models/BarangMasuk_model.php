<?php

class BarangMasuk_model extends CI_Model
{
	public function getBarang()
	{
		return $this->db->get('inventories')->result_array();
	}

	public function getSuppliers()
	{
		$this->db->where('status', '1');
		return $this->db->get('suppliers')->result_array();
	}

	public function inputTempoMasuk()
	{
		$this->db->where('id_barang', $this->input->post('inventory_id', true));

		$this->db->select('id_barang');

		$tempo = $this->db->get('tempo_masuk')->num_rows();


		if ($tempo < 1) {

			$data = [
				'id_barang' => $this->input->post('inventory_id', true),
				'jml' => $this->input->post('jumlah_masuk', true),
			];

			$this->db->insert('tempo_masuk', $data);
		} else {

			$this->db->where('id_barang', $this->input->post('inventory_id', true));
			$this->db->select('jml');
			$jml = $this->db->get('tempo_masuk')->row_array();

			$hasil = $jml['jml'] + $this->input->post('jumlah_masuk', true);

			$data = [
				'jml' => $hasil,
			];
			$this->db->where('id_barang', $this->input->post('inventory_id', true));
			$this->db->update('tempo_masuk', $data);
		}


		// Update Jumlah Inventories

		$this->updateInventories($this->input->post('inventory_id', true), $this->input->post('jumlah_masuk', true));

		redirect('Barang_masuk/tambah');
	}

	public function updateInventories($id, $jumlah_masuk)
	{
		$this->db->select('jumlah');
		$this->db->where('id', $id);
		$jumlah_barang = $this->db->get('inventories')->row_array();

		$hasilBarang = $jumlah_barang['jumlah'] + $jumlah_masuk;

		$dataBarang = [
			'jumlah' => $hasilBarang,
		];

		$this->db->where('id', $id);
		$this->db->update('inventories', $dataBarang);
	}

	public function getTempoMasuk()
	{
		$this->db->join('inventories', 'tempo_masuk.id_barang = inventories.id');

		return $this->db->get('tempo_masuk')->result_array();
	}

	public function getDataTempo()
	{
		return $this->db->get('tempo_masuk')->result_array();
	}



	public function simpanTempoMasuk()
	{
		$tempo = $this->getDataTempo();

		$total1 = $this->db->query('SELECT sum(jml) AS total FROM tempo_masuk')->row_array();

		$no_invoice = $this->getInvoice();

		$dataMasuk = [
			'jumlah_masuk' => $total1['total'],
			'no_invoice' => $no_invoice,
			'id_supplier' => $this->input->post('supplier_id', true),
		];

		$this->db->insert('barang_masuk', $dataMasuk);
		$id_masuk1 = $this->db->query("SELECT * FROM barang_masuk WHERE no_invoice = $no_invoice")->row_array();

		foreach ($tempo as $x) {
			$data = [
				'id_barang' => $x['id_barang'],
				'id_masuk' => $id_masuk1['id_masuk'],
				'jml' => $x['jml'],
			];

			$this->db->insert('detail_masuk', $data);
			$this->db->where('id_tempo_masuk', $x['id_tempo_masuk']);
			$this->db->delete('tempo_masuk');
		}

		redirect('Barang_masuk/index');
	}


	public function hapusTempoMasuk($id)
	{
		$this->db->where('id_tempo_masuk', $id);
		$data = $this->db->get('tempo_masuk')->row_array();

		$this->db->select('jumlah');
		$this->db->where('id', $data['id_barang']);
		$jumlah_barang = $this->db->get('inventories')->row_array();

		$hasilBarang = $jumlah_barang['jumlah'] - $data['jml'];

		$dataBarang = [
			'jumlah' => $hasilBarang,
		];

		$this->db->where('id', $data['id_barang']);
		$this->db->update('inventories', $dataBarang);

		$this->db->where('id_tempo_masuk', $id);
		$this->db->delete('tempo_masuk');
		redirect('Barang_masuk/tambah');
	}

	public function getTotalTempo()
	{
		return $this->db->get('tempo_masuk')->num_rows();
	}

	public function getAllBarangMasuk()
	{
		$this->db->join('suppliers', 'barang_masuk.id_supplier = suppliers.id_supplier');
		$this->db->order_by('date', 'DESC');
		return $this->db->get('barang_masuk')->result_array();
	}

	

	public function getInvoice()
	{
		$this->db->select('RIGHT(barang_masuk.no_invoice,3) as kode', false);
		$this->db->order_by('no_invoice', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang_masuk');

		if ($query->num_rows() <> 0) {
			//jika kode sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // Membuat Kode jadi 4 Digit
		$kodejadi = "1" . date('Ymd') . $kodemax;    // Hasil
		return $kodejadi;
	}



	public function getBarangMasukById($id)
	{
		$this->db->join('suppliers', 'barang_masuk.id_supplier = suppliers.id_supplier');
		$this->db->where('id_masuk', $id);
		return $this->db->get('barang_masuk')->row_array();
	}
	public function getDetailMasukById($id)
	{
		$this->db->join('inventories', 'detail_masuk.id_barang = inventories.id');
		$this->db->where('id_masuk', $id);
		return $this->db->get('detail_masuk')->result_array();
	}
}
