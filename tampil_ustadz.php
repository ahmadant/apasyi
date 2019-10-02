<?php 
include "header.php";
$sql=mysqli_query($konek, "SELECT * FROM ustadz WHERE jk='$jk' ORDER BY idustadz ASC");
$no =1;	 
?>
<div class="col-md-6">
<h3>Data Ustadz<?=$gen?></h3>

<a href="tambah_ustadz.php" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a><p></p>
<table class="table table-striped table-bordered table-responsive">
	<tr>
		<th>No</th>
		<th>Nama Ustadz</th>
		<th>Bidang</th>
		<th>Jenis Kelamin</th>
		<th>Aksi</th>
	</tr>
	<?php
	while($d=mysqli_fetch_array($sql)){
	?>
		<tr>
			<td><?=$no?></td>
			<td><?=$d["namaustadz"]?></td>
			<td><?=$d["bidang"]?></td>
			<td><?=$d["jk"]?></td>
			<td>
				<a href='edit_ustadz.php?id=<?=$d["idustadz"]?>' class='btn btn-success btn-sm'><i class='glyphicon glyphicon-pencil'></i> Edit</a> 
				<a href='hapus_ustadz.php?id=<?=$d["idustadz"]?>'class='btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i> Hapus</a>
			</td>
		</tr>
	<?php	
		$no++;
	}
	?>
</table>
</div>
<?php include "footer.php"; ?>
