<script>

</script>
<h3>Form Import Data Judul</h3>
<hr>

<a href="<?php echo base_url("assets/excel/format.xlsx"); ?>">Download Format</a>
<br>
<br>

<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
<form method="post" action="<?php echo base_url("Datamaster/Popunit/Form"); ?>" enctype="multipart/form-data">
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
    echo "<form method='post' action='" . base_url("Datamaster/Popunit/import") . "'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";

    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='6'><center>PREVIEW DATA</center></th>
    </tr>
    <tr>
      <th>ID POP UNIT</th>
      <th>ID SECTION</th>
      <th>ID ACTIVITY</th>
      <th>ID TYPE</th>
      <th>ID MANUFACTURE</th>
      <th>CODE UNIT</th>
      <th>ID MODEL</th>
      <th>SNVIN</th>
      <th>EG MODEL</th>
      <th>ESN</th>
      <th>HM</th>
      <th>DELIV UNIT</th>
      <th>DELIV TO AGM</th>
      <th>FOTO</th>
      <th>LOCATION</th>
      <th>ISACTIVE</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach ($sheet as $row) {

        $idPopunit = $row['A'];
        $idSection = $row['B'];
        $idUnitActivity = $row['C'];
        $idUnitType = $row['D'];
        $idUnitManufacture = $row['E'];
        $codeUnit = $row['F'];
        $idUnitModel = $row['G'];
        $snvin = $row['H'];
        $engineModel = $row['I'];
        $esn = $row['J'];
        $hmUpdate = $row['K'];
        $deliveryUnit = $row['L'];
        $deliveryToAgm = $row['M'];
        $fotoUnit = $row['N'];
        $location = $row['O'];
        $isActive = $row['P'];

        // Cek jika semua data tidak diisi
        if ($idPopunit == "" && $idSection == "" && $idUnitActivity == "" && $idUnitType == "" && $idUnitManufacture == "" && $codeUnit == "" && $idUnitModel == "" && $snvin == "" && $engineModel == "" && $esn == "" && $hmUpdate == "" && $deliveryUnit == "" && $deliveryToAgm == ""&& $fotoUnit == ""&& $location == ""&& $isActive == "")
            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

        // Cek $numrow apakah lebih dari 1
        // Artinya karena baris pertama adalah nama-nama kolom
        // Jadi dilewat saja, tidak usah diimport
        if ($numrow > 1) {
            // Validasi apakah semua data telah diisi
            $idPopunit_td = (!empty($idPopunit)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
            $idSection_td = (!empty($nik)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
            $idUnitActivity_td = (!empty($nidn)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
            $idUnitType_td = (!empty($idUnitType)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $idUnitManufacture_td = (!empty($idUnitManufacture)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $codeUnit_td = (!empty($codeUnit)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $idUnitModel_td = (!empty($idUnitModel)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $snvin_td = (!empty($snvin)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $engineModel_td = (!empty($engineModel)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $esn_td = (!empty($esn)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $hmUpdate_td = (!empty($hmUpdate)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $deliveryUnit_td = (!empty($deliveryUnit)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $deliveryToAgm_td = (!empty($deliveryToAgm)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $fotoUnit_td = (!empty($fotoUnit)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $location_td = (!empty($location)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $isActive_td = (!empty($isActive)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

            // Jika salah satu data ada yang kosong
            if ($idPopunit == "" or $idSection == "" or $idUnitActivity == "" or $idUnitType == "" or $idUnitManufacture =="" or $codeUnit == "" or $idUnitModel == "" or $snvin == "" or $engineModel == "" or $esn == "" or $hmUpdate == "" or $deliveryUnit == "" or $deliveryToAgm == "" or $fotoUnit == "" or $location == "" or $isActive == "") {
                $kosong++; // Tambah 1 variabel $kosong
            }

            echo "<tr>";
            echo "<td" . $idPopunit_td . ">" . $idPopunit . "</td>";
            echo "<td" . $idSection_td . ">" . $idSection . "</td>";
            echo "<td" . $idUnitActivity_td . ">" . $idUnitActivity . "</td>";
            echo "<td" . $idUnitType_td . ">" . $idUnitType . "</td>";
            echo "<td" . $idUnitManufacture_td . ">" . $idUnitManufacture . "</td>";
            echo "<td" . $codeUnit_td . ">" . $codeUnit . "</td>";
            echo "<td" . $idUnitModel_td . ">" . $idUnitModel . "</td>";
            echo "<td" . $snvin_td . ">" . $snvin . "</td>";
            echo "<td" . $engineModel_td . ">" . $engineModel . "</td>";
            echo "<td" . $esn_td . ">" . $esn . "</td>";
            echo "<td" . $hmUpdate_td . ">" . $hmUpdate . "</td>";
            echo "<td" . $deliveryUnit_td . ">" . $deliveryUnit . "</td>";
            echo "<td" . $deliveryToAgm_td . ">" . $deliveryToAgm . "</td>";
            echo "<td" . $fotoUnit_td . ">" . $fotoUnit . "</td>";
            echo "<td" . $location_td . ">" . $location . "</td>";
            echo "<td" . $isActive_td . ">" . $isActive . "</td>";
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
        echo "<a class='btn btn-danger' href='" . base_url("Datamaster/Popunit") . "'>Cancel</a>";
    }

    echo "</form>";
}
?>