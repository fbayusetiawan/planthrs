<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$idunik = uniqid();
?>

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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/addAction/' . $this->uri->segment(4)) ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="form-group mb-3">
                        <label for="fileUpload">Pilih Nama <?= $this->uri->segment(4) ?></label>
                        <select data-plugin="customselect" name="pembimbing" required class="form-control" data-placeholder="Please Select Academic Counselor ">
                            <option></option>
                            <?php foreach (dosen() as $row) : ?>
                                <option value="<?= $row->nik ?>"><?= $row->nama ?> - <?= $row->nidn ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>