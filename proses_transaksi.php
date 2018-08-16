<?php 
session_start();
if(isset($_SESSION['login'])){
	include "config/koneksi.php";
	if($_GET['act']=='bayar'){

		$idspp 	= $_GET['id'];
		$idsmt 	= $_GET['ids'];
		$nis	= $_GET['nis'];

		$today = date("ymd");
		//membuat nomor pembayaran syahriyah
		$query = mysqli_query($konek, "SELECT nis FROM syahriyah WHERE nobayar LIKE '%".$today."%'");
		$data = mysqli_fetch_array($query);
		$jml = mysqli_num_rows($query)+1;
		// membuat digit angka dibelakang tanggal
		if ($jml < 10) {
			$noBayar = $today."000".$jml;
		} else if($jml < 100 && $jml > 9) {
			$noBayar = $today."00".$jml;
		} else if($jml < 1000 && $jml > 99) {
			$noBayar = $today."0".$jml;
		} else {
			$noBayar = $today.$jml;
		}

		//membuat nomor pembayaran semester
		$query1 = mysqli_query($konek, "SELECT nis FROM semester WHERE nobayar LIKE '%".$today."%'");
		$data1 = mysqli_fetch_array($query);
		$jml1 = mysqli_num_rows($query)+1;
		$noBayar1 = $today.$jml1;
		// membuat digit angka dibelakang tanggal
		if ($jml1 < 10) {
			$noBayar1 = $today."000".$jml1;
		} else if($jml1 < 100 && $jml1 > 9) {
			$noBayar1 = $today."00".$jml1;
		} else if($jml1 < 1000 && $jml1 > 99) {
			$noBayar1 = $today."0".$jml1;
		} else {
			$noBayar1 = $today.$jml1;
		}

		//tanggal Bayar
		$tglBayar 	= date('Y-m-d');

		//id admin
		$admin = $_SESSION['id'];
		// update syahriyah
		$syahriyah = mysqli_query($konek, "UPDATE syahriyah SET nobayar='$noBayar',
											tglbayar='$tglBayar',
											ket='LUNAS',
											idadmin='$admin'
									WHERE idsyahriyah='$idspp'");
		// update semester
		$semester = mysqli_query($konek, "UPDATE semester SET nobayar='$noBayar1',
											tglbayar='$tglBayar',
											ket='LUNAS',
											idadmin='$admin'
									WHERE idsmt='$idsmt'");

		header('location:transaksi.php?nis='.$nis);
	}
}
?>