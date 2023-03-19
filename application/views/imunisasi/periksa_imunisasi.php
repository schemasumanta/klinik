<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<style type="text/css">
			.labelkolom{
				background: #03b509;
				color :white;
			}

			.disnon{
				display: none;
			}
		</style>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<?php foreach ($periksa_imunisasi as $row){ ?>

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



							<button style="background: #ec0a16; color: white; border-radius: 5px 20px; position: left" type="button" class="btn btn-sm " id="btn_riwayat"><i class="fas fa-history mr-1"></i> Cek Riwayat Pasien </button>




							<!-- The modal -->
							<div class="modal fade" id="ModalRiwayatPasienimunisasi" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document" >
									<div class="modal-content" >
										<div class="modal-header" style="background:#115222">
											<h4 class="modal-title" id="modalLabel">Daftar Riwayat Pasien IMUNISASI - <?php echo ucwords($row->nama_pasien) ?></h4>

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

											<div class="container listdetail disnow-100" style="padding: 0px !important; margin: 0px !important;overflow: scroll;">

											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

							<br><br> 

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
													<span class="input-group-text labelkolom">Tanggal</span>
												</div>
												<input type="text" class="form-control"  id="tanggal_berobat" name="tanggal_berobat" value="<?php echo $row->tanggal_berobat ?>">
											</div>


											<div class="col-md-4 mb-3"> 
												<span class="input-group-text labelkolom"> KODE REKAM ANC</span> 
												<input type="text" class="form-control"  id="kode_imunisasi" name="kode_imunisasi" value="<?php echo $row->kode_imunisasi ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()">
											</div>   

											<div class=" col-md-4 mb-3"> 
												<span class="input-group-text labelkolom"> Kepala Keluarga</span> 
												<input type="text" class="form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" >
											</div> 



											<div class="col-md-4 mb-3"> 
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
									<br>
									<div class="form-group row" style="background: #03b509">

										<div class="col-sm-12 float-sm-right">
											<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DIAGNOSIS PASIEN</b></h6>

										</div> 
									</div>

									<div class="col-md-12x mt-3"> 
										<div class="row">
											<div class="col-md-12 mb-3">

												<span class="input-group-text labelkolom">Tanggal Diperiksa</span>

												<input type="date" class="form-control"  id="tanggal_periksa" name="tanggal_periksa" value="<?= date('Y-m-d') ?>" style="border-color: #03b509; background: #ffffff">
											</div>

											<div class=" col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Suhu</span> 
												<input type="text" class="inputatas form-control"  id="suhu" name="suhu" required="required" value="<?php echo $row->suhu ?>">
											</div>


											<div class=" col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Tensi Darah</span>
												<input type="text" class="inputatas form-control"  id="tensi_darah" name="tensi_darah" required="required" value="<?php echo $row->tensi_darah ?>">
											</div>

											<div class=" col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Saturasi</span> 
												<input  type="text" class="inputatas form-control"  id="saturasi" name="saturasi" required="required" value="<?php echo $row->saturasi ?>" >
											</div>



											<div class=" col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Frequansi Pernapasan</span> 
												<input type="text" class="inputatas form-control"  id="pernapasan" name="pernapasan" required="required" value="<?php echo $row->pernapasan ?>">
											</div>

											<div class="col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Frequansi Nadi</span> 
												<input type="text" class="inputatas form-control"  id="nadi" name="nadi" required="required" value="<?php echo $row->nadi ?>">
											</div>

											<div class="col-md-2 mb-3">

												<span class="input-group-text labelkolom">BB</span>

												<input type="text" class="form-control"  id="bb" name="bb" placeholder="Berat Badan" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->bb ?>" >
											</div>

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">TB</span>

												<input type="text" class="form-control"  id="tb" name="tb" value="<?php echo $row->tb ?>" placeholder="Tinggi Badan" style="border-color: #03b509; background: #ffffff" >
											</div>



											<div class="col-md-4 mb-3">

												<span class="input-group-text labelkolom">Kunjungan Neonatus</span> 
												<select type="text" rows="3" class="form-control"  id="kunjungan_neonatus" name="kunjungan_neonatus" style="border-color: #03b509; background: #ffffff" >   

													<option value="0" selected="selected" > Pilih Kunjungan Neonatus</option>
													<option value="KN 1">KN 1</option>
													<option value="KN 2">KN 2</option>
													<option value="KN +2">KN +2</option> 
												</select> 
											</div>





											<div class="col-md-2 mb-3">

												<span class="input-group-text labelkolom">PB</span>

												<input type="text" class="form-control"  id="pb" name="pb" style="border-color: #03b509; background: #ffffff; text-align: center;" >
											</div>



											 

											<div class="col-md-4 mb-3">

												<span class="input-group-text labelkolom">Janis Imunisasi</span>

												<select type="text" rows="3" class="form-control "  id="jenis_imunisasi" name="jenis_imunisasi" style="border-color: #03b509; background: #ffffff" >   

													<option value="0" selected="selected" > Pilih Jenis Imunisasi</option>
													<option value="VIT K">VIT K</option>
													<option value="HBO">HBO</option>
													<option value="BCG">BCG</option>
													<option value="POLIO 1">POLIO 1</option>
													<option value="COMBO 1">COMBO 1</option>
													<option value="POLIO 2">POLIO 2</option>
													<option value="COMBO 2">COMBO 2</option>
													<option value="POLIO 3">POLIO 3</option>
													<option value="COMBO 3">COMBO 3</option>
													<option value="POLIO 4">POLIO 4</option>
													<option value="MR">MR</option>
													<option value="MR">MR</option>
													<option value="IPV">IPV</option>
													<option value="MR BOOSTER">MR BOOSTER</option>
													<option value="COMBO BOOSTER">COMBO BOOSTER</option>
													<option value="POLIO 1 + BCG">POLIO 1 + BCG</option>
													<option value="POLIO 2 COMBO 1">POLIO 2 COMBO 1</option>
													<option value="POLIO 3 + COMBO 2">POLIO 3 + COMBO 2</option>
													<option value="POLIO 4 + COMBO 3">POLIO 4 + COMBO 3</option>
													<option value="VIT K + HBO">VIT K + HBO</option>
													<option value="POLIO 4 + COMBO 3 + IPV">POLIO 4 + COMBO 3 + IPV</option>


												</select> 
											</div>

											<div class="col-md-6 mb-3">

												<span class="input-group-text labelkolom">Diagnosa</span>

												<textarea type="text" class="form-control"  id="diagnosa" name="diagnosa"   style="border-color: #03b509; background: #ffffff" ></textarea>
											</div>  

											<div class="col-md-6 mb-3">
												<span class="input-group-text labelkolom">Tindakan Dokter</span>
												<textarea type="text" rows="2" class="form-control"  id="tindakan_dokter" name="tindakan_dokter"  style="border-color: #03b509; background: #ffffff">   </textarea>
											</div> 

										</div>


										<br> <br> 

										<div class="form-group row" style="background: #03b509">

											<div class="col-sm-12 float-sm-right">
												<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>TERAPI / PEMBERIAN OBAT</b></h6> 
											</div>  
										</div>
										<br>
													<!-- <a href="javascript;" id="btn_lihat_obat" class="mt-1 btn btn-danger btn-sm btn-xs mb-2 ml-1" data-toggle="modal" data-target="#modal_lihat" >Lihat Stok</a>
													-->
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
														<input type="text" class="form-control" id="qty1" name="qty[]" onkeypress="return isNumberKey(event)" onkeyup="hitungsubtotal(1)" placeholder="Qty"  style="border-color: #03b509; background: #ffffff">  

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
														<button id="hapusobat1'" type="button" class="btn btn-sm btn-danger" onclick="hapusobat(1)">-</button>
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
														<a href="<?php echo site_url('imunisasi') ?>" class="btn btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
														<button id="simpan_data_anc" type="button" class="btn btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> SIMPAN DATA REKAM</button> 
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
					$(document).ready(function(){
						$('#nama_obat1').select2({
							placeholder:"Pilih Obat",
							allowClear: true,
						});
						hitungtotalakhir();
					})

					$('#simpan_data_anc').on('click',function(){
						let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');

						var tanggal_periksa = $('#tanggal_periksa').val(); 


						if (tanggal_periksa == "") {
							alert("Tanggal Periksa Belum Terisi");
							$('#tanggal_periksa').focus();
							return false;
						}


						var jumlah_obat = $('.listobat').length;
						for (var i = 1; i <= jumlah_obat; i++) { 
							var nama_obat = $('#nama_obat'+i).val();
							var qty = $('#qty'+i).val();
							var takaran = $('#takaran'+i).val();
							var hari = $('#hari'+i).val();
							var aturan_pakai = $('#aturan_pakai'+i).val();




						// if (nama_obat == null) {
						// 	alert("Nama obat Belum Terisi");
						// 	$('#nama_obat'+i).focus();
						// 	return false;
						// }else{
						// 	if (qty=="") {
						// 		alert("Silahkan masukan Qty!");
						// 		$('#qty'+i).focus();
						// 		return false;
						// 	}

						// 	if (takaran=="") {
						// 		alert("Silahkan masukan Takaran Obat!");
						// 		$('#takaran'+i).focus();
						// 		return false;
						// 	}

						// 	if (hari=="") {
						// 		alert("Silahkan masukan Hari!");
						// 		$('#hari'+i).focus();
						// 		return false;
						// 	}


						// 	if (aturan_pakai==null) {
						// 		alert("Silahkan Pilih Aturan Pakai!");
						// 		$('#aturan_pakai'+i).focus();
						// 		return false;
						// 	}
						// }


					}
					let link = '<?php echo base_url()?>imunisasi/simpanrekam_imunisasi/'+total_akhir;
					$('.simpandata').attr('action',link);
					$('.simpandata').submit(); 


				});

					function cekobat(id){
						let nama_obat = $('#nama_obat'+id+' option:selected').text();

						let cek =0;
						$('[name^="nama_obat"]').each(function(){
							let obat = $('#'+$(this).attr('id')+" option:selected").text();
							if (obat==nama_obat) {
								cek+=1;								
							}

						});

						if (cek>1) {
							alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
							$('#nama_obat'+id).val(0);

							reset(id);
							hitungtotalakhir();	
							return false;
						}

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


					$('#btn_riwayat').on('click',function(){
						let kode_pasien =$('#kode_pasien').val(); 
						let kategori ='imunisasi';
						$.ajax({
							type  : 'GET',
							url   : '<?php echo base_url()?>imunisasi/riwayat_rekam_imunisasi',
							dataType : 'json',
							data:{'kode_pasien':kode_pasien,'kategori':kategori},
							success : function(data){
								$('#ModalRiwayatPasienimunisasi').modal('show');
								$('#list_riwayat').html(data.riwayat);
									// $('.listdetail').html(data.list); 

								}

							});

					});



					function showdetail(kode){

						let kode_imunisasi = $('#kode_imunisasi'+kode).html().replace('/','garing'); 
						$('.riwayat').each(function(){
							let id = $(this).attr('data');
							if (id==kode) {
								let mata = $('.riwayat'+kode).html();
								if (mata.includes('dark')==true) {
									$('.riwayat'+kode).html('<i class="fa fa-eye-slash text-danger"></i>');
									$('.detail'+kode).removeClass('disnon');
									$('.listdetail').removeClass('disnon');
									$('.head_riwayat'+kode).css('background','#fff7bd'); 

								}else{
									$('.riwayat'+kode).html('<i class="fa fa-eye text-dark"></i>');
									$('.detail'+kode).addClass('disnon');
									$('.listdetail').addClass('disnon');
									$('.head_riwayat'+kode).css('background','transparent'); 

								}
							}else{
								$('.riwayat'+id).html('<i class="fa fa-eye text-dark"></i>');
								$('.detail'+id).addClass('disnon');
								$('.head_riwayat'+id).css('background','transparent');

							}
						});

						$(".listdetail").load("<?php echo base_url()?>imunisasi/detail_riwayat/"+kode_imunisasi);

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
					'<input type="text" class="form-control" id="qty'+kode_baru+'" name="qty[]" onkeypress="return isNumberKey(event)" onkeyup="hitungsubtotal('+kode_baru+')" placeholder="Qty" style="border-color: #03b509; background: #ffffff"> '+ 

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
					'<select class="form-control" id="aturan_pakai'+kode_baru+'" name="aturan_pakai[]" style="border-color: #03b509; background: #ffffff">'+
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











