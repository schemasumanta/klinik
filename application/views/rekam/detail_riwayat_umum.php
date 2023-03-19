<div class="main-panel w-100" style="padding: 0px !important;margin:0px !important">
	<style type="text/css">
	.label-checkbox{
		vertical-align: middle;
		padding-bottom: 10px;
	}
	.card-header{
		text-align: center;
		font-size: 25px;
	}
	#tabel_rekam{
		overflow-x:  scroll;
		width: 100%;
	}

	.batas{
		width:1%;
		border-top: 1px solid #ffff;

	}
	.judul2{
		background: #f1f1f1;
		padding: 10px;
		border: 1px solid #a5a6a7;
		font-size:14px;
		width:10%;
		text-align: left;
	}
	.judul1{
		background: #f1f1f1;
		padding: 10px;
		border: 1px solid #a5a6a7;
		font-size:14px;
		width:5%;
		text-align: left;
	}
	.isi1{
		padding: 10px;
		background: #fffeda;

		border: 1px solid #a5a6a7;
		width:30%;
		
		font-size:14px;
		text-align: left;
	}

	.isi{
		padding: 10px;
		background: #fffeda;

		border: 1px solid #a5a6a7;
		
		font-size:14px;
		text-align: left;
	}
	.qty{
		padding: 10px;
		background: #f1f1f1;

		border: 1px solid #a5a6a7;
		width:10%;
		font-size:14px;
		text-align: center;
	}
	tbody{
		border: 0px solid;

	}
	tr{
		border: 1px solid white;

	}
	.pemisah{
		border: 1px solid white;
		height: 10px;

	}
	.tengah{
		text-align: center;
	}
	.rekam{
		text-align: right; 			
		border: 2px solid white;
		border-top-left-radius: 15px;
		border-bottom-right-radius: 15px;
		background:#2f7b31;
		color:white;
	}
	#tabel_rekam{
		overflow-x: hidden;

	}

	#tabel_rekamfinal{
		overflow-x: hidden;

	}

	.gambar{
		width: 80px;
	}
	.final{
		height: 20px;
	}
	h2{
		font-weight: bold;
		color: #d07b00;
	}
	
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"> 
				<i class="fas fa-briefcase-medical mr-3"></i><span style="font-size: 25px;"><b>DETAIL REKAM MEDIK PASIEN</b></span>
				<?php foreach ($detail_rekam_pasien_umum as $row): ?>
					<h4 style="font-weight: bold;margin-top: 10px;"><?php echo ucwords($row->kode_rekam);?></h4>	
				<?php endforeach ?>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="tabel_rekam" class="table-responsive"> 
						<thead>
							<tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">
								<td style="height:40px;font-weight:bold;text-align: left;" colspan="5">&nbsp;&nbsp;&nbsp;Data Pasien</td>	
							</tr>
						</thead>

						<tbody style="border: 1px solid white">  
							<tr class="pemisah">
								<td colspan="2"></td>
								<td ></td>
								<td colspan="2"></td>
							</tr>


							<tr>
								<th  class="judul1">Kode Pasien</th>											
								<td class="isi1"><?php echo $row->kode_pasien ?></td>
								<th class="batas"></th>
								<th class="judul2" >Nama Pasien</th>											
								<td class="isi"><?php echo $row->nama_pasien ?></td>
							</tr>
							<tr >

								<th  class="judul1">Nomor Registrasi</th>											
								<td class="isi1"><?php echo $row->no_registrasi ?></td>
								<td class="batas"></td>
								<th class="judul2" >Tanggal Lahir</th>											
								<td class="isi"><?php $tanggal=explode('-', $row->tanggal_lahir);
								$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
								echo $row->tempat_lahir.", ".$tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0] ?></td>
							</tr>
							<tr>
								<th  class="judul1">Telepon</th>											
								<td class="isi1"><?php echo $row->telepon ?></td>
								<th class="batas"></th>
								<th class="judul2" >Tanggal Berobat</th>											
								<td class="isi"><?php $tanggal=explode('-', $row->tanggal_berobat);
								$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
								echo $tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?></td>
							</tr>

							<tr>
								<th  class="judul1">Jenis Kelamin</th>											
								<td class="isi1"><?php if ($row->jk=="L") {
									echo 'Laki-Laki';
								}else{echo 'Perempuan';} ?></td>
								<th class="batas"></th>

								<th  class="judul2">Status Pernikahan</th>											
								<td class="isi"><?php echo $row->status_pernikahan ?></td>
							</tr>
							<tr class="pemisah">
								<td colspan="2"></td>
								<td ></td>
								<td colspan="2"></td>
							</tr>

							<tr>
								<th  class="judul1">Alamat</th>											
								<td class="isi"  colspan="4"><?php echo $row->alamat ?></td>
							</tr>
						</tr>


						<tr class="pemisah">
							<td class="final" colspan="2"></td>
							<td class="final" ></td>
							<td class="final" colspan="2"></td>
						</tr>
						<tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">
							<td style="height:40px;font-weight:bold;text-align: left;" colspan="5">&nbsp;&nbsp;&nbsp;Hasil Diagnosis</td>	
						</tr>
					</tbody>
				</table>
			</div>

			
			<div class="row mb-3 mt-4">

				<div class="col-sm-2 tengah">
					<img src="<?php echo base_url()?>assets/img/suhu.svg" class="gambar">
					<br>
					<br>
					<h2><?php echo $row->suhu; ?></h2>
				</div>

				<div class="col-sm-2 tengah">
					<img src="<?php echo base_url()?>assets/img/nadi.svg" class="gambar">
					<br>
					<br>
					<h2><?php echo $row->nadi; ?></h2>
				</div>
				<div class="col-sm-2 tengah">
					<img src="<?php echo base_url()?>assets/img/saturasi.svg" class="gambar">
					<br>
					<br>
					<h2><?php echo $row->saturasi; ?></h2>
				</div>
				<div class="col-sm-3 tengah">
					<img src="<?php echo base_url()?>assets/img/pernafasan.svg" class="gambar">
					<br>
					<br>
					<h2><?php echo $row->pernapasan; ?></h2>
				</div>
				<div class="col-sm-3 tengah">
					<img src="<?php echo base_url()?>assets/img/tensi.svg" class="gambar">
					<br>
					<br>
					<h2><?php echo $row->tensi_darah; ?></h2>
				</div>


			</div>



			<table  id="tabel_rekamfinal" class="table-responsive">
				<tbody>

					<tr class="pemisah">
						<td colspan="2"></td>
						<td ></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<th  class="judul1">Keluhan</th>											
						<td class="isi"  colspan="4"><?php echo $row->keluhan ?></td>
					</tr>
					<tr>
						<th  class="judul1">Hasil Pemeriksaan</th>											
						<td class="isi"  colspan="4"><?php echo $row->hasil_pemeriksaan ?></td>
					</tr>
					<tr>
						<th  class="judul1">Diagnosa</th>											
						<td class="isi"  colspan="4"><?php echo $row->diagnosa ?></td>
					</tr>


					<tr class="pemisah">
						<td colspan="2"></td>
						<td ></td>
						<td colspan="2"></td>
					</tr>

					<tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">
						<td style="height:40px;font-weight:bold;text-align: left;" colspan="5">&nbsp;&nbsp;&nbsp;Resep Obat</td>	
					</tr>
					<tr class="pemisah">
						<td colspan="2"></td>
						<td ></td>
						<td colspan="2"></td>
					</tr>
					<tr>
							<!-- <th  class="judul1" colspan="1">Nama Obat</th>		
							-->
							<th width="15%"  class="judul1" colspan="1">Nama Obat - Keterangan</th>

							<th  class="judul1" colspan="2">Aturan Pakai</th>											
							<th class="qty">Qty</th>											
						</tr>

						<?php foreach ($detail_obat as $key) {?>

							<tr>
								<td  class="isi" colspan="1"><?php echo $key->nama_obat; ?> || <?php echo $key->keterangan ?></td>											
								<td  class="isi" colspan="2"><?php echo $key->aturan_pakai; ?></td>											
								<td class="isi tengah"><?php echo $key->qty." ".ucfirst($key->satuan_obat); ?></td>											
							</tr>
						<?php } ?>


						<tr class="pemisah">
							<td colspan="2"></td>
							<td ></td>
							<td colspan="2"></td>
						</tr>


						<tr style="background: #03b509;color: white; border: 1px solid  #10aad8;">
							<td style="height:40px;font-weight:bold;text-align: left;" colspan="5">&nbsp;&nbsp;&nbsp;Pemeriksaan</td>	
						</tr>
						<tr class="pemisah">
							<td colspan="2"></td>
							<td ></td>
							<td colspan="2"></td>
						</tr>
						<tr>
							<th  class="judul1 tengah" colspan="3">Diperiksa Oleh</th>											
							<th class="qty tengah" colspan="2">Tanggal Pemeriksaan</th>											
						</tr>
						<tr>
							<th  class="isi tengah" colspan="3"><?php echo ucwords($row->dokter_pemeriksa)?></th>											
							<th class="isi tengah" colspan="2"><?php $tanggal=explode('-', $row->tanggal_periksa);
							$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
							echo $tanggal[2]."  ".$bulan[$tanggal[1]]."  ".$tanggal[0]?></th>											
						</tr>	

					</tbody>
				</table>


			</div>
		</div>


	</div>
</div>
</div>


</div>
<script type="text/javascript">
	function kembali(){
		window.history.back();
	}
</script>
