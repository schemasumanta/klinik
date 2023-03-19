

<!DOCTYPE html>
<html>
<title>Tarik Laporan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/kartu.css"> -->

<body>

  <div class="w3-container">

    <h2></h2> 

    <div class="w3-card-4" style="width:100%;">
      <header class="w3-container w3-white"> 
       <!--  <img class="img mt-3" style=" width:500px; height:125px"src="<?php echo base_url() ?>/assets/img/logo1.png" style="margin-left:5px; ">  -->
       <div class="container judul" style="border: 0px solid black;text-align: center;font-weight: bold;"><h3>DAFTAR PASIEN <?php echo strtoupper($this->session->nama_pt);?></h3></div>
       <!-- <center><img class="img mt-3" style=" width:125px; height:125px"src="<?php echo base_url() ?>/assets/img/logo.png" style="margin-left:5px; "></center> -->
       <br>
        
       
     </header> 
     <style type="text/css">
      td, th {
        border: 1px solid #dddddd;
        padding: 8px;
      }
      table{
        margin: 0px auto;
        color: black;
        font-weight: bold;
      }

      th{
        text-align: center;
      }
    </style>

    <table id="mytable" class="table-sm" style="font-size:12px;">
      <thead>

        <tr >
          <!-- <td>Kode</td> -->
          <th>No</th>  
          <th>Kode Pasien</th>                   
          <th >Nama Pasien</th>
          <th >Tanggal Registrasi</th>  
          <th >JK</th> 
          <th >Tempat Lahir</th> 
          <th >Tanggal Lahir</th> 
          <th >Umur</th> 
          <th >Agama</th> 
          <th >Jenis Pasien</th>           
          <th >Status Pernikahan</th> 
          <th >Telepon</th>  
           <th >Tinggi </th> 
          <th >Berat </th>
          <th >Alamat</th>  

        </tr>

      </thead>
      <tbody >
        <?php 
        $no=1;
        foreach ($cetak_laporan as $row) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $row->kode_pasien ?></td>
            <td><?php echo $row->nama_pasien ?></td>
            <td><?php echo $row->tanggal_daftar ?></td>
            <td><?php echo $row->jk ?></td> 
            <td><?php echo $row->tempat_lahir ?></td>
            <td><?php echo $row->tanggal_lahir ?></td>
            <td><?php echo $row->umur ?></td>
            <td><?php echo $row->agama ?></td>
            <td><?php echo $row->kategori_pasien ?></td>            
            <td><?php echo $row->status_pernikahan ?></td>
            <td><?php echo $row->telepon ?></td>
            <td><?php echo $row->tinggi_badan ?></td>
            <td><?php echo $row->berat_badan ?></td>
            <td><?php echo $row->alamat ?></td>
          </tr>
        <?php } ?>

      </tbody>



    </table>


    

  </div>

</div>

</body>
</html>

 

