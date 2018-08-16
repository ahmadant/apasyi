<?php include "header.php" ?>
<div class="row">
<!-- Pencarian santri berdasarkan nama -->
<div class=" col-md-4">
<form method="get" action="" class="form-inline">
<h4>Siapa yang mau bayar ?</h4>
	<div class="input-group">
				<input type="text" id="nama" name="nama" placeholder="Masukan Nama" class="form-control" value="" autofocus="" />
				<input type="hidden" id="nis" name="nis" value=""/>
		<span class="input-group-addon">
				<i class="glyphicon glyphicon-search"></i>
		</span>
	</div>
	<a href="kunci_transaksi.php">Kunci Transaksi</a>
</form>

<!-- Hasil Pencarian santri -->
<?php
if(isset($_GET['nis']) && $_GET['nis']!=''){
	$sqlsantri = mysqli_query($konek, "SELECT * FROM santri WHERE nis='$_GET[nis]'");
	$ds=mysqli_fetch_array($sqlsantri);
	$nis = $ds['nis'];
?>
<p></p>
<!-- Biodata singkat santri -->
<table class="table table-responsive table-bordered">
	<tr>
		<td>NIS</td>
		<td><?php echo $ds['nis']; ?></td>
	</tr>
	<tr>
		<td>Nama santri</td>
		<td><?php echo $ds['namasantri']; ?></td>
	</tr>
	<tr>
		<td>Kamar</td>
		<td><?php echo $ds['kamar']; ?></td>
	</tr>
	<tr>
		<td>Tahun Ajaran</td>
		<td><?php echo $ds['tahunajaran']; ?></td>
	</tr>
</table>
</div>

<!-- Tagihan Syahriyah -->
<div class="col-md-8">
<h4>Tagihan Syahriyah Santri</h4>
<table class="table table-responsive table-bordered" id="tagSyh">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	<?php
	$sql = mysqli_query($konek, "SELECT * FROM syahriyah WHERE nis='$ds[nis]' ORDER BY jatuhtempo ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>$d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&id=$d[idsyahriyah]' class='btn btn-success'><i class='glyphicon glyphicon-ok-sign'></i> Bayar</a>";
				}else if ($d['status']=='0' && $d['nobayar']!='') {
					echo "<a href='batal_transaksi.php?nis=$nis&act=batal&id=$d[idsyahriyah]' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i> Batal</a>";
				}else{
					echo "<a href='batal_transaksi.php?nis=$nis&act=batal&id=$d[idsyahriyah]' class='btn btn-danger disabled'><i class='glyphicon glyphicon-remove'></i> Batal</a>";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>
</div>

<!-- Tagihan Semester -->
<div class="col-md-push-4 col-md-8">
<h4>Tagihan Semester Santri</h4>
<table class="table table-responsive table-bordered" id="tagSmt">
	<tr>
		<th>No</th>
		<th>Bulan</th>
		<th>Jatuh Tempo</th>
		<th>No. Bayar</th>
		<th>Tgl. Bayar</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
		<th>Bayar</th>
	</tr>

	<?php
	$sql = mysqli_query($konek, "SELECT * FROM semester WHERE nis='$ds[nis]' ORDER BY jatuhtempo ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[bulan]</td>
			<td>$d[jatuhtempo]</td>
			<td>$d[nobayar]</td>
			<td>$d[tglbayar]</td>
			<td>$d[jumlah]</td>
			<td>$d[ket]</td>
			<td align='center'>";
				if($d['nobayar']==''){
					echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&ids=$d[idsmt]' class='btn btn-success'><i class='glyphicon glyphicon-ok-sign'></i> Bayar</a>";
				}else{
					echo "<a href='proses_transaksi.php?nis=$nis&act=bayar&ids=$d[idsmt]' class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i> Batal</a>";
				}
			echo "</td>
		</tr>";
		$no++;
	}
	?>
</table>
</div>
<div class="row"></div>
<hr>
<?php
}
?>
</div>
<?php include "footer.php" ?>