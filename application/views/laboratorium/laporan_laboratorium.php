<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-success-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">REPORT DATA LABORATORIUM</h2>
						</h5> 
					</div>

				</div>
			</div>
		</div>
		<div class="container">
			<div class="row pt-4">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<!-- Copy the content below until next comment -->
					<div class="card card-custom bg-white border-white border-0">
						<div class="card-footer" style="background: inherit; border-color: inherit; background: #31ce36">

						</div>
						<div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
						<div class="card-custom-avatar">
							<center><img class="rounded-circle" style="width: 180px;height: 170px;margin-top: 10px;" src="<?php echo base_url().$this->session->logo_pt ?>"  /></center>
						</div>
						<div class="card-body" style="overflow-y: auto">
							<h4  style="font-weight: bold; color:green;text-align: center;" class="card-title">LAPORAN LABORATORIUM</h4> 
						</div>
						<div class="card-footer" style="background: inherit; border-color: green;">
							<center><a href="#" class="btn btn-outline-success"  onclick="tariklaporan_lab('DRAFT')"><i class="far fa-file-alt mr-1"></i> Lihat Laporan Laboratorium</a></center>
							
						</div>
						<div class="card-footer" style="background: #31ce36"></div>

					</div>
					<!-- Copy until here -->

				</div>  

				<div class="col-md-4"></div>

			</div> 
		</div>  
	</div>

 

	 

	<!-- MODAL BAYI --> 
	<div class="modal fade" id="ModalLaporan_laboratorium" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: green">
					<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN LABORATORIUM</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button> 
				</div>
				<form class="form-horizontal">
					<div class="modal-body"> 
						<div class="row"> 
							<div class="col-md-12 cheklist">

								<div class="checkbox">
									<label style="margin:5px" ><input type="checkbox" id="bytanggal_lab" value="" style="margin:5px">By Tanggal</label>
									<label style="margin:5px" ><input type="checkbox" id="by_hari_ini_lab" value="" style="margin:5px">Hari Ini</label>               

								</div>

							</div> 
							<div class="col-md-12 tgl_lab mt-5" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Awal</span>
									<input type="date" class="form-control"  id="tanggal_awal_lab">

								</div> 
							</div> 



							<div class="col-md-12 tgl_lab" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Akhir</span>
									<input type="date" class="form-control"  id="tanggal_akhir_lab" >

								</div> 
							</div> 



						</div> 

					</div>
					<div class="modal-footer">
						<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
						<button  type="button" class="btn btn-success btn-flat" id="btn_laporanlab"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
					</div>


				</form>
			</div>
		</div>
	</div> 
	<!-- MODAL BAYI --> 
 

	<script type="text/javascript"> 
		// KOHORT BAYI
		
		function tariklaporan_lab(kohort_bayi)
		{
			let data = kohort_bayi.toLowerCase();

			$('#ModalLaporan_laboratorium').modal('show');
			$('#judul_laporan').html('<i class="fas fa-receipt mr-2"></i>'+kohort_bayi+" REPORT");
			$('#btn_tarik_kohort_bayi').attr('data',data);
		}

		

		$('#btn_laporanlab').on('click',function(){

		let bytanggal_lab=$('#bytanggal_lab').prop('checked');
		let by_hari_ini_lab=$('#by_hari_ini_lab').prop('checked');

		let tanggal_awal_lab='';
		let tanggal_akhir_lab='';

		if (by_hari_ini_lab==true) {
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();
			if (month < 10) month = "0" + month;      
			if (day < 10) day = "0" + day;
			tanggal_awal_lab=year + "-" + month + "-" + day;
			tanggal_akhir_lab=year + "-" + month + "-" + day;


		}else{
			tanggal_awal_lab=$('#tanggal_awal_lab').val();
			tanggal_akhir_lab=$('#tanggal_akhir_lab').val();
		} 

		if (tanggal_awal_lab=='') {
			alert('Tanggal Awal Tidak Boleh Kosong');
			return false
		}

		if (tanggal_akhir_lab=='') {
			alert('Tanggal Akhir Tidak Boleh Kosong');
			return false
		}

		if (tanggal_akhir_lab<tanggal_awal_lab) {
			alert('Tanggal Akhir Harus Lebih Besar dari Tanggal Awal');
			return false
		}

		window.location.href='<?php echo base_url()?>laboratorium/tarik_report_lab/'+tanggal_awal_lab+'/'+tanggal_akhir_lab; 

		});

		$('#bytanggal_lab').click(function(){
		if (this.checked==true) {
			$('.tgl_lab').css('display','block');
			$('#by_hari_ini_lab').prop('checked',false); 
		}else{
			$('.tgl_lab').css('display','none'); 
		}

		})

		$('#by_hari_ini_lab').click(function(){
		if (this.checked==true) {
			$('.tgl_lab').css('display','none');
			$('#bytanggal_lab').prop('checked',false); 
		}
		})

		// KOHORT BAYI
 
	</script>

