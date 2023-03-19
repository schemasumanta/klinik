<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periksa_homecase extends CI_Controller {
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
			'aktivitas' => "Mengakses Menu Homecare",
		);
		
		$this->db->insert('tbl_history', $data_history);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/tampilan_rawat_inap');
		$this->load->view('template/footer');
	}
	public function hapus_ranap()
	{

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
		$this->db->where('kode_observasi',$this->input->post('kode_observasi'));
		$this->db->delete('tbl_observasi_ranap');

		$this->db->where('kode_rekam',"OBS-RANAP-".$this->input->post('kode_observasi'));
		$this->db->delete('tbl_sub_obat');

		echo json_encode(1);
	}

	public function edit_observasi()
	{
		$kode_observasi = $this->uri->segment(3);
		$kode_ranap =$this->uri->slash_segment(4).$this->uri->segment(5);
		$data['observasi'] = $this->Model_periksa_homecare->get_detail_observasi($kode_observasi);
		$data['list_obat'] = $this->Model_periksa_homecare->get_obat_observasi($kode_observasi);
		$data['obat'] = $this->Model_periksa_homecare->getnamaobat();
		$data['periksa_ranap'] =$this->Model_periksa_homecare->observasi_ranap($kode_ranap); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/edit_observasi_pasien_ranap',$data);
		$this->load->view('template/footer');
	}

	public function update_status_pasien()
	{
		$status_pasien = $this->input->post('status_pasien');
		$data = array('status_pasien' => $status_pasien, );
		$this->db->set($data);
		$this->db->where('kode_ranap',$this->input->post('kode_ranap'));
		$this->db->update('tbl_ranap');

		if ($status_pasien=="Sudah Pulang") {
			$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
			$tanggal_periksa =    date("Y-m-d H:i:s");
			$data_pembayaran = array(
				'kode_pembayaran' => $kode_pembayaran, 
				'kode_pasien' => $this->input->post('kode_pasien'), 
				'kode_rekam' => $this->input->post('kode_ranap'), 
				'tanggal_pembayaran' => $tanggal_periksa,
				'dokter_pemeriksa' => $this->session->nama_admin, 
				'status_pembayaran' => 'Menunggu Pembayaran');
			$this->db->insert('tbl_pembayaran',$data_pembayaran); 
		}
		$msg = "Update Status Berhasil";
		echo json_encode($msg);
		
	}
	public function simpan_observasi()
	{
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
		$waktu = strval('assets\img\ttd_app\gambar_observasi'.time().'.png');
		file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd_pasien') ) ) );

		$upah_dokter = $this->input->post('tarif_dokter');
		$upah_lama =0;
		$this->db->select('upah_dokter');
		$this->db->where('kode_ranap',$kode_ranap);
		$upah = $this->db->get('tbl_ranap')->result();
		foreach ($upah as $tarif) {
			$upah_lama = $tarif->upah_dokter !='' ? $tarif->upah_dokter:0;
		}

		if ($upah_dokter!='') {
			$upah_dokter += floatval($upah_lama);
		}else{
			$upah_dokter = $upah_lama;
		}
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
			'ttd_pemeriksa' 		=> $this->session->ttd, 
			'ttd_pasien'	 		=> strval($waktu),  


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
				'tanggal_periksa' 	=> $this->input->post('tanggal_periksa'),
				'upah_dokter'	 	=> $upah_dokter,  

			);
			$this->db->where('kode_ranap',$kode_ranap);
			$this->db->set($data_update);

			$this->db->update('tbl_ranap');

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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_ranap,
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

							// kalau stok di expired lebih kecil
								// simpan sub obat

								$data = array(
									'kode_rekam' => $kode_ranap,
									'kode_obat' => $kode_obat,  				
									'qty' => $exp->qty,									
									'harga_obat' => $jual,
									'subtotal' => floatval($exp->qty)*floatval($jual),
									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
									'tanggal_expired'=>$exp->tanggal_expired,
								); 

								$this->db->insert('tbl_sub_obat', $data);

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
			$data['title'] = 'Berhasil';
			$data['text'] = 'Data Berhasil di Simpan';
			$data['icon'] = 'success';

		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Data Gagal di Simpan';
			$data['icon'] = 'success';
		}

		$this->session->set_flashdata($data); 
		redirect('homecare','refresh');
	}

	public function update_observasi()
	{
		$kode_observasi = $this->input->post('kode_observasi_edit');
		$ttd_pasien = $this->input->post('isi_ttd_pasien');
		if (strpos($ttd_pasien,'data:image')!==false) {
			$waktu = strval('assets\img\ttd_app\gambar_observasi'.time().'.png');
			file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$ttd_pasien) ) );

		}else{
			$waktu = $ttd_pasien;
		}
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
			'ttd_pemeriksa' 		=> $this->session->ttd, 
			'ttd_pasien'	 		=> strval($waktu),  

		);
		$this->db->where('kode_observasi',$kode_observasi);
		$this->db->set($data_observasi);
		$result = $this->db->update('tbl_observasi_ranap');
		if ($result) {

			$data_update  = array(
				'tanggal_periksa' => $this->input->post('tanggal_periksa'),
			);
			$this->db->where('kode_ranap',$kode_ranap);
			$this->db->set($data_update);

			$this->db->update('tbl_ranap');

			$this->db->where('kode_rekam','OBS-RANAP-'.$kode_observasi);
			$data_obat = $this->db->get('tbl_sub_obat')->result();
			foreach ($data_obat as $obt) {

				// balikan stok
				$stok_sebelumnya = $this->Model_periksa_homecare->lihat_stok($obt->kode_obat);
				$data_balik_stok = array(
					'total_stok' => floatval($stok_sebelumnya)+floatval($obt->qty), 
				);
				$this->db->set($data_balik_stok);
				$this->db->where('kode_obat',$obt->kode_obat);
				$this->db->update('tbl_satuan_obat');
			}

			// hapus obat sebelumnya
			$this->db->where('kode_rekam','OBS-RANAP-'.$kode_observasi);
			$this->db->delete('tbl_sub_obat');

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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_ranap,
					);
					$this->db->insert('tbl_log_stok_obat',$data_log_stok);
					$jual = str_replace('.', '', $harga_jual[$i]);

					$data = array(
						'kode_rekam' => "OBS-RANAP-".$kode_observasi,
						'kode_obat' => $kode_obat,  				
						'qty' => 	$kuantiti, 			
						'subtotal' => floatval($kuantiti)*floatval($jual),
						'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 	
					); 

					$this->db->insert('tbl_sub_obat', $data);

				} 



			}
			echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
			redirect('ranap','refresh');
		}
	}


	public function tampildata_ranap()
	{
		$data = $this->Model_periksa_homecare->tampil_data_ranap(); 
		echo json_encode($data);  
	} 

	public function ambil_data_belum_periksa(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];

		$total=$this->db->count_all_results("tbl_ranap");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
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
		$this->db->where('status_pasien','Belum Diperiksa');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_ranap.kode_pasien');

		$query = $this->db->get('tbl_ranap');
		if($search!=""){
			$this->db->where('status_pasien','Belum Diperiksa');
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
			'<a href="'.base_url().'ranap/consent/'.$list['kode_ranap'].'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$list['kode_ranap'].'" > Informed Consent</a>'.
			'<a href="'.base_url().'ranap/observasi/'.$list['kode_ranap'].'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$list['kode_ranap'].'"> Observasi Pasien</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$list['kode_ranap'].'"><i class="fa fa-trash"></i></a>';
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

		$total=$this->db->count_all_results("tbl_ranap");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
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
			'<a href="'.base_url().'ranap/consent/'.$list['kode_ranap'].'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$list['kode_ranap'].'" > Informed Consent</a>'.
			'<a href="'.base_url().'ranap/observasi/'.$list['kode_ranap'].'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$list['kode_ranap'].'">Pemeriksaan Kembali</a>'.
			'<a href="javascript:;" class="btn btn-dark btn-flat btn-sm item_list_observasi" style="font-weight: bold;" data="'.$list['kode_ranap'].'"><i class="fas fa-tasks mr-2"></i>List Observasi</a>'.
			'<a href="javascript:;" class="btn btn-info btn-flat btn-sm item_status_ranap"style="font-weight: bold;" data="'.$list['kode_ranap'].'" data-status="'.$list['status_pasien'].'" data-pasien="'.$list['kode_pasien'].'">Status Pasien</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$list['kode_ranap'].'"><i class="fa fa-trash"></i></a>';
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

	public function ambil_data_selesai_periksa(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];

		$total=$this->db->count_all_results("tbl_ranap");

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		$this->db->where('status_pasien','Sudah Pulang');
		$this->db->join('tbl_pasien','tbl_pasien.kode_pasien = tbl_ranap.kode_pasien');
		if($search!=""){
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


		$query = $this->db->get('tbl_ranap');
		if($search!=""){
			$this->db->where('status_pasien','Sudah Pulang');
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
			'<a href="'.base_url().'ranap/consent/'.$list['kode_ranap'].'" class="btn btn-success btn-flat btn-sm" style="font-weight: bold;" data="'.$list['kode_ranap'].'" > Informed Consent</a>'.
			'<a href="'.base_url().'ranap/list_observasi/'.$list['kode_ranap'].'" class="btn btn-primary btn-flat btn-sm   "style="font-weight: bold;" data="'.$list['kode_ranap'].'"><i class="fa fa-eye mr-2"></i>Lembar Observasi</a>';
			if ($this->session->level=="superadmin") {
			$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus" data="'.$list['kode_ranap'].'"><i class="fa fa-trash"></i></a>';
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

	public function list_observasi()
	{
		$kode_ranap = $this->input->get('kode_ranap');
		$data = $this->Model_periksa_homecare->get_list_observasi($kode_ranap);
		echo json_encode($data);
	}
	public function detail_observasi()
	{
		$kode_observasi = $this->input->get('kode_observasi');
		$data['observasi'] = $this->Model_periksa_homecare->get_detail_observasi($kode_observasi);
		$data['obat'] = $this->Model_periksa_homecare->get_obat_observasi($kode_observasi);

		echo json_encode($data);
	}
	public function observasi()
	{
		$kode_ranap =$this->uri->slash_segment(3).$this->uri->segment(4);
		$data['periksa_ranap'] =$this->Model_periksa_homecare->observasi_ranap($kode_ranap);
		$data['obat'] = $this->Model_periksa_homecare->getnamaobat(); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/observasi_pasien_ranap',$data);
		$this->load->view('template/footer');
	}

	public function periksa_kembali()
	{
		$kode_ranap =$this->uri->slash_segment(3).$this->uri->segment(4);
		$data['periksa_kembali'] =$this->Model_periksa_homecare->periksa_kembali($kode_ranap);
		$data['observasi'] =$this->Model_periksa_homecare->observasi($kode_ranap);
		// var_dump($data['observasi']);
		// exit();
		$data['obat'] = $this->Model_periksa_homecare->getnamaobat();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/periksa_kembali_pasein',$data);
		$this->load->view('template/footer');
	}

	public function consent($kode)
	{
		$kode_ranap =$this->uri->slash_segment(3).$this->uri->segment(4);
		$data['consent_pasien'] = $this->Model_periksa_homecare->consent_ranap($kode_ranap); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('ranap/informed_consent',$data);
	}

}
