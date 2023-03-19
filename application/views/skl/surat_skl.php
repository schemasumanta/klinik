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
	<?php foreach ($cetak_skl as $key) { ?>
		<div id="layout_print" style="position:absolute;left:50%;margin-left:-209px;top:20px;width:419px;height:595px;border-style:outset;overflow:hidden" >
			<div style="position:absolute;left:0px;top:0px">
				<!-- <img src="<?php echo base_url() ?>assets/img/background_surat.jpg" width=419 height=595></div> -->
				<img src="<?php echo base_url() ?>assets/img/kop.jpg" width=450 height=90>
				<hr style="border: 1px double black">
			</div>

				<!-- <div style="position:absolute;left:109.25px;top:17.40px" class="cls_002"><span class="cls_002">KLINIK PRATAMA RAWAT</span></div>
				<div style="position:absolute;left:132.88px;top:47.02px" class="cls_004"><span class="cls_004">No. SIP : 455.5/208/00039/DPMPTSP/2021</span></div>
				<div style="position:absolute;left:83.65px;top:59.82px" class="cls_005"><span class="cls_005" style="font-size:9px">Kp. Pasirbeureum 1 RT 02/04 Desa Jagabaya Kec.Parungpanjang Kab. Bogor</span></div> -->

				<div style="position:absolute;left:113.25px;top:110.45px" class="cls_011"><span class="cls_011"><b>SURAT KETERANGAN LAHIRAN</b></span></div>
				<div style="position:absolute;left:36.63px;top:140.25px" class="cls_003"><span class="cls_003"><b>Yang bertanda tangan di bawah ini, menerangkan bahwa :</b></span></div>
				<div style="position:absolute;left:36.63px;top:160.87px" class="cls_003"><span class="cls_003">Pada Tangal</span></div>
				<div style="position:absolute;left:165.65px;top:160.87px" class="cls_003"><span class="cls_003">: <?php echo $key->tanggal; ?></span></div>

				<div style="position:absolute;left:36.63px;top:175.67px" class="cls_003"><span class="cls_003">Hari</span></div>
				<div style="position:absolute;left:165.65px;top:175.67px" class="cls_003"><span class="cls_003">: <?php echo $key->hari; ?> </span></div>

				<div style="position:absolute;left:36.63px;top:190.67px" class="cls_003"><span class="cls_003">Jam</span></div>
				<div style="position:absolute;left:165.65px;top:190.67px" class="cls_003"><span class="cls_003">: <?php echo $key->jam; ?></span></div>

				<div style="position:absolute;left:36.63px;top:205.67px" class="cls_003"><span class="cls_003">Jenis Kelamin</span></div>
				<div style="position:absolute;left:165.65px;top:205.67px" class="cls_003"><span class="cls_003">: <?php echo $key->jenis_kelamin; ?></span></div>

				<div style="position:absolute;left:36.63px;top:220.67px" class="cls_003"><span class="cls_003">Anak - Ke</span></div>
				<div style="position:absolute;left:165.65px;top:220.67px" class="cls_003"><span class="cls_003">: <?php echo $key->anak_ke; ?></span></div>


				<div style="position:absolute;left:36.63px;top:235.67px" class="cls_003"><span class="cls_003">Hari</span></div>
				<div style="position:absolute;left:165.65px;top:235.67px" class="cls_003"><span class="cls_003">: <?php echo $key->hari; ?></span></div>


				<div style="position:absolute;left:36.63px;top:260.25px" class="cls_003"><span class="cls_003"><b>Telah Lahir Seorang Bayi :</b></span></div>

				<div style="position:absolute;left:36.63px;top:275.67px" class="cls_003"><span class="cls_003">Nama</span></div>
				<div style="position:absolute;left:165.65px;top:275.67px" class="cls_003"><span class="cls_003">: <?php echo $key->nama_bayi; ?></span></div>


				<div style="position:absolute;left:36.63px;top:290.67px" class="cls_003"><span class="cls_003">Berat Badan</span></div>
				<div style="position:absolute;left:165.65px;top:290.67px" class="cls_003"><span class="cls_003">: <?php echo $key->berat_badan; ?> Kg</span></div>

				<div style="position:absolute;left:36.63px;top:305.67px" class="cls_003"><span class="cls_003">Panjang Badan</span></div>
				<div style="position:absolute;left:165.65px;top:305.67px" class="cls_003"><span class="cls_003">: <?php echo $key->panjang_badan; ?></span></div>

				<div style="position:absolute;left:36.63px;top:320.67px" class="cls_003"><span class="cls_003">Dengan Pertolongan</span></div>
				<div style="position:absolute;left:165.65px;top:320.67px" class="cls_003"><span class="cls_003">: <?php echo $key->dengan_pertolongan; ?></span></div>


				<div style="position:absolute;left:36.63px;top:345.25px" class="cls_003"><span class="cls_003"><b>Anak Dari :</b></span></div>



				<div style="position:absolute;left:36.63px;top:360.67px" class="cls_003"><span class="cls_003">Nama Ayah</span></div>
				<div style="position:absolute;left:165.65px;top:360.67px" class="cls_003"><span class="cls_003">: <?php echo $key->nama_ayah; ?></span></div>

				<div style="position:absolute;left:36.63px;top:375.67px" class="cls_003"><span class="cls_003">Umur Ayah</span></div>
				<div style="position:absolute;left:165.65px;top:375.67px" class="cls_003"><span class="cls_003">: <?php echo $key->umur_ayah; ?> TH</span></div>

				<div style="position:absolute;left:36.63px;top:390.67px" class="cls_003"><span class="cls_003">Nik KTP</span></div>
				<div style="position:absolute;left:165.65px;top:390.67px" class="cls_003"><span class="cls_003">: <?php echo $key->nik_ayah; ?></span></div>

				<div style="position:absolute;left:36.63px;top:405.67px" class="cls_003"><span class="cls_003">Nama Ibu</span></div>
				<div style="position:absolute;left:165.65px;top:405.67px" class="cls_003"><span class="cls_003">: <?php echo $key->nama_ibu; ?></span></div>

				<div style="position:absolute;left:36.63px;top:420.67px" class="cls_003"><span class="cls_003">Umur Ibu</span></div>
				<div style="position:absolute;left:165.65px;top:420.67px" class="cls_003"><span class="cls_003">: <?php echo $key->umur_ibu; ?> TH</span></div>

				<div style="position:absolute;left:36.63px;top:435.67px" class="cls_003"><span class="cls_003">Nik KTP</span></div>
				<div style="position:absolute;left:165.65px;top:435.67px" class="cls_003"><span class="cls_003">: <?php echo $key->nik_ibu; ?></span></div>

				<div style="position:absolute;left:25.63px;top:470.67px" class="cls_003"><span class="cls_003"> <img src="<?php echo base_url() ?>assets/img/qr_klinik.png" width=100 height=100></span></div>
				<div style="position:absolute;left:36.65px;top:553.67px" class="00"><span style="font-size: 8px;" class="00">KLINIK HMS MEDIKA</span></div>

				<?php $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'); ?>

				<div style="position:absolute;left:250.65px;top:480.67px" class="cls_003"><span class="cls_003"> <b>Parungpanjang, <?php $tgl = explode("-", $key->tanggal); echo $tgl[2]." ".$bulan[$tgl[1]]." ".$tgl[0] ; ?></b></span></div>



				<div style="position:absolute;left:250.70px;top:560.38px" class="cls_010"><span class="cls_010"><b><u>( <?php echo $key->yang_bertanda_tangan; ?> )</u></b></span></div>











				
			</div>
		<?php } ?>
	</body>
	</html>
