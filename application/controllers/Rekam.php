<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekam extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');

			redirect('dashboard','refresh');
		}elseif($this->session->level!='superadmin' && $this->session->level!='dokter' ) {
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
			'aktivitas' => "Mengakses Menu Rekam Medik Umum", 
		);

		$this->db->insert('tbl_history', $data_history); 

		$this->load->view('template/header');
		$this->load->view('template/sidebar');

		$this->load->view('rekam/tampilan_rekam_medik');
		$this->load->view('template/footer');

	}

	public function rujuk_pasien()
	{
		$kode_rekam = $this->input->post('kode_rekam_rujuk');

		$this->db->select('a.kode_pasien,b.tanggal_lahir,a.tanggal_berobat');
		$this->db->where('a.kode_rekam',$kode_rekam);
		$this->db->join('tbl_pasien b', 'b.kode_pasien=a.kode_pasien');
		$data_pasien = $this->db->get('tbl_rekam_medik a')->result();
		foreach ($data_pasien as $key) {
			$tgl_lahir = $key->tanggal_lahir;
			$kode_pasien = $key->kode_pasien;
			$tanggal_berobat = $key->tanggal_berobat;

		}


		$tanggal_rujukan = date('Y-m-d');

		$rekam_akhir ='';
		$kode_rujukan = $this->model_rujukan->buat_kode();

		$jenis_rujukan = $this->input->post('jenis_rujukan');
		$umur = 0;
		$hitung_umur = date_diff(date_create($tanggal_rujukan),date_create($tgl_lahir));

		if ($hitung_umur->y <=0 ) {
			$umur =  $hitung_umur->m." Bulan";
		}else{
			if ($hitung_umur->m <=0) {
				$umur =  $hitung_umur->y." Tahun";
				
			}else{
				$umur =  $hitung_umur->y.".".$hitung_umur->m." Tahun";

			}

		}

		if ($jenis_rujukan=="RAWAT INAP") {
			
			$kode_ranap =  $this->model_pasien->get_kode_ranap(); 
					// ttd 
			$waktu = strval('assets\img\ttd_app\gambar0'.time().'.png');
			file_put_contents($waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd0') ) ) );
		// ttd1
			$waktu1 = strval('assets\img\ttd_app\gambar2'.time().'.png');
			file_put_contents($waktu1, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd1') ) ) );
		// ttd2
			$waktu2 = strval('assets\img\ttd_app\gambar3'.time().'.png');
			file_put_contents($waktu2, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd2') ) ) );

			if ($this->input->post('persetujuan_rawat')=="menyetujui") {
				$status_pasien="Belum Diperiksa";

			}else{
				$status_pasien="Ditolak";

			}

			$data_ranap= array(
				'kode_ranap' =>$kode_ranap,
				'kode_pasien' =>$kode_pasien,
				'status_pasien' =>$status_pasien,
				'tanggal_berobat' =>$tanggal_berobat,
				'nama_approval' =>$this->input->post('nama_approval'),
				'umur_approval' =>$this->input->post('umur_approval'),
				'hubungan_dengan_pasien' =>$this->input->post('hubungan_dengan_pasien'),
				'nik_approval' =>$this->input->post('nik_approval'),
				'ruang_rawat' =>$this->input->post('ruang_rawat'),
				'nama_saksi1' =>$this->input->post('nama_saksi1'),
				'nama_saksi2' =>$this->input->post('nama_saksi2'),
				'persetujuan_rawat' =>$this->input->post('persetujuan_rawat'),
				'ttd_saksi1'=>trim($waktu),
				'ttd_approval'=>trim($waktu1),
				'ttd_saksi2'=>trim($waktu2),
				'jenis_kelamin_approval' =>$this->input->post('jenis_kelamin_approval'),
				'tanggal_persetujuan' =>date('Y-m-d'),
			); 

			$insert=$this->db->insert('tbl_ranap',$data_ranap);

		}

		if($jenis_rujukan=="HOME CARE") {

			if ($this->input->post('persetujuan_rawat')=="menyetujui") {
				$status_pasien="Belum Diperiksa";

			}else{
				$status_pasien="Ditolak";

			}
			
			$kode_homecare =  $this->model_pasien->get_kode_homecare(); 
					// ttd 
			$waktu = strval('assets\img\ttd_app\gambar0'.time().'.png');
			file_put_contents($waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd0') ) ) );
		// ttd1
			$waktu1 = strval('assets\img\ttd_app\gambar2'.time().'.png');
			file_put_contents($waktu1, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd1') ) ) );
		// ttd2
			$waktu2 = strval('assets\img\ttd_app\gambar3'.time().'.png');
			file_put_contents($waktu2, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd2') ) ) );
			$data_homecare= array(
				'kode_homecare' =>$kode_homecare,
				'kode_pasien' =>$kode_pasien,
				'status_pasien' =>$status_pasien,
				'tanggal_berobat' =>$tanggal_berobat,
				'nama_approval' =>$this->input->post('nama_approval'),
				'umur_approval' =>$this->input->post('umur_approval'),
				'hubungan_dengan_pasien' =>$this->input->post('hubungan_dengan_pasien'),
				'nik_approval' =>$this->input->post('nik_approval'),
				'ruang_rawat' =>$this->input->post('ruang_rawat'),
				'nama_saksi1' =>$this->input->post('nama_saksi1'),
				'nama_saksi2' =>$this->input->post('nama_saksi2'),
				'persetujuan_rawat' =>$this->input->post('persetujuan_rawat'),
				'ttd_saksi1'=>trim($waktu),
				'ttd_approval'=>trim($waktu1),
				'ttd_saksi2'=>trim($waktu2),
				'jenis_kelamin_approval' =>$this->input->post('jenis_kelamin_approval'),
				'tanggal_persetujuan' =>date('Y-m-d'),
			); 

			$insert=$this->db->insert('tbl_homecare',$data_homecare); 

		}


		$data = array(
			'kode_rujukan' => $kode_rujukan, 
			'tanggal_rujukan' => $tanggal_rujukan, 
			'kode_pasien' => $kode_pasien, 
			'rekam_awal' => $kode_rekam, 
			'rekam_akhir' => $rekam_akhir, 
			'jenis_rujukan' => $jenis_rujukan, 
			'nama_rs' => $this->input->post('nama_rs'),
			'alamat_rs' => $this->input->post('alamat_rs'), 
			'status_rujukan' => "Belum Dicetak", 
			'keluhan' => $this->input->post('keluhan_pasien'),
			'diagnosa' => $this->input->post('diagnosa_pasien'), 
			'terapi' => $this->input->post('terapi_pasien'), 
			'dokter_perujuk' => $this->session->userdata('nama_admin'), 
			'umur_pasien' => $umur, 

		);

		$hasil = $this->db->insert('tbl_rujukan',$data);
		if ($hasil) {
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Melakukan Rujukan Pasien Rekam Medik Umum dengan kode ".$kode_pasien, 
			);

			$this->db->insert('tbl_history', $data_history); 

			$data['title'] = 'Berhasil';
			$data['text'] = 'Pasien Berhasil di Rujuk';
			$data['icon'] = 'success';

			$this->db->where('kode_rekam',$kode_rekam);
			$this->db->delete('tbl_rekam_medik');

		}else{
			$data['title'] = 'Gagal';
			$data['text'] = 'Pasien Gagal di Rujuk';
			$data['icon'] = 'error';

		}

		$this->session->set_flashdata($data); 
		redirect('rekam','refresh');

	}


	public function tabel_umum_belum_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'tanggal_berobat';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('umum_belum_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;
			$opsi='
			<div class="btn-group">'; 
			$opsi.='<a href="'.base_url().'rekam/periksa_pasien/'.$l->kode_rekam.'"  class="btn btn-success btn-sm btn-flat"style="font-weight: bold; background:#ff5722;color:white" data="'.$l->kode_rekam.'" > <i class="fas fa-capsules mr-1"></i> Periksa Pasien</a>';
			$opsi.='<a href="#"  class="btn btn-primary btn-sm btn-flat item_rujuk_pasien"style="font-weight: bold; background:#ff5722;color:white" data-kode="'.$l->kode_rekam.'" data-pasien="'.$l->nama_pasien.'"> <i class="fas fa-exchange-alt mr-2"></i> Rujuk Pasien</a>';
			if ($this->session->level=="superadmin") {
				$opsi.='<a href="javascript:;" class="btn btn-sm btn-danger btn-flat item_hapus" data="'.$l->kode_rekam.'">  <i class="fas fa-trash"></i> </a>';  
			}
			$opsi.='</div>';
			$l->opsi = $opsi;



			$data[] = $l;

		}
		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('umum_belum_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('umum_belum_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}

	public function tabel_umum_sudah_periksa(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'date_time_update';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'desc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('umum_sudah_periksa',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;

			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 


			<a href="'.base_url().'rekam/detail_rekam_pasien/'.$l->kode_rekam.'" class="btn btn-success btn-sm  btn-flat item_rekam_medik "style="font-weight: bold;" data="'.$l->kode_rekam.'" target="_blank"> <i class="fa fa-eye mr-2"></i> Detail</a>';

			if ($l->status_pembayaran!="LUNAS") {
				$opsi.='<a href="'.base_url().'rekam/item_edit_rekam/'.$l->kode_rekam.'" class="btn btn-secondary btn-sm  btn-flat item_edit_rekam "style="font-weight: bold;" data="'.$l->kode_rekam.'" > <i class="fa fa-edit mr-2"></i> Edit Data </a>';
			}
			$opsi.='</div>';


			$l->opsi = $opsi;



			$data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('umum_sudah_periksa',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('umum_sudah_periksa',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}





	public function laporan_kkbptm()
	{
		$tgl= explode('-', $this->uri->segment(3));
		$tahun = $tgl[0];
		$bulan = $tgl[1];

		$rekam_penyakit = $this->model_rekam->get_rekam_penyakit($tahun,$bulan);
		$penyakit = $this->model_rekam->get_penyakit();

		$data['penyakit']=[];

		foreach ($penyakit as $key) {
			$data['penyakit']['nama_penyakit'][]=$key->nama_penyakit;
			$data['penyakit']['meninggal_laki'][]=0;
			$data['penyakit']['meninggal_perempuan'][]=0;
			$jumlah_penyakit=0;
			$jumlah_penyakit_laki=0;
			$jumlah_penyakit_perempuan=0;

			$jumlah_penyakit_laki_19=0;
			$jumlah_penyakit_perempuan_19=0;

			$jumlah_penyakit_laki_44=0;
			$jumlah_penyakit_perempuan_44=0;


			$jumlah_penyakit_laki_54=0;
			$jumlah_penyakit_perempuan_54=0;

			$jumlah_penyakit_laki_59=0;
			$jumlah_penyakit_perempuan_59=0;

			$jumlah_penyakit_laki_60=0;
			$jumlah_penyakit_perempuan_60=0;

			foreach ($rekam_penyakit as $row) {
				if ($row->kode_penyakit==$key->kode_penyakit) {
					$jumlah_penyakit+=1;
					$birthDate = new DateTime($row->tanggal_lahir);
					$today = new DateTime("today");
					if ($birthDate > $today) { 
						exit("0 tahun 0 bulan 0 hari");
					}

					$y = $today->diff($birthDate)->y;
					$m = $today->diff($birthDate)->m;
					$d = $today->diff($birthDate)->d;
					$umur = $y.".".$m;

					if($row->jk=="L")
					{
						$jumlah_penyakit_laki+=1;


						if (floatval($umur) < 20 ) {
							$jumlah_penyakit_laki_19+=1;
						}

						else if (floatval($umur) < 45 ) {
							$jumlah_penyakit_laki_44+=1;
						}

						else if (floatval($umur) < 55 ) {
							$jumlah_penyakit_laki_54+=1;
						}

						else if (floatval($umur) < 60 ) {
							$jumlah_penyakit_laki_59+=1;
						}

						else if (floatval($umur) >= 60 ) {
							$jumlah_penyakit_laki_60+=1;
						}


					}else{
						$jumlah_penyakit_perempuan+=1;

						if (floatval($umur) < 20 ) {
							$jumlah_penyakit_perempuan_19+=1;
						}

						else if (floatval($umur) < 45 ) {
							$jumlah_penyakit_perempuan_44+=1;
						}

						else if (floatval($umur) < 55 ) {
							$jumlah_penyakit_perempuan_54+=1;
						}

						else if (floatval($umur) < 60 ) {
							$jumlah_penyakit_perempuan_59+=1;
						}

						else if (floatval($umur) >= 60 ) {
							$jumlah_penyakit_perempuan_60+=1;
						}

					}

				}


			}
			$data['penyakit']['jumlah_penyakit'][]=$jumlah_penyakit;
			
			$data['penyakit']['jumlah_penyakit_laki'][]=$jumlah_penyakit_laki;

			$data['penyakit']['jumlah_penyakit_perempuan'][]=$jumlah_penyakit_perempuan;

			$data['penyakit']['jumlah_penyakit_laki_19'][]=$jumlah_penyakit_laki_19;
			$data['penyakit']['jumlah_penyakit_laki_44'][]=$jumlah_penyakit_laki_44;
			$data['penyakit']['jumlah_penyakit_laki_54'][]=$jumlah_penyakit_laki_54;
			$data['penyakit']['jumlah_penyakit_laki_59'][]=$jumlah_penyakit_laki_59;
			$data['penyakit']['jumlah_penyakit_laki_60'][]=$jumlah_penyakit_laki_60;

			$data['penyakit']['jumlah_penyakit_perempuan_19'][]=$jumlah_penyakit_perempuan_19;
			$data['penyakit']['jumlah_penyakit_perempuan_44'][]=$jumlah_penyakit_perempuan_44;
			$data['penyakit']['jumlah_penyakit_perempuan_54'][]=$jumlah_penyakit_perempuan_54;
			$data['penyakit']['jumlah_penyakit_perempuan_59'][]=$jumlah_penyakit_perempuan_59;
			$data['penyakit']['jumlah_penyakit_perempuan_60'][]=$jumlah_penyakit_perempuan_60;

		}

		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;

		$this->load->view('rekam/laporan_kkbptm',$data);
		$paper_size = 'A3';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->load->library('pdfgenerator');
		$this->pdfgenerator->generate_view($html, strtoupper("Laporan KKB PTM-".$bulan."-".$tahun), TRUE, $paper_size, $orientation);



	}



	public function ambil_data_rekam2()


	{

		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];

		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		$this->db->select('a.*,b.nama_pasien');
		$this->db->where('a.status_pasien','Sudah Diperiksa');
		$this->db->limit($length,$start);
		$this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
		// $this->db->join('tbl_pembayaran g','g.kode_rekam = a.kode_rekam');
		if($search!=""){
			$this->db->like("a.kode_rekam",$search);
			$this->db->like("a.status_pasien","Sudah Diperiksa");
			$this->db->or_like("b.nama_pasien",$search);
			$this->db->like("a.status_pasien","Sudah Diperiksa");

			$this->db->or_like("a.dokter_pemeriksa",$search);
			$this->db->like("a.status_pasien","Sudah Diperiksa");

			$this->db->or_like("a.tanggal_periksa",$search);
			$this->db->like("a.status_pasien","Sudah Diperiksa");
		}



		$sortdata = $_REQUEST['sortdata2'];
		$filterdata = $_REQUEST['filterdata2'];

		

		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('a.id','DESC');
		}

		$query = $this->db->get('tbl_rekam_medik a');

		if($search!=""){

			$this->db->like("d.kode_rekam",$search);
			$this->db->like("d.status_pasien","Sudah Diperiksa");
			$this->db->or_like("e.nama_pasien",$search);
			$this->db->like("d.status_pasien","Sudah Diperiksa");

			$this->db->or_like("d.dokter_pemeriksa",$search);
			$this->db->like("d.status_pasien","Sudah Diperiksa");

			$this->db->or_like("d.tanggal_periksa",$search);
			$this->db->like("d.status_pasien","Sudah Diperiksa");

			$this->db->join('tbl_pasien e','e.kode_pasien = d.kode_pasien');
			$total = $this->db->get('tbl_rekam_medik d')->num_rows();

		}else{
			$this->db->where('d.status_pasien','Sudah Diperiksa');
			$total=$this->db->count_all_results("tbl_rekam_medik d");
		}

		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;

		$output['data']=array();
		$nomor_urut=$start+1;
		foreach ($query->result_array() as $rekamdua) {

			$status = '';
			$this->db->where('kode_rekam',$rekamdua['kode_rekam']);
			$pembayaran = $this->db->get('tbl_pembayaran');
			if ($pembayaran->num_rows() > 0) {
				foreach ($pembayaran->result() as $key) {
					$status= $key->status_pembayaran;
				}
				
			}


			$opsi='
			<div class="btn-group">'; 
			$opsi.=' 

			<a href="javascript:;" class="btn btn-success btn-sm  btn-flat item_rekam_medik "style="font-weight: bold;" data="'.$rekamdua['kode_rekam'].'" > <i class="fa fa-eye"></i> Detail</a>';
			if ($status!="LUNAS") {
				$opsi.='<a href="#" class="btn btn-secondary btn-sm  btn-flat item_edit_rekam "style="font-weight: bold;" data="'.$rekamdua['kode_rekam'].'" > <i class="fa fa-edit"></i> Edit Data </a>';
			}
			$opsi.='</div>';
			$output['data'][]=array(
				$nomor_urut,
				$rekamdua['kode_rekam'],
				$rekamdua['nama_pasien'],
				$rekamdua['dokter_pemeriksa'],
				$rekamdua['tanggal_periksa'], 
				$opsi,


			);
			$nomor_urut++;
		}

		echo json_encode($output);
	} 


	
	public function riwayat_rekam_pasien(){
		$kode_pasien =$this->input->get('kode_pasien');
		$kategori =$this->input->get('kategori');
		if ($kategori=='umum') {
			$hasil = $this->model_rekam->getriwayatpasien($kode_pasien);
		}

		$data['riwayat']='';
		$data['list']='';
		$i=0;

		foreach ($hasil as $key) {
			
			$data['riwayat'].='<tr style="text-align:center" class="head_riwayat'.$i.'">'.
			'<td class="riwayat riwayat'.$i.'" data="'.$i.'" onclick="showdetail('.$i.')"><i class="fa fa-eye text-dark"></i></td>'.
			'<td id="kode_rekam'.$i.'">'.$key->kode_rekam.'</td>'.
			// '<td>'.$key->kode_rekam.'</td>'.
			'<td>'.$key->tanggal_berobat.'</td>'.
			'<td>'.$key->tanggal_periksa.'</td>'.
			'</tr>';


			$i++;
		}

		echo json_encode($data);

	}

	public function detail_riwayat($kode)
	{
		$kode_rekam = str_replace('garing','/',$kode);  
		$data['detail_rekam_pasien_umum'] = $this->model_rekam->detail_rekam_umum($kode_rekam);
		$data['detail_obat'] = $this->model_rekam->detail_obat($kode_rekam)	;
		$this->load->view('rekam/detail_riwayat_umum',$data);
	}

	public function rekam_bytahun()
	{
		$pasien= $this->uri->segment(3);
		$tahun= $this->uri->segment(4);
		$data['rekam']=$this->model_rekam->getrekampertahun($pasien,$tahun);
		$data['obat']=$this->model_rekam->getobatpertahun($pasien,$tahun);
		$data['pasien']=$this->model_pasien->edit_pasien($pasien);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam/laporan_rekam_medik',$data);
		$this->load->view('template/footer');
	}

	public function tampil_data_rekam()
	{
		$data = $this->model_rekam->tampil_data_rekam(); 
		echo json_encode($data);  
	}

	public function periksa_pasien($kode)
	{ 
		$kode_rekam = $this->uri->slash_segment(3).$this->uri->segment(4); 
		$data['periksa_pasien']= $this->model_rekam->periksa_pasien($kode_rekam);   	
		$data['obat'] = $this->model_rekam->getnamaobat(); 	
		$data['aturan_pakai'] = $this->db->get('tbl_aturan_pakai')->result(); 
		$data['racikan'] = $this->db->get('tbl_racikan')->result(); 	
		$data['penyakit'] = $this->model_rekam->get_penyakit();  
		$data['status_lab'] = $this->model_laboratorium->get_status_lab($kode_rekam); 	 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam/periksa_pasien',$data);
		$this->load->view('template/footer');
	}

	public function hapus_rekam()
	{
		$kode_rekam=$this->input->post('kode_rekam');
		$this->db->where('kode_rekam',$kode_rekam);
		$data = $this->db->delete('tbl_rekam_medik');

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Membatalkan Pemeriksaan Pasien Rekam Medik Umum dengan kode ".$kode_rekam, 
		);

		$this->db->insert('tbl_history', $data_history); 
		echo json_encode($data);

	}

	public function tampil_harga() 
	{
		$nama_obat 				= $_POST['nama_obat'];
		$data 					= $this->model_rekam->tampil($nama_obat);

		echo json_encode($data);
	}

	public function simpan_ttd()
	{
		$lokasi = base_url().'assets\img\ttd_app\gambar'.date("Y-m-d").'.png';
		$waktu = strval('assets\img\ttd_app\gambar'.time().'.png');
		$result = file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$_POST['image'] ) ) );
		echo trim($waktu);
	}
	public function get_data_obat_bykode()
	{
		$this->db->select('harga_jual,satuan_obat,total_stok,keterangan');
		$this->db->where('kode_obat',$this->input->get('kode_obat'));
		$data = $this->db->get('tbl_satuan_obat')->result();
		echo json_encode($data);
	}

	public function simpanrekam()
	{ 
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$kode_rekam = $this->input->post('kode_rekam'); 
		$kode_pasien = $this->input->post('kode_pasien'); 
		$stok =	$this->input->post('total_stok'); 
		$nama_obat= $this->input->post('nama_obat'); 
		$harga_jual= $this->input->post('harga_jual'); 
		$qty= $this->input->post('qty');
		$subtotal= $this->input->post('subtotal');
		$takaran= $this->input->post('takaran');
		$hari= $this->input->post('hari');
		$aturan_pakai= $this->input->post('aturan_pakai'); 
		$jenis_pemeriksaan = $this->uri->segment(3);
		if ($jenis_pemeriksaan=="lab") {
			$data_rekam= array(
				'tanggal_periksa' =>$this->input->post('tanggal_periksa'),
				'keluhan' => $this->input->post('keluhan'),
				'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
				'diagnosa' => $this->input->post('diagnosa'), 
				'tindakan_dokter' => $this->input->post('tindakan_dokter'),
				'penunjang' => $this->input->post('penunjang'),
				'penyakit' => $this->input->post('jenis_penyakit'),
				'total_akhir' =>$this->uri->segment(3),
				'dokter_pemeriksa' => $this->session->nama_admin,
				'upah_dokter' => $this->session->tarif_dokter
			);
			$this->db->set($data_rekam); 
			$this->db->where('kode_rekam',$kode_rekam); 
			$result= $this->db->update('tbl_rekam_medik'); 
			if ($result) {
				$kode_lab =$this->model_rekam->buat_kode();
				$data_lab  = array(
					'kode_lab'	=>$kode_lab,
					'kode_pasien' => $kode_pasien,
					'status_pasien' => 'Belum Diperiksa',
					'tanggal_berobat' => date('Y-m-d'),
					'pengirim' 		=> $this->session->nama_admin,
					'keterangan_pemeriksaan_lab' => $this->input->post('keterangan_pemeriksaan_lab'),
					'kode_rekam' => $kode_rekam,
				);
				$simpan = $this->db->insert('tbl_pemeriksaan_lab',$data_lab);
				if ($simpan) {

					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Mengajukan Pemeriksaan Lab Dari Rekam Medik Umum Dengan Kode ".$kode_lab, 
					);

					$this->db->insert('tbl_history', $data_history); 


					echo "<script type='text/javascript'>alert('Pengajuan Lab berhasil!');</script>";
					redirect('rekam','refresh');
				}
			}
		}else{
			


			if($this->input->post('rujuk_pasien')!=null)
			{

				
				$this->db->select('b.tanggal_lahir,a.tanggal_berobat');
				$this->db->where('a.kode_rekam',$kode_rekam);
				$this->db->join('tbl_pasien b', 'b.kode_pasien=a.kode_pasien');
				$data_pasien = $this->db->get('tbl_rekam_medik a')->result();
				foreach ($data_pasien as $key) {
					$tgl_lahir = $key->tanggal_lahir;
					$tanggal_berobat = $key->tanggal_berobat;
				}
				$tanggal_rujukan = date('Y-m-d');
				$rekam_akhir ='';
				$kode_rujukan = $this->model_rujukan->buat_kode();

				$jenis_rujukan = $this->input->post('rujuk_pasien');
				$umur = 0;
				$hitung_umur = date_diff(date_create($tanggal_rujukan),date_create($tgl_lahir));

				if ($hitung_umur->y <=0 ) {
					$umur =  $hitung_umur->m." Bulan";
				}else{
					if ($hitung_umur->m <=0) {
						$umur =  $hitung_umur->y." Tahun";

					}else{
						$umur =  $hitung_umur->y.".".$hitung_umur->m." Tahun";

					}

				}




				if($this->input->post('rujuk_pasien')=="RAWAT INAP")

				{

					$kode_ranap =  $this->model_pasien->get_kode_ranap(); 
					$rekam_akhir = $kode_ranap;
					$waktu = strval('assets\img\ttd_app\gambar0'.time().'.png');
					file_put_contents($waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd0') ) ) );
					$waktu1 = strval('assets\img\ttd_app\gambar2'.time().'.png');
					file_put_contents($waktu1, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd1') ) ) );
					$waktu2 = strval('assets\img\ttd_app\gambar3'.time().'.png');
					file_put_contents($waktu2, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd2') ) ) );

					if ($this->input->post('persetujuan_rawat')=="menyetujui") {
						$status_pasien="Belum Diperiksa";

					}else{
						$status_pasien="Ditolak";

					}

					$data_ranap= array(
						'kode_ranap' =>$kode_ranap,
						'kode_pasien' =>$kode_pasien,
						'status_pasien' =>$status_pasien,
						'tanggal_berobat' =>$tanggal_berobat,
						'nama_approval' =>$this->input->post('nama_approval'),
						'umur_approval' =>$this->input->post('umur_approval'),
						'hubungan_dengan_pasien' =>$this->input->post('hubungan_dengan_pasien'),
						'nik_approval' =>$this->input->post('nik_approval'),
						'ruang_rawat' =>$this->input->post('ruang_rawat'),
						'nama_saksi1' =>$this->input->post('nama_saksi1'),
						'nama_saksi2' =>$this->input->post('nama_saksi2'),
						'persetujuan_rawat' =>$this->input->post('persetujuan_rawat'),
						'ttd_saksi1'=>trim($waktu),
						'ttd_approval'=>trim($waktu1),
						'ttd_saksi2'=>trim($waktu2),
						'jenis_kelamin_approval' =>$this->input->post('jenis_kelamin_approval'),
						'tanggal_persetujuan' =>date('Y-m-d'),
					); 

					$insert=$this->db->insert('tbl_ranap',$data_ranap);


				}else if($this->input->post('rujuk_pasien')=="HOMECARE")

				{

					if ($this->input->post('persetujuan_rawat')=="menyetujui") {
						$status_pasien="Belum Diperiksa";

					}else{
						$status_pasien="Ditolak";

					}

					$kode_homecare =  $this->model_pasien->get_kode_homecare(); 
					$rekam_akhir = $kode_homecare;

					$waktu = strval('assets\img\ttd_app\gambar0'.time().'.png');
					file_put_contents($waktu, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd0') ) ) );

					$waktu1 = strval('assets\img\ttd_app\gambar2'.time().'.png');
					file_put_contents($waktu1, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd1') ) ) );

					$waktu2 = strval('assets\img\ttd_app\gambar3'.time().'.png');
					file_put_contents($waktu2, base64_decode( str_replace('data:image/png;base64,','',$this->input->post('isi_ttd2') ) ) );
					$data_homecare= array(
						'kode_homecare' =>$kode_homecare,
						'kode_pasien' =>$kode_pasien,
						'status_pasien' =>$status_pasien,
						'tanggal_berobat' =>$tanggal_berobat,
						'nama_approval' =>$this->input->post('nama_approval'),
						'umur_approval' =>$this->input->post('umur_approval'),
						'hubungan_dengan_pasien' =>$this->input->post('hubungan_dengan_pasien'),
						'nik_approval' =>$this->input->post('nik_approval'),
						'ruang_rawat' =>$this->input->post('ruang_rawat'),
						'nama_saksi1' =>$this->input->post('nama_saksi1'),
						'nama_saksi2' =>$this->input->post('nama_saksi2'),
						'persetujuan_rawat' =>$this->input->post('persetujuan_rawat'),
						'ttd_saksi1'=>trim($waktu),
						'ttd_approval'=>trim($waktu1),
						'ttd_saksi2'=>trim($waktu2),
						'jenis_kelamin_approval' =>$this->input->post('jenis_kelamin_approval'),
						'tanggal_persetujuan' =>date('Y-m-d'),
					); 

					$insert=$this->db->insert('tbl_homecare',$data_homecare); 

				}

				$data = array(
					'kode_rujukan' => $kode_rujukan, 
					'tanggal_rujukan' => $tanggal_rujukan, 
					'kode_pasien' => $kode_pasien, 
					'rekam_awal' => $kode_rekam, 
					'rekam_akhir' => $rekam_akhir, 
					'jenis_rujukan' => $jenis_rujukan, 
					'nama_rs' => $this->input->post('nama_rs'),
					'alamat_rs' => $this->input->post('alamat_rs'), 
					'status_rujukan' => "Belum Dicetak", 
					'keluhan' => $this->input->post('keluhan'),
					'diagnosa' => $this->input->post('diagnosa'), 
					'terapi' => $this->input->post('tindakan_dokter'), 
					'dokter_perujuk' => $this->session->userdata('nama_admin'), 
					'umur_pasien' => $umur, 

				);

				$hasil = $this->db->insert('tbl_rujukan',$data);

			}

			if (is_array($nama_obat)) {

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
							'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_rekam,
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
										'kode_rekam' => $kode_rekam,
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
										'kode_rekam' => $kode_rekam,
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
			}



			$data_rekam= array(
				'status_pasien' =>'Sudah Diperiksa',
				'tanggal_periksa' =>$this->input->post('tanggal_periksa'),
				'penyakit' => $this->input->post('jenis_penyakit'),
				'suhu' => $this->input->post('suhu'),
				'tensi_darah' => $this->input->post('tensi_darah'),
				'saturasi' => $this->input->post('saturasi'),
				'pernapasan' => $this->input->post('pernapasan'),
				'nadi' => $this->input->post('nadi'),
				'bb' => $this->input->post('bb'),
				'tb' => $this->input->post('tb'),
				'keluhan' => $this->input->post('keluhan'),
				'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
				'diagnosa' => $this->input->post('diagnosa'), 
				'tindakan_dokter' => $this->input->post('tindakan_dokter'),
				'penunjang' => $this->input->post('penunjang'),
				'total_akhir' =>$this->input->post('total_akhir'),
				'dokter_pemeriksa' => $this->session->nama_admin,
				'upah_dokter' => $this->session->tarif_dokter,
				'date_time_update' => date('Y-m-d H:i:s'),

			);
			
			$this->db->set($data_rekam); 
			$this->db->where('kode_rekam',$kode_rekam); 
			$result= $this->db->update('tbl_rekam_medik'); 
			if ($result) {
				$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
				$tanggal_periksa =    date("Y-m-d H:i:s");
				$data_pembayaran = array(
					'kode_pembayaran' => $kode_pembayaran, 
					'kode_pasien' => $kode_pasien, 
					'kode_rekam' => $kode_rekam, 
					'tanggal_pembayaran' => $tanggal_periksa, 
					'dokter_pemeriksa' => $this->session->nama_admin,
					'status_pembayaran' => 'Menunggu Pembayaran');

				$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
				if ($simpan_pembayaran) {

					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Melakukan Pemeriksaan Rekam Medik Umum Dengan Kode ".$kode_rekam, 
					);

					$this->db->insert('tbl_history', $data_history); 


					$data['title'] = 'Berhasil';
					$data['text'] = 'Data Berhasil di Simpan';
					$data['icon'] = 'success';

					$this->session->set_flashdata($data); 
					redirect('rekam','refresh');
				}

			}
		}
	}


	// public function updaterekam()
	// {
	// 	$this->load->helper('url');
	// 	$kode_rekam = $this->input->post('kode_rekam');   
	// 	$kode_pasien = $this->input->post('kode_pasien'); 
	// 	$stok =	$this->input->post('total_stok'); 
	// 	$nama_obat= $this->input->post('nama_obat');  
	// 	$harga_jual= $this->input->post('harga_jual'); 
	// 	$qty= $this->input->post('qty');
	// 	$subtotal= $this->input->post('subtotal');
	// 	$takaran= $this->input->post('takaran');
	// 	$hari= $this->input->post('hari');
	// 	$aturan_pakai= $this->input->post('aturan_pakai'); 
	// 	$kode_pembayaran= $this->input->post('kode_pembayaran');




	// 	if ($qty[0]!=0) {

	// 		// get sub obat sebelumnya
	// 		$this->db->where('kode_rekam', $kode_rekam);
	// 		$data_obat_lama = $this->db->get('tbl_sub_obat')->result();

	// 		foreach ($data_obat_lama as $obt) {

	// 			// get stok obat lama
	// 			$this->db->select('total_stok');
	// 			$this->db->where('kode_obat',$obt->kode_obat);
	// 			$data_stok_lama =$this->db->get('tbl_satuan_obat')->result();

	// 			foreach ($data_stok_lama as $stk) {

	// 				// balikkan stok obat
	// 				$data_update_stok_obat = array('total_stok' => floatval($stk->total_stok) + floatval($obt->qty),);
	// 				$this->db->set($data_update_stok_obat);
	// 				$this->db->where('kode_obat',$obt->kode_obat);
	// 				$update = $this->db->update('tbl_satuan_obat');

	// 				if ($update) {
	// 					$data_log_stok = array(
	// 						'tanggal' => date('Y-m-d'),
	// 						'kode_obat' => $obt->kode_obat,
	// 						'stok_awal' => $stk->total_stok,
	// 						'stok_masuk'=> floatval($obt->qty), 
	// 						'stok_akhir' => floatval($stk->total_stok) + floatval($obt->qty), 
	// 						'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_rekam,
	// 					);
	// 					$this->db->insert('tbl_log_stok_obat',$data_log_stok);
	// 				}
	// 			}
	// 			// get stok obat di expired
	// 			$this->db->select('qty');
	// 			$this->db->where('kode_obat',$obt->kode_obat);
	// 			$this->db->where('tanggal_expired',$obt->tanggal_expired);
	// 			$data_expired_lama =$this->db->get('tbl_expired_obat')->result();

	// 			foreach ($data_expired_lama as $exp) {

	// 				// balikkan stok expired obat
	// 				$data_update_stok_exp = array('qty' => floatval($exp->qty) + floatval($obt->qty),);
	// 				$this->db->set($data_update_stok_exp);
	// 				$this->db->where('kode_obat',$obt->kode_obat);
	// 				$this->db->where('tanggal_expired',$obt->tanggal_expired);
	// 				$update = $this->db->update('tbl_expired_obat');

	// 			}
	// 			// hapus sub obat sebelumnya
	// 			$this->db->where('kode_sub',$obt->kode_sub);
	// 			$this->db->delete('tbl_sub_obat');
	// 		}

	// 		for ($i=0; $i <count($nama_obat) ; $i++) { 
	// 			$kode_obat = $nama_obat[$i];
	// 			$kuantiti = str_replace('.', '', $qty[$i]);
	// 			$aturan = $aturan_pakai[$i];
	// 			$takar = $takaran[$i];
	// 			$pemakaian = $hari[$i];
	// 			$jual = str_replace('.', '', $harga_jual[$i]);

	// 			// get stok obat lama
	// 			$this->db->select('total_stok');
	// 			$this->db->where('kode_obat', $kode_obat);
	// 			$data_stok_obat =$this->db->get('tbl_satuan_obat')->result();

	// 			foreach ($data_stok_obat as $val) {

	// 				$stok_baru = floatval($val->total_stok)-floatval($kuantiti);
	// 				$data_stok = array(
	// 					'total_stok' => $stok_baru, 
	// 				);

	// 				$this->db->set($data_stok);
	// 				$this->db->where('kode_obat',$kode_obat);
	// 				$this->db->update('tbl_satuan_obat');

	// 				$data_log_stok = array(
	// 					'tanggal' => date('Y-m-d'),
	// 					'kode_obat' => $kode_obat,
	// 					'stok_awal' => $val->total_stok,
	// 					'stok_keluar'=> $kuantiti, 
	// 					'stok_akhir' => $stok_baru, 
	// 					'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_rekam,
	// 				);
	// 				$hasil = $this->db->insert('tbl_log_stok_obat',$data_log_stok);

	// 				if ($hasil) {

	// 					$this->db->where('kode_obat',$kode_obat);
	// 					$this->db->where('qty!=',0);
	// 					$this->db->order_by('date(tanggal_expired)','ASC');
	// 					$data_expired_date = $this->db->get('tbl_expired_obat')->result();
	// 					$sisa = $kuantiti;
	// 					foreach ($data_expired_date as $row) {
	// 					// cek sisa dulu
	// 						if ($sisa > 0 ) {
	// 					// cek kapasitas obat
	// 							if ($row->qty >= $sisa) {
	// 							// simpan sub obat
	// 								$data = array(
	// 									'kode_rekam' => $kode_rekam,
	// 									'kode_obat' => $kode_obat,  				
	// 									'qty' => $sisa,
	// 									'harga_obat' => $jual,
	// 									'subtotal' => floatval($sisa)*floatval($jual),
	// 									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
	// 									'tanggal_expired'=>$row->tanggal_expired,
	// 								); 

	// 								$this->db->insert('tbl_sub_obat', $data);

	// 							// update expired qty
	// 								$data_update_expired = array('qty' => floatval($row->qty)-floatval($sisa),);

	// 								$this->db->set($data_update_expired);
	// 								$this->db->where('kode_exp',$row->kode_exp);
	// 								$this->db->update('tbl_expired_obat');
	// 								$sisa = 0;

	// 							}

	// 							else{

	// 						// kalau stok di expired lebih kecil
	// 							// simpan sub obat

	// 								$data = array(
	// 									'kode_rekam' => $kode_rekam,
	// 									'kode_obat' => $kode_obat,  				
	// 									'qty' => $row->qty,
	// 									'harga_obat' => $jual,										
	// 									'subtotal' => floatval($row->qty)*floatval($jual),
	// 									'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
	// 									'tanggal_expired'=>$row->tanggal_expired,
	// 								); 

	// 								$this->db->insert('tbl_sub_obat', $data);

	// 							// update expired qty
	// 								$data_update_expired = array('qty' => 0,);
	// 								$this->db->set($data_update_expired);
	// 								$this->db->where('kode_exp',$row->kode_exp);
	// 								$this->db->update('tbl_expired_obat');
	// 								$sisa -= $row->qty;
	// 							}
	// 						}

	// 					}

	// 				}


	// 			}

	// 		} 


	// 	}  


	// 	$data_rekam= array(			

	// 		'status_pasien' =>'Sudah Diperiksa',
	// 		'tanggal_periksa' =>$this->input->post('tanggal_periksa'), 
	// 		'suhu' => $this->input->post('suhu'),
	// 		'tensi_darah' => $this->input->post('tensi_darah'),
	// 		'saturasi' => $this->input->post('saturasi'),
	// 		'pernapasan' => $this->input->post('pernapasan'),
	// 		'nadi' => $this->input->post('nadi'),
	// 		'bb' => $this->input->post('bb'),
	// 		'tb' => $this->input->post('tb'),
	// 		'keluhan' => $this->input->post('keluhan'),
	// 		'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
	// 		'diagnosa' => $this->input->post('diagnosa'), 
	// 		'tindakan_dokter' => $this->input->post('diagnosa'), 
	// 		'penunjang' => $this->input->post('diagnosa'), 
	// 		'total_akhir' =>$this->uri->segment(3),

	// 	); 

	// 	$this->db->set($data_rekam); 
	// 	$this->db->where('kode_rekam',$kode_rekam); 
	// 	$result= $this->db->update('tbl_rekam_medik'); 
	// 	if ($result) {
	// 		// echo "<script type='text/javascript'>alert('Data Berhasil di Diubah');</script>";
	// 		$data_history = array(
	// 			'kode_user' => $this->session->kode, 
	// 			'ip_address'=>get_ip(),
	// 			'aktivitas' => "Mengubah Data Pemeriksaan Rekam Medik Umum Dengan Kode ".$kode_rekam, 
	// 		);

	// 		$this->db->insert('tbl_history', $data_history); 

	// 		$data['title'] = 'Berhasil';
	// 		$data['text'] = 'Data Berhasil di Update';
	// 		$data['icon'] = 'success';

	// 		// echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
	// 		$this->session->set_flashdata($data); 
	// 		redirect('rekam','refresh');
	// 	}
	// }

	// public function simpanrekam()
	// { 
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$this->load->helper('url');
	// 	$kode_rekam = $this->input->post('kode_rekam'); 
	// 	$kode_pasien = $this->input->post('kode_pasien'); 
	// 	$stok =	$this->input->post('total_stok'); 
	// 	$nama_obat= $this->input->post('nama_obat'); 

	// 	$harga_jual= $this->input->post('harga_jual'); 
	// 	$qty= $this->input->post('qty');
	// 	$subtotal= $this->input->post('subtotal');
	// 	$takaran= $this->input->post('takaran');
	// 	$hari= $this->input->post('hari');
	// 	$aturan_pakai= $this->input->post('aturan_pakai'); 
	// 	$jenis_pemeriksaan = $this->uri->segment(4);
	// 	if ($jenis_pemeriksaan=="lab") {
	// 		$data_rekam= array(
	// 			'tanggal_periksa' =>$this->input->post('tanggal_periksa'),
	// 			'keluhan' => $this->input->post('keluhan'),
	// 			'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
	// 			'diagnosa' => $this->input->post('diagnosa'), 
	// 			'tindakan_dokter' => $this->input->post('tindakan_dokter'),
	// 			'penunjang' => $this->input->post('penunjang'),
	// 			'total_akhir' =>$this->uri->segment(3),
	// 			'dokter_pemeriksa' => $this->session->nama_admin,
	// 			'upah_dokter' => $this->session->tarif_dokter,

	// 			'date_time_update' => date('Y-m-d H:i:s'),

	// 		);


	// 		$this->db->set($data_rekam); 
	// 		$this->db->where('kode_rekam',$kode_rekam); 
	// 		$result= $this->db->update('tbl_rekam_medik'); 
	// 		if ($result) {
	// 			$kode_lab =$this->model_rekam->buat_kode();
	// 			$data_lab  = array(
	// 				'kode_lab'	=>$kode_lab,
	// 				'kode_pasien' => $kode_pasien,
	// 				'status_pasien' => 'Belum Diperiksa',
	// 				'tanggal_berobat' => date('Y-m-d'),
	// 				'pengirim' 		=> $this->session->nama_admin,
	// 				'keterangan_pemeriksaan_lab' => $this->input->post('keterangan_pemeriksaan_lab'),
	// 				'kode_rekam' => $kode_rekam,
	// 			);
	// 			$simpan = $this->db->insert('tbl_pemeriksaan_lab',$data_lab);
	// 			if ($simpan) {

	// 				$data_history = array(
	// 					'kode_user' => $this->session->kode, 
	// 					'ip_address'=>get_ip(),
	// 					'aktivitas' => "Mengajukan Pemeriksaan Lab Dari Rekam Medik Umum Dengan Kode ".$kode_lab, 
	// 				);

	// 				$this->db->insert('tbl_history', $data_history); 


	// 				echo "<script type='text/javascript'>alert('Pengajuan Lab berhasil!');</script>";
	// 				redirect('rekam','refresh');
	// 			}
	// 		}
	// 	}else{

	// 		if (is_array($nama_obat)) {

	// 		for ($i=0; $i <count($nama_obat) ; $i++) { 
	// 			if ($qty[$i]!=0) {
	// 				$kode_obat = $nama_obat[$i];
	// 				$stok_obat = $stok[$i];
	// 				$kuantiti = str_replace('.', '', $qty[$i]);
	// 				$stok_baru = floatval($stok_obat)-floatval($kuantiti);
	// 				$aturan = $aturan_pakai[$i];
	// 				$takar = $takaran[$i];
	// 				$pemakaian = $hari[$i];
	// 				$data_stok = array(
	// 					'total_stok' => $stok_baru, 
	// 				);
	// 				$this->db->set($data_stok);
	// 				$this->db->where('kode_obat',$kode_obat);
	// 				$this->db->update('tbl_satuan_obat');
	// 				$data_log_stok = array(
	// 					'tanggal' => date('Y-m-d'),
	// 					'kode_obat' => $kode_obat,
	// 					'stok_awal' => $stok_obat,
	// 					'stok_keluar'=> $kuantiti, 
	// 					'stok_akhir' => $stok_baru, 
	// 					'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_rekam,
	// 				);
	// 				$this->db->insert('tbl_log_stok_obat',$data_log_stok);

	// 				$jual = str_replace('.', '', $harga_jual[$i]);

	// 				$this->db->where('kode_obat',$kode_obat);
	// 				$this->db->where('qty!=',0);
	// 				$this->db->order_by('date(tanggal_expired)','ASC');
	// 				$data_expired_date = $this->db->get('tbl_expired_obat')->result();
	// 				$sisa = $kuantiti;
	// 				foreach ($data_expired_date as $exp) {
	// 					// cek sisa dulu
	// 					if ($sisa > 0 ) {
	// 					// cek kapasitas obat
	// 						if ($exp->qty >= $sisa) {
	// 							// simpan sub obat
	// 							$data = array(
	// 								'kode_rekam' => $kode_rekam,
	// 								'kode_obat' => $kode_obat,  				
	// 								'qty' => $sisa,
	// 								'harga_obat' => $jual,
	// 								'subtotal' => floatval($sisa)*floatval($jual),
	// 								'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
	// 								'tanggal_expired'=>$exp->tanggal_expired,
	// 							); 

	// 							$this->db->insert('tbl_sub_obat', $data);

	// 							// update expired qty
	// 							$data_update_expired = array('qty' => floatval($exp->qty)-floatval($sisa),);

	// 							$this->db->set($data_update_expired);
	// 							$this->db->where('kode_exp',$exp->kode_exp);
	// 							$this->db->update('tbl_expired_obat');
	// 							$sisa = 0;

	// 						}else{

	// 						// kalau stok di expired lebih kecil
	// 							// simpan sub obat

	// 							$data = array(
	// 								'kode_rekam' => $kode_rekam,
	// 								'kode_obat' => $kode_obat,  				
	// 								'qty' => $exp->qty,									
	// 								'harga_obat' => $jual,
	// 								'subtotal' => floatval($exp->qty)*floatval($jual),
	// 								'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
	// 								'tanggal_expired'=>$exp->tanggal_expired,
	// 							); 

	// 							$this->db->insert('tbl_sub_obat', $data);

	// 							// update expired qty
	// 							$data_update_expired = array('qty' => 0,);
	// 							$this->db->set($data_update_expired);
	// 							$this->db->where('kode_exp',$exp->kode_exp);
	// 							$this->db->update('tbl_expired_obat');
	// 							$sisa -= $exp->qty;
	// 						}
	// 					}

	// 				}



	// 			} 


	// 		}
	// 		}



	// 		$data_rekam= array(
	// 			'status_pasien' =>'Sudah Diperiksa',
	// 			'tanggal_periksa' =>$this->input->post('tanggal_periksa'),
	// 			'date_time_update' =>date('Y-m-d H:i:s'), 
	// 			'suhu' => $this->input->post('suhu'),
	// 			'tensi_darah' => $this->input->post('tensi_darah'),
	// 			'saturasi' => $this->input->post('saturasi'),
	// 			'pernapasan' => $this->input->post('pernapasan'),
	// 			'nadi' => $this->input->post('nadi'),
	// 			'bb' => $this->input->post('bb'),
	// 			'tb' => $this->input->post('tb'),
	// 			'keluhan' => $this->input->post('keluhan'),
	// 			'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
	// 			'diagnosa' => $this->input->post('diagnosa'), 
	// 			'tindakan_dokter' => $this->input->post('tindakan_dokter'),
	// 			'penunjang' => $this->input->post('penunjang'),
	// 			// 'diperiksalab' => $this->input->post('diperiksalab'),
	// 			'total_akhir' =>$this->uri->segment(3),
	// 			'dokter_pemeriksa' => $this->session->nama_admin,
	// 			'upah_dokter' => $this->session->tarif_dokter
	// 		);

	// 		// var_dump($data_rekam);
	// 		// exit();


	// 		$this->db->set($data_rekam); 
	// 		$this->db->where('kode_rekam',$kode_rekam); 
	// 		$result= $this->db->update('tbl_rekam_medik'); 
	// 		if ($result) {
	// 			$kode_pembayaran = $this->model_rekam->buat_kode_pembayaran();  
	// 			$tanggal_periksa =    date("Y-m-d H:i:s");
	// 			$data_pembayaran = array(
	// 				'kode_pembayaran' => $kode_pembayaran, 
	// 				'kode_pasien' => $kode_pasien, 
	// 				'kode_rekam' => $kode_rekam, 
	// 				'tanggal_pembayaran' => $tanggal_periksa, 
	// 				'dokter_pemeriksa' => $this->session->nama_admin,
	// 				'status_pembayaran' => 'Menunggu Pembayaran');
	// 		// var_dump($data_pembayaran);
	// 		// exit();

	// 			$simpan_pembayaran =$this->db->insert('tbl_pembayaran',$data_pembayaran); 
	// 			if ($simpan_pembayaran) {

	// 				$data_history = array(
	// 					'kode_user' => $this->session->kode, 
	// 					'ip_address'=>get_ip(),
	// 					'aktivitas' => "Melakukan Pemeriksaan Rekam Medik Umum Dengan Kode ".$kode_rekam, 
	// 				);

	// 				$this->db->insert('tbl_history', $data_history); 


	// 				// echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
	// 				$data['title'] = 'Berhasil';
	// 				$data['text'] = 'Data Berhasil di Simpan';
	// 				$data['icon'] = 'success';

	// 		// echo "<script type='text/javascript'>alert('Data berhasil di simpan');</script>";
	// 				$this->session->set_flashdata($data); 
	// 				redirect('rekam','refresh');
	// 			}

	// 		}
	// 	}
	// }


	public function updaterekam()
	{
		$this->load->helper('url');
		$kode_rekam = $this->input->post('kode_rekam');   
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
			$this->db->where('kode_rekam', $kode_rekam);
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
							'keterangan'=>'Pengembalian Obat Dengan Kode : '.$kode_rekam." yang diedit",
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
						'keterangan'=>'Pengambilan Obat Dengan Kode : '.$kode_rekam,
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
										'kode_rekam' => $kode_rekam,
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
										'kode_rekam' => $kode_rekam,
										'kode_obat' => $kode_obat,  				
										'qty' => $row->qty,
										'harga_obat' => $jual,										
										'subtotal' => floatval($row->qty)*floatval($jual),
										'aturan_pakai' => $takar." x ".$pemakaian." x ".$aturan, 
										'tanggal_expired'=>$row->tanggal_expired,
									); 

									$this->db->insert('tbl_sub_obat', $data);

								// update expired qty
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

		$data_rekam= array(			
			'status_pasien' =>'Sudah Diperiksa',
			'tanggal_periksa' =>$this->input->post('tanggal_periksa'), 
			'suhu' => $this->input->post('suhu'),
			'tensi_darah' => $this->input->post('tensi_darah'),
			'saturasi' => $this->input->post('saturasi'),
			'pernapasan' => $this->input->post('pernapasan'),
			'nadi' => $this->input->post('nadi'),
			'bb' => $this->input->post('bb'),
			'tb' => $this->input->post('tb'),
			'keluhan' => $this->input->post('keluhan'),
			'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
			'diagnosa' => $this->input->post('diagnosa'), 
			'tindakan_dokter' => $this->input->post('diagnosa'), 
			'penunjang' => $this->input->post('diagnosa'), 
			'total_akhir' =>$this->input->post('total_akhir'),
			'date_time_update' =>date('Y-m-d H:i:s'),
		); 
		$this->db->set($data_rekam); 
		$this->db->where('kode_rekam',$kode_rekam); 
		$result= $this->db->update('tbl_rekam_medik'); 
		if ($result) {
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengubah Data Pemeriksaan Rekam Medik Umum Dengan Kode ".$kode_rekam, 
			);

			$this->db->insert('tbl_history', $data_history); 

			$data['title'] = 'Berhasil';
			$data['text'] = 'Data Berhasil di Update';
			$data['icon'] = 'success';
			$this->session->set_flashdata($data); 
			redirect('rekam','refresh');
		}
	}
	public function detail_rekam_pasien($kode)
	{
		$kode_rekam = $this->uri->slash_segment(3).$this->uri->segment(4);  

		$data['detail_rekam_pasien'] = $this->model_rekam->detail_rekam_pasien($kode_rekam)	;
		$data['list_obat'] = $this->model_rekam->list_obat($kode_rekam)	;
		$data['detail_obat'] = $this->model_rekam->detail_obat($kode_rekam)	;

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam/detail_rekam_pasien',$data);
		$this->load->view('template/footer');
	}

	public function item_edit_rekam()
	{
		$kode_rekam = $this->uri->slash_segment(3).$this->uri->segment(4);  
		$data['detail_rekam_pasien'] = $this->model_rekam->detail_rekam_pasien($kode_rekam)	;
		$data['list_obat'] = $this->model_rekam->list_obat($kode_rekam)	
		;
		$data['aturan_pakai'] = $this->db->get('tbl_aturan_pakai')->result(); 

		$data['racikan'] = $this->db->get('tbl_racikan')->result(); 	


		$data['penyakit'] = $this->model_rekam->get_penyakit();  
		$data['status_lab'] = $this->model_laboratorium->get_status_lab($kode_rekam); 
		$data['detail_obat'] = $this->model_rekam->detail_obat($kode_rekam)	;
		$data['obat'] = $this->model_rekam->getnamaobat(); 
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam/edit_rekam',$data);
		$this->load->view('template/footer');
	}

	public function consent_pasien()
	{
		$kode_rekam = $this->uri->slash_segment(3).$this->uri->segment(4);  

		$data['observasi_pasien'] = $this->model_rekam->observasi_pasien($kode_rekam)	;
		$data['detail_obat'] = $this->model_rekam->detail_obat($kode_rekam)	;

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam/informed_consent',$data);
		$this->load->view('template/footer');
	}


	public function data()
	{
		$data = $this->model_rekam->data_list();
		echo json_encode($data);
	}
	public function hasil_rekam_medik()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('rekam/data_hasil_rekam_medik');
		$this->load->view('template/footer');

	}

	public function tampil_data_hasil_rekam()
	{	
		$data = $this->model_rekam->tampil_data_hasil_rekam(); 
		echo json_encode($data); 
	}

	public function tampil_harga_obat()
	{
		$nama_obat 				= $_POST['nama_obat1'];
		$data 						= $this->model_rekam->tampil_obat($nama_obat);

		echo json_encode($data);
	}




}
