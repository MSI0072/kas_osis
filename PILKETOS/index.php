<?php
include "config.php";
if (isset($_COOKIE['login_user']) | isset($_COOKIE['login_admin'])) {
} else {
    header('Location:' . $link . 'PILKETOS/login.php');
    exit;
}
$title_page = 'Pengumuman';
include 'templates/header.php'
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title_page ?></h1>
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Wajib Baca!</h6>
                </div>
                <?php if (isset($_COOKIE['login_user'])) { ?>
                    <div class="card-body">
                        Selamat datang di aplikasi E-Pilketos Sewagati Smasa, dibawah ini adalah langkah langkah menggunakan aplikasi E-Pilketos :
                        <ol type="1">
                            <li>Buka halaman voting</li>
                            <li>Pilih salah satu calon ketua osis</li>
                            <li>Selesai.</li>
                            <li>Hasil voting dapat anda liat di sini</li>
                        </ol>
                    </div>
                <?php } else { ?>
                    <div class="card-body">
                        admin
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php include 'templates/footer.php' ?>
<script type="text/javascript" src="<?= $link ?>assets/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= $link ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= $link ?>js/demo/datatables-demo.js"></script>
</body>

</html>