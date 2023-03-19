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
	span.cls_010{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_010{font-family:Times,serif;font-size:10.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
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
<!-- <script type="text/javascript" src="392e38de-e0d1-11eb-a980-0cc47a792c0a_id_392e38de-e0d1-11eb-a980-0cc47a792c0a_files/wz_jsgraphics.js"></script> -->
</head>
<body onload="window.print()">
	<?php foreach ($cetak_surat as $key) { ?>
		<div id="layout_print" style="position:absolute;left:50%;margin-left:-209px;top:10px;width:419px;height:595px;border-style:outset;overflow:hidden" >
			<div style="position:absolute;left:0px;top:0px">
				<!-- <img src="<?php echo base_url() ?>assets/img/background_surat.jpg" width=419 height=595></div> -->
				<img src="<?php echo base_url() ?>assets/img/klinik.jpg" width=450 height=90>
				<hr style="border: 1px double black">
			</div>

				<!-- <div style="position:absolute;left:109.25px;top:17.40px" class="cls_002"><span class="cls_002">KLINIK PRATAMA RAWAT</span></div>
				<div style="position:absolute;left:132.88px;top:47.02px" class="cls_004"><span class="cls_004">No. SIP : 455.5/208/00039/DPMPTSP/2021</span></div>
				<div style="position:absolute;left:83.65px;top:59.82px" class="cls_005"><span class="cls_005" style="font-size:9px">Kp. Pasirbeureum 1 RT 02/04 Desa Jagabaya Kec.Parungpanjang Kab. Bogor</span></div> -->

				<div style="position:absolute;left:113.25px;top:120.45px" class="cls_011"><span class="cls_011">SURAT KETERANGAN SAKIT</span></div>
				<div style="position:absolute;left:36.63px;top:150.25px" class="cls_003"><span class="cls_003">Yang bertanda tangan di bawah ini menerangkan bahwa :</span></div>
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

				<div style="position:absolute;left:36.63px;top:270.50px" class="cls_003"><span class="cls_003">Pekerjaan</span></div>

				<div style="position:absolute;left:113.45px;top:270.50px" class="cls_003"><span class="cls_003">: <?php echo $key->pekerjaan; ?></span></div>

				<div style="position:absolute;left:36.63px;top:300.50px" class="cls_003"><span class="cls_003">Terapi</span></div>
				<div style="position:absolute;left:113.45px;top:300.50px" class="cls_003"><span class="cls_003">: <?php echo $key->terapi; ?></span></div> 

				<div style="position:absolute;left:36.63px;top:390.50px" class="cls_003"><span class="cls_003">Diagnosa</span></div>
				<div style="position:absolute;left:113.45px;top:390.50px" class="cls_003"><span class="cls_003">: <?php echo $key->diagnosa; ?></span></div>


				<div style="position:absolute;left:36.63px;top:420.92px" class="cls_003"><span class="cls_003">Karena kesehatannya memerlukan istirahat selama <?php echo $key->hari; ?> Hari, Terhitung</span></div>
				<?php $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'); ?>
				<div style="position:absolute;left:36.63px;top:440.72px" class="cls_003"><span class="cls_003">dari tanggal <b><?php $tgl_awal = explode("-", $key->dari_tanggal); echo $tgl_awal[2]." ".$bulan[$tgl_awal[1]]." ".$tgl_awal[0] ; ?></b> s/d tanggal <b><?php $tgl_akhir = explode("-", $key->sampai_tanggal); echo $tgl_akhir[2]." ".$bulan[$tgl_akhir[1]]." ".$tgl_akhir[0] ; ?></b>.</span></div>

				<!-- <div style="position:absolute;left:36.63px;top:470.72px" class="cls_003"><span class="cls_003">Harap yang berkepentingan maklum adanya.</span></div> -->



				<div style="position:absolute;left:25.63px;top:490.67px" class="cls_003"><span class="cls_003"> <img src="<?php echo base_url() ?>assets/img/qr_klinik.png" width=100 height=100></span></div>
				<div style="position:absolute;left:36.65px;top:573.67px" class="00"><span style="font-size: 8px;" class="00">KLINIK HMS MEDIKA</span></div>


				<div style="position:absolute;left:250.70px;top:500.35px" class="cls_003"><span class="cls_003">Parungpanjang, <?php $tgl_surat = explode("-", $key->tanggal_pembuatan_surat); echo $tgl_surat[2]." ".$bulan[$tgl_surat[1]]." ".$tgl_surat[0] ; ?></span></div>

				<div style="position:absolute;left:250.70px;top:582.38px" class="cls_010"><span class="cls_010">( <?php echo $key->yang_bertanda_tangan; ?> )</span></div>


				
			</div>
		<?php } ?>
	</body>
	</html>
