 required<?php
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

                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <div id="smartwizard-dots">
                                <ul>
                                    <li><a href="#sw-dots-step-1">Account<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-2">Picture / Illustration<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-3">Report<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-4">Equipment Identity<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-5">Application<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-6">Environment<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-7">Operation<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-8">Trouble Code<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-9">Main Part Causing The Problem<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-10">Descripton<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-11">Addtional Code<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-12">Validation<small class="d-block">Step description</small></a></li>
                                    <li><a href="#sw-dots-step-13">Finish<small class="d-block">Step description</small></a></li>
                                </ul>

                                <div class="p-3">
                                    <div id="sw-dots-step-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-nrp">NRP</label>
                                                    <input type="text" class="form-control" id="sw-dots-nrp" name="nrp" value="<?= $this->session->userdata('nrp') ?>" readonly>

                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-nama"> Nama</label>
                                                    <input type="text" value="<?= $this->session->userdata('namaKaryawan') ?>" id="sw-dots-nama" class="form-control" readonly>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-upload-gambar">Upload Gambar <small>gunakan gambar / foto part yang rusak</small></label>
                                                    <input type="file" id="sw-dots-upload-gambar" class="form-control" required>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-report-date">Report Date</label>
                                                    <input type="date" id="sw-dots-report-date" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-wo-number">WO Number <small>WO Number harus berisikan 12 angka</small></label>
                                                    <input type="text" name="woNumber" id="sw-dots-wo-number" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">Equipment Group Identification (EGI)</label>
                                                    <select name="idUnitModel" required class="form-control">
                                                        <option value="">Pilih EGI</option>
                                                        <?php foreach (callTable('unit_model')->result() as $egi) : ?>
                                                            <option value="<?= $egi->idUnitModel ?>"><?= $egi->namaUnitModel ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">Code Equipment</label>
                                                    <select name="codeUnit" required class="form-control">
                                                        <option value="">Pilih Code Unit</option>
                                                        <?php foreach (callTable('popunit')->result() as $unitCode) : ?>
                                                            <option value="<?= $unitCode->codeUnit ?>"><?= $unitCode->codeUnit ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-5">
                                        <div class="row">
                                            <div class="col-12">
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
                                                    <label for="validationCustom01">Pekerjaan</label>
                                                    <select name="idPekerjaan" required class="form-control">
                                                        <option value="">Pilih Pekerjaan</option>
                                                        <?php foreach (callTable('tsr_pekerjaan')->result() as $tsr) : ?>
                                                            <option value="<?= $tsr->idPekerjaan ?>"><?= $tsr->namaPekerjaan ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Harus dipilih!
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-7">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-11">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="sw-dots-first-name">First name</label>
                                                    <input type="text" id="sw-dots-first-name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sw-dots-last-name">Last name</label>
                                                    <input type="text" id="sw-dots-last-name" class="form-control">
                                                </div>

                                                <div class="form-group mb-0">
                                                    <label for="sw-dots-email">Email</label>
                                                    <input type="email" id="sw-dots-email" class="form-control">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                    <div id="sw-dots-step-13">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <div class="mb-3">
                                                        <i class="uil uil-check-square text-success h2"></i>
                                                    </div>
                                                    <h3>Thank you !</h3>

                                                    <p class="w-75 mb-2 mx-auto text-muted">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                        mattis dictum aliquet.</p>

                                                    <div class="mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="sm-dots-customCheck">
                                                            <label class="custom-control-label" for="sm-dots-customCheck">I agree with the Terms and Conditions</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>