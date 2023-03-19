<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_satuan_obat extends CI_Model {

	
	public function tampil_satuan()
	{
		return $this->db->get('tbl_satuan_obat')->result();
		
	}

	public function get_namaobat()
	{
		return $this->db->get('tbl_satuan_obat')->result();
		
	}

	public function tarik_pemakaian_obat($bulan,$tahun)
	{
		$hasil = $this->db->query("SELECT  a.*,(SELECT SUM(b.qty) FROM tbl_sub_obat b WHERE b.kode_obat=a.kode_obat AND YEAR(b.tanggal_input)='$tahun' AND MONTH(b.tanggal_input)) as jumlah,(SELECT SUM(c.subtotal) FROM tbl_sub_obat c WHERE c.kode_obat=a.kode_obat AND YEAR(c.tanggal_input)='$tahun' AND MONTH(c.tanggal_input)) as total FROM tbl_satuan_obat a ORDER BY jumlah DESC ");
		return $hasil->result(); 
	}

	public function get_history_obat(){
		$hasil = $this->db->query("SELECT  kode_obat, nama_obat FROM tbl_satuan_obat ORDER BY nama_obat ASC ");
		return $hasil->result(); 
	}

	public function tampil_list_history_obat($kode_obat)
	{
		return $this->db->query("SELECT * FROM tbl_log_stok_obat WHERE kode_obat='$kode_obat' ORDER BY kode_log ASC")->result();
	}

	public function edit_satuan_obat($kode_obat)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_satuan_obat WHERE kode_obat ='$kode_obat' ");

		return $hasil->result();
	}
	public function tarik_laporan()
	{
		$hasil = $this->db->query("SELECT a.*,(SELECT count(b.tanggal_expired) FROM tbl_expired_obat b WHERE b.kode_obat=a.kode_obat AND b.qty!=0 )as jumlah_tanggal FROM tbl_satuan_obat a ORDER BY a.kode_obat ASC");
		return $hasil->result(); 
	}

	public function getstokobatbykode($kode_obat)
	{
		$hasil= $this->db->query("SELECT total_stok FROM tbl_satuan_obat WHERE kode_obat='$kode_obat'");
		return $hasil->result();
	}
	
	// public function update_data($kode_obat,$nama_obat,$harga_beli,$harga_jual,$satuan_obat,$stok_awal,$stok_akhir,$total_stok,$status_obat)
	// {
	// 	$hasil = $this->db->query("UPDATE tbl_satuan_obat SET nama_obat ='$nama_obat', harga_beli ='$harga_beli' , harga_jual ='$harga_jual' , satuan_obat ='$satuan_obat', stok_awal =stok_awal, stok_akhir ='$stok_akhir', total_stok ='$total_stok', status_obat ='$status_obat' WHERE kode_obat ='$kode_obat'");

	// 	return $hasil; 

	// }



	function insert($data)
	{
		$this->db->insert_batch('tbl_satuan_obat', $data);
	}

	public function getstok($total_stok)
	{
		$hasil=$this->db->query("SELECT nama_obat,harga_beli,harga_jual,satuan_obat,stok_akhir FROM tbl_satuan_obat WHERE total_stok ='$total_stok' ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}


	function get_kode_obat(){

		$this->db->select('RIGHT(tbl_satuan_obat.kode_obat,3) as kode', FALSE);

		$this->db->order_by('kode_obat', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_satuan_obat');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "OB" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	

}
