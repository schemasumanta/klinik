<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_User extends CI_Model {

	public function data_list()
  {
    $hasil=$this->db->query("SELECT * FROM tbl_admin");
    return $hasil->result();
  }
  public function get_list_dokter()
  {
    return $this->db->query("SELECT nama_admin,tarif_dokter FROM tbl_admin WHERE level='dokter'")->result();
  }

  public function jumlahnotifikasi($nama_admin)
  {
    $hasil=$this->db->query("SELECT DISTINCT isi,judul,tanggal,penerima,linktujuan,pengirim,foto,pembaca FROM tbl_notifikasi WHERE penerima LIKE'%$nama_admin%' OR penerima='semua' AND pengirim NOT LIKE '%$nama_admin%' ORDER BY tanggal ASC"); 
    return $hasil->result();

  }


 public function updateallnotif($nama_admin)
  {
    // $hasil=$this->db->query("UPDATE tbl_notifikasi SET status='Sudah Dibaca' WHERE penerima='$nama_admin' OR penerima='semua'");
    // return $hasil;
  }

   public function updatepembaca($nama_admin,$tanggal,$judul)
  {
    $hasil=$this->db->query("SELECT pembaca FROM tbl_notifikasi WHERE penerima='$nama_admin' OR penerima='semua' AND tanggal='$tanggal' AND judul='$judul'");

      if($hasil->num_rows()>0){
      foreach ($hasil->result() as $data) {

         if (strpos($data->pembaca, $nama_admin) == false) {
          $pembaca= $data->pembaca.','.$nama_admin;
         }else{
          exit();
         }

         // {
         //  $pembaca = $nama_admin;
         // }


      }

      $update = $this->db->query("UPDATE tbl_notifikasi SET pembaca='$pembaca' WHERE penerima='$nama_admin' OR penerima='semua' AND tanggal='$tanggal' AND judul='$judul'");

    return $update;
    
    }


    
  }





	public function tampil_data()
	{
		return $this->db->get('tbl_admin')->result();
	}

public function hapus_aksi_user($kode)
  {
    $hasil=$this->db->query("DELETE FROM tbl_admin WHERE kode='$kode'");
    return $hasil;
  }
	

	public function get_edit_user($kode)
  {
    $tampil=$this->db->query("SELECT * FROM tbl_admin WHERE kode='$kode'");
    if($tampil->num_rows()>0){
      foreach ($tampil->result() as $data) {
        $hasil_tampil=array(  
          'kode' => $data->kode,
          'nama_admin' => $data->nama_admin,
          'username' => $data->username,
          'level' => $data->level,
          'tarif_dokter' => $data->tarif_dokter,
          'foto' => $data->foto
        );
        
      }
    }
    return $hasil_tampil;
  }

 public function update_aksi_user($kode,$nama_admin,$username,$level,$foto,$tarif_dokter)
  {
    $hasil_user=$this->db->query("UPDATE tbl_admin SET nama_admin='$nama_admin', username='$username', level='$level', foto='$foto',tarif_dokter='$tarif_dokter' WHERE kode='$kode'");
    return $hasil_user;
  }


  public function update_password($where,$data,$table)
  {

  		$hasil_user=$this->db->where($where);
		$hasil_user=$this->db->update($table, $data);
	
    	return $hasil_user;
  }


}
