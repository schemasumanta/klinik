<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tabel extends CI_Model {

    function get_datatables($type=null,$sort=null,$order=null,$search=null)
    {
        $this->_get_datatables_query($type,$sort,$order,$search);
        if($_GET['length'] != -1){
            $this->db->limit($_GET['length'], $_GET['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }


    private function _get_datatables_query($type=null,$sort=null,$order=null,$search=null)
    {         
        switch ($type) {

            case 'satuan_obat':
            $this->db->select('a.*');
            $this->db->from('tbl_satuan_obat a');
            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_obat',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_obat',$search);
                $this->db->or_like('a.nama_obat',$search);
                $this->db->or_like('a.keterangan',$search);
            }
            
            break;

            case 'absensi':
            $this->db->select('a.*,b.nama_admin');
            $this->db->from('tbl_absensi a');
            $this->db->join('tbl_admin b','b.kode=a.id_user');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_absensi',$order);
            }else{
                $this->db->order_by($sort,$order);
            }
            if ($this->session->level!="superadmin") {
                $this->db->where('a.id_user',$this->session->kode);
                
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.tanggal_absensi',$search);
                $this->db->or_like('b.nama_admin',$search);
                $this->db->or_like('a.jam',$search);
                $this->db->or_like('a.type_absen',$search);

            }
            
            break;



            case 'rujukan':
            $this->db->select('a.*,b.nama_pasien');
            $this->db->from('tbl_rujukan a');
            $this->db->join('tbl_pasien b','b.kode_pasien=a.kode_pasien');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.id',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_rujukan',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->or_like('a.status_rujukan',$search);
                $this->db->or_like('a.nama_rs',$search);

            }
            
            break;


            case 'user':
            $this->db->select('a.kode,a.nama_admin,a.username,a.level,a.foto,a.user_status,a.tarif_dokter');
            $this->db->from('tbl_admin a');
            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.nama_admin',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.nama_admin',$search);
                $this->db->or_like('a.username',$search);
                $this->db->or_like('a.level',$search);
                $this->db->or_like('a.tarif_dokter',$search);
            }
            
            break;

            case 'pembayaran':
            $this->db->select('a.kode_pembayaran,a.kode_rekam,a.tanggal_pembayaran,a.status_pembayaran,b.nama_pasien');
            $this->db->from('tbl_pembayaran a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_pembayaran',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_pembayaran',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->or_like('a.kode_rekam',$search);
                $this->db->or_like('a.tanggal_pembayaran',$search);
                $this->db->or_like('a.status_pembayaran',$search);
            }
            
            break;

            case 'farmasi_all':
            $this->db->select('a.kode_pembayaran,a.kode_rekam,a.status_pembayaran,a.tanggal_pembayaran,a.status_pemberian_obat,b.nama_pasien');
            $this->db->from('tbl_pembayaran a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_pembayaran',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_pembayaran',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->or_like('a.kode_rekam',$search);
                $this->db->or_like('a.tanggal_pembayaran',$search);
                $this->db->or_like('a.status_pemberian_obat',$search);

            }
            
            break;

            case 'farmasi':
            $this->db->select('a.kode_pembayaran,c.kode_rekam,a.status_pembayaran,a.tanggal_pembayaran,a.status_pemberian_obat,b.nama_pasien');
            $this->db->from('tbl_sub_obat c');
            $this->db->join('tbl_pembayaran a','a.kode_rekam = c.kode_rekam');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');

            $this->db->where('c.kode_rekam NOT LIKE','%HCR%');
            $this->db->where('c.kode_rekam NOT LIKE','%RANAP%');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_pembayaran',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            $this->db->group_by('c.kode_rekam');

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_pembayaran',$search);
                $this->db->where('c.kode_rekam NOT LIKE','%HCR%');
                $this->db->where('c.kode_rekam NOT LIKE','%RANAP%');

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('c.kode_rekam NOT LIKE','%HCR%');
                $this->db->where('c.kode_rekam NOT LIKE','%RANAP%');

                $this->db->or_like('c.kode_rekam',$search);
                $this->db->where('c.kode_rekam NOT LIKE','%HCR%');
                $this->db->where('c.kode_rekam NOT LIKE','%RANAP%');

                $this->db->or_like('a.tanggal_pembayaran',$search);
                $this->db->where('c.kode_rekam NOT LIKE','%HCR%');
                $this->db->where('c.kode_rekam NOT LIKE','%RANAP%');

                $this->db->or_like('a.status_pemberian_obat',$search);
                $this->db->where('c.kode_rekam NOT LIKE','%HCR%');
                $this->db->where('c.kode_rekam NOT LIKE','%RANAP%');

            }

            
            break;

            case 'tagihan':
            $this->db->select('a.kode_pasien,a.nama_pasien,a.alamat,a.kredit');
            $this->db->from('tbl_pasien a');
            $this->db->where('a.kredit >',0);

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.nama_pasien',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_pasien',$search);
                $this->db->or_like('a.nama_pasien',$search);
                $this->db->or_like('a.alamat',$search);
            }
            
            break;

            case 'pasien':
            $this->db->select('a.kode_pasien,a.nama_pasien,a.alamat,a.kepala_keluarga,a.no_registrasi,a.tanggal_daftar');
            $this->db->from('tbl_pasien a');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.nama_pasien',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_pasien',$search);
                $this->db->or_like('a.nama_pasien',$search);
                $this->db->or_like('a.alamat',$search);
                $this->db->or_like('a.kepala_keluarga',$search);
                $this->db->or_like('a.tanggal_daftar',$search);
                $this->db->or_like('a.no_registrasi',$search);



            }
            
            break;

            case 'surat':
            $this->db->select('a.id,a.kode_surat,b.nama_pasien,a.keterangan,a.tanggal_pembuatan_surat,a.status');
            $this->db->from('tbl_surat a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');


            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.id',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_surat',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->or_like('a.keterangan',$search);
                $this->db->or_like('a.tanggal_pembuatan_surat',$search);
                $this->db->or_like('a.status',$search);
            }
            
            break;

            case 'tolak_ranap':
            $this->db->select('a.id,a.kode_ranap,b.nama_pasien,b.no_registrasi,a.tanggal_berobat,a.status_pasien');
            $this->db->from('tbl_ranap a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Ditolak');


            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.id',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_ranap',$search);
                $this->db->where('a.status_pasien','Ditolak');

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Ditolak');

                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Ditolak');

                $this->db->or_like('a.status_pasien',$search);
                $this->db->where('a.status_pasien','Ditolak');
                
            }
            
            break;

            case 'tolak_homecare':
            $this->db->select('a.id,a.kode_homecare,b.nama_pasien,b.no_registrasi,a.tanggal_berobat,a.status_pasien');
            $this->db->from('tbl_homecare a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Ditolak');


            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.id',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_homecare',$search);
                $this->db->where('a.status_pasien','Ditolak');

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Ditolak');

                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Ditolak');

                $this->db->or_like('a.status_pasien',$search);
                $this->db->where('a.status_pasien','Ditolak');
                
            }
            
            break;




            case 'laboratorium_belum_periksa':
            $this->db->select('a.kode_lab,a.tanggal_berobat,b.nama_pasien,a.status_pasien,a.keterangan_pemeriksaan_lab');
            $this->db->from('tbl_pemeriksaan_lab a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_lab',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('status_pasien','Belum Diperiksa');

                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('status_pasien','Belum Diperiksa');
                $this->db->or_like('a.keterangan_pemeriksaan_lab',$search);
                $this->db->where('status_pasien','Belum Diperiksa');

            }
            
            break;

            case 'ranap_belum_periksa':
            $this->db->select('a.kode_ranap,a.tanggal_berobat,b.nama_pasien,a.status_pasien,b.no_registrasi');
            $this->db->from('tbl_ranap a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.tanggal_berobat',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Belum Diperiksa');
                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');


                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');

            }
            
            break;

            case 'ranap_sedang_periksa':
            $this->db->select('a.kode_pasien,a.kode_ranap,a.tanggal_periksa,b.nama_pasien,a.status_pasien,b.no_registrasi');
            $this->db->from('tbl_ranap a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Sedang Rawat Inap');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.tanggal_berobat',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Sedang Rawat Inap');
                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Sedang Rawat Inap');


                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Sedang Rawat Inap');

            }
            
            break;

            case 'ranap_selesai_periksa':
            $this->db->select('a.kode_pasien,a.kode_ranap,a.tanggal_periksa,b.nama_pasien,a.status_pasien,b.no_registrasi');
            $this->db->from('tbl_ranap a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Sudah Pulang');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.tanggal_berobat',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Sudah Pulang');
                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Sudah Pulang');


                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Sudah Pulang');

            }
            
            break;


            case 'umum_belum_periksa':
            $this->db->select('a.kode_rekam,a.tanggal_berobat,b.nama_pasien,a.status_pasien,b.no_registrasi');
            $this->db->from('tbl_rekam_medik a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.date_time_update',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Belum Diperiksa');
                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');


                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');

            }
            
            break;


            case 'anc_belum_periksa':
            $this->db->select('a.kode_kehamilan,a.tanggal_berobat,b.nama_pasien,b.no_registrasi');
            $this->db->from('tbl_kehamilan a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien','left');
            $this->db->where('a.status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.date_time_update',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Belum Diperiksa');
                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');

                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');

            }
            
            break;


            case 'anc_sudah_periksa':
            $this->db->select('a.kode_kehamilan,a.tanggal_periksa,b.nama_pasien,a.dokter_pemeriksa,a.status_pasien,c.status_pembayaran');
            $this->db->from('tbl_kehamilan a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->join('tbl_pembayaran c','c.kode_rekam = a.kode_kehamilan');
            $this->db->where('a.status_pasien','Sudah Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.date_time_update',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Sudah Diperiksa');
                $this->db->like('a.tanggal_periksa',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Sudah Diperiksa');

            }
            
            break;


            case 'kb_belum_periksa':
            $this->db->select('a.kode_kb,a.tanggal_berobat,b.nama_pasien,a.status_pasien,b.no_registrasi');
            $this->db->from('tbl_kb a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.date_time_update',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Belum Diperiksa');
                $this->db->like('a.tanggal_berobat',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');

                $this->db->or_like('b.no_registrasi',$search);
                $this->db->where('a.status_pasien','Belum Diperiksa');

            }
            
            break;


            case 'kb_sudah_periksa':
            $this->db->select('a.kode_kb,a.tanggal_kembali,a.tanggal_periksa,b.nama_pasien,a.dokter_pemeriksa,a.status_pasien,c.status_pembayaran');
            $this->db->from('tbl_kb a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->join('tbl_pembayaran c','c.kode_rekam = a.kode_kb','left');

            $this->db->where('a.status_pasien','Sudah Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.date_time_update',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Sudah Diperiksa');
                $this->db->like('a.tanggal_periksa',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Sudah Diperiksa');

                $this->db->or_like('a.tanggal_kembali',$search);
                $this->db->where('a.status_pasien','Sudah Diperiksa');

            }
            
            break;





            case 'umum_sudah_periksa':
            $this->db->select('a.kode_rekam,a.dokter_pemeriksa,a.tanggal_periksa,b.nama_pasien,c.status_pembayaran');
            $this->db->from('tbl_rekam_medik a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->join('tbl_pembayaran c','c.kode_rekam = a.kode_rekam');
            $this->db->where('a.status_pasien','Sudah Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.date_time_update',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('a.status_pasien','Sudah Diperiksa');
                $this->db->like('a.tanggal_periksa',$search);

                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('a.status_pasien','Sudah Diperiksa');


                $this->db->or_like('a.dokter_pemeriksa',$search);
                $this->db->where('a.status_pasien','Sudah Diperiksa');


                $this->db->or_like('a.kode_rekam',$search);
                $this->db->where('a.status_pasien','Sudah Diperiksa');

            }
            
            break;

            case 'laboratorium_sudah_periksa':
            $this->db->select('a.kode_lab,a.tanggal_periksa,b.nama_pasien,a.status_pasien,a.keterangan_pemeriksaan_lab,a.petugas_lab');
            $this->db->from('tbl_pemeriksaan_lab a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('status_pasien','Sudah Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_lab',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('status_pasien','Sudah Diperiksa');
                $this->db->like('a.tanggal_periksa',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('status_pasien','Sudah Diperiksa');
                $this->db->or_like('a.keterangan_pemeriksaan_lab',$search);
                $this->db->where('status_pasien','Sudah Diperiksa');
                $this->db->or_like('a.petugas_lab',$search);
                $this->db->where('status_pasien','Sudah Diperiksa');

            }
            
            break;

            case 'rapid_belum_periksa':
            $this->db->select('a.kode_rapid,a.tanggal_berobat,b.nama_pasien,a.status_pasien,a.kode_pasien,b.no_registrasi');
            $this->db->from('tbl_rapid a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_rapid',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('status_pasien','Belum Diperiksa');
                $this->db->like('a.tanggal_berobat',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('status_pasien','Belum Diperiksa');

            }
            
            break;

            case 'rapid_sudah_periksa':
            $this->db->select('a.kode_rapid,a.tanggal_periksa,b.nama_pasien,a.status_pasien,a.dokter_pemeriksa');
            $this->db->from('tbl_rapid a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('status_pasien','Sudah Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_rapid',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('status_pasien','Sudah Diperiksa');
                $this->db->like('a.tanggal_periksa',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('status_pasien','Sudah Diperiksa');

            }
            
            break;


            case 'swab_belum_periksa':
            $this->db->select('a.kode_swab,a.tanggal_berobat,b.nama_pasien,a.status_pasien,a.kode_pasien,b.no_registrasi');
            $this->db->from('tbl_swab a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('status_pasien','Belum Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_swab',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('status_pasien','Belum Diperiksa');
                $this->db->like('a.tanggal_berobat',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('status_pasien','Belum Diperiksa');

            }
            
            break;

            case 'swab_sudah_periksa':
            $this->db->select('a.kode_swab,a.tanggal_periksa,b.nama_pasien,a.status_pasien,a.dokter_pemeriksa');
            $this->db->from('tbl_swab a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('status_pasien','Sudah Diperiksa');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_swab',$order);
            }else{

                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->where('status_pasien','Sudah Diperiksa');
                $this->db->like('a.tanggal_periksa',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->where('status_pasien','Sudah Diperiksa');

            }
            
            break;



            case 'kelahiran':
            $this->db->select('id,kode_kelahiran,hari,tanggal,jam,jenis_kelamin,nama_bayi,nama_ayah,nama_ibu,alamat');
            $this->db->from('tbl_kelahiran');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('id',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('kode_kelahiran',$search);
                $this->db->or_like('tanggal',$search);
                $this->db->or_like('nama_ayah',$search);
                $this->db->or_like('nama_bayi',$search);
                $this->db->or_like('nama_ibu',$search);
                $this->db->or_like('alamat',$search);

            }
            
            break;


            case 'pembelian_obat':
            $this->db->select('kode_beli,nama_pembeli,tanggal_pembelian,total_akhir');
            $this->db->from('tbl_pembelian_obat');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('kode_beli',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('kode_beli',$search);
                $this->db->or_like('nama_pembeli',$search);
                $this->db->or_like('tanggal_pembelian',$search);

            }
            
            break;

            case 'pembayaran_tagihan':
            $this->db->select('a.*,b.nama_pasien');
            $this->db->from('tbl_tagihan_pasien a');
            $this->db->join('tbl_pasien b','b.kode_pasien = a.kode_pasien');
            $this->db->where('a.kode_pembayaran_tagihan!=','0');

            if($_GET['order'][0]['column'] == 0)
            {
                $this->db->order_by('a.kode_tagihan',$order);
            }else{
                $this->db->order_by($sort,$order);
            }

            if ($search!=null && $search!='') {
                $this->db->like('a.kode_pembayaran_tagihan',$search);
                $this->db->or_like('b.nama_pasien',$search);
                $this->db->or_like('a.tanggal_bayar_tagihan',$search);
                $this->db->or_like('a.dibayarkan_oleh',$search);
            }
            
            break;



            case 'laporan_pasien_excel':
            $this->db->select('c.penyuluh_Satker,c.penyuluh_Nama,e.prov_Nama,c.penyuluh_NIK,count(d.realisasi_ID) as jml,COUNT(CASE WHEN a.rencana_Status = "Setuju" THEN 1 END) as jml_setuju');
            $this->db->from('sip2kat_realisasi_kegiatan d');
            $this->db->join('sip2kat_rencana_kegiatan a','d.rencana_ID = a.rencana_ID');
            $this->db->join('sip2kat_master_penyuluh c','c.penyuluh_ID = a.penyuluh_ID');
            $this->db->join('sip2kat_master_provinsi e','e.prov_ID = c.penyuluh_Prov');
            $this->db->order_by('c.penyuluh_Nama','asc');
            $filter   = $_POST;

            if($this->user->cekadminkabkota())
            {
                $this->db->where('c.penyuluh_Prov',$this->session->userdata('user_prov'));
                $this->db->where('c.penyuluh_KabKota',$this->session->userdata('user_kabkota'));
            }else if($this->user->cekadminprov())
            {
                $this->db->where('c.penyuluh_Prov',$this->session->userdata('user_prov'));
            }else if($this->user->cekpenyuluh()){
                $this->db->where('d.penyuluh_ID',$this->session->userdata('user_id'));
            }

            $this->db->group_by('a.penyuluh_ID');

            if(@$filter['filter_penyuluh']) $this->db->like('c.penyuluh_Nama', $filter['filter_penyuluh']);
            if(@$filter['filter_bulan'])$this->db->where('MONTH(d.realisasi_TglKegiatan)', $filter['filter_bulan']);
            if(@$filter['filter_tahun'])$this->db->where('YEAR(d.realisasi_TglKegiatan)', $filter['filter_tahun']);
            break;

            default:

            break;
        }
    }

    function count_filtered($type=null,$sort=null,$order=null,$search=null)
    {

        $this->_get_datatables_query($type,$sort,$order,$search);
        return $this->db->get()->num_rows();
        // return $query->num_rows();


    }



    public function count_all($type=null,$sort=null,$order=null,$search=null)
    {
        $this->_get_datatables_query($type,$sort,$order,$search);
        return $this->db->get()->num_rows();
        // $results = $db_results->result();
        // $num_rows = $db_results->num_rows();
        // return $num_rows;
    }

}
