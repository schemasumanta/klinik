
<div class="main-panel">
	<div class="content">
		<div id="panel-header" <?php if ($this->session->userdata('pt')=="ST"){?>
			class="panel-header bg-primary-gradient"
			<?php  }else{ ?>class="panel-header bg-dark-gradient" <?php } ?>>
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Slider Management</h2>

					</div>

				</div>
			</div>
		</div>
		<div class="page-inner mt--5">
			<div class="row row-card-no-pd mt--2">
				<div class="col-sm-8 col-md-4" style="position: absolute;top:0;right: 0">
					<button data-toggle="modal" data-target="#modaltambahslider" class="btn btn-success w-80 fw-bold" style="position: absolute;top:-55px;right: -0px;"><i class="fas fa-plus "></i>&nbsp;TAMBAH SLIDER</button>
				</div>
				<?php if (count($slider) > 0) {?>
					<?php foreach ($slider as $slide): ?>
						<div class="col-sm-4 col-md-4">
							<div class="card card-stats card-round border">
								<div class="card-body ">
									<div class="row">
										<div class="col-12" style="overflow: hidden;">
											<?php if (strpos($slide->foto,'jpg')!==false || strpos($slide->foto,'png')!==false || strpos($slide->foto,'jpeg')!==false): ?>

											<img src="<?php echo base_url().$slide->foto ?>" style="width: 100%;height: auto;">
												
											<?php else: ?>

											<video src="<?php echo base_url().$slide->foto ?>" style="width: 100%;height: auto;" controls></video>

											<?php endif ?>

											<br>
											<br>

										</div>
										<div class="col-12">
											<center><H6><b><?php echo $slide->judul_slider; ?></b></H6></center>
											<div class="form-group" style="text-align: center;">
												<div class="selectgroup">
													<a href="#" id="hapus_<?php echo $slide->kode_slider ?>" data="<?php echo $slide->kode_slider ?>" onclick="hapus_slider(this.id)" class="btn">
														<i class="fas fa-trash text-danger"></i>
													</a>
													<a href="javascript:;" id="aktif_<?php echo $slide->kode_slider ?>" onclick="updatestatus(this.id)" class="btn">

														<i class="fas fa-check <?php if ($slide->status > 0) {?>text-success<?php }?>" id="icon_aktif_<?php echo $slide->kode_slider ?>"></i>
													</a>
													<a href="javascript:;"  class="btn" id="non_<?php echo $slide->kode_slider ?>" onclick="updatestatus(this.id)">
														<i class="fa fa-times <?php if ($slide->status == 0) {?>text-danger<?php }?>" id="icon_non_<?php echo $slide->kode_slider ?>"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				<?php }else{ ?>
					<div class="col-sm-12 col-md-12">
						<div class="alert alert-danger" role="alert">
							<span style="font-weight: bold;font-size: 30px;color: #f25961;letter-spacing: 15">TIDAK ADA SLIDER</span>
						</div>
					</div>
				</div>
			<?php } ?>
		</div> 
	</div> 
</div> 
<div class="modal fade" id="modaltambahslider" tabindex="-1" role="dialog" aria-labelledby="modaltambahsliderLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content" >

			<div class="modal-header" >
				<h5 id="modaltambahsliderLabel" style="color: white;font-weight:bold;font-family: Century Gothic"><i class="fas fa-sliders-h"></i>&nbsp;&nbsp;TAMBAH SLIDER</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: white">x</span></button>
			</div>

			<div class="modal-body">
				<form method="post">
					<div class="form-group row"class="collapse" id="customer_collapse">
						<div class="col-sm-9 mt-1 mb-4">
							<label for="judul_slider">Judul Slider</label>
							<input type="text" class="form-control" id="judul_slider"  name="judul_slider" required>
						</div>
						<div class="col-sm-3 mt-1 mb-4">
							<label for="status_slider">Status</label>
							<br>
							<button class="btn btn-sm mt-1 btn-success" type="button"  id="statusaktif" onclick="cekstatus(1)">Aktif</button>
							<button class="btn btn-sm mt-1 btn-danger" type="button" id="statusnonaktif" onclick="cekstatus(0)">Nonaktif</button>
							<input type="hidden" name="status" id="status">
						</div>
						<div class="col-sm-6 mt-1 mb-4">
							<label for="kategori_slider">Kategori</label>
							<select class="form-control" id="kategori_slider" name="kategori_slider">
								<option value="Slider">Slider</option>
								<option value="Video">Video</option>

							</select>

						</div>
						<div class="col-sm-6 mt-1 mb-4">

							<form method='post' action='' enctype="multipart/form-data">
								<label style="color:#343a40;" for="foto">Pilih Slider</label>

								<input type="file"  id="file"  class='form-control' name="file" onchange="cekisi()">  
							</form>

						</div>
						<div class="col-sm-12 mb-3" style="border-radius: 15px;overflow: hidden;">
							<img src="#" id="preview" class="w-100" style="height:auto; display: none;">
							<input type="hidden" name="nama_lampiran" id="nama_lampiran">

						</div>
						<div class="col-sm-12" style="">
							<button type="button" class="btn btn-success" id="btn_simpan_slider"><b>TAMBAH</b></button>
							<button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close"><b>BATAL</b></button>


						</div>
					</div>


				</form>

			</div>
		</div>
	</div> 


	<!-- /.card-body -->
</div>
<script type="text/javascript">
	$('#btn_simpan_slider').on('click',function(){
		let judul_slider = $('#judul_slider').val();
		let status = $('#status').val();
		let foto =$('#nama_lampiran').val();
		let kategori_slider =$('#kategori_slider').val();


		if (judul_slider=='') {
			alert('Silahkan Masukkan Judul!');
			$('#judul_slider').focus();
			return false;
		}
		if (status=='') {
			alert('Silahkan Pilih Status');
			return false;
		}
		if (foto=='') {
			alert('Silahkan Upload File Slider!');
			$('#file').focus();
			return false;
		}
		$.ajax({
			url : "<?php echo base_url('index.php/dashboard/simpan_slider')?>",
			type: 'POST',
			dataType: 'JSON',
			data: {'kategori_slider':kategori_slider,'judul_slider': judul_slider,'status': status,'foto': foto},
			success: function(data){
				if (data > 0) {
					alert('Slider Berhasil Ditambahkan');
					location.reload();
				}else{
					alert('Slider Gagal Ditambahkan,Silahkan Periksa File Slider Anda!');
					return false;
				}
			}
		});
		return false;

	});
	function cekisi(){
		var file = $('[name="file"]').val();
		if (file!="") {
			var fd = new FormData();
			var files = $('#file')[0].files[0];
			fd.append('file',files);

    // AJAX request
    $.ajax({
    	url   : '<?php echo base_url()?>index.php/dashboard/uploadphoto',
    	type: 'post',
    	data: fd,
    	contentType: false,
    	processData: false,
    	success: function(response){
    		console.log(response);
    		if(response != 0){
    			if (response.includes('jpg')!==false || response.includes('png')!==false || response.includes('jpeg')!==false) {

    				$('#preview').attr('src',"<?php echo base_url()?>"+response.replace(' ',''));
    				$('#preview').css('display','inline-block');

    			}

    			$('#nama_lampiran').val(response);
    		}else{
    			alert('file not uploaded');
    		}
    	}
    });
}
}
function cekstatus(status){
	$('#status').val(status);
	if (status==0) {
		$('#statusnonaktif').removeClass('btn-dark');
		$('#statusnonaktif').addClass('btn-danger');
		$('#statusnonaktif').html('Nonaktif');
		$('#statusaktif').removeClass('btn-success');
		$('#statusaktif').addClass('btn-dark');
		$('#statusaktif').html('');
	}else{
		$('#statusaktif').removeClass('btn-dark');
		$('#statusaktif').addClass('btn-success');
		$('#statusaktif').html('Aktif');
		$('#statusnonaktif').removeClass('btn-danger');
		$('#statusnonaktif').addClass('btn-dark');
		$('#statusnonaktif').html('');
	}
}
function hapus_slider(id)
{
	let kode_slider = id.replace('hapus_','');
	$.ajax({
		url : "<?php echo base_url('index.php/dashboard/hapus_slider')?>",
		type: 'POST',
		dataType: 'JSON',
		data: {'kode_slider': kode_slider},
		success: function(data){

			if (data==1){
				location.reload();
			}else{
				return false;
			}
		}
	});
}

function updatestatus(id)
{
	let kode_slider='';
	let status=0;
	if (id.includes('non_')) {
		kode_slider += id.replace('non_','');
	}else{
		kode_slider += id.replace('aktif_','');

		kode_slider+=id;
		status+=1;
	}
	$.ajax({
		url : "<?php echo base_url('index.php/dashboard/update_slider')?>",
		type: 'POST',
		dataType: 'JSON',
		data: {'kode_slider': kode_slider,'status': status},
		success: function(data){
			if (data==1) {
				let kode_baru = id.split('_');
				if (status == 0) {
					$('#icon_non_'+kode_baru[1]).addClass('text-danger');
					$('#icon_aktif_'+kode_baru[1]).removeClass('text-success');
				}else{
					$('#icon_non_'+kode_baru[1]).removeClass('text-danger');
					$('#icon_aktif_'+kode_baru[1]).addClass('text-success');
				}

			}
		}
	});

}
</script>

