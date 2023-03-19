<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_obat extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');

			redirect('dashboard','refresh');
		}elseif($this->session->level!='superadmin' && $this->session->level!='kasir' && $this->session->level!='farmasi' ) {
			echo "<script> alert('Tidak Ada Akses Untuk Menu ini');
			history.back();
			</script>";

		}
		date_default_timezone_set('Asia/Jakarta');	
		
	}


	public function index()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengakses Menu Pembelian Obat", 
		);

		$this->db->insert('tbl_history', $data_history); 


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pembelian_obat/tampilan_pembelian_obat');
		$this->load->view('template/footer');
	}

	public function tampil_data_pembelian()
	{
		$data = $this->model_pembelian_obat->tampil_data_pembelian(); 
		echo json_encode($data);  
	}


	public function tabel_pembelian(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'nama_pembeli';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('pembelian_obat',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;
			
		$opsi='
			<div class="btn-group">
			<a  href="'.base_url().'pembelian_obat/cetak_pembelian/'.$l->kode_beli.'" target="_blank" class="btn btn-sm btn-success     btn-flat item_edit_user" data="'.$l->kode_beli.'"><i class="fa fa-eye"></i></a> ';
			
			if ($this->session->level=="superadmin") {
			$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus_pembelian" data="'.$l->kode_beli.'">  <i class="fas fa-trash"></i> </a>';
		}
			$opsi.='</div>';
        $l->opsi = $opsi;


        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('pembelian_obat',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('pembelian_obat',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}



	public function tambah_pembelian_obat()
	{	$data['obat'] = $this->model_pembelian_obat->getnamaobat(); 	 
	$this->load->view('template/header');
	$this->load->view('template/sidebar');
	$this->load->view('pembelian_obat/tambah_pembelian_obat',$data);
	$this->load->view('template/footer');
}


public function simpanrekam_pembelian()
{
	date_default_timezone_set('Asia/Jakarta');	
	$this->load->helper('url');
	$total_akhir = str_replace('.', '',$this->input->post('total_akhir_pembelian'));
	$diskon = str_replace('.', '',$this->input->post('discount_pembelian'));
	$kode_beli = $this->model_pembelian_obat->buat_kode_pembeli();

	$nama_pembeli =	$this->input->post('nama_pembeli');   
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
			$stok_baru = floatval($stok_obat) - floatval($kuantiti);
			$aturan = $aturan_pakai[$i];
			$takar = $takaran[$i];
			$pemakaian = $hari[$i];
			$jual = str_replace('.', '', $harga_jual[$i]);
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
				'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_beli,
			);
			$this->db->insert('tbl_log_stok_obat',$data_log_stok);
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
							'kode_rekam' => $kode_beli,
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
							'kode_rekam' => $kode_beli,
							'kode_obat' => $kode_obat,  				
							'qty' => $exp->qty,
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

	$data_pembelian= array(
		'kode_beli' =>$kode_beli, 
		'nama_pembeli' =>$this->input->post('nama_pembeli'), 
		'no_telepon' => $this->input->post('no_telepon'), 
		'tanggal_pembelian' => date("Y-m-d H:i:s"), 
		'discount' =>$diskon,
		'total_akhir' =>$total_akhir, 
	); 

	$simpan_pembelian =$this->db->insert('tbl_pembelian_obat',$data_pembelian); 

	if ($simpan_pembelian) {
		$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
		$tanggal_pembelian = date("Y-m-d H:i:s");
		$bayar = array(
			'kode_pembayaran' => $kode_pembayaran, 
			'kode_pasien' => $nama_pembeli, 
			'kode_rekam' => $kode_beli, 
			'tanggal_pembayaran' => $tanggal_pembelian, 
			'tanggal_checkout' => $tanggal_pembelian, 
			'total_pembayaran' => $total_akhir, 
			'status_pembayaran' => 'LUNAS');

		$hasil =$this->db->insert('tbl_pembayaran',$bayar); 

		if ($hasil) {

			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menambah Data Pembelian Obat dengan Kode ".$kode_beli, 
			);

			$this->db->insert('tbl_history', $data_history); 

			$data['title'] = 'Berhasil';
			$data['text'] = 'Data Berhasil di Simpan';
			$data['icon'] = 'success';

			// echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
			$this->session->set_flashdata($data);
			redirect('pembelian_obat','refresh');
		}
	}

}


public function cetak_pembelian()
{
	$kode_beli= $this->uri->segment(3); 
	$data ['struk_pembelian']= $this->model_pembelian_obat->rincikan_pembelian_struk($kode_beli);
	$data['list_obat'] = $this->model_pembelian_obat->list_obat($kode_beli);  
	$this->load->view('pembelian_obat/struk_pembelian',$data); 

}


public function hapus()
{
	$kode_beli=$this->input->post('kode_beli');
	$data_history = array(
		'kode_user' => $this->session->kode, 
		'ip_address'=>get_ip(),
		'aktivitas' => "Menghapus Data Pembelian Obat dengan Kode ".$this->input->post('kode_beli'), 
	);

	$this->db->insert('tbl_history', $data_history);

// ambil data obat sebelumnya

	$this->db->where('kode_rekam', $kode_beli);
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
					'keterangan'=>'Pengembalian Stok Obat Dengan Kode Pembelian : '.$kode_beli.' yang dihapus',
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
	$this->db->where('kode_rekam',$kode_beli);
	$this->db->delete('tbl_pembayaran');

	$this->db->where('kode_beli',$kode_beli);
	$data = $this->db->delete('tbl_pembelian_obat');
	echo json_encode($data);

}





}
