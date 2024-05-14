<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0"><?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <img src="<?= base_url('upload/fotokaryawan/' . $this->session->userdata("foto")) ?>" alt="" class="avatar-lg rounded-circle" />
                    <h5 class="mt-2 mb-0"><?= ucwords($this->session->userdata("namaKaryawan")) ?></h5>
                    <h6 class="text-muted font-weight-normal mt-2 mb-0"><?= $this->session->userdata("nrp") ?></h6>
                </div>
                <!-- <a href="<?= base_url($linkin . '/edit/' . $row->idKaryawan) ?>"> <button type="button" class="btn btn-primary btn-sm mr-1">Edit Profil</button></a> -->

                <div class="mt-3 pt-2 border-top">
                    <h4 class="mb-3 font-size-15">Information</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 text-muted">
                            <tbody>
                                <tr>
                                    <th scope="row">Jabatan</th>
                                    <?php
                                    if (empty($profile->namaSection && $profile->namaJabatan)) {
                                        echo "<td> - </td>";
                                    } else {
                                        echo "<td> $profile->namaSection $profile->namaJabatan </td>";
                                    }

                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">Status Karyawan</th>
                                    <?php
                                    if (empty($profile->statusKaryawan)) {
                                        echo "<td> - </td>";
                                    } else {
                                        echo "<td> " . fd_karyawan($profile->statusKaryawan) . " </td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <th scope="row">Whatsapp</th>
                                    <td><?= $profile->noTelp ?></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">
                            Activity
                        </a>
                    </li>
                    

                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        <div class="left-timeline mt-3 mb-3 pl-4">
                            <ul class="list-unstyled events mb-0">
                                <!-- <?php if ($activity) : ?> -->
                                    <!-- <?php foreach ($activity as $key) : ?> -->
                                        <li class="event-list">
                                            <div class="pb-4">
                                                <div class="media">
                                                    <div class="event-date text-center mr-4">
                                                        <!-- <div class="bg-soft-primary p-1 rounded text-primary font-size-14"><?= date('d M Y', $key->createTime) ?></div> -->
                                                    </div>
                                                    <div class="media-body">
                                                        <!-- <h6 class="font-size-15 mt-0 mb-1"><?= $key->title ?></h6> -->
                                                        <!-- <p class="text-muted font-size-14"><?= $key->subtitle ?></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <!-- <?php endforeach; ?> -->
                                <!-- <?php else : ?> -->
                                    <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <a href="<?= base_url('Home/Profile/edit/' . $profile->idKaryawan) ?>"> Silahkan klik untuk melengkapi data diri anda.</a>
                                    </div> -->
                                <?php endif ?>

                            </ul>
                        </div>



                    </div>

                    <!-- Judul -->
                   
                    <!-- Surat -->
                    <div class="tab-pane fade" id="pills-projects" role="tabpanel" aria-labelledby="pills-projects-tab">

                     


                </div>

            </div>
        </div>
        <!-- end card -->
    </div>
</div>