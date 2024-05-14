<?php
$ctrl = $this->uri->segment(1) . '/' . $this->uri->segment(2);
$id = uniqid()
?>
<div class="card">
    <div class="card-body">
        <form class="needs-validation" novalidate="" action="<?= base_url($ctrl . '/addActionPendidikan') ?>" method="post" enctype="multipart/form-data">
            
            <input type="text" name="idKaryawan" value="<?= $this->uri->segment(4) ?>" hidden>
            
            <div class="form-group mb-3">
                <label for="validationCustom01">Nama Sekolah </label>
                <input type="text" class="form-control" name="namaKeluarga" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="validationCustom01">Tanggal Masuk Sekolah </label>
                <input type="date" class="form-control" name="tglLahirKeluarga" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>    
            <div class="form-group mb-3">
                <label for="validationCustom01">No Telp.</label>
                <input type="text" class="form-control" name="kontakKeluarga" required>
                <div class="invalid-feedback">
                    Harus diisi!
                </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url($ctrl) ?>" class="btn btn-sm btn-danger">Kembali</a>
        </form>

    </div> <!-- end card-body-->
</div>
<script>
    function cekUser() {
        var user = $("#username").val();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("datamaster/Pegawai/cekUser") ?>',
            data: "user=" + user,
            success: function(data) {
                $('#info').html(data)
            }
        })
    }
</script>