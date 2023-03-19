<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rekam_kb extends CI_Model {

	 public function tampil_data_rekam_kb()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_kb JOIN tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kb.status_pasien='Belum Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function tampil_data_rekam_kb1()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kb JOIN tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kb.status_pasien='Sudah Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function periksa_pasien_kb($kode_kb)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kb JOIN tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien WHERE kode_kb ='$kode_kb'");

		return $hasil->result();
	}

	public function getriwayatkb($kode_pasien){
		$hasil = $this->db->query("SELECT * FROM tbl_kb WHERE kode_pasien ='$kode_pasien' AND status_pasien='Sudah Diperiksa' ORDER BY tanggal_berobat DESC LIMIT 5");
		return $hasil->result();
	}

	public function list_obat($kode_rekam)
	{
		$hasil = $this->db->query("SELECT DISTINCT a.kode_obat,(SELECT b.nama_obat  FROM tbl_satuan_obat b WHERE b.kode_obat=a.kode_obat) as nama_obat,(SELECT c.satuan_obat  FROM tbl_satuan_obat c WHERE c.kode_obat=a.kode_obat) as satuan_obat,(SELECT h.harga_jual  FROM tbl_satuan_obat h WHERE h.kode_obat=a.kode_obat) as harga_jual,(SELECT i.total_stok  FROM tbl_satuan_obat i WHERE i.kode_obat=a.kode_obat) as total_stok,(SELECT count(d.tanggal_expired) FROM tbl_sub_obat d WHERE d.kode_obat=a.kode_obat AND d.kode_rekam ='$kode_rekam') as jumlah_tanggal,(SELECT e.aturan_pakai FROM tbl_sub_obat e WHERE e.kode_obat=a.kode_obat AND e.kode_rekam ='$kode_rekam' LIMIT 1) as aturan_pakai,(SELECT sum(f.qty) FROM tbl_sub_obat f WHERE f.kode_obat=a.kode_obat AND f.kode_rekam ='$kode_rekam') as qty,(SELECT sum(g.subtotal) FROM tbl_sub_obat g WHERE g.kode_obat=a.kode_obat AND g.kode_rekam ='$kode_rekam') as subtotal FROM tbl_sub_obat a WHERE a.kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}
	

	public function detail_rekam_kb($kode_kb)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kb join tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kb.kode_kb ='$kode_kb'");
		
		return $hasil->result();
	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function edit_rekam_pasien_kb($kode_kb)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kb join tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien join tbl_pembayaran on tbl_kb.kode_kb=tbl_pembayaran.kode_rekam WHERE tbl_kb.kode_kb='$kode_kb'");
		return $hasil->result();

	} 

	public function tarik_data_bytanggal_kb($tanggal_awal_kb,$tanggal_akhir_kb)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_kb JOIN tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien  WHERE 
			tanggal_periksa BETWEEN '$tanggal_awal_kb' AND '$tanggal_akhir_kb'");

		return $hasil->result();

	} 

	public function detail_obat($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_sub_obat JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat WHERE kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	

	public function hapus_aksi_kb($kode_kb)
	{
		$hasil=$this->db->query("DELETE FROM tbl_kb WHERE kode_kb='$kode_kb'");
		return $hasil;
	}


}
