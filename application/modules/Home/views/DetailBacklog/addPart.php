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
                        <label>Pilih Part Number <small>material - part number - part desc - mnemonic</small> <span class="text-danger font-weight-bold font-size-13">*</span></label>
                        <input list="datalistOptions1" name="idPart" required class="form-control" id="idPart" onkeyup="getpart()" data-placeholder="">
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
                        <div class="row">
                            <div class="col-4">
                                <label for="validationCustom01">Material</label>
                                <input type="text" class="form-control" readonly id="material">
                            </div>
                            <div class="col-4">
                                <label for="validationCustom01">Part Number</label>
                                <input type="text" class="form-control" readonly id="partNumber">
                            </div>
                            <div class="col-4">
                                <label for="validationCustom01">Part Desc</label>
                                <input type="text" class="form-control" readonly id="partDescription">
                            </div>
                            <input type="text" class="form-control" hidden id="price" name="price">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Qty Req <span class="text-danger font-weight-bold font-size-13">*</span></label>
                        <input type="text" class="form-control" name="qtyReq">
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
<script>
    function getpart() {
        var idPart = $("#idPart").val();
        $.ajax({
            url: '<?= base_url("Backlog/DetailBacklog/ajaxpart") ?>',
            data: "idPart=" + idPart,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                $('#material').val(obj.material);
                $('#partNumber').val(obj.partNumber);
                $('#partDescription').val(obj.partDescription);
                $('#price').val(obj.price);
            }
        })
    }
</script>