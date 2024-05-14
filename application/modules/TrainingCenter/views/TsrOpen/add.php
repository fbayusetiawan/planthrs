<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($ctrl . '/addAction') ?>" method="post" enctype="multipart/form-data">

            <input type="text" name="idKaryawan" value="<?= $id ?>" hidden>
            <div class="form-group mb-3">
                <label for="validationCustom01">Nomer KTP </label>
                <input type="text" class="form-control nip" autofocus name="nik" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">NRP </label>
                <input type="text" class="form-control nip" name="nrp" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Nama Lengkap Karyawan</label>
                <input type="text" class="form-control" name="namaKaryawan" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Tempat Lahir </label>
                <input type="text" class="form-control" name="tempatLahir" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Tanggal Lahir </label>
                <input type="date" class="form-control" name="tglLahir" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Status Karyawan</label>
                <?= form_dropdown('statusKaryawan', fd_karyawan(), '', 'class="form-control" id="kerja" onchange="getKerja()"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Jenis Status Karyawan </label>
                <?= form_dropdown('employeeType', fd_statusEmployee(), '', 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Jenis Kelamin </label>
                <?= form_dropdown('jk', fd_jk(), '', 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Agama </label>
                <?= form_dropdown('agama', fd_agama(), '', 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Status Hubungan</label>
                <?= form_dropdown('statusMenikah', fd_statusMenikah(), '', 'class="form-control"') ?>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="validationCustom01">Jabatan</label>
                <select name="idJabatan" required class="form-control">
                    <option value="">Pilih Jabatan</option>
                    <?php foreach (callTable('jabatan')->result() as $jabatan) : ?>
                        <option value="<?= $jabatan->idJabatan ?>"><?= $jabatan->namaJabatan ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Golongan</label>
                <select name="idGolongan" required class="form-control">
                    <option value="">Pilih Golongan</option>
                    <?php foreach (callTable('golongan')->result() as $golongan) : ?>
                        <option value="<?= $golongan->idGolongan ?>"><?= $golongan->namaGolongan ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Section</label>
                <select name="idSection" required class="form-control">
                    <option value="">Pilih Section</option>
                    <?php foreach (callTable('section')->result() as $section) : ?>
                        <option value="<?= $section->idSection ?>"><?= $section->namaSection ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Job Site</label>
                <select name="idSite" required class="form-control">
                    <option value="">Pilih Job Site</option>
                    <?php foreach (callTable('site')->result() as $site) : ?>
                        <option value="<?= $site->idSite ?>"><?= $site->namaSite ?> (<?= $site->ketSite ?>)</option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Kebangsaan</label>
                <input type="text" class="form-control" name="kebangsaan" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">No Telepon</label>
                <input type="text" class="form-control" name="noTelp" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">POH</label>
                <input type="text" class="form-control" name="poh" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Tanggal Mulai Bekerja</label>
                <input type="date" class="form-control" name="hireDate" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div id="selesaikerja"></div>

            <div class="form-group mb-3">
                <label for="validationCustom01">Password </label>
                <input type="text" class="form-control" name="password" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Ulangi Password </label>
                <input type="text" class="form-control" name="username" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Foto </label>
                <input type="file" class="form-control" name="foto">
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($ctrl) ?>" class="btn btn-sm btn-danger">Kembali</a>
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