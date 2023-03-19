<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
function __construct()
	{
		parent::__construct();
		// if ($this->session->login==FALSE) {

		// 	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');
		// 	redirect('login','refresh');
		// }
		date_default_timezone_set('Asia/Jakarta');	
		
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('antrian/list_antrian');
		$this->load->view('template/footer');

	}
	public function tunggu_antrian()
	{
		$data = $this->model_antrian->tunggu_antrian();
		echo json_encode($data);
	}
		public function tampilan_tunggu_antrian()
	{
		$data = $this->model_antrian->tampilan_tunggu_antrian();
		echo json_encode($data);
	}
	public function update_antrian(){
		$nomor_antrian = $this->input->post('nomor_antrian');
		$this->db->where('nomor_antrian',$nomor_antrian);
		$this->db->where('status_antrian',"Menunggu");
		$this->db->where('left(tanggal_cetak_antrian,10)',date("Y-m-d"));
		$hasil = $this->db->get('tbl_antrian')->num_rows();
		if ($hasil == 0) {
		$data = $hasil;
		}else{
		$data = $this->model_antrian->update_antrian($nomor_antrian);
		}
		echo json_encode($data);

	}
	public function tampilan_antrian()
	{
		$data['perusahaan'] = $this->model_login->getperusahaan();
		$data['antrian'] = $this->model_antrian->tunggu_antrian();
		$data['slider'] = $this->model_antrian->ambil_slider();
		$data['video'] = $this->model_antrian->ambil_video();
		$this->load->view('antrian/tampilan_antrian',$data);

	}
	public function tambah_antrian()
	{
		$data['antrian'] = $this->model_antrian->antrian_terakhir();
		$data['perusahaan'] = $this->model_login->getperusahaan();

		$this->load->view('antrian/tambah_antrian',$data);

	}

	public function simpan()
	{
		$data = array(
			'nomor_antrian' => $this->input->post('nomor_antrian'), 
			'status_antrian' => 'Menunggu', 
		);
		$result = $this->db->insert('tbl_antrian',$data);
		if ($result) {
			echo json_encode("1");
		}else{
			echo json_encode("0");
		}
	}
}
