<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
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
                <form action="<?= base_url($linkin . '/addAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <input type="text" class="form-control" value="<?= $this->session->userdata("idSection") ?>" name="idSection" hidden>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="validationCustom01">Tanggal Temuan <span class="text-danger font-weight-bold font-size-13">*</span></label>
                                <input type="date" class="form-control" name="tanggalTemuan" required>
                            </div>
                            <div class="col-4">
                                <label for="validationCustom01">Equipment Code Unit <span class="text-danger font-weight-bold font-size-13">*</span></label>
                                <input list="datalistOptions1" name="codeUnit" required class="form-control" id="codeUnit" onkeyup="getpart()" data-placeholder="">
                                <datalist id="datalistOptions1">
                                    <option></option>
                                    <?php foreach (popunit() as $unit) : ?>
                                        <option value="<?= $unit->codeUnit ?>"><?= $unit->codeUnit ?> - <?= $unit->namaUnitModel ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                            <div class="col-4">
                                <label for="validationCustom01">HM Unit </label>
                                <input type="number" class="form-control" name="hmUnit">
                            </div>
                            <!-- <input type="text" class="form-control" hidden id="price" name="price"> -->
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Problem <span class="text-danger font-weight-bold font-size-13">*</span></label>
                        <textarea class="form-control" rows="5" name="problemBacklog" required></textarea>
                        <!-- <input type="text" class="form-control" name="problemDescription" required> -->
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Temuan <span class="text-danger font-weight-bold font-size-13">*</span></label>
                        <input type="file" class="form-control" name="fotoTemuan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-sm btn-danger">Kembali</a>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>