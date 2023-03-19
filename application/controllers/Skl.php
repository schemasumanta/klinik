<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skl extends CI_Controller {


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('skl/tampilan_skl');
		$this->load->view('template/footer');

	}


	public function tabel_kelahiran(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'id';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('kelahiran',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

        $l->opsi = '
			<div class="btn-group"> 
			<a  href="'.base_url().'skl/cetak/'.$l->id.'" class="btn btn-sm btn-success btn-flat item_edit_user"  target="_blank"><i class="fa fa-print mr-1"></i>Cetak Surat</a>

			</div>';


        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('kelahiran',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('kelahiran',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function simpanskl()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$kode_kelahiran = $this->model_skl->buat_kode();   

		$tanggal = $this->input->post('tanggal');  
		$jenis_kelamin = $this->input->post('jenis_kelamin');  


		$anak_ke = $this->input->post('anak_ke');  
		$jam = $this->input->post('jam');  
		$jenis_kelamin = $this->input->post('jenis_kelamin'); 
		// $jenis_kelamin = date("Y-m-d"); 
		$hari = $this->input->post('hari'); 
		$nama_bayi = $this->input->post('nama_bayi');

		$berat_badan = $this->input->post('berat_badan'); 
		$panjang_badan = $this->input->post('panjang_badan'); 
		$dengan_pertolongan = $this->input->post('dengan_pertolongan'); 
		$nama_ayah = $this->input->post('nama_ayah'); 
		$umur_ayah = $this->input->post('umur_ayah'); 
		$nik_ayah = $this->input->post('nik_ayah'); 

		$nama_ibu = $this->input->post('nama_ibu'); 
		$umur_ibu = $this->input->post('umur_ibu'); 
		$nik_ibu = $this->input->post('nik_ibu');  
		$yang_bertanda_tangan = $this->input->post('yang_bertanda_tangan'); 
		$alamat = $this->input->post('alamat'); 



		$data_skl= array('kode_kelahiran' =>$kode_kelahiran,   
			'tanggal' =>$tanggal, 
			'jenis_kelamin' =>$jenis_kelamin, 
			'anak_ke' =>$anak_ke, 
			'jam' =>$jam,   
			'jenis_kelamin' =>$jenis_kelamin, 
			'hari' =>$hari,
			'nama_bayi' =>$nama_bayi, 
			'berat_badan' =>$berat_badan,
			'panjang_badan' =>$panjang_badan,
			'dengan_pertolongan' =>$dengan_pertolongan,
			'nama_ayah' =>$nama_ayah,
			'umur_ayah' =>$umur_ayah,
			'nik_ayah' =>$nik_ayah,
			'nama_ibu' =>$nama_ibu,  
			'umur_ibu' =>$umur_ibu,  
			'nik_ibu' =>$nik_ibu,  
			'yang_bertanda_tangan' =>$yang_bertanda_tangan,
			'alamat' =>$alamat

		);  


		$insert=$this->db->insert('tbl_kelahiran',$data_skl);  

		if ($insert) {

			$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Membuat Surat Kelahiran dengan Kode ".$kode_kelahiran,
				);

				$this->db->insert('tbl_history', $data_history);


			$msg="Data Berhasil Disimpan!";
		}else{
			$msg="Data Gagal Disimpan!";
		}
		echo  json_encode($msg);
	}

	// public function cetak($kode_kelahiran)
	// {
	// 	$this->load->library('dompdf_gen');
	// 	$data['cetak_skl']= $this->model_skl->cetak($kode_kelahiran);

	// 	$this->load->view('skl/surat_skl',$data);  

	// 	$paper_size = 'A4';
	// 	$orientation = 'portrait';
	// 	$html = $this->output->get_output();
	// 	$this->dompdf->set_paper($paper_size, $orientation);
	// 	$this->dompdf->load_html($html);
	// 	// $this->dompdf->render();
	// 	// $this->dompdf->stream("Surat.pdf", array('Attechement' =>true));

	// }

	public function cetak($id)
	{
		$this->load->library('dompdf_gen');
		$data['cetak_surat']= $this->model_skl->cetak($id);
			$this->load->view('skl/surat_kelahiran',$data); 

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html,'SURAT KETERANGAN KELAHIRAN - '.$id, TRUE, $paper_size, $orientation);


	} 
}
