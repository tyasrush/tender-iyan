<?php

include './koneksi.php';

$resultArray = array();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$kontak = $_POST['kontak'];
$alamat = $_POST['alamat'];

$signup = "INSERT INTO user(nama,email,password,contact,alamat) VALUES ("
        . "'" . $name . "',"
        . "'" . $email . "',"
        . "'" . $password . "',"
        . "" . $kontak . ","
        . "'" . $alamat . "');";

$result = mysqli_query($conn, $signup);
if ($result) {
    $resultArray['signup_status'] = "success";
} else {
    $resultArray['signup_status'] = "failed";
}

echo json_encode($resultArray);
?>