<?php

require 'functions.php';
$host       = 'localhost';
$user       = 'root';
$password   = '';
$db         = 'gg';
$conn = mysqli_connect($host, $user, $password, $db) or die(mysql_error());

$datahotel = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel = '".$_GET['id']."' ");
$d = mysqli_fetch_object($datahotel); 

$date_val = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
   
    
    <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="gambar/<?php echo $d->gambar ?>" width="250" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="gambar/<?php echo $d->gambar2 ?>" width="70"> <img onclick="change_image(this)" src="gambar/<?php echo $d->gambar3 ?>" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                            
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $d->hotel ?></span>
                                <h5 class="text-uppercase"><?php echo $d->alamat ?>t</h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo $d->harga ?></span>
                                    
                                </div>
                            </div>
                            <p class="about"><?php echo $d->desk ?></p>
                            <h6 class="text-uppercase">Stok</h6> <p class="about"><?php echo $d->stok ?></p>
                            <form action="" method="POST">
                            <div class="w-25">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" name="stok" id="stok" class="form-control" style=width:80px;>
                            </div>
                            
                            <div class="cart mt-4 align-items-center"> 
                                <input type="submit" value="Book" name="proses" class="btn btn-danger text-uppercase mr-2 px-4">
                            </div>
                            </form>
                            <?php
                            if(isset($_POST['proses'])){
                                mysqli_query($conn, "insert into visitor_masuk set
                                id_vm = '',
                                id_hotel = '".$_GET['id']."',
                                tgl_masuk = '$date_val',
                                jumlah = '$_POST[stok]'");
                                echo "<script>alert('Booked!');</script>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>function change_image(image){
var container = document.getElementById("main-image");
container.src = image.src;
}
document.addEventListener("DOMContentLoaded", function(event) {
});</script>
    <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>