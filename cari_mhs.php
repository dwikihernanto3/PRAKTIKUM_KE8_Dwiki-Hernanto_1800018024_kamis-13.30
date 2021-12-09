<!-- Koneksi database -->
<?php
include "koneksi.php";
?>
<!-- Pembuatan form pencarian data dengan menggunakan method get -->
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<!-- END-Form -->
<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<!--  Tabel untuk menampilkan data pencarian-->
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
    </tr>
    <!-- End Table -->
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari']; //variabel cari akan menampung data inputan
        $sql = "select * from mahasiswa where nama like'%" . $cari . "%'"; // query untuk melakukan pencarian data berdasarkan nim
        $tampil = mysqli_query($con, $sql);
    } else {
        $sql = "select * from mahasiswa"; //jika data nya tidak di temukan maka menampilkan semua data
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1; // penomoran 
    // tampilkan data bersarkan array
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <!-- tampilkan data dalam bentuk array -->
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nama']; ?></td>
        </tr>
    <?php } ?>
</table>