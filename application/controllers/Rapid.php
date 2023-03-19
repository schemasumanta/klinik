<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapid extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');	
		
	}

	public function hapus()
	{
		$this->db->where('kode_rapid',$this->input->post('kode_rapid'));
		$data = $this->db->delete('tbl_rapid');
		echo json_encode($data);
	}
	

	public function tabel_rapid_belum_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_rapid';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('rapid_belum_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='<div class="btn-group"><a href="'.base_url().'rapid/periksa_rapid/'.$l->kode_rapid.'" class="btn btn-success btn-sm btn-flat  "><i class="fas fa-capsules mr-1"></i> Periksa Pasien</a><a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_rapid.'"><i class="fa fa-trash"></i></a></div>';

        $l->opsi = $opsi;



        $data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('rapid_belum_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('rapid_belum_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	

	public function tabel_rapid_sudah_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_rapid';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('rapid_sudah_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='
			<div class="btn-group">
			<a href="'.base_url().'rapid/edit_data/'.$l->kode_rapid.'" class="btn  btn-sm  btn-flat item_edit_rekam "style="font-weight: bold;background:#699e00; color:white;"> <i class="fa fa-edit"></i> Edit Data </a>
          <a href="'.base_url().'rapid/print_data/'.$l->kode_rapid.'" class="btn btn-sm btn-flat"   target="_blank"  style="font-weight: bold;background:#dc9800;color:white;" > <i class="fas fa-print mr-1"></i></a>

			</div>';

        $l->opsi = $opsi;

        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('rapid_sudah_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('rapid_sudah_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function index()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengakses Menu Rapid",
		);

		$this->db->insert('tbl_history', $data_history);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rapid/tampilan_rapid');
		$this->load->view('template/footer');
	}

	public function tampil_data_rapid()
	{ 
		$data = $this->model_rapid->tampil_rapid(); 
		echo json_encode($data);  
	}

	public function tampil_data_rapid2()
	{
		$data = $this->model_rapid->tampil_rapid2(); 
		echo json_encode($data); 
	}

	public function periksa_rapid()
	{
		$kode_rapid = $this->uri->slash_segment(3).$this->uri->segment(4);  
		$data['periksa_pasien']= $this->model_rapid->periksa_pasien($kode_rapid);   	
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rapid/periksa_pasien_rapid',$data);
		$this->load->view('template/footer');
	}

	public function simpan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');

		$kode_rapid = $this->input->post('kode_rapid');   
		$kode_pasien = $this->input->post('kode_pasien'); 

		$data_rekam= array(
			'status_pasien' =>'Sudah Diperiksa',
			'tanggal_periksa' =>$this->input->post('tanggal_periksa'),

			'pemeriksaan' => $this->input->post('pemeriksaan'),
			'hasil' => $this->input->post('hasil'),
			'nilai_normal' => $this->input->post('nilai_normal'),
			'metode_pemeriksaan' => $this->input->post('metode_pemeriksaan'),
			'pemeriksaan_rapid' => $this->input->post('pemeriksaan_rapid'), 
			'dokter_pengirim' => $this->input->post('dokter_pengirim'), 
			'total_akhir' =>$this->uri->segment(3),
			'dokter_pemeriksa' => $this->session->nama_admin, 
			'upah_dokter' =>'0', 

		);

		// var_dump($data_rekam);
		// exit();


		$this->db->set($data_rekam); 
		$this->db->where('kode_rapid',$kode_rapid); 
		$result= $this->db->update('tbl_rapid'); 
		if ($result) {
			$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
			$tanggal_periksa =    date("Y-m-d H:i:s");


			$data_pembayaran = array(
				'kode_pembayaran' => $kode_pembayaran, 
				'kode_pasien' => $kode_pasien, 
				'kode_rekam' => $kode_rapid, 
				'tanggal_pembayaran' => $tanggal_periksa, 
				'dokter_pemeriksa' => $this->session->nama_admin,
				'status_pembayaran' => 'Menunggu Pembayaran');
			// var_dump($data_pembayaran);
			// exit();

			$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
			if ($simpan_pembayaran) {

				$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Melakukan pemeriksaan Rapid dengan Kode ".$kode_rapid,
				);

				$this->db->insert('tbl_history', $data_history);

				echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
				redirect('rapid','refresh');
			}

		}
	}

	public function print_data($kode)
	{

		$this->load->library('dompdf_gen');
		$kode_rapid = $this->uri->slash_segment(3).$this->uri->segment(4);  
		$data['data_rapid']= $this->model_rapid->getdatarapid($kode_rapid);	 
		$this->load->view('rapid/surat_rapid',$data); 
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);

	}
}
