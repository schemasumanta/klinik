<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nifas extends CI_Controller {
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
			'aktivitas' => "Melihat Data Nifas", 
		);
		
		$this->db->insert('tbl_history', $data_history); 

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('nifas/tampilan_nifas');
		$this->load->view('template/footer');
	}

	public function tampildata_nifas()
	{
		$data = $this->model_nifas->tampil_data_nifas();
		echo json_encode($data);  
	}

	public function tampildata_nifas1()
	{
		$data = $this->model_nifas->tampil_data_nifas1();
		echo json_encode($data); 
	}

	public function ambil_data_nifas_satu()
	{
		/*Menagkap semua data yang dikirimkan oleh client*/
		/*Sebagai token yang yang dikrimkan oleh client, dan nantinya akan
		server kirimkan balik. Gunanya untuk memastikan bahwa user mengklik paging
		sesuai dengan urutan yang sebenarnya */
		$draw=$_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length=$_REQUEST['length'];
		/*Offset yang akan digunakan untuk memberitahu database
		dari baris mana data yang harus ditampilkan untuk masing masing page
		*/
		$start=$_REQUEST['start'];
		/*Keyword yang diketikan oleh user pada field pencarian*/
		$search=$_REQUEST['search']["value"];
		/*Menghitung total desa didalam database*/
		$umum=$this->db->count_all_results("tbl_nifas");
		/*Mempersiapkan array tempat kita akan menampung semua data
		yang nantinya akan server kirimkan ke client*/
		$output=array();
		/*Token yang dikrimkan client, akan dikirim balik ke client*/
		$output['draw']=$draw;
		/*
		$output['recordsTotal'] adalah total data sebelum difilter
		$output['recordsFiltered'] adalah total data ketika difilter
		Biasanya kedua duanya bernilai sama, maka kita assignment 
		keduaduanya dengan nilai dari $umum
		*/


		/*disini nantinya akan memuat data yang akan kita tampilkan 
		pada table client*/
		$output['data']=array();
		/*Jika $search mengandung nilai, berarti user sedang telah 
		memasukan keyword didalam filed pencarian*/
		if($search!=""){
			$this->db->where('status_pasien','Belum Diperiksa');
			$this->db->like("nama_pasien",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("tanggal_berobat",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);
		/*Urutkan dari kode paling terkahir*/
		$sortdata = $this->uri->segment(3);
		$filterdata = $this->uri->segment(4);
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('kode_nifas','DESC');
		}
		$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_nifas.kode_pasien');
		$this->db->where('status_pasien','Belum Diperiksa');
		$query= $this->db->get('tbl_nifas');
		$output['recordsTotal']= $output['recordsFiltered']=$query->num_rows();
		/*Ketika dalam mode pencarian, berarti kita harus
		'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
		yang mengandung keyword tertentu
		*/
		if($search!=""){
			$this->db->where('status_pasien','Belum Diperiksa');
			$this->db->like("nama_pasien",$search);
			$this->db->or_like("no_registrasi",$search);
			$this->db->or_like("tanggal_berobat",$search);
			$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_nifas.kode_pasien');
			$jum=$this->db->get('tbl_nifas');
			$output['recordsTotal']= $output['recordsFiltered']=$jum->num_rows();
		}


		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekam_nifas) {

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 
			<a href="javascript:;" class="btn btn-sm btn-success btn-flat periksa_pasien_nifas" data="'.$rekam_nifas['kode_nifas'].'">  Periksa Pasien </a> ';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus" data="'.$rekam_nifas['kode_nifas'].'">  <i class="fas fa-trash"></i></a>';  
			}
			$opsi.='</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekam_nifas['no_registrasi'],
				// $rekam_anc['kode_rekam'],
				$rekam_nifas['nama_pasien'],
				$rekam_nifas['tanggal_berobat'],
				$rekam_nifas['status_pasien'],
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	}

	public function ambil_data_nifas_dua()
	{
		/*Menagkap semua data yang dikirimkan oleh client*/
		/*Sebagai token yang yang dikrimkan oleh client, dan nantinya akan
		server kirimkan balik. Gunanya untuk memastikan bahwa user mengklik paging
		sesuai dengan urutan yang sebenarnya */
		$draw=$_REQUEST['draw'];

		/*Jumlah baris yang akan ditampilkan pada setiap page*/
		$length=$_REQUEST['length'];
		/*Offset yang akan digunakan untuk memberitahu database
		dari baris mana data yang harus ditampilkan untuk masing masing page
		*/
		$start=$_REQUEST['start'];
		/*Keyword yang diketikan oleh user pada field pencarian*/
		$search=$_REQUEST['search']["value"];
		/*Menghitung total desa didalam database*/
		$umum=$this->db->count_all_results("tbl_nifas");
		/*Mempersiapkan array tempat kita akan menampung semua data
		yang nantinya akan server kirimkan ke client*/
		$output=array();
		/*Token yang dikrimkan client, akan dikirim balik ke client*/
		$output['draw']=$draw;
		/*
		$output['recordsTotal'] adalah total data sebelum difilter
		$output['recordsFiltered'] adalah total data ketika difilter
		Biasanya kedua duanya bernilai sama, maka kita assignment 
		keduaduanya dengan nilai dari $umum
		*/


		/*disini nantinya akan memuat data yang akan kita tampilkan 
		pada table client*/
		$output['data']=array();
		/*Jika $search mengandung nilai, berarti user sedang telah 
		memasukan keyword didalam filed pencarian*/
		if($search!=""){
			$this->db->where('status_pasien','Sudah Diperiksa');
			$this->db->like("kode_nifas",$search);
			$this->db->like("nama_pasien",$search);
			$this->db->like("status_pasien",$search);
			$this->db->or_like("dokter_pemeriksa",$search);
			$this->db->or_like("tanggal_periksa",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);
		/*Urutkan dari kode paling terkahir*/
		$sortdata = $this->uri->segment(3);
		$filterdata = $this->uri->segment(4);
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('id','DESC');
		}
		$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_nifas.kode_pasien');
		$this->db->where('status_pasien','Sudah Diperiksa');
		$query= $this->db->get('tbl_nifas');
		$output['recordsTotal']= $output['recordsFiltered']=$query->num_rows();
		/*Ketika dalam mode pencarian, berarti kita harus
		'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
		yang mengandung keyword tertentu
		*/
		if($search!=""){
			$this->db->where('status_pasien','Sudah Diperiksa');
			$this->db->like("kode_nifas",$search);
			$this->db->like("nama_pasien",$search);
			$this->db->like("status_pasien",$search);
			$this->db->or_like("dokter_pemeriksa",$search);
			$this->db->or_like("tanggal_periksa",$search);
			$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_nifas.kode_pasien');
			$jum=$this->db->get('tbl_nifas');
			$output['recordsTotal']= $output['recordsFiltered']=$jum->num_rows();
		}


		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekam_nifas_dua) {

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 

			<a href="#" class="btn btn-success btn-sm  btn-flat item_detail_nifas "style="font-weight: bold;" data="'.$rekam_nifas_dua['kode_nifas'].'" > <i class="fa fa-eye"></i> </a>  
			<a href="#" class="btn btn-secondary btn-sm  btn-flat item_edit_nifas "style="font-weight: bold;" data="'.$rekam_nifas_dua['kode_nifas'].'" > <i class="fa fa-edit"></i>  Edit Data</a>

			</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekam_nifas_dua['kode_nifas'],
				$rekam_nifas_dua['nama_pasien'],
				$rekam_nifas_dua['status_pasien'],
				$rekam_nifas_dua['dokter_pemeriksa'],
				$rekam_nifas_dua['tanggal_periksa'], 
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	}

	public function periksa_pasien_nifas($kode)
	{
		$kode_nifas = str_replace('garing','/',$kode);
		$data['periksa_nifas'] =$this->model_nifas->periksa_pasien_nifas($kode_nifas);
		$data['obat'] = $this->model_nifas->getnamaobat(); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('nifas/periksa_nifas',$data);
		$this->load->view('template/footer');
	}

	public function riwayat_rekam_nifas()
	{


		$kode_pasien =$this->input->get('kode_pasien');
		

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Riwayat Pemeriksaan Nifas Pasien ".$kode_pasien, 
		);
		
		$this->db->insert('tbl_history', $data_history); 


		$kategori =$this->input->get('kategori');
		if ($kategori=='nifas') {
			$hasil = $this->model_nifas->getriwayatnifas($kode_pasien);
		} 
		$data['riwayat']='';
		$data['list']='';
		$i=0;

		foreach ($hasil as $key) {
			
			$data['riwayat'].='<tr style="text-align:center" class="head_riwayat'.$i.'">'.
			'<td class="riwayat riwayat'.$i.'" data="'.$i.'" onclick="showdetail('.$i.')"><i class="fa fa-eye text-dark"></i></td>'.
			// '<td>'.$key->kode_nifas.'</td>'.
			'<td id="kode_nifas'.$i.'">'.$key->kode_nifas.'</td>'.
			'<td>'.$key->tanggal_berobat.'</td>'.
			'<td>'.$key->tanggal_periksa.'</td>'.
			'</tr>'; 
			$i++;}

			echo json_encode($data);
		}


		public function detail_riwayat($kode)
		{
			$kode_nifas = str_replace('garing','/',$kode);  
			$data['detail_rekam_pasien_nifas'] = $this->model_nifas->detail_rekam_nifas($kode_nifas);
			$data['detail_obat'] = $this->model_nifas->detail_obat($kode_nifas)	;
			$this->load->view('nifas/detail_riwayat_nifas',$data);
		}
		public function simpanrekam_nifas()
		{
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper('url');

			$kode_nifas = $this->input->post('kode_nifas');   
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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_nifas,
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
									'kode_rekam' => $kode_nifas,
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
									'kode_rekam' => $kode_nifas,
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

			$data_rekam_nifas= array(
				'status_pasien' =>'Sudah Diperiksa',
				'tanggal_periksa' =>$this->input->post('tanggal_periksa'),
				'suhu' => $this->input->post('suhu'),
				'tensi_darah' => $this->input->post('tensi_darah'),
				'pernapasan' => $this->input->post('pernapasan'),
				'saturasi' => $this->input->post('saturasi'),
				'nadi' => $this->input->post('nadi'), 
				'bb' => $this->input->post('bb'),
				'tb' => $this->input->post('tb'),

				'kunjungan' => $this->input->post('kunjungan'),
				'subjektif' => $this->input->post('subjektif'),
				'keadaan_umum' => $this->input->post('keadaan_umum'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tekanan_darah' => $this->input->post('tekanan_darah'),
				// 'nadi' => $this->input->post('nadi'),
				'respirasi' => $this->input->post('respirasi'), 
				'suhu' => $this->input->post('suhu'), 
				'payudara' => $this->input->post('payudara'), 
				'asi' => $this->input->post('asi'), 
				'tfu' => $this->input->post('tfu'), 
				'kotraksi' => $this->input->post('kotraksi'), 	
				'pendarahan' => $this->input->post('pendarahan'), 
				'lokhea' => $this->input->post('lokhea'), 
				'perineum' => $this->input->post('perineum'), 
				'kandungan_kemih' => $this->input->post('kandungan_kemih'), 
				'oedema' => $this->input->post('oedema'), 
				'assesment' => $this->input->post('assesment'), 
				'plening' => $this->input->post('plening'), 
				'tindakan_dokter' => $this->input->post('tindakan_dokter'), 
				'total_akhir' =>$this->uri->segment(3),
				'dokter_pemeriksa' => $this->session->nama_admin,
				'upah_dokter' => $this->session->tarif_dokter, 
			);

		// var_dump($data_rekam_nifas);
		// exit();
// $tanggal_periksa = date("Y-m-d H:i:s");

			$this->db->set($data_rekam_nifas); 
			$this->db->where('kode_nifas',$kode_nifas); 
			$result= $this->db->update('tbl_nifas'); 
			if ($result) {
				$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
				$tanggal_periksa = date("Y-m-d H:i:s");


				$data_pembayaran = array(
					'kode_pembayaran' => $kode_pembayaran, 
					'kode_pasien' => $kode_pasien, 
					'kode_rekam' => $kode_nifas, 
					'tanggal_pembayaran' => $tanggal_periksa,
					'dokter_pemeriksa' => $this->session->nama_admin, 
					'status_pembayaran' => 'Menunggu Pembayaran');

				$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
				if ($simpan_pembayaran) {

					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Melakukan Pemeriksaan Nifas Pasien ".$kode_pasien." dengan Kode ".$kode_nifas, 
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
			redirect('nifas','refresh');
		}

		public function item_detail_nifas($kode)
		{
			$kode_nifas = str_replace('garing','/',$kode);  

			$data['detail_rekam_pasien_nifas'] = $this->model_nifas->detail_rekam_nifas($kode_nifas);
			$data['detail_obat'] = $this->model_nifas->detail_obat($kode_nifas)	;

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('nifas/detail_rekam_nifas',$data);
			$this->load->view('template/footer');
		}


		public function item_edit_nifas()
		{
			$kode_nifas = str_replace('garing','/',$this->uri->segment(3));  

			$data['edit_rekam_nifas'] = $this->model_nifas->edit_rekam_pasien_nifas($kode_nifas); 
			$data['detail_obat'] = $this->model_nifas->detail_obat($kode_nifas);
			$data['obat'] = $this->model_nifas->getnamaobat(); 


			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('nifas/edit_rekam_nifas',$data);
			$this->load->view('template/footer');
		}

		public function updaterekam_nifas()
		{
			$this->load->helper('url');

			$kode_nifas = $this->input->post('kode_nifas');   
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

			// get sub obat sebelumnya
				$this->db->where('kode_rekam', $kode_nifas);
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
								'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_nifas,
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
							'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_nifas,
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
											'kode_rekam' => $kode_nifas,
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
											'kode_rekam' => $kode_nifas,
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

				'kunjungan' => $this->input->post('kunjungan'),
				'subjektif' => $this->input->post('subjektif'),
				'keadaan_umum' => $this->input->post('keadaan_umum'),
				'kesadaran' => $this->input->post('kesadaran'),

				'suhu' => $this->input->post('suhu'),
				'tensi_darah' => $this->input->post('tensi_darah'),
				'pernapasan' => $this->input->post('pernapasan'),
				'saturasi' => $this->input->post('saturasi'),
				'nadi' => $this->input->post('nadi'), 
				'bb' => $this->input->post('bb'),
				'tb' => $this->input->post('tb'),

				'tekanan_darah' => $this->input->post('tekanan_darah'),
				// 'nadi' => $this->input->post('nadi'),
				'respirasi' => $this->input->post('respirasi'), 
				// 'suhu' => $this->input->post('suhu'), 
				'payudara' => $this->input->post('payudara'), 
				'asi' => $this->input->post('asi'), 
				'tfu' => $this->input->post('tfu'), 
				'kotraksi' => $this->input->post('kotraksi'), 	
				'pendarahan' => $this->input->post('pendarahan'), 
				'lokhea' => $this->input->post('lokhea'), 
				'perineum' => $this->input->post('perineum'), 
				'kandungan_kemih' => $this->input->post('kandungan_kemih'), 
				'oedema' => $this->input->post('oedema'), 
				'assesment' => $this->input->post('assesment'), 
				'plening' => $this->input->post('plening'),  
				'tindakan_dokter' => $this->input->post('tindakan_dokter'),  
				'total_akhir' =>$this->uri->segment(3),
			);

			$this->db->set($data_rekam_edit); 
			$this->db->where('kode_nifas',$kode_nifas); 
			$result= $this->db->update('tbl_nifas'); 
			if ($result) {

				$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Mengubah Data Pemeriksaan Nifas Pasien ".$kode_pasien." dengan Kode ".$kode_nifas, 
				);

				$this->db->insert('tbl_history', $data_history); 
				echo "<script type='text/javascript'>alert('Data berhasil di Update');</script>";
				redirect('nifas','refresh');

				$data['title'] = 'Berhasil';
				$data['text'] = 'Data Berhasil di Ubah';
				$data['icon'] = 'success';

			}else{
				$data['title'] = 'Gagal';
				$data['text'] = 'Data Gagal di Ubah';
				$data['icon'] = 'success';
			}
			$this->session->set_flashdata($data); 
			redirect('nifas','refresh');
		}

		public function hapus_datanifas()
		{
			$kode_nifas=$this->input->post('kode_nifas');
			$data=$this->model_nifas->hapus_aksi_nifas($kode_nifas);

			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menghapus Data Pemeriksaan Nifas dengan Kode ".$kode_nifas, 
			);
			$this->db->insert('tbl_history', $data_history); 
			echo json_encode($data);
		}
	}
