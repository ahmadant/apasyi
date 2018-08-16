<?php
session_start();
if(isset($_SESSION['login'])){
	include "config/koneksi.php";
	$hapus=mysqli_query($konek, "DELETE FROM kamar WHERE kamar='$_GET[kls]'");
	
	if(!$hapus){
		echo "Hapus data gagal, atau data sedang digunakan di tabel lain...<br/>
		<a href='tampil_kamar.php'>Kembali</a>";	
	}else{
		header('location:tampil_kamar.php');
	}
}
?>