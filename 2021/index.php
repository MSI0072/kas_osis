<?php
$data = file_get_contents('https://spreadsheets.google.com/feeds/list/1jpsraGZzd0XeoCTsDGgNOjxKJOGxFOzwKmoCoBnTMEM/od6/public/values?alt=json'); //1
$data2 = file_get_contents('https://spreadsheets.google.com/feeds/list/1rsIjneyToTOV6ONhR0a9s4lw9Au7uHDIWq9x2K3ZNgM/od6/public/values?alt=json'); //2
$data3 = file_get_contents('https://spreadsheets.google.com/feeds/list/1mj5GfihNUWw1GhIcNSzelzhl96dNWrusBwhqpqrav7Q/od6/public/values?alt=json'); //3
$data4 = file_get_contents('https://spreadsheets.google.com/feeds/list/1PGM1CSj2ZmY6PDk9qM2pZo8dhuQ9ZDmlKnwwlPQnZPg/od6/public/values?alt=json'); //4
$data5 = file_get_contents('https://spreadsheets.google.com/feeds/list/1jbje9SiOdNL2kfmCvVjukpM6Rsqw3UCqGfIDcE3YbNI/od6/public/values?alt=json'); //5
$data6 = file_get_contents('https://spreadsheets.google.com/feeds/list/1ryq2WMTph2ra37RarfwqFxtrL0uYrgOPtBIBdg0Af9s/od6/public/values?alt=json'); //6
$data7 = file_get_contents('https://spreadsheets.google.com/feeds/list/12YFpRda3jUzAi_7SiX-S1P7533NUGilKvYb34km3RCM/od6/public/values?alt=json'); //7
$data8 = file_get_contents('https://spreadsheets.google.com/feeds/list/11lyyAs9ZCah_UXYbOjXaLxJDFC2i5rZGpHn--CdrAzI/od6/public/values?alt=json'); //8
$data9 = file_get_contents('https://spreadsheets.google.com/feeds/list/1zO4sLcRb1V3cwHN73sePn4AX1tN7B2zhDz80GXsM3kI/od6/public/values?alt=json'); //9
$data10 = file_get_contents('https://spreadsheets.google.com/feeds/list/17P-mkt8fb3qLvktM4813o2r1tt1VWmc6TV4_RSe5zn8/od6/public/values?alt=json'); //10
$data11 = file_get_contents('https://spreadsheets.google.com/feeds/list/1Ft8kE015Yh2LhsUjUhAMOGLyU8RbQ4rldUbQQRoC32s/od6/public/values?alt=json'); //11
$data12 = file_get_contents('https://spreadsheets.google.com/feeds/list/1XwFgSLzZlVFwzrOzcFjVhwuEW4WyLfPEY8VXSxrWk9U/od6/public/values?alt=json'); //12
$json_decoded = json_decode($data, TRUE);
$json_decoded2 = json_decode($data2, TRUE);
$json_decoded3 = json_decode($data3, TRUE);
$json_decoded4 = json_decode($data4, TRUE);
$json_decoded5 = json_decode($data5, TRUE);
$json_decoded6 = json_decode($data6, TRUE);
$json_decoded7 = json_decode($data7, TRUE);
$json_decoded8 = json_decode($data8, TRUE);
$json_decoded9 = json_decode($data9, TRUE);
$json_decoded10 = json_decode($data10, TRUE);
$json_decoded11 = json_decode($data11, TRUE);
$json_decoded12 = json_decode($data12, TRUE);
?>
<?php $title_web = "Tabel Kas Tahun 2021" ?>
<?php include 'config.php' ?>

<?php include 'templates/header.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kas Sewagati</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kas Sewagati</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Bulan</th>
                            <th>Kurang</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Bulan</th>
                            <th>Kurang</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($json_decoded['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded2['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded3['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded4['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded5['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded6['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded7['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded8['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded9['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded10['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded11['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($json_decoded12['feed']['entry'] as $result) { ?>
                            <tr>
                                <td><?= $result['gsx$timestamp']['$t'] ?></td>
                                <td><?= $result['gsx$nama']['$t'] ?></td>
                                <td><?= $result['gsx$kelas']['$t'] ?></td>
                                <td><?= $result['gsx$status']['$t'] ?></td>
                                <td style="text-transform:capitalize"><?= $result['gsx$bulan']['$t'] ?></td>
                                <td name="rp"><?= $total - $result['gsx$jumlah']['$t'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?= $title . ' ' . date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= $link ?>assets/jquery/jquery.min.js"></script>
<script src="<?= $link ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= $link ?>assets/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= $link ?>js/sb-admin-2.min.js"></script>

<script>
    var d = document.getElementsByName('rp');

    for (i = 0; i < d.length; i++) {
        if (d[i].innerText != 0) {
            d[i].innerText = 'Rp. ' + (d[i].innerText / 1000).toFixed(3);
        } else {
            d[i].innerText = '-'
        }
    }
</script>

<?php include 'templates/jsfooter.php' ?>
</body>

</html>