<?php
session_start();
require_once('../config/koneksi.php');

$q = $_GET['query'];
//$jk = $_SESSION['jk'];

$qr = "SELECT kamar.kamar,kamar.idustadz,ustadz.namaustadz FROM kamar,ustadz WHERE kamar.kamar LIKE '%".$q."%' AND kamar.idustadz=ustadz.idustadz ORDER BY kamar.kamar DESC ";
$sql = mysqli_query($konek,$qr);
 
while($data = mysqli_fetch_array($sql))
{
    $output['suggestions'][] = [
        'value' => $data['kamar'],
        'kamar' => $data['kamar'],
        'ustadz'  => $data['namaustadz']
    ];
}

if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>