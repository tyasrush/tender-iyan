<?php

include '../koneksi.php';

$resultArray = array();

$param = $_POST['q'];

$list = "SELECT request.*, kategori.nama AS nama_kategori FROM request INNER JOIN kategori ON request.id_kategori = kategori.id WHERE request.nama LIKE '%". $param ."%'";

$result = mysqli_query($conn, $list);
if ($result) {
  while ($row = mysqli_fetch_array($result)) {
    $resultData = array();
    $resultData['id'] = $row['id'];
    $resultData['id_user'] = $row['id_user'];
    $resultData['nama'] = $row['nama'];
    $resultData['deskripsi'] = $row['deskripsi'];
    $resultData['foto'] = $row['foto'];
    $resultData['anggaran'] = $row['anggaran'];
    $resultData['waktu'] = $row['waktu'];
    $resultData['kategori']['id'] = $row['id_kategori'];
    $resultData['kategori']['nama'] = $row['nama_kategori'];
    $resultArray['data'][] = $resultData;
  }

  $resultArray['status'] = "success";
} else {
  $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
