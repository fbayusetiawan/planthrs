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
        <h4 class="mb-1 mt-0">Tambah Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url($linkin . '/addAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Komponen</label>
                                    <select name="idKomponenMayor" required class="form-control">
                                        <option value="">Pilih Komponen</option>
                                            <?php foreach (callTable('komponen_mayor')->result() as $komponen_mayor) : ?>
                                                    <option value="<?= $komponen_mayor->idKomponenMayor ?>"><?= $komponen_mayor->idKomponenMayor ?> - <?= $komponen_mayor->namaKomponenMayor ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                <div class="invalid-feedback">
                                    Harus dipilih!
                                </div>
                            </div>
                            
                            <div class="form-group row">

                            </div>
                            </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Id Sub Komponen</label>
                                    <input type="text" class="form-control" name="idSubKomponenMayor" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Sub Komponen</label>
                                    <input type="text" class="form-control" name="namaSubKomponenMayor" required>
                                <div class="invalid-feedback">
                                    Harus diisi!
                                </div>
                            </div>
                        </div>
                    </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body -->
            </form>




        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col-->
</div>