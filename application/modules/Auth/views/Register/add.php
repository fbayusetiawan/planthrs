<?php
$id = uniqid()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register - Hasnur Riung Sinergi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logohrs.png">

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="<?= base_url() ?>">
                                            <img src="<?= base_url() ?>assets/images/logohrs.png" alt="" height="50" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">Daftar Akun</h5>
                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Create your account</h6>
                                    <p class="text-muted mt-0 mb-4">Create an account easily and start using the HRS Application.</p>

                                    <form action="<?= base_url('Auth/Register/add_action') ?>" method="Post" class="needs-validation authentication-form" novalidate>
                                        <input type="text" name="idKaryawan" value="<?= $id ?>" hidden>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">NRP </label>
                                            <input type="text" class="form-control nip" name="nrp" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Nama Lengkap Karyawan</label>
                                            <input type="text" class="form-control" name="namaKaryawan" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Tempat Lahir </label>
                                            <input type="text" class="form-control" name="tempatLahir" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Tanggal Lahir </label>
                                            <input type="date" class="form-control" name="tglLahir" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Jenis Kelamin </label>
                                            <?= form_dropdown('jk', fd_jk(), '', 'class="form-control"') ?>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">No Telepon</label>
                                            <input type="text" class="form-control" name="noTelp" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Password </label>
                                            <input type="text" class="form-control" name="password" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationCustom01">Ulangi Password </label>
                                            <input type="text" class="form-control" name="username" required>
                                            <div class="invalid-feedback">
                                                Harus diisi!
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" required id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">
                                                    I accept <a href="javascript: void(0);" class="text-success">Terms and Conditions</a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-success btn-block" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="<?= base_url('Auth/Login') ?>" class="text-success font-weight-bold ml-1">Login</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>
    <!-- App js -->
    <script src="<?= base_url() ?>assets/mask/vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

    <script src="<?= base_url() ?>assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/form-validation.init.js"></script>
    <script>
        function getprodi() {
            var fakultas = $("#fakultasid").val()
            $.ajax({
                type: 'GET',
                url: '<?= base_url("Auth/Register/ajaxProdi") ?>',
                data: "fakultas=" + fakultas,
                success: function(data) {
                    $('#prodiData').html(data)
                }
            })
        }

        $(document).ready(function() {
            getprodi();
            $('.wa').mask('0000-0000-00000');
        })
    </script>
</body>

</html>