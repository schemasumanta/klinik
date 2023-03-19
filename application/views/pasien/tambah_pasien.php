		<style type="text/css">
			
			.modal-backdrop{
				display: none;
			}


		</style>


		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">FORM DATA PASIEN</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('medis') ?>">Pasien</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tambah Data Pasien</a>
							</li>
						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								
								<div class="card-header">
									<div class="row">
										<div class="col-md-12">
											<a href="<?php echo site_url('pasien') ?>" class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a> 
											<p class="card-title">FORM PENDAFTARAN PASIEN</p> 
										</div>

									</div>
								</div>


								<div class="card-body">  
									<div class="form-group row" style="background: #03b509">

										<div class="col-sm-12 float-sm-right">
											<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>PROFIL PASIEN</b></h3> 
										</div> 
									</div>


									<br>
									<div class="row" class="collapse" id="customer_collapse"> 


										<div class="col-md-12 mb-3"> 
												<span class="input-group-text" style="background: #03b509;color :white">Tgl Regis</span> 
											<input type="date" class="form-control form-control-md" id="tanggal_daftar" name="tanggal_daftar" value="<?= date('Y-m-d') ?>"   style="border-color: #03b509; background: #ffffff" > 
										</div> 

										
										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Nik Pasien</span>
											<input type="text" class="form-control form-control-md" id="nik" name="nik"  style="border-color: #03b509; background: #ffffff"> 
										</div> 

										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Nama Pasien</span>
											<input type="text" class="form-control form-control-md" id="nama_pasien_tambah" name="nama_pasien_tambah"  style="border-color: #03b509; background: #ffffff"> 
										</div> 


										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Kepala Keluarga</span>
											<input type="text" class="form-control form-control-md" id="kepala_keluarga" name="kepala_keluarga"  style="border-color: #03b509; background: #ffffff">

										</div> 


										<div class="col-md-3 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Jenis Kelamin</span>
											<select type="text" class="form-control form-control-md" id="jk" name="jk" style="border-color: #03b509; background: #ffffff">
												<option value="0" disabled="disabled" selected="selected">Pilih Jenis Kelamin</option>
												<option value="L">L</option>
												<option value="P">P</option> 
											</select> 
										</div> 


										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Tempat Lahir</span>
											<input type="text" class="form-control form-control-md" id="tempat_lahir" name="tempat_lahir" style="border-color: #03b509; background: #ffffff"> 

										</div>

										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Tanggal Lahir</span>
											<input type="date"  class="form-control form-control-md" id="tanggal_lahir" name="tanggal_lahir" style="border-color: #03b509; background: #ffffff"> 

										</div> 


										<div class="col-md-1 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Umur</span>
											<input type="text" class="form-control form-control-md" id="umur" name="umur" r style="border-color: #03b509; background: #ffffff"> 
										</div> 

										<div class="col-md-3 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Agama</span> 
											<select type="text" class="form-control form-control-md" id="agama" name="agama" style="border-color: #03b509; background: #ffffff">
												<option value="0" disabled="disabled" selected="selected">Pilih Agama</option>
												<option value="Islam">Islam</option>

												<option value="Kristen Protestan">Kristen Protestan</option>
												<option value="Katolik">Katolik</option>
												<option value="Hindu">Hindu</option>
												<option value="Buddha">Buddha</option>
												<option value="Kong Hu Cu">Kong Hu Cu</option>
											</select>  
										</div> 


										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Kategori Pasien</span>
											<select type="text" class="form-control form-control-md" id="kategori_pasien" name="kategori_pasien" style="border-color: #03b509; background: #ffffff">
												<option value="0" disabled="disabled" selected="selected">Kategori Pasien</option>
												<option value="Dewasa">Dewasa</option> 
												<option value="Orang Tua">Orang Tua</option>
												<option value="Anak-Anak">Anak-Anak</option>
												<option value="Lansia">Lansia</option> 
											</select> 
										</div> 

										<div class="col-md-3 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Status Pernikahan</span>
											<select type="text" class="form-control form-control-md" id="status_pernikahan" name="status_pernikahan" style="border-color: #03b509; background: #ffffff">
												<option value="0" disabled="disabled" selected="selected"> Status Pernikahan</option>
												<option value="Menikah">Menikah</option> 
												<option value="Belum Menikah">Belum Menikah</option> 
											</select>
										</div>  

										<div class="col-md-2 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">No. Telepon</span>
											<input type="text" class="form-control form-control-md" id="telepon" name="telepon" placeholder=" Telepon" style="border-color: #03b509; background: #ffffff">
										</div> 

										<div class="col-md-7 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Alamat</span>
											 <input type="text"  class="form-control form-control-md" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="1" style="border-color: #03b509; background: #ffffff"> </textarea>
										</div> 

										<div class="col-md-3 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">RT</span> 
											<input type="text"  class="form-control form-control-md" id="rt" name="rt" placeholder="003"  style="border-color: #03b509; background: #ffffff"> 
										</div>

										<div class="col-md-2 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">RW</span> 
											 <input type="text" class="form-control form-control-md" id="rw" name="rw" placeholder="005"  style="border-color: #03b509; background: #ffffff"> 
										</div>  


										<div class="col-md-3 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Desa</span> 
											<input type="text"  class="form-control form-control-md" id="desa" name="desa" placeholder="Contoh : Jagabaya" style="border-color: #03b509; background: #ffffff">
										</div>

										<div class="col-md-4 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Kecamatan</span>
											<input type="text" class="form-control form-control-md" id="kecamatan" name="kecamatan" placeholder="Contoh : Parungpanjang"   style="border-color: #03b509; background: #ffffff"> 
										</div>  

										<div class="col-md-5 mb-3">
											<span class="input-group-text" style="background: #03b509;color :white">Kab/Kota</span>
											<input type="text" class="form-control form-control-md" id="kabupaten" name="kabupaten"  placeholder="Contoh : Bogor" style="border-color: #03b509; background: #ffffff"> 
										</div>  
									</div> 




									<br> 


									<a href="<?php echo site_url('pasien') ?>" class="btn btn-sm btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> Batal</a>
									<button id="simpan_data"  type="submit" isi="1" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> Simpan</button> 
								</div>



							</div>
						</div>
					</div>
				</div>
			</div>



		</div>

		<script type="text/javascript"> 

			$(document).ready(function(){
					$('#kategori_pasien').select2({
						placeholder:"Kategori Pasien",
						allowClear: true,
					})

					$('#jk').select2({
						placeholder:"Jenis Kelamin",
						allowClear: true,
					})

					$('#agama').select2({
						placeholder:"Agama ",
						allowClear: true,
					})
						$('#status_pernikahan').select2({
						placeholder:"Status Pernikahan ",
						allowClear: true,
					})
					
					// hitungtotalakhir();
				})
			$('#tanggal_lahir').on('change', function() {
				var tanggal_lahir = Date.parse(this.value);
				var tanggal = new Date();
				var hari_ini = Date.parse(tanggal);
				var selisih = (hari_ini-tanggal_lahir)/86400000+1;
				let cek_umur = selisih/365;
				var umur = Math.round( cek_umur * 10 ) / 10;
				if (umur==0) {
					umur="0.1";
				}
				$('#umur').val(umur);
			});

			$('#simpan_data').on('click',function(){
				var tanggal_daftar = $('#tanggal_daftar').val();
				var nik = $('#nik').val();
				var nama_pasien = $('#nama_pasien_tambah').val();
				var jk = $('#jk').val();
				var kepala_keluarga = $('#kepala_keluarga').val();
				var tempat_lahir = $('#tempat_lahir').val();
				var tanggal_lahir = $('#tanggal_lahir').val();
				var umur = $('#umur').val();
				var agama = $('#agama').val();

				var kategori_pasien = $('#kategori_pasien').val();
				var tinggi_badan = $('#tinggi_badan').val();
				var berat_badan = $('#berat_badan').val();
				var status_pernikahan = $('#status_pernikahan').val();
				var telepon = $('#telepon').val(); 
				var alamat = $('#alamat').val(); 
				var rt = $('#rt').val(); 
				var rw = $('#rw').val(); 
				var desa = $('#desa').val(); 
				var kecamatan = $('#kecamatan').val(); 
				var kabupaten = $('#kabupaten').val(); 

				if (nama_pasien == "") {
					alert("Nama Pasien Belum Terisi");
					$('#nama_pasien_tambah').focus();
					return false;
				}
				if (jk == "") {
					alert("Jenis Kelamin Belum Terisi ");
					$('#jk').focus();
					return false;
				}

				if (kepala_keluarga == "") {
					alert("Kepala Keluarga Belum Terisi ");
					$('#kepala_keluarga').focus();
					return false;
				}

				if (tempat_lahir == "") {
					alert("Tempat Lahir Belum Terisi ");
					$('#tempat_lahir').focus();
					return false;
				}

				if (tanggal_lahir == "") {
					alert("Tanggal lahir Belum Terisi ");
					$('#tanggal_lahir').focus();
					return false;
				}

				if (umur == "") {
					alert("Umur Belum Terisi ");
					$('#umur').focus();
					return false;
				}


				if (agama == "") {
					alert("agama Belum Terisi ");
					$('#agama').focus();
					return false;
				}

				if (telepon == "") {
					alert("telepon Belum Terisi ");
					$('#telepon').focus();
					return false;
				}


				if (alamat == "") {
					alert("alamat Belum Terisi");
					$('#alamat').focus();
					return false;
				}


				if (rt == "") {
					alert("RT Belum Terisi");
					$('#rt').focus();
					return false;
				}

				if (rw == "") {
					alert("RW Belum Terisi");
					$('#rw').focus();
					return false;
				}

				if (kecamatan == "") {
					alert("kecamatan Belum Terisi");
					$('#kecamatan').focus();
					return false;
				}


				if (desa == "") {
					alert("desa Belum Terisi");
					$('#desa').focus();
					return false;
				}


				if (kabupaten == "") {
					alert("kabupaten Belum Terisi");
					$('#kabupaten').focus();
					return false;
				}


				$.ajax({
					url   : '<?php echo base_url()?>pasien/simpan_data_pasien',
					type: 'post',
					async: true,
					dataType: 'json',
					data 	 :{
						tanggal_daftar:tanggal_daftar,nik:nik,nama_pasien:nama_pasien,jk:jk,kepala_keluarga:kepala_keluarga,tempat_lahir:tempat_lahir,tanggal_lahir:tanggal_lahir,umur:umur,agama:agama,kategori_pasien:kategori_pasien,rt:rt,status_pernikahan:status_pernikahan,rt:rt,rw:rw,telepon:telepon,alamat:alamat,desa:desa,kecamatan:kecamatan,kabupaten:kabupaten},


						success: function(data){
							alert(data); 
							window.location.href ="<?php echo site_url('pasien'); ?>"; 
						}

					});




			});








			
		</script> 