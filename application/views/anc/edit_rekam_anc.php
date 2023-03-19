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
					<?php foreach ($edit_rekam_anc as $row){ ?>

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
											<h6 type="button transparent" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA PASIEN</b></h6>

										</div>


									</div>

									<div class="col-md-12x mt-3"> 
										<div class="row"> 
											<input style="display: none;" type="text" class="form-control"  id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" >
											<input style="display: none;" type="text" class="form-control"  id="kode_pembayaran" name="kode_pembayaran" value="<?php echo $row->kode_pembayaran ?>" >
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


											<div class="col-md-4 mb-3">
												<span class="input-group-text labelkolom"> Kode Pendaftaran</span>
												<input type="text" class="form-control"  id="kode_kehamilan" name="kode_kehamilan" value="<?php echo $row->kode_kehamilan ?>"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff" >
											</div>  


											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom"> Kepala Keluarga</span>
												<input type="text" class="form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff"  >
											</div> 

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Tempat Lahir</span>
												<input type="date('Y-m-d')" class="form-control"  id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff"  >
											</div>

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Tanggal Lahir</span>
												<input type="date('Y-m-d')" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff" >
											</div>

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">No.Telepon</span>
												<input type="text" class="form-control"  id="telepon" name="telepon" value="<?php echo $row->telepon ?>"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff" >
											</div>


											<div class="col-md-6 mb-3">
												<span class="input-group-text labelkolom">Alamat Lengkap</span>
												<textarea type="text" class="form-control"  id="alamat" name="alamat"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff"  ><?php echo $row->alamat ?></textarea> 
											</div> 

											<div class="col-md-4 mb-3">
												<span class="input-group-text labelkolom">Status Pasien</span>
												<textarea type="text" class="form-control"  id="status_pasien" name="status_pasien"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff"> <?php echo $row->status_pasien ?></textarea>
											</div>


											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Umur</span>
												<textarea type="text" class="form-control"  id="umur" name="umur"  onclick="this.blur()"  style="border-color: #03b509; background: #ffffff; text-align: center;"> <?php echo $row->umur ?></textarea>
											</div>


										</div> 

									</div>  
									<br>
									<div class="form-group row" style="background: #03b509">

										<div class="col-sm-12 float-sm-right">
											<h6 type="button transparent" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DIAGNOSIS PASIEN</b></h6>

										</div> 
									</div>

									<div class="col-md-12x mt-3"> 
										<div class="row">
											<div class="col-md-12 mb-3">
												<span class="input-group-text labelkolom">Tanggal Diperiksa</span>
												<input type="date" class="form-control"  id="tanggal_periksa" name="tanggal_periksa" value="<?php echo $row->tanggal_periksa  ?>"  style="border-color: #03b509; background: #ffffff">
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
												<span class="input-group-text labelkolom">Berat Badan</span>
												<input type="text" class="form-control"  id="bb" name="bb"  style="border-color: #03b509; background: #ffffff"  value="<?php echo $row->bb ?>">
											</div>

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Tinggi Badan</span>
												<input type="text" class="form-control"  id="tb" name="tb"  style="border-color: #03b509; background: #ffffff"  value="<?php echo $row->tb ?>">
											</div> 


											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">UK</span>
												<input type="text" class="form-control"  id="uk" name="uk"  style="border-color: #03b509; background: #ffffff" value="<?php echo $row->uk ?>" >
											</div>


											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Akseptor</span>
												<input class="form-control " id="paritas" name="paritas" value="paritas">

											</div>

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Jarak</span>
												<input type="text" class="form-control"  id="jarak" name="jarak"  style="border-color: #03b509; background: #ffffff"  value="<?php echo $row->jarak ?>">
											</div> 

											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">TD</span>
												<input type="text" class="form-control"  id="td" name="td"  style="border-color: #03b509; background: #ffffff"  value="<?php echo $row->td ?>">
											</div>  

										</div>

										<hr> 
										<div class="row"> 
											<div class="col-md-2 mb-3">
												<span class="input-group-text labelkolom">Lila</span>
												<input type="text" class="form-control"  id="lila" name="lila" value="<?php echo $row->lila ?>" > 
											</div> 


											<div class="col-md-4 mb-3">
												<span class="input-group-text labelkolom">Imunisasi TT</span>
												<select type="text" rows="3" class="form-control"  id="imunisasi_tt"  name="imunisasi_tt"  value="<?php echo $row->imunisasi_tt ?>"  style="border-color: #03b509; background: #ffffff" >   

													<option value="<?php echo $row->imunisasi_tt ?>" selected="selected" ><?php echo $row->imunisasi_tt ?></option>
													<option value="TT1">TT1</option>
													<option value="TT2">TT2</option>
													<option value="TT3">TT3</option>
													<option value="TT4">TT4</option>
													<option value="TT5">TT5</option>

												</select> 
											</div>


											<div class="col-md-3 mb-3">
												<span class="input-group-text labelkolom">Jenis Kunjungan</span>
												<select type="text" rows="3" class="form-control"  id="jenis_kunjungan" name="jenis_kunjungan"  value="<?php echo $row->jenis_kunjungan ?>"  style="border-color: #03b509; background: #ffffff" >   

													<option value="<?php echo $row->jenis_kunjungan ?>" selected="selected" ><?php echo $row->jenis_kunjungan ?></option>
													<option value="K1">K1</option>
													<option value="K2">K2</option>
													<option value="K3">K3</option>
													<option value="K4">K4</option> 

												</select> 
											</div>
											<div class="col-md-3 mb-3">
												<span class="input-group-text labelkolom">Tablet FE</span>
												<select type="text" rows="3" class="form-control"  id="table_fe" name="table_fe"  value="<?php echo $row->table_fe ?>"   style="border-color: #03b509; background: #ffffff" >

													<option value="<?php echo $row->table_fe ?>" selected="selected" ><?php echo $row->table_fe ?></option>
													<option value="FE1">FE1</option>
													<option value="FE2">FE2</option>

												</select>  
											</div>



											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom" style="">HPHT</span> 
												<input type="date" rows="3" class="form-control"  id="hpht" name="hpht"  style="border-color: #03b509; background: #f18d8d"  value="<?php echo $row->hpht ?>"> 
											</div>

											<div class="col-md-3 mb-3"> 
												<span class="input-group-text labelkolom">HTP</span> 
												<input type="date" rows="3" class="form-control"  id="htp" name="htp"  style="border-color: #03b509; background: #f18d8d"  value="<?php echo $row->htp ?>"> 
											</div>

											<div class="col-md-3 mb-3">
												<span class="input-group-text labelkolom">Riwayar Persalinan</span>
												<select type="text" rows="3" class="form-control"  id="riwayat_persalinan" name="riwayat_persalinan"  value="<?php echo $row->riwayat_persalinan ?>"  style="border-color: #03b509; background: #ffffff" > 

													<option value="<?php echo $row->riwayat_persalinan ?>" selected="selected" > <?php echo $row->riwayat_persalinan ?></option>
													<option value="PENDARAHAN">PENDARAHAN</option>
													<option value="DISTOSIA">DISTOSIA</option>
													<option value="PREKLAMSI / EXLAMPSI">PREKLAMSI / EXLAMPSI</option>
													<option value="LASERASI D IV">LASERASI D IV</option>
													<option value="SUNGSANG">SUNGSANG</option>
													<option value="BAYI BESAR 4KG">BAYI BESAR 4KG</option>
													<option value="PLASENTA PREVIE">PLASENTA PREVIE</option>
													<option value="ANEMIA">ANEMIA</option>
													<option value="FAKTOR IBU">FAKTOR IBU</option>
													<option value="KPD">KPD</option>
													<option value="PREMATURE">PREMATURE</option>
													<option value="PEMBUKAAN STAGNAN">PEMBUKAAN STAGNAN</option>
													<option value="RETPLAS">RETPLAS</option>
													<option value="SYOK">SYOK</option>

												</select>
											</div>


											<div class="col-md-3 mb-3">

												<span class="input-group-text labelkolom">Resti Yang Ada</span>

												<select type="text" rows="3" class="form-control"  id="resti_yang_ada" name="resti_yang_ada"  value="<?php echo $row->resti_yang_ada ?>"  style="border-color: #03b509; background: #ffffff" > 

													<option value="<?php echo $row->resti_yang_ada ?>" selected="selected" ><?php echo $row->resti_yang_ada ?></option>
													<option value="TB < 145">TB < 145</option>
													<option value="PANGGUL SEMPIT">PANGGUL SEMPIT</option>
													<option value="USIA <20> 35">USIA <20> 35</option>
														<option value="MULTIGRAVIDA">MULTIGRAVIDA >4</option>
														<option value="JARAK KELAHIRAN 2 TAHUN">JARAK KELAHIRAN 2 TAHUN</option>
														<option value="PENGULIT PERSALINAN SEBELUMNYA">PENGULIT PERSALINAN SEBELUMNYA</option>
														<option value="SERING KE GUGURAN">SERING KE GUGURAN</option>
														<option value="RIWAYAT SC">RIWAYAT SC</option>
														<option value="HIPERTENSI">HIPERTENSI</option>
														<option value="DM">DM</option>
														<option value="ASMA">ASMA</option>
														<option value="PENDARAHAN">PENDARAHAN</option> 
													</select>
												</div>

												<div class="col-md-3 mb-3"> 
													<span class="input-group-text labelkolom">Tinggi Pundus (cm)</span> 
													<input type="text" rows="3" class="form-control"  id="tinggi_pundus" name="tinggi_pundus" value="<?php echo $row->tinggi_pundus ?>"  style="border-color: #03b509; background: #ffffff" > 
												</div>

												<div class="col-md-3 mb-3">

													<span class="input-group-text labelkolom">Letak Jenis</span>

													<select type="text" rows="3" class="form-control"  id="letak_janin" name="letak_janin"  style="border-color: #03b509; background: #ffffff" > 

														<option value="<?php echo $row->letak_janin ?>" selected="selected" ><?php echo $row->letak_janin ?></option> 
														<option value="Kep">Kep</option>
														<option value="Su">Su</option>
														<option value="Li">Li</option> 
													</select>
												</div>


												<div class="col-md-3 mb-3"> 
													<span class="input-group-text labelkolom">Denyut Jantung Lain</span> 
													<input type="text" rows="3" class="form-control"  id="denyut_jantung" name="denyut_jantung" value="<?php echo $row->denyut_jantung ?>"  style="border-color: #03b509; background: #ffffff" > 
												</div>

												<div class="col-md-3 mb-3">
													<span class="input-group-text labelkolom">Penunjang</span>
													<input type="text" rows="3" class="form-control"  id="penunjang" name="penunjang"  value="<?php echo $row->penunjang ?>"   style="border-color: #03b509; background: #ffffff" >

												</div>


												<div class="col-md-4 mb-3">
													<span class="input-group-text labelkolom">Keluhan</span>
													<textarea type="text" rows="2" class="form-control"  id="keluhan" name="keluhan"  style="border-color: #03b509; background: #ffffff"><?php echo $row->keluhan ?></textarea>  
												</div>



												<div class="col-md-4 mb-3">
													<span class="input-group-text labelkolom">Tindakan/Rencana</span>
													<textarea type="text" class="form-control"  id="tindakan_dokter" name="tindakan_dokter"  style="border-color: #03b509; background: #ffffff" ><?php echo $row->tindakan_dokter ?></textarea> 
												</div>

												<div class="col-md-4 mb-3">
													<span class="input-group-text labelkolom">Keterangan</span>
													<textarea type="text" class="form-control"  id="keterangan" name="keterangan"  style="border-color: #03b509; background: #ffffff" ><?php echo $row->keterangan ?></textarea> 
												</div>

											</div> 



											<br> <br> 

											<div class="form-group row" style="background: #03b509">

												<div class="col-sm-12 float-sm-right">
													<h6 type="button transparent" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>TERAPI / PEMBERIAN OBAT</b></h6> 
												</div>  
											</div>
											<br>
											<!-- <a href="javascript;" id="btn_lihat_obat" class="mt-1 btn btn-danger btn-sm btn-xs mb-2 ml-1" data-toggle="modal" data-target="#modal_lihat" >Lihat Stok</a> -->
											<!-- awal -->

											<div class="card-body" style="background: #f2f2f5; border-color: #ff1201">
												<span>Keterangan</span> <br>
												<span style="color:#ff1201 ">* Untuk Penulisan aturan pakai harus di sambung dan tidak boleh ada spasi </span><br>
												<span style="color:#ff1201 ">* Contoh penulisan Dosis Obat : 1x3</span>
											</div>
											<br>
											<?php $i=1; foreach ($detail_obat as $key) {?>
												<div class="row" id="obat<?php echo $i ?>" style="border: 1px solid #e4e4e4;padding-top: 10px"> 
													<div class="input-group mb-3 col-md-8 listobat">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span>
														</div> 

														<select type="text" class="form-control " satuan="<?php echo $key->satuan_obat ?>" data="<?php echo $key->nama_obat ?>" id="nama_obat<?php echo $i ?>" <?php $aturan=explode(' x ', $key->aturan_pakai);?> aturan_pakai="<?php echo $aturan[2] ?>" hari="<?php echo $aturan[1] ?>" dosis="<?php echo $aturan[0]; ?>"  name="nama_obat[]" onchange="cekobat(<?php echo $i; ?>)"   style="border-color: #03b509; background: #ffffff">
															<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>
															<?php foreach ($obat as $data) { ?>
																<?php if ($data->total_stok!=0): ?>

																	<option id="<?php echo $data->total_stok + floatval($key->qty); ?>" isi="<?php echo $data->keterangan ?>" subject="<?php echo $data->harga_jual ?>" data="<?php echo $data->satuan_obat ?>" value="<?php echo $data->kode_obat ?>"><?php echo $data->nama_obat ?></option>	
																<?php endif ?>
															<?php } ?> 
														</select>   

														<div class="input-group-prepend">
															<span class="input-group-text" id="satuan_obat<?php echo $i ?>" name="satuan_obat[]" style="background:#03b509; color: white"></span>
															<input type="hidden" class="form-control" id="satuan<?php echo $i ?>" name="satuan[]" >
														</div>

													</div>

													<div class="input-group mb-3 col-md-4">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>
														</div>
														<input type="text" class="form-control" id="qty<?php echo $i ?>" name="qty[]" onkeyup="hitungsubtotal(<?php echo $i ?>)" placeholder="Qty" value="<?php echo $key->qty ?>" style="border-color: #03b509; background: #ffffff" >  

													</div>



													<div class="input-group mb-3 col-md-2" style="display: none;">
														<div class="input-group-prepend"> 
															<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Stok</span> 
														</div>
														<input type="text" class="form-control" id="total_stok<?php echo $i ?>" name="total_stok[]"  value="<?php echo floatval($key->total_stok) + floatval($key->qty)?>"readonly>	

													</div>   



													<div class="input-group mb-3 col-md-2" style="display: none;">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Harga</span>
														</div> 
														<input type="text" class="form-control" id="harga_jual<?php echo $i ?>" value="<?php echo number_format(($key->harga_jual), 0, ',', '.')?>" name="harga_jual[]" readonly >
													</div> 






													<div class="input-group mb-3 col-md-12">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
														</div>
														<input type="text" class="form-control" id="takaran<?php echo $i ?>" name="takaran[]" placeholder="Dosis"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff" >  
														<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>
														<select type="text" class="form-control" id="hari<?php echo $i ?>" name="hari[]" placeholder="Hari"  width="5px" style="border-color: #03b509; background: #ffffff" >  
															<option value="0" selected disabled>Pilih Racik</option> 
															<option value="Puyer">Puyer</option>
															<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>
															<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>
															<option value="Puyer_15_bungkus">Puyer_15_bungkus</option> 
															<option value="NonPuyer">NonPuyer</option>
														</select>  
														<select class="form-control" id="aturan_pakai<?php echo $i ?>" name="aturan_pakai[]"  style="border-color: #03b509; background: #ffffff" >
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

													<div class="input-group mb-3 keterangan_obat<?php echo $i?> col-md-12" style="display: none;">
														<span class="input-group-text" id="keterangan_obat<?php echo $i ?>" style="background:#e27300; color: white;"></span>

													</div> 






													<div class="input-group mb-3 col-md-4" style="display: none">
														<div class="input-group-prepend">
															<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>
														</div>
														<input type="text" class="form-control" id="subtotal<?php echo $i ?>" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly" value="<?php echo number_format(($key->subtotal), 0, ',', '.') ?>">  
													</div>  

													<div class="input-group mb-3 col-md-2" id="btn-groupobat<?php echo $i ?>">
														<button id="tambahobat<?php echo $i ?>" type="button" class="btn btn-sm btn-success btn_tambah mr-2" onclick="tambahobat(<?php echo $i ?>)">+</button>

														<button id="hapusobat<?php echo $i ?>" type="button" class="btn btn-sm btn-danger mr-2" onclick="hapusobat(<?php echo $i ?>)">-</button>

													</div>

												</div> 

												<?php $i++; } ?>

												<!-- akhir -->
												<br> 

												<div class="row">
													<div class="col-md-4 mb-3"> </div>
													<div class="col-md-4 mb-3"> 
														<span class="input-group-text labelkolom">Jasa Dokter</span> 
														<input type="text" class="form-control" name="tarif_dokter" id="tarif_dokter" value="<?php echo number_format($row->upah_dokter, 0, ',', '.') ?>" disabled>
													</div>

													<div class="col-md-4 mb-3"> 
														<span class="input-group-text labelkolom">Total Akhir</span> 
														<input type="text" class="form-control" name="total_akhir[]" id="total_akhir" style="text-align: right;font-weight: bold;font-size: 18px;" disabled>
													</div>

												</div>

												<div class="row mb-6">

													<div class="col-md-12" style="margin-top: 70px;">

														<a href="<?php echo site_url('anc') ?>" class="btn btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
														<button id="update_data_rekam" type="button" class="btn btn-primary mr-2" style="float:right" > <i class="fa fa-edit  mr-2"></i> UPDATE DATA REKAM</button> 
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
					$(document).ready(function(){

						let jumlah_obat = "<?php echo count($detail_obat) ?>";
						$('.btn_tambah').each(function(){
							let id = $(this).attr('id');
							if (id=='tambahobat'+jumlah_obat) {
								$(this).css('display','');
							}else{
								$(this).css('display','none');

							}
						});
						for (var i= 1;i<=jumlah_obat; i++) {
							let obat = $('#nama_obat'+i).attr('data');
							let satuan = $('#nama_obat'+i).attr('satuan');
							let dosis = $('#nama_obat'+i).attr('dosis');
							let hari = $('#nama_obat'+i).attr('hari');
							let aturan_pakai = $('#nama_obat'+i).attr('aturan_pakai');



							$('#satuan_obat'+i).html(satuan);
							$('#takaran'+i).val(dosis);
							$('#hari'+i).val(hari);

							$('#aturan_pakai'+i+' option').each(function(){
								let pilihan_aturan = $(this).val();
								if (aturan_pakai==pilihan_aturan) {
									$(this).attr('selected','selected');
								}
							});


							$('#nama_obat'+i+' option').each(function(){
								let pilihan_obat = $(this).html();
								if (obat==pilihan_obat) {
									$(this).attr('selected','selected');
								}
							});

						}
						hitungtotalakhir();



					});
					$('#update_data_rekam').on('click',function(){
						let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
						// var tanggal_periksa = $('#tanggal_periksa').val(); 
						// var keluhan = $('#keluhan').val(); 
						// var hasil_pemeriksaan = $('#hasil_pemeriksaan').val(); 
						// var diagnosa = $('#diagnosa').val(); 

						// if (tanggal_periksa == "") {
						// 	alert("Tanggal Periksa Belum Terisi");
						// 	$('#tanggal_periksa').focus();
						// 	return false;
						// }

						// if (keluhan == "") {
						// 	alert("Keluhan Belum Terisi");
						// 	$('#keluhan').focus();
						// 	return false;
						// }

						// if (hasil_pemeriksaan == "") {
						// 	alert("Hasil Pemeriksaan Belum Terisi");
						// 	$('#hasil_pemeriksaan').focus();
						// 	return false;
						// }

					// validasi lewat class
					let cek='';
					$('[name^="nama_obat"]').each(function(){
						var id =$(this).attr('id')[$(this).attr('id').length-1];
						var nama_obat = $('#nama_obat'+id).val();
						var qty = $('#qty'+id).val();
						var takaran = $('#takaran'+id).val();
						var hari = $('#hari'+id).val();
						var aturan_pakai = $('#aturan_pakai'+id).val();

						if (nama_obat == null) {
							alert("Nama obat Belum Terisi");
							$('#nama_obat'+id).focus();
							cek+='false';

							return false;
						}

						// if (nama_obat != null) {

						// 	if (qty=="") {
						// 		alert("Silahkan masukan Qty!");
						// 		$('#qty'+id).focus();
						// 		cek+='false';

						// 		return false;


						// 	}

						// 	if (takaran=="") {
						// 		alert("Silahkan masukan Takaran Obat!");
						// 		$('#takaran'+id).focus();
						// 		cek+='false';

						// 		return false;
						// 	}

						// 	if (hari=="") {
						// 		alert("Silahkan masukan Hari!");
						// 		$('#hari'+id).focus();
						// 		cek+='false';

						// 		return false;
						// 	}


						// 	if (aturan_pakai==null) {
						// 		alert("Silahkan Pilih Aturan Pakai!");
						// 		$('#aturan_pakai'+id).focus();
						// 		cek+='false';

						// 		return false;
						// 	}
						// }


					});

					if (cek=='false') {
						return false;
					}else{

						let link = '<?php echo base_url()?>anc/updaterekam_anc/'+total_akhir;
						$('.updatedata').attr('action',link);
						$('.updatedata').submit(); 

					}


				});

					function cekobat(id){

						let nama_obat = $('#nama_obat'+id+' option:selected').text();						
						reset(id);

						hitungtotalakhir();

						let cek =0;
						$('[name^="nama_obat"]').each(function(){
							let obat = $('#'+$(this).attr('id')+" option:selected").text();
							if (obat==nama_obat) {
								cek+=1;								
							}

						});

						if (cek>1) {
							alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
							reset(id);
							$('#nama_obat'+id).val(0);

							hitungtotalakhir();

							return false;
						}



						let satuan_obat = $('#nama_obat'+id+' option:selected').attr('data');
						let harga_jual = $('#nama_obat'+id+' option:selected').attr('subject');
						let total_stok = $('#nama_obat'+id+' option:selected').attr('id');
						if (validasi_stok(id)==false) {
							return false;
						};

						let keterangan_obat = $('#nama_obat'+id+' option:selected').attr('isi');					

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
						let total_stok = parseFloat($('#nama_obat'+id+' option:selected').attr('id'));
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
						$('#satuan_obat'+kode_baru).html('');
						$('#satuan_obat'+kode_baru).css('display','none');
						$('#total_stok'+kode_baru).val(0);
						$('#qty'+kode_baru).val('');
						$('#harga_jual'+kode_baru).val('');
						$('#takaran'+kode_baru).val('');
						$('#hari'+kode_baru).val('');
						$('#aturan_pakai'+kode_baru).val(0);
						$('#subtotal'+kode_baru).val('');
					}

					function hapusobat(kode_baru){
						let kode = parseFloat(kode_baru)-1;
						let jumlah_baris = $('.listobat').length;
						if (jumlah_baris==1) {
							reset(kode_baru);
							$('#nama_obat'+kode_baru).val(0);


							hitungtotalakhir();

							return false;
						}

						$('#obat'+kode_baru).remove();
						$('.btn_tambah:last').css('display','');
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

						'<select type="text" data="" class="form-control " id="nama_obat'+kode_baru+'" name="nama_obat[]" onchange="cekobat('+kode_baru+')" style="border-color: #03b509; background: #ffffff" >'+
						'<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>'+
						'<?php foreach ($obat as $data) { ?>'+

						'<?php if ($data->total_stok!=0): ?>'+

						'<option id="<?php echo $data->total_stok; ?>" isi="<?php echo $data->keterangan ?>" subject="<?php echo $data->harga_jual ?>" data="<?php echo $data->satuan_obat ?>" value="<?php echo $data->kode_obat ?>"><?php echo $data->nama_obat ?></option>	'+
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
						'<input type="text" class="form-control" id="qty'+kode_baru+'" name="qty[]" onkeyup="hitungsubtotal('+kode_baru+')" placeholder="Qty" style="border-color: #03b509; background: #ffffff" > '+ 

						'</div>'+

						'<div class="input-group mb-3 col-md-2" style="display:none">'+
						'<div class="input-group-prepend"> '+
						'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Stok</span> '+
						'</div>'+
						'<input type="text" class="form-control" id="total_stok'+kode_baru+'" name="total_stok[]" value="0" readonly>'+	

						'</div>'+	


						'<div class="input-group mb-3 col-md-2" style="display:none">'+
						'<div class="input-group-prepend">'+
						'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Harga</span>'+
						'</div> '+
						'<input type="text" class="form-control" id="harga_jual'+kode_baru+'" name="harga_jual[]" readonly >'+
						'</div>  '+



						'<div class="input-group mb-3 col-md-12">'+
						'<div class="input-group-prepend">'+
						'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>'+
						'</div>'+
						'<input type="text" class="form-control" id="takaran'+kode_baru+'" name="takaran[]" placeholder="Dosis"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff" >  '+
						'<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>'+
						'<select type="text" class="form-control" id="hari'+kode_baru+'" name="hari[]" placeholder="Hari"  width="5px"  style="border-color: #03b509; background: #ffffff" > '+
						'<option value="0" selected disabled>Pilih Racik</option> '+
						'<option value="Puyer">Puyer</option>'+
						'<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>'+
						'<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>'+
						'<option value="Puyer_15_bungkus">Puyer_15_bungkus</option>'+ 
						'<option value="NonPuyer">NonPuyer</option>'+  
						'</select>'+
						'<select class="form-control" id="aturan_pakai'+kode_baru+'" name="aturan_pakai[]" style="border-color: #03b509; background: #ffffff" >'+
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
						'<button id="tambahobat'+kode_baru+'" type="button" class="btn btn-sm btn-success btn_tambah mr-1" onclick="tambahobat('+kode_baru+')">+</button>'+
						'<button id="hapusobat'+kode_baru+'" type="button" class="btn btn-sm btn-danger" onclick="hapusobat('+kode_baru+')">-</button>'+
						'</div>'+ 
						'</div> ';
						$('#obat'+kode).after(html);
						$('#tambahobat'+kode).css('display','none');

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











