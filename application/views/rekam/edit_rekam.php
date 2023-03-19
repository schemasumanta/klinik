<div class="main-panel">
	<div class="content" >
		<div class="page-inner">
			<style type="text/css">
				.labelkolombaru{
					background: #03b509  !important;
					color :white  !important;
				}


				.gambar{
					width: 50px;
				}
				.disnon{
					display: none;
				}

				.inputatas{
					text-align: center;
					border-color: #03b509  !important; 
					background: #ffffff  !important;
				}

				.textarea_atas{
					border-color: #03b509  !important; 
					background: #ffffff  !important;
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

				.signature-pad {
					border: 1px solid #03b509;
					border-radius: 3%
				}

				.signature-pad1 {
					border: 1px solid #03b509;
					border-radius: 3%
				}

				.signature-pad2 {
					border: 1px solid #03b509;
					border-radius: 3%
				}

				#hapus_sign{
					position: absolute;
					top:80%;
					left:20%;
				}

				#hapus_sign1{
					position: absolute;
					top:80%;
					left:20%;
				}

				#hapus_sign2{
					position: absolute;
					top:80%;
					left:20%;
				}

			</style>

			<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

			<div class="row" style="color: black">
				<div class="col-md-12">
					<div class="card">

						<?php foreach ($detail_rekam_pasien as $row){ ?>

							<div class="card-header">     
								<div class="row">
									<div class="col-md-12">
										<img src="<?php echo base_url() ?>assets/img/user.png" style="border-radius: 50%" width="60px" height="60px">
										<H4 style="position: absolute; right: 0;top:0;margin-right: 30px;font-weight: bold;color: green">REKAM DATA PENGOBATAN</H4>
										<h6 style="position: absolute; right: 0; margin-top:-20px;margin-right: 30px"><?php echo ucwords($row->nama_pasien)." - ".$row->no_registrasi ?></h6>
										<hr>
										<h6  style="position: absolute; right: 0; margin-top:-10px;margin-right: 30px;font-weight: bold;">#
											<?php $tanggal=explode('-', $row->tanggal_berobat);
											$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
											echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?></h6>

										</div>						
									</div>
								</div> 

								<button style="background: #ec0a16; color: white;border-radius: 5px 20px;" type="button" class="btn btn-sm" id="btn_riwayat"><i class="fas fa-history mr-1"></i> Cek Riwayat Pasien </button>

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



												<div class=" col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru"> Kode Pendaftaran</span> 
													<input onclick="this.blur()"  type="text" class="textarea_atas form-control"  id="kode_rekam" name="kode_rekam" value="<?php echo $row->kode_rekam ?>" >
												</div>  

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">Status Pasien</span> 
													<input type="text"  onclick="this.blur()"class="textarea_atas form-control"  id="status_pasien" name="status_pasien"   value="<?php echo $row->status_pasien ?>">
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru"> Kepala Keluarga</span> 
													<input type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>"   >
												</div> 

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">Tempat Lahir</span> 
													<input type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>"   >
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">Tanggal Lahir</span> 
													<input type="date "  onclick="this.blur()" class="textarea_atas form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>"  >
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">No.Telepon</span> 
													<input type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="telepon" name="telepon" value="<?php echo $row->telepon ?>"  >
												</div>


												<div class="col-md-11 mb-3"> 
													<span class="input-group-text labelkolombaru">Alamat Lengkap</span>
													<textarea type="text"  onclick="this.blur()" class="textarea_atas form-control"  id="alamat" name="alamat"   ><?php echo $row->alamat ?></textarea> 
												</div> 
												<input type="hidden" name="jk" value="<?php echo $row->jk ?>">
												<div class="col-md-1 mb-3"> 
													<span class="input-group-text labelkolombaru">Umur</span> 
													<textarea type="text"  onclick="this.blur()" style="text-align: center;border-color: #03b509; background: #ffffff" class="form-control"  id="umur" name="umur"   ><?php echo $row->umur ?></textarea> 
												</div>

											</div> 

										</div>  
										<div class="modal fade" id="ModalHasilLab" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document" >
												<div class="modal-content" >
													<div class="modal-body hasil_lab" style="padding: 0px !important; margin: 0px !important;overflow: scroll;">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<!-- The modal -->
										<div class="modal fade" id="ModalRiwayatPasien" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document" >
												<div class="modal-content" >
													<div class="modal-header" style="background:#115222">
														<h4 class="modal-title" id="modalLabel">Daftar Riwayat Pasien UMUM - <?php echo ucwords($row->nama_pasien) ?></h4>

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

														<div class="container listdetail disnon w-100" style="padding: 0px !important; margin: 0px !important;overflow: scroll;">

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
													<span class="input-group-text labelkolombaru">Tanggal Diperiksa</span> 
													<input type="date" class="textarea_atas form-control"  id="tanggal_periksa" name="tanggal_periksa" value="<?= $row->tanggal_periksa ?>" required="required" style="border-color: #03b509; background: #ffffff">
												</div>  

												<div class=" col-md-2 mb-3"> 
													<span class="input-group-text labelkolombaru">Suhu</span> 
													<input type="text" class="inputatas form-control"  id="suhu" name="suhu" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->suhu ?>">
												</div>


												<div class=" col-md-2 mb-3"> 
													<span class="input-group-text labelkolombaru">Tensi Darah</span>
													<input type="text" class="inputatas form-control"  id="tensi_darah" name="tensi_darah" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->tensi_darah ?>">
												</div>

												<div class=" col-md-2 mb-3"> 
													<span class="input-group-text labelkolombaru">Saturasi</span> 
													<input  type="text" class="inputatas form-control"  id="saturasi" name="saturasi" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->saturasi ?>" >
												</div>



												<div class=" col-md-2 mb-3"> 
													<span class="input-group-text labelkolombaru">Frequansi Pernapasan</span> 
													<input type="text" class="inputatas form-control"  id="pernapasan" name="pernapasan" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->pernapasan ?>">
												</div>

												<div class="col-md-2 mb-3"> 
													<span class="input-group-text labelkolombaru">Frequansi Nadi</span> 
													<input type="text" class="inputatas form-control"  id="nadi" name="nadi" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->nadi ?>">
												</div>

												<div class="col-md-1 mb-3"> 
													<span class="input-group-text labelkolombaru">BB</span> 
													<input type="text" class="inputatas form-control"  id="bb" name="bb" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->bb ?>" >
												</div> 

												<div class="col-md-1 mb-3"> 
													<span class="input-group-text labelkolombaru">TB</span> 
													<input type="text" class="inputatas form-control"  id="tb" name="tb" required="required" style="border-color: #03b509; background: #ffffff" value="<?php echo $row->tb ?>">
												</div>  


												<div class=" col-md-6 mb-3"> 
													<span class="input-group-text labelkolombaru">Keluhan Pasien</span> 
													<textarea type="text" rows="3" class="textarea_atas form-control"  id="keluhan" name="keluhan" required="required" style="border-color: #03b509; background: #ffffff" ><?php echo $row->keluhan ?></textarea>
												</div>



												<div class=" col-md-6 mb-3"> 
													<span class="input-group-text labelkolombaru">Hasil Pemeriksaan Fisik</span> 
													<textarea type="text" rows="3" class="textarea_atas form-control"  id="hasil_pemeriksaan" name="hasil_pemeriksaan" required="required" style="border-color: #03b509; background: #ffffff" ><?php echo $row->hasil_pemeriksaan ?></textarea> 
												</div>



												<div class=" col-md-6 mb-3"> 
													<span class="input-group-text labelkolombaru">Diagnosis</span> 
													<textarea type="text" rows="3" class="textarea_atas form-control"  id="diagnosa" name="diagnosa"  required="required" style="border-color: #03b509; background: #ffffff" ><?php echo $row->diagnosa ?></textarea> 
												</div>
												<div class="col-md-6 mb-3"> 
													<span class="input-group-text labelkolombaru">Tindakan / Rencana</span> 
													<textarea type="text" rows="3" class="textarea_atas form-control"  id="tindakan_dokter" name="tindakan_dokter"  required="required" style="border-color: #03b509; background: #ffffff" ><?php echo $row->tindakan_dokter ?></textarea> 
												</div>

												<div class="col-md-6 mb-3"> 
													<span class="input-group-text labelkolombaru">Penyakit</span> 
													<select type="text" rows="3" class="textarea_atas form-control"  id="jenis_penyakit" name="jenis_penyakit"  required="required" style="border-color: #03b509; background: #ffffff" > 
														<option value="0" selected disabled>Pilih Penyakit</option> 
														<?php foreach ($penyakit as $pk): ?>
															<option value="<?php echo $pk->kode_penyakit ?>"><?php echo $pk->nama_penyakit ?></option>
														<?php endforeach ?>
														<!-- <option value="RAWAT INAP">RAWAT INAP</option>   -->

													</select>
												</div>

												<div class="col-md-6 mb-3"> 
													<span class="input-group-text labelkolombaru">Penunjang</span> 
													<select type="text" rows="3" data="<?php echo $row->penunjang ?>" class="textarea_atas form-control"  id="penunjang" name="penunjang"  required="required" style="border-color: #03b509; background: #ffffff" > 
														<option value="0" selected disabled>Pilih Penunjang</option> 
														<option value="LAB">LAB</option>
														<option value="USG">USG</option>
														<option value="RONTGEN">RONTGEN</option>
														<option value="EKG">EKG</option>  
														<!-- <option value="RAWAT INAP">RAWAT INAP</option>   -->

													</select>
												</div>

												<div class="col-md-6 mb-3 keterangan_lab disnon"> 
													<span class="input-group-text labelkolombaru">Yang Harus di Periksa Laboratorium</span> 
													<input type="text" name="keterangan_pemeriksaan_lab" id="keterangan_pemeriksaan_lab" class="form-control inputatas text-left">
												</div>
											</div> 
										</div>

										<div class="col-md-12 mb-3 ajukanlab disnon"> 
											<?php if ($row->penunjang!="LAB") {?>
												<a href="#" class="btn btn-danger btn-sm float-sm-right"  id="btn_ajukanlab"><i class="fas fa-arrow-circle-right mr-2"></i> Ajukan Pemeriksaan LAB</a>
											<?php } ?>
											<?php if ($status_lab=="Sudah Diperiksa") { ?>
												<button type="button" class="btn btn-primary btn-sm float-sm-right mr-2" id="btn_lihatlab" data="<?php echo $row->kode_rekam ?>"><i class="fa fa-eye text-light mr-2"></i> Hasil Pemeriksaan LAB</button>
											<?php }else if ($status_lab=="Belum Diperiksa") { ?>
												<p class="text-danger">Hasil Pemeriksaan Lab Belum Tersedia</p>
											<?php } ?>
										</div>
										<br> 
										<div class="form-group row" style="background: #03b509">
											<div class="col-sm-12 float-sm-right">
												<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>TERAPI / PEMBERIAN OBAT</b></h6> 
											</div>  
										</div>
										<br>
										<!-- <a href="javascript;" id="btn_lihat_obat" class="mt-1 btn btn-danger btn-sm btn-xs mb-2 ml-1" data-toggle="modal" data-target="#modal_lihat" >Lihat Stok</a> -->
										<div class="card-body" style="background: #f2f2f5; border-color: #ff1201">
											<span>Keterangan</span> <br>
											<span style="color:#ff1201 ">* Untuk Penulisan aturan pakai harus di sambung dan tidak boleh ada spasi </span><br>
											<span style="color:#ff1201 ">* Contoh penulisan Dosis Obat : 1x3</span>
										</div>
										<br>

										<?php if (count($list_obat)==0) { ?>


											<div class="row" id="obat1" style="border: 1px solid #03b509;padding-top: 10px"> 
												<div class="input-group mb-3 col-md-8 listobat">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span>
													</div> 

													<select type="text" data="" class="form-control " id="nama_obat1" name="nama_obat[]" onchange="cekobat(this.id)"  style=" border-color: #03b509; background: #ffffff;width: 75%">

														<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>

														<?php foreach ($obat as $data) { ?>
															<option value="<?php echo $data->kode_obat?>"><?php if ($data->keterangan!='') {
																echo str_replace("'",'&apos;',$data->nama_obat)." || ". $data->keterangan;
															}else{
																echo str_replace("'",'&apos;',$data->nama_obat);
															} ?>
														</option>


													<?php } ?> 
												</select>  


											</div>

											<div class="input-group mb-3 col-md-4">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>
												</div>
												<input type="text" class="textarea_atas form-control" id="qty1" name="qty[]" onkeyup="cek_stok(this.id)" onkeypress="return isNumberKey(event)" readonly="readonly">  

											</div>  



											<div class="input-group mb-3 col-md-12">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
												</div>
												<input type="text" class="form-control" id="takaran1" name="takaran[]" placeholder="Masukan Dosis Obat. Contoh = 1x3"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff">  
												<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>
												<select type="text" class="form-control" id="hari1" name="hari[]" placeholder="Puyer"  width="5px"> 

													<option value="0" selected disabled>Pilih Racik</option> 
													<option value="Puyer">Puyer</option>
													<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>
													<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>
													<option value="Puyer_15_bungkus">Puyer_15_bungkus</option> 
													<option value="NonPuyer">NonPuyer</option>
												</select> 
												<select class="form-control" id="aturan_pakai1" name="aturan_pakai[]" style="border-color: #03b509; background: #ffffff  ">
													<option value="0" selected disabled>Aturan</option>
													<option value="Sebelum Makan">Sebelum Makan</option>
													<option value="Sesudah Makan">Sesudah Makan</option>
													<option value="Saat Makan">Saat Makan</option>
													<option value="Di Oles Tipis-Tipis">Di Oles Tipis-Tipis</option>
													<option value="Tetes">Tetes</option>
													<option value="Satu Kali Pakai">Satu Kali Pakai</option>
													<option value="Satu Kali Pakai">Satu Kali Pakai</option>
													<option value="Pcs">Pcs</option> 
												</select> 

											</div>



											<div class="input-group mb-3 keterangan_obat1 col-md-12 d-none">
												<input type="hidden" class="form-control" id="total_stok1" name="total_stok[]" value="0" readonly>	
												<input type="hidden" class="form-control" id="harga_jual1" name="harga_jual[]" readonly>
												<span class="input-group-text" id="keterangan_obat1"style="background:#e27300; color: white;"><?php echo $data->keterangan_obat; ?></span>

											</div> 
											<div class="input-group mb-3 col-md-12 ">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>

												</div>
												<input type="text" class="form-control" id="subtotal1" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly">
											</div>  


											<div class="input-group mb-3 col-md-2" id="btn-groupobat1">
												<button id="tambahobat1" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahobat(1)">+</button>
												<button id="hapusobat1" type="button" class="btn btn-sm btn-danger" onclick="hapusobat(1)">-</button>
											</div>

										</div> 
									<?php }else {?>
										<?php $i =1; foreach ($list_obat as $ob): ?>


										<div class="row" id="obat<?php echo $i; ?>" style="border: 1px solid #03b509;padding-top: 10px"> 
											<div class="input-group mb-3 col-md-8 listobat">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span>
												</div> 

												<select type="text" data="" class="form-control " id="nama_obat<?php echo $i; ?>" name="nama_obat[]" onchange="cekobat(this.id)"  style=" border-color: #03b509; background: #ffffff;width: 75%">

													<option value="0" disabled="disabled"> -- Pilih Nama Obat --</option>
													<?php $keterangan=''; ?>
													<?php foreach ($obat as $data) { ?>
														<option value="<?php echo $data->kode_obat?>" 

															<?php if($data->kode_obat==$ob->kode_obat)
															{
																echo 'selected="selected"';
																$keterangan = $data->keterangan;
															} ?>>

															<?php if ($data->keterangan!='') {
																echo str_replace("'",'&apos;',$data->nama_obat)." || ". $data->keterangan;
															}else{
																echo str_replace("'",'&apos;',$data->nama_obat);
															} ?>
														</option>


													<?php } ?> 
												</select>  


											</div>

											<div class="input-group mb-3 col-md-4">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>
												</div>
												<input type="text" class="textarea_atas form-control" id="qty<?php echo $i; ?>" name="qty[]" onkeyup="cek_stok(this.id)" onkeypress="return isNumberKey(event)"
												<?php if($ob->qty=='' || $ob->qty==0 || $ob->qty==null) {
													echo 'readonly="readonly"';
												}

												?>
												value="<?php echo $ob->qty ?>">  

											</div>  



											<div class="input-group mb-3 col-md-12">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
												</div>
												<input type="text" class="form-control" id="takaran<?php echo $i; ?>" name="takaran[]" 

												<?php $takaran = explode(' x ', $ob->aturan_pakai); 

												if (strpos($takaran[0],'Puyer')===false) {
													echo  'value="'.$takaran[0].'"';
												}

												?>


												placeholder="Masukan Dosis Obat. Contoh = 1x3"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff">  


												<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>
												<select type="text" class="form-control" id="hari<?php echo $i; ?>" name="hari[]" placeholder="Puyer"  width="5px"> 
													<option value="0" selected disabled>Pilih Racik</option>
													<?php foreach ($racikan as $r) {?>
														<option value="<?php echo $r->nama_racikan ?>"
															<?php if (strpos($ob->aturan_pakai,$r->nama_racikan)!=false) {
																echo 'selected="selected"';
															} ?>
															><?php echo $r->nama_racikan ?></option>
														<?php } ?> 

													</select> 
													<select class="form-control" id="aturan_pakai<?php echo $i; ?>" name="aturan_pakai[]" style="border-color: #03b509; background: #ffffff  ">

														<option value="0" selected disabled>Pilih Aturan Pakai</option>
														<?php foreach ($aturan_pakai as $at) {?>
															<option value="<?php echo $at->nama_aturan ?>" <?php if (strpos($ob->aturan_pakai,$at->nama_aturan)!=false) {
																echo 'selected="selected"';
															} ?>><?php echo $at->nama_aturan ?></option>
														<?php } ?> 
													</select> 

												</div>



												<div class="input-group mb-3 keterangan_obat<?php echo $i; ?> col-md-12
													<?php if($keterangan==''){
														echo " d-none";
													}
													?>

													">
													<input type="hidden" class="form-control" id="total_stok<?php echo $i; ?>" name="total_stok[]"  value="<?php echo floatval($ob->total_stok) + floatval($ob->qty) ?>" value="0" readonly>	
													<input type="hidden" class="form-control" id="harga_jual<?php echo $i; ?>" name="harga_jual[]"   value="<?php echo $ob->harga_jual ?>" readonly>
													<span class="input-group-text" id="keterangan_obat<?php echo $i; ?>" style="background:#e27300; color: white;"><?php echo $keterangan; ?></span>

												</div> 
												<div class="input-group mb-3 col-md-12 ">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>

													</div>
													<input type="text" class="form-control" id="subtotal<?php echo $i; ?>" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly" value="<?php echo $ob->subtotal ?>">
												</div>  


												<div class="input-group mb-3 col-md-2" id="btn-groupobat<?php echo $i; ?>">
													<button id="tambahobat<?php echo $i; ?>" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahobat(<?php echo $i; ?>)">+</button>
													<button id="hapusobat<?php echo $i; ?>" type="button" class="btn btn-sm btn-danger" onclick="hapusobat(<?php echo $i; ?>)">-</button>
												</div>

											</div> 

											<?php $i++; endforeach ?>

										<?php } ?>

										<br>

										<br>
										<div class="row mb-6">
											<div class="input-group mb-3 col-md-3">

											</div>

											<div class="input-group mb-3 col-md-3 ">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Jasa Dokter</span>

												</div>
												<input type="text" class="form-control" name="tarif_dokter" id="tarif_dokter" value="<?php echo number_format($this->session->tarif_dokter, 0, ',', '.') ?>" readonly="readonly">
											</div> 



											<div class="input-group col-md-6  mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Total Akhir</span>

												</div>
												<input type="text" class="form-control" name="total_akhir" id="total_akhir" style="text-align: right;font-weight: bold;font-size: 18px;" readonly="readonly">
											</div> 

											<hr>
											<br>
											<div class="col-md-12" style="margin-top: 70px;">

												<a href="<?php echo site_url('rekam') ?>" class="btn btn-sm btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
												<button id="update_data_rekam" type="button" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> UPDATE DATA REKAM</button>
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
			</div>



			<script type="text/javascript"> 

				$('#btn_lihatlab').on('click', function(){
					let kode_rekam = $(this).attr('data');
					$.ajax({
						type  : 'POST',
						url   : '<?php echo base_url()?>laboratorium/getdata_bykode',
						dataType : 'json',
						data :{'kode_rekam':kode_rekam},
						success : function(data){
							$('#ModalHasilLab').modal('show');
							$(".hasil_lab").load("<?php echo base_url()?>laboratorium/cetak_lab/"+data);
							$('.labpanel').css('width','100%');
						}
					});
				});
				$('#penunjang').on('change',function(){
					if ($(this).val()=="LAB") {
						$('.ajukanlab').removeClass('disnon');
						$('.keterangan_lab').removeClass('disnon');

					}else{
						$('.ajukanlab').addClass('disnon');
						$('.keterangan_lab').addClass('disnon');
					}
				});

				function tambahobat(kode) {
					var kode_baru = parseFloat(kode)+1;
					if ($('#nama_obat'+kode).val()==null) {
						alert('Silahkan Masukkan Nama Obat yang Kosong!');
						$('#nama_obat'+kode).focus();
						return false;
					}

					if ($('#qty'+kode).val()==0 || $('#qty'+kode).val()=="" ) {
						alert('Silahkan Masukkan Qty Obat yang Kosong!');
						$('#qty'+kode).focus();
						return false;
					}



					var html=`<div class="row" id="obat`+kode_baru+`" style="border: 1px solid #03b509;padding-top: 10px"> 
					<div class="input-group mb-3 col-md-8 listobat">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span>
					</div> 

					<select type="text" data="" class="form-control " id="nama_obat`+kode_baru+`" name="nama_obat[]"  onchange="cekobat(this.id)" style=" border-color: #03b509; background: #ffffff;width: 75%">

					<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>

					<?php foreach ($obat as $data) { ?>
						<option value="<?php echo $data->kode_obat?>"><?php if ($data->keterangan!='') {
							echo str_replace("'",'&apos;',$data->nama_obat)." || ". $data->keterangan;
						}else{
							echo str_replace("'",'&apos;',$data->nama_obat);
						} ?>
						</option>
					<?php } ?> 
					</select>  
					</div>
					<div class="input-group mb-3 col-md-4">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>
					</div>
					<input type="text" class="textarea_atas form-control" id="qty`+kode_baru+`" name="qty[]" onkeyup="cek_stok(this.id)"  onkeypress="return isNumberKey(event)" readonly="readonly">  
					</div> 
					<div class="input-group mb-3 col-md-12">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
					</div>
					<input type="text" class="form-control" id="takaran`+kode_baru+`" name="takaran[]" placeholder="Masukan Dosis Obat. Contoh = 1x3"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff">  
					<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>
					<select type="text" class="form-control" id="hari`+kode_baru+`" name="hari[]" placeholder="Puyer"  width="5px"> 

					<option value="0" selected disabled>Pilih Racik</option> 
					<option value="Puyer">Puyer</option>
					<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>
					<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>
					<option value="Puyer_15_bungkus">Puyer_15_bungkus</option> 
					<option value="NonPuyer">NonPuyer</option>
					</select> 
					<select class="form-control" id="aturan_pakai`+kode_baru+`" name="aturan_pakai[]" style="border-color: #03b509; background: #ffffff  ">
					<option value="0" selected disabled>Aturan</option>
					<option value="Sebelum Makan">Sebelum Makan</option>
					<option value="Sesudah Makan">Sesudah Makan</option>
					<option value="Saat Makan">Saat Makan</option>
					<option value="Di Oles Tipis-Tipis">Di Oles Tipis-Tipis</option>
					<option value="Tetes">Tetes</option>
					<option value="Satu Kali Pakai">Satu Kali Pakai</option>
					<option value="Satu Kali Pakai">Satu Kali Pakai</option>
					<option value="Pcs">Pcs</option> 
					</select> 
					</div>
					<div class="input-group mb-3 keterangan_obat`+kode_baru+` col-md-12 d-none">
					<input type="hidden" class="form-control" id="total_stok`+kode_baru+`" name="total_stok[]" value="0" readonly>	
					<input type="hidden" class="form-control" id="harga_jual`+kode_baru+`" name="harga_jual[]" readonly >
					<span class="input-group-text" id="keterangan_obat`+kode_baru+`" style="background:#e27300; color: white;"></span>
					</div> 
					<div class="input-group mb-3 col-md-12 ">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>

					</div>
					<input type="text" class="form-control" id="subtotal`+kode_baru+`" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly">
					</div>  


					<div class="input-group mb-3 col-md-2" id="btn-groupobat`+kode_baru+`">
					<button id="tambahobat`+kode_baru+`" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahobat(`+kode_baru+`)">+</button>
					<button id="hapusobat`+kode_baru+`" type="button" class="btn btn-sm btn-danger" onclick="hapusobat(`+kode_baru+`)">-</button>
					</div>
					</div>`;

					$('#obat'+kode).after(html);

					$('[id^="tambahobat"]').each(function()
					{
						$(this).addClass('d-none');
					});
					$('[id^="tambahobat"]:last').removeClass('d-none');

					jadikanselect2(kode_baru);
				}


				$(document).ready(function(){

					let penunjang = '<?php echo $row->penunjang; ?>';

					$('#penunjang option').each(function(){
						let isi = $(this).val();
						if (isi==penunjang) {
							$(this).attr('selected',true);
						}
					});
					if (penunjang=="LAB") {
						$('.ajukanlab').removeClass('disnon');
					}else{
						$('.ajukanlab').addClass('disnon');
					}
					$('[id^="nama_obat"]').select2({
						placeholder:"Pilih Obat",
						allowClear: true,
					});
					hitungtotalakhir();

					$('[id^="tambahobat"]').each(function()
					{
						$(this).addClass('d-none');
					});
					$('[id^="tambahobat"]:last').removeClass('d-none');




				});

				$('#update_data_rekam').on('click',function(){


					var tanggal_periksa = $('#tanggal_periksa').val(); 


					if (tanggal_periksa == "") {
						alert("Tanggal Periksa Belum Terisi");
						$('#tanggal_periksa').focus();
						return false;
					}


					let cek =0;

					$('[id^="nama_obat"]').each(function(){
						let id= $(this).attr('id').replace('nama_obat','');
						let nama_obat = $(this).val();

						var qty = $('#qty'+id).val();

						if(nama_obat!=null && qty <= 0)
						{
							alert('Qty Kosong, Silahkan Isi Qty');
							$('#qty'+id).focus();
							cek+=1;

							return false;

						}


					});
					if(cek > 0)
					{
						return false;

					}else{




					let link = '<?php echo base_url()?>rekam/updaterekam/umum'; 
					$('#update_data_rekam').html('<img src="<?php echo base_url()?>assets/spinner.gif" width="20px">&nbsp;Processing Data');
					$(this).attr('disabled',true);

					$('.simpandata').attr('action',link);
					$('.simpandata').submit(); 
					}
				});

				$('#btn_ajukanlab').on('click',function(){

					let total_akhir = parseFloat($('#total_akhir').val().toString().replace(/\./g,''))> 0 ? $('#total_akhir').val().toString().replace(/\./g,''):0;
					var tanggal_periksa = $('#tanggal_periksa').val(); 
					if (tanggal_periksa == "") {
						alert("Tanggal Periksa Belum Terisi");
						$('#tanggal_periksa').focus();
						return false;
					}
					let link = '<?php echo base_url()?>rekam/simpanrekam/'+total_akhir+'/lab';
					$('.simpandata').attr('action',link);
					$('.simpandata').submit(); 
				});






				function hitungsubtotal(id){

					let harga_jual = $('#harga_jual'+id).val().toString().replace(/\./g,'')!=""?$('#harga_jual'+id).val().toString().replace(/\./g,''):0;
					let qty = $('#qty'+id).val().toString().replace(/\./g,'')!=""?$('#qty'+id).val().toString().replace(/\./g,''):0;
					let total = parseFloat(harga_jual)*parseFloat(qty);
					SeparatorRibuan(total.toString(),'subtotal'+id);
					hitungtotalakhir();
				}
				function hitungtotalakhir(){
					let tarif_dokter = $('#tarif_dokter').val().toString().replace(/\./g,'') > 0 ? $('#tarif_dokter').val().toString().replace(/\./g,''):0 ;
					let total=0;
					$('[name^="nama_obat"]').each(function(){
						let id = $(this).attr('id').replace('nama_obat','');
						let sub = $('#subtotal'+id).val();
						if (sub!='' && sub > 0) {
							let subtotal = sub.toString().replace(/\./g,'');
							total+=parseFloat(subtotal);
						}
					});

					let total_akhir=parseFloat(total) + parseFloat(tarif_dokter);
					SeparatorRibuan(total_akhir.toString(),'total_akhir');
				}



				$('#btn_riwayat').on('click',function(){
					let kode_pasien =$('#kode_pasien').val();
					let kategori ='umum';
					$.ajax({
						type  : 'GET',
						url   : '<?php echo base_url()?>rekam/riwayat_rekam_pasien',
						dataType : 'json',
						data:{'kode_pasien':kode_pasien,'kategori':kategori},
						success : function(data){
							$('#ModalRiwayatPasien').modal('show');
							$('#list_riwayat').html(data.riwayat);
							// $('.listdetail').html(data.list);

						}

					});
				});


				function showdetail(kode){
					let kode_rekam = $('#kode_rekam'+kode).html().replace('/','garing'); 
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
					$(".listdetail").load("<?php echo base_url()?>rekam/detail_riwayat/"+kode_rekam);

				}

				function hapusobat(kode_baru){
					let jumlah_obat = $('.listobat').length;
					if(jumlah_obat > 1)
					{
						$('#obat'+kode_baru).remove();
						$('[id^="tambahobat"]').each(function()

						{
							$(this).addClass('d-none');
						});

						$('[id^="tambahobat"]:last').removeClass('d-none');
						hitungtotalakhir();
					}else{

						$('#nama_obat'+kode_baru).val(0).trigger('change');
						$('#takaran'+kode_baru).val('');
						$('#hari'+kode_baru).val(0).trigger('change');
						$('#aturan_pakai'+kode_baru).val(0).trigger('change');
						$('.keterangan_obat'+kode_baru).addClass('d-none');
						$('#subtotal'+kode_baru).val('');


						hitungtotalakhir();
					}

				}



				function jadikanselect2(id){
					$('#nama_obat'+id).select2(
					{
						placeholder:"Pilih Nama Obat",
						allowClear:true,
					});
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




				function cekobat(kode){

					let kode_obat = $('#'+kode).val();
					let id = kode.replace('nama_obat','');
					let cek =0;
					$('[name^="nama_obat"]').each(function(){
						let obat = $(this).val();
						if (obat == kode_obat) {
							cek+=1;								
						}
					});

					if (cek > 1) {
						alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
						$('#nama_obat'+id).val(0).trigger('change');
						hitungtotalakhir();	
						return false;

					}else{


						if (kode_obat!=null) {

							$('#qty'+id).removeAttr('readonly');
							$('#qty'+id).val('');

							$.ajax({
								type  : 'GET',
								url   : '<?php echo base_url()?>rekam/get_data_obat_bykode',
								dataType : 'json',
								data : {'kode_obat':kode_obat},

								success : function(data){

									for (var i = 0; i <data.length; i++){
										$('#harga_jual'+id).val(data[i].harga_jual);
										$('#total_stok'+id).val(data[i].total_stok);

										$('#subtotal'+id).val('');
										if (data[i].keterangan!='') {
											$('#keterangan_obat'+id).html(data[i].keterangan);
											$('.keterangan_obat'+id).removeClass('d-none');

										}else{
											$('.keterangan_obat'+id).addClass('d-none');
										}
									};

									hitungtotalakhir();	

								}

							});



						}else{
							$('#qty'+id).attr('readonly','readonly');
							$('#qty'+id).val('');
							hitungtotalakhir();	


						}




					}


					return false;

				}


				function cek_stok(kode){
					let id = kode.replace('qty','');

					let nama_obat = $('#nama_obat'+id).val();

					if (nama_obat==null) {
						alert('Nama Obat Belum Dipilih!');
						$(this).val('');
						return false;
					}

					let qty = parseFloat($('#'+kode).val());
					let stok_obat = parseFloat($('#total_stok'+id).val());
					if (stok_obat < qty) {
						alert('Stok Obat tidak Mencukupi!');
						$('#'+kode).val('');
						$('#subtotal'+id).val(0);
						return false;
					}
					if (qty==0 || qty=='') {
						$('#subtotal'+id).val(0);
						return false;
					}
					hitungsubtotal(id);
				}




			</script>


		<?php } ?>








