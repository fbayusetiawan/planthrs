<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success btn-sm">Tambah Data</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="badge badge-success float-right">Completed</div>
                <p class="text-primary text-uppercase font-size-12 mb-2">Daily Inspect</p>
                <h5><a href="#" class="text-dark">Daily Inspect</a></h5>
                <p class="text-muted mb-4">If several languages coalesce, the grammar of the resulting language is more regular.</p>

                <div>
                    <a href="javascript: void(0);">
                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                    </a>
                    <a href="javascript: void(0);">
                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                    </a>
                </div>
            </div>
            <div class="card-body border-top">
                <div class="row align-items-center">
                    <div class="col-sm-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item pr-2">
                                <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Due date">
                                    <i class="uil uil-calender mr-1"></i> 15 Dec
                                </a>
                            </li>
                            <li class="list-inline-item pr-2">
                                <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tasks">
                                    <i class="uil uil-bars mr-1"></i> 56
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                    <i class="uil uil-comments-alt mr-1"></i> 224
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col offset-sm-1">
                        <div class="progress mt-4 mt-sm-0" style="height: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="100% completed">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row-->