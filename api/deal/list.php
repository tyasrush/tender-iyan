<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$query = 'SELECT d.id, p.nama AS nama_penawaran, p.harga FROM deal d '.
'INNER JOIN penawaran p ON d.id_penawaran = p.id '.
'INNER JOIN user u ON p.id_user = u.id '.
'WHERE u.id = ' . $_GET['id'];

$result = mysqli_query($conn, $query);
if ($result) {
  $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
      $resultItem = array();
        $resultItem['id'] = $row['id'];
        $resultItem['nama_penawaran'] = $row['nama_penawaran'];
        $resultItem['harga'] = $row['harga'];
        $resultArray['data'][] = $resultItem;
    }

    $resultArray['message'] = "get all deals";
    $resultArray['status'] = "success";
} else {
    $resultArray['message'] = mysqli_error($conn);
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
