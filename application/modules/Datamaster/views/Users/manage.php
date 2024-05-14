<?php
$linkin = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$no = '1';
$noo = '1';
$id = $this->uri->segment(4);

?>
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <!-- <li><a href="<?= base_url($linkin . '/add') ?>" class="btn btn-success">Tambah Data</a></li> -->
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Data <?= $title ?></h4>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php foreach ($titleMenu as $title) : ?>
                    <?php
                    $this->db->where('idTitle', $title->idTitle);
                    $this->db->where('isMainMenu', '0');
                    $this->db->where('isSubMenu', '0');
                    $menu = $this->db->get('menu_main')->result();
                    ?>
                    <div class="form-group mb-5">
                        <h4><?= $title->title ?></h4>
                        <?php foreach ($menu as $menu) : ?>
                            <?php
                            $this->db->where('isMainMenu', $menu->idMenu);
                            $this->db->where('isSubMenu', '0');
                            $sub = $this->db->get('menu_main')->result();
                            ?>
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="customCheck<?= $no++ ?>" <?= check($id, $menu->idMenu) ?> onclick="addRule(<?= $menu->idMenu ?>)">
                                <label class="custom-control-label" for="customCheck<?= $noo++ ?>"> <?= $menu->label ?></label>
                                <?php foreach ($sub as $sub) : ?>
                                    <?php
                                    $this->db->where('isSubMenu', $sub->idMenu);
                                    $subsub = $this->db->get('menu_main')->result();
                                    ?>
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck<?= $no++ ?>" <?= check($id, $sub->idMenu) ?> onclick="addRule(<?= $sub->idMenu ?>)">
                                        <label class="custom-control-label" for="customCheck<?= $noo++ ?>"> <?= $sub->label ?></label>
                                        <?php foreach ($subsub as $subsub) : ?>
                                            <div class="custom-control custom-checkbox mb-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheck<?= $no++ ?>" <?= check($id, $subsub->idMenu) ?> onclick="addRule(<?= $subsub->idMenu ?>)">
                                                <label class="custom-control-label" for="customCheck<?= $noo++ ?>"> <?= $subsub->label ?></label>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->

<script>
    function addRule(idMenu) {
        console.log(idMenu);
        $.ajax({
            type: "get",
            url: "<?= base_url('Datamaster/Users/addRules/' . $id) ?>",
            data: "idMenu=" + idMenu,
            success: function(html) {

            }
        })
    }
</script>