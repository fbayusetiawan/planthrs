<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Tambah Data <?= $title ?></h4>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($ctrl . '/addAction') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="validationCustom01">Section</label>
                <select name="idSection" required class="form-control">
                    <option value="">Pilih Section</option>
                    <?php foreach (callTable('section')->result() as $section) : ?>
                        <option value="<?= $section->idSection ?>"><?= $section->namaSection ?></option>
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
                        <option value="<?= $activity->idUnitActivity ?>"><?= $activity->namaUnitActivity ?></option>
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
                        <option value="<?= $type->idUnitType ?>"><?= $type->namaUnitType ?></option>
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
                        <option value="<?= $manufacture->idUnitManufacture ?>"><?= $manufacture->namaUnitManufacture ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Code Unit</label>
                <input type="text" class="form-control" name="codeUnit" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Model</label>
                <select name="idUnitModel" required class="form-control">
                    <option value="">Pilih Model Unit</option>
                    <?php foreach (callTable('unit_model')->result() as $model) : ?>
                        <option value="<?= $model->idUnitModel ?>"><?= $model->namaUnitModel ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">SN/VIN</label>
                <input type="text" class="form-control" name="snvin" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Engine Model</label>
                <input type="text" class="form-control" name="engineModel" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">ESN</label>
                <input type="text" class="form-control" name="esn" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">HM Update</label>
                <input type="text" class="form-control" name="hmUpdate" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Delivery Date Unit Baru</label>
                <input type="date" class="form-control" name="deliveryUnit" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Delivery Date To AGM</label>
                <input type="date" class="form-control" name="deliveryToAgm" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Location</label>
                <input type="text" class="form-control" name="location" required>
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
            <a href="<?= base_url($ctrl) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>