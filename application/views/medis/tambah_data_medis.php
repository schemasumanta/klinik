	<style type="text/css">
		
		.modal-backdrop{
			display: none;
		}


	</style>


	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">FORM DATA MEDIS</h4>
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
							<a href="<?php echo site_url('medis') ?>">Medis</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="#">Tambah Data Medis</a>
						</li>
					</ul>
				</div>
				<div class="row">

					<div class="col-md-12">
						<div class="card">
							
							<div class="card-header">
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo site_url('medis') ?>" class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a> 
										<p class="card-title">FORM TAMBAH DATA MEDIS</p> 
									</div>

								</div>
							</div>


							<div class="card-body">  
								<div class="form-group row" style="background: #31ce36">

									<div class="col-sm-12 float-sm-right">
										<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>PROFIL MEDIS</b></h3> 
									</div> 
								</div>

							<!-- 

								<h5 style="background: #eeeeee;height: 30px; padding-top: 6px;"><b>DATA LAPORAN PENGAWAS</b></h5>  -->
								<br>
								<div class="row" class="collapse" id="customer_collapse"> 
									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Kode Medis</h4>
										<input type="text" class="form-control form-control-md" id="kode_medis" name="kode_medis" value="<?php echo $kode_medis ?>" style="background:#d2f9d3; color: black" disabled > 
									</div> 
						 

									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Nama Dokter / Medis</h4>
										<input type="text" class="form-control form-control-md" id="nama_medis" name="nama_medis" > 
									</div> 
						 
									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Jenis Kelamin</h4>
										<select type="text" class="form-control form-control-md" id="jk" name="jk">
											<option value="0" disabled="disabled" selected="selected">Pilih Jenis Kelamin</option>

											<option value="L">L</option>
											<option value="P">P</option> 
										</select> 

									</div> 

									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Tempat Lahir</h4>
										<input type="text" class="form-control form-control-md" id="tempat_lahir" name="tempat_lahir"> 
									</div> 


									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Tanggal Lahir</h4>
										<input type="date" class="form-control form-control-md" id="tanggal_lahir" name="tanggal_lahir"> 

									</div>  
									
									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Jabatan</h4>
										<select type="text" class="form-control form-control-md" id="jabatan" name="jabatan">
											<option value="0" disabled="disabled" selected="selected">Pilih Jabatan Dokter</option>

											<option value="Dokter Umum">Dokter Umum</option>
											<option value="Dokter Gigi">Dokter Gigi</option>
											<option value="Dokter Khusus">Dokter Khusus</option>
											<option value="Bidan">Bidan</option>
										</select> 

									</div> 

									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Telepon</h4>
										<input type="text" class="form-control form-control-md" id="telepon" name="telepon" placeholder="Contoh : 085921923978"> 
									</div> 

									<div class="col-md-3"> 
										<h4 style="padding-bottom:5px">Email</h4>
										<input type="email" class="form-control form-control-md" id="email" name="email" > 
									</div>  

									<div class="col-md-3"> 

										<form method='post' action='' enctype="multipart/form-data">

											<h4 style="color:#343a40;" for="foto">Foto  </h4>

											<input type="file"  id="foto"  class='form-control' name="foto" onchange="cekisi()">  

											<input type='button' class='btn btn-info' value='Upload' id='btn_upload' style="display: none;">


										</form>


									</div>

									<div class="col-md-3" id="data_Preview" style="display: none;">  
										<img src="" id="preview" height="120px" width="120px" style="padding-top: 20px; display: none;">
										<input type="text"  id="nama_preview"  style="padding-top: 20px; display: none;">

									</div>

									<div class="col-md-6"> 
										<h4 style="padding-bottom:5px">Alamat Lengkap</h4>
										<textarea type="text" class="form-control form-control-md" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="4"> </textarea>
									</div>

									
								</div>  

								<br>



								<br> 

								
								<a href="<?php echo site_url('medis') ?>" class="btn btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> Cancel</a>
								<button id="simpan_data" type="button" isi="1" class="btn btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> Submit</button> 
							</div>



							</div>
							</div>
							</div>
							</div>
							</div>


	 <script type="text/javascript">

		// function isNumberKey(evt)
		// {
		// 	var charCode = (evt.which) ? evt.which : event.keyCode
		// 	if (charCode > 31 && (charCode < 48 || charCode > 57))
		// 		return false;

		// 	return true;
		// }


		$('#simpan_data').on('click',function(){
			var kode_medis = $('#kode_medis').val();
			var nama_medis = $('#nama_medis').val();
			var jk = $('#jk').val(); 
			var tempat_lahir = $('#tempat_lahir').val();
			var tanggal_lahir = $('#tanggal_lahir').val();
			var jabatan = $('#jabatan').val();
			var telepon = $('#telepon').val();
			var email = $('#email').val();
			var foto = $('#foto').val();
			var alamat = $('#alamat').val();
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																															 

			$.ajax({
				url   : '<?php echo base_url()?>medis/simpan_data_medis',
				type: 'post',
				async: true,
				dataType: 'json',
				data 	 :{
							kode_medis:kode_medis,nama_medis:nama_medis,jk:jk,tempat_lahir:tempat_lahir,tanggal_lahir:tanggal_lahir,jabatan:jabatan,email:email,telepon:telepon,foto:foto,alamat:alamat},


				success: function(data){
					alert(data); 
					window.location.href ="<?php echo site_url('medis'); ?>";

				}

			});




		}); 


		function cekisi(){

			var file = $('[name="file"]').val();
			if (file!="") {
				$('#btn_upload').click();

			}
		}

		 

</script>

 
	


	</div>

