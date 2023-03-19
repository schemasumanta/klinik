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

	<?php foreach ($data_swab as $key ) {?>

		<div class="main-panel" style="width:100%;padding-left: 25px;padding-right: 25px;position: relative;top:-32px">
			<div>
				<img src="assets/img/klinik.jpg" width="100%" height="auto">
				<!-- <p style="margin-left: 138px;font-family: Arial">NO. 455.5/208/00039/DPMPTSP/2021</p> -->
				<hr style="border: 1px solid black">

			</div>
			<div style="margin-top: 7px">
				<h4 style="text-align: center;font-size: 18px;font-weight: bold;text-decoration: underline;">PEMERIKSAAN SWAB SARS-COV -2</h4>
			</div>

			<div class="isi">
				<span style="font-size: 12px;margin-top:12px;width: 100px;display: inline-block;vertical-align: top;">Nama</span><span style="font-size: 12px;margin-top:12px;display: inline-block;vertical-align: top;width: 300px;">: <?php echo $key->nama_pasien; ?></span>

				<span style="font-size: 12px;margin-top:12px;width: 80px;display: inline-block;vertical-align: top;">KODE LAB</span><span style="font-size: 12px;margin-top:12px;display: inline-block;vertical-align: top;">: <?php echo $key->no_lab; ?></span>
				<br>

				<span style="font-size: 12px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top;">Umur</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;width: 300px">: <?php echo $key->umur; ?> Tahun</span>


				<span style="font-size: 12px;margin-top:10px;width: 80px;display: inline-block;vertical-align: top;">TANGGAL</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->tanggal_periksa; ?></span>


				<br>

				<span style="font-size: 12px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top;">Jenis Kelamin</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;width: 300px">: <?php echo $key->jk; ?></span>
				<span style="font-size: 12px;margin-top:10px;width: 80px;display: inline-block;vertical-align: top;">DOKTER</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $key->dokter_pengirim; ?></span>
				<br>

				<span style="font-size: 12px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top">Alamat</span><span style="font-size: 12px;margin-top:10px; display: inline-block;vertical-align: top">: </span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;;width: 300px"><?php echo $key->alamat; ?></span>
				<br>



				<span style="font-size: 12px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top;">NO. RM</span><span style="font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;;width: 300px">: <?php echo $key->kode_swab; ?></span>
				<br>



				<span style="font-weight:bold;text-align:center;font-size: 12px;margin-top:10px;width: 20%;display: inline-block;vertical-align: top;">PARAMETER</span><span style="font-weight:bold;text-align:center;font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;width: 20%">HASIL</span>
				<span style="font-weight:bold;text-align:center;font-size: 12px;margin-top:10px;width: 20%;display: inline-block;vertical-align: top;">NILAI RUJUKAN</span><span style="font-weight:bold;text-align:center;font-size: 12px;margin-top:10px;display: inline-block;vertical-align: top;width: 40%">METODE PEMERIKSAAN</span>
			</div>
			<div class="isi" style="position: relative;top:-25px">
				<span style="font-weight:bold;text-align:center;font-size: 12px;width: 20%;display: inline-block;vertical-align: top;"><?php echo $key->pemeriksaan; ?></span><span style="font-weight:bold;text-align:center;font-size: 12px;display: inline-block;vertical-align: top;width: 20%"><?php echo $key->hasil; ?></span>
				<span style="font-weight:bold;text-align:center;font-size: 12px;width: 20%;display: inline-block;vertical-align: top;"><?php echo $key->nilai_normal; ?></span><span style="font-weight:bold;text-align:center;font-size: 12px;display: inline-block;vertical-align: top;width: 40%"><?php echo $key->metode_pemeriksaan; ?></span>

			</div>

			<div style="text-align: center;position: relative;top:-45px">
				<center><span style="font-weight:bold;text-align:center;font-size: 22px;width: 80%;display: inline-block;vertical-align: top;border: 1px double black;padding: 5px;margin-left: 55px;border-collapse: separate;
				border-spacing: 15px 30px;">KESIMPULAN : <?php echo strtoupper($key->hasil)?> SARS - COV -2</span></center>
			</div>

			<div class="uraian" style="width: 90%;position: relative;top:-25px">
				<span style="font-size: 12px;margin-top:5px;width: 200px;display: inline-block;vertical-align: top;">Bahan Diterima</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;;width: 300px">:  Swab Nosafaring</span> 
				<br> 

				<span style="font-size: 12px;margin-top:5px;width: 200px;display: inline-block;vertical-align: top;">Tgl Pengambilan Spesimen</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;;width: 300px">:  <?php echo $key->tanggal_pengambilan_spesimen ?></span>
				<br> 

				<span style="font-size: 12px;margin-top:5px;width: 200px;display: inline-block;vertical-align: top;">Tgl Keluar Hasil</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;width: 300px">:  <?php echo $key->tanggal_keluar_hasil ?></span>
				<br>
				<span style="font-size: 12px;margin-top:15px;width: 100%;display: inline-block;vertical-align: top;font-weight: bold">Interprestasi dan sar : </span> 
				<br>
				<span style="font-size: 12px;margin-top:5px;margin-left: 10px;display: inline-block;vertical-align: top;">Jika hasil pemeriksaan Antigen SARS Cov-2 : Positif</span>
				<br><span style="font-size: 12px;margin-top:5px;margin-left: 10px; display: inline-block;vertical-align: top;width: 300px">Saran</span>
				<br> 

				<span style="font-size: 12px;margin-top:5px;margin-left: 10px;display: inline-block;vertical-align: top;">1. Lanjutkan pemeriksaan konfirmasi dengan pemeriksaan RT -PCR</span>
				<br><span style="font-size: 12px;margin-top:5px;margin-left: 10px; display: inline-block;vertical-align: top;">2. Lakukan karantina atau isolasi sesuai kriteria</span>
				<br> 
				<span style="font-size: 12px;margin-top:5px;margin-left: 10px; display: inline-block;vertical-align: top;">3. Menerapakan perilaku hidup bersih dan sehat : mencuci tangan menerapkan etika batukmenggunakan masker dan menjaga stamina. Serta tetap menjaga jaga jarak</span>
				<br> 

				<span style="font-size: 12px;margin-top:10px;margin-left: 10px;display: inline-block;vertical-align: top;">Jika hasil pemeriksaan Antigen SARS Cov-2 : Negatif</span>
				<br><span style="font-size: 12px;margin-top:5px;margin-left: 10px; display: inline-block;vertical-align: top;width: 300px">Catatan</span>
				<br> 
				<span style="font-size: 12px;margin-top:7px;margin-left: 10px;display: inline-block;vertical-align: top;">Hasil negatif tidak menyingkirkan kemungkinan terinfeksi SARS Cov-2 sehingga masih berisiko terinfeksidari orang lain,disarankan tes ulang atau tes konfirmasidengan RT-PCR jika memiliki gejala danatau diketahui memiliki kontak erat dengan pasien terkonfirmasi COVID 19</span>
			</div>


			<div class="validasi" style="margin-top: 0px;width: 90%">
				<span style="font-size: 12px;margin-top:7px;width: 100px;display: inline-block;vertical-align: top;">Divalidasi Oleh</span><span style="font-size: 12px;margin-top:7px;display: inline-block;vertical-align: top;width: 300px">:  LABORATORIUM KLINIK HMS MEDIK</span> 

				<span style="font-size: 12px;margin-top:7px;margin-left: 80px; width: 100px;display: inline-block;vertical-align: top;">Salam Hormat</span> 
				<br> 



				<span style="font-size: 12px;margin-top:5px;width: 100px;display: inline-block;vertical-align: top;">Dicetak Oleh</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;;width: 300px">: <?= $key->dokter_pemeriksa ?></span>

				<br> 

				<span style="font-size: 12px;margin-top:5px;width: 100px;display: inline-block;vertical-align: top;">Tanggal Cetak</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;width: 300px">: <?= $key->tanggal_keluar_hasil ?></span>

				<br> 

				<span style="font-size: 12px;margin-top:5px;width: 100px;display: inline-block;vertical-align: top;">Halaman</span><span style="font-size: 12px;margin-top:5px;display: inline-block;vertical-align: top;width: 300px">:  1/1</span>

				<br> 

				<span style="font-size: 12px;margin-top:5px;margin-left: 485px; width: 100px;display: inline-block;vertical-align: top;"><?= $key->dokter_pemeriksa ?></span>
				<br>
				<span style="font-size: 12px;margin-top:5px;margin-left: 495px; width: 100px;display: inline-block;vertical-align: top;">Petugas Lab</span> 

			</div>
			<div style="clear: both;"></div>
		</div>


	<?php } ?>
</body></html>















