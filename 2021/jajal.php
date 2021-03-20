<?php
$data = file_get_contents('https://spreadsheets.google.com/feeds/list/1jpsraGZzd0XeoCTsDGgNOjxKJOGxFOzwKmoCoBnTMEM/od6/public/values?alt=json');
$json_decoded = json_decode($data, TRUE);

// var_dump($json_decoded['feed']['entry'][0]['id']);

echo  $json_decoded['feed']['title']['$t'];
// foreach ($json_decoded['feed']['entry'] as $result) {
//     echo $result['id']['$t'];
// }
