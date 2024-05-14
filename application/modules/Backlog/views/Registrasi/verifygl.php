<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="row page-title">
    <div class="col-md-12">
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="basic-datatable" class="table dt-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Temuan</th>
                            <th>Code Unit</th>
                            <th>Status</th>
                            <th>Hour Meter</th>
                            <th>Problem Description</th>
                            <th>Part Description</th>
                            <th>Part Number</th>
                            <th>Qty Req</th>
                            <th>Report By</th>
                            <th>Plan Repair Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1';
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" width="80px" alt="">
                                </td>
                                <td><?= $row->codeUnit ?></td>
                                <td><?= fd_statusBacklog($row->statusBacklog)  ?></td>
                                <td><?= $row->hmUnit ?></td>
                                <td><?= $row->problemDescription ?></td>
                                <td><?= $row->partDescription ?></td>
                                <td><?= $row->partNumber ?></td>
                                <td><?= $row->qtyReq ?></td>
                                <td><?= $row->nrp ?><br>
                                <?= $row->namaKaryawan ?></td>
                                
                                <td><?= $row->planRepair ?></td>
                            </tr>
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data">

            <!-- <input type="text" name="idKaryawan" value="<?= $id ?>" hidden> -->
            <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Karyawan</label>
                        <input type="text" class="form-control" value="<?= $row->namaKaryawan ?>" disabled>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <!-- <input type="text" class="form-control" value="<?= $this->session->userdata("idSection") ?>" name="idSection" hidden> -->
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Temuan</label>
                        <input type="date" class="form-control" value="<?= $row->tanggalBacklog ?>" name="tanggalBacklog" required>
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
                                <option <?= $row->codeUnit == $unit->codeUnit ? 'selected' : '' ?> value="<?= $unit->codeUnit ?>"><?= $unit->codeUnit ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">HM Unit</label>
                        <input type="number" class="form-control" value="<?= $row->hmUnit ?>" name="hmUnit" required>
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
                        <input type="number" class="form-control" value="<?= $row->qtyReq ?>" name="qtyReq" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Part Number</label>
                        <input type="text" class="form-control" name="partNumber">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Part Description</label>
                        <input type="text" class="form-control" name="partDescription">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Foto Temuan</label>
                        <input type="file" class="form-control" name="fotoTemuan">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($linkin) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>
<script>
    function cekUser() {
        var user = $("#username").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("datamaster/Pegawai/cekUser") ?>',
            data: "user=" + user,
            success: function(data) {
                $('#info').html(data)
            }
        })
    }
</script>