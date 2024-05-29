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
                            <th>Part Number</th>
                            <th>Part Description</th>
                            <th>Qty Req</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Status Verify</th>
                            <th>Report By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->partNumber  ?></td>
                                <td><?= $row->partDescription  ?></td>
                                <td><?= $row->qtyReq  ?></td>
                                <?php
                                $total = $row->qtyReq * $row->price;
                                ?>
                                <td>Rp.<?= number_format($total, 0, ",", ".");  ?></td>
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
                        <label for="validationCustom01">Status Part</label>
                        <?= form_dropdown('statusPart', fd_statusPart(), $row->statusPart, 'class="form-control"') ?>
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