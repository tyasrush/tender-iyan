<?php

include '../koneksi.php';

$target_path = 'gambar/';
$response = array();
// $host = "http://192.168.26.109/tender/api/tender/";
$host = "https://ryan-tender.000webhostapp.com/api/tender/";

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
                $id_kategori = $_POST['id_kategori'];
                $name = $_POST['name'];
                $deskripsi = $_POST['deskripsi'];
                $anggaran = $_POST['anggaran'];
                $waktu = $_POST['waktu'];
                $date = date("Y-m-d", strtotime($waktu));

                $addTender = "INSERT INTO request(nama,id_user,id_kategori,foto,deskripsi,anggaran,waktu) VALUES ("
                        . "'" . $name . "',"
                        . "'" . $id_user . "',"
                        . "" . $id_kategori . ","
                        . "'" . $host . $final_path . "',"
                        . "'" . $deskripsi . "',"
                        . "" . $anggaran . ","
                        . "'" . $date . "');";

                $result = mysqli_query($conn, $addTender);
                if ($result) {
                    $response['status'] = "success";
                } else {
                    $response['status'] = "failed";
                }
            } else {
                $response['status'] = "failed";
                $response['error'] = true;
                $response['message'] = 'Could not move the file!';
            }
        } catch (Exception $e) {
            $response['status'] = "failed";
            $response['error'] = true;
            $response['message'] = $e->getMessage();
        }
    } else {
        $response['status'] = "failed";
        $response['error'] = true;
        $response['message'] = 'Could not move the file!';
    }
} else {
    $response['status'] = "failed";
    $response['error'] = true;
    $response['message'] = 'Dir not valid';
}

echo json_encode($response);
?>
