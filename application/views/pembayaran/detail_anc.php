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
	<style type="text/css"> 
	#mytable {
		font-family: Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	#mytable td, #mytable th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#mytable tr:nth-child(even){background-color: #f2f2f2;}

	#mytable tr:hover {background-color: #ddd;}

	#mytable th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #46b507;
		color: white;
	}
</style> 

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
						<div class="card-body">
							<div class="table-responsive">
								<div class="row">
									<div class="col-md-1 ">
										<center><img src="<?php echo base_url() ?>assets/img/hms.png"  style="width: 125px; height:125px;"> </center> 	
									</div>
									<div class="col-md-7">
										<p style="font-size:20px; text-align: left;padding-top:30px;font-weight: bold; ">DETAIL DATA LAPORAN KEUANGAN REKAM MEDIK ANC <br>KLINIK HMS MEDIKA</p>	
									</div>
									
								</div>

								<hr style="background-color: black;">

								<table id="mytable" class="display table table-bordered table-hover" > 
									<thead>
										<tr >
											<th  style="font-size: 20px;text-align: center;">No</th>
											<th  style="font-size: 20px;text-align: center;">Tanggal Pembayaran</th>  
											<th  style="font-size: 20px;text-align: center;">Nama Pasien</th> 	 							
											<th  style="font-size: 20px;text-align: center;">Total Pembayaran</th>  
										</tr>

									</thead>
									
									<tbody id="show_data" style="font-size: 10px;"> 

										<?php 
										$no=1; 
										foreach ($detail_anc as $key ){?>

											<tr style="text-align: center;">
												<td  style="font-size: 20px;"><?php echo $no; ?></td>
												<td  style="font-size: 20px;"><?php $tanggal=explode('-', $key->tanggal_periksa);
												$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
												echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?> </td>  

												<td  style="font-size: 20px;"><?php echo $key->nama_pasien; ?></td>  	 	
												<td  style="font-size: 20px;"><?php echo  $key->total_akhir ?></td>  


											</tr>
											<?php $no++; } ?>

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

		function exportTableToExcel(mytable, filename = 'Laporan  Rekam Medik Umum'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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
// $(document).ready(function(){
// 	let html =$(this).html();
// 	alert(html);
// })
</script>















