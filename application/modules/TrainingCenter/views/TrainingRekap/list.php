<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
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
                            <th>NRP</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Nama Training</th>
                            <th>Awal Dinas</th>
                            <th>Akhir Dinas</th>
                            <th>Lokasi Training</th>
                            <th>Sertifikat</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1';
                        ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nrp ?></td>
                                <td><?= $row->namaKaryawan ?></td>
                                <td><?= $row->namaSection ?> <?= $row->namaJabatan ?></td>
                                <td><?= $row->namaKategoriTraining ?> <?= $row->namaTraining ?></td>
                                <td><?= tgl_indo($row->awalDinas) ?></td>
                                <td><?= tgl_indo($row->akhirDinas) ?></td>
                                <td><?= $row->lokasiTraining ?></td>
                                <?php if ($row->sertifikat == '') : ?>
                                    <td><i>Belum ada sertifikat</i></td>
                                <?php else : ?>
                                    <td><b><a href="<?= base_url('upload/sertifikat/' . $row->sertifikat) ?>" target="_blank">download</a></b></td>
                                <?php endif ?>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <a href="<?= base_url($linkin . '/detail/' . $row->idTrainingRekap) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Detail"><i class="uil uil-search-alt"></i> Tambah Karyawan</a>
                                        <a href="<?= base_url($linkin . '/edit/' . $row->idTrainingRekap) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                        <a href="<?= base_url($linkin . '/delete/' . $row->idTrainingRekap) ?>" id="<?= $row->namaTraining ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
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