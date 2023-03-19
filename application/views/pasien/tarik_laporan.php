

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

        <div class="row">
          <div class="col-md-1 ">
            <center><img src="<?php echo base_url() ?>assets/img/hms.png"  style="width: 125px; height:120px;"> </center>   
          </div>
          <div class="col-md-6">
            <p style="font-size:25px; text-align: left;padding-top:30px; font-weight: bold; color: green">DAFTAR PASIEN<br>KLINIK HMS MEDIKA</p>  
          </div>

        </div>
        <!--  <img class="img mt-3" style=" width:500px; height:125px"src="<?php echo base_url() ?>/assets/img/logo1.png" style="margin-left:5px; ">  -->
       <!--  <div class="container judul" style="border: 0px solid black;text-align: center;font-weight: bold;"><h3>DAFTAR PASIEN <?php echo strtoupper($this->session->nama_pt);?></h3></div> -->
        <!-- <center><img class="img mt-3" style=" width:125px; height:125px"src="<?php echo base_url() ?>/assets/img/logo.png" style="margin-left:5px; "></center> -->
        <br>
        <!-- <a href="<?php echo base_url("pasien/export"); ?>">
          <img src="<?php echo base_url() ?>assets/img/excel.png" width="50"  height="50" style="position: absolute; left: 95%;top: 2%;cursor: pointer;"  >
        </a><br><br> -->

        <img src="<?php echo base_url() ?>assets/img/excel.png" width="50"  height="50" style="position: absolute; left: 95%;top: 2%;cursor: pointer;" id="konvert" onclick="exportTableToExcel('mytable')">

      </header> 
      <style type="text/css">
        td, th {
          border: 1px solid #dddddd;
          padding: 8px;
        }
        table{
          margin: 0px auto;
        }

        th{
          text-align: center;
        }
      </style>

      <table id="mytable" border="1" class="table-sm" style="font-size:12px;">
        <thead>

          <tr  >
            <!-- <td>Kode</td> -->
            <th>No</th>  
            <th>Kode Pasien</th>                   
            <th>Nama Pasien</th>
            <th>Tanggal Registrasi</th>  
            <th>JK</th> 
            <th>Tempat Lahir</th> 
            <th>Tanggal Lahir</th> 
            <th>Umur</th> 
            <th>Agama</th> 
            <th>Jenis Pasien</th>           
            <th>Status Pernikahan</th> 
            <th>Telepon</th> 
            <th>Alamat</th>    
            <th>RT </th> 
            <th>RW </th>
            <th>Kecamatan </th>

          </tr>

        </thead>
        <tbody >
          <?php 
          $no=1;
          foreach ($tarik_laporan as $row) { ?>
            <tr >
              <td><?php echo $no++ ?></td>
              <td><?php echo $row->kode_pasien ?></td>
              <td><?php echo $row->nama_pasien ?></td>
              <td>  <?php $tanggal=explode('-', $row->tanggal_daftar);
              $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
              echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?> </td>

              <td><?php echo $row->jk ?></td> 
              <td><?php echo $row->tempat_lahir ?></td>
              <td>  <?php $tanggal=explode('-', $row->tanggal_lahir);
              $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
              echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?> </td>
              <td><?php echo $row->umur ?></td>
              <td><?php echo $row->agama ?></td>
              <td><?php echo $row->kategori_pasien ?></td>            
              <td><?php echo $row->status_pernikahan ?></td>
              <td><?php echo $row->telepon ?></td>
              <td><?php echo $row->alamat ?></td> 
              <td><?php echo $row->rt ?></td>
              <td><?php echo $row->rw ?></td>
              <td><?php echo $row->kecamatan ?></td>
            </tr>
          <?php } ?>

        </tbody>



      </table>




    </div>

  </div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script type="text/javascript">

    function exportTableToExcel(mytable, filename = 'Laporan Pasien'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(mytable);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
      var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
$(document).ready(function(){
  let html =$(this).html();
  alert(html);
})
</script>

