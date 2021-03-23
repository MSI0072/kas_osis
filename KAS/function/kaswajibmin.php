<?php
$url2 = "https://api.apispreadsheets.com/data/9918/";
$curl2 = curl_init($url2);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);

$result2 = curl_exec($curl2);

$http_code2 = curl_getinfo($curl2, CURLINFO_HTTP_CODE);

if ($http_code2 == 200) {
    $result2 = json_decode($result2);
    $data2 = $result2->data;
    $kaswajibmin = 0;
    foreach ($data2 as $min) {
        if ($min->bulan ==  date('F')) {
            $kaswajibmin += $min->nominal;
        }
    }
    $kaswajibmin;
} else {
}
curl_close($curl2);
