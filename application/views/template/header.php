
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $this->session->nama_pt;?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<style type="text/css">
		::ng-deep.swal2-container {
			z-index: 999999!important;
		}
		
		.select2-selection {
			height: 40px !important;
		}

	/*	#modalkeuangan .modal-backdrop{
			display: none;
		}*/
		.modal-header{
			background: #b95b00;
			border: 1px solid #e0e0e0;
			color:white;
		}
		.modalheader2{
			background: #ca1e1e;
			border: 1px solid #e0e0e0;
			color:white;
		}

	</style> 
	<link rel="icon" href="<?php echo base_url().$this->session->logo_pt ?>" type="image/x-icon"/>
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

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.min.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header"  style="background-color: #03b509">
				
				<a href="<?php echo site_url('dashboard'); ?>" class="logo" >
					<img src="<?php echo base_url().$this->session->logo_header ?>" class="mr-2" style="width: 180px;height: auto;position: relative; left: -15px;">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
				</div>
			</nav>
		</div>


		
		<div class="modal fade" id="ModalAntrian" style="position:fixed; top: 10%; z-index: 9995" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header modalheader2">
						<h3 class="modal-title" id="judul_laporan_obat" style=" font: sans-serif; "><i class="fas fa-microphone mr-2"></i>LIST ANTRIAN</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">
							<div class="row mx-auto" style="border: 1px solid #185594;border-radius: 15px;;overflow: hidden;"> 
								<div class="col-md-6 mb-5" style="padding: 0;overflow: hidden;">
									<h4 style="background:#185594; color: white;text-align: center;padding: 5px">ANTRIAN SEKARANG</h4>
									<h1 class="text-center text-dark fw-bold"style="font-size: 50px" id="antrian_sekarang">001</h1>

									<hr>
									<center><button type="button" class="btn btn-primary btn-sm" onclick="panggilantrian('ulang')"><i class="fas fa-volume-up mr-2"></i>Panggil Ulang</button></center>
								</div> 
								<div class="col-md-6 mb-5" style="padding: 0;overflow: hidden;">
									<h4 style="background:#185594; color: white;text-align: center;padding: 5px">ANTRIAN BERIKUTNYA</h4>
									<h1 class="text-center text-dark fw-bold" style="font-size: 50px" id="antrian_berikutnya">002</h1>
									<hr>
									<center><button type="button" class="btn btn-success btn-sm" onclick="panggilantrian('next')"><i class="fas fa-volume-up mr-2"></i>Panggil Antrian</button></center>
								</div> 
								<div class="col-md-12">
									<audio data="" id="pemutar"  style="width: 95%;position: relative;top:-100px;left: 0;border: 1px solid white;background: #f1f3f4;border-radius: 5px;" controlsList="nodownload">
										<source src="" type="audio/wav">							
										</audio>
									</div>	

								</div> 
							</div>



						</form>
					</div>
				</div>
			</div> 
			

					<div class="modal fade" id="ModalLaporanKKB" tabindex="-1"  role="dialog" aria-labelledby="ModalLaporanKKBLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content" >
										<div class="modal-header bg-success-gradient"> 
											<h3 class="modal-title" id="labellaporan"><i class="fas fa-receipt mr-2"></i>FORM TARIK DATA LAPORAN</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
										</div>
										<div class="modal-body">
											<form method="post">
												<div class="row "> 
													<div class="col-md-12 mb-3"> 
														<span class="input-group-text labelkolom">Bulan</span> 
														<input type="month" class="form-control" id="bulan_kkbptm"  name="bulan_kkbptm" required>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<div class="form-group row"class="collapse" id="customer_collapse">
													<div class="col-sm-12">
														<button type="button" class="btn btn-danger mr-2" data-dismiss="modal"><b>BATAL</b></button>
														<button type="button" class="btn btn-success" id="btn_tarik_laporan_kkbptm"><b>TARIK</b></button>
													</div>
												</div>
											</div>
										</form>

									</div>
								</div> 
							</div>

							

						<div class="modal fade" id="ModalLaporanRekam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position:fixed; top: 10%; z-index: 9999999">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i> LAPORAN REKAM MEDIK PASIEN</h3>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

									</div>
									<form class="form-horizontal">
										<div class="modal-body">

											<div class="row"> 
												<div class="col-md-12 cheklist" >

													<div class="checkbox">
														<label style="margin:5px" ><input type="checkbox" id="bytanggalrekam" value="" style="margin:5px">By Tanggal</label>
														<label style="margin:5px" ><input type="checkbox" id="bytahunrekam" value="" style="margin:5px">By Tahun</label>

													</div>

												</div> 

												<div class="col-md-12 pasienrekam mt-3" style="display:none"> 
													<div class="input-group mb-3"> 
														<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Pilih Pasien</span>
														<select class="form-control"  id="pasien_rekam">
														</select>
													</div> 
												</div> 

												<div class="col-md-12 tglrekam" style="display:none"> 
													<div class="input-group mb-3"> 
														<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tanggal Awal</span>
														<input type="date" class="form-control"  id="tanggal_awal_rekam" > 
													</div> 
												</div>  

												<div class="col-md-12 tglrekam" style="display:none"> 
													<div class="input-group mb-3"> 
														<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tanggal Akhir</span>
														<input type="date" class="form-control"  id="tanggal_akhir_rekam" >

													</div> 
												</div> 

												<div class="col-md-12 tahunrekam " style="display:none">

													<div class="input-group mb-3"> 
														<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tahun</span>
														<input type="text" class="form-control"  id="tahun_rekam" >

													</div> 
												</div>  

												<div class="col-md-12 nama" style="display:none"> 
													<div class="input-group mb-3"> 
														<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Nama</span>
														<select class="form-control" id="nama_pasien" name="nama_pasien" >
															<option disabled="disabled" selected value="0"  style="background: #d3d4d6;" >----</option>	
															<?php foreach ($pasien as $row) : ?> 
																<option value="<?php echo $row->kode_pasien  ?>"><?php echo $row->nama_pasien ?></option>  
															<?php endforeach ?>  
														</select> 
													</div> 
												</div>  
											</div> 

										</div>
										<div class="modal-footer">
											<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
											<button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporanrekam"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
										</div>


									</form>
								</div>
							</div>
						</div>
