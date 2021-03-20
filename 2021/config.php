<?php

$_SERVER['SERVER_NAME'] == "localhost" ? $developer = 'true' : $developer = 'false';
$developer == 'true' ? $link = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['SERVER_NAME']  . "/kas_notaris/" : $link = (isset($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['SERVER_NAME'] . "/";

$title = "KAS OSIS SMAN 1 PASURUAN";
$title_sidebar = "KAS OSIS";
$total = '30000';

$total_script = "<script>
var bulanan = '$total'
</script>";
