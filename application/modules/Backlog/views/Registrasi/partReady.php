<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <!-- <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success btn-sm">Tambah Data</a></li>
            </ol>
        </nav> -->
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
                            <th>Foto Temuan</th>
                            <th>Material</th>
                            <th>Part Number</th>
                            <th>Part Description</th>
                            <th>Qty Req</th>
                            <th>Price</th>
                            <th>Plan Repair</th>
                            <th>Status</th>
                                
                            <th>Report By</th>
                            <th class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = '1'; ?>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><b><a href="<?= base_url($linkin . '/addTemuan/' . $row->idBacklog . '/' . $row->codeUnit) ?>"><?= $row->codeUnit  ?></a></b></td>
                                <td>
                                    <a href="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" target="_blank"><img src="<?= base_url('upload/fotoTemuan/' . $row->fotoTemuan) ?>" width="80px" alt=""></a>
                                </td>
                                <td><?= $row->material  ?></td>
                                <td><?= $row->partNumber  ?></td>
                                <td><?= $row->partDescription  ?></td>
                                <td><?= $row->qtyReq  ?></td>
                                <?php
                                $total = $row->qtyReq * $row->price;
                                ?>
                                <td>Rp.<?= number_format($total, 0, ",", ".");  ?></td>
                                <?php if ($row->planRepair == '0000-00-00') : ?>
                                    <td>-</td>
                                <?php else : ?>
                                    <td><?= tgl_indo($row->planRepair) ?></td>
                                <?php endif ?>

                                <td><?= fd_statusPart($row->statusPart)  ?></td>
                                
                                <td><b><?= $row->nrp  ?></b><br>
                                    <?= $row->namaKaryawan  ?></td>
                                <td class="text-center">
                                    <div class="btn-group mb-0">
                                        <?php if ($this->session->userdata('username') == 'gl-small') : ?>

                                            <a href="<?= base_url($linkin . '/verifgl/' . $row->idDetailBacklog) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Verif GL"><i class="uil uil-check-square"></i> Verif GL</a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
                                        <?php elseif ($this->session->userdata('username') == 'sect-small') : ?>
                                            <!--  -->
                                            <a href="<?= base_url('Backlog/DetailBacklog/verifsectionAction/' . $row->idDetailBacklog) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Verif Sect. Head"><i class="uil uil-check-square"></i> Verif Sect. Head</a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
                                        <?php elseif ($this->session->userdata('username') == 'gl-planner') : ?>
                                            <a href="<?= base_url($linkin . '/verifplanner/' . $row->idDetailBacklog) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Verif Planner"><i class="uil uil-check-square"></i> Verif Planner</a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
                                        <?php elseif ($this->session->userdata('username') == 'adm-plt') : ?>
                                            <a href="<?= base_url($linkin . '/verifadm/' . $row->idDetailBacklog) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Verif Admin"><i class="uil uil-check-square"></i> Verif Admin</a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
                                        <?php elseif ($this->session->userdata('username') == 'admin') : ?>

                                            <a href="<?= base_url($linkin . '/verifgl/' . $row->idDetailBacklog) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Verif GL"><i class="uil uil-check-square"></i> Verif GL</a>
                                            <a href="<?= base_url('Backlog/DetailBacklog/verifsectionAction/' . $row->idDetailBacklog) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Verif Sect. Head"><i class="uil uil-check-square"></i> Verif Sect. Head</a>
                                            <a href="<?= base_url($linkin . '/verifplanner/' . $row->idDetailBacklog) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Verif Planner"><i class="uil uil-check-square"></i> Verif Planner</a>
                                            <a href="<?= base_url($linkin . '/verifadm/' . $row->idDetailBacklog) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Verif Admin"><i class="uil uil-check-square"></i> Verif Admin</a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
                                        <?php else : ?>
                                            <a href="<?= base_url($linkin . '/addPart/' . $row->idDetailBacklog . '/' . $row->problemDesc) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Add Part</a>
                                            <a href="<?= base_url($linkin . '/edit/' . $row->idDetailBacklog) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit"><i class="uil uil-edit"></i> Edit</a>
                                            <a href="<?= base_url($linkin . '/delete/' . $row->idDetailBacklog) ?>" id="<?= $row->problemDesc ?>" class="delete-data btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><i class="uil uil-trash-alt"></i> Hapus</a>
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