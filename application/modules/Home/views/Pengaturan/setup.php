<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url($linkin . '/setup_action/') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <input type="text" value="<?= $row->idKaryawan ?>" class="form-control" hidden>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nomer KTP </label>
                        <input type="text" class="form-control nip" value="<?= $row->nik ?>" autofocus name="nik" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NRP </label>
                        <input type="text" class="form-control nip" value="<?= $row->nrp ?>" name="nrp" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap Karyawan</label>
                        <input type="text" class="form-control" value="<?= $row->namaKaryawan ?>" name="namaKaryawan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tempat Lahir </label>
                        <input type="text" class="form-control" value="<?= $row->tempatLahir ?>" name="tempatLahir" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Lahir </label>
                        <input type="date" class="form-control" value="<?= $row->tglLahir ?>" name="tglLahir" required>
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
                        <label for="validationCustom01">POH</label>
                        <input type="text" class="form-control" value="<?= $row->poh ?>" name="poh" required>
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
                        <label for="validationCustom01">Site</label>
                        <select name="idSite" required class="form-control">
                            <option value="">Pilih Site</option>
                            <?php foreach (callTable('site')->result() as $site) : ?>
                                <option value="<?= $site->idSite ?>"><?= $site->namaSite ?></option>
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
                        <label for="validationCustom01">Alamat</label>
                        <input type="text" class="form-control" value="<?= $row->alamat ?>" name="alamat" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">No Telepon</label>
                        <input type="text" class="form-control" value="<?= $row->noTelp ?>" name="noTelp" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Mulai Bekerja</label>
                        <input type="date" class="form-control" value="<?= $row->hireDate ?>" name="hireDate" required>
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
                        <label for="validationCustom01">Foto (Munggunakan Seragam HRS) <small><i>(format foto jpg | jpeg | png dengan max. 5mb)</i></label>
                        <input type="file" class="form-control" name="foto">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <!-- <a href="<?= base_url($linkin . '/detail/' . $this->uri->segment(4)) ?>" class="btn btn-danger">Kembali</a> -->
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>