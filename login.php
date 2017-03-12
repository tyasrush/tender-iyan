<?php

include './koneksi.php';

$resultArray = array();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = "SELECT id FROM user WHERE email = '" . $email . "' AND password = '" . $password . "'";

    $result = mysqli_query($conn, $login);
    if ($result && mysqli_num_rows($result) === 1) {
        while ($row = mysqli_fetch_array($result)) {
            $resultArray['id'] = $row['id'];
        }

        $resultArray['login_status'] = "success";
    } else {
        $resultArray['login_status'] = "failed";
    }
} else {
    $resultArray['login_status'] = "invalid";
}

echo json_encode($resultArray);
?>
