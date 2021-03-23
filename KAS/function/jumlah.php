<?php
include 'kaswajibplus.php';
include 'kaswajibmin.php';
include 'kasacaraplus.php';

//total kas

$totalKasMasuk =  $kasacaraplus  + $kaswajibplus;
$totalKasKeluar = $kaswajibmin - $kasacaramin;
$totalKas =  $kasacaraplus  + $kaswajibplus - $kaswajibmin - $kasacaramin;
