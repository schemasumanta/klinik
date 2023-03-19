<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');	
	}
	

	public function set_mode()
	{
		$this->session->set_userdata('mode',$this->input->get('mode'));

		echo json_encode($this->session->mode);
	}
	public function index()
	{

		
		if ($this->session->login==TRUE) {
			redirect('dashboard','refresh');
		}else{
			$database = $this->db->query('SELECT DATABASE()  as nama_database')->result_array();
			if($database[0]['nama_database']=='u1587466_klinik')
			{
				$data['mode'] ='Online';
			}else{
				$data['mode'] ='Offline';
			}
			$data['perusahaan'] = $this->model_login->getperusahaan();
			$this->load->view('tampilan_login',$data);
		}
	}
	public function ambil_data(){
		$draw=$_REQUEST['draw'];

		$length=$_REQUEST['length'];
		
		$start=$_REQUEST['start'];

		$search=$_REQUEST['search']["value"];
		$total=$this->db->count_all_results("tbl_history a");
		$output=array();
		$output['draw']=$draw;
		$output['recordsTotal']=$output['recordsFiltered']=$total;
		$output['data']=array();
		if($search!=""){
			$this->db->like("a.tanggal",$search);
			$this->db->or_like("a.ip_address",$search);
			$this->db->or_like("a.aktivitas",$search);
			$this->db->or_like("b.nama_admin",$search);

		}
		$this->db->limit($length,$start);
		$sortdata = $_REQUEST['sortdata'];
		$filterdata = $_REQUEST['filterdata'];
		if ($sortdata!='') {
			$this->db->order_by($sortdata,$filterdata);
		}else{
			$this->db->order_by('a.kode_history','DESC');
		}
		$this->db->join('tbl_admin b','b.kode = a.kode_user','left');
		$query = $this->db->get('tbl_history a');
		if($search!=""){
			$this->db->like("a.tanggal",$search);
			$this->db->or_like("a.ip_address",$search);
			$this->db->or_like("a.aktivitas",$search);
			$this->db->or_like("b.nama_admin",$search);;
			$this->db->join('tbl_admin b','b.kode = a.kode_user','left');
			$jum=$this->db->get('tbl_history a');
			$output['recordsTotal']=$output['recordsFiltered']=$jum->num_rows();
		}
		$nomor_urut=$start+1;
		foreach ($query->result_array() as $list) {
			$output['data'][]=array(
				$nomor_urut,
				$list['tanggal'],
				$list['nama_admin'],
				$list['ip_address'],
				$list['aktivitas'],
			);
			$nomor_urut++;
		}
		echo json_encode($output);
	}
	public function ceklogin()
	{
		$username =$this->input->post('username');
		$password =md5($this->input->post('password'));
		$cek = $this->model_login->cek($username,$password)->result();
		if ($cek !=NULL) {
			foreach ($cek as $a)
			{
				if ($a->user_status==1) {
					
					$data['username'] = $a->username;
					$data['nama_admin'] = $a->nama_admin;
					$data['kode'] = $a->kode;
					$data['level'] = $a->level;
					$data['foto'] = $a->foto;
					$data['tarif_dokter'] = $a->tarif_dokter; 
					$data['ttd'] = $a->ttd;
					$data['login'] = TRUE;


					$perusahaan = $this->model_login->getperusahaan();
					foreach ($perusahaan as $pt) {
						$data['nama_pt'] 		= $pt->nama_pt;
						$data['alamat'] 		= $pt->alamat;
						$data['email'] 			= $pt->email;
						$data['logo_thermal'] 	= $pt->logo_thermal;

						$data['handphone'] 		= $pt->handphone;
						$data['telepon'] 		= $pt->telepon;
						$data['pemilik'] 		= $pt->pemilik;
						$data['logo_pt'] 		= $pt->logo_pt;
						$data['logo_header'] 	= $pt->logo_header;
						$data['favicon'] 		= $pt->favicon;
					}

					$this->session->set_userdata($data);


					$data = array(

						'login_status' 				=> "1",
					);

					$this->db->where('kode', $a->kode);
					$this->db->update('tbl_admin', $data);

					$data_history = array(
						'kode_user' => $this->session->kode, 
						'ip_address'=>get_ip(),
						'aktivitas' => "Berhasil Login", 
					);
					$this->db->insert('tbl_history', $data_history);


					redirect('dashboard','refresh');
				}else{
					echo "<script>
					alert('maaf anda gagal login, User Belum Diaktivasi')</script>";
					redirect('login','refresh');
				}
			}
		}
		else{
			echo "<script>
			alert('maaf anda gagal login')</script>";
			redirect('login','refresh');
		}
	}
	
	public function history()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('history/tampilan_history');
		$this->load->view('template/footer');
	}

	public function logout()
	{
		$username = $this->session->username;

		$this->model_login->hapus_session($username);

		$this->session->sess_destroy();

		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Berhasil Logout", 
		);
		$this->db->insert('tbl_history', $data_history);

		redirect('login');
	}



}
