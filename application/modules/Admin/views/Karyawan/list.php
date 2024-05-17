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
                            <th>Foto</th>
                            <th>NRP</th>
                            <th>Nama Karyawan</th>
                            <th>Jabatan</th>
                            <th>Hire Date</th>
                            <th>Masa Kerja</th>
                            <th>Status Akun</th>
                            <th>Key Pass</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1';
                        ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= base_url('upload/fotokaryawan/' . $row->foto) ?>" width="80px" alt=""></td>
                                <td><?= $row->nrp ?></td>
                                <td><?= $row->namaKaryawan ?></td>
                                <td><?= $row->namaSection ?> <?= $row->namaJabatan ?></td>
                                <td><?= tgl_indo($row->hireDate) ?></td>
                                <?php
                                $waktuawal = date_create($row->hireDate);
                                $waktuakhir = date_create();
                                $diff = date_diff($waktuawal, $waktuakhir);
                                ?>
                                <td><?= $diff->y ?> Tahun <?= $diff->m ?> Bulan <?= $diff->d ?> Hari</td>
                                <td><?= $row->verifKaryawan == '0' ? '<span class="badge badge-danger">Belum Aktif</span>' : '<span class="badge badge-success">Aktif</span>' ?></td>
                                <?php if ($this->session->userdata('accessUser') == '1') : ?>
                                    <td><?= $row->username ?></td>
                                <?php else : ?>
                                    <td><i>no access</i></td>
                                <?php endif ?>

                                <td class="text-center">
                                    <div class="btn-group mb-0">

                                        <?php if ($this->session->userdata('accessUser') == '1') : ?>
                                            <a href="<?= base_url($linkin . '/detail/' . $row->idKaryawan) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="uil uil-search-alt"></i></a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idKaryawan) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idKaryawan) ?>" id="<?= $row->namaKaryawan ?>" class="delete-data btn btn-info btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i></a>
                                        <?php else : ?>
                                            <a href="<?= base_url($linkin . '/detail/' . $row->idKaryawan) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="uil uil-search-alt"></i></a>
                                        <?php endif ?>
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