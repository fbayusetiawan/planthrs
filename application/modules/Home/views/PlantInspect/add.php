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
                    <!-- <input type="nrp" name="<?= $this->session->userdata("nrp") ?>" id=""> -->
                    <div class="form-group mb-3">
                        <label>Code Unit</label>
                        <input list="datalistOptions" name="codeUnit" class="form-control" data-placeholder="">
                        <datalist id="datalistOptions">
                            <option></option>
                            <?php foreach (popunit() as $row) : ?>
                                <option value="<?= $row->codeUnit ?>"><?= $row->namaUnitManufacture ?> - <?= $row->codeUnit ?></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">HM Inspect</label>
                        <input type="text" class="form-control nip" name="hmInspect" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Inspect</label>
                        <input type="date" class="form-control nip" name="tglInspect" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Rating</label>
                        <input type="text" class="form-control nip" name="rating" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Komentar</label>
                        <input type="text" class="form-control nip" name="catatanInspect" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Inspect</label>
                        <input type="file" class="form-control nip" name="fotoInspect" required>
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

<script>
    function getKaryawan() {
        var nrp = $("#nrpid").val();
        $.ajax({
            url: '<?= base_url("Admin/Toolkeeper/ajaxkaryawan") ?>',
            data: "nrp=" + nrp,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#namakaryawan').val(obj.namakaryawan);
                $('#section').val(obj.section);
                // $('#pg').val(obj.pangkatgolongan);
                // $('#devisi').val(obj.devisi);
            }
        })
    }
</script>