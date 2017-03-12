<?php
//include koneksi untuk koneksi data ke database
include './koneksi.php';

$resultArray = array();

$id_request = $_POST['id_request'];

$list = "SELECT * FROM penawaran WHERE id_request = " . $id_request;

$result = mysqli_query($conn, $list);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
      $resultItem = array();
        $resultItem['id'] = $row['id'];
        $resultItem['id_user'] = $row['id_user'];
        $resultItem['nama'] = $row['nama'];
        $resultItem['deskripsi'] = $row['deskripsi'];
        $resultItem['foto'] = $row['foto'];
        $resultItem['harga'] = $row['harga'];
        $resultArray['data'][] = $resultItem;
    }

    $resultArray['list_status'] = "success";
} else {
    $resultArray['list_status'] = "failed";
}

echo json_encode($resultArray);
?>
