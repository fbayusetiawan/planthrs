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
                    <input type="text" class="form-control nip" value="<?= $this->session->userdata("idSection") ?>" name="idSection" hidden>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Temuan</label>
                        <input type="date" class="form-control nip" name="tanggalTemuan" required>
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
                        <input type="number" class="form-control nip" name="hmUnit" required>
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