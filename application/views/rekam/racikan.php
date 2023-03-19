<div class="row" id="obat1" style="border: 1px solid #e4e4e4;padding-top: 10px"> 
												<div class="input-group mb-3 col-md-4 listobatracikan">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white;"><i class="fas fa-search"></i></span>
													</div> 
													<select type="text" data="" class="form-control " id="racik_obat1" name="racik_obat[]" style="background:#e8f0fe;" onchange="cekobatracikan(1)">
														<option value="0" disabled="disabled" selected="selected"></option>
														<?php foreach ($obat as $data) { ?>
															<option id="<?php echo $data->total_stok; ?>" isi="<?php echo $data->keterangan ?>" subject="<?php echo $data->harga_jual ?>" data="<?php echo $data->satuan_obat ?>" value="<?php echo $data->kode_obat ?>"><?php echo $data->nama_obat ?></option>	
														<?php } ?> 
													</select>  
													<div class="input-group-prepend">
														<span class="input-group-text" id="satuan_obat_racikan1" name="satuan_obat_racikan[]" style="background:#03b509; color: white;display: none "></span>
														<input type="hidden" class="form-control" id="satuan_racikan1" name="satuan_racikan[]" >
													</div>

												</div>

												<div class="input-group mb-3 col-md-2">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Takaran</span>
													</div>
													<input type="text" class="form-control" id="takaran_racikan1" name="takaran_racikan[]"  placeholder="Takaran Obat">  
													<!-- onkeyup="hitungsubtotal(this.value,1)" -->
												</div>  

												<div class="input-group mb-3 col-md-2">
													<div class="input-group-prepend"> 
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Stok</span> 
													</div>
													<input type="text" class="form-control" id="total_stok_racikan1" name="total_stok_racikan[]" value="0" readonly>	

												</div>  





												<div class="input-group mb-3 col-md-2">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Harga</span>
													</div> 
													<input type="text" class="form-control"  id="harga_jual_racikan1" name="harga_jual_racikan[]" readonly >
												</div> 

												<div class="input-group mb-3 col-md-2" style="overflow: hidden;">
													
													<button type="button" onclick="tambahkomposisi(1)" class="btn btn-md btn-dark" id="btn_komposisi1" name="btn_komposisi[]" style="display: inline-block;">+&nbsp;&nbsp;Tambah Komposisi</button>
												</div> 


												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Komposisi</span>
													</div>
													<textarea type="text" class="form-control" id="komposisi1" name="komposisi[]" placeholder="Komposisi"  width="5px" rows="5"></textarea> 

												</div>	
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Nama Racikan</span>
													</div>
													<textarea type="text" class="form-control" id="label_obat1" name="label_obat[]" placeholder="Label Obat & Keterangan"  width="5px" rows="5"></textarea> 

												</div>

												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Aturan Pakai</span>
													</div>
													<input type="text" class="form-control" id="takaran1" name="takaran[]" placeholder="Dosis"  width="5px" style="text-align: center;">  
													<span class="input-group-text" id="basic-addon3" style="background:#445245; color: white; ">X</span>
													<input type="text" class="form-control" id="hari1" name="hari[]" placeholder="Hari"  width="5px" style="text-align: center;"> 
													<select class="form-control" id="aturan_pakai1" name="aturan_pakai[]" style="background:#376eaf; color: white; ">
														<option value="0" selected disabled>Aturan</option>

														<option value="Sebelum Makan">Sebelum Makan</option>
														<option value="Sesudah Makan">Sesudah Makan</option>
													</select> 

												</div>

												<div class="input-group mb-3 col-md-4">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon3" style="background:#03b509; color: white; ">Sub Total</span>
													</div>
													<input type="text" class="form-control" id="subtotal_racikan1" name="subtotal_racikan[]" placeholder="Total" disabled="disabled" readonly="readonly">  
												</div>  

												<div class="input-group mb-3 col-md-2" id="btn-groupobatracikan1">
													<button id="tambahobatracikan1" type="button" class="btn btn-sm btn-success mr-2" onclick="tambahobatracikan(1)">+</button>
												</div> 
											</div> 