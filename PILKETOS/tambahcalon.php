<?php
include "config.php";
if (isset($_COOKIE['login_admin'])) {
} else {
    header('Location:' . $link . 'PILKETOS/login.php');
    exit;
}
$title_page = 'Tambah Calon';
$url = "https://api.apispreadsheets.com/data/9939/";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($http_code == 200) {
    // SUCCESS
    $result = json_decode($result);
    $data = $result->data;
} else {
    // ERROR CODE
}
curl_close($curl);
include 'templates/header.php' ?>
<!-- Begin Page Content -->
<style>
    .img-fluid {
        max-width: 90%;
        height: auto;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title_page ?></h1>
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= 'Form ' . $title_page ?></h6>
                </div>
                <div class="card-body">
                    <?= isset($_COOKIE['sukses']) ? $_COOKIE['sukses'] : '' ?>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control text-capitalize" id="nama" name="nama" placeholder="Masukan nama kamu" required>
                        </div>
                        <div class="form-group">
                            <label>Visi</label>
                            <textarea class="form-control ckeditor" id="ckeditor" name="visi" rows="3" placeholder="Masukan visi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Misi</label>
                            <textarea class="form-control ckeditor" id="ckeditor" name="misi" rows="3" placeholder="Masukan misi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Foto</label>
                            <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Calon Ketua Osis</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="20%">Foto</th>
                                    <th>Nama</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="10%">No</th>
                                    <th width="20%">Foto</th>
                                    <th>Nama</th>
                                    <th>Visi</th>
                                    <th>Misi</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($data as $index => $calon) {
                                    if ($calon->nama !== "") { ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><img src="<?= $link . 'PILKETOS/kandidat/' . $calon->foto ?>" alt="" class="img-fluid mx-auto d-block"></td>
                                            <td><?= $calon->nama ?></td>
                                            <td><?= $calon->visi ?></td>
                                            <td><?= $calon->misi ?></td>
                                            <?php $id = $calon->nama . ':' . $calon->foto; ?>
                                            <td>
                                                <a class="btn btn-primary btn-circle btn-kirim btn-sm" onclick="delet('<?= $id  ?>')"><i class="fas fa-trash"></i></a>
                                                <a class="btn btn-primary btn-circle btn-loading d-none btn-sm" type="button">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    <span class="sr-only">Loading...</span>
                                                </a>
                                                <a class="bbtn btn-primary btn-circle btn-sm" href="#" data-toggle="modal" data-target="#edit_<?= $index ?>"><i class="fas fa-user-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data as $index => $calon) {
    if ($calon->nama !== "") { ?>
        <div class="modal fade" id="edit_<?= $index ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Calon Ketua Osis</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="edit.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" value="<?= $calon->nama ?>" placeholder="Masukan nama kamu">
                            </div>
                            <div class="form-group">
                                <label>Visi</label>
                                <textarea class="form-control ckeditor" id="ckeditor" name="visi" rows="3" value="<?= $calon->visi ?>" placeholder="Masukan visi"></textarea>
                            </div>
                            <div class=" form-group">
                                <label>Misi</label>
                                <textarea class="form-control ckeditor" id="ckeditor" name="misi" rows="3" value="<?= $calon->misi ?>" placeholder="Masukan misi"></textarea>
                            </div>
                            <input type="hidden" value="<?= $calon->nama ?>" name="id">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php include 'templates/footer.php' ?>
<script type="text/javascript" src="<?= $link ?>assets/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= $link ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= $link ?>js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="<?= $link ?>PILKETOS/ckeditor/ckeditor.js"></script>
<script src="<?= $link ?>PILKETOS/js/tambahcalon.js"></script>
</body>

</html>