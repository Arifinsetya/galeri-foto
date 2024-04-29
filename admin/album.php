<?php
session_start();
include'../config/koneksi.php';
if ($_SESSION['status'] !='login'){
     echo"<script>
     alert('anda blm login');
     location.href='../index.php';
     </script>";
     
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="
    ../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-info ">
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
    <div class="navbar-nav me-auto">
      <a href="home.php"class = "nav-link ">Home</a>
      <a href="album.php"class = "nav-link">Album</a>
      <a href="foto.php"class = "nav-link">Foto</a>
    </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">
        Keluar
      </a>
    </div>
  </div>
</nav>

<div class="container ">
    <div class="row">
        <div class="col-md-4">
            <div class="card-mt-2">
              <div class="card-header fs-3">Tambah Album</div>
              <hr>
              <div class="card-body">
                    <form action="../config/aksi_album.php" method="POST">
                        <label class="form-label">Nama Album</label>
                        <input type="text"name = "namaalbum" class="form-control"required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name = "deskripsi" required></textarea>
                        <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col md-8">
          <div class="card-mt-2">
            <div class="card-header">
              Data Album
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama Album</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $userid = $_SESSION['userid'];
                  $sql = mysqli_query($koneksi,"SELECT * FROM album WHERE userid = '$userid'");
                  while ($data = mysqli_fetch_array($sql)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data ['namaalbum'] ?></td>
                    <td><?php echo $data ['deskripsi'] ?></td>
                    <td><?php echo $data ['tanggalbuat'] ?></td>
                    <td>
                      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid']?>">
<i class="bi bi-trash3"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="hapus<?php echo $data['albumid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/aksi_album.php" method="POST">
          <input type="hidden" name = "albumid" value="<?php echo $data ['albumid']?>">
          Apakah anda yakin ingin menghapus data <strong> <?php echo $data['namaalbum'] ?></strong>? 
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid']?>">
<i class="bi bi-pencil-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="edit<?php echo $data['albumid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/aksi_album.php" method="POST">
          <input type="hidden" name = "albumid" value="<?php echo $data ['albumid']?>">
          <label class="form-label">Nama Album</label>
                        <input type="text"name = "namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control"required>
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name = "deskripsi"  required>
                          <?php echo $data['deskripsi']; ?>
                        </textarea>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>



<footer class="d-flex justify-content-center border-top mt-3 bg-info fixed-bottom">
    <p>&copy; UKK PPLG | Arifin Setya N</p>
</footer>
    
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

<!-- merupakan bagian dari halaman admin yang memungkinkan pengguna untuk menambah, mengedit, dan menghapus data album. Berikut adalah penjelasan singkatnya:
1. Pengecekan Status Login: Kode pertama memulai sesi PHP dan memeriksa apakah pengguna sudah login. Jika belum, maka akan muncul pesan peringatan dan pengguna akan dialihkan kembali ke halaman utama.
2. Tampilan Halaman Admin: Setelah verifikasi status login, halaman admin ditampilkan. Halaman ini memiliki navigasi untuk mengakses halaman album dan foto, serta tombol untuk keluar (logout).
3. Form Tambah Album: Bagian ini menampilkan form untuk menambah data album. Pengguna dapat memasukkan nama album dan deskripsi album.
4. Tampilan Data Album: Di bagian ini, data album yang telah disimpan ditampilkan dalam bentuk tabel. Setiap baris tabel menampilkan informasi album beserta tombol untuk menghapus dan mengedit data album.
5. Modal Hapus dan Edit: Tombol "Hapus" dan "Edit" masing-masing memunculkan modal yang meminta konfirmasi sebelum menghapus dan memungkinkan pengguna untuk mengedit informasi album.

Halaman ini menggunakan Bootstrap untuk tata letak dan styling yang responsif.