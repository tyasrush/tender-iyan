<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$list = "SELECT * FROM penawaran WHERE id_request = " . $_POST['id_request'];

if (isset($_POST['alphabet'])) {
  $list = $list . " ORDER BY nama ASC";
} else if (isset($_POST['termurah'])) {
  $list = $list . " ORDER BY harga ASC";
} else if (isset($_POST['termahal'])) {
  $list = $list . " ORDER BY harga DESC";
}

$result = mysqli_query($conn, $list);
if ($result) {
  $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
      $resultItem = array();
        $resultItem['id'] = $row['id'];
        $resultItem['id_user'] = $row['id_user'];
        $resultItem['nama'] = $row['nama'];
        $resultItem['deskripsi'] = $row['deskripsi'];
        $resultItem['foto'] = $row['foto'];
        $resultItem['harga'] = $row['harga'];
        $resultItem['lat'] = $row['lat'];
        $resultItem['lng'] = $row['lng'];
        $resultArray['data'][] = $resultItem;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
