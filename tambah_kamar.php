<?php include "header.php"; ?>

<h3>Tambah data Kamar dan Pembina <?=$gen?></h3>
<form method="POST" action="">
	<table class="table table-responsive table-bordered">
		<tr>
			<td>Kamar</td>
			<td><input type="text" name="kamar" maxlength="40" class="form-control" /></td>
		</tr>
		<tr>
			<td>Pilih Ustadz / Pembina</td>
			<td>
				<select name="ustadz" class="form-control">
					<option value="" selected>- Pilih ustadz -</option>
					<?php
					$sqlustadz=mysqli_query($konek, "SELECT * FROM ustadz WHERE jk='$jk' ORDER BY idustadz ASC");
					while($g=mysqli_fetch_array($sqlustadz)){
						echo "<option value='$g[idustadz]'>$g[namaustadz]</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan" class="btn btn-primary" /></td>
		</tr>
	</table>	
</form>

<!-- untuk memproses form -->
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$kamar = $_POST['kamar'];
	$ustadz = $_POST['ustadz'];
	
	if($kamar=='' || $ustadz==''){
		echo "Form belum lengkap!!!";		
	}else{
		//simpan data
		$simpan = mysqli_query($konek, "INSERT INTO kamar(kamar,idustadz)
						VALUES ('$kamar','$ustadz')");
		if(!$simpan){
			echo "Simpan data gagal!!!";
		}else{
			header('location:tampil_kamar.php');
		}
	}
}
?>

<?php include "footer.php"; ?>