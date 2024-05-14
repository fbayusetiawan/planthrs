<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
?>

<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <!-- <ol class="breadcrumb">
                <li><a href="<?= base_url($ctrl . '/add') ?>" class="btn btn-success">Tambah Data</a></li>
            </ol> -->
        </nav>
        <h4 class="mb-1 mt-0">Edit Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate="" action="<?= base_url($linkin . '/editAction/' . $this->uri->segment(4)) ?>" method="post">

                    <div class="form-group mb-3">
                        <label for="validationCustom01">ID Menu</label>
                        <input type="text" class="form-control" value="<?= $row->idMenu ?>" name="idMenu" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Title</label>
                        <?= cmb_dinamis('idTitle', 'menu_title', 'title', 'idTitle', $row->idTitle) ?>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Label</label>
                        <input type="text" class="form-control" value="<?= $row->label ?>" name="label" id="validationCustom01" required>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Link</label>
                        <input type="text" class="form-control" value="<?= $row->link ?>" name="link" id="validationCustom01">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Icon</label>
                        <input type="text" class="form-control" value="<?= $row->icon ?>" name="icon" id="validationCustom01">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Is Main Menu</label>
                        <Select name="isMainMenu" class="form-control">
                            <option value="0">Main Menu</option>
                            <?php foreach ($menu as $menu) : ?>
                                <option <?= $row->isMainMenu == $menu->idMenu ? 'selected' : '' ?> value="<?= $menu->idMenu ?>"><?= $menu->label ?></option>
                            <?php endforeach ?>
                        </Select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Is Sub Menu</label>
                        <Select name="isSubMenu" class="form-control">
                            <option value="0">Main Menu</option>
                            <?php foreach ($subMenu1 as $sub1) : ?>
                                <option <?= $row->isSubMenu == $sub1->idMenu ? 'selected' : '' ?> value="<?= $sub1->idMenu ?>"><?= $sub1->label ?></option>
                            <?php endforeach ?>
                        </Select>
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url($linkin) ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>