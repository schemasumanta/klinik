<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medis extends CI_Controller {
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
			'aktivitas' => "Melihat Data Medis", 
		);
		
		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('medis/tampilan_medis');
		$this->load->view('template/footer');
	}

	public function tampilan_medis()
	{ 
		$data = $this->model_medis->tampil_data_medis(); 
		echo json_encode($data);  
	}

	public function tambah_data_medis()
	{
		
		$data['kode_medis'] =$this->model_medis->buat_kode();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('medis/tambah_data_medis',$data);
		$this->load->view('template/footer');
	}

	public function simpan_data_medis()
	{

		$kode_medis = $this->input->post('kode_medis');
		$nama_medis = $this->input->post('nama_medis'); 
		$jk = $this->input->post('jk'); 
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jabatan = $this->input->post('jabatan');
		$telepon = $this->input->post('telepon');
		$alamat 		= $this->input->post('alamat');
		$foto 				= $this->input->post('foto'); 



		$data  = array('kode_medis' => $kode_medis,
			'nama_medis' => $nama_medis,
			'jk' => $jk,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jabatan' => $jabatan,
			'telepon' => $telepon,
			'alamat' => $alamat,
			'foto' => $foto
		);

			// var_dump($data);
			// exit();

		$result= $this->db->insert('tbl_medis', $data);
		if ($result) { 
			$msg = "Absen berhasil Di Simpan";
			$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menyimpan Data Medis", 
		);
		
		$this->db->insert('tbl_history', $data_history);  
			echo json_encode($msg); 			
		}	 

	}

	public function edit_medis($kode_medis)
	{ 
		$data['data_medis']= $this->model_medis->edit_medis($kode_medis);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('medis/edit_medis',$data);
		$this->load->view('template/footer');

	}

	public function update_data_medis()
	{
		$kode_medis=$this->input->post('kode_medis');

		$data = array(

			'nama_medis' 			=> $this->input->post('nama_medis'),
			'jk' 					=> $this->input->post('jk'), 
			'tempat_lahir' 			=> $this->input->post('tempat_lahir'),
			'tanggal_lahir' 		=> $this->input->post('tanggal_lahir'),
			'jabatan' 				=> $this->input->post('jabatan'),
			'telepon' 				=> $this->input->post('telepon'),
			'email' 				=> $this->input->post('email'),
			'alamat' 				=> $this->input->post('alamat'),
			'foto' 					=> $this->input->post('foto')

		);

		// var_dump($data);
		// exit();

		$this->db->set($data);
		$this->db->where('kode_medis', $kode_medis);
		$result= $this->db->update('tbl_medis');
		if ($result) {

			$msg = "Data Pasien Berhasil Diupdate";
				$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Data Medis ".$this->input->post('nama_medis'), 
		);
		
		$this->db->insert('tbl_history', $data_history); 
			echo json_encode($msg);
			
			
		}
	}

	public function hapus_data_medis()
	{
		$kode_medis=$this->input->post('kode_medis');
		$data=$this->model_medis->hapus_aksi_medis($kode_medis);

				$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Medis dengan kode ".$this->input->post('kode_medis'), 
		);
		
		$this->db->insert('tbl_history', $data_history); 


		echo json_encode($data);
	}
}
