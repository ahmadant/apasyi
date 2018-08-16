<?php include "header.php"; ?>

<h3>Data kamar dan Pembina <?=$gen?></h3>
<a href="tambah_kamar.php" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a><p></p>
<table class="table table-responsive table-bordered">
	<tr>
		<th>No.</th>
		<th>Nama kamar</th>
		<th>Nama Pembina</th>
		<th>Aksi</th>
	</tr>
	<?php
	$sql = mysqli_query($konek, "SELECT kamar.kamar,ustadz.namaustadz,ustadz.jk
								FROM kamar,ustadz WHERE kamar.idustadz=ustadz.idustadz AND ustadz.jk='$jk'
								ORDER BY kamar.kamar ASC");
	$no=1;
	while($d=mysqli_fetch_array($sql)){
		echo "<tr>
			<td>$no</td>
			<td>$d[kamar]</td>
			<td>$d[namaustadz]</td>
			<td>
				<a href='edit_kamar.php?kls=$d[kamar]' class='btn btn-success'><i class='glyphicon glyphicon-pencil'></i> Edit</a>  
				<a href='hapus_kamar.php?kls=$d[kamar]'class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i> Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	?>
</table>

<?php include "footer.php"; ?>