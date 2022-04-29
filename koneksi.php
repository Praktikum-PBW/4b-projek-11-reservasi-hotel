<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "gg";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($conn));
?>