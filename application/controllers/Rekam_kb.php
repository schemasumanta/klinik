<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekam_kb extends CI_Controller {
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
			'aktivitas' => "Mengakses Menu KB", 
		);

		$this->db->insert('tbl_history', $data_history); 

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam_kb/tampilan_rekam_kb');
		$this->load->view('template/footer');
	}

	public function tampildata_rekam_kb()
	{
		$data = $this->model_rekam_kb->tampil_data_rekam_kb(); 
		echo json_encode($data);  
	}

	public function tabel_kb_belum_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'date_time_update';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('kb_belum_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;
			$opsi='
			<div class="btn-group">'; 
			$opsi.='  
			<a href="'.base_url().'rekam_kb/periksa_pasien_kb/'.$l->kode_kb.'" class="btn btn-sm btn-success btn-flat " data="'.$l->kode_kb.'">Periksa Pasien </a> ';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus" data="'.$l->kode_kb.'">  <i class="fas fa-trash"></i> </a>  ';
			}
			$opsi.='</div>';
			$l->opsi = $opsi;



			$data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('kb_belum_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('kb_belum_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	public function tabel_kb_sudah_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'date_time_update';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('kb_sudah_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;
			$opsi='
			<div class="btn-group">'; 
			$opsi.='  
			<a href="'.base_url().'rekam_kb/detail_kb/'.$l->kode_kb.'" class="btn btn-sm btn-success btn-flat " data="'.$l->kode_kb.'"><i class="fa fa-eye mr-2"></i>Detail </a>' ;
			if($l->status_pembayaran!="LUNAS")
			{
				$opsi.='<a href="'.base_url().'rekam_kb/item_edit_rekam_kb/'.$l->kode_kb.'" class="btn btn-sm btn-secondary btn-flat " > <i class="fa fa-edit"></i> Edit Rekam </a>';
			}

			$opsi.=' </div>';

			$l->opsi = $opsi;
			$data[] = $l;
		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('kb_sudah_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('kb_sudah_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}
	public function riwayat_rekam_kb()
	{
		$kode_pasien =$this->input->get('kode_pasien');
		$kategori =$this->input->get('kategori');
		if ($kategori=='kb') {
			$hasil = $this->model_rekam_kb->getriwayatkb($kode_pasien);
		} 
		$data['riwayat']='';
		$data['list']='';
		$i=0;

		foreach ($hasil as $key) {
			
			$data['riwayat'].='<tr style="text-align:center" class="head_riwayat'.$i.'">'.
			'<td class="riwayat riwayat'.$i.'" data="'.$i.'" onclick="showdetail('.$i.')"><i class="fa fa-eye text-dark mr-2"></i></td>'.
			// '<td>'.$key->kode_kb.'</td>'.
			'<td id="kode_kb'.$i.'">'.$key->kode_kb.'</td>'.
			'<td>'.$key->tanggal_berobat.'</td>'.
			'<td>'.$key->tanggal_periksa.'</td>'.
			'</tr>'; 
			$i++;}

			echo json_encode($data);
		}
		

		public function detail_riwayat($kode)
		{
			$kode_kb = str_replace('garing','/',$kode);  
			$data['detail_rekam_pasien_kb'] = $this->model_rekam_kb->detail_rekam_kb($kode_kb);
			$data['detail_obat'] = $this->model_rekam_kb->detail_obat($kode_kb)	;
			$this->load->view('rekam_kb/detail_riwayat_kb',$data);
		}


		public function tampildata_rekam_kb1()
		{
			$data = $this->model_rekam_kb->tampil_data_rekam_kb1(); 
			echo json_encode($data);  
		}

		public function periksa_pasien_kb()
		{
			$kode_kb = $this->uri->slash_segment(3).$this->uri->segment(4); 
			$data['periksa_kb'] =$this->model_rekam_kb->periksa_pasien_kb($kode_kb);
			$data['obat'] = $this->model_rekam_kb->getnamaobat(); 
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('rekam_kb/periksa_pasien_kb',$data);
			$this->load->view('template/footer');
		}

		public function simpanrekam_rekam_kb()
		{
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper('url');
			$kode_kb = $this->input->post('kode_kb');   
			$kode_pasien = $this->input->post('kode_pasien'); 
			$stok =	$this->input->post('total_stok'); 
			$nama_obat= $this->input->post('nama_obat');  
			$harga_jual= $this->input->post('harga_jual'); 
			$qty= $this->input->post('qty');
			$subtotal= $this->input->post('subtotal');
			$takaran= $this->input->post('takaran');
			$hari= $this->input->post('hari');
			$aturan_pakai= $this->input->post('aturan_pakai');  


			for ($i=0; $i <count($nama_obat) ; $i++) { 
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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_kb,
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
									'kode_rekam' => $kode_kb,
									'kode_obat' => $kode_obat,  				
									'qty' => $sisa,
									'harga_obat' => $jual,
									'subtotal' => floatval($sisa)*floatval($jual),
									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
									'tanggal_expired'=>$exp->tanggal_expired,
								); 

								$this->db->insert('tbl_sub_obat', $data);

								// update expired qty
								$data_update_expired = array('qty' => floatval($exp->qty)-floatval($sisa),);

								$this->db->set($data_update_expired);
								$this->db->where('kode_exp',$exp->kode_exp);
								$this->db->update('tbl_expired_obat');
								$sisa = 0;
							}else{
								$data = array(
									'kode_rekam' => $kode_kb,
									'kode_obat' => $kode_obat,  				
									'qty' => $exp->qty,									
									'harga_obat' => $jual,
									'subtotal' => floatval($exp->qty)*floatval($jual),
									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
									'tanggal_expired'=>$exp->tanggal_expired,
								); 

								$this->db->insert('tbl_sub_obat', $data);
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

			$data_rekam_kb= array(
				'status_pasien' =>'Sudah Diperiksa',
				'tanggal_periksa' =>$this->input->post('tanggal_periksa'),

				'jml_anak' =>$this->input->post('jml_anak'),
				'akseptor' =>$this->input->post('akseptor'),
				'tanggal_periksa' =>$this->input->post('tanggal_periksa'), 
				'haid_terakhir' => $this->input->post('haid_terakhir'),

				'suhu' => $this->input->post('suhu'),
				'tensi_darah' => $this->input->post('tensi_darah'),
				'pernapasan' => $this->input->post('pernapasan'),
				'saturasi' => $this->input->post('saturasi'),
				'nadi' => $this->input->post('nadi'),
				'bb' => $this->input->post('bb'),
				'tb' => $this->input->post('tb'),
				'date_time_update' => date('Y-m-d H:i:s'),
				'efek_samping' => $this->input->post('efek_samping'),
				'komplikasi' => $this->input->post('komplikasi'),
				'tindakan_dokter' => $this->input->post('tindakan_dokter'),
				'alat_kontrasepsi' => $this->input->post('alat_kontrasepsi'), 
				'tanggal_kembali' => $this->input->post('tanggal_kembali'), 
				'total_akhir' =>$this->uri->segment(3),
				'dokter_pemeriksa' => $this->session->nama_admin,
				'upah_dokter' => $this->session->tarif_dokter
			);

			$this->db->set($data_rekam_kb); 
			$this->db->where('kode_kb',$kode_kb); 
			$result= $this->db->update('tbl_kb'); 
			if ($result) {
				$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
				$tanggal_periksa = date("Y-m-d H:i:s");
				$data_pembayaran = array(
					'kode_pembayaran' => $kode_pembayaran, 
					'kode_pasien' => $kode_pasien, 
					'kode_rekam' => $kode_kb, 
					'tanggal_pembayaran' => $tanggal_periksa,
					'dokter_pemeriksa' => $this->session->nama_admin, 
					'status_pembayaran' => 'Menunggu Pembayaran');

				$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
				if ($simpan_pembayaran) {

					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Melakukan Pemeriksaan KB dengan Kode ".$kode_kb, 
					);

					$this->db->insert('tbl_history', $data_history); 
					$data['title'] = 'Berhasil';
					$data['text'] = 'Data Berhasil di Simpan';
					$data['icon'] = 'success';
					
				}else{
					$data['title'] = 'Gagal';
					$data['text'] = 'Data Gagal di Simpan';
					$data['icon'] = 'success';
				}

			}

			$this->session->set_flashdata($data); 
			redirect('rekam_kb','refresh');
		}


		public function item_edit_rekam_kb()
		{
			$kode_kb = $this->uri->slash_segment(3).$this->uri->segment(4); 
			$data['edit_rekam_pasien_kb'] = $this->model_rekam_kb->edit_rekam_pasien_kb($kode_kb); 
			$data['detail_obat'] = $this->model_rekam_kb->detail_obat($kode_kb);
			$data['obat'] = $this->model_rekam_kb->getnamaobat(); 	 		

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('rekam_kb/edit_rekam_kb',$data);
			$this->load->view('template/footer');
		}



		public function updaterekam_kb()
		{
			$this->load->helper('url');
			$kode_kb = $this->input->post('kode_kb');   
			$kode_pasien = $this->input->post('kode_pasien'); 
			$stok =	$this->input->post('total_stok'); 
			$nama_obat= $this->input->post('nama_obat');  
			$harga_jual= $this->input->post('harga_jual'); 
			$qty= $this->input->post('qty');
			$subtotal= $this->input->post('subtotal');
			$takaran= $this->input->post('takaran');
			$hari= $this->input->post('hari');
			$aturan_pakai= $this->input->post('aturan_pakai'); 
			$kode_pembayaran= $this->input->post('kode_pembayaran');
			if ($qty[0]!=0) {
				$this->db->where('kode_rekam', $kode_kb);
				$data_obat_lama = $this->db->get('tbl_sub_obat')->result();

				foreach ($data_obat_lama as $obt) {
					$this->db->select('total_stok');
					$this->db->where('kode_obat',$obt->kode_obat);
					$data_stok_lama =$this->db->get('tbl_satuan_obat')->result();

					foreach ($data_stok_lama as $stk) {
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
								'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_kb,
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

						$stok_baru = floatval($val->total_stok)-floatval($kuantiti);
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
							'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_kb,
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
											'kode_rekam' => $kode_kb,
											'kode_obat' => $kode_obat,  				
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
											'kode_rekam' => $kode_kb,
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

			$data_rekam_edit= array(			

				'status_pasien' =>'Sudah Diperiksa',
				'tanggal_periksa' =>$this->input->post('tanggal_periksa'), 
				'jml_anak' => $this->input->post('jml_anak'),
				'akseptor' => $this->input->post('akseptor'),
				'tanggal_periksa' => $this->input->post('tanggal_periksa'),
				'haid_terakhir' => $this->input->post('haid_terakhir'),
				
				'suhu' => $this->input->post('suhu'),
				'tensi_darah' => $this->input->post('tensi_darah'),
				'pernapasan' => $this->input->post('pernapasan'),
				'saturasi' => $this->input->post('saturasi'),
				'nadi' => $this->input->post('nadi'),
				'bb' => $this->input->post('bb'),
				'tb' => $this->input->post('tb'),

				// 'tensi_darah' => $this->input->post('tensi_darah'),
				// 'berat_badan' => $this->input->post('berat_badan'),
				'efek_samping' => $this->input->post('efek_samping'),
				'komplikasi' => $this->input->post('komplikasi'), 
				'alat_kontrasepsi' => $this->input->post('alat_kontrasepsi'), 
				'tindakan_dokter' => $this->input->post('tindakan_dokter'),  
				'tanggal_kembali' => $this->input->post('tanggal_kembali'), 
				'total_akhir' =>$this->uri->segment(3),

			);


			$this->db->set($data_rekam_edit); 
			$this->db->where('kode_kb',$kode_kb); 
			$result= $this->db->update('tbl_kb'); 
			if ($result) {
				$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Mengubah Data Pemeriksaan KB dengan Kode ".$kode_kb, 
				);

				$this->db->insert('tbl_history', $data_history); 

				$this->db->insert('tbl_history', $data_history); 

				$data['title'] = 'Berhasil';
				$data['text'] = 'Data Berhasil di Ubah';
				$data['icon'] = 'success';

			}else{
				$data['title'] = 'Gagal';
				$data['text'] = 'Data Gagal di Ubah';
				$data['icon'] = 'success';
			}


			$this->session->set_flashdata($data); 
			redirect('rekam_kb','refresh');
		}

		public function detail_kb($kode)
		{
			$kode_kb = $this->uri->slash_segment(3).$this->uri->segment(4); 
			$data['detail_kb'] = $this->model_rekam_kb->detail_rekam_kb($kode_kb);
			$data['list_obat'] = $this->model_rekam_kb->list_obat($kode_kb)	;
			$data['detail_obat'] = $this->model_rekam_kb->detail_obat($kode_kb)	;
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('rekam_kb/detail_rekam_kb',$data);
			$this->load->view('template/footer');
		}

		public function hapus_datakb()
		{
			$kode_kb=$this->input->post('kode_kb');
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Membatalkan Pemeriksaan KB dengan Kode ".$kode_kb, 
			);

			$this->db->insert('tbl_history', $data_history); 

			$data=$this->model_rekam_kb->hapus_aksi_kb($kode_kb);
			echo json_encode($data);
		}

	}
