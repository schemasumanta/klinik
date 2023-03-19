
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<div class="sidebar sidebar-style-2">		
	<style type="text/css">
	</style>	
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img id="photoprofile" src="<?php echo base_url().$this->session->foto; ?>" alt="..." class="avatar-img rounded-circle">
					<!-- <img src="<?php echo base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"> -->
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<p id="userid"><?php echo ucwords($this->session->nama_admin); ?></p>
							<span class="user-level" id="leveluser"><?php echo $this->session->level; ?></span>
							<h6 name="clock"  id="clock" ></h6>

							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav"> 
							<li>
								<a href="javascript:;" data-toggle="modal" data-target="#Modal_ttd">
									<span class="sub-item">Update TTD</span>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('login/logout') ?>">
									<span class="link-collapse">Keluar</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php if ($this->session->level=="superadmin"): ?>
				<ul class="nav nav-success">
					<li class="nav-item active">
						<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
							<i class="fas fa-home"></i>
							<p>Dashboard</p>

							<!-- <span class="caret"></span> -->
						</a>

					</li>
					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
						<h4 class="text-section">Admin Panel</h4>
					</li>

					<li class="nav-item">
						<a  href="<?php echo base_url() ?>dashboard/backupdatabase">
							<i class="fas fa-database"></i>
							<p>Backup Database</p>
						</a>
					</li>
					<li class="nav-item">
						<a  href="<?php echo base_url() ?>dashboard/slider">
							<i class="fas fa-sliders-h"></i>
							<p>Kelola Slider</p>
						</a>
					</li>

					<li class="nav-item">
						<a  href="<?php echo base_url() ?>login/history">
							<i class="fas fa-history"></i>
							<p>History Apps</p>
						</a>
					</li>
					<li class="nav-item">
						<a data-toggle="collapse" href="#office">
							<i class="fas fa-hospital"></i>
							<p>Perusahaan</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="office">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo site_url('perusahaan') ?>">
										<span class="sub-item">Data Perusahaan</span>
									</a>
								</li> 
							</ul>
						</div>
					</li> 

					<li class="nav-item">
						<a data-toggle="collapse" href="#absensidokter">
							<i class="fas fa-user-check"></i>
							<p>Absensi</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="absensidokter">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo site_url('absensi') ?>">
										<span class="sub-item">Data Absensi</span>
									</a>
								</li> 
								<li>
										<a href="#" class="btn_laporan_absensi" data-laporan="absen">
											<span class="sub-item">Laporan Absensi</span>
										</a>
									</li>
							</ul>
						</div>
					</li> 


					<li class="nav-item">
						<a data-toggle="collapse" href="#user">
							<i class="fas fa-user"></i>
							<p>User</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="user">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo site_url('user') ?>">
										<span class="sub-item">List User</span>
									</a>
								</li> 

							</ul>
						</div>
					</li> 

					<li class="nav-item">
						<a data-toggle="collapse" href="#profit">
							<i class="fas fa-calculator"></i>
							<p>Profit</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="profit">
							<ul class="nav nav-collapse">
								<li>
									<a href="javascript:;" data-toggle="modal" data-target="#ModalLaporanKeuangan">
										<span class="sub-item">Keuangan</span>
									</a>
								</li>

								<li>
									<a href="#" id="tarik_laporan_obat">
										<span class="sub-item">Obat</span>
									</a>
								</li>  
								<li>
									<a href="#" id="tarik_laporan_dokter">
										<span class="sub-item">Pemeriksaan Dokter</span>
									</a>
								</li>  
							</ul>
						</div>
					</li>






					<li class="nav-item">
						<a data-toggle="collapse" href="#pembayaran">
							<i class="fas fa-money-check-alt"></i> 
							<p>Pembayaran</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="pembayaran">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo site_url('pembayaran') ?>">
										<span class="sub-item">List Data Pembayaran</span>
									</a>
								</li>  

								<li>
									<a href="<?php echo site_url('pasien/pembayaran_tagihan') ?>">
										<span class="sub-item">List Pembayaran Tagihan</span>
									</a>
								</li> 
								<li>
									<a href="<?php echo site_url('pasien/tagihan') ?>">
										<span class="sub-item">Tagihan Pasien</span>
									</a>
								</li> 
							</ul>
						</div>
					</li>

					<li class="nav-item">
						<a data-toggle="collapse" href="#antrian">
							<i class="fas fa-sort-alpha-up"></i>
							<p>Antrian</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="antrian">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo site_url('antrian/tambah_antrian') ?>">
										<span class="sub-item">Tambah Antrian</span>
									</a>
								</li>  
								<li>
									<a href="<?php echo site_url('antrian/tampilan_antrian') ?>">
										<span class="sub-item">Tampilan Antrian</span>
									</a>
								</li> 

							</ul>
						</div>
					</li>

					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
						<h4 class="text-section">ADM Panel</h4>
					</li> 

					<li class="nav-item">
						<a data-toggle="collapse" href="#pasien_adm">
							<i class="fas fa-procedures"></i>								
							<p>Pasien</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="pasien_adm">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo site_url('pasien') ?>">
										<span class="sub-item">Data Pasien</span>
									</a>
								</li> 

							


							<li>
								<a href="<?php echo site_url('ranap/tolak') ?>">
									<span class="sub-item">Pasien Tolak Ranap</span>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('homecare/tolak') ?>">
									<span class="sub-item">Pasien Tolak Homecare</span>
								</a>
							</li>

							<li>
								<a href="<?php echo site_url('surat') ?>">
									<span class="sub-item">Surat Sakit & Sehat</span>
								</a>
							</li>

							<li>
								<a href="<?php echo site_url('skl') ?>">
									<span class="sub-item">Surat Keterangan Lahiran</span>
								</a>
							</li> 


									<!-- <li>
										<a href="<?php echo site_url('surat_penolakan') ?>">
											<span class="sub-item">Surat Penolakan</span>
										</a>
									</li>   --> 
								</ul>


							</div>


						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#pem_obat"> 
								<i class="fas fa-capsules"></i>								
								<p>Pembelian Obat</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="pem_obat">
								<ul class="nav nav-collapse">


									<li>
										<a href="<?php echo site_url('pembelian_obat') ?>">
											<span class="sub-item">Pembelian Obat</span>
										</a>
									</li>  

								</ul>


							</div>


						</li> 



						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel Tindakan Medis</h4>
						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#tindakanmedis">
								<i class="fas fa-procedures"></i>								
								<p>Rekam Medik</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tindakanmedis">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo site_url('rekam')?>">
											<span class="sub-item">Rekam Medik Umum</span>
										</a>
									</li> 

									<li>
										<a href="<?php echo site_url('rekam_kb')?>">
											<span class="sub-item">Rekam Medik KB</span>
										</a>

									</li>   

									<li>
										<a href="<?php echo site_url('anc')?>" >
											<span class="sub-item">Rekam Medik ANC</span>
										</a>
									</li> 
									<li>
										<a href="<?php echo site_url('inc')?>" >
											<span class="sub-item">Rekam Medik INC</span>
										</a>
									</li> 

									<li>
										<a href="<?php echo site_url('bbl') ?>">
											<span class="sub-item">Rekam Medik BBL</span>
										</a>
									</li>  

									<li>
										<a href="<?php echo site_url('nifas') ?>">
											<span class="sub-item">Rekam Medik NIFAS</span>
										</a>
									</li>  

									<li>
										<a href="<?php echo site_url('imunisasi') ?>" >
											<span class="sub-item">Rekam Medik IMUNISASI</span>
										</a>
									</li> 

									<li>
										<a href="<?php echo site_url('homecare') ?>" >
											<span class="sub-item">Rekam HOME CARE</span>
										</a>
									</li>

									<li>
										<a href="<?php echo site_url('ranap') ?>" >
											<span class="sub-item">Pemeriksaan Rawat Inap</span>
										</a>
									</li>

								</ul> 
							</div> 
						</li>  

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel LAB</h4>
						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#tindakanlab"> 
								<i class="fas fa-flask"></i>
								<p>Rekam LAB</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tindakanlab">
								<ul class="nav nav-collapse">

									<li>
										<a href="<?php echo site_url('laboratorium')?>">
											<span class="sub-item">Pemeriksaan Laboratorium</span>
										</a>
									</li> 

									<li>
										<a href="<?php echo site_url('rapid')?>">
											<span class="sub-item">Pemeriksaan Rapid Test</span>
										</a>
									</li> 

									<li>
										<a href="<?php echo site_url('swab')?>">
											<span class="sub-item">Pemeriksaan Swab Antigen</span>
										</a>
									</li>   

								</ul> 
							</div> 
						</li>
<!-- 
						<li class="nav-item">
							<a data-toggle="collapse" href="#mst_lab_kategori"> 
								<i class="fas fa-flask"></i>
								<p>Master LAB</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="mst_lab_kategori">
								<ul class="nav nav-collapse">

									<li>
										<a href="<?php echo site_url('sub_kategori_lab')?>">
											<span class="sub-item">Sub Kategori Lam</span>
										</a>
									</li> 


								</ul> 
							</div> 
						</li>  -->  

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel Rujukan</h4>
						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#menurujukan">
							<i class="fas fa-exchange-alt mr-2"></i>
								<p>Rujukan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="menurujukan">
								<ul class="nav nav-collapse"> 
									<li>
										<a href="<?php echo base_url('rujukan') ?>">
											<span class="sub-item">List Rujukan</span>
										</a>
									</li>  


								</ul>


							</div>


						</li>  

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel Laporan</h4>
						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#laporanbidan">
								<i class="fas fa-file-medical-alt"></i>								
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="laporanbidan">
								<ul class="nav nav-collapse"> 
									<li>
										<a href="#"  onclick="bukarekammedik()">
											<span class="sub-item">Laporan Rekam Medik</span>
										</a>
									</li>  

									<li>
										<a href="<?php echo site_url('laboratorium/laporan_laboratorium')?>">
											<span class="sub-item">Laporan Laboratorium'</span>
										</a> 
									</li> 


									<li>
										<a href="<?php echo site_url('laporan_kebidanan')?>">
											<span class="sub-item">Laporan Kebidanan</span>
										</a> 
									</li>   

									<li>
										<a href="<?php echo site_url('laporan_kohort')?>">
											<span class="sub-item">Laporan Kohort</span>
										</a>

									</li>

									<li>
										<a href="#" id="tarik_laporan_kkbptm">
											<span class="sub-item">Laporan KKB PTM</span>
										</a>

									</li>	

								</ul>


							</div>


						</li>   

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel Farmasi</h4>
						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#farmasi">
								<i class="fas fa-procedures"></i>								
								<p>Data Farmasi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="farmasi">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo site_url('satuan_obat')?>">
											<span class="sub-item">Data Obat</span>
										</a>
									</li> 

									<li>
										<a href="<?php echo site_url('satuan_obat/history')?>">
											<span class="sub-item">History Obat</span>
										</a>
									</li>  
									<li>
										<a href="<?php echo site_url('pembayaran/tampilan_data_farmasi')?>">
											<span class="sub-item">List Pemberian Obat</span>
										</a>
									</li> 
									<li>
										<a href="<?php echo site_url('ranap/obat_observasi')?>">
											<span class="sub-item">List Pemberian Obat Observasi Ranap</span>
										</a>
									</li>

								</ul>


							</div>




						</li> 









						<li class="nav-item bg-danger  text-light" style="border-radius: 5px;margin:15px;">
							<button type="button" class="btn btn-danger" id="panggil_antrian" href="#" aria-expanded="false">
								<i class="fas fa-microphone text-light mr-2"></i>Panggil Antrian	</button>

							</li> 

						</ul> 
					<?php endif ?>


					<?php if ($this->session->level=="farmasi"): ?>
						<ul class="nav nav-success">
							<li class="nav-item active">
								<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>

									<!-- <span class="caret"></span> -->
								</a>

							</li>  

							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Panel Farmasi</h4>
							</li> 

							<li class="nav-item">
								<a data-toggle="collapse" href="#pasien_adm">
									<i class="fas fa-procedures"></i>								
									<p>Data Farmasi</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="pasien_adm">
									<ul class="nav nav-collapse">
										<li>
											<a href="<?php echo site_url('satuan_obat')?>">
												<span class="sub-item">Data Obat</span>
											</a>
										</li> 

										<li>
											<a href="<?php echo site_url('satuan_obat/history')?>">
												<span class="sub-item">History Obat</span>
											</a>
										</li> 

										<li>
											<a href="<?php echo site_url('pembayaran/tampilan_data_farmasi')?>">
												<span class="sub-item">List Pemberian Obat</span>
											</a>
										</li>   

										<li>
											<a href="<?php echo site_url('ranap/obat_observasi')?>">
												<span class="sub-item">List Pemberian Obat Observasi Ranap</span>
											</a>
										</li>
										
									</ul>


								</div>


							</li> 


							
							<li class="nav-item">
								<a data-toggle="collapse" href="#pem_obat"> 
									<i class="fas fa-capsules"></i>								
									<p>Pembelian Obat</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="pem_obat">
									<ul class="nav nav-collapse">


										<li>
											<a href="<?php echo site_url('pembelian_obat') ?>">
												<span class="sub-item">Pembelian Obat</span>
											</a>
										</li>  

									</ul>


								</div>


							</li> 




						</ul>
					<?php endif ?>

					<?php if ($this->session->level=="dokter"): ?>
						<ul class="nav nav-success">
							<li class="nav-item active">
								<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>

									<!-- <span class="caret"></span> -->
								</a>

							</li> 



							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Panel Tindakan Medis</h4>
							</li> 

							<li class="nav-item">
								<a data-toggle="collapse" href="#tindakanmedis">
									<i class="fas fa-procedures"></i>								
									<p>Rekam Medik</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="tindakanmedis">
									<ul class="nav nav-collapse">
										<li>
											<a href="<?php echo site_url('rekam')?>">
												<span class="sub-item">Rekam Medik Umum</span>
											</a>
										</li> 

										<li>
											<a href="<?php echo site_url('rekam_kb')?>">
												<span class="sub-item">Rekam Medik KB</span>
											</a>

										</li>   

										<li>
											<a href="<?php echo site_url('anc')?>" >
												<span class="sub-item">Rekam Medik ANC</span>
											</a>
										</li> 
										<li>
											<a href="<?php echo site_url('inc')?>" >
												<span class="sub-item">Rekam Medik INC</span>
											</a>
										</li> 
										<li>
											<a href="<?php echo site_url('bbl') ?>">
												<span class="sub-item">Rekam Medik BBL</span>
											</a>
										</li>  

										<li>
											<a href="<?php echo site_url('nifas') ?>">
												<span class="sub-item">Rekam Medik NIFAS</span>
											</a>
										</li>  

										<li>
											<a href="<?php echo site_url('imunisasi') ?>" >
												<span class="sub-item">Rekam Medik IMUNISASI</span>
											</a>
										</li> 

										<li>
											<a href="<?php echo site_url('homecare') ?>" >
												<span class="sub-item">Rekam HOME CARE</span>
											</a>
										</li>

										<li>
											<a href="<?php echo site_url('ranap') ?>" >
												<span class="sub-item">Pemeriksaan Rawat Inap</span>
											</a>
										</li>

									</ul> 
								</div> 
							</li>  

							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Panel LAB</h4>
							</li> 

							<li class="nav-item">
								<a data-toggle="collapse" href="#tindakanlab">
									<!-- <i class="fas fa-procedures"></i>								 -->
									<i class="fas fa-flask"></i>
									<p>Rekam LAB</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="tindakanlab">
									<ul class="nav nav-collapse">
										<li>
											<a href="<?php echo site_url('laboratorium/list_lab')?>">
												<span class="sub-item">Pemeriksaan Laboratorium</span>
											</a>
										</li>  


									</ul> 
								</div> 
							</li> 

							<li class="nav-item bg-transparent  text-light">
								<a  href="<?php echo base_url('absensi/tambah') ?>" class="btn-success btn text-light" aria-expanded="false">
									<i class="fas fa-user-check text-light"></i>
									<p class="text-light fw-bold">Absensi</p>
								</a>

							</li> 
						</ul>

					<?php endif ?>

					<?php if ($this->session->level=="bidan"): ?>
						<ul class="nav nav-success">
							<li class="nav-item active">
								<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>

									<!-- <span class="caret"></span> -->
								</a>

							</li> 



							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Panel Tindakan Medis</h4>
							</li> 

							<li class="nav-item">
								<a data-toggle="collapse" href="#tindakanmedis">
									<i class="fas fa-procedures"></i>								
									<p>Rekam Medik</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="tindakanmedis">
									<ul class="nav nav-collapse"> 

										<li>
											<a href="<?php echo site_url('rekam_kb')?>">
												<span class="sub-item">Rekam Medik KB</span>
											</a>
										</li>   

										<li>
											<a href="<?php echo site_url('anc')?>" >
												<span class="sub-item">Rekam Medik ANC</span>
											</a>
										</li> 
										<li>
											<a href="<?php echo site_url('inc')?>" >
												<span class="sub-item">Rekam Medik INC</span>
											</a>
										</li> 
										<li>
											<a href="<?php echo site_url('bbl') ?>">
												<span class="sub-item">Rekam Medik BBL</span>
											</a>
										</li>  

										<li>
											<a href="<?php echo site_url('nifas') ?>">
												<span class="sub-item">Rekam Medik NIFAS</span>
											</a>
										</li>  

										<li>
											<a href="<?php echo site_url('imunisasi') ?>" >
												<span class="sub-item">Rekam Medik IMUNISASI</span>
											</a>
										</li> 

									</ul> 
								</div> 
							</li> 

							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Panel LAB</h4>
							</li> 

							<li class="nav-item">
								<a data-toggle="collapse" href="#tindakanlab"> 
									<i class="fas fa-flask"></i>								
									<p>Rekam LAB</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="tindakanlab">
									<ul class="nav nav-collapse">
										<li>
											<a href="<?php echo site_url('laboratorium/list_lab')?>">
												<span class="sub-item">Pemeriksaan Laboratorium</span>
											</a>
										</li>  


									</ul> 
								</div> 
							</li> 

							

						</ul>

					<?php endif ?>





					<?php if ($this->session->level=="admin"): ?>
						<ul class="nav nav-success">
							<li class="nav-item active">
								<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
									<i class="fas fa-home"></i>
									<p>Dashboard</p>

									<!-- <span class="caret"></span> -->
								</a>

							</li>  

							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section">Admin Panel</h4>
							</li> 

							<li class="nav-item">
								<a data-toggle="collapse" href="#pasien_adm">
									<i class="fas fa-procedures"></i>								
									<p>Admin Pasien</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="pasien_adm">
									<ul class="nav nav-collapse">
										<li>
											<a href="<?php echo site_url('pasien') ?>">
												<span class="sub-item">Data Pasien</span>
											</a>
										</li>  

										<li>
											<a href="<?php echo site_url('laporan_kebidanan')?>">
												<span class="sub-item">Laporan Kebidanan</span>
											</a>

										</li>  

										<li>
											<a href="<?php echo site_url('surat') ?>">
												<span class="sub-item">Surat Sakit & Sehat</span>
											</a>
										</li> 

									</ul>

									

								</div>

								



								</li> 

									<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel Rujukan</h4>
						</li> 

						<li class="nav-item">
							<a data-toggle="collapse" href="#menurujukan">
							<i class="fas fa-exchange-alt mr-2"></i>
								<p>Rujukan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="menurujukan">
								<ul class="nav nav-collapse"> 
									<li>
										<a href="<?php echo base_url('rujukan') ?>">
											<span class="sub-item">List Rujukan</span>
										</a>
									</li>  


								</ul>


							</div>

<li class="nav-item bg-danger  text-light" style="border-radius: 5px;margin:15px;">
									<button type="button" class="btn btn-danger" id="panggil_antrian" href="#" aria-expanded="false">
										<i class="fas fa-microphone text-light mr-2"></i>Panggil Antrian</button>

									</li>
						</li>  



							</ul>
						<?php endif ?>

						<?php if ($this->session->level=="laboratorium"): ?>
							<ul class="nav nav-success">
								<li class="nav-item active">
									<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
										<i class="fas fa-home"></i>
										<p>Dashboard</p>

										<!-- <span class="caret"></span> -->
									</a>

								</li>  

								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
									<h4 class="text-section">Panel LAB</h4>
								</li> 

								<li class="nav-item">
									<a data-toggle="collapse" href="#tindakanlab"> 
										<i class="fas fa-flask"></i>							
										<p>Rekam LAB</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="tindakanlab">
										<ul class="nav nav-collapse">
											<li>
												<a href="<?php echo site_url('laboratorium')?>">
													<span class="sub-item">Pemeriksaan Laboratorium</span>
												</a>
											</li> 

											<li>
												<a href="<?php echo site_url('rapid')?>">
													<span class="sub-item">Pemeriksaan Rapid Test</span>
												</a>
											</li> 

											<li>
												<a href="<?php echo site_url('swab')?>">
													<span class="sub-item">Pemeriksaan Swab Antigen</span>
												</a>
											</li>   
										</ul> 
									</div> 
								</li> 



							</ul>
						<?php endif ?>

						<?php if ($this->session->level=="kasir"): ?>
							<ul class="nav nav-success">
								<li class="nav-item active">
									<a data="collapse" href="<?php echo site_url('dashboard'); ?>" class="collapsed" aria-expanded="false">
										<i class="fas fa-home"></i>
										<p>Dashboard</p>

										<!-- <span class="caret"></span> -->
									</a>

								</li>  

								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
									<h4 class="text-section">Admin Pembayaran</h4>
								</li> 

								<li class="nav-item">
									<a data-toggle="collapse" href="#pasien_adm">
										<i class="fas fa-money-check-alt"></i>							
										<p>Admin Pembayaran</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="pasien_adm">
										<ul class="nav nav-collapse">
											<li>
												<a href="<?php echo site_url('pembayaran/transaksi_keluar') ?>">
													<span class="sub-item">Kas Keluar</span>
												</a>
											</li> 
											<li>
												<a href="<?php echo site_url('pembayaran') ?>">
													<span class="sub-item">Pembayaran Pasien</span>
												</a>
											</li> 
											<li>
												<a href="<?php echo site_url('pasien/pembayaran_tagihan') ?>">
													<span class="sub-item">Pembayaran Tagihan</span>
												</a>
											</li> 
											<li>
												<a href="<?php echo site_url('pasien/tagihan') ?>">
													<span class="sub-item">Tagihan Pasien</span>
												</a>
											</li> 


											<li>
												<a href="<?php echo site_url('surat') ?>">
													<span class="sub-item">Pembayaran Surat Sakit & Sehat</span>
												</a>
											</li> 

											<li>
												<a href="<?php echo site_url('skl') ?>">
													<span class="sub-item">Surat Keterangan Lahiran</span>
												</a>
											</li> 


										</ul>


									</div>


								</li> 



								<li class="nav-item">
									<a data-toggle="collapse" href="#pem_obat">
										<!-- <i class="fas fa-procedures"></i>	 -->
										<i class="fas fa-capsules"></i>							
										<p>Pembelian Obat</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="pem_obat">
										<ul class="nav nav-collapse">


											<li>
												<a href="<?php echo site_url('pembelian_obat') ?>">
													<span class="sub-item">Pembelian Obat</span>
												</a>
											</li>  

										</ul>


									</div>


								</li>

								<li class="nav-item bg-danger  text-light" style="border-radius: 5px;margin:15px;">
									<button type="button" class="btn btn-danger" id="panggil_antrian" href="#" aria-expanded="false">
										<i class="fas fa-microphone text-light mr-2"></i>Panggil Antrian	</button>

									</li>



								</ul>
							<?php endif ?>




							<div class="modal fade" id="ModalLaporanRekam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position:fixed; top: 10%; z-index: 9999999">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i> LAPORAN REKAM MEDIK PASIEN</h3>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

										</div>
										<form class="form-horizontal">
											<div class="modal-body">

												<div class="row"> 
													<div class="col-md-12 cheklist" >

														<div class="checkbox">
															<label style="margin:5px" ><input type="checkbox" id="bytanggalrekam" value="" style="margin:5px">By Tanggal</label>
															<label style="margin:5px" ><input type="checkbox" id="bytahunrekam" value="" style="margin:5px">By Tahun</label>

														</div>

													</div> 

													<div class="col-md-12 pasienrekam mt-3" style="display:none"> 
														<div class="input-group mb-3"> 
															<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Pilih Pasien</span>
															<select class="form-control"  id="pasien_rekam">
															</select>
														</div> 
													</div> 

													<div class="col-md-12 tglrekam" style="display:none"> 
														<div class="input-group mb-3"> 
															<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tanggal Awal</span>
															<input type="date" class="form-control"  id="tanggal_awal_rekam" > 
														</div> 
													</div>  

													<div class="col-md-12 tglrekam" style="display:none"> 
														<div class="input-group mb-3"> 
															<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tanggal Akhir</span>
															<input type="date" class="form-control"  id="tanggal_akhir_rekam" >

														</div> 
													</div> 

													<div class="col-md-12 tahunrekam " style="display:none">

														<div class="input-group mb-3"> 
															<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Tahun</span>
															<input type="text" class="form-control"  id="tahun_rekam" >

														</div> 
													</div>  

													<div class="col-md-12 nama" style="display:none"> 
														<div class="input-group mb-3"> 
															<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Nama</span>
															<select class="form-control" id="nama_pasien" name="nama_pasien" >
																<option disabled="disabled" selected value="0"  style="background: #d3d4d6;" >----</option>	
																<?php foreach ($pasien as $row) : ?> 
																	<option value="<?php echo $row->kode_pasien  ?>"><?php echo $row->nama_pasien ?></option>  
																<?php endforeach ?>  
															</select> 
														</div> 
													</div>  
												</div> 

											</div>
											<div class="modal-footer">
												<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
												<button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporanrekam"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
											</div>


										</form>
									</div>
								</div>
							</div>




						</div>
					</div>
				</div>

				<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
				<style type="text/css">

					.modal-backdrop{
						display: none;
					}

					.labelkolom{
						background: #03b509;
						color :white;
					}
					.isikolom{
						border-color: #03b509;
						background: #ffffff;
					}
					.signature-pad {
						border: 1px solid #03b509;
						border-radius: 3%
					}



					#hapus_sign{
						position: absolute;
						top:80%;
						left:20%;
					}



					.disnon{
						display: none;
					}

				</style>

				<!-- Modal -->
				<div class="modal fade" id="Modal_ttd" tabindex="-1" role="dialog" aria-labelledby="Modal_ttdTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Update  Tanda Tangan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="mb-3 col-md-3" id="ttd" style="position: relative"> 
										<span class="input-group-text" style="background: #03b509;color :white; width:350%;"> <i class="far fa-list-alt mr-1"></i> Update Tanda Tangan User</span>
										<canvas id="signature-pad_ttd" name="signature-pad_ttd" class="signature-pad"  style="width:350%;"></canvas>
										<input type="hidden" name="isi_ttd" id="isi_ttd" >
										<button type="button" class="btn btn-lg  btn-danger btn-flat" id="hapus_sign"><i class="fas fa-eraser"></i></button>
									</div> 
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary btn_simpan_ttd">Simpan TTD</button>
							</div>
						</div>
					</div>
				</div>




				<div class="modal fade" id="ModalLaporanKeuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="judul_laporan" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN KEUANGAN</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

							</div>
							<form class="form-horizontal">
								<div class="modal-body">

									<div class="row"> 

										<div class="col-md-12">

											<div class="input-group mb-3"> 
												<span class="input-group-text" id="basic-addon3" style="background:#097802; color: white; ">Tanggal Awal</span>
												<input type="date" class="form-control"  id="tanggal_awal_keuangan" >

											</div> 
										</div> 



										<div class="col-md-12 " >

											<div class="input-group mb-3"> 
												<span class="input-group-text" id="basic-addon3" style="background:#097802; color: white; ">Tanggal Akhir</span>
												<input type="date" class="form-control"  id="tanggal_akhir_keuangan" >

											</div> 
										</div> 

									</div> 
									<div class="modal-footer">
										<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
										<button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporan_keuangan"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div> 

				<div class="modal fade" id="ModalTarikObat"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="judul_laporan_obat" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN PENJUALAN OBAT</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

							</div>
							<form class="form-horizontal">
								<div class="modal-body">

									<div class="row"> 

										<div class="col-md-12">

											<div class="input-group mb-3"> 
												<span class="input-group-text" id="basic-addon3" style="background:#097802; color: white; ">Tanggal Awal</span>
												<input type="date" class="form-control"  id="tanggal_awal_obat" >

											</div> 
										</div> 



										<div class="col-md-12 " >

											<div class="input-group mb-3"> 
												<span class="input-group-text" id="basic-addon3" style="background:#097802; color: white; ">Tanggal Akhir</span>
												<input type="date" class="form-control"  id="tanggal_akhir_obat" >

											</div> 
										</div> 



									</div> 
									<div class="modal-footer">
										<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
										<button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporan_obat"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
									</div>


								</div>



							</form>
						</div>
					</div>
				</div> 

				<div class="modal fade" id="ModalTarikDokter"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="judul_laporan_obat" style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i>TARIK LAPORAN PEMERIKSAAN DOKTER</h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

							</div>
							<form class="form-horizontal">
								<div class="modal-body">

									<div class="row"> 

										<div class="col-md-12">

											<div class="input-group mb-3"> 
												<span class="input-group-text" id="basic-addon3" style="background:#097802; color: white; ">Tanggal Awal</span>
												<input type="date" class="form-control"  id="tanggal_awal_dokter" >

											</div> 
										</div> 
										<div class="col-md-12 " >
											<div class="input-group mb-3"> 
												<span class="input-group-text" id="basic-addon3" style="background:#097802; color: white; ">Tanggal Akhir</span>
												<input type="date" class="form-control"  id="tanggal_akhir_dokter" >

											</div> 
										</div> 



									</div> 
									<div class="modal-footer">
										<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
										<button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporan_dokter"><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
									</div>


								</div>



							</form>
						</div>
					</div>
				</div> 

				<div class="modal fade" id="ModalLaporanAbsensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title"  style=" font: sans-serif; "><i class="fas fa-receipt mr-2"></i><span id="judul_laporan">TARIK LAPORAN ABSENSI</span></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>

				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="row"> 
						
						

							<div class="col-md-12 nama mb-3">

							
									<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Nama Pegawai</span>
									<select class="form-control" id="nama_karyawan" name="nama_karyawan" style="width: 100%">
										<option disabled="disabled" selected value="0"  style="background: #d3d4d6;" >--Pilih Teknisi--</option>	
										<?php foreach ($teknisi as $row) { ?>
											
												<option value="<?php echo $row->id_user ?>"><?php echo $row->nama_lengkap ?></option>	
										
										<?php } ?> 


									</select>

							</div> 
							
							<div class="col-md-12 bulan mb-3">

							
									<span class="input-group-text" id="basic-addon3" style="background:#1572e8; color: white; ">Bulan</span>
									<input class="form-control" type="month" id="bulan_laporan" name="bulan_laporan">
							</div> 

						</div> 

					</div>
					<div class="modal-footer">
						<button type="button"  class="btn btn-danger btn-flat" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
						<button  type="button" class="btn btn-success btn-flat" id="btn_tarik_laporan" data-laporan=""><i class="fas fa-receipt mr-2"></i>Tarik Laporan</button>
					</div>


				</form>
			</div>
		</div>
	</div>


				<script type="text/javascript">

					var signaturePad_ttd = new SignaturePad(document.getElementById('signature-pad_ttd'), {
						backgroundColor: 'rgba(255, 255, 255, 0)',
						penColor: 'rgb(0, 0, 0)'
					});

					$('#hapus_sign').on('click',function(){
						signaturePad_ttd.clear();
					});
					$('.btn_simpan_ttd').on('click',function(){
						let ttd = {};
						ttd.img = signaturePad_ttd.toDataURL( "image/png" );
						ttd.data = { 'image' : ttd.img };
						$.ajax({
							url: "<?php echo base_url() ?>user/simpan_ttd",
							data: ttd.data,
							type: 'post',
							success: function(result) {
								alert(result);
								location.reload();
							}
						});
					});



					$('#panggil_antrian').on('click',function(){
						$.ajax({
							type  : 'GET',
							url   : '<?php echo base_url()?>antrian/tunggu_antrian',
							dataType : 'json',
							success : function(data){
								$('#ModalAntrian').modal('show');
								let antrian_terakhir;
								let antrian = parseFloat(data)+1;
								if (antrian<=0) {
									antrian_terakhir ="000";
								}
								else if (antrian <10) {
									antrian_terakhir ="00"+antrian;
								}else if (antrian <100) {
									antrian_terakhir ="0"+antrian;
								}else{
									antrian_terakhir =antrian;
								}
								$('#antrian_sekarang').html(data);
								$('#antrian_berikutnya').html(antrian_terakhir);


							}

						});
					});


					$('.btn_laporan_absensi').on('click',function(){
		    let laporan = $(this).data('laporan');
		    $.ajax({
				type : "GET",
				url  : "<?php echo base_url('user/get_karyawan')?>",
				dataType : "JSON",
				success: function(data){
				    $('#judul_laporan').html('TARIK LAPORAN ABSENSI');
				    $('#ModalLaporanAbsensi').modal('show');
				    let list_karyawan ='<option value="0" disabled selected>Pilih Karyawan</option>';
				    for(i=0;i<data.length;i++){
				        list_karyawan+='<option value="'+data[i].kode+'">'+data[i].nama_admin+'</option>';
				    }
				    $('#nama_karyawan').html(list_karyawan);
				    $('#btn_tarik_laporan').data('laporan',laporan);
				    
				}
		    });
		});

			$('#btn_tarik_laporan').on('click',function(){
				let laporan = $(this).data('laporan');
				 let nama_karyawan = $('#nama_karyawan').val();
                if  (nama_karyawan ==null){
                    $('#nama_karyawan').focus();

                 Swal.fire({
                   title:'Teknisi Kosong',
                   text:'Silahkan Pilih Nama Teknisi!',
                    icon:'error'
                 }).then((result) => {
                    if (result.isConfirmed) {
                  Swal.close();
                      }
                      });
                     return false;
                }
                
                let bulan = $('#bulan_laporan').val();
                  if  (bulan ==''){
                    $('#bulan_laporan').focus();

                 Swal.fire({
                   title:'Bulan Kosong',
                   text:'Silahkan Pilih Bulan!',
                    icon:'error'
                 }).then((result) => {
                    if (result.isConfirmed) {
                  Swal.close();
                      }
                      });
                     return false;
                }
                
                
               
				window.location.href="<?php echo base_url()?>absensi/laporan_absensi/"+nama_karyawan+"/"+bulan;

			});

					$('#btn_tarik_laporan_keuangan').on('click',function(){
						let tanggal_awal = $('#tanggal_awal_keuangan').val();
						if (tanggal_awal=='') {
							alert('Silahkan Masukkan Tanggal Awal!');
							$('#tanggal_awal_keuangan').focus();
							return false;
						}

						let tanggal_akhir = $('#tanggal_akhir_keuangan').val();
						if (tanggal_akhir=='') {
							alert('Silahkan Masukkan Tanggal Akhir!');
							$('#tanggal_akhir_keuangan').focus();
							return false;
						}
						if (tanggal_awal > tanggal_akhir) {
							alert('Tanggal Awal Tidak Boleh Lebih Besar dari Tanggal Akhir!');
							$('#tanggal_akhir_keuangan').focus();
							return false;
						}

						window.location.href="<?php echo base_url()?>pembayaran/laporan_keuangan/"+tanggal_awal+"/"+tanggal_akhir;



					});
					$('#btn_tarik_laporan_dokter').on('click',function(){
						let tanggal_awal = $('#tanggal_awal_dokter').val();
						if (tanggal_awal=='') {
							alert('Silahkan Masukkan Tanggal Awal!');
							$('#tanggal_awal_dokter').focus();
							return false;
						}

						let tanggal_akhir = $('#tanggal_akhir_dokter').val();
						if (tanggal_akhir=='') {
							alert('Silahkan Masukkan Tanggal Akhir!');
							$('#tanggal_akhir_dokter').focus();
							return false;
						}
						if (tanggal_awal > tanggal_akhir) {
							alert('Tanggal Awal Tidak Boleh Lebih Besar dari Tanggal Akhir!');
							$('#tanggal_akhir_dokter').focus();
							return false;
						}

						window.location.href="<?php echo base_url()?>pembayaran/laporan_dokter/"+tanggal_awal+"/"+tanggal_akhir;



					});


					$('#btn_tarik_laporan_obat').on('click',function(){
						let tanggal_awal = $('#tanggal_awal_obat').val();
						if (tanggal_awal=='') {
							alert('Silahkan Masukkan Tanggal Awal!');
							$('#tanggal_awal_obat').focus();
							return false;
						}

						let tanggal_akhir = $('#tanggal_akhir_obat').val();
						if (tanggal_akhir=='') {
							alert('Silahkan Masukkan Tanggal Akhir!');
							$('#tanggal_akhir_obat').focus();
							return false;
						}
						if (tanggal_awal > tanggal_akhir) {
							alert('Tanggal Awal Tidak Boleh Lebih Besar dari Tanggal Akhir!');
							$('#tanggal_akhir_obat').focus();
							return false;
						}

						window.location.href="<?php echo base_url()?>pembayaran/laporan_obat/"+tanggal_awal+"/"+tanggal_akhir;



					});



					$('#tarik_laporan_obat').on('click',function(){
						$('#ModalTarikObat').modal('show');
					});
					$('#tarik_laporan_dokter').on('click',function(){
						$('#ModalTarikDokter').modal('show');
					});


					function nomorantrian(){
						$('#pemutar').attr('src','<?php echo base_url();?>assets/audio/antrian.wav');
						let pemutar = document.getElementById('pemutar');
						pemutar.play()
					}

					function panggilantrian(type){
						if (type=="next") {

							let antrian = $('#antrian_berikutnya').html();
							$.ajax({
								type  : 'POST',
								url   : '<?php echo base_url()?>antrian/update_antrian',
								dataType : 'json',
								data:{'nomor_antrian':antrian},
								success : function(data){
									if (data > 0) {
										$('#pemutar').attr('src','<?php echo base_url();?>assets/audio/antrian.wav');
										$('#pemutar').attr('subject',type);
										$('#pemutar').attr('hitungan','awal');

										let pemutar = document.getElementById('pemutar');
										pemutar.play();
									}else{
										$('#ModalAntrian').modal('hide');
										Swal.fire({
											title:'No. Antrian Belum Ada / Terhapus',
											text:'Silahkan Refresh Halaman Untuk Memastikan!',
											icon:'error'
										}).then((result) => {
											if (result.isConfirmed) {
												Swal.close();
												$('#ModalAntrian').modal('show');

											}
										});
										return false;
									}
								}

							});

						}

						else{
							$('#pemutar').attr('src','<?php echo base_url();?>assets/audio/antrian.wav');
							$('#pemutar').attr('subject',type);
							$('#pemutar').attr('hitungan','awal');
							let pemutar = document.getElementById('pemutar');
							pemutar.play();
						}

					}



					$('#pemutar').on('ended',function(){

						let subject = $(this).attr('subject');

						if (subject=="next") {

						// dari antrian
						if ($(this).attr('hitungan')=="awal") {

							// copy antrian sebelumnya 
							let antrian = $('#antrian_berikutnya').html();
							$('#antrian_sekarang').html(antrian);

							let antrian_sebelumnya  =parseFloat($('#antrian_berikutnya').html());
							let antrian_berikutnya = antrian_sebelumnya+1;
							// PASANG SETTING ANTRIAN TERBARU 
							let antrian_terakhir;
							if (antrian_berikutnya <= 0) {
								antrian_terakhir ="000";
							}
							else if (antrian_berikutnya <10) {
								antrian_terakhir ="00"+antrian_berikutnya;
							}else if (antrian_berikutnya <100) {
								antrian_terakhir ="0"+antrian_berikutnya;
							}else{
								antrian_terakhir =antrian_berikutnya;
							}

							
							// KELIPATAN 10

							if (antrian_sebelumnya <=20 || antrian_sebelumnya ==30 || antrian_sebelumnya ==40 || antrian_sebelumnya ==50 || antrian_sebelumnya ==60 || antrian_sebelumnya ==70 || antrian_sebelumnya ==80 || antrian_sebelumnya ==90 || antrian_sebelumnya ==100) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya)+'.wav';
								$('#pemutar').attr('src',audio);
								$('#pemutar').attr('hitungan','');
								let pemutar = document.getElementById('pemutar');
								pemutar.play();
							}




							// DUA DIGIT
							else if (antrian_sebelumnya.toString().length == 2) {

								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'0.wav';
								$('#pemutar').attr('data','');
								$('#pemutar').attr('hitungan','');
								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}

							else if (antrian_sebelumnya.toString().length == 3) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'00.wav';
								$('#pemutar').attr('data','');

								$('#pemutar').attr('hitungan','lanjut');

								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]+antrian_sebelumnya.toString()[2]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}
							

							$('#antrian_berikutnya').html(antrian_terakhir);



						}


						else if ($(this).attr('hitungan')=="lanjut") {

							let antrian_sebelumnya  = $(this).attr('data');

							if (antrian_sebelumnya <=20 || antrian_sebelumnya ==30 || antrian_sebelumnya ==40 || antrian_sebelumnya ==50 || antrian_sebelumnya ==60 || antrian_sebelumnya ==70 || antrian_sebelumnya ==80 || antrian_sebelumnya ==90 || antrian_sebelumnya ==100) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya)+'.wav';
								$('#pemutar').attr('src',audio);
								$('#pemutar').attr('data','');
								$('#pemutar').attr('hitungan','');
								let pemutar = document.getElementById('pemutar');
								pemutar.play();
							}

							// DUA DIGIT
							else if (antrian_sebelumnya.toString().length == 2) {

								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'0.wav';
								$('#pemutar').attr('data','');
								$('#pemutar').attr('hitungan','');
								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}

							else if (antrian_sebelumnya.toString().length == 3) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'00.wav';
								$('#pemutar').attr('data','');
								
								$('#pemutar').attr('hitungan','lanjut');
								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]+antrian_sebelumnya.toString()[2]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}
							




						}

						else{

							let satuan = $(this).attr('data');
							$('#pemutar').attr('data','');
							if (satuan!="") {
								let audio = '<?php echo base_url();?>assets/audio/'+satuan+'.wav';
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();
							}
						}

					}











					// PANGGIL ULANG

					else{

						// dari antrian
						if ($(this).attr('hitungan')=="awal") {

							// NOMOR ANTRIAN
							let antrian_sebelumnya  =parseFloat($('#antrian_sekarang').html());
							
							// KELIPATAN 10

							if (antrian_sebelumnya <=20 || antrian_sebelumnya ==30 || antrian_sebelumnya ==40 || antrian_sebelumnya ==50 || antrian_sebelumnya ==60 || antrian_sebelumnya ==70 || antrian_sebelumnya ==80 || antrian_sebelumnya ==90 || antrian_sebelumnya ==100) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya)+'.wav';
								$('#pemutar').attr('src',audio);
								$('#pemutar').attr('hitungan','');
								let pemutar = document.getElementById('pemutar');
								pemutar.play();
							}

							// DUA DIGIT
							else if (antrian_sebelumnya.toString().length == 2) {

								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'0.wav';
								$('#pemutar').attr('data','');
								$('#pemutar').attr('hitungan','');
								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}

							else if (antrian_sebelumnya.toString().length == 3) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'00.wav';
								$('#pemutar').attr('data','');

								$('#pemutar').attr('hitungan','lanjut');

								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]+antrian_sebelumnya.toString()[2]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}
						}


						else if ($(this).attr('hitungan')=="lanjut") {

							let antrian_sebelumnya  = $(this).attr('data');

							if (antrian_sebelumnya <=20 || antrian_sebelumnya ==30 || antrian_sebelumnya ==40 || antrian_sebelumnya ==50 || antrian_sebelumnya ==60 || antrian_sebelumnya ==70 || antrian_sebelumnya ==80 || antrian_sebelumnya ==90 || antrian_sebelumnya ==100) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya)+'.wav';
								$('#pemutar').attr('src',audio);
								$('#pemutar').attr('data','');
								$('#pemutar').attr('hitungan','');
								let pemutar = document.getElementById('pemutar');
								pemutar.play();
							}

							// DUA DIGIT
							else if (antrian_sebelumnya.toString().length == 2) {

								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'0.wav';
								$('#pemutar').attr('data','');
								$('#pemutar').attr('hitungan','');
								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}

							else if (antrian_sebelumnya.toString().length == 3) {
								let audio = '<?php echo base_url();?>assets/audio/'+parseInt(antrian_sebelumnya).toString()[0]+'00.wav';
								$('#pemutar').attr('data','');
								
								$('#pemutar').attr('hitungan','lanjut');
								$('#pemutar').attr('data',antrian_sebelumnya.toString()[1]+antrian_sebelumnya.toString()[2]);
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();

							}

						}

						else{

							let satuan = $(this).attr('data');
							$('#pemutar').attr('data','');
							if (satuan!="") {
								let audio = '<?php echo base_url();?>assets/audio/'+satuan+'.wav';
								$('#pemutar').attr('src',audio);
								let pemutar = document.getElementById('pemutar');
								pemutar.play();
							}
						}

					}
				})

$('#btn_tarik_laporanrekam').on('click',function(){
	let pasien_rekam = $('#pasien_rekam').val();
	if (pasien_rekam==0) {
		alert('Silahkan Pilih Pasien!');
		return false;
	}

	let bytanggal=$('#bytanggalrekam').prop('checked');
	let bytahun=$('#bytahunrekam').prop('checked');
	if (bytanggal==true) {
		let tanggal_awal = $('#tanggal_awal_rekam').val();
		let tanggal_akhir = $('#tanggal_akhir_rekam').val();
		window.location.href='<?php echo base_url()?>rekam/rekam_bytanggal/'+pasien_rekam+'/'+tanggal_awal+'/'+tanggal_akhir;

	}


	if (bytahun==true) {
		let tahunrekam = $('#tahun_rekam').val();
		window.location.href='<?php echo base_url()?>rekam/rekam_bytahun/'+pasien_rekam+'/'+tahunrekam;
	}
	return false;
});


$('#btn_tarik_laporan_kkbptm').on('click',function(){


	let bulan_kkb = $('#bulan_kkbptm').val();
	window.location.href='<?php echo base_url()?>rekam/laporan_kkbptm/'+bulan_kkb;
	return false;
});



$('#tarik_laporan_kkbptm').on('click',function(){
	$('#ModalLaporanKKB').modal('show');
	$('#btn_tarik_laporan_kkbptm').attr('data','laporan_kpm');
	$('#labellaporan').html('<i class="fas fa-receipt mr-2"></i>LAPORAN KUNJUNGAN KASUS BARU');
});


function bukarekammedik(){
	$.ajax({
		type  : 'GET',
		url   : '<?php echo base_url()?>pasien/tampil_data_pasien',
		dataType : 'json',
		success : function(data){
			let html='<option value="0" selected>-- Pilih Pasien --</option>';
			for(i=0; i<data.length; i++){
				html+='<option value="'+data[i].kode_pasien+'">'+data[i].nama_pasien+'</option>';
			};
			$('#ModalLaporanRekam').modal('show');
			$('#pasien_rekam').html(html);
		}

	});
}
$("#tahun_rekam").datepicker({
	format: "yyyy",
	viewMode: "years", 
	minViewMode: "years"
});


$('#bytanggalrekam').click(function(){
	if (this.checked==true) {
		$('.tglrekam').css('display','block');
		$('.pasienrekam').css('display','block');

		$('.tahunrekam').css('display','none'); 

		$('#bytahunrekam').prop('checked',false); 
	}else{
		$('.tglrekam').css('display','none'); 
		$('.pasienrekam').css('display','none');

	}

})

$('#bytahunrekam').click(function(){
	if (this.checked==true) {
		$('.tglrekam').css('display','none');
		$('.tahunrekam').css('display','block');
		$('.pasienrekam').css('display','block');


		$('#bytanggalrekam').prop('checked',false);




	}else{
		$('.tahunrekam').css('display','none');
		$('.pasienrekam').css('display','none');

	}
}) 


</script>


