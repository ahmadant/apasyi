<?php 
session_start();
if(isset($_SESSION['login'])){
	include "config/koneksi.php";
	if($_GET['act']=='batal'){
		$idspp = $_GET['id'];
		$idsmt = $_GET['ids'];
		$nis = $_GET['nis'];
		// batal syahriyah
		$syahriyah = mysqli_query($konek, "UPDATE syahriyah SET nobayar='',
											tglbayar='',
											ket='',
											idadmin=''
									WHERE idsyahriyah='$idspp'");

		// batal semester
		$semester = mysqli_query($konek, "UPDATE semester SET nobayar='$noBayar1',
											tglbayar='$tglBayar',
											ket='LUNAS',
											idadmin='$admin'
									WHERE idsmt='$idsmt'");

		header('location:transaksi.php?nis='.$nis);
	}
}	
?>	