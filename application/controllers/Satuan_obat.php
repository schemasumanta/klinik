<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_obat extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) { 
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>'); 
			redirect('dashboard','refresh');
		}elseif($this->session->level!='superadmin' && $this->session->level!='admin' && $this->session->level!='kasir'  && $this->session->level!='farmasi') {
			echo "<script> alert('Tidak Ada Akses Untuk Menu ini');
			history.back();
			</script>"; 
		}
		date_default_timezone_set('Asia/Jakarta');	
	}
	
	public function laporan_pemakaian_obat()
	{
		$tgl = explode('-', $this->input->post('bulan_obat'));
		$tahun = $tgl[0];
		$bulan = $tgl[1];
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$data['obat'] = $this->model_satuan_obat->tarik_pemakaian_obat($bulan,$tahun);
		$this->load->view('satuan/laporan_pemakaian_obat',$data);

	}

	public function tabel_obat(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'nama_obat';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('satuan_obat',$sort,$order,$search);

		foreach ($list as $l) {

			$no++;
			$l->no = $no;
			$opsi='
			<div class="btn-group"><a  href="'.base_url().'satuan_obat/edit/'.$l->kode_obat.'" style="background:#03b509; color:white;" class="btn btn-sm btn-flat" data="'.$l->kode_obat.'"><i class="fa fa-edit"></i></a>';

			if ($l->status_obat==0) {
				$opsi.='<a href="javascript:;" class="btn btn-sm  btn-success btn-flat item_hapus_obat" data-kode="'.$l->kode_obat.'" data-status="1"><i class="fas fa-prescription-bottle-alt"></i></a>'; 
			}else{
				$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus_obat" data-kode="'.$l->kode_obat.'" data-status="0"><i class="fa fa-trash"></i></a>';
			}

			$opsi.='<a href="javascript:;"  class="btn btn-sm  btn-flat btn-primary item_expire_obat" data-kode="'.$l->kode_obat.'" data-nama="'.$l->nama_obat.'" data-stok="'.$l->total_stok.'"><i class="fa fa-clock"></i> </a> 
			<a href="javascript:;"  class="btn btn-sm  btn-flat btn-dark item_hapus_expired" data-kode="'.$l->kode_obat.'" data-nama="'.$l->nama_obat.'"><i class="fas fa-prescription-bottle mr-2 text-danger"></i>Obat Exp.</a> 
			</div>';

			if ($l->total_stok == 0) {
				$status_stok="Kosong";
			}else if ($l->total_stok <= 10) {
				$status_stok="Terbatas";
			}else{

				$status_stok="Tersedia";
			}

			$l->status_stok = $status_stok;



			if ($l->status_obat == 0) {
				$status_obat="Tidak Aktif";
			}else{

				$status_obat="Aktif";
			}

			$l->status_obat = $status_obat;
			$l->opsi = $opsi;

			$data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('satuan_obat',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('satuan_obat',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}




	public function ambil_data(){
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
		$total=$this->db->count_all_results("tbl_satuan_obat");
		/*Mempersiapkan array tempat kita akan menampung semua data
		yang nantinya akan server kirimkan ke client*/
		$output=array();
		/*Token yang dikrimkan client, akan dikirim balik ke client*/
		$output['draw']=$draw;
		/*
		$output['recordsTotal'] adalah total data sebelum difilter
		$output['recordsFiltered'] adalah total data ketika difilter
		Biasanya kedua duanya bernilai sama, maka kita assignment 
		keduaduanya dengan nilai dari $total
		*/
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		/*disini nantinya akan memuat data yang akan kita tampilkan 
		pada table client*/
		$output['data']=array();
		/*Jika $search mengandung nilai, berarti user sedang telah 
		memasukan keyword didalam filed pencarian*/
		if($search!=""){
			$this->db->like("kode_obat",$search);
			$this->db->or_like("nama_obat",$search);
			$this->db->or_like("keterangan",$search);
			$this->db->or_like("satuan_obat",$search);
		}
		/*Lanjutkan pencarian ke database*/
		$this->db->limit($length,$start);
		/*Urutkan dari kode paling terkahir*/
		$sortdata = $this->uri->segment(3);
		$filterdata = $this->uri->segment(4);
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('nama_obat','ASC');
		}
		$query = $this->db->get('tbl_satuan_obat');
		/*Ketika dalam mode pencarian, berarti kita harus
		'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
		yang mengandung keyword tertentu
		*/
		if($search!=""){
			$this->db->like("kode_obat",$search);
			$this->db->or_like("nama_obat",$search);
			$this->db->or_like("keterangan",$search);
			$this->db->or_like("satuan_obat",$search);
			$jum=$this->db->get('tbl_satuan_obat');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}
		$nomor_urut=$start+1;
		foreach ($query->result_array() as $obat) {
			$opsi='
			<div class="btn-group"><a  href="'.base_url().'satuan_obat/edit/'.$obat['kode_obat'].'" style="background:#03b509; color:white;" class="btn btn-sm btn-flat" data="'.$obat['kode_obat'].'"><i class="fa fa-edit"></i></a>';
			if ($obat['status_obat']==0) {
				$opsi.='<a href="javascript:;" class="btn btn-sm  btn-success btn-flat item_hapus_obat" data-kode="'.$obat['kode_obat'].'" data-status="1"><i class="fas fa-prescription-bottle-alt"></i></a>'; 
			}else{
				$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus_obat" data-kode="'.$obat['kode_obat'].'" data-status="0"><i class="fa fa-trash"></i></a>';
			}
			$opsi.='<a href="javascript:;"  class="btn btn-sm  btn-flat btn-primary item_expire_obat" data-kode="'.$obat['kode_obat'].'" data-nama="'.$obat['nama_obat'].'" data-stok="'.$obat['total_stok'].'"><i class="fa fa-clock"></i> </a> 
			<a href="javascript:;"  class="btn btn-sm  btn-flat btn-dark item_hapus_expired" data-kode="'.$obat['kode_obat'].'" data-nama="'.$obat['nama_obat'].'"><i class="fas fa-prescription-bottle mr-2 text-danger"></i>Obat Exp.</a> 
			</div>';

			if ($obat['total_stok'] == 0) {
				$status_stok="Kosong";
			}else if ($obat['total_stok'] <= 10) {
				$status_stok="Terbatas";
			}else{

				$status_stok="Tersedia";
			}


			if ($obat['status_obat'] == 0) {
				$status_obat="Tidak Aktif";
			}else{

				$status_obat="Aktif";
			}

			$output['data'][]=array(
				$nomor_urut,
				$obat['kode_obat'],
				$obat['nama_obat'],
				$obat['keterangan'],
				$obat['harga_beli'],
				$obat['harga_jual'],
				$obat['satuan_obat'],
				$obat['total_stok'],
				$status_stok,
				$status_obat,

				$opsi,
			);
			$nomor_urut++;
		}
		echo json_encode($output);
	}
	
	public function index()
	{
		$data['tambah_stok_obat'] =$this->model_satuan_obat->get_namaobat();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('satuan/tampilan_satuan',$data);
		$this->load->view('template/footer');
	}
	public function jumlah_expired()
	{
		$this->db->select('SUM(qty) as jumlah');
		$this->db->where('kode_obat',$this->input->get('kode_obat'));
		$data =$this->db->get('tbl_expired_obat')->result();
		echo json_encode($data);
	}
	public function history()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melihat Data History Obat", 
		);
		
		$this->db->insert('tbl_history', $data_history); 

		$data['history_obat'] =$this->model_satuan_obat->get_history_obat();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('satuan/history_obat',$data);
		$this->load->view('template/footer');
	}

	public function history_obat()
	{
		$kode_obat = $this->input->get('kode_obat');
		$data_history = $this->model_satuan_obat->tampil_list_history_obat($kode_obat);
		echo json_encode($data_history);
	}

	public function tampil_satuan()
	{
		$data = $this->model_satuan_obat->tampil_satuan(); 
		echo json_encode($data); 
	} 

	public function tambah_satuan_obat()
	{ 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('satuan/tambah_satuan');                                               
		$this->load->view('template/footer');
	}

	public function tarik_laporan()
	{
		$data['tarik_laporan']= $this->model_satuan_obat->tarik_laporan();
		$this->db->where('qty!=',0);
		$this->db->order_by('kode_obat','ASC');	
		$data['tarik_expired']= $this->db->get('tbl_expired_obat')->result();	 
		$this->load->view('satuan/draf',$data);
	}

	public function simpan()
	{
		$kode_obat =  $this->model_satuan_obat->get_kode_obat(); 
		$nama_obat = $this->input->post('nama_obat'); 
		$keterangan = $this->input->post('keterangan'); 
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$satuan_obat = $this->input->post('satuan_obat'); 
		$expired_date_obat = $this->input->post('expired_date_obat');
		$total_stok = $this->input->post('total_stok');
		$data= array('kode_obat' =>$kode_obat, 
			'nama_obat' =>$nama_obat,
			'keterangan' =>$keterangan,
			'harga_beli' =>$harga_beli,
			'harga_jual' =>$harga_jual,
			'satuan_obat' =>$satuan_obat, 
			'total_stok' =>$total_stok,
			'status_obat' =>1 
		); 
		$insert=$this->db->insert('tbl_satuan_obat',$data); 
		$data_log_stok = array(
			'tanggal' => date('Y-m-d'),
			'kode_obat' => $kode_obat,
			'stok_awal' => 0, 
			'stok_masuk' => $total_stok, 
			'stok_akhir' => $total_stok, 
			'keterangan'=>'Penambahan Obat Baru Dengan Kode : '.$kode_obat,
		);
		$this->db->insert('tbl_log_stok_obat',$data_log_stok);

		$data_expired = array(
			'kode_obat' 		=> $kode_obat, 
			'qty' 				=> $total_stok, 
			'tanggal_expired' 	=> $expired_date_obat, 
		);

		$this->db->insert('tbl_expired_obat',$data_expired);

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menambah Obat Baru Dengan Kode : ".$kode_obat, 
		);
		
		$this->db->insert('tbl_history', $data_history); 



		$msg = "Data Berhasil di Simpan";   
		echo json_encode($msg); 			
		// }
	} 

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$kode_obat = $this->input->post("kode_obat");      
			$nama_obat = $this->input->post("nama_obat");
			$harga_beli = $this->input->post("harga_beli");
			$harga_jual = $this->input->post("harga_jual");
			$satuan = $this->input->post("satuan");
			$stok = $this->input->post("stok");
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn(); 
				for($row=2; $row<=$highestRow; $row++)
				{
					$kode_obat = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nama_obat = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$harga_beli = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$harga_jual = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$harga_jual = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$satuan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$stok = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$data[] = array(
						'kode_obat'  => $kode_obat,
						'nama_obat'  => $nama_obat,
						'harga_beli'  => $harga_beli,
						'harga_jual'  => $harga_jual,
						'satuan'  => $satuan,
						'stok'   => $stok,
						'status_obat'   => 1,
					);

				}
			}
			$this->model_satuan_obat->insert($data);
			echo 'Import Data Berhasil';
		} 
	}
	public function list_expired_obat()
	{
		$this->db->where('kode_obat', $this->input->get('kode_obat'));
		$this->db->where('qty >',0);
		$this->db->order_by('date(tanggal_expired)','ASC');
		$data =$this->db->get('tbl_expired_obat')->result();
		echo json_encode($data);

	}
	public function update_qty_expired()
	{
		$kode_exp = $this->input->post('id_expired_obat');
		$qty = $this->input->post('qty_expired_obat');
		$cek =0;

		for ($i=0; $i <count($kode_exp) ; $i++) { 
			$data_exp = array(
				'qty' => $qty[$i], );

			$this->db->set($data_exp);
			$this->db->where('kode_exp',$kode_exp[$i]);
			$result = $this->db->update('tbl_expired_obat');
			if ($result) {
				$cek +=1;
			}
		}
		if ($cek > 0) {
			$data['title'] = 'Berhasil';
			$data['text'] = 'Qty Obat Expired Berhasil Diupdate';
			$data['icon'] = 'success';
		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Qty Obat Expired Gagal Diupdate';
			$data['icon'] = 'error';
		}
		$this->session->set_flashdata($data);
		redirect('satuan_obat','refresh');
	}
	public function hapus_obat_expired()
	{
		$this->db->where('kode_obat', $this->input->post('kode_obat_hapus_expired'));
		$this->db->where('qty >',0);
		$this->db->where('DATEDIFF(tanggal_expired,CURDATE())<',0);
		$data_expired = $this->db->get('tbl_expired_obat');
		if ($data_expired->num_rows() > 0) {
			
			foreach ($data_expired->result() as $key) {
				$data_qty = array('qty' => 0,);
				$this->db->set($data_qty);
				$this->db->where('kode_exp',$key->kode_exp);
				$result = $this->db->update('tbl_expired_obat');

				if ($result) {
					$this->db->select('total_stok');
					$this->db->where('kode_obat', $this->input->post('kode_obat_hapus_expired'));
					$data_stok = $this->db->get('tbl_satuan_obat')->result();
					foreach ($data_stok as $stk) {
						$data_total_stok = array('total_stok' => floatval($stk->total_stok) - floatval($key->qty),);
						$this->db->set($data_total_stok);
						$this->db->where('kode_obat', $this->input->post('kode_obat_hapus_expired'));
						$this->db->update('tbl_satuan_obat');
						$data_log_stok = array(
							'tanggal' => date('Y-m-d'),
							'kode_obat' =>$this->input->post('kode_obat_hapus_expired'),
							'stok_awal' =>$stk->total_stok, 
							'stok_keluar' =>$key->qty,
							'stok_akhir' =>floatval($stk->total_stok) - floatval($key->qty), 
							'keterangan'=>'Hapus Obat yang Sudah Expired',
						);
						$this->db->insert('tbl_log_stok_obat',$data_log_stok)	;

					}

					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Mengosongkan Obat yang Expired dengan kode Obat ".$this->input->post('kode_obat_hapus_expired'), 
					);

					$this->db->insert('tbl_history', $data_history); 

					$data['title'] = 'Berhasil';
					$data['text'] = 'Obat Expired Berhasil Dikosongkan';
					$data['icon'] = 'success';
				}else{
					$data['title'] = 'Gagal';
					$data['text'] = 'Obat Expired Gagal Dikosongkan';
					$data['icon'] = 'error';
				}
				$this->session->set_flashdata($data);
				redirect('satuan_obat','refresh');

			}

		}
	}

	public function jumlah_expired_obat()
	{
		$this->db->select('SUM(qty) as jumlah');
		$this->db->where('kode_obat', $this->input->get('kode_obat'));
		$this->db->where('qty >',0);
		$this->db->where('DATEDIFF(tanggal_expired,CURDATE())<',0);
		$data =$this->db->get('tbl_expired_obat')->result();
		echo json_encode($data);

	}
	public function edit($kode_obat)
	{
		$data['satuan_obat']= $this->model_satuan_obat->edit_satuan_obat($kode_obat);	 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('satuan/edit_satuan',$data);
		$this->load->view('template/footer');
	}
	public function edit_satuan_aksi()
	{ 

		$data  = array(
			'nama_obat' 		=> trim($this->input->post('nama_obat')),
			'keterangan' 		=> $this->input->post('keterangan'),
			'harga_beli' 		=> $this->input->post('harga_beli'),
			'harga_jual' 		=> $this->input->post('harga_jual'),
			'satuan_obat' 		=> $this->input->post('satuan_obat'),
			'total_stok' 		=> $this->input->post('total_stok'),
		);   
		$this->db->set($data);
		$this->db->where('kode_obat',$this->input->post('kode_obat'));
		$result = $this->db->update('tbl_satuan_obat');
		if ($result) {
			$msg = "Data Berhasil di Update"; 
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Data Obat Dengan Kode : ".$this->input->post('kode_obat'), 
			);

			$this->db->insert('tbl_history', $data_history); 

		}else{
			$msg = "Data Gagal di Update";
		}
		echo json_encode($msg);
		
	}


	public function update_stok_obat(){
		$kode_obat= $this->input->post('nama_obat'); 
		$qty= $this->input->post('stok_masuk');
		$expired_stok_masuk= $this->input->post('expired_stok_masuk');

		$stok_obat= $this->model_satuan_obat->getstokobatbykode($kode_obat);
		foreach ($stok_obat as $key) {
			$stok_awal=$key->total_stok;
			$stok_baru=floatval($qty)+floatval($stok_awal);
		}

		$data_stok  = array(
			'total_stok' =>$stok_baru,
		);

		$this->db->set($data_stok);
		$this->db->where('kode_obat',$kode_obat);
		$result = $this->db->update('tbl_satuan_obat');
		if ($result) {
			$data_log_stok = array(
				'tanggal' => date('Y-m-d'),
				'kode_obat' =>$kode_obat,
				'stok_awal' =>$stok_awal, 
				'stok_masuk' =>$qty,
				'stok_akhir' =>$stok_baru, 
				'keterangan'=>'Stok Obat Masuk Baru',
			);
			$this->db->insert('tbl_log_stok_obat',$data_log_stok);
			$this->db->where('kode_obat',$kode_obat);
			$this->db->where('tanggal_expired',$expired_stok_masuk);
			$data_expired = $this->db->get('tbl_expired_obat');
			if ($data_expired->num_rows() > 0) {
				foreach ($data_expired->result() as $exp) {
					$total_expired = floatval($qty)+floatval($exp->qty);
					$data_expired_qty = array(
						'qty' => $total_expired);
					$this->db->set($data_expired_qty);
					$this->db->where('kode_exp',$exp->kode_exp);
					$this->db->update('tbl_expired_obat');
				}

			}else{
				$data_expired_simpan = array(
					'kode_obat' => $kode_obat, 
					'qty' => $qty, 
					'tanggal_expired' => $expired_stok_masuk, 
				);
				$this->db->insert('tbl_expired_obat',$data_expired_simpan);
			}


			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menambah Stok Obat Dengan Kode : ".$kode_obat, 
			);
			$this->db->insert('tbl_history', $data_history); 

			$msg='Stok Obat Berhasil Ditambahkan!'; 
		}else{
			$msg='Tambah Stok Gagal';
		}
		echo json_encode($msg);
	}



	public function update_tanggal_expired(){

		$kode_obat= $this->input->post('nama_obat'); 
		$qty= $this->input->post('qty');
		$expired= $this->input->post('expired');

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menambah Tanggal Expired Obat Dengan Kode : ".$kode_obat, 
		);
		
		$this->db->insert('tbl_history', $data_history); 

		$this->db->where('kode_obat',$kode_obat);
		$this->db->where('tanggal_expired',$expired);
		$cek = $this->db->get('tbl_expired_obat');

		if ($cek->num_rows() > 0) {

			foreach ($cek->result() as $key) {

				$data_expired_baru = array(
					'qty' => floatval($qty) + floatval($key->qty), 
				);

				$this->db->set($data_expired_baru);
				$this->db->where('kode_exp',$key->kode_exp);
				$result = $this->db->update('tbl_expired_obat');
			}

		}else{
			$data_expired_simpan = array(
				'kode_obat' => $kode_obat, 
				'qty' => $qty, 
				'tanggal_expired' => $expired, 
			);

			$result = $this->db->insert('tbl_expired_obat',$data_expired_simpan);
		}
		if ($result) {
			echo json_encode(1);
		}else{
			echo json_encode(0);
		}
	}

	public function hapus_obat()
	{

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus Data Obat Dengan Kode : ".$this->input->post('kode_obat_hapus'), 
		);
		$this->db->insert('tbl_history', $data_history); 
		$data = array('status_obat' => $this->input->post('status_obat_hapus'),);
		$this->db->set($data); 
		$this->db->where('kode_obat',$this->input->post('kode_obat_hapus')); 
		$result=$this->db->update('tbl_satuan_obat');
		redirect('satuan_obat','refresh'); 

	}

}
