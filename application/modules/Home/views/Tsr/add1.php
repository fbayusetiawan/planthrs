<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
        </nav>
        <h4 class="mb-1 mt-0">Tambah Data <?= $title ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <form action="<?= base_url($linkin . '/addAction') ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">NRP </label>
                        <input type="text" name="nrp" value="<?= $this->session->userdata('nrp') ?>" class="form-control" readonly>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Nama</label>
                        <input type="text" value="<?= $this->session->userdata('namaKaryawan') ?>" class="form-control" readonly>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Upload gambar <small>(upload gambar komponen yang mengalami kerusakan)</small></label>
                        <input type="file" class="form-control" name="password" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">WO Number <small>(WO Number yang sesuai dengan bulan sekarang)</small></label>
                        <input type="text" class="form-control" placeholder="WO Number harus 12 angka" data-parsley-minlength="12" name="email" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pilih Code Unit</label>
                        <input list="datalistOptions1" name="codeUnit" required class="form-control" data-placeholder="">
                        <datalist id="datalistOptions1">
                            <option></option>
                            <?php foreach (popunit() as $unit) : ?>
                                <option value="<?= $unit->codeUnit ?>"><?= $unit->codeUnit ?> - <?= $unit->namaUnitModel ?></option>
                            <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Lokasi</label>
                        <select name="idLokasi" required class="form-control">
                            <option value="">Pilih Lokasi</option>
                            <?php foreach (callTable('tsr_lokasi')->result() as $tsr) : ?>
                                <option value="<?= $tsr->idLokasi ?>"><?= $tsr->namaLokasi ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Jenis Pekerjaan</label>
                        <select name="idPekerjaan" required class="form-control">
                            <option value="">Pilih Jenis Pekerjaan</option>
                            <?php foreach (callTable('tsr_pekerjaan')->result() as $tsr) : ?>
                                <option value="<?= $tsr->idPekerjaan ?>"><?= $tsr->namaPekerjaan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Kondisi Permukaan</label>
                        <select name="idKondisiPermukaan" required class="form-control">
                            <option value="">Pilih Kondisi Permukaan</option>
                            <?php foreach (callTable('tsr_kondisi_permukaan')->result() as $tsr) : ?>
                                <option value="<?= $tsr->idKondisiPermukaan ?>"><?= $tsr->namaKondisiPermukaan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Karakter</label>
                        <select name="idKarakter" required class="form-control">
                            <option value="">Pilih Karakter</option>
                            <?php foreach (callTable('tsr_karakter')->result() as $tsr) : ?>
                                <option value="<?= $tsr->idKarakter ?>"><?= $tsr->namaKarakter ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Kode Unit</label>
                        <select name="idKdUnit" required class="form-control">
                            <option value="">Pilih Kode Unit</option>
                            <?php foreach (callTable('tsr_kodeunit')->result() as $tsr) : ?>
                                <option value="<?= $tsr->idKdUnit ?>"><?= $tsr->namaKdUnit ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Tabel Operasi</label>
                        <select name="idTabelOperasi" required class="form-control">
                            <option value="">Pilih Tabel Operasi</option>
                            <?php foreach (callTable('tsr_tabeloperasi')->result() as $tsr) : ?>
                                <option value="<?= $tsr->idTabelOperasi ?>"><?= $tsr->namaTabelOperasi ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Harus dipilih!
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>