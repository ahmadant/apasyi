<?php include "header.php"; 
for($i=6; $i<=12; $i+=6){
	echo " ";
}
?>

<h3>Data santri</h3>
<a href="tambah_santri.php"class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a><p></p>
<table class="table table-responsive table-bordered">
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama santri</th>
		<th>JK.</th>
		<th>kamar</th>
		<th>Tahun Ajaran</th>
		<th>Aksi</th>
	</tr>

	<?php 
	$sql = mysqli_query($konek,"SELECT * FROM santri WHERE jk='$jk' ORDER BY kamar asc");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[nis]</td>
			<td>$d[namasantri]</td>
			<td>$d[jk]</td>
			<td>$d[kamar]</td>
			<td>$d[tahunajaran]</td>
			<td>
				<a href='edit_santri.php?id=$d[nis]' class='btn btn-success'><i class='glyphicon glyphicon-pencil'></i> Edit</a>
				<a href='hapus_santri.php?id=$d[nis]' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i> Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>

<p>Menghapus santri berarti juga menghapus tagihan santri...</p>

<?php include "footer.php"; ?>