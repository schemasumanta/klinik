<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan_kohort extends CI_Model {

	public function tarik_kohortkb_bytanggal($tanggal_awal_kb,$tanggal_akhir_kb)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_kb JOIN tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_kb' AND '$tanggal_akhir_kb'");

		return $hasil->result();
	}

	public function tarik_kohortbayi_bytanggal($tanggal_awal_bayi,$tanggal_akhir_bayi)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_bbl JOIN tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_bayi' AND '$tanggal_akhir_bayi'");

		return $hasil->result();
	}

	public function tarik_kohortibu_bytanggal($tanggal_awal_ibu,$tanggal_akhir_ibu)
	{

	 $hasil =$this->db->query("SELECT * FROM tbl_kehamilan JOIN tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_ibu' AND '$tanggal_akhir_ibu'");

		return $hasil->result();
	}
 
}
