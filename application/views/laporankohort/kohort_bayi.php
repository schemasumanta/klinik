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
								<h2 style="text-align: center;">REISTRASI KOHORT BAYI TAHUN <?php echo date("Y"); ?> </h2>
								<table id="mytable"  class="table-lg" class="display table table-bordered" style="overflow: scroll;"> 
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
											<th colspan="45"></th>
										</tr>
										<tr style="font-size: 12px;text-align: center;">
											<th rowspan="4">No</th> 
											<th  rowspan="4">No Kohort</th>
											<th  rowspan="4" colspan="3"   class="a">Kode Rekam</th>
											<th  rowspan="4">Nama Bayi</th>								
											<th  rowspan="4">Tanggal Lahir</th> 
											<th  rowspan="4">L/P</th>	 										

											<th  rowspan="4">Nama Ortu</th>											
											<th  rowspan="4">Alamat</th>										
											<th  rowspan="4">Desa</th>										
											<th  rowspan="4">Kecamatan</th>										
											<th  rowspan="4">Kabupaten</th>										
											<th  rowspan="4">Buku KIA</th>	 
											<th  rowspan="4">Berat Lahir</th>	  
											<th  colspan="5">Masa Neonatal</th>	   											
											<th  colspan="12" rowspan="2">Kunjugan Bayi</th>	   											
											<th  rowspan="5">VIT A 6 BULAN</th>	  
											<th  colspan="13" rowspan="2">Imunisasi</th> 	
											<th  rowspan="5">KEMATIAN POST NATAL</th>	  
											<th  rowspan="5">KETERANGAN</th>	  



										</tr>

										<tr style="font-size: 12px;text-align: center;">


											<th colspan="2">Saat Lahir</th>											
											<th colspan="3">Kunjungan Naenatal</th>	 
											   
										</tr>

										<tr style="font-size: 12px;text-align: center;"> 
											  
											<th colspan="2" rowspan="2">S/D 5 Jam</th> 
											<th>Pertama</th> 
											<th>Kedua</th> 
											<th>KeTiga</th> 
											<th rowspan="2">JAN</th> 
											<th rowspan="2">FEB</th> 
											<th rowspan="2">MAR</th> 
											<th rowspan="2">APR</th> 
											<th rowspan="2">MEI</th> 
											<th rowspan="2">JUN</th> 
											<th rowspan="2">JUL</th> 
											<th rowspan="2">AGUST</th> 
											<th rowspan="2">SEP</th> 
											<th rowspan="2">OKT</th> 
											<th rowspan="2">NOV</th> 
											<th rowspan="2">DES</th> 
											<th rowspan="2">HBO 7 HARI</th> 
											<th rowspan="2">BCG</th> 
											<th rowspan="2">POLIO 1</th> 
											<th rowspan="2">DPT 1</th> 
											<th rowspan="2">POLIO 2</th> 
											<th rowspan="2">DPT 2</th> 
											<th rowspan="2">POLIO 3</th> 
											<th rowspan="2">DPT 3</th> 
											<th rowspan="2">POLIO 4</th> 
											<th rowspan="2">CAMPAK</th> 
											<th rowspan="2">IPV</th> 
											<th rowspan="2">CAMPAK BOOSTER</th> 
											<th rowspan="2">DPT BOOSTER</th> 
											 
										</tr>


										<tr style="font-size: 12px;text-align: center;"> 
											  
											<th>6 S/D 48 JAM</th> 
											<th>3 S/D 7 HR</th> 
											<th>8 S/D 28 HR</th> 
											 
										</tr>



									</thead>
									
									<tbody id="show_data" style="font-size: 10px;"> 
										<?php 
										$no=1; 
										foreach ($laporan_bayi as $key ){?>	

											<tr style="text-align: center;">
												<td><?php echo $no; ?></td> 										
												<td><?php echo $key->no_registrasi; ?></td>												
												<td colspan="3" class="a"><?php echo $key->kode_bbl; ?></td>												
												<td >aa</td>												
												<td></td>	 
												<td><?php echo $key->jk; ?></td>												

												<td><?php echo $key->nama_pasien; ?>/<?php echo $key->kepala_keluarga; ?></td>  

												<td><?php echo $key->alamat; ?>, Rt/Rw.<?php echo $key->rt; ?>/<?php echo $key->rw; ?></td> 
												<td><?php echo $key->desa; ?></td>
												<td><?php echo $key->kecamatan; ?></td>
												<td><?php echo $key->kabupaten; ?></td>
												<td>-</td>
												<td><?php echo $key->bb; ?></td>												
												<td colspan="2"></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>	 										
												<td></td>	 										
												<td></td>
												<td></td>	 										
												<td></td>	 										
												<td></td>	 

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

		function exportTableToExcel(mytable, filename = 'LAPORAN KOHORT BAYI'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















