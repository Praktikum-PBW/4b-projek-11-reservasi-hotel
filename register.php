<?php
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
<style>
    #hide{
        display:none;
    }
</style>
<body>

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <h1>Register Your Account</h1>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Input Data</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value = "<?= $mhs ["id"]; ?>">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-label-group">
                                     <select class="form-control" name="level" id="hide">
                                     <option value="user">User</option>
                                     </select>
                            </div>
                            <input type="submit" value="Register" name="proses" class="btn btn-primary">
                            </form>
                         <?php

                    
                                    if(isset($_POST['proses'])){
                                        mysqli_query($conn, "insert into user set
                                        email = '$_POST[email]',
                                        password = md5('$_POST[password]'),
                                        nama = '$_POST[nama]',
                                        level = '$_POST[level]'");
                                        echo "
                                        <script>
                                            alert('Akun Berhasil Dibuat');
                                            document.location.href = 'index.php';
                                        </script>
                                    ";
                                         }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>