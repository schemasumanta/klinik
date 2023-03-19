<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function cek($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('tbl_admin');

	}
public function list_slider()
	{
		return $this->db->get('tbl_slider')->result();
	}
	public function tampil_data()
	{
		return $this->db->get('tbl_admin')->result();
	} 

	public function getpassword($username)
	{
		$hasil = $this->db->query("SELECT password FROM tbl_admin WHERE username='$username'");
		return $hasil->result();
		
	} 
	
	public function getperusahaan()
	{
		return $this->db->query("SELECT * FROM tbl_perusahaan")->result();
	}



	public function hapus_session($username)
	{
		$hasil = $this->db->query("UPDATE tbl_admin SET login_status ='0' WHERE username='$username'");
		return $hasil;
	}




}
