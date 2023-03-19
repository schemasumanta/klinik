<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-success-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">PUBLIC REPORT DATA KEBIDANAN</h2>
						</h5> 
					</div>

				</div>
			</div>
		</div>
		<div class="container">
			<div class="row pt-4">
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
							<h4  style="font-weight: bold; color:green;text-align: center;" class="card-title">LAPORAN KOHORT BAYI</h4> 
						</div>
						<div class="card-footer" style="background: inherit; border-color: green;">
							<center><a href="#" class="btn btn-outline-success"  onclick="tariklaporanohort_bayi('DRAFT')"><i class="far fa-file-alt mr-1"></i> Lihat Kohort Bayi</a></center>
							
						</div>
						<div class="card-footer" style="background: #31ce36"></div>

					</div>
					<!-- Copy until here -->

				</div>

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
							<h4  style="font-weight: bold; color:green; text-align: center;" class="card-title">LAPORAN KOHORT IBU</h4> 
						</div>
						<div class="card-footer" style="background: inherit; border-color: inherit;">
							<center><a href="#" class="btn btn-outline-success"  onclick="tariklaporanohort_ibu('DRAFT')"><i class="far fa-file-alt mr-1"></i> Lihat Kohort Ibu</a></center>
							
						</div>
						<div class="card-footer" style="background: #31ce36"></div>

					</div>
					<!-- Copy until here -->

				</div>

				<div class="col-md-4">

					<!-- Copy the content below until next comment -->
					<div class="card card-custom bg-white border-white border-0">
						<div class="card-footer" style="background: inherit; border-color: inherit; background: #31ce36"></div>
						<div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
						<div class="card-custom-avatar">
							<center><img class="rounded-circle" style="width: 180px;height: 170px;margin-top: 10px;" src="<?php echo base_url().$this->session->logo_pt ?>"  /></center>
						</div>
						<div class="card-body" style="overflow-y: auto">
							<h4 style="font-weight: bold; color:green;text-align: center;" class="card-title">LAPORAN KOHORT KB</h4> 
						</div>
						<div class="card-footer" style="background: inherit; border-color: inherit;">
							<center><a href="#" class="btn btn-outline-success"  onclick="tariklaporanohort_kb('DRAFT')"><i class="far fa-file-alt mr-1"></i> Lihat Kohort Kb</a></center>
						</div>
						<div class="card-footer" style="background: #31ce36"></div>

					</div> 
				</div>

			</div> 
		</div>  
	</div>

 

	<!-- MODAL KB -->

	<div class="modal fade" id="ModalLaporan_kohort_kb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: green">
					<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN KOHORT KB</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="row"> 
							<div class="col-md-12 cheklist">

								<div class="checkbox">
									<label style="margin:5px" ><input type="checkbox" id="bytanggal_kb" value="" style="margin:5px">By Tanggal</label>
									<label style="margin:5px" ><input type="checkbox" id="by_hari_ini_kb" value="" style="margin:5px">Hari Ini</label>               

								</div>

							</div> 
							<div class="col-md-12 tgl_kb mt-5" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Awal</span>
									<input type="date" class="form-control"  id="tanggal_awal_kb">

								</div> 
							</div> 



							<div class="col-md-12 tgl_kb" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Akhir</span>
									<input type="date" class="form-control"  id="tanggal_akhir_kb" >

								</div> 
							</div> 



						</div> 

					</div>
					<div class="modal-footer">
						<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
						<button  type="button" class="btn btn-success btn-flat" id="btn_laporankohortkb"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
					</div>


				</form>
			</div>
		</div>
	</div> 
	<!-- MODEL KB -->

	<!-- MODAL BAYI --> 
	<div class="modal fade" id="ModalLaporan_kohort_bayi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: green">
					<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN KOHORT BAYI</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="row"> 
							<div class="col-md-12 cheklist">

								<div class="checkbox">
									<label style="margin:5px" ><input type="checkbox" id="bytanggal_bayi" value="" style="margin:5px">By Tanggal</label>
									<label style="margin:5px" ><input type="checkbox" id="by_hari_ini_bayi" value="" style="margin:5px">Hari Ini</label>               

								</div>

							</div> 
							<div class="col-md-12 tgl_bayi mt-5" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Awal</span>
									<input type="date" class="form-control"  id="tanggal_awal_bayi">

								</div> 
							</div> 



							<div class="col-md-12 tgl_bayi" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Akhir</span>
									<input type="date" class="form-control"  id="tanggal_akhir_bayi" >

								</div> 
							</div> 



						</div> 

					</div>
					<div class="modal-footer">
						<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
						<button  type="button" class="btn btn-success btn-flat" id="btn_laporankohortbayi"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
					</div>


				</form>
			</div>
		</div>
	</div> 
	<!-- MODAL BAYI -->


	<!-- MODAL IBU -->

	<div class="modal fade" id="ModalLaporan_kohort_ibu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: green">
					<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN KOHORT IBU</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="row"> 
							<div class="col-md-12 cheklist">

								<div class="checkbox">
									<label style="margin:5px" ><input type="checkbox" id="bytanggal_ibu" value="" style="margin:5px">By Tanggal</label>
									<label style="margin:5px" ><input type="checkbox" id="by_hari_ini_ibu" value="" style="margin:5px">Hari Ini</label>               

								</div>

							</div> 
							<div class="col-md-12 tgl_ibu mt-5" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Awal</span>
									<input type="date" class="form-control"  id="tanggal_awal_ibu">

								</div> 
							</div> 



							<div class="col-md-12 tgl_ibu" style="display:none">

								<div class="input-group mb-3"> 
									<span class="input-group-text" id="basic-addon3" style="background:green; color: white; ">Tanggal Akhir</span>
									<input type="date" class="form-control"  id="tanggal_akhir_ibu" >

								</div> 
							</div> 



						</div> 

					</div>
					<div class="modal-footer">
						<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
						<button  type="button" class="btn btn-success btn-flat" id="btn_laporankohortibu"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
					</div>


				</form>
			</div>
		</div>
	</div> 
	<!-- MODEL IBU -->
 

	<script type="text/javascript">

		 // KOHORT KB 
		function tariklaporanohort_kb(kohort_kb)
		{
			let data = kohort_kb.toLowerCase();

			$('#ModalLaporan_kohort_kb').modal('show');
			$('#judul_laporan').html('<i class="fas fa-receipt mr-2"></i>'+kohort_kb+" REPORT");
			$('#btn_tarik_kohort_kb').attr('data',data);
		}

		$('#btn_laporankohortkb').on('click',function(){

			let bytanggal_kb=$('#bytanggal_kb').prop('checked');
			let by_hari_ini_kb=$('#by_hari_ini_kb').prop('checked');

			let tanggal_awal_kb='';
			let tanggal_akhir_kb='';

			if (by_hari_ini_kb==true) {
				var date = new Date();
				var day = date.getDate();
				var month = date.getMonth() + 1;
				var year = date.getFullYear();
				if (month < 10) month = "0" + month;      
				if (day < 10) day = "0" + day;
				tanggal_awal_kb=year + "-" + month + "-" + day;
				tanggal_akhir_kb=year + "-" + month + "-" + day;


			}else{
				tanggal_awal_kb=$('#tanggal_awal_kb').val();
				tanggal_akhir_kb=$('#tanggal_akhir_kb').val();
			}




			if (tanggal_awal_kb=='') {
				alert('Tanggal Awal Tidak Boleh Kosong');
				return false
			}

			if (tanggal_akhir_kb=='') {
				alert('Tanggal Akhir Tidak Boleh Kosong');
				return false
			}

			if (tanggal_akhir_kb<tanggal_awal_kb) {
				alert('Tanggal Akhir Harus Lebih Besar dari Tanggal Awal');
				return false
			}

			window.location.href='<?php echo base_url()?>laporan_kohort/tarik_kohort_bytanggal_kb/'+tanggal_awal_kb+'/'+tanggal_akhir_kb; 

		});
		$('#bytanggal_kb').click(function(){
			if (this.checked==true) {
				$('.tgl_kb').css('display','block');
				$('#by_hari_ini_kb').prop('checked',false); 
			}else{
				$('.tgl_kb').css('display','none'); 
			}

		})

		$('#by_hari_ini_kb').click(function(){
			if (this.checked==true) {
				$('.tgl_kb').css('display','none');
				$('#bytanggal_kb').prop('checked',false); 
			}
		})

		// KOHORT KB


		// KOHORT BAYI
		
		function tariklaporanohort_bayi(kohort_bayi)
		{
			let data = kohort_bayi.toLowerCase();

			$('#ModalLaporan_kohort_bayi').modal('show');
			$('#judul_laporan').html('<i class="fas fa-receipt mr-2"></i>'+kohort_bayi+" REPORT");
			$('#btn_tarik_kohort_bayi').attr('data',data);
		}

		

		$('#btn_laporankohortbayi').on('click',function(){

		let bytanggal_bayi=$('#bytanggal_bayi').prop('checked');
		let by_hari_ini_bayi=$('#by_hari_ini_bayi').prop('checked');

		let tanggal_awal_bayi='';
		let tanggal_akhir_bayi='';

		if (by_hari_ini_bayi==true) {
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();
			if (month < 10) month = "0" + month;      
			if (day < 10) day = "0" + day;
			tanggal_awal_bayi=year + "-" + month + "-" + day;
			tanggal_akhir_bayi=year + "-" + month + "-" + day;


		}else{
			tanggal_awal_bayi=$('#tanggal_awal_bayi').val();
			tanggal_akhir_bayi=$('#tanggal_akhir_bayi').val();
		} 

		if (tanggal_awal_bayi=='') {
			alert('Tanggal Awal Tidak Boleh Kosong');
			return false
		}

		if (tanggal_akhir_bayi=='') {
			alert('Tanggal Akhir Tidak Boleh Kosong');
			return false
		}

		if (tanggal_akhir_bayi<tanggal_awal_bayi) {
			alert('Tanggal Akhir Harus Lebih Besar dari Tanggal Awal');
			return false
		}

		window.location.href='<?php echo base_url()?>laporan_kohort/tarik_kohort_bytanggal_bayi/'+tanggal_awal_bayi+'/'+tanggal_akhir_bayi; 

		});

		$('#bytanggal_bayi').click(function(){
		if (this.checked==true) {
			$('.tgl_bayi').css('display','block');
			$('#by_hari_ini_bayi').prop('checked',false); 
		}else{
			$('.tgl_bayi').css('display','none'); 
		}

		})

		$('#by_hari_ini_bayi').click(function(){
		if (this.checked==true) {
			$('.tgl_bayi').css('display','none');
			$('#bytanggal_bayi').prop('checked',false); 
		}
		})

		// KOHORT BAYI


		// KOHORT IBU
		function tariklaporanohort_ibu(kohort_ibu)
		{
			let data = kohort_ibu.toLowerCase();

			$('#ModalLaporan_kohort_ibu').modal('show');
			$('#judul_laporan').html('<i class="fas fa-receipt mr-2"></i>'+kohort_ibu+" REPORT");
			$('#btn_tarik_kohort_ibu').attr('data',data);
		}

		$('#btn_laporankohortibu').on('click',function(){

			let bytanggal_ibu=$('#bytanggal_ibu').prop('checked');
			let by_hari_ini_ibu=$('#by_hari_ini_ibu').prop('checked');

			let tanggal_awal_ibu='';
			let tanggal_akhir_ibu='';

			if (by_hari_ini_ibu==true) {
				var date = new Date();
				var day = date.getDate();
				var month = date.getMonth() + 1;
				var year = date.getFullYear();
				if (month < 10) month = "0" + month;      
				if (day < 10) day = "0" + day;
				tanggal_awal_ibu=year + "-" + month + "-" + day;
				tanggal_akhir_ibu=year + "-" + month + "-" + day;


			}else{
				tanggal_awal_ibu=$('#tanggal_awal_ibu').val();
				tanggal_akhir_ibu=$('#tanggal_akhir_ibu').val();
			} 

			if (tanggal_awal_ibu=='') {
				alert('Tanggal Awal Tidak Boleh Kosong');
				return false
			}

			if (tanggal_akhir_ibu=='') {
				alert('Tanggal Akhir Tidak Boleh Kosong');
				return false
			}

			if (tanggal_akhir_ibu<tanggal_awal_ibu) {
				alert('Tanggal Akhir Harus Lebih Besar dari Tanggal Awal');
				return false
			}

			window.location.href='<?php echo base_url()?>laporan_kohort/tarik_kohort_bytanggal_ibu/'+tanggal_awal_ibu+'/'+tanggal_akhir_ibu; 

		});

		$('#bytanggal_ibu').click(function(){
			if (this.checked==true) {
				$('.tgl_ibu').css('display','block');
				$('#by_hari_ini_ibu').prop('checked',false); 
			}else{
				$('.tgl_ibu').css('display','none'); 
			}

		})

		$('#by_hari_ini_ibu').click(function(){
			if (this.checked==true) {
				$('.tgl_ibu').css('display','none');
				$('#bytanggal_ibu').prop('checked',false); 
			}
		})

		// KOHORT IBU
	</script>

