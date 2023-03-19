<?php
class Excel_import_model extends CI_Model
{
 function select()
 {
  $this->db->order_by('kode_obat', 'DESC');
  $query = $this->db->get('tbl_satuan_obat');
  return $query;
 }

 function insert($data)
 {
  $this->db->insert_batch('tbl_satuan_obat', $data);
 }
}
