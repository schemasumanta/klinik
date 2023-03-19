<style type="text/css">
	
	.modal-backdrop{
		display: none;
	}

	input[type="file"]{
		height: 0 !important;
		opacity: 0 !important;
		padding: 0 !important;
		width: 50%;

	}
	.imagecheck-figure > img {
		width: 100%;
	}
	.labelkolom{
		background:#1572e8; 
		color: white; 
	}

</style>
<div class="main-panel">
	<div class="content flashdatahistory" data-title="<?php echo $this->session->flashdata('title'); ?>" data-text="<?php echo $this->session->flashdata('text'); ?>" data-icon="<?php echo $this->session->flashdata('icon'); ?>">
		<div class="page-inner">

			<div class="page-header">
				<h4 class="page-title">HISTORY APLIKASI</h4>
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
						<a href="#">Login</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">History Apps</a>
					</li>
				</ul>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"> 
							<div class="row">
								<div class="col-md-12">
									<a href="#" class="btn btn-primary btn-sm mr-1" onclick="location.reload()"><i class="fas fa-sync mr-2"></i> <b>Refresh Data</b> </a> 
								</div>
							</div>
						</div> 
						<div class="card-body">
							<div style="overflow-x:auto;" class="table-responsive" data="DESC" subject="kode_history">
								<table id="tabel_history" class="display table table-bordered table-hover">
									<thead>
										<tr>
											<th class="text-center" data-urut="kode_history" width="5%">No</th>   
											<th class="text-center" data-urut="tanggal">Tanggal</th> 
											<th class="text-center" data-urut="nama_admin">Nama Karyawan</th> 
											<th class="text-center" data-urut="ip_address">IP Address</th> 
											<th class="text-center" data-urut="aktivitas">Aktivitas</th>
										</tr>
									</thead>
									<tbody id="show_data">  
									</tbody>
								</table>
							</div>
						</div>





					</div>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	let filterdata = $('.table-responsive').attr('data');
	let sortdata = $('.table-responsive').attr('subject');
	let url="<?php echo base_url()?>login/ambil_data?sortdata="+sortdata+"&filterdata="+filterdata;

	$(document).ready(function(){

		const notif = $('.flashdatahistory').data('title');
		if (notif) {
			Swal.fire({
				title:notif,
				text:$('.flashdatahistory').data('text'),
				icon:$('.flashdatahistory').data('icon'),
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.close();
				}
			});
		}

		let tabel= $("#tabel_history").DataTable({
			"ordering": true,
			"processing": true,
			"serverSide": true,
			"autoWidth":true,
			"ajax": {
				"url":url,
				"type":"GET",
			},

			"columnDefs" :[
			{ targets: [0,1,3],
				class: 'text-center'
			},
			],
		});

		$('.sorting').on('click',function(){
			let sort = $(this).data('urut'); 
			let filter = $('.table-responsive').attr('data');
			if (filter=="ASC") {
				$('.table-responsive').attr('data','DESC');
				$('.table-responsive').attr('subject',sort);
			}else{
				$('.table-responsive').attr('data','ASC');
				$('.table-responsive').attr('subject',sort);
			}
			url="<?php echo base_url()?>login/ambil_data/"+sort+"/"+filter
			tabel.ajax.url("<?php echo base_url()?>login/ambil_data?sortdata="+sort+"&filterdata="+filter).load();
		});
	

	});

</script> 
</div>



