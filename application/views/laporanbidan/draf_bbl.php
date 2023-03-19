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
											<th style="text-align: left;" colspan="22">LAPORAN REKAM MEDIK BBL : <?php echo strtoupper($this->session->nama_pt); ?><br> Tanggal :  <?php echo date("d-M-y"); ?> <br> Alamat :  Jl.Pasir Beureum, Desa.Jagabaya, Kec.Parungpanjang</th>
										</tr>

										<tr style="font-size: 12px;text-align: center;">
											<th>No</th>
											<th>Tanggal Kunjungan</th> 
											<th>No Kohort</th>
											<th>Kode Rekam</th> 								
											<th>Nama Pasien</th> 
											<th>Alamat</th>	 										
											<th>Umur</th> 
											<th>kunjungan </th> 
											<th>subjektif </th>
											<th>kesadaran </th>
											<th>tonus otot </th>
											<th>kulit </th>
											<th>respirasi </th>
											<th>detak jantung </th>
											<th>suhu </th>
											<th>kepala </th>
											<th>mata </th>
											<th>mulut </th>
											<th>perut telinga pusat </th>
											<th>punggung </th>
											<th>lubang anus </th>
											<th>alat kelamin </th>
											<th>bb </th>
											<th>pb </th>
											<th>lingkar kepala </th>
											<th>lingkar dada </th>
											<th>refleks </th>
											<th>refleks rooting </th>
											<th>refleks swalilong </th>
											<th>refleks sucking </th>
											<th>refleks eyeblink </th>
											<th>refleks graps </th>
											<th>refleks moro </th>
											<th>refleks babinski </th>
											<th>refleks tonic neck </th>
											<th>refleks labirin </th>
											<th>assesment </th>
											<th>planning </th>
											<th>inisial menyusui </th>
											<th>jaga bayi tetap hangat </th>
											<th>Keringkan bayi </th>
											<th>salep mata antibiotik </th>
											<th>suntik neo </th>
											<th>imunisasi hbo </th>
											<th>rawat gabung </th>
											<th>memandikan bayi </th>
											<th>konseling menyusui </th>
											<th>tanda tanda bahaya </th>
											<th>penjelasan </th>
											<th>catatan medis </th>
											<th>tindakan dokter </th>
											<th>dokter pemeriksa </th> 





										</tr>

									</thead>
									
									<tbody id="show_data" style="font-size: 10px;"> 

										<?php 
										$no=1; 
										foreach ($laporan_bbl as $key ){?>

											<tr style="text-align: center;">
												<td><?php echo $no; ?></td> 
												<td><?php echo $key->tgl_kunjungan; ?></td>									
												<td><?php echo $key->no_registrasi; ?></td>									
												<td><?php echo $key->kode_bbl; ?></td>  	
												<td><?php echo $key->nama_pasien; ?></td>  
												<td><?php echo $key->alamat; ?>, Rt/Rw.<?php echo $key->rt; ?>.<?php echo $key->rw; ?>, DS. <?php echo $key->desa; ?>, KEC. <?php echo $key->kecamatan; ?></td>	  	
												<td><?php echo $key->umur; ?></td>
												<td><?php echo $key->kunjungan; ?></td>										
												<td><?php echo $key->subjektif; ?></td>
												<td><?php echo $key->kesadaran; ?></td>
												<td><?php echo $key->tonus_otot; ?></td>
												<td><?php echo $key->kulit; ?></td>
												<td><?php echo $key->respirasi; ?></td>
												<td><?php echo $key->detak_jantung; ?></td>
												<td><?php echo $key->suhu; ?></td>
												<td><?php echo $key->kepala; ?></td>
												<td><?php echo $key->mata; ?></td>
												<td><?php echo $key->mulut; ?></td>
												<td><?php echo $key->perut_telinga_pusat; ?></td>
												<td><?php echo $key->punggung; ?></td>
												<td><?php echo $key->lubang_anus; ?></td>
												<td><?php echo $key->alat_kelamin; ?></td>
												<td><?php echo $key->bb; ?></td>
												<td><?php echo $key->pb; ?></td>
												<td><?php echo $key->lingkar_kepala; ?></td>
												<td><?php echo $key->lingkar_dada; ?></td>
												<td><?php echo $key->refleks; ?></td>
												<td><?php echo $key->r_rooting; ?></td>
												<td><?php echo $key->r_swalilong; ?></td>
												<td><?php echo $key->r_sucking; ?></td>
												<td><?php echo $key->r_eyeblink; ?></td>
												<td><?php echo $key->r_graps; ?></td>
												<td><?php echo $key->r_moro; ?></td>
												<td><?php echo $key->r_babinski; ?></td>
												<td><?php echo $key->r_tonic_neck; ?></td>
												<td><?php echo $key->r_labirin; ?></td>
												<td><?php echo $key->assesment; ?></td>
												<td><?php echo $key->planning; ?></td>
												<td><?php echo $key->inisial_menyusui; ?></td>
												<td><?php echo $key->jaga_bayi_tetap_hangat; ?></td>
												<td><?php echo $key->kringkan_bayi; ?></td>
												<td><?php echo $key->salep_mata_antibiotik; ?></td>
												<td><?php echo $key->suntik_neo; ?></td>
												<td><?php echo $key->imunisasi_hbo; ?></td>
												<td><?php echo $key->rawat_gabung; ?></td>
												<td><?php echo $key->memandikan_bayi; ?></td>
												<td><?php echo $key->konseling_menyusui; ?></td>
												<td><?php echo $key->tanda_tanda_bahaya; ?></td>
												<td><?php echo $key->penjelasan; ?></td>
												<td><?php echo $key->catatan_medis; ?></td>
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

		function exportTableToExcel(mytable, filename = 'Laporan bbl'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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















