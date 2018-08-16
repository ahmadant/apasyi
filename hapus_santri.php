<?php
session_start();
if(isset($_SESSION['login'])){
	include "config/koneksi.php";
	$hapus = mysqli_query($konek, "DELETE FROM santri WHERE nis='$_GET[id]'");
	if($hapus){
		header('location:tampil_santri.php');
	}else{
		echo "Hapus data gagal...,
			<a href='tampil_santri.php'><<< Kembali</a>";
	}
}else{
	echo "Anda tidak memiliki akses ke halaman ini!!!";
}
?>