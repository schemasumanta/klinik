<!DOCTYPE html>
<html><head>
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
</head><body>
	<style type="text/css">
		td, th {
			border: 1px solid black;
			padding: 8px;
			color: black;
		}
		table{
			margin: 0px auto;
		}

		th{
			text-align: center;
		}
	</style>

</body>
</html>

<?php
function bulan($bulan)
{
Switch ($bulan){
    case 1 : $bulan="Januari";
        Break;
    case 2 : $bulan="Februari";
        Break;
    case 3 : $bulan="Maret";
        Break;
    case 4 : $bulan="April";
        Break;
    case 5 : $bulan="Mei";
        Break;
    case 6 : $bulan="Juni";
        Break;
    case 7 : $bulan="Juli";
        Break;
    case 8 : $bulan="Agustus";
        Break;
    case 9 : $bulan="September";
        Break;
    case 10 : $bulan="Oktober";
        Break;
    case 11 : $bulan="November";
        Break;
    case 12 : $bulan="Desember";
        Break;
    }
return $bulan;
}
?>
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
							<div >
								
								<table id="mytable"class="table-sm" border="1" style="overflow-x:scroll;position: absolute;font-size:12px">

									<thead>

										<tr>

											<th colspan="46" style="text-align:left;">
												<img src="<?php echo base_url()?>assets/img/kop.jpg" width=500 height=100></img><br><br>	
																						</tr>
											<h4 style="text-align: left;">REGISTRASI KOHORT KB <?php echo date("Y"); ?> </h4>  </th>
											<tr style="font-size: 12px;text-align: center;">
												<th rowspan="3" width="50px">No</th> 
												<th  rowspan="3" width="100px">No Registrasi</th>  
												<th  rowspan="3" width="150px">Nama Akseptor/Suami</th> 
												<th  rowspan="3" width="350px">Alamat</th>	 
												<th  rowspan="3"width="75px">Umur</th>	 
												<th  rowspan="3" width="100px">Jumlah Anak</th>	 
												<th  rowspan="3" width="100px">Gakin</th>	 
												<th  rowspan="3" width="100px">4T</th>	 
												<th  rowspan="3" width="300px">ALKI (Anemia/Lila>23,5 cm/Sakit kronis/IMS)</th>	 
												<th  rowspan="3" width="200px">Pasca Persalinan</th> 
												<th colspan="36">TAHUN <?php echo date("Y"); ?></th>											

											</tr>

											<tr style="font-size: 12px;text-align: center;">
												<?php for ($i=1; $i <=12 ; $i++) { ?>
													<th colspan="3"width="50px" >Bulan <?php echo $i;date('m')  ?></th>		 

												<?php } ?>  
											</tr>

											<tr style="font-size: 12px;text-align: center;">



												<?php for ($i=1; $i <=12 ; $i++) { ?> 
													<th width="75px">A</th> 
													<th width="75px">B</th> 
													<th width="75px">C</th> 
												<?php } ?> 
											</tr>




										</thead>

										<tbody id="show_data" style="font-size: 10px;text-align: right;"> 
											<?php 
											$no=1; 
											foreach ($laporan_kb as $key ){?>	

												<tr style="text-align: center;">
													<td><?php echo $no; ?></td> 								
													<td><?php echo $key->no_registrasi; ?></td>			 
													<td><?php echo $key->nama_pasien; ?>/<?php echo $key->kepala_keluarga; ?></td>  

													<td ><?php echo $key->alamat; ?>, Rt/Rw.<?php echo $key->rt; ?>/<?php echo $key->rw; ?>, Desa. <?php echo $key->desa; ?>, Kec. <?php echo $key->kecamatan; ?>, Kab. <?php echo $key->kabupaten; ?></td> 

													<td><?php echo $key->umur; ?></td>
													<td><?php echo $key->jml_anak; ?></td>	

													<td></td>											
													<td></td>
													<td></td>											
													<td></td>


													<?php for ($i=1; $i <=12 ; $i++) { ?> 
														<?php if (intval(date_format(date_create($key->tanggal_periksa),'m'))==$i){ ?>
															<td><?php echo date_format(date_create($key->tanggal_periksa),'d') ?></td>
															<td><?php echo $key->akseptor; ?></td>	 
															<td><?php echo $key->alat_kontrasepsi; ?></td>	
														<?php } else{ ?>
															<td></td>
															<td></td>
															<td></td>
														<?php } ?>
														

													<?php } ?> 




													






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

			function exportTableToExcel(mytable, filename = 'LAPORAN KOHORT KB'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















