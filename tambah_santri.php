<?php
include "header.php"; 

//membuat nis
$skrg = date('dmy');
$query = mysqli_query($konek,"SELECT nis FROM santri WHERE nis LIKE '%$skrg%'");
$banyak = mysqli_num_rows($query)+1;
if ($banyak < 10) {
	$nisBaru = $skrg."000".$banyak;
}else if ($banyak < 100) {
	$nisBaru = $skrg."00".$banyak;
}else if ($banyak < 1000) {
	$nisBaru = $skrg."0".$banyak;	
}


// membuat tahun ajaran
$thnajar1 = date('Y')-1;
$thnajar2 = date('Y');

//membuat tanggal jatuh tempo pertama sebulan setelah daftar
	$timestamp = strtotime(date('Y-m-d'));
	$jtp = date('Y-m-d',strtotime('+1 month',$timestamp));
?>

<h3>Tambah Data santri</h3>
<form method="post" action="">
	<table class="table table-responsive table-bordered">
		<tr>
			<td>NIS</td>
			<td><input type="text" name="nis" class="form-control" maxlength="10" value="<?=$nisBaru?>" readonly></td>
		</tr>
		<tr>
			<td>Nama santri</td>
			<td><input type="text" name="namasantri" class="form-control" maxlength="40"></td>
		</tr>
		<input type="hidden" name="jk" value="<?=$jk?>">
		<tr>
			<td>Kamar</td>
			<td>
				<select name="kamar" class="form-control" >
					<option value="" selected>- Pilih kamar -</option>
					<?php
					$sqlkamar = mysqli_query($konek, "select * from kamar,ustadz where kamar.idustadz=ustadz.idustadz and ustadz.jk = '$jk' order by kamar ASC");
					while($k=mysqli_fetch_array($sqlkamar)){
						?>
						<option value="<?php echo $k['kamar']; ?>"><?php echo $k['kamar']."-".$k['namaustadz']; ?></option>
						<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tahun Ajaran</td>
			<td><input type="text" name="tahunajaran" class="form-control" value="<?=$thnajar1."/".$thnajar2?>" readonly /></td>
		</tr>
		<tr>
			<td>Biaya Syahriyah</td>
			<td><input type="text" name="syahriyah" class="form-control" value="170000" readonly="" /></td>
		</tr>
		<tr>
			<td>Biaya Semester</td>
			<td><input type="text" name="semester" class="form-control" value="680000" readonly="" /></td>
		</tr>
		<tr>
			<td>Jatuh Tempo Pertama</td>
			<td><input type="date" name="jatuhtempo" value="<?=$jtp?>" class="form-control" readonly=""/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Simpan" class="btn btn-primary" /></td>
		</tr>
	</table>
</form>

<!-- simpan data -->
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//variabel untuk menampung inputan dari form
		$nis 	= $_POST['nis'];
		$nama 	= $_POST['namasantri'];
		$jk 	= $_POST['jk'];
		$kamar 	= $_POST['kamar'];
		$tahun 	= $_POST['tahunajaran'];
		$syah 	= $_POST['syahriyah'];
		$semes 	= $_POST['semester'];
		$awaltempo = $_POST['jatuhtempo'];


		//proses simpan
		if($nis=='' || $nama=='' || $kamar==''){
			echo "Form belum lengkap...";
		}else{
			$simpan = mysqli_query($konek, "insert into santri(nis,namasantri,jk,kamar,tahunajaran)
					values('$nis','$nama','$jk','$kamar','$tahun')");
			var_dump($simpan);
			if(!$simpan){
				echo "Penyimpanan data gagal..";
			}else{
				//ambil data id santri terakhir
				$ds=mysqli_fetch_array(mysqli_query($konek, "SELECT nis FROM santri WHERE nis='$nis'"));
				$idsantri = $ds['nis'];

				//membuat tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan di tabel spp
				for($i=0; $i<12; $i++){
					//membuat tanggal jatuh tempo nya setiap tanggal 10
					$jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

					$bulan = $bulanIndo[date('m', strtotime($jatuhtempo))]." ".date('Y',strtotime($jatuhtempo));

					mysqli_query($konek, "INSERT INTO syahriyah(nis,jatuhtempo,bulan,jumlah)
								values('$idsantri','$jatuhtempo','$bulan','$syah')");
				}
				var_dump($bulan);
				//membuat tagihan semesteran setiap 6 bulan dan menyimpan tagihan di tabel semester
				for($i=5; $i<12; $i+=6){
					//membuat tanggal jatuh tempo nya setiap tanggal
					$smt = date("Y-$i-1");

					$blnsmt = $bulanIndo[date('m', strtotime($smt))]." ".date('Y',strtotime($smt));

					mysqli_query($konek, "INSERT INTO semester(nis,jatuhtempo,bulan,jumlah)
								values('$idsantri','$smt','$blnsmt','$semes')");
				}

				header('location:tampil_santri.php');
			}
		}

	}
?>

<?php include "footer.php"; ?>