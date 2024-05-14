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
                <form action="<?= base_url($linkin . '/addPartAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <input type="text" class="form-control" value="<?= $row->nrp ?>" name="nrp" hidden>
                    <input type="text" class="form-control" value="<?= $row->idBacklog ?>" name="idBacklog" hidden>
                    <input type="date" class="form-control" value="<?= $row->tglTemuan ?>" name="tglTemuan" hidden>
                    <input type="text" class="form-control" value="<?= $row->fotoTemuan ?>" name="fotoTemuan" hidden>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Problem Description</label>
                        <textarea class="form-control" rows="5" name="problemDesc" required><?= $row->problemDesc ?></textarea>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Pilih Part Number <small>material - part number - part desc - mnemonic</small></label>
                        <input list="datalistOptions1" name="idPart" required class="form-control" data-placeholder="" required>
                        <datalist id="datalistOptions1">
                            <?php foreach (callTable('soh')->result() as $so) : ?>
                                <option value="<?= $so->idPart ?>"><?= $so->material ?> - <?= $so->partNumber ?> - <?= $so->partDescription ?> - <?= $so->mnemonic ?></option>
                            <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Qty Req</label>
                        <input type="text" class="form-control" name="qtyReq">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Plan Repair</label>
                        <input type="date" class="form-control" name="planRepair">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Status Part</label>
                        <?= form_dropdown('statusPart', fd_statusPart(), '', 'class="form-control"') ?>
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