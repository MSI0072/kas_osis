<?php

if (isset($_POST)) {

    $nama = $_POST['nama'];
    $url2 = "https://api.apispreadsheets.com/data/10026/";
    $curl2 = curl_init($url2);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);

    $postJSON2 = json_encode(["data" => ["status" => "sudah"], "query" => "select*from10026whereuser='$nama'"]);
    curl_setopt($curl2, CURLOPT_URL, $url2);
    curl_setopt($curl2, CURLOPT_POST, true);
    curl_setopt($curl2, CURLOPT_POSTFIELDS, $postJSON2);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    $result2 = curl_exec($curl2);
    $http_code2 = curl_getinfo($curl2, CURLINFO_HTTP_CODE);
    if ($http_code2 == 201) {
        $url = "https://api.apispreadsheets.com/data/10024/";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $postJSON = json_encode(["data" => ["id" => $_POST['id'], "tgl" => $_POST['tgl']]]);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

        $result = curl_exec($curl);

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($http_code == 201) {
            setcookie('berhasilvote', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pilian anda telah kami terima!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>',  time() + (10), '/');
            header('Location: logout.php');
            exit;
        } else {
            // ERROR CODE
        }
        curl_close($curl);
    } else {
        // ERROR CODE
    }
    curl_close($curl2);
}
