<?php
/*
file koneksi untuk handle koneksi ke database
*/

//untuk koneksi server idhostinger
// $user = "u940947760_ian";
// $db = "u940947760_tndr";
// $host = "mysql.idhostinger.com";
// $pass = "kuKojHQoYa3g";

//untuk koneksi server local
$user = "root";
$db = "tender";
$host = "localhost";
$pass = "";
$conn = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

// mysqli_connect("mysql.idhostinger.com","u940947760_ian","kuKojHQoYa3g","u940947760_tndr") or die("Koneksi Gagal dilakukan");
//mysql_select_db("u651963392_tiket") or die("Data Base tidak dapat ditemukan");
?>
