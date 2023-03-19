<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rapid extends CI_Model {

	 
	public function tampil_rapid()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rapid JOIN tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_rapid.status_pasien='Belum Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function tampil_rapid2()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rapid JOIN tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_rapid.status_pasien='Sudah Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function periksa_pasien($kode_rapid)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rapid JOIN tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien WHERE kode_rapid ='$kode_rapid'");

		return $hasil->result();
	}

	public function getdatarapid($kode_rapid)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rapid JOIN tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien WHERE kode_rapid ='$kode_rapid'");

		return $hasil->result();
	}

	public function num_rows_rapid()
	{
		return $this->db->get('tbl_rapid');
	}

}
