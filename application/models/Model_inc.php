<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_inc extends CI_Model {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('inc/tampilan_inc');
		$this->load->view('template/footer');
	}
	public function tampil_data_inc()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_inc JOIN tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien  ORDER BY kode_inc DESC ");
		return $hasil->result();
	}

	public function tampildata_inc1()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_inc JOIN tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_inc.status_pasien='Sudah Diperiksa' ORDER BY kode_inc DESC");
		return $hasil->result();
	}

	public function periksa_pasien_inc($kode_inc)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_inc JOIN tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien WHERE kode_inc ='$kode_inc'");
		return $hasil->result();
	}

	
	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function detail_obat_bykode($kode_inc)
	{
		$hasil=$this->db->query("SELECT * FROM tbl_sub_obat join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE kode_rekam ='$kode_inc' ORDER BY kode_sub ASC");
		return $hasil->result();
	}

	public function tarik_data_bytanggal_inc($tanggal_awal_inc,$tanggal_akhir_inc)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_inc JOIN tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_inc' AND '$tanggal_akhir_inc'");

		return $hasil->result();
	}

	public function hapus_aksi_inc($kode_inc)
	{
		$hasil=$this->db->query("DELETE FROM tbl_inc WHERE kode_inc='$kode_inc'");
		return $hasil;
	}
}
