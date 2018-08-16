<?php include "header.php"; ?>

<?php
$sqlEdit=mysqli_query($konek, "SELECT * FROM ustadz WHERE idustadz='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
?>
<form method="post" action="" class="col-md-6">
<h3>Edit Data ustadz <?=$gen?></h3>
	<input type="hidden" name="idustadz" value="<?php echo $e['idustadz']; ?>" />
	<table class="table table-responsive table-bordered">
		<tr>
			<td>Nama ustadz</td>
			<td><input type="text" name="namaustadz" class="form-control" value="<?php echo $e['namaustadz']; ?>"/></td>
		</tr>
		<tr>
			<td>Bidang</td>
			<td><input type="text" name="bidang" class="form-control" value="<?php echo $e['bidang']; ?>" /></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<div class="form-inline">
					<div class="form-group">
				<?php
				if ($e['jk'] == "L") {
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
			<td><input type="submit" value="Update"  class="btn btn-primary"/></td>
		</tr>
	</table>
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$id		= mysqli_real_escape_string($konek,$_POST['idustadz']);
	$nama 	= mysqli_real_escape_string($konek,$_POST['namaustadz']);
	$bidang = mysqli_real_escape_string($konek,$_POST['bidang']);
	$jk = mysqli_real_escape_string($konek, $_POST['jk']);
	
	if($nama==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses edit data ustadz
		$edit = mysqli_query($konek, "UPDATE ustadz SET namaustadz='$nama',bidang='$bidang',jk='$jk' WHERE idustadz='$id'");
		
		if(!$edit){
			echo "Edit data gagal!!";
		}else{
			header('location:tampil_ustadz.php');
		}
	}
}
?>

<?php include "footer.php"; ?>