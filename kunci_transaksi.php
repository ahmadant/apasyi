<?php 
session_start();
if(isset($_SESSION['login'])){
	include "config/koneksi.php";
	$syahriyah = mysqli_query($konek, "UPDATE syahriyah SET status='1' WHERE nobayar !='' AND status=0");
	header("location:transaksi.php");
}
?>