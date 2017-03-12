<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './koneksi.php';

$resultArray = array();

$id_request = $_POST['id'];

$list = "SELECT * FROM user WHERE id = " . $id_request;

$result = mysqli_query($conn, $list);
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $resultArray['nama'] = $row['nama'];
        $resultArray['email'] = $row['email'];
        $resultArray['contact'] = $row['contact'];
        $resultArray['alamat'] = $row['alamat'];
        $resultArray[] = $resultItem;
    }

    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);

