<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <title>Struk Pembayaran</title>
  <style type="text/css">
    * {  
      font-family: 'Arial';
      font-size: 13px;
      /*color: black;*/
    }

    td,
    th,
    tr,
    table {
      border-top: 1px solid black; 
      border-collapse: collapse;
    }  
    .centered {
      text-align: center;
      align-content: center;
      margin-left: 2px;
    }

    .ticket {
      width: 260px;
      max-width: 260px;
      margin-left:0px;
      margin-right: 5px;
    }


   @media print {
    .hidden-print,
    .hidden-print * {
      display: none !important;

    }
     * {   
      color: black;
    }


    .judul{
      text-align: left;
      padding-left: 100px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <?php foreach($struk_pembayaran as $key){ ?>
    <div class="ticket">
     


      <a href="<?php echo site_url('dashboard'); ?>" class="logo" >
          <img src="<?php echo base_url().$this->session->logo_thermal ?>" class="mr-2"style="width: 150px;height:150px;margin-left: 55px;filter: grayscale(100%);">
        </a>
      <P style="font-size:14px; text-align: center;  margin-left: 2px;"> BUKTI PEMBAYARAN <br>
       <?php echo ucfirst($key->kode_rekam); ?><br></p>
<?php 
$pemeriksaan = array(
  'ANC' => 'ANC', 
  'IMN' => 'IMUNISASI', 
  'BBL' => 'BBL', 
  'KB' => 'KB', 
  'NFS' => 'NIFAS', 
  'UM' => 'UMUM', 
  'INC' => 'INC', 
  'RPD' => 'RAPID TES SARS - COVID-2', 
  'SWAB' => 'SWAB ANTIGEN SARS - COV-2', 
  'HCR' => 'HOME CARE', 
  'RANAP' => 'RAWAT INAP',
  'POBAT' => 'PEMBELIAN OBAT', 
); 
  $keys = array_keys($pemeriksaan);
  for ($i=0; $i < count($keys); $i++) { 
    if (strpos($key->kode_rekam,$keys[$i])!==false) {
   $pengobatan =$pemeriksaan[$keys[$i]];
    }
  }
?>
       <span class="kamu" style="font-size: 13px; margin-right: 41px;" >TANGGAL</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->tanggal_pembayaran) ?></span><br> 

       <span class="kamu" style="font-size: 13px; margin-right: 15px;" >KODE PASIEN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->kode_pasien) ?></span><br> 

        <!-- <?php if(strpos($key->kode_rekam,'POBAT')==0) { ?> -->
       <span class="kamu" style="font-size: 13px;margin-right: 51px;">NO.REG</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->no_registrasi) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 15px">NAMA PASIEN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->nama_pasien) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 8px">PEMERIKSAAN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($pengobatan) ?></span> 
<?php }?>




<br>
<table width="100%">
  <thead>
    <tr>
      <?php if (count($detail_obat) > 0){ ?>

        <th class="obat"style="text-align: left;font-size:13px">Obat</th>
        <th class="qty" style="font-size:13px">Qty</th>
      <?php }else{ ?>
        <th class="obat"style="text-align: left;font-size:13px" colspan="2">Rincian</th>
      <?php } ?>
      <th class="rp" style="text-align: right;font-size:13px">Rp.</th>
    </tr>
  </thead>
  <tbody>
    <?php if (count($detail_obat) > 0){ ?>

     <?php foreach ($detail_obat as $obat) {?>
      <tr>
        <td  style="text-align: left;font-size: 12px; "><?php echo $obat->nama_obat?></td>
        <td  style="text-align: center;font-size: 12px"><?php echo $obat->qty?></td>
        <td  style="text-align: right;font-size: 12px"><?php echo number_format(($obat->subtotal), 0, ',', '.')?></td>
      </tr> 

    </tr>

  <?php } ?>

<?php } ?>


<!-- <?php if ($key->pengobatan !=''){ ?>


<tr> 
  <td><?php echo $key->pengobatan;  ?></td>    
  <td> </td> 
  <?php if ($key->pengobatan==0){ ?>
  <td style="text-align: right;"><?php echo $key->pemeriksaan_rapid; ?></td> 
  <?php } ?>
</tr>
<?php } ?> -->




<tr> 
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr> 
  <td></td>
  <td></td>
  <td></td>
</tr>


<?php $k=1; if (count($tambahan)>0) {?>
  <tr>
    <td colspan="3" style=" font-size:13px">Pengobatan Tambahan</td> 

  </tr>
  <?php foreach ($tambahan as $tambah){ ?>

    <tr>
      <td style=" font-size:13px"><?php echo $tambah->tindakan_pemeriksaan;  ?></td>
      <td></td>
      <td style="text-align: right;font-size:13px"><?php echo number_format($tambah->biaya_pemeriksaan, 0, ',', '.'); ?></td> 
    </tr>
  <?php }}?>
  <?php if (isset($pemeriksaan_lab)) {?>
   <tr>
    <td style=" font-size:13px">Pemeriksaan Lab&nbsp;(<?php echo $jumlah_lab; ?>x)</td>
    <td></td>
    <td style="text-align: right;font-size:13px"><?php echo number_format($pemeriksaan_lab, 0, ',', '.'); ?> </td>
  </tr>
<?php } ?>

  <?php if (count($detail_obat) > 0){ ?>

    <tr>
      <td style=" font-size:13px"><b>Total</b></td>
      <td></td>
      <td style="text-align: right;font-size:13px"><b><?php if(strpos($key->kode_rekam,'POBAT')==0) { $upah_dokter=$key->upah_dokter; ?>  <?php } else{ $upah_dokter=0;} ?> <?php echo number_format(floatval($key->total_akhir) - floatval($upah_dokter), 0, ',', '.'); ?> </b></td> 
    </tr>
  <?php } ?>

  <tr>
    <td style=" font-size:13px">Jasa Dokter</td>
    <td></td>
    <td style="text-align: right;font-size:13px"> <?php if(strpos($key->kode_rekam,'POBAT')==0) { $upah_dokter=$key->upah_dokter; ?>  <?php } else{ $upah_dokter=0;} ?> <?php echo number_format(($upah_dokter), 0, ',', '.'); ?></td>

  </tr>

  <tr>
    <td style=" font-size:13px">Biaya Admin</td>
    <td></td>
    <td style="text-align: right;font-size:13px"><?php echo number_format(($key->biaya_admin), 0, ',', '.'); ?></td>

  </tr> 
  <?php if ($key->total_pembayaran == 0) {?>
    <tr>
    <td style="text-align: center;font-weight:bold;font-size:15px" colspan="3" >G R A T I S</td>
  </tr>
  <?php }else{ ?>
  <tr>
    <td style=" font-size:13px">Disc (Rp)</td>
    <td></td>
    <td style="text-align: right;font-size:13px"> <?php echo $key->discount; ?></td>
  </tr>
<?php } ?>
  <tr> 
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr> 
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr>
    <td style=" font-size:13px;font-weight: bold;">Total Pengobatan</td>
    <td></td>
    <td style="text-align: right;font-size:13px;font-weight: bold;"> <?php echo number_format($key->total_pembayaran, 0, ',', '.'); ?></td>
  </tr>
  <?php if ($key->tagihan_sebelumnya !=0): ?>
    <tr>
      <td style=" font-size:13px;font-weight: bold;">Tagihan Sebelumnya</td>
      <td></td>
      <td style="text-align: right;font-size:13px;font-weight: bold;"> <?php echo number_format ($key->tagihan_sebelumnya, 0, ',', '.'); ?></td>

    </tr>
  <?php endif ?>



  <tr>
    <td style=" font-size:13px;font-weight: bold;">Dibayarkan</td>
    <td></td>
    <td style="text-align: right;font-size:13px;font-weight: bold;"> <?php echo number_format($key->dibayarkan, 0, ',', '.'); ?></td>

  </tr> 

  <tr>
    <td style=" font-size:13px;font-weight: bold;">Kembalian</td>
    <td></td>
    <td style="text-align: right;font-size:13px;font-weight: bold;"> <?php echo number_format($key->kembalian, 0, ',', '.'); ?></td>

  </tr> 

  <tr>
    <td style=" font-size:13px;font-weight: bold;">Sisa Tagihan</td>
    <td></td>
    <td style="text-align: right;font-size:13px;font-weight: bold;"> <?php echo number_format(floatval($key->total_pembayaran)+floatval($key->tagihan_sebelumnya)-floatval($key->dibayarkan)+floatval($key->kembalian), 0, ',', '.'); ?></td>

  </tr> 


</tbody>
</table>
<p class="centered" style="font-weight: ">-----------------------------------------------------<br></p>
<p style="font-size: 10px; text-align: center; ">Jl.Pasir Beureum, Desa.Jagabaya, Kec.Parungpanjang</p> 
<p style="text-align: left; font-size: 13px;">BUKTI INI SEBAGAI BUKTI <br> PEMBAYARAN YANG SAH MOHON DI SIMPAN</p>
 <!-- 
<p style="text-align: center; font-size:15px;">Melayani : Sunat Anak (laser) - Praktek Dokter umum- Praktek Kebidanan  <br> Persalinan 24 Jam <br>No. 62 858-9380-7155 </p> -->

</div>

<?php } ?>
<br>
<!-- <button id="btnPrint" class="hidden-print">Print</button> -->

</body>
</html>

<script type="text/javascript">
 
</script>