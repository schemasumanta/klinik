<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_antrian extends CI_Model {
	public function antrian_terakhir()
	{
		$tanggal = date("Y-m-d");
		$hasil= $this->db->query("SELECT * FROM tbl_antrian WHERE left(tanggal_cetak_antrian,10)='$tanggal' ORDER BY kode_antrian DESC LIMIT 1");
		$antrian_terakhir = "000";
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $key) {
				$antrian_terakhir = $key->nomor_antrian;
			}
		}
		return $antrian_terakhir;
	}
	// public function tampilan_tunggu_antrian()
	// {
	// 	$tanggal = date("Y-m-d");
	// 	$hasil= $this->db->query("SELECT * FROM tbl_antrian WHERE left(tanggal_cetak_antrian,10)='$tanggal' AND status_antrian='Terpanggil' ORDER BY kode_antrian DESC LIMIT 1");
	// 	$antrian_terakhir="000";
	// 	if ($hasil->num_rows() > 0) {
	// 		foreach ($hasil->result() as $row) {
	// 				$antrian = floatval($row->nomor_antrian);
	// 				if (floatval($antrian) < 10) {
	// 					$antrian_terakhir="00".$antrian;
	// 				}elseif (floatval($antrian) < 100) {
	// 					$antrian_terakhir = "0".$antrian;
	// 				}else{
	// 					$antrian_terakhir =$antrian;
	// 				}
	// 		}
	// 	}
	// 	return $antrian_terakhir;
	// }

public function ambil_slider()
{
	return $this->db->query("SELECT * FROM tbl_slider WHERE status=1 AND kategori='Slider'")->result();
	
}

public function ambil_video()
{
	return $this->db->query("SELECT * FROM tbl_slider WHERE status=1 AND kategori='Video'")->result();
	
}
	public function tunggu_antrian()
	{
		$tanggal = date("Y-m-d");
		$hasil= $this->db->query("SELECT * FROM tbl_antrian WHERE left(tanggal_cetak_antrian,10)='$tanggal' AND status_antrian='Menunggu' ORDER BY kode_antrian ASC LIMIT 1");
		$antrian_terakhir="000";
		if ($hasil->num_rows() > 0) {
			foreach ($hasil->result() as $key) {
				if (floatval($key->nomor_antrian)>0) {
					$antrian = floatval($key->nomor_antrian -1);
					if (floatval($antrian) < 10) {
						$antrian_terakhir="00".$antrian;
					}elseif (floatval($antrian) < 100) {
						$antrian_terakhir = "0".$antrian;
					}else{
						$antrian_terakhir =$antrian;

					}
				}
			}
		}else{
			$hasil2= $this->db->query("SELECT * FROM tbl_antrian WHERE left(tanggal_cetak_antrian,10)='$tanggal' AND status_antrian='Terpanggil' ORDER BY kode_antrian DESC LIMIT 1");
			$antrian_terakhir="000";
			if ($hasil2->num_rows() > 0) {
				foreach ($hasil2->result() as $row) {
						$antrian = floatval($row->nomor_antrian);
						if (floatval($antrian) < 10) {
							$antrian_terakhir="00".$antrian;
						}elseif (floatval($antrian) < 100) {
							$antrian_terakhir = "0".$antrian;
						}else{
							$antrian_terakhir =$antrian;
						}
				}
			}
		}
		return $antrian_terakhir;
	}

	public function update_antrian($nomor_antrian)
	{
		$tanggal = date("Y-m-d");
		$hasil= $this->db->query("SELECT kode_antrian FROM tbl_antrian WHERE left(tanggal_cetak_antrian,10)='$tanggal' AND nomor_antrian='$nomor_antrian' ORDER BY kode_antrian ASC LIMIT 1");
		if ($hasil->num_rows() > 0) {
			$update= $this->db->query("UPDATE tbl_antrian SET status_antrian='Terpanggil' WHERE left(tanggal_cetak_antrian,10)='$tanggal' AND nomor_antrian='$nomor_antrian'");
			if ($update) {
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
}
