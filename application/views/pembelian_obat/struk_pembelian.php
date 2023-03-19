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
    width: 250px;
    max-width: 250px;
    margin-right: 5px; 
    margin-left: 5px; 
  }

  img {
    max-width: 90%; 
  }

  @media print {
    .hidden-print,
    .hidden-print * {
      display: none !important;
    }





  </style>
</head>
<body>
  <?php foreach($struk_pembelian as $row){ ?>
    <div class="ticket">
      <!-- <img src="./logo.png" alt="Logo"> -->
      <!-- <img src="<?php echo base_url() ?>assets/img/logo_print_new.png" style=" margin-left: 10px;" >  -->
      <!-- <img src="<?php echo base_url() ?>assets/img/print_pembayaaran.png" style="width: 150px;height:150px;margin-left: 55px" >  -->

      <a href="<?php echo site_url('dashboard'); ?>" class="logo" >
          <img src="<?php echo base_url().$this->session->logo_thermal ?>" class="mr-2"style="width: 150px;height:150px;margin-left: 55px;">
        </a>
      <!-- <p style="font-size: 15px; text-align: center;  margin-left: 2px;">Jl.Pasir Berem, Desa.Jagabaya, Kec.Parungpanjang</p> -->
      <P style="font-size:14px; text-align: center;  margin-left: 2px;"> BUKTI PEMBAYARAN <br>
       <b><?php echo ucfirst($row->kode_beli); ?></b> </p>===========================<br> 

     </thead> 
     <th class="obat"style="text-align: left;font-size: 20px; font-weight: bold;">Nama Pembeli</th>
     <th >:</th>
     <th class="description" style="font-size: 20px;font-weight: bold;"><?php echo $row->nama_pembeli?></th>   
   </thead>
 </thead> <br> 
 <th class="obat"style="text-align: left;font-size: 20px;font-weight: bold;">No Telepon</th>
 <th >:</th>
 <th class="description" style="font-size: 20px;font-weight: bold;"><?php echo $row->no_telepon?></th>   
</thead> 

<br>
<br>
<table width="100%">
  <thead>
    <tr>
      <th class="obat"style="text-align: left;font-size:15px">Obat</th>
      <th class="qty" style="font-size:15px">Qty</th> 
      <th class="rp" style="text-align: right;font-size:15px">Rp.</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($list_obat as $key) {?>
    <tr>
      <td  style="text-align: left;font-size: 12px; "><?php echo $key->nama_obat?></td>
      <td  style="text-align: center;font-size: 12px"><?php echo $key->qty?></td> 
      <td  style="text-align: right;font-size: 12px;padding-bottom:5px;"><?php echo number_format(($key->subtotal), 0, ',', '.')?></td>
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
    <td  colspan="2" style=" font-size:15px; padding-top: 5px;">Total Pembayaran</td> 
    <td style="text-align: right;font-size:12px"> <?php echo number_format(($row->total_akhir), 0, ',', '.'); ?></td> 
  </tr>
</tbody>
</table>  
<p class="centered" style="font-weight: ">-----------------------------------------------------<br></p>
<p style="font-size: 10px; text-align: center; ">Jl.Pasir Beureum, Desa.Jagabaya, Kec.Parungpanjang</p> 
<p style="text-align: left; font-size: 13px;">BUKTI INI SEBAGAI BUKTI <br> PEMBAYARAN YANG SAH MOHON DI SIMPAN</p>
 <!-- 
        
      </div>

      <?php } ?>
      <br>
      <button id="btnPrint" class="hidden-print">Print</button> 
    </body>
    </html>

    <script type="text/javascript">
      const $btnPrint = document.querySelector("#btnPrint");
      $btnPrint.addEventListener("click", () => {
        window.print();
      });
    </script>