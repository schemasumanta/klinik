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
		#mytable th { 
			font-weight: normal; 
		}
		
		body {
			padding: 1rem;
			color: black;
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
						

						<table id="mytable" border="1" class="table-sm" style="overflow: scroll;border-color: black;">  
							<tbody> 
								<tr>
									<th colspan="9"><h3 style="text-align:center;">SOAP INTRA NATAL CARE</h3></th>
								</tr>
								
								<tr>
									<th style="border-top: 0px solid black;border-right: : 0px solid black;border-bottom: 0px solid black" width="2%"></th>
									<th style="border: 0px solid black" width="10%"></th>
									<th style="border: 0px solid black" width="10%"></th>
									<th style="border: 0px solid black" width="10%"></th>
									<th style="border: 0px solid black" width="10%"></th>
									<th style="border: 0px solid black" width="14%"></th>
									<th style="border: 0px solid black" width="15%"></th>
									<th style="border: 0px solid black" width="15%"></th>
									<th style="border: 0px solid black" width="14%"></th>

								</tr> 
								<?php 	$no=1; foreach ($laporan_inc as $key ){?>   
									

									<tr>
										<th rowspan="16" class="text-center" style="border-top: 0px solid black;"><?php echo $no++; ?></th>
									</tr>
									<tr>
										<!-- <th>Nama </th> -->
										<th style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">Nama</th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->nama_pasien; ?> </th>
									</tr>
									<tr>
										<th style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">Nama Suami</th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->kepala_keluarga; ?> </th> 
									</tr>
									<tr>
										<th style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">Usia </th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->umur;?> </th> 
									</tr>
									<tr>
										<th style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">Alamat </th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->alamat; ?></th>
									</tr>
									<tr>
										<th  style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">No.Telepon </th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->telepon; ?> </th> 
									</tr>
									<tr>
										<th style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">Kode Rekam</th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->kode_inc; ?>  </th> 
									</tr>
									<tr>
										<th style="border-right:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">Nama Kohort</th>
										<th colspan="7" style="border-left:0px solid black;border-bottom: 0px solid black;border-top:0px solid black">:&nbsp;<?php echo $key->no_registrasi; ?>  </th> 
									</tr>

									<tr  style="text-align: center;" class="bg-warning fw-bold">
										<th colspan="4" class="text-center fw-bold">SUBJEKTIF</th>
										<th colspan="4" class="text-center fw-bold">OBJEKTIF</th>
									</tr>
									<tr style="font-size: 12px;" class="bg-warning ">
										<th class="text-center fw-bold">KALA I</th>
										<th class="text-center fw-bold">KALA II</th> 
										<th class="text-center fw-bold">KALA III</th>
										<th class="text-center fw-bold">KALA IV</th> 
										<th class="text-center fw-bold">KALA I</th>
										<th class="text-center fw-bold">KALA II</th> 
										<th class="text-center fw-bold">KALA III</th>
										<th class="text-center fw-bold">KALA IV</th> 
									</tr> 
									<tr style="font-size: 12px;text-align: left;border-bottom: 2px solid black">
										<?php for ($j =1; $j <= 4 ; $j++) { ?>
											<?php $tgl = $key->{'tanggal_subjektif_kala'.$j};
											$jam = $key->{'jam_subjektif_kala'.$j};

											?>
											<th><p width="55px">Hari /Tanggal :&nbsp;<?php echo date_format(date_create($tgl),'d-m-Y'); ?><br>
												Jam :&nbsp;<?php echo $jam; ?></p>
											</th> 	 

										<?php } ?>

										<?php for ($o =1; $o <= 4 ; $o++) { ?>
											<?php $tgl = $key->{'tanggal_objektif_kala'.$o};
											$jam = $key->{'jam_objektif_kala'.$o};

											?>
											<th><p style="line-height: 25px">Hari /Tanggal :&nbsp;<?php echo date_format(date_create($tgl),'d-m-Y'); ?><br>
												Jam :&nbsp;<?php echo $jam; ?></p>
											</th> 	 

										<?php } ?>

										
									</tr>

									<tr style="font-size: 12px;text-align: left;">
										<th style="vertical-align: top!important;padding:5px !important"><p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_pasien_subjektif_kala1; ?></p>
										</th> 	 
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_pasien_subjektif_kala2; ?></p>
										</th> 	 
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_pasien_subjektif_kala3; ?></p>
										</th> 	 
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_pasien_subjektif_kala4; ?></p>
										</th> 

										<th style="vertical-align: top!important;padding:5px !important">
											<p>Keadaan Umum : <?php echo $key->keadaan_umum_objektif_kala1; ?>
											<p>Kesadaran : <?php echo $key->kesadaran_objektif_kala1; ?></p>
											<p>Keadaan Emosional : <?php echo $key->keadaan_emosional_objektif_kala1; ?></p>
											<p><b>TTV</b></p>
											<p>TD :<?php echo $key->td_objektif_kala1; ?></p>
											<p>Nadi : <?php echo $key->nadi_objektif_kala1; ?></p>
											<p>Respirasi : <?php echo $key->respirasi_objektif_kala1; ?></p>
											<p>Suhu : <?php echo $key->suhu_objektif_kala1; ?></p>
											<p>TFU : <?php echo $key->tfu_objektif_kala1; ?></p>
											<p>Leopold I : <?php echo $key->leopold1_objektif_kala1; ?></p>
											<p>leopold II : <?php echo $key->leopold2_objektif_kala1; ?></p>
											<p>leopold III : <?php echo $key->leopold3_objektif_kala1; ?></p>
											<p>leopold IV : <?php echo $key->leopold4_objektif_kala1; ?></p>
											<p>Penurunan: <?php echo $key->penurunan_objektif_kala1 ?></p>
											<p>DJJ : <?php echo $key->djj_objektif_kala1 ?></p>
											<p>HIS : <?php echo $key->his_objektif_kala1 ?></p>
											<p>TJB : <?php echo $key->tjb_objektif_kala1 ?></p>
											<p>V /v : <?php echo $key->vv_objektif_kala1 ?></p>
											<p>Pembukaan : <?php echo $key->pembukaan_objektif_kala1 ?></p>
											<p>Portio : <?php echo $key->portio_objektif_kala1 ?></p>
											<p>Ketuban : <?php echo $key->ketuban_objektif_kala1 ?></p>
											<p>Plasenta : <?php echo $key->plasenta_objektif_kala1 ?></p>
											<p>Hodge : <?php echo $key->hodge_objektif_kala1 ?></p>
											<p>Ubun-ubun: <?php echo $key->ubun_ubun_objektif_kala1 ?></p>
											<!-- disini -->

										</th> 	

										<th style="vertical-align: top!important;padding:5px !important"> 
											<p>V / v : <?php echo $key->vv_objektif_kala2 ?></p>
											<p>Pembukaan : <?php echo $key->pembukaan_objektif_kala2; ?></p>
											<p>Ubun-Ubun : <?php echo $key->ubun_ubun_objektif_kala2 ?></p>
											<p>Ketuban : <?php echo $key->ketuban_objektif_kala2; ?> </p>
											<p>Portio : <?php echo $key->portio_objektif_kala2 ?></p>
										</th> 

										<th style="vertical-align: top!important;padding:5px !important">
											<p>Keadaan Umum :  <?php echo $key->keadaan_umum_objektif_kala3 ?> </p>
											<p>Kesadaran :  <?php echo $key->kesadaran_objektif_kala3 ?></p>
											<p><b>TTV</b></p>
											<p>TD : <?php echo $key->td_objektif_kala3 ?></p>
											<p>Nadi : <?php echo $key->nadi_objektif_kala3; ?></p>
											<p>Respirasi:<?php echo $key->respirasi_objektif_kala3; ?></p>
											<p>Suhu : <?php echo $key->suhu_objektif_kala3 ?></p>
											<p>TFU :  <?php echo $key->tfu_objektif_kala3 ?></p>
											<p>Kandung Kemih : <?php echo $key->kandung_kemih_objektif_kala3 ?></p>
											<p>Kontraksi Uterus : <?php echo $key->kontraksi_uterus_objektif_kala3 ?></p>
											<p>Kehamilan Ganda : <?php echo $key->kehamilan_ganda_objektif_kala3 ?></p>
											<p>Semburan Darah : <?php echo $key->semburan_darah_objektif_kala3 ?></p>
											<p>Tali Pusat Memanjang : <?php echo $key->tali_pusat_memanjang_objektif_kala3 ?></p>

										</th> 	 
										<th style="vertical-align: top!important;padding:5px !important">
											<p>Keadaan Umum : <?php echo $key->keadaan_umum_objektif_kala4 ?></p>
											<p>Kesadaran : <?php echo $key->kesadaran_objektif_kala4; ?></p>
											<p>Keadaan Emosional : <?php echo $key->keadaan_emosional_objektif_kala4 ?></p>
											<p><b>TTV</b></p>
											<p>TD : <?php echo $key->td_objektif_kala4 ?></p>
											<p>Nadi : <?php echo $key->nadi_objektif_kala4 ?></p>
											<p>Respirasi :<?php echo $key->respirasi_objektif_kala4 ?></p>
											<p>Suhu :<?php echo $key->suhu_objektif_kala4 ?></p>
											<p>TFU : <?php echo $key->tfu_objektif_kala4 ?></p>
											<p>Kontraksi : <?php echo $key->kontraksi_objektif_kala4 ?></p>
											<p>Kandung Kemih : <?php echo $key->kandung_kemih_objektif_kala4 ?></p>
											<p>Perdarahan : <?php echo $key->perdarahan_objektif_kala4 ?></p>
											<p>Perineum : <?php echo $key->perineum_objektif_kala4 ?></p>
											<p>Robekan :  <?php echo $key->robekan_objektif_kala4 ?></p>
											<p></p>
										</th> 	 
									</tr>

									

									<tr style="font-size: 12px;text-align: center;font-weight: bold;" class="bg-warning">
										<th colspan="4"  class="text-center fw-bold">ASSESMENT</th>  
										<th colspan="4" class="text-center fw-bold">PLANNING</th>  
									</tr> 
									<tr style="font-size: 12px;"  class="text-center bg-warning fw-bold">
										<th class="text-center fw-bold">KALA I</th>
										<th class="text-center fw-bold">KALA II</th> 
										<th class="text-center fw-bold">KALA III</th>
										<th class="text-center fw-bold">KALA IV</th>

										<th class="text-center fw-bold">KALA I</th>
										<th class="text-center fw-bold">KALA II</th> 
										<th class="text-center fw-bold">KALA III</th>
										<th class="text-center fw-bold">KALA IV</th> 
									</tr>

									<tr style="font-size: 12px;text-align: left;border-bottom: 2px solid black">
										<?php for ($j =1; $j <= 4 ; $j++) { ?>
											<?php $tgl = $key->{'tanggal_assesment_kala'.$j};
											$jam = $key->{'jam_assesment_kala'.$j};

											?>
											<th><p width="55px">Hari /Tanggal :&nbsp;<?php echo date_format(date_create($tgl),'d-m-Y'); ?></p>
												<p width="55px">Jam :&nbsp;<?php echo $jam; ?></p>
											</th> 	 

										<?php } ?>

										<?php for ($j =1; $j <= 4 ; $j++) { ?>
											<?php $tgl = $key->{'tanggal_planning_kala'.$j};
											$jam = $key->{'jam_planning_kala'.$j};

											?>
											<th><p width="55px">Hari /Tanggal :&nbsp;<?php echo date_format(date_create($tgl),'d-m-Y'); ?></p>
												<p width="55px">Jam :&nbsp;<?php echo $jam; ?></p>
											</th> 	 

										<?php } ?>
										
									</tr> 
									<tr style="font-size: 12px;text-align: left;">
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_assesment_kala1; ?></p>
											<p>Masalah : <?php echo $key->masalah_assesment_kala1 ?></p>
											<p>Kebutuhan : <?php echo $key->kebutuhan_assesment_kala1 ?></p>
										</th>  
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_assesment_kala2;?></p>
											<p>Masalah : <?php echo $key->masalah_assesment_kala2 ?></p>
											<p>Kebutuhan : <?php echo $key->kebutuhan_assesment_kala2 ?></p>

										</th> 	 
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_assesment_kala3;?></p>
											<p>Masalah : <?php echo $key->masalah_assesment_kala3 ?></p>
											<p>Kebutuhan : <?php echo $key->kebutuhan_assesment_kala3 ?></p>


										</th> 	 
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_assesment_kala4;?></p>
											<p>Masalah : <?php echo $key->masalah_assesment_kala4 ?></p>
											<p>Kebutuhan : <?php echo $key->kebutuhan_assesment_kala4 ?></p>

										</th>
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_planning_kala1 ?> </p>
										</th>  
										<th style="vertical-align: top!important;padding:5px !important">
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_planning_kala2 ?></p>
											<p>JK : <?php echo $key->jk_planning_kala2 ?></p>
											<p>BB : <?php echo $key->bb_planning_kala2 ?></p>
											<p>PB : <?php echo $key->pb_planning_kala2 ?></p>
											<p>LK : <?php echo $key->lk_planning_kala2 ?></p>
											<p>LD : <?php echo $key->ld_planning_kala2 ?></p>
											<p>LL : <?php echo $key->ll_planning_kala2 ?></p>
										</th>  
										<th style="vertical-align: top!important;padding:5px !important"> 
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_planning_kala3 ?></p>
										</th>
										<th style="vertical-align: top!important;padding:5px !important"> 
											<p style="white-space: pre-line;line-height:25px"><?php echo $key->keterangan_planning_kala4 ?></p>
										</th>
									</tr>
									<tr style="font-size: 12px;text-align: left;">
										<th colspan="9" class="bg-success"><br></th>   
									</tr>

								<?php   } ?>
							</tbody>

						</table> 




					</div>
				</div>


			</div>
		</div>
	</div>

	<!-- MODAL UPDATE -->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script type="text/javascript">

	function exportTableToExcel(mytable, filename = 'Laporan INC'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
		var downloadLink;
		// 
		var dataType = 'application/vnd.ms-excel';
		// var dataType = 'application/vnd.ms-excel';
		
		var tableSelect = document.getElementById(mytable);
		var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
		// $('#mytable').prop('border',1)

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















