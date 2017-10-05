<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

if (isset($_POST['alphabet'])) {
  $query = "SELECT * FROM request ORDER BY nama ASC";
} else if (isset($_POST['termurah'])) {
  $query = "SELECT * FROM request ORDER BY anggaran ASC";
} else if (isset($_POST['termahal'])) {
  $query = "SELECT * FROM request ORDER BY anggaran DESC";
}

$result = mysqli_query($conn, $query);
if ($result) {
    $resultArray = array();
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
