<?php
include 'config.php';
$title_page = "Quick Count";
include 'templates/header.php';
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">QUICK COUNT</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2" id="calon_1">
                </span>
                <span class="mr-2" id="calon_2">
                </span>
                <span class="mr-2" id="calon_3">
                </span>
            </div>
        </div>
    </div>
</div>
<?php include 'templates/footer.php' ?>
<script src="<?= $link ?>assets/chart.js/Chart.min.js"></script>
<script src="<?= $link ?>PILKETOS/js/count.js"></script>
</body>

</html>