<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kohort extends CI_Controller {

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
			'aktivitas' => "Melihat Laporan Kohort", 
		);
		
		$this->db->insert('tbl_history', $data_history);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporankohort/laporan_kohort');
		$this->load->view('template/footer');

	}

	public function tarik_kohort_bytanggal_kb()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Kohort KB By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);

		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_kb= $this->uri->segment(3);
		$tanggal_akhir_kb= $this->uri->segment(4);


		$data['tanggal_awal_kb']=$tanggal_awal_kb;
		$data['tanggal_akhir_kb']=$tanggal_akhir_kb;

		$data['laporan_kb'] = $this->model_laporan_kohort->tarik_kohortkb_bytanggal($tanggal_awal_kb,$tanggal_akhir_kb);
		// var_dump($data['laporan_kb']);
		// exit();
		$this->load->view('laporankohort/kohort_kb',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);


	}

	public function tarik_kohort_bytanggal_bayi()
	{
			$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Kohort Bayi By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);

		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_bayi= $this->uri->segment(3);
		$tanggal_akhir_bayi= $this->uri->segment(4);


		$data['tanggal_awal_bayi']=$tanggal_awal_bayi;
		$data['tanggal_akhir_bayi']=$tanggal_akhir_bayi;

		$data['laporan_bayi'] = $this->model_laporan_kohort->tarik_kohortbayi_bytanggal($tanggal_awal_bayi,$tanggal_akhir_bayi);
		// var_dump($data['laporan_bayi']);
		// exit();
		$this->load->view('laporankohort/kohort_bayi',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}

	public function tarik_kohort_bytanggal_ibu()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Kohort Ibu By Tanggal", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_ibu= $this->uri->segment(3);
		$tanggal_akhir_ibu= $this->uri->segment(4);


		$data['tanggal_awal_ibu']=$tanggal_awal_ibu;
		$data['tanggal_akhir_ibu']=$tanggal_akhir_ibu;

		$data['laporan_ibu'] = $this->model_laporan_kohort->tarik_kohortibu_bytanggal($tanggal_awal_ibu,$tanggal_akhir_ibu);
		// var_dump($data['laporan_ibu']);
		// exit();
		$this->load->view('laporankohort/kohort_ibu',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}

}
