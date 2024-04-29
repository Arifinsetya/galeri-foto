<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi,"INSERT INTO album VALUES ('','$namaalbum','$deskripsi','$tanggal','$userid')");



echo "<script>
alert('data berhasil disimpan');
location.href='../admin/album.php';
</script>";


}

if (isset($_POST['edit'])) {
    $albumid =$_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi,"UPDATE album SET namaalbum= '$namaalbum', deskripsi= '$deskripsi',
     tanggalbuat = '$tanggal'WHERE albumid = '$albumid'");



echo "<script>
alert('data berhasil diperbarui');
location.href='../admin/album.php';
</script>";
}

if (isset($_POST['hapus'])) {
    $albumid =$_POST['albumid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid = '$albumid'");

echo "<script>
alert('data berhasil dihapus');
location.href='../admin/album.php';
</script>";
}
?>

<!-- Ini adalah kode PHP yang mengelola operasi CRUD (Create, Read, Update, Delete) untuk entitas album dalam database. 
1. Saat menambahkan album (`if (isset($_POST['tambah']))`), kode mengambil data dari formulir tambah album yang dikirim melalui metode POST. Album baru kemudian disimpan ke database, dan pengguna diberi pemberitahuan dengan pesan pop-up JavaScript bahwa data berhasil disimpan.
2. Saat mengedit album (`if (isset($_POST['edit']))`), kode mengambil data dari formulir edit album yang dikirim melalui metode POST. Album yang ada di database diperbarui dengan data yang baru, dan pengguna diberi pemberitahuan dengan pesan pop-up JavaScript bahwa data berhasil diperbarui.
3. Saat menghapus album (`if (isset($_POST['hapus']))`), kode mengambil ID album yang akan dihapus dari formulir yang dikirim melalui metode POST. Album dengan ID yang sesuai dihapus dari database, dan pengguna diberi pemberitahuan dengan pesan pop-up JavaScript bahwa data berhasil dihapus. 

-->