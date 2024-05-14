<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">

            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Detail Data <?= $row->codeUnit ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <img src="<?= base_url('upload/fotounit/' . $row->fotoUnit) ?>" width="400" height="320" class="rounded mx-auto d-block mb-5" alt="">


            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <!-- <img src="<?= base_url('upload/fotounit/' . $row->fotoUnit) ?>" width="400" class="mb-5" alt=""> -->
                <table width="100%">
                    <H1><?= $row->codeUnit ?></H1>
                    <tr>
                        <th width="35%"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>EGI</th>
                        <th>: <?= $row->namaUnitModel ?></th>
                    </tr>
                    <tr>
                        <th>Section</th>
                        <th>: <?= $row->namaSection ?></th>
                    </tr>
                    <tr>
                        <th>Activity</th>
                        <th>: <?= $row->namaUnitActivity ?></th>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <th>: <?= $row->namaUnitType ?></th>
                    </tr>
                    <tr>
                        <th>Manufacturer</th>
                        <th>: <?= $row->namaUnitManufacture ?></th>
                    </tr>

                    <tr>
                        <th>SN / VIN</th>
                        <th>: <?= $row->snvin ?></th>
                    </tr>
                    <tr>
                        <th>Engine Model</th>
                        <th>: <?= $row->engineModel ?></th>
                    </tr>
                    <tr>
                        <th>ESN</th>
                        <th>: <?= $row->esn ?></th>
                    </tr>
                    <tr>
                        <th>HM Update</th>
                        <th>: <?= $row->hmUpdate ?></th>
                    </tr>
                    <tr>
                        <th>Delivery Date New Unit</th>
                        <th>: <?= tgl_indo($row->deliveryUnit) ?></th>
                    </tr>
                    <tr>
                        <th>Delivery Unit To AGM</th>
                        <th>: <?= tgl_indo($row->deliveryToAgm)  ?></th>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <th>: <?= $row->location ?></th>
                    </tr>

                </table>
                <a href="<?= base_url($linkin . '/edit/' . $row->idPopunit) ?>"> <button type="button" class="btn btn-warning btn-sm mr-1">Edit Profil</button></a>
                <a href="<?= base_url($linkin) ?>"><button type="button" class="btn btn-danger btn-sm">Kembali</button></a>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->