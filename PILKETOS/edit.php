<?php
include 'config.php';
if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['visi']) && isset($_POST['misi'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $url = "https://api.apispreadsheets.com/data/9939/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $postJSON =  json_encode(["data" => ["nama" => $nama, "visi" => $visi, "misi" =>  $misi], "query" => "select*from9939wherenama='$id'"]);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($http_code == 201) {
        setcookie('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diedit!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>',  time() + (5), '/');
        header('Location:' . $link . 'PILKETOS/tambahcalon.php');
        exit;
    } else {
        echo 'Gagal';
    }
    curl_close($curl);
} else if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['visi'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $visi = $_POST['visi'];
    $url = "https://api.apispreadsheets.com/data/9939/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $postJSON =  json_encode(["data" => ["nama" => $nama, "visi" => $visi], "query" => "select*from9939wherenama='$id'"]);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($http_code == 201) {
        setcookie('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diedit!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>',  time() + (5), '/');
        header('Location:' . $link . 'PILKETOS/tambahcalon.php');
        exit;
    } else {
        echo 'Gagal';
    }
    curl_close($curl);
} else if (isset($_POST['id']) && isset($_POST['nama'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $url = "https://api.apispreadsheets.com/data/9939/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $postJSON =  json_encode(["data" => ["nama" => $nama], "query" => "select*from9939wherenama='$id'"]);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($http_code == 201) {
        setcookie('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diedit!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>',  time() + (5), '/');
        header('Location:' . $link . 'PILKETOS/tambahcalon.php');
        exit;
    } else {
        echo 'Gagal';
    }
    curl_close($curl);
}
