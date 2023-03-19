<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rujukan extends CI_Model { 



	public function cetak($kode)
	{
		$hasil = $this->db->query("SELECT a.*,b.nama_pasien,b.jk,b.alamat FROM tbl_rujukan a JOIN tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE kode_rujukan ='$kode' ");
		return $hasil->result(); 
	}




	function buat_kode(){
		$bulan_romawi = array(
			'01' => "I", 
			'02' => "II", 
			'03' => "III", 
			'04' => "IV", 
			'05' => "V", 
			'06' => "VI", 
			'07' => "VII", 
			'08' => "VIII", 
			'09' => "IX", 
			'10' => "X", 
			'11' => "XI", 
			'12' => "XII", 
		);

		$tahun = date('Y');
		$bulan = date('m');

		$this->db->select('LEFT(tbl_rujukan.kode_rujukan,4) as kode', FALSE);
		$this->db->where('YEAR(tanggal_rujukan)', $tahun);
		$this->db->where('MONTH(tanggal_rujukan)', $bulan);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);
		$query = $this->db->get('tbl_rujukan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi =$kodemax.'/RJK-HMS/'.$bulan_romawi[$bulan].'/'.$tahun ;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;


	}    

}
