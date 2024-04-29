<?php
$hostname = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'ukk_galerifoto';

$koneksi = mysqli_connect($hostname, $userdb,
 $passdb, $namedb);

//  if ($koneksi){
//     echo"terhubung";
//  }else{
//     echo"tidak terhubung";
//  }
   
?>

<!--Ini adalah kode PHP untuk membuat koneksi ke database MySQL. 
Kode ini menggunakan variabel untuk menyimpan detail koneksi, 
seperti nama host, nama pengguna, kata sandi, dan nama database. 
Kemudian, fungsi mysqli_connect() digunakan untuk melakukan koneksi ke database.  -->