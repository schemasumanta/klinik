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
							
							<table id="mytable" class="display table table-bordered" border="1" style="border-collapse: collapse;"> 
								<thead>
									<tr style="border-bottom: 0px solid black;">
										<th colspan="11" style="border-bottom: 0px solid black; " class="titel">
											<div class="row">
												<div class="col-lg-12" style="border: 0px solid black;text-align: center;font-weight: bold;">
													<h4><b><center>LAPORAN PENJUALAN OBAT</center></b></h4>
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
									<th colspan="11" style="border-top: 0px solid black;" class="titel"></th>
								</tr>
								
								<tr style="font-size: 12px;text-align: center;">
									<th>No</th> 
									<th colspan="3">Nama Obat</th> 
									<th>Harga Beli</th> 
									<th>Harga Jual</th> 
									<th>Stok Obat</th>
									<th>Jumlah Obat Keluar</th>
									<th>Total Penjualan</th>
									<th>Laba</th>
									<th class="opsi">Opsi</th>
								</tr>

							</thead>

							<tbody id="show_data" style="font-size: 10px;"> 
								<?php $no=1; foreach ($stok_obat as $key) {?>
									<?php if ($key->jumlah_penjualan > 0): ?>
										
									<tr style="font-size: 12px">
										<td><?php echo $no; ?></td> 
										<td colspan="3"><?php echo $key->nama_obat; ?></td> 
										<td style="mso-number-format:'\@'" class="kanan beli"><?php echo number_format(($key->harga_beli), 0, ',', '.');?></td> 
										<td style="mso-number-format:'\@'" class="kanan jual"><?php echo number_format(($key->harga_jual), 0, ',', '.');?></td>
										<td style="mso-number-format:'\@'" class="keluar tengah"><?php echo $key->total_stok; ?></td>

										<td style="mso-number-format:'\@'" class="keluar tengah"><?php echo round($key->jumlah_penjualan,3); ?></td>
										<td style="mso-number-format:'\@'" class="kanan sub_penjualan"><?php echo number_format(floatval($key->harga_jual)*floatval($key->jumlah_penjualan), 0, ',', '.'); ?></td>

										<td style="mso-number-format:'\@'" class="laba kanan"><?php echo number_format((($key->harga_jual-$key->harga_beli)* $key->jumlah_penjualan), 0, ',', '.'); ?></td>

										<td class="keluar tengah opsi"><a href="#" class="btn btn-success btn-sm item_lihat_rekam_obat" data="<?php echo $key->kode_obat ?>"><i class="fas fa-eye"></i></a></td>
									</tr>   

									<?php endif ?> 
									
									<?php $no++; } ?>

								</tbody>
								<tfoot>
									<tr>
										<th colspan="9" style="text-align: right;">Total Penjualan</th>
										<th colspan="2" style="text-align: right; " class="total_penjualan kolom_total"></th>
									</tr>

									<tr>
										<th colspan="9" style="text-align: right;">Total Laba</th>
										<th colspan="2" style="text-align: right; " class="total_laba kolom_total"></th>
									</tr>
								</tfoot>
							</table>
						</div> 

					</div>
				</div>


			</div>
		</div>
	</div>

	<!-- MODAL UPDATE -->

</div>
<div class="modal fade" id="ModalDetailObat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header ">
				<center><h4 class="modal-title  text-center" id="juduldetail" style=" font: sans-serif; "></h4></center>
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
											<th>Jumlah</th>
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
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/plugin/datatables/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugin/datatables-bs4/js/dataTables.bootstrap4.js');?>"></script>
<script src="<?php echo base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
<script>
	WebFont.load({
		google: {"families":["Lato:300,400,700,900"]},
		custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url() ?>assets/css/fonts.min.css']},
		active: function() {
			sessionStorage.fonts = true;
		}
	});

	$(document).ready(function(){
		let total_obat_masuk = 0;
		$('.masuk').each(function(){
			if ($(this).html!='') {
				total_obat_masuk+=parseFloat($(this).html().toString().replace(/\./g,''));
			}
		});
		SeparatorRibuanbyClass(total_obat_masuk.toString(),'total_obat_masuk');
		let total_obat_keluar = 0;
		$('.keluar').each(function(){
			if ($(this).html!='') {
				total_obat_keluar+=parseFloat($(this).html().toString().replace(/\./g,''));
			}
		});
		SeparatorRibuanbyClass(total_obat_keluar.toString(),'total_obat_keluar');

		let total_stok_akhir = 0;
		$('.stok_akhir').each(function(){
			if ($(this).html!='') {
				total_stok_akhir+=parseFloat($(this).html().toString().replace(/\./g,''));
			}
		});
		SeparatorRibuanbyClass(total_stok_akhir.toString(),'total_stok_akhir');

		let total_penjualan = 0;

		$('.sub_penjualan').each(function(){
			if ($(this).html!='') {
				total_penjualan+=parseFloat($(this).html().toString().replace(/\./g,''));
			}
		});
		SeparatorRibuanbyClass(total_penjualan.toString(),'total_penjualan');

		
		let total_laba = 0;
		$('.laba').each(function(){
			if ($(this).html!='') {
				total_laba+=parseFloat($(this).html().toString().replace(/\./g,''));
			}
		});
		SeparatorRibuanbyClass(total_laba.toString(),'total_laba');




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




	function exportTableToExcel(mytable, filename = 'Laporan OBAT '+<?php $tanggal=date("Ymd");echo $tanggal; ?>){
		$('.opsi').remove();
		$('.titel').attr('colspan',10);
		$('.kolom_total').attr('colspan',1);

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
$('.item_lihat_rekam_obat').on('click',function(){
	let kode_obat = $(this).attr('data');
	let tanggal_awal  = '<?php echo $tanggal_awal?>';
	let tanggal_akhir = '<?php echo $tanggal_akhir?>';
	$.ajax({
		type : "POST",
		url  : "<?php echo base_url('pembayaran/list_obat_terjual_by_kode')?>",
		dataType : "JSON",
		data : {'kode_obat': kode_obat,'tanggal_awal': tanggal_awal,'tanggal_akhir': tanggal_akhir},
		success: function(data){
			$('#ModalDetailObat').modal('show');
			let list_rekam=[];
			let html='';
			for (var i = 0; i < data.length; i++) {
				html+='<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">'+data[i].tanggal_input+'</td><td class="text-center">'+data[i].kode_rekam+'</td><td class="text-center">'+data[i].qty+'</td></tr>'
			}
			$('#data_detail').html(html);
		}
	});
});
</script>















