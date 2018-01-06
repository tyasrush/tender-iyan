<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];

$signup = "INSERT INTO user(nama,email,password,contact,alamat) VALUES ("
        . "'" . $name . "',"
        . "'" . $email . "',"
        . "'" . md5($password) . "',"
        . "" . $kontak . ","
        . "'" . $alamat . "');";

$result = mysqli_query($conn, $signup);
if ($result) {
    $resultArray['status'] = "success";
} else {
    $resultArray['status'] = "failed";
}

echo json_encode($resultArray);
?>