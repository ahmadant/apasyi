<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "config/koneksi.php";
include "library/tanggal.php";
$jk =$_SESSION['jk'];
if ($jk == 'L') {
	$gen = "Putra";
} else {
	$gen = "Putri";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pembayaran SPP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a href="index.php" class="navbar-brand"><i class="glyphicon glyphicon-grain"></i> APASI</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
          		<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="transaksi.php"><i class="glyphicon glyphicon-shopping-cart"></i> Transaksi</a>
					</li>	
					<li>
						<a href="tampil_ustadz.php">
						<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>
						Data Ustadz</a>
					</li>
					<li>
						<a href="tampil_kamar.php">
						<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>
						Data Kamar</a>
					</li>
					<li>
						<a href="tampil_santri.php">
						<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>
						Data Santri</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
						Laporan <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="laporan.php?sts=lns">
							<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
							Laporan Pembayaran</a></li>
							<li><a href="laporan.php?sts=tgk">
							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
							Laporan Tunggakan</a></li>
						</ul>
					</li>
					<li>
						<a href="config/logout.php"><i class="glyphicon glyphicon-log-out"></i> Keluar</a>
					</li>
				</ul>
			</div>
			</div><!-- /.container -->
	</nav>
	<div class="container-fluid">