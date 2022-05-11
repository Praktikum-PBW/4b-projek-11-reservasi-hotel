<?php
session_start();
require 'functions.php';
$host       = 'localhost';
$user       = 'root';
$password   = '';
$db         = 'gg';
$conn = mysqli_connect($host, $user, $password, $db) or die(mysql_error());
$mahasiswa = query("SELECT * FROM hotel");

if( isset($_GET["cari"])){
    $mahasiswa = cari($_GET["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="assets/img/logomini.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Dashboard Admin
        </a>
        <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
        </div>
    </nav>
    <div class="container">
    <div class="jumbotron bg-white text-danger">
        <h1 class="display-4">Hello, <b><?= $_SESSION['nama'] ?></b></h1>
        <p class="lead"> Selamat datang, anda berhasil Login sebagai <b><?= $_SESSION['level'] ?></b> </p>
        
    </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Hotel</h3>
                    </div>
                    <div class="card-body">
                        <form action="aksi.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value = "<?= $mhs ["id"]; ?>">
                            <div class="mb-2">
                                <label for="nama" class="form-label">Nama Hotel</label>
                                <input type="text" name="nama" id="nama" class="form-control" >
                            </div>
                            <div class="mb-2">
                                <label for="id_alamat" class="form-label">ID Alamat</label>
                                <input type="id_alamat" name="id_alamat" id="id_alamat" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" name="rating" id="rating" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="gambar" class="form-label">Gambar 1</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="gambar2" class="form-label">Gambar 2</label>
                                <input type="file" name="file2" id="file2" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="gambar3" class="form-label">Gambar 3</label>
                                <input type="file" name="file3" id="file3" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="desc" class="form-label">Fasilitas</label>
                                <input type="text" name="desc" id="desc" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" name="stok" id="stok" class="form-control">
                            </div>
                            <input type="submit" value="Upload" name="bupload" class="btn btn-primary">
                        </form>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                 <div class="card">
                     <div class="card-header text-white bg-secondary">
                      Data Hotel
                     </div>
                      <div class="w-25">
                            <form class="d-flex" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                            <button class="btn btn-outline-danger" type="submit" name="cari">Search</button>
                            </form>
                      </div>
                     <div class="card-body">
                         <table class="table">
                          <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Hotel</th>
                            <th scope="col">ID Alamat</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Aksi</th>
                         </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1 ?>
                          <?php foreach($mahasiswa as $row):?>
                         <tr>
                         <td><?=$i?></td>
                         
                         <td><?= $row ["hotel"]; ?></td>
                         <td><?= $row ["id_alamat"]; ?></td>
                         <td><?= $row ["alamat"]; ?></td>
                         <td><?= $row ["harga"]; ?></td>
                         <td><?= $row ["rating"]; ?></td>
                         <td scope="row">
                                    <a href="ubah_hotel.php?op=edit&id=<?= $row["id_hotel"]; ?>"><button type="button" style="height:30px;width:50px" class="d-grid gap-2 btn btn-warning btn-sm">Edit</button></a>
                                    <a href="hapus_hotel.php?op=hapus&id=<?= $row["id_hotel"]; ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" style="height:30px;width:50px" class="d-grid gap-2 btn btn-danger btn-sm">Delete</button></a>            
                                </td>
                        </tr>
                    
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
          </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>