<?php
include 'config.php';
setcookie('ascnsansan', '', 1, '/');
header('Location:' . $link . '2021/login.php');
exit;
