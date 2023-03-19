<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_surat extends CI_Model { 

	public function tampil_surat()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_surat JOIN tbl_pasien on tbl_surat.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_surat DESC");

		return $hasil->result(); 
	}


	public function cetak($kode_surat)
	{
		$hasil = $this->db->query("SELECT a.*,b.nama_pasien,b.umur,b.jk,b.alamat,b.no_registrasi FROM tbl_surat a JOIN tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE id ='$kode_surat' ");
		return $hasil->result(); 
	}




	function buat_kode($keterangan){

		$tahun = date('Y');
		$bulan = date('m');
		$this->db->select('RIGHT(tbl_surat.kode_surat,6) as kode', FALSE);
		$this->db->where('YEAR(tanggal_pembuatan_surat)', $tahun);
		$this->db->where('MONTH(tanggal_pembuatan_surat)', $bulan);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);
		$query = $this->db->get('tbl_surat');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi ='SKS-'.date('m-y-').$kodemax ;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;


	}    

}
