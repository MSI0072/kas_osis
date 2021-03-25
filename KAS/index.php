<?php
$title_page = 'Info Kas';
include 'config.php';
include 'function/jumlah.php';
include 'templates/header.php';
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title_page ?></h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kas Bulanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 rp"><?= $kas ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Kas Masuk (<?= date('F') ?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 rp"><?= $totalKasMasuk ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-plus-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kas Keluar (<?= date('F') ?>)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 rp"><?= $totalKasKeluar ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 rp"><?= $totalKas ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
            <h6 class="m-0 font-weight-bold text-primary">Data Kas Wajib</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample1">
            <div class="card-body">
                <div class="form-group">
                    <label>Pemasukan</label>
                    <input type="text" class="form-control rp" value="<?= $kaswajibplus ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Pengeluaran</label>
                    <input type="text" class="form-control rp" value="<?= $kaswajibmin ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control rp" value="<?= $kaswajibplus - $kaswajibmin ?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Cek Data Kas Acara</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <div class="form-group">
                    <labe>Tipe Kas</labe>
                    <select class="form-control" id="acara" name="acara" onchange="sdd()">
                        <option selected disabled>Tidak ada acara, silahkan menambah acara</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pemasukan</label>
                    <input type="text" class="form-control" id="pemasukan" name="pemasukan" readonly>
                </div>
                <div class="form-group">
                    <label>Pengeluaran</label>
                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran" readonly>
                </div>
                <div class="form-group">
                    <label>Total</label>
                    <input type="text" class="form-control" id="total" name="total" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran Kas Wajib</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th>Bulan</th>
                            <th>Tgl Bayar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th>Bulan</th>
                            <th>Tgl Bayar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data as $kaswajib) { ?>
                            <tr>
                                <td><?= $kaswajib->nama ?></td>
                                <td><?= $kaswajib->kelas ?></td>
                                <td><?= $kaswajib->jabatan ?></td>
                                <td><?= $kaswajib->keterangan ?></td>
                                <td><?= $kaswajib->bulan ?></td>
                                <td><?= $kaswajib->tgl_bayar ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Kas Wajib</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data2 as $keluarwajib) {
                            if ($keluarwajib->nama !== "") { ?>
                                <tr>
                                    <td><?= $keluarwajib->nama ?></td>
                                    <td><?= $keluarwajib->nominal ?></td>
                                    <td><?= $keluarwajib->keterangan ?></td>
                                    <td><?= $keluarwajib->tgl ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pemasukan Kas Acara</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Acara</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Acara</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data3 as $tambahkas) {
                            if ($tambahkas->jenis_data == 'pemasukan') { ?>
                                <tr>
                                    <td><?= $tambahkas->nama ?></td>
                                    <td><?= $tambahkas->jenis_acara ?></td>
                                    <td><?= $tambahkas->jenis_data ?></td>
                                    <td><?= $tambahkas->keterangan ?></td>
                                    <td><?= $tambahkas->tgl ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Kas Acara</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Acara</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Acara</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($data3 as $kurangkas) {
                            if ($kurangkas->jenis_data == 'pengeluaran') { ?>
                                <tr>
                                    <td><?= $kurangkas->nama ?></td>
                                    <td><?= $kurangkas->jenis_acara ?></td>
                                    <td><?= $kurangkas->jenis_data ?></td>
                                    <td><?= $kurangkas->keterangan ?></td>
                                    <td><?= $kurangkas->tgl ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php' ?>
<script src="<?= $link ?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $link ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= $link ?>js/demo/datatables-demo.js"></script>
<script src="<?= $link ?>KAS/js/index.js"></script>
</body>

</html>