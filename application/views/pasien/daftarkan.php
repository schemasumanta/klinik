<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<style type="text/css">

	.modal-backdrop{
		display: none;
	}

	.labelkolom{
		background: #03b509;
		color :white;
	}
	.isikolom{
		border-color: #03b509;
		background: #ffffff;
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

	.disnon{
		display: none;
	}

</style>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">FORM DAFTAR PASIEN</h4>
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
						<a href="<?php echo site_url('medis') ?>">DAFTAR</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Daftar Pasien</a>
					</li>
				</ul>
			</div>
			<div class="row">

				<div class="col-md-12">
					<div class="card">

						<div class="card-header">
							<div class="row">
								<div class="col-md-12">
									<a href="<?php echo site_url('pasien') ?>" class="btn btn-sm btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a> 
									<p class="card-title">FORM PENDAFTARAN DATA PASIEN</p> 
								</div>

							</div>
						</div>

						<div class="card-body">  
							<form method="POST" action="<?php echo base_url()?>pasien/simpan_daftar_pasien" class="simpandata">
								<div class="form-group row" style="background: #03b509">
									<?php foreach ($daftarkan_pasien as $row) { ?>

										<div class="col-sm-12 float-sm-right">
											<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><i class="fas fa-file-import mr-2"></i> <b>PENDAFTARAN PASIEN</b></h3> 
										</div> 
									</div> 

									<br>
									<div class="form-group row">
										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom"> <i class="far fa-window-restore mr-1"></i>Kode Pasien</span> 
											<input type="text" class="form-control form-control-md isikolom" id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" onclick="this.blur()" >
										</div> 

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Nama Pasien</span> 
											<input type="text" class="form-control form-control-md isikolom" id="nama_pasien_daftarkan" name="nama_pasien_daftarkan"  value="<?php echo $row->nama_pasien ?> - <?php echo $row->nik ?>" onclick="this.blur()" >
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Kategori</span> 
											<input type="text" class="form-control form-control-md isikolom" id="kategori_pasien" name="kategori_pasien"  value="<?php echo $row->kategori_pasien ?>" onclick="this.blur()" >
										</div>

										<div class="col-md-3 mb-3"> 
											<span class="input-group-text labelkolom"><i class="fas fa-thermometer-three-quarters mr-1"></i>Status Pasien</span> 
											<input type="text" class="form-control form-control-md isikolom" id="status_pasien" name="status_pasien" value="Belum Diperiksa" style="background:#ffc107; color: black" onclick="this.blur()" >
										</div>


										<div class="col-md-12 mb-3" style=""> 
											<span class="input-group-text labelkolom"> <i class="fas fa-map-marker-alt mr-1"></i> Alamat Pasien</span> 
											<textarea type="text" class="form-control form-control-md isikolom" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="2" onclick="this.blur()"  > <?php echo $row->alamat ?> </textarea>
										</div> 
										<div class="col-md-3 mb-3" id="lblsuhu">
											<span class="input-group-text labelkolom">Suhu Tubuh</span> 
											<input type="text" class="form-control form-control-md isikolom" id="suhu" name="suhu"  >
										</div>

										<div class="col-md-3 mb-3" id="lbltensi">
											<span class="input-group-text labelkolom">Tensi Darah</span> 
											<input type="text" class="form-control form-control-md isikolom" id="tensi_darah" name="tensi_darah" >
										</div>

										<div class="col-md-3 mb-3" id="lblsaturasi">
											<span class="input-group-text labelkolom">Saturasi</span> 
											<input type="text" class="form-control form-control-md isikolom" id="saturasi" name="saturasi"  >
										</div>

										<div class="col-md-3 mb-3" id="lblpernapasan">
											<span class="input-group-text labelkolom">Pernapasan</span> 
											<input type="text" class="form-control form-control-md isikolom" id="pernapasan" name="pernapasan"  >
										</div>

										<div class="col-md-3 mb-3" id="lblnadi">
											<span class="input-group-text labelkolom">Nadi</span> 
											<input type="text" class="form-control form-control-md isikolom" id="nadi" name="nadi"  >
										</div>

										<div class="col-md-3 mb-3" id="lblbb">
											<span class="input-group-text labelkolom">Berat Badan</span> 
											<input type="text" class="form-control form-control-md isikolom" id="bb" name="bb"  >
										</div>

										<div class="col-md-3 mb-3" id="lbltb">
											<span class="input-group-text labelkolom">Tinggi Badan</span> 
											<input type="text" class="form-control form-control-md isikolom" id="tb" name="tb"  >
										</div>
										<div class="col-md-3 mb-3" style=""> 
											<span class="input-group-text labelkolom"> <i class="far fa-list-alt mr-1"></i> Pengobatan</span>
											<select type="text" class="form-control form-control-sm" id="pengobatan" name="pengobatan"  style="border-color: #03b509; background: #ffffff;width: 100%">
												<option value="0" disabled="disabled" selected="selected">Kategori Pengobatan</option>
												<option value="ANC">ANC</option>
												<option value="IMUNISASI">IMUNISASI</option>  
												<option value="BBL">BBL</option>
												<option value="INC">INC</option>  
												<option value="KB">KB</option> 
												<option value="NIFAS">NIFAS</option> 
												<option value="UMUM">UMUM</option> 
												<option value="PEMERIKSAAN LABORATORIUM">PEMERIKSAAN LABORATORIUM </option> 
												<option value="RAPID TES SARS - COVID-2">RAPID TES SARS - COVID-2</option> 
												<option value="SWAB ANTIGEN SARS - COV-2">SWAB ANTIGEN SARS - COV-2</option>  
												<option value="HOME CARE">HOME CARE</option>  
												<option value="RAWAT INAP">RAWAT INAP</option>  
												<!-- <option value="SURAT PENOLAKAN">SURAT PENOLAKAN</option>   -->

											</select> 
										</div> 

										<div class="col-md-12 mb-3 keterangan_pemeriksaan_lab disnon"> 
											<span class="input-group-text labelkolom">Keterangan Pemeriksaan Lab</span> 
											<input type="text" rows="3" class="textarea_atas form-control isikolom" id="keterangan_pemeriksaan_lab" name="keterangan_pemeriksaan_lab"  required="required" > 
										</div>


										<div class="col-md-12 mb-3 observasi disnon"> 
											<span class="input-group-text labelkolom">Approval</span> 
											<select type="text" rows="3" class="textarea_atas form-control isikolom" id="approval" name="approval"  required="required" > 
												<option value="0" selected disabled>Pilih</option>  
												<option value="KELUARGA">KELUARGA</option>  
												<option value="DIRI SENDIRI">DIRI SENDIRI</option>  
											</select>
										</div>

										<div class="col-md-12 observasi disnon"> 
											<div class="card-body">  
												<div class="form-group row" id="ranap" style="background: #03b509;"> 
													<div class="col-sm-12 float-sm-right">
														<h3  type="button transparent"  style="color:white; background:transparent;margin-top: 10px;" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><i class="fas fa-file-import mr-2"></i> <b>DATA KELUARGA YANG BERSANGKUTAN</b></h3> 
													</div> 
												</div> 
												<br>
												<div class="form-group row"> 
													<div class="col-md-3 mb-3" id="nama_app"> 
														<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Nama</span> 
														<input type="text" class="form-control form-control-md isikolom" id="nama_approval" name="nama_approval">
													</div>

													<div class="col-md-3 mb-3" id="umur_app"> 
														<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Umur</span> 
														<input type="text" class="form-control form-control-md isikolom" id="umur_approval" name="umur_approval" >
													</div>

													<div class="col-md-3 mb-3" id="jk_app"> 
														<span class="input-group-text labelkolom"><i class="fas fa-thermometer-three-quarters mr-1"></i>Jenis Kelamin</span> 
														<select type="text" class="form-control  form-control-md isikolom " name="jenis_kelamin_approval" id="jenis_kelamin_approval"  >
															<option value="0" selected> -- Pilih Jenis Kelamin--</option>
															<option value="L">Laki-Laki</option>
															<option value="P">Perempuan</option>
														</select>
													</div> 

													<div class="col-md-3 mb-3" id="hubungan_app"> 
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
													<div class="col-md-3 mb-3" id="nik_app"> 
														<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>NIK</span> 
														<input type="text" class="form-control form-control-md isikolom" id="nik_approval" name="nik_approval" >
													</div>

													<div class="col-md-3 mb-3" id="Ruang"> 
														<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i> Ruang Rawat</span> 
														<input type="text" class="form-control form-control-md isikolom" id="ruang_rawat" name="ruang_rawat" >
													</div>

													<div class="col-md-3 mb-3" id="saksi1_app"> 
														<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Saksi 1</span> 
														<input type="text" class="form-control form-control-md isikolom" id="nama_saksi1" name="nama_saksi1">
													</div>

													<div class="col-md-3 mb-3" id="saksi2_app"> 
														<span class="input-group-text labelkolom">  <i class="fa fa-user mr-1"></i> Saksi 2</span> 
														<input type="text" class="form-control form-control-md isikolom" id="nama_saksi2" name="nama_saksi2"  >
													</div>
													<div class="col-md-3 mb-3" id="persetujuan_rawat"> 
														<span class="input-group-text labelkolom" ><i class="fas fa-clipboard-list mr-1"></i>Persetujuan Tindak Medis</span> 
														<select class="form-control " id="persetujuan_rawat" name="persetujuan_rawat" >
															<option value="0" selected disabled>--Select--</option>
															<option value="menyetujui">menyetujui</option>
															<option value="menolak">menolak</option>  
														</select>
													</div>


												</div> 
												<div class=" form-group row">
													<div class="mb-3 col-md-4" id="ttd" style="position: relative"> 
														<span class="input-group-text" style="background: #03b509;color :white; width:100%;"> <i class="far fa-list-alt mr-1"></i> Saksi 1</span>
														<canvas style="width: 100%" id="signature-pad" name="signature-pad" class="signature-pad"></canvas>
														<input type="hidden" name="isi_ttd0" id="isi_ttd0">
														<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign0"><i class="fas fa-eraser"></i></button>
													</div> 

													<div class="mb-3 col-md-4" id="ttd1" style="position: relative" > 
														<span class="input-group-text" style="background: #03b509;color :white; width:100%;"> <i class="far fa-list-alt mr-1"></i> Yang membuat Pernyataan</span>
														<input type="hidden" name="isi_ttd1" id="isi_ttd1">
														<canvas style="width: 100%" id="signature-pad1" name="signature-pad1" class="signature-pad1"></canvas>
														<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign1"><i class="fas fa-eraser"></i></button>
													</div> 

													<div class="mb-3 col-md-4" id="ttd2"style="position: relative"> 
														<span class="input-group-text" style="background: #03b509;color :white; width:100%;"> <i class="far fa-list-alt mr-1"></i> Saksi 2</span>
														<input type="hidden" name="isi_ttd2" id="isi_ttd2">
														<canvas style="width: 100%" id="signature-pad2" name="signature-pad2" class="signature-pad2"></canvas>
														<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign2"><i class="fas fa-eraser"></i></button>
													</div>  
												</div> 
											</div> 
										</div>
									</div>
									<br> 
									<br> 


									<a href="<?php echo site_url('pasien') ?>" class="btn btn-sm btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
									<button id="daftarkan" type="button" isi="1" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> DAFTARKAN PASIEN</button> 

								<?php } ?>

							</form>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div> 



</div> 

<script type="text/javascript">
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


	$('#pengobatan').on('change',function(){

		if($(this).val()==="PEMERIKSAAN LABORATORIUM"){
			$('.keterangan_pemeriksaan_lab').removeClass('disnon');
		} else{
			$('.keterangan_pemeriksaan_lab').addClass('disnon');
		}


		if($(this).val()==="RAWAT INAP" || $(this).val()==="HOME CARE"){
			$('.observasi').removeClass('disnon');
		} 
		else{
			$('.observasi').addClass('disnon');
		}
		
	}); 
	$('#approval').on('change',function(){
		reset_form_approval();
		if ($(this).val()=='DIRI SENDIRI') { 
			$('#hubungan_dengan_pasien').val('Diri Saya Sendiri');

		}
	});

	function reset_form_approval()
	{
		$('#nama_approval').val('');
		$('#umur_approval').val('');
		$('#jenis_kelamin_approval').val(0);
		$('#hubungan_dengan_pasien').val(0);
		$('#nik_approval').val('');
		$('#ruang_rawat').val('');
		$('#nama_saksi1').val('');
		$('#nama_saksi2').val('');
		$('#persetujuan_rawat').val('');
		signaturePad.clear();
		signaturePad1.clear();
		signaturePad2.clear();

	}
	$(document).ready(function(){
		$('#pengobatan').select2({
			placeholder:"Kategori Pengobatan",
			allowClear: true,
		})

	}) 

	$('#daftarkan').on('click',function(){ 		
		
		var obat = $('#pengobatan').val();

		if (obat==null){
			$('#pengobatan').focus();
			Swal.fire({
				title:'Pengobatan Kosong',
				text:'Silahkan Pilih Pengobatan!',
				icon:'error'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.close();
				}
			});
			return false;
		}

		$('.simpandata').submit();

	});




	
</script> 