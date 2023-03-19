<div class="main-panel">
	<style type="text/css">
		
		.label-checkbox{
			vertical-align: middle;
			padding-bottom: 10px;
		}
		.card-header{
			text-align: center;
			font-size: 25px;
		}
		#tabel_rekam{
			width: 100%;
		}
a
		.batas{
			width:1%;
			border-top: 1px solid #ffff;

		}
		.judul2{
			background: #f1f1f1;
			padding: 10px;
			border: 1px solid #a5a6a7;
			font-size:14px;
			width:10%;
			text-align: left;
		}
		.judul1{
			background: #f1f1f1;
			padding: 10px;
			border: 1px solid #a5a6a7;
			font-size:14px;
			width:5%;
			text-align: left;	
		}
		.isi1{
			padding: 10px;
			background: #fffeda;

			border: 1px solid #a5a6a7;
			width:30%;
			
			font-size:14px;
			text-align: left;
		}

		.isi{
			padding: 10px;
			background: #fffeda;

			border: 1px solid #a5a6a7;
			
			font-size:14px;
			text-align: left;
		}
		.qty{
			padding: 10px;
			background: #f1f1f1;

			border: 1px solid #a5a6a7;
			width:10%;
			font-size:14px;
			text-align: center;
		}
		tbody{
			border: 0px solid;

		}
		tr{
			border: 1px solid white;

		}
		.pemisah{
			border: 1px solid white;
			height: 10px;

		}
		.tengah{
			text-align: center;
		}
		.rekam{
			text-align: right; 			
			border: 2px solid white;
			border-top-left-radius: 15px;
			border-bottom-right-radius: 15px;
			background:#2f7b31;
			color:white;
		}
		#tabel_rekam{

		}

		#tabel_rekamfinal{

		}

		.gambar{
			width: 80px;
		}
		.final{
			height: 20px;
		}
		h2{
			font-weight: bold;
			color: #d07b00;
		}
		
	</style>
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"> 

							<!-- <i class="fas fa-briefcase-medical mr-3"></i><span style="font-size: 25px;"><b>DETAIL REKAM MEDIK PASIEN</b></span> -->
							<?php foreach ($consent_pasien as $row): ?>

								<!-- <h4 style="font-weight: bold;margin-top: 10px;"><?php echo ucwords($row->kode_ranap);?></h4>								 -->
							<?php endforeach ?>



						</div>


						<div class="card-body">

							<div class="">
								<table id="tabel_rekam" class="">  
									<div class="form-group row" style="background: #03b509"> 
										<div class="col-sm-12 float-sm-right">
											<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><i class="fas fa-file-import mr-2"></i>  <b>PERSETUJUAN TINDAKAN MEDIS <br> ( INFORMED CONSENT )</b></h3> </h3> 
										</div> 
									</div> 

									<div  style="left:11.08px;top:120.25px; right::11.08" class="col col-md-12 mb-4 cls_005 abs">
										<table class="table1 table-sm" border="1"  width="112%" style="font-size: 15px;border-collapse: collapse">
											<h4>Saya yang bertanda tangan dibawah ini : </h4>
											<tr><td colspan="4" style="padding: 2px 10px;"></td></tr>
											<tr>
												<td >Nama</td>
												<td>: <?php echo $row->nama_approval ?></td> 

											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td  width="25%">Umur</td>
												<td>: <?php echo $row->umur_approval ?> TH</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td >Jenis Kelamin</td>
												<td>: <?php echo $row->jenis_kelamin_approval ?></td> 
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td >Alamat</td>
												<td>: <?php echo $row->alamat ?> Rt/Rw.<?php echo $row->rt ?>/<?php echo $row->rw ?>, Desa. <?php echo $row->desa ?>, Kec. <?php echo $row->kecamatan ?>, Kab. <?php echo $row->kabupaten ?>    </td>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td >Bukti Diri (KTP)</td>
												<td>: <?php echo $row->nik_approval ?></td> 
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td colspan="2" >Dengan ini menyatakan dengan sesungguhnya telah menyetujui / menolak Untuk dilakukan<br> tindakan medis Berupa ** : <?php echo $row->tindakan_medis ?></td> 
											</tr>


											<tr>
												<td >Hubungan dengan Pasien </td>
												<td>: <?php echo $row->hubungan_dengan_pasien ?></td> 
											</tr> 

											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>


											
											<tr> 
												<td >Nama</td>
												<td>: <?php echo $row->nama_pasien ?></td> 
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td  width="25%">Umur</td>
												<td>: <?php echo $row->umur ?> TH</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td >Jenis Kelamin</td>
												<td>: <?php echo $row->jk ?></td> 
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td >Alamat</td>
												<td>: <?php echo $row->alamat ?> Rt/Rw.<?php echo $row->rt ?>/<?php echo $row->rw ?>, Desa. <?php echo $row->desa ?>, Kec. <?php echo $row->kecamatan ?>, Kab. <?php echo $row->kabupaten ?>    </td>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td >Dirawar diruang</td>
												<td>: <?php echo $row->ruang_rawat ?></td> 
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td >No.Rekam Medis</td>
												<td>: <?php echo $row->kode_rekam ?></td> 
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td colspan="2"> 
													<h4>Yang tujuan, sifat dan perlunya tindakan medis tersebut diatas, serta resiko yang dapat ditimbulkannya telah cukup dijelaskan  <br> oleh Dokter / Bidan dan telah saya mengerti sepenuhnya.Demikian surat pernyataan persetujuan ini saya buat penuh kesadaran<br>  dan tanpa paksaan dari pihak manapun juga.</h4>
												</tr>
												<tr>
													<td></td>
													<td></td>
												</tr>
												 	<td></td>
													<td></td>	 
													<td></td>
												 
												<tr>  
													<td>Parungpanjang , <?php echo $row->tanggal_berobat ?></td>
												</tr>

												<tr>
													
													<td><h4>** Isi dengan jenis tindakan medis yang akan dilakukan <br>*  Pilih diri sendiri</h4></td>
												</tr>

											<!-- <tr><td colspan="4" 

												style="padding: 2px 10px;"></td></tr> -->

											</table>
										</div>


										<tbody style="border: 1px solid white">  






										</div>
										<br><br>


									</div>







									<tr class="pemisah">
										<td colspan="2"></td>
										<td ></td>
										<td colspan="2"></td>
									</tr>






								</div>
							</div>


						</div>
					</div>
				</div>


			</div>
			<script type="text/javascript">








				function kembali(){
					window.history.back();
				}
			</script>
