<?php include "header.php"; ?>

<?php
$sqlEdit = mysqli_query($konek, "SELECT * FROM kamar WHERE kamar='$_GET[kls]'");
$e=mysqli_fetch_array($sqlEdit);
?>

<h3>Edit data kamar dan Pembina <?=$gen?></h3>
<form method="POST" action="">
	<table class="table table-responsive table-bordered">
		<tr>
			<td>kamar</td>
			<td><input type="text" name="kamar" value="<?php echo $e['kamar']; ?>" maxlength="40" readonly class="form-control"/></td>
		</tr>
		<tr>
			<td>Pilih ustadz / Pembina</td>
			<td>
				<select name="ustadz" class="form-control">
					<?php
					$sqlustadz=mysqli_query($konek, "SELECT * FROM ustadz WHERE jk='$jk' ORDER BY idustadz ASC");
					while($g=mysqli_fetch_array($sqlustadz)){
						if($g['idustadz'] == $e['idustadz']){
							$selected = "selected";
						}else{
							$selected = "";
						}
						
						echo "<option value='$g[idustadz]' $selected>$g[namaustadz]</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" class="btn btn-primary"/></td>
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
		//update data
		$update = mysqli_query($konek, "UPDATE kamar SET idustadz='$ustadz' WHERE kamar='$kamar'");
		
		if(!$update){
			echo "Update data gagal!!!";
		}else{
			header('location:tampil_kamar.php');
		}
	}
}
?>

<?php include "footer.php"; ?>