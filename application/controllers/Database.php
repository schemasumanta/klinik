<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {
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
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('backup/backup_restore');
		$this->load->view('template/footer');
	}
}
