<script>

</script>
<h3>Form Import Data Judul</h3>
<hr>

<a href="<?php echo base_url("assets/excel/format.xlsx"); ?>">Download Format</a>
<br>
<br>

<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
<form method="post" action="<?php echo base_url("Datamaster/Soh/Form"); ?>" enctype="multipart/form-data">
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
    echo "<form method='post' action='" . base_url("Datamaster/Soh/import") . "'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";

    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='6'><center>PREVIEW DATA</center></th>
    </tr>
    <tr>
      <th>No</th>
      <th>PART NUMBER</th>
      <th>PART DESCRIPTION</th>
      <th>MNEMONIC</th>
      <th>MATERIAL</th>
      <th>PRICE</th>
      <th>ISACTIVE</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach ($sheet as $row) {

        $idPart = $row['A'];
        $partNumber = $row['B'];
        $partDescription = $row['C'];
        $mnemonic = $row['D'];
        $material = $row['E'];
        $price = $row['F'];
        $isActive = $row['G'];

        // Cek jika semua data tidak diisi
        if ($idPart == "" && $partNumber == "" && $partDescription == "" && $mnemonic == "" && $material == "" && $price == "" && $isActive == "")
            continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

        // Cek $numrow apakah lebih dari 1
        // Artinya karena baris pertama adalah nama-nama kolom
        // Jadi dilewat saja, tidak usah diimport
        if ($numrow > 1) {
            // Validasi apakah semua data telah diisi
            $idPart_td = (!empty($idPart)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
            $partNumber_td = (!empty($nik)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
            $partDescription_td = (!empty($nidn)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
            $mnemonic_td = (!empty($mnemonic)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $material_td = (!empty($material)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $price_td = (!empty($price)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            $isActive_td = (!empty($isActive)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

            // Jika salah satu data ada yang kosong
            if ($idPart == "" or $partNumber == "" or $partDescription == "" or $mnemonic == "" or $material =="" or $price == "" or $isActive == "") {
                $kosong++; // Tambah 1 variabel $kosong
            }

            echo "<tr>";
            echo "<td" . $idPart_td . ">" . $idPart . "</td>";
            echo "<td" . $partNumber_td . ">" . $partNumber . "</td>";
            echo "<td" . $partDescription_td . ">" . $partDescription . "</td>";
            echo "<td" . $mnemonic_td . ">" . $mnemonic . "</td>";
            echo "<td" . $material_td . ">" . $material . "</td>";
            echo "<td" . $price_td . ">" . $price . "</td>";
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
        echo "<a class='btn btn-danger' href='" . base_url("Datamaster/Soh") . "'>Cancel</a>";
    }

    echo "</form>";
}
?>