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
	


</head><body style="height: 100%;">
	<style type="text/css">
		td, th {
			border: 1px solid #dddddd;
			padding: 8px;
			text-align: left;

		}
		table{
			margin: 0px auto;
			color: black;
		}

		th{
			text-align: center;
			font-weight: bold;

		}
	</style>
	<div class="main-panel w-100 ">

		<!-- <div class="content"> -->
			<!-- <div class="page-inner"> -->
					<!-- <div class="page-header">
					</div> -->

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body mb-3"> 
									<table id="mytable" border="1px"  style="font-size:12px;" >           
										<thead>
											<tr> <!-- <th colspan="5" class="text-center"><span style="font-size: 25px;"><b>HASIL PEMERIKSAAN LABORATORIUM</b></span></th> -->
												<!-- <img src="<?php echo base_url()?>assets/img/kop.jpg" width=700 height=150> -->
												<!-- <hr style="width:100%; height: 2px; background:black">  -->
												<img src="<?php echo base_url()?>assets/img/kop.jpg" width=500 height=100></img><br><br>	
												<h2 style="text-align: left;"><b>LAPORAN DATA LABORATORIUM PERIODE</b> : <?php echo date(" M - Y"); ?> </h2>  </th>
											</tr>

											<tr>
												<th width="2%">NO</th>
												<th width="5%">Kode Lab</th>
												<th width="15%">Nama Pasien</th>
												<th width="10%">Jenis Kelamin</th>
												<th width="10%">Petugas Pengirim</th> 
												<th width="10%">Petugas Lab</th> 
												<th width="10%">Tanggal Periksa</th>
												<th width="10%">Keterangan Pemeriksaan</th>
												<!-- <th width="10%">Harga</th> -->
											</tr>

										</thead>
										<tbody>  

											<?php 
											$no=1;
											foreach ($laporan_lab as $row) { ?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $row->kode_lab ?></td>
													<td><?php echo $row->nama_pasien ?></td>
													<td><?php if ($row->jk=="L") { echo "Laki-Laki"; } else{ echo "Perempuan"; }  ?></td>  
													<td><?php echo $row->pengirim ?></td>   
													<td><?php echo $row->petugas_lab ?></td>   
													<td><?php echo $row->tanggal_periksa ?></td>
													<td><?php echo $row->keterangan_pemeriksaan_lab ?></td>
													<!-- <td><?php echo $row->total_akhir ?></td>  -->
												</tr>
											<?php } ?>
											
										</tbody>
									</table>


									 <?php $bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember'); ?>

									<div   class="cls_003"><span class="cls_003">Parungpanjang, <?php $tgl_surat = explode("-", $row->tanggal_periksa); echo $tgl_surat[2]." ".$bulan[$tgl_surat[1]]." ".$tgl_surat[0] ; ?></span></div>


									<div class="cls_003"><span class="cls_003"> <img src="<?php echo base_url() ?>assets/img/qr_klinik.png" width=100 height=100></span></div>
									<div   class="cls_010"><span class="cls_010">( <?php echo $row->petugas_lab; ?> )</span></div> 
									<div class="003 ml-1"><span style="font-size: 8px;" class="003">KLINIK HMS MEDIKA</span></div>



									<!-- <div style="position:absolute;left:25.63px;top:490.67px" class="cls_003"><span class="cls_003"> <img src="<?php echo base_url() ?>assets/img/qr_klinik.png" width=100 height=100></span></div>
									<div style="position:absolute;left:36.65px;top:573.67px" class="00"><span style="font-size: 8px;" class="00">KLINIK HMS MEDIKA</span></div>


									<div style="position:absolute;left:190.70px;top:500.35px" class="cls_003"><span class="cls_003">Parungpanjang, <?php $tgl_surat = explode("-", $row->tanggal_periksa); echo $tgl_surat[2]." ".$bulan[$tgl_surat[1]]." ".$tgl_surat[0] ; ?></span></div>

									<div style="position:absolute;left:190.70px;top:582.38px" class="cls_010"><span class="cls_010">( <?php echo $row->petugas_lab; ?> )</span></div> -->  

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

<!-- 
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
											</tr> -->