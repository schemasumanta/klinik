<!DOCTYPE html>
<html><head >
  <style type="text/css">
    *{
      padding: 0px!important;
      margin: 0px!important;
      color:black!important;
    }

  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
 <?php foreach ($pasien as $row) { ?>
   
</head><body >
   <?php foreach ($detail_obat as $key): ?>
    <div>
      <h6 style="margin-left:5px!important;font-size: 14px;font-weight: bold;text-align: justify-all;margin-bottom: 10px!important;margin-top: 5px!important">KLINIK PRATAMA RAWAT INAP <br>HMS MEDIKA </h6>
      <p style="margin-left:5px!important;font-size: 11px;margin-bottom: 5px!important;"><?php echo $key->kode_rekam." / ".date('d-m-Y H:i') ?></p>
      <p  style="margin-left:5px!important;font-size: 12px;font-weight: bold;"><?php echo $row->nama_pasien ?></p>
       <p  style="margin-left:5px!important;font-size: 12px"><?php echo date_format(date_create($row->tanggal_lahir),'d.m.Y') ?></p>
      <p  style="margin-left:5px!important;font-size: 10px"><b><?php echo $key->nama_obat; ?></b></p>
      <p  style="margin-left:5px!important;font-size: 10px;">Qty : <?php echo $key->qty." ".$key->satuan_obat; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ED :</p>
   <p  style="margin-left:5px!important;font-size: 10px"><b><?php echo $key->aturan_pakai; ?></b></p>
      </div>
  <?php endforeach ?>

 <?php } ?>

</body></html>