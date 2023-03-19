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
					<?php foreach ($rujuk_pasien as $row){ ?>
						<div class="card-header">     
							<div class="row">
								<div class="col-md-12">
									<img src="<?php echo base_url() ?>assets/img/user.png" style="border-radius: 50%" width="60px" height="60px">
									<H4 style="position: absolute; right: 0;top:0;margin-right: 30px;font-weight: bold;color: green">FORM RUJUKAN PASIEN</H4>
									<h6 style="position: absolute; right: 0; margin-top:-20px;margin-right: 30px"><?php echo ucwords($row->nama_pasien)." - ".$row->no_registrasi ?></h6>
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
											<h6 type="button transparent" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px; font-size: 18px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA PASIEN</b></h6>

										</div>


									</div>

									<div class="col-md-12x mt-3"> 
										<div class="row"> 
											<input style="display: none;" type="text" class="form-control"  id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" >

											<input style="display: none;" type="text" class="form-control"  id="nama_pasien" name="nama_pasien" value="<?php echo $row->nama_pasien ?>" >
											<input style="display: none;" type="text" class="form-control"  id="no_registrasi" name="no_registrasi" value="<?php echo $row->no_registrasi ?>" >
											<input style="display: none;" type="date" class="form-control"  id="tanggal_berobat" name="tanggal_berobat" value="<?php $tanggal=explode('-', $row->tanggal_berobat);
											$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
											echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?>" >



											<div class="input-group col-md-3 mb-3" style="display: none;">
												<div class="input-group-prepend">
													<span class="input-group-text labelkolom"> Tanggal</span>
												</div>
												<input type="text" class="form-control"  id="tanggal_berobat" name="tanggal_berobat" value="<?php echo $row->tanggal_berobat ?>" >
											</div>


											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom"> KODE REKAM</span> 
												<input type="text" class="form-control"  id="kode_rekam" name="kode_rekam" value="<?php echo $row->kode_rekam ?>"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom"> Kepala Keluarga</span> 
												<input type="text" class="form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff" >
											</div> 

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Tempat Lahir</span> 
												<input type="date('Y-m-d')" class="form-control"  id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff" >
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Tanggal Lahir</span> 
												<input type="date('Y-m-d')" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">No.Telepon</span> 
												<input type="text" class="form-control"  id="telepon" name="telepon" value="<?php echo $row->telepon ?>"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">Umur</span> 
												<input type="text" class="form-control"  id="umur" name="umur"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->umur ?>" ></input> 
											</div> 


											<div class="col-md-6 mb-3"> 
												<span class="input-group-text labelkolom">Alamat Lengkap</span> 
												<textarea type="text" class="form-control"  id="alamat" name="alamat"  onclick="this.blur()" style="border-color: #03b509; background: #ffffff" ><?php echo $row->alamat ?>,  Rt/Rw.<?php echo $row->rt ?>, <?php echo $row->rw ?>,  Desa.<?php echo $row->desa ?>,  Kecamatan.<?php echo $row->kecamatan ?>,  Kabupaten.<?php echo $row->kabupaten ?></textarea> 
											</div> 

											
											
										</div> 

									</div>  
									<br> 

									<div class="form-group row" style="background: #03b509">

										<div class="col-sm-12 float-sm-right">
											<h6 type="button transparent" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px; font-size: 18px;" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA RUJUKAN</b></h6>

										</div>

										<br>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">Nama Yang Bertanda Tangan</span> 
											<input type="text" class="form-control"  id="nama_yang_bertanda_tangan" name="nama_yang_bertanda_tangan"style="border-color: #03b509; background: #ffffff">
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom"> Umur</span> 
											<input type="text" class="form-control"  id="umur_yang_bertanda_tangan" name="umur_yang_bertanda_tangan"style="border-color: #03b509; background: #ffffff" >
										</div> 

										<div class="col-md-6 mb-3"> 
											<span class="input-group-text labelkolom">Alamat Yang Bertanda Tangan</span> 
											<input type="date('Y-m-d')" class="form-control"  id="alamat_yang_bertanda_tangan" name="alamat_yang_bertanda_tangan" style="border-color: #03b509; background: #ffffff" >
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">Di Rujuk Ke</span> 
											<select  class="form-control " id="dirujuk_ke" name="dirujuk_ke">
												<option value="0" selected disabled>--Pilih Rujukan--</option>
												<option value="RAWAT INAP">RAWAT INAP</option>
												<option value="RUMAH SAKIT">RUMAH SAKIT</option> 
											</select>
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">Nama Rumah Sakit</span> 
											<input type="text" class="form-control" id="nama_rumah_sakit" name="nama_rumah_sakit" >
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">KETERANGAN RUJUKAN</span> 
											<input type="date('Y-m-d')" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>" style="border-color: #03b509; background: #ffffff">
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">No.Telepon</span> 
											<input type="text" class="form-control"  id="telepon" name="telepon" value="<?php echo $row->telepon ?>" style="border-color: #03b509; background: #ffffff">
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">Umur</span> 
											<input type="text" class="form-control"  id="umur" name="umur" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->umur ?>" ></input> 
										</div>   

									</div>




								</form>
							</div>
						</div>
					</div>


				</div> 


			<?php } ?>    

		</div>


		<script type="text/javascript">
			$(document).ready(function(){ 
				$('#update_data_rekam').on('click',function(){
					let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
					var tanggal_periksa = $('#tanggal_periksa').val(); 
					var keluhan = $('#keluhan').val(); 
					var hasil_pemeriksaan = $('#hasil_pemeriksaan').val(); 
					var diagnosa = $('#diagnosa').val(); 

					if (tanggal_periksa == "") {
						alert("Tanggal Periksa Belum Terisi");
						$('#tanggal_periksa').focus();
						return false;
					}

					if (keluhan == "") {
						alert("Keluhan Belum Terisi");
						$('#keluhan').focus();
						return false;
					}

					if (hasil_pemeriksaan == "") {
						alert("Hasil Pemeriksaan Belum Terisi");
						$('#hasil_pemeriksaan').focus();
						return false;
					}

					// validasi lewat class
					let cek='';
					$('[name^="nama_obat"]').each(function(){
						var id =$(this).attr('id')[$(this).attr('id').length-1];
						var nama_obat = $('#nama_obat'+id).val();
						var qty = $('#qty'+id).val();
						var takaran = $('#takaran'+id).val();
						var hari = $('#hari'+id).val();
						var aturan_pakai = $('#aturan_pakai'+id).val();
						// if (nama_obat == null) {
						// 	alert("Nama obat Belum Terisi");
						// 	$('#nama_obat'+id).focus();
						// 	cek+='false';

						// 	return false;
						// }

						if (nama_obat != null) {

							if (qty=="") {
								alert("Silahkan masukan Qty!");
								$('#qty'+id).focus();
								cek+='false';

								return false;


							}

							if (takaran=="") {
								alert("Silahkan masukan Takaran Obat!");
								$('#takaran'+id).focus();
								cek+='false';

								return false;
							}

							if (hari=="") {
								alert("Silahkan masukan Hari!");
								$('#hari'+id).focus();
								cek+='false';

								return false;
							}


							if (aturan_pakai==null) {
								alert("Silahkan Pilih Aturan Pakai!");
								$('#aturan_pakai'+id).focus();
								cek+='false';

								return false;
							}
						}


					});

					if (cek=='false') {
						return false;
					}else{

						let link = '<?php echo base_url()?>rekam/updaterekam/'+total_akhir;
						$('.updatedata').attr('action',link);
						$('.updatedata').submit(); 

					}


				});








			</script>











