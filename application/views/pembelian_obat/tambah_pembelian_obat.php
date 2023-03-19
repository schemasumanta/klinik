<style type="text/css">

.modal-backdrop{
	display: none;
}


</style>


<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">FORM PEMBELIAN OBAT</h4>
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
						<a href="#">Pembelian Obat</a>
					</li>
				</ul>
			</div>
			<div class="row">

				<div class="col-md-12">
					<div class="card">
						
						<div class="card-header">
							<div class="row">
								<div class="col-md-12">
									<a href="<?php echo site_url('pembelian_obat') ?>" class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a> 
									<p class="card-title">FORM PEMBELIAN OBAT</p> 
								</div>

							</div>
						</div>


						<div class="card-body">  
							<form class="form-horizontal simpandata" method="post" id="form1" name="form1" >
								<!-- onsubmit="dummy() return false -->
								<div class="form-group row" style="background: #03b509">

									<div class="col-sm-12 float-sm-right">
										<h3 type="button transparent"  style="color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>DATA PEMBELIAN OBAT</b></h3> 
									</div> 


								</div> 

								<br > 
								<div class="row" class="collapse" id="customer_collapse">   
									<div class="col-md-6 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Nama Pembeli</span> 
										<input type="text" class="form-control"  id="nama_pembeli" name="nama_pembeli"  style="border-color: #03b509; background: #ffffff">
									</div> 

									<div class="col-md-6 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">No.Telepon</span> 
										<input type="text" class="form-control"  id="no_telepon" name="no_telepon"  style="border-color: #03b509; background: #ffffff">
									</div> 

								</div>  
								<br>


								<div class="row" id="obat1" style="border: 1px solid #03b509;padding-top: 10px"> 
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
									<input type="text" class="textarea_atas form-control" id="qty1" name="qty[]" onkeypress="return isNumberKey(event)" onkeyup="hitungsubtotal(1)" placeholder="Qty">  

								</div>  



								<div class="input-group mb-3 col-md-12" style=" display: none;">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
									</div>
									<input type="text" class="form-control" id="takaran1" name="takaran[]" placeholder="Masukan Dosis Obat. Contoh = 1x3"  width="5px" style="text-align: center;border-color: #03b509; background: #ffffff">  
									<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>
									<select type="text" class="form-control" id="hari1" name="hari[]" placeholder="Puyer"  width="5px"> 
										<!-- <select class="form-control" id="racik1" name="racik[]" style="background:#ffc107; color: white; "> -->
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
								<br>

											<!-- <div class="form-group row" style="background: #1e8c3b">

												<div class="col-sm-12 float-sm-right">
													<h6 type="button transparent" onclick="hidecustomer()" style="letter-spacing:3px;color:white; background:transparent;margin-top: 10px" data-toggle="collapse" href="#customer_collapse" role="button" aria-expanded="false" aria-controls="customer_collapse"><b>RACIKAN OBAT</b></h6> 
												</div>  
											</div> -->
											<br>
											<!-- BAGIAN RACIKAN -->
											<!-- DISINI BAGIAN RACIKAN -->
											<!-- <div></div> --> 

											<div class="row mb-6"> 
												<div class="input-group mb-3 col-md-8">
													
												</div> 
												<div class="input-group col-md-4  mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Total Pembelian</span>

													</div>
													<input type="text" class="form-control" name="total_pembelian" id="total_pembelian" style="text-align: right;font-weight: bold;font-size: 18px;" disabled>
												</div> 

												<div class="input-group mb-3 col-md-8">
													
												</div> 
												<div class="input-group col-md-4  mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Discount</span>

													</div>
													<input type="text" class="form-control" name="discount_pembelian" id="discount_pembelian" value="0"  onkeyup="hitung_total_akhir_pembelian()" style="text-align: right;font-weight: bold;font-size: 18px;" >
												</div> 
												<div class="input-group mb-3 col-md-8">
													
												</div>
													<div class="input-group col-md-4  mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Total Akhir</span>

													</div>
													<input type="text" class="form-control" name="total_akhir_pembelian" id="total_akhir_pembelian" value="0" style="text-align: right;font-weight: bold;font-size: 18px;" >
												</div> 

												<hr>
												<br>
												<div class="col-md-12" style="margin-top: 70px;">

													<a href="<?php echo site_url('pembelian_obat') ?>" class="btn btn-danger mr-2 float-sm-right" style="float:right" ><i class="fa fa-times  mr-2"></i> BATAL</a>
													<button id="simpan_data_pembelian" type="button" class="btn btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i> SIMPAN </button> 
												</div> 
											</div>




										</form>

									</div> 

								</div>
							</div>
						</div>
					</div>
				</div> 

			</div>

			<script type="text/javascript">

				$(document).ready(function(){
					$('#nama_obat1').select2({
						placeholder:"Pilih Obat",
						allowClear: true,
					});
					hitung_total_akhir_pembelian();
				})


				$('#simpan_data_pembelian').on('click',function(){
					let total_akhir_pembelian = $('#total_akhir_pembelian').val().toString().replace(/\./g,'');

					var nama_pembeli = $('#nama_pembeli').val(); 
					var no_telepon = $('#no_telepon').val();  

					if (nama_pembeli == "") {
						alert("Nama Pembeli Belum Terisi");
						$('#nama_pembeli').focus();
						return false;
					}

					if (no_telepon == "") {
						alert("Telepon Belum Terisi");
						$('#no_telepon').focus();
						return false;
					}



				//cek validasi obat select
				var jumlah_obat = $('.listobat').length;
				for (var i = 1; i <= jumlah_obat; i++) { 
					var nama_obat = $('#nama_obat'+i).val();
					var qty = $('#qty'+i).val();
					var takaran = $('#takaran'+i).val();
					var hari = $('#hari'+i).val();
					var aturan_pakai = $('#aturan_pakai'+i).val();  

				}
				let link = '<?php echo base_url()?>pembelian_obat/simpanrekam_pembelian/';
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

					if (cek > 1) {
						alert('Duplikat Obat, Silahkan Pilih Obat Lain! atau tambahkan Qty di Obat yang Sudah Ada!');
						$('#nama_obat'+id).val(0);

						reset(id);
						hitung_total_akhir_pembelian();	
						return false;
					}
					let satuan_obat = $('#nama_obat'+id+' option:selected').data('satuan');
					let harga_jual = $('#nama_obat'+id+' option:selected').data('harga');
					let total_stok = $('#nama_obat'+id+' option:selected').data('stok');
					let keterangan_obat = $('#nama_obat'+id+' option:selected').data('keterangan');
					if (validasi_stok(id)==false) {
						return false;
					}

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
					let total_stok = parseInt($('#nama_obat'+id+' option:selected').data('stok'));
					let qty = parseInt($('#qty'+id).val());
					if (total_stok<qty) {
						alert('Stok Obat tidak Mencukupi!');
						$('#qty'+id).val('');
						$('#subtotal'+id).val(0);
						hitung_total_akhir_pembelian();
						return false; 
					} 
					if (total_stok<=0) {
						alert('Stok Obat Kosong, Silahkan Pilih Obat Lain!');
						$('#qty'+id).val('');
						$('#nama_obat'+id).val(0);
						$('#subtotal'+id).val(0);
						hitung_total_akhir_pembelian();
						return false;
					}
				}

				// function validasi_stok_racikan(id){
				// 	let total_stok = parseInt($('#racik_obat'+id+' option:selected').attr('id'));
				// 	let jumlah_obat = $('.listobat').length;

				// 	let stok_atas = parseInt($('#racik_obat'+id+' option:selected').attr('id'));

				// 	let qty = parseInt($('#takaran_racikan'+id).val());
				// 	if (total_stok<qty) {
				// 		alert('Stok Obat tidak Mencukupi!');
				// 		$('#qty'+id).val('');
				// 		$('#subtotal_racikan'+id).val(0);
				// 		// hitung_total_akhir_pembelian();
				// 		return false; 
				// 	} 
				// 	if (total_stok<=0) {
				// 		alert('Stok Obat Kosong, Silahkan Pilih Obat Lain!');
				// 		$('#takaran_racikan'+id).val('');
				// 		$('#racik_obat'+id).val('');
				// 		$('#subtotal_racikan'+id).val(0);
				// 		// hitung_total_akhir_pembelian();
				// 		return false;
				// 	}
				// }

				// function hitungsubtotal_racikan(qty,id){
				// 	if (validasi_stok_racikan(id)==false) {
				// 		return false;
				// 	};

				// 	let harga_jual = $('#harga_jual_racikan'+id).val().toString().replace(/\./g,'');
				// 	if (harga_jual==""){
				// 		harga_jual=0;
				// 	}
				// 	let total = parseInt(harga_jual)*parseInt(qty);
				// 	SeparatorRibuan(total.toString(),'subtotal_racikan'+id);
				// 	hitung_total_akhir_pembelian();
				// }

				function hitungsubtotal(id){
					if (validasi_stok(id)==false) {
						return false;
					};

					let harga_jual = $('#harga_jual'+id).val().toString().replace(/\./g,'')!=""?$('#harga_jual'+id).val().toString().replace(/\./g,''):0;

					let qty = $('#qty'+id).val().toString().replace(/\./g,'')!=""?$('#qty'+id).val().toString().replace(/\./g,''):0;
					let total = parseInt(harga_jual) * parseInt(qty);
					SeparatorRibuan(total.toString(),'subtotal'+id);
					hitung_total_akhir_pembelian();
				}
				$('#discount_pembelian').on('keyup',function(){
					let total = $('#total_pembelian').val().toString().replace(/\./g,'');
					let diskon = $(this).val().toString().replace(/\./g,'');
					if (parseFloat(diskon) > parseFloat(total)) {
						$('#discount_pembelian').val(total);
						hitung_total_akhir_pembelian();
					}
				});
				function hitung_total_akhir_pembelian(){ 
					let total=0;
					$('[name^="nama_obat"]').each(function(){
						let id = $(this).attr('id').replace('nama_obat','');
						let sub = $('#subtotal'+id).val().toString().replace(/\./g,'');
						if (sub!='' && sub > 0) {
							total+=parseInt(sub);
						}
					});
					SeparatorRibuan(total.toString(),'total_pembelian');
					let diskon = $('#discount_pembelian').val() > 0 ? $('#discount_pembelian').val():0;
					
					let total_akhir_pembelian = parseInt(total)-parseInt(diskon);
					if (total_akhir_pembelian==0) {
						$('#total_akhir_pembelian').val(0);
					}else{

					SeparatorRibuan(total_akhir_pembelian.toString(),'total_akhir_pembelian');
					}
				}


 



				// tampil_data();


				function hapusobat(kode_baru){
					let kode = parseInt(kode_baru)-1;


					var idbtn = $('#btn-groupobat'+kode);
					if (idbtn!=null) {
						$('#btn-groupobat'+kode).css('display','');
					} 
					$('#obat'+kode_baru).remove();
					hitung_total_akhir_pembelian();
				}

				function tambahobat(kode) {
					var kode_baru = parseInt(kode)+1;
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

						// if ($('#takaran'+kode).val()=='') {
						// 	alert('Silahkan Masukkan Dosis yang kosong!');
						// 	$('#takaran'+kode).focus();
						// 	return false;
						// }

						// if ($('#hari'+kode).val()=='') {
						// 	alert('Silahkan Masukkan hari yang kosong!');
						// 	$('#hari'+kode).focus();
						// 	return false;
						// }


						// if ($('#aturan_pakai'+kode).val()==null) {
						// 	alert('Silahkan Pilih Aturan Pakai yang kosong!');
						// 	$('#aturan_pakai'+kode).focus();
						// 	return false;
						// }



					// }
					var html="";

					html+='<div class="row" id="obat'+kode_baru+'"  style="border: 1px solid #03b509;padding-top: 10px">'+ 
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
					'<input type="text"  style=" border-color: #03b509; background: #ffffff" class="form-control" id="qty'+kode_baru+'" name="qty[]" onkeypress="return isNumberKey(event)" onkeyup="hitungsubtotal('+kode_baru+')" placeholder="Qty"> '+ 

					'</div>'+

					'<div class="input-group mb-3 col-md-12"  style=" display: none;">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>'+
					'</div>'+
					'<input type="text" class="form-control" id="takaran'+kode_baru+'" name="takaran[]" placeholder="Dosis"  width="5px" style=" border-color: #03b509; background: #ffffff; text-align:center;">  '+
					'<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">=</span>'+
					'<select type="text" class="form-control" id="hari'+kode_baru+'" name="hari[]" placeholder="Hari"  width="5px"  style=" border-color: #03b509; background: #ffffff"> '+
					// '<select class="form-control" id="racik'+kode_baru+'" name="racik[]" style="background:#ffc107; color: white; ">'+
					'<option value="0" selected disabled>Pilih Racik</option>'+
					'<option value="Puyer">Puyer</option>'+
					'<option value="Puyer_10_bungkus">Puyer_10_bungkus</option>'+
					'<option value="Puyer_12_bungkus">Puyer_12_bungkus</option>'+
					'<option value="Puyer_15_bungkus">Puyer_15_bungkus</option>'+ 
					'<option value="NonPuyer">NonPuyer</option>'+ 
					'</select> '+

					'<select class="form-control" id="aturan_pakai'+kode_baru+'" name="aturan_pakai[]"  style=" border-color: #03b509; background: #ffffff;">'+
					'<option value="0" selected disabled>Aturan</option>'+
					'<option value="Sebelum Makan">Sebelum Makan</option>'+ 
					'<option value="Sesudah Makan">Sesudah Makan</option>'+
					'<option value="Saat Makan">Saat Makan</option>'+
					'<option value="Di Oles Tipis-Tipis">Di Oles Tipis-Tipis</option>'+
					'<option value="Tetes">Tetes</option>'+
					'<option value="Satu Kali Pakai">Satu Kali Pakai</option>'+
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

					
					// '<div class="input-group mb-3 col-md-4" style="display:none">'+
					// '<div class="input-group-prepend">'+
					// '<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>'+
					// '</div>'+
					// '<input type="text" class="form-control" id="subtotal'+kode_baru+'" name="subtotal[]" placeholder="Total" disabled="disabled" readonly="readonly">  '+
					// '</div>  '+

					'<div class="input-group mb-3 col-md-12 ">'+
					'<div class="input-group-prepend">'+
					'<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>'+

					'</div>'+
					'<input type="text" class="form-control" id="subtotal'+kode_baru+'" name="subtotal[]" placeholder="Total" +disabled="disabled" readonly="readonly">'+
					'</div> '+

					'<div class="col-md-2" id="btn-groupobat'+kode_baru+'">'+
					'<button id="tambahobat'+kode_baru+'" type="button" class="btn btn-sm btn-success mr-1" onclick="tambahobat('+kode_baru+')">+</button>'+
					'<button id="hapusobat'+kode_baru+'" type="button" class="btn btn-sm btn-danger" onclick="hapusobat('+kode_baru+')">-</button>'+
					'</div>'+ 
					'</div> ';
					$('#obat'+kode).after(html);
					$('#btn-groupobat'+kode).css('display','block');
					jadikanselect2();

				}

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
					hitung_total_akhir_pembelian();
				})


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