<?php
include 'config.php';
if (isset($_COOKIE['ascnsansan'])) {
} else {
    header('Location:' . $link . '2021/login.php');
    exit;
}

?>
<?php $title_web = 'Tambah Data Tahun 2021' ?>

<?php include 'templates/header.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">

        <div class="container-md">

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kas</h6>
                </div>
                <div class="card-body">
                    <form name="Januari" id="upload">
                        <div class="alert myAlert alert-success alert-dismissible fade show d-none" role="alert">
                            <strong>Data kas berhasil ditambah!</strong> silahkan cek di tabel kas.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert myAlert2 alert-primary alert-dismissible fade show" role="alert">
                            Kolom bulan diisi sesuai pembayaran bulan, contoh ingin membayar bulan februari maka dipili bulan februari
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap" style="text-transform:capitalize" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bulan</label>
                            <select class="form-control" id="bulan" name="bulan" onchange="aedcc()" required>
                                <optgroup label="Tahun 2021">
                                    <option value="Januari" selected>Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kelas</label>
                            <select class="form-control" id="kelas" name="kelas" required>
                                <optgroup label="Kelas 12">
                                    <option value="12 MIPA 1" selected>12 MIPA 1</option>
                                    <option value="12 MIPA 2">12 MIPA 2</option>
                                    <option value="12 MIPA 3">12 MIPA 3</option>
                                    <option value="12 MIPA 4">12 MIPA 4</option>
                                    <option value="12 IPS 1">12 IPS 1</option>
                                    <option value="12 IPS 2">12 IPS 2</option>
                                <optgroup label="Kelompok 2">
                                    <option value="11 MIPA 1">11 MIPA 1</option>
                                    <option value="11 MIPA 2">11 MIPA 2</option>
                                    <option value="11 MIPA 3">11 MIPA 3</option>
                                    <option value="11 MIPA 4">11 MIPA 4</option>
                                    <option value="11 IPS 1">11 IPS 1</option>
                                    <option value="11 IPS 2">11 IPS 2</option>
                                <optgroup label="Kelompok 2">
                                    <option value="10 MIPA 1">10 MIPA 1</option>
                                    <option value="10 MIPA 2">10 MIPA 2</option>
                                    <option value="10 MIPA 3">10 MIPA 3</option>
                                    <option value="10 MIPA 4">10 MIPA 4</option>
                                    <option value="10 IPS 1">10 IPS 1</option>
                                    <option value="10 IPS 2">10 IPS 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control status" id="status" name="status" onchange="asdsas()" required>
                                <option value="Lunas">Lunas</option>
                                <option value="Kurang">Kurang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <button type="submit" class="btn btn-primary btn-kirim">Submit</button>
                        <button type="submit" class="btn btn-danger btn-reload d-none" onclick="asdsf()">Reload</button>
                        <button class="btn btn-primary btn-loading d-none" type="button">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $total_script ?>
<script>
    /**
     * Tutorial : https://github.com/jamiewilson/form-to-google-sheets
     * Youtube : https://youtu.be/2XosKncBoQ4
     */
    document.getElementById('jumlah').readOnly = true;
    document.getElementById('jumlah').value = bulanan;

    function asdsas() {

        if (document.getElementById('status').value == 'Kurang') {
            document.getElementById('jumlah').readOnly = false;
            document.getElementById('jumlah').value = '';
        } else {
            document.getElementById('jumlah').readOnly = true;
            document.getElementById('jumlah').value = bulanan;
        }
    }

    function asdsf() {
        location.reload();
        const btnReload = document.querySelector('.btn-reload');
        btnReload.classList.toggle('d-none');
    }

    //Set Link Function
    const jan = "https://script.google.com/macros/s/AKfycbxPvdO4CAJrACG2BmC6n01Aa8-fzS4o4LbSfqyiOLlnHBVQTzADMEh3EDmBdyLCHdH5Ig/exec";
    const feb = "https://script.google.com/macros/s/AKfycbxxI4YxQJH_OL8Xnz3BEOdlwqmXwFE9bblif2MiWuLSc__DlljCLTzKrp40EnwvrpCoKQ/exec";
    const mar = "https://script.google.com/macros/s/AKfycbwk3za6ovJmzATpPExOlrE-AOgydVUEbuKMH-fJO3IAC1s2eIAJCYisQ0qILl5EsJZK/exec";
    const apr = "https://script.google.com/macros/s/AKfycbwyr7zZ-HtqHcPGlynrJZtqm94VC1Sv2s9sWs_X6j1CEOOfe4T_CDBhlOs4iEKgF2nynQ/exec";
    const mei = "https://script.google.com/macros/s/AKfycbxoZQRkRm4qyd2Dq-larxriBzLA95sZJuzNskOQl4zoVxoV2-I1BlO87i0iC_OA4z1u2A/exec";
    const jun = "https://script.google.com/macros/s/AKfycbzbkYCHC9gnKoB4FZ5hbNEY41_z_5R3wWDpb8MLSk-Bb9l6J7-CVD1lyauQ7RShSxTf/exec";
    const jul = "https://script.google.com/macros/s/AKfycbx4QvRbv9aE2hxLsrJ9XiXgXpS9YOLXKKNzAWBnRhV_ZvsbCXSXyrrQaN3zmfbhWnv79g/exec";
    const agu = "https://script.google.com/macros/s/AKfycbwzN0U9OjwAhn8rkwNmhOPQ0hdE8Nw1K5iXKI0ixrHpaLgG_GHIvFIeLp0xDUKJN5Dk/exec";
    const sep = "https://script.google.com/macros/s/AKfycbz1Q-zCc4_FnG4mluAGqIuPWJzWfQ0zet7AjH7ngqvu7NM6nRRaI-GojLMYp9jtAvQVZQ/exec";
    const okt = "https://script.google.com/macros/s/AKfycbzAsb7hR3fzhm8Wf0qODm-a9hScVbTC-XXO7Man7CPz0O5xj07nGNuXyGIxLJ9Lmf5q/exec";
    const nov = "https://script.google.com/macros/s/AKfycbwr_WIOXsagOHT2XXjnFis7XagFnMHt5cYtdM-ZCw2bf6E6qu5D-Ro5uLspelrnPmMT/exec";
    const des = "https://script.google.com/macros/s/AKfycbwzN06G9cO61jwAM7_11L_lMwnzSA9Rw3RKdwnZ-maSA_HM30uMAWM_hpZtSfRAQJIS1Q/exec";

    //Menentukan Link Function
    var bln = document.getElementById('bulan');
    var setForm = document.getElementById("upload");
    let link = jan;
    let setBln = 'Januari';
    const scriptURL = link
    const form = document.forms[setBln]
    const btnKirim = document.querySelector('.btn-kirim');
    const btnLoading = document.querySelector('.btn-loading');
    const btnReload = document.querySelector('.btn-reload');
    const alert = document.querySelector('.myAlert');
    const alert2 = document.querySelector('.myAlert2');

    form.addEventListener('submit', e => {
        e.preventDefault();
        btnKirim.classList.toggle('d-none');
        btnLoading.classList.toggle('d-none');

        fetch(scriptURL, {
                method: 'POST',
                body: new FormData(form)
            })
            .then(response => {
                console.log('Success!', response)
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                alert.classList.toggle('d-none');
                alert2.classList.toggle('d-none');
                btnReload.classList.toggle('d-none');
            })
            .catch(error => console.error('Error!', error.message))
    })

    function aedcc() {
        if (bln.value == 'Januari') {
            setForm.name = 'Januari';
            link = jan;
            setBln = setForm.name
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Februari') {
            setForm.name = 'Februari';
            link = feb;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Maret') {
            setForm.name = 'Maret';
            link = mar;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'April') {
            setForm.name = 'April';
            link = apr;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Mei') {
            setForm.name = 'Mei';
            link = mei;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Juni') {
            setForm.name = 'Juni';
            link = jun;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Juli') {
            setForm.name = 'Juli';
            link = jul;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Agustus') {
            setForm.name = 'Agustus';
            link = agu;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'September') {
            setForm.name = 'September';
            link = sep;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Oktober') {
            setForm.name = 'Oktober';
            link = okt;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'November') {
            setForm.name = 'November';
            link = nov;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        } else if (bln.value == 'Desember') {
            setForm.name = 'Desember';
            link = des;
            setBln = setForm.name;
            const scriptURL = link
            const form = document.forms[setBln]
            const btnKirim = document.querySelector('.btn-kirim');
            const btnLoading = document.querySelector('.btn-loading');
            const alert = document.querySelector('.myAlert');

            form.addEventListener('submit', e => {
                e.preventDefault();
                btnKirim.classList.toggle('d-none');
                btnLoading.classList.toggle('d-none');
                fetch(scriptURL, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(response => {
                        console.log('Success!', response)
                        btnKirim.classList.toggle('d-none');
                        btnLoading.classList.toggle('d-none');
                        alert.classList.toggle('d-none');
                        alert2.classList.toggle('d-none');
                        btnReload.classList.toggle('d-none');
                    })
                    .catch(error => console.error('Error!', error.message))
            })
        }
    }
</script>
<?php include 'templates/footer.php' ?>