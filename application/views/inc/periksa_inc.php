<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<style type="text/css">
			.labelkolom{
				background: #03b509;
				color :white;
			}
		</style>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<?php foreach ($periksa_inc as $row){ ?>
						<div class="card-header">     
							<div class="row">
								<div class="col-md-12">
									<img src="<?php echo base_url() ?>assets/img/user.png" style="border-radius: 50%" width="60px" height="60px">
									<H4 style="position: absolute; right: 0;top:0;margin-right: 30px;font-weight: bold;color: green">REKAM DATA PENGOBATAN</H4>
									<h6 style="position: absolute; right: 0; margin-top:-20px;margin-right: 30px"><?php echo ucwords($row->nama_pasien)." - ".$row->no_registrasi ?></h6>
									<!-- <h6 style="position: absolute; right: 0; margin-top:-1px;margin-right: 30px"><?php echo $row->telepon ?></h6> -->

									<hr>
									<h6  style="position: absolute; right: 0; margin-top:-10px;margin-right: 30px;font-weight: bold;">#
										<?php $tanggal=explode('-', $row->tanggal_berobat);
										$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
										echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?></h6>

									</div>						
								</div>
							</div> 

							<div class="card-body">  
								<!-- <form class="form-horizontal simpandata" id="myform" name="myform" method="post" action="<?php echo base_url()?>inc/simpan_inc"> -->
									<form class="form-horizontal simpandata"method="post" id="form1" name="form1">
										<div class="form-group row" style="background: #03b509">
											<div class="col-sm-12 float-sm-right">
												<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA PASIEN</b></h6>

											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-12 mt-3"> 
												<div class="form-group row"> 
													<input style="display: none;" type="text" class="form-control"  id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" >
													<input style="display: none;" type="text" class="form-control"  id="nama_pasien" name="nama_pasien" value="<?php echo $row->nama_pasien ?>" >
													<input style="display: none;" type="text" class="form-control"  id="no_registrasi" name="no_registrasi" value="<?php echo $row->no_registrasi ?>" >
													<input style="display: none;" type="date" class="form-control"  id="tanggal_berobat" name="tanggal_berobat" value="<?php $tanggal=explode('-', $row->tanggal_berobat);
													$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
													echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?>" > 

													<div class="input-group col-md-3 mb-3" style="display: none;">
														<div class="input-group-prepend">
															<span class="input-group-text labelkolom">Tanggal</span>
														</div>
														<input type="text" class="form-control"  id="tanggal_berobat" name="tanggal_berobat" value="<?php echo $row->tanggal_berobat ?>">
													</div>


													<div class="col-md-4 mb-3"> 
														<span class="input-group-text labelkolom"> KODE REKAM inc</span> 
														<input type="text" class="form-control"  id="kode_inc" name="kode_inc" value="<?php echo $row->kode_inc ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()">
													</div>   

													<div class=" col-md-2 mb-3"> 
														<span class="input-group-text labelkolom"> Kepala Keluarga</span> 
														<input type="text" class="form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" >
													</div> 

													<div class="col-md-2 mb-3"> 
														<span class="input-group-text labelkolom">Tempat Lahir</span> 
														<input type="date('Y-m-d')" class="form-control"  id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" >
													</div>

													<div class="col-md-2 mb-3"> 
														<span class="input-group-text labelkolom">Tanggal Lahir</span> 
														<input type="date('Y-m-d')" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()">
													</div>

													<div class="col-md-2 mb-3"> 
														<span class="input-group-text labelkolom">No.Telepon</span> 
														<input type="text" class="form-control"  id="telepon" name="telepon" value="<?php echo $row->telepon ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()">
													</div>


													<div class="col-md-6 mb-3"> 
														<span class="input-group-text labelkolom">Alamat Lengkap</span> 
														<textarea type="text" class="form-control"  id="alamat" name="alamat" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" ><?php echo $row->alamat ?></textarea> 
													</div> 

													<div class="col-md-4 mb-3"> 
														<span class="input-group-text labelkolom">Status Pasien</span> 
														<textarea type="text" class="form-control"  id="status_pasien" name="status_pasien" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" > <?php echo $row->status_pasien ?></textarea>
													</div>

													<div class="col-md-2 mb-3"> 
														<span class="input-group-text labelkolom">Umur</span> 
														<textarea type="text" class="form-control" id="umur" name="umur" style="border-color: #03b509; background: #ffffff;text-align: center;"  onclick="this.blur()" ><?php echo $row->umur ?></textarea>
													</div>

												</div> 

											</div>  
										</div>
										<br>
										<div class="form-group row" style="background: #03b509">

											<div class="col-sm-12 float-sm-right">
												<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>REKAM INC</b></h6>

											</div> 

										</div>
										<br>

										<div class="row">
											<div class=" col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Suhu</span> 
												<input type="text" class="inputatas form-control"  id="suhu" name="suhu" required="required" value="<?php echo $row->suhu ?>">
											</div>


											<div class=" col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Tensi Darah</span>
												<input type="text" class="inputatas form-control"  id="tensi_darah" name="tensi_darah" required="required" value="<?php echo $row->tensi_darah ?>">
											</div>

											<div class=" col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Saturasi</span> 
												<input  type="text" class="inputatas form-control"  id="saturasi" name="saturasi" required="required" value="<?php echo $row->saturasi ?>" >
											</div>



											<div class=" col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Frequansi Pernapasan</span> 
												<input type="text" class="inputatas form-control"  id="pernapasan" name="pernapasan" required="required" value="<?php echo $row->pernapasan ?>">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Frequansi Nadi</span> 
												<input type="text" class="inputatas form-control"  id="nadi" name="nadi" required="required" value="<?php echo $row->nadi ?>">
											</div>

											<div class="col-md-3 mb-3">
												<span class="input-group-text labelkolom">Berat Badan</span>
												<input type="text" class="form-control"  id="bb" name="bb"  style="border-color: #03b509; background: #ffffff"  value="<?php echo $row->bb ?>">
											</div>

											<div class="col-md-3 mb-3">
												<span class="input-group-text labelkolom">Tinggi Badan</span>
												<input type="text" class="form-control"  id="tb" name="tb"  style="border-color: #03b509; background: #ffffff"  value="<?php echo $row->tb ?>">
											</div>
										</div>

										<br>
										<hr>

										<div class="col-md-12">
											<ul class="nav nav-pills nav-success w-100" id="pills-tab" role="tablist">
												<li class="nav-item submenu w-25 text-center fw-bold">
													<a class="nav-link active show" id="pills-subjektif-tab" data-toggle="pill" href="#pills-subjektif" role="tab" aria-controls="pills-subjektif" aria-selected="true">SUBJEKTIF</a>
												</li>
												<li class="nav-item submenu w-25 text-center fw-bold">
													<a class="nav-link" id="pills-objektif-tab" data-toggle="pill" href="#pills-objektif" role="tab" aria-controls="pills-objektif" aria-selected="false">OBJEKTIF</a>
												</li>
												<li class="nav-item submenu w-25 text-center fw-bold">
													<a class="nav-link" id="pills-assesment-tab" data-toggle="pill" href="#pills-assesment" role="tab" aria-controls="pills-assesment" aria-selected="false">ASSESMENT</a>
												</li>
												<li class="nav-item submenu w-25 text-center fw-bold">
													<a class="nav-link" id="pills-planning-tab" data-toggle="pill" href="#pills-planning" role="tab" aria-controls="pills-planning" aria-selected="false">PLANNING</a>
												</li>
											</ul>
											<div class="tab-content mt-2 mb-3" id="pills-tabContent">
												<div class="tab-pane fade active show" id="pills-subjektif" role="tabpanel" aria-labelledby="pills-subjektif-tab">
													<div class="row">
														<div class="col-3">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA I</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala1" name="tanggal_subjektif_kala1">
																		</div>
																		<div class="col-md-12">
																			<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																			<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala1" name="keterangan_pasien_subjektif_kala1" rows="10">Ibu mengeluh merasakan mules-mules dan sudah keluar lendir darah</textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-3">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA II</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala2" name="tanggal_subjektif_kala2">
																		</div>
																		<div class="col-md-12">
																			<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																			<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala2" name="keterangan_pasien_subjektif_kala2" rows="10">Ibu mengatakan sudah ada rasa dorongan ingin mengedan</textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-3">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA III</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala3" name="tanggal_subjektif_kala3">
																		</div>
																		<div class="col-md-12">
																			<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																			<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala3" name="keterangan_pasien_subjektif_kala3" rows="10">Ibu mengatakan perut masih terasa mules</textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-3">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA IV</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala4" name="tanggal_subjektif_kala4">
																		</div>
																		<div class="col-md-12">
																			<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																			<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala4" name="keterangan_pasien_subjektif_kala4" rows="10">Ibu tampak lega, ibu merasa lelah, haus, dan sedikit mengantuk serta masih terasa mules</textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="pills-objektif" role="tabpanel" aria-labelledby="pills-objektif-tab">
													<div class="row">
														<div class="col-12">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA I</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala1" name="tanggal_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Keadaan Umum</span> 
																			<input type="text" class="form-control"  id="keadaan_umum_objektif_kala1" name="keadaan_umum_objektif_kala1">
																		</div>
																		<div class="col-md-3  mb-3">
																			<span class="input-group-text labelkolom">Kesadaran</span> 
																			<input type="text" class="form-control"  id="kesadaran_objektif_kala1" name="kesadaran_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Keadaan Emosional</span> 
																			<input type="text" class="form-control"  id="keadaan_emosional_objektif_kala1" name="keadaan_emosional_objektif_kala1">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text bg-dark" style="color: white">TTV</span> 
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">TD</span> 
																			<input type="text" class="form-control"  id="td_objektif_kala1" name="td_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Nadi</span> 
																			<input type="text" class="form-control"  id="nadi_objektif_kala1" name="nadi_objektif_kala1">
																		</div>
																		<div class="col-md-2 mb-3">
																			<span class="input-group-text labelkolom">Respirasi</span> 
																			<input type="text" class="form-control"  id="respirasi_objektif_kala1" name="respirasi_objektif_kala1">
																		</div>
																		<div class="col-md-2 mb-3">
																			<span class="input-group-text labelkolom">Suhu</span> 
																			<input type="text" class="form-control"  id="suhu_objektif_kala1" name="suhu_objektif_kala1">
																		</div>
																		<div class="col-md-2 mb-3">
																			<span class="input-group-text labelkolom">TFU</span> 
																			<input type="text" class="form-control"  id="tfu_objektif_kala1" name="tfu_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">leopold I</span> 
																			<input type="text" class="form-control"  id="leopold1_objektif_kala1" name="leopold1_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">leopold II</span> 
																			<input type="text" class="form-control"  id="leopold2_objektif_kala1" name="leopold2_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">leopold III</span> 
																			<input type="text" class="form-control"  id="leopold3_objektif_kala1" name="leopold3_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">leopold IV</span> 
																			<input type="text" class="form-control"  id="leopold4_objektif_kala1" name="leopold4_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Penurunan</span> 
																			<input type="text" class="form-control"  id="penurunan_objektif_kala1" name="penurunan_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">DJJ</span> 
																			<input type="text" class="form-control"  id="djj_objektif_kala1" name="djj_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">HIS</span> 
																			<input type="text" class="form-control"  id="his_objektif_kala1" name="his_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">TJB</span> 
																			<input type="text" class="form-control"  id="tjb_objektif_kala1" name="tjb_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">V / v</span> 
																			<input type="text" class="form-control"  id="vv_objektif_kala1" name="vv_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Pembukaan</span> 
																			<input type="text" class="form-control"  id="pembukaan_objektif_kala1" name="pembukaan_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Portio</span> 
																			<input type="text" class="form-control"  id="portio_objektif_kala1" name="portio_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Ketuban</span> 
																			<input type="text" class="form-control"  id="ketuban_objektif_kala1" name="ketuban_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Plasenta</span> 
																			<input type="text" class="form-control"  id="plasenta_objektif_kala1" name="plasenta_objektif_kala1">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Hodge</span> 
																			<input type="text" class="form-control"  id="hodge_objektif_kala1" name="hodge_objektif_kala1">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Ubun-Ubun</span> 
																			<input type="text" class="form-control"  id="ubun_ubun_objektif_kala1" name="ubun_ubun_objektif_kala1">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA II</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala2" name="tanggal_objektif_kala2">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">V / v</span> 
																			<input type="text" class="form-control"  id="vv_objektif_kala2" name="vv_objektif_kala2">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Pembukaan</span> 
																			<input type="text" class="form-control"  id="pembukaan_objektif_kala2" name="pembukaan_objektif_kala2">
																		</div>
																		<div class="col-md-3 mb-3">
																			<span class="input-group-text labelkolom">Ketuban</span> 
																			<input type="text" class="form-control"  id="ketuban_objektif_kala2" name="ketuban_objektif_kala2">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Ubun-Ubun</span> 
																			<input type="text" class="form-control"  id="ubun_ubun_objektif_kala2" name="ubun_ubun_objektif_kala2">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Portio</span> 
																			<input type="text" class="form-control"  id="portio_objektif_kala2" name="portio_objektif_kala2">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA III</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala3" name="tanggal_objektif_kala3">
																		</div>
																		<div class="col-md-6  mb-3">
																			<span class="input-group-text labelkolom">Kesadaran</span> 
																			<input type="text" class="form-control"  id="kesadaran_objektif_kala3" name="kesadaran_objektif_kala3">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Keadaan Umum</span> 
																			<input type="text" class="form-control"  id="keadaan_umum_objektif_kala3" name="keadaan_umum_objektif_kala3">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text bg-dark" style="color: white">TTV</span> 
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">TD</span> 
																			<input type="text" class="form-control"  id="td_objektif_kala3" name="td_objektif_kala3">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Nadi</span> 
																			<input type="text" class="form-control"  id="nadi_objektif_kala3" name="nadi_objektif_kala3">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Respirasi</span> 
																			<input type="text" class="form-control"  id="respirasi_objektif_kala3" name="respirasi_objektif_kala3">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Suhu</span> 
																			<input type="text" class="form-control"  id="suhu_objektif_kala3" name="suhu_objektif_kala3">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">TFU</span> 
																			<input type="text" class="form-control"  id="tfu_objektif_kala3" name="tfu_objektif_kala3">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Kandung Kemih</span> 
																			<input type="text" class="form-control"  id="kandung_kemih_objektif_kala3" name="kandung_kemih_objektif_kala3">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Kontraksi Uterus</span> 
																			<input type="text" class="form-control"  id="kontraksi_uterus_objektif_kala3" name="kontraksi_uterus_objektif_kala3">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Kehamilan Ganda</span> 
																			<input type="text" class="form-control"  id="kehamilan_ganda_objektif_kala3" name="kehamilan_ganda_objektif_kala3">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Semburan Darah</span> 
																			<input type="text" class="form-control"  id="semburan_darah_objektif_kala3" name="semburan_darah_objektif_kala3">
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Tali Pusat Memanjang</span> 
																			<input type="text" class="form-control"  id="tali_pusat_memanjang_objektif_kala3" name="tali_pusat_memanjang_objektif_kala3">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA IV</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala4" name="tanggal_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Keadaan Umum</span> 
																			<input type="text" class="form-control"  id="keadaan_umum_objektif_kala4" name="keadaan_umum_objektif_kala4">
																		</div>
																		<div class="col-md-4  mb-3">
																			<span class="input-group-text labelkolom">Kesadaran</span> 
																			<input type="text" class="form-control"  id="kesadaran_objektif_kala4" name="kesadaran_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Keadaan Emosional</span> 
																			<input type="text" class="form-control"  id="keadaan_emosional_objektif_kala4" name="keadaan_emosional_objektif_kala4">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text bg-dark" style="color: white">TTV</span> 
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">TD</span> 
																			<input type="text" class="form-control"  id="td_objektif_kala4" name="td_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Nadi</span> 
																			<input type="text" class="form-control"  id="nadi_objektif_kala4" name="nadi_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Respirasi</span> 
																			<input type="text" class="form-control"  id="respirasi_objektif_kala4" name="respirasi_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Suhu</span> 
																			<input type="text" class="form-control"  id="suhu_objektif_kala4" name="suhu_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">TFU</span> 
																			<input type="text" class="form-control"  id="tfu_objektif_kala4" name="tfu_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Kontraksi</span> 
																			<input type="text" class="form-control"  id="kontraksi_objektif_kala4" name="kontraksi_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Kandung Kemih</span> 
																			<input type="text" class="form-control"  id="kandung_kemih_objektif_kala4" name="kandung_kemih_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Perdarahan</span> 
																			<input type="text" class="form-control"  id="perdarahan_objektif_kala4" name="perdarahan_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Perineum</span> 
																			<input type="text" class="form-control"  id="perineum_objektif_kala4" name="perineum_objektif_kala4">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">Robekan</span> 
																			<input type="text" class="form-control"  id="robekan_objektif_kala4" name="robekan_objektif_kala4">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="pills-assesment" role="tabpanel" aria-labelledby="pills-assesment-tab">
													<div class="row">
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA I</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala1" name="tanggal_assesment_kala1">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																			<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala1" name="keterangan_assesment_assesment_kala1" rows="3">G P A gravida mgg &#013;&#010;parturient aterm dg kala 1 fase aktif</textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Masalah</span> 
																			<textarea type="text" class="form-control"  id="masalah_assesment_kala1" name="masalah_assesment_kala1" rows="3"></textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Kebutuhan</span> 
																			<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala1" name="kebutuhan_assesment_kala1" rows="3"></textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA II</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala2" name="tanggal_assesment_kala2">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																			<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala2" name="keterangan_assesment_assesment_kala2" rows="3">G P A gravida mgg &#013;&#010;parturient aterm dg kala 2</textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Masalah</span> 
																			<textarea type="text" class="form-control"  id="masalah_assesment_kala2" name="masalah_assesment_kala2" rows="3"></textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Kebutuhan</span> 
																			<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala2" name="kebutuhan_assesment_kala2" rows="3"></textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA III</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala3" name="tanggal_assesment_kala3">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																			<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala3" name="keterangan_assesment_assesment_kala3" rows="3">P A Kala 3</textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Masalah</span> 
																			<textarea type="text" class="form-control"  id="masalah_assesment_kala3" name="masalah_assesment_kala3" rows="3"></textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Kebutuhan</span> 
																			<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala3" name="kebutuhan_assesment_kala3" rows="3"></textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA IV</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala4" name="tanggal_assesment_kala4">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																			<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala4" name="keterangan_assesment_assesment_kala4" rows="3">P A Kala 4</textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Masalah</span> 
																			<textarea type="text" class="form-control"  id="masalah_assesment_kala4" name="masalah_assesment_kala4" rows="3"></textarea> 
																		</div>
																		<div class="col-md-6 mb-3">
																			<span class="input-group-text labelkolom">Kebutuhan</span> 
																			<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala4" name="kebutuhan_assesment_kala4" rows="3"></textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="pills-planning" role="tabpanel" aria-labelledby="pills-planning-tab">
													<div class="row">
														<div class="col-12">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA I</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_planning_kala1" name="tanggal_planning_kala1">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Planning</span> 
																			<textarea type="text" class="form-control"  id="keterangan_planning_kala1" name="keterangan_planning_kala1" rows="7">1. Memberitahu ibu hasil pemeriksaan keadaan ibu dan janin&#013;&#010;2. Mengobservasi kemajuan kala I&#013;&#010;3. Memantau kesehatan janin&#013;&#010;4. Memberikan asuhan sayang ibu</textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA II</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_planning_kala2" name="tanggal_planning_kala2">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Planning</span> 
																			<textarea type="text" class="form-control"  id="keterangan_planning_kala2" name="keterangan_planning_kala2" rows="10">1. Memberitahukan hasil pemeriksaan dan melakukan amniotomi&#013;&#010;2. Mengobservasi DJJ dan  His&#013;&#010;3. Mengajarkan ibu menedan yang baik dan benar&#013;&#010;4. Bila tidak ada mules ibu dianjurkan untuk istirahat&#013;&#010;5. Mendekatkan partus set&#013;&#010;6. Menolong persalinan pervaginam&#013;&#010;7. Bayi lahir langsung menangis spontan</textarea> 
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">JK</span> 
																			<input type="text" class="form-control"  id="jk_planning_kala2" name="jk_planning_kala2">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">BB</span> 
																			<input type="text" class="form-control"  id="bb_planning_kala2" name="bb_planning_kala2">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">PB</span> 
																			<input type="text" class="form-control"  id="pb_planning_kala2" name="pb_planning_kala2">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">LK</span> 
																			<input type="text" class="form-control"  id="lk_planning_kala2" name="lk_planning_kala2">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">LD</span> 
																			<input type="text" class="form-control"  id="ld_planning_kala2" name="ld_planning_kala2">
																		</div>
																		<div class="col-md-4 mb-3">
																			<span class="input-group-text labelkolom">LL</span> 
																			<input type="text" class="form-control"  id="ll_planning_kala2" name="ll_planning_kala2">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-6">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA III</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_planning_kala3" name="tanggal_planning_kala3">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Planning</span> 
																			<textarea type="text" class="form-control"  id="keterangan_planning_kala3" name="keterangan_planning_kala3" rows="10">1. Memberitahukan pada ibu dan keluarga bahwa bayi telah lahir&#013;&#010;2. Mengobservasi kontraksi uterus&#013;&#010;3. Mengecek TFU&#013;&#010;4. Melakukan managemen aktif Kala III&#013;&#010;5. Suntik Oxytosin 10IU&#013;&#010;6. Melihat tanda-tanda pelepasan plasenta yaitu adanya semburan darah dan tali pusat memanjang&#013;&#010;7. Melakukan PTT (Peregangan Tali Pusat Terkendali)&#013;&#010;8. Plasenta lahir lengkap  Pukul :</textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-12">		
															<div class="card">
																<div class="card-header" style="background: #f27e03">
																	<h5 style="color:white"><b>KALA IV</b></h5>
																</div>
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12 mb-3 ">
																			<span class="input-group-text labelkolom">Tanggal & Jam</span> 
																			<input type="datetime-local" class="form-control"  id="tanggal_planning_kala4" name="tanggal_planning_kala4">
																		</div>
																		<div class="col-md-12 mb-3">
																			<span class="input-group-text labelkolom">Keterangan Planning</span> 
																			<textarea type="text" class="form-control"  id="keterangan_planning_kala4" name="keterangan_planning_kala4" rows="7">1. Memberitahu hasil pemeriksaan&#013;&#010;2. Melakukan tindakan eksplore untuk mengecek  sisa plasenta&#013;&#010;3. melakukan masase fundus uteri&#013;&#010;4. mengecek perdarahan&#013;&#010;5. mengajarkan ibu masase fundus uteri&#013;&#010;6. membersihkan ibu&#013;&#010;7. rawat gabung</textarea> 
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>

										<div class="col-md-12x mt-3"> 
											<div class="form-group row" style="background: #03b509">
												<div class="col-sm-12 float-sm-right">
													<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>TERAPI / PEMBERIAN OBAT</b></h6> 
												</div>  
											</div>
											<br>
											<div class="card-body" style="background: #f2f2f5; border-color: #ff1201">
												<span>Keterangan</span> <br>
												<span style="color:#ff1201 ">* Untuk Penulisan aturan pakai harus di sambung dan tidak boleh ada spasi </span><br>
												<span style="color:#ff1201 ">* Contoh penulisan Dosis Obat : 1x3</span>
											</div>
											<br>
											<div class="row" id="obat1" style="border: 1px solid #e4e4e4;padding-top: 10px"> 
												<div class="input-group mb-3 col-md-8 listobat">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span>
													</div> 

													<select type="text" data="" class="form-control " id="nama_obat1" name="nama_obat[]" onchange="cekobat(1)" style=" border-color: #03b509; background: #ffffff;width: 75%">
														<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>
														<?php foreach ($obat as $data) { ?>
															<?php if ($data->total_stok!=0): ?> 
																<option data-stok="<?php echo $data->total_stok; ?>" data-keterangan="<?php echo $data->keterangan ?>" data-harga="<?php echo $data->harga_jual ?>" data-satuan="<?php echo $data->satuan_obat ?>" value="<?php echo $data->kode_obat ?>">
																	<?php $cek = str_replace("'", '&apos;', $data->nama_obat);
																	if ($data->keterangan!='') {
																		echo $cek." || ". $data->keterangan;
																	}else{
																		echo $cek;
																	}
																?></option>
															}
														<?php endif ?>

													<?php } ?> 
												</select>  

												<div class="input-group-prepend">
													<span class="input-group-text" id="satuan_obat1" name="satuan_obat[]" style="background:#03b509; color: white;display: none "></span>
													<input type="hidden" class="form-control" id="satuan1" name="satuan[]" >
												</div>

											</div>

											<div class="input-group mb-3 col-md-4">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>
												</div>
												<input type="text" class="form-control" id="qty1" name="qty[]"  onkeypress="return isNumberKey(event)" onkeyup="hitungsubtotal(1)" placeholder="Qty"  style="border-color: #03b509; background: #ffffff">  

											</div>  



											<div class="input-group mb-3 col-md-12">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
												</div>
												<input type="text" class="form-control" id="takaran1" name="takaran[]" placeholder="Dosis"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff">  
												<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>
												<select type="text" class="form-control" id="hari1" name="hari[]" placeholder="Hari"  width="5px"  style="border-color: #03b509; background: #ffffff">  
													<option value="0" selected disabled>Pilih Racik</option> 
													<option value="Puyer">Puyer</option>
													<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>
													<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>
													<option value="Puyer_15_bungkus">Puyer_15_bungkus</option> 
													<option value="NonPuyer">NonPuyer</option>
												</select> 
												<select class="form-control" id="aturan_pakai1" name="aturan_pakai[]" style="border-color: #03b509; background: #ffffff" >
													<option value="0" selected disabled>Aturan</option>

													<option value="Sebelum Makan">Sebelum Makan</option>
													<option value="Sesudah Makan">Sesudah Makan</option>
													<option value="Saat Makan">Saat Makan</option>
													<option value="Di Oles Tipis-Tipis">Di Oles Tipis-Tipis</option>
													<option value="Tetes">Tetes</option>
													<option value="Satu Kali Pakai">Satu Kali Pakai</option> 
													<option value="Pcs">Pcs</option>
												</select> 

											</div>



											<div class="input-group mb-3 col-md-2" style="display: none">
												<div class="input-group-prepend"> 
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Stok</span> 
												</div>
												<input type="text" class="form-control" id="total_stok1" name="total_stok[]" value="0" readonly>	

											</div>  





											<div class="input-group mb-3 col-md-2" style="display: none">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Harga</span>
												</div> 
												<input type="text" class="form-control" id="harga_jual1" name="harga_jual[]" readonly >
											</div> 



											<div class="input-group mb-3 keterangan_obat1 col-md-12" style="display: none;">
												<span class="input-group-text" id="keterangan_obat1" style="background:#e27300; color: white;"></span>

											</div>  

											<div class="input-group mb-3 col-md-2" style="display: none;">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>
												</div>
												<input type="text" class="form-control" id="subtotal1" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly">  
											</div>  



											<div class="input-group mb-3 col-md-2" id="btn-groupobat1">
												<button id="tambahobat1" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahobat(1)">+</button>
												<button id="hapusobat1" type="button" class="btn btn-sm btn-danger" onclick="hapusobat(1)">-</button>
											</div>

										</div> 
										<br>


										<div class="row">
											<div class="col-md-4 mb-3"> </div>
											<div class="col-md-4 mb-3"> 
												<span class="input-group-text labelkolom">Jasa Dokter</span> 
												<input type="text" class="form-control" name="tarif_dokter" id="tarif_dokter" value="<?php echo number_format($this->session->tarif_dokter, 0, ',', '.') ?>" disabled>
											</div>

											<div class="col-md-4 mb-3"> 
												<span class="input-group-text labelkolom">Total Akhir</span> 
												<input type="text" class="form-control" name="total_akhir[]" id="total_akhir" style="text-align: right;font-weight: bold;font-size: 18px;" disabled>
											</div>

										</div>




										<div class="row mb-6"> 
											<div class="col-md-12" style="margin-top: 70px;">

												<a href="<?php echo site_url('inc') ?>" class="btn btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
												<button id="simpan_data_inc" type="submit" class="btn btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> SIMPAN DATA REKAM</button> 
											</div> 
										</div>
									</div> 

									<br>
									<br>
									<br>


									<hr> 

								</div>
							</form>
						</div>
					</div>
				</div>


			</div> 


		<?php } ?>    

	</div>




	<div class="modal fade" id="modal_lihat" tabindex="-1" role="dialog" aria-labelledby="modal_lihat_stok" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" > 
				<div class="modal-header" style="background: #31ce36">
					<h5 id="modal_lihat_stok" style="color: white;font-weight:bold;font-family: Century Gothic"><i class="fas fa-pills mr-2"></i></i>Data Stok Obat</h5>
				</div> 

				<div class="modal-body"> 
					<table  id="example1" class="table table-bordered table-sm " cellspacing="0" width="100%">
						<thead>
							<tr style="background: #5f7cff ;text-align: center; color:white">
								<!-- <td>Kode</td> -->
								<th>No</th>                    
								<th >Nama Obat</th> 
								<th >Stok Obat</th> 
								<th >Status Obat</th>  
							</tr>
						</thead>
						<tbody id="show_data">

						</tbody>

					</table>
				</div>
			</div>
		</div>  -->

		<script type="text/javascript">

			$(document).ready(function(){
				$('#nama_obat1').select2({
					placeholder:" -- Pilih Nama Obat --",
					allowClear: true,
				})
				hitungtotalakhir();
			})



			$('#simpan_data_inc').on('click',function(){
				let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');

							// var tanggal_periksa = $('#tanggal_periksa').val(); 


							// if (tanggal_periksa == "") {
							// 	alert("Tanggal Periksa Belum Terisi");
							// 	$('#tanggal_periksa').focus();
							// 	return false;
							// }


							var jumlah_obat = $('.listobat').length;
							for (var i = 1; i <= jumlah_obat; i++) { 
								var nama_obat = $('#nama_obat'+i).val();
								var qty = $('#qty'+i).val();
								var takaran = $('#takaran'+i).val();
								var hari = $('#hari'+i).val();
								var aturan_pakai = $('#aturan_pakai'+i).val();



							}
							let link = '<?php echo base_url()?>inc/simpan_inc/'+total_akhir;
							$('.simpandata').attr('action',link);
							$('.simpandata').submit(); 


						});

			function cekobat(id){
				let nama_obat = $('#nama_obat'+id +' option:selected').val();
								// return false;
					// let cek =0;
					// $('[name^="nama_obat"]').each(function(){
					// 	let kode = $(this).attr('id');
					// 	let obat = $('#'+kode).val();
					// 	// if (obat==nama_obat) {
					// 	// 	cek+=1;								
					// 	// }
					// });
					// return false

					// if (parseFloat(cek) > 1) {
					// 	alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
					// 	$('#nama_obat'+id).val(0);
					// 	reset(id);
					// 	hitungtotalakhir();	
					// 	return false;
					// }

					let satuan_obat = $('#nama_obat'+id+' option:selected').data('satuan');
					let harga_jual = $('#nama_obat'+id+' option:selected').data('harga');
					let total_stok = $('#nama_obat'+id+' option:selected').data('stok');
					let keterangan_obat = $('#nama_obat'+id+' option:selected').data('keterangan');
					if (validasi_stok(id)==false) {
						return false;
					};

					$('#keterangan_obat'+id).html(keterangan_obat);
					if (keterangan_obat!='') {
						$('.keterangan_obat'+id).css('display','block');
					}else{
						$('.keterangan_obat'+id).css('display','none');
					}

					$('#satuan_obat'+id).html(satuan_obat);
					$('#satuan'+id).val(satuan_obat);
					$('#satuan_obat'+id).css('display','inline-block');
					$('#total_stok'+id).val(total_stok);
					SeparatorRibuan(harga_jual.toString(),'harga_jual'+id);
					hitungsubtotal(id);

					return false;
				}
				function validasi_stok(id){
					let total_stok = parseFloat($('#nama_obat'+id+' option:selected').data('stok'));
					let qty = parseFloat($('#qty'+id).val());
					if (total_stok<qty) {
						alert('Stok Obat tidak Mencukupi!');
						$('#qty'+id).val('');
						$('#subtotal'+id).val(0);
						hitungtotalakhir();

						return false; 
					} 
					if (total_stok<=0) {
						alert('Stok Obat Kosong, Silahkan Pilih Obat Lain!');
						$('#qty'+id).val('');
						$('#nama_obat'+id).val(0);
						$('#subtotal'+id).val(0);
						hitungtotalakhir();
						return false;
					}
				}

				function hitungsubtotal(id){
					if (validasi_stok(id)==false) {
						return false;
					};
					let harga_jual = $('#harga_jual'+id).val().toString().replace(/\./g,'')!=""?$('#harga_jual'+id).val().toString().replace(/\./g,''):0;
					let qty = $('#qty'+id).val().toString().replace(/\./g,'')!=""?$('#qty'+id).val().toString().replace(/\./g,''):0;
					let total = parseFloat(harga_jual)*parseFloat(qty);
					SeparatorRibuan(total.toString(),'subtotal'+id);
					hitungtotalakhir();
				}

				function hitungtotalakhir(){
					let tarif_dokter = $('#tarif_dokter').val().toString().replace(/\./g,'');
					let total=0;
					$('[name^="nama_obat"]').each(function(){
						let id = $(this).attr('id').replace('nama_obat','');
						let sub = $('#subtotal'+id).val();
						if (sub!='' && sub>0) {
							let subtotal = sub.toString().replace(/\./g,'');
							total+=parseFloat(subtotal);
						}
					});
					let total_akhir=parseFloat(total) + parseFloat(tarif_dokter);
					SeparatorRibuan(total_akhir.toString(),'total_akhir');
				} 

				tampil_data();

				function tampil_data(){
					$.ajax({
						type  : 'GET',
						url   : '<?php echo base_url()?>satuan_obat/tampil_satuan',
						dataType : 'json',
						success : function(data){
							var html = '';
							var i;
							var no=1;
							for(i=0; i<data.length; i++){


								html += '<tr>'+
								'<td style="text-align:center">'+no+'</td>'+                      
								'<td style="text-align:center">'+data[i].nama_obat+'</td>'+   
								'<td style="text-align:center">'+data[i].total_stok+'</td>'+  
								'<td style="text-align:center">'+data[i].status_obat+'</td>'+  


								'</td>'+ 

								'</div></tr>';
								no++;

							}
							$('#show_data').html(html);

								// set();

							}

						});
				}


				function reset(kode_baru){
					$('#nama_obat'+kode_baru).val(0);
					$('#satuan_obat'+kode_baru).html('');
					$('#satuan_obat'+kode_baru).css('display','none');
					$('#total_stok'+kode_baru).val(0);
					$('#qty'+kode_baru).val(0);
					$('#harga_jual'+kode_baru).val(0);
					$('#takaran'+kode_baru).val('');
					$('#hari'+kode_baru).val('');
					$('#aturan_pakai'+kode_baru).val(0);
					$('#subtotal'+kode_baru).val(0);
				}



				function hapusobat(kode_baru){
					let kode = parseFloat(kode_baru)-1;


					var idbtn = $('#btn-groupobat'+kode);
					if (idbtn!=null) {
						$('#btn-groupobat'+kode).css('display','');
					} 
					$('#obat'+kode_baru).remove();
					hitungtotalakhir();
				}

				function tambahobat(kode) {
					var kode_baru = parseFloat(kode)+1;
					let option = $('#nama_obat'+kode).html();
					if ($('#nama_obat'+kode).val()==null) {
						alert('Silahkan Masukkan Nama Obat yang Kosong!');
						$('#nama_obat'+kode).focus();
						return false;
					}
					// else{
					// 	if ($('#qty'+kode).val()=='') {
					// 		alert('Silahkan Masukkan Qty yang kosong!');
					// 		$('#qty'+kode).focus();
					// 		return false;
					// 	}

					// 	// if ($('#takaran'+kode).val()=='') {
					// 	// 	alert('Silahkan Masukkan Dosis yang kosong!');
					// 	// 	$('#takaran'+kode).focus();
					// 	// 	return false;
					// 	// }

					// 	// if ($('#hari'+kode).val()=='') {
					// 	// 	alert('Silahkan Masukkan hari yang kosong!');
					// 	// 	$('#hari'+kode).focus();
					// 	// 	return false;
					// 	// }


					// 	if ($('#aturan_pakai'+kode).val()==null) {
					// 		alert('Silahkan Pilih Aturan Pakai yang kosong!');
					// 		$('#aturan_pakai'+kode).focus();
					// 		return false;
					// 	}
					// }
					var html="";
					html+='<div class="row" id="obat'+kode_baru+'" style="border: 1px solid #e4e4e4;padding-top: 10px">'+ 
					'<div class="input-group mb-3 col-md-8 listobat">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span> </div> '+ 
					'<select type="text" style=" border-color: #03b509; background: #ffffff;width: 75%" data="" class="form-control " id="nama_obat'+kode_baru+'" name="nama_obat[]" onchange="cekobat('+kode_baru+')" style="background:#e8f0fe;">'+
					'<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>'+
					'<?php foreach ($obat as $data) { ?>'+
					'<?php if ($data->total_stok!=0) : ?>'+
					'<option data-stok="<?php echo $data->total_stok; ?>" data-keterangan="<?php echo $data->keterangan ?>" data-harga="<?php echo $data->harga_jual ?>" data-satuan="<?php echo $data->satuan_obat ?>" value="<?php echo $data->kode_obat ?>"><?php $cek = str_replace("'", '&apos;', $data->nama_obat);if ($data->keterangan!='') {echo $cek." || ". $data->keterangan;}else{echo $cek;}?></option>'+
					'<?php endif ?>'+
					'<?php } ?> </select> '+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="satuan_obat'+kode_baru+'" name="satuan_obat[]" style="background:#03b509; color: white;display: none "></span>'+
					'<input type="hidden" class="form-control" id="satuan'+kode_baru+'" name="satuan[]" >'+
					'</div></div>'+

					'<div class="input-group mb-3 col-md-4">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>'+
					'</div>'+
					'<input type="text" class="form-control" id="qty'+kode_baru+'" name="qty[]" onkeypress="return isNumberKey(event)" onkeyup="hitungsubtotal('+kode_baru+')" placeholder="Qty"  style="border-color: #03b509; background: #ffffff"> '+ 

					'</div>'+

					'<div class="input-group mb-3 col-md-12">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>'+
					'</div>'+
					'<input type="text" class="form-control" id="takaran'+kode_baru+'" name="takaran[]" placeholder="Dosis"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff">  '+
					'<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">X</span>'+
					'<select type="text" class="form-control" id="hari'+kode_baru+'" name="hari[]" placeholder="Hari"  width="5px"   style="border-color: #03b509; background: #ffffff"> '+
					' <option value="0" selected disabled>Pilih Racik</option>'+
					'<option value="Puyer">Puyer</option>'+
					'<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>'+
					'<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>'+
					'<option value="Puyer_15_bungkus">Puyer_15_bungkus</option>'+ 
					'<option value="NonPuyer">NonPuyer</option>'+
					'</select>'+

					'<select class="form-control" id="aturan_pakai'+kode_baru+'" name="aturan_pakai[]"  style="border-color: #03b509; background: #ffffff">'+
					'<option value="0" selected disabled>Aturan</option>'+
					'<option value="Sebelum Makan">Sebelum Makan</option>'+
					'<option value="Sesudah Makan">Sesudah Makan</option>'+
					'<option value="Saat Makan">Saat Makan</option>'+
					'<option value="Di Oles Tipis-Tipis">Di Oles Tipis-Tipis</option>'+
					'<option value="Tetes">Tetes</option>'+
					'<option value="Satu Kali Pakai">Satu Kali Pakai</option>'+ 
					'<option value="Pcs">Pcs</option>'+ 

					'</select> '+

					'</div>	'+  

					'<div class="input-group mb-3 col-md-2" style="display:none">'+
					'<div class="input-group-prepend"> '+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Stok</span> '+
					'</div>'+
					'<input type="text" class="form-control" id="total_stok'+kode_baru+'" name="total_stok[]" value="0" readonly>'+	

					'</div>'+	


					'<div class="input-group mb-3 col-md-2"  style="display:none">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Harga</span>'+
					'</div> '+
					'<input type="text" class="form-control" id="harga_jual'+kode_baru+'" name="harga_jual[]" readonly >'+
					'</div>  '+


					'<div class="input-group mb-3 keterangan_obat'+kode_baru+' col-md-12" style="display: none;">'+
					'<span class="input-group-text" id="keterangan_obat'+kode_baru+'" style="background:#e27300; color: white;"></span>'+
					'</div> '+

					
					'<div class="input-group mb-3 col-md-4" style="display:none">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>'+
					'</div>'+
					'<input type="text" class="form-control" id="subtotal'+kode_baru+'" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly">  '+
					'</div>  '+

					'<div class="col-md-2" id="btn-groupobat'+kode_baru+'">'+
					'<button id="tambahobat'+kode_baru+'" type="button" class="btn btn-sm btn-success mr-1" onclick="tambahobat('+kode_baru+')">+</button>'+
					'<button id="hapusobat'+kode_baru+'" type="button" class="btn btn-sm btn-danger" onclick="hapusobat('+kode_baru+')">-</button>'+
					'</div>'+ 
					'</div> ';
					$('#obat'+kode).after(html);
					$('#btn-groupobat'+kode).css('display','block');
					jadikanselect2();
				}
				function jadikanselect2(){
					let jumlah = $('.listobat').length;
					for (var i =1; i <=jumlah; i++) {
						$('#nama_obat'+i).select2(
						{
							placeholder:"Pilih Nama Obat",
							allowClear:true,
						});
					}
				}
				function SeparatorRibuan(bilangan,id){
					let angka = bilangan.replace(/\./g,'');
					let sisa 	= angka.length % 3;
					awalan 	= angka.substr(0, sisa);
					ribuan 	= angka.substr(sisa).match(/\d{3}/g);
					if (ribuan) {
						separator = sisa ? '.' : '';
						hasil = awalan + separator + ribuan.join('.');
						$('#'+id).val(hasil);


					}
				}




			</script>











