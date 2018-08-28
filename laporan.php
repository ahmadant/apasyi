<?php
include "header.php";
$status = $_GET['sts'];
		$awal = $_POST['awal'];
		$akhir = $_POST['akhir'];
		if ($status == 'tgk') {
			$msg = 'Tunggakan';
			if (isset($awal)) {
				$sql = mysqli_query($konek,"SELECT syahriyah.nis,santri.namasantri,santri.kamar,syahriyah.jumlah,syahriyah.ket,syahriyah.bulan,syahriyah.tglbayar 
				FROM syahriyah,santri,kamar WHERE syahriyah.nis=santri.nis AND santri.kamar=kamar.kamar AND santri.jk='$jk' AND syahriyah.ket='BELUM' AND (syahriyah.tglbayar BETWEEN '$awal' AND '$akhir') ORDER BY santri.kamar");
			} else {
				$sql = mysqli_query($konek,"SELECT syahriyah.nis,santri.namasantri,santri.kamar,syahriyah.jumlah,syahriyah.ket,syahriyah.bulan,syahriyah.tglbayar 
				FROM syahriyah,santri,kamar WHERE syahriyah.nis=santri.nis AND santri.kamar=kamar.kamar AND santri.jk='$jk' AND syahriyah.ket='BELUM' ORDER BY santri.kamar");
			}
		} else {
			$msg = 'Pembayaran';
			if (isset($awal)) {
				$sql = mysqli_query($konek,"SELECT syahriyah.nis,santri.namasantri,santri.kamar,syahriyah.jumlah,syahriyah.ket,syahriyah.bulan,syahriyah.tglbayar FROM syahriyah,santri,kamar WHERE syahriyah.nis=santri.nis AND santri.kamar=kamar.kamar AND santri.jk='$jk' AND syahriyah.ket='LUNAS' AND (syahriyah.tglbayar BETWEEN '$awal' AND '$akhir') ORDER BY santri.namasantri");
			} else {
				$sql = mysqli_query($konek,"SELECT syahriyah.nis,santri.namasantri,santri.kamar,syahriyah.jumlah,syahriyah.ket,syahriyah.bulan,syahriyah.tglbayar FROM syahriyah,santri,kamar WHERE syahriyah.nis=santri.nis AND santri.kamar=kamar.kamar AND santri.jk='$jk' AND syahriyah.ket='LUNAS' ORDER BY santri.namasantri");
			}
		} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Syahriyah</title>
</head>
<body>
	<h3>Laporan <?=$msg?> Syahriyah</h3>
	<form action="" name="filter"method="post" class="form-inline">
		
		<div class="input-group">
			<label for="input" class="">Antara : </label>
		</div>
		<div class="input-group" id="interval">
			<input type="date" name="awal" id="awal"  class="form-control">
		</div>
		<div class="input-group" id="interval">
			<input type="date" name="akhir" id="akhir"  class="form-control">
		</div>
			<button class="btn btn-primary"><i class="glyphicon glyphicon-send"></i></button>
	</form>
	<p></p>
		<table id="laporan" class="table table-striped table-responsive">
			<thead>
				<tr>
					<th>No.</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Kamar</th>
					<th>Bulan</th>
					<th>Tagihan</th>
					<th>Tgl.Bayar</th>
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
					<td>$data[bulan]</td>
					<td>$data[jumlah]</td>
					<td>$data[tglbayar]</td>
					<td>$data[ket]</td>
				</tr>";
				$no++;
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
				</tr>
			</tfoot>
		</table>
</body>
</html>
<?php include "footer.php"; ?>