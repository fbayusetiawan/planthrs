<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success btn-sm">Tambah Data</a></li>
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
                            <th>Code Unit</th>
                            <th>Rating</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Problem</th>
                            <th>Hour Meter</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><b><a href="<?= base_url($linkin . '/addTemuan/' . $row->idBacklog . '/' . $row->codeUnit) ?>"><?= $row->codeUnit  ?></a></b></td>
                                <td><?= fd_rating($row->rating)  ?></td>
                                <td><?= tgl_indo($row->tanggalTemuan)  ?></td>
                                <td>
                                    <a href="#m_fotoTemuan" data-toogle="modal"><img src="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" width="80px" alt=""></a>
                                </td>
                                <td><?= $row->problemBacklog  ?></td>
                                <td><?= number_format($row->hmUnit, 0, ",", ".");  ?></td>
                                <td><?= fd_statusBacklog($row->statusBacklog)  ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/addTemuan/' . $row->idBacklog . '/' . $row->codeUnit) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Lihat Temuan"><i class="uil uil-search-alt"></i>Lihat Temuan</a>
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idBacklog) ?>" id="<?= $row->codeUnit ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
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