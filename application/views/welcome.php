<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<!-- Font Awesome -->
	<link rel="shortcut icon" href="<?= base_url('assets/images/logo.png') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/landing/css/style.css') ?>">

</head>

<body>

	<section class="content">
		<div class="container-fluid">
			<div class="login-logo">
				<!-- <h4 class="selamat">Selamat Datang</h4> -->
				<img src="<?= base_url('assets/images/logo.png') ?>" class="logos" alt="Kabupaten Situbondo">
				<h4 class="selamat">Sistem Informasi SKPD</h4>
			</div>
		</div>

		<div class="row justify-content-center" style="padding: 20px; margin-top:20px;">
			<div class=" col-lg-2 col-6">
				<!-- small card -->
				<!-- <div class="small-box bg-info">
					<div class="inner">
						<h5>Ajukan Surat</h5>
						<p>0</p>
					</div>
					<div class="icon">
						<i class="fas fa-envelope"></i>
					</div>
					<a href="<?= base_url('surat') ?>" class="small-box-footer">
						More info <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div> -->
			</div>
		</div>
		<?php if ($user != true) : ?>
			<div class="row justify-content-center" style="padding: 20px;">
				<div class="col-lg-2 col-6">
					<!-- small card -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h5>Masuk / Login</h5>
							<br><br>
						</div>
						<div class="icon">
							<i class="fas fa-sign-in-alt"></i>
						</div>
						<a href="<?= base_url('auth') ?>" class="small-box-footer">
							Login <i class="fas fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div class="row justify-content-center" style="padding: 20px;">
				<div class="col-lg-2 col-6">
					<!-- small card -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h5>Dashboard</h5>
							<br><br>
						</div>
						<div class="icon">
							<i class="far fa-circle nav-icon"></i>
						</div>
						<a href="<?= base_url('dashboard') ?>" class="small-box-footer">
							See more <i class="fas fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>


	</section>

</body>

</html>