<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5 ($_POST['password']);

$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'AND password = '$password'");

$cek = mysqli_num_rows($sql);

if( $cek> 0) {
    $data = mysqli_fetch_array($sql);

    $_SESSION['username'] =$data['username'];
    $_SESSION['userid'] =$data['userid'];
    $_SESSION['status'] = 'login';
    echo "<script>
    alert('Login successful');
    location.href = '../admin/index.php';
    </script>";
}else {
    echo "<script>
    alert('username/password salah');
    location.href = '..login.php';
    </script>";
}



?>

<!-- Kode PHP ini bertanggung jawab untuk melakukan proses otentikasi pengguna saat mereka mencoba untuk login. Berikut adalah penjelasan singkatnya:

1. `session_start();`: Ini memulai sesi PHP, yang digunakan untuk menyimpan informasi pengguna selama sesi berlangsung.
2. `include 'koneksi.php';`: Ini menyertakan file `koneksi.php` yang berisi koneksi ke database MySQL.
3. Mengambil nilai dari formulir login yang dikirim melalui metode POST dan disimpan dalam variabel `$username` dan `$password`. Kata sandi dienkripsi menggunakan fungsi `md5()` sebelum membandingkannya dengan kata sandi yang tersimpan di database.
4. Eksekusi query SQL untuk memeriksa apakah terdapat baris yang cocok dengan kombinasi nama pengguna dan kata sandi yang diberikan.
5. Jika ada baris yang cocok, maka sesi pengguna akan dimulai (`$_SESSION` akan diatur), dan pengguna akan diarahkan ke halaman admin dengan pesan pemberitahuan bahwa login berhasil.
6. Jika tidak ada baris yang cocok, pesan pemberitahuan akan muncul bahwa nama pengguna atau kata sandi salah, dan pengguna akan diarahkan kembali ke halaman login.
Kode ini menggunakan session PHP untuk menyimpan informasi login pengguna dan fungsi enkripsi MD5 untuk mengenkripsi kata sandi pengguna. Namun, disarankan untuk menggunakan metode enkripsi yang lebih kuat untuk keamanan kata sandi, seperti bcrypt atau Argon2.
 -->