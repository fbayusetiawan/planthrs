<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$pemb = strtolower($this->uri->segment(4));
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($ctrl . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Edit <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nomer KTP </label>
                        <input type="text" class="form-control nip" autofocus name="nik" value="<?= $profile->nik ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NRP </label>
                        <input type="text" class="form-control nip" name="nrp" value="<?= $profile->nrp ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Lengkap Karyawan</label>
                        <input type="text" class="form-control" name="namaKaryawan" value="<?= $profile->namaKaryawan ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tempat Lahir </label>
                        <input type="text" class="form-control" name="tempatLahir" value="<?= $profile->tempatLahir ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Lahir </label>
                        <input type="date" class="form-control" name="tglLahir" value="<?= $profile->tglLahir ?>" required>
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
                        <label for="validationCustom01">Status Karyawan</label>
                        <?= form_dropdown('statusKaryawan', fd_karyawan(), '', 'class="form-control"') ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jabatan</label>
                        <?= cmb_dinamis('idJabatan', 'jabatan', 'namaJabatan', 'idJabatan', $profile->idJabatan) ?>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Golongan</label>
                        <?= cmb_dinamis('idGolongan', 'golongan', 'namaGolongan', 'idGolongan', $profile->idGolongan) ?>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Section</label>
                        <?= cmb_dinamis('idSection', 'section', 'namaSection', 'idSection', $profile->idSection) ?>
                        <div class="invalid-feedback">
                            Harus di isi.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $profile->alamat ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">No Telepon</label>
                        <input type="text" class="form-control" name="noTelp" value="<?= $profile->noTelp ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">POH</label>
                        <input type="text" class="form-control" name="poh" value="<?= $profile->poh ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Mulai Bekerja</label>
                        <input type="date" class="form-control" name="hireDate" value="<?= $profile->hireDate ?>" required>
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

                    <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn-sm btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>