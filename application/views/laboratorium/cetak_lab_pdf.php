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

	<?php foreach ($detail_laboratorium_pasien as $row): ?>
	<?php endforeach ?>

	<div class="main-panel" style="width:100%;padding-left: 25px;padding-right: 25px;">
		<div style="position: relative;top:-35px">
			<img src="assets/img/klinik.jpg" width="100%" height="auto">
			<hr style="border: 1px solid black">

			<span style="font-size: 10px;margin-top:5px;width: 100px;display: inline-block;vertical-align: top;">Nama</span><span style="font-size: 10px;margin-top:5px;display: inline-block;vertical-align: top;width: 250px">: <?php echo $row->nama_pasien; ?></span>
			<span style="font-size: 10px;margin-top:5px;width: 150px;display: inline-block;vertical-align: top;">Pengirim</span><span style="font-size: 10px;margin-top:5px;display: inline-block;vertical-align: top;">: <?php echo $row->pengirim; ?></span>
			<br>

			<span style="font-size: 10px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top;">Jenis Kelamin</span><span style="font-size: 10px;margin-top:10px;display: inline-block;vertical-align: top;width: 250px"">: <?php if ($row->jk=="L") {
				echo 'Laki-Laki';
				}else{echo 'Perempuan';} ?></span>
				<span style="font-size: 10px;margin-top:10px;width: 150px;display: inline-block;vertical-align: top;">Tanggal Pemeriksaan</span><span style="font-size: 10px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php $tanggal=explode('-', $row->tanggal_periksa);
				$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
				echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0] ?></span>
				<br>

				<span style="font-size: 10px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top;">Umur</span><span style="font-size: 10px;margin-top:10px;display: inline-block;vertical-align: top;width: 250px">: <?php echo $row->umur ?> Tahun</span>
				<span style="font-size: 10px;margin-top:10px;width: 150px;display: inline-block;vertical-align: top;">Nomor Lab</span><span style="font-size: 10px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $row->kode_lab; ?></span>
				<br>

				<span style="font-size: 10px;margin-top:10px;width: 100px;display: inline-block;vertical-align: top;">Alamat</span><span style="font-size: 10px;margin-top:10px;display: inline-block;vertical-align: top;">: <?php echo $row->alamat?></span>
				<br>
			</div>

			<div class="isi" style="position: relative;top:-30px;border-top: 1px solid black;border-bottom:  1px double black;padding-top: 10px">
				<span style="font-size: 12px;width: 40%;display: inline-block;vertical-align: top;font-weight: bold;">PEMERIKSAAN</span><span style="font-size: 12px;display: inline-block;vertical-align: top;width: 20%;text-align: center;font-weight: bold;">HASIL</span>
				<span style="font-size: 12px;width: 20%;display: inline-block;vertical-align: top;text-align: center;font-weight: bold;">NILAI NORMAL</span><span style="font-size: 12px;display: inline-block;vertical-align: top;text-align: center;font-weight: bold;margin-left: 6%">SATUAN</span>
			</div>

			<div class="isi" style="font-size: 10px;position: relative;top:-25px;border-bottom:  1px double black">

				<?php
				$data_main=[];
				foreach ($detail_sub as $key) {
					if ($key->nama_main_kategori!='') {
						if (!in_array($key->nama_main_kategori, $data_main)) {
							$data_main[]=$key->nama_main_kategori;
						}
					}

					if ($key->nama_sub_kategori!='' && $key->nama_main_kategori=='') {
						if (!in_array($key->nama_sub_kategori, $data_main)) {
							$data_main[]=$key->nama_sub_kategori;
						}
					}
				}?>

				<?php for ($i=0; $i <count($data_main) ; $i++) {
					$data_sub=[]; ?>

					<p><b><?php echo strtoupper($data_main[$i]); ?></b>
					</p>

					<?php foreach ($detail_sub as $detail) { ?>
						<?php if ($detail->nama_sub_kategori == $data_main[$i] && $detail->nama_main_kategori==""){ ?>

							<span style="font-size: 10px;width: 40%;display: inline-block;vertical-align: top;"><?php echo $detail->nama_kategori; ?></span><span style="font-size: 10px;display: inline-block;vertical-align: top;width: 20%;text-align: center;"><?php echo $detail->hasil ?></span>
							<span style="font-size: 10px;width: 20%;display: inline-block;vertical-align: top;text-align: center;"><?php echo $detail->nilai_normal_akhir; ?></span><span style="font-size: 10px;display: inline-block;vertical-align: top;text-align: center;width: 20%;"><?php echo $detail->satuan; ?></span>
							<br style="display: block;line-height: 1px">

						<?php } ?>

						<?php if ($detail->nama_main_kategori==$data_main[$i]){ ?>
							<?php if (!in_array($detail->nama_sub_kategori, $data_sub)):
								$data_sub[] = $detail->nama_sub_kategori;
							endif ?>
						<?php }?>

					<?php }?>
					<?php for ($j=0; $j <count($data_sub); $j++) { ?>

						<p style="font-style: italic;text-decoration: underline;"><b><?php echo($data_sub[$j]); ?></b>
						</p>

						<?php foreach ($detail_sub as $isi) { ?>
							<?php if ($isi->nama_sub_kategori == $data_sub[$j] AND $isi->nama_main_kategori==$data_main[$i]){ ?>

								<span style="font-size: 10px;width: 40%;display: inline-block;vertical-align: top;"><?php echo $isi->nama_kategori; ?></span><span style="font-size: 10px;display: inline-block;vertical-align: top;width: 20%;text-align: center;"><?php echo $isi->hasil ?></span>
								<span style="font-size: 10px;width: 20%;display: inline-block;vertical-align: top;text-align: center;"><?php echo $isi->nilai_normal_akhir; ?></span><span style="font-size: 10px;display: inline-block;vertical-align: top;text-align: center;width: 20%;"><?php echo $isi->satuan; ?></span>
								<br style="display: block;line-height: 1px">


							<?php } ?>
						<?php } ?>
					<?php } ?>

				<?php }?>


			</div>
			<div class="uraian" style="position: relative;top:-25px;">
				<span style="font-size: 10px;width:  70%;font-weight: bold;display: inline-block;">Keterangan</span>
				<span style="font-size: 10px;font-weight: bold;text-align: center;display: inline-block;width: 30%">Pemeriksa</span>
			</div>
			<div class="uraian" style="position: relative;top:-50px;">
				<span style="font-size: 10px;width:  70%;display: inline-block;">- Tanda * menunjukan nilai dibawah atau diatas nilai normal</span><span style="font-size: 10px;text-align: center!important;display: inline-block;width: 30%"><?php echo  $row->petugas_lab; ?></span>
				<span style="font-size: 10px;width:  70%;display: block;">- * Pemeriksaan dilakukan secara duplo</span>
				
			</div>

		</div>

	</body></html>















