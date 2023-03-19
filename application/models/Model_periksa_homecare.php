<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_periksa_homecare extends CI_Model {
 
	 public function tampil_data_ranap()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_ranap DESC ");
		return $hasil->result();
	}

	public function tampil_data_tangah()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_ranap.status_pasien='Sedang Rawat Inap' ORDER BY id DESC ");

		return $hasil->result();
	} 

	public function lihat_stok($kode_obat)
	{
		$hasil = $this->db->query("SELECT total_stok FROM tbl_satuan_obat WHERE kode_obat='$kode_obat'");

		$stok =0;

		foreach ($hasil->result() as $key) {
			$stok+=$key->total_stok;
		}

		return $stok;
	}

	public function observasi_ranap($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien WHERE kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}

	public function get_list_observasi($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_observasi_ranap WHERE kode_ranap ='$kode_ranap' ORDER BY tanggal_pemeriksaan ASC");
		return $hasil->result();
	}
	public function get_detail_observasi($kode_observasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_observasi_ranap WHERE kode_observasi ='$kode_observasi'");
		return $hasil->result();
	}
	public function get_obat_observasi($kode_observasi)
	{
		$kode_rekam = "OBS-RANAP-".$kode_observasi;
		
		$hasil = $this->db->query("SELECT * FROM tbl_sub_obat JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat WHERE kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function periksa_kembali($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien WHERE kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}

	public function observasi($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM  tbl_observasi_ranap   WHERE kode_ranap ='RANAP21/10:21-000001'");
		return $hasil->result();
	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function consent_ranap($kode_ranap)
	{
		$hasil = $this->db->query("SELECT a.*,b.* FROM tbl_ranap a join tbl_pasien b on b.kode_pasien=a.kode_pasien  WHERE a.kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}

}
