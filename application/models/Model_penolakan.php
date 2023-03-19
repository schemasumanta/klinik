<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penolakan extends CI_Model { 
 
 	public function tampil_penolakan()
 	{
 		$hasil = $this->db->query("SELECT * FROM tbl_surat_penolakan JOIN tbl_pasien on tbl_surat_penolakan.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_surat_penolakan DESC");

		return $hasil->result(); 
 	}


 // 	public function cetak($kode_surat_penolakan)
	// {
	// 	$hasil = $this->db->query("SELECT a.*,b.nama_pasien,b.umur,b.jk,b.alamat,b.no_registrasi FROM tbl_surat_penolakan a JOIN tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE kode_surat_penolakan ='$kode_surat_penolakan' ");
	// 	return $hasil->result(); 
	// }
  

}
