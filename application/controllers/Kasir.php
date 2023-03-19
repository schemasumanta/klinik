<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends CI_Controller {
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
			'aktivitas' => "Melihat Data Pembelian Obat", 
		);
		$this->db->insert('tbl_history', $data_history);
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('kasir/tampilan_tebus_obat');
		$this->load->view('template/footer');


	}

	public function tampil_data_pembayaran_obat()
	{
		$data = $this->model_kasir->tampil_data_pembayaran_obat(); 
		echo json_encode($data);  
	}
}
