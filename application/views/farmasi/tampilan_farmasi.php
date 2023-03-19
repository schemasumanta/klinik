<div class="modal fade" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body listcetak">
			</div>
			<div class="modal-footer"> 
				<button type="button" class="btn btn-success btn-sm btn-flat" onclick="window.print()" ><i class="fas fa-print mr-2"></i>Print</button>
				<button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> TUTUP</button>

			</div>


		</div>
	</div>
</div>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">LIST PEMBERIAN OBAT</h4>
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
						<a href="<?php echo site_url('medis') ?>">Pasien</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Pembayaran</a>
					</li>
				</ul>
			</div>


			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="col-sm-6"> 
								</div>
								<div class="col-sm-12">  
									<h2>DAFTAR LIST PEMBERIAN OBAT</h2>

								</div>
								<script type="text/javascript">
									function refresh(){
										location.reload();
									}
								</script>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<div class="table-responsive" >

									<table  id="tabel_farmasi" class="table table-striped table-bordered table-sm " style="width: 100%; height: 30%; overflow-y: scroll;overflow-x: scroll; font-size: 13px; text-align: left;">
										<thead>
											<tr style="background: #03b509 ;text-align: center; color:white">
												<!-- <td>Kode</td> -->
												<th>No</th> 
												<th>Kode Pembayaran</th> 
												<th>Kode Rekam</th> 
												<th>Nama Pasien</th>            
												<th>Status Pembayaran</th>   
												<th>Tanggal Pembayaran</th>   
												<th>Status Pemberian Obat</th>  
												<th width="5%" >Opsi</th>
											</tr>

										</thead>
										<tbody id="show_data">
										</tbody>



									</table>
								</div>
							</div>


							<style type="text/css">
								@media print {
									html,body,.modal,.main-panel, #ModalCetak,.modal-dialog,.modal-content{
										padding:0;
										margin: 0;
									}
									.listcetak{
										display: inline-block !important;
										position: fixed !important;
										top:10 !important;
										left:30px !important;
									}
									.footer,.sidebar,.main-header,.modal-footer,.main-panel{
										display: none;
									}

									.hidden-print,
									.hidden-print * {
										display: none !important;
									}
								}
							</style>








						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript"> 
	$(document).ready(function(){

    dataTable = $('#tabel_farmasi').DataTable( {
      paginationType:'full_numbers',
      processing: true,
      serverSide: true,
      searching: true,

      filter: false,
      autoWidth:false,
      aLengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      ajax: {
       url: '<?php echo base_url('pembayaran/tabel_farmasi')?>',
       type: 'get',
       data: function (data) {
       }
     },
     language: {
       sProcessing: 'Sedang memproses...',
       sLengthMenu: 'Tampilkan _MENU_ entri',
       sZeroRecords: 'Tidak ditemukan data yang sesuai',
       sInfo: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ entri',
       sInfoEmpty: 'Menampilkan 0 sampai 0 dari 0 entri',
       sInfoFiltered: '(disaring dari _MAX_ entri keseluruhan)',
       sInfoPostFix: '',
       sSearch: 'Cari:',
       sUrl: '',
       oPaginate: {
        sFirst: '<<',
        sPrevious: '<',
        sNext: '>',
        sLast: '>>'
      }
    },
    order: [1, 'desc'],
     columns: [
     {'data':'no'},
     {'data':'kode_pembayaran'},
     {'data':'kode_rekam'},
     {'data':'nama_pasien'},
     {'data':'status_pembayaran'},
     {'data':'tanggal_pembayaran'}, 
     {'data':'status_pemberian_obat'},               
     {'data':'opsi',orderable:false},

     ],   
     columnDefs: [
     {
      targets: [0,3,4,5,6,-1],
      className: 'dt-center'
    },
    ]

});


    function table_data(){
     dataTable.ajax.reload(null,true);
   }


   $(".refresh").click(function(){
     location.reload();
   });




});


	

</script>













