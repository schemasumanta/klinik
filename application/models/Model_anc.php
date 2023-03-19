<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_anc extends CI_Model {
 
	 public function tampil_data_anc()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_kehamilan JOIN tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kehamilan.status_pasien='Belum Diperiksa' ORDER BY kode_kehamilan DESC ");

		return $hasil->result();
	}

	public function tampil_data_anc1()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kehamilan JOIN tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kehamilan.status_pasien='Sudah Diperiksa' ORDER BY kode_kehamilan DESC ");

		return $hasil->result();
	}

	public function getriwayatanc($kode_pasien){
		$hasil = $this->db->query("SELECT * FROM tbl_kehamilan WHERE kode_pasien ='$kode_pasien' AND status_pasien='Sudah Diperiksa' ORDER BY tanggal_berobat DESC LIMIT 5");
		return $hasil->result();
	}

	public function tarik_data_bytanggal_anc($tanggal_awal,$tanggal_akhir)
	{
		
		$hasil =$this->db->query("SELECT * FROM tbl_kehamilan JOIN tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");

		return $hasil->result();

	}

	public function periksa_pasien_anc($kode_kehamilan)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kehamilan JOIN tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien WHERE kode_kehamilan ='$kode_kehamilan'");

		return $hasil->result();
	}
	public function pemeriksaan_sebelumnya($kode_pasien,$kode_kehamilan)
	{
		$hasil = $this->db->query("SELECT uk,paritas,lila,hpht,htp FROM tbl_kehamilan  WHERE kode_pasien ='$kode_pasien' AND kode_kehamilan !='$kode_kehamilan' ORDER BY id DESC LIMIT 1");
		return $hasil->result();
	}

	public function edit_rekam_pasien_anc($kode_kehamilan)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kehamilan  join tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien join tbl_pembayaran on tbl_kehamilan.kode_kehamilan=tbl_pembayaran.kode_rekam WHERE tbl_kehamilan.kode_kehamilan='$kode_kehamilan'");
		return $hasil->result();

	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function detail_obat($kode_kehamilan)
	{
		$hasil = $this->db->query(" SELECT * FROM tbl_kehamilan join tbl_sub_obat on tbl_kehamilan.kode_kehamilan=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_kehamilan.kode_kehamilan  ='$kode_kehamilan'");

		return $hasil->result();
	
	} 


	public function detail_rekam_anc($kode_kehamilan)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kehamilan join tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_kehamilan.kode_kehamilan ='$kode_kehamilan'");
		
		return $hasil->result();
	}

 

	public function hapus_aksi_anc($kode_kehamilan)
	{
		$hasil=$this->db->query("DELETE FROM tbl_kehamilan WHERE kode_kehamilan='$kode_kehamilan'");
		return $hasil;
	}


}
