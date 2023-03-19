	<style type="text/css">
		
		.modal-backdrop{
			display: none;
		}


	</style>


	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">EDIT DATA OBAT</h4>
					<ul class="breadcrumbs">
						<li class="nav-home">
							<a href="<?php echo site_url('dashboard');?>">
								<i class="flaticon-home"></i>
							</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('medis') ?>">Data Obat</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="#">Edit Obat</a>
						</li>
					</ul>
				</div>
				<div class="row">

					<div class="col-md-12">
						<div class="card">
							
							<div class="card-header">
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo site_url('satuan_obat') ?>" class="btn btn-sm btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a> 
										<p class="card-title">FORM EDIT DATA OBAT</p> 
									</div>

								</div>
							</div>


							<div class="card-body">  
								<div class="form-group row" style="background: #03b509">

									<div class="col-sm-12 float-sm-right">
										<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>RINCIAN OBAT</b></h3> 
									</div> 
								</div>

								<br>

								<?php if ($this->session->level=="superadmin") {?>

									<?php foreach ($satuan_obat as $data){ ?> 
										<div class="row" class="collapse" id="customer_collapse"> 
											<div class="input-group col-md-3 mb-3" style="display: none">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Kode Obat</span>
												</div>
												<input type="text" class="form-control"  id="kode_obat" name="kode_obat" value="<?php echo $data->kode_obat ?>" disabled>
											</div>
											<div class="col-md-4 mb-3">
												<span class="input-group-text" style="background: #03b509;color :white">Nama Obat</span>
												<input type="text" class="form-control"  id="nama_obat" name="nama_obat" value="<?php echo $data->nama_obat ?>"  style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-4 mb-3">
												<span class="input-group-text" style="background: #03b509;color :white">Keterangan Obat</span>
												<input type="text" class="form-control"  id="keterangan" name="keterangan" value="<?php echo $data->keterangan ?>"  style="border-color: #03b509; background: #ffffff" >
											</div>

											<div class="col-md-4 mb-3">
												<span class="input-group-text" style="background: #03b509;color :white">Satuan</span>

												<select type="text" class="form-control form-control-md" id="satuan_obat" name="satuan_obat"  style="border-color: #03b509; background: #ffffff"> 
													<option value="0" disabled="disabled" selected>Pilih Satuan</option>
													<option value="Ampul">Ampul</option>
													<option value="Botol">Botol</option>
													<option value="Box">Box</option>
													<option value="Botol">Botol</option>
													<option value="Capsule">Capsule</option>
													<option value="Kotak">Kotak</option>
													<option value="Pcs">Pcs</option>
													<option value="Pot">Pot</option>
													<option value="Strip">Strip</option>
													<option value="Tablet">Tablet</option>
													<option value="Tube">Tube</option>
													<option value="Vial">Vial</option>

												</select>
											</div>



											<div class="input-group col-md-4 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Harga Beli</span>
												</div>
												<input type="text" class="form-control"  id="harga_beli" name="harga_beli" value="<?php echo number_format(floatval($data->harga_beli),0,",","."); ?>" style="border-color: #03b509; background: #ffffff" onfocusout="SeparatorRibuan(this.value,this.id)">
											</div>



											<div class="input-group col-md-4 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Harga Jual</span>
												</div>
												<input type="text" class="form-control"  id="harga_jual" name="harga_jual" value="<?php echo number_format(floatval($data->harga_jual),0,",","."); ?>" style="border-color: #03b509; background: #ffffff" readonly="readonly">
											</div>
											<div class="input-group col-md-4 mb-3">
											</div>



											<div class="input-group col-md-2 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Stok Awal</span>
												</div>
												<input type="text" class="form-control"  id="total_stok" name="total_stok" value="<?php echo $data->total_stok ?>"   style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="input-group col-md-2 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white" ><b>Stok Akhir</b></span>
												</div>
												<input type="text" class="form-control"  id="stok_akhir" name="stok_akhir"   value="<?php echo $data->total_stok ?>"    style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="input-group col-md-4 mb-3">

												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white"><b>+</b></span>
												</div>

												<input type="text" class="form-control"  value="0" id="tambah" name="tambah"  onkeyup="hitungstok()" style="border-color: #03b509; background: #ffffff">

												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #F31A1A;color :white"><b>-</b></span>
												</div>

												<input type="text" class="form-control"  value="0" id="kurang" name="kurang"   onkeyup="hitungstok()" style="border-color: #03b509; background: #ffffff">
											</div> 


										</div>
									<?php } ?>

								<?php } ?>


								<!-- FARMASI -->

								<?php if ($this->session->level=="farmasi") {?>
									
									<?php foreach ($satuan_obat as $data){ ?> 
										<div class="row" class="collapse" id="customer_collapse"> 
											<div class="input-group col-md-3 mb-3" style="display: none">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Kode Obat</span>
												</div>
												<input type="text" class="form-control"  id="kode_obat" name="kode_obat" value="<?php echo $data->kode_obat ?>" disabled>
											</div>
											<div class="col-md-4 mb-3">
												<span class="input-group-text" style="background: #03b509;color :white">Nama Obat</span>
												<input type="text" class="form-control"  id="nama_obat" name="nama_obat" value="<?php echo $data->nama_obat ?>"  style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="col-md-4 mb-3">
												<span class="input-group-text" style="background: #03b509;color :white">Keterangan Obat</span>
												<input type="text" class="form-control"  id="keterangan" name="keterangan" value="<?php echo $data->keterangan ?>"  style="border-color: #03b509; background: #ffffff" >
											</div>

											<div class="col-md-4 mb-3">
												<span class="input-group-text" style="background: #03b509;color :white">Satuan</span>

												<select type="text" class="form-control form-control-md" id="satuan_obat" name="satuan_obat"  style="border-color: #03b509; background: #ffffff"> 
													<option value="0" disabled="disabled" selected>Pilih Satuan</option>
													<option value="Ampul">Ampul</option>
													<option value="Botol">Botol</option>
													<option value="Box">Box</option>
													<option value="Botol">Botol</option>
													<option value="Capsule">Capsule</option>
													<option value="Kotak">Kotak</option>
													<option value="Pcs">Pcs</option>
													<option value="Pot">Pot</option>
													<option value="Strip">Strip</option>
													<option value="Tablet">Tablet</option>
													<option value="Tube">Tube</option>
													<option value="Vial">Vial</option>

												</select>
											</div>
											

											
											<div class="input-group col-md-4 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Harga Beli</span>
												</div>
												<input type="text" class="form-control"  id="harga_beli" name="harga_beli" value="<?php echo number_format(floatval($data->harga_beli),0,",","."); ?>" style="border-color: #03b509; background: #ffffff">
											</div>



											<div class="input-group col-md-4 mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Harga Jual</span>
												</div>
												<input type="text" class="form-control"  id="harga_jual" name="harga_jual" value="<?php echo number_format(floatval($data->harga_jual),0,",","."); ?>" style="border-color: #03b509; background: #ffffff">
											</div>
											<div class="input-group col-md-4 mb-3">
											</div>
											


											<div class="input-group col-md-2 mb-3" style="display: none;">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white">Stok Awal</span>
												</div>
												<input type="text" class="form-control"  id="total_stok" name="total_stok" value="<?php echo $data->total_stok ?>"   style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="input-group col-md-2 mb-3"  style="display: none;">
												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white" ><b>Stok Akhir</b></span>
												</div>
												<input type="text" class="form-control"  id="stok_akhir" name="stok_akhir"   value="<?php echo $data->total_stok ?>"    style="border-color: #03b509; background: #ffffff">
											</div>

											<div class="input-group col-md-4 mb-3"  style="display: none;">

												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #03b509;color :white"><b>+</b></span>
												</div>

												<input type="text" class="form-control"  value="0" id="tambah" name="tambah"  onkeyup="hitungstok()" style="border-color: #03b509; background: #ffffff">

												<div class="input-group-prepend">
													<span class="input-group-text" style="background: #F31A1A;color :white"><b>-</b></span>
												</div>

												<input type="text" class="form-control"  value="0" id="kurang" name="kurang"   onkeyup="hitungstok()" style="border-color: #03b509; background: #ffffff">
											</div> 


										</div>
									<?php } ?>

								<?php } ?>

								<!-- FARMASI -->
								<br>
								<br>
								<br> 

								<button id="edit_data_satuan" type="button" isi="1" class="btn btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save mr-2"></i>Update</button> 

								<a href="<?php echo site_url('satuan_obat') ?>" class="btn btn-sm btn-danger mr-2" style="float:right" ><i class="fa fa-times mr-2"></i>Cancel</a>
							</div>



						</div>
					</div>
				</div>
			</div>
		</div>











	</div>

	<script type="text/javascript">

		$(document).ready(function(){
			let satuan ='<?php echo $data->satuan_obat; ?>';

			$("#satuan_obat option").each(function()
			{
				let pilihan = $(this).val();
				if (pilihan==satuan) {
					$(this).prop('selected','selected');
				}
			});


		});


		$('#harga_beli').on('keyup',function(){

			let harga_beli = $(this).val().toString().replace(/\./g,'');
			let harga_jual = parseFloat(harga_beli) + (parseFloat(harga_beli)*60/100);
			SeparatorRibuan(harga_jual.toString(),'harga_jual');
		});


		function hitungstok()
		{
			
			let stok_awal = $('#total_stok').val() >= 0 ? $('#total_stok').val():0;
			let tambah = $('#tambah').val() >= 0 ? $('#tambah').val():0 ;
			let kurang = $('#kurang').val() >= 0 ? $('#kurang').val():0 ;


			let jml =  parseFloat(stok_awal) + parseFloat(tambah)-parseFloat(kurang);
			$('#stok_akhir').val(jml);
		}


		$('#edit_data_satuan').on('click',function(){
			let kode_obat = $('#kode_obat').val();
			let nama_obat = $('#nama_obat').val();
			let keterangan = $('#keterangan').val();
			let harga_beli = $('#harga_beli').val().toString().replace(/\./g,'');
			let harga_jual = $('#harga_jual').val().toString().replace(/\./g,'');
			let satuan_obat = $('#satuan_obat').val();
			let total_stok = $('#stok_akhir').val();

			$.ajax({
				url   : '<?php echo base_url()?>satuan_obat/edit_satuan_aksi',
				type: 'post',
				async: true,
				dataType: 'json',
				data 	 :{
					kode_obat:kode_obat,nama_obat:nama_obat,keterangan:keterangan,harga_beli:harga_beli,harga_jual:harga_jual,satuan_obat:satuan_obat,total_stok:total_stok},



					success: function(data){
						alert(data); 
						window.location.href ="<?php echo site_url('satuan_obat'); ?>"; 
					}

				});

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