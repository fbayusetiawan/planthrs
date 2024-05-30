<script>

</script>
<h3>Form Import Data Karyawan</h3>
<hr>

<a href="<?php echo base_url("assets/excel/format.xlsx"); ?>">Download Format</a>
<br>
<br>

<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
<form method="post" action="<?php echo base_url("Admin/Karyawan/Form"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">

    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
</form>
<br>
<?php
if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form 
    if (isset($upload_error)) { // Jika proses upload gagal
        echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
        die; // stop skrip
    }

    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='" . base_url("Admin/Karyawan/import") . "'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";

    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='6'><center>PREVIEW DATA</center></th>
    </tr>
    <tr>
      <th>NRP</th>
      <th>NAMA LENGKAP</th>
      <th>ID SITE</th>
      <th>ID SECTION</th>
      <th>ID JABATAN</th>
      <th>USERNAME</th>
      <th>PASSWORD</th>
      <th>VERIF KARYAWAN</th>
      <th>FOTO</th>
      <th>ROLE ID</th>
      <th>ISACTIVE</th>
      <th>TSR</th>
      <th>HIRE DATE</th>
      <th>ALAMAT</th>
      <th>STATUS</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach ($sheet as $row) {

        $idKaryawan = uniqid();
        $nrp = $row['A'];
        $namaKaryawan = $row['B'];
        $idSite = $row['C'];
        $idSection = $row['D'];
        $idJabatan = $row['E'];
        $username = $row['F'];
        $password = $row['G'];
        $verifKaryawan = $row['H'];
        $foto = $row['I'];
        $roleId = $row['J'];
        $isActive = $row['K'];
        $targetTsr = $row['L'];
        $hireDate = $row['M'];
        $alamat = $row['N'];
        $statusKaryawan = $row['O'];

        // Cek jika semua data tidak diisi
        if ($nrp == "" && $namaKaryawan == "" && $idSite == "" && $idKaryawan == "" && $idSection == "" && $idJabatan == "" && $username == "" && $password == "" && $verifKaryawan == "" && $foto == "" && $roleId == "" && $isActive == "" && $targetTsr == "" && $hireDate == "" && $alamat == ""&& $statusKaryawan == "")
            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

        // Cek $numrow apakah lebih dari 1
        // Artinya karena baris pertama adalah nama-nama kolom
        // Jadi dilewat saja, tidak usah diimport
        if ($numrow > 1) {
            // Validasi apakah semua data telah diisi
            $nrp_td = (!empty($nrp)) ? "" : " style='background: #E07171;'"; 
            $namaKaryawan_td = (!empty($namaKaryawan)) ? "" : " style='background: #E07171;'"; 
            $idSite_td = (!empty($idSite)) ? "" : " style='background: #E07171;'"; 
            $idSection_td = (!empty($idSection)) ? "" : " style='background: #E07171;'"; 
            $idJabatan_td = (!empty($idJabatan)) ? "" : " style='background: #E07171;'"; 
            $username_td = (!empty($username)) ? "" : " style='background: #E07171;'"; 
            $password_td = (!empty($password)) ? "" : " style='background: #E07171;'"; 
            $verifKaryawan_td = (!empty($verifKaryawan)) ? "" : " style='background: #E07171;'"; 
            $foto_td = (!empty($foto)) ? "" : " style='background: #E07171;'"; 
            $roleId_td = (!empty($roleId)) ? "" : " style='background: #E07171;'"; 
            $isActive_td = (!empty($isActive)) ? "" : " style='background: #E07171;'"; 
            $targetTsr_td = (!empty($targetTsr)) ? "" : " style='background: #E07171;'"; 
            $hireDate_td = (!empty($hireDate)) ? "" : " style='background: #E07171;'"; 
            $alamat_td = (!empty($alamat)) ? "" : " style='background: #E07171;'"; 
            $statusKaryawan_td = (!empty($statusKaryawan)) ? "" : " style='background: #E07171;'"; 

            // Jika salah satu data ada yang kosong
            if ($nrp == "" or $namaKaryawan == "" or $idSite == "" or $idKaryawan == "" or $idSection =="" or $idJabatan =="" or $username =="" or $password =="" or $verifKaryawan =="" or $foto =="" or $roleId =="" or $isActive =="" or $targetTsr =="" or $hireDate =="" or $alamat == ""or $statusKaryawan == "") {
                $kosong++; // Tambah 1 variabel $kosong
            }

            echo "<tr>";
            echo "<td" . $nrp_td . ">" . $nrp . "</td>";
            echo "<td" . $namaKaryawan_td . ">" . $namaKaryawan . "</td>";
            echo "<td" . $idSite_td . ">" . $idSite . "</td>";
            echo "<td" . $idSection_td . ">" . $idSection . "</td>";
            echo "<td" . $idJabatan_td . ">" . $idJabatan . "</td>";
            echo "<td" . $username_td . ">" . $username . "</td>";
            echo "<td" . $password_td . ">" . $password . "</td>";
            echo "<td" . $verifKaryawan_td . ">" . $verifKaryawan . "</td>";
            echo "<td" . $foto_td . ">" . $foto . "</td>";
            echo "<td" . $roleId_td . ">" . $roleId . "</td>";
            echo "<td" . $isActive_td . ">" . $isActive . "</td>";
            echo "<td" . $targetTsr_td . ">" . $targetTsr . "</td>";
            echo "<td" . $hireDate_td . ">" . $hireDate . "</td>";
            echo "<td" . $alamat_td . ">" . $alamat . "</td>";
            echo "<td" . $statusKaryawan_td . ">" . $statusKaryawan . "</td>";
            echo "</tr>";
        }

        $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if ($kosong < 0) {
?>
        <script>
            $(document).ready(function() {
                // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                $("#kosong").show(); // Munculkan alert validasi kosong
            });
        </script>
<?php
    } else { // Jika semua data sudah diisi
        echo "<hr>";

        // Buat sebuah tombol untuk mengimport data ke database
        echo "<button type='submit' class='btn btn-success' name='import'>Import</button> &nbsp;";
        echo "<a class='btn btn-danger' href='" . base_url("Admin/Karyawan") . "'>Cancel</a>";
    }

    echo "</form>";
}
?>