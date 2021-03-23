<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
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
        if ($min->bulan == strftime("%B")) {
            $kaswajibmin += $min->nominal;
        }
    }
    $kaswajibmin;
} else {
}
curl_close($curl2);
