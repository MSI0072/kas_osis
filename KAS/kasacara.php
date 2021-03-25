<?php
include "config.php";
if (isset($_COOKIE['ascnsansan'])) {
} else {
    header('Location:' . $link . 'KAS/login.php');
    exit;
}

$title_page = 'Kas Acara';
if ($_POST) {

    $nama = $_POST['nama'];
    $jenis_cara = $_POST['acara'];
    $jenis_data = $_POST['tipe'];
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $tgl = $_POST['tgl'];
    $bulan = $_POST['bulan'];

    $url = "https://api.apispreadsheets.com/data/9909/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $postJSON = json_encode(["data" => ["nama" => $nama, "jenis_acara" => $jenis_cara, "jenis_data" => $jenis_data, "nominal" => $nominal, "keterangan" => $keterangan, "tgl" => $tgl, "bulan" => $bulan]]);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($http_code == 201) {
        setcookie('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Kas berhasil ditambah!</strong> Silahkan cek di google sheet osis.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>',  time() + (5), '/');
        header('Location:' . "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    } else {
        setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>Gagal menambah kas!</strong> Silahkan cek kembali data anda.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>',  time() + (5), '/');
        header('Location:' . "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    }
    curl_close($curl);
}

include 'templates/header.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title_page ?></h1>
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Jenis Acara</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible fade show d-none myAlert" role="alert">
                        <strong>Berhasil menambah acara!</strong> silahkan isi form selanjutnya.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="myForm">
                        <div class="mb-3">
                            <labe>Nama Acara</labe>
                            <input type="text" class="form-control text-capitalize" id="jenisAcara" name="jenis_acara" onchange="cekada()" required placeholder="Masukan nama acara">
                            <small id="help" class="form-text text-muted">Tambahkan tahun setiap acara, contoh Smathion 2021.</small>
                            <div class="invalid-feedback">
                                Data acara sudah ada, dimohon tidak menambah data yang sudah ada!
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-kirim" onclick="SubForm()" id="btn1">Submit</button>
                        <button class="btn btn-primary btn-loading d-none" type="button">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= 'Form ' . $title_page ?></h6>
                </div>
                <div class="card-body">
                    <?= isset($_COOKIE['sukses']) ? $_COOKIE['sukses'] : '' ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control text-capitalize" id="nama" name="nama" placeholder="Masukan nama kamu" required>
                        </div>
                        <div class="form-group">
                            <labe>Pilih Acara</labe>
                            <select class="form-control" id="acara" name="acara">
                                <option selected disabled>Tidak ada acara, silahkan menambah acara</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <labe>Tipe</labe>
                            <select class="form-control" id="tipe" name="tipe" onchange="rubah()">
                                <optgroup label="Jenis Acara :">
                                    <option value="pemasukan">Pemasukan</option>
                                    <option value="pengeluaran">Pengeluaran</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nominal</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukan nominal" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="tgl" value="<?= date('d F Y, h:i:s A') ?>">
                        <input type="hidden" class="text-lowcase" value="<?= date('F') ?>" name="bulan" id="bulan">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php' ?>
<?= $total_script ?>
<script src="<?= $link ?>KAS/js/kasacara.js"></script>
</body>

</html>