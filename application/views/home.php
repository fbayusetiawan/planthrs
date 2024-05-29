<?php $plagiat_help = $this->session->userdata('plagiat_help');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>PLANT Department HRS - AGM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logohrs.png">

    <!-- plugins -->
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/smartwizard/smart_wizard.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/smartwizard/smart_wizard_theme_arrows.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/smartwizard/smart_wizard_theme_circles.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/libs/smartwizard/smart_wizard_theme_dots.min.css" type="text/css" />

    <script src="https://cdn.tiny.cloud/1/gsn9fq6xmf4low5osf72vj61m7teoukhefmc0uyg043fjqxx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body data-layout="topnav">
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <!-- Topbar Start -->
        <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
            <div class="container-fluid">
                <!-- LOGO -->
                <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>assets/images/logohrs.png" alt="" height="50" />
                        <span class="d-inline h5 ml-1 text-logo">Hasnur Riung Sinergi Site AGM - PLANT DEPARTMENT</span>
                    </span>
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>assets/images/lppm/lppmminimalis.png" alt="" height="24">
                    </span>
                </a>

                <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                    <li class="">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i data-feather="menu" class="menu-icon"></i>
                            <i data-feather="x" class="close-icon"></i>
                        </button>
                    </li>
                </ul>

                <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                    <!-- <li class="d-none d-sm-block">
                        <div class="app-search">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span data-feather="search"></span>
                                </div>
                            </form>
                        </div>
                    </li> -->

                    <li class="dropdown notification-list align-self-center profile-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <div class="media user-profile ">
                                <img src="<?= base_url() ?>upload/fotokaryawan/<?= $this->session->userdata('foto'); ?>" alt="user-image" class="rounded-circle align-self-center" />
                                <div class="media-body text-left">
                                    <h6 class="pro-user-name ml-2 my-0">
                                        <span><?= $this->session->userdata('namaKaryawan'); ?></span>
                                        <span class="pro-user-desc text-muted d-block mt-1">NRP. <?= $this->session->userdata('nrp') ?> </span>
                                    </h6>
                                </div>
                                <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                            <a href="<?= base_url('Home/Profile/edit/' . $this->session->userdata('idKaryawan')) ?>" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="<?= base_url('Auth/Logout') ?>" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end Topbar -->

        <div class="topnav shadow-sm">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topbar-nav">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>
                            <?php if ($this->session->userdata('verifKaryawan') == 1) : ?>
                                <li>
                                    <a href="<?= base_url('Home/Profile') ?>">
                                        <i data-feather="home"></i>
                                        <span class="badge badge-success float-right">1</span>
                                        <span> Home </span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="<?= base_url('Home/Tsr') ?>">
                                        <i data-feather="truck"></i>
                                        <span class="badge badge-success float-right">1</span>
                                        <span> Technical Servoce Report </span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="javascript: void(0);">
                                        <i data-feather="monitor"></i>
                                        <span> Backlog </span>
                                        <span class="menu-arrow"></span>
                                    </a>

                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li>
                                            <a href="<?= base_url('Home/Registrasi') ?>">Open</a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('Home/Registrasi/Close') ?>">Close</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php else : ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <br>
                    <?= $this->session->flashdata('message'); ?>

                    <?= $contents ?>

                </div>
            </div>


            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <span id="tanggalwaktu"></span> &copy; Hasnur Riung Sinergi Site AGM. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <div class=" rightbar-overlay"></div>
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/moment/moment.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script> -->
    <script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- page js -->
    <!-- <script src="<?= base_url() ?>assets/js/pages/dashboard.init.js"></script> -->

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script> -->
    <script src="<?= base_url() ?>assets/libs/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/multiselect/jquery.multi-select.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script>

    <script src="<?= base_url() ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url() ?>assets/libs/smartwizard/jquery.smartWizard.min.js"></script>

    <script src="<?= base_url() ?>assets/js/pages/form-wizard.init.js"></script>
    <!-- Datatables init -->
    <script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/pages/form-advanced.init.js"></script> -->
    <script>
        $(document).ready(function() {
            $('.uang').mask('000.000.000', {
                reverse: true
            });

            $('.wa').mask('0000-0000-00000');
            $('.nip').mask('00000000000000000000');
            var NotBeforeToday = function(date) {
                var now = new Date(); //this gets the current date and time
                if (date.getFullYear() == now.getFullYear() && date.getMonth() == now.getMonth() && date.getDate() >= now.getDate() && (date.getDay() > 0 && date.getDay() < 6))
                    return [true, ""];
                if (date.getFullYear() >= now.getFullYear() && date.getMonth() > now.getMonth() && (date.getDay() > 0 && date.getDay() < 6))
                    return [true, ""];
                if (date.getFullYear() > now.getFullYear() && (date.getDay() > 0 && date.getDay() < 6))
                    return [true, ""];
                return [false, ""];
            }
            $("#basic-datepicker").datepicker({
                beforeShowDay: NotBeforeToday
            });
        })
        
    </script>
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
        else(a = tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear();
        var hari = tw.getDay();
        var bulan = tw.getMonth();
        var tanggal = tw.getDate();
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        document.getElementById("tanggalwaktu").innerHTML = tahun;
    </script>
</body>

</html>