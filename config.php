<?php

$_SERVER['SERVER_NAME'] == "localhost" ? $developer = 'true' : $developer = 'false';
$developer == 'true' ? $link = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['SERVER_NAME']  . "/kas_notaris/" : $link =  "https://" . $_SERVER['SERVER_NAME'] . "/";

$title_web = "KAS SEWAGATI SMASA";
$title_sidebar = "KAS OSIS";
$kas = '30000';

$total_script = "<script>
var bulanan = '$kas'
</script>";
