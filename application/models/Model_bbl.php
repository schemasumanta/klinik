<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bbl extends CI_Model {
 
	 public function tampil_data_bbl()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_bbl JOIN tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_bbl.status_pasien='Belum Diperiksa' ORDER BY kode_bbl DESC ");

		return $hasil->result();
	}

	public function tampil_data_bbl1()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_bbl JOIN tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_bbl.status_pasien='Sudah Diperiksa' ORDER BY kode_bbl DESC ");

		return $hasil->result();
	}

	public function tarik_data_bytanggal_bbl($tanggal_awal_bbl,$tanggal_akhir_bbl)
	{
		
		$hasil =$this->db->query("SELECT * FROM tbl_bbl JOIN tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_bbl' AND '$tanggal_akhir_bbl'");

		return $hasil->result();

	}

	public function getriwayatbbl($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_bbl WHERE kode_pasien ='$kode_pasien' AND status_pasien='Sudah Diperiksa' ORDER BY tanggal_berobat DESC LIMIT 5");
		return $hasil->result();
	}

	public function hapus_aksi_bbl($kode_bbl)
	{
		$hasil=$this->db->query("DELETE FROM tbl_bbl WHERE kode_bbl='$kode_bbl'");
		return $hasil;
	}


	public function periksa_pasien_bbl($kode_bbl)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_bbl JOIN tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien WHERE kode_bbl ='$kode_bbl'");

		return $hasil->result();
	}


	public function edit_rekam_pasien_bbl($kode_bbl)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_bbl  join tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien join tbl_pembayaran on tbl_bbl.kode_bbl=tbl_pembayaran.kode_rekam WHERE tbl_bbl.kode_bbl='$kode_bbl'");
		return $hasil->result();

	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function detail_obat($kode_bbl)
	{
		$hasil = $this->db->query(" SELECT * FROM tbl_bbl join tbl_sub_obat on tbl_bbl.kode_bbl=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_bbl.kode_bbl  ='$kode_bbl'");

		return $hasil->result();
	
	} 
	public function detail_rekam_bbl($kode_bbl)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_bbl join tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_bbl.kode_bbl ='$kode_bbl'");
		
		return $hasil->result();
	}



	// public function detail_rekam_anc($kode_kehamilan)
	// {
	// 	$hasil = $this->db->query("SELECT * FROM tbl_kehamilan join tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kehamilan.kode_kehamilan ='$kode_kehamilan'");
		
	// 	return $hasil->result();
	// }

 

	// public function hapus_aksi_anc($kode_kehamilan)
	// {
	// 	$hasil=$this->db->query("DELETE FROM tbl_kehamilan WHERE kode_kehamilan='$kode_kehamilan'");
	// 	return $hasil;
	// }
}
