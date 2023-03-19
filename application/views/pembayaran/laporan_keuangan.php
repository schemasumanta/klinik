<!DOCTYPE html>
<html><head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
<style type="text/css">
	@media print{
	.card{
		border: 0px solid; 
	}
	.card-header,.btn_detail{
		display: none;
	}
	}


</style>
</head><body>
</body>
</html>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-light" style="position: fixed;z-index: 99999; left: 25px;top:10px;cursor: pointer;border-radius: 50%;border: 1px solid #afb9b1"  id="konvert" onclick="exportTableToExcel('mytable')" >
						<i class="fas fa-file-excel fa-2x text-success"></i>  
						</div>  
						<div class="card-body">
							<table id="mytable" class="display table table-bordered"> 
								<thead>
									<tr style="border-bottom: 0px solid black;">
										<th colspan="5" style="border-bottom: 0px solid black;">
											<div class="row">
												<div class="col-lg-12" style="border: 0px solid black;text-align: center;font-weight: bold;">
													<h4><b><center>LAPORAN KEUANGAN KLINIK HMS MEDIKA</center></b></h4>
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
										<th>Kategori</th> 
										<th>Jumlah</th>
										<th>Nominal ( Rp. )</th> 
										<th class="tombol"><span>Opsi</span></th> 
									</tr>
								</thead> 
								<tbody id="show_data" style="font-size: 10px;"> 
									<tr style="font-size: 12px;vertical-align:middle" class="bg-success text-light text-center">
										<th colspan="4">TRANSAKSI MASUK</th>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">

										<td>UMUM</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $umum[0]->jumlah_umum ?></span>&nbsp;&nbsp;Orang</td>
										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($umum[0]->nominal)-floatval($umum[0]->nominal_lab)), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL UMUM"><i class="fa fa-eye"></button></i></td>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>KB</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $kb[0]->jumlah_kb ?></span>&nbsp;&nbsp;Orang </td>
										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($kb[0]->nominal)), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL KB"><i class="fa fa-eye"></button></i></td>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>ANC</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $anc[0]->jumlah_anc ?></span>&nbsp;&nbsp;Orang</td>
										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($anc[0]->nominal) ), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL ANC"><i class="fa fa-eye"></button></i></td>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>INC</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $inc[0]->jumlah_inc ?></span>&nbsp;&nbsp;Orang</td>
										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($inc[0]->nominal) ), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL INC"><i class="fa fa-eye"></button></i></td>
									</tr>
									
										<tr style="font-size: 12px;vertical-align:middle">
											<td>IMUNISASI</td> 
											<td class="text-center"><span class="jumlah_kunjungan"><?php echo $imunisasi[0]->jumlah_imunisasi ?></span>&nbsp;&nbsp;Orang    </td>
											<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($imunisasi[0]->nominal) ), 0, ',', '.') ?></td>
											<td class="text-center"><button type="button" class="btn btn-success btn-sm btn_detail tombol" data="DETAIL IMUNISASI"><i class="fa fa-eye"></button></i></td>
										</tr>
										<tr style="font-size: 12px;vertical-align:middle">
											<td>BBL</td> 
											<td class="text-center"><span class="jumlah_kunjungan"><?php echo $bbl[0]->jumlah_bbl ?></span>&nbsp;&nbsp;Orang</td>
											<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($bbl[0]->nominal)), 0, ',', '.') ?></td>
											<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL BBL"><i class="fa fa-eye"></button></i></td>
										</tr>
											<tr style="font-size: 12px;vertical-align:middle">
											<td>NIFAS</td> 
											<td class="text-center"><span class="jumlah_kunjungan"><?php echo $nifas[0]->jumlah_nifas ?></span>&nbsp;&nbsp;Orang</td>
											<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($nifas[0]->nominal)), 0, ',', '.') ?></td>
											<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL NIFAS"><i class="fa fa-eye"></button></i></td>
										</tr>
											</tr>
											<tr style="font-size: 12px;vertical-align:middle">
											<td>RAPID TEST</td> 
											<td class="text-center"><span class="jumlah_kunjungan"><?php echo $rapid[0]->jumlah_rapid ?></span>&nbsp;&nbsp;Orang</td>
											<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($rapid[0]->nominal)), 0, ',', '.') ?></td>
											<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL RAPID"><i class="fa fa-eye"></button></i></td>
										</tr>
										</tr>
											<tr style="font-size: 12px;vertical-align:middle">
											<td>SWAB ANTIGEN</td> 
											<td class="text-center"><span class="jumlah_kunjungan"><?php echo $swab[0]->jumlah_swab ?></span>&nbsp;&nbsp;Orang  </td>
											<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($swab[0]->nominal)), 0, ',', '.') ?></td>
											<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL SWAB"><i class="fa fa-eye"></button></i></td>
										</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>BELI OBAT</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $beliobat[0]->jumlah_beliobat ?></span>&nbsp;&nbsp;Orang  </td>
										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($beliobat[0]->nominal)), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL OBAT"><i class="fa fa-eye"></button></i></td>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>SURAT SEHAT</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $surat[0]->jumlah_surat ?></span>&nbsp;&nbsp;Orang   
										</td>
										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($surat[0]->nominal)), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL SURAT"><i class="fa fa-eye"></button></i></td>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>PEMBAYARAN TAGIHAN</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $bayar_tagihan[0]->jumlah_bayar_tagihan ?></span>&nbsp;&nbsp;Orang  
										</td>

										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($bayar_tagihan[0]->nominal)), 0, ',', '.') ?></td>
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL TAGIHAN"><i class="fa fa-eye"></button></i></td>
									</tr>
									<tr style="font-size: 12px;vertical-align:middle">
										<td>PEMERIKSAAN LAB</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $lab[0]->jumlah_lab + $lab[0]->jumlah_sub_lab ?></span>&nbsp;&nbsp;Orang  
										</td>

										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($lab[0]->nominal + $lab[0]->nominal_lab)), 0, ',', '.') ?></td>

										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL LAB"><i class="fa fa-eye"></button></i></td>
									</tr>

									<tr style="font-size: 12px;vertical-align:middle">
										<td>PEMERIKSAAN RANAP</td> 
										<td class="text-center"><span class="jumlah_kunjungan"><?php echo $ranap[0]->jumlah_ranap ?></span>&nbsp;&nbsp;Orang  
										</td>

										<td style="mso-number-format:'\@'" class="nominal text-right" ><?php echo number_format((floatval($ranap[0]->nominal)), 0, ',', '.') ?></td>
 
										<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL RANAP"><i class="fa fa-eye"></button></i></td>
									</tr>


									<tr style="font-size: 12px;vertical-align:middle" class="bg-danger text-light text-center">
										<th colspan="4">TRANSAKSI KELUAR</th>
									</tr>
								</tr>
								<tr style="font-size: 12px;vertical-align:middle">
									<td>TUNGGAKAN PEMBAYARAN</td> 
									<td class="text-center"><span class="jumlah_kunjungan_keluar"><?php echo $tunggakan[0]->jumlah_tunggakan ?></span>&nbsp;&nbsp;Orang   
									</td>
									<td style="mso-number-format:'\@'" class="nominal_keluar text-right" ><?php echo number_format((floatval($tunggakan[0]->nominal)), 0, ',', '.') ?></td>
									<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL TUNGGAKAN"><i class="fa fa-eye"></button></i></td>
								</tr>
							</tr>
							<tr style="font-size: 12px;vertical-align:middle">
								<td>PENGELUARAN KAS</td> 
								<td class="text-center"><span class="jumlah_kunjungan_keluar"><?php echo $kas_keluar[0]->jumlah_kas_keluar ?></span>&nbsp;&nbsp;TRX   
								</td>
								<td style="mso-number-format:'\@'" class="nominal_keluar text-right" ><?php echo number_format((floatval($kas_keluar[0]->nominal)), 0, ',', '.') ?></td>
								<td class="text-center tombol"><button type="button" class="btn btn-success btn-sm btn_detail" data="DETAIL KELUAR"><i class="fa fa-eye"></button></i></td>
							</tr>
							<tr style="border-left:0px solid;border-right: 0px solid;">
								<td colspan="4"></td>
							</tr>
							<tr style="font-size: 15px;">
								<th class ="text-right">TOTAL KUNJUNGAN DAN PEMASUKAN</th>
								<th class ="text-center"><span class="totalpengunjung"></span></th>
								<th class=" text-right" style="border-right: 0px solid black "><span class="totalpemasukan"></span></th>
								<th style="border-left:0px solid black"></th>
							</tr>
							<tr style="font-size: 15px">
								<th class ="text-right">TOTAL KUNJUNGAN / TRANSAKSI DAN KAS KELUAR</th>
								<th class ="text-center"><span class="totalpengunjungkeluar"></span></th>
								<th class=" text-right" style="border-right: 0px solid black "><span class="totalpengeluaran"></span></th>
								<th style="border-left:0px solid black"></th>
							</tr>
								<tr style="font-size: 15px;">
								<th class="text-right" style="border-right: 0px solid black ">SALDO AKHIR</th>
								<th style="border-left:0px solid black"></th>
								<th class=" text-right" style="border-right: 0px solid black "><span class="saldo_akhir"></span></th>
								<th style="border-left:0px solid black"></th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="modal fade" id="ModalDetailKeuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
											<th>No Pemb.</th>
											<th>Kode Rekam</th>
											<th>Pasien</th>
											<th>Total</th>
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
</script>
<script type="text/javascript">
	$('.btn_detail').on('click',function(){
		let tanggal_awal = '<?php echo $tanggal_awal ?>';
		let tanggal_akhir = '<?php echo $tanggal_akhir ?>';
		let jenis_kunjungan = $(this).attr('data');
		$.ajax({
			url   : '<?php echo base_url()?>pembayaran/detail_keuangan',
			type: 'GET',
			async: true,
			dataType: 'json',
			data 	 :{
				'jenis_kunjungan':jenis_kunjungan,'tanggal_awal':tanggal_awal,'tanggal_akhir':tanggal_akhir},
				success: function(data){
					let html='';
					if (data.length > 0) {
					let total_akhir  = 0;

					if (jenis_kunjungan=="DETAIL KELUAR") {
						$('#judul_tabel').html(`
							<tr class="text-center">
							<th>No</th>
							<th>Tanggal</th>
							<th>Kode TRX</th>
							<th>Keterangan</th>
							<th>Total</th>
							</tr>
							`)
						for (var i = 0; i<data.length; i++) {
							total_akhir +=parseFloat(data[i].nominal_transaksi);
							let total = SeparatorRibuan(data[i].nominal_transaksi);
							html+='<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">'+data[i].tanggal_transaksi+'</td><td class="text-center">'+data[i].kode_transaksi_keluar+'</td><td class="text-center">'+data[i].keterangan_transaksi+'</td><td class="text-right">'+total+'</td></tr>'
						}
						$('#juduldetail').html("DETAIL DATA KEUANGAN "+jenis_kunjungan.toUpperCase());

						$('.hitung_total').html("<b>Total Pengeluaran Kas = Rp. "+SeparatorRibuan(total_akhir.toString())+"</b>");


					}else{	
						let judulkode ="No Pemb.";
						if (jenis_kunjungan=="DETAIL SURAT") {
							judulkode="Keterangan"
						}
						$('#judul_tabel').html(`
							<tr class="text-center">
							<th>No</th>
							<th>Tanggal</th>
							<th>`+judulkode+`</th>
							<th>Kode Rekam</th>
							<th>Pasien</th>
							<th>Total</th>
							</tr>
							`);
						
						if (jenis_kunjungan!="DETAIL OBAT" && jenis_kunjungan!="DETAIL SURAT") {
							$('#juduldetail').html("DETAIL DATA KEUANGAN "+jenis_kunjungan.toUpperCase());

						}else if (jenis_kunjungan=="DETAIL OBAT") {

							$('#juduldetail').html("DETAIL DATA KEUANGAN PEMBELIAN "+jenis_kunjungan.toUpperCase());

						}else{
							$('#juduldetail').html("DETAIL DATA KEUANGAN PEMBUATAN "+jenis_kunjungan.toUpperCase());
						}

						for (var i = 0; i<data.length; i++) {
							let total_lab = parseFloat(data[i].biaya_pemeriksaan_lab) > 0 ? parseFloat(data[i].biaya_pemeriksaan_lab): 0;
							let total='';

						if (jenis_kunjungan=="DETAIL LAB") {	
							total_akhir +=parseFloat(data[i].nominal);
							total = SeparatorRibuan((parseFloat(data[i].nominal)).toString());

							}else{
							total_akhir +=parseFloat(data[i].total_pembayaran) - total_lab;
							total = SeparatorRibuan((parseFloat(data[i].total_pembayaran) - total_lab).toString());

							}

							html+='<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">'+data[i].tanggal_checkout+'</td><td class="text-center">'+data[i].kode_pembayaran+'</td><td class="text-center">'+data[i].kode_rekam+'</td><td class="text-center">'+data[i].nama_pasien+'</td><td class="text-right">'+total+'</td></tr>'
						}

						$('.hitung_total').html("<b>Total Pemasukan = Rp. "+SeparatorRibuan(total_akhir.toString())+"</b>");
					}
				}else{
					$('.hitung_total').html("");
				}
					$('#ModalDetailKeuangan').modal('show');
					$('#data_detail').html(html);
				}
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

	$(document).ready(function(){
	
		let jumlah_pengunjung=0;
		$('.jumlah_kunjungan').each(function(){
			jumlah_pengunjung +=parseFloat($(this).html());
		});
		$('.totalpengunjung').html(jumlah_pengunjung+"  Orang");
		let pemasukan=0;
		$('.nominal').each(function(){
			let total = $(this).html().toString().replace(/\./g,'');
			pemasukan +=parseFloat(total);
		});
		SeparatorRibuanbyClass(pemasukan.toString(),'totalpemasukan')

		let jumlah_pengunjung_keluar=0;
		$('.jumlah_kunjungan_keluar').each(function(){
			jumlah_pengunjung_keluar +=parseFloat($(this).html());
		});
		$('.totalpengunjungkeluar').html(jumlah_pengunjung_keluar+"  Orang");
		let pengeluaran=0;
		$('.nominal_keluar').each(function(){
			let total_keluar = $(this).html().toString().replace(/\./g,'');
			pengeluaran +=parseFloat(total_keluar);
		});
		SeparatorRibuanbyClass(pengeluaran.toString(),'totalpengeluaran');
		let saldo_akhir = parseFloat(pemasukan) -parseFloat(pengeluaran);
		SeparatorRibuanbyClass(saldo_akhir.toString(),'saldo_akhir');

	});

	function exportTableToExcel(mytable, filename = 'Laporan KB'+<?php $tanggal=date("Ymd");echo $tanggal; ?>){

		$('.tombol').remove();
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
function SeparatorRibuan(bilangan){
	let angka = bilangan.replace(/\./g,'');
	let sisa 	= angka.length % 3;
	awalan 	= angka.substr(0, sisa);
	ribuan 	= angka.substr(sisa).match(/\d{3}/g);
	if (ribuan) {
		separator = sisa ? '.' : '';
		hasil = awalan + separator + ribuan.join('.');
		return hasil;
	}
}
</script>















