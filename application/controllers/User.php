<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');

			redirect('dashboard','refresh');
		}elseif($this->session->level!='superadmin' && $this->session->level!='direksi' && $this->session->level!='general_manager' && $this->session->level!='manager_finance')  {
			echo "<script> alert('Tidak Ada Akses Untuk Menu ini');
			history.back();
			</script>";

		} 
		date_default_timezone_set('Asia/Jakarta');	
	}


	public function tabel_user(){
		$data   = array();
		$sort     = isset($_GET['columns'][$_GET['order'][0]['column']]['data']) ? strval($_GET['columns'][$_GET['order'][0]['column']]['data']) : 'nama_admin';
		$order    = isset($_GET['order'][0]['dir']) ? strval($_GET['order'][0]['dir']) : 'asc';
		$search    = isset($_GET['search']['value']) ? strval($_GET['search']['value']):null;
		$no = $this->input->get('start');

		$list = $this->model_tabel->get_datatables('user',$sort,$order,$search);

		foreach ($list as $l) {
			$no++;
			$l->no = $no;
			

			$l->foto = '<img src="'.$l->foto.'" width="50" height="50">';


			

			$opsi ='
			<div class="btn-group">
          <a href="javascript:;" class="btn btn-sm btn-success  btn-flat item_edit_user" data="'.$l->kode.'"><i class="fa fa-edit"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-info  btn-flat item_edit_password" data="'.$l->kode.'"><i class="fas fa-key"></i></a>';


          if ($l->user_status == 1) {
           $opsi .='<a href="javascript:;" class="btn btn-danger btn-sm btn-flat item_aktivasi_user" data="'.$l->kode.'"><i class="fas fa-user-times"></i></a>';
         }else{
          $opsi .='<a href="javascript:;" class="btn btn-success btn-sm btn-flat item_aktivasi_user" data="'.$l->kode.'"><i class="fas fa-user-check"></i></a>';
        }


        $opsi .='</div>';

        $l->opsi = $opsi;


		if ($l->user_status==1) {
				$l->user_status = "Aktif";
			}else{
				$l->user_status = "Non Aktif";
			}

			

        $data[] = $l;

		}



		$output = array(
			"draw"              => $_GET['draw'],
			"recordsTotal"      => $this->model_tabel->count_all('user',$sort,$order,$search),
			"recordsFiltered"   => $this->model_tabel->count_filtered('user',$sort,$order,$search),
			"data"              => $data,
		);  
		echo json_encode($output); 
	}



	public function simpan_ttd()
	{
		$waktu = strval('assets\img\ttd_karyawan\gambar'.time().'.png');
		$result = file_put_contents( $waktu, base64_decode( str_replace('data:image/png;base64,','',$_POST['image'] ) ) );
		if ($result) {
			$data_ttd=array('ttd'=>$waktu);
			$this->db->set($data_ttd);
			$this->db->where('kode',$this->session->kode);
			$this->db->update('tbl_admin');
			$msg = "TTD Berhasil Disimpan";
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Membuat TTD",
			);

			$this->db->insert('tbl_history', $data_history);


			echo json_encode($msg);
		}
	}


	public function index()
	{
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/tampilan_user');
		$this->load->view('template/footer');
	}

	
	public function hapus_user()
	{
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Menghapus user dengan Kode ".$this->input->post('kode'),
		);

		$this->db->insert('tbl_history', $data_history);


		$kode=$this->input->post('kode');
		$data=$this->model_user->hapus_aksi_user($kode);
		echo json_encode($data);
	}
	public function aktivasi_user()
	{

		$this->db->set('user_status',$this->input->post('isi'));
		$this->db->where('kode',$this->input->post('kode'));
		$data = $this->db->update('tbl_admin');

		if ($this->input->post('isi')==0) {
			$data_history = array(
				'kode_user' => $this->session->kode,
				'ip_address'=>get_ip(),
				'aktivitas' => "Menonaktifkan User dengan Kode ".$this->input->post('kode'),
			);

		}else{

			$data_history = array(
				'kode_user' => $this->session->kode,
				'ip_address'=>get_ip(),
				'aktivitas' => "Mengaktifkan User dengan Kode ".$this->input->post('kode'),
			);

		}
		$this->db->insert('tbl_history', $data_history);


		echo json_encode($data);

	}

	public function data()
	{
		$data=$this->model_user->data_list();
		echo json_encode($data);
	}

	public function uploadphoto(){
		$filename = trim($_FILES['file']['name']);
		// Location
		$location ='assets/img/'.$filename;
		// file extension
		$file_extension = pathinfo($location, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);
		// Valid image extensions
		$image_ext = array("jpg", "png", "jpeg", "gif");
		$response = 0;
		if (in_array($file_extension, $image_ext)) {
			// Upload file
			if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
				$response =$location;
			}
		}
		echo $response;
	}
	
	public function uploadphotox(){

		$filename = $_FILES['file']['name'];

// Location
		$location ='assets/img/'.$filename;

// file extension
		$file_extension = pathinfo($location, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);

// Valid image extensions
		$image_ext = array("jpg","png","jpeg","gif");

		$response = 0;
		if(in_array($file_extension,$image_ext)){
  // Upload file
			if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
				$response = $location;
			}
		}

		echo $response;
	}








	public function simpan()
	{
		$nama_admin 	= $this->input->post('nama_admin');
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$level 			= $this->input->post('level');
		$tempat_lahir 			= $this->input->post('tempat_lahir');
		$tanggal_lahir 			= $this->input->post('tanggal_lahir');
		$jabatan 			= $this->input->post('jabatan');
		$tarif_dokter 	= $this->input->post('tarif_dokter');
		$foto 			= $this->input->post('foto');


		$data = array(
			'nama_admin' => $nama_admin,
			'username' => $username,
			'password' => md5($password),
			'level' => $level,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'jabatan' => $jabatan,
			'tarif_dokter'=> $tarif_dokter,
			'foto' => $foto,
			'user_status' =>1,
		);

		$result= $this->db->insert('tbl_admin', $data);
		if ($result) {
			$msg = "User berhasil ditambahkan";
			$data_history = array(
				'kode_user' => $this->session->kode, 
				'ip_address'=>get_ip(),
				'aktivitas' => "Menambah Data user Baru atas nama ".$nama_admin,
			);

			$this->db->insert('tbl_history', $data_history);

		}	
		echo json_encode($msg);


	}





	public function edit_user()
	{
		$kode=$this->input->get('kode');
		$data=$this->model_user->get_edit_user($kode);
		echo json_encode($data);
	}


	public function update_data_user()
	{
		$kode=$this->input->post('kodex');
		$nama_admin=$this->input->post('nama_adminx');
		$username=$this->input->post('usernamex');
		$level=$this->input->post('levelx');
		$foto=$this->input->post('fotox');
		$tarif_dokter=$this->input->post('tarif_dokterx');



		$data=$this->model_user->update_aksi_user($kode,$nama_admin,$username,$level,$foto,$tarif_dokter);

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Data user atas nama ".$nama_admin,
		);

		$this->db->insert('tbl_history', $data_history);

		echo json_encode($data);
	}

	public function update_password()
	{
		$kode=$this->input->post('kodex');
		$password=$this->input->post('passwordx');
		$confirm=$this->input->post('confirm');


		$data = array(

			'password' => md5($password),

		);

		$where = array(
			'kode' => $kode
		);

		$data=$this->model_user->update_password($where,$data,'tbl_admin');

		// 

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Mengubah Password User dengan Kode ".$kode,
		);

		$this->db->insert('tbl_history', $data_history);


		$msg ="Password berhasil diubah";

		echo json_encode($data);
	}


	public function get_karyawan()
	{
		$this->db->select('kode,nama_admin');
		$this->db->where('user_status',1);
		$data=$this->db->get('tbl_admin')->result();
		echo json_encode($data);
	}




}