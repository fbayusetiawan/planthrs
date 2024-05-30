<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <div class="mt-4 mt-md-0">

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
                            <th>Foto Unit</th>
                            <th>Manufacturer</th>
                            <th>Code Unit</th>
                            <th>EGI</th>
                            <!-- <th>Delivery Unit Baru</th>
                            <th>Delivery To AGM</th> -->
                            <th>Location</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="<?= base_url('upload/fotounit/' . $row->fotoUnit) ?>" width="80px" alt="">
                                </td>
                                <td><?= $row->namaUnitManufacture  ?></td>
                                <td><b><?= $row->codeUnit ?></b></td>
                                <td><?= $row->namaUnitModel  ?></td>
                                <!-- <td><?= tgl_indo($row->deliveryUnit) ?></td>
                                <td><?= tgl_indo($row->deliveryToAgm)  ?></td> -->
                                <td><?= $row->location ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/detail/' . $row->idPopunit) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="uil uil-search-alt"></i> Detail</a>
                                        <!-- <a href="<?= base_url($linkin . '/edit/' . $row->idPopunit) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idPopunit) ?>" id="<?= $row->codeUnit ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a> -->
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