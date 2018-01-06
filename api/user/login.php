<?php

include '../koneksi.php';

$resultArray = array();
$resultArray['data'][] = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = "SELECT id FROM user WHERE email = '" . $email . "' AND password = '" . md5($password) . "'";

    $result = mysqli_query($conn, $login);
    if ($result && mysqli_num_rows($result) === 1) {
        $resultArray = array();
        while ($row = mysqli_fetch_array($result)) {
            $resultData = array();
            $resultData['id'] = $row['id'];
            $resultArray['data'][] = $resultData;
        }

        $resultArray['status'] = "success";
    } else {
        $resultArray['status'] = "failed";
    }
} else {
    $resultArray['status'] = "invalid";
}

echo json_encode($resultArray);
?>
