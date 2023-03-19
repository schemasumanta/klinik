<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kohort extends CI_Controller {
 
	public function index()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Laporan Kohort Bayi", 
		);
		$this->db->insert('tbl_history', $data_history);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('kohort/tampilan_kohort_bayi');
		$this->load->view('template/footer');
	}
}
