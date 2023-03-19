 




<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">FORM HISTORI OBAT</h4>
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
						<a href="#">Histori Obat</a>
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
									<p class="card-title"> HISTORI OBAT</p> 
								</div>

							</div>
						</div> 
						<div class="card-body">  

							<div class="row" class="collapse" id="customer_collapse">  
								<div class="col-md-12 mb-3"> 
									<span class="input-group-text" style="background: #03b509;color :white">Nama Obat</span> 
									<select class="form-control form-select-lg mb-3 " width="100%" id="nama_obat" name="nama_obat" style="border-color: #03b509; background: #ffffff">
										<option selected>Pilih Nama Obat</option>
										<?php foreach ($history_obat as $row): ?>
											<option value="<?php echo $row->kode_obat ?>"><?php echo strtoupper($row->nama_obat) ?></option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="col-sm-12 mt-2 mb-2">
									<div class="judulhistory">
									</div>
									<table class="table table-hover" id="listobat" style="overflow-x: scroll;">
									<table id="example1" class="table table-striped table-bordered table-sm display" style="overflow:scroll" cellspacing="0" width="100%">
									<thead> 
<!-- 
										<tr>
											<th width="5%">No</th>
											<th width="5%">Tanggal</th>
											<th width="25%">Nama Obat</th>
											<th width="5%">Stok Awal</th>
											<th width="5%">Stok Masuk</th>
											<th width="5%">Stok Keluar</th>
											<th width="5%">>Stok Akhir</th> 
											<th width="15%">Keterangan</th> 
											<th style="text-align: center;" width="10%">Option</th>
										</tr> -->
									</thead>
									<tbody id="show_data">
									</tbody>
								</table>
									</table>
								</div> 

							</div> 

							<div class="col-sm-12-right">
								<!-- <button type="button" class="btn btn-danger mr-2"  ><i class="far fa-times-circle mr-2"  style="color: white;cursor: pointer;"></i><b>&nbsp;&nbsp;BATAL</b></button> -->
								<button type="button" class="btn btn-primary mr-2" id="btn_reset_history"><i class="fas fa-sync-alt"  style="color: white;cursor: pointer;"></i><b>&nbsp;&nbsp;RESET</b></button>
							</div>


							<!-- <a href="<?php echo site_url('satuan_obat') ?>" class="btn  btn-sm btn-danger mr-2" style="float:right" ><i class="fa fa-times  mr-2"></i> Cancel</a>
							<button id="simpan_data" type="button" isi="1" class="btn  btn-sm btn-success mr-2" style="float:right" > <i class="fa fa-save  mr-2"></i>Simpan</button>  -->
						</div> 

					</div>
				</div>
			</div>
		</div>
	</div> 

</div>

<script type="text/javascript"> 
	$(document).ready(function(){
		$('#nama_obat').select2({
			placeholder:"Pilih Nama Obat",
			allowClear: true,
		})

	})



	$('#nama_obat').on('change',function(){
				let kode_obat =$(this).val();
				if (kode_obat==null) {
					return false;
				}
				$.ajax({
					type: 'GET',
					url: '<?php echo base_url() ?>satuan_obat/history_obat',
					dataType: 'json',
					data:{'kode_obat':kode_obat},
					success: function(data) {
						let html='';
						let judul='<div class="divider divider-center"><div class="divider-text">History Stok Barang &nbsp<b>'+$('#nama_obat option:selected').text()+'</b></div></div>';
						if (data.length>0) {
							html+='<thead><tr>'+
							'<th>No</th>'+
							'<th>Tanggal</th>'+ 
							'<th>Stok Awal</th>'+
							'<th>Stok Masuk</th>'+	
							'<th>Stok Keluar</th>'+
							'<th>Stok Akhir</th>'+
							'<th>Keterangan</th>'+
							'</tr></thead><tbody>';
							for (var i =0; i <data.length; i++) {
								html+='<tr>'+
								'<td>'+(i+1)+'</td>'+
								'<td style="text-align:center">'+data[i].tanggal+'</td>'+ 
								'<td style="text-align:center">'+data[i].stok_awal+'</td>'+
								'<td style="text-align:center">'+data[i].stok_masuk+'</td>'+
								'<td style="text-align:center">'+data[i].stok_keluar+'</td>'+
								'<td style="text-align:center">'+data[i].stok_akhir+'</td>'+
								'<td>'+data[i].keterangan+'</td>'+
								'</tr>';	
							}
							html+='</tbody>';
						}else{
							html+='<thead><tr><td><h1 style="color:red;text-align:center">	NO DATA </h1></td></tr></thead>';
						}
						$('#listobat').html(html);
						$('.nama_obat').css('display','none');

						$('.judulhistory').html(judul);

					}
				});
				return false;
			});
			$('#btn_reset_history').on('click',function(){
				$('#nama_obat').select2;
				$('#nama_obat').val(0).trigger('change');
				$('.nama_obat').css('display','inline-block');
				$('#listobat').html('');
				$('.judulhistory').html('');
			});

</script> 