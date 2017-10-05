<?php

include '../koneksi.php';

$resultArray = array();

$param = $_POST['q'];

$list = "SELECT * FROM request WHERE nama LIKE '%". $param ."%'";

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
    $resultArray['data'][] = $resultData;
  }

  $resultArray['status'] = "success";
} else {
  $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
