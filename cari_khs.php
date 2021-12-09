<!-- Koneksi database -->
<?php
include 'koneksi.php';
?>
<!-- Pembuatan form pencarian data dengan menggunakan method get -->
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
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
        <th>NIM</th>
        <th>Kode MK</th>
        <th>Nilai</th>
    </tr>
    <!-- End Table -->
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari']; //variabel cari akan menampung data inputan
        $sql = "select * from khs where NIM like'%" . $cari . "%'"; // query untuk melakukan pencarian data berdasarkan nim
        $tampil = mysqli_query($con, $sql);
    } else {
        $sql = "select * from khs"; //jika data nya tidak di temukan maka menampilkan semua data
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1; // penomoran 
    // tampilkan data bersarkan array
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['NIM']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>