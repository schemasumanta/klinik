<!DOCTYPE html>
<html><head>
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
</head><body>

</body>
</html>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">     

							<button class="btn btn-success btn-sm mr-1" id="konvert" onclick="exportTableToExcel('mytable')">Export  to Excel</button>

						</div> 

						<?php  $bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];?>

						<div class="card-body">
							<div class="table-responsive">
								<table id="mytable" class="display table table-bordered table-hover" style="overflow: scroll;"> 
									<thead>
									    	<tr style="font-size: 12px;text-align: center;">
											<th colspan="8"><h2>LAPORAN ABSENSI <?= strtoupper($karyawan[0]->nama_admin); ?></h2><br><h4>Periode <?= $bulan[$bulan_absen]." ".$tahun_absen?></h4></th>
										
										</tr>
										


										<tr style="font-size: 12px;text-align: center;">
											<th>No</th>
											<th>Tanggal</th>
											<th>Jam Masuk</th>
											<th>Jam Pulang</th>
										</tr>

									</thead>
									
									<tbody id="show_data" style="font-size: 10px;"> 

										<?php $no=1; foreach ($list_hari as $key){?>
											
												    <?php $cek =0; foreach($absen_masuk as $msk){ 
												    if($msk->tanggal_absensi==$key['tgl']){ $cek+=1; }}
												    
												    ?>
												    <?php if($cek==0){?>
												   
												 <tr style="text-align: center;">
											    
											    	<td class="bg-danger text-white"><?php echo $no; ?></td>
											    	<td class="bg-danger text-white"><?php $tanggal = explode('-',$key['tgl']);echo $key['hari'].", ".$tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]; ?></td>
										            <td class="text-center bg-danger text-white">Tidak Hadir</td>
												    <td class="text-center bg-danger text-white">Tidak Hadir</td>
												   </tr>
												    <?php }else{ ?>
												    <?php $cek =0; foreach($absen_masuk as $msk){ 
												        
												    if($msk->tanggal_absensi==$key['tgl']){?>
												     <tr style="text-align: center;">
												        <td class=""><?php echo $no; ?></td>
											    	<td ><?php $tanggal = explode('-',$key['tgl']);echo $key['hari'].", ".$tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]; ?></td>
										            <td class="text-center"><?= $msk->jam;?></td>
										             <td class="text-center">
										            <?php $cek =0; foreach($absen_pulang as $plg){ ?>
										           
										            <?php if($plg->tanggal_absensi==$msk->tanggal_absensi){ echo $plg->jam; }}?>
										            
										            </td>
												   
												     </tr>
												    <?php }  }  }   $no++; } ?>

										</tbody>
									</table>
								</div>
							</div>




						</div>
					</div>


				</div>
			</div>
		</div>

		<!-- MODAL UPDATE -->

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
	<script type="text/javascript">

		function exportTableToExcel(mytable, filename = 'Laporan Izin'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















