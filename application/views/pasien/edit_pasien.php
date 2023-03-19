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
							<a href="<?php echo site_url('medis') ?>">pasien</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="#">Edit Data Pasien</a>
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
										<p class="card-title">FORM EDIT DATA PASIEN</p> 
									</div>

								</div>
							</div>

							<?php foreach ($edit_pasien as $row) { ?>

								<form class="form-control" method="post" action="<?php echo base_url() ?>pasien/update_data">
									<div class="card-body">  
										<div class="form-group row" style="background: #03b509">

											<div class="col-sm-12 float-sm-right">
												<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>PROFIL PASIEN</b></h3> 
											</div> 
										</div>
										<div class="row" class="collapse" id="customer_collapse"> 


											<div class="input-group col-md-3 mb-3 mt-3" style="display: none;">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">KODE</span>
												</div>
												<input type="text" class="form-control " id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" >
											</div>

											<div class="input-group col-md-3 mb-3 mt-3" style="display: none;">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">KODE</span>
												</div>
												<input type="text" class="form-control " id="no_registrasi" name="no_registrasi" value="<?php echo $row->no_registrasi ?>" >
											</div>

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Tgl Regis</span>
												</div>
												<input type="date" class="form-control form-control-md" id="tanggal_daftar" name="tanggal_daftar" style="background:#d2f9d3; color: black" value="<?php echo $row->tanggal_daftar ?>"  > 
											</div>

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Nik Pasien</span>
												</div>
												<input type="text" class="form-control form-control-md" id="nik" name="nik"  value="<?php echo $row->nik ?>" >
											</div>

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Nama Pasien</span>
												</div>
												<input type="text" class="form-control form-control-md" id="nama_pasien" name="nama_pasien"  value="<?php echo $row->nama_pasien ?>" >
											</div>

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Kepala Keluarga</span>
												</div>
												<input type="text" class="form-control form-control-md" id="kepala_keluarga" name="kepala_keluarga"  value="<?php echo $row->kepala_keluarga ?>" >
											</div>

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Tempat Lahir</span>
												</div>
												<input type="text" class="form-control form-control-md" id="tempat_lahir" name="tempat_lahir"  value="<?php echo $row->tempat_lahir?>"> 
											</div>



											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Tanggal Lahir</span>
												</div>
												<input type="date" class="form-control form-control-md" id="tanggal_lahir" name="tanggal_lahir"  value="<?php echo $row->tanggal_lahir ?>"> 

											</div>

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Status Pernikahan</span>
												</div>
												<select type="text" class="form-control form-control-md" id="status_pernikahan" name="status_pernikahan">  
													<option value="Menikah">Menikah</option> 
													<option value="Belum Menikah">Belum Menikah</option> 
												</select> 

											</div>


											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Jenis Kelamin</span>
												</div>
												<select type="text" class="form-control form-control-md" id="jk" name="jk">  
													<option value="L">L</option>
													<option value="P">P</option> 
												</select>
											</div>






											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Telepon</span>
												</div>
												<input type="text" class="form-control form-control-md" id="telepon" name="telepon" placeholder="Contoh : 085921923978"  value="<?php echo $row->telepon ?>"> 

											</div>


											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Agama</span>
												</div>
												<select type="text" class="form-control form-control-md" id="agama" name="agama">  
													<option value="Islam">Islam</option> 
													<option value="Kristen Protestan">Kristen Protestan</option>
													<option value="Katolik">Katolik</option>
													<option value="Hindu">Hindu</option>
													<option value="Buddha">Buddha</option>
													<option value="Kong Hu Cu">Kong Hu Cu</option>
												</select>
											</div>  



											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Kategori Pasien</span>
												</div>
												<select type="text" class="form-control form-control-md" id="kategori_pasien" name="kategori_pasien">    
													<option value="Dewasa">Dewasa</option> 
													<option value="Orang Tua">Orang Tua</option>
													<option value="Anak-Anak">Anak-Anak</option>
													<option value="Lansia">Lansia</option> 
												</select> 

											</div>



											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Umur ( thn )</span>
												</div>
												<input type="text" class="form-control form-control-md" id="umur" name="umur"  value="<?php echo strval($row->umur) ?>"> 
											</div>



											<div class="input-group col-md-4  mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Alamat</span>
												</div>
												<textarea type="text" class="form-control form-control-md" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="1" > <?php echo $row->alamat ?> </textarea>

											</div>   

											<div class="input-group col-md-2 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">RT</span>
												</div>
												<input type="text" class="form-control form-control-md" id="rt" name="rt" placeholder="Contoh :003" style="background-color: #c3f5c5"  value="<?php echo $row->rt ?>"> 

											</div>	

											<div class="input-group col-md-2 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">RW</span>
												</div>
												<input type="text" class="form-control form-control-md" id="rw" name="rw" placeholder="Contoh : 005" style="background-color: #c3f5c5"  value="<?php echo $row->rw ?>"> 

											</div>  

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Desa</span>
												</div>
												<input type="text" class="form-control form-control-md" id="desa" name="desa" value="<?php echo $row->desa ?>"> 

											</div> 

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Kecamatan</span>
												</div>
												<input type="text" class="form-control form-control-md" id="kecamatan" name="kecamatan" value="<?php echo $row->kecamatan ?>"> 

											</div> 

											<div class="input-group col-md-4 mb-3 mt-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Kabupaten</span>
												</div>
												<input type="text" class="form-control form-control-md" id="kabupaten" name="kabupaten" value="<?php echo $row->kabupaten ?>"> 

											</div>  

										</div>  


										<a href="<?php echo site_url('pasien') ?>" class="btn btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> Batal</a>
										<button id="update_data" type="submit" class="btn btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> Update</button> 
									</div>

								</form>




							</div>
						</div>
					</div>
				</div>
			</div>

			<script type="text/javascript">




				$(document).ready(function(){
			// ambil data slect cara baru agar tidak double pilihan
			let kategori_pasien ='<?php echo $row->kategori_pasien; ?>';
			$("#kategori_pasien option").each(function()
			{

				let pilihan = $(this).html();
				if (pilihan==kategori_pasien) {
					$(this).prop('selected','selected');
				}
			});

			let agama ='<?php echo $row->agama; ?>';
			$("#agama option").each(function()
			{

				let pilihan = $(this).html();
				if (pilihan==agama) {
					$(this).prop('selected','selected');
				}
			});


			let status_pernikahan ='<?php echo $row->status_pernikahan; ?>';
			$("#status_pernikahan option").each(function()
			{

				let pilihan = $(this).html();
				if (pilihan==status_pernikahan) {
					$(this).prop('selected','selected');
				}
			});

			let jk ='<?php echo $row->jk; ?>';
			$("#jk option").each(function()
			{

				let pilihan = $(this).html();
				if (pilihan==jk) {
					$(this).prop('selected','selected');
				}
			});
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

			</script> 



		<?php } ?>

	</div> 