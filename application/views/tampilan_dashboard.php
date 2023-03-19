<div class="main-panel mb-5">
	<div class="content">
		<div class="panel-header bg-success-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>

						<h2 class="text-white pb-2 fw-bold">Dashboard 2</h2>
						<h2 class="text-white op-7 mb-2">Selamat Datang <?php echo  $this->session->nama_admin; ?>

						</h2>

						<a href="<?php echo base_url() ?>pengawas/send_mail" style="display: none;">KIRIM</a>
					</div>

				</div>
			</div>
		</div>

		<div class="page-inner mt--5">
			<div class="row row-card-no-pd mt--2">
				<div class="col-sm-6 col-md-12">
					<div class="card card-stats card-round">
						<div class="card-body bg-success-gradient ">
							<div class="row">

								<marquee style="padding-top: 5px;color: white;font-size: 18px;">Pemeriksaaan Pasien <?php echo $this->session->nama_pt; ?> - <?php

																																								date_default_timezone_set('Asia/Jakarta');
																																								echo date('d-m-Y H:i:s'); ?></marquee>
							</div>
						</div>
					</div>
				</div>

			</div>


		</div>

		<?php if ($this->session->level == "superadmin") : ?>

			<div class="page-inner mt--5">

				<div class="row row-card-no-pd mt--2">
					<div class="col-sm-6 col-md-6">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="flaticon-users text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category"><?php echo $user;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_user; ?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-procedures text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats ">
										<div class="numbers">
											<p class="card-category"><?php echo $pasien;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_pasien; ?></h4>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>


			</div>


			<div class="page-inner mt--5">

				<div class="row row-card-no-pd mt--2">
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-md text-success"></i>

										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category"><?php echo $umum;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_umum; ?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-md text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats ">
										<div class="numbers">
											<p class="card-category"><?php echo $kb;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_kb; ?></h4>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-md text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category"><?php echo $anc;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_anc; ?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-md text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category"><?php echo $bbl ?></p>
											<h4 class="card-title"><?php echo $num_rows_bbl; ?></h4>

											<!-- <h4 class="card-title">45</h4> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>




			<div class="page-inner mt--5">

				<div class="row row-card-no-pd mt--2">
					<div class="col-sm-6 col-md-6">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-md text-success"></i>

										</div>
									</div>
									<div class="col-7 col-stats">
										<div class="numbers">
											<p class="card-category"><?php echo $nifas;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_nifas; ?></h4>

											<!-- <h4 class="card-title"><?php echo $num_rows_user; ?></h4> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-5">
										<div class="icon-big text-center">
											<i class="fas fa-user-md text-success"></i>
										</div>
									</div>
									<div class="col-7 col-stats ">
										<div class="numbers">
											<p class="card-category"><?php echo $imn;  ?></p>
											<h4 class="card-title"><?php echo $num_rows_imunisasi; ?></h4>

											<!-- <h4 class="card-title"><?php echo $num_rows_pasien; ?></h4> -->

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



				</div>

			<?php endif ?>
			<?php if ($this->session->level == "admin" || $this->session->level == "kasir" || $this->session->level == "dokter") : ?>
				<div class="page-inner mt--5">

					<div class="row row-card-no-pd mt--2">
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category"><?php echo $user;  ?></p>
												<h4 class="card-title"><?php echo $num_rows_user; ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-procedures text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats ">
											<div class="numbers">
												<p class="card-category"><?php echo $pasien;  ?></p>
												<h4 class="card-title"><?php echo $num_rows_pasien; ?></h4>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>


				</div>

			<?php endif ?>




			</div>



			<script type="text/javascript">
				// addEventListener('load', function(p) {
				//   var notify;
				//   p.preventDefault();
				//   // jika notifikasi di izinkan
				//   if(Notification.permission == 'granted'){
				//     notify = new Notification("Artikel Terbaru Kode Kuliahan",{
				//       // judul notifikasi
				//       body : "Tutorial Membuat Notifikasi Dekstop",
				//       // icon notifikasi
				//       icon : "img/logo.png"
				//     });
				//   }
				// });
			</script>