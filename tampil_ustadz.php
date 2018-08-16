<?php include "header.php"; ?>
<div class="col-md-6">
<h3>Data ustadz <?=$gen?></h3>
<a href="tambah_ustadz.php" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a><p></p>
<table class="table table-responsive table-bordered">
	<tr>
		<th>No</th>
		<th>Nama ustadz</th>
		<th>Bidang</th>
		<th>Jenis Kelamin</th>
		<th>Aksi</th>
	</tr>
	<?php
	$sql=mysqli_query($konek, "SELECT * FROM ustadz WHERE jk='$jk' ORDER BY idustadz ASC");
	$no =1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[namaustadz]</td>
			<td>$d[bidang]</td>
			<td>$d[jk]</td>
			<td>
				<a href='edit_ustadz.php?id=$d[idustadz]' class='btn btn-success'><i class='glyphicon glyphicon-pencil'></i> Edit</a> 
				<a href='hapus_ustadz.php?id=$d[idustadz]'class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i> Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>
</div>
<?php include "footer.php"; ?>