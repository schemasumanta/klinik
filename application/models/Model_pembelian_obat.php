 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Model_pembelian_obat extends CI_Model {

 	
 	public function tampil_data_pembelian()
 	{ 
		// $hasil = $this->db->query("SELECT * FROM tbl_pembelian_obat"); 
		// return $hasil->result(); 
 		$hasil = $this->db->query("SELECT * FROM tbl_pembelian_obat ORDER BY kode_beli DESC");

 		return $hasil->result();
 	}

 	

 	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}



 	public function rincikan_pembelian_struk($kode_beli)
 	{ 
 		$hasil =$this->db->query("SELECT * FROM tbl_pembelian_obat  WHERE kode_beli='$kode_beli'");
 		return $hasil->result(); 
 	}


 	public function list_obat($kode_rekam)
 	{
 		$hasil = $this->db->query("SELECT DISTINCT a.kode_obat,(SELECT b.nama_obat  FROM tbl_satuan_obat b WHERE b.kode_obat=a.kode_obat) as nama_obat,(SELECT c.satuan_obat  FROM tbl_satuan_obat c WHERE c.kode_obat=a.kode_obat) as satuan_obat,(SELECT h.harga_jual  FROM tbl_satuan_obat h WHERE h.kode_obat=a.kode_obat) as harga_jual,(SELECT i.total_stok  FROM tbl_satuan_obat i WHERE i.kode_obat=a.kode_obat) as total_stok,(SELECT count(d.tanggal_expired) FROM tbl_sub_obat d WHERE d.kode_obat=a.kode_obat AND d.kode_rekam ='$kode_rekam') as jumlah_tanggal,(SELECT e.aturan_pakai FROM tbl_sub_obat e WHERE e.kode_obat=a.kode_obat AND e.kode_rekam ='$kode_rekam' LIMIT 1) as aturan_pakai,(SELECT sum(f.qty) FROM tbl_sub_obat f WHERE f.kode_obat=a.kode_obat AND f.kode_rekam ='$kode_rekam') as qty,(SELECT sum(g.subtotal) FROM tbl_sub_obat g WHERE g.kode_obat=a.kode_obat AND g.kode_rekam ='$kode_rekam') as subtotal FROM tbl_sub_obat a WHERE a.kode_rekam ='$kode_rekam'");
 		return $hasil->result();
 	}

 	public function detail_obat($kode_rekam)
 	{
 		$hasil = $this->db->query("SELECT qty,kode_obat,tanggal_expired FROM tbl_sub_obat WHERE kode_rekam ='$kode_rekam'");
 		return $hasil->result();
 	}



 	public function buat_kode_pembeli()
 	{
 		$this->db->select('RIGHT(tbl_pembelian_obat.kode_beli,6) as kode', FALSE);

 		$this->db->order_by('kode_beli', 'DESC');
 		$this->db->limit(1);
		$query = $this->db->get('tbl_pembelian_obat');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "POBAT" .'-'. $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}
	

}
