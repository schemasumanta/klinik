<!DOCTYPE html>
<html><head>
	<style type="text/css">
		.tengah{
			text-align: center;
		}
		.kanan{
			text-align: right;

		}
		.judultotal{
			background: #28a745;
			vertical-align: middle;
			color: white;
		}
		.isitotal{
			background: #fdffd9;
			vertical-align: middle;

		}

		th{
			line-height: 15px;
		}

		@media print{
			.card-header{
				display: none;
			}

			.tengah{
				text-align: center;
			}
			.kanan{
				text-align: right;

			}
			.judultotal{
				background: #28a745;
				vertical-align: middle;
				color: white;
			}
			.isitotal{
				background: #fdffd9;
				vertical-align: middle;

			}

		};
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<script type="text/javascript">
		function exportTableToExcel(mytable, filename = 'Laporan Dokter <?php echo $tanggal_awal." sd ".$tanggal_akhir; ?>'){
			var downloadLink;
			var dataType = 'application/vnd.ms-excel';
			var tableSelect = document.getElementById(mytable);
			var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
    	var blob = new Blob(['\ufeff', tableHTML], {
    		type: dataType
    	});
    	navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

</script>
</head><body>

</body>
</html>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">     

							<button class="btn btn-success btn-sm mr-1" id="konvert" onclick="exportTableToExcel('mytable')">Export  to Excel</button>

						</div>  
						<div class="card-body">
							
							<table id="mytable" class="display table table-bordered"> 
								<thead>
									<tr style="border-bottom: 0px solid black;">
										<th colspan="5" style="border-bottom: 0px solid black;">
											<div class="row">
												<div class="col-lg-12" style="border: 0px solid black;text-align: center;font-weight: bold;">
													<h4><b><center>LAPORAN PEMERIKSAAN DOKTER</center></b></h4>
													<span style="text-align: right;">Periode</span><span>&nbsp;&nbsp;:&nbsp;<?php $tanggal=explode('-', $tanggal_awal);
													$bulan = array(
														'01' => 'Januari',
														'02' => 'Februari',
														'03' => 'Maret',
														'04' => 'April',
														'05' => 'Mei',
														'06' => 'Juni',
														'07' => 'Juli',
														'08' => 'Agustus',
														'09' => 'September',
														'10' => 'Oktober',
														'11' => 'November',
														'12' => 'Desember'
													);
													echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]
													?></span><span style="text-align: right;">&nbsp;&nbsp;s/d&nbsp;&nbsp;</span><span>&nbsp;<?php $tgl=explode('-', $tanggal_akhir);
													echo $tgl[2]." ".$bulan[$tgl[1]]." ".$tgl[0]
													?></span>

												</div>
											</div>

										</th>
									</tr>
									<tr style="border-top:0px solid black;">
										<th colspan="5" style="border-top: 0px solid black;"></th>
									</tr>
									<tr style="font-size: 12px;text-align: center;">
										<th>No</th> 
										<th>Nama Dokter</th>  
										<th>Upah Dokter</th> 
										<th class="text-center">Jumlah<br>Pemeriksaan</th> 
										<th>Opsi</th>
									</tr>

								</thead>

								<tbody id="show_data" style="font-size: 10px;"> 
									<?php $no=1; foreach ($list_dokter as $key) {?>
										<tr style="font-size: 12px">
											<td class="text-center" width="5px"><?php echo $no; ?></td> 
											<td ><?php echo $key->nama_admin;?></td> 
											<td class="kanan "><?php echo number_format(($key->tarif_dokter), 0, ',', '.');?></td>
											<td class="text-center"><?php $jumlah =0; foreach ($pemeriksaan as $row) {
												if ($row->dokter_pemeriksa==$key->nama_admin) {
													$jumlah+=1;
												}
											}
											echo $jumlah;?></td> 
											<td class="text-center"><button class="btn btn-sm btn-success detail_jumlah_pemeriksaan" data-pemeriksaan="<?php echo $key->nama_admin ?>"><i class="fas fa-eye"></i></button></td> 
											<?php  $no++; } ?>

										</tr>

									</tbody>
								</table>
							</div>




						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="modal fade" id="ModalDetailDokter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<center><h4 class="modal-title  text-center" id="juduldetail"></h4></center>
						<br>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">
							<div class="row"> 
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead id="judul_tabel">
												<tr class="text-center">
													<th>No</th>
													<th>Tanggal</th>
													<th>Kode Rekam</th>
													<th>Pasien</th>
													<th>Alamat</th>
												</tr>
											</thead>
											<tbody id="data_detail"></tbody>
										</table>
										<div class="row">
											<div class="col-md-12 text-right">
												<span class=" hitung_total mr-1"></span>
											</div>
										</div>
										<br>
									</div>
								</div>  
							</div> 
						</div>
						<div class="modal-footer">
							<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> TUTUP</button>
						</div>
					</form>
				</div>
			</div>
		</div> 

	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.detail_jumlah_pemeriksaan').on('click',function(){
				let dokter = $(this).data('pemeriksaan');
				let tanggal_awal ='<?php echo $tanggal_awal ?>';
				let tanggal_akhir ='<?php echo $tanggal_akhir ?>';
				$.ajax({
					type  : 'GET',
					url   : '<?php echo base_url()?>pembayaran/list_pemeriksaan_per_dokter',
					dataType : 'json',
					data:{'dokter':dokter,'tanggal_awal':tanggal_awal,'tanggal_akhir':tanggal_akhir},
					success : function(data){
						$('#ModalDetailDokter').modal('show');
						let html='';
						for (var i = 0; i < data.length; i++) {
							html+='<tr><td class="text-center">'+(i+1)+'</td><td>'+data[i].tanggal_checkout+'</td><td>'+data[i].kode_rekam+'</td><td>'+data[i].nama_pasien+'</td><td >'+data[i].alamat+'</td></tr>'
						}
						$('#juduldetail').html("LIST PEMERIKSAAN OLEH "+dokter.toUpperCase());

						$('#data_detail').html(html);
					}
				});

			});

		});

		function SeparatorRibuanbyClass(bilangan,kelasdata){
			let angka = bilangan.replace(/\./g,'');
			let sisa 	= angka.length % 3;
			awalan 	= angka.substr(0, sisa);
			ribuan 	= angka.substr(sisa).match(/\d{3}/g);
			if (ribuan) {
				separator = sisa ? '.' : '';
				hasil = awalan + separator + ribuan.join('.');
				$('.'+kelasdata).html(hasil);
			}
		}
		
	</script>















