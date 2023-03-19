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
      <!-- <img src="./logo.png" alt="Logo"> -->
      <img src="<?php echo base_url() ?>assets/img/print_pembayaaran.png" style="width: 150px;height:150px;margin-left: 55px" > 
     
      <P style="font-size:14px; text-align: center;  margin-left: 2px;"> BUKTI PEMBAYARAN <br>
       <?php echo $key->kode_lab; ?><br></p>
       <span class="kamu" style="font-size: 13px; margin-right: 41px;" >TANGGAL</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->tanggal_pembayaran) ?></span><br> 

       <span class="kamu" style="font-size: 13px; margin-right: 15px;" >KODE PASIEN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->kode_pasien) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 51px;">NO.REG</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->no_registrasi) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 15px">NAMA PASIEN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->nama_pasien) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 8px">PEMERIKSAAN</span>
       <span>:</span>
       <span style="font-size: 13px; ">LABORATORIUM</span> 
<br>
<br>
<table width="100%">
  <thead>
    <tr>
      
        <th class="obat"style="text-align: left;font-size:13px" colspan="2">Rincian</th>
      <th class="rp" style="text-align: right;font-size:13px">Rp.</th>
    </tr>
  </thead>
  <tbody>

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
    <td style=" font-size:13px">Biaya Pemeriksaan</td>
    <td></td>
    <td style="text-align: right;font-size:13px"><?php echo number_format(($key->total_akhir), 0, ',', '.'); ?></td>

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
<?php if ($key->biaya_admin!=0) {?>
  <tr>
    <td style=" font-size:13px">Biaya Admin</td>
    <td></td>
    <td style="text-align: right;font-size:13px"><?php echo number_format(($key->biaya_admin), 0, ',', '.'); ?></td>

  </tr> 
<?php } ?>
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
    <td style=" font-size:13px;font-weight: bold;">Total Pemeriksaan</td>
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
<p class="centered" style="font-weight: ">-----------------------------------------------------------<br></p>
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
  const $btnPrint = document.querySelector("#btnPrint");
  $btnPrint.addEventListener("click", () => {
    window.print();
  });
</script>