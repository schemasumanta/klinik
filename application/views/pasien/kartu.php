<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kartu Pasien</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url() ?>assets/img/logo.png" type="image/x-icon"/>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/k.css">

  <style type="text/css">
    .card{
      height: 491px; 
      width: 800px; 
      border-radius: 15px; 
      overflow: hidden;
      position: relative;
      z-index: 99;
      background: transparent;
    }
    .img{
      width: 600px;
      height: 120px;
      margin-top:20px;
      /*margin-left:5px;*/
    }

    .kp{
      text-align: right;
      font-weight: bold;
      font-size:  25px;
      padding-top: 30px;
      padding-right: 40px;
    }
    .p{
      font-weight: normal;

    }

    .gariskiri{
      border:1px;
      background: red;
      height: 45px; 
      margin-top: 10px;

    }

    .gariskiri:before{
      content:"";
      top: 0;
      right:0; 
      border-width:45px 40px 0px 0px;
      transform: scaleX(-1);
      border-style: solid;
      border-color: white transparent transparent white;
      position: absolute;
      
    }

    .gariskanan:before{
      content:"";
      top: 0;
      left:0; 
      border-width: 45px 40px 0px 0px;
      border-style: solid;
      border-color: #ffffff transparent transparent #ffffff;
     
      position: absolute;
      
    }

    .gariskanan{
      border:1px;
      background: #14aa05;
      height: 45px; 
      margin-top: 10px;

    }

    #kode_pasien{
      font-size: 30px; 
      text-align: center;
      font-weight: bold;
      margin-top: 10px;
      letter-spacing: 3px;
    }

    .judul{
      text-align: left;
      padding-left: 100px;
      font-size: 20px;
    }
    .isi{
      font-size: 20px;
    }

    .titik2{
      text-align: right;
      margin-right: -20px;
    }

    .bawah{
      position: absolute;
      bottom: 0 ;
      width: 100%;
      left: 0;
      z-index: -99;
    }
    .watermark{
      position: absolute;
      width: 300px;
      height: 285px;
      top:30%;
      left: 30%;
      z-index:0;
      opacity: 0.1;
    }

    body{
      width: 50%;
    }
  </style>

</head>
<body >
 <?php foreach($cetak as $row){ ?>
  <div class="container mt-5" > 
    <div class="card" >
      <img class="watermark" src="<?php echo base_url() ?>assets/img/logogs.png">
      <div class="row">
       <!-- <div class="col-md-6"><img class="img" src="<?php echo base_url() ?>assets/img/logo_kartubaru.png"></div>   -->
       <div class="col-md-6"><img class="img" src="<?php echo base_url() ?>assets/img/klinik.jpg"></div>  
       <div class="col-md-6 kp" ><span class="p"> Reg. No. </span> <span> <?php echo $row->no_registrasi ?></span></div>
     </div>

     <div class="row">
      <div class="col-md-6 gariskiri"></div>
      <div class="col-md-6 gariskanan" > </div>
    </div>

    <div class="row"> 
      <div class="col-md-12">
       <p class="card-text" id="kode_pasien"> <?php echo $row->kode_pasien ?></p>
     </div> 
   </div> 


   <div class="row mt-1 mb-1">
    <div class="col-md-4 judul"><span>Nama Lengkap</span></div>
    <div class="col-md-1 titik2">:</div>
    <div class="col-md-6 isi" ><span><?php echo ucfirst($row->nama_pasien) ?></span></div>
  </div> 
  <div class="row mb-1 ">
    <div class="col-md-4 judul"><span>Tanggal Lahir</span></div>
    <div class="col-md-1 titik2">:</div>
    <div class="col-md-6 isi" ><span><?php $tanggal=explode('-', $row->tanggal_lahir);
    $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
    echo $row->tempat_lahir.", ".$tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?></span></div>
  </div> 
  <div class="row mb-1 ">
    <div class="col-md-4 judul"><span>Jenis Kelamin</span></div>
    <div class="col-md-1 titik2">:</div>
    <div class="col-md-6 isi" ><span><?php if ($row->jk=="L") { echo "Laki-Laki"; } else{ echo "Perempuan"; }  ?></span></div>
  </div>

  <div class="row mb-1 ">
    <div class="col-md-4 judul"><span> Status</span></div>
    <div class="col-md-1 titik2">:</div>
    <div class="col-md-6 isi" ><span>  <?php echo ucfirst($row->status_pernikahan) ?></span></div>
  </div>

  <div class="row mb-1 ">
    <div class="col-md-4 judul"><span>Alamat </span></div>
    <div class="col-md-1 titik2">:</div>
    <div class="col-md-7 isi" ><span>  <?php echo ucwords($row->alamat) ?>, <?php echo ucwords('rt.'.$row->rt) ?>, <?php echo ucwords('rw.'.$row->rw) ?>, <?php echo ucwords('Desa.'. $row->desa) ?>, <?php echo ucwords('Kecamatan.'. $row->kecamatan) ?></span></div>
  </div>
  
  <img  class="bawah" src="<?php echo base_url() ?>assets/img/footer.png"  > 
  

</div>




</div>
<?php } ?>


</body>
</html>
