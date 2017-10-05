<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$list = "SELECT * FROM kategori";

$result = mysqli_query($conn, $list);
if ($result) {
    $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
        $resultData = array();
        $resultData['id'] = $row['id'];
        $resultData['nama'] = $row['nama'];
        $resultArray['data'][] = $resultData;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>
