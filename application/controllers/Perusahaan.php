<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');

			redirect('dashboard','refresh');
		}elseif($this->session->level!='superadmin' && $this->session->level!='direksi' && $this->session->level!='general_manager' && $this->session->level!='manager_finance')  {
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
			'aktivitas' => "Mengakses Menu Perusahaan",
		);
		$this->db->insert('tbl_history', $data_history);


		$data['perusahaan']=$this->db->get('tbl_perusahaan')->num_rows();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('perusahaan/tampilan_perusahaan',$data);
		$this->load->view('template/footer');
	}

	public function data_perusahaan()
	{
		$data=$this->model_perusahaan->tampildata();
		echo json_encode($data);
	}

	public function edit_perusahaan()
	{
		$this->db->where('id',$this->input->get('id'));
		$data=$this->db->get('tbl_perusahaan')->result();
		echo json_encode($data);
	}




	public function update_data_perusahaan()
	{

		if (!is_dir('assets/img/perusahaan/')) {
			mkdir('assets/img/perusahaan/');
		}

		$logo_pt = $this->input->post('lampiran_logolama');

		if($_FILES['lampiran_logo']['name'] != '')
		{
			$filename = trim($_FILES['lampiran_logo']['name']);
			$tgl =explode('-',date('Y-m-d'));
			$awalan = $tgl[0].$tgl[1].$tgl[2];
			$location ='assets/img/perusahaan/logo'.$awalan.$filename;
			$file_extension = pathinfo($location, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$image_ext = array("jpg", "png", "jpeg", "gif");
			if (in_array($file_extension, $image_ext)) {
				if (move_uploaded_file($_FILES['lampiran_logo']['tmp_name'], $location)) {
					$logo_pt = $location;
				}
			}
		}

		$logo_header = $this->input->post('lampiran_headerlama');

		if($_FILES['lampiran_header']['name'] != '')
		{
			$filename = trim($_FILES['lampiran_header']['name']);
			$tgl =explode('-',date('Y-m-d'));
			$awalan = $tgl[0].$tgl[1].$tgl[2];
			$location ='assets/img/perusahaan/header'.$awalan.$filename;
			$file_extension = pathinfo($location, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$image_ext = array("jpg", "png", "jpeg", "gif");
			if (in_array($file_extension, $image_ext)) {
				if (move_uploaded_file($_FILES['lampiran_header']['tmp_name'], $location)) {
					$logo_header = $location;
				}
			}
		}

		$logo_icon = $this->input->post('lampiran_iconlama');

		if($_FILES['lampiran_icon']['name'] != '')
		{
			$filename = trim($_FILES['lampiran_icon']['name']);
			$tgl =explode('-',date('Y-m-d'));
			$awalan = $tgl[0].$tgl[1].$tgl[2];
			$location ='assets/img/perusahaan/icon'.$awalan.$filename;
			$file_extension = pathinfo($location, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$image_ext = array("jpg", "png", "jpeg", "gif");
			if (in_array($file_extension, $image_ext)) {
				if (move_uploaded_file($_FILES['lampiran_icon']['tmp_name'], $location)) {
					$logo_icon = $location;
				}
			}
		}

		$data_update = array(
			'nama_pt' 		=> $this->input->post('nama_pt'), 
			'alamat' 		=> $this->input->post('alamat'), 
			'email' 		=> $this->input->post('email'), 
			'telepon' 		=> $this->input->post('telepon'), 
			'handphone' 	=> $this->input->post('handphone'),
			'pemilik' 		=> $this->input->post('pemilik_perusahaan'),
			'logo_pt' 		=> $logo_pt, 
			'logo_header' 	=> $logo_header, 
			'favicon' 		=> $logo_icon, 
		);

		$this->db->set($data_update);
		$this->db->where('id',$this->input->post('id_perusahaan'));
		$result = $this->db->update('tbl_perusahaan');

		if ($result) {


			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Data Perusahaan",
			);

			$this->db->insert('tbl_history', $data_history);



			$data['title'] = 'Berhasil';
			$data['text'] = 'Data Perusahaan Berhasil Di Update!';
			$data['icon'] = 'success';

		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Data Perusahaan Gagal Di Update!';
			$data['icon'] = 'error';
		}

		$this->session->set_flashdata($data);
		redirect('perusahaan');
	}


	public function simpan()
	{

		if (!is_dir('assets/img/perusahaan/')) {
			mkdir('assets/img/perusahaan/');
		}

		$logo_pt = $this->input->post('lampiran_logolama');

		if($_FILES['lampiran_logo']['name'] != '')
		{
			$filename = trim($_FILES['lampiran_logo']['name']);
			$tgl =explode('-',date('Y-m-d'));
			$awalan = $tgl[0].$tgl[1].$tgl[2];
			$location ='assets/img/perusahaan/logo'.$awalan.$filename;
			$file_extension = pathinfo($location, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$image_ext = array("jpg", "png", "jpeg", "gif");
			if (in_array($file_extension, $image_ext)) {
				if (move_uploaded_file($_FILES['lampiran_logo']['tmp_name'], $location)) {
					$logo_pt = $location;
				}
			}
		}

		$logo_header = $this->input->post('lampiran_headerlama');

		if($_FILES['lampiran_header']['name'] != '')
		{
			$filename = trim($_FILES['lampiran_header']['name']);
			$tgl =explode('-',date('Y-m-d'));
			$awalan = $tgl[0].$tgl[1].$tgl[2];
			$location ='assets/img/perusahaan/header'.$awalan.$filename;
			$file_extension = pathinfo($location, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$image_ext = array("jpg", "png", "jpeg", "gif");
			if (in_array($file_extension, $image_ext)) {
				if (move_uploaded_file($_FILES['lampiran_header']['tmp_name'], $location)) {
					$logo_header = $location;
				}
			}
		}

		$logo_icon = $this->input->post('lampiran_iconlama');

		if($_FILES['lampiran_icon']['name'] != '')
		{
			$filename = trim($_FILES['lampiran_icon']['name']);
			$tgl =explode('-',date('Y-m-d'));
			$awalan = $tgl[0].$tgl[1].$tgl[2];
			$location ='assets/img/perusahaan/icon'.$awalan.$filename;
			$file_extension = pathinfo($location, PATHINFO_EXTENSION);
			$file_extension = strtolower($file_extension);
			$image_ext = array("jpg", "png", "jpeg", "gif");
			if (in_array($file_extension, $image_ext)) {
				if (move_uploaded_file($_FILES['lampiran_icon']['tmp_name'], $location)) {
					$logo_icon = $location;
				}
			}
		}



		$data_perusahaan = array(
			'nama_pt' 		=> $this->input->post('nama_pt'), 
			'alamat' 		=> $this->input->post('alamat'), 
			'email' 		=> $this->input->post('email'), 
			'telepon' 		=> $this->input->post('telepon'), 
			'handphone' 	=> $this->input->post('handphone'),
			'pemilik' 		=> $this->input->post('pemilik_perusahaan'),
			'logo_pt' 		=> $logo_pt, 
			'logo_header' 	=> $logo_header, 
			'favicon' 		=> $logo_icon, 
		);

		$result = $this->db->insert('tbl_perusahaan',$data_perusahaan);

		if ($result) {

			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menambah Data Perusahaan",
			);

			$this->db->insert('tbl_history', $data_history);


			$data['title'] = 'Berhasil';
			$data['text'] = 'Data Perusahaan Berhasil Di Simpan!';
			$data['icon'] = 'success';

		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Data Perusahaan Gagal Di Simpan!';
			$data['icon'] = 'error';
		}

		$this->session->set_flashdata($data);
		redirect('perusahaan');
	}



	public function uploadphotox(){

		$filename = $_FILES['logo_pt']['name'];
		
		// Location
		$location ='assets/img/'.$filename;


		// file extension
		$file_extension = pathinfo($location, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);

		// Valid image extensions
		$image_ext = array("jpg","png","jpeg","gif","svg");

		$response = 0;
		if(in_array($file_extension,$image_ext)){
  		// Upload file
			if(move_uploaded_file($_FILES['logo_pt']['tmp_name'],$location)){
				$response = $location;
			}
		}

		echo $response;
	}

	public function uploadphoto2x(){

		$filename = $_FILES['logo_header']['name'];
		
		// Location
		$location ='assets/img/'.$filename;


		// file extension
		$file_extension = pathinfo($location, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);

		// Valid image extensions
		$image_ext = array("jpg","png","jpeg","gif","svg");

		$response = 0;
		if(in_array($file_extension,$image_ext)){
  		// Upload file
			if(move_uploaded_file($_FILES['logo_header']['tmp_name'],$location)){
				$response = $location;
			}
		}

		echo $response;
	}

	public function uploadphoto3x(){

		$filename = $_FILES['favicon']['name'];
		
		// Location
		$location ='assets/img/'.$filename;


		// file extension
		$file_extension = pathinfo($location, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);

		// Valid image extensions
		$image_ext = array("jpg","png","jpeg","gif","svg");

		$response = 0;
		if(in_array($file_extension,$image_ext)){
  		// Upload file
			if(move_uploaded_file($_FILES['favicon']['tmp_name'],$location)){
				$response = $location;
			}
		}

		echo $response;
	}

	// Upload update FOto 





}