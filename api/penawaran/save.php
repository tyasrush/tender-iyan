<?php

include '../koneksi.php';

$target_path = 'gambar/';
$response = array();
// $host = "http://192.168.26.109/tender/api/penawaran/";
$host = "https://ryan-tender.000webhostapp.com/api/penawaran/";

if (file_exists($target_path)) {
    if (isset($_FILES['image']['name'])) {
        try {
            $filename = $_FILES["image"]["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.'));
            $file_ext = substr($filename, strripos($filename, '.'));
            $final_path = $target_path . md5($file_basename) . $file_ext;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $final_path)) {
                $response['error'] = false;

                $id_user = $_POST['id_user'];
                $id_request = $_POST['id_request'];
                $name = $_POST['name'];
                $deskripsi = $_POST['deskripsi'];
                $harga = $_POST['harga'];
                $lat = $_POST['lat'];
                $lng = $_POST['lng'];

                $addPenawaran = "INSERT INTO penawaran(id_user,id_request,nama,foto,deskripsi,harga,lat,lng) VALUES ("
                        . "'" . $id_user . "',"
                        . "'" . $id_request . "',"
                        . "'" . $name . "',"
                        . "'" . $host . $final_path . "',"
                        . "'" . $deskripsi . "',"
                        . "" . $harga . ","
                        . "" . $lat . ","
                        . "" . $lng . ""
                        .");";

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
