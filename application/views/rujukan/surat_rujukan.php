<!DOCTYPE html>
<html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style>
		* { font-family: DejaVu Sans, sans-serif; }
	</style>
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
		.xlText {
			mso-number-format: "\@";
		}
		*{
			font-family: 'Times New Roman'	
		}
	</style> 

	<script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<?php $bulan = array(
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
	$hari = array(
		'Mon' => "Senin",
		'Tue' => "Selasa",
		'Wed' => "Rabu",
		'Thu' => "Kamis",
		'Fri' => "Jum'at",
		'Sat' => "Sabtu",
		'Sun' => "Minggu",
	); 

	?>
</head><body>

	<?php foreach ($cetak_surat as $key ) {?>

		<div class="main-panel" style="width:100%;padding-left: 25px;padding-right: 25px;position: relative;top:-25px">
							<div>
								<img src="assets/img/klinik.jpg" width="100%" height="auto">
								<hr style="border: 1px solid black">

							</div>
							<div>
								<h4 style="text-align: center;font-size: 18px;font-weight: bold;text-decoration: underline;">SURAT RUJUKAN</h4>
								<H6 style="text-align: center;font-size: 12px;">No. : <?php echo $key->kode_rujukan; ?></H6>
							</div>
							<div class="uraian" style="margin-top: 15px">
								<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px">Kepada Yth.</p>
								<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px;font-weight: bold;"><?php if ($key->jenis_rujukan=="RS") {
									echo $key->nama_rs;
								}else{
									echo "DIVISI ".$key->jenis_rujukan;

								} ?></p>
								<?php if ($key->jenis_rujukan=="RS") { ?>
									<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px;"><?php echo $key->alamat_rs; ?></p>
								<?php } ?>
							</div>
							<div class="uraian" style="margin-top: 5px">
								<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px">Dengan hormat,</p>
								<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px">Mohon pemeriksaan dan pengobatan lebih lanjut terhadap penderita :</p>
							</div>

							<div class="isi">
								<span style="font-size: 14px;margin-top:10px;width: 180px;display: inline-block;margin-left: 25px;vertical-align: top;">Nama</span><span style="font-size: 14px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->nama_pasien; ?>
										
									</span>
								<br>

								<span style="font-size: 14px;margin-top:10px;width: 180px;display: inline-block;margin-left: 25px;vertical-align: top;">Umur</span><span style="font-size: 14px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->umur_pasien ; ?>&nbsp;&nbsp;&nbsp; (
									<?php
									if ($key->jk=="L") { ?>
										Laki-laki / <s style="color: red;vertical-align: top;">Perempuan</s>		
									<?php }else{ ?>

										<s style="color: red;vertical-align: top;">Laki-laki</s> / Perempuan		
								<?php } ?>
								)</span>
								<br>

								<span style="font-size: 14px;margin-top:10px;width: 180px;display: inline-block;margin-left: 25px;vertical-align: top">Alamat</span><span style="font-size: 14px;margin-top:10px; display: inline-block;vertical-align: top">: </span><span style="font-size: 14px;margin-top:10px;display: inline-block;vertical-align: top;width: 460px;"><?php echo $key->alamat; ?></span>
								<br>
							</div>

							<div class="uraian" style="width: 90%">
								<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px;">Pada pemeriksaan saya mendapatkan :</p>
							</div>

							<div class="isi">

								<?php if ($key->keluhan!='') { ?>
									
								<span style="font-size: 14px;margin-top:10px;width: 180px;display: inline-block;margin-left: 25px;vertical-align: top;">Keluhan</span><span style="font-size: 14px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->keluhan; ?>
										
									</span>
								<br>

								<?php } ?>



								<?php if ($key->diagnosa!='') { ?>
									
								<span style="font-size: 14px;margin-top:10px;width: 180px;display: inline-block;margin-left: 25px;vertical-align: top;">Diagnosa</span><span style="font-size: 14px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->diagnosa; ?>
										
									</span>
								<br>

								<?php } ?>

								<?php if ($key->terapi!='') { ?>

								<span style="font-size: 14px;margin-top:10px;width: 180px;display: inline-block;margin-left: 25px;vertical-align: top;">Terapi yang sudah diberikan</span><span style="font-size: 14px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->terapi; ?></span>
								<br>
								<?php } ?>


							</div>

							<div class="uraian" style="margin-top: 15px">
								<p style="text-align: justify;justify-content: center;font-size: 14px;line-height: 20px">Demikian surat rujukan ini  kami buat, kami mohon balasan atas surat rujukan ini. Atas perhatiannya kami mengucapkan terima kasih.</p>
							</div>

							<div class="uraian" style="margin-top: 15px">
								<p style="font-size: 14px;margin-left: 65%;">Parungpanjang, <?php $tgl_rujukan = explode("-", $key->tanggal_rujukan); echo $tgl_rujukan[2]." ".$bulan[$tgl_rujukan[1]]." ".$tgl_rujukan[0] ; ?></p>
							</div>

							<div class="uraian">
								<span style="width: 65%;display: inline-block;"><img src="assets/img/qr_klinik.png" width="150px" width="150px"></span>
							</div>
							<div class="uraian"  style="position: relative; top:-55px">
								<span style="font-size: 14px;width: 63%;display: inline-block;margin-left: 5px">KLINIK HMS MEDIKA</span>

								<span style="font-size: 14px;"><b>( <?php echo $key->dokter_perujuk; ?> )</b></span>
							</div>

						</div>

	<?php } ?>
</body></html>















