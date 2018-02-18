<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

if (isset($_GET['id'])) {
    $query = "SELECT request.*, kategori.nama AS nama_kategori FROM request ".
    "LEFT JOIN kategori ON request.id_kategori = kategori.id ".
    "WHERE request.id_user = " . $_GET['id'];
} else {
    $query = "SELECT request.*, kategori.nama AS nama_kategori FROM request ".
    "LEFT JOIN kategori ON request.id_kategori = kategori.id ".
    "WHERE deal = 0";
}

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) >= 1) {
    $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
        $resultData = array();
        $resultData['id'] = $row['id'];
        $resultData['id_user'] = $row['id_user'];
        $resultData['id_kategori'] = $row['id_kategori'];
        $resultData['nama'] = $row['nama'];
        $resultData['deskripsi'] = $row['deskripsi'];
        $resultData['foto'] = $row['foto'];
        $resultData['anggaran'] = $row['anggaran'];
        $resultData['waktu'] = $row['waktu'];
        $resultData['nama_kategori'] = $row['nama_kategori'];
        $resultArray['data'][] = $resultData;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
