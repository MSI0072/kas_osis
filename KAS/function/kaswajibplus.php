<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');

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
