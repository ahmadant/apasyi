<?php
session_start();
require_once('../config/koneksi.php');

$q = $_GET['query'];
$jk = $_SESSION['jk'];

$qstring = "SELECT * FROM santri WHERE namasantri LIKE '%".$q."%' AND jk='$jk' ORDER BY namasantri DESC ";
$result = mysqli_query($konek,$qstring);
 
while($row = mysqli_fetch_array($result))
{
    $output['suggestions'][] = [
        'value' => $row['namasantri'],
        'nis' => $row['nis'],
        'nama'  => $row['namasantri']
    ];
}

if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>
						