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
			overflow-x:  scroll;
			width: 100%;
		}

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
			overflow-x: hidden;

		}

		#tabel_rekamfinal{
			overflow-x: hidden;

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
							<a href="<?php echo site_url('pasien') ?>"  class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a>
							<i class="fas fa-briefcase-medical mr-3"></i><span style="font-size: 25px;"><b>SURAT KETERANGAN SEHAT & SAKIT</b></span>
							<!-- <h4 style="font-weight: bold;margin-top: 10px;">SURAT KETERANGAN SAKIT</h4> -->
						</div>


						<div class="card-body">  
							<form method="post" action="<?php echo base_url();?>surat/simpansurat">


								<tbody style="border: 1px solid white">   
									<div class="row mt-1">

										<div class="col-md-12 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Pembuatan </span> 
											<select type="text" class="form-control form-control-sm" name="keterangan" required="required" id="keterangan" onchange="keterangan()" style="border-color: #03b509; background: #ffffff" >
												<option value="0" selected> -- Pembuatan Surat--</option>
												<option value="Surat Keterangan Sakit">Surat Keterangan Sakit</option>
												<option value="Surat Keterangan Sehat">Surat Keterangan Sehat</option>
											</select>
										</div> 



									</div>

									<?php foreach ($buat_surat as $data) {  ?>


										<div class="row">

											<div class="col-md-3 mt-2 ml-1">
												<h4 >Nama Pasien</h4>
											</div>

											<div class="col-md-4 mb-3"> 
												<input type="text" class="form-control form-control-md" id="nama_pasien" name="nama_pasien" value=":  <?php echo $data->nama_pasien ?>"  style="border-color: #ffffff; background: #ffffff;text-decoration: underline;"> 

											</div>  
											<input style="display: none;" type="text" class="form-control form-control-sm" name="kode_pasien" id="kode_pasien"  value="<?php echo $data->kode_pasien ?>">
										</div>
										<div class="row">
											<div class="col-md-3 mt-2 ml-1">
												<h4 >Umur Pasien</h4>
											</div>
											<div class="col-md-2 mb-3"> 
												<input type="text" class="form-control form-control-md" id="umur" name="umur" value=":  <?php echo $data->umur ?>"  style="border-color: #ffffff; background: #ffffff;text-decoration: underline;"> 

											</div> 
										</div>
										<div class="row">
											<div class="col-md-3 mt-2 ml-1">
												<h4 >Jenis Kelamin</h4>
											</div>
											<div class="col-md-2 mb-3"> 
												<input type="text" class="form-control form-control-md" id="jk	" name="jk	" value=":  <?php echo $data->jk	 ?>"  style="border-color: #ffffff; background: #ffffff;text-decoration: underline;"> 

											</div> 
										</div>
										<div class="row">
											<div class="col-md-3 mt-2 ml-1">
												<h4 >Alamat</h4>
											</div>

											<div class="col-md-8 mb-3"> 
												<input type="text" class="form-control form-control-md" id="alamat" name="alamat" value=" :  <?php echo $data->alamat ?>, Rt/RW <?php echo $data->rt ?>:<?php echo $data->rw ?>, <?php echo $data->desa ?>,<?php echo $data->kecamatan ?>"  style="border-color: #ffffff; background: #ffffff;text-decoration: underline;"> 

											</div> 

										</div>



									</div>  

								<?php } ?>

								<hr> 

								<div class="row mt-1 ml-2 mr-2" id="tgl" style="display: none;">
									

									<div class="col-md-6 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Pekerjaan</span> 
										<input type="text" class="form-control form-control-sm" name="pekerjaan" id="pekerjaan" style="border-color: #03b509; background: #ffffff"  > 
									</div> 



									<div class="col-md-6 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Karena kesehatannya memerlukan istirahat selama</span> 
										<input type="number" class="form-control form-control-sm" name="hari" id="hari" style="border-color: #03b509; background: #ffffff"  > 
									</div> 
									<div class="col-md-6 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Dari Tanggal</span> 
										<input type="date" class="form-control form-control-sm" name="dari_tanggal" id="dari_tanggal" style="border-color: #03b509; background: #ffffff"  > 
									</div> 



									<div class="col-md-6 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Sampai Tanggal </span> 
										<input type="date" class="form-control form-control-sm" name="sampai_tanggal" id="sampai_tanggal" style="border-color: #03b509; background: #ffffff"  > 
									</div> 


									<!-- <div class="col-md-6 mb-3" > </div>
									<div class="col-md-6 mb-3" > 
										<span class="input-group-text" style="background: #03b509;color :white">Tanggal Dibuat </span> 
										<input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal" style="border-color: #03b509; background: #ffffff"> 
									</div>  -->




								</div> 
								<br> 
								<div class="row mt-1 ml-2 mr-2" id="ssehat" style=" display: none;">

									<div class="col-md-12 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Surat Keterangan ini dipergunaan untuk  </span> 
										<input type="text" class="form-control form-control-sm" name="keperluan" id="keperluan" style="border-color: #03b509; background: #ffffff"  > 
									</div> 

									<!-- <div class="col-md-4 mb-3" > 
										<span class="input-group-text" style="background: #03b509;color :white">Tanggal Dibuat </span> 
										<input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal" style="border-color: #03b509; background: #ffffff"> 
									</div>  -->

									<div class="col-md-4 "> 
										<span class="input-group-text" style="background: #03b509;color :white">Tinggi Badan</span> 
										<input type="text" class="form-control form-control-sm"  id="tb" name="tb" placeholder="Input Tinggi Badan" >
									</div>  


									<div class="col-md-4"> 
										<span class="input-group-text" style="background: #03b509;color :white">Berat Badan</span> 
										<input type="text" class="form-control form-control-sm"  id="bb" name="bb" placeholder="Input Berat Badan">
									</div> 

									<div class="col-md-4"> 
										<span class="input-group-text" style="background: #03b509;color :white">Tekanan Darah</span> 
										<input type="text" class="form-control form-control-sm"  id="tekanan_darah" name="tekanan_darah" placeholder="Input Berat Badan">
									</div>  

								</div>  


								<br>

								<div class="row mt-1 ml-2 mr-2" id="harga" style="display: none;"> 
									<div class="col-md-9 mb-3"> </div>
									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Pembuatan Surat (Rp.) </span> 
										<input type="text" class="form-control form-control-sm" name="total_akhir" id="total_akhir" value="0" style="border-color: #03b509; background: #ffffff"  > 
									</div>  
								</div> 


								<div class="row ml-2 mb-2">
									<div class="col-md-4">
										<button id="simpan"  onclick="ket() "class="btn btn-sm btn-success" type="submit"> <i class="fa fa-save"></i> Simpan </button>
										<a href="<?php echo site_url('surat' ) ?>" class="btn  btn-sm btn-danger"> <i class="fa fa-times"></i> Batal</a>

									</div> 
								</div>

							</div>
							<br>
						</form>

					</div>



				</div>
			</div>
		</div>


	</div>

	<script>


		 


		$(function() {
			$('#keterangan').on('change',function(){
				if( $(this).val()==="Surat Keterangan Sakit"){
					$("#tgl").show()
					$("#ssehat").hide()
					$("#harga").show()
					$("tgl_dibuat").show()

				}
				else{
					$("#ssehat").show() 
					$("#tgl").hide()
					$("#harga").show()

				}
			}); 
		});

		 


		 


	</script>

				<!-- <script type="text/javascript">
				$('#simpan_surat').on('click',function(){ 
				var kode_pasien = $('#kode_pasien').val();
				var keterangan = $('#keterangan').val();


				var tb = $('#tb').val();
				var bb = $('#bb').val();
				var tekanan_darah = $('#tekanan_darah').val();
				var tanggal = $('#tanggal').val();
				var keperluan = $('#keperluan').val();
				var total_akhir =$('#total_akhir').val();



				if (keterangan == "") {
					alert("Opsi Keterangan Belum Terisi ");
					$('#keterangan').focus();
					return false;
				}


				if (tb == "") {
					alert("Tinggi Badan Belum Terisi ");
					$('#tb').focus();
					return false;
				}


				if (bb == "") {
					alert("Berat Badan Belum Terisi ");
					$('#bb').focus();
					return false;
				}

				if (tekanan_darah == "") {
					alert("Tekanan Darah Belum Terisi ");
					$('#tekanan_darah').focus();
					return false;
				}


				if (tanggal == "") {
					alert("Tanggal Belum Terisi");
					$('#tanggal').focus();
					return false;
				}

				if (keperluan == "") {
					alert("keperluan Belum Terisi");
					$('#keperluan').focus();
					return false;
				}

				if (total_akhir == "") {
					alert("Total Akhir Masih Kosong");
					$('#total_akhir').focus();
					return false;
				}





				$.ajax({
					url   : '<?php echo base_url()?>surat/simpansurat',
					type: 'post',
					async: true,
					dataType: 'json',
					data:{
						kode_pasien:kode_pasien,keterangan:keterangan,dari_tanggal:dari_tanggal,sampai_tanggal:sampai_tanggal,tb:tb,bb:bb,tekanan_darah:tekanan_darah,tanggal:tanggal,keperluan:keperluan,total_akhir:total_akhir},
 
						success: function(data){
							alert(data); 
							window.location.href ="<?php echo site_url('surat'); ?>"; 
						}

					});




			});

		</script> -->

