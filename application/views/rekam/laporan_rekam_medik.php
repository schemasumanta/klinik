<div class="main-panel">


	<style type="text/css">
		.judulawal{

		}
		.batas{

		}

		.batastengah{
			width: 15px;

		}
		.titikdua{
			width: 1%;
			text-align: center;

		}
		.minibatas{
			width: 2px;
			text-align: left;
			border: 0px solid black
		}
		/*td{
			border: 1px solid
		}*/
		.alamat{
			word-break:all;
		}
		.tinggi{
			line-height: 30px;
		}
		.isiheader{
			width: 20%;
			text-align: left;
		}
		.judultabel{
			border: 1px solid#cbcdd8;
			text-align: center;
			width: 300px;
		}
		.pemisah{
			height: 20px;
		}
		table{
			width: 100%;
			table-layout:fixed;
		}

		.ceklist{
			margin-right: 5px;
		}
		.isi2{
			width: 39%
		}
		.btn-primary{
			position: absolute;
			top: 0;
			right: 0;
			float: right;
			border-bottom-left-radius: 25px;
			font-weight: bold;

		}
		.tgl{
			width: 10%;
			border: 1px solid#cbcdd8;
			text-align: center;


		}
	
		.umur{
			width: 10%;
			border: 1px solid#cbcdd8;
			text-align: center;

		}
		.atas{
			vertical-align: top;
		}

		.keluhan{
			width: 30%;
			border: 1px solid#cbcdd8;
			padding-left: 10px;

		}

		.hasil{
			width: 50%;
			border: 1px solid#cbcdd8;
			padding-left: 10px;


		}

		.diagnosa{
			width: 50%;
			border: 1px solid#cbcdd8;
			padding-left: 10px;

		}
		.tengah{
			text-align: center;
		}
		.bt{
			border-top: 1px solid #cbcdd8;
		}
		.bb{
			border-bottom:  1px solid #cbcdd8;
		}
		.bl{
			border-left: 1px solid #cbcdd8;
		}
		.br{
			border-right:  1px solid #cbcdd8;
		}
		.reg{
			background: #1572e8;
			color:white;
			border-radius: 1px;
			width: 30px
		}
	/*	tr ,td {
			border:1px solid;
		}*/
		.gambarview{
			overflow: hidden;
		}

		.berwarna{
			background: #03b509;
			color: white;
		}

	</style>
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"> 
							<?php if (count($rekam)<=1) {?>
								<a href="#" onclick="return false" class="btn btn-primary btn-sm">Pasien Baru</a>
							<?php }else{ ?>
								<a href="#" onclick="return false" class="btn btn-primary btn-sm">Pasien Lama</a>

							<?php } ?>
							<br>
							<h5 style="font-size: 25px;text-align: center;"><b>REKAM MEDIK PENGOBATAN</b></h5>
							<a style="margin-left:95%" id="konvert" onclick="exportTableToExcel('tabel_pasien')" class="btn btn-warning btn-sm ">  <i class="fa fa-download"></i></a>

							
						</div>


						<div class="card-body">
							
							<table id="tabel_pasien">
								<?php foreach ($pasien as $key) {?>
									<thead >
										<tr>
											<th colspan="4" class="judulawal">Nama Pasien</th>
											<td class="titikdua atas">:</td>

											<td class="isiheader atas" colspan="6"><?php echo $key->nama_pasien?></td>
											<td colspan="19"></td>

											<th class="judulawal atas" colspan="3">No. Reg</th>
											<td class="titikdua atas">:</td>
											<!-- <?php $reg= str_split($key->no_registrasi); ?>
											<?php for ($i=0;$i<strlen($key->no_registrasi);$i++){ ?>
												<td class=" titikdua atas tengah reg" cellspacing="15"><?php echo $reg[$i]; ?></td>
												<td class="minibatas atas"></td>

											<?php } ?> -->
											<td class=" " colspan="3"><?php echo  $key->no_registrasi; ?></td>
												<td class="minibatas atas"></td>

										</tr>

										<tr>
											<th colspan="4" class="judulawal atas">Kepala Keluarga</th>
											<td class="titikdua atas">:</td>
											<td class="isiheader atas" colspan="9"><?php echo $key->kepala_keluarga?></td>

											<td colspan="16"></td>




											<th colspan="3" class="judulawal atas">TTL</th>
											<td class="titikdua atas">:</td>
											<td colspan="16" class="atas"><?php $tanggal=explode('-', $key->tanggal_lahir);
											$bulan = array('01' => 'Januari','02' => 'Februari','03' => 'Maret','04' => 'April','05' => 'Mei','06' => 'Juni','07' => 'Juli','08' => 'Agustus','09' => 'September','10' => 'Oktober','11' => 'November','12' => 'Desember',);
											echo $key->tempat_lahir.", ".$tanggal[2]." ".$bulan[$tanggal[1]]." ".$tanggal[0]?></td>

										</tr>

										<tr>
											<th colspan="4" class="judulawal atas">Alamat Lengkap</th>
											<th class="titikdua atas" rowspan="2">:</th>

											<td class="isiheader alamat" colspan="9"><?php echo $key->alamat?></td>

											<td colspan="16"></td>


											<th colspan="3"class="judulawal atas" >Telepon</th>
											<td class="titikdua atas">:</td>

											<td  colspan="16" class="isiheader atas"><?php echo $key->telepon?></td>


										</tr>
									</thead>
								<?php } ?>

								<tr><td class="pemisah"></td></tr>
								<tr><td class="pemisah"></td></tr>


								<tr>
									<th class="berwarna tgl tengah" colspan="4">Tgl Periksa</th>
									<th class="berwarna umur tengah" colspan="2">Umur</th>
									<th class="berwarna keluhan tengah" colspan="4">Keluhan</th>
									<th class="berwarna hasil tengah" colspan="8">Hasil Pemeriksaan</th>
									<th class="berwarna diagnosa tengah" colspan="12">Diagnosa</th>
									<th class="berwarna diagnosa tengah" colspan="21">Terapi</th>
									<th class="berwarna tengah bt bb bl br"  colspan="2">Paraf</th>


								</tr>
								<?php foreach ($rekam as $row) {?>
									<tr>
										<td class="tgl tengah atas tinggi" colspan="4"><?php echo $row->tanggal_periksa; ?></td>
										<td class="umur tengah atas tinggi" colspan="2"><?php echo $row->umur; ?></td>
										<td class="keluhan atas tinggi" colspan="4"><?php echo $row->keluhan; ?></td>
										<td class="hasil atas tinggi" colspan="8"><?php echo $row->hasil_pemeriksaan; ?></td>
										<td class="diagnosa atas tinggi" colspan="12"><?php echo $row->diagnosa; ?></td>
										<td class="diagnosa atas tinggi" colspan="21">
											<?php foreach ($obat as $obt) {
												if ($obt->kode_rekam==$row->kode_rekam) {
													echo "- ".$obt->nama_obat." - ".$obt->qty.$obt->satuan_obat." (".$obt->aturan_pakai.") <br>";
												}
											}  ?>
												
											</td>
										<td  class="tengah bt bb bl br gambarview" colspan="2"><img src="<?php echo base_url().$row->ttd; ?>" width="50px"></td>


									</tr>
								<?php } ?>

							</table>


						</div>


					</div>
				</div>
			</div>


		</div>
		<script type="text/javascript">
 function exportTableToExcel(mytable, filename = 'Dara Rekam Pasien'){
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
