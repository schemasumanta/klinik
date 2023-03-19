<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ranap extends CI_Model {

	public function tampil_data_ranap()
	{  
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_ranap DESC ");
		return $hasil->result();
	}

	public function tampil_data_tangah()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_ranap.status_pasien='Sedang Rawat Inap' ORDER BY id DESC ");

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

	public function observasi_ranap($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien WHERE kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}

	public function get_rincian_biaya($kode_ranap)
	{
		$hasil = $this->db->query("SELECT a.*,(SELECT b.total_akhir FROM tbl_pemeriksaan_lab b WHERE b.kode_rekam='$kode_ranap' AND b.sub_ranap=a.kode_observasi) as jumlah_lab,(SELECT SUM(c.subtotal) FROM tbl_sub_obat c WHERE c.kode_rekam='$kode_ranap' AND c.sub_ranap=a.kode_observasi) as biaya_obat FROM tbl_observasi_ranap a WHERE kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}
	public function get_list_observasi($kode_ranap)
	{
		$hasil = $this->db->query("SELECT tbl_observasi_ranap.*,tbl_pembayaran.status_pembayaran FROM tbl_observasi_ranap LEFT JOIN tbl_pembayaran on tbl_pembayaran.kode_rekam=tbl_observasi_ranap.kode_ranap WHERE kode_ranap ='$kode_ranap' ORDER BY tanggal_pemeriksaan ASC");
		return $hasil->result();
	}

	public function get_list_observasi_ranap($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_observasi_ranap WHERE kode_ranap ='$kode_ranap' ORDER BY tanggal_pemeriksaan ASC");
		return $hasil->result();
	}

	public function get_detail_observasi($kode_observasi)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_observasi_ranap  WHERE kode_observasi ='$kode_observasi'");
		return $hasil->result();
	}
	public function get_obat_observasi($kode_observasi,$kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_sub_obat JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat WHERE kode_rekam ='$kode_ranap' AND sub_ranap='$kode_observasi'");
		return $hasil->result();
	}

	public function get_data_laboratorium($kode_observasi,$kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab WHERE kode_rekam ='$kode_ranap' AND sub_ranap='$kode_observasi'");
		return $hasil->result();
	}

	public function periksa_kembali($kode_ranap)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_ranap JOIN tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien WHERE kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}

	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}

	public function consent_ranap($kode_ranap)
	{
		$hasil = $this->db->query("SELECT a.*,b.* FROM tbl_ranap a join tbl_pasien b on b.kode_pasien=a.kode_pasien  WHERE a.kode_ranap ='$kode_ranap'");
		return $hasil->result();
	}

	public function consent_ranap_obat($kode_ranap)
	{
		$hasil = $this->db->query("SELECT a.*,b.* FROM tbl_sub_obat a  JOIN tbl_satuan_obat b on b.kode_obat=a.kode_obat WHERE a.kode_rekam='$kode_ranap' ORDER BY a.kode_sub ASC");
		return $hasil->result();

	}

}
