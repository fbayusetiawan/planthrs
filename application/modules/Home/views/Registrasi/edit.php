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
        <h4 class="mb-1 mt-0">Edit <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <input type="text" class="form-control" value="<?= $this->session->userdata("idSection") ?>" name="idSection" hidden>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-4">
                                <label for="validationCustom01">Tanggal Temuan <span class="text-danger font-weight-bold font-size-13">*</span></label>
                                <input type="date" class="form-control" value="<?= $row->tanggalTemuan ?>" name="tanggalTemuan" required>
                            </div>
                            <div class="col-4">
                                <label for="validationCustom01">Equipment Code Unit <span class="text-danger font-weight-bold font-size-13">*</span></label>
                                <select name="codeUnit" required class="form-control" required>
                                    <option value="">Pilih Code Unit</option>
                                    <?php foreach (callTable('popunit')->result() as $unit) : ?>
                                        <option <?= $row->codeUnit == $unit->codeUnit ? 'selected' : '' ?> value="<?= $unit->codeUnit ?>"><?= $unit->codeUnit ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Harus dipilih!
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="validationCustom01">HM Unit </label>
                                <input type="number" class="form-control" value="<?= $row->hmUnit ?>" name="hmUnit">
                            </div>
                            <!-- <input type="text" class="form-control" hidden id="price" name="price"> -->
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Problem <span class="text-danger font-weight-bold font-size-13">*</span></label>
                        <textarea class="form-control" rows="5" name="problemBacklog" required><?= $row->problemBacklog ?></textarea>
                        <!-- <input type="text" class="form-control" name="problemDescription" required> -->
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Temuan </label>
                        <input type="file" class="form-control" name="fotoTemuan">
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