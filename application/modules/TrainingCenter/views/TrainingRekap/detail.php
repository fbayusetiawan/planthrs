<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/addKaryawanAction/' . $this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="validationCustom01">NRP</label>
                <input type="text" class="form-control" name="nrp" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <!-- <div class="form-group mb-3">
                <label for="validationCustom01">Nama Karyawan</label>
                <input type="text" class="form-control" name="namaKaryawan" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Jabatan</label>
                <input type="text" class="form-control" name="tempatLahir" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div> -->

            <div class="form-group mb-3">
                <label for="validationCustom01">Kategori</label>
                <select name="idTrainingKategori" required class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach (callTable('training_kategori')->result() as $training) : ?>
                        <option value="<?= $training->idTrainingKategori ?>"><?= $training->namaKategoriTraining ?> - <?= $training->ket ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Nama Training</label>
                <input type="text" class="form-control" value="<?= $row->namaTraining ?>" name="namaTraining" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Penyelenggara</label>
                <input type="text" class="form-control" value="<?= $row->penyelenggara ?>" name="penyelenggara" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Awal Dinas</label>
                <input type="date" class="form-control" value="<?= $row->awalDinas ?>" name="awalDinas" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Akhir Dinas</label>
                <input type="date" class="form-control" value="<?= $row->akhirDinas ?>" name="akhirDinas" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Lokasi Training</label>
                <input type="text" class="form-control" value="<?= $row->lokasiTraining ?>" name="lokasiTraining" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Sertifikat</label>
                <input type="file" class="form-control" name="sertifikat">
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