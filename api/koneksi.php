<?php
/*
file koneksi untuk handle koneksi ke database
*/

//untuk koneksi server idhostinger
$user = "id3141118_riyanto";
$db = "id3141118_tender";
$host = "localhost";
$pass = "qw3r4sdf";

//untuk koneksi server local
// $user = "root";
// $db = "tender";
// $host = "localhost";
// $pass = "";
$conn = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

?>
