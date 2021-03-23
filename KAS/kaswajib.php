<?php
include "config.php";
if (isset($_COOKIE['ascnsansan'])) {
} else {
    header('Location:' . $link . 'KAS/login.php');
    exit;
}


$title_page = 'Kas Wajib';
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');

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
                                <label for="validationServer01">Nama lengkap</label>
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
                            <input type="hidden" value="<?= strftime("%A, %d %B %Y", strtotime('2020-10-05')) ?>" name="tgl_bayar" id="tgl_bayar">
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
                                <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukan nominal" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                            <input type="hidden" value="<?= strftime("%A, %d %B %Y", strtotime('2020-10-05')) ?>" name="tgl" id="tgl">
                            <input type="hidden" class="text-lowcase" value="<?= strftime("%B") ?>" name="bulan" id="bulan">
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
<script>
    function getdata() {
        fetch("https://api.apispreadsheets.com/data/9844/").then(res => {
            if (res.status === 200) {
                // SUCCESS
                res.json().then(data => {
                    var nama = $('#nama').val();
                    let kelas = '';
                    let jabatan = '';
                    let bulan = '';
                    let alert = '';
                    data.data.forEach((element) => {
                        if (element.nama == nama || element.nama.length < 5) {
                            if (element.keterangan !== 'lunas' || element.keterangan.length > 5) {
                                kelas = element.kelas;
                                jabatan = element.jabatan;
                                bulan += `<option class="text-capitalize" value="${element.id}">${element.bulan} (${element.keterangan.replace('lunas','').replace('belum','belum bayar')})</option>`;
                                alert = true;
                            }
                        }
                    });
                    if (alert == true) {
                        document.getElementById('nama').classList.add('is-valid')
                        document.getElementById('nama').classList.remove('is-invalid')
                        document.getElementById("btn").disabled = false;
                    } else {
                        document.getElementById('nama').classList.remove('is-valid')
                        document.getElementById('nama').classList.add('is-invalid')
                        document.getElementById("btn").disabled = true;
                    }
                    $('#kelas').val(kelas);
                    $('#jabatan').val(jabatan);
                    $('#id').html('<optgroup label="Bulan :">' + bulan + '</optgroup>');
                }).catch(err => console.log(err))
            } else {
                // ERROR
            }
        })
    }

    function lunas() {
        document.getElementById('ilang').classList.toggle('d-none');
        var d = document.getElementById('kurang');
        var s = document.getElementById('j_bayar');
        var z = document.getElementById('keterangan');
        if (d.value == 'kurang') {
            s.value = '';
            z.value = ''
        } else {
            s.value = bulanan;
        }
    }
    var d = document.getElementById('keterangan');
    d.value = `lunas`

    function ket() {
        var s = document.getElementById('j_bayar');
        var d = document.getElementById('keterangan');
        if (s.value < bulanan) {
            d.value = `Kurang ${bulanan - s.value}`
        } else if (s.value == bulanan) {
            d.value = `lunas`;
        } else {
            d.value = `Kembali ${s.value - bulanan}`
        }

    }

    function SubForm() {
        var asda = document.querySelector('.btn-loading')
        var sadsa = document.querySelector('.btn-kirim')
        var asfg = document.querySelector('.myAlert')
        asda.classList.toggle('d-none')
        sadsa.classList.toggle('d-none')
        $.ajax({
            url: "https://api.apispreadsheets.com/data/9918/",
            type: "post",
            data: $("#SubForm").serializeArray(),
            success: function() {
                asda.classList.toggle('d-none')
                sadsa.classList.toggle('d-none')
                asfg.classList.toggle('d-none')
            },
            error: function() {
                alert("There was an error :(")
            }
        });
    }
</script>
</body>

</html>