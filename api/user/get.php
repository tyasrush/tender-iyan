<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$id = $_POST['id'];
$query = "SELECT * FROM user WHERE id = " . $id;

$result = mysqli_query($conn, $query);
if ($result) {
    $resultArray = array();
    while ($row = mysqli_fetch_array($result)) {
        $resultData = array();
        $resultData['nama'] = $row['nama'];
        $resultData['email'] = $row['email'];
        $resultData['contact'] = $row['contact'];
        $resultData['alamat'] = $row['alamat'];
        $resultArray['data'][] = $resultData;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
