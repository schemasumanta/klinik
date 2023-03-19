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
						<div class="card-body">
							<div class="table-responsive">
								<table border="1" id="mytable" class="display table table-bordered table-hover" style="overflow: scroll;"> 
									<thead>

										<tr>
											<th style="text-align: left;" colspan="22">LAPORAN REKAM MEDIK KB : <?php echo strtoupper($this->session->nama_pt); ?><br> Tanggal :  <?php echo date("d-M-y"); ?> <br> Alamat :  Jl.Pasir Beureum, Desa.Jagabaya, Kec.Parungpanjang</th>
										</tr>


										<tr style="font-size: 12px;text-align: center;">
											<th>No</th>
											<th>Tanggal Kunjungan</th> 
											<th>No Kohort</th>
											<th>Kode Rekam</th>
											<th>Jenis pasien</th>								
											<th>Nama Pasiien</th> 
											<th>Alamat</th>	 										
											<th>Rt</th>
											<th>Rw</th> 
											<th>Desa</th>
											<!-- <th>Jagabaya</th> -->
											<th>Kecamatan</th>											
											<th>Umur</th>											
											<th>Tanggal Kembali</th>											
											<th>Alat Kontrasepsi</th>	 


										</tr>
										</tr>

									</thead>
									
									<tbody id="show_data" style="font-size: 10px;"> 
										<?php 
										$no=1; 
										foreach ($laporan_kb as $key ){?>

											<tr style="text-align: center;">
												<td><?php echo $no; ?></td>
												<td><?php echo $key->tanggal_berobat; ?></td> 											
												<td><?php echo $key->no_registrasi; ?></td>												
												<td><?php echo $key->kode_kb; ?></td>												
												<td><?php echo $key->akseptor; ?></td>	 	
												<td><?php echo $key->nama_pasien; ?></td>  

												<td><?php echo $key->alamat; ?></td>												
												<td><?php echo $key->rt; ?></td> 												
												<td><?php echo $key->rw; ?></td> 
												<td><?php echo $key->desa; ?></td>
												<td><?php echo $key->kecamatan; ?></td>	
												<td><?php echo $key->umur; ?></td>
												<td><?php echo $key->tanggal_kembali; ?></td>												
												<td><?php echo $key->alat_kontrasepsi; ?></td>	 										


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

		function exportTableToExcel(mytable, filename = 'Laporan KB'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















