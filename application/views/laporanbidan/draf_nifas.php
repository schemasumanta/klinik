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
								<table id="mytable" border="1" class="display table table-bordered table-hover" style="overflow: scroll;"> 
									 
									<thead>

										<tr>
											<th style="text-align: left;" colspan="22">LAPORAN REKAM MEDIK nifas : <?php echo strtoupper($this->session->nama_pt); ?><br> Tanggal :  <?php echo date("d-M-y"); ?> <br> Alamat :  Jl.Pasir Beureum, Desa.Jagabaya, Kec.Parungpanjang</th>
										</tr>


										<tr style="font-size: 12px;text-align: center;">
											<th>No</th>
											<th>Tanggal Kunjungan</th> 
											<th>No Kohort</th>
											<th>Kode Rekam</th> 								
											<th>Nama Pasien</th> 
											<th>Alamat</th>	 										
											<th>Rt</th>
											<th>Rw</th> 
											<th>Desa</th> 
											<th>Kecamatan</th>											
											<th>Umur</th>

											<th>kunjungan</th> 
											<th>subjektif</th>
											<th>keadaan_umum</th>
											<th>kesadaran</th>
											<th>tekanan_darah</th>
											<th>nadi</th>
											<th>respirasi</th>
											<th>suhu</th>
											<th>payudara</th>
											<th>asi</th>
											<th>tfu</th>
											<th>kotraksi</th>
											<th>pendarahan</th>
											<th>lokhea</th>
											<th>perineum</th> 
											<th>kandungan_kemih</th> 
											<th>oedema</th> 
											<th>assesment</th> 
											<th>plening</th> 
											<th>tindakan_dokter</th> 
											<th>dokter_pemeriksa</th> 







										</tr>

									</thead>
									
									<tbody id="show_data" style="font-size: 10px;"> 

										<?php 
										$no=1; 
										foreach ($laporan_nifas as $key ){?>

										<tr style="text-align: center;">
											<td><?php echo $no; ?></td>
											<td><?php echo $key->tanggal_berobat; ?></td> 											
											<td><?php echo $key->no_registrasi; ?></td>												
											<td><?php echo $key->kode_nifas; ?></td>  	
											<td><?php echo $key->nama_pasien; ?></td>  

											<td><?php echo $key->alamat; ?></td>												
											<td><?php echo $key->rt; ?></td> 												
											<td><?php echo $key->rw; ?></td> 
											<td><?php echo $key->desa; ?></td>
											<td><?php echo $key->kecamatan; ?></td>	
											<td><?php echo $key->umur; ?></td>
											<td><?php echo $key->kunjungan; ?></td> 
											<td><?php echo $key->subjektif; ?></td>
											<td><?php echo $key->keadaan_umum; ?></td>
											<td><?php echo $key->kesadaran; ?></td>
											<td><?php echo $key->tekanan_darah; ?></td>
											<td><?php echo $key->nadi; ?></td>
											<td><?php echo $key->respirasi; ?></td>
											<td><?php echo $key->suhu; ?></td>
											<td><?php echo $key->payudara; ?></td>
											<td><?php echo $key->asi; ?></td>
											<td><?php echo $key->tfu; ?></td>
											<td><?php echo $key->kotraksi; ?></td>
											<td><?php echo $key->pendarahan; ?></td>
											<td><?php echo $key->lokhea; ?></td>
											<td><?php echo $key->perineum; ?></td> 
											<td><?php echo $key->kandungan_kemih; ?></td> 
											<td><?php echo $key->oedema; ?></td> 
											<td><?php echo $key->assesment; ?></td> 
											<td><?php echo $key->plening; ?></td> 
											<td><?php echo $key->tindakan_dokter; ?></td> 
											<td><?php echo $key->dokter_pemeriksa; ?></td> 



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

		function exportTableToExcel(mytable, filename = 'Laporan NIFAS'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















