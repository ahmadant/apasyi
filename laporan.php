<?php include "header.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Syahriyah</title>
</head>
<body>
	<h3>Laporan Pembayaran Syahriyah</h3>
	<form action="" method="post" class="form-inline">
		<div class="input-group">
			<input type="text" name="kamar" id="kamar" placeholder="Nama Kamar" class="form-control" value="">
		</div>
		<div class="input-group" id="bulanan">
			<select name="bulan">
				<?php
					fo
				?>
			</select>
		</div>
		<div class="input-group" id="interval">
			<input type="date" name="bulan" id="bulan"  class="form-control"> - <input type="date" name="bulan" id="bulan"  class="form-control">
		</div>
			<button class="btn btn-primary"><i class="glyphicon glyphicon-send"></i></button>
			<a href="laporan.php">Semua</a>
	</form>
	<hr>
	<?php
	$kamar = $_POST['kamar'];
	if (isset($kamar)) {
		$sql = mysqli_query($konek,"SELECT syahriyah.nis,santri.namasantri,santri.kamar,syahriyah.jumlah,syahriyah.ket,syahriyah.bulan FROM syahriyah,santri,kamar WHERE syahriyah.nis=santri.nis AND santri.kamar=kamar.kamar AND syahriyah.ket='LUNAS' AND syahriyah.bulan='September 2018' AND kamar.kamar='$kamar' ORDER BY santri.kamar");	
	}else{
		$sql = mysqli_query($konek,"SELECT syahriyah.nis,santri.namasantri,santri.kamar,syahriyah.jumlah,syahriyah.ket,syahriyah.bulan FROM syahriyah,santri,kamar WHERE syahriyah.nis=santri.nis AND santri.kamar=kamar.kamar AND syahriyah.bulan='September 2018' AND syahriyah.ket='LUNAS' ORDER BY santri.kamar");
	}	
	?>
	<div class="row col-md-8">
		<table class="table table-bordered table-stripped">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Kamar</th>
					<th>Tagihan</th>
					<th>Bulan</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				while ($data=mysqli_fetch_array($sql)) {
					echo "<tr>
					<td>$no.</td>
					<td>$data[nis]</td>
					<td>$data[namasantri]</td>
					<td>$data[kamar]</td>
					<td>$data[jumlah]</td>
					<td>$data[bulan]</td>
					<td>$data[ket]</td>
				</tr>";
				$no++;
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
<?php include "footer.php"; ?>