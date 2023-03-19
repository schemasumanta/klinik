<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');	
		
	}
	
	public function  getdata_bykode(){
		$kode_rekam = $this->input->post('kode_rekam');
		$data = $this->model_laboratorium->tampil_data_lab_bykode($kode_rekam);
		foreach ($data as $key) {
			$kode_lab = $key->kode_lab;
		}
		echo json_encode($kode_lab);
	}
	public function index()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Laboratorium", 
		);
		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laboratorium/tampilan_labor');
		$this->load->view('template/footer');
	}

	public function laporan_laboratorium()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laboratorium/laporan_laboratorium');
		$this->load->view('template/footer');
	}

	public function tarik_report_lab()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Lab By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);

		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_lab= $this->uri->segment(3);
		$tanggal_akhir_lab= $this->uri->segment(4);


		$data['tanggal_awal_lab']=$tanggal_awal_lab;
		$data['tanggal_akhir_lab']=$tanggal_akhir_lab;

		$data['laporan_lab'] = $this->model_laboratorium->tarik_reportlab($tanggal_awal_lab,$tanggal_akhir_lab);
		// var_dump($data['laporan_lab']);
		// exit();
		$this->load->view('laboratorium/report_lab',$data);
		$paper_size = 'A3';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}



	public function tabel_laboratorium_belum_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_lab';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('laboratorium_belum_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='<div class="btn-group"><a href="'.base_url().'laboratorium/periksa_pasien/'.$l->kode_lab.'" class="btn btn-success btn-sm btn-flat  "> <i class="fas fa-capsules mr-1"></i> Periksa Pasien</a><a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_lab.'"><i class="fa fa-trash"></i></a></div>';

        $l->opsi = $opsi;



        $data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('laboratorium_belum_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('laboratorium_belum_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	public function tabel_laboratorium_sudah_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_lab';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('laboratorium_sudah_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='
			<div class="btn-group">
			<a href="'.base_url().'laboratorium/detail_laboratorium_pasien/'.$l->kode_lab.'" class="btn btn-success btn-sm btn-flat item_periksa_pasien "> <i class="fas fa-eye mr-1"></i></a>
			<a href="'.base_url().'laboratorium/edit_lab/'.$l->kode_lab.'" data="'.$l->kode_lab.'" class="btn btn-info ><i class="fa fa-edit mr-1"></i>Edit Hasil Lab</a>
			<a href="'.base_url().'laboratorium/cetak_lab/'.$l->kode_lab.'" class="btn btn-dark btn-sm btn-flat item_cetak "  target="_blank"> <i class="fas fa-print mr-1"></i> Cetak</a>
			</div>';

        $l->opsi = $opsi;



        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('laboratorium_sudah_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('laboratorium_sudah_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}





	public function hapus_data_lab()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Laboratorium dengan Kode ".$this->input->post('kode_lab'), 
		);
		$this->db->insert('tbl_history', $data_history);


		$this->db->where('kode_lab',$this->input->post('kode_lab'));
		$this->db->delete('tbl_pemeriksaan_lab');
		$this->db->where('kode_lab',$this->input->post('kode_lab'));
		$this->db->delete('tbl_sub_lab');
		redirect('laboratorium','refresh');
	}
	public function list_lab()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laboratorium/tampil_list_lab');
		$this->load->view('template/footer');
	}
	public function detail_laboratorium_pasien($kode)
	{
		$data['detail_laboratorium_pasien'] = $this->model_laboratorium->detail_laboratorium_pasien($kode);
		$data['detail_sub'] = $this->model_laboratorium->detail_sub($kode);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laboratorium/detail_laboratorium_pasien',$data);
		$this->load->view('template/footer');
	}
	public function detail_laboratorium_pasien2($kode)
	{
		$data['detail_laboratorium_pasien'] = $this->model_laboratorium->detail_laboratorium_pasien($kode);
		$data['detail_sub'] = $this->model_laboratorium->detail_sub($kode);
		$this->load->view('laboratorium/detail_laboratorium_pasien',$data);
	}
	public function cetak_lab2($kode)
	{
		$data['detail_laboratorium_pasien'] = $this->model_laboratorium->detail_laboratorium_pasien($kode);
		$data['detail_sub'] = $this->model_laboratorium->detail_sub_cetak($kode);
		$this->load->view('laboratorium/cetak_lab',$data);
	}

	public function cetak_lab($kode)
	{
		$data['detail_laboratorium_pasien'] = $this->model_laboratorium->detail_laboratorium_pasien($kode);
		$data['detail_sub'] = $this->model_laboratorium->detail_sub_cetak($kode);
		$this->load->library('dompdf_gen');
		$this->load->view('laboratorium/cetak_lab_pdf',$data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html,'SURAT KETERANGAN LABORATORIUM - '.$kode, TRUE, $paper_size, $orientation);


	}
	public function tampil_data_lab()
	{
		$data = $this->model_laboratorium->tampil_data_lab(); 
		echo json_encode($data);  
	}

	public function tampil_data_listlab()
	{
		$data = $this->model_laboratorium->tampil_data_listlab(); 
		echo json_encode($data);  
	}
	public function simpandata()
	{
		$kode_lab = $this->input->post('kode_lab');
		$this->db->select('*');
		$this->db->where('kode_lab',$kode_lab);
		$rekam_lab = $this->db->get('tbl_pemeriksaan_lab')->result();
		$kode_rekam ='';

		foreach ($rekam_lab as $key) {
			$kode_rekam = $key->kode_rekam;
			$kode_pasien =$key->kode_pasien;
		}
		$data  = array(
			'status_pasien' => "Sudah Diperiksa", 
			'tanggal_periksa' => date('Y-m-d'), 
			'petugas_lab' => $this->session->nama_admin, 
			'total_akhir' => str_replace('.','',$this->input->post('total_akhir')), 
		);
		$this->db->set($data);
		$this->db->where('kode_lab',$kode_lab);
		$result = $this->db->update('tbl_pemeriksaan_lab');

		if ($kode_rekam=='') {
			$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
			$tanggal_periksa =    date("Y-m-d H:i:s");
			$data_pembayaran = array(
				'kode_pembayaran' => $kode_pembayaran, 
				'kode_pasien' => $kode_pasien, 
				'kode_rekam' => $kode_lab, 
				'tanggal_pembayaran' => $tanggal_periksa,
				'dokter_pemeriksa' => $this->session->nama_admin, 
				'status_pembayaran' => 'Menunggu Pembayaran');
			$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran);
		}


		if ($result) {

			$sub_kategori = $this->input->post('sub_kategori');
			$hasil_lab = $this->input->post('hasil_lab');
			$nilai_normal = $this->input->post('nilai_normal');
			for ($i=0; $i < count($hasil_lab) ; $i++) { 
				$data_sub = array(
					'kode_lab' =>$kode_lab,
					'kode_kategori_lab' =>$sub_kategori[$i], 
					'hasil' =>$hasil_lab[$i], 
					'nilai_normal' =>$nilai_normal[$i], 
				);
				$this->db->insert('tbl_sub_lab',$data_sub);
			}

			
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Melakukan Pemeriksaan Laboratorium dengan Kode ".$kode_lab, 
			);
			$this->db->insert('tbl_history', $data_history);



			echo "<script type='text/javascript'>alert('Data Berhasil Disimpan')</script>";
			redirect('laboratorium','refresh');
		}


	}

	public function updatedata()
	{


		$kode_lab = $this->input->post('kode_lab');
		$this->db->select('*');
		$this->db->where('kode_lab',$kode_lab);
		$rekam_lab = $this->db->get('tbl_pemeriksaan_lab')->result();
		$kode_rekam ='';

		foreach ($rekam_lab as $key) {
			$kode_rekam = $key->kode_rekam;
			$kode_pasien =$key->kode_pasien;
		}

		$data  = array(
			'status_pasien' => "Sudah Diperiksa", 
			'petugas_lab' => $this->session->nama_admin, 
			'total_akhir' => str_replace('.','',$this->input->post('total_akhir')), 
		);
		$this->db->set($data);
		$this->db->where('kode_lab',$kode_lab);
		$result = $this->db->update('tbl_pemeriksaan_lab');

		if ($result) {

			$this->db->where('kode_lab',$kode_lab);
			$this->db->delete('tbl_sub_lab');

			$sub_kategori = $this->input->post('sub_kategori');
			$hasil_lab = $this->input->post('hasil_lab');
			$nilai_normal = $this->input->post('nilai_normal_edit');

			for ($i=0; $i < count($hasil_lab) ; $i++) { 
				$data_sub = array(
					'kode_lab' =>$kode_lab,
					'kode_kategori_lab' =>$sub_kategori[$i], 
					'hasil' =>$hasil_lab[$i], 
					'nilai_normal'  => $nilai_normal[$i], 
				);
				$this->db->insert('tbl_sub_lab',$data_sub);
			}
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Data Pemeriksaan Laboratorium dengan Kode ".$kode_lab, 
			);
			$this->db->insert('tbl_history', $data_history);
			echo "<script type='text/javascript'>alert('Data Berhasil Diupdate')</script>";
			redirect('laboratorium','refresh');
		}


	}

	public function periksa_pasien($kode_lab)
	{
		$data['periksa_labor'] =$this->model_laboratorium->periksa_pasien_labor($kode_lab);
		$data['kategori'] = $this->model_laboratorium->getkategori();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laboratorium/periksa_labor',$data);
		$this->load->view('template/footer');
	}


	public function edit_lab($kode)
	{
		$data['edit_data_lab'] = $this->model_laboratorium->edit_data_lab($kode);
		$data['detail_sub'] = $this->model_laboratorium->detail_sub($kode);
		$data['kategori'] = $this->model_laboratorium->getkategori();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laboratorium/edit_lab',$data);
		$this->load->view('template/footer');

	}
}
