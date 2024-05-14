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
                <table id="basic-datatable" class="table dt-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Problem Description</th>
                            <!-- <th>Part Number</th> -->
                            <th>Part Description</th>
                            <th>Qty Req</th>
                            <th>Price</th>
                            <th>Plan Repair</th>
                            <th>Status</th>
                            <th>Status Verify</th>
                            <th>Report By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <a href="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" target="_blank"><img src="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" width="80px" alt=""></a>
                            </td>
                            <td><?= $row->problemDesc  ?></td>
                            <?php if ($row->verifyTemuan == '1') : ?>
                                <td><?= $row->partDesc  ?></td>
                            <?php else : ?>
                                <td>Part Number : <?= $row->partNumber  ?><br>
                                    Part Desc : <?= $row->partDescription  ?><br>
                                    Material : <?= $row->material  ?><br>
                                    Mnemonic : <?= $row->mnemonic  ?><br>
                                    price : Rp.<?= number_format($row->price, 0, ",", ".");  ?><br></td>
                            <?php endif ?>
                            <?php
                            $total = $row->qtyReq * $row->price;
                            ?>
                            <td><?= $row->qtyReq  ?></td>
                            <td>Rp.<?= number_format($total, 0, ",", ".");  ?></td>

                            <?php if ($row->planRepair == '0000-00-00') : ?>
                                <td>-</td>
                            <?php else : ?>
                                <td><?= tgl_indo($row->planRepair)  ?></td>
                            <?php endif ?>
                            <td><?= fd_statusPart($row->statusPart)  ?></td>
                            <td><?= fd_statusVerif($row->verifyTemuan)  ?></td>
                            <td><b><?= $row->nrp  ?></b><br>
                                <?= $row->namaKaryawan  ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body">

                <form action="<?= base_url($linkin . '/verifplannerAction/' . $this->uri->segment(4)) ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>


                    <div class="form-group mb-3">
                        <label>Pilih Part Number <small>material - part number - part desc - mnemonic</small></label>
                        <input list="datalistOptions1" name="idPart" required class="form-control" data-placeholder="" required>
                        <datalist id="datalistOptions1">
                            <!-- <option></option> -->
                            <?php foreach (callTable('soh')->result() as $so) : ?>
                                <option <?= $row->idPart == $so->idPart ? 'selected' : '' ?> value="<?= $so->idPart ?>"><?= $so->material ?> - <?= $so->partNumber ?> - <?= $so->partDescription ?> - <?= $so->mnemonic ?></option>
                            <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Qty Req</label>
                        <input type="text" class="form-control" value="<?= $row->qtyReq ?>" name="qtyReq">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Plan Repair</label>
                        <input type="date" class="form-control" value="<?= $row->planRepair ?>" name="planRepair">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Status Part</label>
                        <?= form_dropdown('statusPart', fd_statusPart(), '', 'class="form-control"') ?>
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