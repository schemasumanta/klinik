<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swab extends CI_Controller {
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
		$this->load->view('swab/tampilan_swab');
		$this->load->view('template/footer');
	}


	public function hapus()
	{
		$this->db->where('kode_swab',$this->input->post('kode_swab'));
		$data = $this->db->delete('tbl_swab');
		echo json_encode($data);
	}


	public function tabel_swab_belum_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_swab';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('swab_belum_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='<div class="btn-group"><a href="'.base_url().'swab/periksa_swab/'.$l->kode_swab.'" class="btn btn-success btn-sm btn-flat  "><i class="fas fa-capsules mr-1"></i> Periksa Pasien</a><a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_swab.'"><i class="fa fa-trash"></i></a></div>';

        $l->opsi = $opsi;



        $data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('swab_belum_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('swab_belum_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	

	public function tabel_swab_sudah_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_swab';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('swab_sudah_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='
			<div class="btn-group">
			<a href="'.base_url().'swab/edit_data/'.$l->kode_swab.'" class="btn  btn-sm  btn-flat item_edit_rekam "style="font-weight: bold;background:#699e00; color:white;"> <i class="fa fa-edit"></i> Edit Data </a>
          <a href="'.base_url().'swab/print_data/'.$l->kode_swab.'" class="btn btn-sm btn-flat"   target="_blank"  style="font-weight: bold;background:#dc9800;color:white;" > <i class="fas fa-print mr-1"></i></a>

			</div>';

        $l->opsi = $opsi;

        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('swab_sudah_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('swab_sudah_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}



	public function tampil_data_swab()
	{ 
		$data = $this->model_swab->tampil_swab(); 
		echo json_encode($data);  
	}

	public function tampil_data_swab2()
	{
		$data = $this->model_swab->tampil_swab2(); 
		echo json_encode($data); 
	}

	public function periksa_swab($kode)
	{
		$kode_swab = $this->uri->slash_segment(3).$this->uri->segment(4);  
		$data['periksa_pasien']= $this->model_swab->periksa_pasien($kode_swab);   	
		 	 		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('swab/periksa_pasien_swab',$data);
		$this->load->view('template/footer');
	}

	public function simpan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');

		$kode_swab = $this->input->post('kode_swab');   
		$kode_pasien = $this->input->post('kode_pasien'); 

		$data_rekam= array(
			'status_pasien' =>'Sudah Diperiksa',
			'tanggal_periksa' =>$this->input->post('tanggal_periksa'),
			'pemeriksaan' => $this->input->post('pemeriksaan'),
			'hasil' => $this->input->post('hasil'),
			'nilai_normal' => $this->input->post('nilai_normal'),
			'metode_pemeriksaan' => $this->input->post('metode_pemeriksaan'),
			'pemeriksaan_swab' => $this->input->post('pemeriksaan_swab'), 
			'dokter_pengirim' => $this->input->post('dokter_pengirim'), 
			'tanggal_pengambilan_spesimen' => $this->input->post('tanggal_pengambilan_spesimen'), 
			'tanggal_keluar_hasil' => $this->input->post('tanggal_keluar_hasil'), 
			'total_akhir' =>$this->uri->segment(3),
			'dokter_pemeriksa' => $this->session->nama_admin, 
			'upah_dokter' =>'0', 

		);

		// var_dump($data_rekam);
		// exit();


		$this->db->set($data_rekam); 
		$this->db->where('kode_swab',$kode_swab); 
		$result= $this->db->update('tbl_swab'); 
		if ($result) {
			$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
			$tanggal_periksa =    date("Y-m-d H:i:s");


			$data_pembayaran = array(
				'kode_pembayaran' => $kode_pembayaran, 
				'kode_pasien' => $kode_pasien, 
				'kode_rekam' => $kode_swab, 
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
				'aktivitas' => "Melakukan Pemeriksaan Swab dengan Kode ".$kode_swab,
			);

			$this->db->insert('tbl_history', $data_history);


				echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
				redirect('swab','refresh');
			}

		}
	}

	public function print_data($kode)
	{

		$this->load->library('dompdf_gen');
		$kode_swab = $this->uri->slash_segment(3).$this->uri->segment(4);   

		$data['data_swab']= $this->model_swab->getdataswab($kode_swab);	 
		$this->load->view('swab/surat_swab_pdf',$data); 
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html, strtoupper('SURAT SWAB '.date('Y-md')), TRUE, $paper_size, $orientation);


	}
}
