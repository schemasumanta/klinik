

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

  <?php
  $list_bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
  ?>

  <div class="w3-container">

    <h2></h2> 

    <div class="w3-card-4" style="width:100%;">
      <header class="w3-container w3-white"> 
       <!--  <img class="img mt-3" style=" width:500px; height:125px"src="<?php echo base_url() ?>/assets/img/logo1.png" style="margin-left:5px; ">  -->
       <div class="container judul" style="border: 0px solid black;text-align: center;font-weight: bold;"><h3>DATA PEMAKAIAN OBAT <?php echo strtoupper($this->session->nama_pt);?> <br> PERIODE <?php echo strtoupper($list_bulan[$bulan])." ".$tahun; ?></h3></div>


       <br>
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

    <table id="mytable" class="table w-100" style="font-size:12px;">
      <thead>

        <tr >
          <th>No</th>  
          <th>Kode Obat</th>                   
          <th >Nama Obat</th>
          <th >Keterangan</th>
          <th >Pemakaian</th>  
        </tr>
      </thead>
      <tbody >

       <?php $tanggal_sekarang = date_create(date('Y-m-d')); $no=1; foreach ($obat as $row) { ?>
        <tr>
          <td class="text-center" ><?php echo $no++ ?></td>
          <td class="text-center" ><?php echo $row->kode_obat ?></td>
          <td ><?php echo $row->nama_obat ?></td>
          <td ><?php echo $row->keterangan ?></td>
          <td class="text-center"><?php echo $row->jumlah > 0 ?$row->jumlah :0 ?></td>

        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
  function exportTableToExcel(mytable, filename = 'Data_laporan'){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(mytable);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    filename = filename?filename+'.xls':'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if(navigator.msSaveOrOpenBlob){
      var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
    }else{
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
      downloadLink.download = filename;
      downloadLink.click();
    }
  }

</script>

