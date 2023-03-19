<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_imunisasi extends CI_Model {
 
	  public function tampil_data_imunisasi()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_imunisasi JOIN tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_imunisasi.status_pasien='Belum Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function tampil_data_imunisasi1()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_imunisasi JOIN tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_imunisasi.status_pasien='Sudah Diperiksa' ORDER BY id DESC ");

		return $hasil->result();
	}

	public function getriwayatimunisasi($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_imunisasi WHERE kode_pasien ='$kode_pasien' AND status_pasien='Sudah Diperiksa' ORDER BY tanggal_berobat DESC LIMIT 5");
		return $hasil->result();
	}

	public function periksa_pasien_imunisasi($kode_imunisasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_imunisasi JOIN tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien WHERE kode_imunisasi ='$kode_imunisasi'");

		return $hasil->result();
	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}
	public function hapus_aksi_imunisasi($kode_imunisasi)
	{
		$hasil=$this->db->query("DELETE FROM tbl_imunisasi WHERE kode_imunisasi='$kode_imunisasi'");
		return $hasil;
	}


	public function detail_rekam_imunisasi($kode_imunisasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_imunisasi join tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_imunisasi.kode_imunisasi ='$kode_imunisasi'");
		
		return $hasil->result();
	}


	public function detail_obat($kode_imunisasi)
	{
		$hasil = $this->db->query(" SELECT * FROM tbl_imunisasi join tbl_sub_obat on tbl_imunisasi.kode_imunisasi=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_imunisasi.kode_imunisasi  ='$kode_imunisasi'");

		return $hasil->result();
	
	} 

	public function edit_rekam_pasien_imunisasi($kode_imunisasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_imunisasi  join tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien join tbl_pembayaran on tbl_imunisasi.kode_imunisasi=tbl_pembayaran.kode_rekam WHERE tbl_imunisasi.kode_imunisasi='$kode_imunisasi'");
		return $hasil->result();
	}

	public function tarik_data_bytanggal_imunisasi($tanggal_awal_imunisasi,$tanggal_akhir_imunisasi)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_imunisasi JOIN tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_imunisasi' AND '$tanggal_akhir_imunisasi'");

		return $hasil->result();
	}

	 
}
