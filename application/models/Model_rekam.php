<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rekam extends CI_Model {


	public function tampil_data_rekam()
	{
		
		// return $this->db->get('tbl_tamp_rekam_medik ')->result();
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik JOIN tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_rekam_medik.status_pasien='Belum Diperiksa'  ORDER BY id DESC");

		return $hasil->result();
	}

	public function detail_obat($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_sub_obat JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat WHERE kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function get_penyakit()
	{
		return $this->db->query("SELECT * FROM tbl_penyakit")->result();
		
	}

	public function periksa_pasien($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik JOIN tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien WHERE kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function getriwayatpasien($kode_pasien){
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik WHERE kode_pasien ='$kode_pasien' AND status_pasien='Sudah Diperiksa' ORDER BY tanggal_berobat DESC LIMIT 5");
		return $hasil->result();
	}

	public function detail_rekam_umum($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_rekam_medik.kode_rekam ='$kode_rekam'");
		
		return $hasil->result();
	}

	public function hapus_aksi_pasien($kode_rekam)
	{
		$hasil=$this->db->query("DELETE FROM tbl_rekam_medik WHERE kode_rekam='$kode_rekam'");	
		return $hasil;
	}

	public function tampil_data_hasil_rekam()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik JOIN tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_rekam_medik.status_pasien='Sudah Diperiksa'  ORDER BY id DESC"); 
		return $hasil->result(); 
	} 

	public function tarik_data_bytanggal_umum($tanggal_awal_umum,$tanggal_akhir_umum)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_rekam_medik JOIN tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien  WHERE tanggal_periksa BETWEEN '$tanggal_awal_umum' AND '$tanggal_akhir_umum'");

		return $hasil->result();

	}

	// public function jumlahpasien($tanggal,$dokter_pemeriksa)
	// {
	// 	$hasil=$this->db->query("SELECT * FROM tbl_rekam_medik join tbl_pasien on tbl_rekam_medik.kode = tbl_pasien.kode_pasien WHERE dokter_pemeriksa='$dokter_pemeriksa' AND tanggal_periksa='$tanggal_periksa' AND tbl_pasien.tanggal_hari_izin='$tanggal'");
	// 	return $hasil->result();
	// }

	public function num_rows_rekam($dokter,$tanggal)
	{
		$hasil=$this->db->query("SELECT * FROM tbl_rekam_medik WHERE tanggal_periksa='$tanggal' AND dokter_pemeriksa='$dokter' AND status_pasien='Sudah Diperiksa' ");
		return $hasil;
	}


	public function getnamaobat()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat WHERE total_stok!=0 AND status_obat=1 ORDER BY nama_obat ASC");
		return $hasil->result();
	}
	

	public function tampil_obat($nama_obat)
	{
		$tampil = $this->db->query("SELECT * FROM tbl_satuan_obat WHERE nama_obat='$nama_obat' ASC");
		if ($tampil->num_rows() > 0) {
			foreach ($tampil->result() as $data) {
				$hasil_tampil = array(
					// 'nama_produk' => $data->nama_produk,
					'kode_obat' => $data->kode_obat,
					'satuan_obat' => $data->satuan_obat,
					'harga_jual' => $data->harga_jual,
					'total_stok' => $data->total_stok, 

				);
			}
		}
		return $hasil_tampil;
	}

	public function data_list()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_tamp_obat");
		return $hasil->result();
	}

	public function detail_rekam_pasien($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien LEFT JOIN tbl_penyakit on  tbl_rekam_medik.penyakit=tbl_penyakit.kode_penyakit WHERE tbl_rekam_medik.kode_rekam ='$kode_rekam'");
		
		return $hasil->result();

	}



	public function get_rekam_penyakit($tahun,$bulan)
	{
		$hasil = $this->db->query("SELECT a.*,b.penyakit,c.jk,c.tanggal_lahir FROM tbl_penyakit a JOIN tbl_rekam_medik b on b.penyakit=a.kode_penyakit JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE MONTH(b.tanggal_periksa)='$bulan' AND YEAR(b.tanggal_periksa)='$tahun'");
		
		return $hasil->result();

	}


	public function observasi_pasien($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_rekam_medik.kode_rekam ='$kode_rekam'");
		
		return $hasil->result();

	}

	public function edit_rekam_pasien($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik  join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien join tbl_pembayaran on tbl_rekam_medik.kode_rekam=tbl_pembayaran.kode_rekam WHERE tbl_rekam_medik.kode_rekam='$kode_rekam'");
		return $hasil->result();

	}

	public function list_obat($kode_rekam)
	{
		$hasil = $this->db->query("SELECT DISTINCT a.kode_obat,(SELECT b.nama_obat  FROM tbl_satuan_obat b WHERE b.kode_obat=a.kode_obat) as nama_obat,(SELECT c.satuan_obat  FROM tbl_satuan_obat c WHERE c.kode_obat=a.kode_obat) as satuan_obat,(SELECT h.harga_jual  FROM tbl_satuan_obat h WHERE h.kode_obat=a.kode_obat) as harga_jual,(SELECT i.total_stok  FROM tbl_satuan_obat i WHERE i.kode_obat=a.kode_obat) as total_stok,(SELECT count(d.tanggal_expired) FROM tbl_sub_obat d WHERE d.kode_obat=a.kode_obat AND d.kode_rekam ='$kode_rekam') as jumlah_tanggal,(SELECT e.aturan_pakai FROM tbl_sub_obat e WHERE e.kode_obat=a.kode_obat AND e.kode_rekam ='$kode_rekam' LIMIT 1) as aturan_pakai,(SELECT sum(f.qty) FROM tbl_sub_obat f WHERE f.kode_obat=a.kode_obat AND f.kode_rekam ='$kode_rekam') as qty,(SELECT sum(g.subtotal) FROM tbl_sub_obat g WHERE g.kode_obat=a.kode_obat AND g.kode_rekam ='$kode_rekam') as subtotal FROM tbl_sub_obat a WHERE a.kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	


	public function getrekampertahun($pasien,$tahun)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien join tbl_admin on tbl_rekam_medik.dokter_pemeriksa=tbl_admin.nama_admin  WHERE tbl_rekam_medik.kode_pasien ='$pasien' AND YEAR(tanggal_berobat)='$tahun'");
		
		return $hasil->result();

	}

	public function getobatpertahun($pasien,$tahun)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_rekam_medik JOIN tbl_sub_obat  on tbl_rekam_medik.kode_rekam=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_rekam_medik.kode_pasien ='$pasien' AND YEAR(tanggal_berobat)='$tahun'");

		return $hasil->result();

	}




	public function stok()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_satuan_obat ");
		return $hasil->result();
	}


	public function tampil($nama_obat)
	{
		$tampil = $this->db->query("SELECT * FROM tbl_satuan_obat WHERE nama_obat='$nama_obat'");
		if ($tampil->num_rows() > 0) {
			foreach ($tampil->result() as $data) {
				$hasil_tampil = array(
					// 'nama_produk' => $data->nama_produk,
					'kode_obat' => $data->kode_obat,
					'harga_jual' => $data->harga_jual, 
				);
			}
		}
		return $hasil_tampil;
	}

	public function buat_kode_pembayaran()
	{
		$this->db->select('RIGHT(tbl_pembayaran.kode_pembayaran,5) as kode', FALSE);

		$this->db->order_by('kode_pembayaran', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_pembayaran');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PEMB" .'-'. $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}


}
