<!DOCTYPE html>
<html><head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
		<script type="text/javascript">
			WebFont.load({
				google: {"families":["Lato:300,400,700,900"]},
				custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['http://superteknik.online/st/assets/css/fonts.min.css']},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
</head><body>
	<style type="text/css">

		td, th {
			border: 1px solid #4a4a4a;
			padding: 8px;
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
								<h2 style="text-align: center;">REISTRASI KOHORT IBU TAHUN <?php echo date("Y"); ?> </h2>
								<table id="mytable" border='1px' class="table-lg" class="display table table-bordered" style="overflow: scroll;"> 
									<thead>
										<!-- <tr>
											<td>Tahun</td>
											<td></td>
											<td><?php echo date("Y"); ?></td>
										</tr>

										<tr>
											<td>Provinsi</td>
											<td></td>
											<td>Jawa Barat</td>
										</tr>

										<tr>
											<td>Kota / Kab</td>
											<td></td>
											<td>Bogor</td>
										</tr> -->
										<tr>
											<th colspan="166"></th>
										</tr>
										<tr style="font-size: 12px;text-align: center;">
											<th rowspan="4">Nomor_Kohort</th>
											<th rowspan="4" style="padding-left:50px;padding-right:50px;">NO REKAM MEDIK</th> 
											<th rowspan="4">Tanggal Kunjungan</th> 
											<th  colspan="6">NAMA</th> 
											<th  colspan="15">ALAMAT</th>								
											<th   colspan="6">UMUR</th> 
											<th  colspan="9">HAMIL KE</th>	 										

											<th  colspan="3">JARAK KEHAMILAN</th>											
											<th  colspan="3">BB T III </th>											
											<th  colspan="3">TB</th>											
											<th  rowspan="4">HB 8 9%</th>									
											<th  colspan="3">TENSI</th>	 
											<th  colspan="6">PENDEKTESI FAK RISIK</th>	 
											<th   colspan="3">IMUNISASI</th>
											<th  colspan="19">KUNJUNGAN</th> 
											<th colspan="19">TAHUN <?php echo date("Y"); ?></th>
											<th  colspan="9" rowspan='2'>PENOLONGAN PERSALINAN OLEH</th>											
											<th  colspan="9" >KELAHIRAN</th>											
											<th  colspan="9" >IBU MENYUSUI</th>											
											<th  rowspan="5" colspan="3" >KETERANGAN</th>											

										</tr>

										<tr style="font-size: 12px;text-align: center;">
											<th colspan="3"rowspan='3'>IBU</th>											
											<th colspan="3"rowspan='3'>SUAMI</th>	 
											<th colspan="3" rowspan='3'>KP</th>	 
											<th colspan="3" rowspan='3'>RT</th>	 
											<th colspan="3" rowspan='3'>RW</th> 
											<th colspan="3"rowspan='3'>DESA</th> 
											<th colspan="3"rowspan='3'>KECAMATAN</th> 
											<th colspan="3">IBU</th> 
											<th colspan="3">KEHAMILAN</th> 
											<th colspan="3" rowspan='3'>1</th> 
											<th colspan="3"rowspan='3'> 1-4 </th> 
											<th colspan="3" rowspan='3'>>5</th> 
											<th colspan="3" rowspan='3'> <3TH / >3TH </th>  
											<th colspan="3" rowspan='3'> <45KG </th> 
											<th colspan="3" rowspan='3'> <145CM </th> 
											<th colspan="3" rowspan='3'> 180/95 MmHg</th> 
											<th colspan="3" rowspan='3'>K</th> 
											<th colspan="3" rowspan='3'>NK</th> 
											<th colspan="3" rowspan='3'>TT1,TT2,TT3</th> 
										 
											<th colspan="40">TAHUN <?php echo date("Y"); ?></th> 
											<th colspan="3" rowspan='3'>LM</th>
											<th colspan="3" rowspan='3'> <2500 </th>
											<th colspan="3" rowspan='3'>>2500</th>

											<th colspan="3" rowspan='3'>BUFAS I</th>
											<th colspan="3" rowspan='3'>BUFAS II</th>
											<th colspan="3" rowspan='3'>BUFAS III </th>
										 
										</tr>

										<tr style="font-size: 12px;text-align: center;">


											<th colspan='3'rowspan='2'> <20 20-35>35 </th>	 
											<th colspan='3'rowspan='2'> 0-12MG 13-</th>	 
											<th colspan='3'>Januari</th>	 
											<th colspan='3'>Februari</th>	 
											<th colspan='3'>Maret</th>	 
											<th colspan='3'>April</th>	 
											<th colspan='3'>Mei</th>	 
											<th colspan='3'>Juni</th>	 
											<th colspan='3'>Juli</th>	 
											<th colspan='3'>Agustus</th>	 
											<th colspan='3'>September</th>	 
											<th colspan='3'>Oktober</th>	 
											<th colspan='3'>November</th>	 
											<th colspan='3'>Desember</th>

											<th colspan="3" rowspan='2'>TK</th>
											<th colspan="3" rowspan='2'>DT</th>
											<th colspan="3" rowspan='2'>TT</th>
											<!-- <th >Desember</th>	 
											<th >Desember</th>	 
											<th >Desember</th>	 
											  -->
											 
										</tr>

										 <tr style="font-size: 12px;text-align: center;"> 
												<?php for ($i=1; $i <=12 ; $i++) { ?> 
													<th width="75px">A</th> 
													<th width="75px">B</th> 
													<th width="75px">C</th> 
												<?php } ?> 
											</tr>


									</thead>

									<tr style="font-size: 12px;text-align: center;"> 
											<th  colspan='166'></th> 
											 
										</tr> 

									</thead>
									
									<tbody id="show_data" style="font-size: 10px;font-color:black;"> 
										<?php 
										$no=1; 
										foreach ($laporan_ibu as $key ){?>	

											<tr style="text-align: center;">
												<td><?php echo  $key->no_registrasi; ?></td>
												<td style="width:50%;"><?php echo $key->kode_kehamilan; ?></td> 											
												<td><?php echo $key->tanggal_periksa; ?></td>												
												<td colspan="3" class="a"><?php echo $key->nama_pasien; ?></td>												
												<td colspan="3"><?php echo $key->kepala_keluarga; ?></td>	 	  

												<td colspan="3"><?php echo $key->alamat; ?></td> 
												<td colspan="3"><?php echo $key->rt; ?></td> 
												<td colspan="3"><?php echo $key->rw; ?></td> 
												<td colspan="3"><?php echo $key->kecamatan; ?> </td> 
												<td colspan="3"><?php echo $key->kabupaten; ?> </td>  
												<td colspan="3"><?php echo $key->umur; ?></td>
												<td colspan='3'>tidak ada</td>												
												<td colspan='3'>-</td>	 										
												<td colspan='3'>-</td>	 										
												<td colspan='3'>-</td>	 										
												<td colspan='3'><?php echo $key->jarak; ?></td>
												<td colspan='3'> -</td>	 										
												<td colspan='3'><?php echo $key->bb; ?></td>	 										
												<td colspan='3'><?php echo $key->tb; ?> sda</td>	 										
												<td colspan='3'>-</td>
												<td colspan='3'>-</td>	 										
												<td colspan='3'><?php echo $key->imunisasi_tt; ?></td>	 										
								  										
											 								
										 		<?php for ($i=1; $i <=12 ; $i++) { ?> 
														<?php if (intval(date_format(date_create($key->tanggal_periksa),'m'))==$i){ ?>
															<td><?php echo date_format(date_create($key->tanggal_periksa),'d') ?></td>
															<td><?php echo date_format(date_create($key->tanggal_periksa),'d/m/y') ?></td>	 
															<td><?php echo $key->imunisasi_tt; ?></td>	 
															<td><?php echo $key->table_fe; ?></td>	
														<?php } else{ ?>
															<td></td>
															<td></td>
															<td></td>
														<?php } ?>
														

													<?php } ?>  

													<td colspan="3"></td>	   									
													<td colspan="3"></td>	   									
													<td colspan="3"></td>

													<td colspan="3"></td>	   									
													<td colspan="3"></td>	   									
													<td colspan="3"></td>	

													<td colspan="3"></td>	   									
													<td colspan="3"></td>	   									
													<td colspan="3"></td>  		
													
													<td colspan="3"><?php echo $key->keterangan ?></td>  		

											 
											 									
												 								
												 								
											 								
												 									



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

		function exportTableToExcel(mytable, filename = 'LAPORAN KOHORT IBU'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















