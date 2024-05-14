<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<head>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/tutwurihanda.png">
</head>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $title ?></h4>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-3">
                        <img src="<?= base_url(); ?>upload/fotokaryawan/<?= $row->foto ?>" alt="" class="avatar-lg rounded-circle" />
                        <h5 class="mt-2 mb-0"><?= $row->namaKaryawan ?></h5>
                        <h6 class="text-muted font-weight-normal mt-2 mb-0">NRP : <?= $row->nrp ?>
                        </h6>
                        <h6></h6>
                        <!-- <h6 class="text-muted font-weight-normal mt-1 mb-4">San Francisco, CA</h6> -->

                        <a href="<?= base_url($linkin . '/edit/' . $row->idKaryawan) ?>"> <button type="button" class="btn btn-primary btn-sm mr-1">Edit Profil</button></a>
                        <a href="<?= base_url($linkin) ?>"><button type="button" class="btn btn-danger btn-sm">Kembali</button></a>
                    </div>

                    <!-- profile  -->
                    <div class="mt-5 pt-2 border-top">
                        <h4 class="font-size-14">Jabatan :</h4>
                        <p class="text-muted"><?= $row->namaSection ?> <?= $row->namaJabatan ?></p>
                        <h4 class="font-size-14">Status Karyawan :</h4>
                        <p class="text-muted"><?= fd_karyawan($row->statusKaryawan) ?></p>
                    </div>
                    <div class="mt-3 pt-2 border-top">
                    </div>

                </div>
            </div>
            <!-- end card -->

        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                                Data Diri
                            </a>

                        </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages" aria-selected="false">
                                    Data Tambahan
                                </a>
                            </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="pills-projects-tab" data-toggle="pill" href="#pills-projects" role="tab" aria-controls="pills-projects" aria-selected="false">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-tasks-tab" data-toggle="pill" href="#pills-tasks" role="tab" aria-controls="pills-tasks" aria-selected="false">
                                Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-files-tab" data-toggle="pill" href="#pills-files" role="tab" aria-controls="pills-files" aria-selected="false">
                                Files
                            </a>
                        </li> -->
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                            <h5 class="mt-1"></h5>

                            <form class="row g-4">

                                <div class="col-md-3 mt-3">
                                    <label for="inputAddress" class="form-label">NIK</label>
                                    <input type="text" class="form-control" value="<?= $row->nik ?>" disabled>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="inputAddress" class="form-label">NRP</label>
                                    <input type="text" class="form-control" value="<?= $row->nrp ?> " disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $row->namaKaryawan ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" value="<?= $row->tempatLahir ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="<?= tgl_indo($row->tglLahir) ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputCity" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="<?= fd_jk($row->jk) ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" value="<?= $row->namaJabatan ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Section</label>
                                    <input type="text" class="form-control" value="<?= $row->namaSection ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">Golongan</label>
                                    <input type="text" class="form-control" value="<?= $row->namaGolongan ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputEmail4" class="form-label">POH</label>
                                    <input type="text" class="form-control" value="<?= $row->poh ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputCity" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="<?= $row->alamat ?>" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputCity" class="form-label">Hire Date</label>
                                    <input type="text" class="form-control" value="<?= tgl_indo($row->hireDate) ?>" disabled>
                                </div>
                                <?php
                                $waktuawal = date_create($row->hireDate);
                                $waktuakhir = date_create();
                                $diff = date_diff($waktuawal, $waktuakhir);
                                ?>
                                <div class="col-md-6 mt-3">
                                    <label for="inputCity" class="form-label">Masa Kerja</label>
                                    <input type="text" class="form-control" value="<?= $diff->y ?> Tahun <?= $diff->m ?> Bulan <?= $diff->d ?> Hari" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="inputAddress" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $row->noTelp ?>" disabled>
                                </div>
                            </form>


                        </div>
    
                        <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                            <h5 class="mt-3">Projects</h5>


                            <!-- end row -->
                        </div>

                        <div class="tab-pane fade" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                            <h5 class="mt-3">Tasks</h5>


                        </div>

                        <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                            <h5 class="mt-3">Files</h5>



                            <!-- end attachments -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
</div> <!-- container-fluid -->
</div>

<script>
    function cekUser() {
        var user = $("#username").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("datamaster/users/cekUser") ?>',
            data: "user=" + user,
            success: function(data) {
                $('#info').html(data)
            }
        })
    }
</script>