<html><head><meta http-equiv=Content-Type content="text/html; charset=UTF-8"><style type="text/css">
  span.cls_002{font-family:Arial,serif;font-size:16.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  div.cls_002{font-family:Arial,serif;font-size:16.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  span.cls_004{font-family:Arial,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  div.cls_004{font-family:Arial,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
  span.cls_005{font-family:Arial,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  div.cls_005{font-family:Arial,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
  .stempel2{opacity: 0.8}    
  .abs{position:  absolute;}
  .approver{left:35.03px;top:595.12px}
  .approver2{left:351.53px;top:595.12px}
  .ttd2{position: absolute;left:0.03px;top:0px}    
  .ttd{position: absolute;left:-10px;top:-10px}
  .alamat{left:193.08px;top:337.48px;word-wrap: break-word}    
  .judul{left:171.05px;top:49.23px}
  #garis{left:50%;margin-left:-297px;top:0px;width:595px;height:841px;border-style:outset;overflow:hidden;}
  .posisiatas{top:0;left:0;}
  .telp_unpam{left:171.05px;top:89.62px}
  .jalan{left:171.05px;top:72.83px}
  .web{left:171.05px;top:106.42px}
  .table1, th, td {
		    border: 1px solid #999;
		    padding: 5px 18px;
		    border: 1px solid #000000;
		}
    @media print {#garis{border : 0px solid black;line-height: border-box}	}
 /* @media(max-width: 640px) {#garis{transform: scale(0.7);margin: 0px}}
  @media(max-width: 450px) {#garis{transform: scale(0.6);margin: 0px}}
  @media(max-width: 350px) {#garis{transform: scale(0.5);margin: 0px}}
  @media(max-width: 250px) {#garis{transform: scale(0.4);margin: 0px}}*/

</style>
</head><body style="font-size: 16px;zoom:100%;"><?php foreach ($data_rapid as $row) {?>
  <div class="abs" id="garis">
    <div class="abs posisiatas">
     </div>
      <div class="col col-md-12 mb-4">
        <center><img style=" width:98%; height:98px; margin-top: 10px;" src="<?php echo base_url() ?>assets/img/lab.png"  >   </center>

      </div>  

       <div  style="left:11.08px;top:120.25px; right::11.08" class="col col-md-12 mb-4 cls_005 abs">
     <table class="table1 table-sm" border="1"  width="112%" style="font-size: 11px;font-family: sans-serif;color: #232323;border-collapse: collapse">
       <tr><td colspan="4" style="padding: 2px 10px;"></td></tr>
       <tr>
         <td style="font-weight: bold;">Nama</td>
         <td style="text-align: left;"><?php echo $row->nama_pasien ?></td>
         <td style="font-weight: bold;" width="25%">Dokter Pengirim</td>
         <td><?php echo $row->dokter_pengirim ?></td>
       </tr>

       <tr>
        <td style="font-weight: bold;">Umur</td>
        <td><?php echo $row->umur ?></td>
        <td style="font-weight: bold;">No.Lab</td>
        <td ><?php echo $row->no_lab ?></td>
      </tr>

      <tr>
        <td style="font-weight: bold;" width="22%"> Jenis Kelamin </td>
        <td><?php echo $row->jk ?></td>
        <td style="font-weight: bold;">Tanggal </td>
        <td><?php echo $row->tanggal_periksa ?></td>
      </tr>
      <tr>
        <td style="font-weight: bold;">Alamat</td>
        <td colspan="3"><?php echo $row->alamat ?></td> 
      </tr>
      <tr><td colspan="4" style="padding: 2px 10px;"></td></tr>

    </table>
  </div>

      <br>
      <br>
 <div  style="left:11.08px;top:243.25px; right:11.08px " class="col col-md-12 mb-4 cls_005 abs">
   <table class="table1 table-sm" border="1" width="100%" style="font-family: sans-serif;color: #232323;border-collapse: collapse">

     <tr style="text-align: left;color: blue;font-size: 14px;">
      <td>PEMERIKSAAN</td>
      <td>Hasil</td>
      <td>Nilai Normal</td>
      <td>Metode Pemeriksaan</td>
    </tr>
    <thead>
      <tbody>
       <tr>
        <td colspan="4" style="font-size: 11px;text-align: left;color: green;font-weight: bold"><?php echo $row->pengobatan ?></td>

      </tr>
      <tr>
        <td style="text-align: center;font-size: 11px;"><?php echo $row->pemeriksaan ?></td>
        <td style="text-align: center;font-size: 11px;font-weight: bold"><?php echo $row->hasil ?></td>
        <td style="text-align: center;font-size: 11px;"><?php echo $row->nilai_normal ?></td>
        <td style="text-align: center;font-size: 11px;"><?php echo $row->metode_pemeriksaan ?></td>
      </tr>
    </tbody>
  </thead>

</table>
</div>


      <div style="left:1px;top:350.25px; " class="col col-md-12 mb-4 cls_005 abs">

      <p style="font-family: sans-serif; padding-left: 15px; font-size: 13px">Interprestasi dan saran	<br>																	
		Jika hasil pemeriksaan Rapid Test SARS Cov-2 : Positif	<br>																	
		saran <br>																		
		1, Lanjutkan pemeriksaan konfirmasi dengan pemeriksaan RT -PCR <br>																	
		2, Lakukan karantina atau isolasi sesuai kriteria	<br>																		
		3, Menerapakan perilaku hidup bersih dan sehat : mencuci tangan menerapkan etika batuk	<br>																		
		menggunakan masker dan menjaga stamina. Serta tetap menjaga jaga jarak	<br>																		

		Jika hasil pemeriksaan Rapid Test SARS Cov-2 : Negatif	<br>																		
		Catatan : <br>																
		Hasil negatif tidak menyingkirkan kemungkinan terinfeksi SARS Cov-2 sehingga masih berisiko menularkan		<br>																	
		kepada orang lain,disarankan tes ulang atau tes konfirmasi dengan RT-PCR jika memiliki gejala dan	<br>																		
		atau diketahui memiliki kontak erat dengan pasien terkonfirmasi COVID 19		<br>																	
	</p>

	</div>
	<br>
	<br>
	 
     
      
      <div style="left:351.53px;top:650.30px" class="cls_005 abs"><span class="cls_005">Parungpanjang, <?php $tanggal=explode('-', $row->tanggal_periksa);
      $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
      echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?></span></div>
     <!--  <div style="left:35.03px;top:535.53px" class="cls_005 abs"><span class="cls_005">Mengetahui,</span></div>
      <div style="left:35.03px;top:545.93px" class="cls_004 abs"><span class="cls_004">Wakil Rektor III</span></div> -->
      <div style="left:351.53px;top:670.93px" class="cls_004 abs"><span class="cls_004">Pemeriksa</span></div>
       <div style="left:351.53px;top:740.93px" class="cls_004 abs"><span class="cls_004">( Nazmi Hilman )</span></div>
      
        
    </div>
  <?php  } ?>
  <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>


  <script type="text/javascript">
   function displayEmbeddedPdf (event){
    event.preventDefault();
    let pdfSource = $(this).data("pdf");

    let pdfDisplay=`<embed class="embed-responsive-item embedded-pdf" 
    src="https://via.placeholder.com/150#view=FitH">`

    $(this).parent().append(pdfDisplay);
  }

  $( document ).ready(function() {
    $(".open-pdf").click(displayEmbeddedPdf) 
  });

</script>
</body></html>

