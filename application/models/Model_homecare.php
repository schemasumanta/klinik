<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_homecare extends CI_Model {

	public function tampil_data_homecare()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_homecare JOIN tbl_pasien on tbl_homecare.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_homecare DESC ");
		return $hasil->result();
	}

	public function tampil_data_tangah()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_homecare JOIN tbl_pasien on tbl_homecare.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_homecare.status_pasien='Sedang Rawat Jalan' ORDER BY id DESC ");

		return $hasil->result();
	} 

	public function lihat_stok($kode_obat)
	{
		$hasil = $this->db->query("SELECT total_stok FROM tbl_satuan_obat WHERE kode_obat='$kode_obat'");

		$stok =0;

		foreach ($hasil->result() as $key) {
			$stok+=$key->total_stok;
		}

		return $stok;
	}

	public function observasi_homecare($kode_homecare)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_homecare JOIN tbl_pasien on tbl_homecare.kode_pasien=tbl_pasien.kode_pasien WHERE kode_homecare ='$kode_homecare'");
		return $hasil->result();
	}

	public function get_rincian_biaya($kode_homecare)
	{
		$hasil = $this->db->query("SELECT a.*,(SELECT b.total_akhir FROM tbl_pemeriksaan_lab b WHERE b.kode_rekam='$kode_homecare' AND b.sub_homecare=a.kode_observasi) as jumlah_lab,(SELECT SUM(c.subtotal) FROM tbl_sub_obat c WHERE c.kode_rekam='$kode_homecare' AND c.sub_homecare=a.kode_observasi) as biaya_obat FROM tbl_observasi_homecare a WHERE kode_homecare ='$kode_homecare'");
		return $hasil->result();
	}
	public function get_list_observasi($kode_homecare)
	{
		$hasil = $this->db->query("SELECT tbl_observasi_homecare.*,tbl_pembayaran.status_pembayaran FROM tbl_observasi_homecare LEFT JOIN tbl_pembayaran on tbl_pembayaran.kode_rekam=tbl_observasi_homecare.kode_homecare WHERE kode_homecare ='$kode_homecare' ORDER BY tanggal_pemeriksaan ASC");
		return $hasil->result();
	}

	public function get_detail_observasi($kode_observasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_observasi_homecare  WHERE kode_observasi ='$kode_observasi'");
		return $hasil->result();
	}
	public function get_obat_observasi($kode_observasi,$kode_homecare)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_sub_obat JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat WHERE kode_rekam ='$kode_homecare' AND sub_homecare='$kode_observasi'");
		return $hasil->result();
	}

	public function get_data_laboratorium($kode_observasi,$kode_homecare)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab WHERE kode_rekam ='$kode_homecare' AND sub_homecare='$kode_observasi'");
		return $hasil->result();
	}

	public function periksa_kembali($kode_homecare)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_homecare JOIN tbl_pasien on tbl_homecare.kode_pasien=tbl_pasien.kode_pasien WHERE kode_homecare ='$kode_homecare'");
		return $hasil->result();
	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function consent_homecare($kode_homecare)
	{
		$hasil = $this->db->query("SELECT a.*,b.* FROM tbl_homecare a join tbl_pasien b on b.kode_pasien=a.kode_pasien  WHERE a.kode_homecare ='$kode_homecare'");
		return $hasil->result();
	}

	public function consent_homecare_obat($kode_homecare)
	{
		$hasil = $this->db->query("SELECT a.*,b.* FROM tbl_sub_obat a  JOIN tbl_satuan_obat b on b.kode_obat=a.kode_obat WHERE a.kode_rekam='$kode_homecare' ORDER BY a.kode_sub ASC");
		return $hasil->result();

	}

}
