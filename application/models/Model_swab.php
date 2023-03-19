<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_swab extends CI_Model {

	 
	public function tampil_swab()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_swab JOIN tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_swab.status_pasien='Belum Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function tampil_swab2()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_swab JOIN tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_swab.status_pasien='Sudah Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function periksa_pasien($kode_swab)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_swab JOIN tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien WHERE kode_swab ='$kode_swab'");

		return $hasil->result();
	}

	public function getdataswab($kode_swab)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_swab JOIN tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien WHERE kode_swab ='$kode_swab'");

		return $hasil->result();
	}

	public function num_rows_swab()
	{
		return $this->db->get('tbl_swab');
	}

}
