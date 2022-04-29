<?php
session_start();
require 'functions.php';
$host       = 'localhost';
$user       = 'root';
$password   = '';
$db         = 'gg';
$conn = mysqli_connect($host, $user, $password, $db) or die(mysql_error());
$mahasiswa = query("SELECT * FROM user");
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
    
    <div class="container" >
                <div class="row mt-5">
                <div class="col-sm-6">
                <div class="card bg-danger">
                <div class="card-body">
                    <h5 class="card-title text-white">Manage Account</h5>
                    <p class="card-text text-white">Kelola akun user reservasi hotel online</p>
                    <a href="admin_akun.php" class="btn btn-light text-danger">GO!</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-danger">
                <div class="card-body">
                    <h5 class="card-title text-white">Manage Hotel</h5>
                    <p class="card-text text-white">Kelola hotel reservasi hotel online</p>
                    <a href="admin_hotel.php" class="btn btn-light text-danger">GO!</a>
                </div>
                </div>
            </div>
            </div>
    </div>
    
    </body>

</html>