<?php
include "config.php";
if (isset($_COOKIE['ascnsansan'])) {
} else {
    header('Location:' . $link . 'KAS/login.php');
    exit;
}

$title_page = 'Kas Acara';
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');

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
                        <input type="hidden" name="tgl" value="<?= strftime("%A, %d %B %Y", strtotime('2020-10-05')) ?>">
                        <input type="hidden" class="text-lowcase" value="<?= strftime("%B") ?>" name="bulan" id="bulan">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php' ?>
<?= $total_script ?>

<script>
    //Funtion Tambah Jenis Acara
    function SubForm() {
        var asda = document.querySelector('.btn-loading')
        var sadsa = document.querySelector('.btn-kirim')
        var asfg = document.querySelector('.myAlert')
        asda.classList.toggle('d-none')
        sadsa.classList.toggle('d-none')
        $.ajax({
            url: "https://api.apispreadsheets.com/data/9917/",
            type: "post",
            data: $("#myForm").serializeArray(),
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
    //Function Validation Add Acara 
    function cekada() {
        fetch("https://api.apispreadsheets.com/data/9917/").then(res => {
            if (res.status === 200) {
                // SUCCESS
                res.json().then(data => {
                    var f = $('#jenisAcara').val()
                    let alert = '';
                    data.data.forEach(element => {
                        if (element.jenis_acara == f) {
                            alert = false;
                        }
                    });
                    if (alert !== false) {
                        document.getElementById('jenisAcara').classList.add('is-valid');
                        document.getElementById('jenisAcara').classList.remove('is-invalid');
                        document.getElementById("btn1").disabled = false;
                    } else {
                        document.getElementById('jenisAcara').classList.remove('is-valid');
                        document.getElementById('jenisAcara').classList.add('is-invalid');
                        document.getElementById("btn1").disabled = true;
                    }
                }).catch(err => console.log(err))
            } else {
                // ERROR
            }
        })
    }

    //Function Change submit function
    function rubah() {
        var g = $('#tipe').val()
        var d = document.getElementById('nominal')
        if (g == 'pemasukan') {
            d.name = 'pemasukan'
        } else {
            d.name = 'pengeluaran'
        }
    }

    //Function Get Option Jenis Acara
    fetch("https://api.apispreadsheets.com/data/9917/").then(res => {
        if (res.status === 200) {
            // SUCCESS
            res.json().then(data => {
                let jenisAcara = '';
                if (data.data[0].jenis_acara == "") {
                    jenisAcara = `<option class="text-capitalize" selected disabled>Tidak ada acara, silahkan tambah acara</option>`;
                    $('#acara').html(jenisAcara);
                } else {
                    data.data.forEach(element => {
                        jenisAcara += `<option class="text-capitalize" value="${element.jenis_acara}">${element.jenis_acara}</option>`;
                    })
                    $('#acara').html('<optgroup label="Jenis Acara :">' + jenisAcara + '</optgroup>');
                }
            }).catch(err => console.log(err))
        } else {
            // ERROR
        }
    })
</script>
</body>

</html>