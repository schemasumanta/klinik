
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laboratorium extends CI_Model {
	public function get_status_lab($kode_rekam)
	{
		$hasil = $this->db->query("SELECT status_pasien FROM tbl_pemeriksaan_lab WHERE kode_rekam='$kode_rekam' ORDER BY kode_lab DESC ");
		$tampil = '';
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $key) {
				$tampil = $key->status_pasien;
			}
		}
		return $tampil;
	}
	public function buat_kode()
	{
		$this->db->select('RIGHT(tbl_pemeriksaan_lab.kode_lab,5) as kode', FALSE);
		$this->db->order_by('kode_lab', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_pemeriksaan_lab');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "LAB".'-'. $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function tampil_data_lab()
	{
		
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_lab DESC ");
		return $hasil->result();
	}

	public function tampil_data_listlab()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_lab DESC ");
		return $hasil->result();
	}
	public function tampil_data_lab_bykode($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien  WHERE kode_rekam='$kode_rekam'");
		return $hasil->result();
	}
	public function sub_lab_bykode($kode_lab)
	{
		$hasil = $this->db->query("SELECT a.*,b.*,(SELECT c.nama_kategori FROM tbl_kategori_lab c WHERE sub_kategori =b.sub_kategori LIMIT 1) as nama_kategori_utama FROM tbl_sub_lab a JOIN tbl_kategori_lab b on b.kode_kategori_lab=a.kode_kategori_lab  WHERE a.kode_lab='$kode_lab'  GROUP BY nama_kategori_utama ASC");
		return $hasil->result();
	}

	public function tarik_reportlab($tanggal_awal_lab,$tanggal_akhir_lab)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_pemeriksaan_lab JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_lab' AND '$tanggal_akhir_lab'");

		return $hasil->result();
	}
 
	public function periksa_pasien_labor($kode_lab)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab 
			JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien WHERE kode_lab ='$kode_lab'");

		// -- JOIN tbl_rekam_medik on tbl_pemeriksaan_lab.kode_rekam=tbl_rekam_medik.kode_rekam 

		return $hasil->result();
	}

	public function getkategori()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_kategori_lab WHERE sub_kategori!=0  ORDER BY nama_kategori ASC");
		return $hasil->result();
	}
	public function getkategoriutama()
	{
		$hasil=$this->db->query("SELECT DISTINCT a.sub_kategori as sub_kategori, (SELECT b.nama_kategori FROM tbl_kategori_lab b  WHERE b.sub_kategori = a.sub_kategori LIMIT 1) as nama_kategori FROM tbl_kategori_lab a ORDER BY a.sub_kategori ASC");
		return $hasil->result();
	}
	public function detail_laboratorium_pasien($kode_lab)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien WHERE kode_lab='$kode_lab' ORDER BY kode_lab DESC ");
		return $hasil->result();

	}
	public function detail_sub($kode_lab)
	{
		$hasil = $this->db->query("SELECT a.*, b.*,a.nilai_normal as nilai_normal_akhir FROM tbl_sub_lab a JOIN tbl_kategori_lab b on b.kode_kategori_lab=a.kode_kategori_lab WHERE a.kode_lab='$kode_lab'");

		return $hasil->result();
	}

	public function detail_sub_cetak($kode_lab)
	{
		$hasil = $this->db->query("SELECT 
			a.*,
			a.nilai_normal as nilai_normal_akhir,
			b.*,
			(SELECT c.nama_kategori FROM tbl_kategori_lab c where c.kode_kategori_lab = b.sub_kategori LIMIT 1) as nama_sub_kategori,
			(SELECT d.sub_kategori FROM tbl_kategori_lab d where d.nama_kategori = nama_sub_kategori AND d.kode_kategori_lab = b.sub_kategori LIMIT 1) as kode_sub_kategori,
			(SELECT e.nama_kategori FROM tbl_kategori_lab e where e.kode_kategori_lab = kode_sub_kategori LIMIT 1) as nama_main_kategori  
			FROM tbl_sub_lab a 
			JOIN tbl_kategori_lab b on b.kode_kategori_lab=a.kode_kategori_lab 
			WHERE a.kode_lab='$kode_lab' 
			ORDER BY a.kode_lab DESC");
		return $hasil->result();
	}

	 

	public function edit_data_lab($kode_lab)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pemeriksaan_lab JOIN tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien WHERE kode_lab='$kode_lab'");
		return $hasil->result();

	}

	public function subkategori()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_kategori_lab ORDER BY sub_kategori ASC");
		return $hasil->result();
		
		// $hasil=$this->db->query("SELECT * FROM tbl_satuan_obat ORDER BY nama_obat ASC");
		// return $hasil->result();
	}
	// 	public function getnamaobat()
	// {
	// 	$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat ORDER BY nama_obat ASC ");
	// 	return $hasil->result();
	// }
}
