<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inc extends CI_Controller {
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
			'aktivitas' => "Melihat Data Pemeriksaan INC", 
		);
		$this->db->insert('tbl_history', $data_history);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('inc/tampilan_inc');
		$this->load->view('template/footer');
	}

	public function tampildata_inc()
	{
		$data = $this->model_inc->tampil_data_inc(); 
		echo json_encode($data);  
	}

	public function ambil_data_incsatu()
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
		$umum=$this->db->count_all_results("tbl_inc");
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
			$this->db->order_by('kode_inc','DESC');
		}
		$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_inc.kode_pasien');
		$this->db->where('status_pasien','Belum Diperiksa');
		$query= $this->db->get('tbl_inc');
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
			$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_inc.kode_pasien');
			$jum=$this->db->get('tbl_inc');
			$output['recordsTotal']= $output['recordsFiltered']=$jum->num_rows();
		}


		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekam_inc) {

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 

			<a href="#" class="btn btn-success btn-flat btn-sm periksa_pasien_inc "style="font-weight: bold;" data="'.$rekam_inc['kode_inc'].'" > <i class="fa fa-medis"></i> Periksa Pasien</a>';
			if ($this->session->level=="superadmin") {

				$opsi.=' <a href="javascript:;" class="btn btn-danger btn-flat btn-sm item_hapus" data="'.$rekam_inc['kode_inc'].'"><i class="fa fa-trash"></i></a> ';
			}
			$opsi.='</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekam_inc['no_registrasi'],
				// $rekam_inc['kode_inc'],
				$rekam_inc['nama_pasien'],
				$rekam_inc['tanggal_berobat'],
				$rekam_inc['status_pasien'],
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	}

	public function ambil_data_incdua()
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
		$umum=$this->db->count_all_results("tbl_inc");
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
			$this->db->like("kode_inc",$search);
			$this->db->like("nama_pasien",$search);
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
		$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_inc.kode_pasien');
		$this->db->where('status_pasien','Sudah Diperiksa');
		$query= $this->db->get('tbl_inc');
		$output['recordsTotal']= $output['recordsFiltered']=$query->num_rows();
		/*Ketika dalam mode pencarian, berarti kita harus
		'recordsTotal' dan 'recordsFiltered' sesuai dengan jumlah baris
		yang mengandung keyword tertentu
		*/
		if($search!=""){
			$this->db->where('status_pasien','Sudah Diperiksa');
			$this->db->like("kode_inc",$search);
			$this->db->like("nama_pasien",$search);
			$this->db->or_like("tanggal_periksa",$search); 
			$this->db->or_like("dokter_pemeriksa",$search); 
			$this->db->or_like("status_pasien",$search); 
			
			$this->db->join('tbl_pasien', 'tbl_pasien.kode_pasien = tbl_inc.kode_pasien');
			$jum=$this->db->get('tbl_inc');
			$output['recordsTotal']= $output['recordsFiltered']=$jum->num_rows();
		}


		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekam_inc_dua) {

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 

			<a href="#" class="btn btn-success btn-flat btn-sm item_detail_inc "style="font-weight: bold;text-align:center" data="'.$rekam_inc_dua['kode_inc'].'" > <i class="fa fa-eye"></i> </a>
			<a href="#" class="btn btn-primary btn-flat btn-sm item_edit_inc "style="font-weight: bold;text-align:center" data="'.$rekam_inc_dua['kode_inc'].'" > <i class="fa fa-edit"></i> </a> 

			</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekam_inc_dua['kode_inc'],
				$rekam_inc_dua['nama_pasien'],
				$rekam_inc_dua['tanggal_periksa'],
				$rekam_inc_dua['dokter_pemeriksa'],
				$rekam_inc_dua['status_pasien'],
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	}


	public function simpan_inc()
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->load->helper('url');
		$this->load->helper('form');
		// $data=$_POST['myform'];
		// $kode_inc=$this->uri->slash_segment(3).$this->uri->segment(4);

		$kode_inc=$this->input->post('kode_inc');
		$kode_pasien=$this->input->post('kode_pasien');
		$tanggal_subjektif_kala1 = $this->input->post('tanggal_subjektif_kala1');
		$tanggal_periksa = date("Y-m-d H:i:s");
		// var_dump($tanggal_subjektif_kala1);
		$data_inc = array(
			'status_pasien'=>'Sudah Diperiksa',
			'tanggal_periksa'=>$tanggal_periksa,
			'suhu' => $this->input->post('suhu'),
			'tensi_darah' => $this->input->post('tensi_darah'),
			'pernapasan' => $this->input->post('pernapasan'),
			'saturasi' => $this->input->post('saturasi'),
			'nadi' => $this->input->post('nadi'), 
			'bb' => $this->input->post('bb'),
			'tb' => $this->input->post('tb'),
		// 'tanggal_berobat'=>$this->input->post('tanggal_berobat'),
			'tanggal_subjektif_kala1'=>substr($this->input->post('tanggal_subjektif_kala1'),0,10),
			'tanggal_subjektif_kala2'=>substr($this->input->post('tanggal_subjektif_kala2'),0,10),
			'tanggal_subjektif_kala3'=>substr($this->input->post('tanggal_subjektif_kala3'),0,10),
			'tanggal_subjektif_kala4'=>substr($this->input->post('tanggal_subjektif_kala4'),0,10),
			'jam_subjektif_kala1'=>substr($this->input->post('tanggal_subjektif_kala1'),11).":00",
			'jam_subjektif_kala2'=>substr($this->input->post('tanggal_subjektif_kala2'),11).":00",
			'jam_subjektif_kala3'=>substr($this->input->post('tanggal_subjektif_kala3'),11).":00",
			'jam_subjektif_kala4'=>substr($this->input->post('tanggal_subjektif_kala4'),11).":00",
			'keterangan_pasien_subjektif_kala1'=>$this->input->post('keterangan_pasien_subjektif_kala1'),
			'keterangan_pasien_subjektif_kala2'=>$this->input->post('keterangan_pasien_subjektif_kala2'),
			'keterangan_pasien_subjektif_kala3'=>$this->input->post('keterangan_pasien_subjektif_kala3'),
			'keterangan_pasien_subjektif_kala4'=>$this->input->post('keterangan_pasien_subjektif_kala4'),
			'keterangan_assesment_kala4'=>$this->input->post('keterangan_assesment_assesment_kala4'),
			'keterangan_assesment_kala3'=>$this->input->post('keterangan_assesment_assesment_kala3'),
			'keterangan_assesment_kala2'=>$this->input->post('keterangan_assesment_assesment_kala2'),
			'keterangan_assesment_kala1'=>$this->input->post('keterangan_assesment_assesment_kala1'),
			'masalah_assesment_kala4'=>$this->input->post('masalah_assesment_kala4'),
			'masalah_assesment_kala3'=>$this->input->post('masalah_assesment_kala3'),
			'masalah_assesment_kala2'=>$this->input->post('masalah_assesment_kala2'),
			'masalah_assesment_kala1'=>$this->input->post('masalah_assesment_kala1'),
			'kebutuhan_assesment_kala4'=>$this->input->post('kebutuhan_assesment_kala4'),
			'kebutuhan_assesment_kala3'=>$this->input->post('kebutuhan_assesment_kala3'),
			'kebutuhan_assesment_kala2'=>$this->input->post('kebutuhan_assesment_kala2'),
			'kebutuhan_assesment_kala1'=>$this->input->post('kebutuhan_assesment_kala1'),
			'keterangan_planning_kala1'=>$this->input->post('keterangan_planning_kala1'),
			'keterangan_planning_kala2'=>$this->input->post('keterangan_planning_kala2'),
			'keterangan_planning_kala3'=>$this->input->post('keterangan_planning_kala3'),
			'keterangan_planning_kala4'=>$this->input->post('keterangan_planning_kala4'),
			'tanggal_planning_kala1'=>substr($this->input->post('tanggal_planning_kala1'),0,10),
			'tanggal_planning_kala2'=>substr($this->input->post('tanggal_planning_kala2'),0,10),
			'tanggal_planning_kala3'=>substr($this->input->post('tanggal_planning_kala3'),0,10),
			'tanggal_planning_kala4'=>substr($this->input->post('tanggal_planning_kala4'),0,10),
			'tanggal_objektif_kala1'=>substr($this->input->post('tanggal_objektif_kala1'),0,10),
			'tanggal_objektif_kala2'=>substr($this->input->post('tanggal_objektif_kala2'),0,10),
			'tanggal_objektif_kala3'=>substr($this->input->post('tanggal_objektif_kala3'),0,10),
			'tanggal_objektif_kala4'=>substr($this->input->post('tanggal_objektif_kala4'),0,10),
			'tanggal_assesment_kala1'=>substr($this->input->post('tanggal_assesment_kala1'),0,10),
			'tanggal_assesment_kala2'=>substr($this->input->post('tanggal_assesment_kala2'),0,10),
			'tanggal_assesment_kala3'=>substr($this->input->post('tanggal_assesment_kala3'),0,10),
			'tanggal_assesment_kala4'=>substr($this->input->post('tanggal_assesment_kala4'),0,10),
			'jam_objektif_kala1'=>substr($this->input->post('tanggal_objektif_kala1'),11).":00",
			'jam_planning_kala1'=>substr($this->input->post('tanggal_planning_kala1'),11).":00",
			'jam_planning_kala2'=>substr($this->input->post('tanggal_planning_kala2'),11).":00",
			'jam_planning_kala3'=>substr($this->input->post('tanggal_planning_kala3'),11).":00",
			'jam_planning_kala4'=>substr($this->input->post('tanggal_planning_kala4'),11).":00",
			'jam_objektif_kala2'=>substr($this->input->post('tanggal_objektif_kala2'),11).":00",
			'jam_objektif_kala3'=>substr($this->input->post('tanggal_objektif_kala3'),11).":00",
			'jam_objektif_kala4'=>substr($this->input->post('tanggal_objektif_kala4'),11).":00",
			'jam_assesment_kala1'=>substr($this->input->post('tanggal_assesment_kala1'),11).":00",
			'jam_assesment_kala2'=>substr($this->input->post('tanggal_assesment_kala2'),11).":00",
			'jam_assesment_kala3'=>substr($this->input->post('tanggal_assesment_kala3'),11).":00",
			'jam_assesment_kala4'=>substr($this->input->post('tanggal_assesment_kala4'),11).":00",
			'jk_planning_kala2'=>$this->input->post('jk_planning_kala2'),
			'bb_planning_kala2'=>$this->input->post('bb_planning_kala2'),
			'pb_planning_kala2'=>$this->input->post('pb_planning_kala2'),
			'lk_planning_kala2'=>$this->input->post('lk_planning_kala2'),
			'ld_planning_kala2'=>$this->input->post('ld_planning_kala2'),
			'll_planning_kala2'=>$this->input->post('ll_planning_kala2'),
			'keadaan_umum_objektif_kala1'=>$this->input->post('keadaan_umum_objektif_kala1'),
			'kesadaran_objektif_kala1'=>$this->input->post('kesadaran_objektif_kala1'),
			'keadaan_emosional_objektif_kala1'=>$this->input->post('keadaan_emosional_objektif_kala1'),
			'keadaan_umum_objektif_kala4'=>$this->input->post('keadaan_umum_objektif_kala4'),
			'kesadaran_objektif_kala4'=>$this->input->post('kesadaran_objektif_kala4'),
			'keadaan_emosional_objektif_kala4'=>$this->input->post('keadaan_emosional_objektif_kala4'),
			'td_objektif_kala1'=>$this->input->post('td_objektif_kala1'),
			'nadi_objektif_kala1'=>$this->input->post('nadi_objektif_kala1'),
			'respirasi_objektif_kala1'=>$this->input->post('respirasi_objektif_kala1'),
			'suhu_objektif_kala1'=>$this->input->post('suhu_objektif_kala1'),
			'tfu_objektif_kala1'=>$this->input->post('tfu_objektif_kala1'),
			'leopold1_objektif_kala1'=>$this->input->post('leopold1_objektif_kala1'),
			'leopold2_objektif_kala1'=>$this->input->post('leopold2_objektif_kala1'),
			'leopold3_objektif_kala1'=>$this->input->post('leopold3_objektif_kala1'),
			'leopold4_objektif_kala1'=>$this->input->post('leopold4_objektif_kala1'),
			'penurunan_objektif_kala1'=>$this->input->post('penurunan_objektif_kala1'),
			'djj_objektif_kala1'=>$this->input->post('djj_objektif_kala1'),
			'his_objektif_kala1'=>$this->input->post('his_objektif_kala1'),
			'tjb_objektif_kala1'=>$this->input->post('tjb_objektif_kala1'),
			'vv_objektif_kala1'=>$this->input->post('vv_objektif_kala1'),
			'pembukaan_objektif_kala1'=>$this->input->post('pembukaan_objektif_kala1'),
			'portio_objektif_kala1'=>$this->input->post('portio_objektif_kala1'),
			'ketuban_objektif_kala1'=>$this->input->post('ketuban_objektif_kala1'),
			'plasenta_objektif_kala1'=>$this->input->post('plasenta_objektif_kala1'),
			'hodge_objektif_kala1'=>$this->input->post('hodge_objektif_kala1'),
			'ubun_ubun_objektif_kala1'=>$this->input->post('ubun_ubun_objektif_kala1'),
			'vv_objektif_kala2'=>$this->input->post('vv_objektif_kala2'),
			'pembukaan_objektif_kala2'=>$this->input->post('pembukaan_objektif_kala2'),
			'ketuban_objektif_kala2'=>$this->input->post('ketuban_objektif_kala2'),
			'ubun_ubun_objektif_kala2'=>$this->input->post('ubun_ubun_objektif_kala2'),
			'portio_objektif_kala2'=>$this->input->post('portio_objektif_kala2'),
			'kesadaran_objektif_kala3'=>$this->input->post('kesadaran_objektif_kala3'),
			'keadaan_umum_objektif_kala3'=>$this->input->post('keadaan_umum_objektif_kala3'),
			'td_objektif_kala3'=>$this->input->post('td_objektif_kala3'),
			'nadi_objektif_kala3'=>$this->input->post('nadi_objektif_kala3'),
			'respirasi_objektif_kala3'=>$this->input->post('respirasi_objektif_kala3'),
			'suhu_objektif_kala3'=>$this->input->post('suhu_objektif_kala3'),
			'tfu_objektif_kala3'=>$this->input->post('tfu_objektif_kala3'),
			'kandung_kemih_objektif_kala3'=>$this->input->post('kandung_kemih_objektif_kala3'),
			'kontraksi_uterus_objektif_kala3'=>$this->input->post('kontraksi_uterus_objektif_kala3'),
			'kehamilan_ganda_objektif_kala3'=>$this->input->post('kehamilan_ganda_objektif_kala3'),
			'semburan_darah_objektif_kala3'=>$this->input->post('semburan_darah_objektif_kala3'),
			'tali_pusat_memanjang_objektif_kala3'=>$this->input->post('tali_pusat_memanjang_objektif_kala3'),
			'td_objektif_kala4'=>$this->input->post('td_objektif_kala4'),
			'nadi_objektif_kala4'=>$this->input->post('nadi_objektif_kala4'),
			'respirasi_objektif_kala4'=>$this->input->post('respirasi_objektif_kala4'),
			'suhu_objektif_kala4'=>$this->input->post('suhu_objektif_kala4'),
			'tfu_objektif_kala4'=>$this->input->post('tfu_objektif_kala4'),
			'kontraksi_objektif_kala4'=>$this->input->post('kontraksi_objektif_kala4'),
			'kandung_kemih_objektif_kala4'=>$this->input->post('kandung_kemih_objektif_kala4'),
			'perdarahan_objektif_kala4'=>$this->input->post('perdarahan_objektif_kala4'),
			'perineum_objektif_kala4'=>$this->input->post('perineum_objektif_kala4'),
			'robekan_objektif_kala4'=>$this->input->post('robekan_objektif_kala4'),
			'tindakan_dokter' => $this->input->post('tindakan_dokter'), 
			'total_akhir' =>$this->uri->segment(3),
			'dokter_pemeriksa' => $this->session->nama_admin,
			'upah_dokter' => $this->session->tarif_dokter
		);

		// var_dump($data_inc);
		// exit();

$this->db->set($data_inc);
$this->db->where('kode_inc',$kode_inc);
$result= $this->db->update('tbl_inc');
if ($result) {

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
				'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_inc,
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
							'kode_rekam' => $kode_inc,
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
							'kode_rekam' => $kode_inc,
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

	$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
	$data_pembayaran = array(
		'kode_pembayaran' => $kode_pembayaran, 
		'kode_pasien' => $kode_pasien, 
		'kode_rekam' => $kode_inc, 
		'tanggal_pembayaran' => $tanggal_periksa,
		'dokter_pemeriksa' => $this->session->nama_admin, 
		'status_pembayaran' => 'Menunggu Pembayaran');
	$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
	if ($simpan_pembayaran) {

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Melakukan Pemeriksaan INC Pasien ".$kode_pasien." dengan Kode ".$kode_inc, 
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
redirect('inc','refresh');
}
public function periksa_pasien_inc($kode)
{
	$kode_inc =$this->uri->slash_segment(3).$this->uri->segment(4);
	$data['periksa_inc'] =$this->model_inc->periksa_pasien_inc($kode_inc);
	$data['obat'] = $this->model_inc->getnamaobat(); 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
	$this->load->view('inc/periksa_inc',$data);
	$this->load->view('template/footer');
}
public function detail_pasien_inc($kode)
{
	$kode_inc =$this->uri->slash_segment(3).$this->uri->segment(4);
	$data['detail_inc'] =$this->model_inc->periksa_pasien_inc($kode_inc);
	$data['obat'] = $this->model_inc->getnamaobat(); 
	$data['detail_obat'] = $this->model_inc->detail_obat_bykode($kode_inc); 

	$this->load->view('template/header');
	$this->load->view('template/sidebar');
	$this->load->view('inc/detail_inc',$data);
	$this->load->view('template/footer');

}
public function data_pasien_inc_bykode($kode)
{
	$kode_inc =$this->uri->slash_segment(3).$this->uri->segment(4);
	$data['periksa_inc'] =$this->model_inc->periksa_pasien_inc($kode_inc);
	$data['obat'] = $this->model_inc->getnamaobat(); 
	$data['detail_obat'] = $this->model_inc->detail_obat_bykode($kode_inc); 
	
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
	$this->load->view('inc/edit_inc',$data);
	$this->load->view('template/footer');

}

public function updatedatainc()
{ 

	date_default_timezone_set('Asia/Jakarta');

	$this->load->helper('url');

	$kode_inc = $this->input->post('kode_inc');   
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
		$this->db->where('kode_rekam', $kode_inc);
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
						'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_inc,
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
					'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_inc,
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
									'kode_rekam' => $kode_inc,
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
									'kode_rekam' => $kode_inc,
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



	$data_inc= array(			

		'status_pasien' =>'Sudah Diperiksa',
		'tanggal_periksa' =>substr($this->input->post('tanggal_periksa'),0,10), 
		'suhu' => $this->input->post('suhu'),
		'tensi_darah' => $this->input->post('tensi_darah'),
		'pernapasan' => $this->input->post('pernapasan'),
		'saturasi' => $this->input->post('saturasi'),
		'nadi' => $this->input->post('nadi'), 
		'bb' => $this->input->post('bb'),
		'tb' => $this->input->post('tb'),
		// 'tanggal_berobat'=>$this->input->post('tanggal_berobat'),
		'tanggal_subjektif_kala1'=>substr($this->input->post('tanggal_subjektif_kala1'),0,10),
		'tanggal_subjektif_kala2'=>substr($this->input->post('tanggal_subjektif_kala2'),0,10),
		'tanggal_subjektif_kala3'=>substr($this->input->post('tanggal_subjektif_kala3'),0,10),
		'tanggal_subjektif_kala4'=>substr($this->input->post('tanggal_subjektif_kala4'),0,10),
		'jam_subjektif_kala1'=>substr($this->input->post('tanggal_subjektif_kala1'),11).":00",
		'jam_subjektif_kala2'=>substr($this->input->post('tanggal_subjektif_kala2'),11).":00",
		'jam_subjektif_kala3'=>substr($this->input->post('tanggal_subjektif_kala3'),11).":00",
		'jam_subjektif_kala4'=>substr($this->input->post('tanggal_subjektif_kala4'),11).":00",
		'keterangan_pasien_subjektif_kala1'=>$this->input->post('keterangan_pasien_subjektif_kala1'),
		'keterangan_pasien_subjektif_kala2'=>$this->input->post('keterangan_pasien_subjektif_kala2'),
		'keterangan_pasien_subjektif_kala3'=>$this->input->post('keterangan_pasien_subjektif_kala3'),
		'keterangan_pasien_subjektif_kala4'=>$this->input->post('keterangan_pasien_subjektif_kala4'),
		'keterangan_assesment_kala4'=>$this->input->post('keterangan_assesment_assesment_kala4'),
		'keterangan_assesment_kala3'=>$this->input->post('keterangan_assesment_assesment_kala3'),
		'keterangan_assesment_kala2'=>$this->input->post('keterangan_assesment_assesment_kala2'),
		'keterangan_assesment_kala1'=>$this->input->post('keterangan_assesment_assesment_kala1'),
		'masalah_assesment_kala4'=>$this->input->post('masalah_assesment_kala4'),
		'masalah_assesment_kala3'=>$this->input->post('masalah_assesment_kala3'),
		'masalah_assesment_kala2'=>$this->input->post('masalah_assesment_kala2'),
		'masalah_assesment_kala1'=>$this->input->post('masalah_assesment_kala1'),
		'kebutuhan_assesment_kala4'=>$this->input->post('kebutuhan_assesment_kala4'),
		'kebutuhan_assesment_kala3'=>$this->input->post('kebutuhan_assesment_kala3'),
		'kebutuhan_assesment_kala2'=>$this->input->post('kebutuhan_assesment_kala2'),
		'kebutuhan_assesment_kala1'=>$this->input->post('kebutuhan_assesment_kala1'),
		'keterangan_planning_kala1'=>$this->input->post('keterangan_planning_kala1'),
		'keterangan_planning_kala2'=>$this->input->post('keterangan_planning_kala2'),
		'keterangan_planning_kala3'=>$this->input->post('keterangan_planning_kala3'),
		'keterangan_planning_kala4'=>$this->input->post('keterangan_planning_kala4'),
		'tanggal_planning_kala1'=>substr($this->input->post('tanggal_planning_kala1'),0,10),
		'tanggal_planning_kala2'=>substr($this->input->post('tanggal_planning_kala2'),0,10),
		'tanggal_planning_kala3'=>substr($this->input->post('tanggal_planning_kala3'),0,10),
		'tanggal_planning_kala4'=>substr($this->input->post('tanggal_planning_kala4'),0,10),
		'tanggal_objektif_kala1'=>substr($this->input->post('tanggal_objektif_kala1'),0,10),
		'tanggal_objektif_kala2'=>substr($this->input->post('tanggal_objektif_kala2'),0,10),
		'tanggal_objektif_kala3'=>substr($this->input->post('tanggal_objektif_kala3'),0,10),
		'tanggal_objektif_kala4'=>substr($this->input->post('tanggal_objektif_kala4'),0,10),
		'tanggal_assesment_kala1'=>substr($this->input->post('tanggal_assesment_kala1'),0,10),
		'tanggal_assesment_kala2'=>substr($this->input->post('tanggal_assesment_kala2'),0,10),
		'tanggal_assesment_kala3'=>substr($this->input->post('tanggal_assesment_kala3'),0,10),
		'tanggal_assesment_kala4'=>substr($this->input->post('tanggal_assesment_kala4'),0,10),
		'jam_objektif_kala1'=>substr($this->input->post('tanggal_objektif_kala1'),11).":00",
		'jam_planning_kala1'=>substr($this->input->post('tanggal_planning_kala1'),11).":00",
		'jam_planning_kala2'=>substr($this->input->post('tanggal_planning_kala2'),11).":00",
		'jam_planning_kala3'=>substr($this->input->post('tanggal_planning_kala3'),11).":00",
		'jam_planning_kala4'=>substr($this->input->post('tanggal_planning_kala4'),11).":00",
		'jam_objektif_kala2'=>substr($this->input->post('tanggal_objektif_kala2'),11).":00",
		'jam_objektif_kala3'=>substr($this->input->post('tanggal_objektif_kala3'),11).":00",
		'jam_objektif_kala4'=>substr($this->input->post('tanggal_objektif_kala4'),11).":00",
		'jam_assesment_kala1'=>substr($this->input->post('tanggal_assesment_kala1'),11).":00",
		'jam_assesment_kala2'=>substr($this->input->post('tanggal_assesment_kala2'),11).":00",
		'jam_assesment_kala3'=>substr($this->input->post('tanggal_assesment_kala3'),11).":00",
		'jam_assesment_kala4'=>substr($this->input->post('tanggal_assesment_kala4'),11).":00",
		'jk_planning_kala2'=>$this->input->post('jk_planning_kala2'),
		'bb_planning_kala2'=>$this->input->post('bb_planning_kala2'),
		'pb_planning_kala2'=>$this->input->post('pb_planning_kala2'),
		'lk_planning_kala2'=>$this->input->post('lk_planning_kala2'),
		'ld_planning_kala2'=>$this->input->post('ld_planning_kala2'),
		'll_planning_kala2'=>$this->input->post('ll_planning_kala2'),
		'keadaan_umum_objektif_kala1'=>$this->input->post('keadaan_umum_objektif_kala1'),
		'kesadaran_objektif_kala1'=>$this->input->post('kesadaran_objektif_kala1'),
		'keadaan_emosional_objektif_kala1'=>$this->input->post('keadaan_emosional_objektif_kala1'),
		'keadaan_umum_objektif_kala4'=>$this->input->post('keadaan_umum_objektif_kala4'),
		'kesadaran_objektif_kala4'=>$this->input->post('kesadaran_objektif_kala4'),
		'keadaan_emosional_objektif_kala4'=>$this->input->post('keadaan_emosional_objektif_kala4'),
		'td_objektif_kala1'=>$this->input->post('td_objektif_kala1'),
		'nadi_objektif_kala1'=>$this->input->post('nadi_objektif_kala1'),
		'respirasi_objektif_kala1'=>$this->input->post('respirasi_objektif_kala1'),
		'suhu_objektif_kala1'=>$this->input->post('suhu_objektif_kala1'),
		'tfu_objektif_kala1'=>$this->input->post('tfu_objektif_kala1'),
		'leopold1_objektif_kala1'=>$this->input->post('leopold1_objektif_kala1'),
		'leopold2_objektif_kala1'=>$this->input->post('leopold2_objektif_kala1'),
		'leopold3_objektif_kala1'=>$this->input->post('leopold3_objektif_kala1'),
		'leopold4_objektif_kala1'=>$this->input->post('leopold4_objektif_kala1'),
		'penurunan_objektif_kala1'=>$this->input->post('penurunan_objektif_kala1'),
		'djj_objektif_kala1'=>$this->input->post('djj_objektif_kala1'),
		'his_objektif_kala1'=>$this->input->post('his_objektif_kala1'),
		'tjb_objektif_kala1'=>$this->input->post('tjb_objektif_kala1'),
		'vv_objektif_kala1'=>$this->input->post('vv_objektif_kala1'),
		'pembukaan_objektif_kala1'=>$this->input->post('pembukaan_objektif_kala1'),
		'portio_objektif_kala1'=>$this->input->post('portio_objektif_kala1'),
		'ketuban_objektif_kala1'=>$this->input->post('ketuban_objektif_kala1'),
		'plasenta_objektif_kala1'=>$this->input->post('plasenta_objektif_kala1'),
		'hodge_objektif_kala1'=>$this->input->post('hodge_objektif_kala1'),
		'ubun_ubun_objektif_kala1'=>$this->input->post('ubun_ubun_objektif_kala1'),
		'vv_objektif_kala2'=>$this->input->post('vv_objektif_kala2'),
		'pembukaan_objektif_kala2'=>$this->input->post('pembukaan_objektif_kala2'),
		'ketuban_objektif_kala2'=>$this->input->post('ketuban_objektif_kala2'),
		'ubun_ubun_objektif_kala2'=>$this->input->post('ubun_ubun_objektif_kala2'),
		'portio_objektif_kala2'=>$this->input->post('portio_objektif_kala2'),
		'kesadaran_objektif_kala3'=>$this->input->post('kesadaran_objektif_kala3'),
		'keadaan_umum_objektif_kala3'=>$this->input->post('keadaan_umum_objektif_kala3'),
		'td_objektif_kala3'=>$this->input->post('td_objektif_kala3'),
		'nadi_objektif_kala3'=>$this->input->post('nadi_objektif_kala3'),
		'respirasi_objektif_kala3'=>$this->input->post('respirasi_objektif_kala3'),
		'suhu_objektif_kala3'=>$this->input->post('suhu_objektif_kala3'),
		'tfu_objektif_kala3'=>$this->input->post('tfu_objektif_kala3'),
		'kandung_kemih_objektif_kala3'=>$this->input->post('kandung_kemih_objektif_kala3'),
		'kontraksi_uterus_objektif_kala3'=>$this->input->post('kontraksi_uterus_objektif_kala3'),
		'kehamilan_ganda_objektif_kala3'=>$this->input->post('kehamilan_ganda_objektif_kala3'),
		'semburan_darah_objektif_kala3'=>$this->input->post('semburan_darah_objektif_kala3'),
		'tali_pusat_memanjang_objektif_kala3'=>$this->input->post('tali_pusat_memanjang_objektif_kala3'),
		'td_objektif_kala4'=>$this->input->post('td_objektif_kala4'),
		'nadi_objektif_kala4'=>$this->input->post('nadi_objektif_kala4'),
		'respirasi_objektif_kala4'=>$this->input->post('respirasi_objektif_kala4'),
		'suhu_objektif_kala4'=>$this->input->post('suhu_objektif_kala4'),
		'tfu_objektif_kala4'=>$this->input->post('tfu_objektif_kala4'),
		'kontraksi_objektif_kala4'=>$this->input->post('kontraksi_objektif_kala4'),
		'kandung_kemih_objektif_kala4'=>$this->input->post('kandung_kemih_objektif_kala4'),
		'perdarahan_objektif_kala4'=>$this->input->post('perdarahan_objektif_kala4'),
		'perineum_objektif_kala4'=>$this->input->post('perineum_objektif_kala4'),
		'robekan_objektif_kala4'=>$this->input->post('robekan_objektif_kala4'),
		'tindakan_dokter' => $this->input->post('tindakan_dokter'), 
		'total_akhir' =>$this->uri->segment(3),

	);

$this->db->set($data_inc); 
$this->db->where('kode_inc',$kode_inc); 
$result= $this->db->update('tbl_inc'); 
if ($result) {
	$data_history = array(
		'kode_user' => $this->session->kode, 
		'ip_address'=>get_ip(),
		'aktivitas' => "Mengubah Data Pemeriksaan INC Pasien ".$kode_pasien." dengan Kode ".$kode_inc, 
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
redirect('inc','refresh');

}

public function hapus_datainc()
{
	$kode_inc=$this->input->post('kode_inc');
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Membatalkan Pemeriksaan KB dengan Kode ".$kode_inc, 
		);

		$this->db->insert('tbl_history', $data_history); 

		$data=$this->model_inc->hapus_aksi_inc($kode_inc);
		echo json_encode($data);
}



}
