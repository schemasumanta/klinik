<div class="main-panel">
	<style type="text/css">

	</style>
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
			</div>


			<div class="row">
				<div class="col-md-12">  
					<div class="card">
						<form class="form-control" spellcheck="false" id="formupdate" method="post" action="<?php echo base_url() ?>pembayaran/update_pembayaran">
							<div class="card-header"> 
								<a href="<?php echo site_url('pembayaran') ?>" onclick=kembali(); class="btn btn-danger btn-flat float-right btn-sm" style="color: white;vertical-align: top"> X </a>
								<i class="fas fa-briefcase-medical mr-3 text-primary"></i><span><b>FORM RINCIAN PEMBAYARAN PASIEN</b></span>
								<?php foreach ($rincikan_pembayaran as $row): ?>
									<h4 style="font-weight: bold;margin-top: 10px;"><?php echo ucwords($row->kode_rekam);?></h4>
								<?php endforeach ?>														</div>



							<div class="card-body">  
								<h4 type="button transparent"  style="color:white; background:#f99500;margin-top: 10px;height: 35px; padding-left: 10px; padding-top: 4px;"  ><b>Data Pasien</b></h4>  
								<div class="row" class="collapse" id="customer_collapse"> 


									<div class="input-group col-md-2 mb-3" style="display: none;">

										<input type="text" class="form-control " id="kode_pembayaran" name="kode_pembayaran" value="<?php echo $row->kode_pembayaran ?>"  onkeydown="return false">
									</div> 
									<div class="input-group col-md-2 mb-3" style="display: none;">

										<input type="text" class="form-control " id="kode_rekam" name="kode_rekam" value="<?php echo $row->kode_rekam ?>"  onkeydown="return false">
									</div> 


									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Kode Pasien</span> 
										<input type="text" onclick="this.blur()"  class="form-control " id="kode_pasien" name="kode_pasien" value="<?php echo $row->kode_pasien ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div>


									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Nomor Registrasi</span> 
										<input type="text" onclick="this.blur()"  class="form-control " id="nomor_registrasi" name="nomor_registrasi" value="<?php echo $row->no_registrasi ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div>


									<div class="col-md-3 mb-3">
										<span class="input-group-text" style="background: #03b509;color :white">Nama Pasien</span>
										<input type="text" onclick="this.blur()"  class="form-control " id="nama_pasien" name="nama_pasien" value="<?php echo $row->nama_pasien ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div>
									<div class="col-md-3 mb-3">
										<span class="input-group-text" style="background: #03b509;color :white">Jenis Kelamin</span>
										<input onclick="this.blur()" type="text" class="form-control " id="jk" name="jk" value=" <?php if ($row->jk=="L") { echo "Laki-Laki"; } else{ echo "Perempuan"; }  ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div>
									<div class="col-md-3 mb-3">
										<span class="input-group-text" style="background: #03b509;color :white">Telepon</span>
										<input onclick="this.blur()"  type="text" class="form-control " id="telepon" name="telepon" value="<?php echo $row->telepon ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div>

									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white">Tanggal lahir</span> 
										<input onclick="this.blur()"  type="text" class="form-control " id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $row->tempat_lahir ?>, <?php echo $row->tanggal_lahir ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div>  


									<div class="col-md-3 mb-3">
										<span class="input-group-text" style="background: #03b509;color :white">Tanggal Berobat</span>
										<input onclick="this.blur()"  type="text" class="form-control " id="tanggal_berobat" name="tanggal_berobat" value=" <?php echo $row->tanggal_berobat ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div> 
									<div class="col-md-3 mb-3">
										<span class="input-group-text" style="background: #03b509;color :white">Status Pernikahan</span>
										<input onclick="this.blur()"  type="text" class="form-control " id="status_pernikahan" name="status_pernikahan" value="<?php echo $row->status_pernikahan ?>"  onkeydown="return false" style="border-color: #03b509; background: #ffffff">
									</div> 

									<div class="col-md-12 mb-3">
										<span class="input-group-text" style="background: #03b509;color :white">Alamat </span>
										<textarea  onclick="this.blur()" type="text" class="form-control " id="alamat" name="alamat"  onkeydown="return false" style="border-color: #03b509; background: #ffffff" rows="2" style="text-decoration-line:none;outline: none;"><?php echo $row->alamat?></textarea> 
									</div>

								</div>




								

								<h4 type="button transparent"  style="color:white; background:#f99500;margin-top: 10px;height: 35px; padding-left: 10px; padding-top: 4px;"  ><b>Rincian Obat</b></h4> 

								<div class="row" class="collapse" id="customer_collapse">  
									<?php foreach ($detail_obat as $key) { ?>
										<div class="input-group col-md-9 mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" style="background: #03b509;color :white">Nama Obat</span>
											</div>
											<input onclick="this.blur()"  type="text" class="form-control " id="nama_obat" name="nama_obat" value="<?php echo $key->nama_obat?>" ket=""  onkeydown="return false" style="border-color: #03b509;">

											<div class="input-group-prepend">
												<span class="input-group-text" style="background: #03b509;color :white">Ket.</span>
											</div>
											<input onclick="this.blur()"  type="text" class="form-control " id="keterangan" name="keterangan" value="<?php echo $key->keterangan?>" ket=""  onkeydown="return false" style="border-color: #03b509;">

											<input onclick="this.blur()"  class="form-control" id="satuan_obat" name="satuan_obat" value="<?php echo $key->qty ?> <?php echo $key->satuan_obat."&nbsp; ( ".$key->aturan_pakai." )" ?>"  onkeydown="return false" style="border-color: #03b509;">
											<input onclick="this.blur()"  class="form-control" style="text-align: right;border-color: #03b509;" id="harga_jual" name="harga_jual" value="<?php echo number_format(($key->harga_jual), 0, ',', '.') ?>" onkeydown="return false"  >

										</div> 

										<div class="input-group col-md-3 mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" style="background: #03b509;color :white">Sub Total</span>
											</div> 
											<input onclick="this.blur()"  class="form-control"  style="text-align: right ;border-color: #03b509;" id="subtotal" name="subtotal"  value="<?php echo number_format(($key->subtotal), 0, ',', '.') ?>"  onkeydown="return false">
										</div> 

									<?php } ?>

									<div class="input-group col-md-12 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #06820a;color :white">Tindakan Dokter</span>
										</div>
										<input style="text-align: right;border-color: #03b509;" id="tindakan_dokter" name="tindakan_dokter" type="text" class="form-control" value="<?php echo $row->tindakan_dokter ?>">
									</div>  
 										

 										<!-- 
										<div class="input-group col-md-12 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #06820a;color :white">Penunjang</span>
										</div>
										<input onclick="this.blur()"  style="text-align: right;border-color: #03b509;" id="penunjang" name="penunjang" type="text" class="form-control" value="<?php echo $row->penunjang ?>">
									</div>  -->
								
									
									 


									<div class="input-group col-md-3 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #06820a;color :white">Biaya Admin</span>
										</div>
										<input style="text-align: right;border-color: #03b509;"  type="text" class="form-control " id="biaya_admin" name="biaya_admin" onfocusout="SeparatorRibuan(this.value,this.id)"  value="0" onkeyup="hitung()"  >
									</div> 

									<div class="input-group col-md-3 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #06820a;color :white">Disc (Rp)</span>
										</div>
										<input style="text-align: right;border-color: #03b509;" type="text" class="form-control " id="discount" name="discount" value="0" onkeyup="hitung()" >
									</div> 
									<?php if(strpos($row->kode_rekam,'POBAT')==0) { $upah_dokter=$row->upah_dokter; ?>  <?php } else{ $upah_dokter=0;} ?>
									<div class="input-group col-md-3 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #03b509;color :white">Jasa Dokter</span>
										</div>
										<input onclick="this.blur()"   style="text-align: right;font-weight: bold;border-color: #03b509;" type="text" class="form-control " id="upah_dokter" name="upah_dokter" onkeyup="hitung()"  value="<?php echo $upah_dokter   ?>"  onkeydown="return false"  >
									</div> 
									<div class="input-group col-md-3 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #03b509;color :white">Total Obat</span>
										</div>
										<input onclick="this.blur()"  style="text-align: right;font-weight: bold;border-color: #03b509;" type="text" class="form-control " id="total_akhir" name="total_akhir" onkeyup="hitung()" value="<?php echo number_format(floatval($row->total_akhir) - floatval($upah_dokter), 0, ',', '.') ?>" onkeydown="return false" >
									</div> 
									<?php if (isset($pemeriksaan_lab)): ?>
										
									<div class="input-group col-md-3 mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" style="background: #03b509;color :white">Pemeriksaan Lab</span>
										</div>
										<input onclick="this.blur()"  style="text-align: right;font-weight: bold;border-color: #03b509;" type="text" class="form-control " id="pemeriksaan_lab" name="pemeriksaan_lab" onkeyup="hitung()" value="<?php echo number_format($pemeriksaan_lab, 0, ',', '.') ?>" onkeydown="return false" >
									</div> 
									<?php endif ?>


								</div>

								<h4 type="button transparent"  style="color:white; background:#f99500;margin-top: 10px;height: 35px; padding-left: 10px; padding-top: 4px;"  ><b>Tambahan Pemeriksaan</b></h4> 
								<div class="listtambahan">
									<div class="row listpemeriksaan1 listtindakan">   
										<div class="input-group col-md-6 mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" style="background: #03b509;color :white">Tindakan 1</span>
											</div>
											<input type="text" class="form-control " id="tindakan1" name="tindakan[]"  placeholder="Masukan Tindakan">

										</div>   

										<div class="input-group col-md-3 mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" style="background: #03b509;color :white">Biaya 1</span>
											</div>
											<input  style="text-align: right;" class="form-control" id="pembayaran_tambahan1" name="pembayaran_tambahan[]"  onfocusout="SeparatorRibuan(this.value,this.id)"  value="0" onkeyup="hitung()" placeholder="Masukan Jumlah Biaya"> 

										</div> 


										<div class="input-group btngroup1 col-md-3 mb-3">
											<button id="tambahpemeriksaan1" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahpemeriksaan(1)">+</button>

										</div> 


									</div> 
								</div>
								
								<hr>
								<div class="row" class="collapse" id="customer_collapse">   
									
									
									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #212529;color :white;font-size: 15px;font-weight: bold;letter-spacing: 1px">Total Pembayaran &nbsp;&nbsp;(Rp.)</span> 
										<input  onclick="this.blur()"  style="text-align: center;font-size: 15px;font-weight: bold; border-color: #212529; background: #ffffff" type="text" class="form-control " id="total_pembayaran" name="total_pembayaran" value="0"   onkeydown="return false" >
									</div> 

									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #212529;color :white;font-size: 15px;">Tagihan Sebelumnya </span> 
										<input onclick="this.blur()"  style="text-align: center;font-size: 15px;font-weight: bold; border-color: #212529; background: #ffffff" type="text" class="form-control " id="tagihan_sebelumnya" name="tagihan_sebelumnya" value="<?php echo number_format($kredit, 0, ',', '.'); ?>" onkeydown="return false" >
									</div> 
									<div class="col-md-3 mb-3"> 
										<span class="input-group-text" style="background: #03b509;color :white;font-size: 15px;">Pembayaran</span> 
										<input style="text-align: center;font-size: 15px;font-weight: bold;border-color: #03b509; background: #ffffff" type="text" class="form-control"  onkeyup="hitungtagihan()" onfocusout="SeparatorRibuan(this.value,this.id)"  id="dibayarkan" name="dibayarkan" value="0" >

									</div> 
									<div class="col-md-3 mb-3"> 
										<span class="input-group-text labeltagihan" style="background: #212529;color :white;font-size: 15px;">Kembalian</span> 
										<input onclick="this.blur()"  style="text-align: right;font-size: 15px;font-weight: bold;border-color: #212529; background: #ffffff" type="text" class="form-control " id="kembalian" name="kembalian" value="0"   onkeydown="return false" >
									</div> 
									<div class="col-md-6">


									</div> 
									
									<div class="col-md-3">
										<input type="checkbox" class="form-control-check mr-2" id="hanyapengobatan" name="hanyapengobatan" style="text-align: right;">
										<label for="hanyapengobatan " class="mr-5">Hanya Pengobatan</label >
										<input type="checkbox" class="form-control-check mr-2" id="gratis" name="gratis" style="text-align: right;">
										<label for="gratis" >Gratis</label >
									</div> 
									<div class="col-md-3"></div> 
									<div class="col-md-3 mb-3 mt-3">
										
									</div>
									<div class="col-md-3 mb-3 mt-3"> 
										<span class="input-group-text labeltagihan" style="background: #212529;color :white;font-size: 15px;">Tagihan Terbayar</span> 
										<input onclick="this.blur()"  style="text-align: right;font-size: 15px;font-weight: bold;border-color: #212529; background: #ffffff" type="text" class="form-control " id="tagihan_dibayarkan" name="tagihan_dibayarkan" value="0"   onkeydown="return false" >
									</div> 
									<div class="col-md-3 mb-3 mt-3"> 
										<span class="input-group-text labeltagihan" style="background: #212529;color :white;font-size: 15px;">Penambahan Tagihan</span> 
										<input onclick="this.blur()"  style="text-align: right;font-size: 15px;font-weight: bold;border-color: #212529; background: #ffffff" type="text" class="form-control " id="penambahan_tagihan" name="penambahan_tagihan" value="0"   onkeydown="return false" >
									</div> 
									<div class="col-md-3 mb-3 mt-3"> 
										<span class="input-group-text labeltagihan" style="background: #212529;color :white;font-size: 15px;">Sisa Tagihan</span> 
										<input onclick="this.blur()"  style="text-align: right;font-size: 15px;font-weight: bold;border-color: #212529; background: #ffffff" type="text" class="form-control " id="sisa_tagihan" name="sisa_tagihan" value="0"   onkeydown="return false" >
									</div> 
									
								</div>

								<hr>
								<br>
								<div class="row" class="collapse" id="customer_collapse">  
									<div class="col-md-12 mb-3" style="text-align:  right;"> 
										<button type="button" onclick="kembali()" class="btn btn-sm btn-danger btn-flat mr-1" > <i class="fas fa-times mr-1"></i> Batal</button>  
										<button class="btn btn-sm  btn-primary btn-flat" type="button" id="btn_rincikan_pembayaran"> <i class="fas fa-receipt mr-1"></i> Rincikan Pembayaran</button> 
									</div>
								</div>
								<br><br><br><br><br><br><br><br>
							</div>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#hanyapengobatan').on('click',function(){
			hitungtagihan();
		});
		$('#gratis').on('click',function(){
			let gratis = $('#gratis').prop('checked');
			let pembayaran = $('#total_pembayaran').val().toString().replace(/\./g,'');
			if (gratis==true) {
				SeparatorRibuan(pembayaran,'discount'); 
			}else{
				$('#discount').val(0);
			}
			hitung();
		});
		function hitungtagihan(){
			let hanyapengobatan =$('#hanyapengobatan').prop('checked');
			let total_pembayaran = $('#total_pembayaran').val().toString().replace(/\./g,'');
			let tagihan_sebelumnya = $('#tagihan_sebelumnya').val().toString().replace(/\./g,'');
			let dibayarkan = $('#dibayarkan').val().toString().replace(/\./g,'');
			let sisa=0;
			if (hanyapengobatan==true){
				sisa = parseFloat(dibayarkan) - parseFloat(total_pembayaran);
				if (sisa==0) {
					$('#kembalian').val(0);	
					$('#penambahan_tagihan').val(0);	
					$('#tagihan_dibayarkan').val(0);	
					SeparatorRibuan(tagihan_sebelumnya.toString(),'sisa_tagihan'); 
				}
				if (sisa < 0) {
					$('#kembalian').val(0);	
					$('#tagihan_dibayarkan').val(0);					
					let jumlah = sisa.toString().substring(1);
					let tagihan_akhir = parseFloat(jumlah) + parseFloat(tagihan_sebelumnya);
					SeparatorRibuan(jumlah.toString(),'penambahan_tagihan'); 
					SeparatorRibuan(tagihan_akhir.toString(),'sisa_tagihan'); 	
				}
				if (sisa > 0) {
					$('#penambahan_tagihan').val(0);
					$('#tagihan_dibayarkan').val(0);
					SeparatorRibuan(sisa.toString(),'kembalian'); 
					SeparatorRibuan(tagihan_sebelumnya.toString(),'sisa_tagihan'); 
				}
			}
			else{
				sisa = parseFloat(dibayarkan) - (parseFloat(total_pembayaran)+parseFloat(tagihan_sebelumnya));
				if (sisa==0) {
					$('#sisa_tagihan').val(0);
					$('#kembalian').val(0);
					$('#penambahan_tagihan').val(0);
					SeparatorRibuan(tagihan_sebelumnya.toString(),'tagihan_dibayarkan'); 
				}
				if (sisa < 0) {
					$('#kembalian').val(0);
					let jumlah_tagihan = sisa.toString().substring(1);
					if (parseFloat(jumlah_tagihan) == parseFloat(tagihan_sebelumnya)){
						$('#penambahan_tagihan').val(0);
						$('#tagihan_dibayarkan').val(0);
						SeparatorRibuan(tagihan_sebelumnya.toString(),'sisa_tagihan'); 
					}
					if (parseFloat(jumlah_tagihan) < parseFloat(tagihan_sebelumnya)) {
						let bayar_tagihan =parseFloat(tagihan_sebelumnya) - parseFloat(jumlah_tagihan);
						let sisa_tagihan = parseFloat(tagihan_sebelumnya) - parseFloat(bayar_tagihan);
						$('#penambahan_tagihan').val(0);
						SeparatorRibuan(bayar_tagihan.toString(),'tagihan_dibayarkan'); 
						SeparatorRibuan(sisa_tagihan.toString(),'sisa_tagihan'); 
					}
					if (parseFloat(jumlah_tagihan) > parseFloat(tagihan_sebelumnya)) {
						let tambahan_tagihan = parseFloat(jumlah_tagihan) - parseFloat(tagihan_sebelumnya);
						let sisa_tagihan = parseFloat(tambahan_tagihan) + parseFloat(tagihan_sebelumnya);
						SeparatorRibuan(tambahan_tagihan.toString(),'penambahan_tagihan'); 
						SeparatorRibuan(sisa_tagihan.toString(),'sisa_tagihan'); 
						$('#tagihan_dibayarkan').val(0);
					}
				}
				if (sisa > 0)
				{
					$('#sisa_tagihan').val(0);
					$('#penambahan_tagihan').val(0);
					SeparatorRibuan(tagihan_sebelumnya.toString(),'tagihan_dibayarkan'); 
					SeparatorRibuan(sisa.toString(),'kembalian'); 
				}
			}

		}
		$('#btn_rincikan_pembayaran').on('click',function(){
			let discount = parseFloat($('#discount').val().toString().replace(/\./g,''));
			let dibayarkan =parseFloat($('#dibayarkan').val().toString().replace(/\./g,''));
			let total = parseFloat($('#total_pembayaran').val().toString().replace(/\./g,''));
			if (dibayarkan=="" && discount == 0 || dibayarkan=="" && discount != 0 && total!="") {
				alert("Silahkan Masukan Nominal Pembayaran!");
				$('#dibayarkan').focus();
				return false;
			}
			$('#formupdate').submit();
		});
		function kembali(){
			window.location.href="<?php echo site_url('pembayaran') ?>";
		}


		function tambahpemeriksaan(kode) {
			let kode_baru =parseFloat(kode)+1;
			let tindakan = $('#tindakan'+kode).val();
			if (tindakan=='') {
				alert('Silahkan isi baris yang Kosong sebelum menambah baris!');
				$('#tindakan'+kode).focus();
				return false;
			}
			let biaya =$('#pembayaran_tambahan'+kode).val();
			if (tindakan!='' && biaya==0) {
				alert('Silahkan Masukkan Harga!');
				$('#pembayaran_tambahan'+kode).focus();

				return false;
			}

			let html="";

			html+='<div class="row listpemeriksaan'+kode_baru+' listtindakan">'+   
			'<div class="input-group col-md-6 mb-3">'+
			'<div class="input-group-prepend">'+
			'<span class="input-group-text" style="background: #03b509;color :white">Tindakan '+kode_baru+'</span></div>'+
			'<input type="text" class="form-control " id="tindakan'+kode_baru+'" name="tindakan[]"  placeholder="Masukan Tindakan"></div>'+
			'<div class="input-group col-md-3 mb-3">'+
			'<div class="input-group-prepend">'+
			'<span class="input-group-text" style="background: #03b509;color :white">Biaya '+kode_baru+'</span></div>'+
			'<input  style="text-align: right;" class="form-control" id="pembayaran_tambahan'+kode_baru+'" name="pembayaran_tambahan[]"  onfocusout="SeparatorRibuan(this.value,this.id)"  value="0" onkeyup="hitung()" placeholder="Masukan Jumlah Biaya"></div> '+
			'<div class="input-group btngroup'+kode_baru+' col-md-3 mb-3">'+
			'<button id="tambahpemeriksaan'+kode_baru+'" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahpemeriksaan('+kode_baru+')">+</button>'+
			'<button id="tambahpemeriksaan'+kode_baru+'" type="button" class="btn btn-sm btn-danger mr-2" onclick="hapuspemeriksaan('+kode_baru+')">-</button>'+

			'</div></div>';

			$('.listtambahan').append(html);
			$('.btngroup'+kode).css('display','none');

		}

		function hapuspemeriksaan(kode){
			let kode_lama = parseFloat(kode)-1;
			$('.listpemeriksaan'+kode).remove();
			$('.btngroup'+kode_lama).css('display','');


		}
	</script>

	<script type="text/javascript">
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

		$(document).ready(function(){
			hitung();
		});

		function hitung(){ 
			let pemeriksaan_lab = $('#pemeriksaan_lab').val()!=undefined?$('#pemeriksaan_lab').val().toString().replace(/\./g,''):0;
			let biaya_tambahan =0;
			let jumlah_tambahan = $('.listtindakan').length;
			for (var i=1; i <= jumlah_tambahan; i++) {

				biaya_tambahan+=parseFloat($('#pembayaran_tambahan'+i).val().toString().replace(/\./g,''));
			}
			var total_akhir = $('#total_akhir').val().toString().replace(/\./g,'');
			var upah_dokter = $('#upah_dokter').val().toString().replace(/\./g,'');
			var biaya_admin = $('#biaya_admin').val().toString().replace(/\./g,'');
			var discount = $('#discount').val().toString().replace(/\./g,'');

			let total = parseFloat(total_akhir)+parseFloat(upah_dokter)+parseFloat(biaya_admin) + biaya_tambahan + parseFloat(pemeriksaan_lab) -parseFloat(discount);
			;
			$('#total_pembayaran').val(total);

		

			hitungtagihan();

		}





	</script>
