<?php
$host       = 'localhost';
$user       = 'root';
$password   = '';
$db         = 'gg';
$conn = mysqli_connect($host, $user, $password, $db) or die(mysql_error());

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows  = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id){
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM user WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function hapus_hotel($id){
    global $conn;
    $result = mysqli_query($conn, "DELETE FROM hotel WHERE id_hotel = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    mysqli_query($conn, "UPDATE user set
    email = '$_POST[email]',
    nama = '$_POST[nama]',
    password = '$_POST[password]' 
    WHERE id = $_POST[id]");
     }

function ubah_hotel($hotel){
    global $conn;
    mysqli_query($conn, "UPDATE hotel set
    hotel = '$_POST[nama]',
    id_alamat = '$_POST[id_alamat]',
    alamat = '$_POST[alamat]',
    harga = '$_POST[harga]',
    rating = '$_POST[rating]',
    desk = '$_POST[desk]',
    stok = '$_POST[stok]'
    WHERE id_hotel = $_POST[id]");
}

function cari($keywordhotel){
    $query = "SELECT * FROM hotel where hotel LIKE '%$keywordhotel%'";
    return query($query);
}

function cari_akun($keywordakun){
    $query = "SELECT * FROM user where nama LIKE '%$keywordakun%'";
    return query($query);
}

$mahasiswa = query("SELECT * FROM user");
$pilihhotel = query("SELECT * FROM hotel");
?>