<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Edit Data <?= $title ?></h4>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="validationCustom01">Section</label>
                <?= cmb_dinamis('idSection', 'section', 'namaSection', 'idSection', $row->idSection) ?>
                <div class="invalid-feedback">
                    Harus di isi.
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Activity</label>
                <?= form_dropdown('activityUnit', fd_activityUnit(), $row->activityUnit, 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Type</label>
                <?= form_dropdown('typeUnit', fd_typeUnit(), $row->typeUnit, 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Manufacturer</label>
                <?= form_dropdown('manufacture', fd_manufacturer(), $row->manufacture, 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Code Unit</label>
                <input type="text" class="form-control" name="codeUnit" value="<?= $row->codeUnit ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">EGI</label>
                <?= form_dropdown('modelUnit', fd_modelUnit(), $row->modelUnit, 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">SN/VIN</label>
                <input type="text" class="form-control" name="snvin" value="<?= $row->snvin ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Engine Model</label>
                <input type="text" class="form-control" name="engineModel" value="<?= $row->engineModel ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">ESN</label>
                <input type="text" class="form-control" name="esn" value="<?= $row->esn ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">HM Update</label>
                <input type="text" class="form-control" name="hmUpdate" value="<?= $row->hmUpdate ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Delivery Date Unit Baru</label>
                <input type="date" class="form-control" name="deliveryUnit" value="<?= $row->deliveryUnit ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Delivery Date To AGM</label>
                <input type="date" class="form-control" name="deliveryToAgm" value="<?= $row->deliveryToAgm ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Location</label>
                <input type="text" class="form-control" name="location" value="<?= $row->location ?>" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Foto Unit</label>
                <input type="file" class="form-control" name="fotoUnit" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($linkin) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>