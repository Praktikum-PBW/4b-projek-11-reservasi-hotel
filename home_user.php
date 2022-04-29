<?php
error_reporting(0);
require 'functions.php';
$datahotel = query("SELECT * FROM hotel");


if( isset($_GET["cari"])){
  $datahotel = cari($_GET["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="assets/img/logomini.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Dashboard User
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
    
    <!-- Awal Card -->
    <div class="container-fluid py-5 mt-1">
      <div class="container">
        <div class="judul-kategori" style="background-color: #ce0000; border-radius: 10px;">
          <h5 class="text-center" style="font-family:'Work Sans', sans-serif;color: #FFFBE9;">List Hotel</h5>
        </div>
        <div class="w-25">
        <form class="d-flex" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-outline-danger" type="submit" name="cari">Search</button>
        </form>
        </div>
        <br>

        
        <div class="row">
        <?php $i = 1 ?>
        <?php foreach($datahotel as $row):?>

          <div class="col-sm-4 col-4">
            <div class="card" >
              <img src="gambar/<?php echo $row['gambar']; ?>" width="180" height="180" class="card-img-top d-block w-100" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $row['hotel'] ?></h5>
                <p class="card-text"><?= $row['alamat'] ?></p>
                <p class="card-text">RATING : <?= $row['rating'] ?></p>
                <p class="card-text"><?= $row['harga'] ?></p>
                <br>
                <a href="#" class="btn text-white" style="background-color: #ce0000;">Book</a>
                <a href="detail.php?id=<?php echo $row['id_hotel'];?>" class="btn text-white" style="background-color: #ce0000;">Details</a>
              </div>
            </div>
          </div>

          <?php $i++; ?>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
    
    <!-- Akhir card -->
</body>

</html>