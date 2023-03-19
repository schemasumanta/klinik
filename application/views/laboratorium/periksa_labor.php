<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<style type="text/css">
			.labelkolom{
				background: #03b509;
				color :white;
				border:1px solid #03b509;
			}
			.labelkategori{
				background:#e08f15;
				color :white;
				border:1px solid#087d21;
			}
			.labelsubkategori{
				color :white;
				background: #03b509;
				border:1px solid white;
			}
			
		</style>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<?php foreach ($periksa_labor as $row){ ?>
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

							<div class="card-body">  
								<form class="form-horizontal simpandata" method="post" id="form1" name="form1" action="<?php echo base_url('laboratorium/simpandata') ?>">
									
									<div class="row col-md-12x" style="background:#03b509;" > 
										<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:#03b509;margin-top: 10px; margin-left: 10px;" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA PASIEN</b></h6>

									</div>

									<div class="row col-md-12x mt-3"> 
										<div class="row"> 
											<input style="display: none;" type="text" class="form-control"  id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>" >
											<input style="display: none;" type="text" class="form-control"  id="nama_pasien" name="nama_pasien" value="<?php echo $row->nama_pasien ?>" >
											<div class="col-md-4 mb-3"> 
												<span class="input-group-text labelkolom"> KODE LAB</span> 
												<input type="text" class="form-control"  id="kode_lab" name="kode_lab" value="<?php echo $row->kode_lab ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()">
											</div>   

											<div class=" col-md-2 mb-3"> 
												<span class="input-group-text labelkolom"> Kepala Keluarga</span> 
												<input type="text" class="form-control"  id="kepala_keluarga" name="kepala_keluarga" value="<?php echo $row->kepala_keluarga ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" >
											</div> 

											<div class="col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Tempat Lahir</span> 
												<input type="date('Y-m-d')" class="form-control"  id="tempat_lahir" name="tempat_lahir" value="<?php echo $row->tempat_lahir; ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()" >
											</div>

											<div class="col-md-2 mb-3"> 
												<span class="input-group-text labelkolom">Tanggal Lahir</span> 
												<input type="date('Y-m-d')" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tanggal_lahir ?>" style="border-color: #03b509; background: #ffffff"  onclick="this.blur()">
											</div>

											<div class="col-md-2 mb-3"> 
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


												<!-- <div class="col-md-12 mb-3"> 
													<span class="input-group-text labelkolom">Yang Harus dicek Laboratorium</span> 
													<textarea type="text" class="form-control" id="diperiksalab" name="diperiksalab" style="border-color: #03b509; background: #fff700;" onclick="this.blur()" ><?php echo $row->diperiksalab ?></textarea>
												</div> -->
												


											</div> 

										</div>  
										<br>
										<div class="row mb-3 mt-2 hasilpemeriksaan" style="background:#03b509;border-top-left-radius: 15px;border-bottom-right-radius: 15px;overflow: hidden;border:1px solid #03b509;height: auto;">
											<div class="col-md-12 " style="background:#03b509;padding: 10px;margin: 0px 0px"> 
												<span type="button transparent" style="letter-spacing:3px;color:white; background:#03b509; margin-left: 10px;"><b>HASIL PEMERIKSAAN LAB</b></span>
											</div>
											<div class="col-md-12 listpemeriksaan1 listpemeriksaan">
												<div class="row">
													<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
														<span class="input-group-text labelsubkategori">Sub Kategori</span> 
														<select data="" class="form-control" id="sub_kategori1" name="sub_kategori[]" style="width: 100%" onchange="ceksubkategori(this.id)">
															<option value="0" selected disabled>Pilih Sub Kategori</option>
															<?php foreach ($kategori as $ktg) { ?>
																<option value="<?php echo $ktg->kode_kategori_lab ?>" data="<?php echo $ktg->sub_kategori ?>" normal="<?php echo $ktg->nilai_normal ?>"  satuan="<?php echo $ktg->satuan ?>"><?php echo $ktg->nama_kategori ?></option>
															<?php } ?> 
														</select>  
													</div>

													<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
														<span class="input-group-text labelsubkategori">Hasil Lab</span> 
														<input type="text" class="form-control" id="hasil_lab1" name="hasil_lab[]" style="width: 100%" >

													</div>
													<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
														<span class="input-group-text labelkategori">Nilai Normal</span> 
														<input type="text" class="form-control" id="nilai_normal1" name="nilai_normal[]">
													</div>

													<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
														<span class="input-group-text labelkategori">Satuan</span> 
														<input type="text" class="form-control" id="satuan1" name="satuan[]">
													</div>	
													<a class="btn btn-danger btn-sm text-light" style="position: absolute;bottom: 15px;right: 10px" id="hapussublab1" onclick="hapuskategori(this.id)"><i class="fas fa-trash-alt mr-1" ></i> Hapus</a>

												</div>
											</div>
											<div class="col-md-6 input-group btngroup mb-3" style="background:#03b509;">
												<span class="input-group-text fw-bold" id="basic-addon3 " style="background:#03b509; color: white; font-size: 15px ">Biaya Pemeriksaan</span>
												<input  class="form-control fw-bold text-right" type="text" id="total_akhir" name="total_akhir" style="font-size: 15px" onfocusout="SeparatorRibuan(this.value,this.id)">
											</div>
											<div class="col-md-3 btngroup" style="background:#03b509;">
											</div>
											<div class="col-md-3 btngroup" style="margin: 0px 0px;">
												<button id="tambahsublab1" type="button" class="btn btn-sm mr-1 btn-round fw-bold text-dark w-100 mt-2 mb-2" style="background: #fff700;position: relative;bottom: 0px;right: 0px" onclick="tambahkategori(this.id)"> + Tambah Kategori</button>
											</div>

										</div> 

										<div class="row mb-2">
											<div class="col-md-12" style="margin-top: 10px;">
												
												<a href="<?php echo site_url('laboratorium') ?>" class="btn  btn-sm btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
												<button id="simpan_data_lab" type="button" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> SIMPAN DATA</button> 
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
			function tambahkategori(id)
			{
				let kode = id.replace('tambahsublab','');
				let list_id=[];
				$('[name^="sub_kategori"]').each(function(){
					list_id.push($(this).attr('id').replace('sub_kategori',''));
				});
				let kode_baru = Math.max.apply(Math,list_id)+1;
				let html =`
				<div class="col-md-12 listpemeriksaan`+kode_baru+` listpemeriksaan">
				<div class="row">
				<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
				<span class="input-group-text labelsubkategori">Sub Kategori</span> 
				<select data="" class="form-control" id="sub_kategori`+kode_baru+`" name="sub_kategori[]" style="width: 100%" onchange="ceksubkategori(this.id)">
				<option value="0" selected disabled>Pilih Sub Kategori</option>
				<?php foreach ($kategori as $ktg) { ?>
					<option value="<?php echo $ktg->kode_kategori_lab ?>" data="<?php echo $ktg->sub_kategori ?>" normal="<?php echo $ktg->nilai_normal ?>"  satuan="<?php echo $ktg->satuan ?>"><?php echo $ktg->nama_kategori ?></option>
				<?php } ?> 
				</select>  
				</div>
				<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
				<span class="input-group-text labelsubkategori">Hasil Lab</span> 
				<input type="text" class="form-control" id="hasil_lab`+kode_baru+`" name="hasil_lab[]" style="width: 100%" >
				</div>
				<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
				<span class="input-group-text labelkategori">Nilai Normal</span> 
				<input type="text" class="form-control" id="nilai_normal`+kode_baru+`" name="nilai_normal[]">
				</div>

				<div class="col-md-6" style="padding: 10px;margin: 0px 0px;border:1px solid #03b509;background:#03b509;"> 
				<span class="input-group-text labelkategori">Satuan</span> 
				<input type="text" class="form-control" id="satuan`+kode_baru+`" name="satuan[]">
				</div>	
				<a class="btn btn-danger btn-sm text-light" style="position: absolute;bottom: 15px;right: 10px" id="hapussublab`+kode_baru+`" onclick="hapuskategori(this.id)"><i class="fas fa-trash-alt mr-1" ></i> Hapus</a>
				</div>
				</div>`;
				$('.listpemeriksaan:last').after(html);
				$('#sub_kategori'+kode_baru).select2(
				{
					placeholder:"Pilih Sub Kategori",
					allowClear:true,					
				});
			}

			$(document).ready(function(){
				$('[name^="sub_kategori"]').each(function(){
					$(this).select2({
						placeholder:'Pilih Sub Kategori',
						allowClear : true,
					});
				});
			})
			function cekisi(){
				let data ='';
				$('[name^="sub_kategori"]').each(function(){
					let val =$(this).val();
					let id = $(this).attr('id');
					let kode = id.replace('sub_kategori','');
					let hasil = $('#hasil_lab'+kode).val();
					if (val==null || val==0) {
						alert('Sub Kategori Kosong! , Silahkan Isi Sub Kategori / Hapus Jika tidak Dibutuhkan!');
						$('#'+id).select2('open');
						data = "false";
					}
					if (hasil == '') {
						alert('Hasil Lab Kosong! , Silahkan Isi Hasil Lab / Hapus Jika tidak Dibutuhkan!');
						$('#hasil_lab'+kode).focus();
						return false;
						data = "false";
					}
				});
				return data;
			}

			$('#simpan_data_lab').on('click',function(){
				let total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
				if (total_akhir=='') {
					alert('Biaya Pemeriksaan Kosong!');
					$('#total_akhir').focus();
					return false;
				}
				let data = 0;
				$('[name^="sub_kategori"]').each(function(){
					let val =$(this).val();
					let id = $(this).attr('id');
					let kode = id.replace('sub_kategori','');
					let hasil = $('#hasil_lab'+kode).val();
					if (val==null || val==0) {
						alert('Sub Kategori Kosong! , Silahkan Isi Sub Kategori / Hapus Jika tidak Dibutuhkan!');
						data += 1;
						$('#'+id).select2('open');
						return false;
					}else if (hasil == '') {
						alert('Hasil Lab Kosong! , Silahkan Isi Hasil Lab / Hapus Jika tidak Dibutuhkan!');
						data+=1;
						$('#hasil_lab'+kode).focus();
						return false;
					}
				});
				if (data==0) {
					$('.simpandata').submit();
				}
			});
			function ceksubkategori(id){
				let isi = $('#'+id).val();
				let kode = id.replace('sub_kategori','');
				let cek =0;
				if (isi!=null && isi!=0) {
					$('[name^="sub_kategori"]').each(function(){
						let perbandingan = $(this).val();
						if (perbandingan==isi) {
							cek+=1;
						}
					});
					if (cek > 1) {
						$('#sub_kategori'+kode).val(null).trigger('change');
						$('#nilai_normal'+kode).val('');
						$('#satuan'+kode).val('');
						alert('Sub Kategori Sudah Ada!');
						return false;
					}else{
						let nilai_normal = $('#'+id+' option:selected').attr('normal');
						let satuan = $('#'+id+' option:selected').attr('satuan');
						$('#nilai_normal'+kode).val(nilai_normal);
						$('#satuan'+kode).val(satuan);
					}
				}
			}
			function hapuskategori(id){
				let kode = id.replace('hapussublab','');
				let jumlah = $('.listpemeriksaan').length;
				if (jumlah > 1) {
					$('.listpemeriksaan'+kode).remove();
				}else{
					$('#sub_kategori'+kode).val(null).trigger('change');
					$('#nilai_normal'+kode).val('');
					$('#satuan'+kode).val('');
					$('#hasil_lab'+kode).val('');
				}
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











