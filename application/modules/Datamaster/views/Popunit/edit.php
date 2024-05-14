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
                <select name="idSection" required class="form-control">
                    <option value="">Pilih Section</option>
                    <?php foreach (callTable('section')->result() as $section) : ?>
                        <option <?= $row->idSection == $section->idSection ? 'selected' : '' ?> value="<?= $section->idSection ?>"><?= $section->namaSection ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Activity</label>
                <select name="idUnitActivity" required class="form-control">
                    <option value="">Pilih Activity Unit</option>
                    <?php foreach (callTable('unit_activity')->result() as $activity) : ?>
                        <option <?= $row->idUnitActivity == $activity->idUnitActivity ? 'selected' : '' ?> value="<?= $activity->idUnitActivity ?>"><?= $activity->namaUnitActivity ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Type</label>
                <select name="idUnitType" required class="form-control">
                    <option value="">Pilih Type Unit</option>
                    <?php foreach (callTable('unit_type')->result() as $type) : ?>
                        <option <?= $row->idUnitType == $type->idUnitType ? 'selected' : '' ?> value="<?= $type->idUnitType ?>"><?= $type->namaUnitType ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Manufacture</label>
                <select name="idUnitManufacture" required class="form-control">
                    <option value="">Pilih Manufacture Unit</option>
                    <?php foreach (callTable('unit_manufacture')->result() as $manufacture) : ?>
                        <option <?= $row->idUnitManufacture == $manufacture->idUnitManufacture ? 'selected' : '' ?> value="<?= $manufacture->idUnitManufacture ?>"><?= $manufacture->namaUnitManufacture ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Code Unit</label>
                <input type="text" class="form-control" value="<?= $row->codeUnit ?>" name="codeUnit" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Model</label>
                <select name="idUnitModel" required class="form-control">
                    <option value="">Pilih Model Unit</option>
                    <?php foreach (callTable('unit_model')->result() as $model) : ?>
                        <option <?= $row->idUnitModel == $model->idUnitModel ? 'selected' : '' ?> value="<?= $model->idUnitModel ?>"><?= $model->namaUnitModel ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">SN/VIN</label>
                <input type="text" class="form-control" value="<?= $row->snvin ?>" name="snvin" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Engine Model</label>
                <input type="text" class="form-control" value="<?= $row->engineModel ?>" name="engineModel" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">ESN</label>
                <input type="text" class="form-control" value="<?= $row->esn ?>" name="esn" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">HM Update</label>
                <input type="text" class="form-control" value="<?= $row->hmUpdate ?>" name="hmUpdate" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Delivery Date Unit Baru</label>
                <input type="date" class="form-control" value="<?= $row->deliveryUnit ?>" name="deliveryUnit" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Delivery Date To AGM</label>
                <input type="date" class="form-control" value="<?= $row->deliveryToAgm ?>" name="deliveryToAgm" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Location</label>
                <input type="text" class="form-control" value="<?= $row->location ?>" name="location" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Foto Unit <small><i>(format foto jpg | jpeg | png dengan max. 10mb)</i></small></label>
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