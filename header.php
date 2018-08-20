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
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/buttons.bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand"><i class="glyphicon glyphicon-grain"></i> Aplikasi Pembayaran Syahriyah</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="transaksi.php"><i class="glyphicon glyphicon-shopping-cart"></i> Transaksi</a>
				</li>	
				<li>
					<a href="tampil_ustadz.php">Data Ustadz</a>
				</li>
				<li>
					<a href="tampil_kamar.php">Data Kamar</a>
				</li>
				<li>
					<a href="tampil_santri.php">Data Santri</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="laporan.php?sts=lns">Laporan Pembayaran</a></li>
						<li><a href="laporan.php?sts=tgk">Laporan Tunggakan</a></li>
					</ul>
				</li>
				<li>
					<a href="config/logout.php">Keluar <i class="glyphicon glyphicon-off"></i></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid">