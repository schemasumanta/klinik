<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_absensi extends CI_Model {

	
	public function get_absen($type)
	{
	    $user = $this->session->kode;
	    $tanggal = date('Y-m-d');
	    $hasil = $this->db->query("SELECT * FROM tbl_absensi WHERE tanggal_absensi='$tanggal' AND id_user='$user' AND type_absen='$type'")->num_rows();
	    return $hasil;
	}

}
