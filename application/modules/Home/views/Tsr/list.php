<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add1') ?>" class="btn btn-success btn-sm">Tambah Data</a></li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4>Technical Service Report</h4>
                <p>Disusun untuk mendefinisikan atau melaporkan hasil temuan kerusakan pada unit Pertambangan dan bertujuan untuk mencegah terjadinya kerusakan yang berulang.
                </p>
            </div>
        </div>
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
                            <th>Report Date</th>
                            <th>WO Number</th>
                            <th>Code/EGI Unit</th>
                            <th>Trouble</th>
                            <th>Caused</th>
                            <th>Analyze</th>
                            <th>Action</th>
                            <th>Preventive</th>
                            <th width="100" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->pertanyaan ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <?php if ($row->status == '1') : ?>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idScreening) ?>" class="btn btn-info btn-sm" disabled data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></a>
                                        <?php else : ?>
                                            <button class="btn-dark btn-sm" disabled data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i></button>
                                            <!-- <a href="<?= base_url($linkin . '/formulir/' . $row->nim) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Download Formulir"><i class="uil uil-download-alt"></i></a> -->
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