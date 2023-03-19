
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_kebidanan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');	
		
	}
	
	public function index()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Kebidanan", 
		);

		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporanbidan/laporan_bidan');
		$this->load->view('template/footer'); 
	}

	

	public function laporan_bytanggal_bbl()
	{ 
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan BBL By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_bbl= $this->uri->segment(3);
		$tanggal_akhir_bbl= $this->uri->segment(4);


		$data['tanggal_awal_bbl']=$tanggal_awal_bbl;
		$data['tanggal_akhir_bbl']=$tanggal_akhir_bbl;

		$data['laporan_bbl'] = $this->model_bbl->tarik_data_bytanggal_bbl($tanggal_awal_bbl,$tanggal_akhir_bbl);
		$this->load->view('laporanbidan/draf_bbl',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}


	public function laporan_bytanggal_nifas()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Nifas By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_nifas= $this->uri->segment(3);
		$tanggal_akhir_nifas= $this->uri->segment(4);


		$data['tanggal_awal_nifas']=$tanggal_awal_nifas;
		$data['tanggal_akhir_nifas']=$tanggal_akhir_nifas;

		$data['laporan_nifas'] = $this->model_nifas->tarik_data_bytanggal_nifas($tanggal_awal_nifas,$tanggal_akhir_nifas);
		$this->load->view('laporanbidan/draf_nifas',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		
	}
	public function laporan_bytanggal_anc()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan ANC By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal= $this->uri->segment(3);
		$tanggal_akhir= $this->uri->segment(4);


		$data['tanggal_awal']=$tanggal_awal;
		$data['tanggal_akhir']=$tanggal_akhir;

		$data['laporan_anc'] = $this->model_anc->tarik_data_bytanggal_anc($tanggal_awal,$tanggal_akhir);
		$this->load->view('laporanbidan/draf_anc',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}

	public function laporan_bytanggal_inc()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan INC By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_inc= $this->uri->segment(3);
		$tanggal_akhir_inc= $this->uri->segment(4);


		$data['tanggal_awal_inc']=$tanggal_awal_inc;
		$data['tanggal_akhir_inc']=$tanggal_akhir_inc;

		$data['laporan_inc'] = $this->model_inc->tarik_data_bytanggal_inc($tanggal_awal_inc,$tanggal_akhir_inc);
		$this->load->view('laporanbidan/draf_inc',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}

	

	public function laporan_bytanggal_umum()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Rekam Medik Umum By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);

		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_umum= $this->uri->segment(3);
		$tanggal_akhir_umum= $this->uri->segment(4);


		$data['tanggal_awal_umum']=$tanggal_awal_umum;
		$data['tanggal_akhir_umum']=$tanggal_akhir_umum;

		$data['laporan_umum'] = $this->model_rekam->tarik_data_bytanggal_umum($tanggal_awal_umum,$tanggal_akhir_umum);
		// var_dump($data['laporan_umum']);
		// exit();
		$this->load->view('laporanbidan/draf_umum',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}


	public function laporan_bytanggal_kb()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan KB By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);
		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_kb= $this->uri->segment(3);
		$tanggal_akhir_kb= $this->uri->segment(4);


		$data['tanggal_awal_kb']=$tanggal_awal_kb;
		$data['tanggal_akhir_kb']=$tanggal_akhir_kb;

		$data['laporan_kb'] = $this->model_rekam_kb->tarik_data_bytanggal_kb($tanggal_awal_kb,$tanggal_akhir_kb);


		$this->load->view('laporanbidan/draf_kb',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	} 


	public function laporan_bytanggal_imunisasi()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Imunisasi By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_imunisasi= $this->uri->segment(3);
		$tanggal_akhir_imunisasi= $this->uri->segment(4);


		$data['tanggal_awal_imunisasi']=$tanggal_awal_imunisasi;
		$data['tanggal_akhir_imunisasi']=$tanggal_akhir_imunisasi;

		$data['laporan_imunisasi'] = $this->model_imunisasi->tarik_data_bytanggal_imunisasi($tanggal_awal_imunisasi,$tanggal_akhir_imunisasi);
		$this->load->view('laporanbidan/draf_imunisasi',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}
}
