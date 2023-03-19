<html>
<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
	<style type="text/css">
	span.cls_002{font-family:Arial,serif;font-size:18.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_002{font-family:Arial,serif;font-size:18.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_004{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_004{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_005{font-family:Arial,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
	div.cls_005{font-family:Arial,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:italic;text-decoration: none}
	span.cls_011{font-family:Times,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: underline}
	div.cls_011{font-family:Times,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_003{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
	div.cls_003{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
	span.cls_012{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: underline}
	div.cls_012{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_009{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_009{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}

	@media print{
		html, body, head{
			padding:0;
			margin: 0;
		}

		#layout_print{
			border:0px solid;
			top:200px !important;
			left:360px !important;
			width:500%;
			transform: scale(1.6);
		}

	}
</style>
</head>
<body  onload="window.print()">
	<?php foreach ($cetak_surat as $key) {?>
		<div id="layout_print" style="position:absolute;left:50%;margin-left:-209px;top:10px;width:419px;height:595px;border-style:outset;overflow:hidden">
			<div style="position:absolute;left:0px;top:0px">
				<img src="<?php echo base_url() ?>assets/img/klinik.jpg" width=450 height=90>
				<hr style="border: 1px double black">
			</div>
				<!-- <div style="position:absolute;left:109.25px;top:17.40px" class="cls_002"><span class="cls_002">KLINIK PRATAMA RAWAT</span></div>
				<div style="position:absolute;left:132.88px;top:47.02px" class="cls_004"><span class="cls_004">No. SIP : 455.5/208/00039/DPMPTSP/2021</span></div>
				<div style="position:absolute;left:83.65px;top:59.82px" class="cls_005"><span class="cls_005" style="font-size:9px">Kp. Pasirbeureum 1 RT 02/04 Desa Jagabaya Kec.Parungpanjang Kab. Bogor</span></div> -->
				<div style="position:absolute;left:113.25px;top:120.45px" class="cls_011"><span class="cls_011"><b>SURAT KETERANGAN SEHAT</b></span></div>
				<div style="position:absolute;left:36.63px;top:150.25px" class="cls_003"><span class="cls_003"><b>Yang bertanda tangan di bawah ini menerangkan bahwa :</b></span></div>
				<div style="position:absolute;left:36.63px;top:180.87px" class="cls_003"><span class="cls_003">Nama</span></div>
				<div style="position:absolute;left:114.65px;top:180.87px" class="cls_003"><span class="cls_003">: <?php echo $key->nama_pasien; ?></span></div>

				<div style="position:absolute;left:36.63px;top:210.67px" class="cls_003"><span class="cls_003">Umur</span></div>
				<div style="position:absolute;left:114.65px;top:210.67px" class="cls_003"><span class="cls_003">: <?php echo $key->umur; ?> Tahun&nbsp;&nbsp;&nbsp; (<?php
					if ($key->jk=="L") { ?>
						Laki-laki / <s style="color: red">Perempuan</s>		
					<?php }else{ ?>
						<s>Laki-laki</s> / Perempuan		
					<?php } ?>
				)</span></div>

				<div style="position:absolute;left:36.63px;top:240.47px" class="cls_003"><span class="cls_003">Alamat</span></div>
				<div style="position:absolute;left:114.65px;top:240.47px" class="cls_003"><span class="cls_003">: <?php echo $key->alamat; ?> </span></div>

				<div style="position:absolute;left:36.63px;top:280.70px" class="cls_003"><span class="cls_003"><b>Saat   ini   bahwa   yang   bersangkutan   dalam   keadaan   sehat   pada :</b>	</span></div>
				<?php $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'); ?>

				<div style="position:absolute;left:36.63px;top:300.70px" class="cls_012"><span class="cls_012">Pemeriksaan Fisik.</span></div>
				<div style="position:absolute;left:36.63px;top:330.10px" class="cls_003"><span class="cls_003">Surat Keterangan ini dipergunaan untuk : <b><u><?php echo $key->keperluan; ?></u></b></span></div>

				<div style="position:absolute;left:36.63px;top:360.72px" class="cls_003"><span class="cls_003">Tinggi Badan</span></div>
				<div style="position:absolute;left:130.48px;top:360.72px" class="cls_003"><span class="cls_003">: <?php echo $key->tb; ?> Centimeter</span></div>

				<div style="position:absolute;left:36.63px;top:390.52px" class="cls_003"><span class="cls_003">Berat Badan</span></div>
				<div style="position:absolute;left:130.48px;top:390.52px" class="cls_003"><span class="cls_003">: <?php echo $key->bb; ?> Kilogram</span></div>


				<div style="position:absolute;left:36.63px;top:420.32px" class="cls_003"><span class="cls_003">Tekanan Darah</span></div>
				<div style="position:absolute;left:130.48px;top:420.32px" class="cls_003"><span class="cls_003">: <?php echo $key->tekanan_darah; ?> mmHg</span></div> 


				<div style="position:absolute;left:25.63px;top:470.67px" class="cls_003"><span class="cls_003"> <img src="<?php echo base_url() ?>assets/img/qr_klinik.png" width=100 height=100></span></div>
				<div style="position:absolute;left:36.65px;top:553.67px" class="00"><span style="font-size: 8px;" class="00">KLINIK HMS MEDIKA</span></div>



				<div style="position:absolute;left:216.10px;top:440.32px" class="cls_003"><span class="cls_003"></span></div>
				<div style="position:absolute;left:250.70px;top:470.95px;" class="cls_003"><span class="cls_003">Parungpanjang, <?php $tgl_surat = explode("-", $key->tanggal_pembuatan_surat); echo $tgl_surat[2]." ".$bulan[$tgl_surat[1]]." ".$tgl_surat[0] ; ?></span></div>

				<div style="position:absolute;left:250.70px;top:550.17px" class="cls_009"><span class="cls_009"><b><u>( <?php echo $key->yang_bertanda_tangan; ?> )</u></b></span></div></div>


				
			<?php } ?>
		</body>
		</html>
