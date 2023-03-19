<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_skl extends CI_Model {  



	function buat_kode(){

		$this->db->select('RIGHT(tbl_kelahiran.kode_kelahiran,5) as kode', FALSE);

		$this->db->order_by('kode_kelahiran', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_kelahiran');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "KLH-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;

}

	public function cetak($id)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kelahiran WHERE id ='$id'");
		return $hasil->result(); 
	}


}
