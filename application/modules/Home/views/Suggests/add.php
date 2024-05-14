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
                    <input type="idKaryawan" name="<?= $this->session->userdata("idKaryawan") ?>" id="" hidden>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NRP</label>
                        <input type="text" class="form-control nip" name="<?= $this->session->userdata("nrp") ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama Karyawan</label>
                        <input type="text" class="form-control nip" name="<?= $this->session->userdata("nrp") ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jabatan</label>
                        <input type="text" class="form-control nip" name="<?= $this->session->userdata("nrp") ?>" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Pertanyaan</label>
                        <input type="text" class="form-control nip" name="pertanyaan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Judul Ide</label>
                        <input type="text" class="form-control nip" name="judulIde" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tanggal Usulan</label>
                        <input type="date" class="form-control nip" name="tanggalUsulan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Lokasi Penemuan</label>
                        <input type="text" class="form-control nip" name="lokasiPenemuan" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Masalah</label>
                        <input type="text" class="form-control nip" name="masalah" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Uraian Masalah</label>
                        <input type="text" class="form-control nip" name="uraianMasalah" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">ide</label>
                        <input type="text" class="form-control nip" name="ide" required>
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