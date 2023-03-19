	<style type="text/css">
		
		.modal-backdrop{
			display: none;
		}


	</style>


	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">FORM DATA OBAT</h4>
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
							<a href="<?php echo site_url('medis') ?>">Obat</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="#">Tambah Data Obat</a>
						</li>
					</ul>
				</div>
				<div class="row">

					<div class="col-md-12">
						<div class="card">
							
							<div class="card-header">
								<div class="row">
									<div class="col-md-12">
										<a href="<?php echo site_url('satuan_obat') ?>" class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a> 
										<p class="card-title">FORM TAMBAH DATA OBAT</p> 
									</div>

								</div>
							</div>


							<div class="card-body">  
								<div class="form-group row" style="background: #03b509">

									<div class="col-sm-12 float-sm-right">
										<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA OBAT</b></h3> 
									</div> 
								</div>

								<br >



								<div class="row" class="collapse" id="customer_collapse"> 

									
									<div class="col-md-4 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Nama Obat</span> 
										<input type="text" class="form-control"  id="nama_obat" name="nama_obat"  style="border-color: #03b509; background: #ffffff" >
									</div>


									<div class="col-md-4 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Keterangan Obat</span> 
										<input type="text" class="form-control"  id="keterangan" name="keterangan"style="border-color: #03b509; background: #ffffff" >
									</div>

									<div class="col-md-4 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Satuan</span> 
										<select type="text" class="form-control form-control-md" id="satuan_obat" name="satuan_obat" style="border-color: #03b509; background: #ffffff">
											<option value="0" disabled="disabled" selected>-- Pilih Satuan --</option>
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






								</div>

								<div class="row" class="collapse" id="customer_collapse">  
									<div class=" col-md-4 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Harga Beli</span> 
										<input type="text" class="form-control"  id="harga_beli" name="harga_beli"  onfocusout="SeparatorRibuan(this.value,this.id)" style="border-color: #03b509; background: #ffffff" >
									</div>

									<div class= "col-md-4 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Harga Jual</span> 
										<input type="text" class="form-control"  id="harga_jual" name="harga_jual"  onfocusout="SeparatorRibuan(this.value,this.id)" style="border-color: #03b509; background: #ffffff" readonly="readonly">
									</div>

									<div class="col-md-4 mb-3"> 
											<span class="input-group-text" style="background: #03b509;color :white">Jumlah</span> 
										<input type="text" class="form-control"  id="total_stok" name="total_stok"  onfocusout="SeparatorRibuan(this.value,this.id)" style="border-color: #03b509; background: #ffffff">
									</div> 

								</div>

								<div class="row" class="collapse" id="customer_collapse">  
									<div class=" col-md-12 mb-3"> 
											<span class="input-group-text" style="background: red;color :white">Tanggal expired obat</span> 
										<input type="date" class="form-control"  id="expired_date_obat" name="expired_date_obat"   style="border-color: red; background: #ffffff" >
									</div>

									 

								</div>



								<a href="<?php echo site_url('satuan_obat') ?>" class="btn  btn-sm btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> Cancel</a>
								<button id="simpan_data" type="button" isi="1" class="btn  btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i>Simpan</button> 
							</div> 

						</div>
					</div>
				</div>
			</div>
		</div> 

	</div>

	<script type="text/javascript">





		$('#harga_beli').on('keyup',function(){

			let harga_beli = $(this).val().toString().replace(/\./g,'');
			let harga_jual = parseFloat(harga_beli) + (parseFloat(harga_beli)*60/100);
			SeparatorRibuan(harga_jual.toString(),'harga_jual');
		});
		$('#simpan_data').on('click',function(){ 
			// var kode_obat = $('#kode_obat').val();
			var nama_obat = $('#nama_obat').val();
			var keterangan = $('#keterangan').val()
			var harga_beli = $('#harga_beli').val().toString().replace(/\./g,'');
			var harga_jual = $('#harga_jual').val().toString().replace(/\./g,'');
			var satuan_obat = $('#satuan_obat').val(); 
			var total_stok = $('#total_stok').val().toString().replace(/\./g,'');
			var expired_date_obat = $('#expired_date_obat').val();


			$.ajax({
				url   : '<?php echo base_url()?>satuan_obat/simpan',
				type: 'post',
				async: true,
				dataType: 'json',
				data 	 :{
					'nama_obat':nama_obat,
					'keterangan':keterangan,
					'harga_beli':harga_beli,
					'harga_jual':harga_jual,
					'satuan_obat':satuan_obat,
					'total_stok':total_stok,
					'expired_date_obat':expired_date_obat
				},


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