<?php
$title_page = 'Login';
include 'config.php';
setcookie('ascnsansan', '', time() + 1, '/');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username_ku = "admin";
    $password_ku = "admin";
    if ($username == $username_ku && $password == $password_ku) {
        setcookie('ascnsansan',  'asdsadjnerjejs', strtotime('+1 days'), '/');

        header('Location:' . $link . 'PILKETOS');
        exit;
    } else {
        $gagal = true;
    }
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

    <!-- Custom fonts for this template-->
    <link href="<?= $link ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= $link ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                    </div>
                                    <?= (isset($gagal)) ? '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Password atau Email salah!</strong> Silahkan masukan dengan benar.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>' : '' ?>
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
                                        <a class="small" href=index.php>Kembali ke beranda</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= $link ?>assets/jquery/jquery.min.js"></script>
    <script src="<?= $link ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= $link ?>assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= $link ?>js/sb-admin-2.min.js"></script>

</body>

</html>