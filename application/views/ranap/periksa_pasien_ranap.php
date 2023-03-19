<div class="main-panel">
	<style type="text/css">
		
		 
		h2{
			font-weight: bold;
			color: #d07b00;
		}

		.signature-pad {
			border: 1px solid #03b509;
			border-radius: 3%
		}

		#hapus_sign{
			position: absolute;
			top:80%;
			left:20%;
		}

		
	</style>

	<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"> 
							<a href="#" onclick="kembali()" class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a>
							<span style="font-size: 25px;"><b>FORM DATA PASIEN RAWAT INAP</b></span>
							<?php foreach ($periksa_ranap as $row): ?>
								<h3 style="font-weight: bold;margin-top: 10px;"><?php echo ucwords($row->kode_ranap);?></h3>	
							<?php endforeach ?> 

						</div>



						<div class="row">

							<div class="col-md-12"> 
								<div class="card-body">  
									<div class="form-group row" style="background: #03b509"> 
										<div class="col-sm-12 float-sm-right">
											<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><i class="fas fa-file-import mr-2"></i> <b>DATA KELUARGA YANG BERSANGKUTAN</b></h3> 
										</div> 
									</div> 

									<br>
									<div class="form-group row">
										<!-- 	<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white"> <i class="far fa-window-restore mr-1"></i>Nama</span> 
												<input type="text" class="form-control form-control-md" id="nama_approval" name="nama_approval"  style="border-color: #03b509; background: #ffffff">
											</div>   -->

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white">  <i class="fa fa-user mr-1"></i> Nama</span> 
												<input type="text" class="form-control form-control-md" id="nama_approval" name="nama_approval"  style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i> Umur</span> 
												<input type="text" class="form-control form-control-md" id="umur_approval" name="umur_approval" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white"><i class="fas fa-thermometer-three-quarters mr-1"></i>Jenis Kelamin</span> 
												<select type="text" class="form-control  form-control-md " name="jenis_kelamin_approval" id="jenis_kelamin_approval" style="border-color: #03b509; background: #ffffff" >
													<option value="0" selected> -- Pilih Jenisa Kelamin--</option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div> 

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i>HUbungan Dengan Pasien</span> 
												<select class="form-control " id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" style="border-color: #03b509; background: #ffffff">
													<option value="select">--Select--</option>
													<option value="istri">istri</option>
													<option value="suami">suami</option>
													<option value="anak">anak</option>
													<option value="ayah">ayah</option>
													<option value="ibu saya">ibu saya</option> 
												</select>
											</div>


											<div class="col-md-6 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i> Tindakan Medis</span> 
												<input type="text" class="form-control form-control-md" id="tindakan_medis" name="tindakan_medis" style="border-color: #03b509; background: #ffffff">
											</div> 

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i> Ruang Rawat</span> 
												<input type="text" class="form-control form-control-md" id="ruang_rawat" name="ruang_rawat" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i>Tanggal Persetujuan </span> 
												<input type="date" class="form-control form-control-md" id="tanggal_persetujuan" name="tanggal_persetujuan" style="border-color: #03b509; background: #ffffff">
											</div>





										</div>
										<div class="row">
											
											<div class="mb-3 col-sm-3" style="position: relative;"> 
												<span class="input-group-text" style="background: #03b509;color :white; width:90%;"> <i class="far fa-list-alt mr-1"></i> Saksi 1</span>
												<canvas id="signature-pad" id="signature-pad" class="signature-pad"></canvas>
												<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign"><i class="fas fa-eraser"></i></button>
											</div> 
											<div class="mb-3 col-sm-3" style="position: relative;"> 
												<span class="input-group-text" style="background: #03b509;color :white; width:90%;"> <i class="far fa-list-alt mr-1"></i> Yang membuat Pernyataan</span>
												<canvas id="signature-pad" id="signature-pad" class="signature-pad"></canvas>
												<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign"><i class="fas fa-eraser"></i></button>
											</div> 
											<div class="mb-3 col-sm-3" style="position: relative;"> 
												<span class="input-group-text" style="background: #03b509;color :white; width:90%;"> <i class="far fa-list-alt mr-1"></i> Saksi 2</span>
												<canvas id="signature-pad" id="signature-pad" class="signature-pad"></canvas>
												<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign"><i class="fas fa-eraser"></i></button>
											</div> 

										</div> 

										<br><br>
										<h3>** Isi dengan jenis tindakan medis yang akan dilakukan <br>*  Pilih diri sendiri</h3>
 
									</div> 
								</div>
								

								<div class="col-md-12"> 
								<div class="card-body">  
									<div class="form-group row" style="background: #03b509"> 
										<div class="col-sm-12 float-sm-right">
											<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><i class="fas fa-file-import mr-2"></i> <b>LEMBAR PEMANTAUAN PASIEN</b></h3> 
										</div> 
									</div> 

									<br>
									<div class="form-group row"> 
										<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white">  <i class="fa fa-user mr-1"></i> Hari</span>  
												<input type="text-local" class="form-control form-control-md" id="hari" name="nama_approval"  style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white"> <i class="fas fa-calendar-week mr-1"></i></i> Date Time</span>  
												<input type="datetime-local" class="form-control form-control-md" id="tgl_observasi" name="nama_approval"  style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i> Umur</span> 
												<input type="text" class="form-control form-control-md" id="umur_approval" name="umur_approval" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white"><i class="fas fa-thermometer-three-quarters mr-1"></i>Jenis Kelamin</span> 
												<select type="text" class="form-control  form-control-md " name="jenis_kelamin_approval" id="jenis_kelamin_approval" style="border-color: #03b509; background: #ffffff" >
													<option value="0" selected> -- Pilih Jenisa Kelamin--</option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div> 

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i>HUbungan Dengan Pasien</span> 
												<select class="form-control " id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" style="border-color: #03b509; background: #ffffff">
													<option value="select">--Select--</option>
													<option value="istri">istri</option>
													<option value="suami">suami</option>
													<option value="anak">anak</option>
													<option value="ayah">ayah</option>
													<option value="ibu saya">ibu saya</option> 
												</select>
											</div>


											<div class="col-md-6 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i> Tindakan Medis</span> 
												<input type="text" class="form-control form-control-md" id="tindakan_medis" name="tindakan_medis" style="border-color: #03b509; background: #ffffff">
											</div> 

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i> Ruang Rawat</span> 
												<input type="text" class="form-control form-control-md" id="ruang_rawat" name="ruang_rawat" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white" ><i class="fas fa-clipboard-list mr-1"></i>Tanggal Persetujuan </span> 
												<input type="date" class="form-control form-control-md" id="tanggal_persetujuan" name="tanggal_persetujuan" style="border-color: #03b509; background: #ffffff">
											</div>





										</div>
										<div class="row">
											
											<div class="mb-3 col-sm-3" style="position: relative;"> 
												<span class="input-group-text" style="background: #03b509;color :white; width:90%;"> <i class="far fa-list-alt mr-1"></i> Penanggung jawab obeservasi</span>
												<canvas id="signature-pad" id="signature-pad" class="signature-pad"></canvas>
												<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign"><i class="fas fa-eraser"></i></button>
											</div> 

										</div> 

										<br><br>
										<h3>** Isi dengan jenis tindakan medis yang akan dilakukan <br>*  Pilih diri sendiri</h3>

										<a href="<?php echo site_url('pasien') ?>" class="btn btn-sm btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
										<button id="daftarkan" type="button" isi="1" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> DAFTARKAN PASIEN</button> 
									</div>
									<br>
									<br>
									<br>
									<br>




								</div>


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
