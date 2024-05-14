<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="<?= base_url() ?>upload/<?= $this->session->userdata('foto'); ?>" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="<?= base_url() ?>upload/<?= $this->session->userdata('foto'); ?>" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0"><?= $this->session->userdata('nama'); ?></h6>
            <?php if ($this->session->userdata('roleId') == '2') : ?>
                <span class="pro-user-desc">Administrator</span>
            <?php elseif ($this->session->userdata('roleId') == '1') : ?>
                <span class="pro-user-desc">Admin</span>
            <?php elseif ($this->session->userdata('roleId') == '3') : ?>
                <span class="pro-user-desc">Karyawan</span>
            <?php endif ?>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="<?= base_url('Auth/Logout') ?>" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <?php
                // Title 
                $this->db->where('isActive', '1');
                $titleMenu = $this->db->get('menu_title')->result();
                foreach ($titleMenu as $row) :
                    echo '<li class="menu-title">' . $row->title . '</li>'; //title
                    $idUs = $this->session->userdata('idUser');
                    $sql = "SELECT * FROM `menu_main` WHERE idMenu in(SELECT idMenu FROM menu_rule WHERE idUser='$idUs') AND `idTitle` = '$row->idTitle' AND `isMainMenu` = '0'";
                    $menu = $this->db->query($sql)->result();
                    foreach ($menu as $menu) :
                        $sql = "SELECT * FROM `menu_main` WHERE idMenu in(SELECT idMenu FROM menu_rule WHERE idUser='$idUs') AND `isMainMenu` = '$menu->idMenu'";
                        $subMenu = $this->db->query($sql);
                        if ($subMenu->num_rows() > 0) : ?>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="<?= $menu->icon ?>"></i>
                                    <span> <?= $menu->label ?> </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <?php foreach ($subMenu->result() as $sub) : ?>
                                        <?php
                                        $sql = "SELECT * FROM `menu_main`  WHERE idMenu in(SELECT idMenu FROM menu_rule WHERE idUser='$idUs') AND `isSubMenu` = '$sub->idMenu'";
                                        $sub2Menu = $this->db->query($sql);
                                        if ($sub2Menu->num_rows() > 0) :
                                        ?>
                                            <li>
                                                <a href="javascript: void(0);">
                                                    <span><?= $sub->label ?></span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <ul class="nav-second-level" aria-expanded="false">
                                                    <?php foreach ($sub2Menu->result() as $sub2) : ?>
                                                        <li>
                                                            <a href="<?= base_url($sub2->link) ?>"><?= $sub2->label ?> </a>
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="<?= base_url($sub->link) ?>"><?= $sub->label ?> </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href=" <?= base_url($menu->link) ?>">
                                    <i data-feather="<?= $menu->icon ?>"></i>
                                    <span> <?= $menu->label ?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                <?php endforeach;
                endforeach;
                ?>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
<div class="modal fade" id="m_toolkeeper1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('laporan/teguran') ?>" method="post" target="_blank">
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Dari</label>
                        <input type="date" name="dari" value="<?= $hasilTgl ?>" class="form-control">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationCustom01">Sampai</label>
                        <input type="date" name="sampai" value="<?= $tglkemarin ?>" class="form-control">
                        <div class="invalid-feedback">
                            Harus diisi!
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
                </form>
            </div>
        </div>
    </div>
</div>