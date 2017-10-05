<?php
//include koneksi untuk koneksi data ke database
include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$list = "SELECT * FROM penawaran WHERE id_request = " . $_POST['id_request'];

$result = mysqli_query($conn, $list);
if ($result) {
    $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
        $resultData = array();
        $resultData['id'] = $row['id'];
        $resultData['id_user'] = $row['id_user'];
        $resultData['nama'] = $row['nama'];
        $resultData['deskripsi'] = $row['deskripsi'];
        $resultData['foto'] = $row['foto'];
        $resultData['harga'] = $row['harga'];
        $resultArray['data'][] = $resultData;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
