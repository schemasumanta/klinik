<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kasir extends CI_Model {

	 
	public function tampil_data_pembayaran_obat()
	{
		return $this->db->get('tampil_data_pembayaran_obat')->result();
	}

	public function periksa_pasien($no_registrasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_tamp_rekam_medik WHERE no_registrasi ='$no_registrasi'");

		return $hasil->result();
	}

	public function tampil_data_hasil_rekam()
	{
		return $this->db->get('tbl_rekam_medik')->result();
		
	}


}
