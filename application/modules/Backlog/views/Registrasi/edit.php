<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data">

                <!-- <input type="text" name="idKaryawan" value="<?= $id ?>" hidden> -->
                <div class="form-group mb-3">
                    <label for="validationCustom01">Tanggal Temuan</label>
                    <input type="date" class="form-control" value="<?= $row->tanggalTemuan ?>" name="tanggalTemuan" required>
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
                    <label for="validationCustom01">WO Number</label>
                    <input type="number" class="form-control" value="<?= $row->woNumber ?>" name="woNumber" required>
                    <div class="invalid-feedback">
                        Harus diisi!
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="validationCustom01">No Reservasi</label>
                    <input type="number" class="form-control" value="<?= $row->noReservasi ?>" name="noReservasi" required>
                    <div class="invalid-feedback">
                        Harus diisi!
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="validationCustom01">Status Backlog</label>
                    <?= form_dropdown('statusBacklog', fd_statusBacklog(), '', 'class="form-control"') ?>
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