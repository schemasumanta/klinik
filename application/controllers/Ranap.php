<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranap extends CI_Controller {
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
			'aktivitas' => "Melihat Data Pemberian Obat Observasi Rawat Inap",
		);

		$this->db->insert('tbl_history', $data_history);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/tampilan_pemberian_obat_ranap');
		$this->load->view('template/footer');

	}

	public function tabel_tolak_ranap(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_ranap';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('tolak_ranap',$sort,$order,$search);

		foreach ($list as $l) {

			$no++;
			$l->no = $no;
			

			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'ranap/consent/'.$l->kode_ranap.'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$l->kode_ranap.'" > Informed Consent</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_ranap.'"><i class="fa fa-trash"></i></a>';
			}
			$opsi.='</div>';


			$l->opsi = $opsi;

			$data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('tolak_ranap',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('tolak_ranap',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}




	public function index()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengakses Data Rawat Inap",
		);

		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/tampilan_rawat_inap');
		$this->load->view('template/footer');
	}

	public function tolak()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengakses Data Rawat Inap Yang Ditolak",
		);

		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/tampilan_rawat_inap_tolak');
		$this->load->view('template/footer');
	}


	public function hapus_ranap()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Rawat Inap dengan Kode ".$this->input->post('kode_ranap'),
		);

		$this->db->insert('tbl_history', $data_history);

		$this->db->where('kode_ranap',$this->input->post('kode_ranap'));
		$this->db->delete('tbl_ranap');

		$this->db->where('kode_ranap',$this->input->post('kode_ranap'));
		$data_observasi = $this->db->get('tbl_observasi_ranap');
		if ($data_observasi->num_rows() > 0) {
			foreach ($data_observasi->result() as $key) {
				$this->db->where('kode_rekam','OBS-RANAP-'.$key->kode_observasi);
				$this->db->delete('tbl_sub_obat');
				$this->db->where('kode_observasi',$key->kode_observasi);
				$this->db->delete('tbl_observasi_ranap');
			}	
		}

		$this->db->where('kode_rekam',$this->input->post('kode_ranap'));
		$data_pembayaran = $this->db->get('tbl_pembayaran');
		if ($data_pembayaran->num_rows() > 0) {
			$this->db->where('kode_rekam',$this->input->post('kode_ranap'));
			$this->db->delete('tbl_pembayaran');
		}

		echo json_encode(1);
	}

	public function hapus_observasi()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Observasi Rawat Inap dengan Kode ".$this->input->post('kode_observasi'),
		);

		$this->db->insert('tbl_history', $data_history);

		$this->db->where('kode_ranap',$this->input->post('kode_ranap'));
		$jumlah = $this->db->get('tbl_observasi_ranap')->num_rows();
		if ($jumlah == 1) {
			$data_update  = array(
				'status_pasien' 	=> 'Belum Diperiksa',
				'tanggal_periksa' 	=> '0000-00-00',

			);
			$this->db->where('kode_ranap',$this->input->post('kode_ranap'));
			$this->db->set($data_update);
			$this->db->update('tbl_ranap');
		}

		$this->db->where('kode_rekam',$this->input->post('kode_ranap'));
		$this->db->where('sub_ranap',$this->input->post('kode_observasi'));
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
						'keterangan'=>'Pengembalian Obat Dengan Kode Ranap : '.$this->input->post('kode_ranap').' dan kode observasi '.$this->input->post('kode_observasi').' yang dihapus',
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
		$this->db->delete('tbl_observasi_ranap');
		echo json_encode(1);
	}

	public function edit_observasi()
	{
		if ($this->session->ttd == null || $this->session->ttd == "" ) {
			$data['title'] = 'Error';
			$data['text'] = 'Anda Belum Mempunyai TTD Digital';
			$data['icon'] = 'error';
			$this->session->set_flashdata($data); 
			redirect('ranap','refresh');
		}else{

			$kode_observasi = $this->uri->segment(3);
			$kode_ranap =$this->uri->slash_segment(4).$this->uri->segment(5);
			$data['observasi'] = $this->model_ranap->get_detail_observasi($kode_observasi);
			$data['list_obat'] = $this->model_ranap->get_obat_observasi($kode_observasi,$kode_ranap);
			$data['laboratorium'] = $this->model_ranap->get_data_laboratorium($kode_observasi,$kode_ranap);

			$data['obat'] = $this->model_ranap->getnamaobat();
			$data['periksa_ranap'] =$this->model_ranap->observasi_ranap($kode_ranap); 
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('ranap/edit_observasi_pasien_ranap',$data);
			$this->load->view('template/footer');
		}

	}

	public function update_status_pasien()
	{
		$kode_ranap = $this->uri->slash_segment(3).$this->uri->segment(4);
		$kode_pasien = $this->uri->segment(5);
		
		$data_status = array('status_pasien' => "Sudah Pulang",
			'date_time_update' => date('Y-m-d H:i:s'), );
		$this->db->set($data_status);
		$this->db->where('kode_ranap',$kode_ranap);
		$this->db->update('tbl_ranap');
		$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
		$tanggal_periksa =    date("Y-m-d H:i:s");
		$data_pembayaran = array(
			'kode_pembayaran' => $kode_pembayaran, 
			'kode_pasien' => $kode_pasien, 
			'kode_rekam' => $kode_ranap, 
			'tanggal_pembayaran' => $tanggal_periksa,
			'dokter_pemeriksa' => $this->session->nama_admin, 
			'status_pembayaran' => 'Menunggu Pembayaran');

		$result = $this->db->insert('tbl_pembayaran',$data_pembayaran);
		if ($result) {
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Status Pasien Ranap Dengan Kode ".$kode_ranap." (Sudah Pulang)",
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
		redirect('ranap','refresh');
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
		$kode_ranap = $this->input->post('kode_rekam');
		$status_pasien = 'Sedang Rawat Inap';
		$kode_pasien= $this->input->post('kode_pasien');
		$waktu = strval('assets\img\ttd_app\gambar_observasi'.time().'.png');
		file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd_pasien') ) ) );
		$data_observasi = array(
			'kode_ranap' 			=> $kode_ranap,
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

		$result = $this->db->insert('tbl_observasi_ranap',$data_observasi);
		if ($result) {

			$this->db->select('*');
			$this->db->where('kode_ranap',$kode_ranap);
			$this->db->limit(1);
			$this->db->order_by('kode_observasi','DESC');
			$observasi = $this->db->get('tbl_observasi_ranap')->result();
			$kode_observasi ='';
			foreach ($observasi as $obs) {
				$kode_observasi = $obs->kode_observasi;
			}

			$data_update  = array(
				'status_pasien' 	=> $status_pasien,
				'date_time_update' 	=> date('Y-m-d H:i:s'),


				'tanggal_periksa' 	=> $this->input->post('tanggal_periksa'),
			);
			$this->db->where('kode_ranap',$kode_ranap);
			$this->db->set($data_update);
			$this->db->update('tbl_ranap');
			
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
				'sub_ranap' => $kode_observasi,
				'kode_rekam' => $kode_ranap,
			);
			$simpan = $this->db->insert('tbl_pemeriksaan_lab',$data_lab);
			if ($simpan) {

				$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Mengajukan Lab Lewat Ranap Dengan Kode ".$kode_lab,
				);

				$this->db->insert('tbl_history', $data_history);

				$data['title'] = 'Berhasil';
				$data['text'] = 'Pengajuan Lab Ranap Berhasil di Simpan';
				$data['icon'] = 'success';
				$this->session->set_flashdata($data); 
				redirect('ranap','refresh');
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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_ranap." dan kode observasi ".$kode_observasi,
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
									'kode_rekam' => $kode_ranap,
									'sub_ranap' => $kode_observasi,
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
									'kode_rekam' => $kode_ranap,
									'kode_obat' => $kode_obat,  				
									'qty' => $exp->qty,									
									'harga_obat' => $jual,
									'sub_ranap' => $kode_observasi,
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
				'aktivitas' => "Menambah Observasi Ranap Dengan Kode OBS-RANAP-".$kode_observasi,
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
		redirect('ranap','refresh');
	}

	public function update_observasi()
	{
		$kode_observasi = $this->input->post('kode_observasi_edit');
		$kode_ranap = $this->input->post('kode_ranap');
		$ttd_pasien = $this->input->post('isi_ttd_pasien');
		$stok =	$this->input->post('total_stok'); 
		$nama_obat= $this->input->post('nama_obat');  
		$harga_jual= $this->input->post('harga_jual'); 
		$qty= $this->input->post('qty');
		$subtotal= $this->input->post('subtotal');
		$takaran= $this->input->post('takaran');
		$hari= $this->input->post('hari');
		$aturan_pakai= $this->input->post('aturan_pakai'); 
		$status_pasien = 'Sedang Rawat Inap';

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
		$result = $this->db->update('tbl_observasi_ranap');

		if ($result) {

			$data_update  = array(
				'tanggal_periksa' => $this->input->post('tanggal_periksa'),
				'date_time_update' 	=> date('Y-m-d H:i:s'),
			);
			$this->db->where('kode_ranap',$kode_ranap);
			$this->db->set($data_update);

			$this->db->update('tbl_ranap');

			if ($qty[0]!=0) {

			// get sub obat sebelumnya
				$this->db->where('kode_rekam', $kode_ranap);
				$this->db->where('sub_ranap',$kode_observasi);
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
								'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_ranap." dan kode observasi ".$kode_observasi,
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
							'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_ranap." dan kode observasi ".$kode_observasi,
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
											'kode_rekam' => $kode_ranap,
											'kode_obat' => $kode_obat,
											'sub_ranap' => $kode_observasi,  				
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
											'kode_rekam' => $kode_ranap,
											'sub_ranap' => $kode_observasi,  				
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
				'aktivitas' => "Mengubah Data Observasi Ranap Dengan Kode Ranap ".$kode_ranap." dan kode observasi ".$kode_observasi,
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
		redirect('ranap','refresh');
	}

	public function tampildata_ranap()
	{
		$data = $this->model_ranap->tampil_data_ranap(); 
		echo json_encode($data);  
	} 

	public function tabel_ranap_belum_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'date_time_update';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('ranap_belum_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;

			$l->no = $no;
			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'ranap/consent/'.$l->kode_ranap.'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$l->kode_ranap.'" > Informed Consent</a>'.
			'<a href="'.base_url().'ranap/observasi/'.$l->kode_ranap.'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$l->kode_ranap.'"> Observasi Pasien</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_ranap.'"><i class="fa fa-trash"></i></a>';
			}

			$opsi.='</div>';

			$l->opsi = $opsi;

			$data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('ranap_belum_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('ranap_belum_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function tabel_ranap_sedang_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'date_time_update';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('ranap_sedang_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;

			$l->no = $no;
			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'ranap/consent/'.$l->kode_ranap.'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$l->kode_ranap.'" ><i class="fa fa-eye mr-2"></i>Consent</a>'.
			'<a href="javascript:;" class="btn btn-secondary btn-flat btn-sm item_rincian_biaya" style="font-weight: bold;" data="'.$l->kode_ranap.'" ><i class="fa fa-money-check mr-2"></i>Biaya</a>'.
			'<a href="'.base_url().'ranap/observasi/'.$l->kode_ranap.'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$l->kode_ranap.'">Pemeriksaan Kembali</a>'.
			'<a href="javascript:;" class="btn btn-dark btn-flat btn-sm item_list_observasi" style="font-weight: bold;" data="'.$l->kode_ranap.'"><i class="fas fa-tasks mr-2"></i>List Observasi</a>'.
			'<a href="'.base_url().'ranap/update_status_pasien/'.$l->kode_ranap.'/'.$l->kode_pasien.'" class="btn btn-info btn-flat btn-sm item_status_ranap"style="font-weight: bold;"><i class="fas fa-check mr-2"></i>Sudah Pulang</a>'.
			'</div>';

			$l->opsi = $opsi;

			$data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('ranap_sedang_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('ranap_sedang_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	public function ambil_data_sedang_periksa_farmasi(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		$this->db->where('status_pasien','Sedang Rawat Inap');

		$total=$this->db->count_all_results("tbl_ranap");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
			$this->db->where('status_pasien','Sedang Rawat Inap');

			$this->db->like("kode_ranap",$search);
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
			$this->db->order_by('kode_ranap','DESC');
		}
		$this->db->where('status_pasien','Sedang Rawat Inap');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_ranap.kode_pasien');

		$query = $this->db->get('tbl_ranap');
		if($search!=""){
			$this->db->where('status_pasien','Sedang Rawat Inap');			
			$this->db->where('status_pasien','Sedang Rawat Inap');
			$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_ranap.kode_pasien');
			$this->db->like("kode_ranap",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("nama_pasien",$search);
			$this->db->or_like("tanggal_berobat",$search);
			$jum=$this->db->get('tbl_ranap');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}

		$nomor_urut=$start+1;

		foreach ($query->result_array() as $list) {

			$opsi='<div class="btn-group">'.
			'<a href="javascript:;" class="btn btn-primary btn-flat btn-sm item_list_observasi" style="font-weight: bold;" data="'.$list['kode_ranap'].'"><i class="fas fa-tasks mr-2"></i>List Observasi</a>'.
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
		$kode_ranap = $this->input->get('kode_ranap');
		$data['rincian_biaya']=$this->model_ranap->get_rincian_biaya($kode_ranap);
		$data['periksa_ranap'] =$this->model_ranap->observasi_ranap($kode_ranap);
		echo json_encode($data);
		
	}


	public function tabel_ranap_selesai_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'date_time_update';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('ranap_selesai_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;

			$l->no = $no;
			$opsi='<div class="btn-group">'.
			'<a href="'.base_url().'ranap/consent/'.$l->kode_ranap.'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$l->kode_ranap.'" > Informed Consent</a>'.
			'<a href="'.base_url().'ranap/lembar_observasi/'.$l->kode_ranap.'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" target="_blank"><i class="fa fa-eye mr-2"></i>Lembar Observasi</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$l->kode_ranap.'"><i class="fa fa-trash"></i></a>';
			}
			$opsi.='</div>';

			$l->opsi = $opsi;

			$data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('ranap_selesai_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('ranap_selesai_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}


	public function lembar_observasi2()
	{
		$kode_ranap = $this->uri->slash_segment(3).$this->uri->segment(4);
		$data['observasi'] = $this->model_ranap->get_list_observasi($kode_ranap);
		$data['ranap'] = $this->model_ranap->consent_ranap($kode_ranap);
		$data['obat'] = $this->model_ranap->consent_ranap_obat($kode_ranap);
		$this->load->view('ranap/lembar_observasi',$data);


	}
	public function lembar_observasi()
	{
		$kode_ranap = $this->uri->slash_segment(3).$this->uri->segment(4);
		$observasi = $this->model_ranap->get_list_observasi_ranap($kode_ranap);
		$ranap = $this->model_ranap->consent_ranap($kode_ranap);
		
		$bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		); 



		$this->load->library('excel');
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			)
		);

		foreach ($ranap as $key) {
			

			$this->excel->createSheet();



			$this->excel->setActiveSheetIndex(1)->setCellValue('A1', 'LEMBAR OBSERVASI DAN PEMBERIAN OBAT');
			$this->excel->setActiveSheetIndex(1)->getStyle('A1')->getFont()->setSize(16);
			$this->excel->setActiveSheetIndex(1)->getStyle('A1')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('A1:Q1');
			$this->excel->getActiveSheet(1)->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->setActiveSheetIndex(1)->setCellValue('A2', 'PASIEN RAWAT INAP KLINIK PRATAMA HMS MEDIKA');
			$this->excel->setActiveSheetIndex(1)->getStyle('A2')->getFont()->setSize(16);
			$this->excel->setActiveSheetIndex(1)->getStyle('A2')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('A2:Q2');
			$this->excel->getActiveSheet(1)->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

			$this->excel->setActiveSheetIndex(1)->setCellValue('D4','Nama Pasien');
			$this->excel->setActiveSheetIndex(1)->getStyle('D4')->getFont()->setSize(12);
			// $this->excel->setActiveSheetIndex(1)->getStyle('D4')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('D4:E4');

			$this->excel->setActiveSheetIndex(1)->setCellValue('D5','Kepala Keluarga');
			$this->excel->setActiveSheetIndex(1)->getStyle('D5')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('D5:E5');

			$this->excel->setActiveSheetIndex(1)->setCellValue('D6','Tanggal Berobat');
			$this->excel->setActiveSheetIndex(1)->getStyle('D6')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('D6:E6');


			$this->excel->setActiveSheetIndex(1)->setCellValue('F4',': '.$key->nama_pasien);
			$this->excel->setActiveSheetIndex(1)->getStyle('F4')->getFont()->setSize(12);
			// $this->excel->setActiveSheetIndex(1)->getStyle('F4')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('F4:I4');

			$this->excel->setActiveSheetIndex(1)->setCellValue('F5',': '.$key->kepala_keluarga);
			$this->excel->setActiveSheetIndex(1)->getStyle('F5')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('F5:I5');

			$this->excel->setActiveSheetIndex(1)->setCellValue('F6',': '.date_format(date_create($key->tanggal_berobat),'d')." ".$bulan[date_format(date_create($key->tanggal_berobat),'m')]." ".date_format(date_create($key->tanggal_berobat),'Y'));
			$this->excel->setActiveSheetIndex(1)->getStyle('F6')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('F6:I6');

			$this->excel->setActiveSheetIndex(1)->setCellValue('M4','No. Register');
			$this->excel->setActiveSheetIndex(1)->getStyle('M4')->getFont()->setSize(12);
			// $this->excel->setActiveSheetIndex(1)->getStyle('M4')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('M4:N4');

			$this->excel->setActiveSheetIndex(1)->setCellValue('M5','Umur');
			$this->excel->setActiveSheetIndex(1)->getStyle('M5')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('M5:N5');

			$this->excel->setActiveSheetIndex(1)->setCellValue('M6','Kode Ranap');
			$this->excel->setActiveSheetIndex(1)->getStyle('M6')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('M6:N6');

			$this->excel->setActiveSheetIndex(1)->setCellValue('O4',': '.$key->no_registrasi);
			$this->excel->setActiveSheetIndex(1)->getStyle('O4')->getFont()->setSize(12);
			// $this->excel->setActiveSheetIndex(1)->getStyle('O4')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('O4:Q4');

			$this->excel->setActiveSheetIndex(1)->setCellValue('O5',': '.$key->umur." Tahun");
			$this->excel->setActiveSheetIndex(1)->getStyle('O5')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('O5:Q5');

			$this->excel->setActiveSheetIndex(1)->setCellValue('O6',': '.$key->kode_ranap);
			$this->excel->setActiveSheetIndex(1)->getStyle('O6')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->mergeCells('O6:Q6');

			$this->excel->getActiveSheet(1)->getColumnDimension('A')->setWidth(5);
			$this->excel->getActiveSheet(1)->getColumnDimension('B')->setWidth(25);
			$this->excel->getActiveSheet(1)->getColumnDimension('C')->setWidth(25);
			$this->excel->getActiveSheet(1)->getColumnDimension('D')->setWidth(15);
			$this->excel->getActiveSheet(1)->getColumnDimension('E')->setWidth(10);
			$this->excel->getActiveSheet(1)->getColumnDimension('F')->setWidth(12);
			$this->excel->getActiveSheet(1)->getColumnDimension('G')->setWidth(10);
			$this->excel->getActiveSheet(1)->getColumnDimension('H')->setWidth(10);
			$this->excel->getActiveSheet(1)->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet(1)->getColumnDimension('J')->setWidth(35);
			$this->excel->getActiveSheet(1)->getColumnDimension('K')->setWidth(35);
			$this->excel->getActiveSheet(1)->getColumnDimension('L')->setWidth(50);
			$this->excel->getActiveSheet(1)->getColumnDimension('M')->setWidth(35);
			$this->excel->getActiveSheet(1)->getColumnDimension('N')->setWidth(5);
			$this->excel->getActiveSheet(1)->getColumnDimension('O')->setWidth(42);
			$this->excel->getActiveSheet(1)->getColumnDimension('P')->setWidth(20);
			$this->excel->getActiveSheet(1)->getColumnDimension('Q')->setWidth(20);





			$this->excel->setActiveSheetIndex(1)->setCellValue('A8', 'No');
			$this->excel->setActiveSheetIndex(1)->getStyle('A8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('A8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('A8:A9');
			$this->excel->getActiveSheet(1)->getStyle('A8:A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('A8:A9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('A8:A9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('B8', 'Tanggal Pemeriksaan');
			$this->excel->setActiveSheetIndex(1)->getStyle('B8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('B8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('B8:B9');
			$this->excel->getActiveSheet(1)->getStyle('B8:B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('B8:B9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('B8:B9')->applyFromArray($styleArray);


			$this->excel->setActiveSheetIndex(1)->setCellValue('C8', 'Jam Pemeriksaan');
			$this->excel->setActiveSheetIndex(1)->getStyle('C8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('C8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('C8:C9');
			$this->excel->getActiveSheet(1)->getStyle('C8:C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('C8:C9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('C8:C9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('D8', 'Tensi Darah');
			$this->excel->setActiveSheetIndex(1)->getStyle('D8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('D8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('D8:D9');
			$this->excel->getActiveSheet(1)->getStyle('D8:D9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('D8:D9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('D8:D9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('E8', 'Nadi');
			$this->excel->setActiveSheetIndex(1)->getStyle('E8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('E8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('E8:E9');
			$this->excel->getActiveSheet(1)->getStyle('E8:E9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('E8:E9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('E8:E9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('F8', 'Respirasi');
			$this->excel->setActiveSheetIndex(1)->getStyle('F8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('F8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('F8:F9');
			$this->excel->getActiveSheet(1)->getStyle('F8:F9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('F8:F9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('F8:F9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('G8', 'Suhu');
			$this->excel->setActiveSheetIndex(1)->getStyle('G8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('G8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('G8:G9');
			$this->excel->getActiveSheet(1)->getStyle('G8:G9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('G8:G9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('G8:G9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('H8', 'SPO2');
			$this->excel->setActiveSheetIndex(1)->getStyle('H8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('H8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('H8:H9');
			$this->excel->getActiveSheet(1)->getStyle('H8:H9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('H8:H9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('H8:H9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('I8', 'Volume Air Kemih');
			$this->excel->setActiveSheetIndex(1)->getStyle('I8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('I8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('I8:I9');
			$this->excel->getActiveSheet(1)->getStyle('I8:I9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('I8:I9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('I8:I9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('J8', 'Hasil Pemeriksaan');
			$this->excel->setActiveSheetIndex(1)->getStyle('J8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('J8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('J8:J9');
			$this->excel->getActiveSheet(1)->getStyle('J8:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('J8:J9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('J8:J9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('K8', 'Terapi/Anjuran');
			$this->excel->setActiveSheetIndex(1)->getStyle('K8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('K8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('K8:K9');
			$this->excel->getActiveSheet(1)->getStyle('K8:K9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('K8:K9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('K8:K9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('L8', 'Pemberian Obat');
			$this->excel->setActiveSheetIndex(1)->getStyle('L8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('L8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('L8:O8');
			$this->excel->getActiveSheet(1)->getStyle('L8:O8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('L8:O8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('L8:O8')->applyFromArray($styleArray);


			$this->excel->setActiveSheetIndex(1)->setCellValue('P8', 'TTD Pasien');
			$this->excel->setActiveSheetIndex(1)->getStyle('P8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('P8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('P8:P9');
			$this->excel->getActiveSheet(1)->getStyle('P8:P9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('P8:P9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('P8:P9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('Q8', 'TTD Pemeriksa');
			$this->excel->setActiveSheetIndex(1)->getStyle('Q8')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('Q8')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('Q8:Q9');
			$this->excel->getActiveSheet(1)->getStyle('Q8:Q9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('Q8:Q9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('Q8:Q9')->applyFromArray($styleArray);


			$this->excel->setActiveSheetIndex(1)->setCellValue('L9', 'Nama Obat');
			$this->excel->setActiveSheetIndex(1)->getStyle('L9')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('L9')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('L9:L9');
			$this->excel->getActiveSheet(1)->getStyle('L9:L9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('L9:L9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('L9:L9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('M9', 'Keterangan');
			$this->excel->setActiveSheetIndex(1)->getStyle('M9')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('M9')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('M9:M9');
			$this->excel->getActiveSheet(1)->getStyle('M9:M9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('M9:M9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('M9:M9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('N9', 'Qty');
			$this->excel->setActiveSheetIndex(1)->getStyle('N9')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('N9')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('N9:N9');
			$this->excel->getActiveSheet(1)->getStyle('N9:N9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('N9:N9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('N9:N9')->applyFromArray($styleArray);

			$this->excel->setActiveSheetIndex(1)->setCellValue('O9', 'Dosis');
			$this->excel->setActiveSheetIndex(1)->getStyle('O9')->getFont()->setSize(12);
			$this->excel->setActiveSheetIndex(1)->getStyle('O9')->getFont()->setBold(true);
			$this->excel->setActiveSheetIndex(1)->mergeCells('O9:O9');
			$this->excel->getActiveSheet(1)->getStyle('O9:O9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('O9:O9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet(1)->getStyle('O9:O9')->applyFromArray($styleArray);

			$i=10;
			if(!empty($observasi))
			{
				$no=1;
				foreach($observasi as $data){
					$this->db->where('sub_ranap',$data->kode_observasi);
					$this->db->where('kode_rekam',$kode_ranap);
					$this->db->join('tbl_satuan_obat b','b.kode_obat=a.kode_obat','left');
					$obat = $this->db->get('tbl_sub_obat a');

					if ($obat->num_rows() > 0 ) {
						$jumlah_obat = $i + $obat->num_rows() -1;

					}else{

						$jumlah_obat = $i;

					}

					$this->excel->setActiveSheetIndex(1)->getStyle('P'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('P'.$i.':P'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('P'.$i.':P'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('P'.$i.':P'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('P'.$i.':P'.$jumlah_obat)->applyFromArray($styleArray);

					if(file_exists('./'.$data->ttd_pasien))
					{
						$objDrawing = new PHPExcel_Worksheet_Drawing();
						$objDrawing->setPath('./'.$data->ttd_pasien);

						$objDrawing->setCoordinates('P'.$i);

						$objDrawing->setWorksheet($this->excel->getActiveSheet());

						$objDrawing->setWidthAndHeight(50,50);
						
						$objDrawing->setResizeProportional(true);
					}
					else
					{
						$this->excel->setActiveSheetIndex(1)->setCellValue('P'.$i, '');
					}

					$this->excel->setActiveSheetIndex(1)->getStyle('Q'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('Q'.$i.':Q'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('Q'.$i.':Q'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('Q'.$i.':Q'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('Q'.$i.':Q'.$jumlah_obat)->applyFromArray($styleArray);


					if(file_exists('./'.$data->ttd_pemeriksa))
					{
						$objDrawing = new PHPExcel_Worksheet_Drawing();
						$objDrawing->setPath('./'.$data->ttd_pemeriksa);
						$objDrawing->setCoordinates('Q'.$i);
						$objDrawing->setWorksheet($this->excel->getActiveSheet());
						$objDrawing->setWidthAndHeight(50,50);
						$objDrawing->setResizeProportional(true);
					}
					else
					{
						$this->excel->setActiveSheetIndex(1)->setCellValue('Q'.$i, '');
						

					}




					$this->excel->setActiveSheetIndex(1)->setCellValue('A'.$i, $no++);
					$this->excel->setActiveSheetIndex(1)->getStyle('A'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('A'.$i.':A'.$jumlah_obat);
					$this->excel->getActiveSheet(1)->getStyle('A'.$i.':A'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('A'.$i.':A'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('A'.$i.':A'.$jumlah_obat)->applyFromArray($styleArray);


					$this->excel->setActiveSheetIndex(1)->setCellValue('B'.$i, date_format(date_create($data->tanggal_pemeriksaan),'d-m-Y'));
					$this->excel->setActiveSheetIndex(1)->getStyle('B'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('B'.$i.':B'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('B'.$i.':B'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('B'.$i.':B'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('B'.$i.':B'.$jumlah_obat)->applyFromArray($styleArray);


					$this->excel->setActiveSheetIndex(1)->setCellValue('C'.$i, $data->jam_pemeriksaan);
					$this->excel->setActiveSheetIndex(1)->getStyle('C'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('C'.$i.':C'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('C'.$i.':C'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('C'.$i.':C'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('C'.$i.':C'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('D'.$i, $data->tensi_darah);
					$this->excel->setActiveSheetIndex(1)->getStyle('D'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('D'.$i.':D'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('D'.$i.':D'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('D'.$i.':D'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('D'.$i.':D'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('E'.$i, $data->frequensi_nadi);
					$this->excel->setActiveSheetIndex(1)->getStyle('E'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('E'.$i.':E'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('E'.$i.':E'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('E'.$i.':E'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('E'.$i.':E'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('F'.$i, $data->respirasi);
					$this->excel->setActiveSheetIndex(1)->getStyle('F'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('F'.$i.':F'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('F'.$i.':F'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('F'.$i.':F'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('F'.$i.':F'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('G'.$i, $data->suhu);
					$this->excel->setActiveSheetIndex(1)->getStyle('G'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('G'.$i.':G'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('G'.$i.':G'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('G'.$i.':G'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('G'.$i.':G'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('H'.$i, $data->spo2);
					$this->excel->setActiveSheetIndex(1)->getStyle('H'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('H'.$i.':H'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('H'.$i.':H'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('H'.$i.':H'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('H'.$i.':H'.$jumlah_obat)->applyFromArray($styleArray);


					$this->excel->setActiveSheetIndex(1)->setCellValue('I'.$i, $data->volume_air_kemih);
					$this->excel->setActiveSheetIndex(1)->getStyle('I'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('I'.$i.':I'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('I'.$i.':I'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('I'.$i.':I'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('I'.$i.':I'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('J'.$i, $data->hasil_pemeriksaan);
					$this->excel->setActiveSheetIndex(1)->getStyle('J'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('J'.$i.':J'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('J'.$i.':J'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					$this->excel->getActiveSheet(1)->getStyle('J'.$i.':J'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('J'.$i.':J'.$jumlah_obat)->applyFromArray($styleArray);

					$this->excel->setActiveSheetIndex(1)->setCellValue('K'.$i, $data->terapi_anjuran);
					$this->excel->setActiveSheetIndex(1)->getStyle('K'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('K'.$i.':K'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('K'.$i.':K'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					$this->excel->getActiveSheet(1)->getStyle('K'.$i.':K'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('K'.$i.':K'.$jumlah_obat)->applyFromArray($styleArray);

					

					if ($obat->num_rows() > 0) {

					

					foreach ($obat->result() as $ob) {
						$k=1; 

						$this->excel->setActiveSheetIndex(1)->setCellValue('L'.$i, $ob->nama_obat);
						$this->excel->setActiveSheetIndex(1)->getStyle('L'.$i)->getFont()->setSize(12);
						$this->excel->setActiveSheetIndex(1)->mergeCells('L'.$i.':L'.($i+($k-1)));

						$this->excel->getActiveSheet(1)->getStyle('L'.$i.':L'.($i+($k-1)))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
						$this->excel->getActiveSheet(1)->getStyle('L'.$i.':L'.($i+($k-1)))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

						$this->excel->getActiveSheet(1)->getStyle('L'.$i.':L'.$i)->applyFromArray($styleArray);

						$this->excel->setActiveSheetIndex(1)->setCellValue('M'.$i, $ob->keterangan);
						$this->excel->setActiveSheetIndex(1)->getStyle('M'.$i)->getFont()->setSize(12);
						$this->excel->setActiveSheetIndex(1)->mergeCells('M'.$i.':M'.($i+($k-1)));

						$this->excel->getActiveSheet(1)->getStyle('M'.$i.':M'.($i+($k-1)))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
						$this->excel->getActiveSheet(1)->getStyle('M'.$i.':M'.($i+($k-1)))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

						$this->excel->getActiveSheet(1)->getStyle('M'.$i.':M'.($i+($k-1)))->applyFromArray($styleArray);

						$this->excel->setActiveSheetIndex(1)->setCellValue('N'.$i, $ob->qty);
						$this->excel->setActiveSheetIndex(1)->getStyle('N'.$i)->getFont()->setSize(12);
						$this->excel->setActiveSheetIndex(1)->mergeCells('N'.$i.':N'.($i+($k-1)));

						$this->excel->getActiveSheet(1)->getStyle('N'.$i.':N'.($i+($k-1)))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$this->excel->getActiveSheet(1)->getStyle('N'.$i.':N'.($i+($k-1)))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

						$this->excel->getActiveSheet(1)->getStyle('N'.$i.':N'.($i+($k-1)))->applyFromArray($styleArray);


						$this->excel->setActiveSheetIndex(1)->setCellValue('O'.$i, $ob->aturan_pakai);
						$this->excel->setActiveSheetIndex(1)->getStyle('O'.$i)->getFont()->setSize(12);
						$this->excel->setActiveSheetIndex(1)->mergeCells('O'.$i.':O'.($i+($k-1)));

						$this->excel->getActiveSheet(1)->getStyle('O'.$i.':O'.($i+($k-1)))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
						$this->excel->getActiveSheet(1)->getStyle('O'.$i.':O'.($i+($k-1)))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

						$this->excel->getActiveSheet(1)->getStyle('O'.$i.':O'.($i+($k-1)))->applyFromArray($styleArray);


						$k++;
						$i++;
						
					}

					}else{


					$this->excel->setActiveSheetIndex(1)->setCellValue('L'.$i, '');
					$this->excel->setActiveSheetIndex(1)->getStyle('L'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('L'.$i.':L'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('L'.$i.':L'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('L'.$i.':L'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('L'.$i.':L'.$jumlah_obat)->applyFromArray($styleArray);


					$this->excel->setActiveSheetIndex(1)->setCellValue('M'.$i, '');
					$this->excel->setActiveSheetIndex(1)->getStyle('M'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('M'.$i.':M'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('M'.$i.':M'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('M'.$i.':M'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('M'.$i.':M'.$jumlah_obat)->applyFromArray($styleArray);

						

					$this->excel->setActiveSheetIndex(1)->setCellValue('N'.$i, '');
					$this->excel->setActiveSheetIndex(1)->getStyle('N'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('N'.$i.':N'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('N'.$i.':N'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('N'.$i.':N'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('N'.$i.':N'.$jumlah_obat)->applyFromArray($styleArray);


					$this->excel->setActiveSheetIndex(1)->setCellValue('O'.$i, '');
					$this->excel->setActiveSheetIndex(1)->getStyle('O'.$i)->getFont()->setSize(12);
					$this->excel->setActiveSheetIndex(1)->mergeCells('O'.$i.':O'.$jumlah_obat);

					$this->excel->getActiveSheet(1)->getStyle('O'.$i.':O'.$jumlah_obat)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet(1)->getStyle('O'.$i.':O'.$jumlah_obat)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

					$this->excel->getActiveSheet(1)->getStyle('O'.$i.':O'.$jumlah_obat)->applyFromArray($styleArray);
					$i++;

					}

				}
			}
			else {
				$this->excel->setActiveSheetIndex(1)->setCellValue('A'.$i, "Data Tidak Ditemukan");
				$this->excel->setActiveSheetIndex(1)->getStyle('A'.$i)->getFont()->setSize(12);
				$this->excel->setActiveSheetIndex(1)->mergeCells('A'.$i.':Q'.$i);
				$this->excel->getActiveSheet(1)->getStyle('A'.$i.':Q'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$this->excel->getActiveSheet(1)->getStyle('A'.$i.':Q'.$i)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet(1)->getStyle('A'.$i.':Q'.$i)->applyFromArray($styleArray);
			}


			$sheet = $this->excel->getIndex($this->excel->getSheetByName('Worksheet'));
			$this->excel->removeSheetByIndex($sheet);
			$this->excel->setActiveSheetIndex(0);
			$filename = "lembar_observasi_".time().".xls";
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
			ob_end_clean();
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			$objWriter->save('php://output');

		}


	}

	public function list_observasi()
	{
		$kode_ranap = $this->input->get('kode_ranap');
		
		$data = $this->model_ranap->get_list_observasi($kode_ranap);
		echo json_encode($data);
	}


	public function buat_history_obat()
	{
		$obat = $this->model_ranap->getnamaobat();
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
		$result = $this->db->update('tbl_observasi_ranap',array('status_pemberian_obat' =>'Sudah Diberikan', ));
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
		redirect('ranap/obat_observasi','refresh');

	}
	public function detail_observasi()
	{
		$kode_observasi = $this->input->get('kode_observasi');
		$kode_ranap = $this->input->get('kode_ranap');
		$data['observasi'] = $this->model_ranap->get_detail_observasi($kode_observasi);
		$data['obat'] = $this->model_ranap->get_obat_observasi($kode_observasi,$kode_ranap);

		echo json_encode($data);
	}

	public function observasi()
	{
		if ($this->session->ttd == null || $this->session->ttd == "" ) {
			$data['title'] = 'Error';
			$data['text'] = 'Anda Belum Mempunyai TTD Digital';
			$data['icon'] = 'error';
			$this->session->set_flashdata($data); 
			redirect('ranap','refresh');
		}else{
			$kode_ranap =$this->uri->slash_segment(3).$this->uri->segment(4);
			$data['periksa_ranap'] =$this->model_ranap->observasi_ranap($kode_ranap);
			$data['obat'] = $this->model_ranap->getnamaobat(); 
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('ranap/observasi_pasien_ranap',$data);
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
			redirect('ranap','refresh');
		}else{
			$kode_ranap =$this->uri->slash_segment(3).$this->uri->segment(4);
			$data['periksa_kembali'] =$this->model_ranap->periksa_kembali($kode_ranap);
			$data['observasi'] =$this->model_ranap->observasi($kode_ranap);
		// var_dump($data['observasi']);
		// exit();
			$data['obat'] = $this->model_ranap->getnamaobat();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('ranap/periksa_kembali_pasein',$data);
			$this->load->view('template/footer');
		}
	}



	public function consent($kode)
	{
		$kode_ranap =$this->uri->slash_segment(3).$this->uri->segment(4);
		$data['consent_pasien'] = $this->model_ranap->consent_ranap($kode_ranap); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/informed_consent',$data);
	}

}
