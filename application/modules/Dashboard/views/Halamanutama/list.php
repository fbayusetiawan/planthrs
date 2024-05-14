<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <!-- <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li> -->
            </ol>
        </nav>
        <h4 class="mb-1 mt-0"> <?= $title ?></h4>
    </div>
</div>

<div class="row">


    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <h5 class="card-title header-title border-bottom p-3 mb-0">Overview</h5>
                <!-- stat 1 -->
                <div class="media px-3 py-4 border-bottom">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?= $karyawan ?></h4>
                        <span class="text-muted">Total Karyawan</span>
                    </div>
                    <i width="24" height="24" viewBox="0 0 24 24" data-feather="users"></i>
                </div>

                <!-- stat 2 -->
                <div class="media px-3 py-4 border-bottom">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?= $popunit ?></h4>
                        <span class="text-muted">Populasi Unit</span>
                    </div>
                    <i class="icons-large" data-feather="truck"></i>
                </div>
                <div class="media px-3 py-4">
                    <div class="media-body">
                        <h4 class="mt-0 mb-1 font-size-22 font-weight-normal">Rp.21.5</h4>
                        <span class="text-muted">Total Cost Backlog</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user align-self-center icon-dual icon-lg">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-0 mb-0 header-title">Top 5 Chart By Price</h5>

                <div class="table-responsive mt-4">
                    <table class="table table-hover table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Code Unit</th>
                                <th scope="col">Part No</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#98754</td>
                                <td>ASOS Ridley High</td>
                                <td>Otto B</td>
                                <td>$79.49</td>
                                <td><span class="badge badge-soft-warning py-1">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title header-title border-bottom p-3 mb-0">Outstanding WO Backlog</h5>
                <br />
                <div id="piechart" style="width: 900px; height: 500px;">

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Backlog Open</span>
                        <!-- <h2 class="mb-0 text-info">2 Orang</h2> -->
                        <h2 class="mb-0 text-info"><?= $backlogOpen ?></h2>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="media p-3">
                    <div class="media-body">
                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Backlog Closed</span>
                        <!-- <h2 class="mb-0 text-info">2 Orang</h2> -->
                        <h2 class="mb-0 text-info"><?= $backlogClose ?></h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Code Unit', 'Status'],
            <?php
            foreach ($wo as $dawo) {
                echo "['" . $dawo['codeUnit'] . "'," . $dawo['total'] . "],";
            }
            ?>
        ]);
        var options = {
            ptitle: 'Outstanding WO Backlog',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>