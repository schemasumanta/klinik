<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nifas extends CI_Model {

 
	public function tampil_data_nifas()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_nifas JOIN tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_nifas.status_pasien='Belum Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function tampil_data_nifas1()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_nifas JOIN tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_nifas.status_pasien='Sudah Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function getriwayatnifas($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_nifas WHERE kode_pasien ='$kode_pasien' AND status_pasien='Sudah Diperiksa' ORDER BY tanggal_berobat DESC LIMIT 5");
		return $hasil->result();
	}

	public function periksa_pasien_nifas($kode_nifas)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_nifas JOIN tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien WHERE kode_nifas ='$kode_nifas'");

		return $hasil->result();
	}

	public function detail_rekam_nifas($kode_nifas)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_nifas join tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_nifas.kode_nifas ='$kode_nifas'");
		
		return $hasil->result();
	}

	public function detail_obat($kode_nifas)
	{
		$hasil = $this->db->query(" SELECT * FROM tbl_nifas join tbl_sub_obat on tbl_nifas.kode_nifas=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_nifas.kode_nifas  ='$kode_nifas'");

		return $hasil->result();
	}


	public function edit_rekam_pasien_nifas($kode_nifas)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_nifas  join tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien join tbl_pembayaran on tbl_nifas.kode_nifas=tbl_pembayaran.kode_rekam WHERE tbl_nifas.kode_nifas='$kode_nifas'");
		return $hasil->result();
	}

	public function hapus_aksi_nifas($kode_nifas)
	{
		$hasil=$this->db->query("DELETE FROM tbl_nifas WHERE kode_nifas='$kode_nifas'");
		return $hasil;
	}

	
	public function tarik_data_bytanggal_nifas($tanggal_awal_nifas,$tanggal_akhir_nifas)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_nifas JOIN tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_nifas' AND '$tanggal_akhir_nifas'");

		return $hasil->result();
	}


}
