<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')==FALSE) {
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');	
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('absensi/tampilan_absensi');  
		$this->load->view('template/footer');
	}
	
	public function hari($d = 0)
	{
		$hari_arr = [
			'Monday' => 'Senin',
			'Tuesday' => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jum\'at',
			'Saturday' => 'Sabtu',
			'Sunday' => 'Minggu',
		];

		if ($d !== 0) {
			return $hari_arr[$d];
		}
		return $hari_arr;
	}

	
	public function hari_bulan($bulan, $tahun)
	{
		$kalender = CAL_GREGORIAN;
		$jml_hari = cal_days_in_month($kalender, $bulan, $tahun);
		$hari_tgl = [];

		for ($i=1; $i <= $jml_hari; $i++) { 
			$tgl = $i . '-' . $bulan . '-' . $tahun;
			$hari_tgl[] = [
				'hari' => $this->hari(date('l', strtotime($tgl))),
				'tgl' => date('Y-m-d', strtotime($tgl))
			];
		}
		return $hari_tgl;
	}


	public function hapus_absensi()
	{
		$this->db->where('kode_absensi',$this->input->post('kode_absensi_hapus'));
		$result = $this->db->delete('tbl_absensi');
		if ($result) {
			$notif['title'] = 'Berhasil';
			$notif['text'] = 'Data Absensi Berhasil Dihapus!';
			$notif['icon'] = 'success';
		}else{
			$notif['title'] = 'Gagal';
			$notif['text'] = 'Data Absensi Gagal Dihapus!';
			$notif['icon'] = 'error';
		}	
		$this->session->set_flashdata($notif);
		redirect('absensi');
	}
	
	public function laporan_absensi()
	{
		$karyawan = $this->uri->segment(3);
		$this->db->select('kode,nama_admin');
		$this->db->where('kode',$karyawan);
		$data['karyawan'] =$this->db->get('tbl_admin')->result();

		$tanggal = explode('-',$this->uri->segment(4));

		$bulan = $tanggal[1];
		$tahun = $tanggal[0];
		$this->db->where('id_user',$karyawan);
		$this->db->where('MONTH(tanggal_absensi)',$bulan);
		$this->db->where('YEAR(tanggal_absensi)',$tahun);
		$this->db->where('type_absen','Masuk');
		$data['absen_masuk'] =$this->db->get('tbl_absensi')->result();

		$data['bulan_absen'] = $bulan;
		$data['tahun_absen'] = $tahun;
		$this->db->where('id_user',$karyawan);
		$this->db->where('MONTH(tanggal_absensi)',$bulan);
		$this->db->where('YEAR(tanggal_absensi)',$tahun);
		$this->db->where('type_absen','Pulang');
		$data['absen_pulang'] =$this->db->get('tbl_absensi')->result();

		$data['list_hari'] = $this->hari_bulan($bulan,$tahun);
		$this->load->view('absensi/laporan_absensi',$data);  
	}


	public function tabel_absensi(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'kode_absensi';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('absensi',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;
			$opsi ='<div class="btn-group">';
			if ($l->lampiran_absen!='') {
				$opsi.='<a target="_blank" href="'.base_url().$l->lampiran_absen.'" class="btn btn-success btn-sm btn-flat item_lampiran_absensi"><i class="fas fa-eye mr-2"></i>Lihat Foto</a>';
			}

			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:void(0)" class="btn btn-danger btn-sm btn-flat item_hapus_absensi" data="'.$l->kode_absensi.'"><i class="fas fa-trash "></i></a>';
			}


			$opsi.='</div>';
			$l->opsi=$opsi;			
			$data[] = $l;


		}
		$output = array(
		"draw"              => $_GET['draw'],
		"recordsTotal"      => $this->model_tabel->count_all('absensi',$sort,$order,$search),
		"recordsFiltered"   => $this->model_tabel->count_filtered('absensi',$sort,$order,$search),
		"data"              => $data,
		);  
		echo json_encode($output); 
	}


	
	public function lembur()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('absensi/tampilan_lembur');  
		$this->load->view('template/footer');
	}
	
	
	
	
	public function ambil_data_lembur(){
		$draw=$_REQUEST['draw'];
		$start=$_REQUEST['start'];
		$length=$_REQUEST['length'];
		$search=$_REQUEST['search']["value"];
		if ($this->session->level=="teknisi") {
			$this->db->where('id_user',$this->session->id_user);
		}
		$total=$this->db->count_all_results("tbl_lembur");
		$this->db->select('a.*,b.*,c.nama_lengkap');
		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
			$this->db->like("a.kode_lembur",$search);
			$this->db->or_like("a.tanggal_lembur",$search);
			$this->db->or_like("a.keterangan_lembur",$search);
			$this->db->or_like("c.nama_lengkap",$search);
			$this->db->or_like("a.kode_tiket",$search);
			$this->db->or_like("a.tanggal_selesai",$search);
		}

		$this->db->limit($length,$start);
		$sortdata = $_REQUEST['sortdata'];
		$filterdata = $_REQUEST['filterdata'];
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
			}else{
				$this->db->order_by('kode_lembur','DESC');
			}
			$this->db->join('tbl_tiket b','b.kode_tiket=a.kode_tiket','left');
			$this->db->join('tbl_user c','c.id_user=a.id_user');
			if ($this->session->level=="teknisi") {
				$this->db->where('a.id_user',$this->session->id_user);
			}
			$query = $this->db->get('tbl_lembur a');
			if($search!=""){
				$this->db->like("a.kode_lembur",$search);
				$this->db->or_like("a.tanggal_lembur",$search);
				$this->db->or_like("a.keterangan_lembur",$search);
				$this->db->or_like("c.nama_lengkap",$search);
				$this->db->or_like("a.kode_tiket",$search);
				$this->db->or_like("a.tanggal_selesai",$search);
				$this->db->join('tbl_tiket b','b.kode_tiket=a.kode_tiket');
				$this->db->join('tbl_user c','c.id_user=a.id_user');
				if ($this->session->level=="teknisi") {
					$this->db->where('a.id_user', $this->session->id_user);
				}
				$jum=$this->db->get('tbl_lembur a');
				$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
			}
			$nomor_urut=$start+1;

			foreach ($query->result_array() as $list) {
				$opsi='<div class="btn-group">';

				if ($this->session->level=="admin") {
					$opsi.='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_hapus_lembur" data="'.$list['kode_lembur'].'"><i class="fa fa-trash"></i></a>';
				}
				if ($list['lampiran_kunjungan']!='') {
					$opsi.='<a target="_blank" href="'.base_url().$list['lampiran_kunjungan'].'" class="btn btn-success btn-sm btn-flat item_lampiran_kunjungan"><i class="fas fa-eye mr-2"></i>Lihat Foto</a>';
					$foto = '<img src="'.base_url().$list['lampiran_kunjungan'].'" width="55px">';
					}else{
						$foto='';
					}
					$opsi.='</div>';

					$output['data'][]=array(
					$nomor_urut,
					date_format(date_create($list['tanggal_lembur']),'d-m-Y'),
					$list['nama_lengkap'],
					$list['kode_tiket'],
					date_format(date_create($list['tanggal_lembur']),'H:i:s'),
					date_format(date_create($list['tanggal_selesai']),'H:i:s'),
					$list['keterangan_lembur'],

					$foto,
					$opsi
					);
					$nomor_urut++;
				}
				echo json_encode($output);
			}




			public function tambah()
			{
				$data['absen_masuk'] = $this->model_absensi->get_absen('Masuk');
				$data['absen_pulang'] = $this->model_absensi->get_absen('Pulang');
				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('absensi/tambah_absensi',$data);  
				$this->load->view('template/footer');
			}
			public function simpan_lembur()
			{
				$data_lembur =array(
				'kode_tiket'=>$this->input->post('tiket_lembur'),
				'id_user'=>$this->session->id_user,
				'keterangan_lembur'=>$this->input->post('keterangan_lembur'),
				);
				$result = $this->db->insert('tbl_lembur',$data_lembur);
				if ($result) {
					$notif['title'] = 'Berhasil';
					$notif['text'] = 'Pengajuan Lembur Berhasil Disimpan!';
					$notif['icon'] = 'success';
					}else{
						$notif['title'] = 'Gagal';
						$notif['text'] = 'Pengajuan Lembur Gagal Disimpan!';
						$notif['icon'] = 'error';
					}	
					$this->session->set_flashdata($notif);
					redirect('absensi/lembur');

				}

				public function tambah_lembur()
				{
					$this->db->where('a.id_user',$this->session->id_user);
					$this->db->where('a.status_tiket','Proses');
					$this->db->where('a.tanggal_tiket',date('Y-m-d'));

					$this->db->join('tbl_wo b','b.kode_wo=a.kode_wo');
					$data['tiket']=$this->db->get('tbl_tiket a')->result();
					$this->load->view('template/header');
					$this->load->view('template/sidebar');
					$this->load->view('absensi/tambah_lembur',$data);  
					$this->load->view('template/footer');
				}

				public function pin_point()
				{
					$data['titik_absen'] = $this->db->get('tbl_titik_absen')->result();
					$this->load->view('template/header');
					$this->load->view('template/sidebar');
// 		$this->load->view('absensi/titik_absensi',$data);  
					$this->load->view('absensi/pin_point',$data);  
					$this->load->view('template/footer');
				}

				public function hapus_titik_point()
				{
					$this->db->where('kode_titik_absen',$this->input->post('kode_titik_hapus'));
					$result = $this->db->delete('tbl_titik_absen');
					if ($result) {
						$notif['title'] = 'Berhasil';
						$notif['text'] = 'Titik Absensi Berhasil Dihapus!';
						$notif['icon'] = 'success';
						}else{
							$notif['title'] = 'Gagal';
							$notif['text'] = 'Titik Absensi Gagal Dihapus!';
							$notif['icon'] = 'error';
						}	
						$this->session->set_flashdata($notif);
						redirect('absensi/pin_point');
					}

					public function simpan_absensi()
					{

						if (!is_dir('assets/img/foto_absen/')) {
							mkdir('assets/img/foto_absen/');
						}

						$response = '';
						if($_FILES['lampiran']['name'] != '')
						{
							$filename = trim($_FILES['lampiran']['name']);
							$tgl =explode('-',date('Y-m-d'));
							$awalan = $tgl[0].$tgl[1].$tgl[2].time();
							$location ='assets/img/foto_absen/'.$awalan.time().$filename;
							$file_extension = pathinfo($location, PATHINFO_EXTENSION);
							$file_extension = strtolower($file_extension);
							$image_ext = array("jpg", "png", "jpeg", "gif");
							if (in_array($file_extension, $image_ext)) {
								if (move_uploaded_file($_FILES['lampiran']['tmp_name'], $location)) {
									$response = $location;
								}
							}
						}


						$data_absensi =array(

						'tanggal_absensi'   =>date('Y-m-d'),
						'jam'               =>date('H:i:s'),
						'type_absen'        =>$this->input->post('jenis_absen'),
						'id_user'           =>$this->session->kode,
						'lampiran_absen'    =>trim($response),
						);

						$result = $this->db->insert('tbl_absensi',$data_absensi);
						if ($result) {
							$notif['title'] = 'Berhasil';
							$notif['text'] = 'Absensi Berhasil Ditambahkan!';
							$notif['icon'] = 'success';
							}else{
								$notif['title'] = 'Gagal';
								$notif['text'] = 'Absensi Gagal Ditambahkan!';
								$notif['icon'] = 'error';
							}	
							$this->session->set_flashdata($notif);
							redirect('absensi');
						}
						public function simpan_titik_point()
						{
							$data = array(
							'latitude' => $this->input->post('koordinatx'), 
							'longitude' => $this->input->post('koordinaty'), 
							'alamat_lengkap' => $this->input->post('namatempat'), 

							);

							$result = $this->db->insert('tbl_titik_absen',$data);
							if ($result) {
								$notif['title'] = 'Berhasil';
								$notif['text'] = 'Titik Absensi Berhasil Ditambahkan!';
								$notif['icon'] = 'success';
								}else{
									$notif['title'] = 'Gagal';
									$notif['text'] = 'Titik Absensi Gagal Ditambahkan!';
									$notif['icon'] = 'error';
								}	
								$this->session->set_flashdata($notif);
								redirect('absensi/pin_point');
							}
						}
