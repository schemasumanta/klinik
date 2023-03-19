<div class="main-panel">
	<style type="text/css">
		
		.label-checkbox{
			vertical-align: middle;
			padding-bottom: 10px;
		}
		.card-header{
			text-align: center;
			font-size: 25px;
		}
		#tabel_rekam{
			overflow-x:  scroll;
			width: 100%;
		}

		.batas{
			width:1%;
			border-top: 1px solid #ffff;

		}
		.judul2{
			background: #f1f1f1;
			padding: 10px;
			border: 1px solid #a5a6a7;
			font-size:14px;
			width:10%;
			text-align: left;
		}
		.judul1{
			background: #f1f1f1;
			padding: 10px;
			border: 1px solid #a5a6a7;
			font-size:14px;
			width:5%;
			text-align: left;	
		}
		.isi1{
			padding: 10px;
			background: #fffeda;

			border: 1px solid #a5a6a7;
			width:30%;
			
			font-size:14px;
			text-align: left;
		}

		.isi{
			padding: 10px;
			background: #fffeda;

			border: 1px solid #a5a6a7;
			
			font-size:14px;
			text-align: left;
		}
		.qty{
			padding: 10px;
			background: #f1f1f1;

			border: 1px solid #a5a6a7;
			width:10%;
			font-size:14px;
			text-align: center;
		}
		tbody{
			border: 0px solid;

		}
		tr{
			border: 1px solid white;

		}
		.pemisah{
			border: 1px solid white;
			height: 10px;

		}
		.tengah{
			text-align: center;
		}
		.rekam{
			text-align: right; 			
			border: 2px solid white;
			border-top-left-radius: 15px;
			border-bottom-right-radius: 15px;
			background:#2f7b31;
			color:white;
		}
		#tabel_rekam{
			overflow-x: hidden;

		}

		#tabel_rekamfinal{
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
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"> 
							<a href="#" onclick="kembali()" class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a>
							<i class="fas fa-briefcase-medical mr-3"></i><span style="font-size: 25px;"><b>DETAIL REKAM MEDIK PASIEN</b></span>
							<?php foreach ($observasi_pasien as $row): ?>

								<h4 style="font-weight: bold;margin-top: 10px;"><?php echo ucwords($row->kode_rekam);?></h4>								
							<?php endforeach ?>



						</div>


						<div class="card-body">

							<div class="table-responsive">
								<table id="tabel_rekam" class="table-responsive"> 
									<h3 style="text-align: center;font-weight: bold">PERSETUJUAN TINDAKAN MEDIS</h3>
									<h3 style="text-align: center;font-weight: bold">( INFORMED CONSENT )</h3>
									<br>
									<!-- <thead>
										<tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">
											<td style="height:40px;font-weight:bold;text-align: left;" colspan="5">&nbsp;&nbsp;&nbsp;Data Pasien</td>	
										</tr>
									</thead> -->



									<tbody style="border: 1px solid white">  
										<h4>Saya yang bertanda tangan dibawah ini : </h4>
										<br>
										<div class="row">
											<div class="col-md-2">
												<h4>Nama</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="nama_kel" id="nama_kel" placeholder="Isi Dengan Nama Keluarga Yang Bersangkutan ...." >
											</div>
											
										</div> 
										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Umur</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="umur_kel" id="umur_kel" >
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Jenis Kelamin</h4>
											</div>
											<div class="col-md-4">
												
												<select type="text" class="form-control form-control-sm" name="jk_kel" id="jk_kel"  >
													<option value="0" selected> -- Pilih Jenisa Kelamin--</option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Alamat</h4>
											</div>
											<div class="col-md-4">
												<textarea  type="text" class="form-control form-control-sm" name="alamat_kel" id="alamat_kel" > </textarea>
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Bukti Diri (KTP)</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="kode_pasien" id="kode_pasien" placeholder="Isi Dengan Nomor KTP...."  >
											</div>
											
										</div>
										<br>

										<h4>Dengan ini menyatakan dengan sesungguhnya telah menyetujui / menolak Untuk dilakukan tindakan medis Berupa **<input type="text" class="form-control form-control-sm" name="tindakan_medis" id="tindakan_medis" placeholder="isi keterangan tindakan">  </h4>
										<div class="col-md-4">
										<h4 >Terhadap diri saya sendiri *</h4>
										<select class="form-control form-control-sm" id="namayangsersangkutan" name="namayangsersangkutan">
											<option value="select">--Select--</option>
											<option value="istri">istri</option>
											<option value="suami">suami</option>
											<option value="anak">anak</option>
											<option value="ayah">ayah</option>
											<option value="ibu saya">ibu saya</option> 
										</select>
									</div>

										<br><br>
										<div class="row">
											<div class="col-md-2">
												<h4>Nama</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="nama_pasien" id="nama_pasien" value="<?php echo $row->nama_pasien ?>" >
											</div>
											
										</div> 
										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Umur</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="umur" id="umur"  value="<?php echo $row->umur ?>" >
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Jenis Kelamin</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="jk" id="jk" value="<?php echo $row->jk ?>" >
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Alamat</h4>
											</div>
											<div class="col-md-4">
												<textarea  type="text" class="form-control form-control-sm" name="alamat" id="alamat"  >  <?php echo $row->alamat ?>  </textarea>
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>Dirawat di ruangan</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="nama_ruangan" id="nama_ruangan" placeholder="Ruangan ...."  >
											</div>
											
										</div>

										<div class="row mt-1">
											<div class="col-md-2">
												<h4>No. Rekam Medis</h4>
											</div>
											<div class="col-md-4">
												<input type="text" class="form-control form-control-sm" name="no_rm" id="no_rm" value="<?php echo $row->kode_rekam; ?>" readonly>
											</div>
											
										</div>
										<br>
										<br>

										<h4>Yang tujuan, sifat dan perlunya tindakan medis tersebut diatas, serta resiko yang dapat ditimbulkannya telah cukup dijelaskan oleh Dokter / Bidan dan telah saya mengerti sepenuhnya.<br> Demikian surat pernyataan persetujuan ini saya buat penuh kesadaran dan tanpa paksaan dari pihak manapun juga.</h4>

										<div class="row mt-1">
											<div class="col-md-7"></div>
											<div class="col-md-2">
												<h4>Parungpanjang, </h4>
											</div>
											<div class="col-md-3">
												<input type="date" class="form-control form-control-sm" name="tgl" id="tgl" >
											</div>
											
										</div>
										<br>

										<div class="card-body col-md-12 mt-1" style="  background: white;">
											<div class="row">
												<div class="col-md-3">
													<h4  >Saksi-saksi</h4>  								 
													<h4 >Persetujuan</h4>
													<select class="form-control form-control-sm" id="persetujuan" name="persetujuan">
														<option value="select">--Select--</option>
														<option value="Setuju">Setuju</option>
														<option value="Tidak">Tidak</option>
													</select>

													<div class="input-group-prepend mt-1">  
														<div id="setuju1" style="display:none;">
															<input type="button" class="btn btn-sm btn-success " value="Setuju" onclick =""  > 
														</div>
														<div id="tidaksetuju1" style="display:none;">
															<input type="button" class="btn btn-sm btn-danger ml-2" value="Tidak Setuju" onclick ="" >  
														</div> 
													</div>
													<center><input type="text" class="form-control form-control-sm mt-1" name="dokter" id="dokter" placeholder="Isi dengan Nama"></center>

												</div>


												<div class="col-md-3">
													<h4  >Dokter / Bidan</h4>  								 
													<h4 >Persetujuan</h4>
													<select class="form-control form-control-sm" id="persetujuanbidan" name="persetujuanbidan">
														<option value="select">--Select--</option>
														<option value="Setuju">Setuju</option>
														<option value="Tidak">Tidak</option>
													</select>

													<div class="input-group-prepend mt-1">  
														<div id="setuju2" style="display:none;">
															<input type="button" class="btn btn-sm btn-success" value="Setuju" onclick ="" > 
														</div>
														<div id="tidaksetuju2" style="display:none;">
															<input type="button" class="btn btn-sm btn-danger ml-2" value="Tidak Setuju" onclick ="" >  
														</div>  
													</div>
													<center><input type="text" class="form-control form-control-sm mt-1" name="dokter" id="dokter" placeholder="Isi dengan Nama"></center>

												</div>


												<div class="col-md-3">
													<h4  >Yang membuat pernyataan</h4>  								 
													<h4 >Persetujuan</h4>
													<select class="form-control form-control-sm" id="persetujuanpernyataan" name="persetujuanpernyataan">
														<option value="select">--Select--</option>
														<option value="Setuju">Setuju</option>
														<option value="Tidak">Tidak</option>
													</select>

													<div class="input-group-prepend mt-1">  
														<div id="setuju3" style="display:none;">
															<input type="button" class="btn btn-sm btn-success" value="Setuju" onclick ="" > 
														</div>
														<div id="tidaksetuju3" style="display:none;">
															<input type="button" class="btn btn-sm btn-danger ml-2" value="Tidak Setuju" onclick ="" >  
														</div> 
													</div>
													<center><input type="text" class="form-control form-control-sm mt-1" name="dokter" id="dokter" placeholder="Isi dengan Nama"></center>

												</div>

												<div class="col-md-3">
													<h4  >Saksi-saksi</h4>  								 
													<h4 >Persetujuan</h4>
													<select class="form-control form-control-sm" id="persetujuan_saksi2" name="persetujuan_saksi2">
														<option value="select">--Select--</option>
														<option value="Setuju">Setuju</option>
														<option value="Tidak">Tidak</option>
													</select>

													<div class="input-group-prepend mt-1">  
														<div id="setuju4" style="display:none;">
															<input type="button" class="btn btn-sm btn-success " value="Setuju" onclick =""  > 
														</div>
														<div id="tidaksetuju4" style="display:none;">
															<input type="button" class="btn btn-sm btn-danger ml-2" value="Tidak Setuju" onclick ="" >  
														</div> 
													</div>
													<center><input type="text" class="form-control form-control-sm mt-1" name="dokter" id="dokter" placeholder="Isi dengan Nama"></center>

												</div>



											</div>



										</div>
										<br><br>
										<h4>** Isi dengan jenis tindakan medis yang akan dilakukan <br>*  Pilih diri sendiri</h4>


									</div>







									<tr class="pemisah">
										<td colspan="2"></td>
										<td ></td>
										<td colspan="2"></td>
									</tr>






								</div>
							</div>


						</div>
					</div>
				</div>


			</div>
			<script type="text/javascript">

				$(document).ready(function(){
					$('#persetujuan').change(function() {
						if ($(this).val() == 'Setuju') {  $('#setuju1').show(); $('#tidaksetuju1').hide();
					} else if ($(this).val() == 'Tidak'){ $('#tidaksetuju1').show(); $('#setuju1').hide(); } 
					else { }
				});

					$('#persetujuanbidan').change(function() {
						if ($(this).val() == 'Setuju') { $('#setuju2').show(); ('#tidaksetuju2').hide();
					} else if ($(this).val() == 'Tidak'){ $('#tidaksetuju2').show(); $('#setuju2').hide(); } 
					else { }
				});

					$('#persetujuanpernyataan').change(function() {
						if ($(this).val() == 'Setuju') { $('#setuju3').show(); $('#tidaksetuju3').hide();
					} else if ($(this).val() == 'Tidak'){ $('#tidaksetuju3').show(); $('#setuju3').hide();
				}  else {  }
			});


					$('#persetujuan_saksi2').change(function() {
						if ($(this).val() == 'Setuju') { $('#setuju4').show(); $('#tidaksetuju4').hide();
					} else if ($(this).val() == 'Tidak'){ $('#tidaksetuju4').show(); $('#setuju4').hide();
				}  else {  }
			});





				});

				function kembali(){
					window.history.back();
				}
			</script>
