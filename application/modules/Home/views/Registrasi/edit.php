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
                <form action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <input type="idKaryawan" name="<?= $this->session->userdata("idKaryawan") ?>" id="" hidden>
                    <input type="text" class="form-control nip" name="<?= $this->session->userdata("nrp") ?>" hidden>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Karyawan</label>
                        <input type="text" class="form-control nip" value="<?= $this->session->userdata("namaKaryawan") ?>" disabled>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <input type="text" class="form-control nip" value="<?= $this->session->userdata("idSection") ?>" name="idSection" hidden>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Temuan</label>
                        <input type="date" class="form-control nip" value="<?= $row->tanggalBacklog ?>" name="tanggalBacklog" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Sumber Temuan</label>
                        <?= form_dropdown('sumberTemuan', fd_temuan(), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Equipment Code Unit</label>
                        <select name="codeUnit" required class="form-control" required>
                            <option value="">Pilih Code Unit</option>
                            <?php foreach (callTable('popunit')->result() as $unit) : ?>
                                <option value="<?= $unit->codeUnit ?>"><?= $unit->codeUnit ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">HM Unit</label>
                        <input type="number" class="form-control nip" value="<?= $row->hmUnit ?>" name="hmUnit" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Problem Description</label>
                        <textarea class="form-control" rows="5" name="problemDescription" required><?= $row->problemDescription ?></textarea>
                        <!-- <input type="text" class="form-control" name="problemDescription" required> -->
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Qty Req</label>
                        <input type="number" class="form-control nip" value="<?= $row->qtyReq ?>" name="qtyReq" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Part Number</label>
                        <input type="text" class="form-control nip" name="partNumber">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Part Description</label>
                        <input type="text" class="form-control nip" name="partDescription">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Temuan</label>
                        <input type="file" class="form-control nip" name="fotoTemuan">
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