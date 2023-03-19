<!DOCTYPE html>
<html><head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<style type="text/css">
		table{
			border-collapse: collapse;
		}
		tr,td,th{
			border:1px solid black;
			border-collapse: collapse;

		}
		td{
			font-size: 12px;

		}

		th{
			vertical-align: middle;
			font-size: 14px;
			color:black;
			
		}
	</style>
</head><body>
	<div class="main-panel w-100" style="width: 100%;padding: 5px;">
		<?php 	$month = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',); ?>
		<table id="mytable" style="width: 100%;"><thead> 
			<tr>
				<th colspan="16" class="text-center" style="border:0px solid black;background: transparent;"><h4 style="font-weight: bold;">LAPORAN KUNJUNGAN KASUS BARU PENYAKIT TIDAK MENULAR KLINIK / Dokter Praktek Mandiri (Swasta)</h4></th>
			</tr>
			<tr>
				<th colspan="16" style="border:0px solid black;height: 25px;background: transparent;"></th>
			</tr>
			<tr style="border:0px solid black;background: transparent;">
				<th  style="border:0px solid black;background: transparent;"></th>

				<th colspan="3" style="border:0px solid black;background: transparent;">Puskesmas :&nbsp;Parung Panjang</th>
				<th  style="border:0px solid black;background: transparent;"></th>
				<th colspan="4" style="border:0px solid black;background: transparent;">Klinik / DPM : KLINIK HMS MEDIKA</th>
				<th  style="border:0px solid black;background: transparent;" colspan="3"></th>
				<th  colspan="4" style="border:0px solid black;background: transparent;">Bulan :&nbsp;<?php echo $month[$bulan]." ".$tahun ?></th>

			</tr>
			<tr>
				<th colspan="16" style="border:0px solid black;height: 15px;background: transparent;"></th>
			</tr>

			<tr>
				<th  class="text-center"   width="3%" rowspan="3">No</th>

				<th  class="text-center"   width="27%" rowspan="3">Penyakit Terkait PTM</th>

				<th  class="text-center"  width="50%" colspan="10">Kelompok Umur dan Jenis Kelamin</th>

				<th  class="text-center" width="10%" colspan="2" rowspan="2">Jumlah</th>

				<th class="text-center"   width="10%" colspan="2" rowspan="2">Meninggal</th>

			</tr>
			<tr>
				<th  class="text-center" colspan="2" width="10%">15 - 19 thn</th>
				<th  class="text-center" colspan="2" width="10%">20 - 44 thn</th>
				<th  class="text-center" colspan="2" width="10%">45 - 54 thn</th>
				<th  class="text-center" colspan="2" width="10%">55 - 59 thn</th>
				<th  class="text-center" colspan="2" width="10%" border="1">&gt; 60 thn</th>
			</tr>
			<tr >
				<?php for ($i=0; $i <7; $i++) { ?>
					<th  class="text-center"> L</th>
					<th  class="text-center">P</th>
				<?php } ?>
			</tr>
		</thead><tbody id="show_data"> 
			<?php if (count($penyakit['nama_penyakit']) > 0) { ?>

				<?php for ($i=0; $i < count($penyakit['nama_penyakit']) ; $i++)  {?>

					<tr>
						<td  class="text-center"><?php echo ($i+1); ?></td>
						<td  ><?php echo $penyakit['nama_penyakit'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_laki_19'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_perempuan_19'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_laki_44'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_perempuan_44'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_laki_54'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_perempuan_54'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_laki_59'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_perempuan_59'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_laki_60'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_perempuan_60'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_laki'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['jumlah_penyakit_perempuan'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['meninggal_laki'][$i]; ?></td>
						<td  class="text-center"><?php echo $penyakit['meninggal_perempuan'][$i]; ?></td>
					</tr>
				<?php } ?>

			<?php }else{ ?>
				<tr>
					<td colspan="16" class="text-danger text-center"><h4>DATA TIDAK TERSEDIA</h4></td>
				</tr>
			<?php } ?>
			<tr>
				<th colspan="16" style="border:0px solid black;height: 25px;background: transparent;"></th>
			</tr>
		</tbody>
		<tfoot style="margin-top: 25px">
			<tr style="border:0px solid black">
				<td colspan="3" style="border:0px solid black" class="text-center">Mengetahui
				</td>
				<td colspan="9" style="border:0px solid black" class="text-center">
				</td>
				<td colspan="4" style="border:0px solid black">Parung Panjang, <?php echo date('d')." ".$month[date('m')]." ".date('Y'); ?> 
				</td>
			</tr>

			<tr style="border:0px solid black">
				<td colspan="3" style="border:0px solid black" class="text-center">Kepala Puskesmas<br>Parung Panjang
				</td>
				<td colspan="9" style="border:0px solid black" class="text-center">Pengelola Program PTM
				</td>
				<td colspan="4" style="border:0px solid black">Penanggung Jawab Klinik / DPM</td>
			</tr>

			<tr style="border:0px solid black">
				<td colspan="3" style="border:0px solid black;height: 75px;vertical-align: bottom;" class="text-center">(.............................................................)</td>
				<td colspan="9" style="border:0px solid black;height: 75px;vertical-align: bottom;" class="text-center">(..................................................................)
				</td>
				<td colspan="4" style="border:0px solid black;height: 75px;vertical-align: bottom;">(...........................................................)</td>
			</tr>
			<tr style="border:0px solid black">
				<td colspan="3" style="border:0px solid black;height: 25px;vertical-align: bottom;text-align: center;" >NIP. ..........................................................</td>
				<td colspan="9" style="border:0px solid black;height: 25px;vertical-align: bottom;" class="text-center">NRPTT. ......................................................
				</td>
				<td colspan="4" style="border:0px solid black;height: 25px;vertical-align: bottom;"></td>
			</tr>

			<tr style="border:0px solid black">
				<td colspan="3" style="border:0px solid black;height: 25px;vertical-align: bottom;text-align: center;" ></td>
				<td colspan="9" style="border:0px solid black;height: 25px;vertical-align: bottom;" class="text-center">
					WA : ........................................................
				</td>
				<td colspan="4" style="border:0px solid black;height: 25px;vertical-align: bottom;"></td>
			</tr>


		</tfoot>
	</table>
	</div>



</body></html>












