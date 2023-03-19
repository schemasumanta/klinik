

<style type="text/css">
	@media print{

		html, body, head{
			padding:0;
			margin: 0;
		}
		.sidebar, .header, .main-header, .footer{
			display: none !important;
		}

		.printdata{
			border:0px solid;
			margin: 0px;
			padding: 0px;
			position: absolute;
			top:1050px !important;
			left:110px !important;
			/*transform: scale(1.2,1.2);*/
			display: block !important;
			z-index: 9999;
			transform: scale(2.6);
		}
		.pembungkus{
			border-style: none !important;
		}
	}
</style>
<div class="main-panel printdata">
	<style type="text/css">
		span.cls_002{font-family:"Calibri Bold",serif;font-size:28.0px;color:rgb(56,85,34);font-weight:bold;font-style:normal;text-decoration: none}
		div.cls_002{font-family:"Calibri Bold",serif;font-size:28.0px;color:rgb(56,85,34);font-weight:bold;font-style:normal;text-decoration: none}
		span.cls_004{font-family:"Calibri Bold",serif;font-size:12.1px;color:rgb(56,85,34);font-weight:bold;font-style:normal;text-decoration: none}
		div.cls_004{font-family:"Calibri Bold",serif;font-size:12.1px;color:rgb(56,85,34);font-weight:bold;font-style:normal;text-decoration: none}
		span.cls_005{font-family:"Calibri Italic",serif;font-size:10.0px;color:rgb(56,85,34);font-weight:normal;font-style:italic;text-decoration: none}
		div.cls_005{font-family:"Calibri Italic",serif;font-size:10.0px;color:rgb(56,85,34);font-weight:normal;font-style:italic;text-decoration: none}
		span.cls_009{font-family:Times,serif;font-size:12.1px;color:rgb(56,85,34);font-weight:bold;font-style:normal;text-decoration: none}
		div.cls_009{font-family:Times,serif;font-size:12.1px;color:rgb(56,85,34);font-weight:bold;font-style:normal;text-decoration: none}
		span.cls_010{font-family:Times,serif;font-size:11.1px;color:rgb(56,85,34);font-weight:normal;font-style:normal;text-decoration: none}
		div.cls_010{font-family:Times,serif;font-size:11.1px;color:rgb(56,85,34);font-weight:normal;font-style:normal;text-decoration: none}
		span.cls_015{font-family:Times,serif;font-size:10.0px;color:rgb(56,85,34);font-weight:normal;font-style:normal;text-decoration: none}
		div.cls_015{font-family:Times,serif;font-size:10.0px;color:rgb(56,85,34);font-weight:normal;font-style:normal;text-decoration: none}
		span.cls_016{font-family:Times,serif;font-size:10.0px;color:rgb(255,255,255);font-weight:normal;font-style:normal;text-decoration: none}
		div.cls_016{font-family:Times,serif;font-size:10.0px;color:rgb(255,255,255);font-weight:normal;font-style:normal;text-decoration: none}

	</style>

	<div style="position:absolute;left:50%;margin-left:-297px;top:50px;width:595px;height:841px;border-style:outset;overflow:hidden" class="pembungkus">
		<div style="position:absolute;left:0px;top:0px">
			<img src="<?php echo base_url()?>assets/img/hms.png" width=70 style="position: absolute;top:35px;left:55px">
			<img src="<?php echo base_url()?>assets/img/consent/background1.jpg" width=595 height=841></div>

			<div style="position:absolute;left:195.77px;top:30.02px" class="cls_002"><span class="cls_002">KLINIK HMS MEDIKA</span></div>
			<div style="position:absolute;left:209.09px;top:69.98px" class="cls_004"><span class="cls_004">No.SIPB : 440/SIPB/00199/DPMPTSP/2018</span></div>
			<div style="position:absolute;left:163.82px;top:84.66px" class="cls_005"><span class="cls_005">Kp.Pasir Beureum Rt.02/04, Desa Jagabaya Kec.Parungpanjang, Kab.Bogor</span></div>
			<div style="position:absolute;left:198.74px;top:120.06px" class="cls_009"><span class="cls_009">PERSETUJUAN TINDAKAN MEDIS</span></div>
			<div style="position:absolute;left:229.97px;top:136.02px" class="cls_009"><span class="cls_009">(INFORMED CONSENT)</span></div>


			<?php foreach ($consent_pasien as $key): ?>

				<div style="position:absolute;left:49.68px;top:167.46px" class="cls_010"><span class="cls_010">Saya yang bertanda tangan dibawah ini :</span></div>
				<div style="position:absolute;left:49.68px;top:193.86px" class="cls_010"><span class="cls_010">Nama</span></div>
				<div style="position:absolute;left:191.42px;top:193.86px" class="cls_010"><span class="cls_010">: <?php echo $key->nama_approval; ?></span></div>
				<div style="position:absolute;left:49.68px;top:212.94px" class="cls_010"><span class="cls_010">Umur</span></div>
				<div style="position:absolute;left:191.42px;top:212.94px" class="cls_010"><span class="cls_010">: <?php echo $key->umur_approval; ?> Tahun</span></div>
				<div style="position:absolute;left:280.37px;top:212.94px" class="cls_010"><span class="cls_010"></span></div>
				<div style="position:absolute;left:49.68px;top:231.90px" class="cls_010"><span class="cls_010">Jenis Kelamin</span></div>
				<div style="position:absolute;left:191.42px;top:231.90px" class="cls_010"><span class="cls_010">:</span></div>
				<div style="position:absolute;left:200.09px;top:231.90px" class="cls_010"><span class="cls_010"><?php if($key->jenis_kelamin_approval=="Laki-Laki") { ?>
					*Laki-laki / <strike>Perempuan</strike>

				<?php }else{ ?>
					*<strike>Laki-laki</strike> / Perempuan

					<?php } ?></span></div>
					<div style="position:absolute;left:49.68px;top:250.86px" class="cls_010"><span class="cls_010">Alamat</span></div>
					<div style="position:absolute;left:191.42px;top:250.86px" class="cls_010"><span class="cls_010">: <?php echo $key->alamat ?></span></div>
					<div style="position:absolute;left:49.68px;top:288.81px" class="cls_010"><span class="cls_010">Bukti Diri (KTP)</span></div>
					<div style="position:absolute;left:191.42px;top:288.81px" class="cls_010"><span class="cls_010">: <?php echo $key->nik_approval; ?></span></div>
					<div style="position:absolute;left:49.68px;top:315.69px" class="cls_010"><span class="cls_010">Dengan ini menyatakan dengan sesungguhnya telah menyetujui / <strike>menolak</strike> Untuk dilakukan tindakan medis</span></div>
					<div style="position:absolute;left:49.68px;top:334.29px" class="cls_010"><span class="cls_010">berupa <?php echo $key->tindakan_medis; ?>. Terhadap <?php 

					$hubungan = ['diri saya sendiri','istri','suami','anak','ayah','ibu'];
					for ($i=0; $i < count($hubungan) ; $i++) {

						if (strtolower($key->hubungan_dengan_pasien)==$hubungan[$i]) {

							if ($i==count($hubungan)-1){ 

								echo $key->hubungan_dengan_pasien; 

							}else{

								echo $key->hubungan_dengan_pasien." /*"; 

							} ?>

						<?php }else{

							if (strtolower($key->hubungan_dengan_pasien)=="diri saya sendiri") {

								if ($i==(count($hubungan)-1)){ ?>

									<strike><?php echo $hubungan[$i]; ?> saya</strike>
								<?php }else{ ?>

									<strike><?php echo $hubungan[$i]; ?></strike> /*

								<?php }

							}else{
								if ($i==(count($hubungan)-1)){ ?>

									<strike><?php echo $hubungan[$i]; ?> </strike>&nbsp;&nbsp;saya
								<?php }else{ ?>

									<strike><?php echo $hubungan[$i]; ?></strike> /*

								<?php }
							}

						}

					}?>. dengan</span></div>



					<?php if ($key->hubungan_dengan_pasien!="diri saya sendiri") {?>

						<div style="position:absolute;left:49.68px;top:377.85px" class="cls_010"><span class="cls_010">Nama</span></div>
						<div style="position:absolute;left:191.42px;top:377.85px" class="cls_010"><span class="cls_010">: <?php echo $key->nama_pasien; ?></span></div>
						<div style="position:absolute;left:49.68px;top:396.81px" class="cls_010"><span class="cls_010">Umur</span></div>
						<div style="position:absolute;left:191.42px;top:396.81px" class="cls_010"><span class="cls_010">: <?php echo $key->umur; ?> Tahun</span></div>
						<div style="position:absolute;left:49.68px;top:415.77px" class="cls_010"><span class="cls_010">Jenis Kelamin</span></div>
						<div style="position:absolute;left:191.42px;top:415.77px" class="cls_010"><span class="cls_010">: <?php if($key->jk=="Laki-Laki") { ?>
							* Laki-laki / <strike>Perempuan</strike>

						<?php }else{ ?>
							* <strike>Laki-laki</strike> / Perempuan

							<?php } ?></span></div>
							<div style="position:absolute;left:49.68px;top:434.85px" class="cls_010"><span class="cls_010">Alamat</span></div>
							<div style="position:absolute;left:191.42px;top:434.85px" class="cls_010"><span class="cls_010">: <?php echo $key->alamat; ?></span></div>

							<div style="position:absolute;left:49.68px;top:472.79px" class="cls_010"><span class="cls_010">Dirawat di ruangan</span></div>
							<div style="position:absolute;left:191.42px;top:472.79px" class="cls_010"><span class="cls_010">: <?php echo $key->ruang_rawat; ?></span></div>
							<div style="position:absolute;left:49.68px;top:491.75px" class="cls_010"><span class="cls_010">No. Rekam Medis</span></div>
							<div style="position:absolute;left:191.42px;top:491.75px" class="cls_010"><span class="cls_010">: <?php echo $key->kode_ranap; ?></span></div>
							<div style="position:absolute;left:49.68px;top:519.95px" class="cls_010"><span class="cls_010">Yang tujuan, sifat dan perlunya tindakan medis tersebut diatas, serta resiko yang dapat ditimbulkannya telah</span></div>
							<div style="position:absolute;left:49.68px;top:534.47px" class="cls_010"><span class="cls_010">cukup dijelaskan oleh Dokter / Bidan dan telah saya mengerti sepenuhnya.</span></div>
							<div style="position:absolute;left:49.68px;top:549.11px" class="cls_010"><span class="cls_010">Demikian surat pernyataan persetujuan ini saya buat penuh kesadaran dan tanpa paksaan dari pihak manapun</span></div>
							<div style="position:absolute;left:49.68px;top:563.63px" class="cls_010"><span class="cls_010">juga.</span></div>
							<div style="position:absolute;left:350.59px;top:587.39px" class="cls_010"><span class="cls_010">Parungpanjang, <?php

							$bulan = array(
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
							);

							$tgl = explode('-', $key->tanggal_berobat);

							echo $tgl[2]." ".$bulan[$tgl[1]]." ".$tgl[0];  ?> </span></div>

							<div style="position:absolute;left:110.06px;top:601.91px" class="cls_010"><span class="cls_010">Saksi-saksi</span></div>
							<div style="position:absolute;left:250.85px;top:601.91px" class="cls_010"><span class="cls_010">Dokter / Bidan</span></div>
							<div style="position:absolute;left:394.51px;top:601.91px" class="cls_010"><span class="cls_010">Yang membuat pernyataan</span></div>
							<div style="position:absolute;left:103.22px;top:616.55px" class="cls_010"><span class="cls_010">Tanda Tangan</span><img width="100px" style="position:absolute;left:-20px;top:20px" class="cls_010" src="<?php echo base_url().$key->ttd_saksi1 ?>"></div>


							<div style="position:absolute;left:252.05px;top:616.55px" class="cls_010"><span class="cls_010">Tanda Tangan</span>

								<!-- <img width="100px" style="position:absolute;left:-20px;top:10px" class="cls_010" src="<?php echo base_url().$key->ttd_dokter?>"> -->

							</div>
							<div style="position:absolute;left:422.23px;top:616.55px" class="cls_010"><span class="cls_010">Tanda Tangan</span><img width="100px" style="position:absolute;left:-20px;top:10px" class="cls_010" src="<?php echo base_url().$key->ttd_approval ?>"></div>
							<div style="position:absolute;left:66.50px;top:656.42px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
							<div style="position:absolute;left:215.33px;top:656.42px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
							<div style="position:absolute;left:385.51px;top:656.42px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
							<div style="position:absolute;left:109.58px;top:670.94px" class="cls_010"><span class="cls_010"><?php echo $key->nama_saksi1; ?></span></div>
							<div style="position:absolute;left:258.41px;top:670.94px" class="cls_010"><span class="cls_010"><!-- <?php echo $key->dokter_pemeriksa; ?> --></span></div>
							<div style="position:absolute;left:428.59px;top:670.94px" class="cls_010"><span class="cls_010"><?php echo $key->nama_approval; ?></span></div>
							<div style="position:absolute;left:110.06px;top:699.98px" class="cls_010"><span class="cls_010">Saksi-saksi</span></div>
							<div style="position:absolute;left:103.22px;top:714.50px" class="cls_010"><span class="cls_010">Tanda Tangan</span><img width="100px" style="position:absolute;left:-20px;top:15px" class="cls_010" src="<?php echo base_url().$key->ttd_saksi2 ?>"></div>
							<div style="position:absolute;left:66.50px;top:758.18px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
							<div style="position:absolute;left:109.58px;top:772.70px" class="cls_010"><span class="cls_010"><?php echo $key->nama_saksi2; ?></span></div>
							<div style="position:absolute;left:49.68px;top:787.46px" class="cls_015"><span class="cls_015">** Isi dengan jenis tindakan medis yang akan dilakukan</span></div>
							<div style="position:absolute;left:49.68px;top:797.78px" class="cls_015"><span class="cls_015">*</span><span class="cls_016">...</span><span class="cls_015">Lingkari / coret yang lain</span></div>

						<?php }else{ ?>

							<div class="penarik  w-100" style="position:  absolute;top:-110px">
								<div style="position:absolute;left:49.68px;top:472.79px" class="cls_010"><span class="cls_010">Dirawat di ruangan</span></div>
								<div style="position:absolute;left:191.42px;top:472.79px" class="cls_010"><span class="cls_010">: <?php echo $key->ruang_rawat; ?></span></div>
								<div style="position:absolute;left:49.68px;top:491.75px" class="cls_010"><span class="cls_010">No. Rekam Medis</span></div>
								<div style="position:absolute;left:191.42px;top:491.75px" class="cls_010"><span class="cls_010">: <?php echo $key->kode_ranap; ?></span></div>
								<div style="position:absolute;left:49.68px;top:519.95px" class="cls_010"><span class="cls_010">Yang tujuan, sifat dan perlunya tindakan medis tersebut diatas, serta resiko yang dapat ditimbulkannya telah</span></div>
								<div style="position:absolute;left:49.68px;top:534.47px" class="cls_010"><span class="cls_010">cukup dijelaskan oleh Dokter / Bidan dan telah saya mengerti sepenuhnya.</span></div>
								<div style="position:absolute;left:49.68px;top:549.11px" class="cls_010"><span class="cls_010">Demikian surat pernyataan persetujuan ini saya buat penuh kesadaran dan tanpa paksaan dari pihak manapun</span></div>
								<div style="position:absolute;left:49.68px;top:563.63px" class="cls_010"><span class="cls_010">juga.</span></div>
								<div style="position:absolute;left:350.59px;top:587.39px" class="cls_010"><span class="cls_010">Parungpanjang, <?php

								$bulan = array(
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
								);

								$tgl = explode('-', $key->tanggal_berobat);

								echo $tgl[2]." ".$bulan[$tgl[1]]." ".$tgl[0];  ?> </span></div>

								<div style="position:absolute;left:110.06px;top:601.91px" class="cls_010"><span class="cls_010">Saksi-saksi</span></div>
								<div style="position:absolute;left:250.85px;top:601.91px" class="cls_010"><span class="cls_010">Dokter / Bidan</span></div>
								<div style="position:absolute;left:394.51px;top:601.91px" class="cls_010"><span class="cls_010">Yang membuat pernyataan</span></div>
								<div style="position:absolute;left:103.22px;top:616.55px" class="cls_010"><span class="cls_010">Tanda Tangan</span><img width="100px" style="position:absolute;left:-20px;top:20px" class="cls_010" src="<?php echo base_url().$key->ttd_saksi1 ?>"></div>



								<div style="position:absolute;left:252.05px;top:616.55px" class="cls_010"><span class="cls_010">Tanda Tangan</span>
									<!-- 		<img width="100px" style="position:absolute;left:-20px;top:10px" class="cls_010" src="<?php echo base_url().$key->ttd_dokter?>"> -->
								</div>
								<div style="position:absolute;left:422.23px;top:616.55px" class="cls_010"><span class="cls_010">Tanda Tangan</span><img width="100px" style="position:absolute;left:-20px;top:10px" class="cls_010" src="<?php echo base_url().$key->ttd_approval ?>"></div>
								<div style="position:absolute;left:66.50px;top:656.42px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
								<div style="position:absolute;left:215.33px;top:656.42px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
								<div style="position:absolute;left:385.51px;top:656.42px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
								<div style="position:absolute;left:109.58px;top:670.94px" class="cls_010"><span class="cls_010"><?php echo $key->nama_saksi1; ?></span></div>
								<div style="position:absolute;left:258.41px;top:670.94px" class="cls_010"><span class="cls_010"><?php echo $key->dokter_pemeriksa; ?></span></div>
								<div style="position:absolute;left:428.59px;top:670.94px" class="cls_010"><span class="cls_010"><?php echo $key->nama_approval; ?></span></div>
								<div style="position:absolute;left:110.06px;top:699.98px" class="cls_010"><span class="cls_010">Saksi-saksi</span></div>
								<div style="position:absolute;left:103.22px;top:714.50px" class="cls_010"><span class="cls_010">Tanda Tangan</span><img width="100px" style="position:absolute;left:-20px;top:15px" class="cls_010" src="<?php echo base_url().$key->ttd_saksi2 ?>"></div>
								<div style="position:absolute;left:66.50px;top:758.18px" class="cls_010"><span class="cls_010">( ……………………………. )</span></div>
								<div style="position:absolute;left:109.58px;top:772.70px" class="cls_010"><span class="cls_010"><?php echo $key->nama_saksi2; ?></span></div>
								<div style="position:absolute;left:49.68px;top:787.46px" class="cls_015"><span class="cls_015">** Isi dengan jenis tindakan medis yang akan dilakukan</span></div>
								<div style="position:absolute;left:49.68px;top:797.78px" class="cls_015"><span class="cls_015">*</span><span class="cls_016">...</span><span class="cls_015">Lingkari / coret yang lain</span></div>

							</div>
						<?php } ?>







					</div>
				<?php endforeach ?>

			</div>
			
	
<style type="text/css">
	
	.footer{

		position: fixed;
		bottom:0;
	}

	.main-chat{
		position: fixed;
		bottom: 0;
		right: 0;
		margin-bottom: 30px;
		margin-right: 30px;

		cursor: pointer;
	}


</style>


</div>



</div>
<!-- End Custom template -->
</div>


<!-- <script src="<?php echo base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script> -->

<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- <script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script> -->
<script src="<?php echo base_url('assets/js/plugin/datatables/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugin/datatables-bs4/js/dataTables.bootstrap4.js');?>"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- <script src="<?php echo base_url() ?>sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url() ?>sweetalert/sweetalert-dev.js"></script>  -->


	<script src="<?php echo base_url() ?>assets/js/atlantis.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
	
	<!-- <script src="<?php echo base_url() ?>assets/plugins/highcharts/highcharts.js"></script>  -->


	

	<script >
		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
		
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});
			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>




	<script>
		function set(){
			$(function () {
				$('#example1').DataTable({
					"destroy":true,
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": true,
				});
			});

		}

		function set2(){

			$(function () {
				$('#example2').DataTable({
					"destroy":true,

					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": true,
				});
			});


		}

		
	</script>

	

	
</body>
</html>