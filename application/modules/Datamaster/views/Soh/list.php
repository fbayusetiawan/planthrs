<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <div class="mt-4 mt-md-0">
                <a href="<?= base_url($linkin . '/form') ?>" class="btn btn-primary mr-4 mb-3 mb-sm-0"><i class="uil-plus mr-1"> </i>Import Excel</a>
                <div class="btn-group mb-3 mb-sm-0">
                    <a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a>
                </div>
            </div>
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table id="basic-datatable" class="table dt-responsive">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material</th>
                            <th>Part Number</th>
                            <th>Part Description</th>
                            <th>Mnemonic</th>
                            <th>Price</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->material  ?></td>
                                <td><?= $row->partNumber  ?></td>
                                <td><?= $row->partDescription  ?></td>
                                <td><?= $row->mnemonic  ?></td>
                                <td>Rp.<?= number_format($row->price, 0, ".", ",");  ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <!-- <a href="<?= base_url($linkin . '/detail/' . $row->idPart) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="uil uil-search-alt"></i></a> -->
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idPart) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idPart) ?>" id="<?= $row->partDescription ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->