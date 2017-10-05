<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$idReq = $_POST['id_request'];
$idPenawaran = $_POST['id_penawaran'];

$query = "INSERT INTO deal(id_request,id_penawaran) VALUES ("
        . "'" . $idReq . "',"
        . "'" . $idPenawaran . "');";

$result = mysqli_query($conn, $query);
if ($result) {
    $query = "UPDATE request SET deal = 1 WHERE id = ". $idReq ;
    mysqli_query($conn, $query);
    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>