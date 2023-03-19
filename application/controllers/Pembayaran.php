<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');

			redirect('login','refresh');
		}elseif($this->session->level!='superadmin' && $this->session->level!='kasir' && $this->session->level!='farmasi' ) {
			echo "<script> alert('Tidak Ada Akses Untuk Menu ini');
			history.back();
			</script>";

		}
		date_default_timezone_set('Asia/Jakarta');	

	}

	public function tabel_pembayaran(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_pembayaran';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('pembayaran',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi='
			<div class="btn-group">';
			if ($l->status_pembayaran!='LUNAS') {
				if (strpos($l->kode_rekam,'RANAP')!==false || strpos($l->kode_rekam,'HCR')!==false) {
					$opsi.='<a href="'.base_url().'pembayaran/rincian_HR/'.$l->kode_pembayaran.'/'.$l->kode_rekam.'" class="btn btn-sm  btn-flat "style="font-weight: bold; background:#03b509;color:white;" data="'.$l->kode_pembayaran.'" > <i class="fas fa-file-signature mr-1"></i> Proses Pembayaran</a>';

				}else{

					$opsi.='<a href="'.base_url().'pembayaran/rincian/'.$l->kode_pembayaran.'/'.$l->kode_rekam.'" class="btn btn-sm  btn-flat "style="font-weight: bold; background:#03b509;color:white;" data="'.$l->kode_pembayaran.'" > <i class="fas fa-file-signature mr-1"></i> Proses Pembayaran</a>';
				}
			}else{
				if (strpos($l->kode_rekam,'RANAP')!==false || strpos($l->kode_rekam,'HCR')!==false) {
					$opsi.='<a href="'.base_url().'pembayaran/cetak_invoice_HR/'.$l->kode_pembayaran.'/'.$l->kode_rekam.'" target="_blank"class="btn  btn-sm btn-dark btn-flat item_cetak_invoice" data-kode_pembayaran="'.$l->kode_pembayaran.'" data-kode_rekam="'.$l->kode_rekam.'" > <i class="fas fa-print mr-1"></i>Invoice</a>';
				}else{
					$opsi.='<a href="'.base_url().'pembayaran/cetak_invoice/'.$l->kode_pembayaran.'/'.$l->kode_rekam.'" target="_blank"class="btn  btn-sm btn-dark btn-flat item_cetak_invoice" data-kode_pembayaran="'.$l->kode_pembayaran.'" data-kode_rekam="'.$l->kode_rekam.'" > <i class="fas fa-print mr-1"></i>Invoice</a>';
				}

				$opsi.='<a href="javascript:;" class="btn  btn-sm btn-flat item_cetak"style="font-weight: bold; background:#ff5722;color:white" data-kode_pembayaran="'.$l->kode_pembayaran.'" data-kode_rekam="'.$l->kode_rekam.'" > <i class="fas fa-print mr-1"></i>Struk</a>';
			} 
			$opsi.='
			<a href="'.base_url().'pembayaran/detail_pembayaran/'.$l->kode_pembayaran.'/'.$l->kode_rekam.'" class="btn btn-sm  btn-flat "style="font-weight: bold; background:#673ab7; color:white" data="'.$l->kode_pembayaran.'" ><i class="fas fa-eye mr-1"></i></a>
			</div>';

        $l->opsi = $opsi;


        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('pembayaran',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('pembayaran',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}



	public function cetak_label_obat()
	{
		$kode_rekam = $this->uri->slash_segment(3).$this->uri->segment(4);
		$data['detail_obat'] = $this->model_pembayaran->detail_obat($kode_rekam);
		$data['pasien'] = $this->model_pembayaran->detail_pasien($kode_rekam);

		$this->load->view('farmasi/cetak_label',$data); 
		$customPaper = array(0,0,193,140);
		// $dompdf->set_paper($customPaper);
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html, strtoupper('SURAT SWAB '.date('Y-md')), TRUE, $customPaper, $orientation);

	}

	public function cetak_invoice()
	{ 
		$kode_pembayaran = $this->uri->segment(3);
		$kode_rekam = $this->uri->slash_segment(4).$this->uri->segment(5);
		$this->db->select('total_akhir');
		$this->db->where('kode_rekam',$kode_rekam);
		$result = $this->db->get('tbl_pemeriksaan_lab');
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key) {
				$data['pemeriksaan_lab'] = $key->total_akhir;
			}
		}

		if (strpos($kode_rekam, 'LAB')!==false) {
			$kode_rekam=str_replace('/', '', $kode_rekam);
		}else{
			$data['detail_obat'] = $this->model_pembayaran->detail_obat($kode_rekam);  

		}
		$data ['invoice_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_struk($kode_pembayaran,$kode_rekam);
		$data['tambahan'] = $this->model_pembayaran->detail_tambahan($kode_pembayaran);  
		$data['perusahaan'] = $this->model_pembayaran->detail_perusahaan();  
		if (strpos($kode_rekam, 'LAB')!==false) {
			$this->load->view('pembayaran/invoice_lab',$data); 
		}else{
			$this->load->view('pembayaran/invoice',$data); 
		}
	}
	
	public function list_obat_terjual_by_kode()
	{
		$kode_obat = $this->input->post('kode_obat');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$data = $this->model_pembayaran->get_rekam_by_obat($kode_obat,$tanggal_awal,$tanggal_akhir);
		echo json_encode($data);
	}

	public function cetak_invoice_HR()
	{
		$kode_pembayaran = $this->uri->segment(3);
		$kode_rekam = $this->uri->slash_segment(4).$this->uri->segment(5);

		$this->db->select('SUM(total_akhir) as total_akhir,COUNT(total_akhir) as jumlah_lab');
		$this->db->where('kode_rekam',$kode_rekam);
		$result = $this->db->get('tbl_pemeriksaan_lab');
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key) {
				$data['pemeriksaan_lab'] = $key->total_akhir;
				$data['jumlah_lab'] = $key->jumlah_lab;

			}
		}
		$data['detail_obat'] = $this->model_pembayaran->detail_obat_hr($kode_rekam);  
		$data ['invoice_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam);
		$data['tambahan'] = $this->model_pembayaran->detail_tambahan($kode_pembayaran);  
		$data['perusahaan'] = $this->model_pembayaran->detail_perusahaan();  
		$this->load->view('pembayaran/invoice',$data); 
	}


	public function detail_keuangan()
	{
		$jenis = $this->input->get('jenis_kunjungan');
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');
		$data = $this->model_pembayaran->getjumlah($jenis,$tanggal_awal,$tanggal_akhir);
		echo json_encode($data);
	}
	
	public function index()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Pembayaran", 
		);

		$this->db->insert('tbl_history', $data_history); 


		$this->load->view('template/header');
		$this->load->view('template/sidebar'); 
		$this->load->view('pembayaran/tampilan_pembayaran');
		$this->load->view('template/footer');

	}
	public function transaksi_keluar()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Transaksi Keluar", 
		);

		$this->db->insert('tbl_history', $data_history); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar'); 
		$this->load->view('pembayaran/tampilan_kas_keluar');
		$this->load->view('template/footer');

	}

	public function tampilan_data_farmasi()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Obat", 
		);

		$this->db->insert('tbl_history', $data_history); 

		$this->load->view('template/header');
		$this->load->view('template/sidebar'); 
		$this->load->view('farmasi/tampilan_farmasi');
		$this->load->view('template/footer');
	}


public function tabel_farmasi(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_pembayaran';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('farmasi',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi='
			<div class="btn-group">'; 
			$opsi.='<a href="'.base_url().'pembayaran/detail_pembayaran_di_farmasi/'.$l->kode_pembayaran.'/'.$l->kode_rekam.'" class="btn btn-sm btn-success  btn-flat "style="font-weight: bold; data="'.$l->kode_pembayaran.'" ><i class="fas fa-eye mr-1"></i></a>';
			if ($l->status_pemberian_obat=="Belum Diberikan") {
				$opsi.='<a href="'.base_url().'pembayaran/status_pemberian_obat/'.$l->kode_pembayaran.'" class="btn btn-primary btn-sm  btn-flat">  <i class="fa fa-check mr-2"></i>Sudah Diberikan</a>';
			}
			$opsi.'</div>';

        $l->opsi = $opsi;


        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('farmasi',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('farmasi',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}





	public function tampilan_farmasi()
	{

		$data['jual'] = $this->model_pembayaran->tampil_pembayaran(); 
		$data['pembayaran'] = $this->model_pembayaran->tampil_all_pembayaran(); 
		$html='';
		$no=1;
		foreach ($data['pembayaran'] as $row) { 

			foreach ($data['jual'] as $jual) {
				if ($row->kode_pembayaran==$jual->kode_pembayaran) {
					$html .= '<tr>'.
					'<td style="text-align:left">'.$no++.'</td>'. 
					'<td style="text-align:left">'.$jual->kode_pembayaran.'</td>'. 
					'<td style="text-align:left">'.$jual->kode_rekam.'</td>'. 
					'<td style="text-align:left">'.$jual->nama_pasien.'</td>'. 
					'<td style="text-align:left">'.$jual->tanggal_pembayaran.'</td>'. 
					'<td style="text-align:left">'.$jual->status_pembayaran.'</td>'. 
					'<td style="text-align:center"><div class="btn-group">';

					$html.='<a href="pembayaran/detail_pembayaran/'.$jual->kode_pembayaran."/".$jual->kode_rekam.'" class="btn btn-sm  btn-flat "style="font-weight: bold; background:#673ab7; color:white" data="'.$jual->kode_pembayaran.'" ><i class="fas fa-eye mr-1"></i> </a>'.
					'</td>'. 
					'</div></tr>';
				}

			}


		}
		echo json_encode($html);
	}

	public function simpan_transaksi_keluar()
	{
		$kode_transaksi_keluar = $this->model_pembayaran->buat_kode_transaksi();

		$data = array(
			'kode_transaksi_keluar'  =>$kode_transaksi_keluar,
			'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
			'nominal_transaksi' => $this->input->post('nominal_transaksi'),
			'keterangan_transaksi' => $this->input->post('keterangan_transaksi'),
		);
		$result = $this->db->insert('tbl_transaksi_keluar',$data);
		if ($result) {
			$msg = "Transaksi Berhasil Disimpan!";


			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menambah data transaksi keluar dengan Kode : ".$kode_transaksi_keluar, 
			);

			$this->db->insert('tbl_history', $data_history); 

		}else
		{
			$msg = "Transaksi Gagal Disimpan!";
		}
		echo json_encode($msg);


	}
	public function tampil_kas_keluar()
	{

		$data = $this->model_pembayaran->tampil_kas_keluar(); 
		$html='';
		$no=1;
		foreach ($data as $row) { 
			$html .= '<tr>'.
			'<td style="text-align:center">'.$no++.'</td>'. 
			'<td style="text-align:center">'.$row->tanggal_transaksi.'</td>'. 
			'<td style="text-align:center">'.$row->nominal_transaksi.'</td>'. 
			'<td>'.$row->keterangan_transaksi.'</td>'. 
			'</tr>';
		}


		echo json_encode($html);  
	}

	public function rincian_HR()
	{
		$kode_pembayaran= $this->uri->segment(3); 
		$kode_rekam= $this->uri->slash_segment(4).$this->uri->segment(5);

		$data['detail_obat'] = $this->model_pembayaran->detail_obat_hr($kode_rekam);
		$data ['rincikan_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam);
		$data['kredit_pasien'] = $this->model_pembayaran->kredit_pasien($kode_pembayaran);
		$data['pemeriksaan_lab'] = $this->model_pembayaran->get_total_lab($kode_rekam);
		$data['kredit']=0;
		foreach ($data['kredit_pasien'] as $key) {
			$data['kredit']+=$key->kredit;
		} 

		$this->load->view('template/header');
		$this->load->view('template/sidebar');

		if (strpos($kode_rekam,'RANAP')!==false) {

			$this->load->view('pembayaran/rincian_pembayaran_ranap',$data);

		}

		else{

			$this->load->view('pembayaran/rincian_pembayaran_homecare',$data);

		}
		$this->load->view('template/footer');
	}

	public function rincian()
	{
		$kode_pembayaran= $this->uri->segment(3);
		$kode_rekam= $this->uri->slash_segment(4).$this->uri->segment(5);
		$this->db->select('total_akhir as total_lab');
		$this->db->where('kode_rekam',$kode_rekam);
		$result = $this->db->get('tbl_pemeriksaan_lab');
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key) {
				$data['pemeriksaan_lab'] = $key->total_lab;
			}
		}



		if (strpos($kode_rekam, 'LAB')!==false) {
			$kode_rekam= str_replace('/', '', $kode_rekam);

		}


		else{
			$data['detail_obat'] = $this->model_pembayaran->list_obat($kode_rekam);
		}

		
		$data ['rincikan_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam);

		$data['kredit_pasien'] = $this->model_pembayaran->kredit_pasien($kode_pembayaran,$kode_rekam);
		$data['kredit']=0;
		foreach ($data['kredit_pasien'] as $key) {
			$data['kredit']+=$key->kredit;
		} 
		$this->load->view('template/header');
		$this->load->view('template/sidebar'); 
		if (strpos($kode_rekam, 'LAB')!==false) {
			$this->load->view('pembayaran/rincian_pembayaran_lab',$data);
		}else{
			$this->load->view('pembayaran/rincian_pembayaran',$data);
		}
		$this->load->view('template/footer');
	}
	public function update_pembayaran(){
		$kode_rekam = $this->input->post('kode_rekam'); 
		$pemeriksaan_lab = floatval(str_replace('.', '',$this->input->post('pemeriksaan_lab'))) > 0 ? floatval(str_replace('.', '',$this->input->post('pemeriksaan_lab'))) : 0; 
		$kode_pembayaran = $this->input->post('kode_pembayaran'); 
		$status_pembayaran = $this->input->post('status_pembayaran');
		$dibayarkan = str_replace('.', '',$this->input->post('dibayarkan'));
		$tagihan_sebelumnya = str_replace('.', '',$this->input->post('tagihan_sebelumnya'));
		$kode_pasien = $this->input->post('kode_pasien');
		$discount = $this->input->post('discount');
		$biaya_admin = str_replace('.', '',$this->input->post('biaya_admin'));
		$total_pembayaran = str_replace('.', '',$this->input->post('total_pembayaran'));
		$kembalian = str_replace('.', '',$this->input->post('kembalian'));
		$tagihan_dibayarkan = str_replace('.', '',$this->input->post('tagihan_dibayarkan'));
		$penambahan_tagihan = str_replace('.', '',$this->input->post('penambahan_tagihan'));
		$sisa_tagihan = str_replace('.', '',$this->input->post('sisa_tagihan'));
		$tindakan = $this->input->post('tindakan');
		$pembayaran_tambahan = $this->input->post('pembayaran_tambahan');

		for ($i=0; $i < count($tindakan); $i++) {
			if ($tindakan[$i]!='') {
				$data_tindakan = array(
					'kode_pembayaran' => $kode_pembayaran,
					'tindakan_pemeriksaan' => $tindakan[$i],
					'biaya_pemeriksaan' => str_replace('.', '',$pembayaran_tambahan[$i]),
				);
				$this->db->insert('tbl_sub_pemeriksaan',$data_tindakan);
			}
		}
		if (floatval($tagihan_sebelumnya) != floatval($sisa_tagihan)) {
			$data_tagihan = array(
				'kredit' => $sisa_tagihan, 
			);
			$this->db->set($data_tagihan);
			$this->db->where('kode_pasien',$kode_pasien);
			$hasil = $this->db->update('tbl_pasien');
		}
		if ($penambahan_tagihan!='' && $penambahan_tagihan!=0 ) {
			$data_log_tagihan = array(
				'kode_pasien' 			=>$kode_pasien, 
				'tanggal_input' 		=> date('Y-m-d H:i:s'), 
				'kode_rekam_tagihan' 	=>$kode_rekam, 
				'tagihan_awal' 			=>$tagihan_sebelumnya,
				'penambahan_tagihan'	=>$penambahan_tagihan,
				'sisa_tagihan'			=>$sisa_tagihan,
				'keterangan'			=>"Tunggakan Pembayaran dengan kode ".$kode_pembayaran." dari Pemeriksaan dengan Kode Rekam ".$kode_rekam,
			);
			
		}
		if ($tagihan_dibayarkan!='' && $tagihan_dibayarkan!=0 ){
			$data_log_tagihan = array(
				'kode_pasien' 			=>$kode_pasien, 
				'tanggal_input' 		=> date('Y-m-d H:i:s'), 
				'kode_pembayaran_tagihan' =>$this->model_pasien->buat_kode_tagihan(),
				'kode_rekam_tagihan' 	=>$kode_rekam, 
				'tagihan_awal' 			=>$tagihan_sebelumnya,
				'tanggal_bayar_tagihan'	=>date('Y-m-d'),
				'tagihan_dibayarkan'	=>$tagihan_dibayarkan,
				'sisa_tagihan'			=>$sisa_tagihan,
				'dibayarkan_oleh'		=>$this->model_pasien->get_nama_pasien($kode_pasien),
				'keterangan'			=>"Pembayaran Tagihan Saat Checkout Pembayaran Pemeriksaan dengan Kode Rekam ".$kode_rekam,
			);

		}
		if (isset($data_log_tagihan)) {
			$this->db->insert('tbl_tagihan_pasien',$data_log_tagihan);
		}
		
		$data_update_total_akhir = array( 
			'total_akhir' => floatval($dibayarkan) - floatval($kembalian) - $pemeriksaan_lab, 
		); 

		$data = array(
			'kode_pembayaran' =>$kode_pembayaran,
			'status_pembayaran' =>'LUNAS',
			'status_pemberian_obat' =>'Belum Diberikan',
			'discount' =>$discount, 
			'biaya_admin' =>$biaya_admin,
			'total_pembayaran' =>$total_pembayaran,
			'tagihan_sebelumnya' =>$tagihan_sebelumnya,	
			'biaya_pemeriksaan_lab' =>$pemeriksaan_lab,			
			'dibayarkan' =>$dibayarkan,
			'kembalian' =>$kembalian,
			'tanggal_checkout' =>date('Y-m-d H:i:s'),
		);
		if (strpos($kode_rekam, 'UM')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_rekam',$kode_rekam);
			$this->db->update('tbl_rekam_medik');
		}
		else if(strpos($kode_rekam, 'KB')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_kb',$kode_rekam);
			$this->db->update('tbl_kb');
		}
		else if(strpos($kode_rekam, 'ANC')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_kehamilan',$kode_rekam);
			$this->db->update('tbl_kehamilan');
		}
		else if(strpos($kode_rekam, 'IMN')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_imunisasi',$kode_rekam);
			$this->db->update('tbl_imunisasi');
		}
		else if(strpos($kode_rekam, 'BBL')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_bbl',$kode_rekam);
			$this->db->update('tbl_bbl');
		}

		else if(strpos($kode_rekam, 'NFS')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_nifas',$kode_rekam);
			$this->db->update('tbl_nifas');
		}

		else if(strpos($kode_rekam, 'RPD')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_rapid',$kode_rekam);
			$this->db->update('tbl_rapid');
		}

		else if(strpos($kode_rekam, 'SWAB')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_swab',$kode_rekam);
			$this->db->update('tbl_swab');
		}

		else if(strpos($kode_rekam, 'RANAP')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_ranap',$kode_rekam);
			$this->db->update('tbl_ranap');
		}

		else if(strpos($kode_rekam, 'INC')!==false) {
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_inc',$kode_rekam);
			$this->db->update('tbl_inc');
		}

		else{
			$this->db->set($data_update_total_akhir);
			$this->db->where('kode_beli',$kode_rekam);
			$this->db->update('tbl_pembelian_obat');
		}

		$this->db->set($data);
		$this->db->where('kode_pembayaran',$kode_pembayaran);
		$hasil_update= $this->db->update('tbl_pembayaran'); 

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Data rincian pembayaran" .$kode_rekam." dengan Kode " .$kode_pembayaran, 
		);

		$this->db->insert('tbl_history', $data_history); 
		$data['title'] = 'Berhasil';
		$data['text'] = 'Pembayaran Berhasil Di Proses';
		$data['icon'] = 'success';
		$this->session->set_flashdata($data); 
		redirect('pembayaran','refresh');
	}

	public function update_pembayaran_lab(){
		$kode_rekam = $this->input->post('kode_rekam'); 
		$kode_pembayaran = $this->input->post('kode_pembayaran'); 
		$status_pembayaran = $this->input->post('status_pembayaran');
		$dibayarkan = str_replace('.', '',$this->input->post('dibayarkan'));
		$tagihan_sebelumnya = str_replace('.', '',$this->input->post('tagihan_sebelumnya'));
		$kode_pasien = $this->input->post('kode_pasien');
		$discount = $this->input->post('discount');
		$biaya_admin = str_replace('.', '',$this->input->post('biaya_admin'));
		$total_pembayaran = str_replace('.', '',$this->input->post('total_pembayaran'));
		$kembalian = str_replace('.', '',$this->input->post('kembalian'));
		$tagihan_dibayarkan = str_replace('.', '',$this->input->post('tagihan_dibayarkan'));
		$penambahan_tagihan = str_replace('.', '',$this->input->post('penambahan_tagihan'));
		$sisa_tagihan = str_replace('.', '',$this->input->post('sisa_tagihan'));
		$tindakan = $this->input->post('tindakan');
		$pembayaran_tambahan = $this->input->post('pembayaran_tambahan');
		for ($i=0; $i < count($tindakan); $i++) {
			if ($tindakan[$i]!='') {
				$data_tindakan = array(
					'kode_pembayaran' => $kode_pembayaran,
					'tindakan_pemeriksaan' => $tindakan[$i],
					'biaya_pemeriksaan' => str_replace('.', '',$pembayaran_tambahan[$i]),
				);
				$this->db->insert('tbl_sub_pemeriksaan',$data_tindakan);
			}
		}
		if (floatval($tagihan_sebelumnya) != floatval($sisa_tagihan)) {
			$data_tagihan = array(
				'kredit' => $sisa_tagihan, 
			);
			$this->db->set($data_tagihan);
			$this->db->where('kode_pasien',$kode_pasien);
			$hasil = $this->db->update('tbl_pasien');
		}
		if ($penambahan_tagihan!='' && $penambahan_tagihan!=0 ) {
			$data_log_tagihan = array(
				'kode_pasien' 			=>$kode_pasien, 
				'tanggal_input' 		=> date('Y-m-d H:i:s'), 
				'kode_rekam_tagihan' 	=>$kode_rekam, 
				'tagihan_awal' 			=>$tagihan_sebelumnya,
				'penambahan_tagihan'	=>$penambahan_tagihan,
				'sisa_tagihan'			=>$sisa_tagihan,
				'keterangan'			=>"Tunggakan Pembayaran dengan kode ".$kode_pembayaran." dari Pemeriksaan dengan Kode Rekam ".$kode_rekam,
			);
			
		}
		if ($tagihan_dibayarkan!='' && $tagihan_dibayarkan!=0 ) {
			$data_log_tagihan = array(
				'kode_pasien' 			=>$kode_pasien, 
				'tanggal_input' 		=> date('Y-m-d H:i:s'), 
				'kode_pembayaran_tagihan' =>$this->model_pasien->buat_kode_tagihan(),
				'kode_rekam_tagihan' 	=>$kode_rekam, 
				'tagihan_awal' 			=>$tagihan_sebelumnya,
				'tanggal_bayar_tagihan'	=>date('Y-m-d'),
				'tagihan_dibayarkan'	=>$tagihan_dibayarkan,
				'sisa_tagihan'			=>$sisa_tagihan,
				'dibayarkan_oleh'		=>$this->model_pasien->get_nama_pasien($kode_pasien),
				'keterangan'			=>"Pembayaran Tagihan Saat Checkout Pembayaran Pemeriksaan dengan Kode Rekam ".$kode_rekam,
			);
		}
		if (isset($data_log_tagihan)) {
			$this->db->insert('tbl_tagihan_pasien',$data_log_tagihan);
		}
		
		$data_update_total_akhir = array( 
			'total_akhir' => floatval($dibayarkan) - floatval($kembalian), 
		); 

		$data = array(
			'kode_pembayaran' =>$kode_pembayaran,
			'status_pembayaran' =>'LUNAS',
			'status_pemberian_obat' =>'Belum Diberikan',
			'discount' =>$discount, 
			'biaya_admin' =>$biaya_admin,
			'total_pembayaran' =>$total_pembayaran,
			'tagihan_sebelumnya' =>$tagihan_sebelumnya,			
			'dibayarkan' =>$dibayarkan,
			'kembalian' =>$kembalian,
			'tanggal_checkout' =>date('Y-m-d H:i:s'),
		);
		$this->db->set($data);
		$this->db->where('kode_pembayaran',$kode_pembayaran);
		$hasil_update= $this->db->update('tbl_pembayaran'); 

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Data rincian pembayaran" .$kode_rekam." dengan Kode " .$kode_pembayaran, 
		);

		$this->db->insert('tbl_history', $data_history); 
		
		echo "<script type='text/javascript'>alert('Pembayaran Berhasil Di Proses');</script>";
		redirect('pembayaran','refresh');
	}

	public function detail_umum()
	{
		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_umum= $this->uri->segment(3);
		$tanggal_akhir_umum= $this->uri->segment(4);


		$data['tanggal_awal_umum']=$tanggal_awal_umum;
		$data['tanggal_akhir_umum']=$tanggal_akhir_umum;

		$data['detail_umum'] = $this->model_pembayaran->detail_umum($tanggal_awal_umum,$tanggal_akhir_umum);
		// var_dump($data['detail_umum']);
		// exit();
		$this->load->view('pembayaran/detail_umum',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}

	public function detail_kb()
	{
		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_kb= $this->uri->segment(3);
		$tanggal_akhir_kb= $this->uri->segment(4);


		$data['tanggal_awal_kb']=$tanggal_awal_kb;
		$data['tanggal_akhir_kb']=$tanggal_akhir_kb;

		$data['detail_kb'] = $this->model_pembayaran->detail_kb($tanggal_awal_kb,$tanggal_akhir_kb);
		// var_dump($data['detail_kb']);
		// exit();
		$this->load->view('pembayaran/detail_kb',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}


	public function detail_data_anc()
	{
		$this->load->library('dompdf_gen');
		$this->load->helper('url');
		$tanggal_awal_anc= $this->uri->segment(3);
		$tanggal_akhir_anc= $this->uri->segment(4);


		$data['tanggal_awal_anc']=$tanggal_awal_anc;
		$data['tanggal_akhir_anc']=$tanggal_akhir_anc;

		$data['detail_anc'] = $this->model_pembayaran->detail_data_anc($tanggal_awal_anc,$tanggal_akhir_anc);
		// var_dump($data['detail_anc']);
		// exit();
		$this->load->view('pembayaran/detail_anc',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
	}

	public function cetak_pembayaran()
	{
		$kode_pembayaran= $this->uri->segment(3);
		$kode_rekam = $this->uri->slash_segment(4).$this->uri->segment(5);
		if (strpos($kode_rekam, 'LAB')!==false) {
			$kode_rekam=str_replace('/', '', $kode_rekam);
		}else{
			$data['detail_obat'] = $this->model_pembayaran->detail_obat($kode_rekam);  
		}
		$this->db->select('SUM(total_akhir) as total_lab,COUNT(total_akhir) as jumlah_lab');
		$this->db->where('kode_rekam',$kode_rekam);
		$result = $this->db->get('tbl_pemeriksaan_lab');
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key) {
				$data['pemeriksaan_lab'] = $key->total_lab;
				$data['jumlah_lab'] = $key->jumlah_lab;

			}
		}
		$data ['struk_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam);
		$data['tambahan'] = $this->model_pembayaran->detail_tambahan($kode_pembayaran);  
		if (strpos($kode_rekam, 'LAB')!==false) {
			$this->load->view('pembayaran/struk_pembayaran_lab',$data); 
		}else{
			$this->load->view('pembayaran/struk_pembayaran',$data); 
		}
	}

	public function laporan_keuangan()
	{
		$this->load->library('dompdf_gen');
		$tanggal_awal= $this->uri->segment(3);
		$tanggal_akhir = $this->uri->segment(4);
		$data['tanggal_awal'] =$tanggal_awal;
		$data['tanggal_akhir'] =$tanggal_akhir;

		$data ['umum']= $this->model_pembayaran->getjumlah("UMUM",$tanggal_awal,$tanggal_akhir);
		$data ['kb']= $this->model_pembayaran->getjumlah("KB",$tanggal_awal,$tanggal_akhir);
		$data ['anc']= $this->model_pembayaran->getjumlah("ANC",$tanggal_awal,$tanggal_akhir);
		$data ['imunisasi']= $this->model_pembayaran->getjumlah("IMUNISASI",$tanggal_awal,$tanggal_akhir);
		$data ['bbl']= $this->model_pembayaran->getjumlah("BBL",$tanggal_awal,$tanggal_akhir);
		$data ['inc']= $this->model_pembayaran->getjumlah("INC",$tanggal_awal,$tanggal_akhir);
		$data ['nifas']= $this->model_pembayaran->getjumlah("NIFAS",$tanggal_awal,$tanggal_akhir);
		$data ['rapid']= $this->model_pembayaran->getjumlah("RAPID",$tanggal_awal,$tanggal_akhir);
		$data ['swab']= $this->model_pembayaran->getjumlah("SWAB",$tanggal_awal,$tanggal_akhir);

		$data ['beliobat']= $this->model_pembayaran->getjumlah("OBAT",$tanggal_awal,$tanggal_akhir);
		$data ['surat']= $this->model_pembayaran->getjumlah("SURAT",$tanggal_awal,$tanggal_akhir);
		$data ['kas_keluar']= $this->model_pembayaran->getjumlah("KELUAR",$tanggal_awal,$tanggal_akhir);
		$data ['tunggakan']= $this->model_pembayaran->getjumlah("TUNGGAKAN",$tanggal_awal,$tanggal_akhir);
		$data ['bayar_tagihan']= $this->model_pembayaran->getjumlah("TAGIHAN",$tanggal_awal,$tanggal_akhir);
		$data ['lab']= $this->model_pembayaran->getjumlah("LAB",$tanggal_awal,$tanggal_akhir);
		$data ['ranap']= $this->model_pembayaran->getjumlah("RANAP",$tanggal_awal,$tanggal_akhir);

		$this->load->view('pembayaran/laporan_keuangan',$data); 
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);

	}

	public function laporan_obat()
	{
		$this->load->library('dompdf_gen');
		$tanggal_awal= $this->uri->segment(3);
		$tanggal_akhir = $this->uri->segment(4);
		$data['tanggal_awal'] =$tanggal_awal;
		$data['tanggal_akhir'] =$tanggal_akhir;
		$data ['stok_obat']= $this->model_pembayaran->list_obat_terjual($tanggal_awal,$tanggal_akhir);
		$this->load->view('pembayaran/laporan_obat',$data); 
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
	}

	public function list_pemeriksaan_per_dokter()
	{
		$dokter = $this->input->get('dokter');
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');
		$data = $this->model_pembayaran->get_list_pemeriksaan_per_dokter($tanggal_awal,$tanggal_akhir,$dokter);
		echo json_encode($data);
	}

	public function laporan_dokter()
	{
		$this->load->library('dompdf_gen');
		$data['list_dokter'] = $this->model_user->get_list_dokter();
		$tanggal_awal= $this->uri->segment(3);
		$tanggal_akhir = $this->uri->segment(4);
		$data['pemeriksaan'] = $this->model_pembayaran->get_list_pemeriksaan($tanggal_awal,$tanggal_akhir);
		$data['tanggal_awal'] =$tanggal_awal;
		$data['tanggal_akhir'] =$tanggal_akhir;
		$this->load->view('pembayaran/laporan_dokter',$data); 
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);

	}


	public function detail_pembayaran_di_farmasi()
	{
		$kode_pembayaran= $this->uri->segment(3); 
		$kode_rekam= $this->uri->slash_segment(4).$this->uri->segment(5);
		$data['list_obat'] = $this->model_pembayaran->list_obat($kode_rekam);
		$data['detail_obat'] = $this->model_pembayaran->detail_obat($kode_rekam);
		$data ['rincikan_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam);
		$this->load->view('template/header');
		$this->load->view('template/sidebar'); 
		$this->load->view('farmasi/detail_pembayaran',$data); 
		$this->load->view('template/footer');
	} 

	public function detail_pembayaran()
	{
		$kode_pembayaran= $this->uri->segment(3); 
		$kode_rekam= $this->uri->slash_segment(4).$this->uri->segment(5);
		$this->db->select('total_akhir as total_lab');
		$this->db->where('kode_rekam',$kode_rekam);
		$result = $this->db->get('tbl_pemeriksaan_lab');
		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key) {
				$data['pemeriksaan_lab'] = $key->total_lab;

			}
		}
		if (strpos($kode_rekam, 'LAB')!==false) {
			$kode_rekam=str_replace('/', '', $kode_rekam);
		}elseif (strpos($kode_rekam, 'RANAP')!==false || strpos($kode_rekam, 'HCR')!==false) {

			$data['detail_obat'] = $this->model_pembayaran->detail_obat_hr($kode_rekam); 
		}
		



		else{

			$data['detail_obat'] = $this->model_pembayaran->detail_obat($kode_rekam);  
		}

		$data ['rincikan_pembayaran']= $this->model_pembayaran->rincikan_pembayaran_bykode($kode_pembayaran,$kode_rekam);
		$data['tambahan'] = $this->model_pembayaran->detail_tambahan($kode_pembayaran);
		$this->load->view('template/header');
		$this->load->view('template/sidebar'); 
		if (strpos($kode_rekam, 'LAB')!==false) {
			$this->load->view('pembayaran/detail_pembayaran_lab',$data);
		}else{
			$this->load->view('pembayaran/detail_pembayaran',$data);
		}
		$this->load->view('template/footer');
	}



	public function get_status_pembayaran()
	{
		$kode_pembayaran= $this->input->post('kode_pembayaran');
		$data =$this->model_pembayaran->get_status($kode_pembayaran);
		foreach ($data as $row) {
			$data = array(
				'status_pembayaran' 			=> $row->status_pembayaran, 
			);
		}
		echo json_encode($data);
	}

	public function update_status()
	{
		$data = array(
			'status_pembayaran' => $this->input->post('status_pembayaran')
		);
	// var_dump($data);
	// exit();

		$this->db->set($data);
		$this->db->where('kode_pembayaran', $this->input->post('kode_pembayaran'));
		$this->db->update('tbl_pembayaran');

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Status Pembayaran dengan kode ".$this->input->post('kode_pembayaran')."(".$this->input->post('status_pembayaran').")", 
		);

		$this->db->insert('tbl_history', $data_history); 


		$msg ="Update Status Berhasil";
		echo json_encode($msg);
	}

	public function status_pemberian_obat()
	{
		$kode_pembayaran = $this->uri->segment(3);

		$data_status = array(
			'status_pemberian_obat' => "Sudah Diberikan"
		);

		$this->db->set($data_status);
		$this->db->where('kode_pembayaran', $kode_pembayaran);
		$result = $this->db->update('tbl_pembayaran');
		if ($result) {
			
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Status Pemberian Obat dengan kode ".$this->input->post('kode_pembayaran')."(".$this->input->post('status_pemberian_obat').")", 
			);
			$this->db->insert('tbl_history', $data_history); 

			$data['title'] = 'Berhasil';
			$data['text'] = 'Status Berhasil di Ubah';
			$data['icon'] = 'success';

		}else{

			$data['title'] = 'Berhasil';
			$data['text'] = 'Status Gagal di Ubah';
			$data['icon'] = 'error';

		}

		$this->session->set_flashdata($data); 
		redirect('pembayaran/tampilan_data_farmasi','refresh');
	}






}
