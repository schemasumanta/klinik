<!DOCTYPE html>
<html  lang="en"><head><meta charset="utf-8">
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
	<style type="text/css">
		.judul{
			width: 175px !important
		}
		.ttd{
			max-width: 75px;
		}
		@media print {
			.hidden-print,
			.hidden-print * {
				display: none !important;

			}
			* {   
				color: black;
				margin:0px!important;
			}
			
		</style>
	</head><body>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">     

									<button class="btn btn-success btn-sm mr-1 hidden-print" id="konvert" onclick="exportTableToExcel('mytable')">Export  to Excel</button>

								</div>  
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<h4 class="text-center mt-5"><b>LEMBAR OBSERVASI & PEMBERIAN OBAT</b></h4>
											<h4 class="text-center mb-3 "><b>PASIEN RAWAT JALAN <?php echo $this->session->nama_pt; ?></b></h4>
											<hr style="border: 1px double black">
											<div class="row mb-3">
												<?php foreach ($homecare as $row): ?>

													<div class="col-md-2">
													</div>
													<div class="col-md-3 input-group">
														<p class="judul">Nama Pasien </p>
														<p>: <?php echo $row->nama_pasien; ?></p>
													</div>

													<div class="col-md-2">
													</div>
													<div class="col-md-3 input-group">
														<p class="judul">No. Register</p>
														<p>: <?php echo $row->no_registrasi; ?></p>
													</div>
													<div class="col-md-2">
													</div>
													<div class="col-md-2">
													</div>
													<div class="col-md-3 input-group">
														<p class="judul">Kepala Keluarga</p>
														<p>: <?php echo $row->kepala_keluarga; ?></p>
													</div>
													<div class="col-md-2">
													</div>

													<!-- <div class="col-md-3 input-group">
														<p class="judul">Umur</p>
														<p>: <?php $umur=explode(".", $row->umur); if ($umur[0]!=0) {
															echo $umur[0]." Tahun ";	
														}if ($umur[1]!=0) {
															echo $umur[1]." Bulan";	
														} ?></p>
													</div> -->

													<div class="col-md-3 input-group">
														<p class="judul">Umur</p>
														<p>: <?php  echo $row->umur ?> Th </p>
													</div>


													<div class="col-md-2">
													</div>
													<div class="col-md-2">
													</div>
													<div class="col-md-3 input-group">
														<p class="judul" >Tanggal Berobat</p>
														<p>: <?php echo $row->tanggal_berobat; ?></p>

													</div>
													<div class="col-md-2">
													</div>
													<div class="col-md-3 input-group">
														<p class="judul" >Kode homecare</p>
														<p><b>: <?php echo $row->kode_homecare; ?></b></p>

													</div>
													<div class="col-md-2">
													</div>

												<?php endforeach ?>

											</div>

										</div>
									</div>
									<div class="table-responsive">
										<table id="mytable" class="display table table-bordered table-hover" style="overflow: scroll;"> 
											<thead>
												<tr style="font-size: 12px;text-align: center;">
													<th rowspan="2" >No</th>
													<th rowspan="2" >Tanggal <br>Pemeriksaan</th>
													<th rowspan="2" >Jam <br>Pemeriksaan</th>
													<th rowspan="2" >Tensi <br>Darah</th>
													<th rowspan="2" >Nadi</th>
													<th rowspan="2" >Respirasi</th>
													<th rowspan="2" >Suhu</th>
													<th rowspan="2" >SPO2</th>
													<th rowspan="2" >Volume <br>Air Kemih</th>
													<th rowspan="2" >Hasil <br>Pemeriksaan</th>
													<th rowspan="2" >Terapi / <br>Anjuran</th>
													<th colspan="3">Pemberian Obat</th>
													<th rowspan="2" >TTD / <br>Pasien</th>
													<th rowspan="2" >TTD / <br>Pemeriksa</th>
												</tr>
												<tr style="font-size: 12px;text-align: center;">
													<th>Nama Obat</th>
													<th>Keterangan</th>
													<th>Qty</th>
													<th>Dosis</th>
												</tr>

											</thead>

											<tbody id="show_data" style="font-size: 10px;"> 

												<?php 
												$no=1; 
												foreach ($observasi as $key){?>
													<?php $baris = 0; $list_obat =''; $list_ket=''; $list_qty=''; $list_dosis=''; for ($i=0; $i < count($obat); $i++) {

														if ($obat[$i]->sub_homecare==$key->kode_observasi) {
															if ($list_obat =='') {
																$list_obat.=(++$baris).'. '.$obat[$i]->nama_obat;
															}else{
																$list_obat.='<br><br>'.(++$baris).'. '.$obat[$i]->nama_obat;
															}

															if ($list_ket =='') {
																$list_ket.=$obat[$i]->keterangan;
															}else{
																$list_ket.='<br><br>'.$obat[$i]->keterangan;
															}

															if ($list_qty =='') {
																$list_qty.=$obat[$i]->qty;
															}else{
																$list_qty.='<br><br>'.$obat[$i]->qty;
															}

															if ($list_dosis =='') {
																$list_dosis.=$obat[$i]->aturan_pakai;
															}else{
																$list_dosis.='<br><br>'.$obat[$i]->aturan_pakai;
															}

														}else{
															$baris = 0;
														}
													} ?>

													<tr style="text-align: center;">
														<td><?php echo $no; ?></td> 
														<td><?php echo $key->tanggal_pemeriksaan; ?></td> 
														<td><?php echo $key->jam_pemeriksaan; ?></td>
														<td><?php echo $key->tensi_darah; ?></td> 
														<td><?php echo $key->frequensi_nadi; ?></td> 
														<td><?php echo $key->respirasi; ?></td> 
														<td><?php echo $key->suhu; ?></td>
														<td><?php echo $key->spo2; ?></td> 
														<td><?php echo $key->volume_air_kemih; ?></td> 
														<td><?php echo $key->hasil_pemeriksaan; ?></td> 
														<td><?php echo $key->terapi_anjuran; ?></td>
														<td class="text-left"><?php echo $list_obat; ?></td>
														<td class="text-left"><?php echo $list_ket; ?></td>
														<td><?php echo $list_qty; ?></td>
														<td class="text-left"><?php echo $list_dosis; ?></td>
														<td><?php if ($key->ttd_pasien!=''): ?>
														<img class="ttd" src="<?php echo base_url().$key->ttd_pasien ?>">
														<?php endif ?></td> 
														<td><?php if ($key->ttd_pemeriksa!=''): ?>
														<img class="ttd" src="<?php echo base_url().$key->ttd_pemeriksa ?>">
														<?php endif ?></td> 

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

				function exportTableToExcel(mytable, filename = 'Laporan ANC'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
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

})
</script>


</body></html>












