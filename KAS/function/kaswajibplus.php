<?php
setlocale(LC_ALL, 'id-ID', 'id_ID');
$url = "https://api.apispreadsheets.com/data/9844/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($http_code == 200) {
    $result = json_decode($result);
    $data = $result->data;
    $kaswajibplus = 0;
    foreach ($data as $min) {
        if ($min->bulan == strftime("%B")) {
            if ($min->keterangan == 'lunas') {
                $kaswajibplus += str_replace("lunas", 30000, $min->keterangan);
            } else {
                $kaswajibplus += 0;
            }
        }
    }
    $kaswajibplus;
} else {
}
curl_close($curl);
