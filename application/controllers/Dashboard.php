<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
function __construct()
	{
		parent::__construct();
		if ($this->session->login==FALSE) {

			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Belum Login!!! <button type="button" class="close" data-dismiss="alert" arial-label="close"><span arial-hidden="true">&times;</span></button></div>');
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');	
		
	}
	public function update_slider()
{
  $data = array(
    'status' => $this->input->post('status'),
  );
  $this->db->set($data);
  $this->db->where('kode_slider',$this->input->post('kode_slider'));
  $result=$this->db->update('tbl_slider');
  if ($result) {
    echo json_encode(1);
    $data_history = 
    array(
      'kode_user' => $this->session->kode, 
      'ip_address'=>get_ip(),
      'aktivitas' => "Mengupdate Data Slider Dengan Kode ".$this->input->post('kode_slider'), 
    );

    $this->db->insert('tbl_history', $data_history);


  }else{
    echo json_encode(0);
    $data_history = 
    array(
      'kode_user' => $this->session->kode, 
      'ip_address'=>get_ip(),
      'aktivitas' => "Percobaan Update Data Slider Dengan Kode ".$this->input->post('kode_slider')." (Gagal)", 
    );

    $this->db->insert('tbl_history', $data_history);

  }
}

public function uploadphoto(){
    $filename = trim($_FILES['file']['name']);
    // Location
    $location ='assets/img/'.$filename;
    // file extension
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // Valid image extensions
    $image_ext = array("jpg", "png", "jpeg", "gif","mp4","avi","mkv","mpeg","flv");
    $response = 0;
    if (in_array($file_extension, $image_ext)) {
      // Upload file
      if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        $response =trim($location);
      }
    }
    echo $response;
  }

public function simpan_slider()
{
  $data = array(
    'judul_slider' => $this->input->post('judul_slider'), 
    'status' => $this->input->post('status'), 
    'kategori' => $this->input->post('kategori_slider'), 
    'foto' => trim($this->input->post('foto')), 
  );
  $result = $this->db->insert('tbl_slider',$data);
  if ($result) {
    echo json_encode(1);
    $data_history = array(
      'kode_user' => $this->session->kode, 
      'ip_address'=>get_ip(),
      'aktivitas' => "Menambah Data Slider Dengan Judul ".$this->input->post('judul_slider'), 
    );

    $this->db->insert('tbl_history', $data_history);


  }else{
    $data_history = array(
      'kode_user' => $this->session->kode, 
      'ip_address'=>get_ip(),
      'aktivitas' => "Percobaan Menambah Data Slider Dengan Judul ".$this->input->post('judul_slider')." (Gagal)", 
    );

    $this->db->insert('tbl_history', $data_history);
    echo json_encode(0);

  }
}

public function hapus_slider()
{
  $kode_slider = $this->input->post('kode_slider');
  $this->db->where('kode_slider',$kode_slider);
  $data= $this->db->get('tbl_slider')->result();
  foreach ($data as $key) {
   $path = './'.trim($key->foto);
   if(file_exists($path)){
    unlink($path);
  }
}

$this->db->where('kode_slider',$kode_slider);
$result= $this->db->delete('tbl_slider');
if ($result) {
  $data_history = array(
    'kode_user' => $this->session->kode, 
    'ip_address'=>get_ip(),
    'aktivitas' => "Menghapus Data Slider Dengan Kode ".$this->input->post('kode_slider'), 
  );
  $this->db->insert('tbl_history', $data_history);
  echo json_encode(1);
}else{
  $data_history = array(
    'kode_user' => $this->session->kode, 
    'ip_address'=>get_ip(),
    'aktivitas' => "Gagal Menghapus Data Slider Dengan Kode ".$this->input->post('kode_slider'), 
  );
  $this->db->insert('tbl_history', $data_history);
  echo json_encode(0);
}
}
public function slider()
{
  $data['slider']=$this->model_login->list_slider();
  $this->load->view('template/header');
  $this->load->view('template/sidebar');
  $this->load->view('tampilan_slider',$data); 
  $this->load->view('template/footer');
}

	public function backupdatabase(){
		$data_history = array(
			'kode_user' => $this->session->kode, 
			'ip_address'=>get_ip(),
			'aktivitas' => "Membackup Database Aplikasi",
		);
		
		$this->db->insert('tbl_history', $data_history);
		$this->load->dbutil();
		$this->load->helper('file');
		$config = array(
			'format'	=> 'zip',
			'filename'	=> 'database.sql'
		);
		$backup = $this->dbutil->backup($config);
		$save = FCPATH.'backup/backup-'.date("ymdHis").'-db.zip';
		$db_download ='backup-'.date("ymdHis").'-db.zip';
		write_file($save, $backup);
		$this->load->helper('download');
		force_download($db_download, $backup);
	}


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$data['karyawan'] 		 			='KARYAWAN'; 
		$data['user'] 		 	 			='USER AKSES'; 
		$data['pasien'] 		 	 		='JUMLAH PASIEN'; 
		$data['umum'] 		 	 			='PENGOBATAN UMUM';   
		$data['kb'] 		 	 			='PENGOBATAN KB';   
		$data['anc'] 		 	 			='PENGOBATAN ANC';   
		$data['bbl'] 		 	 			='PENGOBATAN BBL';   
		$data['nifas'] 		 	 			='PENGOBATAN NIFAS';   
		$data['imn'] 		 	 			='PENGOBATAN IMUNISASI';   
		$data['num_rows_user']			 	=$this->db->get('tbl_admin')->num_rows(); 	
		$data['num_rows_pasien']			=$this->db->get('tbl_pasien')->num_rows(); 	
		$data['num_rows_umum']			 	=$this->db->get('tbl_rekam_medik')->num_rows(); 
		$data['num_rows_kb']			 	=$this->db->get('tbl_kb')->num_rows(); 	
		$data['num_rows_anc']			 	=$this->db->get('tbl_kehamilan')->num_rows(); 	
		$data['num_rows_bbl']			 	=$this->db->get('tbl_bbl')->num_rows(); 	
		$data['num_rows_nifas']			 	=$this->db->get('tbl_nifas')->num_rows();  	
		$data['num_rows_imunisasi']			=$this->db->get('tbl_imunisasi')->num_rows();  	
		$this->load->view('tampilan_dashboard',$data);  
		$this->load->view('template/footer');
	}

	 










}
