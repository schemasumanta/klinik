<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bbl extends CI_Controller {
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
			'aktivitas' => "Melihat Data BBL", 
		);
		$this->db->insert('tbl_history', $data_history);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('bbl/tampilan_bbl');
		$this->load->view('template/footer');

	}

	public function tampildata_bbl()
	{
		$data = $this->model_bbl->tampil_data_bbl(); 
		echo json_encode($data);  
	}

	public function tampildata_bbl1()
	{
		$data = $this->model_bbl->tampil_data_bbl1(); 
		echo json_encode($data);
	}

	public function ambil_data_bblsatu()
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
		$umum=$this->db->count_all_results("tbl_bbl");
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
			$this->db->order_by('kode_bbl','DESC');
		}
		$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_bbl.kode_pasien');
		$this->db->where('status_pasien','Belum Diperiksa');
		$query= $this->db->get('tbl_bbl');
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
			$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_bbl.kode_pasien');
			$jum=$this->db->get('tbl_bbl');
			$output['recordsTotal']= $output['recordsFiltered']=$jum->num_rows();
		}


		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekam_bbl) {

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 
			<a href="javascript:;" class="btn btn-sm btn-success btn-flat periksa_pasien_bbl" data="'.$rekam_bbl['kode_bbl'].'"> Periksa Pasien</a>';
			if ($this->session->level=="superadmin") {   
			$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus" data="'.$rekam_bbl['kode_bbl'].'">  <i class="fas fa-trash"></i> </a>  ';
		}
			$opsi.='</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekam_bbl['no_registrasi'],
				// $rekam_bbl['kode_bbl'],
				$rekam_bbl['nama_pasien'],
				$rekam_bbl['tanggal_berobat'],
				$rekam_bbl['status_pasien'],
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	}


	public function ambil_data_bbldua()
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
		$umum=$this->db->count_all_results("tbl_bbl");
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
			$this->db->like("kode_bbl",$search);
			$this->db->or_like("nama_pasien",$search); 
			$this->db->or_like("tanggal_periksa",$search); 
			$this->db->or_like("dokter_pemeriksa",$search); 
			$this->db->or_like("status_pasien",$search); 
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
		$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_bbl.kode_pasien');
		$this->db->where('status_pasien','Sudah Diperiksa');
		$query= $this->db->get('tbl_bbl');
		$output['recordsTotal']= $output['recordsFiltered']=$query->num_rows();
		/*Ketika dalam mode pencarian, berarti kita harus
		'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
		yang mengandung keyword tertentu
		*/
		if($search!=""){
			$this->db->where('status_pasien','Sudah Diperiksa');
			$this->db->like("kode_bbl",$search);
			$this->db->or_like("nama_pasien",$search); 
			$this->db->or_like("tanggal_periksa",$search); 
			$this->db->or_like("dokter_pemeriksa",$search); 
			$this->db->or_like("status_pasien",$search); 
			$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_bbl.kode_pasien');
			$jum=$this->db->get('tbl_bbl');
			$output['recordsTotal']= $output['recordsFiltered']=$jum->num_rows();
		}


		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekam_bbl_dua) {

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 
			<a href="javascript:;" class="btn btn-sm btn-success btn-flat item_detail_bbl" data="'.$rekam_bbl_dua['kode_bbl'].'">  <i class="fa fa-eye"></i> Detail</a>   
			<a href="javascript:;" class="btn btn-sm btn-secondary btn-flat item_edit_bbl" data="'.$rekam_bbl_dua['kode_bbl'].'"><i class="fa fa-edit"></i>  Edit Rekam</a>  
			</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekam_bbl_dua['kode_bbl'],
				$rekam_bbl_dua['nama_pasien'],
				$rekam_bbl_dua['tanggal_periksa'],
				$rekam_bbl_dua['dokter_pemeriksa'],
				$rekam_bbl_dua['status_pasien'],
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	}


	public function riwayat_rekam_bbl()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Riwayat Rekam Data BBL Pasien ".$this->input->get('kode_pasien'), 
		);
		$this->db->insert('tbl_history', $data_history);

		$kode_pasien =$this->input->get('kode_pasien');
		$kategori =$this->input->get('kategori');
		if ($kategori=='bbl') {
			$hasil = $this->model_bbl->getriwayatbbl($kode_pasien);
		} 
		$data['riwayat']='';
		$data['list']='';
		$i=0;

		foreach ($hasil as $key) {
			
			$data['riwayat'].='<tr style="text-align:center" class="head_riwayat'.$i.'">'.
			'<td class="riwayat riwayat'.$i.'" data="'.$i.'" onclick="showdetail('.$i.')"><i class="fa fa-eye text-dark"></i></td>'.
			// '<td>'.$key->kode_bbl.'</td>'.
			'<td id="kode_bbl'.$i.'">'.$key->kode_bbl.'</td>'.
			'<td>'.$key->tanggal_berobat.'</td>'.
			'<td>'.$key->tanggal_periksa.'</td>'.
			'</tr>'; 
			$i++;}

			echo json_encode($data);
		}

		public function detail_riwayat($kode)
		{
			$kode_bbl = str_replace('garing','/',$kode);  
			$data['detail_rekam_pasien_bbl'] = $this->model_bbl->detail_rekam_bbl($kode_bbl);
			$data['detail_obat'] = $this->model_bbl->detail_obat($kode_bbl)	;
			$this->load->view('bbl/detail_riwayat_bbl',$data);
		}

		public function periksa_pasien_bbl($kode)
		{
			$kode_bbl = str_replace('garing','/',$kode);
			$data['periksa_bbl'] =$this->model_bbl->periksa_pasien_bbl($kode_bbl);
			$data['obat'] = $this->model_bbl->getnamaobat(); 
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('bbl/periksa_bbl',$data);
			$this->load->view('template/footer');

		}

		public function detail_bbl($kode)
		{
			$kode_bbl = str_replace('garing','/',$kode);  
			$data['detail_rekam_pasien_bbl'] = $this->model_bbl->detail_rekam_bbl($kode_bbl);
			$data['detail_obat'] = $this->model_bbl->detail_obat($kode_bbl)	;
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('bbl/detail_rekam_bbl',$data);
			$this->load->view('template/footer');
		}

		public function simpanrekam_bbl()
		{
			date_default_timezone_set('Asia/Jakarta');
			$this->load->helper('url');

			$kode_bbl = $this->input->post('kode_bbl');  

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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_bbl,
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
									'kode_rekam' => $kode_bbl,
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
									'kode_rekam' => $kode_bbl,
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

			$data_rekam_bbl= array(
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
				'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
				'subjektif' => $this->input->post('subjektif'),
				'objektif' => $this->input->post('objektif'),
				'ttv' => $this->input->post('ttv'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tonus_otot' => $this->input->post('tonus_otot'),
				'kulit' => $this->input->post('kulit'),
				'respirasi' => $this->input->post('respirasi'),
				'detak_jantung' => $this->input->post('detak_jantung'), 
				// 'suhu' =>$this->input->post('suhu'),
				'kepala' =>$this->input->post('kepala'), 
				'mulut' => $this->input->post('mulut'),
				'mata' => $this->input->post('mata'),
				'perut_telinga_pusat' => $this->input->post('perut_telinga_pusat'),
				'punggung' => $this->input->post('punggung'),
				'lubang_anus' => $this->input->post('lubang_anus'),
				'alat_kelamin' => $this->input->post('alat_kelamin'),
				// 'bb' => $this->input->post('bb'),
				'pb' => $this->input->post('pb'),
				'lingkar_kepala' => $this->input->post('lingkar_kepala'),
				'lingkar_dada' => $this->input->post('lingkar_dada'),
				'refleks' => $this->input->post('refleks'),
				'r_rooting' => $this->input->post('r_rooting'),
				'r_swalilong' => $this->input->post('r_swalilong'),
				'r_eyeblink' => $this->input->post('r_eyeblink'),
				'r_graps' => $this->input->post('r_graps'),
				'r_moro' => $this->input->post('r_moro'),
				'r_babinski' => $this->input->post('r_babinski'),
				'r_tonic_neck' => $this->input->post('r_tonic_neck'),
				'r_labirin' => $this->input->post('r_labirin'),
				'assesment' => $this->input->post('assesment'),
				'planning' => $this->input->post('planning'),
				'inisial_menyusui' => $this->input->post('inisial_menyusui'),
				'jaga_bayi_tetap_hangat' => $this->input->post('jaga_bayi_tetap_hangat'),
				'kringkan_bayi' => $this->input->post('kringkan_bayi'),
				'salep_mata_antibiotik' => $this->input->post('salep_mata_antibiotik'),
				'suntik_neo' => $this->input->post('suntik_neo'),
				'imunisasi_hbo' => $this->input->post('imunisasi_hbo'),
				'rawat_gabung' => $this->input->post('rawat_gabung'),
				'memandikan_bayi' => $this->input->post('memandikan_bayi'),
				'konseling_menyusui' => $this->input->post('konseling_menyusui'),
				'tanda_tanda_bahaya' => $this->input->post('tanda_tanda_bahaya'),
				'penjelasan' => $this->input->post('penjelasan'),
				'catatan_medis' => $this->input->post('catatan_medis'), 
				'tindakan_dokter' => $this->input->post('tindakan_dokter'), 

				'total_akhir' =>$this->uri->segment(3),
				'dokter_pemeriksa' => $this->session->nama_admin,
				'upah_dokter' => $this->session->tarif_dokter
			);
// var_dump($data_rekam_bbl);
// 		exit(); 

// $tanggal_periksa = date("Y-m-d H:i:s");

			$this->db->set($data_rekam_bbl); 
			$this->db->where('kode_bbl',$kode_bbl); 
			$result= $this->db->update('tbl_bbl'); 
			if ($result) {
				$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
				$tanggal_periksa = date("Y-m-d H:i:s");


				$data_pembayaran = array(
					'kode_pembayaran' => $kode_pembayaran, 
					'kode_pasien' => $kode_pasien, 
					'kode_rekam' => $kode_bbl, 
					'tanggal_pembayaran' => $tanggal_periksa,
					'dokter_pemeriksa' => $this->session->nama_admin, 
					'status_pembayaran' => 'Menunggu Pembayaran');

				$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
				if ($simpan_pembayaran) {
					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Melakukan Pemeriksaan BBL Pasien ".$kode_pasien." dengan Kode ".$kode_bbl, 
					);
					$this->db->insert('tbl_history', $data_history);


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
			redirect('bbl','refresh');

		}

		public function edit_rekam_bbl()
		{
			$kode_bbl = str_replace('garing','/',$this->uri->segment(3));  

			$data['edit_rekam_bbl'] = $this->model_bbl->edit_rekam_pasien_bbl($kode_bbl);

			$data['detail_obat'] = $this->model_bbl->detail_obat($kode_bbl);
			$data['obat'] = $this->model_bbl->getnamaobat(); 


			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('bbl/edit_rekam_bbl',$data);
			$this->load->view('template/footer');
		}

		public function updaterekam_bbl()
		{
			$this->load->helper('url');

			$kode_bbl = $this->input->post('kode_bbl');   


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
				$this->db->where('kode_rekam', $kode_bbl);
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
								'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_bbl,
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
							'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_bbl,
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
											'kode_rekam' => $kode_bbl,
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
											'kode_rekam' => $kode_bbl,
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



			$data_rekam_edit_bbl= array(			

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
				'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
				'subjektif' => $this->input->post('subjektif'),
				'objektif' => $this->input->post('objektif'),
				'ttv' => $this->input->post('ttv'),
				'kesadaran' => $this->input->post('kesadaran'),
				'tonus_otot' => $this->input->post('tonus_otot'),
				'kulit' => $this->input->post('kulit'),
				'respirasi' => $this->input->post('respirasi'),
				'detak_jantung' => $this->input->post('detak_jantung'), 
				// 'suhu' =>$this->input->post('suhu'),
				'kepala' =>$this->input->post('kepala'), 
				'mulut' => $this->input->post('mulut'),
				'mata' => $this->input->post('mata'),
				'perut_telinga_pusat' => $this->input->post('perut_telinga_pusat'),
				'punggung' => $this->input->post('punggung'),
				'lubang_anus' => $this->input->post('lubang_anus'),
				'alat_kelamin' => $this->input->post('alat_kelamin'),
				// 'bb' => $this->input->post('bb'),
				'pb' => $this->input->post('pb'),
				'lingkar_kepala' => $this->input->post('lingkar_kepala'),
				'lingkar_dada' => $this->input->post('lingkar_dada'),
				'refleks' => $this->input->post('refleks'),
				'r_rooting' => $this->input->post('r_rooting'),
				'r_swalilong' => $this->input->post('r_swalilong'),
				'r_eyeblink' => $this->input->post('r_eyeblink'),
				'r_graps' => $this->input->post('r_graps'),
				'r_moro' => $this->input->post('r_moro'),
				'r_babinski' => $this->input->post('r_babinski'),
				'r_tonic_neck' => $this->input->post('r_tonic_neck'),
				'r_labirin' => $this->input->post('r_labirin'),
				'assesment' => $this->input->post('assesment'),
				'planning' => $this->input->post('planning'),
				'inisial_menyusui' => $this->input->post('inisial_menyusui'),
				'jaga_bayi_tetap_hangat' => $this->input->post('jaga_bayi_tetap_hangat'),
				'kringkan_bayi' => $this->input->post('kringkan_bayi'),
				'salep_mata_antibiotik' => $this->input->post('salep_mata_antibiotik'),
				'suntik_neo' => $this->input->post('suntik_neo'),
				'imunisasi_hbo' => $this->input->post('imunisasi_hbo'),
				'rawat_gabung' => $this->input->post('rawat_gabung'),
				'memandikan_bayi' => $this->input->post('memandikan_bayi'),
				'konseling_menyusui' => $this->input->post('konseling_menyusui'),
				'tanda_tanda_bahaya' => $this->input->post('tanda_tanda_bahaya'),
				'penjelasan' => $this->input->post('penjelasan'),
				'catatan_medis' => $this->input->post('catatan_medis'), 
				'tindakan_dokter' => $this->input->post('tindakan_dokter'), 


				'total_akhir' =>$this->uri->segment(3),

			);

		// var_dump($data_rekam_edit_bbl);
		// exit();




			$this->db->set($data_rekam_edit_bbl); 
			$this->db->where('kode_bbl',$kode_bbl); 
			$result= $this->db->update('tbl_bbl'); 
			if ($result) {

				$data_history = array(
					'kode_user' => $this->session->kode, 
					'ip_address'=>get_ip(),
					'aktivitas' => "Mengubah Data Pemeriksaan BBL Pasien ".$kode_pasien." dengan Kode ".$kode_bbl, 
				);
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
			redirect('bbl','refresh');
		}

		public function hapus_databbl()
		{
			$kode_bbl=$this->input->post('kode_bbl');
			$data=$this->model_bbl->hapus_aksi_bbl($kode_bbl);
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Membatalkan Pemeriksaan BBL Pasien ".$kode_bbl, 
			);
			$this->db->insert('tbl_history', $data_history);
			echo json_encode($data);

		}
	}
