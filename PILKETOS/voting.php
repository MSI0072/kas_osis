<?php
include "config.php";
if (isset($_COOKIE['login_user'])) {
} else {
    header('Location:' . $link . 'PILKETOS/login.php');
    exit;
}
$title_page = 'Halaman Voting';
$url = "https://api.apispreadsheets.com/data/9939/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($http_code == 200) {
    $result = json_decode($result);
    $data = $result->data;
} else {
}
curl_close($curl);
include 'templates/header.php'
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title_page ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 d-flex align-items-stretch mb-3">
                <div class="card-deck">
                    <?php foreach ($data as $index => $calon) : ?>
                        <div class="card">
                            <img class="card-img-top" src="<?= $link . "PILKETOS/kandidat/" . $calon->foto ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title  text-center text-uppercase"><?= $calon->nama ?></h5>
                                <p class="card-text  text-center text-uppercase"><strong>Visi : </strong><?= $calon->visi ?></p>
                                <p class="card-text  text-center text-uppercase"><strong>Misi : </strong><?= $calon->misi ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <form action="submit.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $index + 1 ?>">
                                    <input type="hidden" name="nama" value="<?= $_COOKIE['user'] ?>">
                                    <input type="hidden" name="tgl" value="<?= date('d F Y, h:i:s A') ?>">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pilih</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'templates/footer.php' ?>
</body>

</html>