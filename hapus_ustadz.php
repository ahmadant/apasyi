<?php
session_start();
if(isset($_SESSION['login'])){
	include "config/koneksi.php";
	$hapus = mysqli_query($konek, "DELETE FROM ustadz WHERE idustadz='$_GET[id]'");
	
	if($hapus){
		header('location:tampil_ustadz.php');
	}else{
		echo "Hapus data gagal, data ustadz digunakan di tabel wali kelas<br>
			<a href='tampil_ustadz.php'><<< Kembali</a>";
	}
}else{
	echo "Anda tidak memiliki akses ke halaman ini!!!";
}
?>