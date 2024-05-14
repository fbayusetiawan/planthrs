<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-primary btn-sm">Tambah Data Temuan</a></li>
            </ol>
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
                            <th>Foto</th>
                            <th>Problem Description</th>
                            <th>Part Number</th>
                            <th>Part Description</th>
                            <th>Qty Req</th>
                            <th>Status</th>
                            <th>Status Verify</th>
                            <th>Report By</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <a href="#m_fotoTemuan" data-toogle="modal"><img src="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" width="80px" alt=""></a>
                                </td>
                                <td><?= $row->problemDesc  ?></td>
                                <td><?= $row->partNumber  ?></td>
                                <td><?= $row->partDescription  ?></td>
                                <td><?= $row->qtyReq  ?></td>
                                <td><?= fd_statusPart($row->statusPart)  ?></td>
                                <td><?= fd_statusVerif($row->verifyTemuan)  ?></td>
                                <td><b><?= $row->nrp  ?></b><br>
                                    <?= $row->namaKaryawan  ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i>Edit</a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i>Hapus</a>
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
<div class="modal fade" id="m_fotoTemuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto Temuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <img src="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" width="250" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Print</button> -->
                </form>
            </div>
        </div>
    </div>
</div>