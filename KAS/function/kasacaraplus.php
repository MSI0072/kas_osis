<?php
setlocale(LC_ALL, 'id-ID', 'id_ID');
$url3 = "https://api.apispreadsheets.com/data/9909/";
$curl3 = curl_init($url3);
curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);

$result3 = curl_exec($curl3);

$http_code3 = curl_getinfo($curl3, CURLINFO_HTTP_CODE);

if ($http_code3 == 200) {
    $result3 = json_decode($result3);
    $data3 = $result3->data;
    $kasacaraplus = 0;
    $kasacaramin = 0;
    foreach ($data3 as $min) {
        if ($min->bulan == strftime("%B")) {
            if ($min->jenis_data == 'pemasukan') {
                $kasacaraplus += $min->nominal;
            } else {
                $kasacaramin += $min->nominal;
            }
        }
    }
    $kasacaraplus;
    $kasacaramin;
} else {
}
curl_close($curl3);
