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

		<div class="main-panel" style="width:100%;padding-left: 25px;padding-right: 25px;">
							<div>
								<img src="assets/img/klinik.jpg" width="100%" height="auto">
								<hr style="border: 1px solid black">

							</div>
							<div style="margin-top: 10px">
								<h4 style="text-align: center;font-size: 18px;font-weight: bold;text-decoration: underline;">SURAT KETERANGAN LAHIRAN</h4>
							</div>
							<div class="uraian" style="margin-top: 15px">
								<p style="text-align: justify;justify-content: center;font-size: 12px;line-height: 20px">Yang bertanda tangan dibawah ini menerangkan bahwa :</p>
							</div>
							<div class="isi">
								<span style="font-size: 12px;margin-top:5px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Pada Tanggal</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;">: <?php echo $key->tanggal; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Hari</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->hari; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Jam</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->jam; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Jenis Kelamin</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->jenis_kelamin; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Anak Ke-</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->anak_ke; ?></span>
								<br>

								<!-- <span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top">Alamat</span><span style="font-size: 12px;margin-top:10px; display: inline-block;vertical-align: top">: </span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;width: 460px;"><?php echo $key->alamat; ?></span>
								<br> -->
							</div>

							<div class="uraian" style="margin-top: 15px">
								<p style="text-align: justify;justify-content: center;font-size: 12px;line-height: 20px">Telah Lahir Seorang Bayi :</p>
							</div>

							<div class="isi">
								<span style="font-size: 12px;margin-top:5px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Nama</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;font-weight: bold;">: <?php echo $key->nama_bayi; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Berat Badan</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->berat_badan; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Panjang Badan</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->panjang_badan; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Dengan Pertolongan</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->dengan_pertolongan; ?></span>
								<br>

							</div>

							<div class="uraian" style="margin-top: 15px">
								<p style="text-align: justify;justify-content: center;font-size: 12px;line-height: 20px">Anak Dari :</p>
							</div>

							<div class="isi">
								<span style="font-size: 12px;margin-top:5px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Nama Ayah</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;font-weight: bold;">: <?php echo $key->nama_ayah; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Umur Ayah</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->umur_ayah; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">NIK KTP</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->nik_ayah; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:5px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Nama Ibu</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;font-weight: bold;">: <?php echo $key->nama_ibu; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">Umur Ibu</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->umur_ibu; ?></span>
								<br>

								<span style="font-size: 12px;margin-top:10px;width: 150px;display: inline-block;margin-left: 25px;vertical-align: top;">NIK KTP</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->nik_ibu; ?></span>
								<br>

							</div>

							<div class="uraian" style="margin-top: 35px">
								<p style="font-size: 12px;margin-left: 65%;">Parungpanjang, <?php $tgl_surat = explode("-", $key->tanggal); echo $tgl_surat[2]." ".$bulan[$tgl_surat[1]]." ".$tgl_surat[0] ; ?></p>
							</div>

							<div class="uraian">
								<span style="width: 65%;display: inline-block;margin-left: 5px"><img src="assets/img/qr_klinik.png" width="150px" width="150px"></span>
							</div>
							<div class="uraian"  style="position: relative; top:-55px">
								<span style="font-size: 12px;width: 60%;display: inline-block;margin-left: 25px">KLINIK HMS MEDIKA</span><span style="font-size: 12px;"><b>( <?php echo $key->yang_bertanda_tangan; ?> )</b></span>
							</div>


							
						</div>

	<?php } ?>
</body></html>















