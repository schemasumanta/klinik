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

    img {
     /* max-width: inherit;
     width: inherit;*/

     max-width: 300px;
     height: 50px;
     margin-left: 55px;
     /*width: inherit;*/
   }

   @media print {
    .hidden-print,
    .hidden-print * {
      display: none !important;
    }

    .judul{
      text-align: left;
      padding-left: 100px;
      font-size: 20px;
    }



  </style>
</head>
<body onload="window.print()">
  <?php foreach($cetak_pembayaran as $key){ ?>
    <div class="ticket">
      <!-- <img src="./logo.png" alt="Logo"> -->
      <img src="<?php echo base_url() ?>assets/img/a.png" style="" > 
      <!-- <span style="margin-left: 55px;font-weight: bold; font-size: 15px;"> <?php echo strtoupper($this->session->nama_pt);?></span><br> -->
      <P style="font-size:14px; text-align: center;  margin-left: 2px;"> BUKTI PEMBAYARAN <br>
       <?php echo ucfirst($key->kode_surat); ?><br></p>

       <span class="kamu" style="font-size: 13px; margin-right: 41px;" >TANGGAL</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->tanggal_pembuatan_surat) ?></span><br> 

       <span class="kamu" style="font-size: 13px; margin-right: 15px;" >KODE PASIEN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->kode_pasien) ?></span><br> 

      
       <span class="kamu" style="font-size: 13px;margin-right: 51px;">NO.REG</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->no_registrasi) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 15px">NAMA PASIEN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->nama_pasien) ?></span><br> 

       <span class="kamu" style="font-size: 13px;margin-right: 8px">KETERANGAN</span>
       <span>:</span>
       <span style="font-size: 13px; "><?php echo ucfirst($key->keterangan) ?></span> 

      
 




<br>
<br>
<table width="100%">
  <thead>
    <tr> 

        <th class="obat"style="text-align: left;font-size:13px">Keterangan</th> 
        <th > </th> 
        <th > </th> 
        <th class="obat"style="text-align: right;font-size:13px">Total</th> 

    </tr>
  </thead>
  <tbody> 
      <tr>
        <td  style="text-align: left;font-size: 12px; "><?php echo $key->keterangan?></td> 
        <td></td>
        <td></td>
        <td  style="text-align: right;font-size: 12px; "><?php echo number_format($key->total_akhir, 0, ',', '.');?></td> 

      </tr> 

    </tr>

 

 


<tr> 
  <td></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
<tr> 
  <td></td>
  <td></td> 
  <td></td>
  <td></td>
</tr>
 

  <tr>
    <td style=" font-size:13px;font-weight: bold;">Total Pengobatan</td>
    <td></td>
    <td></td>
    <td style="text-align: right;font-size:13px;font-weight: bold;"> <?php echo number_format($key->total_akhir, 0, ',', '.'); ?></td>
  </tr>
  



    


</tbody>
</table>
<p class="centered" style="font-weight: ">-----------------------------------------------------------<br></p>
<p style="font-size: 13px; text-align: center; ">Jl.Pasir Beureum, Desa.Jagabaya, Kec.Parungpanjang</p>

<p style="text-align: left; font-size: 13px;">BUKTI INI SEBAGAI BUKTI <br> PEMBAYARAN YANG SAH MOHON DI SIMPAN</p>
 <!-- 
<p style="text-align: center; font-size:15px;">Melayani : Sunat Anak (laser) - Praktek Dokter umum- Praktek Kebidanan  <br> Persalinan 24 Jam <br>No. 62 858-9380-7155 </p> -->

</div>
<?php } ?>
</body>
</html>

