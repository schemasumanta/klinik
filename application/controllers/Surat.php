<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
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
		$data['pasien'] = $this->model_pasien->list_all_pasien_sakit();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('surat/surat',$data);
		$this->load->view('template/footer');
	}

	public function pem_surat()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('surat/pem_surat');
		$this->load->view('template/footer');
	}

	public function tampil_surat()
	{
		$data = $this->model_surat->tampil_surat();
		echo json_encode($data); 
	}

	public function tampil_surat1()
	{
		$data = $this->model_surat->tampil_surat();
		echo json_encode($data); 
	}



	public function tabel_surat(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'id';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('surat',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi ='
			<div class="btn-group">

			<a href="javascript:;" class="btn btn-secondary btn-sm  btn-flat update_status "style="font-weight: bold;" data-status="'.$l->status.'"  data-id="'.$l->id.'" ><i class="fas fa-edit mr-1"></i> Update</a>
			<a  href="'.base_url().'surat/cetak/'.$l->id.'" class="btn btn-sm btn-success btn-flat item_edit_user"  target="_blank" data="'.$l->id.'"><i class="fa fa-print mr-1"></i>Cetak Surat</a>';

			if ($l->keterangan=="SURAT KETERANGAN SEHAT") {
				$opsi .='<a  href="'.base_url().'surat/cetak_pembayaran/'.$l->id.'" class="btn btn-sm btn-danger btn-flat item_edit_user" data="'.$l->id.'"><i class="fa fa-print mr-1"></i>  Cetak Struk</a>';

			}

        $opsi .='</div>';

        $l->opsi = $opsi;



        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('surat',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('surat',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	


	public function simpansurat()
	{

		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$keterangan = $this->input->post('keterangan'); 
		$kode_surat = $this->model_surat->buat_kode($keterangan);    
		$kode_pasien = $this->input->post('kode_pasien'); 



		$dari_tanggal = $this->input->post('dari_tanggal'); 
		$sampai_tanggal = $this->input->post('sampai_tanggal');  
		$tanggal_pembuatan_surat = date("Y-m-d"); 
		$hari = $this->input->post('hari'); 
		$pekerjaan = $this->input->post('pekerjaan');

		$keperluan = $this->input->post('keperluan'); 
		$tb = $this->input->post('tb'); 
		$bb = $this->input->post('bb'); 
		$terapi = $this->input->post('terapi'); 
		$diagnosa = $this->input->post('diagnosa'); 
		$yang_bertanda_tangan = $this->input->post('yang_bertanda_tangan'); 
		$tekanan_darah = $this->input->post('tekanan_darah'); 

		$total_akhir = $this->input->post('total_akhir'); 

		$data= array('kode_surat' =>$kode_surat,   
			'kode_pasien' =>$kode_pasien, 
			'keterangan' =>$keterangan, 
			'dari_tanggal' =>$dari_tanggal, 
			'sampai_tanggal' =>$sampai_tanggal,  
			'status' =>'Belum', 
			'tanggal_pembuatan_surat' =>$tanggal_pembuatan_surat,

			'hari' =>$hari,
			'pekerjaan' =>$pekerjaan,

			'keperluan' =>$keperluan,
			'tb' =>$tb,
			'bb' =>$bb,
			'diagnosa' =>$diagnosa,
			'yang_bertanda_tangan' =>$yang_bertanda_tangan,
			'terapi' =>$terapi,
			'tekanan_darah' =>$tekanan_darah,  
			// 'nama_dokter' => $this->session->nama_admin,
			'total_akhir' =>$total_akhir 

		);  

		// var_dump($data);
		// exit(); 

		$insert=$this->db->insert('tbl_surat',$data);  

		if ($insert) {

			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Membuat Surat dengan Kode ".$kode_surat,
			);

			$this->db->insert('tbl_history', $data_history);



			$msg="Data Berhasil Disimpan!";
		}else{
			$msg="Data Gagal Disimpan!";
		}
		echo  json_encode($msg);
		
	} 

	public function cetak($kode_surat)
	{
		$this->load->library('dompdf_gen');
		$data['cetak_surat']= $this->model_surat->cetak($kode_surat);
		$jenis_surat = '';
		foreach ($data['cetak_surat'] as $key) {
			$jenis_surat =$key->keterangan;
		}	 
		if ($jenis_surat=="SURAT KETERANGAN SAKIT") {
			$this->load->view('surat/surat_sakit_pdf',$data); 
		}else{
			$this->load->view('surat/surat_sehat_pdf',$data); 
		}

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html, strtoupper($jenis_surat." - ".$kode_surat), TRUE, $paper_size, $orientation);


	} 

	public function cetak_pembayaran($kode_surat)
	{
		$data['cetak_pembayaran']= $this->model_surat->cetak($kode_surat);	 
		$this->load->view('surat/cetak_pembayaran_surat',$data); 
	}


	

	public function update_status()
	{
		$data = array(
			'status' => $this->input->post('status')
		);
		$this->db->set($data);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_surat');

		$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Status Surat dengan Kode ".$this->input->post('id'),
			);

			$this->db->insert('tbl_history', $data_history);

		$msg ="Status Terupdate";
		echo json_encode($msg);
	}
}
