<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = md5 ($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$password','$email','$namalengkap','$alamat')");

if($sql){
    echo"<script>
    alert('pendaftaran akun berhasil');
    location.href= '../login.php';

    </script>";
}
?>

<!-- include 'koneksi.php';: Ini adalah perintah untuk menyertakan file koneksi.php yang berisi koneksi ke database MySQL.
Mengambil nilai dari formulir pendaftaran yang dikirim melalui metode POST dan disimpan dalam variabel $username, $password, $email, $namalengkap, dan $alamat.
md5($_POST['password']): Ini mengenkripsi kata sandi yang diterima sebelum disimpan ke database. Namun, catatan penting bahwa metode enkripsi MD5 bukanlah yang paling aman untuk keamanan kata sandi.
Mengeksekusi query SQL untuk menyisipkan data pengguna baru ke dalam tabel user dalam database. Query ini menggunakan variabel yang berisi nilai dari formulir pendaftaran.
Jika query berhasil dieksekusi (pengguna berhasil didaftarkan), maka akan muncul pesan pemberitahuan menggunakan JavaScript alert dan pengguna akan dialihkan ke halaman login. -->