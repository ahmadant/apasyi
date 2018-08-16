<?php
//variabel koneksi
$konek = mysqli_connect("localhost","sapa","melbu","dbkeuanganpesantren");

if(!$konek){
	echo "Koneksi Database Gagal...!!!";
}
?>