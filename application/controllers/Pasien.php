<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');

			redirect('login','refresh');

		}elseif($this->session->level!='superadmin' && $this->session->level!='kasir'  && $this->session->level!='admin' ) {
			echo "<script> alert('Tidak Ada Akses Untuk Menu ini');
			history.back();
			</script>";
		}

		date_default_timezone_set('Asia/Jakarta');	

	}

	public function index()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Pasien", 
		);
		$this->db->insert('tbl_history', $data_history); 
		$data['list_dokter'] = $this->model_pasien->get_list_dokter();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');

		$this->load->view('pasien/tampilan_pasien',$data);
		$this->load->view('template/footer');
	}
	

	public function tampil_history_tagihan()
	{
		$kode_pasien = $this->input->get('kode_pasien');
		$data['pasien'] = $this->model_pasien->edit_pasien($kode_pasien);
		$data['tagihan'] = $this->model_pasien->get_history_tagihan_pasien($kode_pasien);
		echo json_encode($data);
	}
	// public function tampil_kartu_sehat()
	// {
	// 	$this->load->view('template/header');
	// 	$this->load->view('template/sidebar');
	// 	$this->load->view('pasien/tampil_kartu_sehat');
	// 	$this->load->view('template/footer');
	// }

	// public function kartu_sehat($kode_pasien)
	// {
	// 	$data['kartu_sehat']= $this->model_pasien->edit_pasien($kode_pasien);	 
	// 	$this->load->view('pasien/kartu_sehat',$data); 
	// }



	public function surat($kode_pasien)
	{
		$data['buat_surat']= $this->model_pasien->buat_surat($kode_pasien);	  
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/buat_surat',$data);
		$this->load->view('template/footer');
	}

	public function tampil_kartu()
	{ 
		$data = $this->model_pasien->tampil_kartu(); 
		echo json_encode($data);  
	}


	public function tagihan()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Tagihan Pasien", 
		);

		$this->db->insert('tbl_history', $data_history); 

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/tagihan_pasien');
		$this->load->view('template/footer');
	}
	public function pembayaran_tagihan()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Pembayaran Pasien", 
		);

		$this->db->insert('tbl_history', $data_history); 



		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/pembayaran_tagihan');
		$this->load->view('template/footer');
	}

	
	public function tampil_data_pasien()
	{ 
		$data = $this->model_pasien->tampil_data_pasien(); 
		echo json_encode($data);  
	}
	public function tampil_data_tagihan()
	{
		$data = $this->model_pasien->tampil_data_tagihan(); 
		echo json_encode($data); 
	}
	public function tampil_data_pembayaran_tagihan()
	{
		$data = $this->model_pasien->tampil_data_pembayaran_tagihan(); 
		echo json_encode($data); 
		

	}
	public function tampil_data_pasien_bykode()
	{
		$kode_pasien = $this->input->get('kode_pasien');
		$data = $this->model_pasien->tampil_bykode($kode_pasien); 
		echo json_encode($data); 
	}

	public function detail_tagihan_bykode()
	{
		$kode_tagihan= $this->input->get('kode_tagihan');
		$data = $this->model_pasien->tampilDetail_bykode($kode_tagihan); 
		echo json_encode($data); 
	}
	
	

	public function tampil_data_pembayaran_tagihan_bykode()
	{
		$kode_pembayaran_tagihan = $this->input->get('kode_pembayaran_tagihan');
		$data = $this->model_pasien->tampil_data_pembayaran_tagihan_bykode($kode_pembayaran_tagihan); 
		echo json_encode($data); 
	}


	public function tampil_data_detail_tagihan_bykode()
	{
		$kode_pembayaran_tagihan = $this->input->get('kode_pembayaran_tagihan');
		$data = $this->model_pasien->tampil_data_detail_tagihan_bykode($kode_pembayaran_tagihan); 
		echo json_encode($data); 
	}


	public function update_tagihan()
	{
		$kode_pembayaran_tagihan = $this->model_pasien->buat_kode_tagihan();
		$data  = array(
			'kode_pembayaran_tagihan' => $kode_pembayaran_tagihan, 
			'tanggal_bayar_tagihan' => date('Y-m-d'), 
			'tanggal_input' => date('Y-m-d H:i:s'), 
			'kode_pasien' => $this->input->post('kode_pasien'), 
			'tagihan_awal' => $this->input->post('tagihan_awal'),
			'tagihan_dibayarkan' => $this->input->post('tagihan_dibayarkan'),

			'sisa_tagihan' => floatval($this->input->post('tagihan_awal')) - floatval($this->input->post('tagihan_dibayarkan')),
			'dibayarkan_oleh' => $this->input->post('dibayarkan_oleh'), 
			'tunai' => $this->input->post('tunai'),
			'kembalian' => $this->input->post('kembalian'),
			'keterangan' =>"Pembayaran tagihan dengan Kode ". $kode_pembayaran_tagihan." yang di bayarkan oleh Sdr/i ".$this->input->post('dibayarkan_oleh'),
		);

		$result = $this->db->insert('tbl_tagihan_pasien',$data);
		if ($result) {
			$this->db->set('kredit',floatval($this->input->post('tagihan_awal')) - floatval($this->input->post('tagihan_dibayarkan')));
			$this->db->where('kode_pasien',$this->input->post('kode_pasien'));
			$this->db->update('tbl_pasien');
			$msg="Pembayaran Tagihan Berhasil";

			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Melakukan Pembayaran Tagihan Pasien dengan Kode ".$kode_pembayaran_tagihan, 
			);

			$this->db->insert('tbl_history', $data_history);


		}else{
			$msg="Pembayaran Tagihan Gagal";
		}  
		echo json_encode($msg);
	}

	public function tabel_pembayaran_tagihan(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_tagihan';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('pembayaran_tagihan',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$l->opsi ='<div class="btn-group"> 
			<a href="javascript:;" class="btn btn-success btn-sm  btn-flat lihat_pembayaran_tagihan "style="font-weight: bold;" data="'.$l->kode_tagihan.'" > <i class="fa fa-eye mr-1"></i> Detail</a>
			<a href="javascript:;" class="btn btn-secondary btn-sm  btn-flat cetak_pembayaran_tagihan "style="font-weight: bold;" data="'.$l->kode_tagihan.'" ><i class="fas fa-print mr-1"></i> Cetak</a></div>';


			$data[] = $l;

			

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('pembayaran_tagihan',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('pembayaran_tagihan',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}




	public function tabel_tagihan(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'nama_pasien';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('tagihan',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$l->opsi ='<div class="btn-group"> 
			<a href="javascript:;" class="btn btn-success btn-sm  btn-flat detail_tagihan "style="font-weight: bold;" data="'.$l->kode_pasien.'" ><i class="fas fa-eye mr-1"></i> Detail</a><a href="javascript:;" class="btn btn-secondary btn-sm  btn-flat update_tagihan" style="font-weight: bold;" data="'.$l->kode_pasien.'" subject="'.$l->kredit.'" ><i class="fas fa-edit mr-1"></i> Update Tagihan</a></div>'; 
			$data[] = $l;

			

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('tagihan',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('tagihan',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function rujuk_rs_pasien()
	{
		$kode_pasien = $this->input->post('kode_pasien_rujuk');

		$this->db->select('a.tanggal_lahir');
		$this->db->where('a.kode_pasien',$kode_pasien);
		$data_pasien = $this->db->get('tbl_pasien a')->result();
		foreach ($data_pasien as $key) {
			$tgl_lahir = $key->tanggal_lahir;
		}

		$tanggal_rujukan = date('Y-m-d');

		$kode_rujukan = $this->model_rujukan->buat_kode();
		$jenis_rujukan = "RS";

		$umur = 0;

		$hitung_umur = date_diff(date_create($tanggal_rujukan),date_create($tgl_lahir));

		if ($hitung_umur->y <=0 ) {
			$umur =  $hitung_umur->m." Bulan";
		}else{
			if ($hitung_umur->m <=0) {
			$umur =  $hitung_umur->y." Tahun";
				
			}else{
			$umur =  $hitung_umur->y.".".$hitung_umur->m." Tahun";

			}

		}


		$data = array(
			'kode_rujukan' => $kode_rujukan, 
			'tanggal_rujukan' => $tanggal_rujukan, 
			'kode_pasien' => $kode_pasien, 
			'jenis_rujukan' => $jenis_rujukan, 
			'nama_rs' => $this->input->post('nama_rs'),
			'alamat_rs' => $this->input->post('alamat_rs'), 
			'status_rujukan' => "Belum Dicetak", 
			'keluhan' => $this->input->post('keluhan_pasien'),
			'diagnosa' => $this->input->post('diagnosa_pasien'), 
			'terapi' => $this->input->post('terapi_pasien'), 
			'dokter_perujuk' => $this->input->post('dokter_perujuk'), 
			'umur_pasien' => $umur, 

		);

		$hasil = $this->db->insert('tbl_rujukan',$data);
		if ($hasil) {
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Melakukan Rujukan Pasien  dengan kode ".$kode_pasien, 
			);

			$this->db->insert('tbl_history', $data_history); 

			$data['title'] = 'Berhasil';
			$data['text'] = 'Pasien Berhasil di Rujuk';
			$data['icon'] = 'success';


		}else{
				$data['title'] = 'Gagal';
			$data['text'] = 'Pasien Gagal di Rujuk';
			$data['icon'] = 'error';

		}

		$this->session->set_flashdata($data); 
		redirect('pasien','refresh');

	}




	public function tabel_pasien(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'nama_pasien';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('pasien',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$l->opsi ='<div class="btn-group"><a  href="'.base_url().'pasien/edit/'.$l->kode_pasien.'" class="btn btn-sm btn-success     btn-flat item_edit_user" data="'.$l->kode_pasien.'"><i class="fa fa-edit"></i></a>
			<a href="'.base_url().'pasien/daftarkan_pasien/'.$l->kode_pasien.'" class="btn btn-sm btn-flat "style="background:#ffc905; color:white;font-weight: bold; color:black;" data="'.$l->kode_pasien.'" ><i class="fas fa-code-branch"></i> DAFTARKAN</a>

			<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_rujuk_pasien" data-nama="'.$l->nama_pasien.'" data-pasien="'.$l->kode_pasien.'">Rujuk Pasien</a>

			<a href="'.base_url().'pasien/cetak_kartu/'.$l->kode_pasien.'" class="btn btn-sm btn-info btn-flat" data="'.$l->kode_pasien.'">  Kartu </a>

			<a href="javascript:;" class="btn btn-sm btn-secondary btn-flat lihat_detail" data="'.$l->kode_pasien.'">  <i class="fas fa-eye"></i></a>
			</div>';
			
			$data[] = $l;

			

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('pasien',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('pasien',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function tambah_pasien()
	{
		$data['kode_pasien'] =$this->model_pasien->buat_kode(); 
		$data['no_registrasi'] =$this->model_pasien->get_no_registrasi(); 
		// $data['kode_pendaftaran'] =$this->model_pasien->get_kode_pendaftaran(); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/tambah_pasien',$data);
		$this->load->view('template/footer');
	}


	public function laporan_bytanggal()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Pasien By Tanggal", 
		);

		$this->db->insert('tbl_history', $data_history);

		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal= $this->uri->segment(3);
		$tanggal_akhir= $this->uri->segment(4);


		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;

		$data['pasien'] = $this->model_pasien->tarik_data_bytanggal($tanggal_awal,$tanggal_akhir);
		$this->load->view('pasien/draf',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		

	}

	public function laporan_tagihan()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Tagihan Pasien By Tanggal", 
		);

		$this->db->insert('tbl_history', $data_history);

		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$data['pasien'] = $this->model_pasien->tarik_data_tagihan();
		$this->load->view('pasien/draft_tagihan',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		

	}


	public function simpan_data_pasien()
	{
		$kode_pasien = $this->model_pasien->buat_kode(); 
		$no_registrasi=$this->model_pasien->get_no_registrasi(); 
		// $kode_pendaftaran = $this->input->post('kode_pendaftaran'); 
		$tanggal_daftar = $this->input->post('tanggal_daftar');
		$nik = $this->input->post('nik');
		$nama_pasien = $this->input->post('nama_pasien');
		$jk = $this->input->post('jk');
		$kepala_keluarga = $this->input->post('kepala_keluarga');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$umur = $this->input->post('umur');
		$agama = $this->input->post('agama');
		$kategori_pasien = $this->input->post('kategori_pasien');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$status_pernikahan = $this->input->post('status_pernikahan');
		$telepon = $this->input->post('telepon'); 
		$alamat = $this->input->post('alamat'); 
		$desa = $this->input->post('desa'); 
		$kecamatan = $this->input->post('kecamatan'); 
		$kabupaten = $this->input->post('kabupaten'); 


		$data= array('kode_pasien' =>$kode_pasien, 
			'no_registrasi' =>$no_registrasi,
					 // 'kode_pendaftaran' =>$kode_pendaftaran,
			'tanggal_daftar' =>$tanggal_daftar,
			'nik' =>$nik,
			'nama_pasien' =>$nama_pasien,
			'jk' =>$jk,
			'kepala_keluarga' =>$kepala_keluarga,
			'tempat_lahir' =>$tempat_lahir,
			'tanggal_lahir' =>$tanggal_lahir,
			'umur' =>$umur,
			'agama' =>$agama,
			'kategori_pasien' =>$kategori_pasien,
			'rt' =>$rt,
			'rw' =>$rw,
			'status_pernikahan' =>$status_pernikahan,
			'telepon' =>$telepon, 
			'alamat' =>$alamat,
			'desa' =>$desa,
			'kecamatan' =>$kecamatan,
			'kabupaten' =>$kabupaten

		); 
		// var_dump($data);
		// exit();
		

		$insert=$this->db->insert('tbl_pasien',$data); 

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menambah Data Pasien Baru dengan Kode ".$kode_pasien, 
		);

		$this->db->insert('tbl_history', $data_history);
		
		$msg = "Data berhasil Di Simpan"; 
		echo json_encode($msg); 	 
	}

	public function edit($kode_pasien)
	{
		$data['edit_pasien']= $this->model_pasien->edit_pasien($kode_pasien);	 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/edit_pasien',$data);
		$this->load->view('template/footer');
	}


	public function daftar($kode_pasien)
	{
		$data['cetak']= $this->model_pasien->cetak($kode_pasien);	 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/daftar_pasien',$data);
		$this->load->view('template/footer');
	}

	public function hapus_data_pasien()
	{

		$kode_pasien=$this->input->post('kode_pasien');

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Pasien Baru dengan Kode ".$kode_pasien, 
		);

		$this->db->insert('tbl_history', $data_history);


		$data=$this->model_pasien->hapus_aksi_pasien($kode_pasien);
		echo json_encode($data);
	}

	public function cetak_kartu($kode_pasien)
	{
		$data['cetak']= $this->model_pasien->cetak($kode_pasien);	 
		$this->load->view('pasien/kartu',$data); 
	} 

	public function tarik_laporan()
	{
		$data['tarik_laporan']= $this->model_pasien->tarik_laporan();	 
		$this->load->view('pasien/tarik_laporan',$data);
	}

	public function export()
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
		->setLastModifiedBy('My Notes Code')
		->setTitle("Data Pasein")
		->setSubject("Pasein")
		->setDescription("Laporan Semua Data Pasein")
		->setKeywords("Data Pasien");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "REPORT DATA PASIEN"); // Set kolom A1 dengan tulisan "DATA PASIEN"
		$excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Pasien"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Pasien"); // Set kolom C3 dengan tulisan "NAMA"
		// $excel->setActiveSheetIndex(0)->setCellValue('D3', "Tanggal Registrasi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		// $excel->setActiveSheetIndex(0)->setCellValue('E3', "Tempat Lahir"); // Set kolom E3 dengan tulisan "ALAMAT"
		// $excel->setActiveSheetIndex(0)->setCellValue('F3', "Tanggal Lahir"); // Set kolom E3 dengan tulisan "ALAMAT"
		// $excel->setActiveSheetIndex(0)->setCellValue('G3', "Umur"); // Set kolom E3 dengan tulisan "ALAMAT"
		// $excel->setActiveSheetIndex(0)->setCellValue('H3', "Agama"); // Set kolom E3 dengan tulisan "ALAMAT"
		// $excel->setActiveSheetIndex(0)->setCellValue('I3', "Jenis Pasien"); // Set kolom E3 dengan tulisan "ALAMAT"
		// $excel->setActiveSheetIndex(0)->setCellValue('J3', "Status Pernikahan"); // Set kolom E3 dengan tulisan "ALAMAT"
		// $excel->setActiveSheetIndex(0)->setCellValue('K3', "Status Pernikahan"); // Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col); 

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$ambildatapasien = $this->model_pasien->list_all_pasien();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($ambildatapasien as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->kode_pasien);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_pasien);
			// $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
			// $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			// $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Pasien");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Pasien.xls"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

	public function cetak_laporan()
	{
		$data['cetak_laporan']= $this->model_pasien->cetak_laporan();	 
		$this->load->view('pasien/cetak_laporan',$data);
	}

	public function daftarkan_pasien($kode_pasien)
	{

		$data['kode_pasien'] = $this->model_pasien->buat_kode(); 
		$data['daftarkan_pasien']= $this->model_pasien->daftarkan_pasien($kode_pasien);	 		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pasien/daftarkan',$data);
		$this->load->view('template/footer');
	}

	public function simpan_daftar_pasien()
	{ 
		date_default_timezone_set('Asia/Jakarta');
		$pengobatan = $this->input->post('pengobatan');
		$suhu = $this->input->post('suhu');  
		$tensi_darah = $this->input->post('tensi_darah');  
		$saturasi = $this->input->post('saturasi');  
		$pernapasan = $this->input->post('pernapasan');  
		$nadi = $this->input->post('nadi');  
		$bb = $this->input->post('bb');  
		$tb = $this->input->post('tb');  
		$tanggal_berobat = date('Y-m-d'); 

		$kode_pasien = $this->input->post('kode_pasien'); 
		$this->db->select('tanggal_lahir');
		$this->db->where('kode_pasien',$kode_pasien);
		$tanggal_lahir = $this->db->get('tbl_pasien');
		if ($tanggal_lahir->num_rows() > 0) {
			foreach ($tanggal_lahir->result() as $key) {
				$selisih = date_diff(date_create($key->tanggal_lahir),date_create(date('Y-m-d')));
				if ($selisih->m > 0) {
					$umur_pasien = $selisih->y.".".$selisih->m;
				}else{
					$umur_pasien = $selisih->y;
				}
				$data_umur = array('umur' => $umur_pasien, );
				$this->db->set($data_umur);
				$this->db->where('kode_pasien',$kode_pasien);
				$this->db->update('tbl_pasien');
			}
		}
		if ($pengobatan=='UMUM') {
			$kode_rekam =  $this->model_pasien->get_kode_rekam();
			$data_um= array(
				'kode_rekam' =>$kode_rekam,
				'date_time_update' =>date('Y-m-d H:i:s'),
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan,
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb
			); 
			$insert=$this->db->insert('tbl_rekam_medik',$data_um); 
		}

		if ($pengobatan=='KB') {
			$kode_kb =  $this->model_pasien->get_kode_kab();  
			$data_kb= array(
				'kode_kb' =>$kode_kb,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'date_time_update' => date('Y-m-d H:i:s'),
				
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb 
			);

			// var_dump($data_kb);
			// exit();
			$insert=$this->db->insert('tbl_kb',$data_kb); 
		} 



		if ($pengobatan=='ANC') {
			$kode_kehamilan =  $this->model_pasien->get_kode_anc();  
			$data_anc= array(
				'kode_kehamilan' =>$kode_kehamilan,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb


			); 

			// var_dump($data_anc);
			// exit();
			$insert=$this->db->insert('tbl_kehamilan',$data_anc); 
		} 

		if ($pengobatan=='INC') {
			$kode_inc =  $this->model_pasien->get_kode_inc();  
			$data_inc= array(
				'kode_inc' =>$kode_inc,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb
			); 

			// var_dump($data_inc);
			// exit();

			$insert=$this->db->insert('tbl_inc',$data_inc); 
		} 


		if ($pengobatan=='IMUNISASI') {
			$kode_imunisasi =  $this->model_pasien->get_kode_imunisasi();  
			$data_imunisasi= array(
				'kode_imunisasi' =>$kode_imunisasi,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb  
			); 

			// var_dump($data_imunisasi);
			// exit();


			
			$insert=$this->db->insert('tbl_imunisasi',$data_imunisasi); 
		}


		if ($pengobatan=='BBL') {
			$kode_bbl =  $this->model_pasien->get_kode_bbl();  
			$data_bbl= array(
				'kode_bbl' =>$kode_bbl,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb 


			); 

			// var_dump($data_bbl);
			// exit();
			$insert=$this->db->insert('tbl_bbl',$data_bbl); 
		}


		if ($pengobatan=='NIFAS') {
			$kode_nifas =  $this->model_pasien->get_kode_nifas();  
			$data_nifas= array(
				'kode_nifas' =>$kode_nifas,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat,
				'suhu' =>$suhu,
				'tensi_darah' =>$tensi_darah,
				'saturasi' =>$saturasi,
				'pernapasan' =>$pernapasan,
				'nadi' =>$nadi,
				'bb' =>$bb,
				'tb' =>$tb


			); 

			// var_dump($data_nifas);
			// exit();			
			$insert=$this->db->insert('tbl_nifas',$data_nifas); 
		}



		if ($pengobatan=='PEMERIKSAAN LABORATORIUM') {
			$kode_lab = $this->model_laboratorium->buat_kode();
			$data_lab= array(
				'kode_lab' =>$kode_lab,
				'kode_pasien' =>$kode_pasien, 
				'status_pasien' =>'Belum Diperiksa',
				// 'keterangan_pemeriksaan_lab' =>$keterangan_pemeriksaan_lab, 
				'keterangan_pemeriksaan_lab' =>$this->input->post('keterangan_pemeriksaan_lab'),
				'tanggal_berobat' =>$tanggal_berobat  
			); 

			// var_dump($data_lab);
			// exit();
			$insert=$this->db->insert('tbl_pemeriksaan_lab',$data_lab); 
		}



		if ($pengobatan=='RAPID TES SARS - COVID-2') {
			$kode_rapid =  $this->model_pasien->get_kode_rapid();  
			$no_lab =  $this->model_pasien->get_no_lab_rapid();  

			$data_rapid= array(
				'kode_rapid' =>$kode_rapid,
				'no_lab' =>$no_lab,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat 


			); 

			// var_dump($data_rapid;
			// exit();


			
			$insert=$this->db->insert('tbl_rapid',$data_rapid); 
		}




		if ($pengobatan=='SWAB ANTIGEN SARS - COV-2') {
			$kode_swab =  $this->model_pasien->get_kode_swab();  
			$no_lab =  $this->model_pasien->get_no_lab_swab();  

			$data_swab= array(
				'kode_swab' =>$kode_swab,
				'no_lab' =>$no_lab,
				'kode_pasien' =>$kode_pasien,
				// 'pengobatan' =>$pengobatan, 
				'status_pasien' =>'Belum Diperiksa',
				'tanggal_berobat' =>$tanggal_berobat 


			); 

			$insert=$this->db->insert('tbl_swab',$data_swab); 
		}

		if ($pengobatan=='SURAT PENOLAKAN') {
			$kode_surat_penolakan =  $this->model_pasien->get_kode_surat_penolakan();  
			$data_penolakan= array(
				'kode_surat_penolakan' =>$kode_surat_penolakan,
				'kode_pasien' =>$kode_pasien, 
				'tanggal_peembuatan_surat' =>date('Y-m-d'), 
			);

			// var_dump($data_penolakan);
			// exit();
			$insert=$this->db->insert('tbl_surat_penolakan',$data_penolakan); 
		} 


		if ($pengobatan=='RAWAT INAP') {
			
			$kode_ranap =  $this->model_pasien->get_kode_ranap(); 
					// ttd 
			$waktu = strval('assets\img\ttd_app\gambar0'.time().'.png');
			file_put_contents($waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd0') ) ) );
		// ttd1
			$waktu1 = strval('assets\img\ttd_app\gambar2'.time().'.png');
			file_put_contents($waktu1, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd1') ) ) );
		// ttd2
			$waktu2 = strval('assets\img\ttd_app\gambar3'.time().'.png');
			file_put_contents($waktu2, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd2') ) ) );

			if ($this->input->post('persetujuan_rawat')=="menyetujui") {
				$status_pasien="Belum Diperiksa";

			}else{
				$status_pasien="Ditolak";

			}
			$data_ranap= array(
				'kode_ranap' =>$kode_ranap,
				'kode_pasien' =>$kode_pasien,
				'date_time_update' =>date('Y-m-d H:i:s'),

				'status_pasien' =>$status_pasien,
				'tanggal_berobat' =>$tanggal_berobat,
				'nama_approval' =>$this->input->post('nama_approval'),
				'umur_approval' =>$this->input->post('umur_approval'),
				'hubungan_dengan_pasien' =>$this->input->post('hubungan_dengan_pasien'),
				'nik_approval' =>$this->input->post('nik_approval'),
				'ruang_rawat' =>$this->input->post('ruang_rawat'),
				'nama_saksi1' =>$this->input->post('nama_saksi1'),
				'nama_saksi2' =>$this->input->post('nama_saksi2'),
				'persetujuan_rawat' =>$this->input->post('persetujuan_rawat'),
				'ttd_saksi1'=>trim($waktu),
				'ttd_approval'=>trim($waktu1),
				'ttd_saksi2'=>trim($waktu2),
				'jenis_kelamin_approval' =>$this->input->post('jenis_kelamin_approval'),
				'tanggal_persetujuan' =>date('Y-m-d'),
			); 

			$insert=$this->db->insert('tbl_ranap',$data_ranap); 
		}


		if ($pengobatan=='HOME CARE') {
			

			$kode_homecare =  $this->model_pasien->get_kode_homecare(); 
					// ttd 
			$waktu = strval('assets\img\ttd_app\gambar0'.time().'.png');
			file_put_contents($waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd0') ) ) );
		// ttd1
			$waktu1 = strval('assets\img\ttd_app\gambar2'.time().'.png');
			file_put_contents($waktu1, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd1') ) ) );
		// ttd2
			$waktu2 = strval('assets\img\ttd_app\gambar3'.time().'.png');
			file_put_contents($waktu2, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd2') ) ) );

			if ($this->input->post('persetujuan_rawat')=="menyetujui") {
				$status_pasien="Belum Diperiksa";

			}else{
				$status_pasien="Ditolak";

			}

			
			$data_homecare= array(
				'kode_homecare' =>$kode_homecare,
				'kode_pasien' =>$kode_pasien,
				'date_time_update' =>date('Y-m-d H:i:s'),
				'status_pasien' =>$status_pasien,
				'tanggal_berobat' =>$tanggal_berobat,
				'nama_approval' =>$this->input->post('nama_approval'),
				'umur_approval' =>$this->input->post('umur_approval'),
				'hubungan_dengan_pasien' =>$this->input->post('hubungan_dengan_pasien'),
				'nik_approval' =>$this->input->post('nik_approval'),
				'ruang_rawat' =>$this->input->post('ruang_rawat'),
				'nama_saksi1' =>$this->input->post('nama_saksi1'),
				'nama_saksi2' =>$this->input->post('nama_saksi2'),
				'persetujuan_rawat' =>$this->input->post('persetujuan_rawat'),
				'ttd_saksi1'=>trim($waktu),
				'ttd_approval'=>trim($waktu1),
				'ttd_saksi2'=>trim($waktu2),
				'jenis_kelamin_approval' =>$this->input->post('jenis_kelamin_approval'),
				'tanggal_persetujuan' =>date('Y-m-d'),
			); 

			$insert=$this->db->insert('tbl_homecare',$data_homecare); 
		}



		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Pendaftaran Pemeriksaan Pasien ".$kode_pasien, 
		);

		$this->db->insert('tbl_history', $data_history);


		// echo "<script type='text/javascript'>alert('Pasien Berhasil Didaftarkan!');</script>";
		$data['title'] = 'Berhasil';
		$data['text'] = 'Data Berhasil Di daftarkan';
		$data['icon'] = 'success';

			// echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
		$this->session->set_flashdata($data);  
		redirect('pasien','refresh');

	} 
	
	public function update_data()
	{
		$kode_pasien = $this->input->post('kode_pasien'); 
		$no_registrasi = $this->input->post('no_registrasi');
		$tanggal_daftar = $this->input->post('tanggal_daftar');
		$nik = $this->input->post('nik');
		$nama_pasien = $this->input->post('nama_pasien');
		$kepala_keluarga = $this->input->post('kepala_keluarga');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$umur = $this->input->post('umur');       
		$kepala_keluarga = $this->input->post('kepala_keluarga');   
		$agama = $this->input->post('agama');   
		$kategori_pasien = $this->input->post('kategori_pasien');   
		$status_pernikahan = $this->input->post('status_pernikahan');   
		$telepon = $this->input->post('telepon'); 
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$alamat = $this->input->post('alamat');
		$desa = $this->input->post('desa');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');


		$data = array(
			'kode_pasien' =>$kode_pasien,
			'no_registrasi' =>$no_registrasi,
			'tanggal_daftar' =>$tanggal_daftar,
			'nik' =>$nik, 
			'nama_pasien' =>$nama_pasien, 
			'kepala_keluarga' =>$kepala_keluarga, 
			'jk' =>$jk, 
			'tempat_lahir' =>$tempat_lahir,
			'tanggal_lahir' =>$tanggal_lahir, 
			'umur' =>$umur, 
			'kepala_keluarga' =>$kepala_keluarga, 
			'agama' =>$agama, 
			'kategori_pasien' =>$kategori_pasien, 
			'status_pernikahan' =>$status_pernikahan, 
			'telepon' =>$telepon,
			'rt' =>$rt,
			'rw' =>$rw, 
			'alamat' =>$alamat,
			'desa' =>$desa,
			'kecamatan' =>$kecamatan,
			'kabupaten' =>$kabupaten
		);

		// var_dump($data);
		// exit();


		$where  = array(
			'kode_pasien' => $kode_pasien 
		);

		$this->model_pasien->edit_aksi($where,$data,'tbl_pasien'); 

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Data Pasien ".$kode_pasien, 
		);

		$this->db->insert('tbl_history', $data_history);

		redirect('pasien');	
	}


}
