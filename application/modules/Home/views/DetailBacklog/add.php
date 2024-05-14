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
                        <label for="validationCustom01">Problem Description</label>
                        <textarea class="form-control" rows="5" name="problemDesc" required></textarea>
                        <!-- <input type="text" class="form-control" name="problemDescription" required> -->
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Qty Req</label>
                        <input type="text" class="form-control nip" name="qtyReq">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pilih Part Number <small>material - part number - part desc - mnemonic</small></label>
                        <input list="datalistOptions1" name="idPart" required class="form-control" data-placeholder="">
                        <datalist id="datalistOptions1">
                            <option></option>
                            <?php foreach (soh() as $so) : ?>
                                <option value="<?= $so->idPart ?>"><?= $so->material ?> - <?= $so->partNumber ?> - <?= $so->partDescription ?> - <?= $so->mnemonic ?></option>
                            <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Temuan</label>
                        <input type="file" class="form-control nip" name="fotoTemuan" required>
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