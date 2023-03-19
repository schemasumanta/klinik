	
<style type="text/css">
	.main-chat{
		position: fixed;
		bottom: 0;
		right: 0;
		margin-bottom: 30px;
		margin-right: 30px;

		cursor: pointer;
	}

	.footer{
		position: fixed;
		bottom: 0px;
	}
	.copyright{
		position: absolute;
		bottom: -10px;
		right:  30px;


	}
</style>



</div>



</div>
<!-- End Custom template -->
</div>


<!-- <script src="<?php echo base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script> -->

<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- <script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script> -->
<script src="<?php echo base_url('assets/js/plugin/datatables/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugin/datatables-bs4/js/dataTables.bootstrap4.js');?>"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- <script src="<?php echo base_url() ?>sweetalert/sweetalert.min.js"></script>
	<script src="<?php echo base_url() ?>sweetalert/sweetalert-dev.js"></script>  -->


	<script src="<?php echo base_url() ?>assets/js/atlantis.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.masknumber.js"></script>

	
	<!-- <script src="<?php echo base_url() ?>assets/plugins/highcharts/highcharts.js"></script>  -->


	

	<script >
		// $('.btn_absensi').on('click',function(){
		// 	$.ajax({
		// 		type  : 'GET',
		// 		url   : '<?php echo base_url()?>absensi/get_absensi',
		// 		dataType : 'json',
		// 		success : function(data){
		// 			$('#ModalAbsensi').modal('show');
		// 		}
		// 	});
		// });
		function isNumberKey(evt)
		{
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode != 46 && charCode > 31 
				&& (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
		
		$(document).ready(function() {

			$('#nama_karyawan').select2({
				placeholder :'Pilih Pegawai',
				allowClear : true,
			});

			
			$('#basic-datatables').DataTable({
			});
			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>




	<script>
		function set(){
			$(function () {
				$('#example1').DataTable({
					"destroy":true,
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": true,
				});
			});

		}

		function set2(){
			$(function () {
				$('#example2').DataTable({
					"destroy":true,
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": true,
				});
			});


		}

		function set3(){
			$(function () {
				$('#example3').DataTable({
					"destroy":true,
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": true,
				});
			});


		}

		$(document).ready(function(){
			cek_koneksi();
		});

		function cek_koneksi() {
			let mode = '<?php echo $this->session->mode ?>';
			if(navigator.onLine) {
				if (mode!="online") {

					Swal.fire({
						title: 'Perhatian',
						text: 'Anda Berada Dalam Mode Online',
						icon:'info',
						showDenyButton: true,
						confirmButtonText: 'Konfirmasi',
						denyButtonText: `Batal`,
					}).then((result) => {
						if (result.isConfirmed) {
							$.ajax({
								type  : 'GET',
								url   : '<?php echo base_url('login/set_mode')?>',
								dataType : 'json',
								data:{'mode':'online'},
								success : function(data){
								}
							});
						} 

					})

				}


			} else {
				if (mode!="offline") {
					Swal.fire({
						title: 'Oops..!',
						title: 'Koneksi Internet Terputus',

						icon:'error',
						showDenyButton: true,
						confirmButtonText: 'Pindah Ke Mode Offline',
						denyButtonText: `Tutup`,
					}).then((result) => {
						/* Read more about isConfirmed, isDenied below */
						if (result.isConfirmed) {
							$.ajax({
								type  : 'GET',
								url   : '<?php echo base_url('login/set_mode')?>',
								dataType : 'json',
								data:{'mode':'offline'},
								success : function(data){
									location.reload();
								},
							});
						} 

					// else if (result.isDenied) {
					// 	Swal.fire('Changes are not saved', '', 'info')
					// }
				})
				}

			}
			
		}

		var reloadXML = setInterval(cek_koneksi, 20000);


	</script>

	

	
</body>
<footer class="footer">

	<div class="container-fluid"> 
		<div class="copyright p-3">
			Copyright © 2021 <i class="fa fa-heart heart text-danger"></i> - <a href="<?php echo site_url('dashboard') ?>">OFFICIAL <?php echo $this->session->nama_pt; ?></a>
		</div>
		<!-- <img class="main-chat" height="70px" width="70px"src="<?php echo base_url()?>assets/img/chatbubble.png"> -->

	</div>

</footer>
</html>