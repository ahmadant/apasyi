<?php 
include "header.php";
$sqlEdit = mysqli_query($konek, "SELECT * FROM santri WHERE nis='$_GET[id]'");
$e=mysqli_fetch_array($sqlEdit);
$thnajar1 = date('Y')-1;
$thnajar2 = date('Y');
//membuat tanggal jatuh tempo pertama 10
	$timestamp = strtotime(date('Y-m-d'));
	$jtp = date('Y-m-d',strtotime('+1 month',$timestamp));
//membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
?>

<h3>Edit Data santri <?=$gen?></h3>
<form method="post" action="">
	<table class="table table-responsive table-bordered">
		<tr>
			<td>NIS</td>
			<td><input type="text" name="nis" value="<?php echo $e['nis']; ?>" maxlength="10" readonly="" class="form-control"></td>
		</tr>
		<tr>
			<td>Nama santri</td>
			<td><input type="text" name="namasantri" value="<?php echo $e['namasantri']; ?>" maxlength="40" class="form-control"></td>
		</tr>
		<tr>
			<td>kamar</td>
			<td>
				<select name="kamar" class="form-control">
					<?php
					$sqlkamar = mysqli_query($konek, "SELECT * FROM kamar,ustadz WHERE kamar.idustadz=ustadz.idustadz AND ustadz.jk = '$jk' ORDER BY kamar ASC");
					while($k=mysqli_fetch_array($sqlkamar)){

						if($k['kamar'] == $e['kamar']){
							$selected = "selected";
						}else{
							$selected ="";
						}

						?>
						<option value="<?php echo $k['kamar']; ?>" <?php echo $selected; ?>><?php echo $k['kamar']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><input type="text" name="tahunajaran" value="<?php echo $e['tahunajaran']; ?>" class="form-control"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" class="btn btn-primary"/></td>
		</tr>
	</table>
</form>

<!-- proses edit data -->
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	//variabel untuk menampung inputan dari form
	$nis 	= $_POST['nis'];
	$nama 	= $_POST['namasantri'];
	$kamar 	= $_POST['kamar'];
	$tahun 	= $_POST['tahunajaran'];

	if($nis=='' || $nama =='' || $kamar==''){
		echo "Form Belum lengkap....";
	}else{
		$update = mysqli_query($konek, "UPDATE santri SET namasantri='$nama',
											kamar='$kamar',
											tahunajaran='$tahun'
										WHERE nis='$nis'");
		var_dump($update);
		if(!$update){
			echo "Update data gagal...";
		}else{
			header('location:tampil_santri.php');
		}
	}
}
?>

<?php include "footer.php" ?>