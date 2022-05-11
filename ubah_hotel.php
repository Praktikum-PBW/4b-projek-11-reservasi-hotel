<?php
session_start();
require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM hotel WHERE id_hotel = $id")[0];


                        if( isset($_POST["submit"])){
                            if( ubah_hotel($id) > 0){
                                echo "
                                    <script>
                                        alert('Data Berhasil DiUbah');
                                        document.location.href = 'admin_hotel.php';
                                    </script>
                                ";
                            }else{
                                echo "
                                    <script>
                                        alert('Data Berhasil DiUbah');
                                        document.location.href = 'admin_hotel.php';
                                    </script>
                                ";
                            }
                        }
                        


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
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
                        <form action="" method="POST">
                            <input type="hidden" name="id" value = "<?= $mhs ["id_hotel"]; ?>">
                            <div class="mb-2">
                                <label for="nama" class="form-label">Nama Hotel</label>
                                <input type="text" name="nama" id="nama" class="form-control" value = "<?= $mhs ["hotel"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="id_alamat" class="form-label">ID Alamat</label>
                                <input type="id_alamat" name="id_alamat" id="id_alamat" class="form-control" value = "<?= $mhs ["id_alamat"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value = "<?= $mhs ["alamat"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" value = "<?= $mhs ["harga"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" name="rating" id="rating" class="form-control" value = "<?= $mhs ["rating"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="rating" class="form-label">Fasilitas</label>
                                <input type="text" name="desk" id="desk" class="form-control" value = "<?= $mhs ["desk"]; ?>">
                            </div>
                            <div class="mb-2">
                                <label for="rating" class="form-label">Stok</label>
                                <input type="text" name="stok" id="stok" class="form-control" value = "<?= $mhs ["stok"]; ?>">
                            </div>
                            <input type="submit" value="Ubah" name="submit" class="btn btn-primary">
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
                          <?php foreach($pilihhotel as $row):?>
                         <tr>
                         <td><?=$i?></td>
                         <td><?= $row ["hotel"]; ?></td>
                         <td><?= $row ["id_alamat"]; ?></td>
                         <td><?= $row ["alamat"]; ?></td>
                         <td><?= $row ["harga"]; ?></td>
                         <td><?= $row ["rating"]; ?></td>
                         <td scope="row">
                                    <a href="ubah_hotel.php?op=edit&id=<?= $row["id_hotel"]; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="hapus.php?op=hapus&id=<?= $row["id_hotel"]; ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
          </div>
        </div>


</body>

</html>