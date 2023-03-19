<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_izin extends CI_Model {

	
	public function tampil_data_izin()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_izin ORDER BY tgl_input");


		return $hasil->result(); 
	}

	public function list_approval()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_approval");


		return $hasil->result(); 
	}

		public function list_karyawan()
	{
		$hasil = $this->db->query("SELECT nama_depan,nama_belakang,departemen FROM tbl_karyawan WHERE level_pekerjaan!='Staff' AND level_pekerjaan!='Produksi'");


		return $hasil->result(); 
	}

	public function teleponapproval($approver1,$approver2){

		$hasil = $this->db->query("SELECT telepon,nama_depan,nama_belakang,userid FROM tbl_karyawan WHERE  nama_depan ='$approver1' OR nama_depan ='$approver2'");
		return $hasil->result(); 
	}

	public function teleponapproved($nik){

		$hasil = $this->db->query("SELECT telepon,nama_depan,nama_belakang FROM tbl_karyawan WHERE nik ='$nik' OR jabatan ='Admin HRD'");


		return $hasil->result(); 
	}

	public function get_edit_izin($kode)
	{
		$tampil=$this->db->query("SELECT * FROM tbl_izin WHERE kode='$kode'");
		if($tampil->num_rows()>0){
			foreach ($tampil->result() as $data) {
				$hasil_tampil=array(  
					'kode' 							=> $data->kode,
					'tgl_input'				 		=> $data->tgl_input,
					'departemen' 					=> $data->departemen,
					'level_pekerjaan' 				=> $data->level_pekerjaan,
					'nama_karyawan' 				=> $data->nama_karyawan,
					'nik' 							=> $data->nik,
					'jenis_izin' 					=> $data->jenis_izin,          
					'type_izin' 					=> $data->type_izin,
					'jam_masuk' 					=> $data->jam_masuk,
					'jam_keluar' 					=> $data->jam_keluar,
					'keterangan' 					=> $data->keterangan,
					'tanggal_pengajuan' 			=> $data->tanggal_pengajuan,          
					'tanggal_akhir_pengajuan' 		=> $data->tanggal_akhir_pengajuan,
					'approver' 						=> $data->approver,
					'status_approval' 				=> $data->status_approval,
					'komentar' 						=> $data->komentar,
					'approver_kedua' 				=> $data->approver_kedua,
					'status_approval_kedua' 		=> $data->status_approval_kedua,
					'komentar_kedua' 				=> $data->komentar_kedua
				);

			}
		}
		return $hasil_tampil;
	}

	public function hapus_aksi_izin($kode)
	{
		$hasil=$this->db->query("DELETE FROM tbl_izin WHERE kode='$kode'");
		return $hasil;
	}

	public function getinputan($nama_karyawan)
	{
		$hasil=$this->db->query("SELECT kode FROM tbl_izin WHERE nama_karyawan='$nama_karyawan'  ORDER BY kode DESC LIMIT 1");
		return $hasil->result();
	}

	public function data_izin_bykode($kode)
	{
		$hasil=$this->db->query("SELECT * FROM tbl_izin WHERE kode='$kode'");
		return $hasil->result();
	}


	public function tampil_kolom()
	{
		$hasil=$this->db->query("SELECT column_name FROM information_schema.columns	WHERE  table_name = 'tbl_karyawan' AND table_schema = 'db_superteknik'");
		return $hasil->result();
	}



}
