<?php

include './koneksi.php';

$resultArray = array();

if (isset($_POST['alphabet'])) {
  $list = "SELECT * FROM request ORDER BY nama ASC";
} else if (isset($_POST['termurah'])) {
  $list = "SELECT * FROM request ORDER BY anggaran ASC";
} else if (isset($_POST['termahal'])) {
  $list = "SELECT * FROM request ORDER BY anggaran DESC";
}

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

    $resultArray['list_status'] = "success";
} else {
    $resultArray['list_status'] = "failed";
}

echo json_encode($resultArray);
?>
