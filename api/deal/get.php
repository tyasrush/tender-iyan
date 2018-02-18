<?php
//include koneksi untuk koneksi data ke database
include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$query = 'SELECT d.id, p.nama AS nama_penawaran, p.harga, d.bukti_transfer FROM deal d '.
'INNER JOIN penawaran p ON d.id_penawaran = p.id '.
'INNER JOIN user u ON p.id_user = u.id '.
'WHERE d.id = ' . $_GET['id'];

$result = mysqli_query($conn, $query);
if ($result) {
    $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
        $resultData = array();
        $resultData['id'] = $row['id'];
        $resultData['nama_penawaran'] = $row['nama_penawaran'];
        $resultData['harga'] = $row['harga'];
        $resultData['foto'] = $row['bukti_transfer'];
        $resultArray['data'][] = $resultData;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
