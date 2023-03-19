<div class="main-panel">
	<div class="content" >
		<div class="page-inner">
			<style type="text/css">
				.labelkolom{
					background: #03b509;
					color :white;
				}


				.gambar{
					width: 50px;
				}
				.disnon{
					display: none;
				}

				.inputatas{
					text-align: center;
					border-color: #03b509; 
					background: #ffffff;
				}

				.textarea_atas{
					border-color: #03b509; 
					background: #ffffff;
				}
				.listdetail{
					border-top-left-radius: 15px;
					border-bottom-right-radius: 15px;

					border : 1px solid #dce0dd;
					padding-top: 15px;
				}
				.juduldetail{
					font-weight: bold;
					text-align: center;
				}

			</style>
			<div class="row" style="color: black">
				<div class="col-md-12">
					<div class="card">
						<?php foreach ($periksa_pasien as $row){ ?>

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
									<form class="form-horizontal simpandata" method="post" id="form1" name="form1">
										

										<div class="form-group row" style="background: #03b509">

											<div class="col-sm-12 float-sm-right">
												<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA PASIEN</b></h6>

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


												<div class=" col-md-4 mb-3"> 
													<span class="input-group-text labelkolom"> Kode Rekam</span> 
													<input onclick="this.blur()"  type="text" class="textarea_atas form-control"  id="kode_swab" name="kode_swab" value="<?php echo $row->kode_swab ?>" >
												</div>  
												
												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">Status Pasien</span> 
													<input type="text"  onclick="this.blur()"class="textarea_atas form-control"  id="status_pasien" name="status_pasien"   value="<?php echo $row->status_pasien ?>">
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolom"> Kepala Keluarga</span> 
													<input type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>"   >
												</div> 

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">Tempat Lahir</span> 
													<input type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>"   >
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">Tanggal Lahir</span> 
													<input type="date "  onclick="this.blur()" class="textarea_atas form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>"  >
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">No.Telepon</span> 
													<input type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="telepon" name="telepon" value="<?php echo $row->telepon ?>"  >
												</div>


												<div class="col-md-11 mb-3"> 
													<span class="input-group-text labelkolom">Alamat Lengkap</span>
													<textarea type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="alamat" name="alamat"   ><?php echo $row->alamat ?></textarea> 
												</div> 


												<div class="col-md-1 mb-3"> 
													<span class="input-group-text labelkolom">Umur</span> 
													<textarea type="text"  onclick="this.blur()" style="text-align: center;border-color: #03b509; background: #ffffff" class="form-control"  id="umur" name="umur"   ><?php echo $row->umur ?></textarea> 
												</div>
												
											</div> 

										</div>  
										<!-- <button class="btn btn-danger btn-circle btn-lg"  data-toggle="modal" data-target=".bd-example-modal-sm"> <i class="fas fa-history mr-1"></i> Cek Riwayat Pasien</button> -->
										<!-- <button style="background: #ec0a16; color: white;" type="button" class="btn btn-sm" id="btn_riwayat"><i class="fas fa-history mr-1"></i> Cek Riwayat Pasien </button> -->

										<!-- The modal -->
										<div class="modal fade" id="ModalRiwayatPasien" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document" >
												<div class="modal-content" >
													<div class="modal-header" style="background:#115222">
														<h4 class="modal-title" id="modalLabel">Daftar Riwayat Pasien Umum - <?php echo ucwords($row->nama_pasien) ?></h4>

														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body ml-2">


														<table class="table table-bordered table-striped" border="3">
															<thead>
																<tr style="text-align: center;background: #03b509;color: white">
																	<th width="1px">#</th>
																	<th>Kode Rekam</th>
																	<th>Tanggal Berobat</th>
																	<th>Tanggal Diperiksa</th>
																	

																</tr>
															</thead>
															<tbody id="list_riwayat">

															</tbody>
															
															
														</table>

														<div class="container listdetail disnon">

														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<br><br> 
										<div class="form-group row" style="background: #03b509">

											<div class="col-sm-12 float-sm-right">
												<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DIAGNOSIS PASIEN</b></h6>

											</div> 
										</div>

										<div class="col-md-12x mt-3"> 
											<div class="row"> 

												<div class="col-md-12 mb-3"> 
													<span class="input-group-text labelkolom">Tanggal Diperiksa</span> 
													<input type="date" class="textarea_atas form-control"  id="tanggal_periksa" name="tanggal_periksa" value="<?= date('Y-m-d') ?>" required="required">
												</div>



												

												<div class=" col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">Pemeriksaan</span> 
													<select  type="text" class="inputatas form-control"  id="pemeriksaan" name="pemeriksaan" required="required">
														<option value="0" > -- Pilih Pemeriksaan--</option>
														<option value="Antigen SARS CoV2"> Antigen SARS CoV2</option> 
													</select>
												</div>


												<div class=" col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">Hasil Pemeriksaan</span> 
													<select  type="text" class="inputatas form-control"  id="hasil" name="hasil" required="required">
														<option value="0" > -- Pilih Hasil Pemeriksaan--</option>
														<option value="Negatif"> Negatif</option>
														<option value="Positif"> Positif</option>
													</select>
												</div>


												<div class=" col-md-4 mb-3"> 
													<span class="input-group-text labelkolom">Nilai Normal</span> 
													<select  type="text" class="inputatas form-control"  id="nilai_normal" name="nilai_normal" required="required">
														<option value="0" > -- Pilih Nilai Normal--</option>
														<option value="Negatif"> Negatif</option>
														<option value="Positif"> Positif</option>
													</select>
												</div>

												<div class="col-md-6 mb-3"> 
													<span class="input-group-text" style="background: #03b509;color :white">Tanggal Pengambilan Spesimen</span> 
													<input type="date" class="form-control"  id="tanggal_pengambilan_spesimen" name="tanggal_pengambilan_spesimen"style="border-color: #03b509; background: #ffffff" >
												</div>

												<div class="col-md-6 mb-3"> 
													<span class="input-group-text" style="background: #03b509;color :white">tanggal_keluar_hasil</span> 
													<input type="datetime-local" class="form-control"  id="tanggal_keluar_hasil" name="tanggal_keluar_hasil"style="border-color: #03b509; background: #ffffff" >
												</div>

												<div class="col-md-8 mb-3"> 
													<span class="input-group-text" style="background: #03b509;color :white">Metode Pemeriksaan</span> 
													<input type="text" class="form-control"  id="metode_pemeriksaan" name="metode_pemeriksaan"style="border-color: #03b509; background: #ffffff" >
												</div>


												<div class="col-md-4 mb-3"> 
													<span class="input-group-text" style="background: #03b509;color :white">Dokter Pengirim</span> 
													<input type="text" class="form-control"  id="dokter_pengirim" name="dokter_pengirim"style="border-color: #03b509; background: #ffffff" >
												</div>


											</div> <br>  

											<div class="row mb-6">
												<div class="col-md-3"></div>
												<div class="mb-3 col-md-3 ">  </div>  
												<div class="mb-3 col-md-3 "> 
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Pemeriksaan swab</span> 
													<input type="text" onkeyup="hitung()" class="form-control" name="pemeriksaan_swab" id="pemeriksaan_swab" value="0" onfocusout="SeparatorRibuan(this.value,this.id)"  >
												</div> 



												<div class="col-md-3  mb-3"> 
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Total Akhir</span> 
													<input type="text" class="form-control" name="total_akhir[]" id="total_akhir" style="text-align: right;font-weight: bold;font-size: 18px;" value="0"  onclick="this.blur()" onfocusout="SeparatorRibuan(this.value,this.id)" >
												</div> 

												<hr>
												<br>
												<div class="col-md-12" style="margin-top: 70px;">

													<a href="<?php echo site_url('swab') ?>" class="btn btn-sm btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
													<button id="simpan_data_swab" type="button" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> SIMPAN DATA REKAM</button> 
												</div> 
											</div>
										</div> 

										<br>
										<br>
										<br>


										<hr> 

									</div>
									<!-- ?= form_close(); ?> -->
								</form>
							</div>
						</div>
					</div>


				</div> 


			<?php } ?>    

		</div>





		<script type="text/javascript">

			$(document).ready(function(){
				hitung();
			}) 

			function hitung(){ 


				var pemeriksaan_swab = $('#pemeriksaan_swab').val().toString().replace(/\./g,''); 

				let total = parseFloat(pemeriksaan_swab);
				$('#total_akhir').val(total); 

			}




			$('#simpan_data_swab').on('click',function(){
				let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');

				var tanggal_periksa = $('#tanggal_periksa').val(); 


				if (tanggal_periksa == "") {
					alert("Tanggal Periksa Belum Terisi");
					$('#tanggal_periksa').focus();
					return false;
				}



				let link = '<?php echo base_url()?>swab/simpan/'+total_akhir;
				$('.simpandata').attr('action',link);
				$('.simpandata').submit(); 


			});  





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











