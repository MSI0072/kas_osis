<?php
$title_page = 'Login';
include 'config.php';
setcookie('login_admin', '', time() + 1, '/');
setcookie('login_user', '', time() + 1, '/');
setcookie('user', '', time() + 1, '/');
if (isset($_POST['username'])) {
    $url = "https://api.apispreadsheets.com/data/10026/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_code == 200) {
        // SUCCESS
        $result = json_decode($result);
        $data = $result->data;
        $username = $_POST['username'];
        $password = $_POST['password'];
        foreach ($data as $login) {
            if ($username == $login->user) {
                if ($password == $login->password) {
                    if ("admin" == $login->rule) {
                        setcookie('login_admin',  'sadsadsadasd=sa=dsa=dsa=d=sadsadsa?dsado23e21e8ea', strtotime('+1 days'), '/');
                        setcookie('user',  $login->user, strtotime('+1 days'), '/');
                        header('Location: tambahcalon.php');
                        exit;
                    } else {
                        if ("sudah" == $login->status) {
                            setcookie('berhasilvote', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Kamu sudah mengikuti vote, kesempatan vote hanya 1 kali!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>',  time() + (10), '/');
                            header('Location: login.php');
                            exit;
                        } else {
                            setcookie('login_user',  'sadsadsadasd=sa=dsa=dsa=d=sadsadsa?dsado23e21e8ea', strtotime('+1 days'), '/');
                            setcookie('user',  $login->user, strtotime('+1 days'), '/');
                            header('Location: index.php');
                        }
                    }
                } else {
                    $gagal = true;
                }
            } else {
                $gagal = true;
            }
        }
    } else {
        // ERROR CODE
    }
    curl_close($curl);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login">
    <meta name="author" content="OSIS SMAN 1 PASURUAN">

    <title><?= $title_page . ' - ' . $title_web ?></title>

    <link href="<?= $link ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= $link ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9 mt-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                    </div>
                                    <?= isset($_COOKIE['berhasilvote']) ? $_COOKIE['berhasilvote'] : "" ?>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href=count.php>Lihat Quick Count</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $link ?>assets/jquery/jquery.min.js"></script>
    <script src="<?= $link ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $link ?>assets/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= $link ?>js/sb-admin-2.min.js"></script>

</body>

</html>