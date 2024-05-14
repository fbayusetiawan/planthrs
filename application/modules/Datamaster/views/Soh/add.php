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
                <label for="validationCustom01">Part Number</label>
                <input type="text" class="form-control" name="partNumber" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Part Description</label>
                <input type="text" class="form-control" name="partDescription" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Mnemonic</label>
                <input type="text" class="form-control" name="mnemonic" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Material</label>
                <input type="text" class="form-control" name="material" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Price</label>
                <input type="number" class="form-control" name="price" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($ctrl) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>