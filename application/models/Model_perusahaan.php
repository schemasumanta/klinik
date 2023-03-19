<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perusahaan extends CI_Model {

	public function tampildata()
	{
		$hasil=$this->db->query("SELECT * FROM tbl_perusahaan");
		return $hasil->result();
	}

	public function get_edit_perusahaan($id)
	{
		$tampil=$this->db->query("SELECT * FROM tbl_perusahaan WHERE id='$id'");
		if($tampil->num_rows()>0){
			foreach ($tampil->result() as $data) {
				$hasil_tampil=array(  
					'id' => $data->id,
					'nama_pt' => $data->nama_pt,
					'alamat' => $data->alamat, 
					'email' => $data->email, 
					'handphone' => $data->handphone, 
					'telepon' => $data->telepon, 
					'pemilik' => $data->pemilik, 
					'logo_pt' => $data->logo_pt,
					'logo_header' => $data->logo_header,
					'favicon' => $data->favicon
				);

			}
		}
		return $hasil_tampil;
	}

}
