<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_medis extends CI_Model { 

	public function tampil_data_medis()
	{
		return $this->db->get('tbl_medis')->result();
	}

	public function hapus_aksi_medis($kode_medis)
	{
		$hasil=$this->db->query("DELETE FROM tbl_medis WHERE kode_medis='$kode_medis'");
		return $hasil;
	}

	public function edit_medis($kode_medis)
	{
		$hasil=$this->db->query("SELECT * FROM tbl_medis WHERE kode_medis='$kode_medis'");
		return $hasil->result();
	}



	public function buat_kode()
	{
		$this->db->select('RIGHT(tbl_medis.kode_medis,3) as kode', FALSE);

		$this->db->order_by('kode_medis', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_medis');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "TM-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}


	 



}
