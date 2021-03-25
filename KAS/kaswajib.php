<?php
include "config.php";
if (isset($_COOKIE['ascnsansan'])) {
} else {
    header('Location:' . $link . 'KAS/login.php');
    exit;
}


$title_page = 'Kas Wajib';
if ($_POST) {
    $id = $_POST['id'];
    $tgl = $_POST['tgl_bayar'];
    $ket = $_POST['keterangan'];
    $bulan = $_POST['bulan'];
    $url = "https://api.apispreadsheets.com/data/9844/";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $postJSON = json_encode(["data" => ["keterangan" => $ket, "tgl_bayar" => $tgl, "bulan" => $bulan], "query" => "select*from9844whereid=$id"]);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJSON);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    $result = curl_exec($curl);

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($http_code == 201) {
        setcookie('sukses', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Data berhasil ditambah!</strong> Silahkan cek di google sheet osis.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>',  time() + (5), '/');
        header('Location:' . "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        exit;
    } else {
        setcookie('sukses', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>Gagal menambah data!</strong> Silahkan cek kembali data anda.
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
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">Form Pembayaran <?= $title_page ?></h6>
                </div>
                <div class="card-body">
                    <?= isset($_COOKIE['sukses']) ? $_COOKIE['sukses'] : '' ?>
                    <form action="" method="POST">
                        <form>
                            <div class="mb-3">
                                <label>Nama lengkap</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" onchange="getdata()" required>
                                <div class="valid-feedback">
                                    Data ditemukan!
                                </div>
                                <div class="invalid-feedback">
                                    Data tidak ditemukan, silahkan cek kembali nama anda!
                                </div>
                            </div>
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control text-capitalize" id="kelas" name="kelas" onchange="getdata()" readonly>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control text-capitalize" id="jabatan" name="jabatan" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <select class="form-control text-capitalize" id="id" name="id" required>
                                            <option selected hidden value="0">Silahkan isi nama terlebih dahulu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label>Tipe Bayar</label>
                                        <select class="form-control text-capitalize" id="kurang" name="kurang" onchange="lunas()" required>
                                            <optgroup label="Keterangan :">
                                                <option value="lunas">Bayar Lunas</option>
                                                <option value="kurang">Bayar Kurang / Lebih</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-none" id="ilang">
                                <label>Jumlah Bayar</label>
                                <input type="text" class="form-control text-capitalize" id="j_bayar" value="<?= $kas ?>" name="j_bayar" onchange="ket()" placeholder="Masukan jumlah uang yang diterima" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control text-capitalize" id="keterangan" value="" name="keterangan" readonly>
                            </div>
                            <input type="hidden" value="<?= date('d F Y, h:i:s A') ?>" name="tgl_bayar" id="tgl_bayar">
                            <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                        </form>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">Form Pengeluaran <?= $title_page ?></h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible fade show d-none myAlert" role="alert">
                        <strong>Berhasil menambah data!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= isset($_COOKIE['sukses']) ? $_COOKIE['sukses'] : '' ?>
                    <form id="SubForm">
                        <form id="submit">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" placeholder="Masukan nama kamu" required>
                            </div>
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukan Nominal" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan"></textarea>
                            </div>
                            <input type="hidden" value="<?= date('d F Y, h:i:s A') ?>" name="tgl" id="tgl">
                            <input type="hidden" class="text-lowcase" value="<?= date('F') ?>" name="bulan" id="bulan">
                            <button type="button" class="btn btn-primary btn-kirim" onclick="SubForm()" id="btn1">Submit</button>
                            <button class="btn btn-primary btn-loading d-none" type="button">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php' ?>
<?= $total_script ?>
<script src="<?= $link ?>KAS/js/kaswajib.js"></script>
</body>

</html>