<html>
<head>
	<meta http-equiv=Content-Type content="text/html; charset=UTF-8">

	<link rel="icon" href="<?php echo base_url() ?>assets/img/logo.png" type="image/x-icon"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
	<link rel="stylesheet" href="<?php echo base_url()?>assets/js/plugin/datatables-bs4/css/dataTables.bootstrap4.css">
	<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.js"></script>
	<!-- Fonts and icons -->
	<script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

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
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.min.css">
	<style type="text/css">
	tr,th,td{
		height: 25px!important;
	}
	@media print{
		html, body, head{
			padding:0;
			margin: 0;
		}
		#layout_print{
			page-break-after:auto ;
			top:950px !important;
			/*left:250px !important;*/
			transform: scale(3.5);
			border: 0px solid black !important;
			overflow: visible;
		}

	}
	span.cls_003{font-family:Arial,serif;font-size:18.1px;color:rgb(234,6,6);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_003{font-family:Arial,serif;font-size:18.1px;color:rgb(234,6,6);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_004{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_004{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_002{font-family:"Lucida Sans Unicode",serif;font-size:26.1px;color:rgb(86,86,86);font-weight:normal;font-style:normal;text-decoration: none}
	div.cls_002{font-family:"Lucida Sans Unicode",serif;font-size:26.1px;color:rgb(86,86,86);font-weight:normal;font-style:normal;text-decoration: none}
	span.cls_006{font-family:"Lucida Sans Unicode",serif;font-size:8.1px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_006{font-family:"Lucida Sans Unicode",serif;font-size:8.1px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_007{font-family:"Lucida Sans Unicode",serif;font-size:11.1px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_007{font-family:"Lucida Sans Unicode",serif;font-size:11.1px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_008{font-family:"Lucida Sans Unicode",serif;font-size:10.0px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_008{font-family:"Lucida Sans Unicode",serif;font-size:10.0px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_009{font-family:"Lucida Sans Unicode",serif;font-size:16.0px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	div.cls_009{font-family:"Lucida Sans Unicode",serif;font-size:16.0px;color:rgb(102,102,102);font-weight:bold;font-style:normal;text-decoration: none}
	span.cls_010{font-family:"Lucida Sans Unicode",serif;font-size:16.0px;color:rgb(102,102,102);font-weight:normal;font-style:normal;text-decoration: none}
	div.cls_010{font-family:"Lucida Sans Unicode",serif;font-size:16.0px;color:rgb(102,102,102);font-weight:normal;font-style:normal;text-decoration: none}
	span.cls_011{font-family:"Microsoft Sans Serif",serif;font-size:8.1px;color:rgb(102,102,102);font-weight:normal;font-style:normal;text-decoration: none}
	div.cls_011{font-family:"Microsoft Sans Serif",serif;font-size:8.1px;color:rgb(102,102,102);font-weight:normal;font-style:normal;text-decoration: none}

</style>
</head>
<body style="overflow: visible;">
	<div id="layout_print" style="position:absolute;left:50%;margin-left:-306px;top:0px;width:612px;height:792px;border-style:outset;overflow:visible;">
		<div style="position:absolute;left:0px;top:0px">
			<img src="<?php echo base_url()?>assets/img/invoice/background1.jpg" width=612 height=792></div>
			<div style="position:absolute;left:5.67px;top:24.53px" class="cls_003"><img src="<?php echo base_url() ?>assets/img/hms.png" width="90px"></div>
			<div style="position:absolute;left:104.67px;top:24.53px" class="cls_003"><span class="cls_003">KLINIK</span></div>

			<div style="position:absolute;left:104.67px;top:46.13px" class="cls_003"><span class="cls_003">HMS MEDIKA</span></div>
			<div style="position:absolute;left:104.67px;top:68.33px" class="cls_004"><span class="cls_004">Jl. Pasir Beureum 1, RT 002/RW 004</span></div>
			<div style="position:absolute;left:104.67px;top:79.13px" class="cls_004"><span class="cls_004">Desa Jagabaya, Kecamatan Parungpanjang,</span></div>
			<div style="position:absolute;left:104.67px;top:89.93px" class="cls_004"><span class="cls_004">Kabupaten Bogor</span></div>
			<div style="position:absolute;left:323.47px;top:80.76px" class="cls_002"><span class="cls_002">Invoice Pembayaran</span></div>
			<?php foreach ($invoice_pembayaran as $key) { ?>
				<div style="position:absolute;left:380px;top:128.90px" class="cls_006"><span class="cls_006">Invoice No</span></div>
				<div style="position:absolute;left:435px;top:128.90px" class="cls_006"><span class="cls_006">: INV-<?php echo $key->kode_rekam; ?></span></div>
				<div style="position:absolute;left:380px;top:139.34px" class="cls_006"><span class="cls_006">Invoice Date</span></div>
				<div style="position:absolute;left:435px;top:139.34px" class="cls_006"><span class="cls_006">: <?php echo $key->tanggal_checkout; ?></span></div>
				<?php foreach ($perusahaan as $pr): ?>
					<div style="position:absolute;left:53.52px;top:159.74px" class="cls_006"><span class="cls_006">Dari :</span></div>
					<div style="position:absolute;left:94.82px;top:159.74px" class="cls_006"><span class="cls_006">Nama Klinik</span></div>
					<div style="position:absolute;left:154.82px;top:159.74px" class="cls_006"><span class="cls_006">: <?php echo $pr->nama_pt ?></span></div>
					<div style="position:absolute;left:337.63px;top:159.74px" class="cls_006"><span class="cls_006">Untuk :</span></div>
					<div style="position:absolute;left:380px;top:159.74px" class="cls_006"><span class="cls_006">Nama Pasien</span></div>
					<div style="position:absolute;left:435px;top:159.74px" class="cls_006"><span class="cls_006">: <?php echo $key->nama_pasien; ?></span></div>
					<div style="position:absolute;left:94.82px;top:169.22px" class="cls_006"><span class="cls_006">No Telepon</span></div>
					<div style="position:absolute;left:154.82px;top:169.22px" class="cls_006"><span class="cls_006">: <?php if ($pr->telepon!='') { echo $pr->telepon; }else{echo $pr->handphone;} ?></span></div>
					<div style="position:absolute;left:380px;top:169.22px" class="cls_006"><span class="cls_006">No Telepon</span></div>
					<div style="position:absolute;left:435px;top:169.22px" class="cls_006"><span class="cls_006">: <?php echo $key->telepon; ?></span></div>
					<div style="position:absolute;left:94.82px;top:178.58px" class="cls_006"><span class="cls_006">Alamat</span></div>
					<div style="position:absolute;left:154.82px;top:178.58px;width:148px !important;word-break: auto;" class="cls_006"><span class="cls_006" style="">: </span></div>
					<div style="position:absolute;left:160px;top:178.58px;width:148px !important;word-break: auto;" class="cls_006"><span class="cls_006" style=""><?php echo $pr->alamat ?></span></div>
				<?php endforeach ?>
				<div style="position:absolute;left:380px;top:178.58px" class="cls_006"><span class="cls_006">Alamat</span></div>
				<div style="position:absolute;left:435px;;top:178.58px" class="cls_006"><span class="cls_006">: <?php echo $key->alamat; ?></span></div>
				<div style="position:absolute;top:228.89px;left: 20px; width: 93% !important;" class="cls_007">
					<div class="table-responsive" >
						<table  class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
							<thead>
								<tr>
									<th style="text-align: center; border:1px solid #565656!important">Item Description</th>
									<th style="text-align: center; border:1px solid #565656!important">Qty</th>
									<th style="text-align: center; border:1px solid #565656!important">Price</th>
									<th style="text-align: center; border:1px solid #565656!important">Amount</th>
								</tr>
							</thead>
							<tbody >
								<?php if (isset($detail_obat)) {?>
									<?php if (count($detail_obat) > 0){ ?>
										<?php foreach ($detail_obat as $obat) {?>
											<tr>
												<td  style="text-align: left;font-size: 12px; border:1px solid #565656!important"><?php echo $obat->nama_obat?></td>
												<td  style="text-align: center;font-size: 12px; border:1px solid #565656!important"><?php echo $obat->qty?></td>
												<td  style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format($obat->subtotal/$obat->qty
													, 0, ',', '.')?></td>

													<td  style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format(($obat->subtotal), 0, ',', '.')?></td>
												</tr> 

											</tr>
										<?php } ?>
									<?php } ?>
								<?php } ?>

								<?php $k=1; if (count($tambahan)>0) {?>
									<?php foreach ($tambahan as $tambah){ ?>
										<tr>
											<td style="text-align: left;font-size: 12px; border:1px solid #565656!important"><?php echo $tambah->tindakan_pemeriksaan;  ?></td>
											<td style="text-align: center;font-size: 12px; border:1px solid #565656!important">1</td>
											<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format($tambah->biaya_pemeriksaan, 0, ',', '.'); ?></td> 
											<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format($tambah->biaya_pemeriksaan, 0, ',', '.'); ?></td> 
										</tr>
									<?php }}?>
									<?php if (isset($pemeriksaan_lab)) {?>
										<tr>
											<td style="text-align: left;font-size: 12px; border:1px solid #565656!important">Pemeriksaan Lab (<?php echo $jumlah_lab?>x)</td>
											<td style="text-align: center;font-size: 12px; border:1px solid #565656!important">1</td>
											<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format($pemeriksaan_lab, 0, ',', '.'); ?></td>
											<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format($pemeriksaan_lab, 0, ',', '.'); ?></td>
										</tr>
									<?php } ?>
									<tr>
										<td style="text-align: left;font-size: 12px; border:1px solid #565656!important">Jasa Dokter</td>
										<td style="text-align: center;font-size: 12px; border:1px solid #565656!important">1</td>
										<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"> <?php if(strpos($key->kode_rekam,'POBAT')==0) { $upah_dokter=$key->upah_dokter; ?>  <?php } else{ $upah_dokter=0;} ?> <?php echo number_format(($upah_dokter), 0, ',', '.'); ?></td>
										<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"> <?php if(strpos($key->kode_rekam,'POBAT')==0) { $upah_dokter=$key->upah_dokter; ?>  <?php } else{ $upah_dokter=0;} ?> <?php echo number_format(($upah_dokter), 0, ',', '.'); ?></td>
									</tr>
									<?php if ($key->biaya_admin!=0): ?>

										<tr>
											<td  style="text-align: left;font-size: 12px; border:1px solid #565656!important">Biaya Admin</td>
											<td style="text-align: center;font-size: 12px; border:1px solid #565656!important"></td>
											<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format(($key->biaya_admin), 0, ',', '.'); ?></td>
											<td style="text-align: right;font-size: 12px; border:1px solid #565656!important"><?php echo number_format(($key->biaya_admin), 0, ',', '.'); ?></td>
										</tr> 
									<?php endif ?>

									<tr>
										<td colspan="3" style="text-align:right;font-weight: bold;border: 0px solid #565656;">Subtotal</td>
										<td style="border: 1px solid #565656!important; text-align:right;"><?php echo number_format($key->total_pembayaran + $key->discount, 0, ',', '.') ?></td>
									</tr>
									<tr>
										<td colspan="3" style="text-align:right;font-weight: bold;border: 0px solid #565656;" >Disc</td>
										<td style="border: 1px solid #565656!important; text-align:right;"><?php echo number_format($key->discount, 0, ',', '.') ?></td>
									</tr>
									<tr>
										<td colspan="3" style="text-align:right;font-weight: bold;border: 0px solid #565656;" >Tax</td>
										<td style="border: 1px solid #565656!important; text-align:right;">0</td>
									</tr>
									<tr>
										<td colspan="3" style="text-align:right;font-weight: bold;border: 0px solid #565656;" >BALANCE DUE</td>
										<td style="border: 1px solid #565656!important; text-align:right;" ><?php echo number_format($key->total_pembayaran, 0, ',', '.') ?></td>
									</tr>
									<tr style="border:0px solid black !important;height: 55px!important;">
										<th style="border:0px solid black !important;height: 55px!important;"></th>
									</tr>

									<tr >
										<th colspan="4" style="border:0px solid black !important;">Notes</th>
									</tr>
									<tr >
										<td colspan="4" style="font-size: 10px;border:0px solid black !important;">Invoice Ini Sebagai Bukti Pembayaran Yang Sah Mohon Di Simpan</td>
									</tr>
								</tbody>

							</table>
						</div>
					</div>

				<?php } ?>
					</div>

			</body>
			</html>
 
