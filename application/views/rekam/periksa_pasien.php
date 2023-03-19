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
				.d-none{
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

				#hapus_sign0{
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
						<?php foreach ($periksa_pasien as $row){ ?>

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

												<div class="input-group col-md-3 mb-3" style="display: none;">
													<div class="input-group-prepend">
														<span class="input-group-text labelkolombaru"> Tanggal</span>
													</div>
													<input type="text" class="form-control"  id="tanggal_berobat" name="tanggal_berobat" value="<?php echo $row->tanggal_berobat ?>" >
												</div>


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

														<div class="container listdetail d-none w-100" style="padding: 0px !important; margin: 0px !important;overflow: scroll;">

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
													<input type="date" class="textarea_atas form-control"  id="tanggal_periksa" name="tanggal_periksa" value="<?= date('Y-m-d') ?>" required="required" style="border-color: #03b509; background: #ffffff">
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

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">Penyakit</span> 
													<select type="text" rows="3" class="textarea_atas form-control"  id="jenis_penyakit" name="jenis_penyakit"  required="required" style="border-color: #03b509; background: #ffffff" > 
														<option value="0" selected disabled>Pilih Penyakit</option> 
														<?php foreach ($penyakit as $pk): ?>
															<option value="<?php echo $pk->kode_penyakit ?>"><?php echo $pk->nama_penyakit ?></option>
														<?php endforeach ?>
														
													</select>
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">Penunjang</span> 
													<select type="text" rows="3" data="<?php echo $row->penunjang ?>" class="textarea_atas form-control"  id="penunjang" name="penunjang"  required="required" style="border-color: #03b509; background: #ffffff" > 
														<option value="0" selected disabled>Pilih Penunjang</option> 
														<option value="LAB">LAB</option>
														<option value="USG">USG</option>
														<option value="RONTGEN">RONTGEN</option>
														<option value="EKG">EKG</option>  
														
													</select>
												</div>

												<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolombaru">Rujukan</span> 
													<select type="text" rows="3"  class="textarea_atas form-control"  id="rujuk_pasien" name="rujuk_pasien"  required="required" style="border-color: #03b509; background: #ffffff" > 
														<option value="0" selected disabled>Pilih Rujukan</option> 
														<option value="RS">RUMAH SAKIT</option>
														<option value="RAWAT INAP">RAWAT INAP</option>
														<option value="HOME CARE">HOME CARE</option>
													</select>
												</div>

												<div class="col-md-4 mb-3 rujuk_rs d-none"> 
													<span class="input-group-text bg-success text-light" >Nama RS</span> 
													<input type="text" class="form-control"  id="nama_rs" name="nama_rs"style="border-color: #03b509" >
												</div>

												<div class="col-md-8 mb-3 rujuk_rs d-none"> 
													<span class="input-group-text bg-success text-light" >Alamat RS</span> 
													<textarea type="text" class="form-control"  id="alamat_rs" name="alamat_rs" style="border-color: #03b509" rows="1"></textarea>
												</div>



												<div class="col-md-6 mb-3 keterangan_lab d-none"> 
													<span class="input-group-text labelkolombaru">Yang Harus di Periksa Laboratorium</span> 
													<input type="text" name="keterangan_pemeriksaan_lab" id="keterangan_pemeriksaan_lab" class="form-control inputatas text-left">
												</div>

												<div class="col-md-12 mb-3 ajukanlab d-none"> 
													<?php if ($row->penunjang!="LAB") {?>
														<a href="#" class="btn btn-danger btn-sm float-sm-right"  id="btn_ajukanlab"><i class="fas fa-arrow-circle-right mr-2"></i> Ajukan Pemeriksaan LAB</a>
													<?php } ?>
													<?php if ($status_lab=="Sudah Diperiksa") { ?>
														<button type="button" class="btn btn-primary btn-sm float-sm-right mr-2" id="btn_lihatlab" data="<?php echo $row->kode_rekam ?>"><i class="fa fa-eye text-light mr-2"></i> Hasil Pemeriksaan LAB</button>
													<?php }else if ($status_lab=="Belum Diperiksa") { ?>
														<p class="text-danger">Hasil Pemeriksaan Lab Belum Tersedia</p>
													<?php } ?>
												</div>



												<div class="col-md-12 mb-3 observasi d-none"> 
													<span class="input-group-text labelkolom">Approval</span> 
													<select type="text" rows="3" class="textarea_atas form-control isikolom" id="approval" name="approval"  required="required" > 
														<option value="0" selected disabled>Pilih</option>  
														<option value="KELUARGA">KELUARGA</option>  
														<option value="DIRI SENDIRI">DIRI SENDIRI</option>  
													</select>
												</div>
											</div>
											<div class="row observasi d-none">
												<div class="col-md-12 float-sm-right ">
													<h3 class="text-center"><b>DATA KELUARGA YANG BERSANGKUTAN</b></h3> 
												</div> 
												<br>
												<div class="col-md-4 mb-3" id="nama_app"> 
													<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Nama</span> 
													<input type="text" class="form-control form-control-md isikolom" id="nama_approval" name="nama_approval">
												</div>

												<div class="col-md-4 mb-3" id="umur_app"> 
													<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Umur</span> 
													<input type="text" class="form-control form-control-md isikolom" id="umur_approval" name="umur_approval" >
												</div>

												<div class="col-md-4 mb-3" id="jk_app"> 
													<span class="input-group-text labelkolom"><i class="fas fa-thermometer-three-quarters mr-1"></i>Jenis Kelamin</span> 
													<select type="text" class="form-control  form-control-md isikolom " name="jenis_kelamin_approval" id="jenis_kelamin_approval"  >
														<option value="0" selected> -- Pilih Jenis Kelamin--</option>
														<option value="L">Laki-Laki</option>
														<option value="P">Perempuan</option>
													</select>
												</div> 

												<div class="col-md-4 mb-3" id="hubungan_app"> 
													<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>Hubungan Dengan Pasien</span> 
													<select class="form-control " id="hubungan_dengan_pasien" name="hubungan_dengan_pasien" >
														<option value="0" selected disabled>--Select--</option>
														<option value="Diri Saya Sendiri">Diri Saya Sendiri</option>
														<option value="Istri">Istri</option>
														<option value="Suami">Suami</option>
														<option value="Anak">Anak</option>
														<option value="Ayah">Ayah</option>
														<option value="Ibu">Ibu</option> 
														<option value="Saudara Kandung">Saudara Kandung</option> 
													</select>
												</div>
												<div class="col-md-4 mb-3" id="nik_app"> 
													<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>NIK</span> 
													<input type="text" class="form-control form-control-md isikolom" id="nik_approval" name="nik_approval" >
												</div>

												<div class="col-md-4 mb-3" id="Ruang"> 
													<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Ruang Rawat</span> 
													<input type="text" class="form-control form-control-md isikolom" id="ruang_rawat" name="ruang_rawat" >
												</div>

												<div class="col-md-4 mb-3" id="saksi1_app"> 
													<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Saksi 1</span> 
													<input type="text" class="form-control form-control-md isikolom" id="nama_saksi1" name="nama_saksi1">
												</div>

												<div class="col-md-4 mb-3" id="saksi2_app"> 
													<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Saksi 2</span> 
													<input type="text" class="form-control form-control-md isikolom" id="nama_saksi2" name="nama_saksi2"  >
												</div>
												<div class="col-md-4 mb-3" id="persetujuan_rawat"> 
													<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>Persetujuan Tindak Medis</span> 
													<select class="form-control " id="persetujuan_rawat" name="persetujuan_rawat" >
														<option value="0" selected disabled>--Select--</option>
														<option value="menyetujui">menyetujui</option>
														<option value="menolak">menolak</option>  
													</select>
												</div>


												<div class="mb-3 col-md-4" id="ttd" style="position: relative"> 
													<span class="input-group-text" style="background: #03b509;color :white;width:100%"> <i class="far fa-list-alt mr-1"></i> Saksi 1</span>
													<canvas id="signature-pad" name="signature-pad" class="signature-pad" style="width:100%"></canvas>
													<input type="hidden" name="isi_ttd0" id="isi_ttd0">
													<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign0"><i class="fas fa-eraser"></i></button>
												</div> 

												<div class="mb-3 col-md-4" id="ttd1" style="position: relative" > 
													<span class="input-group-text" style="background: #03b509;color :white;width:100%"> <i class="far fa-list-alt mr-1"></i> Yang membuat Pernyataan</span>

													<input type="hidden" name="isi_ttd1" id="isi_ttd1">
													<canvas id="signature-pad1" name="signature-pad1" class="signature-pad1" style="width:100%"></canvas>
													<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign1"><i class="fas fa-eraser"></i></button>
												</div> 

												<div class="mb-3 col-md-4" id="ttd2"style="position: relative"> 
													<span class="input-group-text" style="background: #03b509;color :white;width:100%"> <i class="far fa-list-alt mr-1"></i> Saksi 2</span>
													<input type="hidden" name="isi_ttd2" id="isi_ttd2">
													<canvas id="signature-pad2" name="signature-pad2" class="signature-pad2" style="width:100%"></canvas>
													<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign2"><i class="fas fa-eraser"></i></button>
												</div>  
											</div> 
											<div class="form-group row">
											<div class="col-md-4 mb-3"> 
													<span class="input-group-text labelkolom"><i class="fas fa-receipt mr-2"></i>Surat Sakit</span> 
													<select type="text" class="form-control  form-control-md isikolom " name="surat_sakit" id="surat_sakit">
														<option value="N" selected>Tidak</option>
														<option value="Y">Ya</option>
													</select>
												</div> 
												 
												<div class="col-md-4 mb-3 isi_surat d-none"> 
													<span class="input-group-text labelkolom"><i class="fas fa-receipt mr-2"></i>Pekerjaan</span> 
													<input type="text" class="form-control  form-control-md isikolom " name="pekerjaan_surat" id="pekerjaan_surat">
												</div> 

												<div class="col-md-4 mb-3 isi_surat d-none"> 
													<span class="input-group-text labelkolom"><i class="fas fa-receipt mr-2"></i>Tanggal Istirahat</span> 
													<div class="input-group">
													<input type="date" class="form-control  form-control-md isikolom " name="tanggal_istirahat_awal" id="tanggal_istirahat_awal" style="width: 43%">
													<input type="text" class="form-control  text-center fw-bold" readonly="readonly" onclick="this.blur()" value="s/d"  style="width: 14%">
													<input type="date" class="form-control  form-control-md isikolom " name="tanggal_istirahat_akhir" id="tanggal_istirahat_akhir" style="width: 43%">
													</div>
												</div> 


												</div>
											<br> 

											<div class="form-group row" style="background: #03b509">
												<div class="col-sm-12 float-sm-right">
													<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px;display: inline-block;" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>TERAPI / PEMBERIAN OBAT</b></h6> 
													<a href="javascript:;"  data-target="#modaltambahobat" data-toggle="modal" class="btn btn-primary btn-sm  my-2 float-right"><i class="fas fa-plus mr-2"></i>Tambah Resep Obat</a>
												</div>  
											</div>
											<br>
											<!-- <div class="col-sm-12" style="background: #f2f2f5; border-color: #ff1201">
												<span>Keterangan</span> <br>
												<span style="color:#ff1201 ">* Untuk Penulisan aturan pakai harus di sambung dan tidak boleh ada spasi </span><br>
												<span style="color:#ff1201 ">* Contoh penulisan Dosis Obat : 1x3</span>
											</div> -->
											<div class="col-md-12">
												
												<table id="tabel_resep_obat" class="table table-bordered table-striped d-none" border="1" style="border-collapse: all;">
													<thead>
														<tr class="bg-success text-light text-center">
															<th width="5%">No</th>
															<th width="35%">Nama Obat / Racikan</th>
															<th width="10%">Qty</th>
															<th width="10%">Dosis</th>
															<th width="10%">Racikan</th>
															<th width="15%">Aturan Pakai</th>
															<th width="10%">Sub Total</th>
															<th width="5%">#</th>
														</thead>
														<tbody id="data_list_obat">
															
														</tbody>
													</tr>
												</table>
											</div>


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
													<button id="simpan_data_rekam" type="button" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> SIMPAN DATA REKAM</button>
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

			<div class="modal fade" id="modaltambahobat" tabindex="-1" role="dialog" aria-labelledby="modaltambahobat" aria-hidden="true">
				<div class=" modal-dialog modal-lg">
					<div class="modal-content" > 
						<div class="modal-header bg-warning text-light" >
							<h5 id="judulmodaltambahobat"><i class="fas fa-pills mr-2"></i></i>Tambah Resep Obat</h5>
						</div> 

						<div class="modal-body">
							<form id="form_resep">
								<div class="row">
									<div class="col-md-12 mb-3">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Jenis Resep Obat</span>
										<select class="form-control" id="jenis_resep" name="jenis_resep" style="border-color: #03b509; background: #ffffff  ">
											<option value="0" selected disabled>Pilih Jenis Resep</option>
											<option value="satuan">Satuan</option>
											<option value="racikan">Racikan</option>

										</select> 
									</div>
								</div>
								<div class="row satuan d-none jenis_resep">
									<div class="col-md-12 mb-3">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;">Nama Obat</span>
										<select type="text" data="" class="form-control " id="nama_obat_resep" name="nama_obat_resep" onchange="cekobat()"  style=" border-color: #03b509; background: #ffffff;width: 100%">
											<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>
											<?php foreach ($obat as $data) { ?>
												<option value="<?php echo $data->kode_obat?>"><?php if ($data->keterangan!='') {echo str_replace("'",'&apos;',$data->nama_obat)." || ".trim($data->keterangan);}else{echo str_replace("'",'&apos;',$data->nama_obat);} ?></option>
											<?php } ?> 
										</select>  
										<input type="hidden" class="form-control" id="total_stok_resep" name="total_stok_resep" value="0" readonly>	
										<input type="hidden" class="form-control" id="harga_jual_resep" name="harga_jual_resep" readonly >
										<span class="input-group-text mt-2 d-none" id="keterangan_obat_resep" style="background:#e27300; color: white;"></span>
									</div>
								</div>
								<div class="row racikan d-none jenis_resep">
									<div class="col-md-12">
										<div class="row">	
											<div class=" col-md-10 mb-3 col-sm-8">
												<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Nama Racikan</span>
												<input type="hidden" id="kode_racikan_resep" name="kode_racikan_resep" value="" class="form-control">
												<input type="text" class="form-control" id="nama_racikan_resep" name="nama_racikan_resep" placeholder="Masukkan Nama Racikan"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff"> 
											</div> 
											<div class=" col-md-2 col-sm-4 mb-3">
												<a href="#" id="btn_tambah_komposisi" class="btn btn-success btn-sm" style="height: 75px;width: 100%;text-align: center;"><br><span  style="vertical-align: middle!important"><i class="fas fa-plus mr-2 fa-1x"></i><br>Komposisi</span></a>
											</div>
										</div>
										<div class="row px-4 ">	
											<div class=" col-md-12 mb-3 p-3  tbl_komposisi d-none" style="border: 1px solid #d5cfcf">
												<table class="table table-bordered table-striped" id="tbl_komposisi" style="border-collapse: collapse;table-layout: fixed;">
													<thead>
														<tr class="bg-warning text-light">
															<th width="70%">Nama Obat</th>
															<th width="20%" class="text-center">Qty</th>
															<th width="10%" class="text-center">#</th>
														</tr>
													</thead>
													<tbody class="list_komposisi">

													</tbody> 

												</table>

												<div class="row ">


												</div>
											</div>
										</div>
									</div>

									<div class=" col-md-12 mb-3" style="text-align: center!important;display: block;vertical-align: middle!important;">
										<hr>
										<center><h6 class="fw-bold">----- Deskripsi Racikan Obat -----</h6></center>
									</div>
								</div>
								<div class="row resep_umum d-none">

									<div class=" col-md-4 mb-3">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Qty</span>
										<input type="text" class="textarea_atas form-control" id="qty_resep" name="qty_resep" onkeyup="cek_stok()" readonly="readonly">  
									</div>  

									<div class=" col-md-4 mb-3">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Dosis</span>
										<input type="text" class="form-control" id="takaran_resep" name="takaran_resep" placeholder="Contoh = 1x3"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff"> 
									</div>  

									<div class=" col-md-4 mb-3">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Tipe Racikan Resep</span>
										<select type="text" class="form-control" id="hari_resep" name="hari_resep" width="5px"> 
											<option value="0" selected disabled>Pilih Racikan </option> 
											<?php foreach ($racikan as $r) {?>
												<option value="<?php echo $r->nama_racikan ?>"><?php echo $r->nama_racikan ?></option>
											<?php } ?> 
											;

										</select> 
									</div>
									<div class=" col-md-8 mb-3">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
										<select class="form-control" id="aturan_pakai_resep" name="aturan_pakai_resep" style="border-color: #03b509; background: #ffffff  ">
											<option value="0" selected disabled>Pilih Aturan Pakai</option>
											<?php foreach ($aturan_pakai as $at) {?>
												<option value="<?php echo $at->nama_aturan ?>"><?php echo $at->nama_aturan ?></option>
											<?php } ?> 
										</select> 
									</div> 
									<div class="col-md-4">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>
										<input type="text" class="form-control" id="subtotal_resep" name="subtotal_resep" placeholder="Total" disabled="disabled" readonly="readonly">
									</div>  
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-danger btn-sm"  data-dismiss="modal">Tutup</a>
							<a id="btn_simpan_resep" href="#" class="btn btn-success btn-sm">Tambah</a>

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

						$('#btn_tambah_komposisi').on('click',function(e){
							e.preventDefault();
							let kode_racikan = $('#kode_racikan_resep').val();
							let jumlah_komposisi = $('.baris_komposisi').length;
							if (jumlah_komposisi==0) {
								$('.tbl_komposisi').removeClass('d-none');
							}
							let kode_baris = kode_random_racikan(4);

							let html = `<tr class="baris_komposisi `+kode_baris+`">
							<td style="padding:0px 5px 0px 5px!important">
							<select type="text" data="" class="form-control " id="nama_obat_komposisi`+kode_baris+`" name="nama_obat_komposisi`+kode_racikan+`[]" onchange="cekobatkomposisi(this.id)"  style="width: 100%">
							<option value="0" disabled="disabled" selected="selected"> -- Pilih Nama Obat --</option>
							<?php foreach ($obat as $data) { ?>
								<option value="<?php echo $data->kode_obat?>"><?php if ($data->keterangan!='') {echo str_replace("'",'&apos;',$data->nama_obat)." || ".trim($data->keterangan);}else{echo str_replace("'",'&apos;',$data->nama_obat);} ?></option>
							<?php } ?> 
							</select>  
							<input type="hidden" class="form-control" id="total_stok_komposisi`+kode_baris+`" name="total_stok_komposisi[]" value="0" readonly>	
							<input type="hidden" class="form-control" id="harga_jual_komposisi`+kode_baris+`" name="harga_jual_komposisi[]" readonly >
							<span class="input-group-text mt-2 d-none" id="keterangan_obat_komposisi`+kode_baris+`" style="background:#e27300; color: white;"></span>
							</div></td>
							<td style="padding:0px 5px 0px 5px!important"><input type="text" class="form-control text-center" id="qty_komposisi`+kode_baris+`" name="qty_komposisi`+kode_racikan+`[]" onkeyup="cek_stok_komposisi(this.id)" style="height:45px!important;" readonly="readonly"> </td>
							<td style="padding:0px 5px 0px 5px!important" class="text-center"><button type="button" class="btn btn-sm btn-danger btn_hapus_komposisi" data="`+kode_baris+`" ><i class="fas fa-trash"></i></button></td>
							<tr>
							`;
							$('.list_komposisi').append(html);
							jadikanselect2('nama_obat_komposisi'+kode_baris,'Pilih Nama Obat');
						});

						$('#jenis_resep').on('change',function(e){
							let jenis = $(this).val();
							if (jenis!=null) {
								$('#form_resep')[0].reset();
								$('.resep_umum').removeClass('d-none');
								$('#keterangan_obat_resep').addClass('d-none');
								$('.jenis_resep').addClass('d-none');
								$('.'+jenis).removeClass('d-none');
								$('#jenis_resep').val(jenis);
								$('#kode_racikan_resep').val(kode_random_racikan(8));
								if (jenis=="racikan") {
									$('#qty_resep').removeAttr('readonly');
								}else{
									$('#qty_resep').attr('readonly','readonly');
								}
							}else{
								$('.resep_umum').addClass('d-none');
								$('.satuan').addClass('d-none');
								$('.racikan').addClass('d-none');
								$('#form_resep')[0].reset();
								$('#keterangan_obat_resep').addClass('d-none');
								$('#kode_racikan_resep').val('');

							}
						});

						$('#surat_sakit').on('change',function(){
							let surat = $(this).val();
							if(surat=='Y')
							{
								$('.isi_surat').removeClass('d-none');
							}else{
								$('.isi_surat').addClass('d-none');

							}
						});

						$('#btn_simpan_resep').on('click',function(e){
							e.preventDefault();
							let jenis_resep = $('#jenis_resep').val();
							let data_obat;

							if (jenis_resep==null) {
								alert('Silahkan Pilih Jenis Resep');
								return false;
							}

							if (jenis_resep=="satuan") {
								let kode_obat = $('#nama_obat_resep').val();
								let nama_obat = $('#nama_obat_resep option:selected').text();
								if (kode_obat==null) {
									alert('Nama Obat Tidak Boleh Kosong');
									return false;
								}
								let qty = $('#qty_resep').val();
								if (qty=='') {
									alert('Qty Obat Tidak Boleh Kosong');
									return false;
								}

								let dosis = $('#takaran_resep').val();
								let tipe = $('#hari_resep').val();

								let tampilan_tipe = tipe !=null  ? tipe :'-' ;

								let stok = $('#total_stok_resep').val();
								let harga_jual = $('#harga_jual_resep').val();
								let aturan_pakai = $('#aturan_pakai_resep').val();
								let tampilan_aturan_pakai = aturan_pakai !=null  ? aturan_pakai :'-' ;

								let subtotal = $('#subtotal_resep').val();
								let jumlah_baris = $('.baris_obat').length;
								if(jumlah_baris==0)
								{
									$('#tabel_resep_obat').removeClass('d-none');
								}


								data_obat += `<tr class="`+kode_obat+` baris_obat">
								<td class="text-center">
								<input type="hidden" name="nama_obat[]" value="`+kode_obat+`" id="nama_obat`+kode_obat+`" class="form-control">
								<input type="hidden" name="obat_satuan[]" value="`+kode_obat+`" id="obat_satuan`+kode_obat+`" class="form-control">
								<input type="hidden" name="qty[]" value="`+qty+`" id="qty`+kode_obat+`" class="form-control">
								<input type="hidden" name="takaran[]" value="`+dosis+`" id="takaran`+kode_obat+`" class="form-control">
								<input type="hidden" name="hari[]" value="`+tipe+`" id="hari`+kode_obat+`" class="form-control">
								<input type="hidden" name="subtotal[]" value="`+subtotal+`" id="subtotal`+kode_obat+`" class="form-control">
								<input type="hidden" name="aturan_pakai[]" value="`+aturan_pakai+`" id="aturan_pakai`+kode_obat+`" class="form-control">
								`+(jumlah_baris + 1)+`</td>
								<td>`+nama_obat+`</td>
								<td class="text-center">`+qty+`</td>
								<td class="text-center">`+dosis+`</td>
								<td class="text-center">`+tampilan_tipe+`</td>
								<td>`+tampilan_aturan_pakai+`</td>
								<td class="text-right">`+subtotal+`</td>
								<td class="text-center"><button type="button" class="btn btn-sm btn-danger btn_hapus_obat" data="`+kode_obat+`" ><i class="fas fa-trash"></i></button></td>
								</tr>


								`;

							}else{

								let kode_racikan_resep = $('#kode_racikan_resep').val();
								let nama_racikan_resep = $('#nama_racikan_resep').val();
								if (nama_racikan_resep=='') {
									alert('Nama Racikan Tidak Boleh Kosong');
									return false;
								}

								let qty = $('#qty_resep').val();
								if (qty=='') {
									alert('Qty Obat Tidak Boleh Kosong');
									return false;
								}


								let dosis = $('#takaran_resep').val();
								let tipe = $('#hari_resep').val();
								let aturan_pakai = $('#aturan_pakai_resep').val();
								let subtotal = $('#subtotal_resep').val();
								let tampilan_tipe = tipe !=null  ? tipe :'-' ;
								let tampilan_aturan_pakai = aturan_pakai !=null  ? aturan_pakai :'-' ;


								let jumlah_baris = $('.baris_obat').length;
								if(jumlah_baris==0)
								{
									$('#tabel_resep_obat').removeClass('d-none');
								}
								data_obat += `<tr class="`+kode_racikan_resep+` baris_obat">
								<td class="text-center">
								<input type="hidden" name="racikan_obat[]" value="`+nama_racikan_resep+`" id="racikan_obat`+kode_racikan_resep+`" class="form-control">`;

								let list_obat = '';
								// looping komposisi
								$('[name^="nama_obat_komposisi"]').each(function(){
									let kode_baris = $(this).attr('id').replace('nama_obat_komposisi','');
									let kode_obat = $(this).val();
									let qty_obat = parseFloat($('#qty_komposisi'+kode_baris).val()); 

									let nama_obat_komposisi = $('#nama_obat_komposisi'+kode_baris+' option:selected').text();

									list_obat+='- '+nama_obat_komposisi+' @'+qty_obat+'<br>';
									data_obat+=`
									<input type="hidden" name="nama_komposisi_obat_racikan`+kode_racikan_resep+`[]" value="`+kode_obat+`" id="komposisi_obat_racikan`+kode_baris+`" class="form-control">
									<input type="hidden" name="qty_komposisi_obat_racikan`+kode_racikan_resep+`[]" value="`+qty_obat+`" id="qty_komposisi_obat_racikan`+kode_baris+`" class="form-control">
									`;
								});

								data_obat+=`<input type="hidden" name="kode_racikan_obat[]" value="`+kode_racikan_resep+`" id="kode_racikan_obat`+kode_racikan_resep+`" class="form-control">
								<input type="hidden" name="qty_racikan_obat[]" value="`+qty+`" id="qty_racikan_obat`+kode_racikan_resep+`" class="form-control">
								<input type="hidden" name="takaran_racikan_obat[]" value="`+dosis+`" id="takaran_racikan_obat`+kode_racikan_resep+`" class="form-control">
								<input type="hidden" name="hari_racikan_obat[]" value="`+tipe+`" id="hari_racikan_obat`+kode_racikan_resep+`" class="form-control">
								<input type="hidden" name="subtotal_racikan_obat[]" value="`+subtotal+`" id="subtotal_racikan_obat`+kode_racikan_resep+`" class="form-control">
								<input type="hidden" name="aturan_pakai_racikan_obat[]" value="`+aturan_pakai+`" id="aturan_pakai_racikan_obat`+kode_racikan_resep+`" class="form-control">
								`+(jumlah_baris + 1)+`</td>
								<td><b>`+nama_racikan_resep.toUpperCase()+`</b><br>`+list_obat+`</td>
								<td class="text-center">`+qty+`</td>
								<td class="text-center">`+dosis+`</td>
								<td class="text-center">`+tampilan_tipe+`</td>
								<td>`+tampilan_aturan_pakai+`</td>
								<td class="text-right">`+subtotal+`</td>
								<td class="text-center"><button type="button" class="btn btn-sm btn-danger btn_hapus_obat" data="`+kode_racikan_resep+`" ><i class="fas fa-trash"></i></button></td>
								</tr>
								`;
							}

							$('#data_list_obat').append(data_obat);
							$('#form_resep')[0].reset();
							$('#keterangan_obat_resep').addClass('d-none');
							$('.list_komposisi').html('');
							$('.tbl_komposisi').addClass('d-none');
							$('.jenis_resep').addClass('d-none');
							$('.resep_umum').addClass('d-none');
							hitungtotalakhir();
							$('#modaltambahobat').modal('hide');
						});

var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
	backgroundColor: 'rgba(255, 255, 255, 0)',
	penColor: 'rgb(0, 0, 0)'
});

signaturePad.onEnd = function(){
	let ttd = document.getElementById("signature-pad").toDataURL();
	if (!signaturePad.isEmpty()) {

		$('#isi_ttd0').val(ttd);

	}else{
		$('#isi_ttd0').val('');
	}

};



var signaturePad1 = new SignaturePad(document.getElementById('signature-pad1'), {
	backgroundColor: 'rgba(255, 255, 255, 0)',
	penColor: 'rgb(0, 0, 0)'
});

signaturePad1.onEnd = function(){
	let ttd = document.getElementById("signature-pad1").toDataURL();
	if (!signaturePad1.isEmpty()) {

		$('#isi_ttd1').val(ttd);

	}else{
		$('#isi_ttd1').val('');
	}

};



var signaturePad2 = new SignaturePad(document.getElementById('signature-pad2'), {
	backgroundColor: 'rgba(255, 255, 255, 0)',
	penColor: 'rgb(0, 0, 0)'
});

signaturePad2.onEnd = function(){
	let ttd = document.getElementById("signature-pad2").toDataURL();
	if (!signaturePad2.isEmpty()) {

		$('#isi_ttd2').val(ttd);

	}else{
		$('#isi_ttd2').val('');
	}

};


$('#hapus_sign0').on('click',function(){
	signaturePad.clear();
	$('#isi_ttd0').val('');

});


$('#hapus_sign1').on('click',function(){
	signaturePad1.clear();
	$('#isi_ttd1').val('');

});


$('#hapus_sign2').on('click',function(){
	signaturePad2.clear();
	$('#isi_ttd2').val('');


});



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
		$('.ajukanlab').removeClass('d-none');
		$('.keterangan_lab').removeClass('d-none');

	}else{
		$('.ajukanlab').addClass('d-none');
		$('.keterangan_lab').addClass('d-none');
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

$('#rujuk_pasien').on('change',function(){

	if($(this).val()=="RS")
	{
		$('.rujuk_rs').removeClass('d-none');
		$('.observasi').addClass('d-none');

	}else{
		$('.rujuk_rs').addClass('d-none');
		$('#nama_rs').val('');
		$('#alamat_rs').val('');
		$('.observasi').removeClass('d-none');

	}

});



$(document).ready(function(){

	$('#qty_resep').maskNumber({
		thousands:'.',
		integer:true,
	});
	$('#subtotal_resep').maskNumber({
		thousands:'.',
		integer:true,
	});

	let tanggal_hari_ini = new Date();
	let hari_tahun = tanggal_hari_ini.getFullYear();
	let hari_bulan = tanggal_hari_ini.getMonth()+1;
	let hari_tgl =tanggal_hari_ini.getDate();
	if (hari_tgl < 10) {
		hari_tgl="0"+hari_tgl;
	}
	if (hari_bulan < 10) {
		hari_bulan="0"+hari_bulan;
	}
	$('#tanggal_periksa').val(hari_tahun+"-"+hari_bulan+"-"+hari_tgl);

	let penunjang = '<?php echo $row->penunjang; ?>';

	$('#penunjang option').each(function(){
		let isi = $(this).val();
		if (isi==penunjang) {
			$(this).attr('selected',true);
		}
	});
	if (penunjang=="LAB") {
		$('.ajukanlab').removeClass('d-none');
	}else{
		$('.ajukanlab').addClass('d-none');
	}
	$('#nama_obat_resep').select2({
		placeholder:"Pilih Obat",
		allowClear: true,
	});
	hitungtotalakhir();





});





$('#simpan_data_rekam').on('click',function(){


	let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
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

		let link = '<?php echo base_url()?>rekam/simpanrekam/umum'; 
		$('#simpan_data_rekam').html('<img src="<?php echo base_url()?>assets/spinner.gif" width="20px">&nbsp;Processing Data');
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
	let link = '<?php echo base_url()?>rekam/simpanrekam/lab';
	$('.simpandata').attr('action',link);
	$('.simpandata').submit(); 
});






function hitungsubtotal(id){

	let harga_jual = $('#harga_jual'+id).val().toString().replace(/\./g,'')!=""?$('#harga_jual'+id).val().toString().replace(/\./g,''):0;
	let qty = $('#qty'+id).val().toString().replace(/\./g,'')!=""?$('#qty'+id).val().toString().replace(/\./g,''):0;
	let total = parseFloat(harga_jual) * parseFloat(qty);
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

	$('[name^="racikan_obat"]').each(function(){
		let id = $(this).attr('id').replace('racikan_obat','');
		let sub_racikan = $('#subtotal_racikan_obat'+id).val();
		if (sub_racikan!='' && sub_racikan > 0 ) {
			let subtotal_racikan = sub_racikan.toString().replace(/\./g,'');
			total+=parseFloat(subtotal_racikan);
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
				$('.detail'+kode).removeClass('d-none');
				$('.listdetail').removeClass('d-none');
				$('.head_riwayat'+kode).css('background','#fff7bd'); 

			}else{
				$('.riwayat'+kode).html('<i class="fa fa-eye text-dark"></i>');
				$('.detail'+kode).addClass('d-none');
				$('.listdetail').addClass('d-none');
				$('.head_riwayat'+kode).css('background','transparent'); 

			}
		}else{
			$('.riwayat'+id).html('<i class="fa fa-eye text-dark"></i>');
			$('.detail'+id).addClass('d-none');
			$('.head_riwayat'+id).css('background','transparent');

		}
	});
	$(".listdetail").load("<?php echo base_url()?>rekam/detail_riwayat/"+kode_rekam);

}

$(document).on('click','.btn_hapus_obat',function(){
	let baris_obat = $('.baris_obat').length;
	if (baris_obat==1) {
		$('#tabel_resep_obat').addClass('d-none');
	}
	let kode = $(this).attr('data');
	$('.'+kode).remove();
	hitungtotalakhir();

});

$(document).on('click','.btn_hapus_komposisi',function(){
	let baris_komposisi = $('.baris_komposisi').length;
	if (baris_komposisi==1) {
		$('.tbl_komposisi').addClass('d-none');
	}
	let kode = $(this).attr('data');
	$('.'+kode).remove();
	hitungsubtotalkomposisi();
});



function hapusobat(kode){
	$('.'+kode).remove();
	hitungtotalakhir();
}



function jadikanselect2(id,placeholder){
	$('#'+id).select2(
	{
		placeholder:placeholder,
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


function cekobatkomposisi(id){
	let kode_baris = id.replace('nama_obat_komposisi','');

	let kode_obat = $('#nama_obat_komposisi'+kode_baris).val();
	let cek =0;
	$('[name^="nama_obat_komposisi"]').each(function(){
		let obat = $(this).val();
		if (obat == kode_obat) {
			cek+=1;								
		}
	});

	if (cek > 1) {
		alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
		$('#nama_obat_komposisi'+kode_baris).val(0).trigger('change');
		hitungtotalakhir();	
		return false;
	}else{
		if (kode_obat!=null) {
			$('#qty_komposisi'+kode_baris).removeAttr('readonly');
			$('#qty_komposisi'+kode_baris).val('');
			$.ajax({
				type  : 'GET',
				url   : '<?php echo base_url()?>rekam/get_data_obat_bykode',
				dataType : 'json',
				data : {'kode_obat':kode_obat},
				success : function(data){
					for (var i = 0; i <data.length; i++){
						$('#harga_jual_komposisi'+kode_baris).val(data[i].harga_jual);
						$('#total_stok_komposisi'+kode_baris).val(data[i].total_stok);
						if (data[i].keterangan!='') {
							$('#keterangan_obat_komposisi'+kode_baris).html(data[i].keterangan);
							$('#keterangan_obat_'+kode_baris).removeClass('d-none');
						}else{
							$('#keterangan_obat_'+kode_baris).addClass('d-none');
						}
					};
					$('#qty_komposisi'+kode_baris).focus();
					hitungtotalakhir();	
				}
			});
		}else{
			$('#qty_komposisi'+kode_baris).attr('readonly','readonly');
			$('#qty_komposisi'+kode_baris).val('');
			hitungtotalakhir();	
		}
	}
	return false;
}




function cekobat(){
	let kode_obat = $('#nama_obat_resep').val();
	let cek =0;
	$('[name^="nama_obat"]').each(function(){
		let obat = $(this).val();
		if (obat == kode_obat) {
			cek+=1;								
		}
	});

	if (cek > 1) {
		alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
		$('#nama_obat_resep').val(0);
		return false;
	}else{
		if (kode_obat!=null) {
			$('#qty_resep').removeAttr('readonly');
			$('#qty_resep').val('');
			$.ajax({
				type  : 'GET',
				url   : '<?php echo base_url()?>rekam/get_data_obat_bykode',
				dataType : 'json',
				data : {'kode_obat':kode_obat},
				success : function(data){
					for (var i = 0; i <data.length; i++){
						$('#harga_jual_resep').val(data[i].harga_jual);
						$('#total_stok_resep').val(data[i].total_stok);
						$('#subtotal_resep').val('');
						if (data[i].keterangan!='') {
							$('#keterangan_obat_resep').html(data[i].keterangan);
							$('#keterangan_obat_resep').removeClass('d-none');
						}else{
							$('#keterangan_obat_resep').addClass('d-none');
						}
					};
					$('#qty_resep').focus();
				}
			});
		}else{
			$('#qty_resep').attr('readonly','readonly');
			$('#qty_resep').val('');
		}
	}
	return false;
}


function kode_random_racikan(length) {
	let result = '';
	const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	const charactersLength = characters.length;
	let counter = 0;
	while (counter < length) {
		result += characters.charAt(Math.floor(Math.random() * charactersLength));
		counter += 1;
	}
	return result;
}



function cek_stok(){
	let jenis_resep = $('#jenis_resep').val();
	if (jenis_resep=="satuan") {
		let nama_obat = $('#nama_obat_resep').val();
		if (nama_obat==null) {
			alert('Obat Belum Dipilih!');
			return false;
		}
		let qty = parseFloat($('#qty_resep').val());
		let stok_obat = parseFloat($('#total_stok_resep').val());
		let harga_jual_resep = parseFloat($('#harga_jual_resep').val());
		if (stok_obat < qty) {
			alert('Stok Obat tidak Mencukupi!');
			$('#qty_resep').val('');
			$('#subtotal_resep').val(0);
			return false;
		}
		else if (qty==0 || qty=='') {
			$('#subtotal_resep').val(0);
			return false;
		}else{
			let subtotal = qty * harga_jual_resep;
			$('#subtotal_resep').val(subtotal);
		}
	}
}


function cek_stok_komposisi(id){
	let kode_baris = id.replace('qty_komposisi','');

	let nama_obat = $('#nama_obat_komposisi'+kode_baris).val();
	if (nama_obat==null) {
		alert('Obat Belum Dipilih!');
		return false;
	}

	let qty = parseFloat($('#qty_komposisi'+kode_baris).val());
	let stok_obat = parseFloat($('#total_stok_komposisi'+kode_baris).val());

	if (stok_obat < qty) {
		alert('Stok Obat tidak Mencukupi!');
		$('#qty_komposisi'+kode_baris).val('');
		hitungsubtotalkomposisi();	
		return false;
	}

	hitungsubtotalkomposisi();	
}

function hitungsubtotalkomposisi()
{
	let kode_racikan = $('#kode_racikan_resep').val();
	let subtotal =0;
	$('[name^="nama_obat_komposisi"]').each(function(){
		kode_baris = $(this).attr('id').replace('nama_obat_komposisi','');

		let qty = parseFloat($('#qty_komposisi'+kode_baris).val());
		let harga_jual_resep = parseFloat($('#harga_jual_komposisi'+kode_baris).val());
		let total_per_komposisi = parseFloat(qty) * parseFloat(harga_jual_resep);
		if (total_per_komposisi > 0) {
			subtotal+=total_per_komposisi;
		}
	});
	$('#subtotal_resep').val(subtotal);
}






</script>


<?php } ?>








