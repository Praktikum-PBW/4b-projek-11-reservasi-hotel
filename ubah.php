<?php
session_start();
require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM user WHERE id = $id")[0];

if( isset($_POST["submit"])){
    if( ubah($id) > 0){
        echo "
            <script>
                alert('Data Berhasil DiUbah');
                document.location = 'admin_akun.php';
            </script>";
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
            <h1>Daftar User</h1>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value = "<?= $mhs ["id"]; ?>">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value = "<?= $mhs ["email"]?>">
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value = "<?= $mhs ["password"]?>">
                            </div>
                            <div class="mb-2">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="nama" id="nama" class="form-control"  value = "<?= $mhs ["nama"]?>">
                            </div>
                            <input type="submit" value="Ubah" name="submit" class="btn btn-primary">
                        </form>
                         <?php

                    
                                    if(isset($_POST['proses'])){
                                        mysqli_query($conn, "insert into user set
                                        email = '$_POST[email]',
                                        password = '$_POST[password]',
                                         nama = '$_POST[nama]'");
                                         echo "Data barang baru telah tersimpan";
                                         }
                        ?>
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
                      Data User
                     </div>
                     <div class="card-body">
                         <table class="table">
                          <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                         </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1 ?>
                          <?php foreach($mahasiswa as $row):?>
                         <tr>
                         <td><?=$i?></td>
                         <td><?= $row ["email"]; ?></td>
                         <td><?= $row ["nama"]; ?></td>
                         <td><?= $row ["password"]; ?></td>
                         <td scope="row">
                                    <a href="ubah.php?op=edit&id=<?= $row["id"]; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="hapus.php?op=hapus&id=<?= $row["id"]; ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
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