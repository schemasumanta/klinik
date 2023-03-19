<!DOCTYPE html>
<html><head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
		.tengah{
			text-align: center;
		}
		.kanan{
			text-align: right;

		}
		.judultotal{
			vertical-align: middle;
			color: white;
		}
		.isitotal{
			vertical-align: middle;

		}
		.card{
			border:0px solid black !important;
		}

		th{
			line-height: 15px;
		}
/*
		@media print{
			.card-body{
				margin-top: 70px;
				margin-left: 5%;
				margin-right: 5%;

			}*/

			.tengah{
				text-align: center;
			}
			.kanan{
				text-align: right;

			}
			.judultotal{
				vertical-align: middle;
				color: white;
			}
			.isitotal{
				vertical-align: middle;

			}

		};
	</style>

</head><body>

		<div class="main-panel w-100">
			<style type="text/css">

				.label-checkbox{
					vertical-align: middle;
					padding-bottom: 10px;
				}
				#tabel_lab{
					overflow-x:  scroll;
					width: 100%;
				}

				.batas{
					width:1%;

				}
				.batasket{
					width:20px;
				}
				.judul2{
					padding: 10px;
					font-size:14px;
					width:10%;
					text-align: left;
				}
				.judul1{
					padding: 10px;
					font-size:14px;
					width:5%;
					text-align: left;
				}
				.isi1{
					padding: 10px;
					width:30%;
					font-size:14px;
					text-align: left;
				}

				.isi{
					padding: 10px;
					font-size:14px;
					text-align: left;
				}
				.qty{
					padding: 10px;
					width:10%;
					font-size:14px;
					text-align: center;
				}
				tbody{
					border: 0px solid;

				}
				.pemisah{
					height: 10px;

				}
				.tengah{
					text-align: center;
				}
				.rekam{
					text-align: right; 			
					border-top-left-radius: 15px;
					border-bottom-right-radius: 15px;
					color:white;
				}
				#tabel_lab{
					overflow-x: hidden;
				}

				#tabel_labfinal{
					overflow-x: hidden;
				}

				.gambar{
					width: 80px;
				}
				.final{
					height: 20px;
				}
				h2{
					font-weight: bold;
					color: #d07b00;
				}

			</style>
			<!-- <div class="content"> -->
				<!-- <div class="page-inner"> -->
					<!-- <div class="page-header">
					</div> -->

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body mb-3">
									<?php foreach ($detail_laboratorium_pasien as $row): ?>
									<?php endforeach ?>
									<table id="tabel_lab" class="table-responsive"> 
										<thead>
											<tr> <!-- <th colspan="5" class="text-center"><span style="font-size: 25px;"><b>HASIL PEMERIKSAAN LABORATORIUM</b></span></th> -->
												 <img src="<?php echo base_url()?>assets/img/kop.jpg" width=700 height=150>
												 <hr style="width:100%; height: 2px; background:black"> 
											</tr>
											<tr class="pemisah">
												<td colspan="2"></td>
												<td ></td>
												<td colspan="2"></td>
											</tr>
											<tr class="pemisah">
												<td colspan="2"></td>
												<td ></td>
												<td colspan="2"></td>
											</tr>
											<tr class="pemisah">
												<td colspan="2"></td>
												<td ></td>
												<td colspan="2"></td>
											</tr>
										</thead>
										<tbody>  
											<tr class="pemisah">
												<td colspan="2"></td>
												<td ></td>
												<td colspan="2"></td>
											</tr>
											<tr class="justify-content-center">
												<th class="judul1" >Nama Pasien</th>											
												<td class="isi">: <?php echo $row->nama_pasien ?></td>
												<th class="batas"></th>
												<th  class="judul2">Pengirim</th>											
												<td class="isi1">: <?php echo $row->pengirim?></td>
											</tr>
											<tr >
												<th  class="judul1">Jenis Kelamin</th>											
												<td class="isi">: <?php if ($row->jk=="L") {
													echo 'Laki-Laki';
												}else{echo 'Perempuan';} ?></td>
												<td class="batas"></td>
												<th class="judul2" >Tanggal Pemeriksaan</th>											
												<td class="isi1">: <?php $tanggal=explode('-', $row->tanggal_periksa);
												$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
												echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0] ?></td>
											</tr>
											<tr>
												<th  class="judul1">Umur</th>											
												<td class="isi">: <?php echo $row->umur ?> Tahun</td>
												<th class="batas"></th>
												<th class="judul2" >Nomor Lab</th>											
												<td class="isi1">: <?php echo $row->kode_lab; ?></td>
											</tr>
											<tr>
												<th  class="judul1" >Alamat</th>											
												<td class="isi" colspan="4">: <?php echo $row->alamat?></td>
											</tr>
											<tr class="pemisah">
												<td class="final" colspan="2"></td>
												<td class="final" ></td>
												<td class="final" colspan="2"></td>
											</tr>
										</tbody>
									</table>
									<table  id="tabel_labfinal" class="table-responsive">
										<thead>
											<tr style="border-top: 2px double black;border-bottom:  2px double black;">
												<th class="judul1 ">PEMERIKSAAN</th>
												<th class="judul1 text-center">HASIL</th>
												<th class="judul1 ">NILAI NORMAL</th>
												<th class="judul1 text-center">SATUAN</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$data_main=[];
											foreach ($detail_sub as $key) {
												if ($key->nama_main_kategori!='') {
													if (!in_array($key->nama_main_kategori, $data_main)) {
														$data_main[]=$key->nama_main_kategori;
													}
												}
												if ($key->nama_sub_kategori!='' AND $key->nama_main_kategori=='') {
													if (!in_array($key->nama_sub_kategori, $data_main)) {
														$data_main[]=$key->nama_sub_kategori;
													}
												}
											}?>

											<?php for ($i=0; $i <count($data_main) ; $i++) {
												$data_sub=[]; ?>
												<tr>
													<td  class="isi"><b><?php echo strtoupper($data_main[$i]); ?></b></td>
												</tr>
												<?php foreach ($detail_sub as $detail) { ?>
													<?php if ($detail->nama_sub_kategori == $data_main[$i] && $detail->nama_main_kategori==""){ ?>
														<tr>
															<td  class="isi"><?php echo $detail->nama_kategori; ?></td>
															<td class="isi text-center"><?php echo $detail->hasil ?></td>
															<td  class="isi"><?php echo $detail->nilai_normal_akhir; ?></td>
															<td  class="isi"><?php echo $detail->satuan; ?></td>											
														</tr>
													<?php } ?>

													<?php if ($detail->nama_main_kategori==$data_main[$i]){ ?>
														<?php if (!in_array($detail->nama_sub_kategori, $data_sub)):
															$data_sub[] = $detail->nama_sub_kategori;
														endif ?>
													<?php }?>

												<?php }?>
												<?php for ($j=0; $j <count($data_sub); $j++) { ?>
													<tr>
														<td  class="isi"><b><span style="font-style: italic;text-decoration: underline;"><?php echo($data_sub[$j]); ?></b></td>
														</tr>
														<?php foreach ($detail_sub as $isi) { ?>
															<?php if ($isi->nama_sub_kategori == $data_sub[$j] AND $isi->nama_main_kategori==$data_main[$i]){ ?>
																<tr>
																	<td  class="isi"><?php echo $isi->nama_kategori; ?></td>
																	<td class="isi text-center"><?php echo $isi->hasil ?></td>
																	<td  class="isi"><?php echo $isi->nilai_normal_akhir; ?></td>
																	<td  class="isi"><?php echo $isi->satuan; ?></td>											
																</tr>
															<?php } ?>
														<?php } ?>
													<?php } ?>

												<?php }?>


											</tbody>
										</table>
										<div style="width: 100%;height: 1px;border-top: 1px double black;margin-top: 100px">
											<table class="w-100 mt-3">
												<thead>
													<tr>
														<th style="width: 50%"><span style="text-decoration: underline;">Keterangan :</span></th>
														<th class="batasket"></th>
														<th class="text-center">Pemeriksa</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td style="width: 50%">- Tanda <b>*</b> menunjukan nilai dibawah atau diatas nilai normal <br>- <b>*</b>Pemeriksaan dilakukan secara duplo</td>

														<th class="batasket"></th>
														<td class="text-center"><?php echo $row->petugas_lab; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>


							</div>
						</div>
					<!-- </div> -->


				<!-- </div> -->
				<script type="text/javascript">
					function kembali(){
						window.history.back();
					}
				</script>

			</body>
			</html>