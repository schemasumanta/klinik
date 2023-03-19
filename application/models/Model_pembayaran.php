<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembayaran extends CI_Model {

	public function tampil_pembayaran()
	{
		// return $this->db->get('tbl_pembayaran')->result();
		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pasien on tbl_pembayaran.kode_pasien=tbl_pasien.kode_pasien ORDER BY kode_pembayaran DESC");
		return $hasil->result();
	}
	public function get_rekam_by_obat($kode_obat,$tanggal_awal,$tanggal_akhir)
	{
		$hasil =$this->db->query("SELECT a.*, b.kode_pasien FROM tbl_sub_obat a JOIN tbl_pembayaran b on b.kode_rekam=a.kode_rekam  WHERE a.kode_obat = '$kode_obat' AND DATE(a.tanggal_input) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
		return $hasil->result();
	}
	public function tampil_all_pembayaran()
	{
			// return $this->db->get('tbl_pembayaran')->result();
		$hasil =$this->db->query("SELECT kode_pembayaran FROM tbl_pembayaran ORDER BY kode_pembayaran DESC");
		return $hasil->result();
	}

	public function tampil_kas_keluar()
	{
			// return $this->db->get('tbl_pembayaran')->result();
		$hasil =$this->db->query("SELECT * FROM tbl_transaksi_keluar ORDER BY tanggal_transaksi DESC");
		return $hasil->result();
	}
	

	public function list_obat($kode_rekam)
	{
		$hasil = $this->db->query("SELECT DISTINCT a.kode_obat,(SELECT b.nama_obat  FROM tbl_satuan_obat b WHERE b.kode_obat=a.kode_obat) as nama_obat,(SELECT c.satuan_obat  FROM tbl_satuan_obat c WHERE c.kode_obat=a.kode_obat) as satuan_obat,(SELECT h.harga_jual  FROM tbl_satuan_obat h WHERE h.kode_obat=a.kode_obat) as harga_jual,(SELECT k.keterangan  FROM tbl_satuan_obat k WHERE k.kode_obat=a.kode_obat) as keterangan
			,(SELECT i.total_stok  FROM tbl_satuan_obat i WHERE i.kode_obat=a.kode_obat) as total_stok,(SELECT count(d.tanggal_expired) FROM tbl_sub_obat d WHERE d.kode_obat=a.kode_obat AND d.kode_rekam ='$kode_rekam') as jumlah_tanggal,(SELECT e.aturan_pakai FROM tbl_sub_obat e WHERE e.kode_obat=a.kode_obat AND e.kode_rekam ='$kode_rekam' LIMIT 1) as aturan_pakai,(SELECT sum(f.qty) FROM tbl_sub_obat f WHERE f.kode_obat=a.kode_obat AND f.kode_rekam ='$kode_rekam') as qty,(SELECT sum(g.subtotal) FROM tbl_sub_obat g WHERE g.kode_obat=a.kode_obat AND g.kode_rekam ='$kode_rekam') as subtotal FROM tbl_sub_obat a WHERE a.kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function list_obat_terjual($tanggal_awal,$tanggal_akhir)
	{
		$hasil = $this->db->query("SELECT DISTINCT a.*,(SELECT sum(b.qty) FROM tbl_sub_obat b WHERE b.kode_obat=a.kode_obat AND DATE(b.tanggal_input) BETWEEN '$tanggal_awal' AND '$tanggal_akhir') as jumlah_penjualan,(SELECT sum(c.subtotal) FROM tbl_sub_obat c WHERE c.kode_obat=a.kode_obat AND DATE(c.tanggal_input) BETWEEN '$tanggal_awal' AND '$tanggal_akhir') as total_penjualan FROM tbl_satuan_obat a ORDER BY jumlah_penjualan DESC");
		return $hasil->result();
	}

	public function detail_obat($kode_rekam)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_sub_obat JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat WHERE kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function detail_pasien($kode_rekam)
	{
		$hasil = $this->db->query("SELECT a.kode_pasien,b.nama_pasien,b.tanggal_lahir FROM tbl_pembayaran a JOIN tbl_pasien b on b.kode_pasien=a.kode_pasien WHERE a.kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function detail_obat_hr($kode_rekam)
	{
		$hasil = $this->db->query("
			SELECT DISTINCT a.kode_obat,
			(SELECT b.nama_obat  FROM tbl_satuan_obat b WHERE b.kode_obat=a.kode_obat) as nama_obat,
			(SELECT c.satuan_obat  FROM tbl_satuan_obat c WHERE c.kode_obat=a.kode_obat) as satuan_obat,
			(SELECT h.harga_jual  FROM tbl_satuan_obat h WHERE h.kode_obat=a.kode_obat) as harga_jual,
			(SELECT i.total_stok  FROM tbl_satuan_obat i WHERE i.kode_obat=a.kode_obat) as total_stok,
			(SELECT count(d.tanggal_expired) FROM tbl_sub_obat d WHERE d.kode_obat=a.kode_obat AND d.kode_rekam ='$kode_rekam') as jumlah_tanggal,
			(SELECT e.aturan_pakai FROM tbl_sub_obat e WHERE e.kode_obat=a.kode_obat AND e.kode_rekam ='$kode_rekam' LIMIT 1) as aturan_pakai,
			(SELECT sum(f.qty) FROM tbl_sub_obat f WHERE f.kode_obat=a.kode_obat AND f.kode_rekam ='$kode_rekam') as qty,
			(SELECT sum(g.subtotal) FROM tbl_sub_obat g WHERE g.kode_obat=a.kode_obat AND g.kode_rekam ='$kode_rekam') as subtotal 
			FROM tbl_sub_obat a WHERE a.kode_rekam ='$kode_rekam'");
		return $hasil->result();
	}

	public function get_total_lab($kode_rekam)

	{
		$hasil = $this->db->query("SELECT SUM(total_akhir) as pemeriksaan_lab FROM tbl_pemeriksaan_lab WHERE kode_rekam='$kode_rekam'");
		$pemeriksaan_lab=0;
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $key) {
				$pemeriksaan_lab += floatval($key->pemeriksaan_lab);
			}
		}
		return $pemeriksaan_lab;

	}
	


	public function get_list_pemeriksaan_per_dokter($tanggal_awal,$tanggal_akhir,$dokter)
	{
		return $this->db->query("SELECT * FROM tbl_pembayaran  JOIN tbl_pasien on tbl_pasien.kode_pasien=tbl_pembayaran.kode_pasien WHERE DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND dokter_pemeriksa='$dokter'")->result();
	}

	public function get_list_pemeriksaan($tanggal_awal,$tanggal_akhir)
	{
		return $this->db->query("SELECT * FROM tbl_pembayaran WHERE DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->result();
	}

	public function update_status_pemberian_Obat($kode_pembayaran)
	{
		$hasil = $this->db->query("SELECT * FROM tbl_pembayaran WHERE kode_pembayaran='$kode_pembayaran'");
		return $hasil->result(); 
	}
	// 	public function getpenggunaanobat()
	// {
	// 	$hasil =$this->db->query("SELECT kode_obat, SUM(qty) as jumlah FROM tbl_sub_obat WHERE qty!='' AND qty > 0 GROUP BY kode_obat DESC");
	// 	return $hasil->result();
	// }

	public function getstokobat($tanggal_awal,$tanggal_akhir)
	{
		$awal = $tanggal_awal." 00:00:00";
		$akhir = $tanggal_akhir." 23:59:59";
		$hasil=$this->db->query("SELECT a.*,b.*,c.* FROM tbl_pembayaran a JOIN tbl_sub_obat b on b.kode_rekam=a.kode_rekam JOIN tbl_satuan_obat c on c.kode_obat=b.kode_obat WHERE a.tanggal_pembayaran BETWEEN '$awal'  AND '$akhir' ORDER BY kode_pembayaran ASC");
		// $hasil=$this->db->query("SELECT * FROM tbl_sub_obat 
		// 	JOIN tbl_satuan_obat on tbl_satuan_obat.kode_obat=tbl_sub_obat.kode_obat 
		// 	JOIN tbl_pembayaran on tbl_sub_obat.kode_rekam=tbl_pembayaran.kode_rekam   
		// 	WHERE tbl_pembayaran.tanggal_pembayaran BETWEEN '$awal'  AND '$akhir' GROUP BY tbl_satuan_obat.kode_obat ASC");
		return $hasil->result();
		
	}

	public function getjumlah($jenis,$tanggal_awal,$tanggal_akhir)
	{
		switch ($jenis) {
			case 'UMUM':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_umum, SUM(total_pembayaran) as nominal , SUM(biaya_pemeriksaan_lab) as nominal_lab from tbl_pembayaran where kode_rekam LIKE '%RKM-UM%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'KB':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_kb, SUM(total_pembayaran) as nominal,DATE(tanggal_checkout) as tgl_kb from tbl_pembayaran where kode_rekam LIKE '%RKM-KB%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'ANC':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_anc, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_anc from tbl_pembayaran where kode_rekam LIKE '%RKM-ANC%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'IMUNISASI':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_imunisasi, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_imunisasi from tbl_pembayaran where kode_rekam LIKE '%RKM-IMN%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'INC':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_inc, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_inc from tbl_pembayaran where kode_rekam LIKE '%RKM-INC%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'BBL':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_bbl, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_bbl from tbl_pembayaran where kode_rekam LIKE '%RKM-BBL%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'NIFAS':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_nifas, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_nifas from tbl_pembayaran where kode_rekam LIKE '%RKM-NFS%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'OBAT':
			$tgl_awal=$tanggal_awal." 00:00:00";
			$tgl_akhir=$tanggal_akhir." 23:59:59";
			$hasil =$this->db->query("SELECT count(kode_beli) as jumlah_beliobat, SUM(total_akhir) as nominal from tbl_pembelian_obat where DATE(tanggal_pembelian) BETWEEN '$tgl_awal' AND '$tgl_akhir'" );
			break;


			case 'SURAT':
			$hasil =$this->db->query("SELECT count(tanggal_pembuatan_surat) as jumlah_surat, SUM(total_akhir) as nominal from tbl_surat where keterangan='SURAT KETERANGAN SEHAT' AND tanggal_pembuatan_surat BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'KELUAR':
			$hasil =$this->db->query("SELECT count(kode_transaksi_keluar) as jumlah_kas_keluar, SUM(nominal_transaksi) as nominal from tbl_transaksi_keluar where tanggal_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir'" );
			break;

			case 'TUNGGAKAN':
			$hasil =$this->db->query("SELECT count(kode_tagihan) as jumlah_tunggakan, SUM(penambahan_tagihan) as nominal from tbl_tagihan_pasien where DATE(tanggal_input) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND penambahan_tagihan!=''" );
			break;

			case 'TAGIHAN':
			$hasil =$this->db->query("SELECT count(kode_tagihan) as jumlah_bayar_tagihan, SUM(tagihan_dibayarkan) as nominal from tbl_tagihan_pasien where DATE(tanggal_bayar_tagihan) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND tagihan_dibayarkan!=''" );
			break;

			case 'RAPID':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_rapid, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_rapid from tbl_pembayaran where kode_rekam LIKE '%RKM-RPD%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;
			case 'SWAB':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_swab, SUM(total_pembayaran) as nominal, DATE(tanggal_checkout) as tgl_swab from tbl_pembayaran where kode_rekam LIKE '%RKM-SWAB%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'LAB':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_lab, SUM(total_pembayaran) as nominal, (SELECT SUM(b.biaya_pemeriksaan_lab) from tbl_pembayaran b WHERE b.biaya_pemeriksaan_lab!=''  AND b.biaya_pemeriksaan_lab!=0 AND b.status_pembayaran='LUNAS' AND DATE(b.tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir') as nominal_lab, (SELECT COUNT(c.biaya_pemeriksaan_lab) from tbl_pembayaran c WHERE c.biaya_pemeriksaan_lab!=''  AND c.biaya_pemeriksaan_lab!=0 AND c.status_pembayaran='LUNAS' AND DATE(c.tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir') as jumlah_sub_lab, DATE(tanggal_checkout) as tgl_lab from tbl_pembayaran where kode_rekam LIKE '%LAB%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'RANAP':
			$hasil =$this->db->query("SELECT count(kode_pembayaran) as jumlah_ranap, SUM(total_pembayaran) - SUM(biaya_pemeriksaan_lab) as nominal, DATE(tanggal_checkout) as tgl_ranap from tbl_pembayaran where kode_rekam LIKE '%RANAP%' AND status_pembayaran='LUNAS' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			// sudah
			case 'DETAIL UMUM':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_rekam_medik b on b.kode_rekam=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-UM%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'DETAIL KB':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_kb b on b.kode_kb=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-KB%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'DETAIL ANC':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_kehamilan b on b.kode_kehamilan=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-ANC%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			// sudah
			case 'DETAIL IMUNISASI':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_imunisasi b on b.kode_imunisasi=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-IMN%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'DETAIL INC':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_inc b on b.kode_inc=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-INC%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			// sudah
			case 'DETAIL BBL':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_bbl b on b.kode_bbl=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-BBL%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			// sudah
			case 'DETAIL NIFAS':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_nifas b on b.kode_nifas=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-NFS%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			// sudah
			case 'DETAIL OBAT':
			$hasil =$this->db->query("SELECT a.*, b.nama_pembeli as nama_pasien FROM tbl_pembayaran a JOIN tbl_pembelian_obat b on b.kode_beli=a.kode_rekam WHERE a.kode_rekam LIKE '%POBAT%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'DETAIL SURAT':
			$hasil =$this->db->query("SELECT a.tanggal_pembuatan_surat as tanggal_checkout,a.total_akhir as total_pembayaran,a.kode_surat as kode_rekam,a.keterangan as kode_pembayaran,b.nama_pasien from tbl_surat a join tbl_pasien b on b.kode_pasien=a.kode_pasien where keterangan='SURAT KETERANGAN SEHAT' AND tanggal_pembuatan_surat BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			// SUDAH
			case 'DETAIL KELUAR':
			$hasil =$this->db->query("SELECT * FROM tbl_transaksi_keluar WHERE tanggal_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'DETAIL TUNGGAKAN':
			$hasil =$this->db->query("SELECT a.tanggal_input as tanggal_checkout, a.kode_pembayaran_tagihan as kode_pembayaran, a.kode_rekam_tagihan as kode_rekam, b.nama_pasien, a.penambahan_tagihan as total_pembayaran from tbl_tagihan_pasien a JOIN tbl_pasien b on b.kode_pasien=a.kode_pasien where DATE(tanggal_input) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND penambahan_tagihan!=''" );
			break;

			case 'DETAIL TAGIHAN':
			$hasil =$this->db->query("SELECT a.tanggal_input as tanggal_checkout, a.kode_pembayaran_tagihan as kode_pembayaran, a.kode_rekam_tagihan as kode_rekam, b.nama_pasien,a.tagihan_dibayarkan as total_pembayaran from tbl_tagihan_pasien a JOIN tbl_pasien b on b.kode_pasien=a.kode_pasien where DATE(tanggal_input) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND tagihan_dibayarkan!=''" );
			break;


			// sudah
			case 'DETAIL RANAP':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_ranap b on b.kode_ranap=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RANAP%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;


			// SUDAH
			case 'DETAIL RAPID':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_rapid b on b.kode_rapid=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-RPD%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;
			// SUDAH
			case 'DETAIL SWAB':
			$hasil =$this->db->query("SELECT a.*,b.kode_pasien,c.nama_pasien FROM tbl_pembayaran a JOIN tbl_swab b on b.kode_swab=a.kode_rekam JOIN tbl_pasien c on c.kode_pasien=b.kode_pasien WHERE a.kode_rekam LIKE '%RKM-SWAB%' AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			break;

			case 'DETAIL LAB':
			$hasil =$this->db->query("
				SELECT a.*,(SELECT b.nama_pasien FROM tbl_pasien b WHERE b.kode_pasien=a.kode_pasien) as nama_pasien,

				IF(a.biaya_pemeriksaan_lab > 0,(SELECT c.biaya_pemeriksaan_lab FROM tbl_pembayaran c WHERE c.kode_pembayaran=a.kode_pembayaran),(SELECT d.total_pembayaran FROM tbl_pembayaran d WHERE d.kode_pembayaran=a.kode_pembayaran)) as nominal 
				FROM tbl_pembayaran a 
				WHERE a.kode_rekam LIKE '%LAB%' 
				AND DATE(tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
				OR 	a.biaya_pemeriksaan_lab!=''  AND a.biaya_pemeriksaan_lab!=0 AND a.status_pembayaran='LUNAS' AND DATE(a.tanggal_checkout) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'



				");

			break;
			
			
			// case 'UMUM':
			// break;
			default:
			break;
		}
		return $hasil->result(); 

	} 
	public function detail_keuangan($jenis,$tanggal_awal,$tanggal_akhir)
	{
		switch ($jenis) {
			

			default: break;
		}
		return $hasil->result(); 
	}
	public function hitung_bykode($kode_pasien)
	{  
		$hasil =$this->db->query("SELECT * FROM tbl_sub_obat  WHERE kode_pasien='$kode_pasien'" );
		return $hasil->result();
	}

	public function buat_kode_transaksi()
	{
		$this->db->select('RIGHT(tbl_transaksi_keluar.kode_transaksi_keluar,5) as kode', FALSE);
		$this->db->order_by('kode_transaksi_keluar', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_transaksi_keluar');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "TRX" .'-'. $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}
	public function get_list_bulan($tanggal_awal,$tanggal_akhir)
	{
		return $this->db->query("SELECT DISTINCT MONTH(tanggal_checkout) as bulan FROM tbl_pembayaran WHERE tanggal_checkout BETWEEN $tanggal_awal AND $tanggal_akhir")->result();
		
	}
	public function rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam)
	{ 
		if (strpos($kode_rekam, 'UM')!=false) {

			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rekam_medik on tbl_pembayaran.kode_rekam=tbl_rekam_medik.kode_rekam join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'KB')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_kb on tbl_pembayaran.kode_rekam=tbl_kb.kode_kb join tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}


		else if(strpos($kode_rekam, 'ANC')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_kehamilan on tbl_pembayaran.kode_rekam=tbl_kehamilan.kode_kehamilan join tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'INC')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_inc on tbl_pembayaran.kode_rekam=tbl_inc.kode_inc join tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'IMN')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_imunisasi on tbl_pembayaran.kode_rekam=tbl_imunisasi.kode_imunisasi join tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'BBL')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_bbl on tbl_pembayaran.kode_rekam=tbl_bbl.kode_bbl join tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'NFS')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_nifas on tbl_pembayaran.kode_rekam=tbl_nifas.kode_nifas join tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'RPD')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rapid on tbl_pembayaran.kode_rekam=tbl_rapid.kode_rapid join tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'SWAB')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_swab on tbl_pembayaran.kode_rekam=tbl_swab.kode_swab join tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}else if(strpos($kode_rekam, 'POBAT')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pembelian_obat on tbl_pembayaran.kode_rekam=tbl_pembelian_obat.kode_beli WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'LAB')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pemeriksaan_lab on tbl_pembayaran.kode_rekam=tbl_pemeriksaan_lab.kode_lab join tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}
		else if(strpos($kode_rekam, 'RANAP')!==false){
			$hasil =$this->db->query("SELECT a.*,b.*,c.*,(SELECT SUM(d.jasa_dokter) FROM tbl_observasi_ranap d WHERE d.kode_ranap='$kode_rekam') as upah_dokter FROM tbl_pembayaran a join tbl_ranap b on b.kode_ranap=a.kode_rekam join tbl_pasien c on c.kode_pasien=a.kode_pasien WHERE a.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}

		else if(strpos($kode_rekam, 'HCR')!==false){
			$hasil =$this->db->query("SELECT a.*,b.*,c.*,(SELECT SUM(d.jasa_dokter) FROM tbl_observasi_homecare d WHERE d.kode_homecare='$kode_rekam') as upah_dokter FROM tbl_pembayaran a join tbl_homecare b on b.kode_homecare=a.kode_rekam join tbl_pasien c on c.kode_pasien=a.kode_pasien WHERE a.kode_pembayaran ='$kode_pembayaran'");
			return $hasil->result(); 

		}


	}
	

	// public function detail_obat($kode_pembayaran,$kode_rekam)
	// {
	// 	if (strpos($kode_rekam, 'UM')!=false) {
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rekam_medik on tbl_pembayaran.kode_rekam=tbl_rekam_medik.kode_rekam join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_rekam_medik.kode_rekam=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat  WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
	// 	}
	// 	else if (strpos($kode_rekam, 'KB')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_kb on tbl_pembayaran.kode_rekam=tbl_kb.kode_kb join tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_kb.kode_kb=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}

	// 	else if (strpos($kode_rekam, 'ANC')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_kehamilan on tbl_pembayaran.kode_rekam=tbl_kehamilan.kode_kehamilan join tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_kehamilan.kode_kehamilan=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}

	// 	else if (strpos($kode_rekam, 'INC')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_inc on tbl_pembayaran.kode_rekam=tbl_inc.kode_inc join tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_inc.kode_inc=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}


	// 	else if (strpos($kode_rekam, 'IMN')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_imunisasi on tbl_pembayaran.kode_rekam=tbl_imunisasi.kode_imunisasi join tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_imunisasi.kode_imunisasi=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}

	// 	else if (strpos($kode_rekam, 'BBL')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_bbl on tbl_pembayaran.kode_rekam=tbl_bbl.kode_bbl join tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_bbl.kode_bbl=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}

	// 	else if (strpos($kode_rekam, 'NFS')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_nifas on tbl_pembayaran.kode_rekam=tbl_nifas.kode_nifas join tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_nifas.kode_nifas=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}

	// 	else if (strpos($kode_rekam, 'RPD')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rapid on tbl_pembayaran.kode_rekam=tbl_rapid.kode_rapid join tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_rapid.kode_rapid=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}

	// 	else if (strpos($kode_rekam, 'SWAB')!==false){
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_swab on tbl_pembayaran.kode_rekam=tbl_swab.kode_swab join tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien join tbl_sub_obat on tbl_swab.kode_swab=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}
	// 	else if (strpos($kode_rekam, 'RANAP')!==false){

	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_ranap on tbl_pembayaran.kode_rekam=tbl_ranap.kode_ranap join tbl_pasien on tbl_ranap.kode_pasien=tbl_pasien.kode_pasien join tbl_observasi_ranap on tbl_observasi_ranap.kode_ranap=tbl_ranap.kode_ranap JOIN  tbl_sub_obat on tbl_sub_obat.kode_rekam= CONCAT('OBS-RANAP-',tbl_observasi_ranap.kode_observasi) join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
	// 	}

	// 	else{
	// 		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pembelian_obat on tbl_pembayaran.kode_rekam=tbl_pembelian_obat.kode_beli   join tbl_sub_obat on tbl_pembelian_obat.kode_beli=tbl_sub_obat.kode_rekam join tbl_satuan_obat on tbl_sub_obat.kode_obat=tbl_satuan_obat.kode_obat WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

	// 	}
	// 	return $hasil->result(); 

	// }



	public function detail_tambahan($kode_pembayaran)
	{ 
		$hasil =$this->db->query("SELECT * FROM tbl_sub_pemeriksaan WHERE kode_pembayaran ='$kode_pembayaran'");

		return $hasil->result(); 

	}
	public function detail_perusahaan()
	{
		return $this->db->query("SELECT * FROM tbl_perusahaan")->result();
	}

	// public function detail_rapid($kode_pembayaran)
	// {
	// 	$hasil =$this->db->query("SELECT * FROM tbl_rapid WHERE kode_pembayaran ='$kode_pembayaran'");

	// 	return $hasil->result();
	// }

	public function kredit_pasien($kode_pembayaran)
	{
		$hasil =$this->db->query("SELECT kode_pembayaran,tbl_pembayaran.kode_pasien,tbl_pasien.kredit FROM tbl_pembayaran join tbl_pasien on tbl_pembayaran.kode_pasien=tbl_pasien.kode_pasien  WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
		return $hasil->result(); 

	}


	public function get_status($kode_pembayaran)
	{
		$hasil=$this->db->query("SELECT kode_pembayaran,status_pembayaran FROM tbl_pembayaran WHERE kode_pembayaran='$kode_pembayaran'");
		return $hasil->result();
	}


	public function get_status_pemberian_obat($kode_pembayaran)
	{
		$hasil=$this->db->query("SELECT kode_pembayaran,status_pemberian_obat FROM tbl_pembayaran WHERE kode_pembayaran='$kode_pembayaran'");
		return $hasil->result();
	}


	public function detail_umum($tanggal_awal_umum,$tanggal_akhir_umum)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran  JOIN tbl_pasien on tbl_pembayaran.kode_pasien=tbl_pasien.kode_pasien  JOIN tbl_rekam_medik on tbl_pembayaran.kode_rekam=tbl_rekam_medik.kode_rekam  WHERE pengobatan ='UMUM' AND tanggal_periksa BETWEEN '$tanggal_awal_umum' AND '$tanggal_akhir_umum'");

		return $hasil->result();

	}

	public function detail_kb($tanggal_awal_kb,$tanggal_akhir_kb)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran JOIN tbl_pasien on tbl_pembayaran.kode_pasien=tbl_pasien.kode_pasien  JOIN tbl_kb on tbl_pembayaran.kode_rekam=tbl_kb.kode_kb  WHERE pengobatan ='KB' AND tanggal_periksa BETWEEN '$tanggal_awal_kb' AND '$tanggal_akhir_kb'");

		return $hasil->result();
	}

	public function detail_data_anc($tanggal_awal_anc,$tanggal_akhir_anc)
	{
		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran JOIN tbl_pasien on tbl_pembayaran.kode_pasien=tbl_pasien.kode_pasien JOIN tbl_kehamilan on tbl_pembayaran.kode_rekam=tbl_kehamilan.kode_kehamilan  WHERE pengobatan ='ANC' AND tanggal_periksa BETWEEN '$tanggal_awal_anc' AND '$tanggal_akhir_anc'");

		return $hasil->result();
	}


	public function rincikan_pembayaran_struk($kode_pembayaran,$kode_rekam)
	{ 
		if (strpos($kode_rekam, 'UM')!=false) {

			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rekam_medik on tbl_pembayaran.kode_rekam=tbl_rekam_medik.kode_rekam join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
		}
		else if(strpos($kode_rekam, 'KB')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_kb on tbl_pembayaran.kode_rekam=tbl_kb.kode_kb join tbl_pasien on tbl_kb.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}


		else if(strpos($kode_rekam, 'ANC')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_kehamilan on tbl_pembayaran.kode_rekam=tbl_kehamilan.kode_kehamilan join tbl_pasien on tbl_kehamilan.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}

		else if(strpos($kode_rekam, 'INC')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_inc on tbl_pembayaran.kode_rekam=tbl_inc.kode_inc join tbl_pasien on tbl_inc.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}



		else if(strpos($kode_rekam, 'IMN')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_imunisasi on tbl_pembayaran.kode_rekam=tbl_imunisasi.kode_imunisasi join tbl_pasien on tbl_imunisasi.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}


		else if(strpos($kode_rekam, 'BBL')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_bbl on tbl_pembayaran.kode_rekam=tbl_bbl.kode_bbl join tbl_pasien on tbl_bbl.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}


		else if(strpos($kode_rekam, 'NFS')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_nifas on tbl_pembayaran.kode_rekam=tbl_nifas.kode_nifas join tbl_pasien on tbl_nifas.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}

		else if(strpos($kode_rekam, 'RPD')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rapid on tbl_pembayaran.kode_rekam=tbl_rapid.kode_rapid join tbl_pasien on tbl_rapid.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}

		else if(strpos($kode_rekam, 'SWAB')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_swab on tbl_pembayaran.kode_rekam=tbl_swab.kode_swab join tbl_pasien on tbl_swab.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}
		else if(strpos($kode_rekam, 'POBAT')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pembelian_obat on tbl_pembayaran.kode_rekam=tbl_pembelian_obat.kode_beli WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}

		else if(strpos($kode_rekam, 'LAB')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pemeriksaan_lab on tbl_pembayaran.kode_rekam=tbl_pemeriksaan_lab.kode_lab join tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}
		else if(strpos($kode_rekam, 'RANAP')!==false){
			$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_pemeriksaan_lab on tbl_pembayaran.kode_rekam=tbl_pemeriksaan_lab.kode_lab join tbl_pasien on tbl_pemeriksaan_lab.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");

		}

		return $hasil->result(); 
	} 

	public function detail_pembayaran($kode_pembayaran)
	{ 
		$hasil =$this->db->query("SELECT * FROM tbl_pembayaran join tbl_rekam_medik on tbl_pembayaran.kode_rekam=tbl_rekam_medik.kode_rekam join tbl_pasien on tbl_rekam_medik.kode_pasien=tbl_pasien.kode_pasien WHERE tbl_pembayaran.kode_pembayaran ='$kode_pembayaran'");
		return $hasil->result(); 
	}

	// public function update_rincian_pembayaran($kode_pembayaran,$kode_rekam,$status_pembayaran,$biaya_admin,$discount,$total_pembayaran,$tebal_pintu)
	// {
	// 	$hasil=$this->db->query("UPDATE tbl_pembayaran SET kode_rekam='$kode_rekam',status_pembayaran='$status_pembayaran',biaya_admin='$biaya_admin',discount='$discount',total_pembayaran='$total_pembayaran' WHERE kode_pembayaran='$kode_pembayaran'");
	// 	return $hasil;
	// }
}
