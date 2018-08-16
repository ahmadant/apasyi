<?php include "header.php"; ?>

<form method="post" action="" class="col-md-4">
<h3>Tambah Data ustadz <?=$gen?></h3>
	<table class="table table-responsive table-bordered">
		<tr>
			<td>Nama ustadz</td>
			<td><input type="text" name="namaustadz" class="form-control" /></td>
		</tr>
		<tr>
			<td>Bidang</td>
			<td><input type="text" name="bidang" class="form-control" /></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<div class="form-inline">
					<div class="form-group">
				<?php
				if ($jk == "L") {
					echo '<input type="radio" name="jk" class="form-control" value="L" checked>Laki-laki
						<input type="radio" name="jk" class="form-control" value="P">Perempuan';
				} else {
					echo '<input type="radio" name="jk" class="form-control" value="L">Laki-laki
						<input type="radio" name="jk" class="form-control" value="P" checked>Perempuan';
				}
				?>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan" class="btn btn-primary"/></td>
		</tr>
	</table>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$nama = mysqli_real_escape_string($konek, $_POST['namaustadz']);
	$bidang = mysqli_real_escape_string($konek, $_POST['bidang']);
	$jk = mysqli_real_escape_string($konek, $_POST['jk']);
	
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses simpan data ustadz
		$simpan = mysqli_query($konek, "INSERT INTO ustadz(namaustadz,bidang,jk) VALUES ('$nama','$bidang','$jk')");
		if(!$simpan){
			echo "Simpan data gagal!!";
		}else{
			echo "<script>
			window.location.href='tampil_ustadz.php';
			</script>";
		}
	}
}
?>

<?php include "footer.php"; ?>