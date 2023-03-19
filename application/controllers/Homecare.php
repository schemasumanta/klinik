<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homecare extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');	
		
	}
	public function obat_observasi()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data Pemberian Obat Observasi Rawat Jalan",
		);

		$this->db->insert('tbl_history', $data_history);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('homecare/tampilan_pemberian_obat_homecare');
		$this->load->view('template/footer');

	}

public function tolak()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengakses Data Home Care Yang Ditolak",
		);

		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('homecare/tampilan_tolak_homecare');
		$this->load->view('template/footer');
	}

		public function tabel_tolak_homecare(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_homecare';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('tolak_homecare',$sort,$order,$search);

		foreach ($list as $l) {

			$no++;
			$l->no = $no;
			

			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'homecare/consent/'.$l->kode_homecare.'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$l->kode_homecare.'" > Informed Consent</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_homecare.'"><i class="fa fa-trash"></i></a>';
			}
			$opsi.='</div>';


			$l->opsi = $opsi;

			$data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('tolak_homecare',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('tolak_homecare',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function index()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengakses Data Rawat Jalan",
		);

		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('homecare/tampilan_homecare');
		$this->load->view('template/footer');
	}
	public function hapus_homecare()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Rawat Jalan dengan Kode ".$this->input->post('kode_homecare'),
		);

		$this->db->insert('tbl_history', $data_history);

		$this->db->where('kode_homecare',$this->input->post('kode_homecare'));
		$this->db->delete('tbl_homecare');

		$this->db->where('kode_homecare',$this->input->post('kode_homecare'));
		$data_observasi = $this->db->get('tbl_observasi_homecare');
		if ($data_observasi->num_rows() > 0) {
			foreach ($data_observasi->result() as $key) {
				$this->db->where('kode_rekam','OBS-HCR-'.$key->kode_observasi);
				$this->db->delete('tbl_sub_obat');
				$this->db->where('kode_observasi',$key->kode_observasi);
				$this->db->delete('tbl_observasi_homecare');
			}	
		}

		$this->db->where('kode_rekam',$this->input->post('kode_homecare'));
		$data_pembayaran = $this->db->get('tbl_pembayaran');
		if ($data_pembayaran->num_rows() > 0) {
			$this->db->where('kode_rekam',$this->input->post('kode_homecare'));
			$this->db->delete('tbl_pembayaran');
		}

		echo json_encode(1);
	}

	public function hapus_observasi()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Observasi Rawat Jalan dengan Kode ".$this->input->post('kode_observasi'),
		);

		$this->db->insert('tbl_history', $data_history);

		$this->db->where('kode_homecare',$this->input->post('kode_homecare'));
		$jumlah = $this->db->get('tbl_observasi_homecare')->num_rows();
		if ($jumlah == 1) {
			$data_update  = array(
				'status_pasien' 	=> 'Belum Diperiksa',
				'tanggal_periksa' 	=> '0000-00-00',

			);
			$this->db->where('kode_homecare',$this->input->post('kode_homecare'));
			$this->db->set($data_update);
			$this->db->update('tbl_homecare');
		}

		$this->db->where('kode_rekam',$this->input->post('kode_homecare'));
		$this->db->where('sub_homecare',$this->input->post('kode_observasi'));
		$data_obat = $this->db->get('tbl_sub_obat')->result();
		foreach ($data_obat as $obt) {
			$this->db->select('total_stok');
			$this->db->where('kode_obat',$obt->kode_obat);
			$stok_obat = $this->db->get('tbl_satuan_obat')->result();

			foreach ($stok_obat as $stk) {
				$data_balik_stok = array('total_stok' =>floatval($stk->total_stok)+ floatval($obt->qty), );
				$this->db->set($data_balik_stok);
				$this->db->where('kode_obat',$obt->kode_obat);
				$result = $this->db->update('tbl_satuan_obat');
				if ($result) {

					$data_log_stok = array(
						'tanggal' => date('Y-m-d'),
						'kode_obat' => $obt->kode_obat,
						'stok_awal' => $stk->total_stok,
						'stok_masuk'=> $obt->qty, 
						'stok_akhir' => floatval($stk->total_stok)+ floatval($obt->qty), 
						'keterangan'=>'Pengembalian Obat Dengan Kode homecare : '.$this->input->post('kode_homecare').' dan kode observasi '.$this->input->post('kode_observasi').' yang dihapus',
					);
					$this->db->insert('tbl_log_stok_obat',$data_log_stok);
					$this->db->where('kode_obat',$obt->kode_obat);
					$this->db->where('tanggal_expired',$obt->tanggal_expired);
					$data_update_expired = $this->db->get('tbl_expired_obat')->result();
					foreach ($data_update_expired as $exp) {
						$data_update_stok_exp  = array('qty' => floatval($exp->qty) + floatval($obt->qty), );
						$this->db->set($data_update_stok_exp);
						$this->db->where('kode_obat',$obt->kode_obat);
						$this->db->where('tanggal_expired',$obt->tanggal_expired);
						$this->db->update('tbl_expired_obat');
					}
				}
			}

			$this->db->where('kode_sub',$obt->kode_sub);
			$this->db->delete('tbl_sub_obat');
		}

		$this->db->where('kode_observasi',$this->input->post('kode_observasi'));
		$this->db->delete('tbl_observasi_homecare');
		echo json_encode(1);
	}

	public function edit_observasi()
	{
		if ($this->session->ttd == null || $this->session->ttd == "" ) {
			$data['title'] = 'Error';
			$data['text'] = 'Anda Belum Mempunyai TTD Digital';
			$data['icon'] = 'error';
			$this->session->set_flashdata($data); 
			redirect('homecare','refresh');
		}else{

			$kode_observasi = $this->uri->segment(3);
			$kode_homecare =$this->uri->slash_segment(4).$this->uri->segment(5);
			$data['observasi'] = $this->model_homecare->get_detail_observasi($kode_observasi);
			$data['list_obat'] = $this->model_homecare->get_obat_observasi($kode_observasi,$kode_homecare);
			$data['laboratorium'] = $this->model_homecare->get_data_laboratorium($kode_observasi,$kode_homecare);

			$data['obat'] = $this->model_homecare->getnamaobat();
			$data['periksa_homecare'] =$this->model_homecare->observasi_homecare($kode_homecare); 
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('homecare/edit_observasi_pasien_homecare',$data);
			$this->load->view('template/footer');
		}

	}

	public function update_status_pasien()
	{
		$kode_homecare = $this->uri->slash_segment(3).$this->uri->segment(4);
		$kode_pasien = $this->uri->segment(5);
		
		$data_status = array('status_pasien' => "Selesai", );
		$this->db->set($data_status);
		$this->db->where('kode_homecare',$kode_homecare);
		$this->db->update('tbl_homecare');
		$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
		$tanggal_periksa =    date("Y-m-d H:i:s");
		$data_pembayaran = array(
			'kode_pembayaran' => $kode_pembayaran, 
			'kode_pasien' => $kode_pasien, 
			'kode_rekam' => $kode_homecare, 
			'tanggal_pembayaran' => $tanggal_periksa,
			'dokter_pemeriksa' => $this->session->nama_admin, 
			'status_pembayaran' => 'Menunggu Pembayaran');

		$result = $this->db->insert('tbl_pembayaran',$data_pembayaran);
		if ($result) {
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Status Pasien homecare Dengan Kode ".$kode_homecare." (Selesai)",
			);
			
			$this->db->insert('tbl_history', $data_history);
			$data['title'] = 'Berhasil';
			$data['text'] = 'Status Pasien Berhasil Diubah';
			$data['icon'] = 'success';
		}else{

			$data['title'] = 'Gagal';
			$data['text'] = 'Status Gagal Berhasil Diubah';
			$data['icon'] = 'error';
		}
		$this->session->set_flashdata($data); 
		redirect('homecare','refresh');
	}
	public function simpan_observasi()
	{
		$jenis = $this->input->post('jenis_simpan');
		$stok =	$this->input->post('total_stok'); 
		$nama_obat= $this->input->post('nama_obat');  
		$harga_jual= $this->input->post('harga_jual'); 
		$qty= $this->input->post('qty');
		$subtotal= $this->input->post('subtotal');
		$takaran= $this->input->post('takaran');
		$hari= $this->input->post('hari');
		$aturan_pakai= $this->input->post('aturan_pakai'); 
		$kode_homecare = $this->input->post('kode_rekam');
		$status_pasien = 'Sedang Rawat Jalan';
		$kode_pasien= $this->input->post('kode_pasien');
		$waktu = strval('assets\img\ttd_app\gambar_observasi'.time().'.png');
		file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd_pasien') ) ) );
		$data_observasi = array(
			'kode_homecare' 			=> $kode_homecare,
			'tanggal_pemeriksaan' 	=> $this->input->post('tanggal_periksa'), 
			'jam_pemeriksaan' 		=> $this->input->post('jam_pemeriksaan'), 
			'hasil_pemeriksaan' 	=> $this->input->post('hasil_pemeriksaan'),
			'terapi_anjuran' 		=> $this->input->post('terapi_anjuran'), 
			'tensi_darah' 			=> $this->input->post('tensi_darah'), 
			'frequensi_nadi' 		=> $this->input->post('nadi'), 
			'respirasi' 			=> $this->input->post('pernapasan'), 
			'suhu' 					=> $this->input->post('suhu'), 
			'spo2' 					=> $this->input->post('saturasi'), 
			'volume_air_kemih' 		=> $this->input->post('volume_air_kemih'), 
			'pemeriksa' 			=> $this->session->nama_admin, 
			'ttd_pemeriksa' 		=> $this->session->ttd!=''?$this->session->ttd:'', 
			'ttd_pasien'	 		=> strval($waktu),
			'jasa_dokter'	 		=> $this->input->post('tarif_dokter') > 0 ? $this->input->post('tarif_dokter'):0
		);

		$result = $this->db->insert('tbl_observasi_homecare',$data_observasi);
		if ($result) {

			$this->db->select('*');
			$this->db->where('kode_homecare',$kode_homecare);
			$this->db->limit(1);
			$this->db->order_by('kode_observasi','DESC');
			$observasi = $this->db->get('tbl_observasi_homecare')->result();
			$kode_observasi ='';
			foreach ($observasi as $obs) {
				$kode_observasi = $obs->kode_observasi;
			}

			$data_update  = array(
				'status_pasien' 	=> $status_pasien,
				'tanggal_periksa' 	=> $this->input->post('tanggal_periksa'),
			);
			$this->db->where('kode_homecare',$kode_homecare);
			$this->db->set($data_update);
			$this->db->update('tbl_homecare');
			
		}

		if ($jenis=="lab") {
			$kode_lab =$this->model_laboratorium->buat_kode();
			$data_lab  = array(
				'kode_lab'	=>$kode_lab,
				'kode_pasien' => $kode_pasien,
				'status_pasien' => 'Belum Diperiksa',
				'tanggal_berobat' => date('Y-m-d'),
				'pengirim' 		=> $this->session->nama_admin,
				'keterangan_pemeriksaan_lab' => $this->input->post('keterangan_pemeriksaan_lab'),
				'sub_homecare' => $kode_observasi,
				'kode_rekam' => $kode_homecare,
			);
			$simpan = $this->db->insert('tbl_pemeriksaan_lab',$data_lab);
			if ($simpan) {

				$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Mengajukan Lab Lewat homecare Dengan Kode ".$kode_lab,
				);

				$this->db->insert('tbl_history', $data_history);

				$data['title'] = 'Berhasil';
				$data['text'] = 'Pengajuan Lab homecare Berhasil di Simpan';
				$data['icon'] = 'success';
				$this->session->set_flashdata($data); 
				redirect('homecare','refresh');
			}

		}else{

			for ($i=0; $i < count($nama_obat) ; $i++) { 
				if ($qty[$i]!=0) {
					$kode_obat = $nama_obat[$i];
					$stok_obat = $stok[$i];
					$kuantiti = str_replace('.', '', $qty[$i]);
					$stok_baru = floatval($stok_obat)-floatval($kuantiti);
					$aturan = $aturan_pakai[$i];
					$takar = $takaran[$i];
					$pemakaian = $hari[$i];
					$data_stok = array(
						'total_stok' => $stok_baru, 
					);
					$this->db->set($data_stok);
					$this->db->where('kode_obat',$kode_obat);
					$this->db->update('tbl_satuan_obat');
					$data_log_stok = array(
						'tanggal' => date('Y-m-d'),
						'kode_obat' => $kode_obat,
						'stok_awal' => $stok_obat,
						'stok_keluar'=> $kuantiti, 
						'stok_akhir' => $stok_baru, 
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_homecare." dan kode observasi ".$kode_observasi,
					);
					$this->db->insert('tbl_log_stok_obat',$data_log_stok);

					$jual = str_replace('.', '', $harga_jual[$i]);

					$this->db->where('kode_obat',$kode_obat);
					$this->db->where('qty!=',0);
					$this->db->order_by('date(tanggal_expired)','ASC');
					$data_expired_date = $this->db->get('tbl_expired_obat')->result();
					$sisa = $kuantiti;
					foreach ($data_expired_date as $exp) {
						// cek sisa dulu
						if ($sisa > 0 ) {
						// cek kapasitas obat
							if ($exp->qty >= $sisa) {
								// simpan sub obat
								$data = array(
									'kode_rekam' => $kode_homecare,
									'sub_homecare' => $kode_observasi,
									'kode_obat' => $kode_obat,  				
									'qty' => $sisa,
									'harga_obat' => $jual,
									'subtotal' => floatval($sisa)*floatval($jual),
									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
									'tanggal_expired'=>$exp->tanggal_expired,
								); 

								$this->db->insert('tbl_sub_obat', $data);
								// var_dump($data);
								// exit();
								// update expired qty
								$data_update_expired = array('qty' => floatval($exp->qty)-floatval($sisa),);

								$this->db->set($data_update_expired);
								$this->db->where('kode_exp',$exp->kode_exp);
								$this->db->update('tbl_expired_obat');
								$sisa = 0;

							}else{

							// kalau stok di expired lebih kecil
								// simpan sub obat

								$data = array(
									'kode_rekam' => $kode_homecare,
									'kode_obat' => $kode_obat,  				
									'qty' => $exp->qty,									
									'harga_obat' => $jual,
									'sub_homecare' => $kode_observasi,
									'subtotal' => floatval($exp->qty)*floatval($jual),
									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
									'tanggal_expired'=>$exp->tanggal_expired,
								); 

								$this->db->insert('tbl_sub_obat', $data);
								// var_dump($data);
								// exit();
								// update expired qty
								$data_update_expired = array('qty' => 0,);
								$this->db->set($data_update_expired);
								$this->db->where('kode_exp',$exp->kode_exp);
								$this->db->update('tbl_expired_obat');
								$sisa -= $exp->qty;
							}
						}
						
					}

					

				} 


			} 

			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menambah Observasi homecare Dengan Kode OBS-HCR-".$kode_observasi,
			);

			$result = $this->db->insert('tbl_history', $data_history);
			if ($result) {
				

				$data['title'] = 'Berhasil';
				$data['text'] = 'Data Berhasil di Simpan';
				$data['icon'] = 'success';

			}else{
				$data['title'] = 'Gagal';
				$data['text'] = 'Data Gagal di Simpan';
				$data['icon'] = 'error';
			}
		}
		$this->session->set_flashdata($data); 
		redirect('homecare','refresh');
	}

	public function update_observasi()
	{
		$kode_observasi = $this->input->post('kode_observasi_edit');
		$kode_homecare = $this->input->post('kode_homecare');
		$ttd_pasien = $this->input->post('isi_ttd_pasien');
		$stok =	$this->input->post('total_stok'); 
		$nama_obat= $this->input->post('nama_obat');  
		$harga_jual= $this->input->post('harga_jual'); 
		$qty= $this->input->post('qty');
		$subtotal= $this->input->post('subtotal');
		$takaran= $this->input->post('takaran');
		$hari= $this->input->post('hari');
		$aturan_pakai= $this->input->post('aturan_pakai'); 
		$status_pasien = 'Sedang Rawat Jalan';

		if (strpos($ttd_pasien,'data:image')!==false) {
			$waktu = strval('assets\img\ttd_app\gambar_observasi'.time().'.png');
			file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$ttd_pasien) ) );

		}else{

			$waktu = $ttd_pasien;
		}

		$data_observasi = array(
			'tanggal_pemeriksaan' 	=> $this->input->post('tanggal_periksa'), 
			'jam_pemeriksaan' 		=> $this->input->post('jam_pemeriksaan'), 
			'hasil_pemeriksaan' 	=> $this->input->post('hasil_pemeriksaan'),
			'terapi_anjuran' 		=> $this->input->post('terapi_anjuran'), 
			'tensi_darah' 			=> $this->input->post('tensi_darah'), 
			'frequensi_nadi' 		=> $this->input->post('nadi'), 
			'respirasi' 			=> $this->input->post('pernapasan'), 
			'suhu' 					=> $this->input->post('suhu'), 
			'spo2' 					=> $this->input->post('saturasi'), 
			'volume_air_kemih' 		=> $this->input->post('volume_air_kemih'), 
			'pemeriksa' 			=> $this->session->nama_admin, 
			'ttd_pemeriksa' 		=> $this->session->ttd, 
			'ttd_pasien'	 		=> strval($waktu),  
			'jasa_dokter'	 		=> $this->input->post('tarif_dokter') > 0 ? $this->input->post('tarif_dokter'):0
		);
		$this->db->where('kode_observasi',$kode_observasi);
		$this->db->set($data_observasi);
		$result = $this->db->update('tbl_observasi_homecare');

		if ($result) {

			$data_update  = array(
				'tanggal_periksa' => $this->input->post('tanggal_periksa'),
			);
			$this->db->where('kode_homecare',$kode_homecare);
			$this->db->set($data_update);

			$this->db->update('tbl_homecare');

			if ($qty[0]!=0) {

			// get sub obat sebelumnya
				$this->db->where('kode_rekam', $kode_homecare);
				$this->db->where('sub_homecare',$kode_observasi);
				$data_obat_lama = $this->db->get('tbl_sub_obat')->result();
				foreach ($data_obat_lama as $obt) {

				// get stok obat lama
					$this->db->select('total_stok');
					$this->db->where('kode_obat',$obt->kode_obat);
					$data_stok_lama =$this->db->get('tbl_satuan_obat')->result();

					foreach ($data_stok_lama as $stk) {

					// balikkan stok obat
						$data_update_stok_obat = array('total_stok' => floatval($stk->total_stok) + floatval($obt->qty),);
						$this->db->set($data_update_stok_obat);
						$this->db->where('kode_obat',$obt->kode_obat);
						$update = $this->db->update('tbl_satuan_obat');

						if ($update) {
							$data_log_stok = array(
								'tanggal' => date('Y-m-d'),
								'kode_obat' => $obt->kode_obat,
								'stok_awal' => $stk->total_stok,
								'stok_masuk'=> floatval($obt->qty), 
								'stok_akhir' => floatval($stk->total_stok) + floatval($obt->qty), 
								'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_homecare." dan kode observasi ".$kode_observasi,
							);
							$this->db->insert('tbl_log_stok_obat',$data_log_stok);
						}
					}
				// get stok obat di expired
					$this->db->select('qty');
					$this->db->where('kode_obat',$obt->kode_obat);
					$this->db->where('tanggal_expired',$obt->tanggal_expired);
					$data_expired_lama =$this->db->get('tbl_expired_obat')->result();

					foreach ($data_expired_lama as $exp) {
					// balikkan stok expired obat
						$data_update_stok_exp = array('qty' => floatval($exp->qty) + floatval($obt->qty),);
						$this->db->set($data_update_stok_exp);
						$this->db->where('kode_obat',$obt->kode_obat);
						$this->db->where('tanggal_expired',$obt->tanggal_expired);
						$update = $this->db->update('tbl_expired_obat');
						
					}

				// hapus sub obat sebelumnya
					$this->db->where('kode_sub',$obt->kode_sub);
					$this->db->delete('tbl_sub_obat');
				}

				for ($i=0; $i <count($nama_obat) ; $i++) { 
					$kode_obat = $nama_obat[$i];
					$kuantiti = str_replace('.', '', $qty[$i]);
					$aturan = $aturan_pakai[$i];
					$takar = $takaran[$i];
					$pemakaian = $hari[$i];
					$jual = str_replace('.', '', $harga_jual[$i]);

				// get stok obat lama
					$this->db->select('total_stok');
					$this->db->where('kode_obat', $kode_obat);
					$data_stok_obat =$this->db->get('tbl_satuan_obat')->result();

					foreach ($data_stok_obat as $val) {

						$stok_baru = floatval($val->total_stok) - floatval($kuantiti);
						$data_stok = array(
							'total_stok' => $stok_baru, 
						);

						$this->db->set($data_stok);
						$this->db->where('kode_obat',$kode_obat);
						$this->db->update('tbl_satuan_obat');

						$data_log_stok = array(
							'tanggal' => date('Y-m-d'),
							'kode_obat' => $kode_obat,
							'stok_awal' => $val->total_stok,
							'stok_keluar'=> $kuantiti, 
							'stok_akhir' => $stok_baru, 
							'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_homecare." dan kode observasi ".$kode_observasi,
						);
						$hasil = $this->db->insert('tbl_log_stok_obat',$data_log_stok);

						if ($hasil) {

							$this->db->where('kode_obat',$kode_obat);
							$this->db->where('qty!=',0);
							$this->db->order_by('date(tanggal_expired)','ASC');
							$data_expired_date = $this->db->get('tbl_expired_obat')->result();
							$sisa = $kuantiti;
							foreach ($data_expired_date as $row) {
						// cek sisa dulu
								if ($sisa > 0 ) {
						// cek kapasitas obat
									if ($row->qty >= $sisa) {
								// simpan sub obat
										$data = array(
											'kode_rekam' => $kode_homecare,
											'kode_obat' => $kode_obat,
											'sub_homecare' => $kode_observasi,  				
											'qty' => $sisa,
											'harga_obat' => $jual,
											'subtotal' => floatval($sisa)*floatval($jual),
											'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
											'tanggal_expired'=>$row->tanggal_expired,
										); 

										$this->db->insert('tbl_sub_obat', $data);
								// update expired qty
										$data_update_expired = array('qty' => floatval($row->qty)-floatval($sisa),);
										$this->db->set($data_update_expired);
										$this->db->where('kode_exp',$row->kode_exp);
										$this->db->update('tbl_expired_obat');
										$sisa = 0;

									}

									else{

							// kalau stok di expired lebih kecil
								// simpan sub obat

										$data = array(
											'kode_rekam' => $kode_homecare,
											'sub_homecare' => $kode_observasi,  				
											'kode_obat' => $kode_obat,  				
											'qty' => $row->qty,
											'harga_obat' => $jual,										
											'subtotal' => floatval($row->qty)*floatval($jual),
											'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
											'tanggal_expired'=>$row->tanggal_expired,
										); 
										$this->db->insert('tbl_sub_obat', $data);
										$data_update_expired = array('qty' => 0,);
										$this->db->set($data_update_expired);
										$this->db->where('kode_exp',$row->kode_exp);
										$this->db->update('tbl_expired_obat');
										$sisa -= $row->qty;
									}
								}

							}

						}


					}

				} 


			}  
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Data Observasi homecare Dengan Kode homecare ".$kode_homecare." dan kode observasi ".$kode_observasi,
			);

			
			$data['title'] = 'Berhasil';
			$data['text'] = 'Data Berhasil di Ubah';
			$data['icon'] = 'success';

		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Data Gagal di Ubah';
			$data['icon'] = 'error';
		}
		$this->session->set_flashdata($data); 
		redirect('homecare','refresh');
	}

	public function tampildata_homecare()
	{
		$data = $this->model_homecare->tampil_data_homecare(); 
		echo json_encode($data);  
	} 

	public function ambil_data_belum_periksa(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];

		$total=$this->db->count_all_results("tbl_homecare");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
		}
		$this->db->limit($length,$start);
		$sortdata = $_REQUEST['sortdata'];
		$filterdata = $_REQUEST['filterdata'];
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('kode_homecare','DESC');
		}
		$this->db->where('status_pasien','Belum Diperiksa');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');

		$query = $this->db->get('tbl_homecare');
		if($search!=""){
			$this->db->where('status_pasien','Belum Diperiksa');
			$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');
			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
			$jum=$this->db->get('tbl_homecare');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$nomor_urut=$start+1;

		foreach ($query->result_array() as $list) {
			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'homecare/consent/'.$list['kode_homecare'].'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$list['kode_homecare'].'" > Informed Consent</a>'.
			'<a href="'.base_url().'homecare/observasi/'.$list['kode_homecare'].'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$list['kode_homecare'].'"> Observasi Pasien</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$list['kode_homecare'].'"><i class="fa fa-trash"></i></a>';
			}
			$opsi.='</div>';

			$output['data'][]=array(
				$nomor_urut,
				$list['no_registrasi'],
				$list['nama_pasien'],
				$list['tanggal_berobat'],
				$list['status_pasien'],
				$opsi
			);
			$nomor_urut++;
		}
		echo json_encode($output);
	}
	public function ambil_data_sedang_periksa(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		$this->db->where('status_pasien','Sedang Rawat Jalan');

		$total=$this->db->count_all_results("tbl_homecare");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
			$this->db->where('status_pasien','Sedang Rawat Jalan');

			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
		}
		$this->db->limit($length,$start);
		$sortdata = $_REQUEST['sortdata'];
		$filterdata = $_REQUEST['filterdata'];
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('kode_homecare','DESC');
		}
		$this->db->where('status_pasien','Sedang Rawat Jalan');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');

		$query = $this->db->get('tbl_homecare');
		if($search!=""){
			$this->db->where('status_pasien','Sedang Rawat Jalan');
			
			$this->db->where('status_pasien','Sedang Rawat Jalan');
			$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');
			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
			$jum=$this->db->get('tbl_homecare');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$nomor_urut=$start+1;

		foreach ($query->result_array() as $list) {
			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'homecare/consent/'.$list['kode_homecare'].'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$list['kode_homecare'].'" ><i class="fa fa-eye mr-2"></i>Consent</a>'.
			'<a href="javascript:;" class="btn btn-secondary btn-flat btn-sm item_rincian_biaya" style="font-weight: bold;" data="'.$list['kode_homecare'].'" ><i class="fa fa-money-check mr-2"></i>Biaya</a>'.
			'<a href="'.base_url().'homecare/observasi/'.$list['kode_homecare'].'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$list['kode_homecare'].'">Pemeriksaan Kembali</a>'.
			'<a href="javascript:;" class="btn btn-dark btn-flat btn-sm item_list_observasi" style="font-weight: bold;" data="'.$list['kode_homecare'].'"><i class="fas fa-tasks mr-2"></i>List Observasi</a>'.
			'<a href="'.base_url().'homecare/update_status_pasien/'.$list['kode_homecare'].'/'.$list['kode_pasien'].'" class="btn btn-info btn-flat btn-sm item_status_homecare"style="font-weight: bold;"><i class="fas fa-check mr-2"></i>Selesai</a>'.
			'</div>';
			$output['data'][]=array(
				$nomor_urut,
				$list['no_registrasi'],
				$list['nama_pasien'],
				$list['tanggal_berobat'],
				$list['status_pasien'],
				$opsi
			);
			$nomor_urut++;
		}
		echo json_encode($output);
	}
	public function ambil_data_sedang_periksa_farmasi(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		$this->db->where('status_pasien','Sedang Rawat Jalan');

		$total=$this->db->count_all_results("tbl_homecare");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
			$this->db->where('status_pasien','Sedang Rawat Jalan');

			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
		}
		$this->db->limit($length,$start);
		$sortdata = $_REQUEST['sortdata'];
		$filterdata = $_REQUEST['filterdata'];
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('kode_homecare','DESC');
		}
		$this->db->where('status_pasien','Sedang Rawat Jalan');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');

		$query = $this->db->get('tbl_homecare');
		if($search!=""){
			$this->db->where('status_pasien','Sedang Rawat Jalan');			
			$this->db->where('status_pasien','Sedang Rawat Jalan');
			$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');
			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
			$jum=$this->db->get('tbl_homecare');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$nomor_urut=$start+1;

		foreach ($query->result_array() as $list) {

			$opsi='<div class="btn-group">'.
			'<a href="javascript:;" class="btn btn-primary btn-flat btn-sm item_list_observasi" style="font-weight: bold;" data="'.$list['kode_homecare'].'"><i class="fas fa-tasks mr-2"></i>List Observasi</a>'.
			'</div>';

			$output['data'][]=array(
				$nomor_urut,
				$list['no_registrasi'],
				$list['nama_pasien'],
				$list['tanggal_berobat'],
				$list['status_pasien'],
				$opsi
			);
			$nomor_urut++;
		}
		echo json_encode($output);
	}
	public function rincian_biaya()
	{
		$kode_homecare = $this->input->get('kode_homecare');
		$data['rincian_biaya']=$this->model_homecare->get_rincian_biaya($kode_homecare);
		$data['periksa_homecare'] =$this->model_homecare->observasi_homecare($kode_homecare);
		echo json_encode($data);
		
	}

	public function ambil_data_selesai_periksa(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];

		$total=$this->db->count_all_results("tbl_homecare");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		$this->db->where('status_pasien','Selesai');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');
		if($search!=""){
			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
		}
		$this->db->limit($length,$start);
		$sortdata = $_REQUEST['sortdata'];
		$filterdata = $_REQUEST['filterdata'];
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('kode_homecare','DESC');
		}


		$query = $this->db->get('tbl_homecare');
		if($search!=""){
			$this->db->where('status_pasien','Selesai');
			$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_homecare.kode_pasien');
			$this->db->like("kode_homecare",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
			$jum=$this->db->get('tbl_homecare');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$nomor_urut=$start+1;

		foreach ($query->result_array() as $list) {
			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'homecare/consent/'.$list['kode_homecare'].'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$list['kode_homecare'].'" > Informed Consent</a>'.
			'<a href="'.base_url().'homecare/lembar_observasi/'.$list['kode_homecare'].'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" target="_blank"><i class="fa fa-eye mr-2"></i>Lembar Observasi</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$list['kode_homecare'].'"><i class="fa fa-trash"></i></a>';
			}
			$opsi.='</div>';

			$output['data'][]=array(
				$nomor_urut,
				$list['no_registrasi'],
				$list['nama_pasien'],
				$list['tanggal_berobat'],
				$list['status_pasien'],
				$opsi
			);
			$nomor_urut++;
		}
		echo json_encode($output);
	}

	public function lembar_observasi()
	{
		$kode_homecare = $this->uri->slash_segment(3).$this->uri->segment(4);
		$data['observasi'] = $this->model_homecare->get_list_observasi($kode_homecare);
		$data['homecare'] = $this->model_homecare->consent_homecare($kode_homecare);
		$data['obat'] = $this->model_homecare->consent_homecare_obat($kode_homecare);
		$this->load->view('homecare/lembar_observasi', $data);
	}

	public function list_observasi()
	{
		$kode_homecare = $this->input->get('kode_homecare');
		
		$data = $this->model_homecare->get_list_observasi($kode_homecare);
		echo json_encode($data);
	}


	public function buat_history_obat()
	{
		$obat = $this->model_homecare->getnamaobat();
		$cek=1;
		for ($i=0; $i <count($obat) ; $i++) { 
			$data_obat = array(
				'kode_obat' => $obat[$i]->kode_obat,
				'tanggal_expired' =>'2022-12-31',
				'qty'=> $obat[$i]->total_stok
			);
			$result = $this->db->insert('tbl_expired_obat',$data_obat);
			if ($result) {
				$cek+=1;
			}
		}

		var_dump(count($obat)."-".$cek);
	}

	public function update_pemberian_obat()
	{
		$kode_observasi = $this->uri->segment(3);
		$this->db->where('kode_observasi',$kode_observasi);
		$result = $this->db->update('tbl_observasi_homecare',array('status_pemberian_obat' =>'Sudah Diberikan', ));
if ($result) {

		$data['title'] = 'Berhasil';
			$data['text'] = 'Status Pemberian Obat Berhasil di Ubah';
			$data['icon'] = 'success';

		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Status Pemberian Obat Gagal di Ubah';
			$data['icon'] = 'error';
		}
		$this->session->set_flashdata($data); 
		redirect('homecare/obat_observasi','refresh');

	}
	public function detail_observasi()
	{
		$kode_observasi = $this->input->get('kode_observasi');
		$kode_homecare = $this->input->get('kode_homecare');
		$data['observasi'] = $this->model_homecare->get_detail_observasi($kode_observasi);
		$data['obat'] = $this->model_homecare->get_obat_observasi($kode_observasi,$kode_homecare);

		echo json_encode($data);
	}

	public function observasi()
	{
		if ($this->session->ttd == null || $this->session->ttd == "" ) {
			$data['title'] = 'Error';
			$data['text'] = 'Anda Belum Mempunyai TTD Digital';
			$data['icon'] = 'error';
			$this->session->set_flashdata($data); 
			redirect('homecare','refresh');
		}else{
			$kode_homecare =$this->uri->slash_segment(3).$this->uri->segment(4);
			$data['periksa_homecare'] =$this->model_homecare->observasi_homecare($kode_homecare);
			$data['obat'] = $this->model_homecare->getnamaobat(); 
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('homecare/observasi_pasien_homecare',$data);
			$this->load->view('template/footer');
		}
	}

	public function periksa_kembali()
	{
		if ($this->session->ttd == null || $this->session->ttd == "" ) {
			$data['title'] = 'Error';
			$data['text'] = 'Anda Belum Mempunyai TTD Digital';
			$data['icon'] = 'error';
			$this->session->set_flashdata($data); 
			redirect('homecare','refresh');
		}else{
			$kode_homecare =$this->uri->slash_segment(3).$this->uri->segment(4);
			$data['periksa_kembali'] =$this->model_homecare->periksa_kembali($kode_homecare);
			$data['observasi'] =$this->model_homecare->observasi($kode_homecare);
		// var_dump($data['observasi']);
		// exit();
			$data['obat'] = $this->model_homecare->getnamaobat();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('homecare/periksa_kembali_pasein',$data);
			$this->load->view('template/footer');
		}
	}



	public function consent($kode)
	{
		$kode_homecare =$this->uri->slash_segment(3).$this->uri->segment(4);
		$data['consent_pasien'] = $this->model_homecare->consent_homecare($kode_homecare); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('homecare/informed_consent',$data);
	}

}
