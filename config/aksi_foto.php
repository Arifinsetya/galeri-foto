<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto= $_POST['deskripsifoto'];
    $tanggalunggah= date('Y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi,"INSERT INTO foto VALUES ('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid')");



echo "<script>
alert('data berhasil disimpan');
location.href='../admin/foto.php';
</script>";
}

if(isset($_POST['edit'])){
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto= $_POST['deskripsifoto'];
    $tanggalunggah= date('Y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    if($foto == null){
        $sql = mysqli_query($koneksi,"UPDATE foto SET judulfoto='$judulfoto',
        deskripsifoto ='$deskripsifoto',tanggalunggah = '$tanggalunggah',albumid= '$albumid'WHERE fotoid = '$fotoid' " );
    }else{
        $query = mysqli_query($koneksi,"SELECT * FROM foto WHERE fotoid = '$fotoid' ");
        $data = mysqli_fetch_array($query);

        if(is_file('../assets/img/'.$data['lokasifile'])){
            unlink('../assets/img/'.$data['lokasifile']);
        }
        move_uploaded_file($tmp, $lokasi.$namafoto);
        $sql = mysqli_query($koneksi,"UPDATE foto SET judulfoto='$judulfoto',
        deskripsifoto ='$deskripsifoto',tanggalunggah = '$tanggalunggah',lokasifile='$namafoto',albumid= '$albumid'WHERE fotoid = '$fotoid' " );
    }
    echo "<script>
alert('data berhasil diperbarui');
location.href='../admin/foto.php';
</script>";
}
if (isset($_POST['hapus'])){
    $fotoid = $_POST['fotoid'];
    $query = mysqli_query($koneksi,"SELECT * FROM foto WHERE fotoid = '$fotoid' ");
    $data = mysqli_fetch_array($query);

    if(is_file('../assets/img/'.$data['lokasifile'])){
        unlink('../assets/img/'.$data['lokasifile']);
    }
    $sql = mysqli_query($koneksi,"DELETE FROM foto WHERE fotoid = '$fotoid'");
    echo "<script>
alert('data berhasil dihapus');
location.href='../admin/foto.php';
</script>";
}


/* 
Kode PHP ini berfungsi untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data foto dalam database. Berikut adalah penjelasan singkatnya:
1. Saat menambahkan data foto baru (`if (isset($_POST['tambah']))`), kode akan mengambil nilai dari formulir tambah foto yang dikirim menggunakan metode POST. Foto akan diunggah ke direktori yang ditentukan dan informasi foto akan disimpan ke dalam database. Setelah berhasil, pengguna akan diarahkan kembali ke halaman admin.
2. Saat mengedit data foto (`if(isset($_POST['edit']))`), kode akan mengambil nilai dari formulir edit foto yang dikirim menggunakan metode POST. Jika pengguna mengunggah foto baru, foto lama akan dihapus dan foto baru akan diunggah ke direktori yang ditentukan. Informasi foto yang diperbarui akan disimpan ke dalam database. Setelah berhasil, pengguna akan diarahkan kembali ke halaman admin.
3. Saat menghapus data foto (`if (isset($_POST['hapus']))`), kode akan menghapus foto dari direktori yang ditentukan dan dari database. Setelah berhasil, pengguna akan diarahkan kembali ke halaman admin.
Kode ini menggunakan variabel `$_FILES` untuk mengelola unggahan file foto, dan menggunakan `$_SESSION` untuk menyimpan informasi sesi pengguna seperti ID pengguna. Selain itu, ada juga penggunaan fungsi `unlink()` untuk menghapus file foto dari direktori.

*/