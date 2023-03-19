<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rujukan extends CI_Controller {
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
		$this->load->view('rujukan/tampilan_rujukan');
		$this->load->view('template/footer');

	}

	public function tabel_rujukan(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'id';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('rujukan',$sort,$order,$search);

		foreach ($list as $l) {

			$no++;
			$l->no = $no;
			// $opsi='
			// <div class="btn-group"><a  href="'.base_url().'rujukan/edit_rujukan/'.$l->kode_rujukan.'" class="btn btn-sm btn-flat btn-primary" data="'.$l->kode_rujukan.'"><i class="fa fa-edit"></i></a>';

				$opsi='<div class="btn-group"><a href="'.base_url().'rujukan/cetak/'.$l->kode_rujukan.'" class="btn btn-sm  btn-success btn-flat item_cetak_rujukan" target="_blank"><i class="fas fa-print mr-2"></i>Cetak</a>'; 

				if ($this->session->level=="superadmin") {
					
				$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus_rujukan" data-kode="'.$l->kode_rujukan.'" data-status="0"><i class="fa fa-trash"></i></a>';
				}

				$opsi.='</div>';

			
			$l->opsi = $opsi;

			$data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('rujukan',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('rujukan',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	public function cetak()
	{
		// $kode_rujukan = $this->model_rujukan->buat_kode();

		$kode_rujukan = $this->uri->slash_segment(3).$this->uri->slash_segment(4).$this->uri->slash_segment(5).$this->uri->segment(6);

		$this->db->set('status_rujukan',"Sudah Dicetak");
		$this->db->where('kode_rujukan',$kode_rujukan);
		$this->db->update('tbl_rujukan');

		$this->load->library('dompdf_gen');

		$data['cetak_surat']= $this->model_rujukan->cetak($kode_rujukan);

	$this->load->view('rujukan/surat_rujukan'

		,$data
	); 
		
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html, "SURAT RUJUKAN".strtoupper($kode_rujukan), TRUE, $paper_size, $orientation);


	} 

}
