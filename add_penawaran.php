<?php

include './koneksi.php';

$target_path = 'images/penawaran/';
$response = array();
// $file_upload_url = "http://" . $_SERVER['SERVER_ADDR'] . '/tender/' . $target_path;
$file_upload_url = "http://" . $_SERVER['SERVER_ADDR'] . '/server_tender/' . $target_path;
// $file_upload_url = 'http://tender-server.esy.es/' . $target_path;
// $file_upload_url = "http://" . $_SERVER['SERVER_ADDR'] . $target_path;

if (file_exists($target_path)) {
    if (isset($_FILES['image']['name'])) {
        try {
            $final_path = $target_path . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $final_path)) {
                $response['file_name'] = basename($_FILES['image']['name']);
                $response['message'] = $file_upload_url . basename($_FILES['image']['name']);
                $response['error'] = false;

                $id_user = $_POST['id_user'];
                $id_request = $_POST['id_request'];
                $name = $_POST['name'];
                $deskripsi = $_POST['deskripsi'];
                $harga = $_POST['harga'];

                $addPenawaran = "INSERT INTO penawaran(id_user,id_request,nama,foto,deskripsi,harga) VALUES ("
                        . "'" . $id_user . "',"
                        . "'" . $id_request . "',"
                        . "'" . $name . "',"
                        . "'" . $file_upload_url . basename($_FILES['image']['name']) . "',"
                        . "'" . $deskripsi . "',"
                        . "" . $harga . ");";

                $result = mysqli_query($conn, $addPenawaran);
                if ($result) {
                    $response['status'] = "success";
                } else {
                    $response['status'] = "failed";
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'Could not move the file!';
            }
        } catch (Exception $e) {
            $response['error'] = true;
            $response['message'] = $e->getMessage();
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Could not move the file!';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Dir not valid';
}

echo json_encode($response);

?>
