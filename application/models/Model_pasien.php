<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pasien extends CI_Model { 

	public function tampil_data_pasien()
	{
		// return $this->db->get('tbl_pasien')->result();

		$hasil = $this->db->query("SELECT * FROM tbl_pasien  ORDER BY kode_pasien DESC");

		return $hasil->result(); 
	}

	public function list_all_pasien()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien");

		return $hasil->result();
	}

	public function list_all_pasien_sakit()
	{
		$hasil = $this->db->query("SELECT kode_pasien,nama_pasien,kepala_keluarga FROM tbl_pasien");

		return $hasil->result();
	}

	public function tampil_kartu()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien  ORDER BY kode_pasien DESC");

		return $hasil->result(); 
	}

	public function get_list_dokter()
	{
		$hasil = $this->db->query("SELECT nama_admin FROM tbl_admin WHERE level='dokter' OR level='bidan'  ORDER BY nama_admin ASC");

		return $hasil->result(); 
	}

	public function tampil_data_tagihan()
	{


		$hasil = $this->db->query("SELECT * FROM tbl_pasien WHERE  kredit > 0 ORDER BY nama_pasien ASC");

		return $hasil->result(); 
	}
	public function tampil_data_pembayaran_tagihan()
	{
		$hasil = $this->db->query("SELECT a.*, b.nama_pasien FROM tbl_tagihan_pasien a join tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE kode_pembayaran_tagihan!='0'");
		return $hasil->result(); 
	}

	public function tampil_bykode($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien WHERE kode_pasien='$kode_pasien'");
		return $hasil->result(); 
	}

	public function tampil_data_pembayaran_tagihan_bykode($kode_pembayaran_tagihan)
	{
		$hasil = $this->db->query("SELECT a.*, b.nama_pasien,b.no_registrasi FROM tbl_tagihan_pasien a join tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE a.kode_tagihan='$kode_pembayaran_tagihan'");
		return $hasil->result(); 
	}


	public function tampil_data_detail_tagihan_bykode($kode_pembayaran_tagihan)
	{

		// $hasil = $this->db->query("SELECT * FROM tbl_tagihan_pasien WHERE kode_pembayaran_tagihan='$kode_pembayaran_tagihan'");


		$hasil = $this->db->query("SELECT a.*, b.nama_pasien,b.no_registrasi FROM tbl_tagihan_pasien a join tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE a.kode_tagihan='$kode_pembayaran_tagihan'");
		return $hasil->result(); 
	}


	

	public function hapus_aksi_pasien($kode_pasien)
	{
		$hasil=$this->db->query("DELETE FROM tbl_pasien WHERE kode_pasien='$kode_pasien'");
		return $hasil;
	}

	public function cetak($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien WHERE kode_pasien ='$kode_pasien' ");

		return $hasil->result(); 
	}

	public function buat_surat($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien WHERE kode_pasien ='$kode_pasien' "); 
		return $hasil->result();	
	}



	public function tarik_data_bytanggal($tanggal_awal,$tanggal_akhir)
	{
		
		$hasil =$this->db->query("SELECT * FROM tbl_pasien WHERE tanggal_daftar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'"); 
		return $hasil->result();

	}

	public function tarik_data_tagihan()
	{
		
		$hasil =$this->db->query("SELECT * FROM tbl_pasien WHERE kredit > 0 ORDER BY nama_pasien ASC"); 
		return $hasil->result();

	}

	public function tarik_laporan()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien ");

		return $hasil->result(); 
	}

	public function cetak_laporan()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien ");

		return $hasil->result();
	}

	public function edit_pasien($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien WHERE kode_pasien ='$kode_pasien' ");

		return $hasil->result();
	}

	public function daftarkan_pasien($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pasien WHERE kode_pasien ='$kode_pasien'");

		return $hasil->result();
	}

	public function edit_aksi($where,$data,$table)
	{ 
		$this->db->where($where);
		$this->db->update($table,$data); 
	}
	public function get_tagihan_pasien($kode_pasien)
	{
		$hasil = $this->db->query("SELECT kredit FROM tbl_pasien WHERE kode_pasien ='$kode_pasien'");
		$kredit =0;
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $key) {
				$kredit = $key->kredit;
			}
		}
		return $kredit;
	}

	public function get_history_tagihan_pasien($kode_pasien)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_tagihan_pasien WHERE kode_pasien ='$kode_pasien' ORDER BY kode_tagihan ASC");
		$tampil = array();

		foreach ($hasil->result() as $key) {

			$tampil[]= array(
				'kode_pasien' => $key->kode_pasien,
				'tanggal_input' => date_format(date_create($key->tanggal_input),'d-m-Y'),
				'tagihan_awal' => number_format(floatval($key->tagihan_awal), 0, ',', '.'),
				'tagihan_dibayarkan' => number_format(floatval($key->tagihan_dibayarkan), 0, ',', '.'),
				'penambahan_tagihan' => number_format(floatval($key->penambahan_tagihan), 0, ',', '.'),
				'sisa_tagihan' => number_format(floatval($key->sisa_tagihan), 0, ',', '.'),
				'keterangan' => $key->keterangan,
			);
		}
		return $tampil;
	}
	public function get_nama_pasien($kode_pasien)
	{
		$hasil = $this->db->query("SELECT nama_pasien FROM tbl_pasien WHERE kode_pasien ='$kode_pasien'");
		$nama ='';
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $key) {
				$nama = $key->nama_pasien;
			}
		}
		return $nama;
	}


	// function get_no_registrasi(){
 //        $q = $this->db->query("SELECT MAX(RIGHT(no_registrasi,6)) AS kd_max FROM tbl_pasien WHERE DATE(tanggal_daftar)=CURDATE()");
 //        $kd = "";
 //        if($q->num_rows()>0){
 //            foreach($q->result() as $k){
 //                $tmp = ((int)$k->kd_max)+1;
 //                $kd = sprintf("%06s", $tmp);
 //            }
 //        }else{
 //            $kd = "000001";
 //        }
 //        date_default_timezone_set('Asia/Jakarta');
 //        return date('y').$kd;
 //    } 

	function get_no_registrasi(){

		$this->db->select('RIGHT(tbl_pasien.no_registrasi,6) as kode', FALSE);

		$this->db->order_by('no_registrasi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi =date('y'). $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	} 


	




	function buat_kode(){

		$this->db->select('RIGHT(tbl_pasien.kode_pasien,5) as kode', FALSE);

		$this->db->order_by('kode_pasien', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PS-KBR-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}
	function buat_kode_tagihan(){

		$this->db->select('RIGHT(tbl_tagihan_pasien.kode_pembayaran_tagihan,5) as kode', FALSE);
		$this->db->order_by('kode_tagihan', 'DESC');
		$this->db->where('kode_pembayaran_tagihan <>', 'null');
		$this->db->limit(1);
		$query = $this->db->get('tbl_tagihan_pasien');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 5 menunjukkan jumlah digit angka 0
		$kodejadi = "PEMB-TGHN-" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}



	function get_kode_rekam(){

		$this->db->select('RIGHT(tbl_rekam_medik.kode_rekam,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_rekam_medik');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-UM".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}




	function get_kode_kab(){

		$this->db->select('RIGHT(tbl_kb.kode_kb,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_kb');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-KB".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}


	function get_kode_anc(){

		$this->db->select('RIGHT(tbl_kehamilan.kode_kehamilan,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_kehamilan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-ANC".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}
	function get_kode_inc(){

		$this->db->select('RIGHT(tbl_inc.kode_inc,6) as kode', FALSE);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_inc');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-INC".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_imunisasi()
	{
		$this->db->select('RIGHT(tbl_imunisasi.kode_imunisasi,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_imunisasi');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-IMN".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_bbl()
	{
		$this->db->select('RIGHT(tbl_bbl.kode_bbl,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_bbl');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-BBL".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_nifas()
	{
		$this->db->select('RIGHT(tbl_nifas.kode_nifas,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_nifas');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-NFS".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_swab()
	{
		$this->db->select('RIGHT(tbl_swab.kode_swab,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_swab');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-SWAB".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_surat_penolakan()
	{
		$this->db->select('RIGHT(tbl_surat_penolakan.kode_surat_penolakan,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_surat_penolakan');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PNLK".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}


	public function get_kode_ranap()
	{
		$this->db->select('RIGHT(tbl_ranap.kode_ranap,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_ranap');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RANAP".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_homecare()
	{
		$this->db->select('RIGHT(tbl_homecare.kode_homecare,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_homecare');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "HCR".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_no_lab_swab()
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->db->select('RIGHT(tbl_swab.no_lab,6) as kode', FALSE);

		$this->db->order_by('no_lab', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_swab');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "LAB/".date('dmy-H:i').'/'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_rapid()
	{
		$this->db->select('RIGHT(tbl_rapid.kode_rapid,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_rapid');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-RPD".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_laboratorium()
	{

		$this->db->select('RIGHT(tbl_laboratorium.kode_labor,6) as kode', FALSE);

		$this->db->order_by('kode_labor', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_laboratorium');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "LAB".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}



	public function get_no_lab_rapid()
	{
		$this->db->select('RIGHT(tbl_rapid.no_lab,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_rapid');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "LAB/".date('y').'/'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function get_kode_home_care()
	{
		$this->db->select('RIGHT(tbl_home_care.kode_home_care,6) as kode', FALSE);

		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_home_care');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "RKM-HMCR/".date('y/H:i').'-'.$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}









}
