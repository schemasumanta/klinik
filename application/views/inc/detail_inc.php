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
					<?php foreach ($detail_inc as $row){ ?>
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
								<form class="form-horizontal updatedata" method="post" id="form1" name="form1">
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


									<div class="col-md-12 mb-3" > 
										<span class="input-group-text labelkolom">Tanggal Diperiksa</span> 
										<input type="date" class="form-control"  id="tanggal_periksa" name="tanggal_periksa"  value="<?php echo $row->tanggal_periksa ?>"   style="border-color: #03b509; background: #ffffff">
									</div>

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
																		<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala1" name="tanggal_subjektif_kala1" value="<?php echo $row->tanggal_subjektif_kala1."T".$row->jam_subjektif_kala1 ?>">
																	</div>
																	<div class="col-md-12">
																		<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																		<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala1" name="keterangan_pasien_subjektif_kala1" rows="10"><?php echo $row->keterangan_pasien_subjektif_kala1; ?></textarea> 
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
																		<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala2" name="tanggal_subjektif_kala2" value="<?php echo $row->tanggal_subjektif_kala2."T".$row->jam_subjektif_kala2 ?>">
																	</div>
																	<div class="col-md-12">
																		<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																		<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala2" name="keterangan_pasien_subjektif_kala2" rows="10"><?php echo $row->keterangan_pasien_subjektif_kala2; ?></textarea> 
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
																		<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala3" name="tanggal_subjektif_kala3" value="<?php echo $row->tanggal_subjektif_kala3."T".$row->jam_subjektif_kala3 ?>">
																	</div>
																	<div class="col-md-12">
																		<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																		<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala3" name="keterangan_pasien_subjektif_kala3" rows="10"><?php echo $row->keterangan_pasien_subjektif_kala3; ?></textarea> 
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
																		<input type="datetime-local" style="font-size:12px;font-weight:bold" class="form-control"  id="tanggal_subjektif_kala4" name="tanggal_subjektif_kala4" value="<?php echo $row->tanggal_subjektif_kala4."T".$row->jam_subjektif_kala4 ?>">
																	</div>
																	<div class="col-md-12">
																		<span class="input-group-text labelkolom">Keterangan Pasien</span> 
																		<textarea type="text" class="form-control"  id="keterangan_pasien_subjektif_kala4" name="keterangan_pasien_subjektif_kala4" rows="10"><?php echo $row->keterangan_pasien_subjektif_kala4; ?></textarea> 
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
																		<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala1" name="tanggal_objektif_kala1" value="<?php echo $row->tanggal_objektif_kala1."T".$row->jam_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Keadaan Umum</span> 
																		<input type="text" class="form-control"  id="keadaan_umum_objektif_kala1" name="keadaan_umum_objektif_kala1" value="<?php echo $row->keadaan_umum_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3  mb-3">
																		<span class="input-group-text labelkolom">Kesadaran</span> 
																		<input type="text" class="form-control"  id="kesadaran_objektif_kala1" name="kesadaran_objektif_kala1" value="<?php echo $row->kesadaran_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Keadaan Emosional</span> 
																		<input type="text" class="form-control"  id="keadaan_emosional_objektif_kala1" name="keadaan_emosional_objektif_kala1"  value="<?php echo $row->keadaan_emosional_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text bg-dark" style="color: white">TTV</span> 
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">TD</span> 
																		<input type="text" class="form-control"  id="td_objektif_kala1" name="td_objektif_kala1" value="<?php echo $row->td_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Nadi</span> 
																		<input type="text" class="form-control"  id="nadi_objektif_kala1" name="nadi_objektif_kala1"  value="<?php echo $row->nadi_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-2 mb-3">
																		<span class="input-group-text labelkolom">Respirasi</span> 
																		<input type="text" class="form-control"  id="respirasi_objektif_kala1" name="respirasi_objektif_kala1"  value="<?php echo $row->respirasi_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-2 mb-3">
																		<span class="input-group-text labelkolom">Suhu</span> 
																		<input type="text" class="form-control"  id="suhu_objektif_kala1" name="suhu_objektif_kala1"  value="<?php echo $row->suhu_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-2 mb-3">
																		<span class="input-group-text labelkolom">TFU</span> 
																		<input type="text" class="form-control"  id="tfu_objektif_kala1" name="tfu_objektif_kala1" value="<?php echo $row->tfu_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">leopold I</span> 
																		<input type="text" class="form-control"  id="leopold1_objektif_kala1" name="leopold1_objektif_kala1" value="<?php echo $row->leopold1_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">leopold II</span> 
																		<input type="text" class="form-control"  id="leopold2_objektif_kala1" name="leopold2_objektif_kala1" value="<?php echo $row->leopold2_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">leopold III</span> 
																		<input type="text" class="form-control"  id="leopold3_objektif_kala1" name="leopold3_objektif_kala1" value="<?php echo $row->leopold3_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">leopold IV</span> 
																		<input type="text" class="form-control"  id="leopold4_objektif_kala1" name="leopold4_objektif_kala1" value="<?php echo $row->leopold4_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Penurunan</span> 
																		<input type="text" class="form-control"  id="penurunan_objektif_kala1" name="penurunan_objektif_kala1" value="<?php echo $row->penurunan_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">DJJ</span> 
																		<input type="text" class="form-control"  id="djj_objektif_kala1" name="djj_objektif_kala1" value="<?php echo $row->djj_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">HIS</span> 
																		<input type="text" class="form-control"  id="his_objektif_kala1" name="his_objektif_kala1" value="<?php echo $row->his_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">TJB</span> 
																		<input type="text" class="form-control"  id="tjb_objektif_kala1" name="tjb_objektif_kala1" value="<?php echo $row->tjb_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">V / v</span> 
																		<input type="text" class="form-control"  id="vv_objektif_kala1" name="vv_objektif_kala1" value="<?php echo $row->vv_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Pembukaan</span> 
																		<input type="text" class="form-control"  id="pembukaan_objektif_kala1" name="pembukaan_objektif_kala1" value="<?php echo $row->pembukaan_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Portio</span> 
																		<input type="text" class="form-control"  id="portio_objektif_kala1" name="portio_objektif_kala1" value="<?php echo $row->portio_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Ketuban</span> 
																		<input type="text" class="form-control"  id="ketuban_objektif_kala1" name="ketuban_objektif_kala1" value="<?php echo $row->ketuban_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Plasenta</span> 
																		<input type="text" class="form-control"  id="plasenta_objektif_kala1" name="plasenta_objektif_kala1" value="<?php echo $row->plasenta_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Hodge</span> 
																		<input type="text" class="form-control"  id="hodge_objektif_kala1" name="hodge_objektif_kala1" value="<?php echo $row->hodge_objektif_kala1 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Ubun-Ubun</span> 
																		<input type="text" class="form-control"  id="ubun_ubun_objektif_kala1" name="ubun_ubun_objektif_kala1" value="<?php echo $row->ubun_ubun_objektif_kala1 ?>">
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
																		<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala2" name="tanggal_objektif_kala2" value="<?php echo $row->tanggal_objektif_kala2."T".$row->jam_objektif_kala2 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">V / v</span> 
																		<input type="text" class="form-control"  id="vv_objektif_kala2" name="vv_objektif_kala2" value="<?php echo $row->vv_objektif_kala2 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Pembukaan</span> 
																		<input type="text" class="form-control"  id="pembukaan_objektif_kala2" name="pembukaan_objektif_kala2" value="<?php echo $row->pembukaan_objektif_kala2 ?>">
																	</div>
																	<div class="col-md-3 mb-3">
																		<span class="input-group-text labelkolom">Ketuban</span> 
																		<input type="text" class="form-control"  id="ketuban_objektif_kala2" name="ketuban_objektif_kala2" value="<?php echo $row->ketuban_objektif_kala2 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Ubun-Ubun</span> 
																		<input type="text" class="form-control"  id="ubun_ubun_objektif_kala2" name="ubun_ubun_objektif_kala2" value="<?php echo $row->ubun_ubun_objektif_kala2 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Portio</span> 
																		<input type="text" class="form-control"  id="portio_objektif_kala2" name="portio_objektif_kala2" value="<?php echo $row->portio_objektif_kala2 ?>">
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
																		<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala3" name="tanggal_objektif_kala3"  value="<?php echo $row->tanggal_objektif_kala4."T".$row->jam_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-6  mb-3">
																		<span class="input-group-text labelkolom">Kesadaran</span> 
																		<input type="text" class="form-control"  id="kesadaran_objektif_kala3" name="kesadaran_objektif_kala3" value="<?php echo $row->kesadaran_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Keadaan Umum</span> 
																		<input type="text" class="form-control"  id="keadaan_umum_objektif_kala3" name="keadaan_umum_objektif_kala3" value="<?php echo $row->keadaan_umum_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text bg-dark" style="color: white">TTV</span> 
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">TD</span> 
																		<input type="text" class="form-control"  id="td_objektif_kala3" name="td_objektif_kala3" value="<?php echo $row->td_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Nadi</span> 
																		<input type="text" class="form-control"  id="nadi_objektif_kala3" name="nadi_objektif_kala3" value="<?php echo $row->nadi_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Respirasi</span> 
																		<input type="text" class="form-control"  id="respirasi_objektif_kala3" name="respirasi_objektif_kala3" value="<?php echo $row->respirasi_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Suhu</span> 
																		<input type="text" class="form-control"  id="suhu_objektif_kala3" name="suhu_objektif_kala3" value="<?php echo $row->suhu_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">TFU</span> 
																		<input type="text" class="form-control"  id="tfu_objektif_kala3" name="tfu_objektif_kala3" value="<?php echo $row->tfu_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Kandung Kemih</span> 
																		<input type="text" class="form-control"  id="kandung_kemih_objektif_kala3" name="kandung_kemih_objektif_kala3" value="<?php echo $row->kandung_kemih_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Kontraksi Uterus</span> 
																		<input type="text" class="form-control"  id="kontraksi_uterus_objektif_kala3" name="kontraksi_uterus_objektif_kala3" value="<?php echo $row->kontraksi_uterus_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Kehamilan Ganda</span> 
																		<input type="text" class="form-control"  id="kehamilan_ganda_objektif_kala3" name="kehamilan_ganda_objektif_kala3"value="<?php echo $row->kehamilan_ganda_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Semburan Darah</span> 
																		<input type="text" class="form-control"  id="semburan_darah_objektif_kala3" name="semburan_darah_objektif_kala3" value="<?php echo $row->semburan_darah_objektif_kala3 ?>">
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Tali Pusat Memanjang</span> 
																		<input type="text" class="form-control"  id="tali_pusat_memanjang_objektif_kala3" name="tali_pusat_memanjang_objektif_kala3" value="<?php echo $row->tali_pusat_memanjang_objektif_kala3 ?>">
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
																		<input type="datetime-local" class="form-control"  id="tanggal_objektif_kala4" name="tanggal_objektif_kala4"  value="<?php echo $row->tanggal_objektif_kala4."T".$row->jam_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Keadaan Umum</span> 
																		<input type="text" class="form-control"  id="keadaan_umum_objektif_kala4" name="keadaan_umum_objektif_kala4" value="<?php echo $row->keadaan_umum_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4  mb-3">
																		<span class="input-group-text labelkolom">Kesadaran</span> 
																		<input type="text" class="form-control"  id="kesadaran_objektif_kala4" name="kesadaran_objektif_kala4" value="<?php echo $row->kesadaran_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Keadaan Emosional</span> 
																		<input type="text" class="form-control"  id="keadaan_emosional_objektif_kala4" name="keadaan_emosional_objektif_kala4" value="<?php echo $row->keadaan_emosional_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text bg-dark" style="color: white">TTV</span> 
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">TD</span> 
																		<input type="text" class="form-control"  id="td_objektif_kala4" name="td_objektif_kala4" value="<?php echo $row->td_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Nadi</span> 
																		<input type="text" class="form-control"  id="nadi_objektif_kala4" name="nadi_objektif_kala4" value="<?php echo $row->nadi_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Respirasi</span> 
																		<input type="text" class="form-control"  id="respirasi_objektif_kala4" name="respirasi_objektif_kala4" value="<?php echo $row->respirasi_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Suhu</span> 
																		<input type="text" class="form-control"  id="suhu_objektif_kala4" name="suhu_objektif_kala4" value="<?php echo $row->suhu_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">TFU</span> 
																		<input type="text" class="form-control"  id="tfu_objektif_kala4" name="tfu_objektif_kala4" value="<?php echo $row->tfu_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Kontraksi</span> 
																		<input type="text" class="form-control"  id="kontraksi_objektif_kala4" name="kontraksi_objektif_kala4" value="<?php echo $row->kontraksi_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Kandung Kemih</span> 
																		<input type="text" class="form-control"  id="kandung_kemih_objektif_kala4" name="kandung_kemih_objektif_kala4" value="<?php echo $row->kandung_kemih_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Perdarahan</span> 
																		<input type="text" class="form-control"  id="perdarahan_objektif_kala4" name="perdarahan_objektif_kala4" value="<?php echo $row->perdarahan_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Perineum</span> 
																		<input type="text" class="form-control"  id="perineum_objektif_kala4" name="perineum_objektif_kala4" value="<?php echo $row->perineum_objektif_kala4 ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">Robekan</span> 
																		<input type="text" class="form-control"  id="robekan_objektif_kala4" name="robekan_objektif_kala4" value="<?php echo $row->robekan_objektif_kala4 ?>">
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
																		<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala1" name="tanggal_assesment_kala1" value="<?php echo $row->tanggal_assesment_kala1."T".$row->jam_assesment_kala1 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																		<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala1" name="keterangan_assesment_assesment_kala1" rows="3"><?php echo $row->keterangan_assesment_kala1 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Masalah</span> 
																		<textarea type="text" class="form-control"  id="masalah_assesment_kala1" name="masalah_assesment_kala1" rows="3"><?php echo $row->masalah_assesment_kala1 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Kebutuhan</span> 
																		<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala1" name="kebutuhan_assesment_kala1" rows="3"><?php echo $row->kebutuhan_assesment_kala1 ?></textarea> 
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
																		<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala2" name="tanggal_assesment_kala2" value="<?php echo $row->tanggal_assesment_kala2."T".$row->jam_assesment_kala2 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																		<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala2" name="keterangan_assesment_assesment_kala2" rows="3"><?php echo $row->keterangan_assesment_kala2 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Masalah</span> 
																		<textarea type="text" class="form-control"  id="masalah_assesment_kala2" name="masalah_assesment_kala2" rows="3"><?php echo $row->masalah_assesment_kala2 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Kebutuhan</span> 
																		<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala2" name="kebutuhan_assesment_kala2" rows="3"><?php echo $row->kebutuhan_assesment_kala2 ?></textarea> 
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
																		<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala3" name="tanggal_assesment_kala3" value="<?php echo $row->tanggal_assesment_kala3."T".$row->jam_assesment_kala3 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																		<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala3" name="keterangan_assesment_assesment_kala3" rows="3"><?php echo $row->keterangan_assesment_kala3 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Masalah</span> 
																		<textarea type="text" class="form-control"  id="masalah_assesment_kala3" name="masalah_assesment_kala3" rows="3"><?php echo $row->masalah_assesment_kala3 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Kebutuhan</span> 
																		<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala3" name="kebutuhan_assesment_kala3" rows="3"><?php echo $row->kebutuhan_assesment_kala3 ?></textarea> 
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
																		<input type="datetime-local" class="form-control"  id="tanggal_assesment_kala4" name="tanggal_assesment_kala4" value="<?php echo $row->tanggal_assesment_kala4."T".$row->jam_assesment_kala4 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Assesment</span> 
																		<textarea type="text" class="form-control"  id="keterangan_assesment_assesment_kala4" name="keterangan_assesment_assesment_kala4" rows="3"><?php echo $row->keterangan_assesment_kala4 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Masalah</span> 
																		<textarea type="text" class="form-control"  id="masalah_assesment_kala4" name="masalah_assesment_kala4" rows="3"><?php echo $row->masalah_assesment_kala4 ?></textarea> 
																	</div>
																	<div class="col-md-6 mb-3">
																		<span class="input-group-text labelkolom">Kebutuhan</span> 
																		<textarea type="text" class="form-control"  id="kebutuhan_assesment_kala4" name="kebutuhan_assesment_kala4" rows="3"><?php echo $row->kebutuhan_assesment_kala4 ?></textarea> 
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
																		<input type="datetime-local" class="form-control"  id="tanggal_planning_kala1" name="tanggal_planning_kala1" value="<?php echo $row->tanggal_planning_kala1."T".$row->jam_planning_kala1 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Planning</span> 
																		<textarea type="text" class="form-control"  id="keterangan_planning_kala1" name="keterangan_planning_kala1" rows="7"><?php echo $row->keterangan_planning_kala1; ?></textarea> 
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
																		<input type="datetime-local" class="form-control"  id="tanggal_planning_kala2" name="tanggal_planning_kala2" value="<?php echo $row->tanggal_planning_kala2."T".$row->jam_planning_kala2 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Planning</span> 
																		<textarea type="text" class="form-control"  id="keterangan_planning_kala2" name="keterangan_planning_kala2" rows="10"><?php echo $row->keterangan_planning_kala2; ?></textarea> 
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">JK</span> 
																		<input type="text" class="form-control"  id="jk_planning_kala2" name="jk_planning_kala2" value="<?php echo $row->jk_planning_kala2; ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">BB</span> 
																		<input type="text" class="form-control"  id="bb_planning_kala2" name="bb_planning_kala2" value="<?php echo $row->bb_planning_kala2; ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">PB</span> 
																		<input type="text" class="form-control"  id="pb_planning_kala2" name="pb_planning_kala2" value="<?php echo $row->pb_planning_kala2; ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">LK</span> 
																		<input type="text" class="form-control"  id="lk_planning_kala2" name="lk_planning_kala2" value="<?php echo $row->lk_planning_kala2; ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">LD</span> 
																		<input type="text" class="form-control"  id="ld_planning_kala2" name="ld_planning_kala2" value="<?php echo $row->ld_planning_kala2; ?>">
																	</div>
																	<div class="col-md-4 mb-3">
																		<span class="input-group-text labelkolom">LL</span> 
																		<input type="text" class="form-control"  id="ll_planning_kala2" name="ll_planning_kala2" value="<?php echo $row->ll_planning_kala2; ?>">
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
																		<input type="datetime-local" class="form-control"  id="tanggal_planning_kala3" name="tanggal_planning_kala3" value="<?php echo $row->tanggal_planning_kala3."T".$row->jam_planning_kala3 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Planning</span> 
																		<textarea type="text" class="form-control"  id="keterangan_planning_kala3" name="keterangan_planning_kala3" rows="10"><?php echo $row->keterangan_planning_kala3; ?></textarea>
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
																		<input type="datetime-local" class="form-control"  id="tanggal_planning_kala4" name="tanggal_planning_kala4" value="<?php echo $row->tanggal_planning_kala4."T".$row->jam_planning_kala4 ?>">
																	</div>
																	<div class="col-md-12 mb-3">
																		<span class="input-group-text labelkolom">Keterangan Planning</span> 
																		<textarea type="text" class="form-control"  id="keterangan_planning_kala4" name="keterangan_planning_kala4" rows="7"><?php echo $row->keterangan_planning_kala3; ?></textarea> 
																	</div>
																</div>
															</div>
														</div>
													</div>


													<div class="form-group row" style="background: #03b509">

														<div class="col-sm-12 float-sm-right">
															<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>REKAM INC</b></h6>

														</div> 

													</div>
												</div>
											</div>
										</div>

									</div> 

									<div class="form-group row" style="background: #03b509">

										<div class="col-sm-12 float-sm-right">
											<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DETAIL OBAT</b></h6>

										</div> 

									</div>
									<br> 
									<div class="row">
										<div class="col-md-12">
											<table  id="example1" class="table table-striped table-bordered table-sm ">
												<tbody> 
													<tr>
							<!-- <th  class="judul1" colspan="1">Nama Obat</th>		
							-->
							<th width="15%"  class="judul1" colspan="1">Nama Obat - Keterangan</th>

							<th  class="judul1" colspan="2">Aturan Pakai</th>											
							<th class="qty">Qty</th>											
						</tr>

						<?php foreach ($detail_obat as $key) {?>

							<tr>
								<td  class="isi" colspan="1"><?php echo $key->nama_obat; ?> || <?php echo $key->keterangan ?></td>											
								<td  class="isi" colspan="2"><?php echo $key->aturan_pakai; ?></td>											
								<td class="isi tengah"><?php echo $key->qty." ".ucfirst($key->satuan_obat); ?></td>											
							</tr>
						<?php } ?>

						<tr class="pemisah">
							<td colspan="3"></td>
							<td ></td>
							<td colspan="2"></td>
						</tr>


						<tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">
							<td style="height:40px;font-weight:bold;text-align: left;" colspan="6">&nbsp;&nbsp;&nbsp;Pemeriksaan</td>	
						</tr>
						<tr class="pemisah">
							<td colspan="3"></td>
							<td ></td>
							<td colspan="2"></td>
						</tr>
						<tr>
							<th  class="judul1 tengah" colspan="3">Diperiksa Oleh</th>											
							<th class="qty tengah" colspan="3">Tanggal Pemeriksaan</th>											
						</tr>
						<tr>
							<th  class="isi tengah" colspan="3"><?php echo ucwords($row->dokter_pemeriksa)?></th>											
							<th class="isi tengah" colspan="3"><?php $tanggal=explode('-', $row->tanggal_periksa);
							$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
							echo $tanggal[2]."  ".$bulan[$tanggal[1]]."  ".$tanggal[0]?></th>											
						</tr>	


					</tbody>
				</table>
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











